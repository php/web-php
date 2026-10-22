<?php

/**
 * En-revision: 2132f88bae3192d33f091eae5eeb74de93731faf275
 */

return [
    'common_header' => 'PHP 8.2 是 PHP 语言的一次重大更新。它包含了只读类、null、false 和 true 作为独立的类型、废弃动态属性、性能改进等。',
    'documentation' => '文档',
    'main_title' => '已发布！',
    'main_subtitle' => 'PHP 8.2 是 PHP 语言的一次重大更新。<br class="display-none-md">它包含了只读类、null、false 和 true 作为独立的类型、废弃动态属性、性能改进等。',
    'upgrade_now' => '更新到 PHP 8.2 ！',
    'readonly_classes_title' => '只读类',
    'dnf_types_title' => '析取范式 （DNF）类型',
    'dnf_types_description' => 'DNF 类型允许我们组合 <a href="/manual/zh/language.types.type-system.php#language.types.type-system.composite.union">union</a> 和 <a href="/manual/zh/language.types.type-system.php#language.types.composite.intersection">intersection</a>类型，遵循一个严格规则：组合并集和交集类型时，交集类型必须用括号进行分组。',
    'null_false_true_types_title' => '允许 <code>null</code>、<code>false</code> 和 <code>true</code> 作为独立类型',
    'random_title' => '新的“随机”扩展',
    'random_description' => '<p>“随机”扩展为随机数生成提供了一个新的面向对象的 API。这个面向对象的 API 提供了几个类（“引擎”），提供对现代算法的访问，这些算法在对象中存储其状态，以允许多个独立的可播种序列，而不是依赖于使用 Mersenne Twister 算法的全局种子随机数发生器（RNG）。</p>
        <p><code>\Random\Randomizer</code> 类提供了一个高级接口来使用引擎的随机性来生成随机整数、随机排列数组或字符串、选择随机数组键等。</p>',
    'constants_in_traits_title' => 'Traits 中的常量',
    'constants_in_traits_description' => '您不能通过 trait 名称访问常量，但是您可以通过使用 trait 的类访问常量。',
    'deprecate_dynamic_properties_title' => '弃用动态属性',
    'deprecate_dynamic_properties_description' => '<p>动态属性的创建已被弃用，以帮助避免错误和拼写错误，除非该类通过使用 <code>#[\AllowDynamicProperties]</code> 属性来选择。<code>stdClass</code> 允许动态属性。</p>
        <p><code>__get</code>/<code>__set</code> 魔术方法的使用不受此更改的影响。</p>',

    'new_classes_title' => '新的类、接口和函数',
    'new_mysqli' => '新增 <a href="/manual/zh/mysqli.execute-query.php"><code>mysqli_execute_query</code></a> 函数和 <a href="/manual/zh/mysqli.execute-query.php"><code>mysqli::execute_query</code></a> 方法。',
    'new_attributes' => '新增 <a href="/manual/zh/class.allow-dynamic-properties.php"><code>#[\AllowDynamicProperties]</code></a> 和 <a href="/manual/zh/class.sensitive-parameter.php"><code>#[\SensitiveParameter]</code></a> 属性。',
    'new_zip' => '新增 <a href="/manual/zh/ziparchive.getstreamindex.php"><code>ZipArchive::getStreamIndex</code></a>、<a href="/manual/zh/ziparchive.getstreamname.php"><code>ZipArchive::getStreamName</code></a> 和 <a href="/manual/zh/ziparchive.clearerror.php"><code>ZipArchive::clearError</code></a> 方法。',
    'new_reflection' => '新增 <a href="/manual/zh/reflectionfunction.isanonymous.php"><code>ReflectionFunction::isAnonymous</code></a> 和 <a href="/manual/zh/reflectionmethod.hasprototype.php"><code>ReflectionMethod::hasPrototype</code></a> 方法。',
    'new_functions' => '新增 <a href="/manual/zh/function.curl_upkeep.php"><code>curl_upkeep</code></a>、<a href="/manual/zh/function.memory-reset-peak-usage.php"><code>memory_reset_peak_usage</code></a>、<a href="/manual/zh/function.ini-parse-quantity.php"><code>ini_parse_quantity</code></a>、<a href="/manual/zh/function.libxml-get-external-entity-loader.php"><code>libxml_get_external_entity_loader</code></a>、<a href="/manual/zh/function.sodium-crypto-stream-xchacha20-xor-ic.php"><code>sodium_crypto_stream_xchacha20_xor_ic</code></a> 和 <a href="/manual/zh/function.openssl-cipher-key-length.php"><code>openssl_cipher_key_length</code></a> 方法。',

    'bc_title' => '弃用和向后不兼容',
    'bc_string_interpolation' => '弃用 <code>${}</code> 字符串插值。',
    'bc_utf8' => '弃用 <a href="/manual/zh/function.utf8-encode.php"><code>utf8_encode</code></a> 和 <a href="/manual/zh/function.utf8-decode.php"><code>utf8_decode</code></a> 函数。',
    'bc_datetime' => '<a href="/manual/zh/datetime.createfromimmutable.php"><code>DateTime::createFromImmutable</code></a> 和 <a href="/manual/zh/datetimeimmutable.createfrommutable.php"><code>DateTimeImmutable::createFromMutable</code></a> 方法暂定返回类型为 <code>static</code>。',
    'bc_odbc' => '<code>ODBC</code> 和 <code>PDO_ODBC</code> 扩展转义用户名和密码。',
    'bc_str_locale_sensitive' => '<a href="/manual/zh/function.strtolower.php"><code>strtolower</code></a> 和 <a href="/manual/zh/function.strtoupper.php"><code>strtoupper</code></a> 函数不再对语言环境敏感。',
    'bc_spl_enforces_signature' => '<a href="/manual/zh/splfileobject.getcsvcontrol.php"><code>SplFileObject::getCsvControl</code></a>、<a href="/manual/zh/splfileobject.fflush.php"><code>SplFileObject::fflush</code></a>、<a href="/manual/zh/splfileobject.ftell.php"><code>SplFileObject::ftell</code></a>、<a href="/manual/zh/splfileobject.fgetc.php"><code>SplFileObject::fgetc</code></a> 和 <a href="/manual/zh/splfileobject.fpassthru.php"><code>SplFileObject::fpassthru</code></a> 方法强制执行它们的签名。',
    'bc_spl_false' => '<a href="/manual/zh/splfileobject.haschildren.php"><code>SplFileObject::hasChildren</code></a> 方法暂定返回类型为 <code>false</code>。',
    'bc_spl_null' => '<a href="/manual/zh/splfileobject.getchildren.php"><code>SplFileObject::getChildren</code></a> 方法暂定返回类型为 <code>null</code>。',
    'bc_spl_deprecated' => '内置方法 <code>SplFileInfo::_bad_state_ex</code> 已被废弃。',

    'footer_title' => '更好的性能、更好的语法、改进类型安全。',
    'footer_description' => '<p>
        请访问 <a href="/downloads">下载</a> 页面下载 PHP 8.2 源代码。
        在 <a href="https://windows.php.net/download">PHP for Windows</a> 站点中可找到 Windows 二进制文件。
        <a href="https://www.php.net/ChangeLog-8.php#PHP_8_2">ChangeLog</a> 中有变更历史记录清单。
      </p>
      <p>
        PHP 手册中有 <a href="/manual/zh/migration82.php">迁移指南</a>。
        请参考它描述的新功能详细清单、向后不兼容的变化。
      </p>',
];
