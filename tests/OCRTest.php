<?php
    // require_once '../';

    use PHPUnit\Framework\TestCase;
    use EdenAI\OCR;

    class OCRTest extends TestCase
    {
        private $key = "API_KEY";

        public function testOCRInvoice(): void
        {
            $text = new OCR($this->key);
            $output = $text->OCRInvoice('./tests/test.jpg', 'en-US' ,['microsoft']);
            $this->assertStringContainsString('result', $output);
        }

        public function testOCR(): void
        {
            $text = new OCR($this->key);
            $output = $text->OCR('./tests/test.jpg', 'en-US', ['microsoft']);
            $this->assertStringContainsString('result', $output);
        }
    }
?>
