<?php

return [
    'common_header' => 'PHP 8.1 is a major update of the PHP language. enums, readonly properties, first-class callable syntax, fibers, intersection types, performance improvements and more.',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.1 is a major update of the PHP language.<br class="display-none-md"> It contains many new features and optimizations including enums, readonly&nbsp;properties, first-class&nbsp;callable&nbsp;syntax, fibers, intersection&nbsp;types, performance improvements and more.',
    'upgrade_now' => 'Upgrade to PHP 8.1 now!',
    'documentation' => 'Doc',

    'enumerations_title' => 'Enumerations',
    'enumerations_content' => 'Use instead of set of constants and get validation out of the box.',

    'readonly_properties_title' => 'Readonly Properties',
    'readonly_properties_content' => '<p>Readonly properties cannot be changed after initialization, i.e. after a value is assigned to them.<br>They are a great way to model value objects and data-transfer objects.</p>',

    'first_class_callable_syntax_title' => 'First-class Callable Syntax',
    'first_class_callable_syntax_content' => '<p>It is now possible to get a reference to any function – this is called first-class callable syntax.</p>',

    'new_in_initializers_title' => 'New in initializers',
    'new_in_initializers_content' => '<p>Objects can now be used as default parameter values, static variables, and global constants, as well as in attribute arguments.</p>
            <p>This effectively makes possible to use <strong>nested attributes</strong>.</p>',

    'pure_intersection_types_title' => 'Pure Intersection Types',
    'pure_intersection_types_content' => '<p>Use intersection types on any type declarations when you need to require a value to satisfy multiple type constraints at the same time.</p>
            <p>It is not currently possible to mix intersection and union types together such as <code>A&B|C</code>.</p>',

    'never_return_type_title' => 'Never return type',
    'never_return_type_content' => '<p>A function or method declared with the <code>never</code> type indicates that it will not return a value and will either throw an exception or end the script’s execution with a call of <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code>, or something similar.</p>',

    'final_class_constants_title' => 'Final class constants',
    'final_class_constants_content' => '<p>It is possible to declare final class constants, so that they cannot be overridden in child classes.</p>',

    'octal_numeral_notation_title' => 'Explicit Octal numeral notation',
    'octal_numeral_notation_content' => '<p>It is now possible to write octal numbers with the explicit <code>0o</code> prefix.</p>',

    'fibers_title' => 'Fibers',
    'fibers_content' => '<p>Fibers are primitives for implementing light weight cooperative concurrency. Basically they are a means of creating code blocks that can be paused and resumed, much like threads. The main difference is that they are never preempted and that the scheduling must be done by a common library and not the OS.</p>',

    'array_unpacking_title' => 'Array unpacking support for string-keyed arrays',
    'array_unpacking_content' => '<p>PHP supported unpacking inside arrays through the spread operator before, but only if the arrays had integer keys. Now it is possible to unpack arrays with string keys too.</p>',

    'performance_title' => 'Performance Improvements',
    'performance_results' => 'The result (relative to PHP-8.0):
              - 3.5 % Wordpress speedup<br />
              - 27.0% Symfony Demo speedup',
    'performance_related_functions_title' => 'Performance related features in PHP 8.1:',
    'performance_jit_arm64' => 'JIT backend for ARM64(AArch64)',
    'performance_inheritance_cache' => 'Inheritance cache (avoid relinking classes in each request)',
    'performance_fast_class_name_resolution' => 'Fast class name resolution (avoid lowercasing and hash lookup)',
    'performance_timelib_date_improvements' => 'timelib and ext/date performance improvements',
    'performance_spl' => 'SPL file-system iterators improvements',
    'performance_serialize_unserialize' => 'serialize/unserialize optimizations',
    'performance_internal_functions' => 'Some internal functions optimization (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())',
    'performance_jit' => 'JIT improvements and fixes',

    'bc_title' => 'Deprecations and backward compatibility breaks',
    'bc_null_to_not_nullable' => 'Passing null to non-nullable internal function parameters is deprecated.',
    'bc_return_types' => 'Return types in PHP built-in class methods and deprecation notices.',
    'bc_returntypewillchange' => 'New <code>#[ReturnTypeWillChange]</code> attribute.',
    'bc_serializable_deprecated' => '<code>Serializable</code> interface deprecated.',
    'bc_html_entity_encode_decode' => 'HTML entity en/decode functions process single quotes and substitute by default.',
    'bc_globals_restrictions' => '<code>$GLOBALS</code> variable restrictions.',
    'bc_mysqli_exceptions' => 'MySQLi: Default error mode set to exceptions.',
    'bc_float_to_int_conversion' => 'Implicit incompatible float to int conversion is deprecated.',
    'bc_finfo_objects' => 'finfo Extension: <code>file_info</code> resource are migrated to existing finfo objects.',
    'bc_imap_objects' => 'IMAP: imap resources are <code>IMAP\Connection</code> class objects.',
    'bc_ftp_objects' => 'FTP Extension: Connection resources are <code>FTP\Connection</code> class objects.',
    'bc_gd_objects' => 'GD Extension: Font identifiers are <code>GdFont</code> class objects.',
    'bc_ldap_objects' => 'LDAP: resources migrated to <code>LDAP\Connection</code>, <code>LDAP\Result</code>, and <code>LDAP\ResultEntry</code> objects.',
    'bc_postgresql_objects' => 'PostgreSQL: resources migrated to <code>PgSql\Connection</code>, <code>PgSql\Result</code>, and <code>PgSql\Lob</code> objects.',
    'bc_pspell_objects' => 'Pspell: pspell, pspell config resources are <code>PSpell\Dictionary</code>, <code>PSpell\Config</code> class objects.',
    'bc_fsync_fdatasync' => 'New <code>fsync</code> and <code>fdatasync</code> functions.',
    'bc_array_is_list' => 'New <code>array_is_list</code> function.',
    'bc_sodium_xchacha20' => 'New Sodium XChaCha20 functions.',

    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_content' => '<p>
        For source downloads of PHP 8.1 please visit the <a href="https://www.php.net/downloads">downloads</a> page.
        Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site.
        The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog</a>.
      </p>
      <p>
        The <a href="/manual/en/migration81.php">migration guide</a> is available in the PHP Manual. Please
        consult it for a detailed list of new features and backward-incompatible changes.
      </p>',
];