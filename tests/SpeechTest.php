<?php
    // require_once '../';

    use PHPUnit\Framework\TestCase;
    use EdenAI\Speech;

    class SpeechTest extends TestCase
    {

        private $key = "API_KEY";

        public function testSpeechRecognition(): void
        {
            $text = new Speech($this->key);
            $analyse = "this can be analyzing text Unexpected HTTP status";
            $output = $text->speechRecognition('./tests/test.mp3', 'assistance', 'en-US' ,['amazon']);
            $this->assertStringContainsString('result', $output);
        }

        public function testTextToSpeech(): void
        {
            $text = new Speech($this->key);
            $analyse = "this can be analyzing text Unexpected HTTP status";
            $output = $text->textToSpeech($analyse, 'en-US', 'FEMALE' ,['amazon']);
            $this->assertStringContainsString('result', $output);
        }
    }
?>
