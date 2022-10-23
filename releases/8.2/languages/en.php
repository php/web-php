<?php

return [
    'common_header' => 'PHP 8.2 is a major update of the PHP language. Readonly classes, null, false, and true as stand-alone types, deprecated dynamic properties, performance improvements and more',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.2 is a major update of the PHP language.<br class="display-none-md">It contains many new features, including readonly classes, null, false, and true as stand-alone types, deprecated dynamic properties, performance improvements and more.',
    'upgrade_now' => 'Upgrade to PHP 8.2 now!',
    'readonly_classes_title' => 'Readonly classes',
    'dnf_types_title' => 'Disjunctive Normal Form (DNF) Types',
    'dnf_types_description' => 'DNF types allow us to combine <a href="/manual/en/language.types.declarations.php#language.types.declarations.composite.union">union</a> and <a href="/manual/en/language.types.declarations.php#language.types.declarations.composite.intersection">intersection</a> types, following a strict rule: when combining union and intersection types, intersection types must be grouped with brackets.',
    'random_title' => 'New "Random" extension',
    'random_description' => '<p>The "random" extension provides a new object-oriented API to random number generation. Instead of relying on a globally seeded random number generator (RNG) using the Mersenne Twister algorithm the object-oriented API provides several classes ("Engine"s) providing access to modern algorithms that store their state within objects to allow for multiple independent seedable sequences.</p>
        <p>The <code>\Random\Randomizer</code> class provides a high level interface to use the engine\'s randomness to generate a random integer, to shuffle an array or string, to select random array keys and more.</p>',
    'constants_in_traits_title' => 'Constants in traits',
    'constants_in_traits_description' => 'You cannot access the constant through the name of the trait, but, you can access the constant through the class that uses the trait.',
    'deprecate_dynamic_properties_title' => 'Deprecate dynamic properties',
    'deprecate_dynamic_properties_description' => '<p>The creation of dynamic properties is deprecated to help avoid mistakes and typos, unless the class opts in by using the <code>#[\AllowDynamicProperties]</code> attribute. <code>stdClass</code> allows dynamic properties.</p>
        <p>Usage of the <code>__get</code>/<code>__set</code> magic methods is not affected by this change.</p>',
    'new_classes_title' => 'New Classes, Interfaces, and Functions',
    'new_mysqli' => 'New <code>mysqli_execute_query</code> function and <code>mysqli::execute_query</code> method.',
    'new_attributes' => 'New <code>#[\AllowDynamicProperties]</code> and <code>#[\SensitiveParameter]</code> attributes.',
    'new_zip' => 'New <code>ZipArchive::getStreamIndex</code>, <code>ZipArchive::getStreamName</code>, and <code>ZipArchive::clearError</code> methods.',
    'new_reflection' => 'New <code>ReflectionFunction::isAnonymous</code> and <code>ReflectionMethod::hasPrototype</code> methods.',
    'new_functions' => 'New <code>curl_upkeep</code>, <code>memory_reset_peak_usage</code>, <code>ini_parse_quantity</code>, <code>libxml_get_external_entity_loader</code>, <code>sodium_crypto_stream_xchacha20_xor_ic</code>, <code>openssl_cipher_key_length</code> functions.',
    'bc_title' => 'Deprecations and backward compatibility breaks',
    'bc_string_interpolation' => 'Deprecated <code>${}</code> string interpolation.',
    'bc_utf8' => 'Deprecated <code>utf8_encode</code> and <code>utf8_decode</code> functions.',
    'bc_datetime' => 'Methods <code>DateTime::createFromImmutable</code> and <code>DateTimeImmutable::createFromMutable</code> has a tentative return type of <code>static</code>.',
    'bc_odbc' => 'Extensions <code>ODBC</code> and <code>PDO_ODBC</code> escapes the username and password.',
    'bc_str_locale_sensitive' => 'Functions <code>strtolower</code> and <code>strtoupper</code> are locale-sensitive.',
    'bc_spl_enforces_signature' => 'Methods <code>SplFileObject::getCsvControl</code>, <code>SplFileObject::fflush</code>, <code>SplFileObject::ftell</code>, <code>SplFileObject::fgetc</code>,and <code>SplFileObject::fpassthru</code> enforces their signature.',
    'bc_spl_false' => 'Method <code>SplFileObject::hasChildren</code> has a tentative return type of <code>false</code>.',
    'bc_spl_null' => 'Method <code>SplFileObject::getChildren</code> has a tentative return type of <code>null</code>.',
    'bc_spl_deprecated' => 'The internal method <code>SplFileInfo::_bad_state_ex</code> has been deprecated.',
    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_description' => '<p>For source downloads of PHP 8.2 please visit the <a href="https://www.php.net/downloads">downloads</a> page. Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site. The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#PHP_8_2">ChangeLog</a>.</p>
        <p>The <a href="/manual/en/migration82.php">migration guide</a> is available in the PHP Manual. Please consult it for a detailed list of new features and backward-incompatible changes.</p>',
];
