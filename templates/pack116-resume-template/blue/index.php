<?php

use \Keleo\CVGenerator\Website;

include __DIR__ . '/../../default-include.php';

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $contact->getName() ?> - <?php echo $contact->getTeaser() ?></title>
<link type="text/css" rel="stylesheet" href="css/blue.css" />
<link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/cufon.yui.js"></script>
<script type="text/javascript" src="js/scrollTo.js"></script>
<script type="text/javascript" src="js/myriad.js"></script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
		//Cufon.replace('h1,h2');
</script>
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <!-- Begin Image -->
          <img class="portrait" src="<?php echo (($contact->getPhoto() !== null) ? $contact->getPhoto() : 'images/image.jpg'); ?>" alt="<?php echo $contact->getName() ?>" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 class="name"><?php echo $contact->getName() ?><br />
              <span><?php echo $contact->getTeaser() ?></span></h1>
            <ul>
              <li class="ad"><?php echo $contact->getAddress() ?></li>
              <li class="mail"><?php echo $contact->getEmail() ?></li>
              <li class="tel"><?php echo $contact->getPhone() ?></li>
              <?php
                if (count($websites) > 0) {
                    foreach($websites as $website)
                    {
                        ?>
                        <li class="web"><a href="<?php echo $website->getUrl() ?>" target="_blank"><?php echo ($website->getTitle() != '') ? $website->getTitle() : $website->getUrl() ?></a></li>
                    <?php
                    }
                }
                ?>
            </ul>
          </div>
          <!-- End Personal Information -->

          <!-- Begin Social -->
          <?php
            $twitter  = $contact->getWebsiteByType(Website::TWITTER);
            $facebook = $contact->getWebsiteByType(Website::FACEBOOK);
            $xing     = $contact->getWebsiteByType(Website::XING);
            $linkedin = $contact->getWebsiteByType(Website::LINKED_IN);
            $gplus    = $contact->getWebsiteByType(Website::GOOGLE_PLUS);
          ?>
          <div class="social">
            <ul>
              <li><a class='north' href="#" title="Download .pdf"><img src="images/icn-save.jpg" alt="Download the pdf version" /></a></li>
              <li><a class='north' href="javascript:window.print()" title="Print"><img src="images/icn-print.jpg" alt="" /></a></li>
              <?php /* <li><a class='north' id="contact" href="contact/index.html" title="Contact Me"><img src="images/icn-contact.jpg" alt="" /></a></li> */ ?>
              <?php if($twitter !== null) { ?><li><a class='north' href="<?php echo $twitter->getUrl() ?>" title="<?php echo $twitter->getTitle() ?>"><img src="images/icn-twitter.jpg" alt="" /></a></li><?php } ?>
              <?php if($facebook !== null) { ?><li><a class='north' href="<?php echo $facebook->getUrl() ?>" title="<?php echo $facebook->getTitle() ?>"><img src="images/icn-facebook.jpg" alt="" /></a></li><?php } ?>
            </ul>
          </div>
          <!-- End Social -->

        </div>
        <!-- Begin 1st Row -->
        <div class="entry">
          <h2><?php echo $translation->get('About') ?></h2>
          <p><?php echo $vita->getAbout() ?></p>
        </div>
        <!-- End 1st Row -->

        <!-- Begin 2nd Row -->
        <div class="entry">
          <h2><?php echo $translation->get('Education') ?></h2>
            <?php foreach($educations as $education) { ?>
          <div class="content">
            <h3><?php echo $education->getStart() ?> - <?php echo $education->getEnd() ?></h3>
            <p><?php echo $education->getDegree() ?><br />
              <em><?php echo $education->getSchool() ?></em></p>
          </div>
            <?php } ?>
        </div>
        <!-- End 2nd Row -->

        <!-- Begin 3rd Row -->
        <div class="entry">
          <h2><?php echo $translation->get('Experience') ?></h2>
          <?php foreach($experiences as $experience) { ?>
          <div class="content">
            <h3><?php echo $experience->getStart() ?> - <?php echo $experience->getEnd() ?></h3>
            <p><?php echo $experience->getTitle() ?><br />
              <em><?php echo $experience->getTeaser() ?></em></p>
              <div><?php echo $experience->getContent() ?></div>
          </div>
          <?php } ?>
        </div>
        <!-- End 3rd Row -->

        <!-- Begin 4rd Row -->
        <div class="entry">
          <h2><?php echo $translation->get('Expertise') ?></h2>
          <?php foreach($knowledges as $knowledge) { ?>
              <div class="content">
                  <h3><?php echo $knowledge->getDuration() ?> <?php echo $translation->get('Years') ?></h3>
                  <p><?php echo $knowledge->getTitle() ?><br />
                      <em><?php echo $knowledge->getTeaser() ?></em></p>
                  <div><?php echo $knowledge->getContent() ?></div>
              </div>
          <?php } ?>
        </div>
        <!-- End 4rd Row -->

        <!-- Begin [SKILLS] -->
        <?php if (count($skills) > 0) { ?>
        <div class="entry">
          <h2><?php echo $translation->get('Knowledge') ?></h2>
          <?php foreach($skills as $skill) { ?>
          <div class="content">
            <h3><?php echo $skill->getTitle() ?></h3>
            <ul class="skills">
              <li><?php echo implode('</li><li>', $skill->getEntries()) ?></li>
            </ul>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        <!-- End [SKILLS] -->

        <!-- Begin [WORKS] -->
        <?php if (count($works) > 0) { ?>
        <div class="entry">
        <h2><?php echo $translation->get('Works') ?></h2>
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
        <!-- End [WORKS] -->

      </div>
      <div class="clear"></div>
      <div class="paper-bottom"></div>
    </div>
    <!-- End Paper -->
  </div>
  <div class="wrapper-bottom"></div>
</div>
<div id="message"><a href="#top" id="top-link"><?php echo $translation->get('Go to Top') ?></a></div>
<!-- End Wrapper -->
</body>
</html>
