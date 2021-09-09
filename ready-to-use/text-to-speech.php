<?php

# Text-to-speech (TTS) system converts natural written text into an audio speech.
require_once './vendor/autoload.php';
use EdenAI\Speech;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Text%20To%20Speech
$output = $text->textToSpeech(text:"Your text", provider: ['google', 'microsoft'], language: 'en-US', option:"FEMALE");
echo $output;
?>
