<?php

/*
 * The "Powered by PHP" logo wall.
 *
 * Every logo needs to have some form of public attachment to PHP, whether
 * it's a talk, a reference from a leader, a case study, or other public
 * reputable sign.
 *
 * `story` summarizes that for the tooltip and screen readers.
 * `source` is the public evidence behind `story`; it is kept here for
 *     justification only and is not linked from the page.
 * `width` sizes the mark below the 640px breakpoint;
 *     above the 640px breakpoint, `width_sm` and `height_sm` bound it (the mark scales to fit).
 * `wordmark` is shown beside the mark above 640px.
 */
return [
    [
        'name' => 'Nike',
        'story' => 'about.nike.com runs on Twill',
        'source' => 'https://area17.com/clients/nike',
        'icon' => 'nike',
        'width' => '2.5rem',
        'width_sm' => '3.5rem',
        'height_sm' => '1.25rem',
    ],
    [
        'name' => 'NASA',
        'story' => 'nasa.gov and NASA Science run on WordPress',
        'source' => 'https://lonerockpoint.com/work/nasa-flagship-wordpress/',
        'icon' => 'nasa',
        'width' => '3.25rem',
        'width_sm' => '5rem',
        'height_sm' => '1.25rem',
    ],
    [
        'name' => 'The New York Times',
        'story' => 'Built with WordPress and Twill',
        'source' => 'https://wordpress.org/showcase/the-new-york-times-company/',
        'icon' => 'new-york-times',
        'width' => '3.5rem',
        'width_sm' => '8rem',
        'height_sm' => '1.5rem',
    ],
    [
        'name' => 'Zillow',
        'story' => 'Aryeo, a Zillow company, is built on Laravel',
        'source' => 'https://github.com/AryeoHQ',
        'icon' => 'zillow',
        'width' => '1.25rem',
        'wordmark' => 'Zillow',
    ],
    [
        'name' => 'Asana',
        'story' => 'Marketing website runs on Statamic',
        'source' => 'https://blog.asana.com/2014/02/scaling-asana-com/',
        'icon' => 'asana',
        'width' => '1.25rem',
        'wordmark' => 'asana',
    ],
    [
        'name' => 'PlayStation',
        'story' => 'PlayStation Blog runs on WordPress',
        'source' => 'https://wordpress.org/showcase/playstationblog/',
        'icon' => 'playstation',
        'width' => '1.5rem',
        'wordmark' => 'PlayStation',
    ],
    [
        'name' => 'DHL',
        'story' => 'DHL eCommerce website runs on Drupal',
        'source' => 'https://www.dhlecommerce.nl/en/business/knowledge-platform/dhl-blog/multiple-prizes-dhl-website',
        'icon' => 'dhl',
        'width' => '3.5rem',
        'width_sm' => '6rem',
        'height_sm' => '1rem',
    ],
    [
        'name' => 'Etsy',
        'story' => 'Marketplace engineering built with PHP',
        'source' => 'https://careers.etsy.com/engineering',
        'icon' => 'etsy',
        'width' => '2.25rem',
        'width_sm' => '3.25rem',
        'height_sm' => '1.5rem',
    ],
    [
        'name' => 'Marvel',
        'story' => 'MARVEL Strike Force website runs on Twill',
        'source' => 'https://twillcms.com/made',
        'icon' => 'marvel',
        'width' => '3rem',
        'width_sm' => '4.25rem',
        'height_sm' => '1.5rem',
    ],
    [
        'name' => 'Der Spiegel',
        'story' => 'Built on Statamic',
        'source' => 'https://statamic.com/showcase/der-spiegel',
        'icon' => 'der-spiegel',
        'width' => '4rem',
        'width_sm' => '7rem',
    ],
    [
        'name' => 'Lemon Squeezy',
        'story' => 'Built on Laravel',
        'source' => 'https://www.lemonsqueezy.com/blog/lemonhead-gilbert-pellegrom',
        'icon' => 'lemon-squeezy',
        'width' => '1.25rem',
        'wordmark' => 'Lemon Squeezy',
        'wordmark_class' => 'logo-wall__wordmark--small',
    ],
    [
        'name' => 'Wikipedia',
        'story' => 'Built on MediaWiki, a PHP application',
        'source' => 'https://www.mediawiki.org/wiki/PHP',
        'icon' => 'wikipedia',
        'width' => '1.5rem',
        'wordmark' => 'Wikipedia',
        'wordmark_class' => 'logo-wall__wordmark--serif',
    ],
];
