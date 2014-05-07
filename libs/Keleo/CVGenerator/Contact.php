<?php

namespace Keleo\CVGenerator;

class Contact extends BaseVcObject
{
    /**
     * @var string
     */
    private $name = '';
    /**
     * @var string
     */
    private $teaser = '';
    /**
     * @var string
     */
    private $address = '';
    /**
     * @var string
     */
    private $phone = '';
    /**
     * @var string
     */
    private $email = '';
    /**
     * @var string
     */
    private $photo = null;
    /**
     * @var array(Website)
     */
    private $websites = array();

    public function __set($key, $value)
    {
        switch($key) {
            case 'websites':
                $this->setWebsitesFromConfig($value);
                break;
            default:
                $this->$key = $value;
                break;
        }
    }

    protected function setWebsitesFromConfig($config)
    {
        foreach($config as $entry) {
            $this->websites[] = new Website($entry);
        }
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
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

    /**
     * @return array(Website)
     */
    public function getWebsites($filter = null)
    {
        if ($filter === null || empty($filter)) {
            return $this->websites;
        }

        $all = array();
        /* @var $website Website */
        foreach($this->websites as $website) {
            //echo "Check " . $website->getUrl();
            //var_dump($filter);exit;
            $foundType = false;
            foreach($filter as $type) {
                if ($foundType = $website->isType($type)) {
                    break;
                }
            }

            if (!$foundType) {
                $all[] = $website;
            }
        }

        return $all;
    }

    /**
     * @param $type
     * @return Website|null
     */
    public function getWebsitesByType($types = array())
    {
        $all = array();

        foreach($types as $type) {
            $temp = $this->getWebsiteByType($type);
            if ($temp !== null) {
                $all[] = $temp;
            }
        }

        return $all;
    }


    /**
     * @param $type
     * @return Website|null
     */
    public function getWebsiteByType($type)
    {
        /* @var $website Website */
        foreach($this->websites as $website) {
            if ($website->isType($type)) {
                return $website;
            }
        }

        return null;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

}