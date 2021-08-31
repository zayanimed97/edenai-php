<?php

namespace EdenAI;

use HTTP_Request2 as HTTP_Request2;

class OCR{
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
    private $endpoint = "https://api.edenai.run/v1/pretrained/ocr";


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
     * OCR Invoice
     *
     * The OCR Invoice API enables customers to take invoices in a variety of formats and return
     * structured data to automate the invoice processing.
     *
     * @param string $file full name of local file or pointer to open file
     * @param string $language Language code of invoice
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft'])
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function OCRInvoice(String $file,$language = "en-US", $providers = "['amazon']")
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }

        
        // die(print($base64));
        
        $request = new HTTP_Request2();
        $request->setUrl("{$this->endpoint}/ocr_invoice");
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
            'language' => $language
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
     * OCR
     *
     * Optical Character Recognition or optical character reader (OCR) is the electronic or
     * mechanical conversion of images of typed, handwritten or printed text into machine-encoded
     * text, whether from a scanned document, a photo of a document.
     *
     * @param string $file full name of local file or pointer to open file
     * @param string $language Language codec expected
     * @param string $text_reference Text expected
     * @param string|array $providers Provider to compare (ex: [ 'amazon', 'microsoft'])
     *
     * @return Response JSON containing results from every provider
     * @throws Exception
     */
    public function OCR(String $file, $language="en-US", $text_reference = "" ,$providers = "['amazon']")
    {
        if (empty($providers)) {
            $providers = "[]";
        }
        if (gettype($providers) == "array") {
            $providers = json_encode($providers);
        }
        $request = new HTTP_Request2();
        $request->setUrl("https://api.edenai.run/v1/pretrained/vision/ocr");
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Bearer '.$this->key
        ));
        $request->addPostParameter(array(
            'providers' => $providers,
            'language' => $language,
            'text_reference' => $text_reference
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
