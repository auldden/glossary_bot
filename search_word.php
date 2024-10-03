<?php
// Simulate glossary words and definitions
$glossary = [
    'Python' => 'A high-level programming language.',
    'HTML' => 'A standard markup language for creating web pages.',
    'CSS' => 'A style sheet language used for describing the presentation of a document.'
];

// Get the search word from the query string
$word = isset($_GET['word']) ? $_GET['word'] : '';

$response = ['found' => false];

// Check if the word exists in the glossary
if (array_key_exists($word, $glossary)) {
    $response['found'] = true;
    $response['definition'] = $glossary[$word];
}

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
