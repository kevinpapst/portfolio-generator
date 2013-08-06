<?php

// set the current working directory to make sure includes work properly
chdir(__DIR__);

// no autoloader yet, we use old-style includes ;-)
include_once 'classes/CmdLine.php';

// the command line client for the portfolio generator
$cmdLine = new \Keleo\CVGenerator\CmdLine();

// show command line header
$cmdLine->showCmdHeader();

// =============== validate command-line parameter ===============
if (isset($argv) && count($argv) > 1) {
    $projectName = $cmdLine->validateProjectName($argv[1]);
    if ($projectName === null) {
        echo PHP_EOL . '[ERROR] Project can not be found: ' . $argv[1] . PHP_EOL;
        $cmdLine->showCmdProjects();
        exit -1;
    }
} else {
    $cmdLine->showCmdProjects();
    exit -1;
}

$renderer = isset($argv[2]) ? $argv[2] : null;

// render the project
$cmdLine->renderProject($projectName, $renderer);
// display success message
echo PHP_EOL . 'Rendered project "'.$argv[1].'". Please check your output folder :)' . PHP_EOL . PHP_EOL;
