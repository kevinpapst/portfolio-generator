<?php

namespace Keleo\CVGenerator;

class Website extends BaseVcObject
{
    const TWITTER       = 'twitter';
    const GOOGLE_PLUS   = 'google-plus';
    const GITHUB        = 'github';
    const BUSINESS      = 'business';
    const HOMEPAGE      = 'homepage';
    const BLOG          = 'blog';
    const XING          = 'xing';
    const LINKED_IN     = 'linkedin';
    const ABOUT_ME      = 'aboutme';
    const FACEBOOK      = 'facebook';

    /**
     * @var string
     */
    private $type = '';
    /**
     * @var string
     */
    private $title = '';
    /**
     * @var string
     */
    private $url = '';

    public function isType($type)
    {
        return (strtolower($this->getType()) == strtolower($type));
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

}