<?php

# Face Detection is a computer vision technology which allows to detect human faces on images with additionnal informations: estimated age, sex, emotion, etc.
require_once './vendor/autoload.php';
use EdenAI\Vision;

# Get your API key here: https://app.edenai.run/admin/account
$text = new Text("API KEY");

# Available providers and languages here: https://api.edenai.run/v1/redoc/#operation/Face%20Detection
$output = $text->faceDetection(file:'./tests/test.jpg', provider: ['amazon', 'google']);
echo $output;
?>
