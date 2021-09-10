<?php
    require_once 'mainTest.php';

    use EdenAI\Vision;

    class VisionTest extends MainTest
    {
        // protected $key = "API_KEY";

        // public function __construct()
        // {
        //     $this->key = parent::getAPIKey();
        // }

        public function testExplicitContentDetection(): void
        {
            $text = new Vision($this->APIkey);
            $output = $text->explicitContentDetection('./tests/test.jpg', ['amazon']);
            $this->assertStringContainsString('result', $output);
        }

        public function testFaceDetection(): void
        {
            $text = new Vision($this->APIkey);
            $output = $text->faceDetection('./tests/test.jpg', ['amazon']);
            $this->assertStringContainsString('result', $output);
        }

        public function testObjectDetection(): void
        {
            $text = new Vision($this->APIkey);
            $output = $text->objectDetection('./tests/test.jpg', ['amazon'], 'ball');
            $this->assertStringContainsString('result', $output);
        }
    }
?>
