<?php

/**
 * En-revision: 213a4fafd56620a4efebddaa5bf246afb0758782
 */

return [
    'common_header' => 'PHP 8.1 是 PHP 语言的一次重大更新。它包含了许多新功能，包括枚举、只读属性、First-class 可调用语法、纤程、交集类型和性能改进等。',
    'main_title' => '已发布！',
    'main_subtitle' => 'PHP 8.1 是 PHP 语言的一次重大更新。<br class="display-none-md"> 它包含了许多新功能，包括枚举、只读属性、First-class 可调用语法、纤程、交集类型和性能改进等。',
    'upgrade_now' => '更新到 PHP 8.1 ！',
    'documentation' => '文档',

    'enumerations_title' => '枚举',
    'enumerations_content' => '使用枚举而不是一组常量并立即进行验证。',

    'readonly_properties_title' => '只读属性',
    'readonly_properties_content' => '<p>只读属性不能在初始化后更改，即在为它们分配值后。它们可以用于对值对象和数据传输对象建模。</p>',

    'first_class_callable_syntax_title' => 'First-class 可调用语法',
    'first_class_callable_syntax_content' => '<p>现在可以获得对任何函数的引用。这统称为 First-class 可调用语法。</p>',

    'new_in_initializers_title' => '新的初始化器',
    'new_in_initializers_content' => '<p>对象现在可以用作默认参数值、静态变量和全局常量，以及属性参数。</p>
            <p>这有效地使使用 <strong>嵌套属性</strong> 成为可能。</p>',

    'pure_intersection_types_title' => '纯交集类型',
    'pure_intersection_types_content' => '<p>当一个值需要同时满足多个类型约束时，使用交集类型。</p>
            <p>注意，目前无法将交集和联合类型混合在一起，例如 <code>A&B|C</code>。</p>',

    'never_return_type_title' => 'Never 返回类型',
    'never_return_type_content' => '<p>使用 <code>never</code> 类型声明的函数或方法表示它不会返回值，并且会抛出异常或通过调用 <code>die()</code>、<code>exit()</code>、<code>trigger_error()</code> 或类似的东西来结束脚本的执行。</p>',

    'final_class_constants_title' => 'Final 类常量',
    'final_class_constants_content' => '<p>可以声明 final 类常量，以禁止它们在子类中被重写。</p>',

    'octal_numeral_notation_title' => '显式八进制数字表示法',
    'octal_numeral_notation_content' => '<p>现在可以使用显式 <code>0o</code> 前缀表示八进制数。</p>',

    'fibers_title' => '纤程',
    'fibers_content' => '<p>Fibers 是用于实现轻量级协作并发的基础类型。它们是一种创建可以像生成器一样暂停和恢复的代码块的方法，但可以从堆栈中的任何位置进行。Fibers 本身并没有提供并发性，仍然需要一个事件循环。但是，它们允许通过阻塞和非阻塞实现共享相同的 API。</p><p>Fibers 允许摆脱以前在 <code>Promise::then()</code> 或基于生成器的协程中看到的样板代码。库通常会围绕 Fiber 构建进一步的抽象，因此无需直接与它们交互。</p>',

    'array_unpacking_title' => '对字符串键控数组的数组解包支持',
    'array_unpacking_content' => '<p>PHP 以前支持通过扩展运算符在数组内部解包，但前提是数组具有整数键。现在也可以使用字符串键解包数组。</p>',

    'performance_title' => '性能改进',
    'performance_chart' => '<strong>Symfony Demo App 请求时间</strong><br>
                25 次连续运行，250 次请求（秒）<br>
                （越少越好）<br>',
    'performance_results_title' => '结果（相对于 PHP 8.0）：',
    'performance_results_symfony' => 'Symfony Demo 有 23.0% 的提升',
    'performance_results_wordpress' => 'WordPress 有 3.5% 的提升',
    'performance_related_functions_title' => 'PHP 8.1 中与性能相关的特性：',
    'performance_jit_arm64' => 'ARM64 的 JIT 后端 （AArch64）',
    'performance_inheritance_cache' => '继承缓存（避免在每个请求中重新链接类）',
    'performance_fast_class_name_resolution' => '快速解析类名（避免小写和哈希查找）',
    'performance_timelib_date_improvements' => 'timelib 和 ext/date 性能改进',
    'performance_spl' => 'SPL 文件系统迭代器改进',
    'performance_serialize_unserialize' => 'serialize/unserialize 优化',
    'performance_internal_functions' => '一些内部函数优化（get_declared_classes()、explode()、strtr()、strnatcmp() 和 dechex()）',
    'performance_jit' => 'JIT 的改进和修复',

    'other_new_title' => '新的类、接口和函数',
    'other_new_returntypewillchange' => '<code>#[ReturnTypeWillChange]</code> 属性。',
    'other_new_fsync_fdatasync' => '<code>fsync</code> 和 <code>fdatasync</code> 函数。',
    'other_new_array_is_list' => '<code>array_is_list</code> 函数。',
    'other_new_sodium_xchacha20' => 'Sodium XChaCha20 函数。',

    'bc_title' => '弃用和向后不兼容',
    'bc_null_to_not_nullable' => '向非空值的内部函数参数传递空值的做法已被弃用。',
    'bc_return_types' => 'PHP 内置类方法中的暂定返回类型',
    'bc_serializable_deprecated' => '<code>Serializable</code> 接口已弃用。',
    'bc_html_entity_encode_decode' => 'html_entity_encode/html_entity_decode 函数默认处理单引号和用 Unicode 替换字符来替换无效字符。',
    'bc_globals_restrictions' => '<code>$GLOBALS</code> 变量限制。',
    'bc_mysqli_exceptions' => 'MySQLi：默认错误模式设置为异常。',
    'bc_float_to_int_conversion' => '隐式不兼容的 float 到 int 转换已被弃用。',
    'bc_finfo_objects' => 'finfo 扩展：<code>file_info</code> 资源迁移到现有的 finfo 对象。',
    'bc_imap_objects' => 'IMAP：imap 资源迁移到 <code>IMAP\Connection</code> 类对象。',
    'bc_ftp_objects' => 'FTP 扩展：连接资源迁移到 <code>FTP\Connection</code> 类对象。',
    'bc_gd_objects' => 'GD 扩展：字体标识符迁移到 <code>GdFont</code> 类对象。',
    'bc_ldap_objects' => 'LDAP：资源类型迁移到 <code>LDAP\Connection</code>、<code>LDAP\Result</code> 和 <code>LDAP\ResultEntry</code> 对象。',
    'bc_postgresql_objects' => 'PostgreSQL：资源类型迁移到 <code>PgSql\Connection</code>、<code>PgSql\Result</code> 和 <code>PgSql\Lob</code> 对象。',
    'bc_pspell_objects' => 'Pspell：pspell 和 pspell config 资源类型迁移到 <code>PSpell\Dictionary</code>、<code>PSpell\Config</code> 类对象。',

    'footer_title' => '更好的性能、更好的语法、改进类型安全。',
    'footer_content' => '<p>
        请访问 <a href="https://www.php.net/downloads">下载</a> 页面下载 PHP 8.1 源代码。
        在 <a href="https://windows.php.net/download">PHP for Windows</a> 站点中可找到 Windows 二进制文件。
        <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog</a> 中有变更历史记录清单。
      </p>
      <p>
        PHP 手册中有 <a href="/manual/zh/migration81.php">迁移指南</a>。
        请参考它描述的新功能详细清单、向后不兼容的变化。
      </p>',
];
