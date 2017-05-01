<?php

namespace AppBundle\Modules;

use AppBundle\helpers\YamlExtractor;

class LanguageModule
{
    // The default language of the application is 'en' -> English
    const DEFAULT_LANG = 'en';

    // Static storage for the language that is used for the values
    static $langValues;

    // Static storage of the currentLang that is used
    static $currentLang;

    /**
     * Method for obtaining the language value of an given language key.
     * Please check the docs/languages/howto file to read about these language
     * files and how they are loaded.
     *
     * @param  string $langKey  The key liked to recieve the language-value from
     * @return string           Language value that was found or the given langKey
     *                          when value could'nt be obtained.
     */
    public function getValue(string $langKey)
    {
        return $this->getLanguageValue($langKey);
    }

    /**
     * Sets the language. After that it will reset all previous language specific
     * entries.
     * @param string $language    The language like to set.
     */
    public static function setLang(string $language)
    {
        self::$currentLang = $language;

        // reset langvalues:
        self::$langValues = null;
    }

    private static function getLanguageValue(string $langKey)
    {
        if(empty(self::$langValues))
          self::loadLangFiles();
        return self::obtainValueFromLangValues($langKey);
    }

    private static function obtainValueFromLangValues(string $langKey)
    {
        if(array_key_exists($langKey, self::$langValues))
          return self::$langValues[$langKey];
        return $langKey;
    }

    private static function loadLangFiles()
    {
        if(!self::$currentLang)
          self::$currentLang = self::DEFAULT_LANG;
        $yamlExtractor  = new YamlExtractor();
        $path = self::$currentLang . '_lang.yml';
        self::$langValues = $yamlExtractor->extractFile(__DIR__ . '/../../local/' .$path);
    }
}
