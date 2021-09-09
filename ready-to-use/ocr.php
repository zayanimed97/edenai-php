<?php

# Optical Character Recognition or optical character reader (OCR) is the electronic or mechanical conversion of images of typed, handwritten or printed text into machine-encoded text, whether from a scanned document, a photo of a document.
require_once './vendor/autoload.php';
use EdenAI\OCR;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/OCR
$output = $text->OCR(file:'./tests/test.jpg', provider: ['amazon', 'google'], language: "en-US");
echo $output;
?>
