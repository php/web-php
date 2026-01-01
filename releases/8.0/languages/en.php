<?php

return [
    'common_header' => 'PHP 8.0 is a major update of the PHP language. It contains many new features and optimizations including named arguments, union types, attributes, constructor property promotion, match expression, nullsafe operator, JIT, and improvements in the type system, error handling, and consistency.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.0 is a major update of the PHP language.<br class="display-none-md"> It contains many new features and optimizations including named arguments, union types, attributes, constructor property promotion, match expression, nullsafe operator, JIT, and improvements in the type system, error handling, and consistency.',
    'upgrade_now' => 'Upgrade to PHP 8 now!',

    'named_arguments_title' => 'Named arguments',
    'named_arguments_description' => '<li>Specify only required parameters, skipping optional ones.</li><li>Arguments are order-independent and self-documented.</li>',
    'attributes_title' => 'Attributes',
    'attributes_description' => 'Instead of PHPDoc annotations, you can now use structured metadata with PHP\'s native syntax.',
    'constructor_promotion_title' => 'Constructor property promotion',
    'constructor_promotion_description' => 'Less boilerplate code to define and initialize properties.',
    'union_types_title' => 'Union types',
    'union_types_description' => 'Instead of PHPDoc annotations for a combination of types, you can use native union type declarations that are validated at runtime.',
    'ok' => 'Ok',
    'oh_no' => 'Oh no!',
    'this_is_expected' => 'This is what I expected',
    'match_expression_title' => 'Match expression',
    'match_expression_description' => '<p>The new <code>match</code> is similar to <code>switch</code> and has the following features:</p>
        <ul>
            <li>Match is an expression, meaning its result can be stored in a variable or returned.</li>
            <li>Match branches only support single-line expressions and do not need a <code>break</code> statement.</li>
            <li>Match does strict comparisons.</li>
        </ul>',

    'nullsafe_operator_title' => 'Nullsafe operator',
    'nullsafe_operator_description' => 'Instead of <code>null</code> check conditions, you can now use a chain of calls with the new nullsafe operator. When the evaluation of one element in the chain fails, the execution of the entire chain aborts and the entire chain evaluates to <code>null</code>.',
    'saner_string_number_comparisons_title' => 'Saner string to number comparisons',
    'saner_string_number_comparisons_description' => 'When comparing to a numeric string, PHP 8 uses a number comparison. Otherwise, it converts the number to a string and uses a string comparison.',
    'consistent_internal_function_type_errors_title' => 'Consistent type errors for internal functions',
    'consistent_internal_function_type_errors_description' => 'Most of the internal functions now throw an <code>Error</code> exception if the validation of the parameters fails.',

    'jit_compilation_title' => 'Just-In-Time compilation',
    'jit_compilation_description' => 'PHP 8 introduces two JIT compilation engines. Tracing JIT, the most promising of the two, shows about 3 times better performance on synthetic benchmarks and 1.5–2 times improvement on some specific long-running applications. Typical application performance is on par with PHP 7.4.',
    'jit_performance_title' => 'Relative JIT contribution to PHP 8 performance',

    'type_improvements_title' => 'Type system and error handling improvements',
    'arithmetic_operator_type_checks' => 'Stricter type checks for arithmetic/bitwise operators',
    'abstract_trait_method_validation' => 'Abstract trait method validation',
    'magic_method_signatures' => 'Correct signatures of magic methods',
    'engine_warnings' => 'Reclassified engine warnings',
    'lsp_errors' => 'Fatal error for incompatible method signatures',
    'at_operator_no_longer_silences_fatal_errors' => 'The <code>@</code> operator no longer silences fatal errors.',
    'inheritance_private_methods' => 'Inheritance with private methods',
    'mixed_type' => '<code>mixed</code> type',
    'static_return_type' => '<code>static</code> return type',
    'internal_function_types' => 'Types for internal functions',
    'email_thread' => 'Email thread',
    'opaque_objects_instead_of_resources' => 'Opaque objects instead of resources for
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, and
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        extensions',

    'other_improvements_title' => 'Other syntax tweaks and improvements',
    'allow_trailing_comma' => 'Allow a trailing comma in parameter lists <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        and closure use lists <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'Non-capturing catches',
    'variable_syntax_tweaks' => 'Variable Syntax Tweaks',
    'namespaced_names_as_token' => 'Treat namespaced names as single token',
    'throw_expression' => '<code>throw</code> is now an expression',
    'class_name_literal_on_object' => 'Allow <code>::class</code> on objects',

    'new_classes_title' => 'New Classes, Interfaces, and Functions',
    'weak_map_class' => '<a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> class',
    'stringable_interface' => '<a href="https://wiki.php.net/rfc/stringable">Stringable</a> interface',
    'new_str_functions' => '<a href="https://wiki.php.net/rfc/str_contains">str_contains()</a>,
        <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_starts_with()</a>,
        <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_ends_with()</a>',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> object implementation',
    'new_dom_apis' => 'New DOM Traversal and Manipulation APIs',

    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_description' => '<p>
            For source downloads of PHP 8 please visit the <a href="http://www.php.net/downloads">downloads</a> page.
            Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site.
            The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
        </p>
        <p>
            The <a href="/manual/en/migration80.php">migration guide</a> is available in the PHP Manual. Please
            consult it for a detailed list of new features and backward-incompatible changes.
        </p>',
];
