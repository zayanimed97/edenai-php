<?php

# Speech-to-Text (or speech recognition) is technology that can recognize spoken words, which can then be converted to text.
require_once './vendor/autoload.php';
use EdenAI\Speech;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Speech%20Recognition
$output = $text->speechRecognition(file:'./tests/test.mp3', provider: ['google', 'microsoft'], language: 'en-US');
echo $output;
?>
