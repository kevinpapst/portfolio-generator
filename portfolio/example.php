<?php

return array(
    'renderer'  => array(
        'astral' => array(
            // [OPTIONAL] Translation for template. English is default (available: de, en). Will be "english" if empty or not set.
            'language'  => '',
            // [REQUIRED] Renderer type (available: php)
            'type'      => 'php',
            // [REQUIRED] Template base directory (the template that will be used for rendering)
            'source'    => 'templates/html5up-astral/',
            // [REQUIRED] Template output directory (the directory where the generated CV will be stored)
            'output'    => 'output/example/html5up-astral/',
            // [OPTIONAL] Contents of this directory will be copied to the export folder. Will be ignored if empty or not set.
            'assets'    => 'portfolio/example/assets/'
        ),
        'odt' => array(
            'language'  => 'en',
            'type'      => 'odt',
            'source'    => 'templates/openoffice.odt',
            'output'    => 'output/example/example.odt',
            'assets'    => 'portfolio/example/assets/',
            // [OPTIONAL] additional options for tinyButStrong, see http://www.tinybutstrong.com/manual.php#php_setoption
            'options'   => array('charset' => 'UTF-8')
        ),
        'azuka' => array(
            'language'  => 'de',
            'type'      => 'php',
            'source'    => 'templates/azuka-portfolio/template/',
            'output'    => 'output/example/azuka-portfolio/',
            'assets'    => 'portfolio/example/assets/'
        ),
        'pack116blue' => array(
            'type'      => 'php',
            'source'    => 'templates/pack116-resume-template/',
            'output'    => 'output/example/pack116-resume/',
            'assets'    => 'portfolio/example/assets/',
            // [OPTIONAL] Color set for "pack116blue". Default: blue (available: blue,brown,green,purple,red)
            'options'   => array('color' => 'red')
        )
    ),
    'cv' => array(
        'about'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim viverra nibh sed varius. Proin bibendum nunc in sem ultrices posuere. Aliquam ut aliquam lacus.',
        'contact'       => array(
            'name'      => 'John Smith',
            'teaser'    => 'Interactive Designer',
            'email'     => 'johnsmith@business.com',
            'phone'     => '+11 444 555 22 33',
            'street'    => '111 Lorem Street',
            'city'      => '34785, Ipsum City',
            'photo'     => 'me.png',
            'websites'  => array(
                array(
                    'type'  => 'homepage',
                    'url'   => 'http://www.example.com',
                    'title' => 'www.businessweb.com'
                ),
                array(
                    'type'  => 'twitter',
                    'url'   => 'http://www.twitter.com',
                    'title' => 'Twitter'
                ),
                array(
                    'type'  => 'google-plus',
                    'url'   => 'https://plus.google.com/107501138994192476948',
                    'title' => 'Google+'
                ),
            )
        ),
        'skill' => array(
            array(
                'title'     => 'Software Knowledge',
                'entries'   => array(
                    'Photoshop', 'Illustrator', 'InDesign', 'Flash', 'Fireworks', 'Dreamweaver', 'After Effects', 'Cinema 4D', 'Maya'
                )
            ),
            array(
                'title'     => 'Languages',
                'entries'   => array(
                    'CSS3/HTML5', 'PHP', 'JavaScript', 'Ruby on Rails', 'ActionScript', 'C++'
                )
            ),
        ),
        'education'     => array(
            array(
                'school'    => 'Academy of Art University, London',
                'degree'    => 'Master in Communication Design',
                'start'     => 'Sep 2005',
                'end'       => 'Feb 2007'
            ),
            array(
                'school'    => 'University of Art & Design, New York',
                'degree'    => 'Bachelor of Science in Graphic Design',
                'start'     => 'Sep 2001',
                'end'       => 'Jun 2005'
            ),
        ),
        'knowledge'     => array(
            array(
                'title'     => 'Webdesign',
                'teaser'    => 'HTML5 / CSS3 - Flat design & RIA',
                'duration'  => (date('Y') - 2003), // duration in knowledge is always assumed to be years
                'content'   => 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc sed sem vel eros dictum auctor sed et leo. Aliquam eget est dui, sit amet tempus nisl. Nam euismod dignissim ante, et laoreet odio molestie non. Cras eget lectus mauris, a porta urna. Nunc vehicula mi eu nibh ultricies et ullamcorper justo convallis. Nullam eu commodo lorem. Donec ultrices felis sit amet dolor blandit et bibendum augue ullamcorper.'
            ),
            array(
                'title'     => 'Video editing',
                'teaser'    => '3D animation and visual effects',
                'duration'  => (date('Y') - 2009), // duration in knowledge is always assumed to be years
                'content'   => 'Ut eget pulvinar lacus. Suspendisse potenti. Integer quis massa sit amet ante rhoncus pharetra. Proin id mi ipsum, a hendrerit nisi. Nam condimentum scelerisque tortor, nec placerat justo scelerisque vitae. Nulla rutrum varius commodo. Sed sit amet eros sit amet est feugiat tincidunt. Quisque est nunc, aliquet ut tincidunt eget, tempus ut dolor. Sed lobortis adipiscing mi, quis ornare sem pulvinar volutpat.'
            ),
        ),
        'experience'    => array(
            array(
                'title'     => 'Senior Web Designer',
                'teaser'    => 'Agency Creative, London',
                'start'      => 'May 2009',
                'end'        => 'Feb 2010',
                'content'   => 'Vestibulum eu ante massa, sed rhoncus velit. Pellentesque at lectus in <a href="#">libero dapibus</a> cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.'
            ),
            array(
                'title'     => 'Junior Web Designer',
                'teaser'    => 'Bachelor of Science in Graphic Design',
                'start'      => 'Jun 2007',
                'end'        => 'May 2009',
                'content'   => 'Sed fermentum sollicitudin interdum. Etiam imperdiet sapien in dolor rhoncus a semper tortor posuere. Pellentesque at lectus in libero dapibus cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.'
            ),
        ),
        'project'       => array(
            array(
                'title' => 'Client website',
                'duration' => '4 Month', // duration here is a free text field, as it can be either weeks, months or even years
                'start' => '2013',
                'end' => '2014',
                'position' => 'Designer, Webdeveloper',
                'description' => 'Something great achieved in here, this project was just fantastic. Sed fermentum sollicitudin interdum. Etiam imperdiet sapien in dolor rhoncus a semper tortor posuere.',
                'technology' => 'Wordpress, PHP, MySQL',
                'client' => 'ACME University',
                'reference' => array(
                    'url' => 'http://www.example.com',
                    'title' => 'My great client',
                )
            ),
            array(
                'title' => 'Logo design',
                'duration' => '2 Month',
                'start' => '2012',
                'end' => '2013',
                'position' => 'Designer',
                'description' => 'Sed fermentum sollicitudin interdum. Etiam imperdiet sapien in dolor rhoncus a semper tortor posuere. Pellentesque at lectus in libero dapibus cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.',
                'technology' => 'Adobe Photoshop, SVG, CSS-Fonts',
                'client' => 'ACME Toon-Town'
            ),
        )
    )
);