<?php
$_SERVER['BASE_PAGE'] = 'releases/8_0_x.php';
include_once __DIR__ . '/../include/prepend.inc';

if ($LANG === 'en') {
    mirror_redirect('/releases/8_0_x.php?lang=' . urlencode($LANG));
}

if (($LANG !== 'pt_BR') && file_exists(__DIR__ . '/8_0_x_' . basename($LANG) . '.php')) {
    mirror_redirect('/releases/8_0_x_' . urlencode($LANG) . '.php?lang=' . urlencode($LANG));
}

site_header("PHP 8.0.0 Release Announcement", array(
    "current" => "php_8_0_x",
    'css' => array('php8.css'),
    'meta_tags' => array(
        'og:image' => $MYSITE . 'images/php8/php_8_released.png'
    )
));
?>
    <section class="php8-section php8-section_dark php8-section_header center">
        <div class="page-tools">
            <div class="change-language">
                <?php echo release_language_chooser($LANG); ?>
            </div>
        </div>
        <div class="php8-section__content">
            <div class="php8-logo">
                <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
            </div>
            <div class="php8-title">released!</div>
            <div class="php8-subtitle">
                PHP 8.0 é uma atualização importante da linguagem PHP. <br class="display-none-md"> Ela contém muitos novos
                recursos e otimizações, incluindo argumentos nomeados, união de tipos, atributos, promoção de propriedade do
                construtor, expressão match, operador nullsafe, JIT e melhorias no sistema de tipos, tratamento de
                erros e consistência.
            </div>
            <div class="php8-button-wrapper center">
                <a class="php8-button php8-button_light" href="/downloads">Atualize para o PHP 8!</a>
            </div>
        </div>
    </section>

    <section class="php8-section center">
        <div class="php8-compare">
            <h2 class="php8-h2" id="named-arguments">
                Argumentos nomeados
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
                    <li>Especifique apenas os parâmetros obrigatórios, pulando os opcionais.</li>
                    <li>Os argumentos são independentes da ordem e autodocumentados.</li>
                </ul>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="attributes">
                Atributos
                <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a>
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
                <p>Em vez de anotações PHPDoc, agora você pode usar metadados estruturados com a sintaxe nativa do PHP.</p>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="constructor-property-promotion">
                Promoção de propriedade de construtor
                <a class="php8-rfc" href="https://wiki.php.net/rfc/constructor_promotion">RFC</a>
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
                <p>Menos código boilerplate para definir e inicializar propriedades.</p>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="union-types">
                União de tipos
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
                <p>Em vez de anotações PHPDoc para uma combinação de tipos, você pode usar declarações de união de tipos nativa
                    que são validados em tempo de execução.</p>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="match-expression">
                Expressão match
                <a class="php8-rfc" href="https://wiki.php.net/rfc/match_expression_v2">RFC</a>
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
                <p>A nova expressão match é semelhante ao switch e tem os seguintes recursos:</p>
                <ul>
                    <li>Match é uma expressão, o que significa que seu resultado pode ser armazenado em uma variável ou
                        retornado.</li>
                    <li>Match suporta apenas expressões de uma linha e não precisa de uma declaração break;.</li>
                    <li>Match faz comparações estritas.</li>
                </ul>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="nullsafe-operator">
                Operador nullsafe
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
                <p>Em vez de verificar condições nulas, agora você pode usar uma cadeia de chamadas com o novo operador nullsafe.
                    Quando a avaliação de um elemento da cadeia falha, a execução de toda a cadeia é abortada e toda a cadeia é
                    avaliada como nula.</p>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="saner-string-to-number-comparisons">
                Comparações mais inteligentes entre strings e números
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
                <p>Ao comparar com uma string numérica, o PHP 8 usa uma comparação numérica. Caso contrário, ele converte o
                    número em uma string e usa uma comparação de string.</p>
            </div>
        </div>

        <div class="php8-compare">
            <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
                Erros consistentes para tipos de dados em funções internas
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
                <p>A maioria das funções internas agora lançam uma exceção Fatal Error se a validação do parâmetro falhar.</p>
            </div>
        </div>
    </section>

    <section class="php8-section php8-section_light">
        <h2 class="php8-h2">Compilação Just-In-Time</h2>
        <p>
            PHP 8 apresenta dois motores de compilação JIT. Tracing JIT, o mais promissor dos dois, mostra desempenho cerca de
            3 vezes melhor em benchmarks sintéticos e melhoria de 1,5 a 2 vezes em alguns aplicativos específicos de longa
            execução. O desempenho típico das aplicações está no mesmo nível do PHP 7.4.
        </p>
        <h3 class="php8-h3">
          Relative JIT contribution to PHP 8 performance
        </h3>
        <p>
            <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
        </p>

        <div class="php8-columns">
            <div class="php8-column">
                <h2 class="php8-h2 php8-h2_margin-top">Melhorias no sistema de tipo e tratamento de erros</h2>
                <ul>
                    <li>
                        Verificações de tipo mais rígidas para operadores aritméticos / bit a bit
                        <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
                    </li>
                    <li>
                        Validação de método abstrato em traits
                        <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
                    </li>
                    <li>
                        Assinaturas corretas de métodos mágicos <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
                    </li>
                    <li>
                        Avisos de motor reclassificados <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
                    </li>
                    <li>
                        Erro fatal para assinaturas de método incompatíveis <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
                    </li>
                    <li>
                        O operador @ não silencia mais os erros fatais.
                    </li>
                    <li>
                        Herança com métodos privados <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
                    </li>
                    <li>
                        Tipo mixed <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
                    </li>
                    <li>
                        Tipo de retorno static <a href="">RFC</a>
                    </li>
                    <li>
                        Tipagem de funções internas
                        <a href="https://externals.io/message/106522">RFC</a>
                    </li>
                    <li>
                        Objetos curl em vez de recursos
                        <a href="https://php.watch/versions/8.0/resource-CurlHandle">RFC</a>
                    </li>
                </ul>
            </div>
            <div class="php8-column">
              <h2 class="php8-h2 php8-h2_margin-top">Outros ajustes e melhorias de sintaxe</h2>
                <ul>
                    <li>
                      Permitir vírgula no final da lista de parâmetros
                      <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a> e listas de uso em closures
                      <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
                    </li>
                    <li>
                      Catches sem variável na captura de exceção <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
                    </li>
                    <li>
                      Ajustes de sintaxe para variáveis <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
                    </li>
                    <li>
                      Tratamento de nomes de namespace como token único
                      <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
                    </li>
                    <li>
                      Throw como expressão <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
                    </li>
                    <li>
                      Permitir ::class em objetos <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
                    </li>
                </ul>

                <h2 class="php8-h2 php8-h2_margin-top">Novas classes, interfaces e funções</h2>
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
                        <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> implementado com objetos
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="php8-section php8-section_dark php8-section_footer php8-footer">
        <div class="php8-section__content">
            <h2 class="php8-h2 center">
                Obtenha melhoria de desempenho gratuita.<br class="display-none-lg display-block-md">
                Obtenha melhor sintaxe.<br class="display-block-lg display-none-md display-block-sm">
                Obtenha mais segurança de tipos.
            </h2>
            <div class="php8-button-wrapper center">
                <a class="php8-button php8-button_light" href="/downloads">Atualize para o PHP 8!</a>
            </div>
            <div class="php8-footer__content">
                <p>
                    Para downloads do código-fonte do PHP 8, visite a página de
                    <a href="http://www.php.net/downloads">downloads</a>.
                    Os binários do Windows podem ser encontrados na página <a href="http://windows.php.net/download">PHP para
                        Windows</a>.
                    A lista de mudanças é registrada no <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
                </p>
                <p>
                    O <a href="/manual/pt_BR/migration80.php">guia de migração</a> está disponível no Manual do PHP.
                    Consulte-o para obter uma lista detalhada de novos recursos e alterações incompatíveis com versões anteriores.
                </p>
            </div>
        </div>
    </section>




<?php site_footer();