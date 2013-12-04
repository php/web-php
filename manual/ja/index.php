<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();

$setup = array (
  'home' => 
  array (
    0 => 'index.php',
    1 => 'PHP Manual',
  ),
  'head' => 
  array (
    0 => 'UTF-8',
    1 => 'ja',
  ),
  'this' => 
  array (
    0 => 'index.php',
    1 => 'PHP マニュアル',
  ),
  'up' => 
  array (
    0 => NULL,
    1 => NULL,
  ),
  'prev' => 
  array (
    0 => NULL,
    1 => NULL,
  ),
  'next' => 
  array (
    0 => NULL,
    1 => NULL,
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/index.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="index" class="set">
 <h1 class="title">PHP マニュアル</h1>
 



 <div class="info">
  <div class="authorgroup" id="authors">

   <div class="author vcard"><strong class="by">著者</strong>:<br />
   <span class="personname fn">
     <span class="firstname given-name">Mehdi</span>  <span class="surname family-name">Achour</span>  
   </span>
   </div>

   
   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Friedhelm</span>  <span class="surname family-name">Betz</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Antony</span>  <span class="surname family-name">Dovgal</span>  
   </span>
   </div>

   
   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Nuno</span>  <span class="surname family-name">Lopes</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Hannes</span>  <span class="surname family-name">Magnusson</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Georg</span>  <span class="surname family-name">Richter</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Damien</span>  <span class="surname family-name">Seguy</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Jakub</span>  <span class="surname family-name">Vrana</span>  
   </span>
   </div>


   
   <div class="othercredit">
    <span class="personname fn">
      <span class="othername">
     <a href="preface.php#contributors" class="link">その他</a>
     </span> 
    </span>
   </div>

  </div>
  <div class="pubdate">2013-12-03</div>
  
  <div class="authorgroup" id="editors">
   <div class="editor vcard"><strong class="editedby">編集</strong>: 
   <span class="personname fn">
     <span class="firstname given-name">Philip</span>  <span class="surname family-name">Olson</span>  
   </span>
   </div>

  </div>

  <div class="authorgroup">
    <div class="othercredit">
      <span class="orgname">PHP マニュアル翻訳プロジェクト </span>
    </div>
  </div>

  <div class="copyright">&copy; 
   <span class="year">1997-2013</span>
   <span class="holder">the PHP Documentation Group</span>
  </div>

  

 </div>
 



 

 

 

 

 

 

 

 

 

 

 

<ul class="chunklist chunklist_set"><li><a href="copyright.php">著作権</a></li><li><a href="manual.php">PHP マニュアル</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="preface.php">序文</a></li></ul></li><li><a href="getting-started.php">はじめに</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="introduction.php">入門</a></li><li><a href="tutorial.php">簡易チュートリアル</a></li></ul></li><li><a href="install.php">インストールと設定</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="install.general.php">インストールにあたっての一般的な注意事項</a></li><li><a href="install.unix.php">Unix システムへのインストール</a></li><li><a href="install.macosx.php">Mac OS X へのインストール</a></li><li><a href="install.windows.php">Windows システムへのインストール</a></li><li><a href="install.cloud.php">クラウド･コンピューティング･プラットフォームへのインストール</a></li><li><a href="install.fpm.php">FastCGI Process Manager (FPM)</a></li><li><a href="install.pecl.php">PECL 拡張モジュールのインストール</a></li><li><a href="install.problems.php">問題が起きた場合</a></li><li><a href="configuration.php">実行時設定</a></li></ul></li><li><a href="langref.php">言語リファレンス</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="language.basic-syntax.php">基本的な構文</a></li><li><a href="language.types.php">型</a></li><li><a href="language.variables.php">変数</a></li><li><a href="language.constants.php">定数</a></li><li><a href="language.expressions.php">式</a></li><li><a href="language.operators.php">演算子</a></li><li><a href="language.control-structures.php">制御構造</a></li><li><a href="language.functions.php">関数</a></li><li><a href="language.oop5.php">クラスとオブジェクト</a></li><li><a href="language.namespaces.php">名前空間</a></li><li><a href="language.exceptions.php">例外(exceptions)</a></li><li><a href="language.generators.php">ジェネレータ</a></li><li><a href="language.references.php">リファレンスの説明</a></li><li><a href="reserved.variables.php">定義済の変数</a></li><li><a href="reserved.exceptions.php">定義済みの例外</a></li><li><a href="reserved.interfaces.php">定義済みのインターフェイスとクラス</a></li><li><a href="context.php">コンテキストオプションとパラメータ</a></li><li><a href="wrappers.php">サポートするプロトコル/ラッパー</a></li></ul></li><li><a href="security.php">セキュリティ</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="security.intro.php">はじめに</a></li><li><a href="security.general.php">一般的な考慮事項</a></li><li><a href="security.cgi-bin.php">CGI バイナリとしてインストール</a></li><li><a href="security.apache.php">Apache モジュールとしてインストール</a></li><li><a href="security.filesystem.php">ファイルシステムのセキュリティ</a></li><li><a href="security.database.php">データベースのセキュリティ</a></li><li><a href="security.errors.php">エラーのレポート</a></li><li><a href="security.globals.php">グローバル変数の登録機能の使用法</a></li><li><a href="security.variables.php">ユーザーが投稿したデータ</a></li><li><a href="security.magicquotes.php">マジッククオート</a></li><li><a href="security.hiding.php">PHPの隠蔽</a></li><li><a href="security.current.php">最新版を維持する</a></li></ul></li><li><a href="features.php">機能</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="features.http-auth.php">PHP による HTTP 認証</a></li><li><a href="features.cookies.php">クッキー(Cookies)</a></li><li><a href="features.sessions.php">セッション</a></li><li><a href="features.xforms.php">XFormsの処理</a></li><li><a href="features.file-upload.php">ファイルアップロードの処理</a></li><li><a href="features.remote-files.php">リモートファイルの使用</a></li><li><a href="features.connection-handling.php">接続処理</a></li><li><a href="features.persistent-connections.php">持続的データベース接続</a></li><li><a href="features.safe-mode.php">セーフモード</a></li><li><a href="features.commandline.php">コマンドラインの使用法</a> — PHP をコマンドラインから使用する</li><li><a href="features.gc.php">ガベージコレクション</a></li><li><a href="features.dtrace.php">DTrace Dynamic Tracing</a></li></ul></li><li><a href="funcref.php">関数リファレンス</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="refs.basic.php.php">PHP の振る舞いの変更</a></li><li><a href="refs.utilspec.audio.php">音声フォーマットの操作</a></li><li><a href="refs.remote.auth.php">認証サービス</a></li><li><a href="refs.utilspec.cmdline.php">コマンドライン関連</a></li><li><a href="refs.compression.php">圧縮およびアーカイブ</a></li><li><a href="refs.creditcard.php">クレジットカード処理</a></li><li><a href="refs.crypto.php">暗号</a></li><li><a href="refs.database.php">データベース関連</a></li><li><a href="refs.calendar.php">日付および時刻関連</a></li><li><a href="refs.fileprocess.file.php">ファイルシステム</a></li><li><a href="refs.international.php">自然言語および文字エンコーディング</a></li><li><a href="refs.utilspec.image.php">画像処理および作成</a></li><li><a href="refs.remote.mail.php">メール関連</a></li><li><a href="refs.math.php">数学</a></li><li><a href="refs.utilspec.nontext.php">テキスト以外の MIME 型</a></li><li><a href="refs.fileprocess.process.php">プロセス制御</a></li><li><a href="refs.basic.other.php">その他の基本モジュール</a></li><li><a href="refs.remote.other.php">その他のサービス</a></li><li><a href="refs.search.php">検索エンジン用の拡張モジュール</a></li><li><a href="refs.utilspec.server.php">サーバー固有のモジュール</a></li><li><a href="refs.basic.session.php">セッション関連</a></li><li><a href="refs.basic.text.php">テキスト処理</a></li><li><a href="refs.basic.vartype.php">変数・データ型関連</a></li><li><a href="refs.webservice.php">ウェブサービス</a></li><li><a href="refs.utilspec.windows.php">Windows 用のモジュール</a></li><li><a href="refs.xml.php">XML 操作</a></li></ul></li><li><a href="internals2.php">PHP のコア: ハッカーの手引き</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="internals2.preface.php">序文</a></li><li><a href="internals2.memory.php">メモリ管理</a></li><li><a href="internals2.variables.php">変数の作成</a></li><li><a href="internals2.funcs.php">関数の作成</a></li><li><a href="internals2.classes.php">クラスの作成</a></li><li><a href="internals2.resources.php">リソースの作成</a></li><li><a href="internals2.ini.php">INI 設定の作成</a></li><li><a href="internals2.streams.php">ストリームの作成</a></li><li><a href="internals2.counter.php">&quot;counter&quot; 拡張モジュール - サンプル</a></li><li><a href="internals2.buildsys.php">PHP 5 ビルドシステム</a></li><li><a href="internals2.structure.php">拡張モジュールの構造</a></li><li><a href="internals2.pdo.php">PDO ドライバ How-To</a></li><li><a href="internals2.faq.php">拡張モジュールに関する FAQ</a></li><li><a href="internals2.apiref.php">Zend Engine 2 API リファレンス</a></li><li><a href="internals2.opcodes.php">Zend Engine 2 オペコード</a></li><li><a href="internals2.ze1.php">Zend Engine 1</a></li></ul></li><li><a href="faq.php">FAQ</a> — FAQ: よくある質問<ul class="chunklist chunklist_set chunklist_children"><li><a href="faq.general.php">一般的な情報</a></li><li><a href="faq.mailinglist.php">メーリングリスト</a></li><li><a href="faq.obtaining.php">PHP を手に入れるには</a></li><li><a href="faq.databases.php">データベースに関する問題</a></li><li><a href="faq.installation.php">インストール</a></li><li><a href="faq.build.php">構築時の問題</a></li><li><a href="faq.using.php">PHP の使いかた</a></li><li><a href="faq.passwords.php">パスワードのハッシュ</a> — 安全なパスワードハッシュ</li><li><a href="faq.html.php">PHP と HTML</a></li><li><a href="faq.com.php">PHP と COM</a></li><li><a href="faq.languages.php">PHP と他の言語</a></li><li><a href="faq.migration5.php">PHP 4 から PHP 5 への移行</a></li><li><a href="faq.misc.php">その他の質問</a></li></ul></li><li><a href="appendices.php">付録</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="history.php">PHP の歴史と関連するプロジェクト</a></li><li><a href="migration55.php">PHP 5.4.x から PHP 5.5.x への移行</a></li><li><a href="migration54.php">PHP 5.3.x から PHP 5.4.x への移行</a></li><li><a href="migration53.php">PHP 5.2.x から PHP 5.3.x への移行</a></li><li><a href="migration52.php">PHP 5.1.x から PHP 5.2.x への移行</a></li><li><a href="migration51.php">PHP 5.0.x から PHP 5.1.x への移行</a></li><li><a href="migration5.php">PHP 4 から PHP 5.0.x への移行</a></li><li><a href="oop4.php">クラスとオブジェクト (PHP 4)</a></li><li><a href="debugger.php">PHP のデバッグ</a></li><li><a href="configure.php">Configure オプション</a></li><li><a href="ini.php">php.ini ディレクティブ</a></li><li><a href="extensions.php">拡張モジュールの一覧/分類</a></li><li><a href="aliases.php">関数エイリアスのリスト</a></li><li><a href="reserved.php">予約語の一覧</a></li><li><a href="resource.php">リソース型の一覧</a></li><li><a href="filters.php">利用できるフィルタのリスト</a></li><li><a href="transports.php">サポートされるソケットトランスポートのリスト</a></li><li><a href="types.comparisons.php">PHP 型の比較表</a></li><li><a href="tokens.php">パーサトークンの一覧</a></li><li><a href="userlandnaming.php">ユーザーレベルでの命名の手引き</a></li><li><a href="about.php">マニュアルについて</a></li><li><a href="cc.license.php">Creative Commons Attribution 3.0</a></li><li><a href="indexes.php">索引</a></li><li><a href="doc.changelog.php">変更履歴</a></li></ul></li></ul></div><?php manual_footer(); ?>