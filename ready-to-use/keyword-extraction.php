<?php

# Keyword extraction consists of automatically extracting the most important words and expressions in a text.
require_once './vendor/autoload.php';
use EdenAI\Text;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Keyword%20Extraction
$output = $text->keywordExtraction(text:"Your text", provider: ['amazon']);
echo $output;
?>
