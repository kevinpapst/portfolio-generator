<?php

use \Keleo\CVGenerator\Website;

include __DIR__ . '/../../default-include.php';

?><!DOCTYPE html>
<html lang="en">	
<head>
    <meta charset="utf-8">
    <title><?php echo $contact->getName() ?> - <?php echo $contact->getTeaser() ?></title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="print.css" media="print" />
    <!--[if IE 6]>
        <script src="js/ie6-transparency.js"></script>
        <script>
            DD_belatedPNG.fix('#wrap .line, #header #header-photo');
        </script>
        <link rel="stylesheet" href="styles/ie6.css" />
    <![endif]-->
    <!--[if IE 7]>
        <link rel="stylesheet" href="styles/ie7.css" />
    <![endif]-->
    <!--[if IE 8]>
        <link rel="stylesheet" href="styles/ie8.css" />
    <![endif]-->
    <!--[if IE 9]>
        <link rel="stylesheet" href="styles/ie9.css" />
    <![endif]-->
</head>
<body>
    <div id="wrap">

        <div id="header">
            <div id="header-content">
                <h1><?php echo $contact->getName() ?></h1>
                <h2><?php echo $contact->getTeaser() ?></h2>
                <p><?php echo $vita->getAbout() ?></p>

                <div id="contact-details">
                    <p class="contact"><span>Email: </span><?php echo $contact->getEmail() ?></p>
                    <p class="contact"><span>Phone: </span><?php echo $contact->getPhone() ?></p>
                    <?php
                    if (count($websites) > 0) {
                        foreach($websites as $website)
                        {
                            ?>
                            <p class="contact"><span>Website: </span><a href="<?php echo $website->getUrl() ?>" target="_blank"><?php echo ($website->getTitle() != '') ? $website->getTitle() : $website->getUrl() ?></a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div id="header-photo">
                <img src="<?php echo (($contact->getPhoto() !== null) ? $contact->getPhoto() : 'images/placeholder.png'); ?>" />
            </div>
        </div>

        <div class="line"></div>

        <div id="content">

            <div id="education" class="cv-section">
                <h3><?php echo $translation->get('Education') ?></h3>
                <?php foreach($educations as $education) { ?>
                    <div class="cv-section-item">
                        <h4 class="title"><?php echo $education->getDegree() ?></h4>
                        <h4 class="meta"><?php echo $education->getSchool() ?> / <?php echo $education->getStart() ?> - <?php echo $education->getEnd() ?></h4>
                    </div>
                <?php } ?>
            </div>

            <div class="line"></div>

            <div id="experience" class="cv-section">
                <h3><?php echo $translation->get('Experience') ?></h3>
                <?php foreach($experiences as $experience) { ?>
                    <div class="cv-section-item">
                        <h4 class="title"><?php echo $experience->getTitle() ?></h4>
                        <h4 class="meta"><?php echo $experience->getTeaser() ?> / <?php echo $experience->getStart() ?> - <?php echo $experience->getEnd() ?></h4>
                        <p><?php echo $experience->getContent() ?></p>
                    </div>
                <?php } ?>
            </div>

            <div class="line"></div>

            <div id="expertise" class="cv-section">
                <h3><?php echo $translation->get('Expertise') ?></h3>
                <?php foreach($knowledges as $knowledge) { ?>
                    <div class="cv-section-item">
                        <h4 class="title"><?php echo $knowledge->getTitle() ?></h4>
                        <h4 class="meta"><?php echo $translation->get('Experience Level') ?>: <?php echo $knowledge->getDuration() ?> <?php echo $translation->get('Years') ?></h4>
                        <p><?php echo $knowledge->getContent() ?></p>
                    </div>
                <?php } ?>
            </div>

            <div class="line"></div>

            <div id="experience" class="cv-section">
                <h3><?php echo $translation->get('Projects') ?></h3>
                <?php foreach($projects as $project) { ?>
                    <div class="cv-section-item">
                        <h4 class="title"><?php echo $project->getTitle() ?></h4>
                        <h4 class="meta"><?php echo $project->getDuration() ?>, <?php echo $project->getPosition() ?></h4>
                        <p><?php echo $project->getDescription() ?></p>
                        <p><?php echo $translation->get('Technologies') ?>: <?php echo $project->getTechnology() ?></p>
                    </div>
                <?php } ?>
            </div>

            <?php if (count($skills) > 0) { ?>
                <div class="line"></div>

                <div id="knowledge" class="cv-section">
                    <h3><?php echo $translation->get('Knowledge') ?></h3>
                    <?php foreach($skills as $skill) { ?>
                        <div class="content">
                            <h4 class="meta"><?php echo $skill->getTitle() ?></h4>
                            <ul class="skills">
                                <li><?php echo implode('</li><li>', $skill->getEntries()) ?></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (count($works) > 0) { ?>
            <div class="line"></div>

            <div id="works" class="cv-section">
                <h3><?php echo $translation->get('Works') ?></h3>
                <ul class="works">
                    <li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                    <li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                    <li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                    <li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                    <li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                    <li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                    <li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                    <li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                </ul>
            </div>
            <?php } ?>

        </div><!--end content-->

        <div class="clear"></div>

    </div><!--end wrap-->
    <div id="spacing"></div><!--hack for ie6 and ie7-->
</body>
</html>