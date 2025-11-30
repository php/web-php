<?php

return [
    'common_header' => 'PHP 8.5 is a major update of the PHP language, with new features including the URI Extension, Pipe Operator, and support for modifying properties while cloning.',
    'main_title' => 'Smarter, Faster, Built for Tomorrow.',
    'main_subtitle' => '<p><strong>PHP 8.5 is a major update of the PHP language</strong>, with new features including the <strong>URI extension</strong>, <strong>Pipe operator</strong>, and support for <strong>modifying properties while cloning</strong>.</p>',

    'whats_new' => 'What\'s new in 8.5',
    'upgrade_now' => 'Upgrade to PHP 8.5',
    'old_version' => 'PHP 8.4 and older',
    'badge_new' => 'NEW',
    'documentation' => 'Doc',
    'released' => 'Released Nov 20, 2025',
    'key_features' => 'Key Features in PHP 8.5',
    'key_features_description' => '<p><strong>Faster</strong>, <strong>cleaner</strong>, and <strong>built for developers</strong>.</p>',

    'features_pipe_operator_title' => 'Pipe Operator',
    'features_pipe_operator_description' => '<p>The <code>|></code> operator enables chaining callables left-to-right, passing values smoothly through multiple functions without intermediary variables.</p>',
    'features_persistent_curl_share_handles_title' => 'Persistent cURL Share Handles',
    'features_persistent_curl_share_handles_description' => '<p>Handles can now be persisted across multiple PHP requests, avoiding the cost of repeated connection initialization to the same hosts.</p>',
    'features_clone_with_title' => 'Clone With',
    'features_clone_with_description' => '<p>Clone objects and update properties with the new <code>clone()</code> syntax, making the "with-er" pattern simple for <code>readonly</code> classes.</p>',
    'features_uri_extension_title' => 'URI Extension',
    'features_uri_extension_description' => '<p>PHP 8.5 adds a built-in URI extension to parse, normalize, and handle URLs following <em>RFC 3986</em> and <em>WHATWG URL</em> standards.</p>',
    'features_no_discard_title' => '#[\NoDiscard] Attribute',
    'features_no_discard_description' => '<p>The <code>#[\NoDiscard]</code> attribute warns when a return value isn’t used, helping prevent mistakes and improving overall API safety.</p>',
    'features_fcc_in_const_expr_title' => 'Closures and First-Class Callables in Constant Expressions',
    'features_fcc_in_const_expr_description' => '<p>Static closures and first-class callables can now be used in constant expressions, such as attribute parameters.</p>',

    'pipe_operator_title' => 'Pipe Operator',
    'pipe_operator_description' => '<p>The pipe operator allows chaining function calls together without dealing with intermediary variables. This enables replacing many "nested calls" with a chain that can be read forwards, rather than inside-out.</p><p>Learn more about the backstory of this feature in <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">The PHP Foundation’s blog</a>.</p>',

    'array_first_last_title' => 'array_first() and array_last() functions',
    'array_first_last_description' => '<p>The <code>array_first()</code> and <code>array_last()</code> functions return the first or last value of an array, respectively. If the array is empty, <code>null</code> is returned (making it easy to compose with the <code>??</code> operator).</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>It is now possible to update properties during object cloning by passing an associative array to the <code>clone()</code> function. This enables straightforward support of the "with-er" pattern for <code>readonly</code> classes.</p>',

    'uri_extension_title' => 'URI Extension',
    'uri_extension_description' => '<p>The new always-available URI extension provides APIs to securely parse and modify URIs and URLs according to the RFC 3986 and the WHATWG URL standards.</p><p>Powered by the <a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) and <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL) libraries.</p><p>Learn more about the backstory of this feature in <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">The PHP Foundation’s blog</a>.</p>',

    'no_discard_title' => '#[\NoDiscard] Attribute',
    'no_discard_description' => '<p>By adding the <code>#[\NoDiscard]</code> attribute to a function, PHP will check whether the returned value is consumed and emit a warning if it is not. This allows improving the safety of APIs where the returned value is important, but it\'s easy to forget using the return value by accident.</p><p>The associated <code>(void)</code> cast can be used to indicate that a value is intentionally unused.</p>',

    'persistent_curl_share_handles_title' => 'Persistent cURL Share Handles',
    'persistent_curl_share_handles_description' => '<p>Unlike <code>curl_share_init()</code>, handles created by <code>curl_share_init_persistent()</code> will not be destroyed at the end of the PHP request. If a persistent share handle with the same set of share options is found, it will be reused, avoiding the cost of initializing cURL handles each time.</p>',

    'fcc_in_const_expr_title' => 'Closures and First-Class Callables in Constant Expressions',
    'fcc_in_const_expr_description' => '<p>Static closures and first-class callables can now be used in constant expressions. This includes attribute parameters, default values of properties and parameters, and constants.</p>',

    'new_classes_title' => 'Additional features and improvements',
    'fatal_error_backtrace' => 'Fatal Errors (such as an exceeded maximum execution time) now include a backtrace.',
    'const_attribute_target' => 'Attributes can now target constants.',
    'override_attr_properties' => '{0} attribute can now be applied to properties.',
    'deprecated_traits_constants' => '{0} attribute can be used on traits and constants.',
    'asymmetric_static_properties' => 'Static properties now support asymmetric visibility.',
    'final_promoted_properties' => 'Properties can be marked as <code>final</code> using constructor property promotion.',
    'closure_getCurrent' => 'Added <code>Closure::getCurrent()</code> method to simplify recursion in anonymous functions.',
    'partitioned_cookies' => 'The {0} and {1} functions now support the "partitioned" key.',
    'get_set_error_handler' => 'New {0} and {1} functions are available.',
    'new_dom_element_methods' => 'New {0} and {1} methods are available.',
    'grapheme_levenshtein' => 'Added {0} function.',
    'delayed_target_validation' => 'New {0} attribute can be used to suppress compile-time errors from core and extension attributes that are used on invalid targets.',

    'bc_title' => 'Deprecations and backward compatibility breaks',
    'bc_backtick_operator' => 'The backtick operator as an alias for {0} has been deprecated.',
    'bc_non_canonical_cast_names' => 'Non-canonical cast names <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code>, and <code>(binary)</code> have been deprecated. Use <code>(bool)</code>, <code>(int)</code>, <code>(float)</code>, and <code>(string)</code> instead, respectively.',
    'bc_disable_classes' => 'The {0} INI setting has been removed as it causes various engine assumptions to be broken.',
    'bc_semicolon_after_case' => 'Terminating <code>case</code> statements with a semicolon instead of a colon has been deprecated.',
    'bc_null_array_offset' => 'Using <code>null</code> as an array offset or when calling {0} is now deprecated. Use an empty string instead.',
    'bc_class_alias_names' => 'It is no longer possible to use "array" and "callable" as class alias names in {0}.',
    'bc_sleep_wakeup' => 'The {0} and {1} magic methods have been soft-deprecated. The {2} and {3} magic methods should be used instead.',
    'bc_casting_nan' => 'A warning is now emitted when casting {0} to other types.',
    'bc_non_array_destructuring' => 'Destructuring non-array values (other than <code>null</code>) using {0} or {1} now emits a warning.',
    'bc_casting_non_int_floats' => 'A warning is now emitted when casting floats (or strings that look like floats) to <code>int</code> if they cannot be represented as one.',

    'footer_title' => 'Better syntax, improved performance and type safety.',
    'footer_description' => '<p class="first-paragraph">The full list of changes is recorded in the <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>.</p><p>Please consult the <a href="/manual/en/migration85.php" target="_blank">migration guide</a> for a detailed list of new features and backward-incompatible changes.</p>',
];
