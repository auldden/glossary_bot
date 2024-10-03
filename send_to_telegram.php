<?php
// Your Telegram Bot API token
$apiToken = "7696110911:AAEZ_6EOvFUH3Ax9hUCOkEzl9kKE-_EAh2g";

// Chat ID for the group (your chat ID)
$chatId = "2040196277";

// Get the word and definition from the form submission
$word = isset($_POST['word']) ? $_POST['word'] : '';
$definition = isset($_POST['definition']) ? $_POST['definition'] : '';

if ($word && $definition) {
    // Format the message to send to Telegram
    $message = "📚 *New Word Added to Glossary*\n\n";
    $message .= "📝 *Word*: " . $word . "\n";
    $message .= "📖 *Definition*: " . $definition;

    // Prepare the URL for the Telegram API
    $url = "https://api.telegram.org/bot$apiToken/sendMessage";

    // Send the message via cURL
    $postData = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'Markdown'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL request
    $response = curl_exec($ch);
    curl_close($ch);

    // Send success message
    echo "Message sent successfully!";
} else {
    echo "Please provide both a word and a definition!";
}
?>
