<?php

return [
    'common_header' => 'PHP 8.3 is a major update of the PHP language. It contains many new features, such as explicit typing of class constants, deep-cloning of readonly properties and additions to the randomness functionality. As always it also includes performance improvements, bug fixes and general cleanup.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.3 is a major update of the PHP language.<br class="display-none-md">It contains many new features, such as explicit typing of class constants, deep-cloning of readonly properties and additions to the randomness functionality. As always it also includes performance improvements, bug fixes and general cleanup.',
    'upgrade_now' => 'Upgrade to PHP 8.3 now!',

    'readonly_title' => 'Deep-cloning of readonly properties',
    'readonly_description' => '<code>readonly</code> properties may now be modified once within the magic <code>__clone</code> method to enable deep-cloning of readonly properties.',
    'json_validate_title' => 'New <code>json_validate()</code> function',
    'json_validate_description' => '<code>json_validate()</code> allows to check if a string is syntactically valid JSON, while being more efficient than <code>json_decode()</code>.',
    'typed_class_constants_title' => 'Typed class constants',
    'override_title' => 'New <code>#[\Override]</code> attribute',
    'override_description' => 'By adding the <code>#[\Override]</code> attribute to a method, PHP will ensure that a method with the same name exists in a parent class or in an implemented interface. Adding the attribute makes it clear that overriding a parent method is intentional and simplifies refactoring, because the removal of an overridden parent method will be detected.',
    'randomizer_getbytesfromstring_title' => 'New <code>Randomizer<span style="word-break: break-all;">::</span>getBytesFromString()</code> method',
    'randomizer_getbytesfromstring_description' => 'The <a href="/releases/8.2/en.php#random_extension">Random Extension</a> that was added in PHP 8.2 was extended by a new method to generate random strings consisting of specific bytes only. This method allows to easily generate random identifiers, such as domain names, and numeric strings of arbitrary length.',
    'randomizer_getfloat_nextfloat_title' => 'New <code>Randomizer::getFloat()</code> and <code>Randomizer::nextFloat()</code> methods',
    'randomizer_getfloat_nextfloat_description' => '<p>Due to the limited precision and implicit rounding of floating point numbers, generating an unbiased float lying within a specific interval is non-trivial and the commonly used userland solutions may generate biased results or numbers outside the requested range.</p><p>The Randomizer was also extended with two methods to generate random floats in an unbiased fashion. The <code>Randomizer::getFloat()</code> method uses the γ-section algorithm that was published in <a href="https://doi.org/10.1145/3503512" target="_blank" rel="noopener noreferrer">Drawing Random Floating-Point Numbers from an Interval. Frédéric Goualard, ACM Trans. Model. Comput. Simul., 32:3, 2022.</a></p>',
    'dynamic_class_constant_fetch_title' => 'Dynamic class constant fetch',

    'new_classes_title' => 'New Classes, Interfaces, and Functions',
    'new_dom' => 'New <a href="/manual/en/domelement.getattributenames.php"><code>DOMElement::getAttributeNames()</code></a>, <a href="/manual/en/domelement.insertadjacentelement.php"><code>DOMElement::insertAdjacentElement()</code></a>, <a href="/manual/en/domelement.insertadjacenttext.php"><code>DOMElement::insertAdjacentText()</code></a>, <a href="/manual/en/domelement.toggleattribute.php"><code>DOMElement::toggleAttribute()</code></a>, <a href="/manual/en/domnode.contains.php"><code>DOMNode::contains()</code></a>, <a href="/manual/en/domnode.getrootnode.php"><code>DOMNode::getRootNode()</code></a>, <a href="/manual/en/domnode.isequalnode.php"><code>DOMNode::isEqualNode()</code></a>, <code>DOMNameSpaceNode::contains()</code>, and <a href="/manual/en/domparentnode.replacechildren.php"><code>DOMParentNode::replaceChildren()</code></a> methods.',
    'new_intl' => 'New <a href="/manual/en/intlcalendar.setdate.php"><code>IntlCalendar::setDate()</code></a>, <a href="/manual/en/intlcalendar.setdatetime.php"><code>IntlCalendar::setDateTime()</code></a>, <a href="/manual/en/intlgregoriancalendar.createfromdate.php"><code>IntlGregorianCalendar::createFromDate()</code></a>, and <a href="/manual/en/intlgregoriancalendar.createfromdatetime.php"><code>IntlGregorianCalendar::createFromDateTime()</code></a> methods.',
    'new_ldap' => 'New <code>ldap_connect_wallet()</code>, and <code>ldap_exop_sync()</code> functions.',
    'new_mb_str_pad' => 'New <a href="/manual/en/function.mb-str-pad.php"><code>mb_str_pad()</code></a> function.',
    'new_posix' => 'New <a href="/manual/en/function.posix-sysconf.php"><code>posix_sysconf()</code></a>, <a href="/manual/en/function.posix-pathconf.php"><code>posix_pathconf()</code></a>, <a href="/manual/en/function.posix-fpathconf.php"><code>posix_fpathconf()</code></a>, and <a href="/manual/en/function.posix-eaccess.php"><code>posix_eaccess()</code></a> functions.',
    'new_reflection' => 'New <a href="/manual/en/reflectionmethod.createfrommethodname.php"><code>ReflectionMethod::createFromMethodName()</code></a> method.',
    'new_socket' => 'New <a href="/manual/en/function.socket-atmark.php"><code>socket_atmark()</code></a> function.',
    'new_str' => 'New <a href="/manual/en/function.str-increment.php"><code>str_increment()</code></a>, <a href="/manual/en/function.str-decrement.php"><code>str_decrement()</code></a>, and <a href="/manual/en/function.stream-context-set-option.php"><code>stream_context_set_options()</code></a> functions.',
    'new_ziparchive' => 'New <a href="/manual/en/ziparchive.getarchiveflag.php"><code>ZipArchive::getArchiveFlag()</code></a> method.',
    'new_openssl_ec' => 'Support for generation EC keys with custom EC parameters in OpenSSL extension.',
    'new_ini' => 'New INI setting <a href="/manual/en/migration83.other-changes.php#migration83.other-changes.ini"><code>zend.max_allowed_stack_size</code></a> to set the maximum allowed stack size.',

    'bc_title' => 'Deprecations and backward compatibility breaks',
    'bc_datetime' => 'More Appropriate Date/Time Exceptions.',
    'bc_arrays' => 'Assigning a negative index <code>n</code> to an empty array will now make sure that the next index is <code>n + 1</code> instead of <code>0</code>.',
    'bc_range' => 'Changes to the <code>range()</code> function.',
    'bc_traits' => 'Changes in re-declaration of static properties in traits.',
    'bc_umultipledecimalseparators' => 'The <code>U_MULTIPLE_DECIMAL_SEPERATORS</code> constant is deprecated in favor of <code>U_MULTIPLE_DECIMAL_SEPARATORS</code>.',
    'bc_mtrand' => 'The <a href="/manual/en/random.constants.php#constant.mt-rand-php"><code>MT_RAND_PHP</code></a> Mt19937 variant is deprecated.',
    'bc_reflection' => '<a href="/manual/en/reflectionclass.getstaticproperties.php"><code>ReflectionClass::getStaticProperties()</code></a> is no longer nullable.',
    'bc_ini' => 'INI settings <a href="/manual/en/info.configuration.php#ini.assert.active"><code>assert.active</code></a>, <a href="/manual/en/info.configuration.php#ini.assert.bail"><code>assert.bail</code></a>, <a href="/manual/en/info.configuration.php#ini.assert.callback"><code>assert.callback</code></a>, <a href="/manual/en/info.configuration.php#ini.assert.exception"><code>assert.exception</code></a>, and <a href="/manual/en/info.configuration.php#ini.assert.warning"><code>assert.warning</code></a> have been deprecated.',

    'footer_title' => 'Better performance, better syntax, improved type safety.',
    'footer_description' => '<p>For source downloads of PHP 8.3 please visit the <a href="/downloads">downloads</a> page. Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site. The list of changes is recorded in the <a href="/ChangeLog-8.php#PHP_8_3">ChangeLog</a>.</p>
        <p>The <a href="/manual/en/migration83.php">migration guide</a> is available in the PHP Manual. Please consult it for a detailed list of new features and backward-incompatible changes.</p>',
];
