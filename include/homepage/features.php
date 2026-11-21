<?php

/*
 * Highlights shown in the "Meet PHP x.y" card, keyed by branch. The homepage
 * features the newest branch in this list that has been released, so a new
 * branch can be added ahead of its release day.
 */
return [
    '8.6' => [
        [
            'icon' => 'php-86-pfa',
            'title' => 'Partial Function Application',
            'anchor' => 'partial-function-application',
            'description' => 'Fill in some of a function’s arguments now with <code>?</code> and <code>...</code> placeholders, and get back a Closure that takes the rest.',
        ],
        [
            'icon' => 'php-86-duration',
            'title' => 'Duration Class',
            'anchor' => 'duration-class',
            'description' => 'The new <code>Time\Duration</code> class expresses timeouts and benchmark timings with nanosecond precision, independent of any clock or timezone.',
        ],
        [
            'icon' => 'php-86-poll',
            'title' => 'Polling API',
            'anchor' => 'polling-api',
            'description' => '<code>Io\Poll</code> watches many streams at once using epoll, kqueue, and other native mechanisms, without the limits of <code>stream_select()</code>.',
        ],
    ],
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
