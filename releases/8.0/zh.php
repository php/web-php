<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/zh.php';
include_once __DIR__ . '/common.php';

releases\php80\common_header(
    'PHP 8.0 是 PHP 语言的一个主版本更新。它包含了很多新功能与优化项，' .
    '包括命名参数、联合类型、注解、构造器属性提升、match 表达式、' .
    'Nullsafe 运算符、JIT，并改进了类型系统、错误处理、语法一致性。');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('zh'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">已发布！</div>
    <div class="php8-subtitle">
      PHP 8.0 是 PHP 语言的一个主版本更新。
      <br class="display-none-md"> 它包含了很多新功能与优化项，
      包括命名参数、联合类型、注解、构造器属性提升、match 表达式、nullsafe 运算符、JIT，并改进了类型系统、错误处理、语法一致性。
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">更新到 PHP 8！</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
      命名参数
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
        <li>仅仅指定必填参数，跳过可选参数。</li>
        <li>参数的顺序无关、自己就是文档（self-documented）</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      注解
      <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a> <a class="php8-rfc" href="/manual/zh/language.attributes.php">Doc</a>
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
      <p>现在可以用 PHP 原生语法来使用结构化的元数据，而非 PHPDoc 声明。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
        构造器属性提升
      <a class="php8-rfc" href="https://wiki.php.net/rfc/constructor_promotion">RFC</a> <a class="php8-rfc" href="/manual/zh/language.oop5.decon.php#language.oop5.decon.constructor.promotion">文档</a>
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
      <p>更少的样板代码来定义并初始化属性。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      联合类型
      <a class="php8-rfc" href="https://wiki.php.net/rfc/union_types_v2">RFC</a> <a class="php8-rfc" href="/manual/zh/language.types.declarations.php#language.types.declarations.composite.union">文档</a>
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
      <p>相较于以前的 PHPDoc 声明类型的组合，
      现在可以用原生支持的联合类型声明取而代之，并在运行时得到校验。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Match 表达式
      <a class="php8-rfc" href="https://wiki.php.net/rfc/match_expression_v2">RFC</a> <a class="php8-rfc" href="/manual/zh/control-structures.match.php">文档</a>
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
      <p>新的 match 类似于 switch，并具有以下功能：</p>
      <ul>
        <li>Match 是一个表达式，它可以储存到变量中亦可以直接返回。</li>
        <li>Match 分支仅支持单行，它不需要一个 break; 语句。</li>
        <li>Match 使用严格比较。</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Nullsafe 运算符
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
      <p>现在可以用新的 nullsafe 运算符链式调用，而不需要条件检查 null。
        如果链条中的一个元素失败了，整个链条会中止并认定为 Null。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      字符串与数字的比较更符合逻辑
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
      <p>PHP 8 比较数字字符串（numeric string）时，会按数字进行比较。
        不是数字字符串时，将数字转化为字符串，按字符串比较。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      内部函数类型错误的一致性。
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
      <p>现在大多数内部函数在参数验证失败时抛出 Error 级异常。</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">即时编译</h2>
  <p>
    PHP 8 引入了两个即时编译引擎。 
    Tracing JIT 在两个中更有潜力，它在综合基准测试中显示了三倍的性能，
    并在某些长时间运行的程序中显示了 1.5-2 倍的性能改进。
    典型的应用性能则和 PHP 7.4 不相上下。
  </p>
  <h3 class="php8-h3">
    关于 JIT 对 PHP 8 性能的贡献
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">类型系统与错误处理的改进</h2>
      <ul>
        <li>
          算术/位运算符更严格的类型检测
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
          Abstract trait 方法的验证 <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
          确保魔术方法签名正确 <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          PHP 引擎 warning 警告的重新分类 <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
          不兼容的方法签名导致 Fatal 错误 <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
          操作符 @ 不再抑制 fatal 错误。
        </li>
        <li>
          私有方法继承 <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
          Mixed 类型 <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
          Static 返回类型 <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
        内部函数的类型
          <a href="https://externals.io/message/106522">Email thread</a>
        </li>
        <li>
          扩展
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>、
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>、
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>、
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>、
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>、
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
            以 Opaque 对象替换 resource。
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">其他语法调整和改进</h2>
      <ul>
        <li>
          允许参数列表中的末尾逗号 <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>、
          闭包 use 列表中的末尾逗号 <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
        </li>
        <li>
          无变量捕获的 catch <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
          变量语法的调整 <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
           Namespace 名称作为单个 token <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
          现在 throw 是一个表达式 <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
          允许对象的 ::class <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">新的类、接口、函数</h2>
      <ul>
        <li>
          <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> 类
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/stringable">Stringable</a> 接口
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/str_contains">str_contains()</a>、
          <a href="https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions">str_starts_with()</a>、
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
          <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> 对象实现
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
      性能更好，语法更好，类型安全更完善
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">更新到 PHP 8！</a>
    </div>
    <div class="php8-footer__content">
      <p>
        请访问 <a href="http://www.php.net/downloads">下载</a> 页面下载 PHP 8 源代码。
        在 <a href="http://windows.php.net/download">PHP for Windows</a> 站点中可找到 Windows 二进制文件。
        <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a> 中有变更历史记录清单。
      </p>
      <p>
        PHP 手册中有 <a href="/manual/zh/migration80.php">迁移指南</a>。
        请参考它描述的新功能详细清单、向后不兼容的变化。
      </p>
    </div>
  </div>
</section>




<?php site_footer();
