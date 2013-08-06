<?php

namespace Keleo\CVGenerator;

// no autoloader in place, we use old-style includes ;-)
include_once __DIR__ . '/BaseVcObject.php';
include_once __DIR__ . '/Contact.php';
include_once __DIR__ . '/CurriculumVitae.php';
include_once __DIR__ . '/Experience.php';
include_once __DIR__ . '/Knowledge.php';
include_once __DIR__ . '/Portfolio.php';
include_once __DIR__ . '/Project.php';
include_once __DIR__ . '/Renderer.php';
include_once __DIR__ . '/Website.php';
include_once __DIR__ . '/Translation.php';
include_once __DIR__ . '/Education.php';
include_once __DIR__ . '/Skill.php';

class CmdLine
{

    const VERSION = '0.1';

    public function getAllProjects()
    {
        $all = array();
        foreach(glob(__DIR__ . '/../portfolio/*.php') as $filename) {
            $all[] = basename($filename);
        }
        return $all;
    }

    public function showCmdHeader()
    {
        echo PHP_EOL .
             'Portfolio generator v'.self::VERSION.' ≈ by Kevin Papst' .
             PHP_EOL .
             '-----------------------------------------' .
             PHP_EOL;
    }

    public function showCmdProjects()
    {
        $allProjects = $this->getAllProjects();

        echo PHP_EOL . 'Pass the project name as argument, possible values:' . PHP_EOL . '=> ';
        echo implode(PHP_EOL . '=> ', $allProjects) . PHP_EOL . PHP_EOL;
    }

    public function validateProjectName($projectName)
    {
        if (stripos($projectName, '.php') === false) {
            $projectName .= '.php';
        }
        $projectFile = __DIR__ . '/../portfolio/' . $projectName;
        if (!empty($projectName) && file_exists($projectFile)  && is_file($projectFile)) {
            return $projectFile;
        }

        return null;
    }

    public function renderProject($projectFile, $renderer = null)
    {
        // load config file ...
        $config = include $projectFile;
        //  ... configure the project ...
        $project = new \Keleo\CVGenerator\Portfolio($config);

        if ($renderer === null) {
            // ... and renderer all templates
            $project->renderAll();
        } else {
            // ... and renderer one templates
            $project->render($renderer);
        }
    }
}