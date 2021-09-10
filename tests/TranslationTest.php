<?php
    require_once 'mainTest.php';

    use EdenAI\Translation;

    class TranslationTest extends MainTest
    {
        // protected $key = "API_KEY";

        // public function __construct()
        // {
        //     $this->key = parent::getAPIKey();
        // }

        public function testAutomaticTranslation(): void
        {
            $text = new Translation($this->APIkey);
            $analyse = "this can be analyzing text Unexpected HTTP status";
            $output = $text->automaticTranslation($analyse, 'en-US', 'fr-FR' ,['amazon']);
            $this->assertStringContainsString('result', $output);
        }

        public function testLanguageDetection(): void
        {
            $text = new Translation($this->APIkey);
            $analyse = "this can be analyzing text Unexpected HTTP status";
            $output = $text->languageDetection($analyse, ['amazon']);
            $this->assertStringContainsString('result', $output);
        }
    }
?>
