<?php

namespace EdenAI;

use HTTP_Request2 as HTTP_Request2;

class Vision{
    /**
     * Token
     * @var  string
     * @internal
     */
    private $key;

    /**
     * Endpoint
     * @var  string
     * @internal
     */
    private $endpoint = "https://api.edenai.run/v1/pretrained/vision";


    /**
     * Constructor
     *
     *Sets API key found <a href="https://app.edenai.run/admin/account" target="_blank">here</a>
     * @link https://app.edenai.run/admin/account
     *
     * @param key|string API key
     * @return void
     * 
    */
    public function __construct(String $key)
    {
        $this->key = $key;
    }


    /**
     * Explicit Content Detection
     *
     * Explicit Content Detection detects adult only content in videos, who is generally
     * inappropriate for people under the age of 18 and includes nudity, sexual activity and
     * pornography ...
     *
     * @param string $file full name of local file or pointer to open file
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft'])
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function explicitContentDetection(String $file, $providers = "['amazon']")
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }

        
        // die(print($base64));
        
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/explicit_content_detection");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            // "files"=> $base64 ?? "",
            'providers' => $providers
        ));

        $filename = explode('/', $file);
        $name = end($filename);

        $request->addUpload('files', $file, $name, '<Content-Type multipart/form-data>');
        
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                return $response->getBody();
            }
            else {
                return 'Unexpected HTTP status: ' . $response->getBody() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }


    /**
     * Face Detection
     *
     * Face Detection is a computer technology being used in a variety of applications that
     * identifies human faces in digital images.
     *
     * @param string $file full name of local file or pointer to open file
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft'])
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function faceDetection(String $file, $providers = "['amazon']")
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/face_detection");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            'providers' => $providers,
        ));

        
        $filename = explode('/', $file);
        $name = end($filename);

        $request->addUpload('files', $file, $name, '<Content-Type multipart/form-data>');

        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                return $response->getBody();
            }
            else {
                return 'Unexpected HTTP status: ' . $response->getBody() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    
    /**
     * Object Detection
     *
     * Object Detection is a computer vision technique that allows us to identify and locate objects
     * in an image or video
     *
     * @param string $file full name of local file or pointer to open file
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft'])
     * @param string $objects_to_find Object expected
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function objectDetection(String $file, $providers = "['amazon']", $objects_to_find = "")
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/object_detection");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            'providers' => $providers,
        ));

        
        $filename = explode('/', $file);
        $name = end($filename);

        $request->addUpload('files', $file, $name, '<Content-Type multipart/form-data>');

        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                return $response->getBody();
            }
            else {
                return 'Unexpected HTTP status: ' . $response->getBody() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}

?>
