<?php

return [
    'common_header' => 'PHP 8.0 是 PHP 语言的一次重大更新。它包含了很多新功能与优化项，包括命名参数、联合类型、注解、构造器属性提升、match 表达式、Nullsafe 运算符、JIT，并改进了类型系统、错误处理、语法一致性。',
    'documentation' => '文档',
    'main_title' => '已发布！',
    'main_subtitle' => 'PHP 8.0 是 PHP 语言的一次重大更新。<br class="display-none-md"> 它包含了很多新功能与优化项，包括命名参数、联合类型、注解、构造器属性提升、match 表达式、nullsafe 运算符、JIT，并改进了类型系统、错误处理、语法一致性。',
    'upgrade_now' => '更新到 PHP 8！',

    'named_arguments_title' => '命名参数',
    'named_arguments_description' => '<li>仅仅指定必填参数，跳过可选参数。</li><li>参数的顺序无关、自己就是文档（self-documented）</li>',
    'attributes_title' => '注解',
    'attributes_description' => '现在可以用 PHP 原生语法来使用结构化的元数据，而非 PHPDoc 声明。',
    'constructor_promotion_title' => '构造器属性提升',
    'constructor_promotion_description' => '更少的样板代码来定义并初始化属性。',
    'union_types_title' => '联合类型',
    'union_types_description' => '相较于以前的 PHPDoc 声明类型的组合， 现在可以用原生支持的联合类型声明取而代之，并在运行时得到校验。',
    'match_expression_title' => 'Match 表达式',
    'match_expression_description' => '<p>新的 <code>match</code> 类似于 <code>switch</code>，并具有以下功能：</p>
        <ul>
            <li>Match 是一个表达式，它可以储存到变量中亦可以直接返回。</li>
            <li>Match 分支仅支持单行，它不需要一个 <code>break</code> 语句。</li>
            <li>Match 使用严格比较。</li>
        </ul>',

    'nullsafe_operator_title' => 'Nullsafe 运算符',
    'nullsafe_operator_description' => '现在可以用新的 nullsafe 运算符链式调用，而不需要条件检查 null。 如果链条中的一个元素失败了，整个链条会中止并认定为 Null。',
    'saner_string_number_comparisons_title' => '字符串与数字的比较更符合逻辑',
    'saner_string_number_comparisons_description' => 'PHP 8 比较数字字符串（numeric string）时，会按数字进行比较。不是数字字符串时，将数字转化为字符串，按字符串比较。',
    'consistent_internal_function_type_errors_title' => '内部函数类型错误的一致性。',
    'consistent_internal_function_type_errors_description' => '现在大多数内部函数在参数验证失败时抛出 <code>Error</code> 级异常。',

    'jit_compilation_title' => '即时编译',
    'jit_compilation_description' => 'PHP 8 引入了两个即时编译引擎。 Tracing JIT 在两个中更有潜力，它在综合基准测试中显示了三倍的性能，并在某些长时间运行的程序中显示了 1.5-2 倍的性能改进。典型的应用性能则和 PHP 7.4 不相上下。',
    'jit_performance_title' => '关于 JIT 对 PHP 8 性能的贡献',

    'type_improvements_title' => '类型系统与错误处理的改进',
    'arithmetic_operator_type_checks' => '算术/位运算符更严格的类型检测',
    'abstract_trait_method_validation' => 'Abstract trait 方法的验证',
    'magic_method_signatures' => '确保魔术方法签名正确',
    'engine_warnings' => 'PHP 引擎 warning 警告的重新分类',
    'lsp_errors' => '不兼容的方法签名导致 Fatal 错误',
    'at_operator_no_longer_silences_fatal_errors' => '操作符 <code>@</code> 不再抑制 fatal 错误。',
    'inheritance_private_methods' => '私有方法继承',
    'mixed_type' => '<code>mixed</code> 类型',
    'static_return_type' => '<code>static</code> 返回类型',
    'internal_function_types' => '内部函数的类型',
    'email_thread' => 'Email thread',
    'opaque_objects_instead_of_resources' => '扩展
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>、
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>、
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>、
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>、
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>、
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        以 Opaque 对象替换 resource。',

    'other_improvements_title' => '其他语法调整和改进',
    'allow_trailing_comma' => '允许参数列表中的末尾逗号 <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>、
        闭包 use 列表中的末尾逗号 <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => '无变量捕获的 catch',
    'variable_syntax_tweaks' => '变量语法的调整',
    'namespaced_names_as_token' => 'Namespace 名称作为单个 token',
    'throw_expression' => '现在 <code>throw</code> 是一个表达式',
    'class_name_literal_on_object' => '允许对象的 <code>::class</code>',

    'new_classes_title' => '新的类、接口、函数',
    'weak_map_class' => '<a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> 类',
    'stringable_interface' => '<a href="https://wiki.php.net/rfc/stringable">Stringable</a> 接口',
    'new_str_functions' => '<a href="https://wiki.php.net/rfc/str_contains">str_contains()</a>、
         <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_starts_with()</a>、
         <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_ends_with()</a>',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> 对象实现',
    'new_dom_apis' => 'New DOM Traversal and Manipulation APIs',

    'footer_title' => '性能更好，语法更好，类型安全更完善',
    'footer_description' => '<p>
            请访问 <a href="https://www.php.net/downloads">下载</a> 页面下载 PHP 8 源代码。
            在 <a href="https://windows.php.net/download">PHP for Windows</a> 站点中可找到 Windows 二进制文件。
            <a href="https://www.php.net/ChangeLog-8.php">ChangeLog</a> 中有变更历史记录清单。
        </p>
        <p>
            PHP 手册中有 <a href="/manual/zh/migration80.php">迁移指南</a>。
            请参考它描述的新功能详细清单、向后不兼容的变化。
        </p>',
];
