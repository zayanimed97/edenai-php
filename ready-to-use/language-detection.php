<?php

# Language Detection or language guessing is the algorithm of determining which natural language given content is in.
require_once './vendor/autoload.php';
use EdenAI\Translation;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Language%20Detection
$output = $text->languageDetection(text:"Your text", provider: ['amazon', 'google']);
echo $output;
?>
