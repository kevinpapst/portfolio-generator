<?php

namespace Keleo\CVGenerator;


class Translation
{
    const ENGLISH = 'en';
    const GERMAN = 'de';

    private $translation = array();
    private $language = null;

    public function __construct($language = null)
    {
        $this->translation = include 'language/en.php';
        $this->language = 'en';

        if ($language !== null && !empty($language) && $language != 'en') {
            $this->addLanguage($language);
        }
    }

    public function addLanguage($language)
    {
        $this->language = $language;
        $temp = include 'language/' . $language . '.php';
        $this->translation = array_merge($this->translation, $temp);
    }

    public function get($key)
    {
        if (!isset($this->translation[$key])) {
            return $key;
        }
        return $this->translation[$key];
    }

    public function __isset($key)
    {
        return isset($this->translation[$key]);
    }

    public function __get($key)
    {
        return $this->get($key);
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function toArray()
    {
        return $this->translation;
    }

}