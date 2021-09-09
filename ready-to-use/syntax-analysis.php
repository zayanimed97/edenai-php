<?php

# Syntax analysis consists principaly in highlighting the structure of a text.
require_once './vendor/autoload.php';
use EdenAI\Text;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Syntax%20Analysis
$output = $text->syntaxAnalysis(text:"Your text", provider: ['amazon', 'ibm']);
echo $output;
?>
