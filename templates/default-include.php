<?php

use \Keleo\CVGenerator\Website;

/* @var $translation \Keleo\CVGenerator\Translation */
/* @var $vita \Keleo\CVGenerator\CurriculumVitae */
/* @var $website \Keleo\CVGenerator\Website */
/* @var $education \Keleo\CVGenerator\Education */
/* @var $experience \Keleo\CVGenerator\Experience */
/* @var $knowledge \Keleo\CVGenerator\Knowledge */
/* @var $skill \Keleo\CVGenerator\Skill */
/* @var $project \Keleo\CVGenerator\Project */

$contact        = $vita->getContact();
$experiences    = $vita->getExperiences();
$educations     = $vita->getEducations();
$knowledges     = $vita->getKnowledges();
$skills         = $vita->getSkills();
$projects       = $vita->getProjects();
$websites       = $contact->getWebsites(
    array(Website::TWITTER,Website::FACEBOOK,Website::XING,Website::GOOGLE_PLUS,Website::LINKED_IN)
);

/* FIXME implement me */
$works          = array();
