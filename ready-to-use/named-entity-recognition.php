<?php

# Named Entity Recognition (NER - also called entity identification or entity extraction) is an information extraction technique that automatically identifies named entities in a text and classifies them into predefined categories.require_once './vendor/autoload.php';
use EdenAI\Text;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Sentiment%20Analysis
$output = $text->namedEntityRecognition(text:"Your text", provider: ['amazon', 'ibm"]);
echo $output;
?>
