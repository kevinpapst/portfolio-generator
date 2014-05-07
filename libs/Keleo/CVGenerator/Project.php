<?php

namespace Keleo\CVGenerator;

class Project extends BaseVcObject
{
    /**
     * @var string
     */
    private $title = '';
    /**
     * @var string
     */
    private $description = '';
    /**
     * @var string
     */
    private $duration = '';
    /**
     * @var string
     */
    private $position = '';
    /**
     * @var string
     */
    private $technology = '';

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param string $technology
     */
    public function setTechnology($technology)
    {
        $this->technology = $technology;
    }

    /**
     * @return string
     */
    public function getTechnology()
    {
        return $this->technology;
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



}