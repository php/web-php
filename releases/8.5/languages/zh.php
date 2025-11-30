<?php

/**
 * En-revision: 8256384e89d7ad9702bc35f5aafe7e4244c71eff
 */

return [
    'common_header' => 'PHP 8.5 是一次 PHP 语言的重要更新，带来了 URI 扩展、管道操作符，以及支持在克隆对象时修改属性等新功能。',
    'main_title' => '更智能、更快速，为未来而生。',
    'main_subtitle' => '<p><strong>PHP 8.5 是 PHP 语言的一次重大更新</strong>，新增了 <strong>URI 扩展</strong>、<strong>管道操作符</strong>，以及对<strong>克隆时修改属性</strong>的支持。</p>',

    'whats_new' => '8.5 中的新特性',
    'upgrade_now' => '升级到 PHP 8.5',
    'old_version' => 'PHP 8.4 及更早版本',
    'badge_new' => 'NEW',
    'documentation' => '文档',
    'released' => '发布于 2025 年 11 月 20 日',
    'key_features' => 'PHP 8.5 的主要特性',
    'key_features_description' => '<p><strong>更快</strong>、<strong>更简洁</strong>、<strong>为开发者而生</strong>。</p>',

    'features_pipe_operator_title' => '管道操作符',
    'features_pipe_operator_description' => '<p><code>|></code> 操作符允许从左到右连接可调用项，让数值在多个函数间顺畅传递，无需中间变量。</p>',
    'features_persistent_curl_share_handles_title' => '持久化 cURL Share 句柄',
    'features_persistent_curl_share_handles_description' => '<p>句柄现在可以在多个 PHP 请求之间保持，不再需要重复初始化到同一主机的连接。</p>',
    'features_clone_with_title' => 'Clone With',
    'features_clone_with_description' => '<p>使用新的 <code>clone()</code> 语法可以克隆对象并更新属性，让 <code>readonly</code> 类的 "with-er" 模式变得简单。</p>',
    'features_uri_extension_title' => 'URI 扩展',
    'features_uri_extension_description' => '<p>PHP 8.5 增加了内置的 URI 扩展，用于按照 <em>RFC 3986</em> 和 <em>WHATWG URL</em> 标准解析、规范化和处理 URL。</p>',
    'features_no_discard_title' => '#[\NoDiscard] 属性',
    'features_no_discard_description' => '<p><code>#[\NoDiscard]</code> 属性会在返回值未被使用时发出警告，有助于避免错误，提高 API 安全性。</p>',
    'features_fcc_in_const_expr_title' => '常量表达式中的闭包和 First-class 可调用',
    'features_fcc_in_const_expr_description' => '<p>静态闭包和 First-class 可调用现在可以用于常量表达式，例如属性参数。</p>',

    'pipe_operator_title' => '管道操作符',
    'pipe_operator_description' => '<p>管道操作符允许将多个函数调用串联起来，而无需处理中间变量。它可以将许多“嵌套调用”替换成从左到右可读的链式结构。</p><p>在 <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">The PHP Foundation 的博客</a>中了解该特性的更多背景。</p>',

    'array_first_last_title' => 'array_first() 与 array_last() 函数',
    'array_first_last_description' => '<p><code>array_first()</code> 与 <code>array_last()</code> 分别返回数组的第一个或最后一个值。若数组为空，则返回 <code>null</code>（方便与 <code>??</code> 操作符组合）。</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>现在可以在对象克隆时通过向 <code>clone()</code> 传递关联数组来更新属性。这让 <code>readonly</code> 类的 with-er 模式变得简单明了。</p>',

    'uri_extension_title' => 'URI 扩展',
    'uri_extension_description' => '<p>全新的、始终可用的 URI 扩展提供了一组 API，可根据 RFC 3986 和 WHATWG URL 标准安全地解析和修改 URI 与 URL。</p><p>由 <a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a>（RFC 3986）和 <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a>（WHATWG URL）库驱动。</p><p>在 <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">The PHP Foundation 的博客</a>中了解更多背景。</p>',

    'no_discard_title' => '#[\NoDiscard] 属性',
    'no_discard_description' => '<p>为函数添加 <code>#[\NoDiscard]</code> 属性后，PHP 会检查返回值是否被使用，若未使用则发出警告。这样可以提高 API 的安全性，避免关键返回值被忽略。</p><p>可以使用 <code>(void)</code> 来显式表示“我就是不使用这个结果”。</p>',

    'persistent_curl_share_handles_title' => '持久化 cURL Share 句柄',
    'persistent_curl_share_handles_description' => '<p>与 <code>curl_share_init()</code> 不同，由 <code>curl_share_init_persistent()</code> 创建的句柄在请求结束时不会销毁。如果发现具有相同共享选项的持久化句柄，将会复用，从而避免每次初始化 cURL 句柄的开销。</p>',

    'fcc_in_const_expr_title' => '常量表达式中的闭包和 First-class 可调用',
    'fcc_in_const_expr_description' => '<p>静态闭包和 First-class 可调用现在可以用于常量表达式，包括属性参数、属性和参数默认值以及常量等。</p>',

    'new_classes_title' => '更多特性与改进',
    'fatal_error_backtrace' => '致命错误（如超出最大执行时间）现在会包含回溯信息。',
    'const_attribute_target' => '属性现在可以作用于常量。',
    'override_attr_properties' => '{0} 属性现在可以用于类属性。',
    'deprecated_traits_constants' => '{0} 属性现在可以用于 traits 和常量。',
    'asymmetric_static_properties' => '静态属性现在支持不对称可见性。',
    'final_promoted_properties' => '属性在构造器属性提升中可以被标记为 <code>final</code>。',
    'closure_getCurrent' => '新增 <code>Closure::getCurrent()</code> 方法，简化匿名函数的递归。',
    'partitioned_cookies' => '函数 {0} 和 {1} 现在支持 "partitioned" 键。',
    'get_set_error_handler' => '新增 {0} 与 {1} 函数。',
    'new_dom_element_methods' => '新增 {0} 与 {1} 方法。',
    'grapheme_levenshtein' => '新增 {0} 函数。',
    'delayed_target_validation' => '新增 {0} 属性，可用于抑制在无效目标上使用核心/扩展属性时的编译期错误。',

    'bc_title' => '弃用和向后不兼容',
    'bc_backtick_operator' => '作为 {0} 别名的反引号操作符已被弃用。',
    'bc_non_canonical_cast_names' => '非标准强制转换名称 <code>(boolean)</code>、<code>(integer)</code>、<code>(double)</code> 和 <code>(binary)</code> 已弃用，请改用 <code>(bool)</code>、<code>(int)</code>、<code>(float)</code> 和 <code>(string)</code>。',
    'bc_disable_classes' => '{0} INI 选项已被移除，因为它会破坏引擎的一些基本假设。',
    'bc_semicolon_after_case' => '以分号而非冒号结束 <code>case</code> 语句已被弃用。',
    'bc_null_array_offset' => '使用 <code>null</code> 作为数组偏移量或调用 {0} 时已被弃用，请改用空字符串。',
    'bc_class_alias_names' => '在 {0} 中不再允许将 "array" 和 "callable" 用作类别名。',
    'bc_sleep_wakeup' => '{0} 与 {1} 魔术方法已被软弃用，请改用 {2} 与 {3}。',
    'bc_casting_nan' => '将 {0} 转换为其他类型时现在会发出警告。',
    'bc_non_array_destructuring' => '对非数组值（除 <code>null</code>）使用 {0} 或 {1} 进行解构现在会触发警告。',
    'bc_casting_non_int_floats' => '当浮点数（或看起来像浮点数的字符串）无法表示为 <code>int</code> 时，强制转换为 <code>int</code> 会发出警告。',

    'footer_title' => '更好的语法、更高的性能以及更强的类型安全性。',
    'footer_description' => '<p class="first-paragraph">完整的变更列表记录在 <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a> 中。</p><p>如需查看详细的新特性与兼容性变更，请查阅<a href="/manual/zh/migration85.php" target="_blank">迁移指南</a>。</p>',
];
