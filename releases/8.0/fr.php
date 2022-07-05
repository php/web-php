<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/en.php';
include_once __DIR__ . '/common.php';

releases\php80\common_header(
    "PHP 8.0 est une mise à jour majeure du langage PHP. " .
    "Elle contient beaucoup de nouvelle fonctionnalités et d'optimisations, " .
    "incluant les arguments nommés, les types d'union, attributs, " .
    "promotion de propriétés de constructeur, l'expression match, " .
    "l'opérateur nullsafe, JIT (Compilation à la Volée), " .
    "et des améliorations dans le système de typage, " .
    "la gestion d'erreur, et de cohérence.");

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('fr'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">Released!</div>
    <div class="php8-subtitle">
      PHP 8.0 est une mise à jour majeure du langage PHP.<br class="display-none-md">
      Elle contient beaucoup de nouvelles fonctionnalités et d'optimisations, incluant les arguments nommés,
      les types d'union, attributs, promotion de propriété de constructeur, l'expression match, l'opérateur
      nullsafe, JIT (Compilation à la Volée), et des améliorations dans le système de typage, la gestion
      d'erreur, et de cohérence.
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Migrez à PHP 8 maintenant!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
      Arguments nommés
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
        <li>Spécifiez uniquement les paramètres requis, omettant ceux optionnels.</li>
        <li>Les arguments sont indépendants de l'ordre et auto-documentés.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      Attributs
      <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a> <a class="php8-rfc" href="/manual/fr/language.attributes.php">Doc</a>
    </h2>
    <div class="php8-compare__main">
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label">PHP 7</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '/**
* @Route("/api/posts/{id}", methods={"GET", "HEAD"})
*/
class User
{'
            );?>
        </div>
      </div>
      <div class="php8-compare__arrow"></div>
      <div class="php8-compare__block example-contents">
        <div class="php8-compare__label php8-compare__label_new">PHP 8</div>
        <div class="php8-code phpcode">
            <?php highlight_php_trimmed(
                '#[Route("/api/posts/{id}", methods: ["GET", "HEAD"])]
class User
{'
            );?>
        </div>
      </div>
    </div>
    <div class="php8-compare__content">
      <p>Au lieux d'annotations PHPDoc, vous pouvez désormais utiliser les métadonnées structurés avec la syntaxe native de PHP.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      Promotion de propriétés de constructeur
      <a class="php8-rfc" href="https://wiki.php.net/rfc/constructor_promotion">RFC</a> <a class="php8-rfc" href="/manual/fr/language.oop5.decon.php#language.oop5.decon.constructor.promotion">Doc</a>
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
      <p>Moins de code redondant pour définir et initialiser les propriétés.</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Types d'union
      <a class="php8-rfc" href="https://wiki.php.net/rfc/union_types_v2">RFC</a> <a class="php8-rfc" href="/manual/fr/language.types.declarations.php#language.types.declarations.composite.union">Doc</a>
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
      <p>
          Au lieu d'annotation PHPDoc pour une combinaison de type, vous pouvez utiliser les déclarations de types
          d'union native qui sont validées lors de l'exécution.
      </p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Expression match
      <a class="php8-rfc" href="https://wiki.php.net/rfc/match_expression_v2">RFC</a> <a class="php8-rfc" href="/manual/fr/control-structures.match.php">Doc</a>
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
      <p>La nouvelle instruction match est similaire à switch et a les fonctionnalités suivantes :</p>
      <ul>
        <li>Match est une expression, signifiant que son résultat peut être enregistré dans une variable ou retourné.</li>
        <li>Les branches de match supportent uniquement les expressions d'une seule ligne, et n'a pas besoin d'une déclaration break;.</li>
        <li>Match fait des comparaisons strictes.</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Opérateur Nullsafe
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
      <p>
          Au lieu de faire des vérifications conditionnelles de null, vous pouvez utiliser une chaîne d'appel
          avec le nouvel opérateur nullsafe. Qui lorsque l'évaluation d'un élément de la chaîne échoue, l'exécution
          de la chaîne complète est terminée et la chaîne entière évalue à null.
      </p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      Comparaisons entre les chaînes de caractères et les nombres plus saines
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
      <p>
          Lors de la comparaison avec une chaîne numérique, PHP 8 utilise une comparaison de nombre.
          Sinon, il convertit le nombre à une chaîne de caractères et utilise une comparaison de chaîne de caractères.
      </p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      Erreurs de type cohérent pour les fonctions internes
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
      <p>La plupart des fonctions internes lancent désormais une exception Error si la validation du paramètre échoue.</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">Compilation Juste-à-Temps (JIT)</h2>
  <p>
    PHP 8 introduit deux moteurs de compilation JIT (juste à temps/compilation à la volée).
    Le Tracing JIT, le plus prometteur des deux, montre environ 3 fois plus de performances sur des benchmarks
    synthétiques et 1,5-2 fois plus de performances sur certaines applications à longue durée d'exécution.
    Généralement les performances des applications sont identiques à PHP 7.4.
  </p>
  <h3 class="php8-h3">
    Contribution relative du JIT à la performance de PHP 8
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Amélioration du système de typage et de la gestion d'erreur</h2>
      <ul>
        <li>
            Vérification de type plus sévère pour les opérateurs arithmétiques et bit à bit
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
            Validation de méthode abstraite des traits <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
            Signature valide des méthodes magiques <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
            Reclassifications des avertissements du moteur <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
            Erreur fatale pour des signatures de méthodes incompatibles <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
            L'opérateur @ ne silence plus les erreurs fatales.
        </li>
        <li>
            Héritages avec les méthodes privées <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
            Type mixed <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
            Type de retour static <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
            Types pour les fonctions internes
          <a href="https://externals.io/message/106522">Discussion e-mail</a>
        </li>
        <li>
            Objets opaques au lieu de ressources pour les extensions
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, et
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">Autres ajustements de syntaxe et améliorations</h2>
      <ul>
        <li>
            Autorisation des virgules trainantes dans les listes de paramètres <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
            et dans les listes des use d'une fermeture <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
        </li>
        <li>
          Les catchs non capturant <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
            Ajustement de la Syntaxe des Variables <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
            Traite les noms des espaces de nom comme un seul token <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
            Throw est désormais une expression <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
            Autorisation de ::class sur les objets <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">Nouvelles Classes, Interfaces, et Fonctions</h2>
      <ul>
        <li>
          Classe <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a>
        </li>
        <li>
          Interface <a href="https://wiki.php.net/rfc/stringable">Stringable</a>
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
          Implémentation objet de <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a>
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/dom_living_standard_api">Nouvelles APIs pour traverser et manipuler le DOM</a>
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="php8-section php8-section_dark php8-section_footer php8-footer">
  <div class="php8-section__content">
    <h2 class="php8-h2 center">
      Meilleures performances, meilleure syntaxe, amélioration de la sécurité de type.
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">Migrez à PHP 8 maintenant!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        Pour le téléchargement des sources de PHP 8 veuillez visiter la page de <a href="http://www.php.net/downloads">téléchargement</a>.
        Les binaires Windows peuvent être trouvés sur le site de <a href="http://windows.php.net/download">PHP pour Windows</a>.
        La liste des changements est notée dans le <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
      </p>
      <p>
        Le <a href="/manual/fr/migration80.php">guide de migration</a> est disponible dans le manuel PHP.
        Veuillez le consulter pour une liste détailler des nouvelles fonctionnalités et changements non rétrocompatibles.
      </p>
    </div>
  </div>
</section>




<?php site_footer();
