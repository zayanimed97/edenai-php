<?php

# Explicit content detection is a computer vision technology which allows to detect explicit content on images: violence, pornography, etc.
require_once './vendor/autoload.php';
use EdenAI\Vision;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Explicit%20Content%20Detection
$output = $text->ExplicitContentDetection(file:'./tests/test.jpg', provider: ['amazon', 'google']);
echo $output;
?>
