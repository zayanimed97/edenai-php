<?php

namespace EdenAI;

use HTTP_Request2 as HTTP_Request2;

class Speech{
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
    private $endpoint = "https://api.edenai.run/v1/pretrained/audio";


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
     * Speech Recognition
     *
     * Speech recognition is technology that can recognize spoken words, which can then be
     * converted to text.
     *
     * @param string $file full name of local file or pointer to open file
     * @param string $text_to_find Text expected
     * @param string $language Language code of invoice
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft'])
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function speechRecognition(String $file, $text_to_find = "",$language = "en-US", $providers = "['amazon']",$fake_call = false)
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }

        
        // die(print($base64));
        
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/speech_recognition");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            // "files"=> $base64 ?? "",
            'providers' => $providers,
            'language' => $language,
            'text_to_find' => $text_to_find,
            'fake_call' => $fake_call
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
     * Text To Speech
     *
     * Text-to-speech (TTS) system converts normal language text into speech.
     *
     * @param string $text Text to transform
     * @param string $language Language codec expected
     * @param string $option Voice gender selected (ex: FEMALE ou MALE)
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft'])
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function textToSpeech(String $text, $language="en-US", $option = "FEMALE" ,$providers = "['amazon']", $fake_call = false)
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/text_to_speech");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            'text' => $text,
            'providers' => $providers,
            'language' => $language,
            'option' => $option,
            'fake_call' => $fake_call
        ));

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
