<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/it.php';
include_once __DIR__ . '/common.php';

releases\php80\common_header(
    'PHP 8.0 è una nuova versione major del linguaggio PHP. ' .
    'Contiene molte nuove funzionalità ed ottimizzazioni quali ' .
    'i named arguments, la definizione di tipi unione, gli attributi, la promozione a proprietà degli argomenti del costruttore, ' .
    'l\'espressione match, l\'operatore nullsafe, la compilazione JIT e ' .
    'miglioramenti al sistema dei tipi, alla gestione degli errori e alla consistenza.');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('it'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">Released!</div>
    <div class="php8-subtitle">
      PHP 8.0 è una nuova versione major del linguaggio PHP.<br class="display-none-md"> 
        Contiene molte nuove funzionalità ed ottimizzazioni quali i named arguments, 
        la definizione di tipi unione, gli attributi, la promozione a proprietà degli argomenti del costruttore,
        l'espressione match, l'operatore nullsafe, la compilazione JIT e 
        miglioramenti al sistema dei tipi, alla gestione degli errori e alla consistenza.
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Aggiorna a PHP 8!</a>
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
        <li>Indica solamente i parametri richiesti, saltando quelli opzionali.</li>
        <li>Gli argomenti sono indipendenti dall'ordine e auto-documentati.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      Attributi
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
      <p>Invece delle annotazioni PHPDoc, ora puoi usare metadati strutturati nella sintassi nativa PHP.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      Promozione a proprietà degli argomenti del costruttore
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
      <p>Meno ripetizioni di codice per definire ed inizializzare le proprietà.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Tipi unione
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
      <p>Invece di indicare una combinazione di tipi con le annotazioni PHPDoc, puoi usare una dichiarazione nativa 
          di tipo unione che viene validato durante l'esecuzione.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Espressione match
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
      <p>La nuova espressione match è simile allo switch e ha le seguenti funzionalità:</p>
      <ul>
        <li>Match è un'espressione, ovvero il suo risultato può essere salvato in una variabile o ritornato.</li>
        <li>I rami del match supportano solo espressioni a singola linea e non necessitano di un'espressione break;.</li>
        <li>Match esegue comparazioni strict.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Operatore nullsafe
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
      <p>Invece di controllare la presenza di un null, puoi ora usare una catena di chiamate con il nuovo operatore nullsafe. Quando
        la valutazione di un elemento della catena fallisce, l'esecuzione della catena si interrompe e l'intera catena
        restituisce il valore null.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      Comparazioni più coerenti di stringhe e numeri
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
      <p>Nella comparazione di una stringa numerica, PHP 8 usa la comparazione numerica. Altrimenti, converte il numero
        in una stringa e usa la comparazione tra stringhe.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      Tipi di errori consistenti per le funzioni native
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
      <p>La maggior parte delle funzioni native ora lanciano una eccezione Error se la validazione degli argomenti fallisce.</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">Compilazione Just-In-Time</h2>
  <p>
    PHP 8 intrduce due motori di compilazione JIT. Tracing JIT, il più promettente dei due, mostra delle prestazioni 3
    volte superiori nei benchmarks sintetici e 1.5–2 volte superiori per alcuni specifici processi applicativi a lunga esecuzione.
    Le prestazioni delle tipiche applicazioni web sono al pari con PHP 7.4.
  </p>
  <h3 class="php8-h3">
    Miglioramenti delle performance in PHP 8 grazie a JIT
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Sistema dei tipi e miglioramenti alla gestione degli errori</h2>
      <ul>
        <li>
          Controlli più stringenti per gli operatori aritmetici e bitwise
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
          Validazione dei metodi astratti nei trait <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
          Firme corrette nei metodi magici <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          Riclassificazione degli errori <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
          Errori fatali per firme di metodi non compatibili <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
          L'operatore @ non silenzia più gli errori fatali.
        </li>
        <li>
          Ereditarietà e metodi privati <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
          Tipo mixed <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
          Tipo di ritorno static <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
          Tipi per le funzioni native
          <a href="https://externals.io/message/106522">Email thread</a>
        </li>
        <li>
          Oggetti opachi invece che risorse per le estensioni
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, e
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Altre ritocchi e migliorie di sintassi </h2>
      <ul>
        <li>
          Permessa una virgola finale nella lista dei parametri <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
          e nell'espressione use per le closure <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
        </li>
        <li>
          Catch senza argomento <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
          Correzioni alla sintassi di variabile <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
          Trattamento dei nomi di namespace come un singolo token <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
          Throw è ora un'espressione <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
          Permesso l'utilizzo di ::class sugli oggetti <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">Nuove classi, interfacce e funzioni</h2>
      <ul>
        <li>
          Classe <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a>
        </li>
        <li>
          Interfaccia <a href="https://wiki.php.net/rfc/stringable">Stringable</a>
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
          Classe <a href="https://wiki.php.net/rfc/token_as_object">PhpToken</a> come alternativa a token_get_all()
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
      Performance migliorate, migliore sintassi, e migliore sicurezza dei tipi.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Aggiorna a PHP 8!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        Per scaricare il codice sorgente visita di PHP 8 visita la pagina di <a href="http://www.php.net/downloads">download</a>.
        I binari eseguibili per Windows possono essere trovati sul sito <a href="http://windows.php.net/download">PHP for Windows</a>.
        Una lista dei cambiamenti è registrata nel <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
      </p>
      <p>
        La <a href="/manual/en/migration80.php">guida alla migrazione</a> è disponibile nel manuale PHP. 
        Consultatelo per una lista completa delle nuove funzionalità e dei cambiamenti non retrocompatibili.
      </p>
    </div>
  </div>
</section>

<?php site_footer();
