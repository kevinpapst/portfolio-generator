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
     * @param array $entries
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

}