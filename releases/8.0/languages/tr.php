<?php

return [
    'common_header' => 'PHP 8.0, PHP dili için önemli bir güncellemedir. Optimizasyonlar ve yeni özellikler: Adlandırılmış Değişkenler, Union Types, Attributes, Kurucularda Özellik Tanımı, Match İfadesi, Nullsafe Operatorü, JIT(Anında Derleme) yanında tip sistemi, hata işleme ve tutarlılıkta iyileştirmeler içerir.',
    'documentation' => 'Doc',
    'main_title' => 'Yayında!',
    'main_subtitle' => 'PHP 8.0, PHP dili için önemli bir güncellemedir.<br class="display-none-md"> Optimizasyonlar ve yeni özellikler: Adlandırılmış Değişkenler, Union Types, Attributes, Kurucularda Özellik Tanımı, Match İfadesi, Nullsafe Operatorü, JIT(Anında Derleme) yanında tip sistemi, hata işleme ve tutarlılıkta iyileştirmeler içerir.',
    'upgrade_now' => "PHP 8'e geçiş yapın!",

    'named_arguments_title' => 'Adlandırılmış Değişkenler',
    'named_arguments_description' => '<li>Opsiyonel parametreleri atlayabiliyor ve yalnızca zorunlu olanları belirtebiliyorsunuz.</li><li>Parametrelerin sırası önemli değil ve kendi kendilerini dokümante ediyorlar.</li>',
    'attributes_title' => 'Attributes',
    'attributes_description' => 'PHPDoc yorum satırları yerine PHP sözdizimi ile yapılandırılmış metadata kullanılabiliyor.',
    'constructor_promotion_title' => 'Kurucularda Özellik Tanımı',
    'constructor_promotion_description' => 'Sınıfların özelliklerini tanımlamak için daha az kodlama yapılabiliyor.',
    'union_types_title' => 'Union types',
    'union_types_description' => 'Değişken türlerinin kombinasyonu için PHPDoc açıklamaları yerine çalışma zamanında doğrulanan birleşim türleri (union types) tanımlamaları kullanılabiliyor.',
    'match_expression_title' => 'Match İfadesi',
    'match_expression_description' => '<p>Yeni <code>match</code> ifadesi <code>switch</code>\'e çok benzer ve aşağıdaki özelliklere sahiptir:</p>
        <ul>
            <li>Match bir ifadedir, sonucu bir değişkende saklanabilir veya döndürülebilir.</li>
            <li>Match\'in karşılıkları tek satır ifadeleri destekler ve <code>break</code> kullanılması gerekmez.</li>
            <li>Match katı (strict) tip karşılaştırma yapar.</li>
        </ul>',

    'nullsafe_operator_title' => 'Nullsafe Operatorü',
    'nullsafe_operator_description' => 'Null koşulları için kontroller yazmak yerine yeni Nullsafe operatörüyle çağrı zinciri oluşturabilirsiniz. Oluşturduğunuz zincirdeki herhangi bir parça hatalı değerlendirilirse tüm zincirin işlevi durur ve null olarak değerlendirilir.',
    'saner_string_number_comparisons_title' => 'Daha Akıllı String ve Sayı Karşılaştırmaları',
    'saner_string_number_comparisons_description' => 'Sayısal string karşılaştırılırken PHP 8 sayısal olarak karşılaştırır. Aksi halde sayı bir string\'e çevrilir ve string olarak karşılaştırılır.',
    'consistent_internal_function_type_errors_title' => 'Dahili İşlevler için Tutarlı Hata Türleri',
    'consistent_internal_function_type_errors_description' => 'Artık dahili işlevlere gönderilen parametreler doğrulanamazsa <code>Error</code> exception fırlatıyorlar.',

    'jit_compilation_title' => 'Just-In-Time Derlemesi (JIT)',
    'jit_compilation_description' => 'PHP 8, iki JIT derleme motoru sunuyor. Tracing JIT, ikisi arasında en yetenekli olanı. Karşılaştırmalarda yaklaşık 3 kat daha iyi performans ve uzun süre işlem yapan bazı uygulamalarda 1,5–2 kat iyileşme gösteriyor. Normal uygulamalarda performansı PHP 7.4 ile aynı.',
    'jit_performance_title' => 'PHP 8 performasına JIT katkısının karşılaştırması',

    'type_improvements_title' => 'Tip sistemi ve hata işlemede iyileştirmeler',
    'arithmetic_operator_type_checks' => 'Aritmetik/bitsel operatörler için daha katı tip denetimi',
    'abstract_trait_method_validation' => 'Soyut özellikli metodlar için doğrulama',
    'magic_method_signatures' => 'Sihirli metodlar için doğru işaretlemeler',
    'engine_warnings' => 'Yeniden sınıflandırılan motor hataları',
    'lsp_errors' => 'Uyumsuz metod işaretleri için fatal error',
    'at_operator_no_longer_silences_fatal_errors' => '<code>@</code> operatörü artık önemli hataları susturmuyor',
    'inheritance_private_methods' => 'Private methodlarda kalıtımlar',
    'mixed_type' => '<code>mixed</code> tipi',
    'static_return_type' => '<code>static</code> return tipi',
    'internal_function_types' => 'Dahili işlevler için tip açıklamaları',
    'email_thread' => 'E-posta konusu',
    'opaque_objects_instead_of_resources' => 'Eklentiler için özkaynak türleri(resources) yerine opak nesneler:
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a> ve
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>.',

    'other_improvements_title' => 'Diğer PHP sözdizimi düzenlemeleri ve iyileştirmeleri',
    'allow_trailing_comma' => 'Parametre ve closure listelerinin sonunda virgül kullanılabilmesi <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'Değişken atamasına gerek olmayan hataların yakalanabilmesi',
    'variable_syntax_tweaks' => 'Değişken sözdizimlerinde iyileştirmeler',
    'namespaced_names_as_token' => 'İsim alanındaki tanımları tek bir belirteç olarak değerlendirme',
    'throw_expression' => '<code>throw</code> deyimi artık bir ifade (expression)',
    'class_name_literal_on_object' => 'Nesnelerde <code>::class</code> kullanılabilmesi',

    'new_classes_title' => 'Yeni Sınıflar, Arayüzler ve Fonksiyonlar',
    'weak_map_class' => '<a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> sınıfı',
    'stringable_interface' => '<a href="https://wiki.php.net/rfc/stringable">Stringable</a> arayüzü',
    'new_str_functions' => '<a href="https://wiki.php.net/rfc/str_contains">str_contains()</a>,
        <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_starts_with()</a>,
        <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_ends_with()</a> fonksiyonları',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> nesne implementasyonu',
    'new_dom_apis' => 'New DOM Traversal and Manipulation APIs',

    'footer_title' => 'Daha iyi performans, daha iyi sözdizimi, geliştirilmiş tip desteği.',
    'footer_description' => '<p>
            PHP 8\'i indirmek için <a href="https://www.php.net/downloads">downloads</a> sayfasını ziyaret edebilirsiniz.
            Windows için derlenmiş sürümüne <a href="https://windows.php.net/download">PHP for Windows</a> sayfasından ulaşabilirsiniz.
            Değişiklikler için <a href="https://www.php.net/ChangeLog-8.php">ChangeLog</a>\'a göz atabilirsiniz.
        </p>
        <p>
            PHP Kılavuzundan PHP 8 için <a href="/manual/tr/migration80.php">Göç Belgelerine</a> ulaşabilirsiniz.
            Yeni özellikler ve geriye dönük uyumluluğu etkileyecek değişikliklerin ayrıntılı listesi için göç belgesini inceleyiniz.
        </p>',
];
