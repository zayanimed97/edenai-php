<?php
    // require_once '../';

    use PHPUnit\Framework\TestCase;
    use EdenAI\Translation;

    class TranslationTest extends TestCase
    {

        private $key = "API_KEY";

        public function testAutomaticTranslation(): void
        {
            $text = new Translation($this->key);
            $analyse = "this can be analyzing text Unexpected HTTP status";
            $output = $text->automaticTranslation($analyse, 'en-US', 'fr-FR' ,['amazon']);
            $this->assertStringContainsString('result', $output);
        }

        public function testLanguageDetection(): void
        {
            $text = new Translation($this->key);
            $analyse = "this can be analyzing text Unexpected HTTP status";
            $output = $text->languageDetection($analyse, ['amazon']);
            $this->assertStringContainsString('result', $output);
        }
    }
?>
