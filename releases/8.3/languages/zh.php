<?php

/**
 * En-revision: 1f6e3ae4d455815ffdb42c4dbe23d6a03b0e0c1b
 */

return [
    'common_header' => 'PHP 8.3 是 PHP 语言的一次重大更新。它包含了许多新功能，例如：类常量显式类型、只读属性深拷贝，以及对随机性功能的补充。一如既往，它还包括性能改进、错误修复和常规清理等。',
    'documentation' => '文档',
    'main_title' => '已发布！',
    'main_subtitle' => 'PHP 8.3 是 PHP 语言的一次重大更新。<br class="display-none-md">它包含了许多新功能，例如：类常量显式类型、只读属性深拷贝，以及对随机性功能的补充。一如既往，它还包括性能改进、错误修复和常规清理等。',
    'upgrade_now' => '更新到 PHP 8.3 ！',

    'readonly_title' => '只读属性深拷贝',
    'readonly_description' => '<code>readonly</code> 属性现在可以在魔术方法 <code>__clone</code> 中被修改一次，以此实现只读属性的深拷贝',
    'json_validate_title' => '新增 <code>json_validate()</code> 函数',
    'json_validate_description' => '<code>json_validate()</code> 可以检查一个字符串是否为语法正确的 JSON，比 <code>json_decode()</code> 更有效。',
    'typed_class_constants_title' => '类型化类常量',
    'override_title' => '新增 <code>#[\Override]</code> 属性',
    'override_description' => '通过给方法添加 <code>#[\Override]</code> 属性，PHP 将确保在父类或实现的接口中存在同名的方法。添加该属性表示明确说明覆盖父方法是有意为之，并且简化了重构过程，因为删除被覆盖的父方法将被检测出来。',
    'randomizer_getbytesfromstring_title' => '新增 <code>Randomizer<span style="word-break: break-all;">::</span>getBytesFromString()</code> 方法',
    'randomizer_getbytesfromstring_description' => '在 PHP 8.2 中新增的 <a href="/releases/8.2/zh.php#random_extension">Random 扩展</a> 通过一个新方法生成由特定字节组成的随机字符串。这种方法可以使开发者更轻松的生成随机的标识符（如域名），以及任意长度的数字字符串。',
    'randomizer_getfloat_nextfloat_title' => '新增 <code>Randomizer::getFloat()</code> 和 <code>Randomizer::nextFloat()</code> 方法',
    'randomizer_getfloat_nextfloat_description' => '<p>由于浮点数的精度和隐式四舍五入的限制，在特定区间内生成无偏差的浮点数并非易事，常建的用户解决方案可能会生成有偏差的结果或超出要求范围的数字。</p><p>Randomizer 扩展了两种方法，用于随机生成无偏差的浮点数。<code>Randomizer::getFloat()</code> 方法使用的是 γ-section 算法，该算法发表于 <a href="https://doi.org/10.1145/3503512" target="_blank" rel="noopener noreferrer">Drawing Random Floating-Point Numbers from an Interval. Frédéric Goualard, ACM Trans. Model. Comput. Simul., 32:3, 2022.</a></p>',
    'dynamic_class_constant_fetch_title' => '动态获取类常量',
    'command_line_linter_title' => '命令行 linter 支持多个文件',
    'command_line_linter_description' => '<p>命令行 linter 现在接受文件名的可变输入以进行 lint</p>',

    'new_classes_title' => '新的类、接口和函数',
    'new_dom' => '新增 <a href="/manual/zh/domelement.getattributenames.php"><code>DOMElement::getAttributeNames()</code></a>、<a href="/manual/zh/domelement.insertadjacentelement.php"><code>DOMElement::insertAdjacentElement()</code></a>、<a href="/manual/zh/domelement.insertadjacenttext.php"><code>DOMElement::insertAdjacentText()</code></a>、<a href="/manual/zh/domelement.toggleattribute.php"><code>DOMElement::toggleAttribute()</code></a>、<a href="/manual/zh/domnode.contains.php"><code>DOMNode::contains()</code></a>、<a href="/manual/zh/domnode.getrootnode.php"><code>DOMNode::getRootNode()</code></a>、<a href="/manual/zh/domnode.isequalnode.php"><code>DOMNode::isEqualNode()</code></a>、<code>DOMNameSpaceNode::contains()</code> 和 <a href="/manual/zh/domparentnode.replacechildren.php"><code>DOMParentNode::replaceChildren()</code></a> 方法。',
    'new_intl' => '新增 <a href="/manual/zh/intlcalendar.setdate.php"><code>IntlCalendar::setDate()</code></a>、<a href="/manual/zh/intlcalendar.setdatetime.php"><code>IntlCalendar::setDateTime()</code></a>、<a href="/manual/zh/intlgregoriancalendar.createfromdate.php"><code>IntlGregorianCalendar::createFromDate()</code></a> 和 <a href="/manual/zh/intlgregoriancalendar.createfromdatetime.php"><code>IntlGregorianCalendar::createFromDateTime()</code></a> 方法。',
    'new_ldap' => '新增 <code>ldap_connect_wallet()</code> 和 <code>ldap_exop_sync()</code> 函数。',
    'new_mb_str_pad' => '新增 <a href="/manual/zh/function.mb-str-pad.php"><code>mb_str_pad()</code></a> 函数。',
    'new_posix' => '新增 <a href="/manual/zh/function.posix-sysconf.php"><code>posix_sysconf()</code></a>、<a href="/manual/zh/function.posix-pathconf.php"><code>posix_pathconf()</code></a>、<a href="/manual/zh/function.posix-fpathconf.php"><code>posix_fpathconf()</code></a> 和 <a href="/manual/zh/function.posix-eaccess.php"><code>posix_eaccess()</code></a> 函数。',
    'new_reflection' => '新增 <a href="/manual/zh/reflectionmethod.createfrommethodname.php"><code>ReflectionMethod::createFromMethodName()</code></a> 方法',
    'new_socket' => '新增 <a href="/manual/zh/function.socket-atmark.php"><code>socket_atmark()</code></a> 函数。',
    'new_str' => '新增 <a href="/manual/zh/function.str-increment.php"><code>str_increment()</code></a>、<a href="/manual/zh/function.str-decrement.php"><code>str_decrement()</code></a> 和 <a href="/manual/zh/function.stream-context-set-options.php"><code>stream_context_set_options()</code></a> 函数。',
    'new_ziparchive' => '新增 <a href="/manual/zh/ziparchive.getarchiveflag.php"><code>ZipArchive::getArchiveFlag()</code></a> 方法。',
    'new_openssl_ec' => '支持在 OpenSSL 扩展中使用自定义 EC 参数生成 EC 密钥。',
    'new_ini' => '新增 INI 设置 <a href="/manual/zh/migration83.other-changes.php#migration83.other-changes.ini"><code>zend.max_allowed_stack_size</code></a> 用于设置允许的最大堆栈大小。',
    'ini_fallback' => 'php.ini 现在支持后备/默认值语法。',
    'anonymous_readonly' => '匿名类现在可以是只读的。',

    'bc_title' => '弃用和向后不兼容',
    'bc_datetime' => '<a href="https://wiki.php.net/rfc/datetime-exceptions">更合适的 Date/Time 异常。</a>',
    'bc_arrays' => '现在在空数组中获取负索引 <code>n</code> 时，将确保下一个索引是 <code>n + 1</code> 而不是 <code>0</code>。',
    'bc_range' => '对 <code>range()</code> 函数的更改。',
    'bc_traits' => '在 traits 中重新声明静态属性的更改。',
    'bc_umultipledecimalseparators' => '<code>U_MULTIPLE_DECIMAL_SEPERATORS</code> 常量已被废弃，改为 <code>U_MULTIPLE_DECIMAL_SEPARATORS</code>。',
    'bc_mtrand' => '<a href="/manual/zh/random.constants.php#constant.mt-rand-php"><code>MT_RAND_PHP</code></a> Mt19937 变体已被废弃。',
    'bc_reflection' => '<a href="/manual/zh/reflectionclass.getstaticproperties.php"><code>ReflectionClass::getStaticProperties()</code></a> 不再为空。',
    'bc_ini' => 'INI 配置 <a href="/manual/zh/info.configuration.php#ini.assert.active"><code>assert.active</code></a>、<a href="/manual/zh/info.configuration.php#ini.assert.bail"><code>assert.bail</code></a>、<a href="/manual/zh/info.configuration.php#ini.assert.callback"><code>assert.callback</code></a>、<a href="/manual/zh/info.configuration.php#ini.assert.exception"><code>assert.exception</code></a> 和 <a href="/manual/zh/info.configuration.php#ini.assert.warning"><code>assert.warning</code></a> 已被废弃。',
    'bc_standard' => '调用 <a href="/manual/zh/function.get-class.php"><code>get_class()</code></a> 和 <a href="/manual/zh/function.get-parent-class.php"><code>get_parent_class()</code></a> 时未提供参数，已被废弃。',
    'bc_sqlite3' => 'SQLite3：默认错误模式设置为异常。',

    'footer_title' => '更好的性能、更好的语法、改进类型安全。',
    'footer_description' => '<p>
        请访问 <a href="/downloads">下载</a> 页面下载 PHP 8.3 源代码。
        在 <a href="https://windows.php.net/download">PHP for Windows</a> 站点中可找到 Windows 二进制文件。
        <a href="https://www.php.net/ChangeLog-8.php#PHP_8_3">ChangeLog</a> 中有变更历史记录清单。
      </p>
      <p>
        PHP 手册中有 <a href="/manual/zh/migration83.php">迁移指南</a>。
        请参考它描述的新功能详细清单、向后不兼容的变化。
      </p>',
];
