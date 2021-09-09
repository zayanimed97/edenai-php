<?php

# OCR Invoice enables users to analyze invoices in a variety of formats and return structured data to automate the invoice processing.
require_once './vendor/autoload.php';
use EdenAI\OCR;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/OCR%20Invoice
$output = $text->OCRInvoice(file:'./tests/test.jpg', provider: ['microsoft', 'mindee'], language: "en-US");
echo $output;
?>
