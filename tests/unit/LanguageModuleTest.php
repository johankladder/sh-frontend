<?php

use AppBundle\Modules\LanguageModule;

class LanguageModuleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $languageModule;

    protected function _before()
    {
        $this->languageModule = new LanguageModule();
    }

    public function testExtractionHappyFlow()
    {
        // Load the test language file:
        $this->assertTrue(
          $this->languageModule
          ->setup(codecept_data_dir() . '/test_files/lang.yaml'));

        // Begin extraction:
        $content = $this->languageModule->extract();

        // Check keys:
        $this->assertTrue(array_key_exists('key1', $content));
        $this->assertTrue(array_key_exists('key2', $content));
        $this->assertTrue(array_key_exists('key3', $content));
        $this->assertEquals(3, count($content));

        // Check content-values:
        $this->assertTrue(!strcmp('value1', $content['key1']['value']));
        $this->assertTrue(!strcmp('value2', $content['key2']['value']));
        $this->assertTrue(!strcmp('value3', $content['key3']['value']));

    }

    public function testFileNotExists()
    {
        // Load the test language file:
        $this->assertFalse(
          $this->languageModule
          ->setup(codecept_data_dir() . '/test_files/not-exists.csv'));

        $this->assertNull($this->languageModule->extract());
    }
}
