<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/tr.php';
include_once __DIR__ . '/common.php';

releases\php80\common_header(
    'PHP 8.0, PHP dili için önemli bir güncellemedir. Optimizasyonlar ve yeni özellikler: Adlandırılmış ' .
    'Değişkenler, Union Types, Attributes, Kurucularda Özellik Tanımı, Match İfadesi, Nullsafe Operatorü, ' .
    'JIT(Anında Derleme) yanında tip sistemi, hata işleme ve tutarlılıkta iyileştirmeler içerir.');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('tr'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">Yayında!</div>
    <div class="php8-subtitle">
      PHP 8.0, PHP dili için önemli bir güncellemedir.<br class="display-none-md"> Optimizasyonlar ve yeni özellikler:
      Adlandırılmış Değişkenler, Union Types, Attributes, Kurucularda Özellik Tanımı, Match İfadesi, Nullsafe
      Operatorü, JIT(Anında Derleme) yanında tip sistemi, hata işleme ve tutarlılıkta iyileştirmeler içerir.
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">PHP 8'e geçiş yapın!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
      Adlandırılmış Değişkenler
      <a class="php8-rfc" href="https://wiki.php.net/rfc/named_params">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'htmlspecialchars($string, ENT_COMPAT | ENT_HTML401, \'UTF-8\', false);'
            );?>
        </div>


      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'htmlspecialchars($string, double_encode: false);'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <ul>
        <li>Opsiyonel parametreleri atlayabiliyor ve yalnızca zorunlu olanları belirtebiliyorsunuz.</li>
        <li>Parametrelerin sırası önemli değil ve kendi kendilerini dokümante ediyorlar.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      Attributes
      <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a> <a class="php8-rfc" href="/manual/tr/language.attributes.php">Doc</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'class PostsController
{
    /**
     * @Route("/api/posts/{id}", methods={"GET"})
     */
    public function get($id) { /* ... */ }
}'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'class PostsController
{
    #[Route("/api/posts/{id}", methods: ["GET"])]
    public function get($id) { /* ... */ }
}'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>PHPDoc yorum satırları yerine PHP sözdizimi ile yapılandırılmış metadata kullanılabiliyor.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      Kurucularda Özellik Tanımı
      <a class="php8-rfc" href="https://wiki.php.net/rfc/constructor_promotion">RFC</a> <a class="php8-rfc" href="/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion">Doc</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'class Point {
  public float $x;
  public float $y;
  public float $z;

  public function __construct(
    float $x = 0.0,
    float $y = 0.0,
    float $z = 0.0
  ) {
    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }
}'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'class Point {
  public function __construct(
    public float $x = 0.0,
    public float $y = 0.0,
    public float $z = 0.0,
  ) {}
}'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Sınıfların özelliklerini tanımlamak için daha az kodlama yapılabiliyor.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Union types
      <a class="php8-rfc" href="https://wiki.php.net/rfc/union_types_v2">RFC</a> <a class="php8-rfc" href="/manual/en/language.types.declarations.php#language.types.declarations.composite.union">Doc</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'class Number {
  /** @var int|float */
  private $number;

  /**
   * @param float|int $number
   */
  public function __construct($number) {
    $this->number = $number;
  }
}

new Number(\'NaN\'); // Ok'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'class Number {
  public function __construct(
    private int|float $number
  ) {}
}

new Number(\'NaN\'); // TypeError'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Değişken türlerinin kombinasyonu için PHPDoc açıklamaları yerine çalışma zamanında doğrulanan
        birleşim türleri (union types) tanımlamaları kullanılabiliyor.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Match İfadesi
      <a class="php8-rfc" href="https://wiki.php.net/rfc/match_expression_v2">RFC</a> <a class="php8-rfc" href="/manual/en/control-structures.match.php">Doc</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'switch (8.0) {
  case \'8.0\':
    $result = "Oh no!";
    break;
  case 8.0:
    $result = "This is what I expected";
    break;
}
echo $result;
//> Oh no!'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'echo match (8.0) {
  \'8.0\' => "Oh no!",
  8.0 => "This is what I expected",
};
//> This is what I expected'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Yeni match ifadesi switch'e çok benzer ve aşağıdaki özelliklere sahiptir:</p>
      <ul>
        <li>Match bir ifadedir, sonucu bir değişkende saklanabilir veya döndürülebilir.</li>
        <li>Match'in karşılıkları tek satır ifadeleri destekler ve break; kullanılması gerekmez.</li>
        <li>Match katı (strict) tip karşılaştırma yapar.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Nullsafe Operatorü
      <a class="php8-rfc" href="https://wiki.php.net/rfc/nullsafe_operator">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '$country =  null;

if ($session !== null) {
  $user = $session->user;

  if ($user !== null) {
    $address = $user->getAddress();
  
    if ($address !== null) {
      $country = $address->country;
    }
  }
}'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '$country = $session?->user?->getAddress()?->country;'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Null koşulları için kontroller yazmak yerine yeni Nullsafe operatörüyle çağrı zinciri
        oluşturabilirsiniz. Oluşturduğunuz zincirdeki herhangi bir parça hatalı
        değerlendirilirse tüm zincirin işlevi durur ve null olarak değerlendirilir.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      Daha Akıllı String ve Sayı Karşılaştırmaları
      <a class="php8-rfc" href="https://wiki.php.net/rfc/string_to_number_comparison">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '0 == \'foobar\' // true'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '0 == \'foobar\' // false'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Sayısal string karşılaştırılırken PHP 8 sayısal olarak karşılaştırır. Aksi halde sayı bir
        string'e çevrilir ve string olarak karşılaştırılır.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      Dahili İşlevler için Tutarlı Hata Türleri
      <a class="php8-rfc" href="https://wiki.php.net/rfc/consistent_type_errors">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'strlen([]); // Warning: strlen() expects parameter 1 to be string, array given

array_chunk([], -1); // Warning: array_chunk(): Size parameter expected to be greater than 0'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'strlen([]); // TypeError: strlen(): Argument #1 ($str) must be of type string, array given

array_chunk([], -1); // ValueError: array_chunk(): Argument #2 ($length) must be greater than 0'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Artık dahili işlevlere gönderilen parametreler doğrulanamazsa Error exception fırlatıyorlar.</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">Just-In-Time Derlemesi (JIT)</h2>
  <p>
    PHP 8, iki JIT derleme motoru sunuyor. Tracing JIT, ikisi arasında en yetenekli olanı. Karşılaştırmalarda
    yaklaşık 3 kat daha iyi performans ve uzun süre işlem yapan bazı uygulamalarda 1,5–2 kat iyileşme gösteriyor.
    Normal uygulamalarda performansı PHP 7.4 ile aynı.
  </p>
  <h3 class="php8-h3">
    PHP 8 performasına JIT katkısının karşılaştırması
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Tip sistemi ve hata işlemede iyileştirmeler</h2>
      <ul>
        <li>
          Aritmetik/bitsel operatörler için daha katı tip denetimi
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
          Soyut özellikli metodlar için doğrulama <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
          Sihirli metodlar için doğru işaretlemeler <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          Yeniden sınıflandırılan motor hataları <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
          Uyumsuz metod işaretleri için fatal error <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
          @ operatörü artık önemli hataları susturmuyor
        </li>
        <li>
          Private methodlarda kalıtımlar <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
          Mixed tipi <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
          Static return tipi <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
          Dahili işlevler için tip açıklamaları
          <a href="https://externals.io/message/106522">E-posta konusu</a>
        </li>
        <li>
          Eklentiler için özkaynak türleri(resources) yerine opak nesneler:
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a> ve
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>.
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Diğer PHP sözdizimi düzenlemeleri ve iyileştirmeleri</h2>
      <ul>
        <li>
          Parametre ve closure listelerinin sonunda virgül kullanılabilmesi <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
          <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
        </li>
        <li>
          Değişken atamasına gerek olmayan hataların yakalanabilmesi <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
          Değişken sözdizimlerinde iyileştirmeler <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
          İsim alanındaki tanımları tek bir belirteç olarak değerlendirme <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
          Throw deyimi artık bir ifade (expression) <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
          Nesnelerde ::class kullanılabilmesi <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">Yeni Sınıflar, Arayüzler ve Fonksiyonlar</h2>
      <ul>
        <li>
          <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> sınıfı
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/stringable">Stringable</a> arayüzü
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/str_contains">str_contains()</a>,
          <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_starts_with()</a>,
          <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_ends_with()</a> fonksiyonları
        </li>
        <li>
          <a href="https://github.com/php/php-src/pull/4769">fdiv()</a>
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/get_debug_type">get_debug_type()</a>
        </li>
        <li>
          <a href="https://github.com/php/php-src/pull/5427">get_resource_id()</a>
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> nesne implementasyonu
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/dom_living_standard_api">New DOM Traversal and Manipulation APIs</a>
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="php8-section php8-section_dark php8-section_footer php8-footer">
  <div class="php8-section__content">
    <h2 class="php8-h2 center">
      Daha iyi performans, daha iyi sözdizimi, geliştirilmiş tip desteği.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">PHP 8'e geçiş yapın!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        PHP 8'i indirmek için <a href="http://www.php.net/downloads">downloads</a> sayfasını ziyaret edebilirsiniz.
        Windows için derlenmiş sürümüne <a href="http://windows.php.net/download">PHP for Windows</a> sayfasından ulaşabilirsiniz.
        Değişiklikler için <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>'a göz atabilirsiniz.
      </p>
      <p>
        PHP Kılavuzundan PHP 8 için <a href="/manual/tr/migration80.php">Göç Belgelerine</a> ulaşabilirsiniz.
        Yeni özellikler ve geriye dönük uyumluluğu etkileyecek değişikliklerin ayrıntılı listesi için göç belgesini inceleyiniz.
      </p>
    </div>
  </div>
</section>




<?php site_footer();
