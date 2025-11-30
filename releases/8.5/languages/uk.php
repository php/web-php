<?php

return [
    'common_header' => 'PHP 8.5 — це значне оновлення мови PHP, яке містить нові можливості, зокрема розширення URI, оператор Pipe та підтримку модифікації властивостей під час клонування.',
    'main_title' => 'Розумніший, швидший, створений для майбутнього.',
    'main_subtitle' => '<p><strong>PHP 8.5 — це значне оновлення мови PHP</strong>, яке містить нові можливості, зокрема <strong>розширення URI</strong>, <strong>оператор Pipe</strong> та підтримку <strong>модифікації властивостей під час клонування</strong>.</p>',

    'whats_new' => 'Що нового у версії 8.5',
    'upgrade_now' => 'Оновіться до PHP 8.5',
    'old_version' => 'PHP 8.4 і попередні версії',
    'badge_new' => 'Новинка',
    'documentation' => 'Документація',
    'released' => 'Випущено 20 листопада 2025 р.',
    'key_features' => 'Ключові можливості PHP 8.5',
    'key_features_description' => '<p><strong>Швидший</strong>, <strong>зрозуміліший</strong>, <strong>створений для розробників</strong>.</p>',

    'features_pipe_operator_title' => 'Оператор Pipe',
    'features_pipe_operator_description' => '<p>Оператор <code>|></code> дозволяє об\'єднувати виклики у ланцюжок зліва направо, плавно передаючи значення через кілька функцій без проміжних змінних.</p>',
    'features_persistent_curl_share_handles_title' => 'Постійні cURL-дескриптори',
    'features_persistent_curl_share_handles_description' => '<p>Дескриптори тепер можуть зберігатися між декількома PHP-запитами, що дозволяє уникнути витрат на повторну ініціалізацію з\'єднання з тими самими хостами.</p>',
    'features_clone_with_title' => 'Конструкція Clone With',
    'features_clone_with_description' => '<p>Клонуйте об\'єкти та оновлюйте властивості за допомогою нової синтаксичної конструкції <code>clone()</code>, яка спрощує використання шаблону «with-er» для <code>readonly</code> класів.</p>',
    'features_uri_extension_title' => 'Розширення URI',
    'features_uri_extension_description' => '<p>У PHP 8.5 додано розширення URI для аналізу, нормалізації та обробки URL-адрес відповідно до стандартів <em>RFC 3986</em> і <em>WHATWG URL</em>.</p>',
    'features_no_discard_title' => 'Атрибут #[\NoDiscard]',
    'features_no_discard_description' => '<p>Атрибут <code>#[\NoDiscard]</code> попереджає, коли повернене значення не використовується, допомагаючи запобігти помилкам і підвищити загальну безпеку API.</p>',
    'features_fcc_in_const_expr_title' => 'Замикання та callable-вирази першого класу в константних виразах',
    'features_fcc_in_const_expr_description' => '<p>Статичні замикання та callable-вирази першого класу тепер можна використовувати в константних виразах, таких як параметри атрибутів.</p>',

    'pipe_operator_title' => 'Оператор Pipe',
    'pipe_operator_description' => '<p>Оператор Pipe дозволяє об\'єднувати виклики функцій у ланцюжок без використання проміжних змінних. Це дозволяє замінити багато «вкладених викликів» ланцюжком, який можна читати вперед, а не зсередини назовні.</p><p>Дізнайтеся більше про історію створення цієї функції у <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">блозі PHP Foundation</a>.</p>',

    'array_first_last_title' => 'Функції array_first() і array_last()',
    'array_first_last_description' => '<p>Функції <code>array_first()</code> і <code>array_last()</code> повертають перше або останнє значення масиву відповідно. Якщо масив порожній, повертається <code>null</code> (що полегшує компонування з оператором <code>??</code>).</p>',

    'clone_with_title' => 'Конструкція Clone With',
    'clone_with_description' => '<p>Тепер можна оновлювати властивості під час клонування об\'єктів, передаючи асоціативний масив до функції <code>clone()</code>. Це забезпечує пряму підтримку шаблону «with-er» для <code>readonly</code> класів.</p>',

    'uri_extension_title' => 'Розширення URI',
    'uri_extension_description' => '<p>Нове вбудоване розширення URI надає API для безпечного аналізу та зміни URI та URL згідно зі стандартами RFC 3986 і WHATWG URL.</p><p>Працює на основі бібліотек <a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) і <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL).</p><p>Дізнайтеся більше про історію створення цієї функції у <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">блозі PHP Foundation</a>.</p>',

    'no_discard_title' => 'Атрибут #[\NoDiscard]',
    'no_discard_description' => '<p>Після додавання атрибуту <code>#[\NoDiscard]</code> до функції PHP перевірятиме, чи використовується повернене значення, і викликатиме попередження, якщо ні. Це дозволяє підвищити безпеку API, де повернене значення є важливим, але його можна випадково проігнорувати.</p><p>Відповідне приведення типу <code>(void)</code> може використовуватися як вказівка, що значення не використовується навмисно.</p>',

    'persistent_curl_share_handles_title' => 'Постійні cURL-дескриптори',
    'persistent_curl_share_handles_description' => '<p>На відміну від <code>curl_share_init()</code>, дескриптори, створені функцією <code>curl_share_init_persistent()</code>, не будуть знищуватися після завершення PHP-запиту. Якщо буде знайдено постійний дескриптор з тим самим набором опцій, його буде використано повторно, що дозволить уникнути витрат на ініціалізацію cURL-дескрипторів.</p>',

    'fcc_in_const_expr_title' => 'Замикання та callable-вирази першого класу в константних виразах',
    'fcc_in_const_expr_description' => '<p>Статичні замикання та callable-вирази першого класу тепер можна використовувати в константних виразах. Це стосується параметрів атрибутів, значень за замовчуванням для властивостей і параметрів, а також констант.</p>',

    'new_classes_title' => 'Додаткові можливості та покращення',
    'fatal_error_backtrace' => 'Фатальні помилки (наприклад, перевищення максимального часу виконання) тепер містять зворотне трасування.',
    'const_attribute_target' => 'Атрибути тепер можна застосовувати до констант.',
    'override_attr_properties' => 'Атрибут {0} тепер можна застосовувати до властивостей.',
    'deprecated_traits_constants' => 'Атрибут {0} тепер можна застосовувати до трейтів і констант.',
    'asymmetric_static_properties' => 'Статичні властивості тепер підтримують асиметричну область видимості.',
    'final_promoted_properties' => 'Властивості тепер можна позначати як <code>final</code>, оголошуючи їх за допомогою конструктора.',
    'closure_getCurrent' => 'Додано метод <code>Closure::getCurrent()</code>, який спрощує використання рекурсії в анонімних функціях.',
    'partitioned_cookies' => 'Функції {0} та {1} тепер підтримують ключ "partitioned".',
    'get_set_error_handler' => 'Доступні нові функції {0} і {1}.',
    'new_dom_element_methods' => 'Доступні нові методи {0} і {1}.',
    'grapheme_levenshtein' => 'Додано функцію {0}.',
    'delayed_target_validation' => 'Новий атрибут {0} дозволяє усунути помилки компіляції, що спричинені застосуванням атрибутів ядра та розширень для цілей, для яких вони не призначені.',

    'bc_title' => 'Застаріла функціональність і зміни у зворотній сумісності',
    'bc_backtick_operator' => 'Можливість використання зворотного апострофу як псевдоніма функції {0} оголошено застарілою.',
    'bc_non_canonical_cast_names' => 'Неканонічні імена типів <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code> та <code>(binary)</code> оголошено застарілими. Замість них використовуйте відповідно <code>(bool)</code>, <code>(int)</code>, <code>(float)</code> і <code>(string)</code>.',
    'bc_disable_classes' => 'Налаштування INI {0} вилучено, оскільки його використання призводило до нестабільної роботи рушія.',
    'bc_semicolon_after_case' => 'Можливість використання крапки з комою для завершення операторів <code>case</code> замість двокрапки оголошено застарілою.',
    'bc_null_array_offset' => 'Можливість використання <code>null</code> у якості ключа масиву чи аргументу функції {0} оголошено застарілою. Натомість використовуйте порожній рядок.',
    'bc_class_alias_names' => 'Ключові слова «array» і «callable» більше не можна використовувати як псевдоніми класів у функції {0}.',
    'bc_sleep_wakeup' => 'Магічні методи {0} і {1} оголошено нерекомендованими. Натомість використувуйте магічні методи {2} та {3}.',
    'bc_casting_nan' => 'Приведення {0} до інших типів тепер викликає попередження.',
    'bc_non_array_destructuring' => 'Деструктурування значень, що не є масивами (крім <code>null</code>), за допомогою {0} або {1} тепер викликає попередження.',
    'bc_casting_non_int_floats' => 'Приведення чисел з плаваючою крапкою (або рядків, що їх представляють) до цілого типу тепер викликає попередження, якщо їх неможливо представити як ціле число.',

    'footer_title' => 'Кращий синтаксис, покращена продуктивність і безпека типів.',
    'footer_description' => '<p class="first-paragraph">Повний перелік змін описано на сторінці <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>.</p><p>Будь ласка, ознайомтеся з <a href="/manual/uk/migration85.php" target="_blank">посібником з міграції</a>, щоб отримати детальніший список нових функцій і несумісних змін.</p>',
];
