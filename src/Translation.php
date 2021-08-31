<?php

namespace EdenAI;

use HTTP_Request2 as HTTP_Request2;

class Translation{
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
    private $endpoint = "https://api.edenai.run/v1/pretrained/text";


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
     * Automatic Translation
     *
     *Machine translation refers to the translation of a text into another language using rules,
     *statics or ml technics.
     *
     * @param string $text Text to analyze
     * @param array $source_language Language to translate from
     * @param string $target_language Language to translate to
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft'])
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function automaticTranslation(String $text,$source_language, $target_language, $providers = "['amazon']")
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/automatic_translation");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            "text_to_translate"=> $text ?? "[]",
            'source_language' => $source_language,
            'target_language' => $target_language,
            'providers' => $providers
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


    /**
     * Language Detection
     *
     *Language Detection or language guessing is the algorithm of determining which natural
     *language given content is in.
     *
     * @param string $text Text to analyze
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft', 'ibm','google', 'Lettria'])
     * @param string $languages_to_find Language to look for
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function languageDetection(String $text, $providers = "['amazon']",$languages_to_find = "")
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/language_detection");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            "languages_to_find"=> $languages_to_find,
            'text' => $text,
            'providers' => $providers,
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
