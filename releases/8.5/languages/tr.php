<?php

return [
    'common_header' => 'PHP 8.5, PHP dilinin büyük bir güncellemesidir ve URI Uzantısı, Pipe Operatörü ve nesne klonlama sırasında özellikleri değiştirme desteği gibi yeni özellikler içerir.',
    'main_title' => 'Daha Akıllı, Daha Hızlı, Yarına Hazır.',
    'main_subtitle' => '<p><strong>PHP 8.5, PHP dilinin büyük bir güncellemesidir</strong>, URI uzantısı, Pipe operatörü ve <strong>klonlama sırasında özellikleri değiştirme desteği</strong> gibi yeni özellikler içerir.</p>',

    'whats_new' => '8.5\'te Neler Yeni',
    'upgrade_now' => 'PHP 8.5\'e Yükseltin',
    'old_version' => 'PHP 8.4 ve öncesi',
    'badge_new' => 'YENİ',
    'documentation' => 'Doküman',
    'released' => 'Yayınlanma: 20 Kasım 2025',
    'key_features' => 'PHP 8.5’in Temel Özellikleri',
    'key_features_description' => '<p><strong>Daha hızlı</strong>, <strong>daha temiz</strong> ve <strong>geliştiriciler için tasarlanmış</strong>.</p>',

    'features_pipe_operator_title' => 'Pipe Operatörü',
    'features_pipe_operator_description' => '<p><code>|></code> operatörü, fonksiyonları soldan sağa zincirlemenizi sağlar ve değerleri ara değişken kullanmadan sorunsuz şekilde birden fazla fonksiyona geçirir.</p>',
    'features_persistent_curl_share_handles_title' => 'Kalıcı cURL Share Handle’lar',
    'features_persistent_curl_share_handles_description' => '<p>Handle’lar artık birden fazla PHP isteği boyunca kalıcı olabilir, aynı hostlara tekrar bağlantı başlatma maliyetini ortadan kaldırır.</p>',
    'features_clone_with_title' => 'Clone With',
    'features_clone_with_description' => '<p>Nesneleri klonlarken özellikleri yeni <code>clone()</code> sözdizimi ile güncellemek mümkündür, bu da <code>readonly</code> sınıflar için "with-er" desenini basitleştirir.</p>',
    'features_uri_extension_title' => 'URI Uzantısı',
    'features_uri_extension_description' => '<p>PHP 8.5,  <em>RFC 3986</em> ve  <em>WHATWG URL</em> standartlarına uygun URL’leri ayrıştırmak, normalize etmek ve yönetmek için yerleşik bir URI uzantısı ekler.</p>',
    'features_no_discard_title' => '#[\NoDiscard] Özelliği',
    'features_no_discard_description' => '<p><code>#[\NoDiscard]</code> özelliği, döndürülen değer kullanılmadığında uyarı verir, böylece hataları önler ve API güvenliğini artırır.</p>',
    'features_fcc_in_const_expr_title' => 'Sabit İfadelerde Closure’lar ve Birinci Sınıf Callable’lar',
    'features_fcc_in_const_expr_description' => '<p>Artık statik closure’lar ve birinci sınıf callable’lar sabit ifadelerde kullanılabilir, örneğin attribute parametrelerinde.</p>',

    'pipe_operator_title' => 'Pipe Operatörü',
    'pipe_operator_description' => '<p>Pipe operatörü, fonksiyon çağrılarını ara değişkenlerle uğraşmadan zincirlemenizi sağlar. Bu, iç içe geçmiş birçok çağrıyı ileri doğru okunabilecek bir zincir ile değiştirmenize olanak tanır.</p><p>Bu özelliğin arka planını öğrenmek için <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">PHP Foundation blogu</a>’na bakabilirsiniz.</p>',

    'array_first_last_title' => 'array_first() ve array_last() fonksiyonları',
    'array_first_last_description' => '<p><code>array_first()</code> ve <code>array_last()</code> fonksiyonları sırasıyla bir dizinin ilk veya son değerini döndürür. Eğer dizi boşsa <code>null</code> döner (bu, <code>??</code> operatörü ile kullanımı kolaylaştırır).</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>Artık nesne klonlama sırasında <code>clone()</code> fonksiyonuna bir ilişkisel dizi vererek özellikleri güncellemek mümkündür. Bu, <code>readonly</code> sınıflar için "with-er" desenini basitleştirir.</p>',

    'uri_extension_title' => 'URI Uzantısı',
    'uri_extension_description' => '<p>Yeni her zaman kullanılabilir URI uzantısı, URI ve URL’leri güvenli bir şekilde ayrıştırmak ve düzenlemek için API sağlar. RFC 3986 ve WHATWG URL standartlarına uygundur.</p><p><a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) ve <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL) kütüphaneleri tarafından desteklenmektedir.</p><p>Bu özelliğin arka planını öğrenmek için <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">PHP Foundation blogu</a>’na bakabilirsiniz.</p>',

    'no_discard_title' => '#[\NoDiscard] Özelliği',
    'no_discard_description' => '<p>Bir fonksiyona <code>#[\NoDiscard]</code> ekleyerek PHP, döndürülen değerin kullanılıp kullanılmadığını kontrol eder ve kullanılmadığında uyarı verir. Bu, döndürülen değerin önemli olduğu API’lerde hataları önler.</p>',

    'persistent_curl_share_handles_title' => 'Kalıcı cURL Paylaşılan Handle’lar',
    'persistent_curl_share_handles_description' => '<p><code>curl_share_init()</code> ile farklı olarak, <code>curl_share_init_persistent()</code> ile oluşturulan handle’lar PHP isteği sonunda yok edilmez. Eğer aynı paylaşılan ayarlara sahip bir persistent handle bulunursa tekrar kullanılır, cURL handle’larının her seferinde başlatılma maliyeti ortadan kalkar.</p>',

    'fcc_in_const_expr_title' => 'Sabit İfadelerde Closure’lar ve Birinci Sınıf Callable’lar',
    'fcc_in_const_expr_description' => '<p>Artık statik closure’lar ve birinci sınıf callable’lar sabit ifadelerde kullanılabilir. Bu, attribute parametreleri, özelliklerin ve parametrelerin varsayılan değerleri ve sabitler için geçerlidir.</p>',

    'new_classes_title' => 'Ek özellikler ve iyileştirmeler',
    'fatal_error_backtrace' => 'Önemli Hatalar (ör. maksimum yürütme süresini aşmak) artık bir geri izleme içerir.',
    'const_attribute_target' => 'Öznitelikler artık sabitleri hedefleyebilir.',
    'override_attr_properties' => '{0} özniteliği artık özelliklere uygulanabilir.',
    'deprecated_traits_constants' => '{0} özniteliği trait’lerde ve sabitlerde kullanılabilir.',
    'asymmetric_static_properties' => 'Statik özellikler artık asimetrik görünürlüğü destekler.',
    'final_promoted_properties' => 'Özellikler, constructor property promotion ile <code>final</code> olarak işaretlenebilir.',
    'closure_getCurrent' => 'Anonim fonksiyonlarda özyinelemeyi basitleştirmek için <code>Closure::getCurrent()</code> metodu eklendi.',
    'partitioned_cookies' => 'Fonksiyonlar {0} ve {1} artık "partitioned" anahtarını destekliyor.',
    'get_set_error_handler' => 'Yeni {0} ve {1} fonksiyonları mevcut.',
    'new_dom_element_methods' => 'Yeni {0} ve {1} metodları mevcut.',
    'grapheme_levenshtein' => '{0} fonksiyon eklendi.',
    'delayed_target_validation' => 'Yeni {0} özniteliği, geçersiz hedefler üzerinde core ve extension özniteliklerinin derleme zamanında hata vermesini engellemek için kullanılabilir.',

    'bc_title' => 'Kaldırılan ve geriye uyumluluk kıran değişiklikler',
    'bc_backtick_operator' => '{0} için alias olarak kullanılan backtick operatörü kaldırıldı.',
    'bc_non_canonical_cast_names' => 'Canonical olmayan cast isimleri <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code> ve <code>(binary)</code> artık kullanımdan kaldırıldı. Yerine sırasıyla <code>(bool)</code>, <code>(int)</code>, <code>(float)</code> ve <code>(string)</code> kullanılmalıdır.',
    'bc_disable_classes' => '{0} INI ayarı kaldırıldı çünkü çeşitli motor varsayımları bozulmasına neden olur.',
    'bc_semicolon_after_case' => '<code>case</code> ifadelerinin noktalı virgül ile bitirilmesi artık önerilmez.',
    'bc_null_array_offset' => '{0} çağırılırken veya array offset olarak <code>null</code> kullanımı artık önerilmez. Bunun yerine boş string kullanın.',
    'bc_class_alias_names' => '{0} içinde "array" ve "callable" alias isimlerini artık kullanmak mümkün değil.',
    'bc_sleep_wakeup' => '{0} ve {1} sihirli metodları artık soft-deprecated. {2} ve {3} metodları yerine kullanılmalıdır.',
    'bc_casting_nan' => '{0} tür dönüşümü sırasında artık uyarı verilir.',
    'bc_non_array_destructuring' => 'Array olmayan değerleri (sadece <code>null</code> dışında) {0} veya {1} kullanarak ayırmak artık uyarı verir.',
    'bc_casting_non_int_floats' => 'Float’ları (veya float gibi görünen string’leri) <code>int</code>’e dönüştürürken artık uyarı verilir.',

    'footer_title' => 'Daha iyi sözdizimi, geliştirilmiş performans ve tip güvenliği.',
    'footer_description' => '<p class="first-paragraph">Tüm değişikliklerin tam listesi <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>’da kayıtlıdır.</p><p>Yeni özellikler ve geriye uyumsuz değişiklikler için ayrıntılı listeye <a href="/manual/tr/migration85.php" target="_blank">göç rehberinden</a> bakabilirsiniz.</p>',
];
