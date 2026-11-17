<?php

/*
 * Highlights shown in the "Meet PHP x.y" card, keyed by branch. The homepage
 * features the newest branch in this list, regardless of releases elsewhere.
 */
return [
    '8.5' => [
        [
            'icon' => 'php-85-uri',
            'title' => 'URI Extension',
            'anchor' => 'new-uri-extension',
            'description' => 'PHP 8.5 adds a built-in URI extension to parse, normalize, and handle URLs following <em>RFC 3986</em> and <em>WHATWG URL</em> standards.',
        ],
        [
            'icon' => 'php-85-pipe',
            'title' => 'Pipe Operator',
            'anchor' => 'pipe-operator',
            'description' => 'The <code>|></code> operator enables chaining callables left-to-right, passing values smoothly through multiple functions without intermediary variables.',
        ],
        [
            'icon' => 'php-85-clone',
            'title' => 'Clone With',
            'anchor' => 'clone-with',
            'description' => 'Clone objects and update properties with the new <code>clone()</code> syntax, making the "with-er" pattern simple for <code>readonly</code> classes.',
        ],
    ],
];
