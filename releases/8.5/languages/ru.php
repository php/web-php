<?php

return [
    'common_header' => 'PHP 8.5 — большое обновление языка PHP с новыми возможностями, включая модуль URI, оператор Pipe и поддержку изменения свойств при клонировании.',
    'main_title' => 'Лучше, быстрее, надолго.',
    'main_subtitle' => '<p><strong>PHP 8.5 — большое обновление языка PHP.</strong> Оно содержит <strong>множество новых возможностей</strong>, таких как <strong>модуль URI</strong>, <strong>оператор Pipe</strong>, поддержка <strong>изменения свойств при клонировании</strong> и многое другое.</p>',

    'whats_new' => 'Что нового в 8.5',
    'upgrade_now' => 'Переходите на PHP 8.5!',
    'old_version' => 'PHP 8.4 и ранее',
    'badge_new' => 'Новинка',
    'documentation' => 'Документация',
    'released' => 'Выпущен 20 ноября 2025',
    'key_features' => 'Основные функции PHP 8.5',
    'key_features_description' => '<p><strong>Быстрее</strong>, <strong>лучше</strong>, <strong>доступнее для разработчиков</strong>.</p>',

    'features_pipe_operator_title' => 'Оператор Pipe',
    'features_pipe_operator_description' => '<p>Оператор <code>|></code> позволяет связывать вызываемые объекты слева направо, передавая значения через несколько функций без промежуточных переменных.</p>',
    'features_persistent_curl_share_handles_title' => 'Постоянные дескрипторы cURL Share',
    'features_persistent_curl_share_handles_description' => '<p>Теперь дескрипторы могут сохраняться между несколькими запросами PHP, что позволяет избежать затрат на повторную инициализацию соединения с одними и теми же хостами.</p>',
    'features_clone_with_title' => 'Clone With',
    'features_clone_with_description' => '<p>Клонируйте объекты и обновляйте свойства с помощью нового синтаксиса <code>clone()</code>, который упрощает использование шаблона «with-er» для классов <code>readonly</code>.</p>',
    'features_uri_extension_title' => 'Модуль URI',
    'features_uri_extension_description' => '<p>В PHP 8.5 добавлен модуль URI для анализа, нормализации и обработки URL-адресов в соответствии со стандартами <em>RFC 3986</em> и <em>WHATWG URL</em>.</p>',
    'features_no_discard_title' => 'Атрибут #[\NoDiscard]',
    'features_no_discard_description' => '<p>Атрибут <code>#[\NoDiscard]</code> выдаёт предупреждение, если возвращаемое значение не используется, что помогает предотвратить ошибки и повысить общую безопасность API.</p>',
    'features_fcc_in_const_expr_title' => 'Замыкания и вызовы первого класса в константных выражениях',
    'features_fcc_in_const_expr_description' => '<p>Статические замыкания и вызываемые объекты первого класса теперь могут использоваться в константных выражениях, таких как параметры атрибутов.</p>',

    'pipe_operator_title' => 'Оператор Pipe',
    'pipe_operator_description' => '<p>Оператор Pipe позволяет связывать вызовы функций в цепочку без использования промежуточных переменных. Позволяет заменить множество «вложенных вызовов» цепочкой.</p><p>Узнайте больше об этой функции в <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">блоге PHP Foundation</a>.</p>',

    'array_first_last_title' => 'Функции array_first() и array_last()',
    'array_first_last_description' => '<p>Функции <code>array_first()</code> и <code>array_last()</code> возвращают первое или последнее значение массива, соответственно. Если массив пустой, возвращается <code>null</code> (что упрощает работу с оператором <code>??</code>).</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>Теперь можно обновлять свойства во время клонирования объектов, передавая ассоциативный массив в функцию <code>clone()</code>. Это позволит напрямую поддерживать паттерн «with-er» для классов <code>readonly</code>.</p>',

    'uri_extension_title' => 'Модуль URI',
    'uri_extension_description' => '<p>Встроенный модуль URI предоставляет API для безопасного анализа и изменения URI и URL в соответствии со стандартами RFC 3986 и WHATWG URL.</p><p>Работает на базе библиотек <a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) и <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL).</p><p>Узнайте больше об этой функции в <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">блоге PHP Foundation</a>.</p>',

    'no_discard_title' => 'Атрибут #[\NoDiscard]',
    'no_discard_description' => '<p>Добавив атрибут <code>#[\NoDiscard]</code> к функции, PHP будет проверять, используется ли возвращаемое значение, и выдавать предупреждение, если это не так. Позволяет повысить безопасность API, где возвращаемое значение важно, но про него можно легко забыть.</p><p>Связанное приведение типов <code>(void)</code> может использоваться для указания, что значение намеренно не используется.</p>',

    'persistent_curl_share_handles_title' => 'Постоянные дескрипторы cURL Share',
    'persistent_curl_share_handles_description' => '<p>В отличие от <code>curl_share_init()</code>, дескрипторы, созданные с помощью <code>curl_share_init_persistent()</code>, не будут уничтожены в конце запроса PHP. Если найден постоянный дескриптор с тем же набором параметров, он будет использован повторно, что позволит избежать затрат на повторную инициализацию дескрипторов cURL при каждом запросе.',

    'fcc_in_const_expr_title' => 'Замыкания и вызовы первого класса в константных выражениях',
    'fcc_in_const_expr_description' => '<p>Статические замыкания и вызываемые объекты первого класса теперь могут использоваться в константных выражениях. Сюда входят параметры атрибутов, значения по умолчанию свойств и параметров, а также константы.</p>',

    'new_classes_title' => 'Дополнительные функции и улучшения',
    'fatal_error_backtrace' => 'Фатальные ошибки (такие как превышение максимального времени выполнения) теперь содержат обратную трассировку.',
    'const_attribute_target' => 'Атрибуты теперь можно использовать с константами.',
    'override_attr_properties' => 'Атрибут {0} теперь может использоваться со свойствами.',
    'deprecated_traits_constants' => 'Атрибут {0} теперь может использоваться с трейтами и константами.',
    'asymmetric_static_properties' => 'Статические свойства теперь поддерживают асимметричную видимость.',
    'final_promoted_properties' => 'Свойства могут быть помечены окончательными (<code>final</code>) с помощью свойств в конструкторе.',
    'closure_getCurrent' => 'Добавлен метод <code>Closure::getCurrent()</code> для упрощения рекурсии в анонимных функциях.',
    'partitioned_cookies' => 'Функции {0} и {1} теперь поддерживают ключ <code>"partitioned"</code>.',
    'get_set_error_handler' => 'Добавлены функции {0} и {1}.',
    'new_dom_element_methods' => 'Добавлены методы {0} и {1}.',
    'grapheme_levenshtein' => 'Добавлена функция {0}.',
    'delayed_target_validation' => 'Добавлен атрибут {0}, который можно использовать для подавления ошибок компиляции атрибутов ядра и модулей, которые используются на недопустимых целях.',

    'bc_title' => 'Устаревшая функциональность и изменения в обратной совместимости',
    'bc_backtick_operator' => 'Обратный апостроф (<code>`</code>) как псевдоним для {0} больше не поддерживается.',
    'bc_non_canonical_cast_names' => 'Неканонические имена типов <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code> и <code>(binary)</code> больше не поддерживаются. Вместо них используйте соответственно <code>(bool)</code>, <code>(int)</code>, <code>(float)</code> и <code>(string)</code>.',
    'bc_disable_classes' => 'INI-настройка {0} была удалена, так как она приводила к нарушению различных допущений движка.',
    'bc_semicolon_after_case' => 'Завершение операторов <code>case</code> точкой с запятой вместо двоеточия больше не поддерживается.',
    'bc_null_array_offset' => 'Использование <code>null</code> в качестве смещения массива или при вызове {0} объявлено устаревшим. Вместо этого используйте пустую строку.',
    'bc_class_alias_names' => 'В {0} больше нельзя использовать массивы и замыкания в качестве псевдонимов классов.',
    'bc_sleep_wakeup' => 'Магические методы {0} и {1} были мягко объявлены устаревшими. Вместо них следует использовать магические методы {2} и {3}.',
    'bc_casting_nan' => 'Теперь при преобразовании {0} в другие типы выдаётся предупреждение.',
    'bc_non_array_destructuring' => 'Деструктуризация значений, не являющихся массивами (кроме <code>null</code>), с помощью {0} или {1} теперь выдаёт предупреждение.',
    'bc_casting_non_int_floats' => 'Теперь выдаётся предупреждение при преобразовании чисел с плавающей точкой (или строк, похожих на числа с плавающей точкой) в целые числа (<code>int</code>), если они не могут быть представлены в виде целого числа.',

    'footer_title' => 'Выше производительность, лучше синтаксис, надёжнее система типов.',
    'footer_description' => '<p>Список изменений перечислен на странице <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>.</p><p><a href="/manual/ru/migration85.php" target="_blank">Руководство по миграции</a> доступно в разделе документации. Ознакомьтесь с ним, чтобы узнать обо всех новых возможностях и изменениях, затрагивающих обратную совместимость.</p>',
];
