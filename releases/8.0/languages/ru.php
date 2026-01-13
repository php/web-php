<?php

return [
    'common_header' => 'PHP 8.0 — большое обновление языка PHP. Оно содержит множество новых возможностей и оптимизаций, включая именованные аргументы, тип union, атрибуты, упрощённое определение свойств в конструкторе, выражение match, оператор nullsafe, JIT и улучшения в системе типов, обработке ошибок и консистентности.',
    'documentation' => 'Документация',
    'main_title' => 'доступен!',
    'main_subtitle' => 'PHP 8.0 — большое обновление языка PHP.<br class="display-none-md"> Оно содержит множество новых возможностей и оптимизаций, включая именованные аргументы, union type, атрибуты, упрощённое определение свойств в конструкторе, выражение match, оператор nullsafe, JIT и улучшения в системе типов, обработке ошибок и консистентности.',
    'upgrade_now' => 'Переходите на PHP 8!',

    'named_arguments_title' => 'Именованные аргументы',
    'named_arguments_description' => '<li>Указывайте только необходимые параметры, пропускайте необязательные.</li><li>Порядок аргументов не важен, аргументы самодокументируемы.</li>',
    'attributes_title' => 'Атрибуты',
    'attributes_description' => 'Вместо аннотаций PHPDoc вы можете использовать структурные метаданные с нативным синтаксисом PHP.',
    'constructor_promotion_title' => 'Объявление свойств в конструкторе',
    'constructor_promotion_description' => 'Меньше шаблонного кода для определения и инициализации свойств.',
    'union_types_title' => 'Тип Union',
    'union_types_description' => 'Вместо аннотаций PHPDoc для объединённых типов вы можете использовать объявления типа union, которые проверяются во время выполнения.',
    'ok' => 'Нет ошибки',
    'oh_no' => 'О нет!',
    'this_is_expected' => 'То, что я и ожидал',
    'match_expression_title' => 'Выражение Match',
    'match_expression_description' => '<p>Новое выражение <code>match</code> похоже на оператор <code>switch</code> со следующими особенностями:</p>
        <ul>
            <li>Match — это выражение, его результат может быть сохранён в переменной или возвращён.</li>
            <li>Условия match поддерживают только однострочные выражения, для которых не требуется управляющая конструкция <code>break</code>.</li>
            <li>Выражение match использует строгое сравнение.</li>
        </ul>',

    'nullsafe_operator_title' => 'Оператор Nullsafe',
    'nullsafe_operator_description' => 'Вместо проверки на <code>null</code> вы можете использовать последовательность вызовов с новым оператором Nullsafe. Когда один из элементов в последовательности возвращает null, выполнение прерывается и вся последовательность возвращает <code>null</code>.',
    'saner_string_number_comparisons_title' => 'Улучшенное сравнение строк и чисел',
    'saner_string_number_comparisons_description' => 'При сравнении с числовой строкой PHP 8 использует сравнение чисел. В противном случае число преобразуется в строку и используется сравнение строк.',
    'consistent_internal_function_type_errors_title' => 'Ошибки согласованности типов для встроенных функций',
    'consistent_internal_function_type_errors_description' => 'Большинство внутренних функций теперь выбрасывают исключение <code>Error</code>, если при проверке параметра возникает ошибка.',

    'jit_compilation_title' => 'Компиляция Just-In-Time',
    'jit_compilation_description' => 'PHP 8 представляет два механизма JIT-компиляции. Трассировка JIT, наиболее перспективная из них, на синтетических бенчмарках показывает улучшение производительности примерно в 3 раза и в 1,5–2 раза на некоторых долго работающих приложениях. Стандартная производительность приложения находится на одном уровне с PHP 7.4.',
    'jit_performance_title' => 'Относительный вклад JIT в производительность PHP 8',

    'type_improvements_title' => 'Улучшения в системе типов и обработке ошибок',
    'arithmetic_operator_type_checks' => 'Более строгие проверки типов для арифметических/побитовых операторов',
    'abstract_trait_method_validation' => 'Проверка методов абстрактных трейтов',
    'magic_method_signatures' => 'Правильные сигнатуры магических методов',
    'engine_warnings' => 'Реклассификация предупреждений движка',
    'lsp_errors' => 'Фатальная ошибка при несовместимости сигнатур методов',
    'at_operator_no_longer_silences_fatal_errors' => 'Оператор <code>@</code> больше не подавляет фатальные ошибки.',
    'inheritance_private_methods' => 'Наследование с private методами',
    'mixed_type' => 'Новый тип <code>mixed</code>',
    'static_return_type' => 'Возвращаемый тип <code>static</code>',
    'internal_function_types' => 'Типы для стандартных функций',
    'email_thread' => 'E-mail Тема',
    'opaque_objects_instead_of_resources' => 'Непрозрачные объекты вместо ресурсов для
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, e
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        расширения',

    'other_improvements_title' => 'Прочие улучшения синтаксиса',
    'allow_trailing_comma' => 'Разрешена запятая в конце списка параметров <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        и в списке use замыканий <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'Блок catch без указания переменной',
    'variable_syntax_tweaks' => 'Изменения синтаксиса переменных',
    'namespaced_names_as_token' => 'Имена в пространстве имен рассматриваются как единый токен',
    'throw_expression' => 'Выражение <code>throw</code>',
    'class_name_literal_on_object' => 'Добавление <code>::class</code> для объектов',

    'new_classes_title' => 'Новые классы, интерфейсы и функции',
    'weak_map_class' => 'Класс <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a>',
    'stringable_interface' => 'Интерфейс <a href="https://wiki.php.net/rfc/stringable">Stringable</a>',
    'token_as_object' => 'Объектно-ориентированная функция <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a>',
    'new_dom_apis' => 'Новые API для обходения и обработки DOM',

    'footer_title' => 'Выше производительность, лучше синтаксис, надежнее система типов.',
    'footer_description' => '<p>
            Для загрузки исходного кода PHP 8 посетите страницу <a href="http://www.php.net/downloads">downloads</a>.
            Бинарные файлы Windows находятся на сайте <a href="https://windows.php.net/download">PHP для Windows</a>.
            Список изменений представлен в <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
        </p>
        <p>
            <a href="/manual/ru/migration80.php">Руководство по миграции</a> доступно в разделе документации. Пожалуйста,
            изучите его для получения подробного списка новых возможностей и обратно несовместимых изменений.
        </p>',
];
