<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/bn.php';
include_once __DIR__ . '/common.php';

releases\php80\language_redirect('bn');

releases\php80\common_header(
    'PHP 8.0 হচ্ছে PHP প্রোগ্রামিং ভাষার একটি গুরুত্বপুর্ণ সংস্করণ। ' .
    'এটিতে অনেক নতুন সুবিধা ও অপটিমাইজেশন রয়েছে। যেমন : ' .
    'named arguments, union types, attributes, constructor property promotion, ' .
    'match expression, nullsafe operator, JIT, ' .
    'ডাটা টাইপ ব্যবস্থার উন্নতি, ইরর ব্যবস্থাপনা, এবং অন্যান্য সামঞ্জস্যপূর্ণ পরিবর্তন।');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('bn'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">এসে গেছে!</div>
    <div class="php8-subtitle">
      PHP 8.0 হচ্ছে PHP প্রোগ্রামিং ভাষার একটি গুরুত্বপুর্ণ সংস্করণ।
      <br class="display-none-md"> এটিতে অনেক নতুন সুবিধা ও অপটিমাইজেশন রয়েছে।
      যেমন : named arguments, union types, attributes, constructor property promotion, match
      expression, nullsafe operator, JIT, ডাটা টাইপ ব্যবস্থার উন্নতি, ইরর ব্যবস্থাপনা, এবং অন্যান্য সামঞ্জস্যপূর্ণ পরিবর্তন।
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">চলুন, PHP 8 এ আপডেট করি!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
      Named arguments
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
        <li>শুধুমাত্র প্রয়োজনীয় প্যারামিটার গুলো উল্লেখ করুন, ঐচ্ছিক গুলো উল্লেখ না করলেও হবে।</li>
        <li>আর্গুমেন্টগুলো ক্রমানুসারে দেওয়া বাধ্যতামুলক নয়, এবং সহজেই নিজের সম্পর্কে তথ্য উপস্থাপন করে।</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      Attributes
      <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a>
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
      <p>PHPDoc annotations এর পরিবর্তে, আপনি এখন সুগঠিত মেটাডাটা ব্যবহার করতে পারেন যেটি PHP এর নিজস্ব সিনট্যাক্স।</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      Constructor property promotion
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
    float $z = 0.0,
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
      <p>অবজেক্ট প্রোপার্টি উল্লেখ এবং তৈরী করতে এখন থেকে তুলনামুলক কম কোড লেখা লাগবে।</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Union types
      <a class="php8-rfc" href="https://wiki.php.net/rfc/union_types_v2">RFC</a> <a class="php8-rfc" href="/manual/en/language.types.declarations.php#language.types.declarations.union">Doc</a>
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
      <p>PHP তে একাধিক টাইপ উল্লেখ করার উদ্দেশ্যে লেখা PHPDoc annotations এর পরিবর্তে,
          আপনি এখন native union type উল্লেখ করতে পারেন যা স্ক্রিপ্ট চলাকালিন সময়ে যাচাই করা হয়।</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Match expression
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
      <p>নতুন match() expression টি বর্তমান switch() এর মতই কাজ করে এবং এতে নিম্নোক্ত ফিচারগুলো আছে:</p>
      <ul>
        <li>Match একটি expression হওয়ায় এর রেজাল্ট একটি variable এ সেট করা বা রিটার্ন করা যায়।</li>
        <li>Match Branch গুলো শুধুমাত্র এক লাইন expression সমর্থন করে। এবং এতে কোনো break; statement এর দরকার পরে না।</li>
        <li>Match expression টি ডাটা টাইপ কঠোরভাবে তুলনা করে।</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Nullsafe operator
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
      <p>Null check conditions এর পরিবর্তে, এখন থেকে nullsafe operator এর মাধ্যমে chain of calls ব্যবহার করা যাবে।
          চেইন এর একটি এলিমেন্ট এর evaluation ব্যর্থ হলে, পুরো চেইন এর execution থেমে যায় এবং চেইনটি null রিটার্ন করে।</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      উন্নততর স্ট্রিং ও নাম্বারের তুলনা
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
      <p>PHP 8 এ numeric string তুলনা করার সময়, সেগুলোকে সংখ্যা হিসেবে তুলনা করা হয়।
        নয়তো, সংখ্যাটিকে string এ পরিবর্তন করা হয় এবং string হিসেবে তুলনা করা হয়।</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      Consistent type errors for internal functions
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
      <p>বেশিরভাগ internal function গুলো এখন Error Exception থ্রো করে যদি সেগুলোর parameter গুলোর টাইপ যাচাই করতে ব্যর্থ হয়।</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">Just-In-Time compilation</h2>
  <p>
    PHP 8 এ দুটো JIT compilation engine আনা হয়েছে।
    এদের মধ্যে সবচেয়ে উল্লেখযোগ্য, Tracing JIT ব্যবহার করে synthetic benchmark গুলোতে ৩ গুণ ভাল পারফর্মেন্স
    এবং কিছু নির্দিষ্ট long-running application এ ১.৫ থেকে ২ গুন ভাল পারফর্মেন্স লক্ষ্য করা গেছে।
    তবে সাধারন এপ্লিকেশনগুলোর পারফর্মেন্স PHP 7.4 এর মতই রয়েছে।
  </p>
  <h3 class="php8-h3">
    PHP 8 এর পারফর্মেন্সে JIT এর অবদানের তুলনাচিত্র
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">টাইপ ব্যবস্থা এবং ইরর হ্যান্ডলিং এর উন্নতিসমূহ</h2>
      <ul>
        <li>
          Arithmetic/bitwise operators এর জন্যে আরো কঠোর ভাবে টাইপ যাচাইকরণ
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
          Abstract trait method এর বৈধতা যাচাই <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
          ম্যাজিক মেথডগুলোর signature গুলো ঠিক করা হয়েছে <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          Engine warning গুলো নতুনভাবে সাজানো হয়েছে <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
          অসঙ্গত method signature এর জন্যে fatal error <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
          @ অপারেটরটি এখন আর fatal error গুলোকে এড়িয়ে যায় না।
        </li>
        <li>
          Inheritance with private methods <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
          Mixed টাইপ <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
          Static রিটার্ন টাইপ <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
          Internal function গুলোর টাইপ
          <a href="https://externals.io/message/106522">Email thread</a>
        </li>
        <li>
          এই এক্সটেনশনগুলোতে resource এর বদলে object ব্যবহার করা হয়েছে :
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, and
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">অন্যান্য syntax পরিবর্তন এবং উন্নতিসমূহ</h2>
      <ul>
        <li>
              Parameter <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">(RFC)</a> এবং closure use <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">(RFC)</a> তালিকার শেষে কমার (,) ব্যবহার
        </li>
        <li>
          Non-capturing catches <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
          Variable Syntax এর পরিবর্তন <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
          Namespace name গুলোকে একটা স্বতন্ত্র টোকেন হিসেবে ধরা <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
          এখন থেকে Throw একটি expression <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
          object এর সাথে ::class এর ব্যবহার <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">নতুন Classes, Interfaces, এবং Functions</h2>
      <ul>
        <li>
          <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> class
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/stringable">Stringable</a> interface
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/str_contains">str_contains()</a>,
          <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_starts_with()</a>,
          <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_ends_with()</a>
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
          <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> object implementation
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="php8-section php8-section_dark php8-section_footer php8-footer">
  <div class="php8-section__content">
    <h2 class="php8-h2 center">
      আরো ভাল performance, সুগঠিত syntax, উন্নত type সুরক্ষা
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">চলুন, PHP 8 এ আপডেট করি!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        PHP 8 এর সোর্স কোড ডাউনলোড করতে ভিজিট করুন <a href="http://www.php.net/downloads">downloads</a> পেজ।
        <a href="http://windows.php.net/download">PHP for Windows</a> সাইটে উইন্ডোজ বাইনারি পাওয়া যাবে।
        <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a> এ পরিবর্তনসমূহের তালিকা উল্লেখ করা আছে।
      </p>
      <p>
        <a href="/manual/en/migration80.php">migration guide</a> এ মাইগ্রেশন তথ্যাবলী পাওয়া যাবে।
        নতুন ফিচারসমূহ এবং backward-incompatible পরিবর্তনগুলো সম্পর্কে আরো বিস্তারিত জানতে দয়া করে সেটি ভাল করে পড়ে দেখুন।
      </p>
    </div>
  </div>
</section>




<?php site_footer();
