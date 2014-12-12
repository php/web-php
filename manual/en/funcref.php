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
    1 => 'en',
  ),
  'this' => 
  array (
    0 => 'funcref.php',
    1 => 'Function Reference',
  ),
  'up' => 
  array (
    0 => 'index.php',
    1 => 'PHP Manual',
  ),
  'prev' => 
  array (
    0 => 'features.dtrace.systemtap.php',
    1 => 'Using SystemTap with PHP DTrace Static Probes',
  ),
  'next' => 
  array (
    0 => 'refs.basic.php.php',
    1 => 'Affecting PHP\'s Behaviour',
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
  <h1 class="title">Function Reference</h1>
  <div class="info">
   <div class="abstract">
    <p class="para">
     <div class="tip"><strong class="tip">Tip</strong>
      <p class="simpara">
       See also <a href="extensions.php" class="xref">Extension List/Categorization</a>.
      </p>
     </div>
    </p>
   </div>
  </div>

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  
 <ul class="chunklist chunklist_set"><li><a href="refs.basic.php.php">Affecting PHP's Behaviour</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.apc.php">APC</a> — Alternative PHP Cache</li><li><a href="book.apd.php">APD</a> — Advanced PHP debugger</li><li><a href="book.bcompiler.php">bcompiler</a> — PHP bytecode Compiler</li><li><a href="book.blenc.php">BLENC</a> — Blenc - BLowfish ENCoder for PHP source scripts</li><li><a href="book.errorfunc.php">Error Handling</a> — Error Handling and Logging</li><li><a href="book.htscanner.php">htscanner</a> — htaccess-like support for all SAPIs</li><li><a href="book.inclued.php">inclued</a> — Inclusion hierarchy viewer</li><li><a href="book.memtrack.php">Memtrack</a></li><li><a href="book.opcache.php">OPcache</a></li><li><a href="book.outcontrol.php">Output Control</a> — Output Buffering Control</li><li><a href="book.info.php">PHP Options/Info</a> — PHP Options and Information</li><li><a href="book.runkit.php">runkit</a></li><li><a href="book.scream.php">scream</a> — Break the silence operator</li><li><a href="book.weakref.php">Weakref</a> — Weak References</li><li><a href="book.wincache.php">WinCache</a> — Windows Cache for PHP</li><li><a href="book.xhprof.php">Xhprof</a> — Hierarchical Profiler</li></ul></li><li><a href="refs.utilspec.audio.php">Audio Formats Manipulation</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.id3.php">ID3</a> — ID3 Tags</li><li><a href="book.ktaglib.php">KTaglib</a></li><li><a href="book.oggvorbis.php">oggvorbis</a> — OGG/Vorbis</li><li><a href="book.openal.php">OpenAL</a> — OpenAL Audio Bindings</li></ul></li><li><a href="refs.remote.auth.php">Authentication Services</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.kadm5.php">KADM5</a> — Kerberos V</li><li><a href="book.radius.php">Radius</a></li></ul></li><li><a href="refs.utilspec.cmdline.php">Command Line Specific Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.ncurses.php">Ncurses</a> — Ncurses Terminal Screen Control</li><li><a href="book.newt.php">Newt</a></li><li><a href="book.readline.php">Readline</a> — GNU Readline</li></ul></li><li><a href="refs.compression.php">Compression and Archive Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.bzip2.php">Bzip2</a></li><li><a href="book.lzf.php">LZF</a></li><li><a href="book.phar.php">Phar</a></li><li><a href="book.rar.php">Rar</a> — Rar Archiving</li><li><a href="book.zip.php">Zip</a></li><li><a href="book.zlib.php">Zlib</a> — Zlib Compression</li></ul></li><li><a href="refs.creditcard.php">Credit Card Processing</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.mcve.php">MCVE</a> — MCVE (Monetra) Payment</li><li><a href="book.spplus.php">SPPLUS</a> — SPPLUS Payment System</li></ul></li><li><a href="refs.crypto.php">Cryptography Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.crack.php">Crack</a> — Cracklib</li><li><a href="book.hash.php">Hash</a> — HASH Message Digest Framework</li><li><a href="book.mcrypt.php">Mcrypt</a></li><li><a href="book.mhash.php">Mhash</a></li><li><a href="book.openssl.php">OpenSSL</a></li><li><a href="book.password.php">Password Hashing</a></li></ul></li><li><a href="refs.database.php">Database Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="refs.database.abstract.php">Abstraction Layers</a></li><li><a href="refs.database.vendors.php">Vendor Specific Database Extensions</a></li></ul></li><li><a href="refs.calendar.php">Date and Time Related Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.calendar.php">Calendar</a></li><li><a href="book.datetime.php">Date/Time</a> — Date and Time</li></ul></li><li><a href="refs.fileprocess.file.php">File System Related Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.dio.php">Direct IO</a></li><li><a href="book.dir.php">Directories</a></li><li><a href="book.fileinfo.php">Fileinfo</a> — File Information</li><li><a href="book.filesystem.php">Filesystem</a></li><li><a href="book.inotify.php">Inotify</a></li><li><a href="book.mime-magic.php">Mimetype</a></li><li><a href="book.proctitle.php">Proctitle</a></li><li><a href="book.xattr.php">xattr</a></li><li><a href="book.xdiff.php">xdiff</a></li></ul></li><li><a href="refs.international.php">Human Language and Character Encoding Support</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.enchant.php">Enchant</a> — Enchant spelling library</li><li><a href="book.fribidi.php">FriBiDi</a></li><li><a href="book.gender.php">Gender</a> — Determine gender of firstnames</li><li><a href="book.gettext.php">Gettext</a></li><li><a href="book.iconv.php">iconv</a></li><li><a href="book.intl.php">intl</a> — Internationalization Functions</li><li><a href="book.mbstring.php">Multibyte String</a></li><li><a href="book.pspell.php">Pspell</a></li><li><a href="book.recode.php">Recode</a> — GNU Recode</li></ul></li><li><a href="refs.utilspec.image.php">Image Processing and Generation</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.cairo.php">Cairo</a></li><li><a href="book.exif.php">Exif</a> — Exchangeable image information</li><li><a href="book.image.php">GD</a> — Image Processing and GD</li><li><a href="book.gmagick.php">Gmagick</a></li><li><a href="book.imagick.php">ImageMagick</a> — Image Processing (ImageMagick)</li></ul></li><li><a href="refs.remote.mail.php">Mail Related Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.cyrus.php">Cyrus</a> — Cyrus IMAP administration</li><li><a href="book.imap.php">IMAP</a> — IMAP, POP3 and NNTP</li><li><a href="book.mail.php">Mail</a></li><li><a href="book.mailparse.php">Mailparse</a></li><li><a href="book.vpopmail.php">vpopmail</a></li></ul></li><li><a href="refs.math.php">Mathematical Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.bc.php">BC Math</a> — BCMath Arbitrary Precision Mathematics</li><li><a href="book.gmp.php">GMP</a> — GNU Multiple Precision</li><li><a href="book.lapack.php">Lapack</a></li><li><a href="book.math.php">Math</a> — Mathematical Functions</li><li><a href="book.stats.php">Statistics</a></li><li><a href="book.trader.php">Trader</a> — Technical Analysis for Traders</li></ul></li><li><a href="refs.utilspec.nontext.php">Non-Text MIME Output</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.fdf.php">FDF</a> — Forms Data Format</li><li><a href="book.gnupg.php">GnuPG</a> — GNU Privacy Guard</li><li><a href="book.haru.php">haru</a> — Haru PDF</li><li><a href="book.ming.php">Ming</a> — Ming (flash)</li><li><a href="book.pdf.php">PDF</a></li><li><a href="book.ps.php">PS</a> — PostScript document creation</li><li><a href="book.rpmreader.php">RPM Reader</a> — RPM Header Reading</li><li><a href="book.swf.php">SWF</a> — Shockwave Flash</li></ul></li><li><a href="refs.fileprocess.process.php">Process Control Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.eio.php">Eio</a></li><li><a href="book.ev.php">Ev</a></li><li><a href="book.expect.php">Expect</a></li><li><a href="book.libevent.php">Libevent</a></li><li><a href="book.pcntl.php">PCNTL</a> — Process Control</li><li><a href="book.posix.php">POSIX</a></li><li><a href="book.exec.php">Program execution</a> — System program execution</li><li><a href="book.pthreads.php">pthreads</a></li><li><a href="book.sem.php">Semaphore</a> — Semaphore, Shared Memory and IPC</li><li><a href="book.shmop.php">Shared Memory</a></li></ul></li><li><a href="refs.basic.other.php">Other Basic Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.geoip.php">GeoIP</a> — Geo IP Location</li><li><a href="book.fann.php">FANN</a> — FANN (Fast Artificial Neural Network)</li><li><a href="book.json.php">JSON</a> — JavaScript Object Notation</li><li><a href="book.judy.php">Judy</a> — Judy Arrays</li><li><a href="book.lua.php">Lua</a></li><li><a href="book.misc.php">Misc.</a> — Miscellaneous Functions</li><li><a href="book.parsekit.php">Parsekit</a></li><li><a href="book.spl.php">SPL</a> — Standard PHP Library (SPL)</li><li><a href="book.spl-types.php">SPL Types</a> — SPL Type Handling</li><li><a href="book.stream.php">Streams</a></li><li><a href="book.tidy.php">Tidy</a></li><li><a href="book.tokenizer.php">Tokenizer</a></li><li><a href="book.url.php">URLs</a></li><li><a href="book.v8js.php">V8js</a> — V8 Javascript Engine Integration</li><li><a href="book.yaml.php">Yaml</a> — YAML Data Serialization</li><li><a href="book.yaf.php">Yaf</a></li><li><a href="book.taint.php">Taint</a></li></ul></li><li><a href="refs.remote.other.php">Other Services</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.amqp.php">AMQP</a></li><li><a href="book.chdb.php">chdb</a> — Constant hash database</li><li><a href="book.curl.php">cURL</a> — Client URL Library</li><li><a href="book.event.php">Event</a></li><li><a href="book.fam.php">FAM</a> — File Alteration Monitor</li><li><a href="book.ftp.php">FTP</a></li><li><a href="book.gearman.php">Gearman</a></li><li><a href="book.net-gopher.php">Gopher</a> — Net Gopher</li><li><a href="book.gupnp.php">Gupnp</a></li><li><a href="book.http.php">HTTP</a></li><li><a href="book.hw.php">Hyperwave</a></li><li><a href="book.hwapi.php">Hyperwave API</a></li><li><a href="book.java.php">Java</a> — PHP / Java Integration</li><li><a href="book.ldap.php">LDAP</a> — Lightweight Directory Access Protocol</li><li><a href="book.notes.php">Lotus Notes</a></li><li><a href="book.memcache.php">Memcache</a></li><li><a href="book.memcached.php">Memcached</a></li><li><a href="book.mqseries.php">mqseries</a></li><li><a href="book.network.php">Network</a></li><li><a href="book.rrd.php">RRD</a> — RRDtool</li><li><a href="book.sam.php">SAM</a> — Simple Asynchronous Messaging</li><li><a href="book.snmp.php">SNMP</a></li><li><a href="book.sockets.php">Sockets</a></li><li><a href="book.ssh2.php">SSH2</a> — Secure Shell2</li><li><a href="book.stomp.php">Stomp</a> — Stomp Client</li><li><a href="book.svm.php">SVM</a> — Support Vector Machine</li><li><a href="book.svn.php">SVN</a> — Subversion</li><li><a href="book.tcpwrap.php">TCP</a> — TCP Wrappers</li><li><a href="book.varnish.php">Varnish</a></li><li><a href="book.yaz.php">YAZ</a></li><li><a href="book.nis.php">YP/NIS</a></li><li><a href="book.zmq.php">0MQ messaging</a> — ZMQ</li></ul></li><li><a href="refs.search.php">Search Engine Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.mnogosearch.php">mnoGoSearch</a></li><li><a href="book.solr.php">Solr</a> — Apache Solr</li><li><a href="book.sphinx.php">Sphinx</a> — Sphinx Client</li><li><a href="book.swish.php">Swish</a> — Swish Indexing</li></ul></li><li><a href="refs.utilspec.server.php">Server Specific Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.apache.php">Apache</a></li><li><a href="book.fpm.php">FastCGI Process Manager</a></li><li><a href="book.iisfunc.php">IIS</a> — IIS Administration</li><li><a href="book.nsapi.php">NSAPI</a></li></ul></li><li><a href="refs.basic.session.php">Session Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.msession.php">Msession</a> — Mohawk Software Session Handler Functions</li><li><a href="book.session.php">Sessions</a> — Session Handling</li><li><a href="book.session-pgsql.php">Session PgSQL</a> — PostgreSQL Session Save Handler</li></ul></li><li><a href="refs.basic.text.php">Text Processing</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.bbcode.php">BBCode</a> — Bulletin Board Code</li><li><a href="book.pcre.php">PCRE</a> — Regular Expressions (Perl-Compatible)</li><li><a href="book.regex.php">POSIX Regex</a> — Regular Expression (POSIX Extended)</li><li><a href="book.ssdeep.php">ssdeep</a> — ssdeep Fuzzy Hashing</li><li><a href="book.strings.php">Strings</a></li></ul></li><li><a href="refs.basic.vartype.php">Variable and Type Related Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.array.php">Arrays</a></li><li><a href="book.classobj.php">Classes/Objects</a> — Class/Object Information</li><li><a href="book.classkit.php">Classkit</a></li><li><a href="book.ctype.php">Ctype</a> — Character type checking</li><li><a href="book.filter.php">Filter</a> — Data Filtering</li><li><a href="book.funchand.php">Function Handling</a></li><li><a href="book.objaggregation.php">Object Aggregation</a> — Object Aggregation/Composition [PHP 4]</li><li><a href="book.quickhash.php">Quickhash</a></li><li><a href="book.reflection.php">Reflection</a></li><li><a href="book.var.php">Variable handling</a></li></ul></li><li><a href="refs.webservice.php">Web Services</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.oauth.php">OAuth</a></li><li><a href="book.sca.php">SCA</a></li><li><a href="book.soap.php">SOAP</a></li><li><a href="book.xmlrpc.php">XML-RPC</a></li></ul></li><li><a href="refs.utilspec.windows.php">Windows Only Extensions</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.dotnet.php">.NET</a></li><li><a href="book.com.php">COM</a> — COM and .Net (Windows)</li><li><a href="book.printer.php">Printer</a></li><li><a href="book.w32api.php">W32api</a></li><li><a href="book.win32ps.php">win32ps</a></li><li><a href="book.win32service.php">win32service</a></li></ul></li><li><a href="refs.xml.php">XML Manipulation</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="book.dom.php">DOM</a> — Document Object Model</li><li><a href="book.libxml.php">libxml</a></li><li><a href="book.qtdom.php">qtdom</a></li><li><a href="book.sdo.php">SDO</a> — Service Data Objects</li><li><a href="book.sdodasrel.php">SDO-DAS-Relational</a> — SDO Relational Data Access Service</li><li><a href="book.sdo-das-xml.php">SDO DAS XML</a> — SDO XML Data Access Service</li><li><a href="book.simplexml.php">SimpleXML</a></li><li><a href="book.wddx.php">WDDX</a></li><li><a href="book.xmldiff.php">XMLDiff</a> — XML diff and merge</li><li><a href="book.xml.php">XML Parser</a></li><li><a href="book.xmlreader.php">XMLReader</a></li><li><a href="book.xmlwriter.php">XMLWriter</a></li><li><a href="book.xsl.php">XSL</a></li><li><a href="book.xslt.php">XSLT (PHP 4)</a></li></ul></li></ul></div><?php manual_footer(); ?>