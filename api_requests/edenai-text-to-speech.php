<?php
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://api.edenai.run/v1/pretrained/audio/text_to_speech');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
$request->setHeader(array(
  'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiY2FmODMyN2UtZjFjZS00YTJlLTgxZGQtZWE4NDlkZjBhYTgzIiwidHlwZSI6ImZyb250X2FwaV90b2tlbiJ9.z6g1gnwiFJngxrfSQkut7bMFylL0x5sntaCEfFHrZmw'
));
$request->addPostParameter(array(
  'text' => '\'Hello world\'',
  'providers' => '[\'microsoft\']',
  'option' => 'FEMALE',
  'language' => 'en-US'
));
try {
  $response = $request->send();
  if ($response->getStatus() == 200) {
    echo $response->getBody();
  }
  else {
    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    $response->getReasonPhrase();
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}
