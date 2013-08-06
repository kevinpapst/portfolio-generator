<?php

namespace Keleo\CVGenerator;


class Translation
{

    private $translation = array();

    public function __construct($language = null)
    {
        $this->translation = include 'language/en.php';
        if ($language !== null && $language != 'en') {
            $temp = include 'language/' . $language . '.php';
            $this->translation = array_merge($this->translation, $temp);
        }
    }

    public function get($key)
    {
        if (!isset($this->translation[$key])) {
            return $key;
        }
        return $this->translation[$key];
    }

    public function __get($key)
    {
        return $this->get($key);
    }
}