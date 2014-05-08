<?php

namespace Keleo\CVGenerator;

class Skill extends BaseVcObject
{
    /**
     * @var string
     */
    private $title = '';
    /**
     * @var array
     */
    private $entries = array();

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param array(String) $entries
     */
    public function setEntries($entries)
    {
        $this->entries = $entries;
    }

    /**
     * @return array
     */
    public function getEntries()
    {
        return $this->entries;
    }

    public function __isset($key)
    {
        // this nasty workaround is required as tinyButStrong cannot work with getEntries() in a subblock
        if ($key == 'entries') {
            return true;
        }
        return false;
    }

    public function __get($key)
    {
        // this nasty workaround is required as tinyButStrong cannot work with getEntries() in a subblock
        if ($key == 'entries') {
            return $this->entries;
        }
        return null;
    }
}