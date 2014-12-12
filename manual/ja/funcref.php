<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/index.inc";
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
    0 => 'funcref.php',
    1 => '関数リファレンス',
  ),
  'up' => 
  array (
    0 => 'index.php',
    1 => 'PHP マニュアル',
  ),
  'prev' => 
  array (
    0 => 'features.dtrace.systemtap.php',
    1 => 'Using SystemTap with PHP DTrace Static Probes',
  ),
  'next' => 
  array (
    0 => 'refs.basic.php.php',
    1 => 'PHP の振る舞いの変更',
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/funcref.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="funcref" class="set">
  <h1 class="title">関数リファレンス</h1>
  <div class="info">
   <div class="abstract">
    <p class="para">
     <div class="tip"><strong class="tip">ヒント</strong>
      <p class="simpara">
       参考 <a href="extensions.php" class="xref">拡張モジュールの一覧/分類</a>.
      </p>
     </div>
    </p>
   </div>
  </div>

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  
 <ul class="chunklist chunklist_set"><li><a href="refs.basic.php.php">PHP の振る舞いの変更</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.apc.php">APC</a> — Alternative PHP Cache</li><li><a href="book.apd.php">APD</a> — Advanced PHP debugger</li><li><a href="book.bcompiler.php">bcompiler</a> — PHP バイトコードコンパイラ</li><li><a href="book.blenc.php">BLENC</a> — Blenc - BLowfish ENCoder for PHP source scripts</li><li><a href="book.errorfunc.php">エラー処理</a> — エラー処理およびログ記録</li><li><a href="book.htscanner.php">htscanner</a> — すべての SAPI での htaccess 風機能のサポート</li><li><a href="book.inclued.php">inclued</a> — インクルード階層ビューア</li><li><a href="book.memtrack.php">Memtrack</a></li><li><a href="book.opcache.php">OPcache</a></li><li><a href="book.outcontrol.php">出力制御</a> — 出力バッファリング制御</li><li><a href="book.info.php">PHP Options/Info</a> — PHP オプションと情報</li><li><a href="book.runkit.php">runkit</a></li><li><a href="book.scream.php">scream</a> — エラー抑制演算子の無効化</li><li><a href="book.weakref.php">Weakref</a> — 弱い参照</li><li><a href="book.wincache.php">WinCache</a> — PHP 用の Windows キャッシュ</li><li><a href="book.xhprof.php">Xhprof</a> — 階層型プロファイラ</li></ul></li><li><a href="refs.utilspec.audio.php">音声フォーマットの操作</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.id3.php">ID3</a> — ID3 タグ</li><li><a href="book.ktaglib.php">KTaglib</a></li><li><a href="book.oggvorbis.php">oggvorbis</a> — OGG/Vorbis</li><li><a href="book.openal.php">OpenAL</a> — OpenAL 音声バインディング</li></ul></li><li><a href="refs.remote.auth.php">認証サービス</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.kadm5.php">KADM5</a> — Kerberos V</li><li><a href="book.radius.php">Radius</a></li></ul></li><li><a href="refs.utilspec.cmdline.php">コマンドライン関連</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.ncurses.php">Ncurses</a> — Ncurses 端末画面制御</li><li><a href="book.newt.php">Newt</a></li><li><a href="book.readline.php">Readline</a> — GNU Readline</li></ul></li><li><a href="refs.compression.php">圧縮およびアーカイブ</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.bzip2.php">Bzip2</a></li><li><a href="book.lzf.php">LZF</a></li><li><a href="book.phar.php">Phar</a></li><li><a href="book.rar.php">Rar</a> — Rar アーカイブ</li><li><a href="book.zip.php">Zip</a></li><li><a href="book.zlib.php">Zlib</a> — Zlib 圧縮</li></ul></li><li><a href="refs.creditcard.php">クレジットカード処理</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.mcve.php">MCVE</a> — MCVE (Monetra) Payment</li><li><a href="book.spplus.php">SPPLUS</a> — SPPLUS 決済システム</li></ul></li><li><a href="refs.crypto.php">暗号</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.crack.php">Crack</a> — Cracklib</li><li><a href="book.hash.php">Hash</a> — HASH メッセージダイジェストフレームワーク</li><li><a href="book.mcrypt.php">Mcrypt</a></li><li><a href="book.mhash.php">Mhash</a></li><li><a href="book.openssl.php">OpenSSL</a></li><li><a href="book.password.php">パスワードのハッシュ</a></li></ul></li><li><a href="refs.database.php">データベース関連</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="refs.database.abstract.php">抽象化レイヤー</a></li><li><a href="refs.database.vendors.php">ベンダー固有のモジュール</a></li></ul></li><li><a href="refs.calendar.php">日付および時刻関連</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.calendar.php">カレンダー</a></li><li><a href="book.datetime.php">Date/Time</a> — 日付・時刻</li></ul></li><li><a href="refs.fileprocess.file.php">ファイルシステム</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.dio.php">ダイレクト IO</a></li><li><a href="book.dir.php">ディレクトリ</a></li><li><a href="book.fileinfo.php">Fileinfo</a> — ファイル情報</li><li><a href="book.filesystem.php">ファイルシステム</a></li><li><a href="book.inotify.php">Inotify</a></li><li><a href="book.mime-magic.php">Mimetype</a></li><li><a href="book.proctitle.php">Proctitle</a></li><li><a href="book.xattr.php">xattr</a></li><li><a href="book.xdiff.php">xdiff</a></li></ul></li><li><a href="refs.international.php">自然言語および文字エンコーディング</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.enchant.php">Enchant</a> — Enchant スペリングライブラリ</li><li><a href="book.fribidi.php">FriBiDi</a></li><li><a href="book.gender.php">Gender</a> — 名前の性別の判別</li><li><a href="book.gettext.php">Gettext</a></li><li><a href="book.iconv.php">iconv</a></li><li><a href="book.intl.php">intl</a> — 国際化関数</li><li><a href="book.mbstring.php">マルチバイト文字列</a></li><li><a href="book.pspell.php">Pspell</a></li><li><a href="book.recode.php">Recode</a> — GNU Recode</li></ul></li><li><a href="refs.utilspec.image.php">画像処理および作成</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.cairo.php">Cairo</a></li><li><a href="book.exif.php">Exif</a> — Exchangeable image information</li><li><a href="book.image.php">GD</a> — 画像処理 (GD)</li><li><a href="book.gmagick.php">Gmagick</a></li><li><a href="book.imagick.php">ImageMagick</a> — 画像処理 (ImageMagick)</li></ul></li><li><a href="refs.remote.mail.php">メール関連</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.cyrus.php">Cyrus</a> — Cyrus IMAP 管理</li><li><a href="book.imap.php">IMAP</a> — IMAP、POP3 および NNTP</li><li><a href="book.mail.php">メール</a></li><li><a href="book.mailparse.php">Mailparse</a></li><li><a href="book.vpopmail.php">vpopmail</a></li></ul></li><li><a href="refs.math.php">数学</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.bc.php">BC Math</a> — BCMath 任意精度数学関数</li><li><a href="book.gmp.php">GMP</a> — GNU Multiple Precision</li><li><a href="book.lapack.php">Lapack</a></li><li><a href="book.math.php">Math</a> — 数学関数</li><li><a href="book.stats.php">統計関数</a></li><li><a href="book.trader.php">Trader</a> — Technical Analysis for Traders</li></ul></li><li><a href="refs.utilspec.nontext.php">テキスト以外の MIME 型</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.fdf.php">FDF</a> — Forms Data Format</li><li><a href="book.gnupg.php">GnuPG</a> — GNU Privacy Guard</li><li><a href="book.haru.php">haru</a> — Haru PDF</li><li><a href="book.ming.php">Ming</a> — Ming (flash)</li><li><a href="book.pdf.php">PDF</a></li><li><a href="book.ps.php">PS</a> — PostScript ドキュメントの作成</li><li><a href="book.rpmreader.php">RPM Reader</a> — RPM ヘッダの読み込み</li><li><a href="book.swf.php">SWF</a> — Shockwave Flash</li></ul></li><li><a href="refs.fileprocess.process.php">プロセス制御</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.eio.php">Eio</a></li><li><a href="book.ev.php">Ev</a></li><li><a href="book.expect.php">Expect</a></li><li><a href="book.libevent.php">Libevent</a></li><li><a href="book.pcntl.php">PCNTL</a> — プロセス制御</li><li><a href="book.posix.php">POSIX</a></li><li><a href="book.exec.php">プログラムの実行</a> — システムプログラムの実行</li><li><a href="book.pthreads.php">pthreads</a></li><li><a href="book.sem.php">セマフォ</a> — セマフォ、共有メモリおよび IPC</li><li><a href="book.shmop.php">共有メモリ</a></li></ul></li><li><a href="refs.basic.other.php">その他の基本モジュール</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.geoip.php">GeoIP</a> — Geo IP ロケーション</li><li><a href="book.fann.php">FANN</a> — FANN (Fast Artificial Neural Network)</li><li><a href="book.json.php">JSON</a> — JavaScript Object Notation</li><li><a href="book.judy.php">Judy</a> — Judy Arrays</li><li><a href="book.lua.php">Lua</a></li><li><a href="book.misc.php">その他</a> — その他の関数</li><li><a href="book.parsekit.php">Parsekit</a></li><li><a href="book.spl.php">SPL</a> — Standard PHP Library (SPL)</li><li><a href="book.spl-types.php">SPL Types</a> — SPL の型処理</li><li><a href="book.stream.php">ストリーム</a></li><li><a href="book.tidy.php">Tidy</a></li><li><a href="book.tokenizer.php">Tokenizer</a></li><li><a href="book.url.php">URLs</a></li><li><a href="book.v8js.php">V8js</a> — V8 Javascript Engine 統合</li><li><a href="book.yaml.php">Yaml</a> — YAML によるデータのシリアライズ</li><li><a href="book.yaf.php">Yaf</a></li><li><a href="book.taint.php">Taint</a></li></ul></li><li><a href="refs.remote.other.php">その他のサービス</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.amqp.php">AMQP</a></li><li><a href="book.chdb.php">chdb</a> — Constant hash database</li><li><a href="book.curl.php">cURL</a> — Client URL Library</li><li><a href="book.event.php">Event</a></li><li><a href="book.fam.php">FAM</a> — ファイル改変の監視</li><li><a href="book.ftp.php">FTP</a></li><li><a href="book.gearman.php">Gearman</a></li><li><a href="book.net-gopher.php">Gopher</a> — Net Gopher</li><li><a href="book.gupnp.php">Gupnp</a></li><li><a href="book.http.php">HTTP</a></li><li><a href="book.hw.php">Hyperwave</a></li><li><a href="book.hwapi.php">Hyperwave API</a></li><li><a href="book.java.php">Java</a> — PHP と Java の統合</li><li><a href="book.ldap.php">LDAP</a> — Lightweight Directory Access Protocol</li><li><a href="book.notes.php">Lotus Notes</a></li><li><a href="book.memcache.php">Memcache</a></li><li><a href="book.memcached.php">Memcached</a></li><li><a href="book.mqseries.php">mqseries</a></li><li><a href="book.network.php">ネットワーク</a></li><li><a href="book.rrd.php">RRD</a> — RRDtool</li><li><a href="book.sam.php">SAM</a> — Simple Asynchronous Messaging: 単純な非同期メッセージング</li><li><a href="book.snmp.php">SNMP</a></li><li><a href="book.sockets.php">ソケット</a></li><li><a href="book.ssh2.php">SSH2</a> — Secure Shell2</li><li><a href="book.stomp.php">Stomp</a> — Stomp Client</li><li><a href="book.svm.php">SVM</a> — サポートベクターマシン</li><li><a href="book.svn.php">SVN</a> — Subversion</li><li><a href="book.tcpwrap.php">TCP</a> — TCP ラッパー</li><li><a href="book.varnish.php">Varnish</a></li><li><a href="book.yaz.php">YAZ</a></li><li><a href="book.nis.php">YP/NIS</a></li><li><a href="book.zmq.php">0MQ messaging</a> — ZMQ</li></ul></li><li><a href="refs.search.php">検索エンジン用の拡張モジュール</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.mnogosearch.php">mnoGoSearch</a></li><li><a href="book.solr.php">Solr</a> — Apache Solr</li><li><a href="book.sphinx.php">Sphinx</a> — Sphinx クライアント</li><li><a href="book.swish.php">Swish</a> — Swish インデックス</li></ul></li><li><a href="refs.utilspec.server.php">サーバー固有のモジュール</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.apache.php">Apache</a></li><li><a href="book.fpm.php">FastCGI Process Manager</a></li><li><a href="book.iisfunc.php">IIS</a> — IIS 管理</li><li><a href="book.nsapi.php">NSAPI</a></li></ul></li><li><a href="refs.basic.session.php">セッション関連</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.msession.php">Msession</a> — Mohawk Software セッションハンドラ関数</li><li><a href="book.session.php">Sessions</a> — セッション処理</li><li><a href="book.session-pgsql.php">Session PgSQL</a> — PostgreSQL セッション保存ハンドラ</li></ul></li><li><a href="refs.basic.text.php">テキスト処理</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.bbcode.php">BBCode</a> — Bulletin Board Code</li><li><a href="book.pcre.php">PCRE</a> — 正規表現 (Perl 互換)</li><li><a href="book.regex.php">POSIX Regex</a> — 正規表現 (POSIX 拡張)</li><li><a href="book.ssdeep.php">ssdeep</a> — ssdeep Fuzzy Hashing</li><li><a href="book.strings.php">文字列</a></li></ul></li><li><a href="refs.basic.vartype.php">変数・データ型関連</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.array.php">配列</a></li><li><a href="book.classobj.php">クラス/オブジェクト</a> — クラス/オブジェクトの情報</li><li><a href="book.classkit.php">Classkit</a></li><li><a href="book.ctype.php">Ctype</a> — 文字タイプチェック</li><li><a href="book.filter.php">Filter</a> — データのフィルタリング</li><li><a href="book.funchand.php">関数処理</a></li><li><a href="book.objaggregation.php">Object Aggregation</a> — オブジェクトの集約/合成 [PHP 4]</li><li><a href="book.quickhash.php">Quickhash</a></li><li><a href="book.reflection.php">リフレクション</a></li><li><a href="book.var.php">変数操作</a></li></ul></li><li><a href="refs.webservice.php">ウェブサービス</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.oauth.php">OAuth</a></li><li><a href="book.sca.php">SCA</a></li><li><a href="book.soap.php">SOAP</a></li><li><a href="book.yar.php">Yar</a></li><li><a href="book.xmlrpc.php">XML-RPC</a></li></ul></li><li><a href="refs.utilspec.windows.php">Windows 用のモジュール</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.dotnet.php">.NET</a></li><li><a href="book.com.php">COM</a> — COM および .Net (Windows)</li><li><a href="book.printer.php">プリンタ</a></li><li><a href="book.w32api.php">W32api</a></li><li><a href="book.win32ps.php">win32ps</a></li><li><a href="book.win32service.php">win32service</a></li></ul></li><li><a href="refs.xml.php">XML 操作</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.dom.php">DOM</a> — Document Object Model</li><li><a href="book.libxml.php">libxml</a></li><li><a href="book.qtdom.php">qtdom</a></li><li><a href="book.sdo.php">SDO</a> — Service Data Objects</li><li><a href="book.sdodasrel.php">SDO-DAS-Relational</a> — SDO リレーショナルデータアクセスサービス</li><li><a href="book.sdo-das-xml.php">SDO DAS XML</a> — SDO XML データアクセスサービス</li><li><a href="book.simplexml.php">SimpleXML</a></li><li><a href="book.wddx.php">WDDX</a></li><li><a href="book.xmldiff.php">XMLDiff</a> — XML diff and merge</li><li><a href="book.xml.php">XML パーサ</a></li><li><a href="book.xmlreader.php">XMLReader</a></li><li><a href="book.xmlwriter.php">XMLWriter</a></li><li><a href="book.xsl.php">XSL</a></li><li><a href="book.xslt.php">XSLT (PHP 4)</a></li></ul></li></ul></div><?php manual_footer(); ?>