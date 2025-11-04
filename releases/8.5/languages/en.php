<?php

return [
    'common_header' => 'PHP 8.5 is a major update of the PHP language, with new features including the Pipe Operator, URI extension, and support for modifying properties while cloning.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.5 is a major update of the PHP language, with new features including the Pipe Operator, URI extension, and support for modifying properties while cloning.',
    'upgrade_now' => 'Upgrade to PHP 8.5',

    'pipe_operator_title' => 'Pipe Operator',
    'pipe_operator_description' => '<p>The pipe operator allows chaining function calls together without dealing with intermediary variables. This enables replacing many "nested calls" with a chain that can be read forwards, rather than inside-out.</p><p>Learn more about the backstory of this feature in <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">The PHP Foundation’s blog</a>.</p>',
    'uri_extension_title' => 'URI Extension',
    'uri_extension_description' => '<p>The new always-available URI extension provides APIs to securely parse and modify URIs and URLs according to the RFC 3986 and the WHATWG URL standards.</p><p>Powered by the <a href="https://uriparser.github.io/">uriparser</a> (RFC 3986) and <a href="https://lexbor.com/">Lexbor</a> (WHATWG URL) libraries.</p><p>Learn more about the backstory of this feature in <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">The PHP Foundation’s blog</a>.</p>',
    'clone_with_title' => 'Clone With',
    'clone_with_description' => 'It is now possible to update properties during object cloning by passing an associative array to the <code>clone()</code> function. This enables straightforward support of the "with-er" pattern for <code>readonly</code> classes.',
    'no_discard_title' => '<code>#[\NoDiscard]</code> Attribute',
    'no_discard_description' => '<p>By adding the <code>#[\NoDiscard]</code> attribute to a function, PHP will check whether the returned value is consumed and emit a warning if it is not. This allows improving the safety of APIs where the returned value is important, but it\'s easy to forget using the return value by accident.</p><p>The associated <code>(void)</code> cast can be used to indicate that a value is intentionally unused.</p>',
    'array_first_last_title' => '<code>array_first()</code> and <code>array_last()</code> functions',
    'fcc_in_const_expr_title' => 'Closures and First-Class Callables in Constant Expressions',
    'fcc_in_const_expr_description' => 'Static closures and first-class callables can now be used in constant expressions. This includes attribute parameters, default values of properties and parameters, and constants.',
    'persistent_curl_share_handles_title' => 'Persistent cURL Share Handles',
    'persistent_curl_share_handles_description' => 'Unlike <code>curl_share_init()</code>, handles created by <code>curl_share_init_persistent()</code> will not be destroyed at the end of the PHP request. If a persistent share handle with the same set of share options is found, it will be reused, avoiding the cost of initializing cURL handles each time.',

    'new_classes_title' => 'Additional features and improvements',

    'bc_title' => 'Deprecations and backward compatibility breaks',

    'footer_title' => 'Better syntax, improved performance and type safety.',
    'footer_description' => '<p>The full list of changes is recorded in the <a href="/ChangeLog-8.php#PHP_8_5">ChangeLog</a>.</p>
        <p>Please consult the <a href="/manual/en/migration85.php">Migration Guide</a> for a detailed list of new features and backward-incompatible changes.</p>',
];
