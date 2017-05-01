<?php

namespace AppBundle\helpers;

use Symfony\Component\Yaml\Yaml;

class YamlExtractor
{

    /**
     * Extracts an YAML file.
     * @param  string $fileDir The location of the file
     * @return mixed[]         YAML file parsed into an array.
     */
    public function extractFile(string $fileDir)
    {
        if(file_exists($fileDir))
          return Yaml::parse(file_get_contents($fileDir));
        return null;
    }

}
