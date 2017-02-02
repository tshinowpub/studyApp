<?php

namespace StudyApp\CoreBundle\Gnavi\Config;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class ApiConfig {

    private $keyId;

    public function init()
    {
        try {
            $config = Yaml::parse(file_get_contents(__DIR__ . '/../../Resources/config/gnavi.yml'));
            if(isset($config['gnavi']['keyid'])) {
                $this->setKeyId($config['gnavi']['keyid']);
            }
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }

    private function setKeyId($keyId)
    {
        $this->keyId = $keyId;

        return $this;
    }

    public function getKeyId()
    {
        return $this->keyId;
    }

}
