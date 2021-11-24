<?php

/**
 * En-revision: 0c63d2d026065c2783dd951791f971e59b3e89bd
 */

return [
    'common_header' => 'PHP 8.1 — большое обновление языка PHP. перечисления, readonly-свойства, callback-функции как объекты первого класса, файберы, пересечение типов, улучшения производительности и многое другое.',
    'main_title' => 'релизнут!',
    'main_subtitle' => 'PHP 8.1 — большое обновление языка PHP.<br class="display-none-md"> Оно содержит множество новых возможностей и оптимизаций, включая перечисления, readonly-свойства, callback-функции как объекты первого класса, файберы, пересечение&nbsp;типов, улучшения производительности и многое другое.',
    'upgrade_now' => 'Переходите на PHP 8.1!',
    'documentation' => 'Документация',

    'enumerations_title' => 'Перечисления',
    'enumerations_content' => 'Используйте перечисления вместо набора констант, получая валидацию прямо из коробки.',

    'readonly_properties_title' => 'Readonly-свойства',
    'readonly_properties_content' => '<p>Readonly-свойства нельзя изменить после инициализации, то есть после присвоения им значения.<br>Это отличный способ моделировать <abbr title="Объект-значение">VO</abbr> и <abbr title="Объект передачи данных">DTO</abbr>.</p>',

    'first_class_callable_syntax_title' => 'Callback-функции как объекты первого класса',
    'first_class_callable_syntax_content' => '<p>Теперь можно получить ссылку на любую функцию — это называется callback-функции как объекты первого класса.</p>',

    'new_in_initializers_title' => 'Использование new в конструкторах',
    'new_in_initializers_content' => '<p>Объекты теперь можно использовать в качестве значений параметров по умолчанию, статических переменных и глобальных констант, а также в качестве аргументов атрибутов.</p>
            <p>Это позволяет эффективно использовать <strong>вложенные атрибуты</strong>.</p>',

    'pure_intersection_types_title' => 'Пересечение типов',
    'pure_intersection_types_content' => '<p>Используйте пересечение типов в объявлениях любых типов, когда вам нужно, чтобы значение удовлетворяло нескольким ограничениям типов одновременно.</p>
            <p>В данный момент пересечения типов нельзя использовать вместе с объединёнными типами, например, <code>A&B|C</code>.</p>',

    'never_return_type_title' => 'Тип возвращаемого значения Never',
    'never_return_type_content' => '<p>Функция или метод, объявленные с типом <code>never</code>, указывают, что они не вернут значение и либо вызовут исключение, либо завершат выполнение скрипта с помощью вызова функции <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code> или подобных.</p>',

    'final_class_constants_title' => 'Окончательные константы класса',
    'final_class_constants_content' => '<p>Можно объявить окончательные константы класса, чтобы их нельзя было переопределить в дочерних классах.</p>',

    'octal_numeral_notation_title' => 'Явное восьмеричное числовое обозначение',
    'octal_numeral_notation_content' => '<p>Теперь можно записывать восьмеричные числа с явным префиксом <code>0o</code>.</p>',

    'fibers_title' => 'Файберы',
    'fibers_content' => '<p>Файберы — это примитивы для реализации облегчённого совместного параллелизма. По сути, они являются средством создания блоков кода, которые можно приостанавливать и возобновлять, подобно потокам. Основное отличие в том, что они никогда не вытесняются и что планирование должно выполняться общей библиотекой, а не операционной системой.</p>',

    'array_unpacking_title' => 'Поддержка распаковки массивов со строковыми ключами',
    'array_unpacking_content' => '<p>PHP раньше поддерживал распаковку массивов с помощью оператора <code>...</code>, но только если массивы были с целочисленными ключами. Теперь можно также распаковывать массивы со строковыми ключами.</p>',

    'performance_title' => 'Улучшения производительности',
    'performance_results' => 'Результат (относительно PHP 8.0):<br />
              - Ускорение Wordpress на 3.5%<br />
              - Ускорение демо-приложения Symfony на 27.0%',
    'performance_related_functions_title' => 'Функционал, связанный с производительностью в PHP 8.1:',
    'performance_jit_arm64' => 'Бэкенд JIT для ARM64(AArch64)',
    'performance_inheritance_cache' => 'Кеш наследования (избегайте повторного связывания классов в каждом запросе)',
    'performance_fast_class_name_resolution' => 'Быстрое разрешение имени класса (избегайте строчных букв и поиска по хешу)',
    'performance_timelib_date_improvements' => 'Улучшения производительности timelib и ext/date',
    'performance_spl' => 'Улучшения итераторов файловой системы SPL',
    'performance_serialize_unserialize' => 'Оптимизация функций serialize/unserialize',
    'performance_internal_functions' => 'Оптимизация некоторых внутренних функций (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())',
    'performance_jit' => 'Улучшения и исправления JIT',

    'bc_title' => 'Функционал, объявленный устаревшим и нарушение обратной совместимости',
    'bc_null_to_not_nullable' => 'Передача значения NULL параметрам встроенных функций, не допускающим значение NULL, объявлена устаревшей.',
    'bc_return_types' => 'Типы возвращаемых значений во встроенных методах классов PHP и уведомления об устаревании.',
    'bc_returntypewillchange' => 'Добавлен новый атрибут <code>#[ReturnTypeWillChange]</code>.',
    'bc_serializable_deprecated' => 'Интерфейс <code>Serializable</code> объявлен устаревшим.',
    'bc_html_entity_encode_decode' => 'Функции encode/decode объектов HTML обрабатывают одинарные кавычки и заменяют их по умолчанию.',
    'bc_globals_restrictions' => 'Ограничения использования переменной <code>$GLOBALS</code>.',
    'bc_mysqli_exceptions' => 'MySQLi: Режим ошибок по умолчанию установлен на выбрасывание исключения.',
    'bc_float_to_int_conversion' => 'Неявное несовместимое преобразование числа с плавающей точкой к целому числу объявлено устаревшим.',
    'bc_finfo_objects' => 'Модуль finfo: ресурсы <code>file_info</code> теперь представлены как объекты finfo.',
    'bc_imap_objects' => 'IMAP: ресурсы imap теперь представлены как объекты <code>IMAP\Connection</code>.',
    'bc_ftp_objects' => 'Модуль FTP: ресурсы Connection теперь представлены как объекты <code>FTP\Connection</code>.',
    'bc_gd_objects' => 'Модуль GD: Font identifiers теперь представлены как объекты <code>GdFont</code>.',
    'bc_ldap_objects' => 'LDAP: ресурсы теперь представлены как объекты <code>LDAP\Connection</code>, <code>LDAP\Result</code> и <code>LDAP\ResultEntry</code>.',
    'bc_postgresql_objects' => 'PostgreSQL: ресурсы теперь представлены как объекты <code>PgSql\Connection</code>, <code>PgSql\Result</code> и <code>PgSql\Lob</code>.',
    'bc_pspell_objects' => 'Pspell: ресурсы pspell, pspell config теперь представлены как объекты <code>PSpell\Dictionary</code>, <code>PSpell\Config</code>.',
    'bc_fsync_fdatasync' => 'Добавлены функции <code>fsync</code> и <code>fdatasync</code>.',
    'bc_array_is_list' => 'Добавлена новая функция <code>array_is_list</code>.',
    'bc_sodium_xchacha20' => 'Новые функции Sodium XChaCha20.',

    'footer_title' => 'Выше производительность, лучше синтаксис, надежнее система типов.',
    'footer_content' => '<p>
        Для загрузки исходного кода PHP 8.1 посетите страницу <a href="https://www.php.net/downloads">downloads</a>.
        Бинарные файлы Windows находятся на сайте <a href="https://windows.php.net/download">PHP для Windows</a>.
        Список изменений представлен в <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog</a>.
      </p>
      <p>
        <a href="/manual/ru/migration81.php">Руководство по миграции</a> доступно в разделе документации.
        Пожалуйста, изучите его для получения подробного списка новых возможностей и обратно несовместимых изменений..
      </p>',
];