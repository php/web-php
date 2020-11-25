<?php
$_SERVER['BASE_PAGE'] = 'releases/8_0_x.php';
include_once __DIR__ . '/../include/prepend.inc';

if ($LANG !== 'en' && file_exists("8_0_x_$LANG.php")) {
    mirror_redirect("/releases/8_0_x_$LANG.php?lang=$LANG");
}

site_header("PHP 8.0.0 Release Announcement", array(
        "current" => "php_8_0_x",
        'css' => array('php8.css'),
        'meta_tags' => array(
            'og:image' => $MYSITE . 'images/php8/php_8_released.png'
        )
));
?>
<section>
    <div class="page-tools">
        <div class="change-language">
            <?php echo release_language_chooser($LANG); ?>
        </div>
    </div>
</section>

<section class="php8-section php8-section_dark php8-section_header center">
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">released!</div>
    <div class="php8-subtitle">
      PHP 8.0 is de nieuwste versie van de programmeertaal PHP.<br class="display-none-md"> Het zit vol met nieuwe
      functionaliteit en optimalisaties zoals named arguments, union types, attributes, constructor property
      promotion, match expression, nullsafe operator, een JIT en verbeteringen in het type system, de fout-afhandeling
      en algehele consistentie.
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="#">Upgrade nu naar PHP 8!</a>
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
          <pre>htmlspecialchars($string, ENT_COMPAT | ENT_HTML401, 'UTF-8', false);</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
          <pre>htmlspecialchars($string, double_encode: false);</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <ul>
        <li>Specificeer alleen nog maar vereiste parameters, en skip alle optionele.</li>
        <li>Named arguments zijn volgorde-onafhankelijk en documenteren zichzelf.</li>
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
<pre>/**
* @Route("/api/posts/{id}", methods={"GET", "HEAD"})
*/
classUser
{</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
<pre>#[Route("/api/posts/{id}", methods: ["GET", "HEAD"])]
class User
{</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>In plaats van PHPDoc commentaar kun je nu gestructureerde meta-data opnemen met deze nieuwe PHP syntax.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      Constructor property promotion
      <a class="php8-rfc" href="https://wiki.php.net/rfc/constructor_promotion">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
<pre>class Point {
 public float $x;
 public float $y;
 public float $z;

 public function __construct(
     float $x = 0.0,
     float $y = 0.0,
     float $z = 0.0,
 ) {
     $this-&gt;x = $x;
     $this-&gt;y = $y;
     $this-&gt;z = $z;
 }
}</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
<pre>class Point {
 public function __construct(
     public float $x = 0.0,
     public float $y = 0.0,
     public float $z = 0.0,
 ) {}
}</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Minder franje nodig voor het definiëren en initialiseren van objecten.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Union types
      <a class="php8-rfc" href="https://wiki.php.net/rfc/union_types_v2">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
<pre>class Number {
 /** @var int|float */
 private $number;

 /**
  * @param float|int $number
  */
 public function __construct($number) {
     $this->number = $number;
 }
}

new Number('NaN'); // Ok</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
<pre>class Number {
 public function __construct(
     private int|float $number
 ) {}
}

new Number('NaN'); // TypeError</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>In plaats van PHPDoc commentaar voor een variabele met meerdere toegestane typen, kun je de nieuwe union type
        declaraties gebruiken die door PHP gevalideerd worden.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Match expression
      <a class="php8-rfc" href="https://wiki.php.net/rfc/match_expression_v2">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
<pre>switch (8.0) {
 case '8.0':
   $result = "Oh no!";
   break;
 case 8.0:
   $result = "This is what I expected";
   break;
}
echo $result;
//> Oh no!</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
<pre>echo match (8.0) {
 '8.0' => "Oh no!",
 8.0 => "This is what I expected",
};
//> This is what I expected</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>De nieuwe match lijkt op een switch, maar heeft de volgende afwijkende eigenschappen:</p>
      <ul>
        <li>Match is een expressie, wat betekent dat het resultaat opgeslagen kan worden in een variabele, of kan worden teruggestuurd.</li>
        <li>Match blokken bestaan uit een enkele regel en hebben geen break; statement nodig.</li>
        <li>Match vergelijkt altijd strict.</li>
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
<pre>$country =  null;

if ($session !== null) {
 $user = $session->user;

 if ($user !== null) {
     $address = $user->getAddress();

     if ($address !== null) {
         $country = $address->country;
     }
 }
}</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
          <pre>$country = $session?->user?->getAddress()?->country;</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>In plaats van allemaal losse controles op nulls kun je nu elementen blijven chainen met de nieuwe nullsafe operator. Wanneer
        het evalueren van één van de elementen faalt, faalt de hele chain direct en evalueert deze naar null.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      Saner string to number comparisons
      <a class="php8-rfc" href="https://wiki.php.net/rfc/string_to_number_comparison">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
          <pre>0 == 'foobar' // true</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
          <pre>0 == 'foobar' // false</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
	  <p>Als je in PHP 8 iets met een string vergelijkt, is de vergelijking afhankelijk van de waarde van de string. Als deze
        numeriek is wordt een numerieke vergelijking gebruikt, anders wordt het nummer naar string omgezet en worden deze als
        strings vergeleken.</p>
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
<pre>strlen([]); // Warning: strlen() expects parameter 1 to be string, array given

array_chunk([], -1); // Warning: array_chunk(): Size parameter expected to be greater than 0</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
<pre>strlen([]); // TypeError: strlen(): Argument #1 ($str) must be of type string, array given

array_chunk([], -1); // ValueError: array_chunk(): Argument #2 ($length) must be greater than 0</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>De meeste PHP functies gooien nu Fatal Error excepties wanneer de validatie van een parameter faalt.</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">Just-In-Time compilation</h2>
  <p>
    PHP 8 bevat twee nieuwe JIT compilers. De meest veelbelovende, Tracing JIT, heeft in synthetische tests een driemaal
    betere performance en in een aantal specifieke lang-draaiende applicaties een 1.5 tot tweemaal beter performance.
    Typische applicaties draaien minimaal even goed als op PHP 7.4.
  </p>
  <p>
    <img src="/images/php8/jit.png" alt="Just-In-Time compilation">
  </p>

  <h2 class="php8-h2 php8-h2_margin-top">Andere syntax tweaks en verbeteringen</h2>
  <div class="php8-columns">
    <div class="php8-column">
      <ul>
        <li>
          Trailing komma's zijn nu toegestaan in een lijst van parameters <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
          en closure use lijsten <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>.
        </li>
        <li>
          Sta catch toe zonder variabelenaam <a href="http://TODO">RFC</a>.
        </li>
        <li>
          Fix een aantal inconsistenties in de syntax van variabelen <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>.
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <ul>
        <li>
          Behandel namespaced namen als enkele token <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>.
        </li>
        <li>
          Throw expressies <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>.
        </li>
        <li>
          Maak ::class mogelijk op objecten <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>.
        </li>
      </ul>
    </div>
  </div>
  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Type systeem en verbeteringen in foutafhandeling</h2>
      <ul>
        <li>
          Logischere vergelijking tussen string en nummers<a href="https://wiki.php.net/rfc/string_to_number_comparison">RFC</a>.
        </li>
        <li>
          Striktere type checks voor rekenkundige/bitwise operators
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>.
        </li>
        <li>
          Abstracte trait methode validatie <a href="http://TODO">RFC</a>.
        </li>
        <li>
          Correcte beschrijving van magische methodes <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          Herclassificeer engine fouten <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>.
        </li>
        <li>
          Fatal error voor incompatibele methode beschrijvingen <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>.
        </li>
        <li>
          De @ operator onderdrukt niet langer fatale fouten.
        </li>
        <li>
          Overerving met private methoden <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>.
        </li>
        <li>
          Mixed typen <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>.
        </li>
        <li>
          Statische return type <a href="">RFC</a>.
        </li>
        <li>
          Correcte types voor interne functies
          <a href="https://externals.io/message/106522">RFC</a>.
        </li>
        <li>
          Curl gebruikt objecten in plaats van resources
          <a href="https://php.watch/versions/8.0/resource-CurlHandle">RFC</a>.
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Nieuwe classes, interfaces en functies</h2>
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
      </ul>
    </div>
  </div>
</section>

<section class="php8-section php8-section_dark php8-section_footer php8-footer">
  <div class="php8-section__content">
    <h2 class="php8-h2 center">
      Krijg gratis beter performance.<br class="display-none-lg display-block-md">
      Krijg een betere syntax.<br class="display-block-lg display-none-md display-block-sm">
      Krijg betere type-controle.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="#">Update naar PHP 8!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        Om de broncode the downloaden, bekijk de <a href="http://www.php.net/downloads">downloads</a> pagina.
        Windows uitvoerbare bestanden vindt je op de <a href="http://windows.php.net/download">PHP for Windows</a> site.
        Een compleet overzicht van verschillen staat in de <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
      </p>
      <p>
        De <a href="http://php.net/manual/en/migration8.php">migration guide</a> is beschikbaar in de handleiding. Kijk daar voor
        een gedetailleerd overzicht van nieuwe features en wijzigingen die mogelijk wijzigingen in je code vereisen.
      </p>
    </div>
  </div>
</section>




<?php site_footer();