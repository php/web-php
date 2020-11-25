<?php
$_SERVER['BASE_PAGE'] = 'releases/8_0_x_de.php';
include_once __DIR__ . '/../include/prepend.inc';

if ($LANG === 'en') {
    mirror_redirect("/releases/8_0_x.php?lang=$LANG");
    exit();
}

if ($LANG !== 'de' && file_exists("8_0_x_$LANG.php")) {
    mirror_redirect("/releases/8_0_x_$LANG.php?lang=$LANG");
    exit();
}

site_header("PHP 8.0.0 Release Announcement", array(
        "current" => "php_8_0_x_de",
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
    <div class="php8-title">Released!</div>
    <div class="php8-subtitle">
      PHP 8.0 ist ein Major-Update der Sprache PHP.<br class="display-none-md"> Es beinhaltet viele neue Funktionen
      und Optimierungen wie beispielsweise Named Arguments, Union Types, Attribute, Constructor Property Promotion,
      Match Ausdrücke, Nullsafe Operator, JIT und Verbesserungen des Typen-Systems, der Fehlerbehandlung und der
      Konsistenz.
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="#">Wechsle jetzt zu PHP 8!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
      Named Arguments
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
        <li>Gib nur notwendige Parameter an, überspringe optionale.</li>
        <li>Parameter sind unabhängig von der Reihenfolge und selbstdokumentierend.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      Attribute
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
      <p>Anstelle von PHPDoc Annotations kannst du nun struktirierte Meta-Daten in nativer PHP Syntax nutzen.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      Constructor Property Promotion
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
     $this->x = $x;
     $this->y = $y;
     $this->z = $z;
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
      <p>Weniger Codewiederholungen für das Definieren und Initialisieren von Objektattributen.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Union Types
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
      <p>Anstelle von PHPDoc Annotations für kombinierte Typen kannst du native Union-Type-Deklarationen verwenden,
         welche zur Laufzeit validiert werden.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Match Ausdruck
      <a class="php8-rfc" href="https://wiki.php.net/rfc/match_expression_v2">RFC</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
<pre>switch (8.0) {
 case '8.0':
   $result = "Oh nein!";
   break;
 case 8.0:
   $result = "Das hier habe ich erwartet";
   break;
}
echo $result;
//> Oh nein!</pre>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
<pre>echo match (8.0) {
 '8.0' => "Oh nein!",
 8.0 => "Das hier habe ich erwartet",
};
//> Das hier habe ich erwartet</pre>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Der neue Match Ausdruck ist ähnlich wie die Switch Anweisung und bietet folgende Funktionen:</p>
      <ul>
        <li>Match ist ein Ausruck. Das heißt, das Ergebnis kann in einer Variable gespeichert werden oder zurückgegeben
            werden.</li>
        <li>Match Zweige unterstützen nur einzeilige Ausdrücke und benötigen keinen break; Ausdruck.</li>
        <li>Match führt strikte Vergleiche durch.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Nullsafe Operator
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
      <p>Anstelle von Null-Checks kannst du Funktionsaufrufe nun direkt mit dem neuen Nullsafe Operator
         aneinanderreihen. Wenn ein Funktionsaufruf innerhalb der Kette Null zurückliefert, wird die weitere
         Ausführung abgebrochen und die gesamte Kette wird zu Null ausgewertet.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      Vernünftige String-zu-Zahl Vergleiche
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
      <p>Wenn eine Zahl mit einem numerischen String verglichen wird, benutzt PHP 8 einen Zahlen-Vergleich. Andernfalls
         wird die Zahl zu einem String konvertiert und ein String-Vergleich durchgeführt.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      Konsistente Typen-Fehler für interne Funktionen
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
      <p>Die meisten internen Funktionen erzeugen nun eine Fatal Error Exception wenn die Typenvalidierung der Parameter
         fehlschlägt.</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">Just-In-Time Compiler</h2>
  <p>
    PHP 8 führt zwei JIT Compiler Engines ein. Tracing-JIT, der vielversprechendere der beiden, zeigt eine bis zu drei
    mal bessere Performance in synthetischen Benchmarks und eine 1,5 bis zweifache Verbesserung in einigen speziellen,
    langlaufenden Anwendungen. Die Performance einer typischen Anwendung ist auf dem Niveau von PHP 7.4.
  </p>
  <p>
    <img src="/images/php8/jit.png" alt="Just-In-Time compilation">
  </p>

  <h2 class="php8-h2 php8-h2_margin-top">Weitere Syntax-Anpassungen und Verbesserungen</h2>
  <div class="php8-columns">
    <div class="php8-column">
      <ul>
        <li>
          Erlauben eines Abschließenden Kommas in Parameter-Listen <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
          und Closure Use Listen <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>.
        </li>
        <li>
          Catches ohne Exception Variable <a href="http://TODO">RFC</a>.
        </li>
        <li>
          Anpassungen an der Syntax für Variablen <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>.
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <ul>
        <li>
          Namespaces werden als ein Token ausgewertet <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>.
        </li>
        <li>
          Throw kann als Ausdruck verwendet werden <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>.
        </li>
        <li>
          Nutzung von ::class auf Objekten <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>.
        </li>
      </ul>
    </div>
  </div>
  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Verbesserungen am Typen-System und an der Fehlerbehandlung</h2>
      <ul>
        <li>
          Vernünftige String-zu-Zahl Vergleiche <a href="https://wiki.php.net/rfc/string_to_number_comparison">RFC</a>.
        </li>
        <li>
          Striktere Typen-Checks für arithmetische/bitweise Operatoren
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>.
        </li>
        <li>
          Validierung abstrakter Methoden in einem Trait <a href="http://TODO">RFC</a>.
        </li>
        <li>
          Korrekte Signaturen magischer Funktionen <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          Neue Klassifizierung von Engine-Warnings <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>.
        </li>
        <li>
          Inkompatiblen Methoden-Signaturen erzeugen einen Fatal Error <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>.
        </li>
        <li>
          Der @ Operator unterdrückt keine Fatal Errors mehr.
        </li>
        <li>
          Vererbung mit privaten Methoden <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>.
        </li>
        <li>
          Mixed Typ <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>.
        </li>
        <li>
          Static als Rückgabetyp <a href="">RFC</a>.
        </li>
        <li>
          Typen für interne Funktionen
          <a href="https://externals.io/message/106522">RFC</a>.
        </li>
        <li>
          Curl verwendet nun Objekte anstelle des resource Typs
          <a href="https://php.watch/versions/8.0/resource-CurlHandle">RFC</a>.
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Neue Klassen, Interfaces, und Funktionen</h2>
      <ul>
        <li>
          <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> Klasse
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/stringable">Stringable</a> Interface
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
          <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> mit einer Objekt-Implementierung
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="php8-section php8-section_dark php8-section_footer php8-footer">
  <div class="php8-section__content">
    <h2 class="php8-h2 center">
      Erhalte Performance Optimierungen.<br class="display-none-lg display-block-md">
      Erhalte bessere Syntax.<br class="display-block-lg display-none-md display-block-sm">
      Erhalte mehr Typensicherheit.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="#">Wechsle jetzt zu PHP 8!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        Für den direkten Code-Download von PHP 8 schaue bitte auf der <a href="http://www.php.net/downloads">Downloads</a> Seite vorbei.
        Windows Pakete können auf der <a href="http://windows.php.net/download">PHP for Windows</a> Seite gefunden werden.
        Die Liste der Änderungen ist im <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a> festgehalten.
      </p>
      <p>
        Der <a href="http://php.net/manual/en/migration8.php">Migration Guide</a> ist im PHP Manual verfügbar. Lies dort
        nach für detaillierte Informationen zu den neuen Funktionen und inkompatiblen Änderungen zu vorherigen PHP
        Versionen.
      </p>
    </div>
  </div>
</section>




<?php site_footer();