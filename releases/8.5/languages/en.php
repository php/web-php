<?php

return [
    'common_header' => 'PHP 8.5 is a major update of the PHP language. It contains many new features, such as property hooks, asymmetric visibility, an updated DOM API, performance improvements, bug fixes, and general cleanup.',
    'documentation' => 'Doc',
    'main_title' => 'Pipe Operator, New URI Extension, Error Handling & Type System Improvements, and more',
    'main_subtitle' => 'Bringing new major features such as the Pipe operator, a new URI extension to parse and build standard-compliant URIs, new functions and classes, and improvements in the type system, attributes, error handling and performance, PHP 8.5 is released. <br />PHP 8.5 also brings a healthy amount of bug fixes, performance improvements, and deprecations.',
    'upgrade_now' => 'Upgrade',
    'release_highlights' => 'PHP 8.5 Highlights',

    'tag_new_syntax' => 'Syntax',
    'tag_new_ext' => 'New Extension',
    'tag_new_feature' => 'Feature',
    'tag_new_attr' => 'Attribute',
    'tag_behavior_change' => 'Behavior Change',

    'release_stats_title' => 'PHP 8.5 Released',
    'release_stats_subtitle' => '<p><strong>The PHP Foundation</strong> and the <strong>PHP Group</strong> are proud to announce the release of PHP 8.5, bringing a new wave of features, stability, and performance to the world’s most popular web programming language.</p><strong>PHP 8.5</strong> introduces numerous new features, performance enhancements, and bug fixes, while deprecating outdated functionality to make the language more <strong>focused</strong>, <strong>consistent</strong>, and <strong>lean</strong>.',
    'release_stats_commits' => 'Commits',
    'release_stats_contributors' => 'Contributors',
    'release_stats_rfcs' => 'RFC Discussions',
    'release_stats_issues_closed' => 'Issues Closed',

    'changelog_title' => 'PHP 8.5 Highlights',
    'changelog_title_title' => 'PHP 8.5 remains largely backwards-compatible with PHP 8.x series. It brings new syntax such as the <a href="#pipe-operator">Pipe Operator</a>, but existing applications can use PHP 8.5 as a drop-in replacement to benefit from the security and performance improvements as well as the new features.',

    'pipe_operator_title' => 'Pipe Operator',
    'pipe_operator_description' => '<p>The pipe operator allows chaining function calls together without dealing with intermediary variables. That can be especially helpful when replacing many "nested calls" with a chain that can be read forwards, rather than inside-out.</p><p>Learn more about the backstory of this feature in <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">The PHP Foundation’s blog</a>.</p>',

    'url_parsing_api_title' => 'New URI Extension',
    'url_parsing_api_description' => '<p>As an always-available part of PHP\'s standard library the new URI extension provides APIs to parse and modify URIs and URLs according to the RFC 3986 and the WHATWG URL standards.</p><p>The secure and standards-compliant URI parsing is powered by the <a href="https://uriparser.github.io/">uriparser</a> (RFC 3986) and <a href="https://lexbor.com/">Lexbor</a> (WHATWG URL) libraries.</p><p>Learn more about the backstory of this feature in <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">The PHP Foundation’s blog</a>.</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>It is now possible to update properties during object cloning by passing an associative array with the updated to the <a href="https://www.php.net/clone"><code>clone()</code></a> function. This enables straight-forward support of the "with-er" pattern for <code>readonly</code> classes.</p>',

    'fcc_in_const_expr_title' => 'Closures and First Class Callables in Constant Expressions',
    'fcc_in_const_expr_description' => '<p><a href="https://www.php.net/manual/class.closure.php">Closures</a> and <a href="https://www.php.net/manual/functions.first_class_callable_syntax.php">First-class Callables</a> can now be used as global and class constant expressions, parameter and property default expressions, and attribute parameters.',

    'curl_share_persistence_improvement_title' => 'Persistent cURL Share Handles',
    'curl_share_persistence_improvement_description' => '<p>Persistent cURL Share Handles with the new <a href="https://www.php.net/curl_share_init_persistent"><code>curl_share_init_persistent()</code></a> function added in PHP 8.5, which opens a <strong>persistent</strong> Curl connection which does not get destroyed at the end of the PHP request. If a persistent share handle with the same set of <code>share_options</code> is found, it will be reused.</p>',

    'array_first_last_title' => 'New <code>array_first()</code> and <code>array_last()</code> functions',
    'array_first_last_description' => '<p>PHP 8.5 brings a new pair of functions, <a href="https://www.php.net/array_first"><code>array_first()</code></a> and <a href="https://www.php.net/array_last"><code>array_last()</code></a>, that return the first and last <em>value</em> of a given array.</p><p>They complement the <a href="https://www.php.net/array_key_first"><code>array_key_first()</code></a> and <a href="https://www.php.net/array_key_first"><code>array_key_first()</code></a> functions added in PHP 7.4.</p>',

    'no_discard_title' => '<code>#[\NoDiscard]</code> Attribute',
    'no_discard_description' => '<p>By adding the <code>#[\NoDiscard]</code> attribute to a function, PHP will check whether the returned value is consumed and emit a warning if it is not. This allows to improve the safety of APIs where the returned value is important, but where it is easy to forget using the return value by accident.</p><p>The associated <code>(void)</code> cast can be used to indicate that a value is intentionally unused.</p>',


    'error_handling_improvements' => 'Error Handling Improvements',
    'error_handling_improvements_text' => '<p>PHP 8.5 improves error handling and semantics in PHP functions and classes, as well as improvements in the error messages.</p><p>Errors that were previously silently ignored, such as an unexpectedly terminated <code>sendmail</code> call from the <code>mail()</code> function are now emitted as a warning.</p>',

    'type_attr_improvements' => 'Type System and Attribute Improvements',
    'type_attr_improvements_text' => '<p>As PHP evolves, PHP gets increasingly expressive, with improvements in the type system, and new attributes that help declare certain behaviors and restrictions.</p>',

    'fatal_error_backtrace_title' => 'Backtraces on Fatal Errors',
    'fatal_error_backtrace_description' => '<p>PHP 8.5 can now show a backtrace when a fatal error occurs, such as reaching the memory limit or exceeding the maximum execution time. Previously, it only showed the error message without a backtrace, which made it difficult to debug the errors.</p><p>The new <a href="https://php.watch/codex/fatal_error_backtraces"><code>fatal_error_backtraces</code></a> INI directive controls whether fatal errors should include a backtrace.</p>',

    'value_error_change_title' => 'Improved <code>ValueError</code> Semantics',
    'value_error_change_description' => '<p>Several PHP functions are updated to throw <code>ValueError</code> exceptions when a parameter provided is unsatisfactory.</p><p>Some of these functions include <a href="https://www.php.net/bzcompress"><code>bzcompress()</code></a>, <a href="https://www.php.net/finfo_file"><code>finfo_file()</code></a>, <a href="https://www.php.net/ldap_get_option"><code>ldap_get_option()</code></a>, <a href="https://www.php.net/ldap_set_option"><code>ldap_set_option()</code></a>, and <a href="https://www.php.net/pcntl_exec"><code>pcntl_exec()</code></a>.</p>',

    'get_error_exception_handler_title' => 'New <code>get_error_handler</code> and <code>get_exception_handler()</code> functions',
    'get_error_exception_handler_description' => '<p>PHP 8.5 adds helper two new helper functions, <a href="https://www.php.net/get_exception_handler"><code>get_exception_handler()</code></a>, and <a href="https://www.php.net/get_error_handler"><code>get_error_handler()</code></a> to retrieve the currently set exception and error handlers. These two new functions complement the existing <a href="https://www.php.net/set_exception_handler"><code>set_exception_handler()</code></a>, and <a href="https://www.php.net/set_error_handler"><code>set_error_handler()</code></a> functions.</p>',


    'attr_on_consts_title' => 'Attributes support for constants',
    'attr_on_consts_description' => '<p>In PHP 8.5 and later, it is possible to add attributes to compile-time non-class constants.</p><p>One useful use-case is applying the <code>[#Deprecated]</code> to constants, to declare that a constant is deprecated, which PHP automatically emits a deprecation notice when the constant is used.</p>',

    'cpp_on_final_props_title' => '<code>final</code> property syntax support in constructor properties',
    'cpp_on_final_props_description' => '<p>PHP 8.0 added support for constructor properties, which allows declaring class properties in the class constructor. Since PHP 8.4, it is possible to declare class properties as <code>final</code>.</p>',

    'static_aviz_title' => 'Asymmetric Visibility for Static Properties',
    'static_aviz_description' => '<p>PHP 8.5 extends the PHP 8.4 Asymmetric Visibility, to allow declaring asymmetric visibility rules for static class properties.</p>',

    'override_attr_props_title' => 'Extend <code>#[\Override]</code> to target properties',
    'override_attr_props_description' => '<p>The <code>#[\Override]</code> attribute, which emits a compilation error if a class method is <em>not</em> being extended (because the parent class has no such method), now supports class properties as well.</p>',

    'support_status' => 'Support and Life Cycle',
    'support_status_description' => '<p>PHP 8.5 will receive two years of active bug fixes and security fixes, followed by two years of security support.</p>',

    'support_status_release_date' => 'Release Date',
    'support_status_active_until' => 'Active Support Ends',
    'support_status_active_eol' => 'End-of-life',

    'get_involved' => 'Get Involved',
    'get_involved_description' => '<p>PHP is an open-source software, powering the majority of web applications on the Internet.</p><p>You can help shape the future of PHP, with <a href="https://github.com/php/php-src">code contributions</a>, <a href="https://github.com/php/doc-base">documentation contributions</a>, <a href="https://github.com/php/policies/blob/main/security-classification.rst">reporting security issues</a> and <a href="https://github.com/php/php-src/issues">bug reports</a>, joining the <a href="https://www.php.net/mailing-lists.php">mailing list discussions</a>, and <a href="https://thephp.foundation/sponsor/">contributing financially to the PHP Foundation</a>.',

    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_description' => '<p>For source downloads of PHP 8.5 please visit the <a href="/downloads">downloads</a> page. Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site. The list of changes is recorded in the <a href="/ChangeLog-8.php#PHP_8_5">ChangeLog</a>.</p>
        <p>The <a href="/manual/en/migration85.php">migration guide</a> is available in the PHP Manual. Please consult it for a detailed list of new features and backward-incompatible changes.</p>',

    'download' => 'Download PHP 8.5',
    'migration_guide' => 'Migration guide',

    'footnotes' => '<ul>
            <li id="footnote-1">†: The commit and contributor statistics are from <a href="https://phpstatus.com/stats/8.5">phpstatus.com</a></li>
            <li id="footnote-2">‡: The changelog statistics are from <a href="https://php.watch/versions/8.5/changelog">PHP.Watch</a></li>
        </ul>'
];
