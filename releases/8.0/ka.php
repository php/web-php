<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/ka.php';
include_once __DIR__ . '/common.php';

releases\php80\common_header(
    'PHP 8.0 — PHP ენის დიდი განახლება. ' .
    'ის შეიცავს ბევრ ახალ შესაძლებლობას და ოპტიმიზაციებს, ' .
    'მათ შორის დასახელებული არგუმენტები, union type, ატრიბუტები, ' .
    'თვისებების გამარტივებული განსაზღვრა კონსტრუქტორში, გამოსახულება match, ' .
    'ოპერატორი nullsafe, JIT და გაუმჯობესებები ტიპის სისტემაში, ' .
    'შეცდომების დამუშავება და თანმიმდევრულობა.');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('ka'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">რელიზი!</div>
    <div class="php8-subtitle">
            PHP 8.0 — PHP ენის დიდი განახლება.<br class="display-none-md"> ის შეიცავს ბევრ ახალ შესაძლებლობას და ოპტიმიზაციებს,
            მათ შორის დასახელებული არგუმენტები, union type, ატრიბუტები, თვისებების გამარტივებული განსაზღვრა კონსტრუქტორში, გამოსახულება match,
            ოპერატორი nullsafe, JIT და გაუმჯობესებები ტიპის სისტემაში, შეცდომების დამუშავება და თანმიმდევრულობა.
        </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">გადადით PHP 8-ზე!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
    დასახელებული არგუმენტები
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
        <li>მიუთითეთ მხოლოდ საჭირო პარამეტრები, გამოტოვეთ არასავალდებულო.</li>
        <li>არგუმენტების თანმიმდევრობა არ არის მნიშვნელოვანი, არგუმენტები თვითდოკუმენტირებადია.</li>
    </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      Attributes
      <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a> <a class="php8-rfc" href="/manual/en/language.attributes.php">დოკუმენტაცია</a>
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
        <p>PHPDoc ანოტაციების ნაცვლად, შეგიძლიათ გამოიყენოთ სტრუქტურული მეტამონაცემები ნატიური PHP სინტაქსით.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
    თვისებების განახლება კონსტრუქტორში
      <a class="php8-rfc" href="https://wiki.php.net/rfc/constructor_promotion">RFC</a> <a class="php8-rfc" href="/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion">დოკუმენტაცია</a>
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
      <p>ნაკლები შაბლონური კოდი თვისებების განსაზღვრისა და ინიციალიზაციისთვის.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Union types
      <a class="php8-rfc" href="https://wiki.php.net/rfc/union_types_v2">RFC</a> <a class="php8-rfc" href="/manual/en/language.types.declarations.php#language.types.declarations.composite.union">დოკუმენტაცია</a>
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

new Number(\'NaN\'); // შეცდომები არაა'
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
        <p>PHPDoc ანოტაციების ნაცვლად, გაერთიანებული ტიპებისთვის  შეგიძლიათ გამოიყენოთ განცხადება union type, 
            რომლებიც მოწმდება შესრულების დროს.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
        გამოსახულება Match
      <a class="php8-rfc" href="https://wiki.php.net/rfc/match_expression_v2">RFC</a> <a class="php8-rfc" href="/manual/en/control-structures.match.php">დოკუმენტაცია</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                'switch (8.0) {
  case \'8.0\':
    $result = "ოოო არა!";
    break;
  case 8.0:
    $result = "ის, რასაც მე ველოდი";
    break;
}
echo $result;
//> ოოო არა!'
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
  8.0 => "ის, რასაც მე ველოდი",
};
//> ის, რასაც მე ველოდი'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
        <p>ახალი გამოსახულება match, switch ოპერატორის მსგავსია შემდეგი მახასიათებლებით:</p>
        <ul>
            <li>Match — ეს არის გამოსახულება, მისი შედეგი შეიძლება შენახული იყოს ცვლადში ან დაბრუნდეს.</li>
            <li>პირობა match  მხარს უჭერერს მხოლოდ ერთსტრიქონიან გამოსახულებებს, რომლებიც არ საჭიროებენ break; კონტროლის კონსტრუქციას.</li>
            <li>გამოსახულება match იყენებს მკაცრ შედარებას.</li>
        </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
        ოპერატორი Nullsafe
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
        <p>null-ის შემოწმების ნაცვლად, შეგიძლიათ გამოიყენოთ გამოძახების თანმიმდევრობა ახალ Nullsafe ოპერატორით.
        როდესაც ერთ-ერთი ელემენტი თანმიმდევრობაში აბრუნებს null-ს, შესრულება ჩერდება და მთელი თანმიმდევრობა აბრუნებს null-ს.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
        სტრიქონებისა და რიცხვების გაუმჯობესებული შედარება
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
        <p>PHP 8 რიცხვითი სტრიქონის შედარებისას იყენებს რიცხვების შედარებას. წინააღმდეგ შემთხვევაში, 
            რიცხვი გარდაიქმნება სტრიქონად და გამოიყენება სტრიქონების შედარება.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
        ტიპების თანმიმდევრულობის შეცდომები ჩაშენებული ფუნქციებისთვის
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
        <p>შიდა ფუნქციების უმეტესობა უკვე გამორიცხავს Error გამონაკლისს, თუ შეცდომა მოხდა პარამეტრის შემოწმებისას.</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">კომპილაცია Just-In-Time</h2>
  <p>
  PHP 8 წარმოგიდგენთ JIT-კომპილაციის ორ მექანიზმს. JIT ტრასირება, მათგან ყველაზე პერსპექტიულია, 
    სინთეზურ ბენჩმარკზე აჩვენებს მუშაობის გაუმჯობესებას დაახლოებით 3-ჯერ და 1.5-2-ჯერ ზოგიერთ დიდ ხანს მომუშავე აპლიკაციებში. 
    აპლიკაციის სტანდარტული წარმადობა ერთ და იგივე დონეზეა PHP 7.4-თან.
  </p>
  <h3 class="php8-h3">
    JIT-ის შედარებითი წვლილი PHP 8-ის წარმადობაში
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">გაუმჯობესებები ტიპის სისტემაში და შეცდომების დამუშავება</h2>
      <ul>
        <li>
            ტიპის უფრო მკაცრი შემოწმება არითმეტიკული/ბიტიური ოპერატორებისთვის
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
          აბსტრაქტული თვისებების მეთოდების შემოწმება <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
          ჯადოსნური მეთოდების სწორი სიგნატურები <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          ძრავის გაფრთხილებების ხელახალი კლასიფიკაცია <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
          ფატალური შეცდომა, როდესაც მეთოდის სიგნატურა შეუთავსებელია <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
          @ ოპერატორი აღარ აჩუმებს ფატალურ შეცდომებს.
        </li>
        <li>
          მემკვიდრეობა private მეთოდებთან <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
          ახალი ტიპი mixed <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
          დაბრუნების ტიპი static <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
          ტიპები სტანდარტული ფუნქციებისთვის
          <a href="https://externals.io/message/106522">Email თემა</a>
        </li>
        <li>
          გაუმჭვირვალე ობიექტები რესურსების ნაცვლად
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, and
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
            გაფართოებებისთვის
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">სინტაქსის სხვა გაუმჯობესება</h2>
      <ul>
        <li>
          მძიმე დაშვებულია პარამეტრების სიის ბოლოს <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
          და use დამოკლების სიაში <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
        </li>
        <li>
          ბლოკი catch ცვლადის მითითების გარეშე <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
          ცვლადის სინტაქსის ცვლილება <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
          სახელების სივრცეში სახელები განიხილება, როგორც ერთიამნი ტოკენი <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
          გამოსახულება Throw <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
          დამატება ::class ობიექტებისთვის <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">ახალი კლასები, ინტერფეისები და ფუნქციები</h2>
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
          <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> ობიექტზე-ორიენტირებული ფუნქცია
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/dom_living_standard_api">ახალი API-ები DOM-ის გადასასვლელად და დასამუშავებლად</a>
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="php8-section php8-section_dark php8-section_footer php8-footer">
  <div class="php8-section__content">
    <h2 class="php8-h2 center">
      უკეთესი წარმადობა, უკეთესი სინტაქსი, უფრო საიმედო ტიპების სისტემა.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">გადადით PHP 8-ზე!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        PHP 8 წყაროს კოდის ჩამოსატვირთად ეწვიეთ <a href="http://www.php.net/downloads">ჩამოტვირთვის</a> გვერდს.
        Windows-ის ბინარული ფაილები განთავსებულია საიტზე <a href="http://windows.php.net/download">PHP Windows-თვის</a>.
        ცვლილებების სია წარმოდგენილია <a href="http://www.php.net/ChangeLog-8.php">ChangeLog-ში</a>.
      </p>
      <p>
        <a href="/manual/en/migration80.php">მიგრაციის გზამკვლევი</a> ხელმისაწვდომია დოკუმენტაციის განყოფილებაში. გთხოვთ, 
            შეისწავლოთ იგი ახალი ფუნქციების დეტალური ჩამონათვალის მისაღებად და უკუ შეუთავსებელი ცვლილებებისთვის.
      </p>
    </div>
  </div>
</section>




<?php site_footer();
