<?php
    require_once 'mainTest.php';

    use EdenAI\OCR;

    class OCRTest extends MainTest
    {
        // protected $key = "API_KEY";

        // public function __construct()
        // {
        //     $this->key = parent::getAPIKey();
        // }

        public function testOCRInvoice(): void
        {
            $text = new OCR($this->APIkey);
            $output = $text->OCRInvoice('./tests/test.jpg', 'en-US' ,['microsoft']);
            $this->assertStringContainsString('result', $output);
        }

        public function testOCR(): void
        {
            $text = new OCR($this->APIkey);
            $output = $text->OCR('./tests/test.jpg', 'en-US', ['microsoft']);
            $this->assertStringContainsString('result', $output);
        }
    }
?>
