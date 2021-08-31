<?php
    // require_once '../';

    use PHPUnit\Framework\TestCase;
    use EdenAI\Vision;

    class TranslationTest extends TestCase
    {

        private $key = "API_KEY";

        public function testExplicitContentDetection(): void
        {
            $text = new Vision($this->key);
            $output = $text->explicitContentDetection('./tests/test.jpg', ['amazon']);
            $this->assertStringContainsString('result', $output);
        }

        public function testFaceDetection(): void
        {
            $text = new Vision($this->key);
            $output = $text->faceDetection('./tests/test.jpg', ['amazon']);
            $this->assertStringContainsString('result', $output);
        }

        public function testObjectDetection(): void
        {
            $text = new Vision($this->key);
            $output = $text->objectDetection('./tests/test.jpg', ['amazon'], 'ball');
            $this->assertStringContainsString('result', $output);
        }
    }
?>
