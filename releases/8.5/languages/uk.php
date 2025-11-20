<?php

return [
    'common_header' => 'PHP 8.5 — це велике оновлення мови PHP з новими можливостями, включно з URI-розширенням, оператором Pipe та підтримкою зміни властивостей під час клонування.',
    'main_title' => 'Розумніший, Швидший, Створений для Майбутнього.',
    'main_subtitle' => '<p><strong>PHP 8.5 — це велике оновлення мови PHP</strong> із новими можливостями, включно з <strong>URI-розширенням</strong>, <strong>оператором Pipe</strong> та підтримкою <strong>зміни властивостей під час клонування</strong>.</p>',

    'whats_new' => 'Що нового в 8.5',
    'upgrade_now' => 'Оновитись до PHP 8.5',
    'old_version' => 'PHP 8.4 та старіші',
    'badge_new' => 'НОВЕ',
    'documentation' => 'Документація',
    'released' => 'Випущено 20 листопада 2025',
    'key_features' => 'Ключові можливості PHP 8.5',
    'key_features_description' => '<p><strong>Швидший</strong>, <strong>чистіший</strong> і <strong>створений для розробників</strong>.</p>',

    'features_pipe_operator_title' => 'Оператор Pipe',
    'features_pipe_operator_description' => '<p>Оператор <code>|></code> дозволяє зʼєднувати виклики callable-функцій зліва направо, передаючи значення послідовно без проміжних змінних.</p>',
    'features_persistent_curl_share_handles_title' => 'Постійні cURL Share-хендли',
    'features_persistent_curl_share_handles_description' => '<p>Тепер хендли можуть зберігатись між запитами PHP, що дозволяє уникнути повторної ініціалізації з’єднань із тими самими хостами.</p>',
    'features_clone_with_title' => 'Clone With',
    'features_clone_with_description' => '<p>Клонуйте об’єкти та оновлюйте властивості новим синтаксисом <code>clone()</code>, що робить патерн "with-er" простим навіть для <code>readonly</code> класів.</p>',
    'features_uri_extension_title' => 'URI-розширення',
    'features_uri_extension_description' => '<p>PHP 8.5 додає вбудоване URI-розширення для парсингу, нормалізації та роботи з URL згідно зі стандартами <em>RFC 3986</em> та <em>WHATWG URL</em>.</p>',
    'features_no_discard_title' => 'Атрибут #[\NoDiscard]',
    'features_no_discard_description' => '<p>Атрибут <code>#[\NoDiscard]</code> попереджає, якщо повернуте значення не використано, допомагаючи уникати помилок і підвищуючи безпеку API.</p>',
    'features_fcc_in_const_expr_title' => 'Замикання та First-Class Callables у константних виразах',
    'features_fcc_in_const_expr_description' => '<p>Статичні замикання та first-class callables тепер можна використовувати в константних виразах, наприклад у параметрах атрибутів.</p>',

    'pipe_operator_title' => 'Оператор Pipe',
    'pipe_operator_description' => '<p>Pipe-оператор дає змогу ланцюжити виклики функцій без необхідності створювати проміжні змінні. Це дозволяє замінити вкладені виклики на ланцюжок, який читається зліва направо.</p><p>Більше про історію появи цієї можливості читайте у <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">блозі The PHP Foundation</a>.</p>',

    'array_first_last_title' => 'Функції array_first() та array_last()',
    'array_first_last_description' => '<p>Функції <code>array_first()</code> і <code>array_last()</code> повертають відповідно перший або останній елемент масиву. Якщо масив порожній — повертають <code>null</code>, що зручно для використання разом із оператором <code>??</code>.</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>Тепер можна оновлювати властивості під час клонування об’єкта, передаючи асоціативний масив у функцію <code>clone()</code>. Це природним чином реалізує патерн "with-er" для <code>readonly</code> класів.</p>',

    'uri_extension_title' => 'URI-розширення',
    'uri_extension_description' => '<p>Нове, завжди доступне URI-розширення забезпечує API для безпечного розбору та модифікації URI та URL згідно зі стандартами RFC 3986 і WHATWG URL.</p><p>Побудовано на основі <a href="https://uriparser.github.io/">uriparser</a> (RFC 3986) та <a href="https://lexbor.com/">Lexbor</a> (WHATWG URL).</p><p>Дізнайтеся більше в <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">блозі The PHP Foundation</a>.</p>',

    'no_discard_title' => 'Атрибут #[\NoDiscard]',
    'no_discard_description' => '<p>Додавши атрибут <code>#[\NoDiscard]</code> до функції, PHP перевірятиме, чи використано повернуте значення, і видасть попередження, якщо ні. Це покращує безпеку API, де повернене значення є важливим, але його легко проігнорувати.</p><p>Для явного позначення невикористаного значення можна застосувати приведення <code>(void)</code>.</p>',

    'persistent_curl_share_handles_title' => 'Постійні cURL Share-хендли',
    'persistent_curl_share_handles_description' => '<p>На відміну від <code>curl_share_init()</code>, хендли, створені через <code>curl_share_init_persistent()</code>, не знищуються наприкінці запиту. Якщо знайдено persistent-хендл з такими ж параметрами — він буде повторно використаний, що усуває необхідність ініціалізації cURL кожного разу.</p>',

    'fcc_in_const_expr_title' => 'Замикання та First-Class Callables у константних виразах',
    'fcc_in_const_expr_description' => '<p>Статичні замикання та first-class callables тепер можна використовувати в константних виразах: у параметрах атрибутів, значеннях властивостей і параметрів за замовчуванням та у константах.</p>',

    'new_classes_title' => 'Додаткові можливості та покращення',
    'fatal_error_backtrace' => 'Фатальні помилки (наприклад, перевищення максимального часу виконання) тепер містять backtrace.',
    'const_attribute_target' => 'Атрибути тепер можуть бути націлені на константи.',
    'override_attr_properties' => 'Атрибут {0} тепер можна застосовувати до властивостей.',
    'deprecated_traits_constants' => 'Атрибут {0} тепер можна використовувати в трейтах і константах.',
    'asymmetric_static_properties' => 'Статичні властивості тепер підтримують асиметричну видимість.',
    'final_promoted_properties' => 'Властивості можуть бути позначені як <code>final</code> за допомогою promotion у конструкторі.',
    'closure_getCurrent' => 'Додано метод <code>Closure::getCurrent()</code> для спрощення рекурсії в анонімних функціях.',
    'partitioned_cookies' => '{0} і {1} тепер підтримують ключ "partitioned".',
    'get_set_error_handler' => 'Доступні нові функції {0} і {1}.',
    'new_dom_element_methods' => 'Доступні нові методи {0} і {1}.',
    'grapheme_levenshtein' => 'Додано функцію {0}.',
    'delayed_target_validation' => 'Новий атрибут {0} дозволяє приглушити помилки компіляції від core-та extension-атрибутів, використаних на некоректних цільових елементах.',

    'bc_title' => 'Застаріння та несумісності',
    'bc_backtick_operator' => 'Оператор бектіків як псевдонім для {0} оголошено застарілим.',
    'bc_non_canonical_cast_names' => 'Неканонічні назви приведення <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code> та <code>(binary)</code> оголошено застарілими. Використовуйте відповідно <code>(bool)</code>, <code>(int)</code>, <code>(float)</code> та <code>(string)</code>.',
    'bc_disable_classes' => 'INI-параметр {0} видалено, оскільки він порушував роботу рушія.',
    'bc_semicolon_after_case' => 'Завершення операторів <code>case</code> крапкою з комою замість двокрапки оголошено застарілим.',
    'bc_null_array_offset' => 'Використання <code>null</code> як індекса масиву або у викликах {0} оголошено застарілим. Використовуйте порожній рядок.',
    'bc_class_alias_names' => 'Більше не можна використовувати "array" та "callable" як назви класів-аліасів у {0}.',
    'bc_sleep_wakeup' => 'Магічні методи {0} і {1} оголошено мʼяко застарілими. Натомість слід використовувати {2} і {3}.',
    'bc_casting_nan' => 'Тепер PHP видає попередження під час приведення {0} до інших типів.',
    'bc_non_array_destructuring' => 'Деструктуризація не-масивних значень (окрім <code>null</code>) через {0} або {1} тепер викликає попередження.',
    'bc_casting_non_int_floats' => 'Тепер видається попередження при приведенні float-значень (або рядків, що схожі на float) до <code>int</code>, якщо вони не можуть бути коректно представлені.',

    'footer_title' => 'Кращий синтаксис, вища продуктивність і краща типобезпечність.',
    'footer_description' => '<p class="first-paragraph">Повний список змін опубліковано у <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>.</p><p>Будь ласка, ознайомтеся з <a href="/manual/en/migration85.php" target="_blank">посібником з міграції</a> для детального переліку нових можливостей і несумісностей.</p>',
];
