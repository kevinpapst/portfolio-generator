<?php

return array(
    'renderer'  => array(
        'pack116blue' => array(
            // 'language'  => 'de', // if you want a different language than english use this key
            'type'      => 'php',
            'source'    => 'templates/pack116-resume-template/blue/',
            'output'    => 'output/example/resume-template-blue/',
            // 'assets'    => '', // a directory that will be copied to each export folder
            'save_as'   => 'index.html'
        )
    ),
    'cv' => array(
        'about'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim viverra nibh sed varius. Proin bibendum nunc in sem ultrices posuere. Aliquam ut aliquam lacus.',
        'contact'       => array(
            'name'      => 'John Smith',
            'teaser'    => 'Interactive Designer',
            'email'     => 'johnsmith@business.com',
            'phone'     => '+11 444 555 22 33',
            'address'   => '111 Lorem Street, 34785, Ipsum City',
            'photo'     => 'images/image.jpg',
            'websites'  => array(
                array(
                    'type'  => 'homepage',
                    'url'   => 'http://www.businessweb.com',
                    'title' => 'www.businessweb.com'
                ),
                array(
                    'type'  => 'twitter',
                    'url'   => 'http://www.twitter.com',
                    'title' => 'www.twitter.com'
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
        'knowledge'    => array(
            array(
                'title'     => 'Webdesign',
                'teaser'    => 'HTML5 / CSS3 - Flat design & RIA',
                'duration'  => (date('Y') - 2003),
                'content'   => 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc sed sem vel eros dictum auctor sed et leo. Aliquam eget est dui, sit amet tempus nisl. Nam euismod dignissim ante, et laoreet odio molestie non. Cras eget lectus mauris, a porta urna. Nunc vehicula mi eu nibh ultricies et ullamcorper justo convallis. Nullam eu commodo lorem. Donec ultrices felis sit amet dolor blandit et bibendum augue ullamcorper.'
            ),
            array(
                'title'     => 'Video editing',
                'teaser'    => '3D animation and visual effects',
                'duration'  => (date('Y') - 2009),
                'content'   => 'Ut eget pulvinar lacus. Suspendisse potenti. Integer quis massa sit amet ante rhoncus pharetra. Proin id mi ipsum, a hendrerit nisi. Nam condimentum scelerisque tortor, nec placerat justo scelerisque vitae. Nulla rutrum varius commodo. Sed sit amet eros sit amet est feugiat tincidunt. Quisque est nunc, aliquet ut tincidunt eget, tempus ut dolor. Sed lobortis adipiscing mi, quis ornare sem pulvinar volutpat.'
            ),
        ),
        'experience'   => array(
            array(
                'title'     => 'Senior Web Designer',
                'teaser'    => 'Agency Creative, London',
                'start'      => 'May 2009',
                'end'        => 'Feb 2010',
                'content'   => '<ul class="info">
                      <li>Vestibulum eu ante massa, sed rhoncus velit.</li>
                      <li>Pellentesque at lectus in <a href="#">libero dapibus</a> cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
                    </ul>'
            ),
            array(
                'title'     => 'Junior Web Designer',
                'teaser'    => 'Bachelor of Science in Graphic Design',
                'start'      => 'Jun 2007',
                'end'        => 'May 2009',
                'content'   => '<ul class="info">
                      <li>Sed fermentum sollicitudin interdum. Etiam imperdiet sapien in dolor rhoncus a semper tortor posuere. </li>
                      <li>Pellentesque at lectus in libero dapibus cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
                    </ul>'
            ),
        )
    )

);