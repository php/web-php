<?php

return [
    'common_header' => 'PHP 8.3 is a major update of the PHP language. Readonly amendments, Typed class constants, #[Override] attribute, Randomizer additions, performance improvements and more',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.3 is a major update of the PHP language.<br class="display-none-md">It contains many new features, including Readonly amendments, Typed class constants, Randomizer additions, performance improvements and more.',
    'upgrade_now' => 'Upgrade to PHP 8.3 now!',

    'readonly_title' => 'Readonly amendments',
    'readonly_description' => '<code>readonly</code> properties may now be modified once within the magic <code>__clone</code> method to enable deep-cloning of readonly properties.',
    'json_validate_title' => 'New <code>json_validate()</code> function',
    'json_validate_description' => '<code>json_validate()</code> allows to check if a string is syntactically valid JSON, while being more efficient than <code>json_decode()</code>.',
    'typed_class_constants_title' => 'Typed class constants',
    'override_title' => '<code>#[\Override]</code> attribute',
    'override_description' => 'By adding the <code>#[\Override]</code> attribute to a method, PHP will ensure that a method with the same name exists in a parent class or in an implemented interface. Adding the attribute makes it clear that overriding a parent method is intentional and simplifies refactoring, because the removal of an overridden parent method will be detected.',
    'randomizer_getbytesfromstring_title' => 'New <code>Randomizer<span style="word-break: break-all;">::</span>getBytesFromString()</code> method',
    'randomizer_getbytesfromstring_description' => 'The <a href="/releases/8.2/en.php#random_extension">Random Extension</a> that was added in PHP 8.2 was extended by a new method to generate random strings consisting of specific bytes only. This method allows to easily generate random identifiers, such as domain names, and numeric strings of arbitrary length.',
    'randomizer_getfloat_nextfloat_title' => 'New <code>Randomizer::getFloat()</code> and <code>Randomizer::nextFloat()</code> methods',
    'randomizer_getfloat_nextfloat_description' => 'The algorithm used is the γ-section algorithm as published in:
            <a href="https://doi.org/10.1145/3503512" target="_blank" rel="noopener noreferrer">Drawing Random
                Floating-Point Numbers from an Interval</a>.
            Frédéric Goualard, ACM Trans. Model. Comput. Simul., 32:3, 2022.',
    'dynamic_class_constant_fetch_title' => 'Dynamic class constant fetch',

    'new_classes_title' => 'New Classes, Interfaces, and Functions',
    'new_dom' => 'New <code>DOMElement::getAttributeNames()</code>, <code>DOMElement::insertAdjacentElement()</code>, <code>DOMElement::insertAdjacentText()</code>,  <code>DOMElement::toggleAttribute()</code>, <code>DOMNode::contains()</code>, <code>DOMNode::getRootNode()</code>, <code>DOMNode::isEqualNode()</code>, <code>DOMNameSpaceNode::contains()</code>, and <code>DOMParentNode::replaceChildren()</code> methods.',
    'new_intl' => 'New <code>IntlCalendar::setDate()</code>, <code>IntlCalendar::setDateTime()</code>, <code>IntlGregorianCalendar::createFromDate()</code>, and <code>IntlGregorianCalendar::createFromDateTime()</code> methods.',
    'new_ldap' => 'New <code>ldap_connect_wallet()</code>, and <code>ldap_exop_sync()</code> functions.',
    'new_mb_str_pad' => 'New <code>mb_str_pad()</code> function.',
    'new_posix' => 'New <code>posix_sysconf()</code>, <code>posix_pathconf()</code>, <code>posix_fpathconf()</code>, and <code>posix_eaccess()</code> functions.',
    'new_reflection' => 'New <code>ReflectionMethod::createFromMethodName()</code> method.',
    'new_socket' => 'New <code>socket_atmark()</code> function.',
    'new_str' => 'New <code>str_increment()</code>, <code>str_decrement()</code>, and <code>stream_context_set_options()</code> functions.',
    'new_ziparchive' => 'New <code>ZipArchive::getArchiveFlag()</code> function.',
    'new_openssl_ec' => 'Support for generation EC keys with custom EC parameters in OpenSSL extension.',

    'bc_title' => 'Deprecations and backward compatibility breaks',
    'bc_datetime' => 'More Appropriate Date/Time Exceptions.',
    'bc_arrays' => 'Assigning a negative index <code>n</code> to an empty array will now make sure that the next index is <code>n + 1</code> instead of <code>0</code>.',
    'bc_range' => 'Changes to the <code>range()</code> function.',
    'bc_traits' => 'Changes in re-declaration of static properties in traits.',
    'bc_umultipledecimalseparators' => 'The <code>U_MULTIPLE_DECIMAL_SEPERATORS</code> constant is deprecated in favor of <code>U_MULTIPLE_DECIMAL_SEPARATORS</code>.',
    'bc_mtrand' => 'The <code>MT_RAND_PHP</code> Mt19937 variant is deprecated.',
    'bc_reflection' => '<code>ReflectionClass::getStaticProperties()</code> is no longer nullable.',

    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_description' => '<p>For source downloads of PHP 8.3 please visit the <a href="/downloads">downloads</a> page. Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site. The list of changes is recorded in the <a href="/ChangeLog-8.php#PHP_8_3">ChangeLog</a>.</p>
        <p>The <a href="/manual/en/migration83.php">migration guide</a> is available in the PHP Manual. Please consult it for a detailed list of new features and backward-incompatible changes.</p>',
];
