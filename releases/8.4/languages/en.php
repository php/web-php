<?php

return [
    'common_header' => 'PHP 8.4 is a major update of the PHP language. It contains many new features, such as property hooks, asymmetric visibility, lazy objects, and additions to the randomness functionality. As always it also includes performance improvements, bug fixes, and general cleanup.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.4 is a major update of the PHP language.<br class="display-none-md"> It contains many new features, such as property hooks, asymmetric visibility, lazy objects, and additions to the randomness functionality. As always it also includes performance improvements, bug fixes, and general cleanup.',
    'upgrade_now' => 'Upgrade to PHP 8.4 now!',

    'property_hooks_title' => 'Property hooks',
    'asymmetric_visibility_title' => 'Asymmetric Visibility',
    'domdocument_html5_parser_title' => 'New HTML5 support',
    'dom_additions_84_title' => 'New ext-dom features',
    'new_without_parentheses_title' => 'new MyClass()->method() without parentheses',

    'new_classes_title' => 'New Classes, Interfaces, and Functions',
    'new_bc_functions' => 'New <code>bcfloor()</code>, <code>bcceil()</code>, and <code>bcround()</code> functions.',
    'new_dom_methods' => 'New <code>DOMNode::compareDocumentPosition()</code>, <code>DOMXPath::registerPhpFunctionNS()</code>, and <code>DOMXPath::quote()</code> methods.',
    'new_intl_methods' => 'New <code>IntlDateFormatter::getIanaID()</code>, <code>IntlDateFormatter::parseToCalendar()</code>, and <code>SpoofChecker::setAllowedChars()</code> methods, and also <code>intltz_get_iana_id()</code>, <code>grapheme_str_split()</code> functions.',
    'new_mbstring_functions' => 'New <code>mb_trim()</code>, <code>mb_ltrim()</code>, <code>mb_rtrim()</code>, <code>mb_ucfirst()</code>, and <code>mb_lcfirst()</code> functions.',
    'new_pcntl_functions' => 'New <code>pcntl_setns()</code>, <code>pcntl_getcpuaffinity()</code>, <code>pcntl_setcpuaffinity()</code>, <code>pcntl_getcpu()</code>, <code>pcntl_waitid()</code>, and <code>pcntl_getqos_class()</code> functions.',
    'new_pdo_method' => 'New <code>Pdo\Pgsql::setNoticeCallback()</code> method.',
    'new_pgsql_functions' => 'New <code>pg_change_password()</code>, <code>pg_put_copy_data()</code>, <code>pg_socket_poll()</code>, <code>pg_jit()</code>, and <code>pg_set_chunked_rows_size()</code> functions.',
    'new_reflection_methods' => 'New <code>ReflectionClass::newLazyGhost()</code>, <code>ReflectionClass::newLazyProxy()</code>, <code>ReflectionClass::resetAsLazyGhost()</code>, <code>ReflectionClass::resetAsLazyProxy()</code>, <code>ReflectionClass::isUninitializedLazyObject()</code>, <code>ReflectionClass::initializeLazyObject()</code>, <code>ReflectionClass::markLazyObjectAsInitialized()</code>, <code>ReflectionClass::getLazyInitializer()</code>, <code>ReflectionProperty::skipLazyInitialization</code>, and <code>ReflectionProperty::setRawValueWithoutLazyInitialization</code> methods.',
    'new_sodium_functions' => 'New <code>sodium_crypto_aead_aegis128l_*()</code>, <code>sodium_crypto_aead_aegis256l_*()</code>, and <code>sodium_crypto_aead_aes256gcm_*()</code> functions.',
    'new_soap_method' => 'New <code>SoapServer::__getLastResponse()</code> method.',
    'new_standard_functions' => 'New <code>http_get_last_response_headers()</code>, <code>http_clear_last_response_headers()</code>, <code>fpow()</code>, <code>array_find()</code>, <code>array_find_key()</code>, <code>array_all()</code>, and <code>array_any()</code> functions.',
    'new_tidy_methods' => 'New <code>tidyNode::getNextSibling()</code> and <code>tidyNode::getPreviousSibling()</code> methods.',
    'new_xml_methods' => 'New <code>XMLReader::fromStream()</code>, <code>XMLReader::fromUri()</code>, <code>XMLReader::fromString()</code>, <code>XMLWriter::toStream()</code>, <code>XMLWriter::toUri()</code>, and <code>XMLWriter::toMemory()</code> methods.',
    'new_xsl_method' => 'New <code>XSLTProcessor::registerPhpFunctionNS()</code> method.',

    'bc_title' => 'Deprecations and backward compatibility breaks',
    'bc_pecl' => 'The IMAP, OCI8, PDO_OCI, and pspell extensions have been unbundled and moved to PECL.',
    'bc_nullable_parameter_types' => 'Implicitly nullable parameter types are now deprecated.',
    'bc_classname' => 'Using <code>_</code> as a class name is now deprecated.',

    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_description' => '<p>For source downloads of PHP 8.4 please visit the <a href="/downloads">downloads</a> page. Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site. The list of changes is recorded in the <a href="/ChangeLog-8.php#PHP_8_4">ChangeLog</a>.</p>
        <p>The <a href="/manual/en/migration84.php">migration guide</a> is available in the PHP Manual. Please consult it for a detailed list of new features and backward-incompatible changes.</p>',
];
