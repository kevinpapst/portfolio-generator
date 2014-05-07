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
     * @var Reference
     */
    private $reference = null;

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

    /**
     * @param \Keleo\CVGenerator\Reference $reference
     */
    public function setReference($reference)
    {
        if (is_array($reference)) {
            $ref = new Reference();
            $ref->setTitle($reference['title']);
            $ref->setUrl($reference['url']);
            $this->reference = $ref;
            return;
        }

        $this->reference = $reference;
    }

    /**
     * @return \Keleo\CVGenerator\Reference
     */
    public function getReference($noneEmpty = false)
    {
        if ($noneEmpty && $this->reference === null) {
            return new Reference();
        }
        return $this->reference;
    }

}