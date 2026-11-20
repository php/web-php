<?php

/**
 * En-revision: 20b1bbed844a4609f3400ef0cd4e6be6fea323af
 */

return [
    'common_header' => 'PHP 8.1 — большое обновление языка PHP: перечисления, readonly-свойства, callback-функции как объекты первого класса, файберы, пересечение типов, улучшения производительности и многое другое.',
    'main_title' => 'доступен!',
    'main_subtitle' => 'PHP 8.1 — большое обновление языка PHP.<br class="display-none-md"> Оно содержит множество новых возможностей, включая перечисления, readonly-свойства, callback-функции как объекты первого класса, файберы, пересечение&nbsp;типов, улучшения производительности и многое другое.',
    'upgrade_now' => 'Переходите на PHP 8.1!',
    'documentation' => 'Документация',

    'enumerations_title' => 'Перечисления',
    'enumerations_content' => 'Используйте перечисления вместо набора констант, чтобы валидировать их автоматически во время выполнения кода.',

    'readonly_properties_title' => 'Readonly-свойства',
    'readonly_properties_content' => '<p>Readonly-свойства нельзя изменить после инициализации (т.е. когда им было присвоено значение).<br>Они будут крайне полезны при реализации объектов типа <abbr title="Объект-значение">VO</abbr> и <abbr title="Объект передачи данных">DTO</abbr>.</p>',

    'first_class_callable_syntax_title' => 'Callback-функции как объекты первого класса',
    'first_class_callable_syntax_content' => '<p>С помощью нового синтаксиса любая функция может выступать в качестве объекта первого класса. Тем самым она будет рассматриваться как обычное значение, которое можно, например, сохранить в переменную.</p>',

    'new_in_initializers_title' => 'Расширенная инициализация объектов ',
    'new_in_initializers_content' => '<p>Объекты теперь можно использовать в качестве значений параметров по умолчанию, статических переменных и глобальных констант, а также в аргументах атрибутов.</p>
            <p>Таким образом появилась возможность использования <strong>вложенных атрибутов</strong>.</p>',

    'pure_intersection_types_title' => 'Пересечение типов',
    'pure_intersection_types_content' => '<p>Теперь в объявлении типов параметров можно указать, что значение должно относиться к нескольким типам одновременно.</p>
            <p>В данный момент пересечения типов нельзя использовать вместе с объединёнными типами, например, <code>A&B|C</code>.</p>',

    'never_return_type_title' => 'Тип возвращаемого значения never',
    'never_return_type_content' => '<p>Функция или метод, объявленные с типом <code>never</code>, указывают на то, что они не вернут значение и либо выбросят исключение, либо завершат выполнение скрипта с помощью вызова функции <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code> или чем-то подобным.</p>',

    'final_class_constants_title' => 'Окончательные константы класса',
    'final_class_constants_content' => '<p>Теперь константы класса можно объявить как окончательные (final), чтобы их нельзя было переопределить в дочерних классах.</p>',

    'octal_numeral_notation_title' => 'Явное восьмеричное числовое обозначение',
    'octal_numeral_notation_content' => '<p>Теперь можно записывать восьмеричные числа с явным префиксом <code>0o</code>.</p>',

    'fibers_title' => 'Файберы',
    'fibers_content' => '<p>Файберы — это примитивы для реализации облегчённой невытесняющей конкурентности. Они являются средством создания блоков кода, которые можно приостанавливать и возобновлять, как генераторы, но из любой точки стека. Файберы сами по себе не предоставляют возможностей асинхронного выполнения задач, всё равно должен быть цикл обработки событий. Однако они позволяют блокирующим и неблокирующим реализациям использовать один и тот же API.</p>
        <p>Файберы позволяют избавиться от шаблонного кода, который ранее использовался с помощью <code>Promise::then()</code> или корутин на основе генератора. Библиотеки обычно создают дополнительные абстракции вокруг файберов, поэтому нет необходимости взаимодействовать с ними напрямую.</p>',

    'array_unpacking_title' => 'Поддержка распаковки массивов со строковыми ключами',
    'array_unpacking_content' => '<p>PHP раньше поддерживал распаковку массивов с помощью оператора <code>...</code>, но только если массивы были с целочисленными ключами. Теперь можно также распаковывать массивы со строковыми ключами.</p>',

    'performance_title' => 'Улучшения производительности',
    'performance_chart' => '<strong>Время запроса демо-приложения Symfony</strong><br>
                25 последовательных запусков по 250 запросов (сек)<br>
                (чем меньше тем лучше)<br>',
    'performance_results_title' => 'Результат (относительно PHP 8.0):',
    'performance_results_symfony' => 'Ускорение демо-приложения Symfony на 23,0%',
    'performance_results_wordpress' => 'Ускорение WordPress на 3,5%',
    'performance_related_functions_title' => 'Функциональность с улучшенной производительностью в PHP 8.1:',
    'performance_jit_arm64' => 'Бэкенд JIT для ARM64 (AArch64).',
    'performance_inheritance_cache' => 'Кеш наследования (не требуется связывать классы при каждом запросе).',
    'performance_fast_class_name_resolution' => 'Ускорено разрешение имени класса (исключены преобразование регистра имени и поиск по хешу).',
    'performance_timelib_date_improvements' => 'Улучшения производительности <code>timelib</code> и <code>ext/date</code>.',
    'performance_spl' => 'Улучшения итераторов файловой системы SPL.',
    'performance_serialize_unserialize' => 'Оптимизация функций <code>serialize()</code>/<code>unserialize()</code>.',
    'performance_internal_functions' => 'Оптимизация некоторых внутренних функций (<code>get_declared_classes()</code>, <code>explode()</code>,
        <code>strtr()</code>, <code>strnatcmp()</code>, <code>dechex()</code>).',
    'performance_jit' => 'Улучшения и исправления JIT.',

    'other_new_title' => 'Новые классы, интерфейсы и функции',
    'other_new_returntypewillchange' => 'Добавлен новый атрибут <code>#[ReturnTypeWillChange]</code>.',
    'other_new_fsync_fdatasync' => 'Добавлены функции <code>fsync</code> и <code>fdatasync</code>.',
    'other_new_array_is_list' => 'Добавлена новая функция <code>array_is_list</code>.',
    'other_new_sodium_xchacha20' => 'Новые функции Sodium XChaCha20.',

    'bc_title' => 'Устаревшая функциональность и изменения в обратной совместимости',
    'bc_null_to_not_nullable' => 'Передача значения <code>NULL</code> параметрам встроенных функций, не допускающим значение <code>NULL</code>, объявлена устаревшей.',
    'bc_return_types' => 'Предварительные типы возвращаемых значений во встроенных методах классов PHP',
    'bc_serializable_deprecated' => 'Интерфейс <code>Serializable</code> объявлен устаревшим.',
    'bc_html_entity_encode_decode' => 'Функции по кодированию/декодированию HTML-сущностей по умолчанию преобразуют одинарные кавычки и заменяют недопустимые символы на символ замены Юникода.',
    'bc_globals_restrictions' => 'Ограничены способы использования переменной <code>$GLOBALS</code>.',
    'bc_mysqli_exceptions' => 'Модуль MySQLi: режим ошибок по умолчанию установлен на выбрасывание исключения.',
    'bc_float_to_int_conversion' => 'Неявное преобразование числа с плавающей точкой к целому с потерей ненулевой дробной части объявлено устаревшим.',
    'bc_finfo_objects' => 'Модуль finfo: ресурсы <code>file_info</code> заменены на объекты <code>finfo</code>.',
    'bc_imap_objects' => 'Модуль IMAP: ресурсы <code>imap</code> заменены на объекты <code>IMAP\Connection</code>.',
    'bc_ftp_objects' => 'Модуль FTP: ресурсы <code>Connection</code> заменены на объекты <code>FTP\Connection</code>.',
    'bc_gd_objects' => 'Модуль GD: <code>Font identifiers</code> заменены на объекты <code>GdFont</code>.',
    'bc_ldap_objects' => 'Модуль LDAP: ресурсы заменены на объекты <code>LDAP\Connection</code>, <code>LDAP\Result</code> и <code>LDAP\ResultEntry</code>.',
    'bc_postgresql_objects' => 'Модуль PostgreSQL: ресурсы заменены на объекты <code>PgSql\Connection</code>, <code>PgSql\Result</code> и <code>PgSql\Lob</code>.',
    'bc_pspell_objects' => 'Модуль Pspell: ресурсы <code>pspell</code>, <code>pspell config</code> заменены на объекты <code>PSpell\Dictionary</code>, <code>PSpell\Config</code>.',

    'footer_title' => 'Выше производительность, лучше синтаксис, надёжнее система типов.',
    'footer_content' => '<p>
        Для загрузки исходного кода PHP 8.1 посетите страницу <a href="https://www.php.net/downloads">Downloads</a>.
        Бинарные файлы Windows находятся на сайте <a href="https://windows.php.net/download">PHP for Windows</a>.
        Список изменений перечислен на странице <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog</a>.
      </p>
      <p>
        <a href="/manual/ru/migration81.php">Руководство по миграции</a> доступно в разделе документации.
        Ознакомьтесь с ним, чтобы узнать обо всех новых возможностях и изменений, затрагивающих обратную совместимость.
      </p>',
];
