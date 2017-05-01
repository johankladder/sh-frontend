<?php

use AppBundle\helpers\YamlExtractor;

class YamlExtractorTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $yamlExtractor;

    protected function _before()
    {
        $this->yamlExtractor = new YamlExtractor();
    }

    public function testExtractionHappyFlow()
    {
        // Begin extraction:
        $content = $this->yamlExtractor->extractFile(codecept_data_dir()
        . '/test_files/lang.yaml');

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
        $this->assertNull($this->yamlExtractor->extractFile(codecept_data_dir()
        . '/test_files/not-exists.csv'));
    }
}
