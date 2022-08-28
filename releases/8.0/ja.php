<?php
$_SERVER['BASE_PAGE'] = 'releases/8.0/en.php';
include_once __DIR__ . '/common.php';

releases\php80\common_header(
    'PHP 8.0 は、PHP 言語のメジャーアップデートです。' .
    'このアップデートには、たくさんの新機能や最適化が含まれています。たとえば' .
    '名前付き引数、union 型、アトリビュート、コンストラクタでのプロパティのプロモーション、' .
    'match 式、 nullsafe 演算子、JIT、' .
    '型システムの改善、エラーハンドリング、一貫性の向上などです。');

?>
<section class="php8-section php8-section_dark php8-section_header center">
  <div class="page-tools">
    <div class="change-language">
        <?php releases\php80\language_chooser('ja'); ?>
    </div>
  </div>
  <div class="php8-section__content">
    <div class="php8-logo">
      <img src="/images/php8/logo_php8.svg" alt="php8" height="126" width="343">
    </div>
    <div class="php8-title">Released!</div>
    <div class="php8-subtitle">
      PHP 8.0 は、PHP 言語のメジャーアップデートです。<br class="display-none-md"> このアップデートには、たくさんの新機能や最適化が含まれています。
      たとえば 名前付き引数、 union 型、アトリビュート、コンストラクタでのプロパティのプロモーション、match 式、nullsafe 演算子、JIT、型システムの改善、エラーハンドリング、一貫性の向上などです。
    </div>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">PHP 8 にアップデートしよう!</a>
    </div>
  </div>
</section>

<section class="php8-section center">
  <div class="php8-compare">
    <h2 class="php8-h2" id="named-arguments">
      名前付き引数
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
        <li>必須の引数だけを指定し、オプションの引数はスキップしています。</li>
        <li>引数の順番に依存せず、自己文書化(self-documented)されています。</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="attributes">
      アトリビュート
      <a class="php8-rfc" href="https://wiki.php.net/rfc/attributes_v2">RFC</a> <a class="php8-rfc" href="/manual/ja/language.attributes.php">Doc</a>
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
      <p>PHPDoc のアノテーションの代わりに、PHP ネイティブの文法で構造化されたメタデータを扱えるようになりました。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="constructor-property-promotion">
      コンストラクタでの、プロパティのプロモーション
      <a class="php8-rfc" href="https://wiki.php.net/rfc/constructor_promotion">RFC</a> <a class="php8-rfc" href="/manual/ja/language.oop5.decon.php#language.oop5.decon.constructor.promotion">Doc</a>
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
      <p>ボイラープレートのコードを減らすため、コンストラクタでプロパティを定義し、初期化します。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="union-types">
      Union 型
      <a class="php8-rfc" href="https://wiki.php.net/rfc/union_types_v2">RFC</a> <a class="php8-rfc" href="/manual/ja/language.types.declarations.php#language.types.declarations.composite.union">Doc</a>
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
      <p>PHPDoc のアノテーションを使って型を組み合わせる代わりに、実行時に検証が行われる union型 をネイティブで使えるようになりました。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="match-expression">
      Match 式
      <a class="php8-rfc" href="https://wiki.php.net/rfc/match_expression_v2">RFC</a> <a class="php8-rfc" href="/manual/ja/control-structures.match.php">Doc</a>
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
      <p>match は switch 文に似ていますが、以下の機能があります:</p>
      <ul>
        <li>match は式なので、結果を返したり、変数に保存したりできます。</li>
        <li>match の分岐は一行の式だけをサポートしており、break; 文は不要です。</li>
        <li>match は、型と値について、厳密な比較を行います。</li>
      </ul>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="nullsafe-operator">
      Nullsafe 演算子
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
      <p>null チェックの条件を追加する代わりに、nullsafe演算子 を使って呼び出しをチェインさせられるようになりました。呼び出しチェインのひとつが失敗すると、チェインの実行全体が停止し、null と評価されます。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="saner-string-to-number-comparisons">
      数値と文字列の比較
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
      <p>数値形式の文字列と比較する場合は、PHP 8 は数値として比較を行います。それ以外の場合は、数値を文字列に変換し、文字列として比較を行います。</p>
    </div>
  </div>

  <div class="php8-compare">
    <h2 class="php8-h2" id="consistent-type-errors-for-internal-functions">
      <!--Consistent type errors for internal functions-->
      内部関数の型に関するエラーが一貫したものに
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
      <p>ほとんどの内部関数は、引数の検証に失敗すると Error 例外をスローするようになりました。</p>
    </div>
  </div>
</section>

<section class="php8-section php8-section_light">
  <h2 class="php8-h2">JIT (ジャストインタイム) コンパイル</h2>
  <p>
    PHP 8 は JITコンパイル のエンジンをふたつ搭載しています。
    トレーシングJITは、もっとも有望なふたつの人工的なベンチマークで、
    約3倍のパフォーマンスを示しました。
    また、長期間動いている特定のあるアプリケーションでは、1.5-2倍のパフォーマンス向上が見られました。
    典型的なアプリケーションのパフォーマンスは、PHP 7.4 と同等でした。
  </p>
  <h3 class="php8-h3">
    PHP 8 のパフォーマンスに対するJITの貢献
    <!--
    Relative JIT contribution to PHP 8 performance
    -->
  </h3>
  <p>
    <img src="/images/php8/scheme.svg" width="900" alt="Just-In-Time compilation">
  </p>

  <div class="php8-columns">
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">型システムとエラーハンドリングの改善</h2>
      <ul>
        <li>
          算術/ビット演算子のより厳密な型チェック
          <a href="https://wiki.php.net/rfc/arithmetic_operator_type_checks">RFC</a>
        </li>
        <li>
          トレイトの抽象メソッドの検証 <a href="https://wiki.php.net/rfc/abstract_trait_method_validation">RFC</a>
        </li>
        <li>
          マジックメソッドのシグネチャ <a href="https://wiki.php.net/rfc/magic-methods-signature">RFC</a>
        </li>
        <li>
          エンジンの警告を整理 <a href="https://wiki.php.net/rfc/engine_warnings">RFC</a>
        </li>
        <li>
          互換性のないメソッドシグネチャは fatal error に。
          <a href="https://wiki.php.net/rfc/lsp_errors">RFC</a>
        </li>
        <li>
          @ 演算子は、致命的なエラーを隠さなくなりました。
        </li>
        <li>
          private メソッドの継承時のシグネチャチェック <a href="https://wiki.php.net/rfc/inheritance_private_methods">RFC</a>
        </li>
        <li>
          Mixed 型のサポート <a href="https://wiki.php.net/rfc/mixed_type_v2">RFC</a>
        </li>
        <li>
          戻り値で static 型をサポート <a href="https://wiki.php.net/rfc/static_return_type">RFC</a>
        </li>
        <li>
          内部関数に型アノテーション
          <a href="https://externals.io/message/106522">Email thread</a>
        </li>
        <li>
          一部の拡張機能が、リソースからオブジェクトに移行:
            <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
            <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
            <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
            <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>,
            <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        </li>
      </ul>
    </div>
    <div class="php8-column">
      <h2 class="php8-h2 php8-h2_margin-top">その他文法の調整や改善</h2>
      <ul>
        <li>
          引数やクロージャーのuseリストの最後にカンマがつけられるように <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
          <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>
        </li>
        <li>
          catch で例外のキャプチャが不要に <a href="https://wiki.php.net/rfc/non-capturing_catches">RFC</a>
        </li>
        <li>
          変数の文法の調整 <a href="https://wiki.php.net/rfc/variable_syntax_tweaks">RFC</a>
        </li>
        <li>
          名前空間の名前を単一のトークンとして扱う <a href="https://wiki.php.net/rfc/namespaced_names_as_token">RFC</a>
        </li>
        <li>
          Throw は式になりました <a href="https://wiki.php.net/rfc/throw_expression">RFC</a>
        </li>
        <li>
          オブジェクトに対して ::class が使えるように <a href="https://wiki.php.net/rfc/class_name_literal_on_object">RFC</a>
        </li>
      </ul>

      <h2 class="php8-h2 php8-h2_margin-top">新しいクラス、インターフェイス、関数</h2>
      <ul>
        <li>
          <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> クラス
        </li>
        <li>
          <a href="https://wiki.php.net/rfc/stringable">Stringable</a> インターフェイス
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
          <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> をオブジェクトベースで実装
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
      <!--
      Better performance, better syntax, improved type safety.
      -->
      パフォーマンスの向上、より良い文法、型システムの改善
    </h2>
    <div class="php8-button-wrapper center">
      <a class="php8-button php8-button_light" href="/downloads">PHP 8 にアップデートしよう!</a>
    </div>
    <div class="php8-footer__content">
      <p>
        PHP 8 のソースコードのダウンロードは、
        <a href="http://www.php.net/downloads">downloads</a> のページをどうぞ。
        Windows 用のバイナリは <a href="http://windows.php.net/download">PHP for Windows</a> のページにあります。
        変更の一覧は <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a> にあります。
      </p>
      <p>
        <a href="/manual/ja/migration80.php">移行ガイド</a> が PHP マニュアルで利用できます。
        新機能や下位互換性のない変更の詳細については、移行ガイドを参照して下さい。
      </p>
    </div>
  </div>
</section>




<?php site_footer();
