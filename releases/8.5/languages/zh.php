<?php

/**
 * En-revision: 71c7b315b8ce6cdfa59f363b95d29488dd9532e1
 */

return [
    'common_header' => 'PHP 8.4 是 PHP 语言的一次重大更新。它包含了许多新功能，例如属性钩子、不对称可见性、更新的 DOM API、性能改进、错误修复和常规清理等。',
    'documentation' => '文档',
    'main_title' => '已发布！',
    'main_subtitle' => 'PHP 8.4 是 PHP 语言的一次重大更新。<br class="display-none-md">它包含许多新功能，例如属性钩子、不对称可见性、更新的 DOM API、性能改进、错误修复和常规清理等。',
    'upgrade_now' => '更新到 PHP 8.4 ！',

    'property_hooks_title' => '属性钩子',
    'property_hooks_description' => '属性钩子提供对计算属性的支持，这些属性可以被 IDE 和静态分析工具直接理解，而无需编写可能会失效的 docblock 注释。此外，它们允许可靠地预处理或后处理值，而无需检查类中是否存在匹配的 getter 或 setter。',
    'asymmetric_visibility_title' => '不对称可见性',
    'asymmetric_visibility_description' => '现在可以独立地控制写入属性的作用域和读取属性的作用域，减少了需要编写繁琐的 getter 方法来公开属性值而不允许从类外部修改属性的需求。',
    'deprecated_attribute_title' => '<code>#[\Deprecated]</code> 属性',
    'deprecated_attribute_description' => '新的 <code>#[\Deprecated]</code> 属性使 PHP 的现有弃用机制可用于用户定义的函数、方法和类常量。',
    'dom_additions_html5_title' => '新的 ext-dom 功能和 HTML5 支持',
    'dom_additions_html5_description' => '<p>新的 DOM API 包括符合标准的支持，用于解析 HTML5 文档，修复了 DOM 功能行为中的几个长期存在的规范性错误，并添加了几个函数，使处理文档更加方便。</p><p>新的 DOM API 可以在 <code>Dom</code> 命名空间中使用。使用新的 DOM API 可以使用 <code>Dom\HTMLDocument</code> 和 <code>Dom\XMLDocument</code> 类创建文档。</p>',
    'bcmath_title' => 'BCMath 的对象 API',
    'bcmath_description' => '<p>新的 <code>BcMath\Number</code> 对象使在处理任意精度数字时可以使用面向对象的方式和标准的数学运算符。</p><p>这些对象是不可变的，并实现了 <code>Stringable</code> 接口，因此可以在字符串上下文中使用，如 <code>echo $num</code>。</p>',
    'new_array_find_title' => '新的 <code>array_*()</code> 函数',
    'new_array_find_description' => '新增函数 <a href="/manual/zh/function.array-find.php"><code>array_find()</code></a>、<a href="/manual/zh/function.array-find-key.php"><code>array_find_key()</code></a>、<a href="/manual/zh/function.array-any.php"><code>array_any()</code></a> 和 <a href="/manual/zh/function.array-all.php"><code>array_all()</code></a>。',
    'pdo_driver_specific_subclasses_title' => 'PDO 驱动程序特定子类',
    'pdo_driver_specific_subclasses_description' => '新的 <code>Pdo\Dblib</code>、<code>Pdo\Firebird</code>、<code>Pdo\MySql</code>、<code>Pdo\Odbc</code>、<code>Pdo\Pgsql</code> 和 <code>Pdo\Sqlite</code> 的子类可用。',
    'new_without_parentheses_title' => '<code>new MyClass()->method()</code> 不需要括号',
    'new_without_parentheses_description' => '现在可以在不使用括号包裹 <code>new</code> 表达式的情况下访问新实例化对象的属性和方法。',

    'new_classes_title' => '新的类、接口和函数',
    'new_lazy_objects' => '新的 <a href="/manual/zh/language.oop5.lazy-objects.php">延迟对象</a>。',
    'new_jit_implementation' => '基于 IR 框架的新 JIT 实现。',
    'new_core_functions' => '新增 <code>request_parse_body()</code> 函数。',
    'new_bcmath_functions' => '新增 <code>bcceil()</code>、<code>bcdivmod()</code>、<code>bcfloor()</code> 和 <code>bcround()</code> 函数。',
    'new_round_modes' => '新增 <code>RoundingMode</code> 枚举用于 <code>round()</code>，包括 4 个新的舍入模式 <code>TowardsZero</code>、<code>AwayFromZero</code>、<code>NegativeInfinity</code> 和 <code>PositiveInfinity</code>。',
    'new_date_functions' => '新增 <code>DateTime::createFromTimestamp()</code>、<code>DateTime::getMicrosecond()</code>、<code>DateTime::setMicrosecond()</code>、<code>DateTimeImmutable::createFromTimestamp()</code>、<code>DateTimeImmutable::getMicrosecond()</code> 和 <code>DateTimeImmutable::setMicrosecond()</code> 方法。',
    'new_mb_functions' => '新增 <code>mb_trim()</code>、<code>mb_ltrim()</code>、<code>mb_rtrim()</code>、<code>mb_ucfirst()</code> 和 <code>mb_lcfirst()</code> 函数。',
    'new_pcntl_functions' => '新增 <code>pcntl_getcpu()</code>、<code>pcntl_getcpuaffinity()</code>、<code>pcntl_getqos_class()</code>、<code>pcntl_setns()</code> 和 <code>pcntl_waitid()</code> 函数。',
    'new_reflection_functions' => '新增 <code>ReflectionClassConstant::isDeprecated()</code>、<code>ReflectionGenerator::isClosed()</code> 和 <code>ReflectionProperty::isDynamic()</code> 方法。',
    'new_standard_functions' => '新增 <code>http_get_last_response_headers()</code>、<code>http_clear_last_response_headers()</code> 和 <code>fpow()</code> 函数。',
    'new_xml_functions' => '新增 <code>XMLReader::fromStream()</code>、<code>XMLReader::fromUri()</code>、<code>XMLReader::fromString()</code>、<code>XMLWriter::toStream()</code>、<code>XMLWriter::toUri()</code> 和 <code>XMLWriter::toMemory()</code> 方法。',
    'new_grapheme_function' => '新增 <code>grapheme_str_split()</code> 函数。',

    'bc_title' => '弃用和向后不兼容',
    'bc_pecl' => 'IMAP、OCI8、PDO_OCI 和 pspell 扩展已从 PHP 中分离并移至 PECL。',
    'bc_nullable_parameter_types' => '隐式可空参数类型现已弃用。',
    'bc_classname' => '使用 <code>_</code> 作为类名现已弃用。',
    'bc_zero_raised_to_negative_number' => '将零的负数次幂现已弃用。',
    'bc_gmp' => '<code>GMP</code> 类现已是 final 类。',
    'bc_round' => '向 <code>round()</code> 传递无效模式将抛出 <code>ValueError</code>。',
    'bc_typed_constants' => '来自扩展 <code>date</code>、<code>intl</code>、<code>pdo</code>、<code>reflection</code>、<code>spl</code>、<code>sqlite</code>、<code>xmlreader</code> 的类常量现在是有类型的。',
    'bc_mysqli_constants' => '已删除 <code>MYSQLI_SET_CHARSET_DIR</code>、<code>MYSQLI_STMT_ATTR_PREFETCH_ROWS</code>、<code>MYSQLI_CURSOR_TYPE_FOR_UPDATE</code>、<code>MYSQLI_CURSOR_TYPE_SCROLLABLE</code> 和 <code>MYSQLI_TYPE_INTERVAL</code> 常量。',
    'bc_mysqli_functions' => '已弃用 <code>mysqli_ping()</code>、<code>mysqli_kill()</code>、<code>mysqli_refresh()</code> 函数，<code>mysqli::ping()</code>、<code>mysqli::kill()</code>、<code>mysqli::refresh()</code> 方法，以及 <code>MYSQLI_REFRESH_*</code> 常量。',
    'bc_standard' => '<code>stream_bucket_make_writeable()</code> 和 <code>stream_bucket_new()</code> 现在返回 <code>StreamBucket</code> 实例而不是 <code>stdClass</code>。',
    'bc_core' => '<a href="/manual/zh/migration84.incompatible.php#migration84.incompatible.core.exit"><code>exit()</code> 行为变更</a>。',
    'bc_warnings' => '<code>E_STRICT</code> 常量已弃用。',

    'footer_title' => '更好的性能、更好的语法、改进类型安全。',
    'footer_description' => '<p>请访问 <a href="/downloads">下载</a> 页面下载 PHP 8.4 源代码。
        在 <a href="https://windows.php.net/download">PHP for Windows</a> 站点中可找到 Windows 二进制文件。
        <a href="/ChangeLog-8.php#PHP_8_4">ChangeLog</a> 中有变更历史记录清单。</p>
        <p>PHP 手册中有 <a href="/manual/zh/migration84.php">迁移指南</a>。
        请参考它描述的新功能详细清单、向后不兼容的变化。</p>',
];
