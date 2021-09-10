<?php
    require_once 'mainTest.php';

    use EdenAI\Speech;

    class SpeechTest extends MainTest
    {
        // protected $key = "API_KEY";

        // public function __construct()
        // {
        //     // parent::__construct();
        //     $this->key = parent::getAPIKey();
        // }

        public function testSpeechRecognition(): void
        {
            $text = new Speech($this->APIkey);
            $analyse = "this can be analyzing text Unexpected HTTP status";
            $output = $text->speechRecognition('./tests/test.mp3', 'assistance', 'en-US' ,['amazon']);
            $this->assertStringContainsString('result', $output);
        }

        public function testTextToSpeech(): void
        {
            $text = new Speech($this->APIkey);
            $analyse = "this can be analyzing text Unexpected HTTP status";
            $output = $text->textToSpeech($analyse, 'en-US', 'FEMALE' ,['amazon']);
            $this->assertStringContainsString('result', $output);
        }
    }
?>
