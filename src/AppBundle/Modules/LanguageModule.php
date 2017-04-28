<?php

namespace AppBundle\Modules;

use Symfony\Component\Yaml\Yaml;

class LanguageModule
{

    private $fileDir;

    private static $content;

    public function setup($fileDir)
    {
        if(!file_exists($fileDir))
            return false;
        $this->fileDir = $fileDir;
        return true;
    }

    public function extract()
    {
        if(!$this->fileDir)
          return null;
        return $this->extractFile($this->fileDir);
    }

    private function extractFile($fileDir)
    {
        self::$content =  Yaml::parse(file_get_contents($fileDir));
        return self::$content;
    }

    public static function getValue($key)
    {
        return self::$content[$key]['value'];
    }

}
