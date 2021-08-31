<?php

namespace EdenAI;

use HTTP_Request2 as HTTP_Request2;

class Text{
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
     * Keyword Extraction
     *
     *Keyword extraction (also known as keyword detection or keyword analysis)
     *is a text analysis technique that consists of automatically 
     *extracting the most important words and expressions in a text.
     *
     * @param string $text Text to analyze
     * @param string|array $keywords_to_find Keyword expected
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft', 'ibm','google', 'Lettria'])
     * @param string $language Language of the text (en-US, fr-FR, es-ES)
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function keywordExtraction(String $text,$keywords_to_find = "[]", $providers = "['amazon']", String $language = "en-US")
    {
        if (empty($keywords_to_find)) {
            $keywords_to_find = "[]";
        }
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($keywords_to_find) == "array") {
            $keywords_to_find = json_encode($keywords_to_find);
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/keyword_extraction");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            "keywords_to_find"=> $keywords_to_find ?? "[]",
            'text' => $text,
            'providers' => $providers,
            'language' => $language
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
     * Named Entity Recognition
     *
     *Named Entity Recognition (also called entity identification or entity extraction) is an
     *information extraction technique that automatically identifies named entities in a text and
     *classifies them into predefined categories.
     *
     * @param string $text Text to analyze
     * @param string|array $entities_to_find Entities expected
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft', 'ibm','google', 'Lettria'])
     * @param string $language Language of the text (en-US, fr-FR, es-ES)
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function namedEntityRecognition(String $text,$entities_to_find = "[]", $providers = "['amazon']", String $language = "en-US")
    {
        if (empty($entities_to_find)) {
            $entities_to_find = "[]";
        }
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($entities_to_find) == "array") {
            $entities_to_find = json_encode($entities_to_find);
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/named_entity_recognition");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            "entities_to_find"=> $entities_to_find ?? "[]",
            'text' => $text,
            'providers' => $providers,
            'language' => $language
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
     * Sentiment Analysis
     *
     *Sentiment analysis API extracts sentiment in a given string of text. Sentiment analysis, also
     *called 'opinion mining', uses natural language processing, text analysis and computational
     *linguistics to identify and detect subjective information from the input text.
     *
     * @param string $text Text to analyze
     * @param string|array $sentiments_to_find Sentiment expected
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft', 'ibm','google', 'Lettria'])
     * @param string $language Language of the text (en-US, fr-FR, es-ES)
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */


    public function sentimentAnalysis($text,$sentiments_to_find = "[]", $providers = "['amazon']", $language = "en-US")
    {
        if (empty($sentiments_to_find)) {
            $sentiments_to_find = "[]";
        }
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($sentiments_to_find) == "array") {
            $sentiments_to_find = json_encode($sentiments_to_find);
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/sentiment_analysis");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            "sentiments_to_find"=> $sentiments_to_find ?? "[]",
            'text' => $text,
            'providers' => $providers,
            'language' => $language
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
     * Syntax Analysis
     *
     *Syntax analysis consists principaly in highlighting the structure of a text.
     *
     * @param string $text Text to analyze
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft', 'ibm','google', 'Lettria'])
     * @param string $language Language of the text (en-US, fr-FR, es-ES)
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */


    public function syntaxAnalysis(String $text, $providers = "['amazon']", String $language = "en-US")
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/syntax_analysis");
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
            'language' => $language
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
