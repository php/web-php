<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/es.php';
include_once __DIR__ . '/common.php';

releases\php80\common_header(
    'PHP 8.0 es una actualización importante del lenguaje php que contiene nuevos recursos y optimizaciones incluyendo ' .
    'argumentos nombrados, tipos de uniones, atributos, promoción de propiedades constructivas, expresiones de equivalencia, ' .
    'operador nullsafe, JIT (traducción dinámica) y también mejoras en el sistema de tipos, manejo de errores y consistencia en general.');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('es'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">Released!</div>
    <div class="php8-subtitle">
      PHP 8.0 es una actualización importante del lenguaje PHP que contiene nuevos recursos y optimizaciones
      incluyendo argumentos nombrados, tipos de uniones, atributos, promoción de propiedades constructivas,
      expresiones match, operador nullsafe, JIT (traducción dinámica) y también mejoras en el sistema de tipos,
      manejo de errores y consistencia en general.
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Actualizate a PHP 8!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
      Argumentos nombrados
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
        <li>Solamente especifica los parámetros requeridos, omite los opcionales.</li>
        <li>Los argumentos son independientes del orden y se documentan automáticamente.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      Atributos
      <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a> <a class="php8-rfc" href="/manual/es/language.attributes.php">Doc</a>
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
      <p>En vez de anotaciones en PHPDoc, puedes usar metadatos estructurados con el sintax nativo de PHP.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      Promoción de propiedades constructivas
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
      <p>Menos código repetitivo para definir e inicializar una propiedad.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Tipos de unión
      <a class="php8-rfc" href="https://wiki.php.net/rfc/union_types_v2">RFC</a>
      <a class="php8-rfc" href="/manual/en/language.types.declarations.php#language.types.declarations.composite.union">Doc</a>
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
      <p>En vez de anotaciones en PHPDoc para combinar tipos, puedes usar una declaración de tipo unión nativa que será validada en el momento de ejecución.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Expresiones match
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

      <p>Las nuevas expresiones match son similares a switch y tienen las siguientes características: </p>
      <ul>
        <li>Match es una expresión; esto quiere decir que pueden ser almacenadas como variables o devueltas.</li>
        <li>Match soporta expresiones de una línea y no necesitan romper declarar un break.</li>
        <li>Match hace comparaciones estrictas.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Operador Nullsafe
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
      <p>En vez de verificar condiciones nulas, tu puedes utilizar una cadena de llamadas con el nuevo operador nullsafe.
         Cuando la evaluación de un elemento falla, la ejecución de la entire cadena es abortada y la cadena entera es evaluada como nula.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      Comparaciones inteligentes entre “strings” y números
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
      <p> Cuando comparas con un “string” numérico, PHP8 usa comparación numérica o de otro caso convierte el número a
        un "string" y asi los compara.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      Errores consistentes para funciones internas.
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
      <p>La mayoría de las funciones internas ahora proveen un error de excepción si el parámetro no es validado.</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">JIT (traducciones dinámicas)</h2>
  <p>
    PHP8 introduce 2 motores de compilación JIT. Transit JIT, es el más prometedor de los  dos y performa 3 veces mejor
    en benchmarks sintéticos y 1.5-2 mejor en algunas aplicaciones específicas a largo plazo. Performancia de aplicaciones
    típicas es a la par de las de PHP7.4
  </p>
  <h3 class="php8-h3">
    JIT contribuciones al funcionamiento relativo de PHP8
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Mejorias en los tipos de sistemas y manejo de errores</h2>
      <ul>
        <li>
          Verificaciones estrictas de operadores aritméticos/bitwise.
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
          Validación de métodos con características abstractas <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
          Firmas correctas de métodos mágicos  <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          Reclacificamiento de errores fatales <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
          Errores fatales incompatibles con el método de firma <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
          El operador @ no omitirá errores fatales.
        </li>
        <li>
          Herencia con métodos privados  <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
          Tipos mixtos <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
          Tipo retorno statico <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
          Tipos para funciones internas
          <a href="https://externals.io/message/106522">Email thread</a>
        </li>
        <li>
          Objetos opacos en ves de recursos para
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>,
            y <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a> extensiones
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Otros ajustes y mejoras del sintax</h2>
      <ul>
        <li>
          Permitir una coma al final de una lista de parámetros <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
          y lista de use en closures <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
        </li>
        <li>
          Catches que no capturan <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
          Ajustes al syntax variable <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
          Tratamiento de nombres de namespace como tokens únicos<a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
          Throw es ahora una expresión  <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
          Permitir ::class on objects <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">Nuevas clases, interfaces y funciones</h2>
      <ul>
        <li>
          <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> clase
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
          <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> Implementación de objeto
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
      Mejor performancia, mejor syntax, aumentada seguridad de tipos.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Actualizate a PHP8!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        Para bajar el código fuente de PHP8 visita la página <a href="http://www.php.net/downloads">downloads</a>.
        Código binario para windows lo puedes encontrar en la página <a href="http://windows.php.net/download">PHP for Windows</a>.
        La lista de cambios está disponible en la página <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
      </p>
      <p>
        La <a href="/manual/en/migration80.php">guía de migración</a> está disponible en el manual de PHP.
        Por favor consultala para una lista detallada de alteraciones cambios y compatibilidad.
      </p>
    </div>
  </div>
</section>

<?php site_footer();
