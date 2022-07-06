<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/nl.php';
include_once __DIR__ . '/common.php';

releases\php80\common_header(
    'PHP 8.0 is een omvangrijke update van de PHP programmeertaal. ' .
    'Het bevat veel nieuwe mogelijkheden en optimalisaties, waaronder ' .
    'argument naamgeving, unie types, attributen, promotie van constructor eigenschappen, ' .
    'expressie vergelijking, null-veilige operator, JIT, en ' .
    'verbeteringen aan het type systeem, foute afhandeling, en consistentie.');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('nl'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">Beschikbaar!</div>
    <div class="php8-subtitle">
      PHP 8.0 is een omvangrijke update van de PHP programmeertaal.<br class="display-none-md"> Het bevat
      veel nieuwe mogelijkheden en optimalisaties, waaronder argument naamgeving, unie types, attributen,
      promotie van constructor eigenschappen, expressie vergelijking, null-veilige operator, JIT, en 
      verbeteringen aan het type systeem, foute afhandeling, en consistentie.
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Update naar PHP 8!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
      Argument naamgeving
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
        <li>Geef enkel vereiste parameters op, sla optionele parameters over.</li>
        <li>Argumenten hebben een onafhankelijke volgorde en documenteren zichzelf.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      Attributen
      <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a> <a class="php8-rfc" href="/manual/en/language.attributes.php">Doc</a>
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
      <p>In plaats van met PHPDoc annotaties kan je nu gestructureerde metadata gebruiken in PHP's eigen syntaxis.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      Promotie van constructor eigenschappen
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
      <p>Minder standaardcode nodig om eigenschappen te definiëren en initialiseren.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Unie types
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
      <p>In plaats van met PHPDoc annotaties kan je de mogelijke types via unie types declareren zodat
        deze ook gevalideerd worden tijdens de runtime.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Expressie vergelijking
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
      <p>De nieuwe match is gelijkaardig aan switch en heeft volgende eigenschappen:</p>
      <ul>
        <li>Match is een expressie, dit wil zeggen dat je het in een variabele kan bewaren of teruggeven.</li>
        <li>Match aftakkingen zijn expressies van één enkele lijn en bevatten geen break statements.</li>
        <li>Match vergelijkingen zijn strikt.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Null-veilige operator
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
      <p>In plaats van een controle op null uit te voeren kan je nu een ketting van oproepen vormen met de null-veilige operator.
        Wanneer één expressie in de ketting faalt, zal de rest van de ketting niet uitgevoerd worden en is het resultaat van
        de hele ketting null.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      Verstandigere tekst met nummer vergelijkingen
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
      <p>Wanneer PHP 8 een vergelijking uitvoert tegen een numerieke tekst zal er een numerieke vergelijking uitgevoerd
        worden. Anders zal het nummer naar een tekst omgevormd worden en er een tekstuele vergelijking uitgevoerd worden.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      Consistente type fouten voor interne functies
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
      <p>De meeste interne functies gooien nu een Error exception als de validatie van parameters faalt.</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">Just-In-Time compilatie</h2>
  <p>
    PHP 8 introduceert twee systemen voor JIT compilatie. De tracerende JIT is veelbelovend en presteert ongeveer 3 keer beter
    bij synthetische metingen en kan sommige langlopende applicaties 1.5–2 keer verbeteren. Prestaties van typische web applicaties
    ligt in lijn met PHP 7.4.
  </p>
  <h3 class="php8-h3">
    Relatieve JIT bijdrage aan de prestaties van PHP 8
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilatie">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Type systeem en verbeteringen van de fout afhandeling</h2>
      <ul>
        <li>
          Strikte type controles bij rekenkundige/bitsgewijze operatoren
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
          Validatie voor abstracte trait methodes <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
          Correcte signatures bij magic methods <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          Herindeling van de engine warnings <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
          Fatal error bij incompatibele method signatures <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
          De @ operator werkt niet meer bij het onderdrukken van fatale fouten.
        </li>
        <li>
          Overerving bij private methods <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
          Mixed type <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
          Static return type <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
          Types voor interne functies
          <a href="https://externals.io/message/106522">Email draadje</a>
        </li>
        <li>
          Opaque objects in plaats van resources voor
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, and
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
            extensies
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Andere syntaxis aanpassingen en verbeteringen</h2>
      <ul>
        <li>
          Sta toe om een komma te plaatsen bij het laatste parameter in een lijst <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
          en bij de use in closures <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
        </li>
        <li>
          Catches die niets vangen <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
          Variabele Syntaxis Aanpassingen <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
          Namespaced namen worden als één enkel token afgehandeld <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
          Throw is nu een expressie <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
          ::class werkt bij objecten <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">Nieuwe Classes, Interfaces, en Functies</h2>
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
          <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> object implementatie
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
      Betere prestaties, betere syntaxis, verbeterd type systeem.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Update naar PHP 8!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        Ga naar de <a href="http://www.php.net/downloads">downloads</a> pagina om de PHP 8 code te verkrijgen.
        Uitvoerbare bestanden voor Windows kan je vinden op de <a href="http://windows.php.net/download">PHP voor Windows</a> website.
        De volledige lijst met wijzigingen is vastgelegd in een <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
      </p>
      <p>
        De <a href="/manual/en/migration80.php">migratie gids</a> is beschikbaar in de PHP Handleiding. Gebruik
        deze om een gedetailleerde lijst te krijgen van nieuwe opties en neerwaarts incompatibele aanpassingen.
      </p>
    </div>
  </div>
</section>




<?php site_footer();
