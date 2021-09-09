<?php

# Sentiment analysis extracts sentiment in a given string of text. Sentiment analysis, also called 'opinion mining', uses natural language processing, text analysis and computational linguistics to identify and detect subjective information from the input text.
require_once './vendor/autoload.php';
use EdenAI\Text;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Sentiment%20Analysis
$output = $text->sentimentAnalysis(text:"Your text", provider: ['amazon', 'google']);
echo $output;
?>
