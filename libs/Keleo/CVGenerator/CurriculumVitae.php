<?php

namespace Keleo\CVGenerator;

class CurriculumVitae extends BaseVcObject
{
    /**
     * @var Contact
     */
    private $contact = null;
    /**
     * @var string
     */
    private $about = '';
    /**
     * @var array(Experience)
     */
    private $experiences = array();
    /**
     * @var array(Knowledge)
     */
    private $knowledges = array();
    /**
     * @var array(Education)
     */
    private $educations = array();
    /**
     * @var array(Skill)
     */
    private $skills = array();
    /**
     * @var array(Project)
     */
    private $projects = array();


    public function __set($key, $value)
    {
        switch($key) {
            case 'contact':
                $this->contact = new Contact($value);
                break;
            case 'experience':
            case 'experiences':
                $this->setExperiencesFromConfig($value);
                break;
            case 'knowledge':
            case 'knowledges':
                $this->setKnowledgesFromConfig($value);
                break;
            case 'education':
            case 'educations':
                $this->setEducationsFromConfig($value);
                break;
            case 'skill':
            case 'skills':
                $this->setSkillsFromConfig($value);
                break;
            case 'project':
            case 'projects':
                $this->setProjectsFromConfig($value);
                break;
            default:
                $this->$key = $value;
                break;
        }
    }

    protected function setProjectsFromConfig($config)
    {
        foreach($config as $entry) {
            $this->projects[] = new Project($entry);
        }
    }

    protected function setSkillsFromConfig($config)
    {
        foreach($config as $entry) {
            $this->skills[] = new Skill($entry);
        }
    }

    protected function setExperiencesFromConfig($config)
    {
        foreach($config as $entry) {
            $this->experiences[] = new Experience($entry);
        }
    }

    protected function setEducationsFromConfig($config)
    {
        foreach($config as $entry) {
            $this->educations[] = new Education($entry);
        }
    }

    protected function setKnowledgesFromConfig($config)
    {
        foreach($config as $entry) {
            $this->knowledges[] = new Knowledge($entry);
        }
    }

    /**
     * @return array(Experience)
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * @return array(Knowledge)
     */
    public function getKnowledges()
    {
        return $this->knowledges;
    }

    /**
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @return \Keleo\CVGenerator\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return array(Education)
     */
    public function getEducations()
    {
        return $this->educations;
    }

    /**
     * @return array(Skill)
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @return array(Project)
     */
    public function getProjects()
    {
        return $this->projects;
    }

}