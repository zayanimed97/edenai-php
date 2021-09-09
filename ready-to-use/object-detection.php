<?php

# Object detection is a computer vision technology which allows to detect common objects on images. 
require_once './vendor/autoload.php';
use EdenAI\Vision;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Object%20Detection
$output = $text->objectDetection(file:'./tests/test.jpg', provider: ['amazon', 'google']);
echo $output;
?>
