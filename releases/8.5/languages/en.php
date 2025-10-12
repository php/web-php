<?php

return [
    'common_header' => 'PHP 8.5 is a major update of the PHP language. It contains many new features, such as the new URI extension, support for modifying properties while cloning, the Pipe operator, performance improvements, bug fixes, and general cleanup.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.5 is a major update of the PHP language.<br class="display-none-md"> It contains many new features, such as the new URI extension, support for modifying properties while cloning, the Pipe operator, performance improvements, bug fixes, and general cleanup.',
    'upgrade_now' => 'Upgrade to PHP 8.5 now!',

    'pipe_operator_title' => 'Pipe Operator',
    'url_parsing_api_title' => 'New URI Extension',
    'url_parsing_api_description' => '<p>As an always-available part of PHP\'s standard library the new URI extension provides APIs to parse and modify URIs and URLs according to the RFC 3986 and the WHATWG URL standards.</p><p>The secure and standards-compliant URI parsing is powered by the <a href="https://uriparser.github.io/">uriparser</a> (RFC 3986) and <a href="https://lexbor.com/">Lexbor</a> (WHATWG URL) libraries.</p>',
    'clone_with_title' => 'Clone With',
    'clone_with_description' => 'It is not possible to update properties during object cloning by passing an associative array with the updated to the <code>clone()</code> function. This enables straight-forward support of the "with-er" pattern for <code>readonly</code> classes.',
    'no_discard_title' => '<code>#[\NoDiscard]</code> Attribute',
    'no_discard_description' => '<p>By adding the <code>#[\NoDiscard]</code> attribute to a function, PHP will check whether the returned value is consumed and emit a warning if it is not. This allows to improve the safety of APIs where the returned value is important, but where it is easy to forget using the return value by accident.</p><p>The associated <code>(void)</code> cast can be used to indicate that a value is intentionally unused.</p>',
    'fcc_in_const_expr_title' => 'Closures and First Class Callables in Constant Expressions',
    'curl_share_persistence_improvement_title' => 'Persistent cURL Share Handles',
    'array_first_last_title' => 'New <code>array_first()</code> and <code>array_last()</code> functions',

    'new_classes_title' => 'New Classes, Interfaces, and Functions',

    'bc_title' => 'Deprecations and backward compatibility breaks',

    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_description' => '<p>For source downloads of PHP 8.5 please visit the <a href="/downloads">downloads</a> page. Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site. The list of changes is recorded in the <a href="/ChangeLog-8.php#PHP_8_5">ChangeLog</a>.</p>
        <p>The <a href="/manual/en/migration85.php">migration guide</a> is available in the PHP Manual. Please consult it for a detailed list of new features and backward-incompatible changes.</p>',
];
