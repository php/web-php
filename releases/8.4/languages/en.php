<?php

return [
    'common_header' => 'PHP 8.4 is a major update of the PHP language. It contains many new features, such as property hooks, asymmetric visibility, an updated DOM API, performance improvements, bug fixes, and general cleanup.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.4 is a major update of the PHP language.<br class="display-none-md"> It contains many new features, such as property hooks, asymmetric visibility, an updated DOM API, performance improvements, bug fixes, and general cleanup.',
    'upgrade_now' => 'Upgrade to PHP 8.4 now!',

    'property_hooks_title' => 'Property hooks',
    'asymmetric_visibility_title' => 'Asymmetric Visibility',
    'deprecated_attribute_title' => '<code>#[\Deprecated]</code> Attribute',
    'dom_additions_html5_title' => 'New ext-dom features and HTML5 support',
    'dom_additions_html5_description' => 'New <code>DOMNode::compareDocumentPosition()</code>, <code>DOMXPath::registerPhpFunctionNS()</code>, <code>DOMXPath::quote()</code>, and <code>XSLTProcessor::registerPHPFunctionNS()</code> methods are available.',
    'new_array_find_title' => 'New <code>array_*()</code> functions',
    'pdo_driver_specific_parsers_title' => 'PDO Driver specific SQL parsers',
    'pdo_driver_specific_parsers_description' => 'New subclasses <code>Pdo\Dblib</code>, <code>Pdo\Firebird</code>, <code>Pdo\MySql</code>, <code>Pdo\Odbc</code>, <code>Pdo\Sqlite</code> of <code>PDO</code> are available.',
    'new_array_find_description' => 'New functions <code>array_find()</code>, <code>array_find_key()</code>, <code>array_any()</code>, and <code>array_all()</code> are available.',
    'new_without_parentheses_title' => 'new MyClass()->method() without parentheses',

    'new_classes_title' => 'New Classes, Interfaces, and Functions',
    'new_core_functions' => 'New <code>request_parse_body()</code> function.',
    'new_bcmath_functions' => 'New <code>bcceil()</code>, <code>bcdivmod()</code>, <code>bcfloor()</code>, and <code>bcround()</code> functions.',
    'new_date_functions' => 'New <code>DateTime::createFromTimestamp()</code>, <code>DateTime::getMicrosecond()</code>, <code>DateTime::setMicrosecond()</code>, <code>DateTimeImmutable::createFromTimestamp()</code>, <code>DateTimeImmutable::getMicrosecond()</code>, and <code>DateTimeImmutable::setMicrosecond()</code> methods.',
    'new_mb_functions' => 'New <code>mb_trim()</code>, <code>mb_ltrim()</code>, <code>mb_rtrim()</code>, <code>mb_ucfirst()</code>, and <code>mb_lcfirst()</code> functions.',
    'new_pcntl_functions' => 'New <code>pcntl_getcpu()</code>, <code>pcntl_getcpuaffinity()</code>, <code>pcntl_getqos_class()</code>, <code>pcntl_setns()</code>, and <code>pcntl_waitid()</code> functions.',
    'new_reflection_functions' => 'New <code>ReflectionClassConstant::isDeprecated()</code>, <code>ReflectionGenerator::isClosed()</code>, and <code>ReflectionProperty::isDynamic()</code> methods.',
    'new_standard_functions' => 'New <code>http_get_last_response_headers()</code>, <code>http_clear_last_response_headers()</code>, <code>fpow()</code>, <code>array_all()</code>, <code>array_any()</code>, <code>array_find()</code>, and <code>array_find_key()</code> functions.',
    'new_xml_functions' => 'New <code>XMLReader::fromStream()</code>, <code>XMLReader::fromUri()</code>, <code>XMLReader::fromString()</code>, <code>XMLWriter::toStream()</code>, <code>XMLWriter::toUri()</code>, and <code>XMLWriter::toMemory()</code> methods.',

    'bc_title' => 'Deprecations and backward compatibility breaks',
    'bc_pecl' => 'The IMAP, OCI8, PDO_OCI, and pspell extensions have been unbundled and moved to PECL.',
    'bc_nullable_parameter_types' => 'Implicitly nullable parameter types are now deprecated.',
    'bc_classname' => 'Using <code>_</code> as a class name is now deprecated.',
    'bc_zero_raised_to_negative_number' => 'Raising zero to the power of a negative number is now deprecated.',
    'bc_gmp' => '<code>GMP</code> class is now final.',
    'bc_mysqli_constants' => '<code>MYSQLI_SET_CHARSET_DIR</code>, <code>MYSQLI_STMT_ATTR_PREFETCH_ROWS</code>, <code>MYSQLI_CURSOR_TYPE_FOR_UPDATE</code>, <code>MYSQLI_CURSOR_TYPE_SCROLLABLE</code>, and <code>MYSQLI_TYPE_INTERVAL</code> constants have been removed.',
    'bc_mysqli_functions' => '<code>mysqli_ping()</code>, <code>mysqli_kill()</code>, <code>mysqli_refresh()</code> functions, <code>mysqli::ping()</code>, <code>mysqli::kill()</code>, <code>mysqli::refresh()</code> methods, and <code>MYSQLI_REFRESH_*</code> constants have been deprecated.',
    'bc_standard' => '<code>stream_bucket_make_writeable()</code> and <code>stream_bucket_new()</code> now return an instance of <code>StreamBucket</code> instead of <code>stdClass</code>.',
    'bc_core' => '<code>exit()</code> language construct is now a function.',
    'bc_warnings' => '<code>E_STRICT</code> constant has been deprecated.',

    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_description' => '<p>For source downloads of PHP 8.4 please visit the <a href="/downloads">downloads</a> page. Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site. The list of changes is recorded in the <a href="/ChangeLog-8.php#PHP_8_4">ChangeLog</a>.</p>
        <p>The <a href="/manual/en/migration84.php">migration guide</a> is available in the PHP Manual. Please consult it for a detailed list of new features and backward-incompatible changes.</p>',
];
