<?php

namespace Keleo\CVGenerator;

class Knowledge extends BaseVcObject
{
    /**
     * @var int
     */
    private $duration = null;
    /**
     * @var string
     */
    private $title = '';
    /**
     * @var string
     */
    private $teaser = '';
    /**
     * @var string
     */
    private $content = '';

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

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
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

}