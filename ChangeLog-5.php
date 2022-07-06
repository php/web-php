<?php
$_SERVER['BASE_PAGE'] = 'ChangeLog-5.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/changelogs.inc';

$MINOR_VERSIONS = ['5.6', '5.5', '5.4', '5.3', '5.2', '5.1', '5.0'];
changelog_header(5, $MINOR_VERSIONS);
?>
<a id="PHP_5_6"></a>
<section class="version" id="5.6.40"><!-- {{{ 5.6.40 -->
<h3>Version 5.6.40</h3>
<b><?php release_date('10-Jan-2019'); ?></b>
<ul><li>GD:
<ul>
  <li><?php bugfix(77269); ?> (efree() on uninitialized Heap data in imagescale leads to 
use-after-free). (CVE-2016-10166)</li>
  <li><?php bugfix(77270); ?> (imagecolormatch Out Of Bounds Write on Heap). (CVE-2019-6977)</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(77370); ?> (Buffer overflow on mb regex functions - fetch_token). (CVE-2019-9023)</li>
  <li><?php bugfix(77371); ?> (heap buffer overflow in mb regex functions - compile_string_node). (CVE-2019-9023)</li>
  <li><?php bugfix(77381); ?> (heap buffer overflow in multibyte match_at). (CVE-2019-9023)</li>
  <li><?php bugfix(77382); ?> (heap buffer overflow due to incorrect length in expand_case_fold_string). (CVE-2019-9023)</li>
  <li><?php bugfix(77385); ?> (buffer overflow in fetch_token). (CVE-2019-9023)</li>
  <li><?php bugfix(77394); ?> (Buffer overflow in multibyte case folding - unicode). (CVE-2019-9023)</li>
  <li><?php bugfix(77418); ?> (Heap overflow in utf32be_mbc_to_code). (CVE-2019-9023)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77247); ?> (heap buffer overflow in phar_detect_phar_fname_ext). (CVE-2019-9021)</li>
</ul></li>
<li>Xmlrpc:
<ul>
  <li><?php bugfix(77242); ?> (heap out of bounds read in xmlrpc_decode()). (CVE-2019-9020)</li>
  <li><?php bugfix(77380); ?> (Global out of bounds read in xmlrpc base64 code). (CVE-2019-9024)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.39"><!-- {{{ 5.6.39 -->
<h3>Version 5.6.39</h3>
<b><?php release_date('06-Dec-2018'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(77231); ?> (Segfault when using convert.quoted-printable-encode filter).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(77020); ?> (null pointer dereference in imap_mail).</li>
  <li><?php bugfix(77153); ?> (imap_open allows to run arbitrary shell commands via mailbox parameter). (CVE-2018-19518)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(77022); ?> (PharData always creates new files with mode 0666).</li>
  <li><?php bugfix(77143); ?> (Heap Buffer Overflow (READ: 4) in phar_parse_pharfile). (CVE-2018-20783)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.38"><!-- {{{ 5.6.38 -->
<h3>Version 5.6.38</h3>
<b><?php release_date('13-Sep-2018'); ?></b>
<ul><li>Apache2:
<ul>
  <li><?php bugfix(76582); ?> (XSS due to the header Transfer-Encoding: chunked). (CVE-2018-17082)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.37"><!-- {{{ 5.6.37 -->
<h3>Version 5.6.37</h3>
<b><?php release_date('19-Jul-2018'); ?></b>
<ul><li>Exif:
<ul>
  <li><?php bugfix(76423); ?> (Int Overflow lead to Heap OverFlow in exif_thumbnail_extract of exif.c). (CVE-2018-14883)</li>
  <li><?php bugfix(76557); ?> (heap-buffer-overflow (READ of size 48) while reading exif data). (CVE-2018-14851)</li>
</ul></li>
<li>Win32:
<ul>
  <li><?php bugfix(76459); ?> (windows linkinfo lacks openbasedir check). (CVE-2018-15132)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.36"><!-- {{{ 5.6.36 -->
<h3>Version 5.6.36</h3>
<b><?php release_date('26-Apr-2018'); ?></b>
<ul><li>Exif:
<ul>
  <li><?php bugfix(76130); ?> (Heap Buffer Overflow (READ: 1786) in exif_iif_add_value). (CVE-2018-10549)</li>
</ul></li>
<li>iconv:
<ul>
  <li><?php bugfix(76249); ?> (stream filter convert.iconv leads to infinite loop on invalid sequence). (CVE-2018-10546)</li>
</ul></li>
<li>LDAP:
<ul>
  <li><?php bugfix(76248); ?> (Malicious LDAP-Server Response causes Crash). (CVE-2018-10548)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(76129); ?> (fix for CVE-2018-5712 may not be complete). (CVE-2018-10547)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.35"><!-- {{{ 5.6.35 -->
<h3>Version 5.6.35</h3>
<b><?php release_date('29-Mar-2018'); ?></b>
<ul><li>FPM:
<ul>
  <li><?php bugfix(75605); ?> (Dumpable FPM child processes allow bypassing opcache access controls). (CVE-2018-10545)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.34"><!-- {{{ 5.6.34 -->
<h3>Version 5.6.34</h3>
<b><?php release_date('01-Mar-2018'); ?></b>
<ul><li>Standard:
<ul>
  <li><?php bugfix(75981); ?> (stack-buffer-overflow while parsing HTTP response). (CVE-2018-7584)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.33"><!-- {{{ 5.6.33 -->
<h3>Version 5.6.33</h3>
<b><?php release_date('04-Jan-2018'); ?></b>
<ul><li>GD:
<ul>
  <li><?php bugfix(75571); ?> (Potential infinite loop in gdImageCreateFromGifCtx). (CVE-2018-5711)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(74782); ?> (Reflected XSS in .phar 404 page). (CVE-2018-5712)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.32"><!-- {{{ 5.6.32 -->
<h3>Version 5.6.32</h3>
<b><?php release_date('26-Oct-2017'); ?></b>
<ul><li>Date:
<ul>
  <li><?php bugfix(75055); ?> (Out-Of-Bounds Read in timelib_meridian()). (CVE-2017-16642)</li>
</ul></li>
<li>mcrypt:
<ul>
  <li><?php bugfix(72535); ?> (arcfour encryption stream filter crashes php).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(75207); ?> (applied upstream patch for CVE-2016-1283).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.31"><!-- {{{ 5.6.31 -->
<h3>Version 5.6.31</h3>
<b><?php release_date('06-Jul-2017'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(73807); ?> (Performance problem with processing large post request). (CVE-2017-11142)</li>
  <li><?php bugfix(74111); ?> (Heap buffer overread (READ: 1) finish_nested_data from unserialize). (CVE-2017-12933)</li>
  <li><?php bugfix(74603); ?> (PHP INI Parsing Stack Buffer Overflow Vulnerability). (CVE-2017-11628)</li>
  <li><?php bugfix(74819); ?> (wddx_deserialize() heap out-of-bound read via php_parse_date()). (CVE-2017-11145)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(74435); ?> (Buffer over-read into uninitialized memory). (CVE-2017-7890)</li>
</ul></li>
<li>mbstring:
<ul>
  <li>Add oniguruma upstream fix (CVE-2017-9224, CVE-2017-9226, CVE-2017-9227, CVE-2017-9228, CVE-2017-9229)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(74651); ?> (negative-size-param (-1) in memcpy in zif_openssl_seal()). (CVE-2017-11144)</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(74087); ?> (Segmentation fault in PHP7.1.1(compiled using the bundled PCRE library)).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(74145); ?> (wddx parsing empty boolean tag leads to SIGSEGV). (CVE-2017-11143)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.30"><!-- {{{ 5.6.30 -->
<h3>Version 5.6.30</h3>
<b><?php release_date('19-Jan-2017'); ?></b>
<ul><li>EXIF:
<ul>
  <li><?php bugfix(73737); ?> (FPE when parsing a tag format). (CVE-2016-10158)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73549); ?> (Use after free when stream is passed to imagepng).</li>
  <li><?php bugfix(73868); ?> (DOS vulnerability in gdImageCreateFromGd2Ctx()). (CVE-2016-10167)</li>
  <li><?php bugfix(73869); ?> (Signed Integer Overflow gd_io.c). (CVE-2016-10168)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(68447); ?> (grapheme_extract take an extra trailing character).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(73764); ?> (Crash while loading hostile phar archive). (CVE-2016-10159)</li>
  <li><?php bugfix(73768); ?> (Memory corruption when loading hostile phar). (CVE-2016-10160)</li>
  <li><?php bugfix(73773); ?> (Seg fault when loading hostile phar). (CVE-2017-11147)</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Reverted fix for bug <?php bugl(73530); ?> (Unsetting result set may reset other result set).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70213); ?> (Unserialize context shared on double class lookup).</li>
  <li><?php bugfix(73825); ?> (Heap out of bounds read on unserialize in finish_nested_data()). (CVE-2016-10161)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.29"><!-- {{{ 5.6.29 -->
<h3>Version 5.6.29</h3>
<b><?php release_date('08-Dec-2016'); ?></b>
<ul><li>Mysqlnd:
<ul>
  <li><?php bugfix(64526); ?> (Add missing mysqlnd.* parameters to php.ini-*).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(73402); ?> (Opcache segfault when using class constant to call a method).</li>
  <li><?php bugfix(69090); ?> (check cached files permissions)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(72776); ?> (Invalid parameter in memcpy function trough openssl_pbkdf2).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(73498); ?> (Incorrect SQL generated for pg_copy_to()).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(73452); ?> (Segfault (Regression for <?php bugl(69152); ?>)).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(73530); ?> (Unsetting result set may reset other result set).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73297); ?> (HTTP stream wrapper should ignore HTTP 100 Continue).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(73631); ?> (Invalid read when wddx decodes empty boolean element). (CVE-2016-9935)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.28"><!-- {{{ 5.6.28 -->
<h3>Version 5.6.28</h3>
<b><?php release_date('10-Nov-2016'); ?></b>
<ul><li>Core:
<ul>
  <li><?php bugfix(73337); ?> (try/catch not working with two exceptions inside a same operation).</li>
</ul></li>
<li>Bz2:
<ul>
  <li><?php bugfix(73356); ?> (crash in bzcompress function).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(73213); ?> (Integer overflow in imageline() with antialiasing).</li>
  <li><?php bugfix(73272); ?> (imagescale() is not affected by, but affects imagesetinterpolation()).</li>
  <li><?php bugfix(73279); ?> (Integer overflow in gdImageScaleBilinearPalette()).</li>
  <li><?php bugfix(73280); ?> (Stack Buffer Overflow in GD dynamicGetbuf).</li>
  <li><?php bugfix(72482); ?> (Illegal write/read access caused by gdImageAALine overflow).</li>
  <li><?php bugfix(72696); ?> (imagefilltoborder stackoverflow on truecolor images). (CVE-2016-9933)</li>
</ul></li>
<li>Imap:
<ul>
  <li><?php bugfix(73418); ?> (Integer Overflow in "_php_imap_mail" leads Heap Overflow).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73144); ?> (Use-after-free in ArrayObject Deserialization).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(73037); ?> (SoapServer reports Bad Request when gzipped).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(73333); ?> (2147483647 is fetched as string).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73203); ?> (passing additional_parameters causes mail to fail).</li>
  <li><?php bugfix(73188); ?> (use after free in userspace streams).</li>
  <li><?php bugfix(73192); ?> (parse_url return wrong hostname).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(73331); ?> (NULL Pointer Dereference in WDDX Packet Deserialization with PDORow). (CVE-2016-9934)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.27"><!-- {{{ 5.6.27 -->
<h3>Version 5.6.27</h3>
<?php release_date('13-Oct-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(73025); ?> (Heap Buffer Overflow in virtual_popen of zend_virtual_cwd.c).</li>
  <li><?php bugfix(73058); ?> (crypt broken when salt is 'too' long).</li>
  <li><?php bugfix(72703); ?> (Out of bounds global memory read in BF_crypt triggered by
password_verify).</li>
  <li><?php bugfix(73189); ?> (Memcpy negative size parameter php_resolve_path).</li>
  <li><?php bugfix(73147); ?> (Use After Free in unserialize()).</li>
</ul></li>
<li>BCmath:
<ul>
  <li><?php bugfix(73190); ?> (memcpy negative parameter _bc_new_num_ex).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(73150); ?> (missing NULL check in dom_document_save_html).</li>
</ul></li>
<li>Ereg:
<ul>
  <li><?php bugfix(73284); ?> (heap overflow in php_ereg_replace function).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(72972); ?> (Bad filter for the flags FILTER_FLAG_NO_RES_RANGE and
FILTER_FLAG_NO_PRIV_RANGE).</li>
  <li><?php bugfix(67167); ?> (Wrong return value from FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE).</li>
  <li><?php bugfix(73054); ?> (default option ignored when object passed to int filter).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(67325); ?> (imagetruecolortopalette: white is duplicated in palette).</li>
  <li><?php bugfix(50194); ?> (imagettftext broken on transparent background w/o alphablending).</li>
  <li><?php bugfix(73003); ?> (Integer Overflow in gdImageWebpCtx of gd_webp.c).</li>
  <li><?php bugfix(53504); ?> (imagettfbbox gives incorrect values for bounding box).</li>
  <li><?php bugfix(73157); ?> (imagegd2() ignores 3rd param if 4 are given).</li>
  <li><?php bugfix(73155); ?> (imagegd2() writes wrong chunk sizes on boundaries).</li>
  <li><?php bugfix(73159); ?> (imagegd2(): unrecognized formats may result in corrupted files).</li>
  <li><?php bugfix(73161); ?> (imagecreatefromgd2() may leak memory).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(73218); ?> (add mitigation for ICU int overflow).</li>
</ul></li>
<li>Imap:
<ul>
  <li><?php bugfix(73208); ?> (integer overflow in imap_8bit caused heap corruption).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(72994); ?> (mbc_to_code() out of bounds read).</li>
  <li><?php bugfix(66964); ?> (mb_convert_variables() cannot detect recursion).</li>
  <li><?php bugfix(72992); ?> (mbstring.internal_encoding doesn't inherit default_charset).</li>
  <li><?php bugfix(73082); ?> (string length overflow in mb_encode_* function).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(73174); ?> (heap overflow in php_pcre_replace_impl).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(72590); ?> (Opcache restart with kill_all_lockers does not work).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(73072); ?> (Invalid path SNI_server_certs causes segfault).</li>
  <li><?php bugfix(73275); ?> (crash in openssl_encrypt function).</li>
  <li><?php bugfix(73276); ?> (crash in openssl_random_pseudo_bytes function).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(68015); ?> (Session does not report invalid uid for files save handler).</li>
  <li><?php bugfix(73100); ?> (session_destroy null dereference in ps_files_path_create).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(73293); ?> (NULL pointer dereference in SimpleXMLElement::asXML()).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73073); ?> (CachingIterator null dereference when convert to string).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(73240); ?> (Write out of bounds at number_format).</li>
  <li><?php bugfix(73017); ?> (memory corruption in wordwrap function).</li>
</ul></li>
<li>Stream:
<ul>
  <li><?php bugfix(73069); ?> (readfile() mangles files larger than 2G).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(70752); ?> (Depacking with wrong password leaves 0 length files).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.26"><!-- {{{ 5.6.26 -->
<h3>Version 5.6.26</h3>
<?php release_date('15-Sep-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72907); ?> (null pointer deref, segfault in gc_remove_zval_from_buffer (zend_gc.c:260)).</li>
</ul></li>
<li>Dba:
<ul>
  <li><?php bugfix(71514); ?> (Bad dba_replace condition because of wrong API usage).</li>
  <li><?php bugfix(70825); ?> (Cannot fetch multiple values with group in ini file).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(72926); ?> (Uninitialized Thumbail Data Leads To Memory Leakage in exif_process_IFD_in_TIFF).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(70195); ?> (Cannot upload file using ftp_put to FTPES with require_ssl_reuse).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(66005); ?> (imagecopy does not support 1bit transparency on truecolor images).</li>
  <li><?php bugfix(72913); ?> (imagecopy() loses single-color transparency on palette images).</li>
  <li><?php bugfix(68716); ?> (possible resource leaks in _php_image_convert()).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(73007); ?> (add locale length check). (CVE-2016-7416)</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(72787); ?> (json_decode reads out of bounds).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(66797); ?> (mb_substr only takes 32-bit signed integer).</li>
  <li><?php bugfix(72910); ?> (Out of bounds heap read in mbc_to_code() / triggered by mb_ereg_match()).</li>
</ul></li>
<li>MSSQL:
<ul>
  <li><?php bugfix(72039); ?> (Use of uninitialised value on mssql_guid_string).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(72293); ?> (Heap overflow in mysqlnd related to BIT fields). (CVE-2016-7412)</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(60665); ?> (call to empty() on NULL result using PDO::FETCH_LAZY returns false).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li>Implemented FR <?php bugl(72633); ?> (Postgres PDO lastInsertId() should work without specifying a sequence).</li>
  <li><?php bugfix(72759); ?> (Regression in pgo_pgsql).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(72928); ?> (Out of bound when verify signature of zip phar in phar_parse_zipfile). (CVE-2016-7414)</li>
  <li><?php bugfix(73035); ?> (Out of bound when verify signature of tar phar in phar_parse_tarfile).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(73029); ?> (Missing type check when unserializing SplArray). (CVE-2016-7417)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72823); ?> (strtr out-of-bound access).</li>
  <li><?php bugfix(72278); ?> (getimagesize returning FALSE on valid jpg).</li>
  <li><?php bugfix(65550); ?> (get_browser() incorrectly parses entries with "+" sign).</li>
  <li><?php bugfix(71882); ?> (Negative ftruncate() on php://memory exhausts memory).</li>
  <li><?php bugfix(73011); ?> (integer overflow in fgets cause heap corruption).</li>
  <li><?php bugfix(73017); ?> (memory corruption in wordwrap function).</li>
  <li><?php bugfix(73045); ?> (integer overflow in fgetcsv caused heap corruption).</li>
  <li><?php bugfix(73052); ?> (Memory Corruption in During Deserialized-object Destruction). (CVE-2016-7411)</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(72853); ?> (stream_set_blocking doesn't work).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(72860); ?> (wddx_deserialize use-after-free). (CVE-2016-7413)</li>
  <li><?php bugfix(73065); ?> (Out-Of-Bounds Read in php_wddx_push_element). (CVE-2016-7418)</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(72085); ?> (SEGV on unknown address zif_xml_parse).</li>
  <li><?php bugfix(72927); ?> (integer overflow in xml_utf8_encode).</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(68302); ?> (impossible to compile php with zip support).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.25"><!-- {{{ 5.6.25 -->
<h3>Version 5.6.25</h3>
<?php release_date('18-Aug-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70436); ?> (Use After Free Vulnerability in unserialize()).</li>
  <li><?php bugfix(72024); ?> (microtime() leaks memory).</li>
  <li><?php bugfix(72581); ?> (previous property undefined in Exception after deserialization).</li>
  <li>Implemented FR <?php bugl(72614); ?> (Support "nmake test" on building extensions by phpize).</li>
  <li><?php bugfix(72641); ?> (phpize (on Windows) ignores PHP_PREFIX).</li>
  <li><?php bugfix(72663); ?> (Create an Unexpected Object and Don't Invoke __wakeup() in Deserialization). (CVE-2016-7124)</li>
  <li><?php bugfix(72681); ?> (PHP Session Data Injection Vulnerability). (CVE-2016-7125)</li>
</ul></li>
<li>Bz2:
<ul>
  <li><?php bugfix(72837); ?> (integer overflow in bzdecompress caused heap corruption).</li>
</ul></li>
<li>Calendar:
<ul>
  <li><?php bugfix(67976); ?> (cal_days_month() fails for final month of the French calendar).</li>
  <li><?php bugfix(71894); ?> (AddressSanitizer: global-buffer-overflow in zif_cal_from_jd).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(71144); ?> (Segmentation fault when using cURL with ZTS).</li>
  <li><?php bugfix(71929); ?> (Certification information (CERTINFO) data parsing error).</li>
  <li><?php bugfix(72807); ?> (integer overflow in curl_escape caused heap corruption).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(66502); ?> (DOM document dangling reference).</li>
</ul></li>
<li>Ereg:
<ul>
  <li><?php bugfix(72838); ?> (Integer overflow lead to heap corruption in sql_regcase).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(72627); ?> (Memory Leakage In exif_process_IFD_in_TIFF). (CVE-2016-7128)</li>
  <li><?php bugfix(72735); ?> (Samsung picture thumb not read (zero size)).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(71745); ?> (FILTER_FLAG_NO_RES_RANGE does not cover whole 127.0.0.0/8 range).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(72575); ?> (using --allow-to-run-as-root should ignore missing user).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(43828); ?> (broken transparency of imagearc for truecolor in blendingmode).</li>
  <li><?php bugfix(66555); ?> (Always false condition in ext/gd/libgd/gdkanji.c).</li>
  <li><?php bugfix(68712); ?> (suspicious if-else statements).</li>
  <li><?php bugfix(70315); ?> (500 Server Error but page is fully rendered).</li>
  <li><?php bugfix(72596); ?> (imagetypes function won't advertise WEBP support).</li>
  <li><?php bugfix(72604); ?> (imagearc() ignores thickness for full arcs).</li>
  <li><?php bugfix(72697); ?> (select_colors write out-of-bounds). (CVE-2016-7126)</li>
  <li><?php bugfix(72709); ?> (imagesetstyle() causes OOB read for empty $styles).</li>
  <li><?php bugfix(72730); ?> (imagegammacorrect allows arbitrary write access). (CVE-2016-7127)</li>
  <li><?php bugfix(72494); ?> (imagecropauto out-of-bounds access)</li>
</ul></li>
<li>Intl:
<ul>
  <li>Partially fixed <?php bugl(72506); ?> (idn_to_ascii for UTS #46 incorrect for long domain names).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(72691); ?> (mb_ereg_search raises a warning if a match zero-width).</li>
  <li><?php bugfix(72693); ?> (mb_ereg_search increments search position when a match zero-width).</li>
  <li><?php bugfix(72694); ?> (mb_ereg_search_setpos does not accept a string's last position).</li>
  <li><?php bugfix(72710); ?> (`mb_ereg` causes buffer overflow on regexp compile error).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(72688); ?> (preg_match missing group names in matches).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(70313); ?> (PDO statement fails to throw exception).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(72222); ?> (ReflectionClass::export doesn't handle array constants).</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(72708); ?> (php_snmp_parse_oid integer overflow in memory allocation).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(72330); ?> (CSV fields incorrectly split if escape char followed by UTF chars).</li>
  <li><?php bugfix(72836); ?> (integer overflow in base64_decode).</li>
  <li><?php bugfix(72848); ?> (integer overflow in quoted_printable_encode).</li>
  <li><?php bugfix(72849); ?> (integer overflow in urlencode).</li>
  <li><?php bugfix(72850); ?> (integer overflow in php_uuencode).</li>
  <li><?php bugfix(72716); ?> (initialize buffer before read).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(41021); ?> (Problems with the ftps wrapper).</li>
  <li><?php bugfix(54431); ?> (opendir() does not work with ftps:// wrapper).</li>
  <li><?php bugfix(72667); ?> (opendir() with ftp:// attempts to open data stream for non-existent directories).</li>
  <li><?php bugfix(72764); ?> (ftps:// opendir wrapper data channel encryption fails with IIS FTP 7.5, 8.5).</li>
  <li><?php bugfix(72771); ?> (ftps:// wrapper is vulnerable to protocol downgrade attack).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(72122); ?> (IteratorIterator breaks '@' error suppression).</li>
  <li><?php bugfix(72646); ?> (SplFileObject::getCsvControl does not return the escape character).</li>
  <li><?php bugfix(72684); ?> (AppendIterator segfault with closed generator).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li>Implemented FR <?php bugl(72653); ?> (SQLite should allow opening with empty filename).</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(72142); ?> (WDDX Packet Injection Vulnerability in wddx_serialize_value()).</li>
  <li><?php bugfix(72749); ?> (wddx_deserialize allows illegal memory access). (CVE-2016-7129)</li>
  <li><?php bugfix(72750); ?> (wddx_deserialize null dereference). (CVE-2016-7130)</li>
  <li><?php bugfix(72790); ?> (wddx_deserialize null dereference with invalid xml). (CVE-2016-7131)</li>
  <li><?php bugfix(72799); ?> (wddx_deserialize null dereference in php_wddx_pop_element). (CVE-2016-7132)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.24"><!-- {{{ 5.6.24 -->
<h3>Version 5.6.24</h3>
<?php release_date('21-Jul-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(71936); ?> (Segmentation fault destroying HTTP_RAW_POST_DATA).</li>
  <li><?php bugfix(72496); ?> (Cannot declare public method with signature incompatible with parent private method).</li>
  <li><?php bugfix(72138); ?> (Integer Overflow in Length of String-typed ZVAL).</li>
  <li><?php bugfix(72513); ?> (Stack-based buffer overflow vulnerability in virtual_file_ex). (CVE-2016-6289)</li>
  <li><?php bugfix(72562); ?> (Use After Free in unserialize() with Unexpected Session Deserialization). (CVE-2016-6290)</li>
  <li><?php bugfix(72573); ?> (HTTP_PROXY is improperly trusted by some PHP libraries and applications). (CVE-2016-5385)</li>
</ul></li>
<li>bz2:
<ul>
  <li><?php bugfix(72447); ?> (Type Confusion in php_bz2_filter_create()).</li>
  <li><?php bugfix(72613); ?> (Inadequate error handling in bzread()). (CVE-2016-5399)</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66836); ?> (DateTime::createFromFormat 'U' with pre 1970 dates fails parsing).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(50845); ?> (exif_read_data() returns corrupted exif headers).</li>
  <li><?php bugfix(72603); ?> (Out of bound read in exif_process_IFD_in_MAKERNOTE). (CVE-2016-6291)</li>
  <li><?php bugfix(72618); ?> (NULL Pointer Dereference in exif_process_user_comment). (CVE-2016-6292)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(43475); ?> (Thick styled lines have scrambled patterns).</li>
  <li><?php bugfix(53640); ?> (XBM images require width to be multiple of 8).</li>
  <li><?php bugfix(64641); ?> (imagefilledpolygon doesn't draw horizontal line).</li>
  <li><?php bugfix(72512); ?> (gdImageTrueColorToPaletteBody allows arbitrary write/read access).</li>
  <li><?php bugfix(72519); ?> (imagegif/output out-of-bounds access).</li>
  <li><?php bugfix(72558); ?> (Integer overflow error within _gdContributionsAlloc()). (CVE-2016-6207)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(72533); ?> (locale_accept_from_http out-of-bounds access). (CVE-2016-6294)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(71915); ?> (openssl_random_pseudo_bytes is not fork-safe).</li>
  <li><?php bugfix(72336); ?> (openssl_pkey_new does not fail for invalid DSA params).</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(72479); ?> (Use After Free Vulnerability in SNMP with GC and unserialize()). (CVE-2016-6295)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(55701); ?> (GlobIterator throws LogicException).</li>
</ul></li>
<li>SQLite3:
<ul>
  <li><?php bugfix(70628); ?> (Clearing bindings on an SQLite3 statement doesn't work).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(72439); ?> (Stream socket with remote address leads to a segmentation fault).</li>
</ul></li>
<li>Xmlrpc:
<ul>
  <li><?php bugfix(72606); ?> (heap-buffer-overflow (write) simplestring_addn simplestring.c). (CVE-2016-6296)</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(72520); ?> (Stack-based buffer overflow vulnerability in php_stream_zip_opener). (CVE-2016-6297)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.23"><!-- {{{ 5.6.23 -->
<h3>Version 5.6.23</h3>
<?php release_date('23-Jun-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72268); ?> (Integer Overflow in nl2br()).</li>
  <li><?php bugfix(72275); ?> (Integer Overflow in json_encode()/json_decode()/ json_utf8_to_utf16()).</li>
  <li><?php bugfix(72400); ?> (Integer Overflow in addcslashes/addslashes).</li>
  <li><?php bugfix(72403); ?> (Integer Overflow in Length of String-typed ZVAL).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(63740); ?> (strtotime seems to use both sunday and monday as start of week).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(72298); ?> (pass2_no_dither out-of-bounds access).</li>
  <li><?php bugfix(72337); ?> (invalid dimensions can lead to crash).</li>
  <li><?php bugfix(72339); ?> (Integer Overflow in _gd2GetHeader() resulting in heap overflow). (CVE-2016-5766)</li>
  <li><?php bugfix(72407); ?> (NULL Pointer Dereference at _gdScaleVert).</li>
  <li><?php bugfix(72446); ?> (Integer Overflow in gdImagePaletteToTrueColor() resulting in heap overflow). (CVE-2016-5767)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(70484); ?> (selectordinal doesn't work with named parameters).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(72402); ?> (_php_mb_regex_ereg_replace_exec - double free). (CVE-2016-5768)</li>
</ul></li>
<li>mcrypt:
<ul>
  <li><?php bugfix(72455); ?> (Heap Overflow due to integer overflows). (CVE-2016-5769)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(72140); ?> (segfault after calling ERR_free_strings()).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(72321); ?> (invalid free in phar_extract_file()). (CVE-2016-4473)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(72262); ?> (int/size_t confusion in SplFileObject::fread). (CVE-2016-5770)</li>
  <li><?php bugfix(72433); ?> (Use After Free Vulnerability in PHP's GC algorithm and unserialize). (CVE-2016-5771)</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(72340); ?> (Double Free Courruption in wddx_deserialize). (CVE-2016-5772)</li>
</ul></li>
<li>zip:
<ul>
  <li><?php bugfix(72434); ?> (ZipArchive class Use After Free Vulnerability in PHP's GC algorithm and unserialize). (CVE-2016-5773)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.22"><!-- {{{ 5.6.22 -->
<h3>Version 5.6.22</h3>
<?php release_date('26-May-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72172); ?> (zend_hex_strtod should not use strlen).</li>
  <li><?php bugfix(72114); ?> (Integer underflow / arbitrary null write in fread/gzread). (CVE-2016-5096)</li>
  <li><?php bugfix(72135); ?> (Integer Overflow in php_html_entities). (CVE-2016-5094)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(72227); ?> (imagescale out-of-bounds read). (CVE-2013-7456)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(64524); ?> (Add intl.use_exceptions to php.ini-*).</li>
  <li><?php bugfix(72241); ?> (get_icu_value_internal out-of-bounds read). (CVE-2016-5093)</li>
</ul></li>
<li>Postgres:
<ul>
<li><?php bugfix(72151); ?> (mysqli_fetch_object changed behaviour). Patch to <?php bugl(71820) ?> is reverted.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.21"><!-- {{{ 5.6.21 -->
<h3>Version 5.6.21</h3>
<?php release_date('28-Apr-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69537); ?> (__debugInfo with empty string for key gives error).</li>
  <li><?php bugfix(71841); ?> (EG(error_zval) is not handled well).</li>
</ul></li>
<li>BCmath:
<ul>
  <li><?php bugfix(72093); ?> (bcpowmod accepts negative scale and corrupts _one_ definition). (CVE-2016-4537, CVE-2016-4538)</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(71831); ?> (CURLOPT_NOPROXY applied as long instead of string).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(71889); ?> (DateInterval::format Segmentation fault).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(72094); ?> (Out of bounds heap read access in exif header processing). (CVE-2016-4542, CVE-2016-4543, CVE-2016-4544)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(71952); ?> (Corruption inside imageaffinematrixget).</li>
  <li><?php bugfix(71912); ?> (libgd: signedness vulnerability). (CVE-2016-3074)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(72061); ?> (Out-of-bounds reads in zif_grapheme_stripos with negative offset). (CVE-2016-4540, CVE-2016-4541)</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(71422); ?> (Fix ORA-01438: value larger than specified precision allowed for this column).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(63171); ?> (Script hangs after max_execution_time).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(71843); ?> (null ptr deref ZEND_RETURN_SPEC_CONST_HANDLER).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(52098); ?> (Own PDOStatement implementation ignore __call()).</li>
  <li><?php bugfix(71447); ?> (Quotes inside comments not properly handled).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(71820); ?> (pg_fetch_object binds parameters before call constructor).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(67582); ?> (Cloned SplObjectStorage with overwritten getHash fails offsetExists()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(71840); ?> (Unserialize accepts wrongly data).</li>
  <li><?php bugfix(67512); ?> (php_crypt() crashes if crypt_r() does not exist or _REENTRANT is not defined).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(72099); ?> (xml_parse_into_struct segmentation fault). (CVE-2016-4539)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.20"><!-- {{{ 5.6.20 -->
<h3>Version 5.6.20</h3>
<?php release_date('31-Mar-2016'); ?>
<ul><li>CLI Server:
<ul>
  <li><?php bugfix(69953); ?> (Support MKCALENDAR request method).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(71596); ?> (Segmentation fault on ZTS with date function (setlocale)).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php bugfix(71694); ?> (Support constant CURLM_ADDED_ALREADY).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(71635); ?> (DatePeriod::getEndDate segfault).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(71527); ?> (Buffer over-write in finfo_open with malformed magic file). (CVE-2015-8865)</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(71906); ?> (AddressSanitizer: negative-size-param (-1) in mbfl_strcut). (CVE-2016-4073)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(47803); ?>, <?php bugl(69526); ?> (Executing prepared statements is succesfull only for the first two statements).</li>
  <li><?php bugfix(71860); ?> (Invalid memory write in phar on filename with \0 in name). (CVE-2016-4072)</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php bugfix(54648); ?> (PDO::MSSQL forces format of datetime fields).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71625); ?> (Crash in php7.dll with bad phar filename).</li>
  <li><?php bugfix(71504); ?> (Parsing of tar file with duplicate filenames causes memory leak).</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(71704); ?> (php_snmp_error() Format String Vulnerability). (CVE-2016-4071)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(71798); ?> (Integer Overflow in php_raw_url_encode). (CVE-2016-4070)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.19"><!-- {{{ 5.6.19 -->
<h3>Version 5.6.19</h3>
<?php release_date('03-Mar-2016'); ?>
<ul><li>CLI server:
<ul>
  <li><?php bugfix(71559); ?> (Built-in HTTP server, we can download file in web by bug).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(71523); ?> (Copied handle with new option CURLOPT_HTTPHEADER crashes while curl_multi_exec).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(68078); ?> (Datetime comparisons ignore microseconds).</li>
  <li><?php bugfix(71525); ?> (Calls to date_modify will mutate timelib_rel_time, causing date_date_set issues).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(71434); ?> (finfo throws notice for specific python file).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(62172); ?> (FPM not working with Apache httpd 2.4 balancer/fcgi setup).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(71584); ?> (Possible use-after-free of ZCG(cwd) in Zend Opcache).</li>
</ul></li>
<li>PDO MySQL:
<ul>
  <li><?php bugfix(71569); ?> (<?php bugl(70389); ?> fix causes segmentation fault).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71498); ?> (Out-of-Bound Read in phar_parse_zipfile()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70720); ?> (strip_tags improper php code parsing).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(71587); ?> (Use-After-Free / Double-Free in WDDX Deserialize).</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(71540); ?> (NULL pointer dereference in xsl_ext_function_php()).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(71561); ?> (NULL pointer dereference in Zip::ExtractTo).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.18"><!-- {{{ 5.6.18 -->
<h3>Version 5.6.18</h3>
<?php release_date('04-Feb-2016'); ?>
<ul><li>Core:
<ul>
  <li>Added support for new HTTP 451 code.</li>
  <li><?php bugfix(71039); ?> (exec functions ignore length but look for NULL termination).</li>
  <li><?php bugfix(71089); ?> (No check to duplicate zend_extension).</li>
  <li><?php bugfix(71201); ?> (round() segfault on 64-bit builds).</li>
  <li><?php bugfix(71273); ?> (A wrong ext directory setup in php.ini leads to crash).</li>
  <li><?php bugfix(71323); ?> (Output of stream_get_meta_data can be falsified by its input).</li>
  <li><?php bugfix(71459); ?> (Integer overflow in iptcembed()).</li>
</ul></li>
<li>Apache2handler:
<ul>
  <li>Fix &gt;2G Content-Length headers in apache2handler.</li>
</ul></li>
<li>FTP:
<ul>
  <li>Implemented FR <?php bugl(55651); ?> (Option to ignore the returned FTP PASV address).</li>
</ul></li>
<li>GD:
<ul>
  <li>Improved fix for bug <?php bugl(70976) ?>.</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(71127); ?> (Define in auto_prepend_file is overwrite).</li>
  <li><?php bugfix(71024); ?> (Unable to use PHP 7.0 x64 side-by-side with PHP 5.6 x32 on the same server).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgraded bundled PCRE library to 8.38. (CVE-2015-8383, CVE-2015-8386, CVE-2015-8387, CVE-2015-8389, CVE-2015-8390, CVE-2015-8391, CVE-2015-8393, CVE-2015-8394)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71354); ?> (Heap corruption in tar/zip/phar parser). (CVE-2016-4342)</li>
  <li><?php bugfix(71331); ?> (Uninitialized pointer in phar_make_dirstream()). (CVE-2016-4343)</li>
  <li><?php bugfix(71391); ?> (NULL Pointer Dereference in phar_tar_setupmetadata()).</li>
  <li><?php bugfix(71488); ?> (Stack overflow when decompressing tar archives). (CVE-2016-2554)</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(69111); ?> (Crash in SessionHandler::read()).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70979); ?> (crash with bad soap request).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(71204); ?> (segfault if clean spl_autoload_funcs while autoloading).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(71335); ?> (Type Confusion in WDDX Packet Deserialization).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.17"><!-- {{{ 5.6.17 -->
<h3>Version 5.6.17</h3>
<?php release_date('07-Jan-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66909); ?> (configure fails utf8_to_mutf7 test).</li>
  <li><?php bugfix(70958); ?> (Invalid opcode while using ::class as trait method paramater default value).</li>
  <li><?php bugfix(70957); ?> (self::class can not be resolved with reflection for abstract class).</li>
  <li><?php bugfix(70944); ?> (try{ } finally{} can create infinite chains of exceptions).</li>
  <li><?php bugfix(61751); ?> (SAPI build problem on AIX: Undefined symbol: php_register_internal_extensions).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(70755); ?> (fpm_log.c memory leak and buffer overflow). (CVE-2016-5114)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(70976); ?> (Memory Read via gdImageRotateInterpolated Array Index Out of Bounds). (CVE-2016-1903)</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(68077); ?> (LOAD DATA LOCAL INFILE / open_basedir restriction).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70900); ?> (SoapClient systematic out of memory error).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70960); ?> (ReflectionFunction for array_unique returns wrong number of parameters).</li>
</ul></li>
<li>PDO_Firebird:
<ul>
  <li><?php bugfix(60052); ?> (Integer returned as a 64bit integer on X64_86).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(70661); ?> (Use After Free Vulnerability in WDDX Packet Deserialization).</li>
  <li><?php bugfix(70741); ?> (Session WDDX Packet Deserialization Type Confusion Vulnerability).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(70728); ?> (Type Confusion Vulnerability in PHP_to_XMLRPC_worker()).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.16"><!-- {{{ 5.6.16 -->
<h3>Version 5.6.16</h3>
<?php release_date('26-Nov-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70828); ?> (php-fpm 5.6 with opcache crashes when referencing a non-existent constant).</li>
  <li><?php bugfix(70748); ?> (Segfault in ini_lex () at Zend/zend_ini_scanner.l).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(68344); ?> (MySQLi does not provide way to disable peer certificate validation) by introducing MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT connection flag.</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(68298); ?> (OCI int overflow).</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php bugfix(69757); ?> (Segmentation fault on nextRowset).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70875); ?> (Segmentation fault if wsdl has no targetNamespace attribute).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70852); ?> (Segfault getting NULL offset of an ArrayObject).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.15"><!-- {{{ 5.6.15 -->
<h3>Version 5.6.15</h3>
<?php release_date('29-Oct-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70681); ?> (Segfault when binding $this of internal instance method to null).</li>
  <li><?php bugfix(70685); ?> (Segfault for getClosure() internal method rebind with invalid $this).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(70619); ?> (DateTimeImmutable segfault).</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li><?php bugfix(70625); ?> (mcrypt_encrypt() won't return data when no IV was specified under RC4).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(70384); ?> (mysqli_real_query():Unknown type 245 sent by the server).</li>
  <li><?php bugfix(70572); ?> segfault in mysqlnd_connect.</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(70632); ?> (Third one of segfault in gc_remove_from_buffer).</li>
  <li><?php bugfix(70631); ?> (Another Segfault in gc_remove_from_buffer()).</li>
  <li><?php bugfix(70601); ?> (Segfault in gc_remove_from_buffer()).</li>
  <li>Fixed compatibility with Windows 10 (see also <?php bugl(70652); ?>).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.14"><!-- {{{ 5.6.14 -->
<h3>Version 5.6.14</h3>
<?php release_date('01-Oct-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70370); ?> (Bundled libtool.m4 doesn't handle FreeBSD 10 when building extensions).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(68291); ?> (404 on urls with '+').</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(70001); ?> (Assigning to DOMNode::textContent does additional entity encoding).</li>
</ul></li>
<li>ldap:
<ul>
  <li><?php bugfix(70465); ?> (Bug in ldap_search() modifies LDAP_OPT_TIMELIMIT/DEREF's values). (Tyson Andre).</li>
  <li><?php bugfix(69574); ?> (ldap timeouts not enforced). (Côme Bernigaud).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(70456); ?> (mysqlnd doesn't activate TCP keep-alive when connecting to a server).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(55259); ?> (openssl extension does not get the DH parameters from DH key resource).</li>
  <li><?php bugfix(70395); ?> (Missing ARG_INFO for openssl_seal()).</li>
  <li><?php bugfix(60632); ?> (openssl_seal fails with AES).</li>
  <li><?php bugfix(68312); ?> (Lookup for openssl.cnf causes a message box).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(70389); ?> (PDO constructor changes unrelated variables).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69720); ?> (Null pointer dereference in phar_get_fp_offset()). (CVE-2015-7803)</li>
  <li><?php bugfix(70433); ?> (Uninitialized pointer in phar_make_dirstream when zip entry filename is "/"). (CVE-2015-7804)</li>
</ul></li>
<li>Phpdbg:
<ul>
  <li>Fix phpdbg_break_next() sometimes not breaking.</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(67131); ?> (setcookie() conditional for empty values not met).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(70361); ?> (HTTP stream wrapper doesn't close keep-alive connections).</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(70322); ?> (ZipArchive::close() doesn't indicate errors).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.13"><!-- {{{ 5.6.13 -->
<h3>Version 5.6.13</h3>
<?php release_date('03-Sep-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69900); ?> (Too long timeout on pipes).</li>
  <li><?php bugfix(69487); ?> (SAPI may truncate POST data).</li>
  <li><?php bugfix(70198); ?> (Checking liveness does not work as expected).</li>
  <li><?php bugfix(70172); ?> (Use After Free Vulnerability in unserialize()). (CVE-2015-6834)</li>
  <li><?php bugfix(70219); ?> (Use after free vulnerability in session deserializer). (CVE-2015-6835)</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(66606); ?> (Sets HTTP_CONTENT_TYPE but not CONTENT_TYPE).</li>
  <li><?php bugfix(70264); ?> (CLI server directory traversal).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(70266); ?> (DateInterval::__construct.interval_spec is not supposed to be optional).</li>
  <li><?php bugfix(70277); ?> (new DateTimeZone($foo) is ignoring text after null byte).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(70385); ?> (Buffer over-read in exif_read_data with TIFF IFD tag byte value of 32 bytes).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(70284); ?> (Use after free vulnerability in unserialize() with GMP).</li>
</ul></li>
<li>hash:
<ul>
  <li><?php bugfix(70312); ?> (HAVAL gives wrong hashes in specific cases).</li>
</ul></li>
<li>MCrypt:
<ul>
  <li><?php bugfix(69833); ?> (mcrypt fd caching not working).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(70237); ?> (Empty while and do-while segmentation fault with opcode on CLI enabled).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(70232); ?> (Incorrect bump-along behavior with \K and empty string match).</li>
  <li><?php bugfix(70345); ?> (Multiple vulnerabilities related to PCRE functions).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70388); ?> (SOAP serialize_function_call() type confusion / RCE). (CVE-2015-6836)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70290); ?> (Null pointer deref (segfault) in spl_autoload via ob_start).</li>
  <li><?php bugfix(70303); ?> (Incorrect constructor reflection for ArrayObject).</li>
  <li><?php bugfix(70365); ?> (Use-after-free vulnerability in unserialize() with SplObjectStorage). (CVE-2015-6834)</li>
  <li><?php bugfix(70366); ?> (Use-after-free vulnerability in unserialize() with SplDoublyLinkedList). (CVE-2015-6834)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70052); ?> (getimagesize() fails for very large and very small WBMP).</li>
  <li><?php bugfix(70157); ?> (parse_ini_string() segmentation fault with INI_SCANNER_TYPED).</li>
</ul></li>
<li>XSLT:
<ul>
  <li><?php bugfix(69782); ?> (NULL pointer dereference). (CVE-2015-6837, CVE-2015-6838)</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(70350); ?> (ZipArchive::extractTo allows for directory traversal when creating directories). (CVE-2014-9767)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.12"><!-- {{{ 5.6.12 -->
<h3>Version 5.6.12</h3>
<?php release_date('06-Aug-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70012); ?> (Exception lost with nested finally block).</li>
  <li><?php bugfix(70002); ?> (TS issues with temporary dir handling).</li>
  <li><?php bugfix(69793); ?> (Remotely triggerable stack exhaustion via recursive method calls).</li>
  <li><?php bugfix(69892); ?> (Different arrays compare indentical due to integer key truncation).</li>
  <li><?php bugfix(70121); ?> (unserialize() could lead to unexpected methods execution / NULL pointer deref).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(69655); ?> (php -S changes MKCALENDAR request method to MKCOL).</li>
  <li><?php bugfix(64878); ?> (304 responses return Content-Type header).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(53156); ?> (imagerectangle problem with point ordering).</li>
  <li><?php bugfix(66387); ?> (Stack overflow with imagefilltoborder). (CVE-2015-8874)</li>
  <li><?php bugfix(70102); ?> (imagecreatefromwebm() shifts colors).</li>
  <li><?php bugfix(66590); ?> (imagewebp() doesn't pad to even length).</li>
  <li><?php bugfix(66882); ?> (imagerotate by -90 degrees truncates image by 1px).</li>
  <li><?php bugfix(70064); ?> (imagescale(..., IMG_BICUBIC) leaks memory).</li>
  <li><?php bugfix(69024); ?> (imagescale segfault with palette based image).</li>
  <li><?php bugfix(53154); ?> (Zero-height rectangle has whiskers).</li>
  <li><?php bugfix(67447); ?> (imagecrop() add a black line when cropping).</li>
  <li><?php bugfix(68714); ?> (copy 'n paste error).</li>
  <li><?php bugfix(66339); ?> (PHP segfaults in imagexbm).</li>
  <li><?php bugfix(70047); ?> (gd_info() doesn't report WebP support).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(69975); ?> (PHP segfaults when accessing nvarchar(max) defined columns). (CVE-2015-8879)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(69882); ?> (OpenSSL error "key values mismatch" after openssl_pkcs12_read with extra cert).</li>
  <li><?php bugfix(70014); ?> (openssl_random_pseudo_bytes() is not cryptographically secure). (CVE-2015-8867)</li>
</ul></li>
<li>Phar:
<ul>
  <li>Improved fix for bug <?php bugl(69441) ?>.</li>
  <li><?php bugfix(70019); ?> (Files extracted from archive may be placed outside of destination directory). (CVE-2015-6833)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70081); ?> (SoapClient info leak / null pointer dereference via multiple type confusions).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70068); ?> (Dangling pointer in the unserialization of ArrayObject items). (CVE-2015-6832)</li>
  <li><?php bugfix(70166); ?> (Use After Free Vulnerability in unserialize() with SPLArrayObject). (CVE-2015-6831)</li>
  <li><?php bugfix(70168); ?> (Use After Free Vulnerability in unserialize() with SplObjectStorage). (CVE-2015-6831)</li>
  <li><?php bugfix(70169); ?> (Use After Free Vulnerability in unserialize() with SplDoublyLinkedList). (CVE-2015-6831)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(70096); ?> (Repeated iptcembed() adds superfluous FF bytes).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.11"><!-- {{{ 5.6.11 -->
<h3>Version 5.6.11</h3>
<?php release_date('10-Jul-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69768); ?> (escapeshell*() doesn't cater to !).</li>
  <li><?php bugfix(69703); ?> (Use __builtin_clzl on PowerPC).</li>
  <li><?php bugfix(69732); ?> (can induce segmentation fault with basic php code).</li>
  <li><?php bugfix(69642); ?> (Windows 10 reported as Windows 8).</li>
  <li><?php bugfix(69551); ?> (parse_ini_file() and parse_ini_string() segmentation fault).</li>
  <li><?php bugfix(69781); ?> (phpinfo() reports Professional Editions of Windows 7/8/8.1/10 as "Business").</li>
  <li><?php bugfix(69740); ?> (finally in generator (yield) swallows exception in iteration).</li>
  <li><?php bugfix(69835); ?> (phpinfo() does not report many Windows SKUs).</li>
  <li><?php bugfix(69892); ?> (Different arrays compare indentical due to integer key truncation).</li>
  <li><?php bugfix(69874); ?> (Can't set empty additional_headers for mail()), regression from fix to bug <?php bugl(68776); ?>.</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(61221); ?> (imagegammacorrect function loses alpha channel).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(69803); ?> (gmp_random_range() modifies second parameter if GMP number).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(69669); ?> (mysqlnd is vulnerable to BACKRONYM). (CVE-2015-3152)</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(53823); ?> (preg_replace: * qualifier on unicode replace garbles the string).</li>
  <li><?php bugfix(69864); ?> (Segfault in preg_replace_callback).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(69752); ?> (PDOStatement::execute() leaks memory with DML Statements when closeCuror() is u).</li>
  <li><?php bugfix(69362); ?> (PDO-pgsql fails to connect if password contains a leading single quote).</li>
  <li><?php bugfix(69344); ?> (PDO PgSQL Incorrect binding numeric array with gaps).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69958); ?> (Segfault in Phar::convertToData on invalid file). (CVE-2015-5589)</li>
  <li><?php bugfix(69923); ?> (Buffer overflow and stack smashing error in phar_fix_filepath). (CVE-2015-5590)</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Refactored the fix for bug <?php bugl(66084); ?> (simplexml_load_string() mangles empty node name).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(69737); ?> (Segfault when SplMinHeap::compare produces fatal error).</li>
  <li><?php bugfix(67805); ?> (SplFileObject setMaxLineLength).</li>
  <li><?php bugfix(69970); ?> (Use-after-free vulnerability in spl_recursive_it_move_forward_ex()).</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li><?php bugfix(69972); ?> (Use-after-free vulnerability in sqlite3SafetyCheckSickOrOk()).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.10"><!-- {{{ 5.6.10 -->
<h3>Version 5.6.10</h3>
<?php release_date('11-Jun-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66048); ?> (temp. directory is cached during multiple requests).</li>
  <li><?php bugfix(69566); ?> (Conditional jump or move depends on uninitialised value in extension trait).</li>
  <li><?php bugfix(69599); ?> (Strange generator+exception+variadic crash).</li>
  <li><?php bugfix(69628); ?> (complex GLOB_BRACE fails on Windows).</li>
  <li>Fixed POST data processing slowdown due to small input buffer size on Windows.</li>
  <li><?php bugfix(69646); ?> (OS command injection vulnerability in escapeshellarg). (CVE-2015-4642)</li>
  <li><?php bugfix(69719); ?> (Incorrect handling of paths with NULs). (CVE-2015-4598)</li>
</ul></li>
<li>FTP:
<ul>
  <li>Improved fix for bug <?php bugl(69545); ?> (Integer overflow in ftp_genlist() resulting in heap overflow). (CVE-2015-4643)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(69479); ?> (GD fails to build with newer libvpx).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(48147); ?> (iconv with //IGNORE cuts the string).</li>
</ul></li>
<li>Litespeed SAPI:
<ul>
  <li><?php bugfix(68812); ?> (Unchecked return value).</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(68776); ?> (mail() does not have mail header injection prevention for additional headers).</li>
</ul></li>
<li>MCrypt:
<ul>
  <li>Added file descriptor caching to mcrypt_create_iv().</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(69549); ?> (Memory leak with opcache.optimization_level=0xFFFFFFFF).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69680); ?> (phar symlink in binary directory broken).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(69667); ?> (segfault in php_pgsql_meta_data). (CVE-2015-4644)</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li>Upgrade bundled sqlite to 3.8.10.2. (CVE-2015-3414, CVE-2015-3415,
    CVE-2015-3416)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.9"><!-- {{{ 5.6.9 -->
<h3>Version 5.6.9</h3>
<?php release_date('14-May-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69467); ?> (Wrong checked for the interface by using Trait).</li>
  <li><?php bugfix(69420); ?> (Invalid read in zend_std_get_method).</li>
  <li><?php bugfix(60022); ?> ("use statement [...] has no effect" depends on leading backslash).</li>
  <li><?php bugfix(67314); ?> (Segmentation fault in gc_remove_zval_from_buffer).</li>
  <li><?php bugfix(68652); ?> (segmentation fault in destructor).</li>
  <li><?php bugfix(69419); ?> (Returning compatible sub generator produces a warning).</li>
  <li><?php bugfix(69472); ?> (php_sys_readlink ignores misc errors from GetFinalPathNameByHandleA).</li>
  <li><?php bugfix(69364); ?> (PHP Multipart/form-data remote dos Vulnerability). (CVE-2015-4024)</li>
  <li><?php bugfix(69403); ?> (str_repeat() sign mismatch based memory corruption).</li>
  <li><?php bugfix(69418); ?> (CVE-2006-7243 fix regressions in 5.4+). (CVE-2015-4025)</li>
  <li><?php bugfix(69522); ?> (heap buffer overflow in unpack()).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(69545); ?> (Integer overflow in ftp_genlist() resulting in heap overflow). (CVE-2015-4022)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(69354); ?> (Incorrect use of SQLColAttributes with ODBC 3.0).</li>
  <li><?php bugfix(69474); ?> (ODBC: Query with same field name from two tables returns incorrect result).</li>
  <li><?php bugfix(69381); ?> (out of memory with sage odbc driver).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(69402); ?> (Reading empty SSL stream hangs until timeout).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li><?php bugfix(68598); ?> (pcntl_exec() should not allow null char). (CVE-2015-4026)</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgraded pcrelib to 8.37. (CVE-2015-2325, CVE-2015-2326)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69453); ?> (Memory Corruption in phar_parse_tarfile when entry filename starts with null). (CVE-2015-4021)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.8"><!-- {{{ 5.6.8 -->
<h3>Version 5.6.8</h3>
<?php release_date('16-Apr-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66609); ?> (php crashes with __get() and ++ operator in some cases).</li>
  <li><?php bugfix(68021); ?> (get_browser() browser_name_regex returns non-utf-8 characters).</li>
  <li><?php bugfix(68917); ?> (parse_url fails on some partial urls).</li>
  <li><?php bugfix(69134); ?> (Per Directory Values overrides PHP_INI_SYSTEM configuration options).</li>
  <li>Additional fix for bug <?php bugl(69152); ?> (Type confusion vulnerability in exception::getTraceAsString).</li>
  <li><?php bugfix(69210); ?> (serialize function return corrupted data when sleep has non-string values).</li>
  <li><?php bugfix(69212); ?> (Leaking VIA_HANDLER func when exception thrown in __call/... arg passing).</li>
  <li><?php bugfix(69221); ?> (Segmentation fault when using a generator in combination with an Iterator).</li>
  <li><?php bugfix(69337); ?> (php_stream_url_wrap_http_ex() type-confusion vulnerability).</li>
  <li><?php bugfix(69353); ?> (Missing null byte checks for paths in various PHP extensions). (CVE-2015-3411, CVE-2015-3412)</li>
</ul></li>
<li>Apache2handler:
<ul>
  <li><?php bugfix(69218); ?> (potential remote code execution with apache 2.4 apache2handler). (CVE-2015-3330)</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php implemented(69278); ?> (HTTP2 support).</li>
  <li><?php bugfix(68739); ?> (Missing break / control flow).</li>
  <li><?php bugfix(69316); ?> (Use-after-free in php_curl related to CURLOPT_FILE/_INFILE/_WRITEHEADER).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(69336); ?> (Issues with "last day of &lt;monthname&gt;").</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(65406); ?> (Enchant broker plugins are in the wrong place in windows builds).</li>
</ul></li>
<li>Ereg:
<ul>
  <li><?php bugfix(68740); ?> (NULL Pointer Dereference).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(68819); ?> (Fileinfo on specific file causes spurious OOM and/or segfault). (CVE-2015-4604, CVE-2015-4605)</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(69202); ?> (FILTER_FLAG_STRIP_BACKTICK ignored unless other flags are used).</li>
  <li><?php bugfix(69203); ?> (FILTER_FLAG_STRIP_HIGH doesn't strip ASCII 127).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(68846); ?> (False detection of CJK Unified Ideographs Extension E).</li>
</ul></li>
<li>OPCache:
<ul>
  <li><?php bugfix(69297); ?> (function_exists strange behavior with OPCache on disabled function).</li>
  <li><?php bugfix(69281); ?> (opcache_is_script_cached no longer works).</li>
  <li><?php bugfix(68677); ?> (Use After Free). (CVE-2015-1351)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(68853); ?>, <?php bugl(65137); ?> (Buffered crypto stream data breaks IO polling in stream_select() contexts).</li>
  <li><?php bugfix(69197); ?> (openssl_pkcs7_sign handles default value incorrectly).</li>
  <li><?php bugfix(69215); ?> (Crypto servers should send client CA list).</li>
  <li>Add a check for RAND_egd to allow compiling against LibreSSL.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(64343); ?> (PharData::extractTo fails for tarball created by BSD tar).</li>
  <li><?php bugfix(64931); ?> (phar_add_file is too restrictive on filename).</li>
  <li><?php bugfix(65467); ?> (Call to undefined method cli_arg_typ_string).</li>
  <li><?php bugfix(67761); ?> (Phar::mapPhar fails for Phars inside a path containing ".tar").</li>
  <li><?php bugfix(69324); ?> (Buffer Over-read in unserialize when parsing Phar). (CVE-2015-2783, CVE-2015-3307)</li>
  <li><?php bugfix(69441); ?> (Buffer Overflow when parsing tar/zip/phar in phar_set_inode). (CVE-2015-3329)</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(68741); ?> (Null pointer dereference). (CVE-2015-1352)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(69152); ?> (Type Confusion Infoleak Vulnerability in unserialize() with SoapFault). (CVE-2015-4599)</li>
  <li><?php bugfix(69293); ?> (NEW segfault when using SoapClient::__setSoapHeader (bisected, regression)).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(69227); ?> (Use after free in zval_scan caused by spl_object_storage_get_gc).</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li><?php bugfix(68760); ?> (SQLITE segfaults if custom collator throws an exception).</li>
  <li><?php bugfix(69287); ?> (Upgrade bundled libsqlite to 3.8.8.3).</li>
  <li><?php bugfix(66550); ?> (SQLite prepared statement use-after-free).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.7"><!-- {{{ 5.6.7 -->
<h3>Version 5.6.7</h3>
<?php release_date('19-Mar-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69174); ?> (leaks when unused inner class use traits precedence).</li>
  <li><?php bugfix(69139); ?> (Crash in gc_zval_possible_root on unserialize).</li>
  <li><?php bugfix(69121); ?> (Segfault in get_current_user when script owner is not in passwd with ZTS build).</li>
  <li><?php bugfix(65593); ?> (Segfault when calling ob_start from output buffering callback).</li>
  <li><?php bugfix(68986); ?> (pointer returned by php_stream_fopen_temporary_file not validated in memory.c).</li>
  <li><?php bugfix(68166); ?> (Exception with invalid character causes segv).</li>
  <li><?php bugfix(69141); ?> (Missing arguments in reflection info for some builtin functions).</li>
  <li><?php bugfix(68976); ?> (Use After Free Vulnerability in unserialize()). (CVE-2015-2787)</li>
  <li><?php bugfix(69134); ?> (Per Directory Values overrides PHP_INI_SYSTEM configuration options).</li>
  <li><?php bugfix(69207); ?> (move_uploaded_file allows nulls in path). (CVE-2015-2348)</li>
</ul></li>
<li>CGI:
<ul>
  <li><?php bugfix(69015); ?> (php-cgi's getopt does not see $argv).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(67741); ?> (auto_prepend_file messes up __LINE__).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(69088); ?> (PHP_MINIT_FUNCTION does not fully initialize cURL on Win32).</li>
  <li>Add CURLPROXY_SOCKS4A and CURLPROXY_SOCKS5_HOSTNAME constants if supported by libcurl.</li>
</ul></li>
<li>Ereg:
<ul>
  <li><?php bugfix(69248); ?> (heap overflow vulnerability in regcomp.c). (CVE-2015-2305)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(68822); ?> (request time is reset too early).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(68964); ?> (Allowed memory size exhausted with odbc_exec).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(69159); ?> (Opcache causes problem when passing a variable variable to a function).</li>
  <li><?php bugfix(69125); ?> (Array numeric string as key).</li>
  <li><?php bugfix(69038); ?> (switch(SOMECONSTANT) misbehaves).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(68912); ?> (Segmentation fault at openssl_spki_new).</li>
  <li><?php bugfix(61285); ?>, <?php bugl(68329); ?>, <?php bugl(68046); ?>, <?php bugl(41631); ?> (encrypted streams don't observe socket timeouts).</li>
  <li><?php bugfix(68920); ?> (use strict peer_fingerprint input checks) (Daniel Lowrey)</li>
  <li><?php bugfix(68879); ?> (IP Address fields in subjectAltNames not used) (Daniel Lowrey)</li>
  <li><?php bugfix(68265); ?> (SAN match fails with trailing DNS dot) (Daniel Lowrey)</li>
  <li><?php bugfix(67403); ?> (Add signatureType to openssl_x509_parse) (Daniel Lowrey)</li>
  <li><?php bugfix(69195); ?> (Inconsistent stream crypto values across versions) (Daniel Lowrey)</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(68638); ?> (pg_update() fails to store infinite values).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(69054); ?> (Null dereference in readline_(read|write)_history() without parameters).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(69085); ?> (SoapClient's __call() type confusion through unserialize()). (CVE-2015-4147, CVE-2015-4148)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(69108); ?> ("Segmentation fault" when (de)serializing SplObjectStorage).</li>
  <li><?php bugfix(68557); ?> (RecursiveDirectoryIterator::seek(0) broken after calling getChildren()).</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(69253); ?> (ZIP Integer Overflow leads to writing past heap boundary). (CVE-2015-2331)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.6"><!-- {{{ 5.6.6 -->
<h3>Version 5.6.6</h3>
<?php release_date('19-Feb-2015'); ?>
<ul><li>Core:
<ul>
  <li>Removed support for multi-line headers, as they are deprecated by RFC 7230.</li>
  <li><?php bugfix(67068); ?> (getClosure returns somethings that's not a closure).</li>
  <li><?php bugfix(68942); ?> (Use after free vulnerability in unserialize() with DateTimeZone). (CVE-2015-0273)</li>
  <li><?php bugfix(68925); ?> (Mitigation for CVE-2015-0235 – GHOST: glibc gethostbyname buffer overflow).</li>
  <li><?php bugfix(67988); ?> (htmlspecialchars() does not respect default_charset specified by ini_set).</li>
  <li>Added NULL byte protection to exec, system and passthru.</li>
</ul></li>
<li>Dba:
<ul>
  <li><?php bugfix(68711); ?> (useless comparisons).</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(68552); ?> (heap buffer overflow in enchant_broker_request_dict()). (CVE-2014-9705)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(68827); ?> (Double free with disabled ZMM).</li>
  <li><?php bugfix(67647); ?> (Bundled libmagic 5.17 does not detect quicktime files correctly).</li>
  <li><?php bugfix(68731); ?> (finfo_buffer doesn't extract the correct mime with some gifs).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(66479); ?> (Wrong response to FCGI_GET_VALUES).</li>
  <li><?php bugfix(68571); ?> (core dump when webserver close the socket).</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(50224); ?> (json_encode() does not always encode a float as a float) by adding JSON_PRESERVE_ZERO_FRACTION.</li>
</ul></li>
<li>LIBXML:
<ul>
  <li><?php bugfix(64938); ?> (libxml_disable_entity_loader setting is shared between threads). (CVE-2015-8866)</li>
</ul></li>
<li>Mysqli:
<ul>
  <li><?php bugfix(68114); ?> (linker error on some OS X machines with fixed width decimal support).</li>
  <li><?php bugfix(68657); ?> (Reading 4 byte floats with Mysqli and libmysqlclient has rounding errors).</li>
</ul></li>
<li>Opcache:
<ul>
  <li>Fixed bug with try blocks being removed when extended_info opcode generation is turned on.</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(68750); ?> (PDOMysql with mysqlnd does not allow the usage of named pipes).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(68901); ?> (use after free). (CVE-2015-2301)</li>
</ul></li>
<li>Pgsql:
<ul>
  <li><?php bugfix(65199); ?> (pg_copy_from() modifies input array variable).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(68941); ?> (mod_files.sh is a bash-script).</li>
  <li><?php bugfix(66623); ?> (no EINTR check on flock).</li>
  <li><?php bugfix(68063); ?> (Empty session IDs do still start sessions).</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li><?php bugfix(68260); ?> (SQLite3Result::fetchArray declares wrong required_num_args).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(65272); ?> (flock() out parameter not set correctly in windows).</li>
  <li><?php bugfix(69033); ?> (Request may get env. variables from previous requests if PHP works as FastCGI).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug which caused call after final close on streams filter.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.5"><!-- {{{ 5.6.5 -->
<h3>Version 5.6.5</h3>
<?php release_date('22-Jan-2015'); ?>
<ul><li>Core:
<ul>
  <li>Upgraded crypt_blowfish to version 1.3.</li>
  <li><?php bugfix(60704); ?> (unlink() bug with some files path).</li>
  <li><?php bugfix(65419); ?> (Inside trait, self::class != __CLASS__).</li>
  <li><?php bugfix(68536); ?> (pack for 64bits integer is broken on bigendian).</li>
  <li><?php bugfix(55541); ?> (errors spawn MessageBox, which blocks test automation).</li>
  <li><?php bugfix(68297); ?> (Application Popup provides too few information).</li>
  <li><?php bugfix(65769); ?> (localeconv() broken in TS builds).</li>
  <li><?php bugfix(65230); ?> (setting locale randomly broken).</li>
  <li><?php bugfix(66764); ?> (configure doesn't define EXPANDED_DATADIR / PHP_DATADIR correctly).</li>
  <li><?php bugfix(68583); ?> (Crash in timeout thread).</li>
  <li><?php bugfix(65576); ?> (Constructor from trait conflicts with inherited constructor).</li>
  <li><?php bugfix(68676); ?> (Explicit Double Free). (CVE-2014-9425)</li>
  <li><?php bugfix(68710); ?> (Use After Free Vulnerability in PHP's unserialize()). (CVE-2015-0231)</li>
</ul></li>
<li>CGI:
<ul>
  <li><?php bugfix(68618); ?> (out of bounds read crashes php-cgi). (CVE-2014-9427)</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(68745); ?> (Invalid HTTP requests make web server segfault).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(67643); ?> (curl_multi_getcontent returns '' when CURLOPT_RETURNTRANSFER isn't set).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php implemented(68268); ?> (DatePeriod: Getter for start date, end date and interval).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(68799); ?> (Free called on uninitialized pointer). (CVE-2015-0232)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(68398); ?> (msooxml matches too many archives).</li>
  <li><?php bugfix(68665); ?> (invalid free in libmagic).</li>
  <li><?php bugfix(68671); ?> (incorrect expression in libmagic).</li>
  <li>Removed readelf.c and related code from libmagic sources.</li>
  <li><?php bugfix(68735); ?> (fileinfo out-of-bounds memory access). (CVE-2014-9652)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php implemented(68526); ?> (Implement POSIX Access Control List for UDS).</li>
  <li><?php bugfix(68751); ?> (listen.allowed_clients is broken).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(68601); ?> (buffer read overflow in gd_gif_in.c). (CVE-2014-9709)</li>
  <li><?php implemented(68656); ?> (Report gd library version).</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(68504); ?> (--with-libmbfl configure option not present on Windows).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(68644); ?> (strlen incorrect : mbstring + func_overload=2 +UTF-8 + Opcache).</li>
  <li><?php bugfix(67111); ?> (Memory leak when using "continue 2" inside two foreach loops).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Improved handling of OPENSSL_KEYTYPE_EC keys.</li>
</ul></li>
<li>pcntl:
<ul>
  <li><?php bugfix(60509); ?> (pcntl_signal doesn't decrease ref-count of old handler when setting SIG_DFL).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(66679); ?> (Alignment Bug in PCRE 8.34 upstream).</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(68697); ?> (lo_export return -1 on failure).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(68371); ?> (PDO#getAttribute() cannot be called with platform-specifi attribute names).</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(68424); ?> (Add new PDO mysql connection attr to control multi statements option).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(66405); ?> (RecursiveDirectoryIterator::CURRENT_AS_PATHNAME breaks the RecursiveIterator).</li>
  <li><?php bugfix(68479); ?> (Added escape parameter to SplFileObject::fputcsv).</li>
</ul></li>
<li>SQLite:
<ul>
  <li><?php bugfix(68120); ?> (Update bundled libsqlite to 3.8.7.2).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(68532); ?> (convert.base64-encode omits padding bytes).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.4"><!-- {{{ 5.6.4 -->
<h3>Version 5.6.4</h3>
<?php release_date('18-Dec-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(68091); ?> (Some Zend headers lack appropriate extern "C" blocks).</li>
  <li><?php bugfix(68104); ?> (Segfault while pre-evaluating a disabled function).</li>
  <li><?php bugfix(68185); ?> ("Inconsistent insteadof definition."- incorrectly triggered).</li>
  <li><?php bugfix(68355); ?> (Inconsistency in example php.ini comments).</li>
  <li><?php bugfix(68370); ?> ("unset($this)" can make the program crash).</li>
  <li><?php bugfix(68422); ?> (Incorrect argument reflection info for array_multisort()).</li>
  <li><?php bugfix(68545); ?> (NULL pointer dereference in unserialize.c).</li>
  <li><?php bugfix(68446); ?> (Array constant not accepted for array parameter default).</li>
  <li><?php bugfix(68594); ?> (Use after free vulnerability in unserialize()). (CVE-2014-8142)</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed day_of_week function as it could sometimes return negative values internally.</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(68381); ?> (fpm_unix_init_main ignores log_level).</li>
  <li><?php bugfix(68420); ?> (listen=9000 listens to ipv6 localhost instead of all addresses).</li>
  <li><?php bugfix(68421); ?> (access.format='%R' doesn't log ipv6 address).</li>
  <li><?php bugfix(68423); ?> (PHP-FPM will no longer load all pools).</li>
  <li><?php bugfix(68428); ?> (listen.allowed_clients is IPv4 only).</li>
  <li><?php bugfix(68452); ?> (php-fpm man page is oudated).</li>
  <li><?php implemented(68458); ?> (Change pm.start_servers default warning to notice).</li>
  <li><?php bugfix(68463); ?> (listen.allowed_clients can silently result in no allowed access).</li>
  <li><?php implemented(68391); ?> (php-fpm conf files loading order).</li>
  <li><?php bugfix(68478); ?> (access.log don't use prefix).</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li>Fixed possible read after end of buffer and use after free.</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(68419); ?> (build error with gmp 4.1).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(67462); ?> (PDO_PGSQL::beginTransaction() wrongly throws exception when not in transaction).</li>
  <li><?php bugfix(68351); ?> (PDO::PARAM_BOOL and ATTR_EMULATE_PREPARES misbehaving).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(68331); ?> (Session custom storage callable functions not being called).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(68361); ?> (Segmentation fault on SoapClient::__getTypes).</li>
</ul></li>
<li>zlib:
<ul>
  <li><?php bugfix(53829); ?> (Compiling PHP with large file support will replace function gzopen by gzopen64).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.3"><!-- {{{ 5.6.3 -->
<h3>Version 5.6.3</h3>
<?php release_date('13-Nov-2014'); ?>
<ul><li>Core:
<ul>
  <li>Implemented 64-bit format codes for pack() and unpack().</li>
  <li><?php bugfix(51800); ?> (proc_open on Windows hangs forever).</li>
  <li><?php bugfix(67633); ?> (A foreach on an array returned from a function not doing copy-on-write).</li>
  <li><?php bugfix(67739); ?> (Windows 8.1/Server 2012 R2 OS build number reported as 6.2 (instead of 6.3)).</li>
  <li><?php bugfix(67949); ?> (DOMNodeList elements should be accessible through array notation).</li>
  <li><?php bugfix(68095); ?> (AddressSanitizer reports a heap buffer overflow in php_getopt()).</li>
  <li><?php bugfix(68118); ?> ($a-&gt;foo .= 'test'; can leave $a-&gt;foo undefined).</li>
  <li><?php bugfix(68129); ?> (parse_url() - incomplete support for empty usernames and passwords).</li>
  <li><?php bugfix(68365); ?> (zend_mm_heap corrupted after memory overflow in zend_hash_copy).</li>
</ul></li>
<li>CURL:
<ul>
  <li>Add CURL_SSLVERSION_TLSv1_0, CURL_SSLVERSION_TLSv1_1, and CURL_SSLVERSION_TLSv1_2 constants if supported by libcurl.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66242); ?> (libmagic: don't assume char is signed).</li>
  <li><?php bugfix(68224); ?> (buffer-overflow in libmagic/readcdf.c caught by AddressSanitizer).</li>
  <li><?php bugfix(68283); ?> (fileinfo: out-of-bounds read in elf note headers). (CVE-2014-3710)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(65641); ?> (PHP-FPM incorrectly defines the SCRIPT_NAME variable when using Apache, mod_proxy-fcgi and ProxyPass).</li>
  <li><?php implemented(55508); ?> (listen and listen.allowed_clients should take IPv6 addresses).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(65171); ?> (imagescale() fails without height param).</li>
</ul></li>
<li>GMP:
<ul>
  <li>Implemented gmp_random_range() and gmp_random_bits().</li>
  <li><?php bugfix(63595); ?> (GMP memory management conflicts with other libraries using GMP).</li>
</ul></li>
<li>Mysqli:
<ul>
  <li><?php bugfix(68114); ?> (linker error on some OS X machines with fixed width decimal support).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(68087); ?> (ODBC not correctly reading DATE column when preceded by a VARCHAR column).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(68074); ?> (Allow to use system cipher list instead of hardcoded value).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(68199); ?> (PDO::pgsqlGetNotify doesn't support NOTIFY payloads).</li>
  <li><?php bugfix(66584); ?> (Segmentation fault on statement deallocation).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(68103); ?> (Duplicate entry in Reflection for class alias).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(68128); ?> (Regression in RecursiveRegexIterator).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.2"><!-- {{{ 5.6.2 -->
<h3>Version 5.6.2</h3>
<?php release_date('16-Oct-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(68044); ?> (Integer overflow in unserialize() (32-bits only)). (CVE-2014-3669)</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(68089); ?> (NULL byte injection - cURL lib).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(68113); ?> (Heap corruption in exif_thumbnail()). (CVE-2014-3670)</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(68027); ?> (Global buffer overflow in mkgmtime() function). (CVE-2014-3668)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.1"><!-- {{{ 5.6.1 -->
<h3>Version 5.6.1</h3>
<?php release_date('02-Oct-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php implemented(38409); ?> (parse_ini_file() loses the type of booleans).</li>
  <li><?php bugfix(65463); ?> (SIGSEGV during zend_shutdown()).</li>
  <li><?php bugfix(66036); ?> (Crash on SIGTERM in apache process).</li>
  <li><?php bugfix(67878); ?> (program_prefix not honoured in man pages).</li>
  <li><?php bugfix(67938); ?> (Segfault when extending interface method with variadic).</li>
  <li><?php bugfix(67985); ?> (Incorrect last used array index copied to new array after unset).</li>
  <li><?php bugfix(68088); ?> (New Posthandler Potential Illegal efree() vulnerability). (CVE-2014-3622)</li>
</ul></li>
<li>DOM:
<ul>
  <li>Made DOMNode::textContent writeable.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(67731); ?> (finfo::file() returns invalid mime type for binary files).</li>
</ul></li>
<li>GD:
<ul>
  <li>Made fontFetch's path parser thread-safe.</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(67917); ?> (Using GMP objects with overloaded operators can cause memory exhaustion).</li>
  <li><?php bugfix(50175); ?> (gmp_init() results 0 on given base and number starting with 0x or 0b).</li>
  <li>Implemented gmp_import() and gmp_export().</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(67839); ?> (mysqli does not handle 4-byte floats correctly).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(67850); ?> (extension won't build if openssl compiled without SSLv3).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php githubissue('krakjoe/phpdbg', 111); ?> (compile error without ZEND_SIGNALS).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(67955); ?> (SoapClient prepends 0-byte to cookie names).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(67972); ?> (SessionHandler Invalid memory read create_sid()).</li>
</ul></li>
<li>Sysvsem:
<ul>
  <li><?php implemented(67990); ?> (Add optional nowait argument to sem_acquire).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.6.0"><!-- {{{ 5.6.0 -->
<h3>Version 5.6.0</h3>
<?php release_date('28-Aug-2014'); ?>
<ul>
<li>General improvements:
<ul>
 <li>Added constant scalar expressions syntax.</li>
 <li>Added dedicated syntax for variadic functions.</li>
 <li>Added support for argument unpacking to complement the variadic syntax.</li>
 <li>Added an exponentiation operator (**).</li>
 <li>Added phpdbg SAPI.</li>
 <li>Added unified default encoding.</li>
 <li>The php://input stream is now re-usable and can be used concurrently with enable_post_data_reading=0.</li>
 <li>Added use function and use const..</li>
 <li>Added a function for timing attack safe string comparison.</li>
 <li>Added the __debugInfo() magic method to allow userland classes to implement the get_debug_info API previously available only to extensions.</li>
 <li>Added gost-crypto (CryptoPro S-box) hash algorithm.</li>
 <li>Stream wrappers verify peer certificates and host names by default in encrypted client streams.</li>
 <li>Uploads equal or greater than 2GB in size are now accepted.</li>
</ul>
</li>
<li>Core:
<ul>
  <li><?php bugfix(67693); ?> (incorrect push to the empty array).</li>
  <li>Removed inconsistency regarding behaviour of array in constants at run-time.</li>
  <li><?php bugfix(67497); ?> (eval with parse error causes segmentation fault in generator).</li>
  <li><?php bugfix(67151); ?> (strtr with empty array crashes).</li>
  <li><?php bugfix(67407); ?> (Windows 8.1/Server 2012 R2 reported as Windows 8/Server 2012).</li>
  <li><?php bugfix(66608); ?> (Incorrect behavior with nested "finally" blocks).</li>
  <li><?php implemented(34407); ?> (ucwords and Title Case).</li>
  <li><?php bugfix(67091); ?> (make install fails to install libphp5.so on FreeBSD 10.0).</li>
  <li><?php bugfix(67368); ?> (Memory leak with immediately dereferenced array in class constant).</li>
  <li><?php bugfix(67468); ?> (Segfault in highlight_file()/highlight_string()).</li>
  <li><?php bugfix(67498); ?> (phpinfo() Type Confusion Information Leak Vulnerability). (CVE-2014-4721)</li>
  <li><?php bugfix(67551); ?> (php://input temp file will be located in sys_temp_dir instead of upload_tmp_dir).</li>
  <li><?php bugfix(67169); ?> (array_splice all elements, then []= gives wrong index).</li>
  <li><?php bugfix(67198); ?> (php://input regression).</li>
  <li><?php bugfix(67247); ?> (spl_fixedarray_resize integer overflow).</li>
  <li><?php bugfix(67250); ?> (iptcparse out-of-bounds read).</li>
  <li><?php bugfix(67252); ?> (convert_uudecode out-of-bounds read).</li>
  <li><?php bugfix(67249); ?> (printf out-of-bounds read).</li>
  <li><?php implemented(64744); ?> (Differentiate between member function call on a null and non-null, non-objects).</li>
  <li><?php bugfix(67436); ?> (Autoloader isn't called if two method definitions don't match).</li>
  <li><?php bugfix(66622); ?> (Closures do not correctly capture the late bound class (static::) in some cases).</li>
  <li><?php bugfix(67390); ?> (insecure temporary file use in the configure script). (CVE-2014-3981)</li>
  <li><?php bugfix(67392); ?> (dtrace breaks argument unpack).</li>
  <li><?php bugfix(67428); ?> (header('Location: foo') will override a 308-399 response code).</li>
  <li><?php bugfix(67433); ?> (SIGSEGV when using count() on an object implementing Countable).</li>
  <li><?php bugfix(67399); ?> (putenv with empty variable may lead to crash).</li>
  <li>Expose get_debug_info class hook as __debugInfo() magic method.</li>
  <li>Implemented unified default encoding (RFC: https://wiki.php.net/rfc/default_encoding).</li>
  <li>Added T_POW (**) operator (RFC: https://wiki.php.net/rfc/pow-operator).</li>
  <li>Improved IS_VAR operands fetching.</li>
  <li>Improved empty string handling. Now ZE uses an interned string instead of allocation new empty string each time.</li>
  <li>Implemented internal operator overloading (RFC: https://wiki.php.net/rfc/operator_overloading_gmp).</li>
  <li>Made calls from incompatible context issue an E_DEPRECATED warning instead of E_STRICT (phase 1 of RFC: https://wiki.php.net/rfc/incompat_ctx).</li>
  <li>Uploads equal or greater than 2GB in size are now accepted.</li>
  <li>Reduced POST data memory usage by 200-300%. Changed INI setting always_populate_raw_post_data to throw a deprecation warning when enabling and to accept -1 for never populating the $HTTP_RAW_POST_DATA global variable, which will be the default in future PHP versions.</li>
  <li>Implemented dedicated syntax for variadic functions (RFC: https://wiki.php.net/rfc/variadics).</li>
  <li><?php bugfix(50333); ?> Improving multi-threaded scalability by using emalloc/efree/estrdup (Anatol, Dmitry)</li>
  <li>Implemented constant scalar expressions (with support for constants) (RFC: https://wiki.php.net/rfc/const_scalar_exprs).</li>
  <li><?php bugfix(65784); ?> (Segfault with finally).</li>
  <li><?php bugfix(66509); ?> (copy() arginfo has changed starting from 5.4).</li>
  <li>Allow zero length comparison in substr_compare() (Tjerk)</li>
  <li><?php bugfix(60602); ?> (proc_open() changes environment array) (Tjerk)</li>
  <li><?php bugfix(61019); ?> (Out of memory on command stream_get_contents).</li>
  <li><?php bugfix(64330); ?> (stream_socket_server() creates wrong Abstract Namespace UNIX sockets).</li>
  <li><?php bugfix(66182); ?> (exit in stream filter produces segfault).</li>
  <li><?php bugfix(66736); ?> (fpassthru broken).</li>
  <li><?php bugfix(66822); ?> (Cannot use T_POW in const expression) (Tjerk)</li>
  <li><?php bugfix(67043); ?> (substr_compare broke by previous change) (Tjerk)</li>
  <li><?php bugfix(65701); ?> (copy() doesn't work when destination filename is created by tempnam()).</li>
  <li><?php bugfix(66015); ?> (Unexpected array indexing in class's static property).</li>
  <li>Added (constant) string/array dereferencing to static scalar expressions to complete the set; now possible thanks to <?php bugl(66015); ?> being fixed.</li>
  <li><?php bugfix(66568); ?> (Update reflection information for unserialize() function).</li>
  <li><?php bugfix(66660); ?> (Composer.phar install/update fails).</li>
  <li><?php bugfix(67024); ?> (getimagesize should recognize BMP files with negative height).</li>
  <li><?php bugfix(67064); ?>  (Countable interface prevents using 2nd parameter ($mode) of count() function).</li>
  <li><?php bugfix(67072); ?> (Echoing unserialized "SplFileObject" crash).</li>
  <li><?php bugfix(67033); ?> (Remove reference to Windows 95).</li>
</ul></li>
<li>Apache2 Handler SAPI:
<ul>
  <li>Fixed Apache log issue caused by APR's lack of support for %zu (APR issue https://issues.apache.org/bugzilla/show_bug.cgi?id=56120).</li>
</ul></li>
<li>CLI server:
<ul>
  <li>Added some MIME types to the CLI web server.</li>
  <li><?php bugfix(67079); ?> (Missing MIME types for XML/XSL files).</li>
  <li><?php bugfix(66830); ?> (Empty header causes PHP built-in web server to hang).</li>
  <li><?php bugfix(67594); ?> (Unable to access to apache_request_headers() elements).</li>
  <li><?php implemented(67429); ?> (CLI server is missing some new HTTP response codes).</li>
  <li><?php bugfix(67406); ?> (built-in web-server segfaults on startup).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(41577); ?> (DOTNET is successful once per server run) (Aidas Kasparas)</li>
  <li>Fixed missing type checks in com_event_sink (Yussuf Khalil, Stas).</li>
  <li><?php bugfix(66431); ?> (Special Character via COM Interface (CP_UTF8)).</li>
</ul></li>
<li>Curl:
<ul>
  <li><?php implemented(65646); ?> (re-enable CURLOPT_FOLLOWLOCATION with open_basedir or safe_mode).</li>
  <li>Check for openssl.cafile ini directive when loading CA certs.</li>
  <li>Remove cURL close policy related constants as these have no effect and are no longer used in libcurl.</li>
  <li><?php bugfix(66109); ?> (Can't reset CURLOPT_CUSTOMREQUEST to default behaviour) (Tjerk)</li>
  <li>Fix compilation on libcurl versions between 7.10.5 and 7.12.2, inclusive.</li>
  <li><?php bugfix(64247); ?> (CURLOPT_INFILE doesn't allow reset).</li>
  <li><?php bugfix(66562); ?> (curl_exec returns differently than curl_multi_getcontent).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66060); ?> (Heap buffer over-read in DateInterval). (CVE-2013-6712)</li>
  <li><?php bugfix(66091); ?> (memory leaks in DateTime constructor) (Tjerk).</li>
  <li><?php bugfix(67308); ?> (Serialize of DateTime truncates fractions of second).</li>
  <li>Fixed regression in fix for <?php bugl(67118); ?> (constructor can't be called twice).</li>
  <li><?php bugfix(67251); ?> (date_parse_from_format out-of-bounds read).</li>
  <li><?php bugfix(67253); ?> (timelib_meridian_with_check out-of-bounds read).</li>
  <li>Added DateTimeImmutable::createFromMutable to create a DateTimeImmutable object from an existing DateTime (mutable) object (Derick)</li>
  <li><?php bugfix(66721); ?> (__wakeup of DateTime segfaults when invalid object data is supplied).</li>
  <li><?php bugfix(67118); ?> (DateTime constructor crash with invalid data).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(67081); ?> (DOMDocumentType-&gt;internalSubset returns entire DOCTYPE tag, not only the subset).</li>
</ul></li>
<li>Embed:
<ul>
  <li><?php bugfix(65715); ?> (php5embed.lib isn't provided anymore). (Anatol).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(67716); ?> (Segfault in cdf.c). (CVE-2014-3587)</li>
  <li><?php bugfix(67705); ?> (extensive backtracking in rule regular expression). (CVE-2014-3538)</li>
  <li><?php bugfix(67327); ?> (fileinfo: CDF infinite loop in nelements DoS). (CVE-2014-0238)</li>
  <li><?php bugfix(67328); ?> (fileinfo: fileinfo: numerous file_printf calls resulting in performance degradation). (CVE-2014-0237)</li>
  <li><?php bugfix(67326); ?> (fileinfo: cdf_read_short_sector insufficient boundary check). (CVE-2014-0207)</li>
  <li><?php bugfix(67329); ?> (fileinfo: NULL pointer deference flaw by processing certain CDF files). (CVE-2014-0236)</li>
  <li><?php bugfix(67410); ?> (fileinfo: mconvert incorrect handling of truncated pascal string size). (CVE-2014-3478)</li>
  <li><?php bugfix(67411); ?> (fileinfo: cdf_check_stream_offset insufficient boundary check). (CVE-2014-3479)</li>
  <li><?php bugfix(67412); ?> (fileinfo: cdf_count_chain insufficient boundary check). (CVE-2014-3480)</li>
  <li><?php bugfix(67413); ?> (fileinfo: cdf_read_property_info insufficient boundary check). (CVE-2014-3487)</li>
  <li>Upgraded to libmagic-5.17 (Anatol)</li>
  <li><?php bugfix(66731); ?> (file: infinite recursion). (CVE-2014-1943)</li>
  <li><?php bugfix(66820); ?> (out-of-bounds memory access in fileinfo). (CVE-2014-2270)</li>
  <li><?php bugfix(66946); ?> (fileinfo: extensive backtracking in awk rule regular expression). (CVE-2013-7345)</li>
  <li><?php bugfix(66987); ?> (Memory corruption in fileinfo ext / bigendian).</li>
  <li><?php bugfix(66907); ?> (Solaris 10 is missing strcasestr and needs substitute).</li>
  <li><?php bugfix(66307); ?> (Fileinfo crashes with powerpoint files).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67606); ?> (revised fix 67541, broke mod_fastcgi BC).</li>
  <li><?php bugfix(67530); ?> (error_log=syslog ignored).</li>
  <li><?php bugfix(67635); ?> (php links to systemd libraries without using pkg-config).</li>
  <li><?php bugfix(67531); ?> (syslog cannot be set in pool configuration).</li>
  <li><?php bugfix(67541); ?> (Fix Apache 2.4.10+ SetHandler proxy:fcgi:// incompatibilities).</li>
  <li>Included apparmor support in fpm (RFC: https://wiki.php.net/rfc/fpm_change_hat).</li>
  <li>Added clear_env configuration directive to disable clearenv() call.</li>
  <li><?php bugfix(66482); ?> (unknown entry 'priority' in php-fpm.conf).</li>
  <li><?php bugfix(66908); ?> (php-fpm reload leaks epoll_create() file descriptor).</li>
  <li><?php bugfix(67060); ?> (sapi/fpm: possible privilege escalation due to insecure default configuration). (CVE-2014-0185)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(67730); ?> (Null byte injection possible with imagexxx functions). (CVE-2014-5120)</li>
  <li><?php bugfix(66901); ?> (php-gd 'c_color' NULL pointer dereference). (CVE-2014-2497)</li>
  <li><?php bugfix(67248); ?> (imageaffinematrixget missing check of parameters).</li>
  <li>Fixed imagettftext to load the correct character map rather than the last one.</li>
  <li><?php bugfix(66356); ?> (Heap Overflow Vulnerability in imagecrop()). (CVE-2013-7226)</li>
  <li><?php bugfix(66815); ?> (imagecrop(): insufficient fix for NULL defer). (CVE-2013-7327)</li>
  <li><?php bugfix(66869); ?> (Invalid 2nd argument crashes imageaffinematrixget).</li>
  <li><?php bugfix(66887); ?> (imagescale - poor quality of scaled image).</li>
  <li><?php bugfix(66890); ?> (imagescale segfault).</li>
  <li><?php bugfix(66893); ?> (imagescale ignore method argument).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(66872); ?> (invalid argument crashes gmp_testbit) (Pierre)</li>
  <li>Fixed crashes in serialize/unserialize.</li>
  <li>Moved GMP to use object as the underlying structure and implemented various improvements based on this.</li>
  <li>Added gmp_root() and gmp_rootrem() functions for calculating nth roots.</li>
</ul></li>
<li>Hash:
<ul>
  <li>Added gost-crypto (CryptoPro S-box) GOST hash algo.</li>
  <li><?php bugfix(66698); ?> (Missing FNV1a32 and FNV1a64 hash functions). (Michael M Slusarz).</li>
  <li>Implemented timing attack safe string comparison function (RFC: https://wiki.php.net/rfc/timing_attack).</li>
  <li>hash_pbkdf2() now works correctly if the $length argument is not specified.</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(66873); ?> (A reproductible crash in UConverter when given invalid encoding) (Stas)</li>
  <li><?php bugfix(66921); ?> (Wrong argument type hint for function intltz_from_date_time_zone).</li>
  <li><?php bugfix(67052); ?> (NumberFormatter::parse() resets LC_NUMERIC setting).</li>
  <li><?php bugfix(67349); ?> (Locale::parseLocale Double Free).</li>
  <li><?php bugfix(67397); ?> (Buffer overflow in locale_get_display_name and uloc_getDisplayName (libicu 4.8.1)).</li>
</ul></li>
<li>JSON:
<ul>
  <li>Fixed case part of bug <?php bugl(64874); ?> ("json_decode handles whitespace and case-sensitivity incorrectly")</li>
  <li><?php bugfix(65753); ?> (JsonSerializeable couldn't implement on module extension) (chobieeee@php.net)</li>
  <li><?php bugfix(66021); ?> (Blank line inside empty array/object when JSON_PRETTY_PRINT is set).</li>
</ul></li>
<li>ldap:
<ul>
  <li>Added new function ldap_modify_batch().</li>
  <li>Fixed issue with null bytes in LDAP bindings.</li>
</ul></li>
<li>litespeed:
<ul>
  <li><?php bugfix(63228); ?> (-Werror=format-security error in lsapi code).</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(66535); ?> (Don't add newline after X-PHP-Originating-Script) (Tjerk)</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li>No longer allow invalid key sizes, invalid IV sizes or missing required IV in mcrypt_encrypt, mcrypt_decrypt and the deprecated mode functions.</li>
  <li>Use /dev/urandom as the default source for mcrypt_create_iv().</li>
</ul></li>
<li>Mbstring:
<ul>
  <li>Upgraded to oniguruma 5.9.5 (Anatol)</li>
  <li><?php bugfix(67199); ?> (mb_regex_encoding mismatch).</li>
</ul></li>
<li>Milter:
<ul>
  <li><?php bugfix(67715); ?> (php-milter does not build and crashes randomly).</li>
</ul></li>
<li>mysqli:
<ul>
  <li>Added new function mysqli_get_links_stats() as well as new INI variable mysqli.rollback_on_cached_plink of type bool (Andrey)</li>
  <li><?php bugfix(66762); ?> (Segfault in mysqli_stmt::bind_result() when link closed) (Remi)</li>
  <li>Fixed building against an external libmysqlclient.</li>
</ul></li>
<li>mysqlnd:
<ul>
  <li>Disabled flag for SP OUT variables for 5.5+ servers as they are not natively supported by the overlying APIs.</li>
  <li>Added a new fetching mode to mysqlnd.</li>
  <li>Added support for gb18030 from MySQL 5.7.</li>
</ul></li>
<li>Network:
<ul>
  <li><?php bugfix(67717); ?> (segfault in dns_get_record). (CVE-2014-3597)</li>
  <li><?php bugfix(67432); ?> (Fix potential segfault in dns_get_record()). (CVE-2014-4049)</li>
</ul></li>
<li>OCI8:
<ul>
  <li><?php bugfix(66875); ?> (Improve performance of multi-row OCI_RETURN_LOB queries) (Perrier, Chris Jones)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(60616); ?> (odbc_fetch_into returns junk at end of multi-byte char fields).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed missing type checks in OpenSSL options (Yussuf Khalil, Stas).</li>
  <li><?php bugfix(67609); ?> (TLS connections fail behind HTTP proxy).</li>
  <li>Fixed broken build against OpenSSL older than 0.9.8 where ECDH unavailable.</li>
  <li><?php bugfix(67666); ?> (Subject altNames doesn't support wildcard matching).</li>
  <li><?php bugfix(67224); ?> (Fall back to crypto_type from context if not specified explicitly in stream_socket_enable_crypto).</li>
  <li><?php bugfix(65698); ?> (certificates validity parsing does not work past 2050).</li>
  <li><?php bugfix(66636); ?> (openssl_x509_parse warning with V_ASN1_GENERALIZEDTIME).</li>
  <li>Peer certificates now verified by default in client socket operations (RFC: https://wiki.php.net/rfc/tls-peer-verification).</li>
  <li>New openssl.cafile and openssl.capath ini directives.</li>
  <li>Added crypto_method option for the ssl stream context.</li>
  <li>Added certificate fingerprint support.</li>
  <li>Added explicit TLSv1.1 and TLSv1.2 stream transports.</li>
  <li><?php bugfix(65729); ?> (CN_match gives false positive).</li>
  <li>Peer name verification matches SAN DNS names for certs using the Subject Alternative Name x509 extension.</li>
  <li>Fixed segfault when built against OpenSSL&gt;=1.0.1 (Daniel Lowrey)</li>
  <li>Added SPKAC support.</li>
  <li>Fallback to Windows CA cert store for peer verification if no openssl.cafile ini directive or "cafile" SSL context option specified in Windows.</li>
  <li>The openssl.cafile and openssl.capath ini directives introduced in alpha2 now have PHP_INI_PERDIR accessibility (was PHP_INI_ALL).</li>
  <li>New "peer_name" SSL context option replaces "CN_match" (which still works as before but triggers E_DEPRECATED).</li>
  <li>Fixed segfault when accessing non-existent context for client SNI use (Daniel Lowrey)</li>
  <li><?php bugfix(66501); ?> (Add EC key support to php_openssl_is_private_key).</li>
  <li><?php bugfix(47030); ?> (add new boolean "verify_peer_name" SSL context option allowing clients to verify cert names separately from the cert itself). "verify_peer_name" is enabled by default for client streams.</li>
  <li><?php bugfix(65538); ?> ("cafile" SSL context option now supports stream wrappers).</li>
  <li>New openssl_get_cert_locations() function to aid CA file and peer verification debugging.</li>
  <li>Encrypted stream wrappers now disable TLS compression by default.</li>
  <li>New "capture_session_meta" SSL context option allows encrypted client and server streams access to negotiated protocol/cipher information.</li>
  <li>New "honor_cipher_order" SSL context option allows servers to prioritize cipher suites of their choosing when negotiating SSL/TLS handshakes.</li>
  <li>New "single_ecdh_use" and "single_dh_use" SSL context options allow for improved forward secrecy in encrypted stream servers.</li>
  <li>New "dh_param" SSL context option allows stream servers control over the parameters when negotiating DHE cipher suites.</li>
  <li>New "ecdh_curve" SSL context option allowing stream servers to specify the curve to use when negotiating ephemeral ECDHE ciphers (defaults to NIST P-256).</li>
  <li>New "rsa_key_size" SSL context option gives stream servers control over the key size (in bits) used for RSA key agreements.</li>
  <li>Crypto methods for encrypted client and server streams now use bitwise flags for fine-grained protocol support.</li>
  <li>Added new tlsv1.0 stream wrapper to specify TLSv1 client/server method. tls wrapper now negotiates TLSv1, TLSv1.1 or TLSv1.2.</li>
  <li>Encrypted client streams now enable SNI by default.</li>
  <li>Encrypted streams now prioritize ephemeral key agreement and high strength ciphers by default.</li>
  <li>New OPENSSL_DEFAULT_STREAM_CIPHERS constant exposes default cipher list.</li>
  <li>New STREAM_CRYPTO_METHOD_* constants for enhanced control over the crypto methods negotiated encrypted server/client sessions.</li>
  <li>Encrypted stream servers now automatically mitigate potential DoS vector arising from client-initiated TLS renegotiation. New "reneg_limit", "reneg_window" and "reneg_limit_callback" SSL context options for custom renegotiation limiting control.</li>
  <li>Fixed memory leak in windows cert verification on verify failure.</li>
  <li>Peer certificate capturing via SSL context options now functions even if peer verification fails.</li>
  <li>Encrypted TLS servers now support the server name indication TLS extension via the new  "SNI_server_certs" SSL context option.</li>
  <li><?php bugfix(66833); ?> (Default disgest algo is still MD5, switch to SHA1).</li>
  <li><?php bugfix(66942); ?> (memory leak in openssl_seal()).</li>
  <li><?php bugfix(66952); ?> (memory leak in openssl_open()).</li>
  <li><?php bugfix(66840); ?> (Fix broken build when extension built separately).</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Added an optimization of class constants and constant calls to some internal functions (Laruence, Dmitry)</li>
  <li>Added an optimization pass to convert FCALL_BY_NAME into DO_FCALL.</li>
  <li>Added an optimization pass to merged identical constants (and related cache_slots) in op_array-&gt;literals table.</li>
  <li>Added script level constant replacement optimization pass.</li>
  <li>Added function opcache_is_script_cached().</li>
  <li>Added information about interned strings usage.</li>
  <li><?php bugfix(67215); ?> (php-cgi work with opcache, may be segmentation fault happen) (Dmitry, Laruence)</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(67238); ?> (Ungreedy and min/max quantifier bug, applied patch from the upstream).</li>
  <li>Upgraded to PCRE 8.34.</li>
  <li>Added support for (*MARK) backtracking verbs.</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(67550); ?> (Error in code "form" instead of "from", pgsql.c, line 756), which affected builds against libpq &lt; 7.3.</li>
  <li>pg_insert()/pg_select()/pg_update()/pg_delete() are no longer EXPERIMENTAL.</li>
  <li><?php implemented(25854); ?> (Return value for pg_insert should be resource instead of bool).</li>
  <li><?php implemented(41146); ?> (Add "description" with exteneded flag pg_meta_data(). pg_meta_data(resource $conn, string $table [, bool extended]) It also made pg_meta_data() return "is enum" always).</li>
  <li>Read-only access to the socket stream underlying database connections is exposed via a new pg_socket() function to allow read/write polling when establishing asynchronous connections and executing queries in non-blocking applications.</li>
  <li>Asynchronous connections are now possible using the PGSQL_CONNECT_ASYNC flag in conjunction with a new pg_connect_poll() function and connection polling status constants.</li>
  <li>New pg_flush() and pg_consume_input() functions added to manually complete non-blocking reads/writes to underlying connection sockets.</li>
  <li>pg_version() returns full report which obtained by PQparameterStatus().</li>
  <li>Added pg_lo_truncate().</li>
  <li>Added 64bit large object support for PostgreSQL 9.3 and later.</li>
  <li><?php bugfix(67555); ?> (Cannot build against libpq 7.3).</li>
</ul></li>
<li>phpdbg:
<ul>
  <li><?php bugfix(67575); ?> (Compilation fails for phpdbg when the build directory != src directory).</li>
  <li><?php bugfix(67499); ?> (readline feature not enabled when build with libedit).</li>
  <li><?php githubissue('krakjoe/phpdbg', 94); ?> (List behavior is inconsistent).</li>
  <li><?php githubissue('krakjoe/phpdbg', 97); ?> (The prompt should always ensure it is on a newline).</li>
  <li><?php githubissue('krakjoe/phpdbg', 98); ?> (break if does not seem to work).</li>
  <li><?php githubissue('krakjoe/phpdbg', 99); ?> (register function has the same behavior as run).</li>
  <li><?php githubissue('krakjoe/phpdbg', 100); ?> (No way to list the current stack/frames) (Help entry was missing).</li>
  <li>Fixed bug which caused phpdbg to fail immediately on startup in non-debug builds.</li>
  <li><?php bugfix(67212); ?> (phpdbg uses non-standard TIOCGWINSZ).</li>
  <li>Included phpdbg sapi (RFC: https://wiki.php.net/rfc/phpdbg).</li>
  <li>Added watchpoints (watch command).</li>
  <li>Renamed some commands (next =&gt; continue and how to step).</li>
  <li><?php githubissue('krakjoe/phpdbg', 85); ?> (Added stdin/stdout/stderr constants and their php:// wrappers).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(66604); ?> ('pdo/php_pdo_error.h' not copied to the include dir).</li>
</ul></li>
<li>PDO-ODBC:
<ul>
  <li><?php bugfix(50444); ?> (PDO-ODBC changes for 64-bit).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(42614); ?> (PDO_pgsql: add pg_get_notify support).</li>
  <li><?php bugfix(63657); ?> (pgsqlCopyFromFile, pgsqlCopyToArray use Postgres &lt; 7.3 syntax).</li>
  <li>Cleaned up code by increasing the requirements to libpq versions providing PQexecParams, PQprepare, PQescapeStringConn, PQescapeByteaConn. According to the release notes that means 8.0.8+ or 8.1.4+.</li>
  <li>Deprecated PDO::PGSQL_ATTR_DISABLE_NATIVE_PREPARED_STATEMENT, an undocument constant effectively equivalent to PDO::ATTR_EMULATE_PREPARES.</li>
  <li>Added PDO::PGSQL_ATTR_DISABLE_PREPARES constant to execute the queries without preparing them, while still passing parameters separately from the command text using PQexecParams.</li>
</ul></li>
<li>PDO_firebird:
<ul>
  <li><?php bugfix(66071); ?> (memory corruption in error handling) (Popa)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(64498); ?> ($phar-&gt;buildFromDirectory can't compress file with an accent in its name).</li>
  <li><?php bugfix(67587); ?> (Redirection loop on nginx with FPM).</li>
</ul></li>
<li>readline:
<ul>
  <li><?php bugfix(55496); ?> (Interactive mode doesn't force a newline before the prompt).</li>
  <li><?php bugfix(67496); ?> (Save command history when exiting interactive shell with control-c).</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php implemented(67713); ?> (loosen the restrictions on ReflectionClass::newInstanceWithoutConstructor()).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(67694); ?> (Regression in session_regenerate_id()).</li>
  <li>Fixed missing type checks in php_session_create_id (Yussuf Khalil, Stas).</li>
  <li><?php bugfix(66827); ?> (Session raises E_NOTICE when session name variable is array).</li>
  <li><?php bugfix(65315); ?> (session.hash_function silently fallback to default md5) (Yasuo)</li>
  <li><?php implemented(17860); ?> (Session write short circuit).</li>
  <li><?php implemented(20421); ?> (session_abort() and session_reset() function).</li>
  <li>Remove session_gc() and session_serializer_name() wich were introduced in the first 5.6.0 alpha.</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(66084); ?> (simplexml_load_string() mangles empty node name) (Anatol)</li>
</ul></li>
<li>SQLite:
<ul>
  <li>Updated the bundled libsqlite to the version 3.8.3.1 (Anatol)</li>
  <li><?php bugfix(66967); ?> (Updated bundled libsqlite to 3.8.4.3).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php implemented(49898); ?> (Add SoapClient::__getCookies()).</li>
</ul></li>
<li>SPL:
<ul>
  <li>Revert fix for <?php bugl(67064); ?> (BC issues).</li>
  <li><?php bugfix(67539); ?> (ArrayIterator use-after-free due to object change during sorting). (CVE-2014-4698)</li>
  <li><?php bugfix(67538); ?> (SPL Iterators use-after-free). (CVE-2014-4670)</li>
  <li><?php bugfix(67492); ?> (unserialize() SPL ArrayObject / SPLObjectStorage Type Confusion). (CVE-2014-3515)</li>
  <li><?php bugfix(67359); ?> (Segfault in recursiveDirectoryIterator).</li>
  <li><?php bugfix(66127); ?> (Segmentation fault with ArrayObject unset).</li>
  <li><?php implemented(67453); ?> (Allow to unserialize empty data).</li>
  <li><?php bugfix(66834); ?> (empty() does not work on classes that extend ArrayObject) (Tjerk)</li>
  <li><?php bugfix(66702); ?> (RegexIterator::INVERT_MATCH does not invert).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php implemented(65634); ?> (HTTP wrapper is very slow with protocol_version 1.1).</li>
  <li>Implemented Change crypt() behavior w/o salt RFC. (Yasuo) https://wiki.php.net/rfc/crypt_function_salt</li>
  <li><?php implemented(49824); ?> (Change array_fill() to allow creating empty array).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(67430); ?> (http:// wrapper doesn't follow 308 redirects).</li>
</ul></li>
<li>Tokenizer:
<ul>
  <li><?php bugfix(67395); ?> (token_name() does not return name for T_POW and T_POW_EQUAL token).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li><?php bugfix(55285); ?> (XMLReader::getAttribute/No/Ns methods inconsistency).</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(53965); ?> (&lt;xsl:include&gt; cannot find files with relative paths when loaded with "file://").</li>
</ul></li>
<li>Zip:
<ul>
  <li>update libzip to version 0.11.2. PHP doesn't use any ilibzip private symbol anymore.</li>
  <li>new method ZipArchive::setPassword($password).</li>
  <li>add --with-libzip option to build with system libzip.</li>
  <li>new methods: ZipArchive::setExternalAttributesName($name, $opsys, $attr [, $flags]) ZipArchive::setExternalAttributesIndex($idx, $opsys, $attr [, $flags]) ZipArchive::getExternalAttributesName($name, &amp;$opsys, &amp;$attr [, $flags]) ZipArchive::getExternalAttributesIndex($idx, &amp;$opsys, &amp;$attr [, $flags])</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(67865); ?> (internal corruption phar error). Mike</li>
  <li><?php bugfix(67724); ?> (chained zlib filters silently fail with large amounts of data).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<a id="PHP_5_5"></a>
<section class="version" id="5.5.38"><!-- {{{ 5.5.38 -->
<h3>Version 5.5.38</h3>
<?php release_date('21-Jul-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70480); ?> (php_url_parse_ex() buffer overflow read). (CVE-2016-6288)</li>
  <li><?php bugfix(72513); ?> (Stack-based buffer overflow vulnerability in virtual_file_ex). (CVE-2016-6289)</li>
  <li><?php bugfix(72562); ?> (Use After Free in unserialize() with Unexpected Session Deserialization). (CVE-2016-6290)</li>
  <li><?php bugfix(72573); ?> (HTTP_PROXY is improperly trusted by some PHP libraries and applications). (CVE-2016-5385)</li>
</ul></li>
<li>BZip2:
<ul>
  <li><?php bugfix(72613); ?> (Inadequate error handling in bzread()). (CVE-2016-5399)</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(72603); ?> (Out of bound read in exif_process_IFD_in_MAKERNOTE). (CVE-2016-6291)</li>
  <li><?php bugfix(72618); ?> (NULL Pointer Dereference in exif_process_user_comment). (CVE-2016-6292)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(72512); ?> (gdImageTrueColorToPaletteBody allows arbitrary write/read access).</li>
  <li><?php bugfix(72519); ?> (imagegif/output out-of-bounds access).</li>
  <li><?php bugfix(72558); ?> (Integer overflow error within _gdContributionsAlloc()). (CVE-2016-6207)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(72533); ?> (locale_accept_from_http out-of-bounds access). (CVE-2016-6294)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(69975); ?> (PHP segfaults when accessing nvarchar(max) defined columns). (CVE-2015-8879)</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(72479); ?> (Use After Free Vulnerability in SNMP with GC and unserialize()). (CVE-2016-6295)</li>
</ul></li>
<li>Xmlrpc:
<ul>
  <li><?php bugfix(72606); ?> (heap-buffer-overflow (write) simplestring_addn simplestring.c). (CVE-2016-6296)</li>
</ul></li>
<li>Zip:
<ul>
  <li><?php bugfix(72520); ?> (Stack-based buffer overflow vulnerability in php_stream_zip_opener). (CVE-2016-6297)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.37"><!-- {{{ 5.5.37 -->
<h3>Version 5.5.37</h3>
<?php release_date('23-Jun-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72268); ?> (Integer Overflow in nl2br()).</li>
  <li><?php bugfix(72275); ?> (Integer Overflow in json_encode()/json_decode()/ json_utf8_to_utf16()).</li>
  <li><?php bugfix(72400); ?> (Integer Overflow in addcslashes/addslashes).</li>
  <li><?php bugfix(72403); ?> (Integer Overflow in Length of String-typed ZVAL).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(66387); ?> (Stack overflow with imagefilltoborder). (CVE-2015-8874)</li>
  <li><?php bugfix(72298); ?> (pass2_no_dither out-of-bounds access).</li>
  <li><?php bugfix(72339); ?> (Integer Overflow in _gd2GetHeader() resulting in heap overflow). (CVE-2016-5766)</li>
  <li><?php bugfix(72407); ?> (NULL Pointer Dereference at _gdScaleVert).</li>
  <li><?php bugfix(72446); ?> (Integer Overflow in gdImagePaletteToTrueColor() resulting in heap overflow). (CVE-2016-5767)</li>
</ul></li>
<li>mbstring:
<ul>
  <li><?php bugfix(72402); ?> (_php_mb_regex_ereg_replace_exec - double free). (CVE-2016-5768)</li>
</ul></li>
<li>mcrypt:
<ul>
  <li><?php bugfix(72455); ?> (Heap Overflow due to integer overflows). (CVE-2016-5769)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(72262); ?> (int/size_t confusion in SplFileObject::fread). (CVE-2016-5770)</li>
  <li><?php bugfix(72433); ?> (Use After Free Vulnerability in PHP's GC algorithm and unserialize). (CVE-2016-5771)</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(72340); ?> (Double Free Courruption in wddx_deserialize). (CVE-2016-5772)</li>
</ul></li>
<li>zip:
<ul>
  <li><?php bugfix(72434); ?> (ZipArchive class Use After Free Vulnerability in PHP's GC algorithm and unserialize). (CVE-2016-5773)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.36"><!-- {{{ 5.5.36 -->
<h3>Version 5.5.36</h3>
<?php release_date('26-May-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(72114); ?> (Integer underflow / arbitrary null write in fread/gzread). (CVE-2016-5096)</li>
  <li><?php bugfix(72135); ?> (Integer Overflow in php_html_entities). (CVE-2016-5094)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(72227); ?> (imagescale out-of-bounds read). (CVE-2013-7456)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(72241); ?> (get_icu_value_internal out-of-bounds read). (CVE-2016-5093)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71331); ?> (Uninitialized pointer in phar_make_dirstream()). (CVE-2016-4343)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.35"><!-- {{{ 5.5.35 -->
<h3>Version 5.5.35</h3>
<?php release_date('28-Apr-2016'); ?>
<ul><li>BCMath:
<ul>
  <li><?php bugfix(72093); ?> (bcpowmod accepts negative scale and corrupts _one_ definition). (CVE-2016-4537, CVE-2016-4538)</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(72094); ?> (Out of bounds heap read access in exif header processing). (CVE-2016-4542, CVE-2016-4543, CVE-2016-4544)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(71912); ?> (libgd: signedness vulnerability). (CVE-2016-3074)</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(72061); ?> (Out-of-bounds reads in zif_grapheme_stripos with negative offset). (CVE-2016-4540, CVE-2016-4541)</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(72099); ?> (xml_parse_into_struct segmentation fault). (CVE-2016-4539)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.34"><!-- {{{ 5.5.34 -->
<h3>Version 5.5.34</h3>
<?php release_date('31-Mar-2016'); ?>
<ul><li>Fileinfo:
<ul>
  <li><?php bugfix(71527); ?> (Buffer over-write in finfo_open with malformed magic file). (CVE-2015-8865)</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(71906); ?> (AddressSanitizer: negative-size-param (-1) in mbfl_strcut). (CVE-2016-4073)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(71860); ?> (Invalid memory write in phar on filename with \0 in name). (CVE-2016-4072)</li>
</ul></li>
<li>SNMP:
<ul>
  <li><?php bugfix(71704); ?> (php_snmp_error() Format String Vulnerability). (CVE-2016-4071)</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(71798); ?> (Integer Overflow in php_raw_url_encode). (CVE-2016-4070)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.33"><!-- {{{ 5.5.33 -->
<h3>Version 5.5.33</h3>
<?php release_date('03-Mar-2016'); ?>
<ul><li>Phar:
<ul>
  <li><?php bugfix(71498); ?> (Out-of-Bound Read in phar_parse_zipfile()).</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(71587); ?> (Use-After-Free / Double-Free in WDDX Deserialize).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.32"><!-- {{{ 5.5.32 -->
<h3>Version 5.5.32</h3>
<?php release_date('04-Feb-2016'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(71039); ?> (exec functions ignore length but look for NULL termination).</li>
  <li><?php bugfix(71323); ?> (Output of stream_get_meta_data can be falsified by its input).</li>
  <li><?php bugfix(71459); ?> (Integer overflow in iptcembed()).</li>
</ul></li>
<li>GD:
<ul>
  <li>Improved fix for bug <?php bugl(70976) ?>.</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgraded bundled PCRE library to 8.38. (CVE-2015-8383, CVE-2015-8386, CVE-2015-8387, CVE-2015-8389, CVE-2015-8390, CVE-2015-8391, CVE-2015-8393, CVE-2015-8394)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(71354); ?> (Heap corruption in tar/zip/phar parser). (CVE-2016-4342)</li>
  <li><?php bugfix(71391); ?> (NULL Pointer Dereference in phar_tar_setupmetadata()).</li>
  <li><?php bugfix(71488); ?> (Stack overflow when decompressing tar archives). (CVE-2016-2554)</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(71335); ?> (Type Confusion in WDDX Packet Deserialization).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.31"><!-- {{{ 5.5.31 -->
<h3>Version 5.5.31</h3>
<?php release_date('07-Jan-2016'); ?>
<ul><li>FPM:
<ul>
  <li><?php bugfix(70755); ?> (fpm_log.c memory leak and buffer overflow). (CVE-2016-5114)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(70976); ?> (Memory Read via gdImageRotateInterpolated Array Index Out of Bounds). (CVE-2016-1903)</li>
</ul></li>
<li>WDDX:
<ul>
  <li><?php bugfix(70661); ?> (Use After Free Vulnerability in WDDX Packet Deserialization).</li>
  <li><?php bugfix(70741); ?> (Session WDDX Packet Deserialization Type Confusion Vulnerability).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(70728); ?> (Type Confusion Vulnerability in PHP_to_XMLRPC_worker()).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.30">
<h3>Version 5.5.30</h3>
<?php release_date('01-Oct-2015'); ?>
<ul><li>Phar:
<ul>
  <li><?php bugfix(69720); ?> (Null pointer dereference in phar_get_fp_offset()). (CVE-2015-7803)</li>
  <li><?php bugfix(70433); ?> (Uninitialized pointer in phar_make_dirstream when zip entry filename is "/"). (CVE-2015-7804)</li>
</ul></li>
</ul>
</section>

<section class="version" id="5.5.29"><!-- {{{ 5.5.29 -->
<h3>Version 5.5.29</h3>
<?php release_date('03-Sep-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70172); ?> (Use After Free Vulnerability in unserialize()). (CVE-2015-6834)</li>
  <li><?php bugfix(70219); ?> (Use after free vulnerability in session deserializer). (CVE-2015-6835)</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(70385); ?> (Buffer over-read in exif_read_data with TIFF IFD tag byte value of 32 bytes).</li>
</ul></li>
<li>hash:
<ul>
  <li><?php bugfix(70312); ?> (HAVAL gives wrong hashes in specific cases).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(70345); ?> (Multiple vulnerabilities related to PCRE functions).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70388); ?> (SOAP serialize_function_call() type confusion / RCE). (CVE-2015-6836)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70365); ?> (Use-after-free vulnerability in unserialize() with SplObjectStorage). (CVE-2015-6834)</li>
  <li><?php bugfix(70366); ?> (Use-after-free vulnerability in unserialize() with SplDoublyLinkedList). (CVE-2015-6834)</li>
</ul></li>
<li>XSLT:
<ul>
  <li><?php bugfix(69782); ?> (NULL pointer dereference). (CVE-2015-6837, CVE-2015-6838)</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(70350); ?> (ZipArchive::extractTo allows for directory traversal when creating directories). (CVE-2014-9767)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.28"><!-- {{{ 5.5.28 -->
<h3>Version 5.5.28</h3>
<?php release_date('06-Aug-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69793); ?> (Remotely triggerable stack exhaustion via recursive method calls).</li>
  <li><?php bugfix(69892); ?> (Different arrays compare indentical due to integer key truncation).</li>
  <li><?php bugfix(70002); ?> (TS issues with temporary dir handling).</li>
  <li><?php bugfix(70121); ?> (unserialize() could lead to unexpected methods execution / NULL pointer deref).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(70014); ?> (openssl_random_pseudo_bytes() is not cryptographically secure). (CVE-2015-8867)</li>
</ul></li>
<li>Phar:
<ul>
  <li>Improved fix for bug <?php bugl(69441) ?>.</li>
  <li><?php bugfix(70019); ?> (Files extracted from archive may be placed outside of destination directory). (CVE-2015-6833)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70081); ?> (SoapClient info leak / null pointer dereference via multiple type confusions).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70068); ?> (Dangling pointer in the unserialization of ArrayObject items). (CVE-2015-6832)</li>
  <li><?php bugfix(70166); ?> (Use After Free Vulnerability in unserialize() with SPLArrayObject). (CVE-2015-6831)</li>
  <li><?php bugfix(70168); ?> (Use After Free Vulnerability in unserialize() with SplObjectStorage). (CVE-2015-6831)</li>
  <li><?php bugfix(70169); ?> (Use After Free Vulnerability in unserialize() with SplDoublyLinkedList). (CVE-2015-6831)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.27"><!-- {{{ 5.5.27 -->
<h3>Version 5.5.27</h3>
<?php release_date('09-Jul-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69768); ?> (escapeshell*() doesn't cater to !).</li>
  <li><?php bugfix(69703); ?> (Use __builtin_clzl on PowerPC).</li>
  <li><?php bugfix(69732); ?> (can induce segmentation fault with basic php code).</li>
  <li><?php bugfix(69642); ?> (Windows 10 reported as Windows 8).</li>
  <li><?php bugfix(69551); ?> (parse_ini_file() and parse_ini_string() segmentation fault).</li>
  <li><?php bugfix(69781); ?> (phpinfo() reports Professional Editions of Windows 7/8/8.1/10 as "Business").</li>
  <li><?php bugfix(69835); ?> (phpinfo() does not report many Windows SKUs).</li>
  <li><?php bugfix(69892); ?> (Different arrays compare indentical due to integer key truncation).</li>
  <li><?php bugfix(69874); ?> (Can't set empty additional_headers for mail()), regression from fix to bug <?php bugl(68776); ?>.</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(61221); ?> (imagegammacorrect function loses alpha channel).</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(69669); ?> (mysqlnd is vulnerable to BACKRONYM). (CVE-2015-3152)</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(53823); ?> (preg_replace: * qualifier on unicode replace garbles the string).</li>
  <li><?php bugfix(69864); ?> (Segfault in preg_replace_callback).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(69752); ?> (PDOStatement::execute() leaks memory with DML Statements when closeCuror() is u).</li>
  <li><?php bugfix(69362); ?> (PDO-pgsql fails to connect if password contains a leading single quote).</li>
  <li><?php bugfix(69344); ?> (PDO PgSQL Incorrect binding numeric array with gaps).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69958); ?> (Segfault in Phar::convertToData on invalid file). (CVE-2015-5589)</li>
  <li><?php bugfix(69923); ?> (Buffer overflow and stack smashing error in phar_fix_filepath). (CVE-2015-5590)</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li>Refactored the fix for bug <?php bugl(66084); ?> (simplexml_load_string() mangles empty node name).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(69737); ?> (Segfault when SplMinHeap::compare produces fatal error).</li>
  <li><?php bugfix(67805); ?> (SplFileObject setMaxLineLength).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.26"><!-- {{{ 5.5.26 -->
<h3>Version 5.5.26</h3>
<?php release_date('11-Jun-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69566); ?> (Conditional jump or move depends on uninitialised value in extension trait).</li>
  <li><?php bugfix(66048); ?> (temp. directory is cached during multiple requests).</li>
  <li><?php bugfix(69628); ?> (complex GLOB_BRACE fails on Windows).</li>
  <li><?php bugfix(69646); ?> (OS command injection vulnerability in escapeshellarg). (CVE-2015-4642)</li>
  <li><?php bugfix(69719); ?> (Incorrect handling of paths with NULs). (CVE-2015-4598)</li>
</ul></li>
<li>FTP:
<ul>
  <li>Improved fix for bug <?php bugl(69545); ?> (Integer overflow in ftp_genlist() resulting in heap overflow). (CVE-2015-4643)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(69479); ?> (GD fails to build with newer libvpx).</li>
</ul></li>
<li>Iconv:
<ul>
  <li><?php bugfix(48147); ?> (iconv with //IGNORE cuts the string).</li>
</ul></li>
<li>Litespeed SAPI:
<ul>
  <li><?php bugfix(68812); ?> (Unchecked return value).</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(68776); ?> (mail() does not have mail header injection prevention for additional headers).</li>
</ul></li>
<li>MCrypt:
<ul>
  <li>Added file descriptor caching to mcrypt_create_iv().</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(69549); ?> (Memory leak with opcache.optimization_level=0xFFFFFFFF).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgraded pcrelib to 8.37. (CVE-2015-2325, CVE-2015-2326)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69680); ?> (phar symlink in binary directory broken).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(69667); ?> (segfault in php_pgsql_meta_data). (CVE-2015-4644)</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li>Upgrade bundled sqlite to 3.8.10.2. (CVE-2015-3414, CVE-2015-3415,
    CVE-2015-3416)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.25"><!-- {{{ 5.5.25 -->
<h3>Version 5.5.25</h3>
<?php release_date('14-May-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69364); ?> (PHP Multipart/form-data remote dos Vulnerability). (CVE-2015-4024)</li>
  <li><?php bugfix(69403); ?> (str_repeat() sign mismatch based memory corruption).</li>
  <li><?php bugfix(69418); ?> (CVE-2006-7243 fix regressions in 5.4+). (CVE-2015-4025)</li>
  <li><?php bugfix(69522); ?> (heap buffer overflow in unpack()).</li>
  <li><?php bugfix(69467); ?> (Wrong checked for the interface by using Trait).</li>
  <li><?php bugfix(69420); ?> (Invalid read in zend_std_get_method).</li>
  <li><?php bugfix(60022); ?> ("use statement [...] has no effect" depends on leading backslash).</li>
  <li><?php bugfix(67314); ?> (Segmentation fault in gc_remove_zval_from_buffer).</li>
  <li><?php bugfix(68652); ?> (segmentation fault in destructor).</li>
  <li><?php bugfix(69419); ?> (Returning compatible sub generator produces a warning).</li>
  <li><?php bugfix(69472); ?> (php_sys_readlink ignores misc errors from GetFinalPathNameByHandleA).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(69545); ?> (Integer overflow in ftp_genlist() resulting in heap overflow). (CVE-2015-4022)</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(69354); ?> (Incorrect use of SQLColAttributes with ODBC 3.0).</li>
  <li><?php bugfix(69474); ?> (ODBC: Query with same field name from two tables returns incorrect result).</li>
  <li><?php bugfix(69381); ?> (out of memory with sage odbc driver).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(69402); ?> (Reading empty SSL stream hangs until timeout).</li>
</ul></li>
<li>PCNTL:
<ul>
  <li><?php bugfix(68598); ?> (pcntl_exec() should not allow null char). (CVE-2015-4026)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69453); ?> (Memory Corruption in phar_parse_tarfile when entry filename starts with null). (CVE-2015-4021)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.24"><!-- {{{ 5.5.24 -->
<h3>Version 5.5.24</h3>
<?php release_date('16-Apr-2015'); ?>
<ul><li>Apache2handler:
<ul>
  <li><?php bugfix(69218); ?> (potential remote code execution with apache 2.4 apache2handler). (CVE-2015-3330)</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(66609); ?> (php crashes with __get() and ++ operator in some cases).</li>
  <li><?php bugfix(67626); ?> (User exceptions not properly handled in streams).</li>
  <li><?php bugfix(68021); ?> (get_browser() browser_name_regex returns non-utf-8 characters).</li>
  <li><?php bugfix(68917); ?> (parse_url fails on some partial urls).</li>
  <li><?php bugfix(69134); ?> (Per Directory Values overrides PHP_INI_SYSTEM configuration options).</li>
  <li>Additional fix for bug <?php bugl(69152); ?> (Type confusion vulnerability in exception::getTraceAsString).</li>
  <li><?php bugfix(69212); ?> (Leaking VIA_HANDLER func when exception thrown in __call/... arg passing).</li>
  <li><?php bugfix(69221); ?> (Segmentation fault when using a generator in combination with an Iterator).</li>
  <li><?php bugfix(69337); ?> (php_stream_url_wrap_http_ex() type-confusion vulnerability).</li>
  <li><?php bugfix(69353); ?> (Missing null byte checks for paths in various PHP extensions). (CVE-2015-3411, CVE-2015-3412)</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php implemented(69278); ?> (HTTP2 support).</li>
  <li><?php bugfix(68739); ?> (Missing break / control flow).</li>
  <li><?php bugfix(69316); ?> (Use-after-free in php_curl related to CURLOPT_FILE/_INFILE/_WRITEHEADER).</li>
</ul></li>
<li>Date:
<ul>
  <li>Export date_get_immutable_ce so that it can be used by extensions.</li>
  <li><?php bugfix(69336); ?> (Issues with "last day of &lt;monthname&gt;").</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(65406); ?> (Enchant broker plugins are in the wrong place in windows builds).</li>
</ul></li>
<li>Ereg:
<ul>
  <li><?php bugfix(68740); ?> (NULL Pointer Dereference).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(68819); ?> (Fileinfo on specific file causes spurious OOM and/or segfault). (CVE-2015-4604, CVE-2015-4605)</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(69202); ?> (FILTER_FLAG_STRIP_BACKTICK ignored unless other flags are used).</li>
  <li><?php bugfix(69203); ?> (FILTER_FLAG_STRIP_HIGH doesn't strip ASCII 127).</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(68846); ?> (False detection of CJK Unified Ideographs Extension E).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(69354); ?> (Incorrect use of SQLColAttributes with ODBC 3.0).</li>
</ul></li>
<li>OPCache:
<ul>
  <li><?php bugfix(69281); ?> (opcache_is_script_cached no longer works).</li>
  <li><?php bugfix(68677); ?> (Use After Free). (CVE-2015-1351)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(67403); ?> (Add signatureType to openssl_x509_parse).</li>
  <li>Add a check for RAND_egd to allow compiling against LibreSSL.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(64343); ?> (PharData::extractTo fails for tarball created by BSD tar).</li>
  <li><?php bugfix(64931); ?> (phar_add_file is too restrictive on filename).</li>
  <li><?php bugfix(65467); ?> (Call to undefined method cli_arg_typ_string).</li>
  <li><?php bugfix(67761); ?> (Phar::mapPhar fails for Phars inside a path containing ".tar").</li>
  <li><?php bugfix(69324); ?> (Buffer Over-read in unserialize when parsing Phar). (CVE-2015-2783, CVE-2015-3307)</li>
  <li><?php bugfix(69441); ?> (Buffer Overflow when parsing tar/zip/phar in phar_set_inode). (CVE-2015-3329)</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(68741); ?> (Null pointer dereference). (CVE-2015-1352)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(69152); ?> (Type Confusion Infoleak Vulnerability in unserialize() with SoapFault). (CVE-2015-4599)</li>
  <li><?php bugfix(69293); ?> (NEW segfault when using SoapClient::__setSoapHeader (bisected, regression)).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(69227); ?> (Use after free in zval_scan caused by spl_object_storage_get_gc).</li>
</ul></li>
<li>SQLITE:
<ul>
  <li><?php bugfix(68760); ?> (SQLITE segfaults if custom collator throws an exception).</li>
  <li><?php bugfix(69287); ?> (Upgrade bundled sqlite to 3.8.8.3).</li>
  <li><?php bugfix(66550); ?> (SQLite prepared statement use-after-free).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.5.23"><!-- {{{ 5.5.23 -->
<h3>Version 5.5.23</h3>
<?php release_date('19-Mar-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69174); ?> (leaks when unused inner class use traits precedence).</li>
  <li><?php bugfix(69139); ?> (Crash in gc_zval_possible_root on unserialize).</li>
  <li><?php bugfix(69121); ?> (Segfault in get_current_user when script owner is not in passwd with ZTS build).</li>
  <li><?php bugfix(65593); ?> (Segfault when calling ob_start from output buffering callback).</li>
  <li><?php bugfix(69017); ?> (Fail to push to the empty array with the constant value defined in class scope).</li>
  <li><?php bugfix(68986); ?> (pointer returned by php_stream_fopen_temporary_file not validated in memory.c).</li>
  <li><?php bugfix(68166); ?> (Exception with invalid character causes segv).</li>
  <li><?php bugfix(69141); ?> (Missing arguments in reflection info for some builtin functions).</li>
  <li><?php bugfix(68976); ?> (Use After Free Vulnerability in unserialize()). (CVE-2015-2787)</li>
  <li><?php bugfix(69134); ?> (Per Directory Values overrides PHP_INI_SYSTEM configuration options).</li>
  <li><?php bugfix(69207); ?> (move_uploaded_file allows nulls in path). (CVE-2015-2348)</li>
</ul></li>
<li>CGI:
<ul>
  <li><?php bugfix(69015); ?> (php-cgi's getopt does not see $argv).</li>
</ul></li>
<li>CLI:
<ul>
  <li><?php bugfix(67741); ?> (auto_prepend_file messes up __LINE__).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(69088); ?> (PHP_MINIT_FUNCTION does not fully initialize cURL on Win32).</li>
  <li>Add CURLPROXY_SOCKS4A and CURLPROXY_SOCKS5_HOSTNAME constants if supported by libcurl.</li>
</ul></li>
<li>Ereg:
<ul>
  <li><?php bugfix(69248); ?> (heap overflow vulnerability in regcomp.c). (CVE-2015-2305)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(68822); ?> (request time is reset too early).</li>
</ul></li>
<li>JSON :
<ul>
  <li><?php bugfix(64695); ?> (JSON_NUMERIC_CHECK has issues with strings that are
     numbers plus the letter e).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(68964); ?> (Allowed memory size exhausted with odbc_exec).</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(69125); ?> (Array numeric string as key).</li>
  <li><?php bugfix(69038); ?> (switch(SOMECONSTANT) misbehaves).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(61285); ?>, <?php bugl(68329); ?>, <?php bugl(68046); ?>, <?php bugl(41631); ?> (encrypted streams don't observe socket timeouts).</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(68638); ?> (pg_update() fails to store infinite values).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(69054); ?> (Null dereference in readline_(read|write)_history() without parameters).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(69085); ?> (SoapClient's __call() type confusion through unserialize()). (CVE-2015-4147, CVE-2015-4148)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(69108); ?> ("Segmentation fault" when (de)serializing SplObjectStorage).</li>
  <li><?php bugfix(68557); ?> (RecursiveDirectoryIterator::seek(0) broken after calling getChildren()).</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(69253); ?> (ZIP Integer Overflow leads to writing past heap boundary). (CVE-2015-2331)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.22"><!-- {{{ 5.5.22 -->
<h3>Version 5.5.22</h3>
<?php release_date('19-Feb-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(67068); ?> (getClosure returns somethings that's not a closure).</li>
  <li><?php bugfix(68925); ?> (Mitigation for CVE-2015-0235 – GHOST: glibc gethostbyname buffer overflow).</li>
  <li><?php bugfix(68942); ?> (Use after free vulnerability in unserialize() with DateTimeZone). (CVE-2015-0273)</li>
  <li>Added NULL byte protection to exec, system and passthru.</li>
  <li>Removed support for multi-line headers, as they are deprecated by RFC 7230.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(45081); ?> (strtotime incorrectly interprets SGT time zone).</li>
</ul></li>
<li>Dba:
<ul>
  <li><?php bugfix(68711); ?> (useless comparisons).</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(68552); ?> (heap buffer overflow in enchant_broker_request_dict()). (CVE-2014-9705)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(68827); ?> (Double free with disabled ZMM).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(66479); ?> (Wrong response to FCGI_GET_VALUES).</li>
  <li><?php bugfix(68571); ?> (core dump when webserver close the socket).</li>
</ul></li>
<li>Libxml:
<ul>
  <li><?php bugfix(64938); ?> (libxml_disable_entity_loader setting is shared between threads). (CVE-2015-8866)</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(68750); ?> (PDOMysql with mysqlnd does not allow the usage of named pipes).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(68901); ?> (use after free). (CVE-2015-2301)</li>
</ul></li>
<li>Pgsql:
<ul>
  <li><?php bugfix(65199); ?> (pg_copy_from() modifies input array variable).</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li><?php bugfix(68260); ?> (SQLite3Result::fetchArray declares wrong required_num_args).</li>
</ul></li>
<li>Mysqli:
<ul>
  <li><?php bugfix(68114); ?> (linker error on some OS X machines with fixed width decimal support).</li>
  <li><?php bugfix(68657); ?> (Reading 4 byte floats with Mysqli and libmysqlclient has rounding errors).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(68941); ?> (mod_files.sh is a bash-script).</li>
  <li><?php bugfix(66623); ?> (no EINTR check on flock).</li>
  <li><?php bugfix(68063); ?> (Empty session IDs do still start sessions).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(65272); ?> (flock() out parameter not set correctly in windows).</li>
  <li><?php bugfix(69033); ?> (Request may get env. variables from previous requests if PHP works as FastCGI).</li>
</ul></li>
<li>Streams:
<ul>
  <li>Fixed bug which caused call after final close on streams filter.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.21"><!-- {{{ 5.5.21 -->
<h3>Version 5.5.21</h3>
<?php release_date('22-Jan-2015'); ?>
<ul><li>Core:
<ul>
  <li>Upgraded crypt_blowfish to version 1.3.</li>
  <li><?php bugfix(60704); ?> (unlink() bug with some files path).</li>
  <li><?php bugfix(65419); ?> (Inside trait, self::class != __CLASS__).</li>
  <li><?php bugfix(65576); ?> (Constructor from trait conflicts with inherited constructor).</li>
  <li><?php bugfix(55541); ?> (errors spawn MessageBox, which blocks test automation).</li>
  <li><?php bugfix(68297); ?> (Application Popup provides too few information).</li>
  <li><?php bugfix(65769); ?> (localeconv() broken in TS builds).</li>
  <li><?php bugfix(65230); ?> (setting locale randomly broken).</li>
  <li><?php bugfix(66764); ?> (configure doesn't define EXPANDED_DATADIR / PHP_DATADIR correctly).</li>
  <li><?php bugfix(68583); ?> (Crash in timeout thread).</li>
  <li><?php bugfix(68676); ?> (Explicit Double Free). (CVE-2014-9425)</li>
  <li><?php bugfix(68710); ?> (Use After Free Vulnerability in PHP's unserialize()). (CVE-2015-0231)</li>
</ul></li>
<li>CGI:
<ul>
  <li><?php bugfix(68618); ?> (out of bounds read crashes php-cgi). (CVE-2014-9427)</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(68745); ?> (Invalid HTTP requests make web server segfault).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(67643); ?> (curl_multi_getcontent returns '' when CURLOPT_RETURNTRANSFER isn't set).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(68799); ?> (Free called on uninitialized pointer). (CVE-2015-0232)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(68671); ?> (incorrect expression in libmagic).</li>
  <li><?php bugfix(68735); ?> (fileinfo out-of-bounds memory access). (CVE-2014-9652)</li>
  <li>Removed readelf.c and related code from libmagic sources.</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(68751); ?> (listen.allowed_clients is broken).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(68601); ?> (buffer read overflow in gd_gif_in.c). (CVE-2014-9709)</li>
</ul></li>
<li>Mbstring:
<ul>
  <li><?php bugfix(68504); ?> (--with-libmbfl configure option not present on Windows).</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li>Fixed possible read after end of buffer and use after free.</li>
</ul></li>
<li>Opcache:
<ul>
  <li><?php bugfix(67111); ?> (Memory leak when using "continue 2" inside two foreach loops).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(55618); ?> (use case-insensitive cert name matching).</li>
</ul></li>
<li>Pcntl:
<ul>
  <li><?php bugfix(60509); ?> (pcntl_signal doesn't decrease ref-count of old handler
    when setting SIG_DFL).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(66679); ?> (Alignment Bug in PCRE 8.34 upstream).</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(68697); ?> (lo_export return -1 on failure).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(68371); ?> (PDO#getAttribute() cannot be called with platform-specific
    attribute names).</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(68424); ?> (Add new PDO mysql connection attr to control multi
    statements option).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(66405); ?> (RecursiveDirectoryIterator::CURRENT_AS_PATHNAME
    breaks the RecursiveIterator).</li>
  <li><?php bugfix(65213); ?> (cannot cast SplFileInfo to boolean).</li>
  <li><?php bugfix(68479); ?> (Added escape parameter to SplFileObject::fputcsv).</li>
</ul></li>
<li>SQLite:
<ul>
  <li><?php bugfix(68120); ?> (Update bundled libsqlite to 3.8.7.2).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(68532); ?> (convert.base64-encode omits padding bytes).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.5.20"><!-- {{{ 5.5.20 -->
<h3>Version 5.5.20</h3>
<?php release_date('18-Dec-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(68091); ?> (Some Zend headers lack appropriate extern "C" blocks).</li>
  <li><?php bugfix(68185); ?> ("Inconsistent insteadof definition."- incorrectly triggered).</li>
  <li><?php bugfix(68370); ?> ("unset($this)" can make the program crash).</li>
  <li><?php bugfix(68545); ?> (NULL pointer dereference in unserialize.c).</li>
  <li><?php bugfix(68594); ?> (Use after free vulnerability in unserialize()). (CVE-2014-8142)</li>
</ul></li>
<li>Date:
<ul>
  <li>Fixed day_of_week function as it could sometimes return negative values internally.</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(68381); ?> (fpm_unix_init_main ignores log_level).</li>
  <li><?php bugfix(68420); ?> (listen=9000 listens to ipv6 localhost instead of all addresses).</li>
  <li><?php bugfix(68421); ?> (access.format='%R' doesn't log ipv6 address).</li>
  <li><?php bugfix(68423); ?> (PHP-FPM will no longer load all pools).</li>
  <li><?php bugfix(68428); ?> (listen.allowed_clients is IPv4 only).</li>
  <li><?php bugfix(68452); ?> (php-fpm man page is oudated).</li>
  <li><?php bugfix(68458); ?> (Change pm.start_servers default warning to notice).</li>
  <li><?php bugfix(68463); ?> (listen.allowed_clients can silently result in no allowed access).</li>
  <li><?php bugfix(68391); ?> (php-fpm conf files loading order).</li>
  <li><?php bugfix(68478); ?> (access.log don't use prefix).</li>
</ul></li>
<li>Mcrypt:
<ul>
  <li>Fixed possible read after end of buffer and use after free.</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(66584); ?> (Segmentation fault on statement deallocation).</li>
  <li><?php bugfix(67462); ?> (PDO_PGSQL::beginTransaction() wrongly throws exception
  when not in transaction).</li>
  <li><?php bugfix(68351); ?> (PDO::PARAM_BOOL and ATTR_EMULATE_PREPARES misbehaving).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(68361); ?> (Segmentation fault on SoapClient::__getTypes).</li>
</ul></li>
<li>zlib:
<ul>
  <li><?php bugfix(53829); ?> (Compiling PHP with large file support will replace
    function gzopen by gzopen64).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.19"><!-- {{{ 5.5.19 -->
<h3>Version 5.5.19</h3>
<?php release_date('13-Nov-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(68095); ?> (AddressSanitizer reports a heap buffer overflow in
    php_getopt()).</li>
  <li><?php bugfix(68118); ?> ($a-&gt;foo .= 'test'; can leave $a-&gt;foo undefined).</li>
  <li><?php bugfix(68129); ?> (parse_url() - incomplete support for empty usernames
    and passwords).</li>
  <li><?php bugfix(68365); ?> (zend_mm_heap corrupted after memory overflow in
    zend_hash_copy).</li>
</ul></li>
<li>cURL:
<ul>
  <li>Add CURL_SSLVERSION_TLSv1_0, CURL_SSLVERSION_TLSv1_1, and
    CURL_SSLVERSION_TLSv1_2 constants if supported by libcurl.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66242); ?> (libmagic: don't assume char is signed).</li>
  <li><?php bugfix(68283); ?> (fileinfo: out-of-bounds read in elf note headers).
    (CVE-2014-3710)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php implemented(55508); ?> (listen and listen.allowed_clients should take IPv6
    addresses.</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(65171); ?>imagescale() fails without height param</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(63595); ?> (GMP memory management conflicts with other libraries
    using GMP).</li>
</ul></li>
<li>Mysqli:
<ul>
  <li><?php bugfix(68114); ?> (linker error on some OS X machines with fixed width
    decimal support).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(68087); ?> (ODBC not correctly reading DATE column when preceded by
    a VARCHAR column)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(68128); ?> (Regression in RecursiveRegexIterator)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.18"><!-- {{{ 5.5.18 -->
<h3>Version 5.5.18</h3>
<?php release_date('16-Oct-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(67985); ?> (Incorrect last used array index copied to new array after
    unset).</li>
  <li><?php bugfix(67739); ?> (Windows 8.1/Server 2012 R2 OS build number reported
    as 6.2 (instead of 6.3)).</li>
  <li><?php bugfix(67633); ?> (A foreach on an array returned from a function not doing
    copy-on-write).</li>
  <li><?php bugfix(51800); ?> (proc_open on Windows hangs forever).</li>
  <li><?php bugfix(68044); ?> (Integer overflow in unserialize() (32-bits only)).
    (CVE-2014-3669)</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(68089); ?> (NULL byte injection - cURL lib).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(68113); ?> (Heap corruption in exif_thumbnail()). (CVE-2014-3670)</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(65641); ?> (PHP-FPM incorrectly defines the SCRIPT_NAME variable
    when using Apache, mod_proxy-fcgi and ProxyPass).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Revert regression introduced by fix of bug <?php bugl(41631); ?>.</li>
</ul></li>
<li>Reflection:
<ul>
  <li><?php bugfix(68103); ?> (Duplicate entry in Reflection for class alias).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(67972); ?> (SessionHandler Invalid memory read create_sid()).</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(68027); ?> (Global buffer overflow in mkgmtime() function).
    (CVE-2014-3668)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.17"><!-- {{{ 5.5.17 -->
<h3>Version 5.5.17</h3>
<?php release_date('18-Sep-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(47358); ?> (glob returns error, should be empty array()).</li>
  <li><?php bugfix(65463); ?> (SIGSEGV during zend_shutdown()).</li>
  <li><?php bugfix(66036); ?> (Crash on SIGTERM in apache process).</li>
  <li><?php bugfix(67878); ?> (program_prefix not honoured in man pages).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(41577); ?> (DOTNET is successful once per server run).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66091); ?> (memory leaks in DateTime constructor).</li>
  <li><?php bugfix(66985); ?> (Some timezones are no longer valid in PHP 5.5.10).</li>
  <li><?php bugfix(67109); ?> (First uppercase letter breaks date string parsing).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67606); ?> (FPM with mod_fastcgi/apache2.4 is broken).</li>
</ul></li>
<li>GD:
<ul>
  <li>Made fontFetch's path parser thread-safe.</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(67839); ?> (mysqli does not handle 4-byte floats correctly).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(41631); ?> (socket timeouts not honored in blocking SSL reads).</li>
  <li><?php bugfix(67850); ?> (extension won't build if openssl compiled without SSLv3).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(67813); ?> (CachingIterator::__construct InvalidArgumentException
    wrong message).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(67724); ?> (chained zlib filters silently fail with large amounts of
    data).</li>
  <li><?php bugfix(67865); ?> (internal corruption phar error).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.16"><!-- {{{ 5.5.16 -->
<h3>Version 5.5.16</h3>
<?php release_date('21-Aug-2014'); ?>
<ul><li>COM:
<ul>
  <li>Fixed missing type checks in com_event_sink.</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(67693); ?> (incorrect push to the empty array).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(67705); ?> (extensive backtracking in rule regular expression). (CVE-2014-3538)</li>
  <li><?php bugfix(67716); ?> (Segfault in cdf.c). (CVE-2014-3587).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67635); ?> (php links to systemd libraries without using pkg-config).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(66901); ?> (php-gd 'c_color' NULL pointer dereference). (CVE-2014-2497)</li>
  <li><?php bugfix(67730); ?> (Null byte injection possible with imagexxx functions).
    (CVE-2014-5120).</li>
</ul></li>
<li>Milter:
<ul>
    <li><?php bugfix(67715); ?> (php-milter does not build and crashes randomly).</li>
</ul></li>
<li>Network:
<ul>
  <li><?php bugfix(67717); ?> (segfault in dns_get_record). (CVE-2014-3597).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed missing type checks in OpenSSL options.</li>
</ul></li>
<li>readline:
<ul>
  <li><?php bugfix(55496); ?> (Interactive mode doesn't force a newline before the
    prompt).</li>
  <li><?php bugfix(67496); ?> (Save command history when exiting interactive shell
    with control-c).</li>
</ul></li>
<li>Sessions:
<ul>
  <li>Fixed missing type checks in php_session_create_id.</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(60616); ?> (odbc_fetch_into returns junk data at end of multi-byte
    char fields).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.15"><!-- {{{ 5.5.15 -->
<h3>Version 5.5.15</h3>
<?php release_date('24-Jul-2014'); ?>
<ul><li>CLI server:
<ul>
  <li><?php bugfix(67429); ?> (CLI server is missing some new HTTP response codes).</li>
  <li><?php bugfix(66830); ?> (Empty header causes PHP built-in web server to hang).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(67428); ?> (header('Location: foo') will override a 308-399 response
    code).</li>
  <li><?php bugfix(67436); ?> (Autoloader isn't called if two method definitions don't
    match).</li>
  <li><?php bugfix(67091); ?> (make install fails to install libphp5.so on FreeBSD 10.0).</li>
  <li><?php bugfix(67497); ?> eval with parse error causes segmentation fault in
    generator).</li>
    <li><?php bugfix(67151); ?> (strtr with empty array crashes).</li>
    <li><?php bugfix(67407); ?> (Windows 8.1/Server 2012 R2 reported as Windows 8/Server
    2012).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67530); ?> (error_log=syslog ignored).</li>
  <li><?php bugfix(67531); ?> (syslog cannot be set in pool configuratio).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(66921); ?> (Wrong argument type hint for function
    intltz_from_date_time_zone).</li>
  <li><?php bugfix(67052); ?> (NumberFormatter::parse() resets LC_NUMERIC setting).</li>
</ul></li>
<li>OPCache:
<ul>
    <li><?php bugfix(67215); ?> (php-cgi work with opcache, may be segmentation fault
    happen).</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(67550); ?> (Error in code "form" instead of "from", pgsql.c, line 756),
    which affected builds against libpq &lt; 7.3).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(67587); ?> (Redirection loop on nginx with FPM).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(67539); ?> (ArrayIterator use-after-free due to object change during
    sorting). (CVE-2014-4698)</li>
  <li><?php bugfix(67538); ?> (SPL Iterators use-after-free) (CVE-2014-4670).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(67430); ?> (http:// wrapper doesn't follow 308 redirects).</li>
</ul></li>
</ul>
<!-- }}} --></section>
<section class="version" id="5.5.14"><!-- {{{ 5.5.14 -->
<h3>Version 5.5.14</h3>
<?php release_date('26-Jun-2014'); ?>
<ul><li>CLI server:
<ul>
  <li><?php bugfix(67406); ?> (built-in web-server segfaults on startup).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(66622); ?> (Closures do not correctly capture the late bound class
    (static::) in some cases).</li>
  <li><?php bugfix(67390); ?> (insecure temporary file use in the configure script).
    (CVE-2014-3981).</li>
  <li><?php bugfix(67399); ?> (putenv with empty variable may lead to crash).</li>
  <li><?php bugfix(67498); ?> (phpinfo() Type Confusion Information Leak Vulnerability). (CVE-2014-4721)</li>
  <li>Fixed BC break introduced by patch for bug <?php bugl(67072); ?>.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(67308); ?> (Serialize of DateTime truncates fractions of second).</li>
  <li>Fixed regression in fix for bug <?php bugl(67118) ?> (constructor can't be called twice).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(67326); ?> (cdf_read_short_sector insufficient boundary check).
    (CVE-2014-0207)).</li>
  <li><?php bugfix(67410); ?> (mconvert incorrect handling of truncated pascal
    string size). (CVE-2014-3478).</li>
  <li><?php bugfix(67411); ?> (cdf_check_stream_offset insufficient boundary
    check). (CVE-2014-3479).</li>
  <li><?php bugfix(67412); ?> (cdf_count_chain insufficient boundary check).
    (CVE-2014-3480).</li>
  <li><?php bugfix(67413); ?> (cdf_read_property_info insufficient boundary
    check). (CVE-2014-3487).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(67349); ?> (Locale::parseLocale Double Free).</li>
  <li><?php bugfix(67397); ?> (Buffer overflow in locale_get_display_name and
    uloc_getDisplayName (libicu 4.8.1)).</li>
</ul></li>
<li>Network:
<ul>
  <li><?php bugfix(67432); ?> (Fix potential segfault in dns_get_record()).
    (CVE-2014-4049)).</li>
</ul></li>
<li>OPCache:
<ul>
  <li><?php githubissue('zendtech/ZendOptimizerPlus', 183); ?> (TMP_VAR is not only used once).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(65698); ?> (certificates validity parsing does not work past 2050).</li>
  <li><?php bugfix(66636); ?> (openssl_x509_parse warning with V_ASN1_GENERALIZEDTIME).</li>
</ul></li>
<li>PDO-ODBC:
<ul>
  <li><?php bugfix(50444); ?> (PDO-ODBC changes for 64-bit).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php implemented(49898); ?> (Add SoapClient::__getCookies()).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(66127); ?> (Segmentation fault with ArrayObject unset).</li>
  <li><?php bugfix(67359); ?> (Segfault in recursiveDirectoryIterator).</li>
  <li><?php bugfix(67360); ?> (Missing element after ArrayObject::getIterator).</li>
  <li><?php bugfix(67492); ?> (unserialize() SPL ArrayObject / SPLObjectStorage Type
    Confusion). (CVE-2014-3515).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.13"><!-- {{{ 5.5.13 -->
<h3>Version 5.5.13</h3>
<?php release_date('29-May-2014'); ?>
<ul><li>CLI server:
<ul>
  <li><?php bugfix(67079); ?> (Missing MIME types for XML/XSL files).</li>
</ul></li>
<li>COM:
<ul>
  <li><?php bugfix(66431); ?> (Special Character via COM Interface (CP_UTF8)).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(65701); ?> (copy() doesn't work when destination filename is created
    by tempnam()).</li>
  <li><?php bugfix(67072); ?> (Echoing unserialized "SplFileObject" crash).</li>
  <li><?php bugfix(67245); ?> (usage of memcpy() with overlapping src and dst in
    zend_exceptions.c).</li>
  <li><?php bugfix(67247); ?> (spl_fixedarray_resize integer overflow).</li>
  <li><?php bugfix(67249); ?> (printf out-of-bounds read).</li>
  <li><?php bugfix(67250); ?> (iptcparse out-of-bounds read).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(64247); ?> (CURLOPT_INFILE doesn't allow reset).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(67118); ?> (DateTime constructor crash with invalid data).</li>
  <li><?php bugfix(67251); ?> (date_parse_from_format out-of-bounds read).</li>
  <li><?php bugfix(67253); ?> (timelib_meridian_with_check out-of-bounds read).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(67081); ?> (DOMDocumentType->internalSubset returns entire DOCTYPE tag,
    not only the subset).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66307); ?> (Fileinfo crashes with powerpoint files).</li>
  <li><?php bugfix(67327); ?> (CDF infinite loop in nelements DoS) (CVE-2014-0238).</li>
  <li><?php bugfix(67328); ?> (numerous file_printf calls resulting in
    performance degradation) (CVE-2014-0237).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(66908); ?> (php-fpm reload leaks epoll_create() file descriptor).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(67248); ?> (imageaffinematrixget missing check of parameters).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(67248); ?> Ungreedy and min/max quantifier bug, applied patch
    from the upstream.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(64498); ?> ($phar->buildFromDirectory can't compress file with an accent
    in its name).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.12"><!-- {{{ 5.5.12 -->
<h3>Version 5.5.12</h3>
<?php release_date('01-May-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(61019); ?> (Out of memory on command stream_get_contents).</li>
  <li><?php bugfix(64330); ?> (stream_socket_server() creates wrong Abstract Namespace
    UNIX sockets).</li>
  <li><?php bugfix(66182); ?> (exit in stream filter produces segfault).</li>
  <li><?php bugfix(66736); ?> (fpassthru broken).</li>
  <li><?php bugfix(67024); ?> (getimagesize should recognize BMP files with negative
    heighty).</li>
  <li><?php bugfix(67043); ?> (substr_compare broke by previous change).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(66562); ?> (curl_exec returns differently than curl_multi_getcontent).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66721); ?> (__wakeup of DateTime segfaults when invalid object data is
    supplied).</li>
</ul></li>
<li>Embed:
<ul>
  <li><?php bugfix(65715); ?> (php5embed.lib isn't provided anymore).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66987); ?> (Memory corruption in fileinfo ext / bigendian).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(66482); ?> (unknown entry 'priority' in php-fpm.conf).</li>
  <li><?php bugfix(67060); ?> (possible privilege escalation due to insecure default configuration). (CVE-2014-0185)).</li>
</ul></li>
<li>Json:
<ul>
  <li><?php bugfix(66021); ?> (Blank line inside empty array/object when
    JSON_PRETTY_PRINT is set).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed issue with null bytes in LDAP bindings.</li>
</ul></li>
<li>mysqli:
<ul>
  <li>Fixed problem in mysqli_commit()/mysqli_rollback() with second parameter
    (extra comma) and third parameters (lack of escaping).</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(66942); ?> (memory leak in openssl_seal()).</li>
  <li><?php bugfix(66952); ?> (memory leak in openssl_open()).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(66084); ?> (simplexml_load_string() mangles empty node name).</li>
</ul></li>
<li>SQLite:
<ul>
  <li><?php bugfix(66967); ?> (Updated bundled libsqlite to 3.8.4.3)</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(53965); ?> (&lt;xsl:include&gt; cannot find files with relative paths
    when loaded with "file://")</li>
</ul></li>
<li>Apache2 Handler SAPI:
<ul>
  <li>Fixed Apache log issue caused by APR's lack of support for %zu
    (APR issue https://issues.apache.org/bugzilla/show_bug.cgi?id=56120)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.11"><!-- {{{ 5.5.11 -->
<h3>Version 5.5.11</h3>
<?php release_date('03-Apr-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(60602); ?> (proc_open() changes environment array).</li>
  <li>Allow zero length comparison in substr_compare().</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(66109); ?> (Can't reset CURLOPT_CUSTOMREQUEST to default behaviour).</li>
  <li>Fix compilation on libcurl versions between 7.10.5 and 7.12.2, inclusive.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66946); ?> (fileinfo: extensive backtracking in awk rule regular expression). (CVE-2013-7345)</li>
</ul></li>
<li>FPM:
<ul>
  <li>Added clear_env configuration directive to disable clearenv() call.</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(66714); ?> (imageconvolution breakage).</li>
  <li><?php bugfix(66869); ?> (Invalid 2nd argument crashes imageaffinematrixget).</li>
  <li><?php bugfix(66887); ?> (imagescale - poor quality of scaled image).</li>
  <li><?php bugfix(66890); ?> (imagescale segfault).</li>
  <li><?php bugfix(66893); ?> (imagescale ignore method argument).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(66872); ?> (invalid argument crashes gmp_testbit).</li>
</ul></li>
<li>Hash:
<ul>
  <li>hash_pbkdf2() now works correctly if the $length argument is not specified.</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(66873); ?> A reproductible crash in UConverter when given invalid encoding.</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(66535); ?> (Don't add newline after X-PHP-Originating-Script).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(66762); ?> (Segfault in mysqli_stmt::bind_result() when link closed).</li>
</ul></li>
<li>OPCache:
<ul>
  <li>Added function opcache_is_script_cached().</li>
  <li>Added information about interned strings usage.</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(66833); ?> (Default disgest algo is still MD5, switch to SHA1).</li>
</ul></li>
<li>SQLite:
<ul>
  <li>Updated bundled libsqlite to 3.8.3.1.</li>
</ul></li>
<li>SPL:
<ul>
  <li>Added feature <?php bugl(65545); ?> (SplFileObject::fread()).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.10"><!-- {{{ 5.5.10 -->
<h3>Version 5.5.10</h3>
<?php release_date('06-Mar-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66574); ?> (Allow multiple paths in php_ini_scanned_path).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(45528); ?> (Allow the DateTimeZone constructor to accept timezones
    per offset too).</li>
  <li><?php bugfix(44780); ?> (some time zone offsets not recognized by timezone_name_from_abbr)</li>
  <li><?php bugfix(45543); ?> (DateTime::setTimezone can not set timezones without ID)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66731); ?> (file: infinite recursion (CVE-2014-1943)).</li>
  <li><?php bugfix(66820); ?> (out-of-bounds memory access in fileinfo (CVE-2014-2270)).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(66815); ?> (imagecrop(): insufficient fix for NULL defer (CVE-2013-7327)).</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(65753); ?> (JsonSerializeable couldn't implement on module extension).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Implemented ldap_modify_batch (https://wiki.php.net/rfc/ldap_modify_batch).</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(66501); ?> (Add EC key support to php_openssl_is_private_key).</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgraded to PCRE 8.34.</li>
</ul></li>
<li>Pgsql:
<ul>
  <li>Added warning for dangerous client encoding and remove possible injections
    for pg_insert()/pg_update()/pg_delete()/pg_select().</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.9"><!-- {{{ 5.5.9 -->
<h3>Version 5.5.9</h3>
<?php release_date('06-Feb-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66509); ?> (copy() arginfo has changed starting from 5.4).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(66356); ?> (Heap Overflow Vulnerability in imagecrop(), CVE-2013-7226).</li>
</ul></li>
<li>OPCache:
<ul>
  <li><?php bugfix(66474); ?> (Optimizer bug in constant string to boolean conversion).</li>
  <li><?php bugfix(66461); ?> (PHP crashes if opcache.interned_strings_buffer=0).</li>
  <li><?php bugfix(66298); ?> (ext/opcache/Optimizer/zend_optimizer.c has dos-style ^M as lineend).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(62479); ?> (PDO-pgsql cannot connect if password contains spaces).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(66412); ?> (readline_clear_history() with libedit causes segfault after <?php bugl(65714); ?>).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(66469); ?> (Session module is sending multiple set-cookie headers when session.use_strict_mode=1).</li>
  <li><?php bugfix(66481); ?> (Segfaults on session_name()).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(66395); ?> (basename function doesn't remove drive letter).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(66381); ?> (__ss_family was changed on AIX 5.3).</li>
</ul></li>
<li>Zend Engine:
<ul>
  <li><?php bugfix(66009); ?> (Failed compilation of PHP extension with C++ std library using VS 2012).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.8"><!-- {{{ 5.5.8 -->
<h3>Version 5.5.8</h3>
<?php release_date('09-Jan-2014'); ?>
<ul><li>Core:
<ul>
  <li>Disallowed JMP into a finally block.</li>
  <li>Added validation of class names in the autoload process.</li>
  <li>Fixed invalid C code in zend_strtod.c.</li>
  <li><?php bugfix(66041); ?> (list() fails to unpack yielded ArrayAccess object).</li>
  <li><?php bugfix(65764); ?> (generators/throw_rethrow FAIL with ZEND_COMPILE_EXTENDED_INFO).</li>
  <li><?php bugfix(61645); ?> (fopen and O_NONBLOCK).</li>
  <li><?php bugfix(66218); ?> (zend_register_functions breaks reflection).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66060); ?> (Heap buffer over-read in DateInterval, CVE-2013-6712).</li>
  <li><?php bugfix(65768); ?> (DateTimeImmutable::diff does not work).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(65196); ?> (Passing DOMDocumentFragment to DOMDocument::saveHTML()
    Produces invalid Markup).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(65873); ?> (Integer overflow in exif_read_data()).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(66229); ?> (128.0.0.0/16 isn't reserved any longer).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(64405); ?> (Use freetype-config for determining freetype2 dir(s)).</li>
</ul></li>
<li>PDO_odbc:
<ul>
  <li><?php bugfix(66311); ?> (Stack smashing protection kills PDO/ODBC queries).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(65486); ?> (mysqli_poll() is broken on win x64).</li>
</ul></li>
<li>OPCache:
<ul>
  <li>Fixed revalidate_path=1 behavior to avoid caching of symlinks values.</li>
  <li><?php githubissue('zendtech/ZendOptimizerPlus', 140); ?> ("opcache.enable_file_override" doesn't respect
    "opcache.revalidate_freq".)</li>
</ul></li>
<li>SNMP:
<ul>
  <li>Fixed SNMP_ERR_TOOBIG handling for bulk walk operations.</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(66112); ?> (Use after free condition in SOAP extension).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(65923); ?> (ext/socket assumes AI_V4MAPPED is defined).</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(49634); ?> (Segfault throwing an exception in a XSL registered function).</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(66321); ?> (ZipArchive::open() ze_obj->filename_len not real).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.7"><!-- {{{ 5.5.7 -->
<h3>Version 5.5.7</h3>
<?php release_date('12-Dec-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66094); ?> (unregister_tick_function tries to cast a Closure to a string).</li>
  <li><?php bugfix(65969); ?> (Chain assignment with T_LIST failure).</li>
</ul></li>
<li>CLI server:
<ul>
  <li>Added some MIME types to the CLI web server.</li>
  <li><?php implemented(65917); ?> (getallheaders() is not supported by the built-in web
    server) - also implements apache_response_headers()</li>
</ul></li>
<li>OPCache:
<ul>
  <li><?php bugfix(66176); ?> (Invalid constant substitution).</li>
  <li><?php bugfix(65915); ?> (Inconsistent results with require return value).</li>
  <li><?php bugfix(65559); ?> (Opcache: cache not cleared if changes occur while running).</li>
</ul></li>
<li>readline:
<ul>
  <li><?php bugfix(65714); ?> (PHP cli forces the tty to cooked mode).</li>
</ul></li>
<li>Openssl:
<ul>
  <li>Fixed memory corruption in openssl_x509_parse() (CVE-2013-6420).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.6"><!-- {{{ 5.5.6 -->
<h3>Version 5.5.6</h3>
<?php release_date('14-Nov-2013'); ?>
<ul><li>Core:
<ul>
  <li>Improved performance of array_merge() and func_get_args() by eliminating useless copying.</li>
  <li><?php bugfix(65947); ?> (basename is no more working after fgetcsv in certain situation).</li>
  <li><?php bugfix(65939); ?> (Space before ";" breaks php.ini parsing).</li>
  <li><?php bugfix(65911); ?> (scope resolution operator - strange behavior with $this).</li>
  <li><?php bugfix(65936); ?> (dangling context pointer causes crash).</li>
</ul></li>
<li>FPM:
<ul>
  <li>Changed default listen() backlog to 65535.</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(64874); ?> (json_decode handles whitespace incorrectly).</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(66043); ?> (Segfault calling bind_param() on mysqli).</li>
</ul></li>
<li>OPCache:
<ul>
  <li>Increased limit for opcache.max_accelerated_files to 1,000,000.</li>
  <li><?php githubissue('zendtech/ZendOptimizerPlus', 115); ?> (path issue when using phar).</li>
  <li><?php githubissue('zendtech/ZendOptimizerPlus', 149); ?> (Phar mount points not working with OPcache enabled).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(65950); ?> (Field name truncation if the field name is bigger than 32 characters).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(66033); ?> (Segmentation Fault when constructor of PDO statement throws an exception).</li>
  <li><?php bugfix(65946); ?> (sql_parser permanently converts values bound to strings).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(64760); ?> (var_export() does not use full precision for floating-point numbers).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.5"><!-- {{{ 5.5.5 -->
<h3>Version 5.5.5</h3>
<?php release_date('17-Oct-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(64979); ?> (Wrong behavior of static variables in closure generators).</li>
  <li><?php bugfix(65322); ?> (compile time errors won't trigger auto loading).</li>
  <li><?php bugfix(65821); ?> (By-ref foreach on property access of string offset segfaults).</li>
</ul></li>
<li>CLI Server:
<ul>
  <li><?php bugfix(65633); ?> (built-in server treat some http headers as case-sensitive).</li>
  <li><?php bugfix(65818); ?> (Segfault with built-in webserver and chunked transfer encoding).</li>
  <li>Added application/pdf to PHP CLI Web Server mime types</li>
</ul></li>
<li>Datetime:
<ul>
  <li><?php bugfix(64157); ?> (DateTime::createFromFormat() reports confusing error message).</li>
  <li><?php bugfix(65502); ?> (DateTimeImmutable::createFromFormat returns DateTime).</li>
  <li><?php bugfix(65548); ?> (Comparison for DateTimeImmutable doesn't work).</li>
</ul></li>
<li>DBA:
<ul>
  <li><?php bugfix(65708); ?> (dba functions cast $key param to string in-place, bypassing copy on write).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Add RFC 6598 IPs to reserved addresses.</li>
  <li><?php bugfix(64441); ?> (FILTER_VALIDATE_URL rejects fully qualified domain names).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(65667); ?> (ftp_nb_continue produces segfault).</li>
</ul></li>
<li>GD:
<ul>
  <li>Ensure that the defined interpolation method is used with the generic scaling methods.</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(65721); ?> (configure script broken in 5.5.4 and 5.4.20 when enabling imap).</li>
</ul></li>
<li>OPCache:
<ul>
  <li><?php bugfix(65845); ?> (Error when Zend Opcache Optimizer is fully enabled).</li>
  <li><?php bugfix(65665); ?> (Exception not properly caught when opcache enabled).</li>
  <li><?php bugfix(65510); ?> (5.5.2 crashes in _get_zval_ptr_ptr_var).</li>
  <li><?php githubissue('zendtech/ZendOptimizerPlus', 135); ?> (segfault in interned strings if initial memory is too low).</li>
  <li>Added function opcache_compile_file() to load PHP scripts into cache without execution.</li>
  <li>Added support for GNU Hurd.</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(65808); ?> (the socket_connect() won't work with IPv6 address).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(64782); ?> (SplFileObject constructor make $context optional / give it a default value).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(61548); ?> content-type must appear at the end of headers for 201 Location to work in http.</li>
</ul></li>
<li>XMLReader:
<ul>
  <li><?php bugfix(51936); ?> Crash with clone XMLReader.</li>
  <li><?php bugfix(64230); ?> XMLReader does not suppress errors.</li>
</ul></li>
<li>Build system:
<ul>
  <li><?php bugfix(51076); ?> Race condition in shtool's mkdir -p implementation.</li>
  <li><?php bugfix(62396); ?> 'make test' crashes starting with 5.3.14 (missing gzencode()).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.4"><!-- {{{ 5.5.4 -->
<h3>Version 5.5.4</h3>
<?php release_date('19-Sep-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(60598); ?> (cli/apache sapi segfault on objects manipulation).</li>
  <li>Improved fputcsv() to allow specifying escape character.</li>
  <li><?php bugfix(65483); ?> (quoted-printable encode stream filter incorrectly encoding spaces).</li>
  <li><?php bugfix(65470); ?> (Segmentation fault in zend_error() with --enable-dtrace).</li>
  <li><?php bugfix(65490); ?> (Duplicate calls to get lineno &amp; filename for DTRACE_FUNCTION_*).</li>
  <li><?php bugfix(65225); ?> (PHP_BINARY incorrectly set).</li>
  <li><?php bugfix(62692); ?> (PHP fails to build with DTrace). </li>
  <li><?php bugfix(61759); ?> (class_alias() should accept classes with leading backslashes). </li>
  <li><?php bugfix(46311); ?> (Pointer aliasing issue results in miscompile on gcc4.4). </li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(65458); ?> (curl memory leak).</li>
</ul></li>
<li>Datetime:
<ul>
  <li><?php bugfix(65554); ?> (createFromFormat broken when weekday name is followed by some delimiters).</li>
  <li><?php bugfix(65564); ?> (stack-buffer-overflow in DateTimeZone stuff caught by AddressSanitizer).</li>
</ul></li>
<li>OPCache:
<ul>
  <li><?php bugfix(65561); ?> (Zend Opcache on Solaris 11 x86 needs ZEND_MM_ALIGNMENT=4).</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(64802); ?> (openssl_x509_parse fails to parse subject properly in some cases).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(65475); ?> (Session ID is not initialized properly when strict session is enabled).</li>
  <li><?php bugfix(51127); ?> and <?php bugl(65359); ?>, FR <?php bugl(25630); ?>/<?php bugl(43980); ?>/<?php bugl(54383); ?> (Added php_serialize session serialize handler that uses plain serialize())</li>
</ul></li>
<li>Standard:
<ul>
  <li> Fix issue with return types of password API helper functions. Found via static analysis by cjones.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.3"><!-- {{{ 5.5.3 -->
<h3>Version 5.5.3</h3>
<?php release_date('22-Aug-2013'); ?>
<ul><li>Openssl:
<ul>
  <li>Fixed UMR in fix for CVE-2013-4248.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.2"><!-- {{{ 5.5.2 -->
<h3>Version 5.5.2</h3>
<?php release_date('15-Aug-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(65372); ?> (Segfault in gc_zval_possible_root when return reference fails).</li>
  <li>Fixed value of FILTER_SANITIZE_FULL_SPECIAL_CHARS constant (previously was erroneously set to FILTER_SANITIZE_SPECIAL_CHARS value). </li>
  <li><?php bugfix(65304); ?> (Use of max int in array_sum).</li>
  <li><?php bugfix(65291); ?> (get_defined_constants() causes PHP to crash in a very limited case).</li>
  <li><?php bugfix(62691); ?> (solaris sed has no -i switch).</li>
  <li><?php bugfix(61345); ?> (CGI mode - make install don't work).</li>
  <li><?php bugfix(61268); ?> (--enable-dtrace leads make to clobber Zend/zend_dtrace.d).</li>
</ul></li>
<li>DOM:
<ul>
  <li>Added flags option to DOMDocument::schemaValidate() and DOMDocument::schemaValidateSource(). Added LIBXML_SCHEMA_CREATE flag.</li>
</ul></li>
<li>OPcache:
<ul>
  <li>Added opcache.restrict_api configuration directive that may limit usage of OPcahce API functions only to patricular script(s).</li>
  <li>Added support for glob symbols in blacklist entries (?, *, **).</li>
  <li><?php bugfix(65338); ?> (Enabling both php_opcache and php_wincache AVs on shutdown).</li>
</ul></li>
<li>Openssl:
<ul>
  <li>Fixed handling null bytes in subjectAltName (CVE-2013-4248).</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(65299); ?> (pdo mysql parsing errors).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(65028); ?> (Phar::buildFromDirectory creates corrupt archives for some specific contents).</li>
</ul></li>
<li>Pgsql:
<ul>
  <li><?php bugfix(62978); ?> (Disallow possible SQL injections with pg_select()/pg_update() /pg_delete()/pg_insert()).</li>
  <li><?php bugfix(65336); ?> (pg_escape_literal/identifier() silently returns false).</li>
</ul></li>
<li>Sessions:
<ul>
  <li>Implemented strict sessions RFC (https://wiki.php.net/rfc/strict_sessions) which protects against session fixation attacks and session collisions (CVE-2011-4718).</li>
  <li>Fixed possible buffer overflow under Windows. Note: Not a security fix.</li>
  <li>Changed session.auto_start to PHP_INI_PERDIR.</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(65018); ?> (SoapHeader problems with SoapServer).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(65328); ?> (Segfault when getting SplStack object Value).</li>
  <li>Added RecursiveTreeIterator setPostfix and getPostifx methods.</li>
  <li><?php bugfix(61697); ?> (spl_autoload_functions returns lambda functions incorrectly).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(65268); ?> (select() implementation uses outdated tick API).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.1"><!-- {{{ 5.5.1 -->
<h3>Version 5.5.1</h3>
<?php release_date('18-Jul-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(65254); ?> (Exception not catchable when exception thrown in autoload with a namespace).</li>
  <li><?php bugfix(65088); ?> (Generated configure script is malformed on OpenBSD).</li>
  <li><?php bugfix(65108); ?> (is_callable() triggers Fatal Error).</li>
  <li><?php bugfix(65035); ?> (yield / exit segfault).</li>
  <li><?php bugfix(65161); ?> (Generator + autoload + syntax error = segfault).</li>
  <li><?php bugfix(65226); ?> (chroot() does not get enabled).</li>
  <li>hex2bin() raises E_WARNING for invalid hex string.</li>
</ul></li>
<li>OPcache:
<ul>
  <li><?php bugfix(64827); ?> (Segfault in zval_mark_grey (zend_gc.c)).</li>
  <li>OPcache is now compatible with LiteSpeed SAPI.</li>
</ul></li>
<li>CGI:
<ul>
  <li><?php bugfix(65143); ?> (Missing php-cgi man page).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(65066); ?> (Cli server not responsive when responding with 422 http status code).</li>
</ul></li>
<li>DateTime:
<ul>
  <li><?php bugfix(65184); ?> (strftime() returns insufficient-length string under multibyte locales).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(65070); ?> (bgcolor does not use the same format as the input image with imagerotate).</li>
  <li><?php bugfix(65060); ?> (imagecreatefrom... crashes with user streams).</li>
  <li><?php bugfix(65084); ?> (imagecreatefromjpeg fails with URL).</li>
  <li>Fix gdImageCreateFromWebpCtx and use same logic to load WebP image that other formats.</li>
</ul></li>
<li>Intl:
<ul>
  <li>Add IntlCalendar::setMinimalDaysInFirstWeek()/intlcal_set_minimal_days_in_first_week().</li>
  <li>Fixed trailing space in name of constant IntlCalendar::FIELD_FIELD_COUNT.</li>
  <li><?php bugfix(62759); ?> (Buggy grapheme_substr() on edge case).</li>
  <li><?php bugfix(61860); ?> (Offsets may be wrong for grapheme_stri* functions).</li>
</ul></li>
<li>OCI8:
<ul>
  <li>Bump PECL package info version check to allow PECL installs with PHP 5.5+.</li>
</ul></li>
<li>PDO:
<ul>
  <li>Allowed PDO_OCI to compile with Oracle Database 12c client libraries.</li>
</ul></li>
<li>Pgsql:
<ul>
  <li>pg_unescape_bytea() raises E_WARNING for invalid inputs.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(65142); ?> (Missing phar man page).</li>
</ul></li>
<li>Session:
<ul>
  <li>Added optional create_sid() argument to session_set_save_handler(), SessionHandler and new SessionIdInterface.</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugl(63472); ?>Setting SO_BINDTODEVICE with socket_set_option.</li>
  <li>Allowed specifying paths in the abstract namespace for the functions socket_bind(), socket_connect() and socket_sendmsg().</li>
  <li><?php bugfix(65260); ?>sendmsg() ancillary data construction for SCM_RIGHTS is faulty.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(65136); ?>RecursiveDirectoryIterator segfault.</li>
  <li><?php bugfix(61828); ?>Memleak when calling Directory(Recursive)Iterator/Spl(Temp)FileObject ctor twice.</li>
</ul></li>
<li>CGI/FastCGI SAPI:
<ul>
  <li>Added PHP_FCGI_BACKLOG, overrides the default listen backlog.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.5.0"><!-- {{{ 5.5.0 -->
<h3>Version 5.5.0</h3>
<?php release_date('20-Jun-2013'); ?>
<ul>
<li>Drop support for bison &lt; 2.4 when building PHP from GIT source</li>
</ul>

<ul>
<li>Improved Zend Engine:
<ul>
 <li>Added ARMv7/v8 versions of various Zend arithmetic functions that are implemented using inline assembler</li>
 <li>Added systemtap support by enabling systemtap compatible dtrace probes on linux</li>
 <li>Optimized access to temporary and compiled VM variables. 8% less memory reads</li>
 <li>The VM stacks for passing function arguments and syntaticaly nested calls
    were merged into a single stack. The stack size needed for op_array
    execution is calculated at compile time and preallocated at once. As result
    all the stack push operations don't require checks for stack overflow
    any more</li>
</ul></li>
</ul>

<ul>
<li>General improvements:
<ul>
 <li>Added generators and coroutines.</li>
 <li>Added "finally" keyword. </li>
 <li>Added simplified password hashing API.</li>
 <li>Added support for constant array/string dereferencing.</li>
 <li>Added Class Name Resolution As Scalar Via "class" Keyword</li>
 <li>Added support for using empty() on the result of function calls and other expressions</li>
 <li>Added support for non-scalar Iterator keys in foreach</li>
 <li>Added support for list in foreach</li>
</ul></li>
</ul>

<ul>
<li>Core:
<ul>
 <li>Added Zend Opcache extension and enable building it by default.</li>
 <li>Added array_column function which returns a column in a multidimensional array</li>
 <li>Added boolval()</li>
 <li>Added "Z" option to pack/unpack</li>
 <li>Added optional second argument for assert() to specify custom message</li>
 <li>Added support for changing the process's title in CLI/CLI-Server SAPIs. The implementation is more robust that the proctitle PECL module</li>
 <li>Improve set_exception_handler while doing reset</li>
 <li>Return previous handler when passing NULL to set_error_handler and set_exception_handler</li>
 <li><?php implemented(64175); ?> (Added HTTP codes as of RFC 6585)</li>
 <li><?php implemented(60738); ?> (Allow 'set_error_handler' to handle NULL)</li>
 <li><?php implemented(60524); ?> (specify temp dir by php.ini)</li>
 <li><?php implemented(46487); ?> (Dereferencing process-handles no longer waits on those processes)</li>
 <li><?php bugfix(65051); ?> (count() off by one inside unset())</li>
 <li><?php bugfix(64988); ?> (Class loading order affects E_STRICT warning)</li>
 <li><?php bugfix(64966); ?> (segfault in zend_do_fcall_common_helper_SPEC)</li>
 <li><?php bugfix(64960); ?> (Segfault in gc_zval_possible_root)</li>
 <li><?php bugfix(64936); ?> (doc comments picked up from previous scanner run)</li>
 <li><?php bugfix(64934); ?> (Apache2 TS crash with get_browser())</li>
 <li><?php bugfix(64879); ?> (Heap based buffer overflow in quoted_printable_encode, CVE 2013-2110)</li>
 <li><?php bugfix(64853); ?> (Use of no longer available ini directives causes crash on TS build)</li>
 <li><?php bugfix(64821); ?> (Custom Exceptions crash when internal properties overridden)</li>
 <li><?php bugfix(64720); ?> (SegFault on zend_deactivate).</li>
 <li><?php bugfix(64677); ?> (execution operator `` stealing surrounding arguments)</li>
 <li><?php bugfix(64660); ?> (Segfault on memory exhaustion within function definition)</li>
 <li><?php bugfix(64578); ?> (debug_backtrace in set_error_handler corrupts zend heap: segfault)</li>
 <li><?php bugfix(64565); ?> (copy doesn't report failure on partial copy)</li>
 <li><?php bugfix(64555); ?> (foreach no longer copies keys if they are interned)</li>
 <li><?php bugfix(47675); ?> and <?php bugfix(64577); ?> (fd leak on Solaris)</li>
 <li><?php bugfix(64544); ?> (Valgrind warnings after using putenv)</li>
 <li><?php bugfix(64515); ?> (Memoryleak when using the same variablename 2times in function declaration)</li>
 <li><?php bugfix(64503); ?> (Compilation fails with error: conflicting types for 'zendparse')</li>
 <li><?php bugfix(64239); ?> (Debug backtrace changed behavior since 5.4.10 or 5.4.11)</li>
 <li><?php bugfix(64523); ?> allow XOR in php.ini</li>
 <li><?php bugfix(64354); ?> (Unserialize array of objects whose class can't be autoloaded fail)</li>
 <li><?php bugfix(64370); ?> (microtime(true) less than $_SERVER['REQUEST_TIME_FLOAT'])</li>
 <li><?php bugfix(64166); ?> (quoted-printable-encode stream filter incorrectly discarding whitespace)</li>
 <li><?php bugfix(64142); ?> (dval to lval different behavior on ppc64)</li>
 <li><?php bugfix(64135); ?> (Exceptions from set_error_handler are not always propagated)</li>
 <li><?php bugfix(63980); ?> (object members get trimmed by zero bytes)</li>
 <li><?php bugfix(63874); ?> (Segfault if php_strip_whitespace has heredoc)</li>
 <li><?php bugfix(63830); ?> (Segfault on undefined function call in nested generator)</li>
 <li><?php bugfix(63822); ?> (Crash when using closures with ArrayAccess)</li>
 <li><?php bugfix(61681); ?> (Malformed grammar)</li>
 <li><?php bugfix(61038); ?> (unpack("a5", "str\0\0") does not work as expected)</li>
 <li><?php bugfix(61025); ?> (__invoke() visibility not honored)</li>
 <li><?php bugfix(60833); ?> (self, parent, static behave inconsistently case-sensitive)</li>
 <li><?php bugfix(52126); ?> timestamp for mail.log</li>
 <li><?php bugfix(49348); ?> (Uninitialized ++$foo->bar; does not cause a notice)</li>
 <li><?php bugfix(23955); ?> allow specifying Max-Age attribute in setcookie()</li>
 <li><?php bugfix(18556); ?> (Engine uses locale rules to handle class names)</li>
 <li>Fix undefined behavior when converting double variables to integers. The double is now always rounded towards zero, the remainder of its division by 2^32 or 2^64 (depending on sizeof(long)) is calculated and it's made signed assuming a two's complement representation</li>
</ul></li>
</ul>

<ul>
<li>Removed legacy features:
<ul>
 <li>Remove php_logo_guid(), php_egg_logo_guid(), php_real_logo_guid(), zend_logo_guid()</li>
 <li>Drop Windows XP and 2003 support</li>
</ul></li>
</ul>

<ul>
<li>Apache2 Handler SAPI:
<ul>
 <li>Enabled Apache 2.4 configure option for Windows.</li>
</ul></li>
</ul>

<ul>
<li>Calendar:
<ul>
 <li><?php bugfix(64895); ?> (Integer overflow in SndToJewish).</li>
 <li><?php bugfix(54254); ?> (cal_from_jd returns month = 6 when there is only one Adar).</li>
</ul></li>
</ul>

<ul>
<li>CLI server:
<ul>
  <li><?php bugfix(64128); ?> (buit-in web server is broken on ppc64).</li>
</ul></li>
</ul>

<ul>
<li>CURL:
<ul>
 <li>Remove curl stream wrappers.</li>
 <li><?php implemented(46439); ?> (added CURLFile for safer file uploads).</li>
 <li>Added support for CURLOPT_FTP_RESPONSE_TIMEOUT, CURLOPT_APPEND,
    CURLOPT_DIRLISTONLY, CURLOPT_NEW_DIRECTORY_PERMS, CURLOPT_NEW_FILE_PERMS,
    CURLOPT_NETRC_FILE, CURLOPT_PREQUOTE, CURLOPT_KRBLEVEL, CURLOPT_MAXFILESIZE,
    CURLOPT_FTP_ACCOUNT, CURLOPT_COOKIELIST, CURLOPT_IGNORE_CONTENT_LENGTH,
    CURLOPT_CONNECT_ONLY, CURLOPT_LOCALPORT, CURLOPT_LOCALPORTRANGE,
    CURLOPT_FTP_ALTERNATIVE_TO_USER, CURLOPT_SSL_SESSIONID_CACHE,
    CURLOPT_FTP_SSL_CCC, CURLOPT_HTTP_CONTENT_DECODING,
    CURLOPT_HTTP_TRANSFER_DECODING, CURLOPT_PROXY_TRANSFER_MODE,
    CURLOPT_ADDRESS_SCOPE, CURLOPT_CRLFILE, CURLOPT_ISSUERCERT,
    CURLOPT_USERNAME, CURLOPT_PASSWORD, CURLOPT_PROXYUSERNAME,
    CURLOPT_PROXYPASSWORD, CURLOPT_NOPROXY, CURLOPT_SOCKS5_GSSAPI_NEC,
    CURLOPT_SOCKS5_GSSAPI_SERVICE, CURLOPT_TFTP_BLKSIZE,
    CURLOPT_SSH_KNOWNHOSTS, CURLOPT_FTP_USE_PRET, CURLOPT_MAIL_FROM,
    CURLOPT_MAIL_RCPT, CURLOPT_RTSP_CLIENT_CSEQ, CURLOPT_RTSP_SERVER_CSEQ,
    CURLOPT_RTSP_SESSION_ID, CURLOPT_RTSP_STREAM_URI, CURLOPT_RTSP_TRANSPORT,
    CURLOPT_RTSP_REQUEST, CURLOPT_RESOLVE, CURLOPT_ACCEPT_ENCODING,
    CURLOPT_TRANSFER_ENCODING, CURLOPT_DNS_SERVERS and CURLOPT_USE_SSL</li>
 <li><?php bugfix(55635); ?> (CURLOPT_BINARYTRANSFER no longer used. The constant
    still exists for backward compatibility but is doing nothing)</li>
 <li><?php bugfix(54995); ?> (Missing CURLINFO_RESPONSE_CODE support)</li>
 <li>Added new functions curl_escape, curl_multi_setopt, curl_multi_strerror
    curl_pause, curl_reset, curl_share_close, curl_share_init,
    curl_share_setopt curl_strerror and curl_unescape</li>
 <li>Addes new curl options CURLOPT_TELNETOPTIONS, CURLOPT_GSSAPI_DELEGATION,
    CURLOPT_ACCEPTTIMEOUT_MS, CURLOPT_SSL_OPTIONS, CURLOPT_TCP_KEEPALIVE,
    CURLOPT_TCP_KEEPIDLE and CURLOPT_TCP_KEEPINTVL</li>
</ul></li>
</ul>

<ul>
<li>DateTime:
<ul>
 <li>Added DateTimeImmutable - a variant of DateTime that only returns the
    modified state instead of changing itself.</li>
 <li><?php bugfix(64825); ?> (Invalid free when unserializing DateTimeZone).</li>
 <li><?php bugfix(64359); ?> (strftime crash with VS2012)</li>
 <li><?php bugfix(62852); ?> (Unserialize Invalid Date causes crash)</li>
 <li><?php bugfix(61642); ?> (modify("+5 weekdays") returns Sunday)</li>
 <li><?php bugfix(60774); ?> (DateInterval::format("%a") is always zero when an
    interval is created using the createFromDateString method)</li>
 <li><?php bugfix(54567); ?> (DateTimeZone serialize/unserialize)</li>
 <li><?php bugfix(53437); ?> (Crash when using unserialized DatePeriod instance)</li>
</ul></li>
</ul>

<ul>
<li>dba:
<ul>
 <li><?php bugfix(62489); ?> (dba_insert not working as expected)</li>
</ul></li>
</ul>

<ul>
<li>Filter:
<ul>
 <li><?php implemented(49180); ?> (added MAC address validation)</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo:
<ul>
 <li>Upgraded libmagic to 5.14.</li>
 <li><?php bugfix(64830); ?> (mimetype detection segfaults on mp3 file)</li>
 <li><?php bugfix(63590); ?> (Different results in TS and NTS under Windows)</li>
 <li><?php bugfix(63248); ?> (Load multiple magic files from a directory under Windows)</li>
</ul></li>
</ul>

<ul>
<li>FPM:
<ul>
 <li>Add --with-fpm-systemd option to report health to systemd, and
    systemd_interval option to configure this. The service can now use
    Type=notify in the systemd unit file.</li>
 <li>Ignore QUERY_STRING when sent in SCRIPT_FILENAME</li>
 <li>Log a warning when a syscall fails</li>
 <li><?php implemented(64764); ?> (add support for FPM init.d script)</li>
 <li><?php bugfix(64915); ?> (error_log ignored when daemonize=0)</li>
 <li><?php bugfix(63999); ?> (php with fpm fails to build on Solaris 10 or 11)</li>
 <li>Fixed some possible memory or resource leaks and possible null dereference
    detected by code coverity scan</li>
</ul></li>
</ul>

<ul>
<li>GD:
<ul>
 <li><?php bugfix(64962); ?> (imagerotate produces corrupted image).</li>
 <li><?php bugfix(64961); ?> (segfault in imagesetinterpolation)</li>
 <li>Fix build with system libgd &gt;= 2.1 which is now the minimal
    version required (as build with previous version is broken).
    No change when bundled libgd is used</li>
 <li>Upgraded libgd to 2.1</li>
</ul></li>
</ul>

<ul>
<li>hash:
<ul>
 <li>Added support for PBKDF2 via hash_pbkdf2().</li>
 <li><?php bugfix(64745); ?> (hash_pbkdf2() truncates data when using default length
    and hex output)</li>
</ul></li>
</ul>

<ul>
<li>intl:
<ul>
 <li>Added UConverter wrapper.</li>
 <li>The intl extension now requires ICU 4.0+</li>
 <li>Added intl.use_exceptions INI directive, which controls what happens when
    global errors are set together with intl.error_level</li>
 <li>MessageFormatter::format() and related functions now accepted named
    arguments and mixed numeric/named arguments in ICU 4.8+</li>
 <li>MessageFormatter::format() and related functions now don't error out when
    an insufficient argument count is provided. Instead, the placeholders will
    remain unsubstituted</li>
 <li>MessageFormatter::parse() and MessageFormat::format() (and their static
    equivalents) don't throw away better than second precision in the arguments</li>
 <li>IntlDateFormatter::__construct and datefmt_create() now accept for the
    $timezone argument time zone identifiers, IntlTimeZone objects, DateTimeZone
    objects and NULL</li>
 <li>IntlDateFormatter::__construct and datefmt_create() no longer accept invalid
    timezone identifiers or empty strings</li>
 <li>The default time zone used in IntlDateFormatter::__construct and
    datefmt_create() (when the corresponding argument is not passed or NULL is
    passed) is now the one given by date_default_timezone_get(), not the
    default ICU time zone</li>
 <li>The time zone passed to the IntlDateFormatter is ignored if it is NULL and
    if the calendar passed is an IntlCalendar object -- in this case, the
    IntlCalendar's time zone will be used instead. Otherwise, the time zone
    specified in the $timezone argument is used instead. This does not affect
    old code, as IntlCalendar was introduced in this version</li>
 <li>IntlDateFormatter::__construct and datefmt_create() now accept for the
    $calendar argument also IntlCalendar objects</li>
 <li>IntlDateFormatter::getCalendar() and datefmt_get_calendar() return false
    if the IntlDateFormatter was set up with an IntlCalendar instead of the
    constants IntlDateFormatter::GREGORIAN/TRADITIONAL. IntlCalendar did not
    exist before this version</li>
 <li>IntlDateFormatter::setCalendar() and datefmt_set_calendar() now also accept
    an IntlCalendar object, in which case its time zone is taken. Passing a
    constant is still allowed, and still keeps the time zone</li>
 <li>IntlDateFormatter::setTimeZoneID() and datefmt_set_timezone_id() are
    deprecated. Use IntlDateFormatter::setTimeZone() or datefmt_set_timezone()
    instead</li>
 <li>IntlDateFormatter::format() and datefmt_format() now also accept an
    IntlCalendar object for formatting</li>
 <li>Added the classes: IntlCalendar, IntlGregorianCalendar, IntlTimeZone,
    IntlBreakIterator, IntlRuleBasedBreakIterator and
    IntlCodePointBreakIterator</li>
 <li>Added the functions: intlcal_get_keyword_values_for_locale(),
    intlcal_get_now(), intlcal_get_available_locales(), intlcal_get(),
    intlcal_get_time(), intlcal_set_time(), intlcal_add(),
    intlcal_set_time_zone(), intlcal_after(), intlcal_before(), intlcal_set(),
    intlcal_roll(), intlcal_clear(), intlcal_field_difference(),
    intlcal_get_actual_maximum(), intlcal_get_actual_minimum(),
    intlcal_get_day_of_week_type(), intlcal_get_first_day_of_week(),
    intlcal_get_greatest_minimum(), intlcal_get_least_maximum(),
    intlcal_get_locale(), intlcal_get_maximum(),
    intlcal_get_minimal_days_in_first_week(), intlcal_get_minimum(),
    intlcal_get_time_zone(), intlcal_get_type(),
    intlcal_get_weekend_transition(), intlcal_in_daylight_time(),
    intlcal_is_equivalent_to(), intlcal_is_lenient(), intlcal_is_set(),
    intlcal_is_weekend(), intlcal_set_first_day_of_week(),
    intlcal_set_lenient(), intlcal_equals(),
    intlcal_get_repeated_wall_time_option(),
    intlcal_get_skipped_wall_time_option(),
    intlcal_set_repeated_wall_time_option(),
    intlcal_set_skipped_wall_time_option(), intlcal_from_date_time(),
    intlcal_to_date_time(), intlcal_get_error_code(),
    intlcal_get_error_message(), intlgregcal_create_instance(),
    intlgregcal_set_gregorian_change(), intlgregcal_get_gregorian_change() and
    intlgregcal_is_leap_year()</li>
 <li>Added the functions: intltz_create_time_zone(), intltz_create_default(),
    intltz_get_id(), intltz_get_gmt(), intltz_get_unknown(),
    intltz_create_enumeration(), intltz_count_equivalent_ids(),
    intltz_create_time_zone_id_enumeration(), intltz_get_canonical_id(),
    intltz_get_region(), intltz_get_tz_data_version(),
    intltz_get_equivalent_id(), intltz_use_daylight_time(), intltz_get_offset(),
    intltz_get_raw_offset(), intltz_has_same_rules(), intltz_get_display_name(),
    intltz_get_dst_savings(), intltz_from_date_time_zone(),
    intltz_to_date_time_zone(), intltz_get_error_code(),
    intltz_get_error_message()</li>
 <li>Added the methods: IntlDateFormatter::formatObject(),
    IntlDateFormatter::getCalendarObject(), IntlDateFormatter::getTimeZone(),
    IntlDateFormatter::setTimeZone()</li>
 <li>Added the functions: datefmt_format_object(), datefmt_get_calendar_object(),
    datefmt_get_timezone(), datefmt_set_timezone(),
    datefmt_get_calendar_object(), intlcal_create_instance()</li>
</ul></li>
</ul>

<ul>
<li>mbstring:
<ul>
 <li><?php bugfix(64769); ?> (mbstring PHPTs crash on Windows x64).</li>
</ul></li>
</ul>

<ul>
<li>MCrypt:
<ul>
 <li>mcrypt_ecb(), mcrypt_cbc(), mcrypt_cfb() and mcrypt_ofb() now throw E_DEPRECATED.</li>
</ul></li>
</ul>

<ul>
<li>mysql:
<ul>
 <li>This extension is now deprecated, and deprecation warnings will be generated
    when connections are established to databases via mysql_connect(),
    mysql_pconnect(), or through implicit connection: use MySQLi or PDO_MySQL
    instead</li>
 <li>Dropped support for LOAD DATA LOCAL INFILE handlers when using libmysql.
    Known for stability problems</li>
 <li>Added support for SHA256 authentication available with MySQL 5.6.6+</li>
</ul></li>
</ul>

<ul>
<li>mysqli:
<ul>
 <li>Added mysqli_begin_transaction()/mysqli::begin_transaction(). Implemented
    all options, per MySQL 5.6, which can be used with START TRANSACTION, COMMIT
    and ROLLBACK through options to mysqli_commit()/mysqli_rollback() and their
    respective OO counterparts. They work in libmysql and mysqlnd mode</li>
 <li>Added mysqli_savepoint(), mysqli_release_savepoint()</li>
 <li><?php bugfix(64726); ?> (Segfault when calling fetch_object on a use_result and DB
    pointer has closed)</li>
 <li><?php bugfix(64394); ?> (MYSQL_OPT_CAN_HANDLE_EXPIRED_PASSWORDS undeclared when
    using Connector/C)</li>
</ul></li>
</ul>

<ul>
<li>mysqlnd:
<ul>
 <li>Add new begin_transaction() call to the connection object. Implemented all
    options, per MySQL 5.6, which can be used with START TRANSACTION, COMMIT
    and ROLLBACK</li>
 <li>Added mysqlnd_savepoint(), mysqlnd_release_savepoint()</li>
 <li><?php bugfix(63530); ?> (mysqlnd_stmt::bind_one_parameter crashes, uses wrong alloc
    for stmt-&gt;param_bind)</li>
 <li>Fixed return value of mysqli_stmt_affected_rows() in the time after
    prepare() and before execute()</li>
</ul></li>
</ul>

<ul>
<li>PCRE:
<ul>
 <li>Merged PCRE 8.32</li>
 <li>Deprecated the /e modifier</li>
 <li><?php bugfix(63284); ?> (Upgrade PCRE to 8.31)</li>
</ul></li>
</ul>

<ul>
<li>PDO:
<ul>
 <li><?php bugfix(63176); ?> (Segmentation fault when instantiate 2 persistent PDO to the same db server)</li>
</ul></li>
</ul>

<ul>
<li>PDO_DBlib:
<ul>
 <li><?php bugfix(63638); ?> (Cannot connect to SQL Server 2008 with PDO dblib)</li>
 <li><?php bugfix(64338); ?> (pdo_dblib can't connect to Azure SQL)</li>
 <li><?php bugfix(64808); ?> (FreeTDS PDO getColumnMeta on a prepared but not executed statement crashes)</li>
</ul></li>
</ul>

<ul>
<li>PDO_pgsql:
<ul>
 <li><?php bugfix(64949); ?> (Buffer overflow in _pdo_pgsql_error)</li>
</ul></li>
</ul>

<ul>
<li>PDO_mysql:
<ul>
 <li><?php bugfix(48724); ?> (getColumnMeta() doesn't return native_type for BIT, TINYINT and YEAR)</li>
</ul></li>
</ul>

<ul>
<li>pgsql:
<ul>
 <li>Added pg_escape_literal() and pg_escape_identifier()</li>
 <li><?php bugfix(46408); ?> Locale number format settings can cause pg_query_params to break with numerics</li>
</ul></li>
</ul>

<ul>
<li>Phar:
<ul>
 <li>Fixed timestamp update on Phar contents modification</li>
</ul></li>
</ul>

<ul>
<li>readline:
<ul>
 <li><?php bugfix(55694); ?> (Expose additional readline variable to prevent default filename completion)</li>
</ul></li>
</ul>

<ul>
<li>Reflection:
<ul>
 <li><?php bugfix(64007); ?> (There is an ability to create instance of Generator by hand)</li>
</ul></li>
</ul>

<ul>
<li>Sockets:
<ul>
 <li>Added socket_cmsg_space(), socket_sendmsg(), and socket_recvmsg() functions</li>
 <li><?php bugfix(64508); ?> (Fails to build with --disable-ipv6)</li>
 <li><?php bugfix(64287); ?> (sendmsg/recvmsg shutdown handler causes segfault)</li>
</ul></li>
</ul>

<ul>
<li>SPL:
<ul>
 <li><?php bugfix(64997); ?> (Segfault while using RecursiveIteratorIterator on 64-bits systems)</li>
 <li><?php bugfix(64264); ?> (SPLFixedArray toArray problem)</li>
 <li><?php bugfix(64228); ?> (RecursiveDirectoryIterator always assumes SKIP_DOTS)</li>
 <li><?php bugfix(64106); ?> (Segfault on SplFixedArray[][x] = y when extended)</li>
 <li><?php bugfix(60560); ?> (SplFixedArray un-/serialize, getSize(), count() return 0, keys are strings)</li>
 <li><?php bugfix(52861); ?> (unset fails with ArrayObject and deep arrays)</li>
 <li>Implement <?php bugl(48358); ?> (Add SplDoublyLinkedList::add() to insert an element at a given offset)</li>
</ul></li>
</ul>

<ul>
<li>SNMP:
<ul>
 <li><?php bugfix(64765); ?> (Some IPv6 addresses get interpreted wrong)</li>
 <li><?php bugfix(64159); ?> (Truncated snmpget)</li>
 <li><?php bugfix(64124); ?> (IPv6 malformed)</li>
 <li><?php bugfix(61981); ?> (OO API, walk: $suffix_as_key is not working correctly)</li>
</ul></li>
</ul>

<ul>
<li>SOAP:
<ul>
 <li>Added SoapClient constructor option 'ssl_method' to specify ssl method</li>
</ul></li>
</ul>

<ul>
<li>Streams:
<ul>
 <li><?php bugfix(64770); ?> (stream_select() fails with pipes returned by proc_open() on Windows x64)</li>
 <li>Fixed Windows x64 version of stream_socket_pair() and improved error handling</li>
</ul></li>
</ul>

<ul>
<li>Tokenizer:
<ul>
 <li><?php bugfix(60097); ?> (token_get_all fails to lex nested heredoc)</li>
</ul></li>
</ul>

<ul>
<li>Zip:
<ul>
 <li>Upgraded libzip to 0.10.1</li>
 <li><?php bugfix(64452); ?> (Zip crash intermittently)</li>
 <li><?php bugfix(64342); ?> (ZipArchive::addFile() has to check for file existence)</li>
</ul></li>
</ul>

<!-- }}} --></section>

<a id="PHP_5_4"></a>
<section class="version" id="5.4.45"><!-- {{{ 5.4.45 -->
<h3>Version 5.4.45</h3>
<?php release_date('03-Sep-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(70172); ?> (Use After Free Vulnerability in unserialize()). (CVE-2015-6834)</li>
  <li><?php bugfix(70219); ?> (Use after free vulnerability in session deserializer). (CVE-2015-6835)</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(70385); ?> (Buffer over-read in exif_read_data with TIFF IFD tag byte value of 32 bytes).</li>
</ul></li>
<li>hash:
<ul>
  <li><?php bugfix(70312); ?> (HAVAL gives wrong hashes in specific cases).</li>
</ul></li>
<li>PCRE:
<ul>
  <li><?php bugfix(70345); ?> (Multiple vulnerabilities related to PCRE functions).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70388); ?> (SOAP serialize_function_call() type confusion / RCE). (CVE-2015-6836)</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70365); ?> (Use-after-free vulnerability in unserialize() with SplObjectStorage). (CVE-2015-6834)</li>
  <li><?php bugfix(70366); ?> (Use-after-free vulnerability in unserialize() with SplDoublyLinkedList). (CVE-2015-6834)</li>
</ul></li>
<li>XSLT:
<ul>
  <li><?php bugfix(69782); ?> (NULL pointer dereference). (CVE-2015-6837, CVE-2015-6838)</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(70350); ?> (ZipArchive::extractTo allows for directory traversal when creating directories). (CVE-2014-9767)</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.4.44"><!-- {{{ 5.4.44 -->
<h3>Version 5.4.44</h3>
<?php release_date('06-Aug-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69793); ?> (Remotely triggerable stack exhaustion via recursive method calls).</li>
  <li><?php bugfix(69892); ?> (Different arrays compare indentical due to integer key truncation).</li>
  <li><?php bugfix(70121); ?> (unserialize() could lead to unexpected methods execution / NULL pointer deref).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(70014); ?> (openssl_random_pseudo_bytes() is not cryptographically secure). (CVE-2015-8867)</li>
</ul></li>
<li>Phar:
<ul>
  <li>Improved fix for bug <?php bugl(69441) ?>.</li>
  <li><?php bugfix(70019); ?> (Files extracted from archive may be placed outside of destination directory). (CVE-2015-6833)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(70081); ?> (SoapClient info leak / null pointer dereference via multiple type confusions).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(70068); ?> (Dangling pointer in the unserialization of ArrayObject items). (CVE-2015-6832)</li>
  <li><?php bugfix(70166); ?> (Use After Free Vulnerability in unserialize() with SPLArrayObject). (CVE-2015-6831)</li>
  <li><?php bugfix(70168); ?> (Use After Free Vulnerability in unserialize() with SplObjectStorage). (CVE-2015-6831)</li>
  <li><?php bugfix(70169); ?> (Use After Free Vulnerability in unserialize() with SplDoublyLinkedList). (CVE-2015-6831)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.43"><!-- {{{ 5.4.43 -->
<h3>Version 5.4.43</h3>
<?php release_date('09-Jul-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69768); ?> (escapeshell*() doesn't cater to !).</li>
  <li><?php bugfix(69874); ?> (Can't set empty additional_headers for mail()), regression from fix to bug <?php bugl(68776); ?>.</li>
</ul></li>
<li>Mysqlnd:
<ul>
  <li><?php bugfix(69669); ?> (mysqlnd is vulnerable to BACKRONYM). (CVE-2015-3152)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69958); ?> (Segfault in Phar::convertToData on invalid file). (CVE-2015-5589)</li>
  <li><?php bugfix(69923); ?> (Buffer overflow and stack smashing error in phar_fix_filepath). (CVE-2015-5590)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.42"><!-- {{{ 5.4.42 -->
<h3>Version 5.4.42</h3>
<?php release_date('11-Jun-2015'); ?>
<ul><li>Core:
<ul>
  <li>Improved fix for bug <?php bugl(69545); ?> (Integer overflow in ftp_genlist() resulting in heap overflow). (CVE-2015-4643)</li>
  <li><?php bugfix(69646); ?> (OS command injection vulnerability in escapeshellarg). (CVE-2015-4642)</li>
  <li><?php bugfix(69719); ?> (Incorrect handling of paths with NULs). (CVE-2015-4598)</li>
</ul></li>
<li>Litespeed SAPI:
<ul>
  <li><?php bugfix(68812); ?> (Unchecked return value).</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(68776); ?> (mail() does not have mail header injection prevention for additional headers).</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(69667); ?> (segfault in php_pgsql_meta_data). (CVE-2015-4644)</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li>Upgrade bundled sqlite to 3.8.10.2. (CVE-2015-3414, CVE-2015-3415, CVE-2015-3416)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.41"><!-- {{{ 5.4.41 -->
<h3>Version 5.4.41</h3>
<?php release_date('14-May-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(69364); ?> (PHP Multipart/form-data remote dos Vulnerability). (CVE-2015-4024)</li>
  <li><?php bugfix(69403); ?> (str_repeat() sign mismatch based memory corruption).</li>
  <li><?php bugfix(69418); ?> (CVE-2006-7243 fix regressions in 5.4+). (CVE-2015-4025)</li>
  <li><?php bugfix(69522); ?> (heap buffer overflow in unpack()).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(69545); ?> (Integer overflow in ftp_genlist() resulting in heap overflow). (CVE-2015-4022)</li>
</ul></li>
<li>PCNTL:
<ul>
  <li><?php bugfix(68598); ?> (pcntl_exec() should not allow null char). (CVE-2015-4026)</li>
</ul></li>
<li>PCRE:
<ul>
  <li>Upgraded pcrelib to 8.37. (CVE-2015-2325, CVE-2015-2326)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(69453); ?> (Memory Corruption in phar_parse_tarfile when entry filename starts with null). (CVE-2015-4021)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.40"><!-- {{{ 5.4.40 -->
<h3>Version 5.4.40</h3>
<?php release_date('16-Apr-2015'); ?>
<ul><li>Apache2handler:
<ul>
  <li><?php bugfix(69218); ?> (potential remote code execution with apache 2.4 apache2handler). (CVE-2015-3330)</li>
</ul></li>
<li>Core:
<ul>
  <li>Additional fix for bug <?php bugl(69152); ?> (Type confusion vulnerability in exception::getTraceAsString).</li>
  <li><?php bugfix(69337); ?> (php_stream_url_wrap_http_ex() type-confusion vulnerability).</li>
  <li><?php bugfix(69353); ?> (Missing null byte checks for paths in various PHP extensions). (CVE-2015-3411, CVE-2015-3412)</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(69316); ?> (Use-after-free in php_curl related to CURLOPT_FILE/_INFILE/_WRITEHEADER).</li>
</ul></li>
<li>Ereg:
<ul>
  <li><?php bugfix(68740); ?> (NULL Pointer Dereference).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(68819); ?> (Fileinfo on specific file causes spurious OOM and/or segfault). (CVE-2015-4604, CVE-2015-4605)</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(68601); ?> (buffer read overflow in gd_gif_in.c). (CVE-2014-9709)</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(68901); ?> (use after free). (CVE-2015-2301)</li>
  <li><?php bugfix(69324); ?> (Buffer Over-read in unserialize when parsing Phar). (CVE-2015-2783, CVE-2015-3307)</li>
  <li><?php bugfix(69441); ?> (Buffer Overflow when parsing tar/zip/phar in phar_set_inode). (CVE-2015-3329)</li>
</ul></li>
<li>Postgres:
<ul>
  <li><?php bugfix(68741); ?> (Null pointer deference). (CVE-2015-1352)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(69152); ?> (Type Confusion Infoleak Vulnerability in unserialize() with SoapFault). (CVE-2015-4599)</li>
  <li><?php bugfix(69293); ?> (NEW segfault when using SoapClient::__setSoapHeader (bisected, regression)).</li>
</ul></li>
<li>Sqlite3:
<ul>
  <li><?php bugfix(66550); ?> (SQLite prepared statement use-after-free).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.39"><!-- {{{ 5.4.39 -->
<h3>Version 5.4.39</h3>
<?php release_date('19-Mar-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(68976); ?> (Use After Free Vulnerability in unserialize()). (CVE-2015-2787)</li>
  <li><?php bugfix(69134); ?> (Per Directory Values overrides PHP_INI_SYSTEM configuration options).</li>
  <li><?php bugfix(69207); ?> (move_uploaded_file allows nulls in path). (CVE-2015-2348)</li>
</ul></li>
<li>Ereg:
<ul>
  <li><?php bugfix(69248); ?> (heap overflow vulnerability in regcomp.c). (CVE-2015-2305)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(69085); ?> (SoapClient's __call() type confusion through unserialize()). (CVE-2015-4147, CVE-2015-4148)</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(69253); ?> (ZIP Integer Overflow leads to writing past heap boundary). (CVE-2015-2331)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.38"><!-- {{{ 5.4.38 -->
<h3>Version 5.4.38</h3>
<?php release_date('19-Feb-2015'); ?>
<ul><li>Core:
<ul>
  <li>Removed support for multi-line headers, as they are deprecated by RFC 7230.</li>
  <li>Added NULL byte protection to exec, system and passthru.</li>
  <li><?php bugfix(68925); ?> (Mitigation for CVE-2015-0235 – GHOST: glibc gethostbyname buffer overflow).</li>
  <li><?php bugfix(67827); ?> (broken detection of system crypt sha256/sha512 support).</li>
  <li><?php bugfix(68942); ?> (Use after free vulnerability in unserialize() with DateTimeZone). (CVE-2015-0273)</li>
</ul></li>
<li>Enchant:
<ul>
  <li><?php bugfix(68552); ?> (heap buffer overflow in enchant_broker_request_dict()). (CVE-2014-9705)</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(67427); ?> (SoapServer cannot handle large messages).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.37"><!-- {{{ 5.4.37 -->
<h3>Version 5.4.37</h3>
<?php release_date('22-Jan-2015'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(68710); ?> (Use After Free Vulnerability in PHP's unserialize()). (CVE-2015-0231)</li>
</ul></li>
<li>CGI:
<ul>
  <li><?php bugfix(68618); ?> (out of bounds read crashes php-cgi). (CVE-2014-9427)</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(68799); ?> (Free called on uninitialized pointer). (CVE-2015-0232)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li>Removed readelf.c and related code from libmagic sources.</li>
  <li><?php bugfix(68735); ?> (fileinfo out-of-bounds memory access). (CVE-2014-9652)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(55618); ?> (use case-insensitive cert name matching).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.4.36"><!-- {{{ 5.4.36 -->
<h3>Version 5.4.36</h3>
<?php release_date('18-Dec-2014'); ?>
<ul><li>Core:
<ul>
  <li>Upgraded crypt_blowfish to version 1.3.</li>
  <li><?php bugfix(68545); ?> (NULL pointer dereference in unserialize.c).</li>
  <li><?php bugfix(68594); ?> (Use after free vulnerability in unserialize()). (CVE-2014-8142)</li>
</ul>
<li>Mcrypt:
<ul>
  <li>Fixed possible read after end of buffer and use after free.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.35"><!-- {{{ 5.4.35 -->
<h3>Version 5.4.35</h3>
<?php release_date('13-Nov-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(68365); ?> (zend_mm_heap corrupted after memory overflow in zend_hash_copy).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(68283); ?> (fileinfo: out-of-bounds read in elf note headers). (CVE-2014-3710)</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(63595); ?> (GMP memory management conflicts with other libraries using GMP).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(66584); ?> (Segmentation fault on statement deallocation).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.34"><!-- {{{ 5.4.34 -->
<h3>Version 5.4.34</h3>
<?php release_date('16-Oct-2014'); ?>
<ul><li>Fileinfo:
<ul>
  <li><?php bugfix(66242); ?> (libmagic: don't assume char is signed).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(67985); ?> (Incorrect last used array index copied to new array after unset).</li>
  <li><?php bugfix(68044); ?> (Integer overflow in unserialize() (32-bits only)). (CVE-2014-3669)</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(68089); ?> (NULL byte injection - cURL lib).</li>
</ul></li>
<li>EXIF:
<ul>
  <li><?php bugfix(68113); ?> (Heap corruption in exif_thumbnail()). (CVE-2014-3670)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Reverted fixes for bug <?php bugl(41631); ?>, due to regressions.</li>
</ul></li>
<li>XMLRPC:
<ul>
  <li><?php bugfix(68027); ?> (Global buffer overflow in mkgmtime() function). (CVE-2014-3668)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.33"><!-- {{{ 5.4.33 -->
<h3>Version 5.4.33</h3>
<?php release_date('18-Sep-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(47358); ?> (glob returns error, should be empty array()).</li>
  <li><?php bugfix(65463); ?> (SIGSEGV during zend_shutdown()).</li>
  <li><?php bugfix(66036); ?> (Crash on SIGTERM in apache process).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(41631); ?> (socket timeouts not honored in blocking SSL reads).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66091); ?> (memory leaks in DateTime constructor).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67606); ?> (FPM with mod_fastcgi/apache2.4 is broken).</li>
</ul></li>
<li>GD:
<ul>
  <li>Made fontFetch's path parser thread-safe.</li>
</ul></li>
<li>Wddx:
<ul>
  <li><?php bugfix(67873); ?> (Segfaults in php_wddx_serialize_var).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(67724); ?> (chained zlib filters silently fail with large amounts of data).</li>
  <li><?php bugfix(67865); ?> (internal corruption phar error).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.32"><!-- {{{ 5.4.32 -->
<h3>Version 5.4.32</h3>
<?php release_date('21-Aug-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(67717); ?> (segfault in dns_get_record) (CVE-2014-3597).</li>
  <li><?php bugfix(67693); ?> (incorrect push to the empty array)</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed missing type checks in com_event_sink.</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(67705); ?> (extensive backtracking in rule regular expression). (CVE-2014-3538)</li>
  <li><?php bugfix(67716); ?> (Segfault in cdf.c) (CVE-2014-3587).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(66901); ?> (php-gd 'c_color' NULL pointer dereference). (CVE-2014-2497)</li>
  <li><?php bugfix(67730); ?> (Null byte injection possible with imagexxx functions) (CVE-2014-5120).</li>
</ul></li>
<li>Milter:
<ul>
  <li><?php bugfix(67715); ?> (php-milter does not build and crashes randomly).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed missing type checks in OpenSSL options (Yussuf Khalil, Stas).</li>
</ul></li>
<li>Readline:
<ul>
  <li><?php bugfix(55496); ?> (Interactive mode doesn't force a newline before the prompt).</li>
  <li><?php bugfix(67496); ?> (Save command history when exiting interactive shell with control-c).</li>
</ul></li>
<li>Sessions:
<ul>
  <li>Fixed missing type checks in php_session_create_id.</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(67539); ?> (ArrayIterator use-after-free due to object change during sorting) (CVE-2014-4698).</li>
  <li><?php bugfix(67538); ?> (SPL Iterators use-after-free) (CVE-2014-4670).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(60616); ?> (odbc_fetch_into returns junk data at end of multi-byte char fields).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.31"><!-- {{{ 5.4.31 -->
<h3>Version 5.4.31</h3>
<?php release_date('24-Jul-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(67428); ?> (header('Location: foo') will override a 308-399 response code).</li>
  <li><?php bugfix(67436); ?> (Autoloader isn't called if two method definitions don't match).</li>
  <li><?php bugfix(67091); ?> (make install fails to install libphp5.so on FreeBSD 10.0).</li>
  <li><?php bugfix(67151); ?> (strtr with empty array crashes).</li>
  <li><?php bugfix(67407); ?> (Windows 8.1/Server 2012 R2 reported as Windows 8/Server 2012).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php implemented(67429); ?> (CLI server is missing some new HTTP response codes).</li>
  <li><?php bugfix(66830); ?> (Empty header causes PHP built-in web server to hang).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(67530); ?> (error_log=syslog ignored).</li>
  <li><?php bugfix(67531); ?> (syslog cannot be set in pool configuration).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(67052); ?> (NumberFormatter::parse() resets LC_NUMERIC setting).</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(67550); ?> (Error in code "form" instead of "from", pgsql.c, line 756), which affected builds against libpq &lt; 7.3.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(67587); ?> (Redirection loop on nginx with FPM).</li>
</ul></li>
<li>Streams:
<ul>
  <li><?php bugfix(67430); ?> (http:// wrapper doesn't follow 308 redirects).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.4.30"><!-- {{{ 5.4.30 -->
<h3>Version 5.4.30</h3>
<?php release_date('26-Jun-2014'); ?>
<ul><li>Core:
<ul>
  <li>Fixed BC break introduced by patch for bug <?php bugl(67072); ?>.</li>
  <li><?php bugfix(66622); ?> (Closures do not correctly capture the late bound class (static::) in some cases).</li>
  <li><?php bugfix(67390); ?> (insecure temporary file use in the configure script) (CVE-2014-3981).</li>
  <li><?php bugfix(67399); ?> (putenv with empty variable may lead to crash).</li>
  <li><?php bugfix(67498); ?> (phpinfo() Type Confusion Information Leak Vulnerability). (CVE-2014-4721)</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(67406); ?> (built-in web-server segfaults on startup).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(67308); ?> (Serialize of DateTime truncates fractions of second).</li>
  <li>Fixed regression in fix for bug <?php bugl(67118); ?> (constructor can't be called twice).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(67326); ?> (fileinfo: cdf_read_short_sector insufficient boundary check) (CVE-2014-0207).</li>
  <li><?php bugfix(67410); ?> (fileinfo: mconvert incorrect handling of truncated pascal string size) (CVE-2014-3478).</li>
  <li><?php bugfix(67411); ?> (fileinfo: cdf_check_stream_offset insufficient boundary check) (CVE-2014-3479).</li>
  <li><?php bugfix(67412); ?> (fileinfo: cdf_count_chain insufficient boundary check) (CVE-2014-3480).</li>
  <li><?php bugfix(67413); ?> (fileinfo: cdf_read_property_info insufficient boundary check) (CVE-2014-3487).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(67349); ?> (Locale::parseLocale Double Free).</li>
  <li><?php bugfix(67397); ?> (Buffer overflow in locale_get_display_name and uloc_getDisplayName (libicu 4.8.1)).</li>
</ul></li>
<li>Network:
<ul>
  <li><?php bugfix(67432); ?> (Fix potential segfault in dns_get_record()) (CVE-2014-4049).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(65698); ?> (certificates validity parsing does not work past 2050).</li>
  <li><?php bugfix(66636); ?> (openssl_x509_parse warning with V_ASN1_GENERALIZEDTIME).</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php implemented(49898); ?> (Add SoapClient::__getCookies()).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(66127); ?> (Segmentation fault with ArrayObject unset).</li>
  <li><?php bugfix(67359); ?> (Segfault in recursiveDirectoryIterator).</li>
  <li><?php bugfix(67360); ?> (Missing element after ArrayObject::getIterator).</li>
  <li><?php bugfix(67492); ?> (unserialize() SPL ArrayObject / SPLObjectStorage Type Confusion) (CVE-2014-3515).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.29"><!-- {{{ 5.4.29 -->
<h3>Version 5.4.29</h3>
<?php release_date('29-May-2014'); ?>
<ul><li>COM:
<ul>
  <li><?php bugfix(66431); ?> (Special Character via COM Interface (CP_UTF8)).</li>
</ul></li>
<li>Core:
<ul>
  <li><?php bugfix(65701); ?> (copy() doesn't work when destination filename is created by tempnam()).</li>
  <li><?php bugfix(67072); ?> (Echoing unserialized "SplFileObject" crash).</li>
  <li><?php bugfix(67245); ?> (usage of memcpy() with overlapping src and dst in zend_exceptions.c).</li>
  <li><?php bugfix(67247); ?> (spl_fixedarray_resize integer overflow).</li>
  <li><?php bugfix(67249); ?> (printf out-of-bounds read).</li>
  <li><?php bugfix(67250); ?> (iptcparse out-of-bounds read).</li>
  <li><?php bugfix(67252); ?> (convert_uudecode out-of-bounds read). (Stas)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66307); ?> (Fileinfo crashes with powerpoint files).</li>
  <li><?php bugfix(67327); ?> (fileinfo: CDF infinite loop in nelements DoS). (CVE-2014-0238)</li>
  <li><?php bugfix(67328); ?> (fileinfo: fileinfo: numerous file_printf calls resulting in performance degradation). (CVE-2014-0237)</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(67118); ?> (DateTime constructor crash with invalid data).</li>
  <li><?php bugfix(67251); ?> (date_parse_from_format out-of-bounds read).</li>
  <li><?php bugfix(67253); ?> (timelib_meridian_with_check out-of-bounds read).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(67081); ?> (DOMDocumentType-&gt;internalSubset returns entire DOCTYPE tag, not only the subset).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(66908); ?> (php-fpm reload leaks epoll_create() file descriptor).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(64498); ?> ($phar-&gt;buildFromDirectory can't compress file with an accent in its name).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.28"><!-- {{{ 5.4.28 -->
<h3>Version 5.4.28</h3>
<?php release_date('01-May-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(61019); ?> (Out of memory on command stream_get_contents).</li>
  <li><?php bugfix(64330); ?> (stream_socket_server() creates wrong Abstract Namespace UNIX sockets).</li>
  <li><?php bugfix(66171); ?> (Symlinks and session handler allow open_basedir bypass).</li>
  <li><?php bugfix(66182); ?> (exit in stream filter produces segfault).</li>
  <li><?php bugfix(66736); ?> (fpassthru broken).</li>
  <li><?php bugfix(67024); ?> (getimagesize should recognize BMP files with negative height).</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(66562); ?> (curl_exec returns differently than curl_multi_getcontent).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66721); ?> (__wakeup of DateTime segfaults when invalid object data is supplied).</li>
</ul></li>
<li>Embed:
<ul>
  <li><?php bugfix(65715); ?> (php5embed.lib isn't provided anymore).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66987); ?> (Memory corruption in fileinfo ext / bigendian).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(66482); ?> (unknown entry 'priority' in php-fpm.conf).</li>
  <li><?php bugfix(67060); ?> (sapi/fpm: possible privilege escalation due to insecure default configuration) (CVE-2014-0185).</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(66021); ?> (Blank line inside empty array/object when JSON_PRETTY_PRINT is set).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Fixed issue with null bytes in LDAP bindings.</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(66942); ?> (memory leak in openssl_seal()).</li>
  <li><?php bugfix(66952); ?> (memory leak in openssl_open()).</li>
</ul></li>
<li>SimpleXML:
<ul>
  <li><?php bugfix(66084); ?> (simplexml_load_string() mangles empty node name) (Anatol)</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(53965); ?> (&lt;xsl:include&gt; cannot find files with relative paths when loaded with "file://").</li>
</ul></li>
<li>Apache2 Handler SAPI:
<ul>
  <li>Fixed Apache log issue caused by APR's lack of support for %zu (APR issue <a href="https://issues.apache.org/bugzilla/show_bug.cgi?id=56120">56120</a>).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.27"><!-- {{{ 5.4.27 -->
<h3>Version 5.4.27</h3>
<?php release_date('03-Apr-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(60602); ?> (proc_open() changes environment array)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66946); ?> (fileinfo: extensive backtracking in awk rule regular expression). (CVE-2013-7345)</li>
</ul></li>
<li>FPM:
<ul>
  <li>Added clear_env configuration directive to disable clearenv() call.</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(66872); ?> (invalid argument crashes gmp_testbit)</li>
</ul></li>
<li>Mail:
<ul>
  <li><?php bugfix(66535); ?> (Don't add newline after X-PHP-Originating-Script)</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(66762); ?> (Segfault in mysqli_stmt::bind_result() when link closed)</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(66833); ?> (Default disgest algo is still MD5, switch to SHA1)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.26"><!-- {{{ 5.4.26 -->
<h3>Version 5.4.26</h3>
<?php release_date('06-Mar-2014'); ?>
<ul><li>Date:
<ul>
  <li><?php bugfix(44780); ?> (some time zone offsets not recognized by timezone_name_from_abbr)</li>
  <li><?php bugfix(45543); ?> (DateTime::setTimezone can not set timezones without ID)</li>
</ul></li>
<li>JSON:
<ul>
  <li><?php bugfix(65753); ?> (JsonSerializeable couldn't implement on module extension)</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66731); ?> (file: infinite recursion) (CVE-2014-1943).</li>
  <li><?php bugfix(66820); ?> (out-of-bounds memory access in fileinfo) (CVE-2014-2270).</li>
</ul></li>
<li>LDAP:
<ul>
  <li>Implemented ldap_modify_batch (https://wiki.php.net/rfc/ldap_modify_batch).</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(66501); ?> (Add EC key support to php_openssl_is_private_key).</li>
</ul></li>
<li>Pgsql:
<ul>
  <li>Added warning for dangerous client encoding and remove possible injections for pg_insert()/pg_update()/pg_delete()/pg_select().</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.4.25"><!-- {{{ 5.4.25 -->
<h3>Version 5.4.25</h3>
<?php release_date('06-Feb-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66286); ?> (Incorrect object comparison with inheritance).</li>
  <li><?php bugfix(66509); ?> (copy() arginfo has changed starting from 5.4).</li>
</ul></li>
<li>mysqlnd:
<ul>
  <li><?php bugfix(66283); ?> (Segmentation fault after memory_limit).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(62479); ?> (PDO-psql cannot connect if password contains spaces).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(66481); ?> (Calls to session_name() segfault when session.name is null).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.24"><!-- {{{ 5.4.24 -->
<h3>Version 5.4.24</h3>
<?php release_date('09-Jan-2014'); ?>
<ul><li>Core:
<ul>
  <li>Added validation of class names in the autoload process.</li>
  <li>Fixed invalid C code in zend_strtod.c.</li>
  <li><?php bugfix(61645); ?> (fopen and O_NONBLOCK).</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66060); ?> (Heap buffer over-read in DateInterval, CVE-2013-6712).</li>
  <li><?php bugfix(63391); ?> (Incorrect/inconsistent day of week prior to the year 1600).</li>
  <li><?php bugfix(61599); ?> (Wrong Day of Week).</li>
</ul></li>
<li>DOM:
<ul>
  <li><?php bugfix(65196); ?> (Passing DOMDocumentFragment to DOMDocument::saveHTML() Produces invalid Markup).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(65873); ?> (Integer overflow in exif_read_data()).</li>
</ul></li>
<li>Filter:
<ul>
  <li><?php bugfix(66229); ?> (128.0.0.0/16 isn't reserved any longer).</li>
</ul></li>
<li>GD:
<ul>
  <li><?php bugfix(64405); ?> (Use freetype-config for determining freetype2 dir(s)).</li>
</ul></li>
<li>PDO_odbc:
<ul>
  <li><?php bugfix(66311); ?> (Stack smashing protection kills PDO/ODBC queries).</li>
</ul></li>
<li>SNMP:
<ul>
  <li>Fixed SNMP_ERR_TOOBIG handling for bulk walk operations.</li>
</ul></li>
<li>XSL:
<ul>
  <li><?php bugfix(49634); ?> (Segfault throwing an exception in a XSL registered function).</li>
</ul></li>
<li>ZIP:
<ul>
  <li><?php bugfix(66321); ?> (ZipArchive::open() ze_obj-&gt;filename_len not real).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.23"><!-- {{{ 5.4.23 -->
<h3>Version 5.4.23</h3>
<?php release_date('12-Dec-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66094); ?> (unregister_tick_function tries to cast a Closure to a string).</li>
  <li><?php bugfix(65947); ?> (basename is no more working after fgetcsv in certain situation).</li>
</ul></li>
<li>JSON:
<ul>
  <li>Fixed whitespace part of <?php bugl(64874); ?> ("json_decode handles whitespace and case-sensitivity incorrectly").</li>
</ul></li>
<li>MySQLi:
<ul>
  <li><?php bugfix(66043); ?> (Segfault calling bind_param() on mysqli).</li>
</ul></li>
<li>mysqlnd:
<ul>
  <li><?php bugfix(66124); ?> (mysqli under mysqlnd loses precision when bind_param with 'i').</li>
  <li><?php bugfix(66141); ?> (mysqlnd quote function is wrong with NO_BACKSLASH_ESCAPES after failed query).</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed memory corruption in openssl_x509_parse() (CVE-2013-6420). (Stefan Esser).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(65946); ?> (sql_parser permanently converts values bound to strings).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.22"><!-- {{{ 5.4.22 -->
<h3>Version 5.4.22</h3>
<?php release_date('14-Nov-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(65911); ?> (scope resolution operator - strange behavior with $this).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(65818); ?> (Segfault with built-in webserver and chunked transfer encoding).</li>
</ul></li>
<li>Exif:
<ul>
  <li>Fixed crash on unknown encoding.</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(65667); ?> (ftp_nb_continue produces segfault).</li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(65950); ?> (Field name truncation if the field name is bigger than 32 characters).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php bugfix(65808); ?> (the socket_connect() won't work with IPv6 address).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(64760); ?> (var_export() does not use full precision for floating-point numbers).</li>
</ul></li>
<li>XMLReader:
<ul>
  <li><?php bugfix(51936); ?> (Crash with clone XMLReader).</li>
  <li><?php bugfix(64230); ?> (XMLReader does not suppress errors).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.21"><!-- {{{ 5.4.21 -->
<h3>Version 5.4.21</h3>
<?php release_date('17-Oct-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(65322); ?> (compile time errors won't trigger auto loading).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(65633); ?> (built-in server treat some http headers as case-sensitive).</li>
</ul></li>
<li>Datetime:
<ul>
  <li><?php bugfix(64157); ?> (DateTime::createFromFormat() reports confusing error message).</li>
</ul></li>
<li>DBA extension:
<ul>
  <li><?php bugfix(65708); ?> (dba functions cast $key param to string in-place, bypassing copy on write).</li>
</ul></li>
<li>Filter:
<ul>
  <li>Add RFC 6598 IPs to reserved addresses.</li>
  <li><?php bugfix(64441); ?> (FILTER_VALIDATE_URL rejects fully qualified domain names).</li>
</ul></li>
<li>IMAP:
<ul>
  <li><?php bugfix(65721); ?> (configure script broken in 5.5.4 and 5.4.20 when enabling imap).</li>
</ul></li>
<li>Standard:
<ul>
  <li><?php bugfix(61548); ?> (content-type must appear at the end of headers for 201 Location to work in http).</li>
</ul></li>
<li>Build system:
<ul>
  <li><?php bugfix(62396); ?> ('make test' crashes starting with 5.3.14 (missing gzencode())).</li>
</ul></li>
</ul>
<!-- }}} -->
</section>

<section class="version" id="5.4.20"><!-- {{{ 5.4.20 -->
<h3>Version 5.4.20</h3>
<?php release_date('19-Sep-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(60598); ?> (cli/apache sapi segfault on objects manipulation).</li>
  <li><?php bugfix(65579); ?> (Using traits with get_class_methods causes segfault).</li>
  <li><?php bugfix(65490); ?> (Duplicate calls to get lineno &amp; filename for DTRACE_FUNCTION_*).</li>
  <li><?php bugfix(65483); ?> (quoted-printable encode stream filter incorrectly encoding spaces).</li>
  <li><?php bugfix(65481); ?> (shutdown segfault due to serialize).</li>
  <li><?php bugfix(65470); ?> (Segmentation fault in zend_error() with --enable-dtrace).</li>
  <li><?php bugfix(65372); ?> (Segfault in gc_zval_possible_root when return reference fails).</li>
  <li><?php bugfix(65304); ?> (Use of max int in array_sum).</li>
  <li><?php bugfix(65291); ?> (get_defined_constants() causes PHP to crash in a very limited case).</li>
  <li><?php bugfix(65225); ?> (PHP_BINARY incorrectly set).</li>
  <li>Improved fix for bug <?php bugl(63186); ?> (compile failure on netbsd).</li>
  <li><?php bugfix(62692); ?> (PHP fails to build with DTrace).</li>
  <li><?php bugfix(61759); ?> (class_alias() should accept classes with leading backslashes).</li>
  <li><?php bugfix(61345); ?> (CGI mode - make install don't work).</li>
  <li>Cherry-picked some DTrace build commits (allowing builds on Linux, bug <?php bugl(62691); ?> and bug <?php bugl(63706); ?>) from PHP 5.5 branch.</li>
  <li><?php bugfix(61268); ?> (--enable-dtrace leads make to clobber Zend/zend_dtrace.d)</li>
</ul></li>
<li>cURL:
<ul>
  <li><?php bugfix(65458); ?> (curl memory leak).</li>
</ul></li>
<li>Datetime:
<ul>
  <li><?php bugfix(65554); ?> (createFromFormat broken when weekday name is followed by some delimiters)</li>
  <li><?php bugfix(65564); ?> (stack-buffer-overflow in DateTimeZone stuff caught by AddressSanitizer)</li>
</ul></li>
<li>Openssl:
<ul>
  <li><?php bugfix(64802); ?> (openssl_x509_parse fails to parse subject properly in some cases).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(62129); ?> (rfc1867 crashes php even though turned off).</li>
  <li><?php bugfix(50308); ?> (session id not appended properly for empty anchor tags).</li>
  <li>Fixed possible buffer overflow under Windows. Note: Not a security fix.</li>
  <li>Changed session.auto_start to PHP_INI_PERDIR.</li>
</ul></li>
<li>SOAP:
<ul>
  <li><?php bugfix(65018); ?> (SoapHeader problems with SoapServer).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(65328); ?> (Segfault when getting SplStack object Value).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(64953); ?> (Postgres prepared statement positional parameter casting).</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(65028); ?> (Phar::buildFromDirectory creates corrupt archives for some specific contents).</li>
</ul></li>
<li>Pgsql:
<ul>
  <li><?php bugfix(65336); ?> (pg_escape_literal/identifier() silently returns false).</li>
  <li><?php bugfix(62978); ?> (Disallow possible SQL injections with pg_select()/pg_update() /pg_delete()/pg_insert()).</li>
</ul></li>
<li>Zlib:
<ul>
  <li><?php bugfix(65391); ?> (Unable to send vary header user-agent when ob_start('ob_gzhandler') is called).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.19"><!-- {{{ 5.4.19 -->
<h3>Version 5.4.19</h3>
<?php release_date('22-Aug-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(64503); ?> (Compilation fails with error: conflicting types for 'zendparse').</li>
</ul></li>
<li>Openssl:
<ul>
  <li>Fixed UMR in fix for CVE-2013-4248.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.18"><!-- {{{ 5.4.18 -->
<h3>Version 5.4.18</h3>
<?php release_date('15-Aug-2013'); ?>
<ul><li>Core:
<ul>
  <li>Fixed value of FILTER_SANITIZE_FULL_SPECIAL_CHARS constant (previously was erroneously set to FILTER_SANITIZE_SPECIAL_CHARS value).</li>
  <li><?php bugfix(65254); ?> (Exception not catchable when exception thrown in autoload with a namespace).</li>
  <li><?php bugfix(65108); ?> (is_callable() triggers Fatal Error).</li>
  <li><?php bugfix(65088); ?> (Generated configure script is malformed on OpenBSD).</li>
  <li><?php bugfix(62964); ?> (Possible XSS on "Registered stream filters" info).</li>
  <li><?php bugfix(62672); ?> (Error on serialize of ArrayObject).</li>
  <li><?php bugfix(62475); ?> (variant_* functions causes crash when null given as an argument).</li>
  <li><?php bugfix(60732); ?> (php_error_docref links to invalid pages).</li>
  <li><?php bugfix(65226); ?> (chroot() does not get enabled).</li>
</ul></li>
<li>CGI:
<ul>
  <li><?php bugfix(65143); ?> (Missing php-cgi man page).</li>
</ul></li>
<li>CLI server:
<ul>
  <li><?php bugfix(65066); ?> (Cli server not responsive when responding with 422 http status code).</li>
</ul></li>
<li>CURL:
<ul>
  <li><?php bugfix(62665); ?> (curl.cainfo doesn't appear in php.ini).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(63983); ?> (enabling FPM borks compile on FreeBSD).</li>
</ul></li>
<li>FTP:
<ul>
  <li><?php bugfix(65228); ?> (FTPs memory leak with SSL).</li>
</ul></li>
<li>GMP:
<ul>
  <li><?php bugfix(65227); ?> (Memory leak in gmp_cmp second parameter).</li>
</ul></li>
<li>Imap:
<ul>
  <li><?php bugfix(64467); ?> (Segmentation fault after imap_reopen failure).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(62759); ?> (Buggy grapheme_substr() on edge case).</li>
  <li><?php bugfix(61860); ?> (Offsets may be wrong for grapheme_stri* functions).</li>
</ul></li>
<li>mysqlnd:
<ul>
  <li>Fixed segfault in mysqlnd when doing long prepare. </li>
</ul></li>
<li>ODBC:
<ul>
  <li><?php bugfix(61387); ?> (NULL valued anonymous column causes segfault in odbc_fetch_array).</li>
</ul></li>
<li>Openssl:
<ul>
  <li>Fixed handling null bytes in subjectAltName (CVE-2013-4248).</li>
</ul></li>
<li>PDO:
<ul>
  <li>Allowed PDO_OCI to compile with Oracle Database 12c client libraries.</li>
</ul></li>
<li>PDO_dblib:
<ul>
  <li><?php bugfix(65219); ?> (PDO/dblib not working anymore ("use dbName" not sent)).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li>Fixed meta data retrieve when OID is larger than 2^31.</li>
</ul></li>
<li>Phar:
<ul>
  <li><?php bugfix(65142); ?> (Missing phar man page).</li>
</ul></li>
<li>Session:
<ul>
  <li><?php bugfix(62535); ?> ($_SESSION[$key]["cancel_upload"] doesn't work as documented).</li>
  <li><?php bugfix(35703); ?> (when session_name("123") consist only digits, should warning).</li>
  <li><?php bugfix(49175); ?> (mod_files.sh does not support hash bits).</li>
</ul></li>
<li>Sockets:
<ul>
  <li><?php implemented(63472); ?> (Setting SO_BINDTODEVICE with socket_set_option).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(65136); ?> (RecursiveDirectoryIterator segfault).</li>
  <li><?php bugfix(61828); ?> (Memleak when calling Directory(Recursive)Iterator /Spl(Temp)FileObject ctor twice).</li>
  <li><?php bugfix(60560); ?> (SplFixedArray un-/serialize, getSize(), count() return 0, keys are strings).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(65236); ?> (heap corruption in xml parser). (CVE-2013-4113)</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.4.17"><!-- {{{ 5.4.17 -->
<h3>Version 5.4.17</h3>
<?php release_date('04-Jul-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(64988); ?> (Class loading order affects E_STRICT warning).</li>
  <li><?php bugfix(64966); ?> (segfault in zend_do_fcall_common_helper_SPEC).</li>
  <li><?php bugfix(64960); ?> (Segfault in gc_zval_possible_root).</li>
  <li><?php bugfix(64936); ?> (doc comments picked up from previous scanner run).</li>
  <li><?php bugfix(64934); ?> (Apache2 TS crash with get_browser()).</li>
  <li><?php bugfix(64166); ?> (quoted-printable-encode stream filter incorrectly discarding whitespace).</li>
</ul></li>
<li>DateTime:
<ul>
  <li><?php bugfix(53437); ?> (Crash when using unserialized DatePeriod instance).</li>
</ul></li>
<li>FPM:
<ul>
  <li><?php bugfix(64915); ?> (error_log ignored when daemonize=0).</li>
  <li><?php implemented(64764); ?> (add support for FPM init.d script).</li>
</ul></li>
<li>PDO:
<ul>
  <li><?php bugfix(63176); ?> (Segmentation fault when instantiate 2 persistent PDO to the same db server).</li>
</ul></li>
<li>PDO_DBlib:
<ul>
  <li><?php bugfix(63638); ?> (Cannot connect to SQL Server 2008 with PDO dblib).</li>
  <li><?php bugfix(64338); ?> (pdo_dblib can't connect to Azure SQL).</li>
  <li><?php bugfix(64808); ?> (FreeTDS PDO getColumnMeta on a prepared but not executed statement crashes).</li>
</ul></li>
<li>PDO_firebird:
<ul>
  <li><?php bugfix(64037); ?> (Firebird return wrong value for numeric field).</li>
  <li><?php bugfix(62024); ?> (Cannot insert second row with null using parametrized query).</li>
</ul></li>
<li>PDO_mysql:
<ul>
  <li><?php bugfix(48724); ?> (getColumnMeta() doesn't return native_type for BIT, TINYINT and YEAR).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(64949); ?> (Buffer overflow in _pdo_pgsql_error).</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(64609); ?> (pg_convert enum type support).</li>
</ul></li>
<li>Readline:
<ul>
  <li>Implement FR <?php bugl(55694); ?> (Expose additional readline variable to prevent default filename completion).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(64997); ?> (Segfault while using RecursiveIteratorIterator on 64-bits systems).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.16"><!-- {{{ 5.4.16 -->
<h3>Version 5.4.16</h3>
<?php release_date('06-Jun-2013'); ?>
<ul>
<li>Core:
<ul>
 <li><?php bugfix(64879); ?> (Heap based buffer overflow in quoted_printable_encode, CVE-2013-2110).</li>
 <li><?php bugfix(64853); ?> (Use of no longer available ini directives causes crash on TS build).</li>
 <li><?php bugfix(64729); ?> (compilation failure on x32). </li>
 <li><?php bugfix(64720); ?> (SegFault on zend_deactivate). </li>
 <li><?php bugfix(64660); ?> (Segfault on memory exhaustion within function definition).</li>
</ul>
</li>
<li>Calendar:
<ul>
 <li><?php bugfix(64895); ?> (Integer overflow in SndToJewish).</li>
</ul>
</li>
<li>Fileinfo:
<ul>
 <li><?php bugfix(64830); ?> (mimetype detection segfaults on mp3 file).</li>
</ul>
</li>
<li>FPM:
<ul>
 <li>Ignore QUERY_STRING when sent in SCRIPT_FILENAME.</li>
 <li>Fixed some possible memory or resource leaks and possible null dereference detected by code coverity scan.</li>
 <li>Log a warning when a syscall fails.</li>
 <li>Add --with-fpm-systemd option to report health to systemd, and systemd_interval option to configure this. The service can now use Type=notify in the systemd unit file.</li>
</ul>
</li>
<li>MySQLi
<ul>
  <li><?php bugfix(64726); ?> (Segfault when calling fetch_object on a use_result and DB pointer has closed).</li>
</ul>
</li>
<li>Phar:
<ul>
 <li><?php bugfix(64214); ?> (PHAR PHPTs intermittently crash when run on DFS, SMB or with non std tmp dir).</li>
</ul>
</li>
<li>SNMP:
<ul>
 <li><?php bugfix(64765); ?> (Some IPv6 addresses get interpreted wrong).</li>
 <li><?php bugfix(64159); ?> (Truncated snmpget).</li>
</ul>
</li>
<li>Streams:
<ul>
 <li><?php bugfix(64770); ?> (stream_select() fails with pipes returned by proc_open() on Windows x64).</li>
</ul>
</li>
<li>Zend Engine:
<ul>
 <li><?php bugfix(64821); ?> (Custom Exceptions crash when internal properties overridden).</li>
</ul>
</li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.15"><!-- {{{ 5.4.15 -->
<h3>Version 5.4.15</h3>
<?php release_date('09-May-2013'); ?>
<ul>
<li>Core:
<ul>
  <li> <?php bugfix(64578); ?> (debug_backtrace in set_error_handler corrupts zend heap: segfault). </li>
  <li> <?php bugfix(64458); ?> (dns_get_record result with string of length -1). </li>
  <li> <?php bugfix(64433); ?> (follow_location parameter of context is ignored for most response codes). </li>
  <li> <?php bugfix(47675); ?> (fd leak on Solaris).</li>
  <li> <?php bugfix(64577); ?> (fd leak on Solaris).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li> Upgraded libmagic to 5.14. </li>
</ul></li>
<li>Streams:
<ul>
  <li> Fixed Windows x64 version of stream_socket_pair() and improved error handling.</li>
</ul></li>
<li>Zip:
<ul>
  <li> <?php bugfix(64342); ?> (ZipArchive::addFile() has to check for file existence).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.14"><!-- {{{ 5.4.14 -->
<h3>Version 5.4.14</h3>
<?php release_date('11-April-2013'); ?>
<ul>
<li>Core:
<ul>
 <li><?php bugfix(64529); ?> (Ran out of opcode space).</li>
 <li><?php bugfix(64515); ?> (Memoryleak when using the same variablename two times in function declaration).</li>
 <li><?php bugfix(64432); ?> (more empty delimiter warning in strX methods).</li>
 <li><?php bugfix(64417); ?> (ArrayAccess::&amp;offsetGet() in a trait causes fatal error).</li>
 <li><?php bugfix(64370); ?> (microtime(true) less than $_SERVER['REQUEST_TIME_FLOAT']).</li>
 <li><?php bugfix(64239); ?> (Debug backtrace changed behavior since 5.4.10 or 5.4.11).</li>
 <li><?php bugfix(63976); ?> (Parent class incorrectly using child constant in class property).</li>
 <li><?php bugfix(63914); ?> (zend_do_fcall_common_helper_SPEC does not handle exceptions properly).</li>
 <li><?php bugfix(62343); ?> (Show class_alias In get_declared_classes()).</li>
</ul></li>

<li>PCRE:
<ul>
 <li>Merged PCRE 8.32.</li>
</ul></li>

<li>SNMP:
<ul>
 <li><?php bugfix(61981); ?> (OO API, walk: $suffix_as_key is not working correctly).</li>
</ul></li>

<li>Zip:
<ul>
 <li><?php bugfix(64452); ?> (Zip crash intermittently). (Anatol)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.13"><!-- {{{ 5.4.13 -->
<h3>Version 5.4.13</h3>
<?php release_date('14-March-2013'); ?>
<ul>
<li>Core:
<ul>
 <li><?php bugfix(64235); ?> (Insteadof not work for class method in 5.4.11).</li>
 <li><?php implemented(64175); ?> (Added HTTP codes as of RFC 6585).</li>
 <li><?php bugfix(64142); ?> (dval to lval different behavior on ppc64). </li>
 <li><?php bugfix(64070); ?> (Inheritance with Traits failed with error).</li>
</ul></li>
<li>CLI server:
<ul>
 <li><?php bugfix(64128); ?> (buit-in web server is broken on ppc64).</li>
</ul></li>
<li>Mbstring:
<ul>
 <li>mb_split() can now handle empty matches like preg_split() does.</li>
</ul></li>
<li>OpenSSL:
<ul>
 <li><?php bugfix(61930); ?> (openssl corrupts ssl key resource when using
    openssl_get_publickey()). </li>
</ul></li>
<li>PDO_mysql:
<ul>
 <li><?php bugfix(60840); ?> (undefined symbol: mysqlnd_debug_std_no_trace_funcs).</li>
</ul></li>
<li>Phar:
<ul>
 <li>Fixed timestamp update on Phar contents modification.</li>
</ul></li>
<li>SOAP:
<ul>
 <li>Added check that soap.wsdl_cache_dir conforms to open_basedir
    (CVE-2013-1635). </li>
 <li>Disabled external entities loading (CVE-2013-1643, CVE-2013-1824).</li>
</ul></li>
<li>SPL:
<ul>
 <li><?php bugfix(64264); ?> (SPLFixedArray toArray problem). </li>
 <li><?php bugfix(64228); ?> (RecursiveDirectoryIterator always assumes SKIP_DOTS).</li>
 <li><?php bugfix(64106); ?> (Segfault on SplFixedArray[][x] = y when extended). </li>
 <li><?php bugfix(52861); ?> (unset fails with ArrayObject and deep arrays).</li>
</ul></li>
<li>SNMP:
<ul>
 <li><?php bugfix(64124); ?> (IPv6 malformed).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.12"><!-- {{{ 5.4.12 -->
<h3>Version 5.4.12</h3>
<?php release_date('21-February-2013'); ?>
<ul>
<li>Core:
<ul>
  <li><?php bugfix(64099); ?> (Wrong TSRM usage in zend_register_class alias).</li>
  <li><?php bugfix(64011); ?> (get_html_translation_table() output incomplete with HTML_ENTITIES and ISO-8859-1).</li>
  <li><?php bugfix(63982); ?> (isset() inconsistently produces a fatal error on protected property).</li>
  <li><?php bugfix(63943); ?> (Bad warning text from strpos() on empty needle).</li>
  <li><?php bugfix(63899); ?> (Use after scope error in zend_compile).</li>
  <li><?php bugfix(63893); ?> (Poor efficiency of strtr() using array with keys of very different length).</li>
  <li><?php bugfix(63882); ?> (zend_std_compare_objects crash on recursion).</li>
  <li><?php bugfix(63462); ?> (Magic methods called twice for unset protected properties).</li>
  <li><?php bugfix(62524); ?> (fopen follows redirects for non-3xx statuses).</li>
  <li>Support BITMAPV5HEADER in getimagesize().</li>
</ul></li>
</ul>

<ul>
<li>Date:
<ul>
  <li><?php bugfix(63699); ?> (Performance improvements for various ext/date functions).</li>
  <li><?php bugfix(55397); ?> Comparsion of incomplete DateTime causes SIGSEGV.</li>
</ul></li>
</ul>

<ul>
<li>FPM:
<ul>
  <li><?php bugfix(63999); ?> (php with fpm fails to build on Solaris 10 or 11).</li>
</ul></li>
</ul>

<ul>
<li>Litespeed:
<ul>
  <li><?php bugfix(63228); ?> (-Werror=format-security error in lsapi code).</li>
</ul></li>
</ul>

<ul>
<li>sqlite3:
<ul>
  <li><?php bugfix(63921); ?> (sqlite3::bindvalue and relative PHP functions aren't using sqlite3_*_int64 API).</li>
</ul></li>
</ul>

<ul>
<li>PDO_OCI:
<ul>
  <li><?php bugfix(57702); ?> (Multi-row BLOB fetches).</li>
  <li><?php bugfix(52958); ?> (Segfault in PDO_OCI on cleanup after running a long testsuite).</li>
</ul></li>
</ul>

<ul>
<li>PDO_sqlite:
<ul>
  <li><?php bugfix(63916); ?> (PDO::PARAM_INT casts to 32bit int internally even on 64bit builds in pdo_sqlite).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.4.11"><!-- {{{ 5.4.11 -->
<h3>Version 5.4.11</h3>
<?php release_date('17-January-2013'); ?>
<ul>
<li>Core:
<ul>
  <li><?php bugfix(63762); ?> (Sigsegv when Exception::$trace is changed by user).</li>
  <li><?php bugfix(43177); ?> (Errors in eval()'ed code produce status code 500).</li>
</ul></li>
</ul>

<ul>
<li>Filter:
<ul>
  <li><?php bugfix(63757); ?> (getenv() produces memory leak with CGI SAPI).</li>
  <li><?php bugfix(54096); ?> (FILTER_VALIDATE_INT does not accept +0 and -0).</li>
</ul></li>
</ul>

<ul>
<li>JSON:
<ul>
  <li><?php bugfix(63737); ?> (json_decode does not properly decode with options parameter).</li>
</ul></li>
</ul>

<ul>
<li>CLI server:
<ul>
  <li>Update list of common mime types. Added webm, ogv, ogg.</li>
</ul></li>
</ul>

<ul>
<li>cURL extension:
<ul>
  <li>Fixed bug (segfault due to libcurl connection caching).</li>
  <li><?php bugfix(63859); ?> (Memory leak when reusing curl-handle).</li>
  <li><?php bugfix(63795); ?> (CURL &gt;= 7.28.0 no longer support value 1 for CURLOPT_SSL_VERIFYHOST).</li>
  <li><?php bugfix(63352); ?> (Can't enable hostname validation when using curl stream wrappers).</li>
  <li><?php bugfix(55438); ?> (Curlwapper is not sending http header randomly).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.4.10"><!-- {{{ 5.4.10 -->
<h3>Version 5.4.10</h3>
<?php release_date('20-December-2012'); ?>
<ul>
<li>Core:
<ul>
  <li><?php bugfix(63635); ?> (Segfault in gc_collect_cycles).</li>
  <li><?php bugfix(63512); ?> (parse_ini_file() with INI_SCANNER_RAW removes quotes from value).</li>
  <li><?php bugfix(63468); ?> (wrong called method as callback with inheritance).</li>
  <li><?php bugfix(63451); ?> (config.guess file does not have AIX 7 defined, shared objects are not created).</li>
  <li><?php bugfix(61557); ?> (Crasher in tt-rss backend.php).</li>
  <li><?php bugfix(61272); ?> (ob_start callback gets passed empty string).</li>
</ul></li>
</ul>

<ul>
<li>Date:
<ul>
  <li><?php bugfix(63666); ?> (Poor date() performance).</li>
  <li><?php bugfix(63435); ?> (Datetime::format('u') sometimes wrong by 1 microsecond).</li>
</ul></li>
</ul>

<ul>
<li>Imap:
<ul>
  <li><?php bugfix(63126); ?> (DISABLE_AUTHENTICATOR ignores array).</li>
</ul></li>
</ul>

<ul>
<li>Json:
<ul>
  <li><?php bugfix(63588); ?> (use php_next_utf8_char and remove duplicate implementation).</li>
</ul></li>
</ul>

<ul>
<li>MySQLi:
<ul>
  <li><?php bugfix(63361); ?> (missing header).</li>
</ul></li>
</ul>

<ul>
<li>MySQLnd:
<ul>
  <li><?php bugfix(63398); ?> (Segfault when polling closed link).</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo:
<ul>
  <li><?php bugfix(63590); ?> (Different results in TS and NTS under Windows).</li>
</ul></li>
</ul>

<ul>
<li>FPM:
<ul>
  <li><?php bugfix(63581); ?> Possible null dereference and buffer overflow.</li>
</ul></li>
</ul>

<ul>
<li>Pdo_sqlite:
<ul>
  <li><?php bugfix(63149); ?> getColumnMeta should return the table name when system SQLite used.</li>
</ul></li>
</ul>

<ul>
<li>Apache2 Handler SAPI:
<ul>
  <li>Enabled Apache 2.4 configure option for Windows.</li>
</ul></li>
</ul>

<ul>
<li>Reflection:
<ul>
  <li><?php bugfix(63614); ?> (Fatal error on Reflection).</li>
</ul></li>
</ul>

<ul>
<li>SOAP:
<ul>
  <li><?php bugfix(63271); ?> (SOAP wsdl cache is not enabled after initial requests).</li>
</ul></li>
</ul>

<ul>
<li>Sockets:
<ul>
  <li><?php bugfix(49341); ?> (Add SO_REUSEPORT support for socket_set_option()).</li>
</ul></li>
</ul>
<!-- }}} --></section>


<section class="version" id="5.4.9"><!-- {{{ 5.4.9 -->
<h3>Version 5.4.9</h3>
<?php release_date('22-November-2012'); ?>
<ul>
<li>Core:
<ul>
  <li><?php bugfix(63305); ?> (zend_mm_heap corrupted with traits).</li>
  <li><?php bugfix(63369); ?> ((un)serialize() leaves dangling pointers, causes crashes).</li>
  <li><?php bugfix(63241); ?> (PHP fails to open Windows deduplicated files).</li>
  <li><?php bugfix(62444); ?> (Handle leak in is_readable on windows). </li>
</ul></li>
</ul>

<ul>
<li>Curl:
<ul>
  <li><?php bugfix(63363); ?> (Curl silently accepts boolean true for SSL_VERIFYHOST).</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo:
<ul>
  <li><?php bugfix(63248); ?> (Load multiple magic files from a directory under Windows).</li>
</ul></li>
</ul>

<ul>
<li>Libxml
<ul>
  <li><?php bugfix(63389); ?> (Missing context check on libxml_set_streams_context()
    causes memleak).</li>
</ul></li>
</ul>

<ul>
<li>Mbstring:
<ul>
  <li><?php bugfix(63447); ?> (max_input_vars doesn't filter variables when
    mbstring.encoding_translation = On).</li>
</ul></li>
</ul>

<ul>
<li>OCI8:
<ul>
  <li><?php bugfix(63265); ?> (Add ORA-00028 to the PHP_OCI_HANDLE_ERROR macro)</li>
</ul></li>
</ul>

<ul>
<li>PCRE:
<ul>
  <li><?php bugfix(63180); ?> (Corruption of hash tables).</li>
  <li><?php bugfix(63055); ?> (Segfault in zend_gc with SF2 testsuite).</li>
  <li><?php bugfix(63284); ?> (Upgrade PCRE to 8.31).</li>
</ul></li>
</ul>

<ul>
<li>PDO:
<ul>
  <li><?php bugfix(63235); ?> (buffer overflow in use of SQLGetDiagRec).</li>
</ul></li>
</ul>

<ul>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(62593); ?> (Emulate prepares behave strangely with PARAM_BOOL).</li>
</ul></li>
</ul>

<ul>
<li>Phar:
<ul>
  <li><?php bugfix(63297); ?> (Phar fails to write an openssl based signature).</li>
</ul></li>
</ul>

<ul>
<li>Streams:
<ul>
  <li><?php bugfix(63240); ?> (stream_get_line() return contains delimiter string).</li>
</ul></li>
</ul>

<ul>
<li>Reflection:
<ul>
  <li><?php bugfix(63399); ?>  (ReflectionClass::getTraitAliases() incorrectly resolves traitnames).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.8"><!-- {{{ 5.4.8 -->
<h3>Version 5.4.8</h3>
<?php release_date('18-October-2012'); ?>
<ul>
<li>CLI server
<ul>
  <li>Changed response to unknown HTTP method to 501 according to RFC.</li>
  <li>Support HTTP PATCH method.</li>
</ul></li>
</ul>

<ul>
<li>Core
<ul>
  <li>Added optional second argument for assert() to specify custom message.</li>
  <li>Support building PHP with the native client toolchain.</li>
  <li>Added --offline option for tests.</li>
  <li><?php bugfix(63162); ?> (parse_url does not match password component).</li>
  <li><?php bugfix(63111); ?> (is_callable() lies for abstract static method).</li>
  <li><?php bugfix(63093); ?> (Segfault while load extension failed in zts-build).</li>
  <li><?php bugfix(62976); ?> (Notice: could not be converted to int when comparing some builtin classes).</li>
  <li><?php bugfix(62955); ?> (Only one directive is loaded from "Per Directory Values" Windows registry).</li>
  <li><?php bugfix(62907); ?> (Double free when use traits).</li>
  <li><?php bugfix(61767); ?> (Shutdown functions not called in certain error situation).</li>
  <li><?php bugfix(60909); ?> (custom error handler throwing Exception + fatal error = no shutdown function).</li>
  <li><?php bugfix(60723); ?> (error_log error time has changed to UTC ignoring default timezone).</li>
</ul></li>
</ul>

<ul>
<li>cURL
<ul>
  <li><?php bugfix(62085); ?> (file_get_contents a remote file by Curl wrapper will cause cpu Soaring).</li>
</ul></li>
</ul>

<ul>
<li>Date
<ul>
  <li><?php bugfix(62896); ?> ("DateTime-&gt;modify('+0 days')" modifies DateTime object)</li>
  <li><?php bugfix(62561); ?> (DateTime add 'P1D' adds 25 hours).</li>
</ul></li>
</ul>

<ul>
<li>DOM
<ul>
  <li><?php bugfix(63015); ?> (Incorrect arginfo for DOMErrorHandler).</li>
</ul></li>
</ul>

<ul>
<li>FPM
<ul>
  <li><?php bugfix(62954); ?> (startup problems fpm / php-fpm).</li>
  <li><?php bugfix(62886); ?> (PHP-FPM may segfault/hang on startup).</li>
  <li><?php bugfix(63085); ?> (Systemd integration and daemonize).</li>
  <li><?php bugfix(62947); ?> (Unneccesary warnings on FPM).</li>
  <li><?php bugfix(62887); ?> (Only /status?plain&amp;full gives "last request cpu").</li>
  <li><?php bugfix(62216); ?> (Add PID to php-fpm init.d script).</li>
</ul></li>
</ul>

<ul>
<li>OpenSSL
<ul>
  <li><?php implemented(61421); ?> (OpenSSL signature verification missing RMD160, SHA224, SHA256, SHA384, SHA512).</li>
</ul></li>
</ul>

<ul>
<li>SOA
<ul>
  <li><?php bugfix(50997); ?> (SOAP Error when trying to submit 2nd Element of a choice).</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
  <li><?php bugfix(62987); ?> (Assigning to ArrayObject[null][something] overrides all undefined variables).</li>
</ul></li>
</ul>

<ul>
<li>mbstring
<ul>
  <li>Allow passing null as a default value to mb_substr() and mb_strcut(). Patch by Alexander Moskaliov via GitHub PR <?php githubissuel('php/php-src', 133); ?>.</li>
</ul></li>
</ul>

<ul>
<li>Filter extension
<ul>
  <li><?php bugfix(49510); ?> (Boolean validation fails with FILTER_NULL_ON_FAILURE with empty string or false.)</li>
</ul></li>
</ul>

<ul>
<li>Socket
<ul>
  <li><?php bugfix(63000); ?> (MCAST_JOIN_GROUP on OSX is broken, merge of PR 185 by Igor Wiedler).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.7"><!-- {{{ 5.4.7 -->
<h3>Version 5.4.7</h3>
<?php release_date('13-September-2012'); ?>
<ul>
<li>Core
<ul>
    <li>Fixed bug (segfault while build with zts and GOTO vm-kind)</li>
    <li><?php bugfix(62955); ?> (Only one directive is loaded from "Per Directory Values" Windows registry)</li>
    <li><?php bugfix(62844); ?> (parse_url() does not recognize //)</li>
    <li><?php bugfix(62829); ?> (stdint.h included on platform where HAVE_STDINT_H is not set)</li>
    <li><?php bugfix(62763); ?> (register_shutdown_function and extending class)</li>
    <li><?php bugfix(62725); ?> (Calling exit() in a shutdown function does not return the exit value)</li>
    <li><?php bugfix(62744); ?> (dangling pointers made by zend_disable_class)</li>
    <li><?php bugfix(62716); ?> (munmap() is called with the incorrect length)</li>
    <li><?php bugfix(62358); ?> (Segfault when using traits a lot)</li>
    <li><?php bugfix(62328); ?> (implementing __toString and a cast to string fails)</li>
    <li><?php bugfix(51363); ?> (Fatal error raised by var_export() not caught by error handler)</li>
    <li><?php bugfix(40459); ?> (Stat and Dir stream wrapper methods do not call constructor)</li>
</ul></li>
</ul>

<ul>
<li>CURL
<ul>
    <li><?php bugfix(62912); ?> (CURLINFO_PRIMARY_* AND CURLINFO_LOCAL_* not exposed)</li>
    <li><?php bugfix(62839); ?> (curl_copy_handle segfault with CURLOPT_FILE)</li>
</ul></li>
</ul>

<ul>
<li>DateTime
<ul>
    <li><?php bugfix(62852); ?> (Unserialize invalid DateTime causes crash)</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
    <li>Fixed Spoofchecker not being registered on ICU 49.1</li>
    <li><?php bugfix(62933); ?> (ext/intl compilation error on icu 3.4.1)</li>
    <li><?php bugfix(62915); ?> (defective cloning in several intl classes)</li>
</ul></li>
</ul>

<ul>
<li>Installation
<ul>
    <li><?php bugfix(62460); ?> (php binaries installed as binary.dSYM)</li>
</ul></li>
</ul>

<ul>
<li>PCRE
<ul>
    <li><?php bugfix(55856); ?> (preg_replace should fail on trailing garbage)</li>
</ul></li>
</ul>

<ul>
<li>PDO
<ul>
    <li><?php bugfix(62685); ?> (Wrong return datatype in PDO::inTransaction())</li>
</ul></li>
</ul>

<ul>
<li>Reflection
<ul>
    <li><?php bugfix(62892); ?> (ReflectionClass::getTraitAliases crashes on importing trait methods as private)</li>
    <li><?php bugfix(62715); ?> (ReflectionParameter::isDefaultValueAvailable() wrong result)</li>
</ul></li>
</ul>

<ul>
<li>Session
<ul>
    <li>Fixed bug (segfault due to retval is not initialized)</li>
    <li>Fixed bug (segfault due to PS(mod_user_implemented) not be reseted when close handler call exit)</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
    <li><?php bugfix(62904); ?> (Crash when cloning an object which inherits SplFixedArray)</li>
    <li><?php implemented(62840); ?> (Add sort flag to ArrayObject::ksort)</li>
</ul></li>
</ul>

<ul>
<li>Standard
<ul>
    <li><?php bugfix(62836); ?> (Seg fault or broken object references on unserialize())</li>
</ul></li>
</ul>

<ul>
<li>FPM
<ul>
    <li>Merged PR 121 by minitux to add support for slow request counting on PHP FPM status page</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.6"><!-- {{{ 5.4.6 -->
<h3>Version 5.4.6</h3>
<?php release_date('16-August-2012'); ?>
<ul>
<li>CLI Server
<ul>
    <li><?php implemented(62700); ?> (have the console output 'Listening on http://localhost:8000').</li>
</ul></li>
</ul>

<ul>
<li>Core
<ul>
  <li><?php bugfix(62661); ?> (Interactive php-cli crashes if include() is used in auto_prepend_file).</li>
  <li><?php bugfix(62653); ?>: (unset($array[$float]) causes a crash).</li>
  <li><?php bugfix(62565); ?> (Crashes due non-initialized internal properties_table).</li>
  <li><?php bugfix(60194); ?> (--with-zend-multibyte and --enable-debug reports LEAK with run-test.php).</li>
</ul></li>
</ul>

<ul>
<li>CURL
<ul>
  <li><?php bugfix(62499); ?> (curl_setopt($ch, CURLOPT_COOKIEFILE, "") returns false).</li>
</ul></li>
</ul>

<ul>
<li>DateTime
<ul>
  <li><?php bugfix(62500); ?> (Segfault in DateInterval class when extended).</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo
<ul>
  <li><?php bugfix(61964); ?> (finfo_open with directory causes invalid free).</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
  <li><?php bugfix(62564); ?> (Extending MessageFormatter and adding property causes crash).</li>
</ul></li>
</ul>

<ul>
<li>MySQLnd
<ul>
  <li><?php bugfix(62594); ?> (segfault in mysqlnd_res_meta::set_mode).</li>
</ul></li>
</ul>

<ul>
<li>readline
<ul>
  <li><?php bugfix(62612); ?> (readline extension compilation fails with sapi/cli/cli.h: No such file).</li>
</ul></li>
</ul>

<ul>
<li>Reflection
<ul>
  <li><?php implemented(61602); ?> (Allow access to name of constant used as default value).</li>
</ul></li>
</ul>

<ul>
<li>SimpleXML
<ul>
  <li><?php implemented(55218); ?> (Get namespaces from current node).</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
  <li><?php bugfix(62616); ?> (ArrayIterator::count() from IteratorIterator instance gives Segmentation fault).</li>
  <li><?php bugfix(61527); ?> (ArrayIterator gives misleading notice on next() when moved to the end).</li>
</ul></li>
</ul>

<ul>
<li>Streams
<ul>
  <li><?php bugfix(62597); ?> (segfault in php_stream_wrapper_log_error with ZTS build).</li>
</ul></li>
</ul>

<ul>
<li>Zlib
<ul>
  <li><?php bugfix(55544); ?> (ob_gzhandler always conflicts with zlib.output_compression).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.5"><!-- {{{ 5.4.5 -->
<h3>Version 5.4.5</h3>
<?php release_date('19-July-2012'); ?>
<ul>
<li>Core
<ul>
  <li><?php bugfix(62443); ?> (Crypt SHA256/512 Segfaults With Malformed Salt)</li>
  <li><?php bugfix(62432); ?> (ReflectionMethod random corrupt memory on high concurrent)</li>
  <li><?php bugfix(62373); ?> (serialize() generates wrong reference to the object).</li>
  <li><?php bugfix(62357); ?> (compile failure: (S) Arguments missing for built-in function __memcmp)</li>
  <li><?php bugfix(61998); ?> (Using traits with method aliases appears to result in crash during execution)</li>
  <li><?php bugfix(51094); ?> (parse_ini_file() with INI_SCANNER_RAW cuts a value that includes a semi-colon)</li>
  <li>Fixed potential overflow in _php_stream_scandir (CVE-2012-2688)</li>
</ul></li>
</ul>

<ul>
<li>EXIF
<ul>
  <li>Fixed information leak in ext exif</li>
</ul></li>
</ul>

<ul>
<li>FPM
<ul>
  <li><?php bugfix(62205); ?> (php-fpm segfaults (null passed to strstr)</li>
  <li><?php bugfix(62160); ?> (Add process.priority to set nice(2) priorities)</li>
  <li><?php bugfix(62153); ?> (when using unix sockets, multiples FPM instances)</li>
  <li><?php bugfix(62033); ?> (php-fpm exits with status 0 on some failures to start)</li>
  <li><?php bugfix(61839); ?> (Unable to cross-compile PHP with --enable-fpm)</li>
  <li><?php bugfix(61835); ?> (php-fpm is not allowed to run as root)</li>
  <li><?php bugfix(61295); ?> (php-fpm should not fail with commented 'user'</li>
  <li><?php bugfix(61218); ?> (FPM drops connection while receiving some binary values in FastCGI requests)</li>
  <li><?php bugfix(61045); ?> (fpm don't send error log to fastcgi clients). (fat) for non-root start)</li>
  <li><?php bugfix(61026); ?> (FPM pools can listen on the same address). (fat) can be launched without errors)</li>
</ul></li>
</ul>

<ul>
<li>Iconv
<ul>
<li><?php bugfix(55042); ?> (Erealloc in iconv.c unsafe)</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
  <li><?php bugfix(62083); ?> (grapheme_extract() memory leaks)</li>
  <li><?php bugfix(62081); ?> (IntlDateFormatter constructor leaks memory when called twice)</li>
  <li><?php bugfix(62070); ?> (Collator::getSortKey() returns garbage)</li>
  <li><?php bugfix(62017); ?> (datefmt_create with incorrectly encoded timezone leaks pattern)</li>
  <li><?php bugfix(60785); ?> (memory leak in IntlDateFormatter constructor)</li>
  <li>ResourceBundle constructor now accepts NULL for the first two arguments</li>
</ul></li>
</ul>

<ul>
<li>JSON
<ul>
  <li><?php bugfix(61359); ?> (json_encode() calls too many reallocs)</li>
</ul></li>
</ul>

<ul>
<li>libxml
<ul>
  <li><?php bugfix(62266); ?> (Custom extension segfaults during xmlParseFile with FPM SAPI)</li>
</ul></li>
</ul>

<ul>
<li>Phar
<ul>
  <li><?php bugfix(62227); ?> (Invalid phar stream path causes crash)</li>
</ul></li>
</ul>

<ul>
<li>Readline
<ul>
  <li><?php bugfix(62186); ?> (readline fails to compile - void function should not return a value)</li>
</ul></li>
</ul>

<ul>
<li>Reflection
<ul>
  <li><?php bugfix(62384); ?> (Attempting to invoke a Closure more than once causes segfault)</li>
  <li><?php bugfix(62202); ?> (ReflectionParameter::getDefaultValue() memory leaks with constant)</li>
</ul></li>
</ul>

<ul>
<li>Sockets
<ul>
  <li><?php bugfix(62025); ?> (__ss_family was changed on AIX 5.3)</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
  <li><?php bugfix(62433); ?> (Inconsistent behavior of RecursiveDirectoryIterator to dot files)</li>
  <li><?php bugfix(62262); ?> (RecursiveArrayIterator does not implement Countable)</li>
</ul></li>
</ul>

<ul>
<li>XML Writer
<ul>
  <li><?php bugfix(62064); ?> (memory leak in the XML Writer module)</li>
</ul></li>
</ul>

<ul>
<li>Zip
<ul>
  <li>Upgraded libzip to 0.10.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.4"><!-- {{{ 5.4.4 -->
<h3>Version 5.4.4</h3>
<?php release_date('06-June-2012'); ?>
<ul>
<li>CLI SAPI
<ul>
  <li><?php implemented(61977); ?> (Need CLI web-server support for files with .htm &amp; svg extensions)</li>
  <li>Improved performance while sending error page, this also fixed bug <?php bugfix(61785); ?>
  (Memory leak when access a non-exists file without router)</li>
  <li><?php bugfix(61546); ?> (functions related to current script failed when chdir() in cli sapi)</li>
</ul></li>
</ul>

<ul>
<li>Core
<ul>
  <li>Fixed missing bound check in iptcparse()</li>
  <li>Fixed CVE-2012-2143</li>
  <li><?php bugfix(62097); ?> (fix for bug <?php bugl(54547); ?>)</li>
  <li><?php bugfix(62005); ?> (unexpected behavior when incrementally assigning to a member of a null object)</li>
  <li><?php bugfix(61978); ?> (Object recursion not detected for classes that implement JsonSerializable)</li>
  <li><?php bugfix(61991); ?> (long overflow in realpath_cache_get())</li>
  <li><?php bugfix(61922); ?> (ZTS build doesn't accept zend.script_encoding config)</li>
  <li><?php bugfix(61827); ?> (incorrect \e processing on Windows)</li>
  <li><?php bugfix(61782); ?> (__clone/__destruct do not match other methods when checking access controls)</li>
  <li><?php bugfix(61761); ?> ('Overriding' a private static method with a different signature causes crash)</li>
  <li><?php bugfix(61730); ?> (Segfault from array_walk modifying an array passed by reference)</li>
  <li><?php bugfix(61728); ?> (PHP crash when calling ob_start in request_shutdown phase)</li>
  <li><?php bugfix(61660); ?> (bin2hex(hex2bin($data)) != $data)</li>
  <li><?php bugfix(61650); ?> (ini parser crashes when using ${xxxx} ini variables (without apache2))</li>
  <li><?php bugfix(61605); ?> (header_remove() does not remove all headers)</li>
  <li><?php bugfix(54547); ?> (wrong equality of string numbers)</li>
  <li><?php bugfix(54197); ?> ([PATH=] sections incompatibility with user_ini.filename set to null)</li>
  <li>Changed php://fd to be available only for CLI</li>
</ul></li>
</ul>

<ul>
<li>CURL
<ul>
  <li><?php bugfix(61948); ?> (CURLOPT_COOKIEFILE '' raises open_basedir restriction)</li>
</ul></li>
</ul>

<ul>
<li>COM
<ul>
  <li><?php bugfix(62146); ?> com_dotnet cannot be built shared</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo
<ul>
  <li><?php bugfix(61812); ?> (Uninitialised value used in libmagic)</li>
</ul></li>
</ul>

<ul>
<li>FPM
<ul>
  <li><?php bugfix(61812); ?> (Uninitialised value used in libmagic)</li>
  <li><?php bugfix(61565); ?> where php_stream_open_wrapper_ex tries to open a directory descriptor under windows</li>
  <li><?php bugfix(61566); ?> failure caused by the posix lseek and read versions under windows in cdf_read()</li>
</ul></li>
</ul>

<ul>
<li>Iconv
<ul>
  <li>Fixed a bug that iconv extension fails to link to the correct library when another extension makes use of a library that links to the iconv library. See <a href="https://bugs.gentoo.org/show_bug.cgi?id=364139">https://bugs.gentoo.org/show_bug.cgi?id=364139</a> for detail</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
  <li><?php bugfix(62082); ?> (Memory corruption in internal function get_icu_disp_value_src_php()</li>
</ul></li>
</ul>

<ul>
<li>JSON
<ul>
  <li><?php bugfix(61537); ?> (json_encode() incorrectly truncates/discards information)</li>
</ul></li>
</ul>

<ul>
<li>LibXML
<ul>
  <li><?php bugfix(61617); ?> (Libxml tests failed(ht is already destroyed))</li>
</ul></li>
</ul>

<ul>
<li>PDO
<ul>
  <li><?php bugfix(61755); ?> (A parsing bug in the prepared statements can lead to access violations). (CVE-2012-3450)</li>
</ul></li>
</ul>

<ul>
<li>Phar
<ul>
<li><?php bugfix(61065); ?> (Secunia SA44335) (CVE-2012-2386)</li>
</ul></li>
</ul>

<ul>
<li>Streams
<ul>
  <li><?php bugfix(61961); ?> (file_get_contents leaks when access empty file with maxlen set)</li>
</ul></li>
</ul>

<ul>
<li>zlib
<ul>
  <li><?php bugfix(61820); ?> (using ob_gzhandler will complain about headers already sent when no compression)</li>
  <li><?php bugfix(61443); ?> (can't change zlib.output_compression on the fly)</li>
  <li><?php bugfix(60761); ?> (zlib.output_compression fails on refresh)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.3"><!-- {{{ 5.4.3 -->
<h3>Version 5.4.3</h3>
<?php release_date('08-May-2012'); ?>

<ul>
  <li><?php bugfix(61807); ?> Buffer Overflow in apache_request_headers, CVE-2012-2329.</li>
  <li><?php bugfix(61910); ?> Improve fix for PHP-CGI query string parameter vulnerability, CVE-2012-2311.</li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.2"><!-- {{{ 5.4.2 -->
<h3>Version 5.4.2</h3>
<?php release_date('03-May-2012'); ?>

<ul>
  <li><?php bugfix(61910); ?> Fix PHP-CGI query string parameter vulnerability, CVE-2012-1823.</li>
</ul>
<!-- }}} --></section>



<section class="version" id="5.4.1"><!-- {{{ 5.4.1 -->
<h3>Version 5.4.1</h3>
<?php release_date('26-Apr-2012'); ?>

<ul>
<li>CLI Server
<ul>
  <li><?php bugfix(61461); ?> (missing checks around malloc() calls).</li>
  <li><?php implemented(60850); ?> (Built in web server does not set
    $_SERVER['SCRIPT_FILENAME'] when using router).</li>
</ul></li>
</ul>

<ul>
<li>Core
<ul>
  <li>Fixed crash in ZTS using same class in many threads.</li>
  <li><?php bugfix(61374); ?> (html_entity_decode tries to decode code points that don't
    exist in ISO-8859-1).</li>
  <li><?php bugfix(61225); ?> (Incorrect lexing of 0b00*+&lt;NUM&gt;).</li>
  <li><?php bugfix(61106); ?> (Segfault when using header_register_callback).</li>
  <li><?php bugfix(61052); ?> (Missing error check in trait 'insteadof' clause).</li>
  <li><?php bugfix(61011); ?> (Crash when an exception is thrown by __autoload
    accessing a static property).</li>
  <li><?php bugfix(60978); ?> (exit code incorrect).</li>
  <li><?php bugfix(60911); ?> (Confusing error message when extending traits).</li>
  <li><?php bugfix(60717); ?> (Order of traits in use statement can cause a fatal
    error).</li>
  <li><?php bugfix(60573); ?> (type hinting with "self" keyword causes weird errors).</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo
<ul>
  <li>Fix fileinfo test problems.</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
  <li><?php bugfix(61487); ?> (Incorrent bounds checking in grapheme_strpos).</li>
</ul></li>
</ul>

<ul>
<li>mbstring
<ul>
  <li>MFH mb_ereg_replace_callback() for security enhancements.</li>
</ul></li>
</ul>

<ul>
<li>mysqlnd
<ul>
  <li><?php bugfix(60948); ?> (mysqlnd FTBFS when -Wformat-security is enabled).</li>
</ul></li>
</ul>

<ul>
<li>Standard
<ul>
  <li>Fixed memory leak in substr_replace.</li>
  <li>Make max_file_uploads ini directive settable outside of php.</li>
  <li><?php bugfix(61409); ?> (Bad formatting on phpinfo()).</li>
  <li><?php bugfix(60222); ?> (time_nanosleep() does validate input params).</li>
  <li><?php bugfix(60106); ?> (stream_socket_server silently truncates long unix socket
    paths).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.4.0"><!-- {{{ 5.4.0 -->
<h3>Version 5.4.0</h3>
<?php release_date('01-Mar-2012'); ?>

<ul>
<li>autoconf 2.59+ is now supported (and required) for generating the
  configure script with ./buildconf. Autoconf 2.60+ is desirable
  otherwise the configure help order may be incorrect.</li>
</ul>
<ul>
    <li>Removed legacy features
<ul>
  <li>break/continue $var syntax.</li>
  <li>Safe mode and all related ini options.</li>
  <li>register_globals and register_long_arrays ini options.</li>
  <li>import_request_variables().</li>
  <li>allow_call_time_pass_reference.</li>
  <li>define_syslog_variables ini option and its associated function.</li>
  <li>highlight.bg ini option.</li>
  <li>Session bug compatibility mode (session.bug_compat_42 and
    session.bug_compat_warn ini options).</li>
  <li>session_is_registered(), session_register() and session_unregister()
    functions.</li>
  <li>y2k_compliance ini option.</li>
  <li>magic_quotes_gpc, magic_quotes_runtime and magic_quotes_sybase
    ini options. get_magic_quotes_gpc, get_magic_quotes_runtime are kept
    but always return false, set_magic_quotes_runtime raises an
    E_CORE_ERROR.</li>
  <li>Removed support for putenv("TZ=..") for setting the timezone.</li>
  <li>Removed the timezone guessing algorithm in case the timezone isn't set with
    date.timezone or date_default_timezone_set(). Instead of a guessed
    timezone, "UTC" is now used instead.</li>
</ul></li>
</ul>

<ul>
<li>Moved extensions to PECL
<ul>
  <li>ext/sqlite.  (Note: the ext/sqlite3 and ext/pdo_sqlite extensions are
    not affected)</li>
</ul></li>
</ul>

<ul>
<li>General improvements
<ul>
  <li>Added short array syntax support ([1,2,3]), see UPGRADING guide for full
    details.</li>
  <li>Added binary numbers format (0b001010).</li>
  <li>Added support for Class::{expr}() syntax.</li>
  <li>Added multibyte support by default. Previously php had to be compiled
    with --enable-zend-multibyte. Now it can be enabled or disabled through
    zend.multibyte directive in php.ini.</li>
  <li>Removed compile time dependency from ext/mbstring.</li>
  <li>Added support for Traits.</li>
  <li>Added closure $this support back.</li>
  <li>Added array dereferencing support.</li>
  <li>Added callable typehint.</li>
  <li>Added indirect method call through array. <?php bugl(47160); ?>.</li>
  <li>Added DTrace support.</li>
  <li>Added class member access on instantiation (e.g. (new foo)-&gt;bar()) support.</li>
  <li>&lt;?= is now always available regardless of the short_open_tag setting.</li>
  <li>Implemented Zend Signal Handling (configurable option --enable-zend-signals,
    off by default).</li>
  <li>Improved output layer, see README.NEW-OUTPUT-API for internals.</li>
  <li>Improved unix build system to allow building multiple PHP binary SAPIs and
    one SAPI module the same time. <?php bugl(53271); ?>, <?php bugl(52419); ?>.</li>
  <li>Implemented closure rebinding as parameter to bindTo.</li>
  <li>Improved the warning message of incompatible arguments.</li>
  <li>Improved ternary operator performance when returning arrays.
  <li>Changed error handlers to only generate docref links when the docref_root
    INI setting is not empty.</li>
  <li>Changed silent conversion of array to string to produce a notice.</li>
  <li>Changed default value of "default_charset" php.ini option from ISO-8859-1 to
	UTF-8.</li>
  <li>Changed silent casting of null/''/false into an Object when adding
	a property into a warning.</li>
  <li>Changed E_ALL to include E_STRICT.</li>
  <li>Disabled windows CRT warning by default, can be enabled again using the ini
    directive windows_show_crt_warnings.</li>
  <li><?php bugfix(55378); ?>: Binary number literal returns float number though its
    value is small enough.</li>
</ul></li>
</ul>

<ul>
<li>Improved Zend Engine memory usage
<ul>
  <li>Improved parse error messages.</li>
  <li>Replaced zend_function.pass_rest_by_reference by
    ZEND_ACC_PASS_REST_BY_REFERENCE in zend_function.fn_flags.</li>
  <li>Replaced zend_function.return_reference by ZEND_ACC_RETURN_REFERENCE
    in zend_function.fn_flags.</li>
  <li>Removed zend_arg_info.required_num_args as it was only needed for internal
    functions. Now the first arg_info for internal functions (which has special
    meaning) is represented by zend_internal_function_info structure.</li>
  <li>Moved zend_op_array.size, size_var, size_literal, current_brk_cont,
    backpatch_count into CG(context) as they are used only during compilation.</li>
  <li>Moved zend_op_array.start_op into EG(start_op) as it's used only for
    'interactive' execution of single top-level op-array.</li>
  <li>Replaced zend_op_array.done_pass_two by ZEND_ACC_DONE_PASS_TWO in
    zend_op_array.fn_flags.</li>
  <li>op_array.vars array is trimmed (reallocated) during pass_two.
  <li>Replaced zend_class_entry.constants_updated by ZEND_ACC_CONSTANTS_UPDATED
    in zend_class_entry.ce_flags.</li>
  <li>Reduced the size of zend_class_entry by sharing the same memory space
    by different information for internal and user classes.
    See zend_class_entry.info union.</li>
  <li>Reduced size of temp_variable.</li>
</ul></li>
</ul>

<ul>
<li>Improved Zend Engine, performance tweaks and optimizations
<ul>
  <li>Inlined most probable code-paths for arithmetic operations directly into
    executor.</li>
  <li>Eliminated unnecessary iterations during request startup/shutdown.</li>
  <li>Changed $GLOBALS into a JIT autoglobal, so it's initialized only if used.
    (this may affect opcode caches!)</li>
  <li>Improved performance of @ (silence) operator.</li>
  <li>Simplified string offset reading. $str[1][0] is now a legal construct.</li>
  <li>Added caches to eliminate repeatable run-time bindings of functions,
    classes, constants, methods and properties.</li>
  <li>Added concept of interned strings. All strings constants known at compile
    time are allocated in a single copy and never changed.</li>
  <li>ZEND_RECV now always has IS_CV as its result.</li>
  <li>ZEND_CATCH now has to be used only with constant class names.</li>
  <li>ZEND_FETCH_DIM_? may fetch array and dimension operands in different order.</li>
  <li>Simplified ZEND_FETCH_*_R operations. They can't be used with the
    EXT_TYPE_UNUSED flag any more. This is a very rare and useless case.
    ZEND_FREE might be required after them instead.</li>
  <li>Split ZEND_RETURN into two new instructions ZEND_RETURN and
    ZEND_RETURN_BY_REF.</li>
  <li>Optimized access to global constants using values with pre-calculated
    hash_values from the literals table.</li>
  <li>Optimized access to static properties using executor specialization.
    A constant class name may be used as a direct operand of ZEND_FETCH_*
    instruction without previous ZEND_FETCH_CLASS.</li>
  <li>zend_stack and zend_ptr_stack allocation is delayed until actual usage.</li>
</ul></li>
</ul>

<ul>
<li>Other improvements to Zend Engine
<ul>
  <li>Added an optimization which saves memory and emalloc/efree calls for empty
    HashTables.</li>
  <li>Added ability to reset user opcode handlers.</li>
  <li>Changed the structure of op_array.opcodes. The constant values are moved from
    opcode operands into a separate literal table.</li>
  <li>Fixed (disabled) inline-caching for ZEND_OVERLOADED_FUNCTION methods.</li>
  <li><?php bugfix(43200); ?> (Interface implementation / inheritence not possible in
    abstract classes).</li>
</ul></li>
</ul>

<ul>
<li>Improved core functions
<ul>
  <li>Added optional argument to debug_backtrace() and debug_print_backtrace()
    to limit the amount of stack frames returned.</li>
  <li>Added hex2bin() function.</li>
  <li>number_format() no longer truncates multibyte decimal points and thousand
    separators to the first byte. <?php bugl(53457); ?>.</li>
  <li>Added support for object references in recursive serialize() calls.
    <?php bugl(36424); ?>.</li>
  <li>Added support for SORT_NATURAL and SORT_FLAG_CASE in array
    sort functions (sort, rsort, ksort, krsort, asort, arsort and
    array_multisort). <?php bugl(55158); ?>.</li>
  <li>Added stream metadata API support and stream_metadata() stream class
    handler.</li>
  <li>User wrappers can now define a stream_truncate() method that responds
    to truncation, e.g. through ftruncate(). <?php bugl(53888); ?>.</li>
  <li>Improved unserialize() performance.</li>
  <li>Changed array_combine() to return empty array instead of FALSE when both
    parameter arrays are empty. <?php bugl(34857); ?>.</li>
  <li>Fixed invalid free in call_user_method() function.</li>
  <li>Fixed crypt_blowfish handling of 8-bit characters. (CVE-2011-2483).</li>
  <li><?php bugfix(61095); ?> (Incorect lexing of 0x00*+&lt;NUM&gt;).</li>
  <li><?php bugfix(60965); ?> (Buffer overflow on htmlspecialchars/entities with
    $double=false).</li>
  <li><?php bugfix(60895); ?> (Possible invalid handler usage in windows random
    functions).</li>
  <li><?php bugfix(60879); ?> (unserialize() Does not invoke __wakeup() on object).</li>
  <li><?php bugfix(60825); ?> (Segfault when running symfony 2 tests).</li>
  <li><?php bugfix(60809); ?> (TRAITS - PHPDoc Comment Style Bug).</li>
  <li><?php bugfix(60627); ?> (httpd.worker segfault on startup with php_value).</li>
  <li><?php bugfix(60613); ?> (Segmentation fault with $cls-&gt;{expr}() syntax).</li>
  <li><?php bugfix(60611); ?> (Segmentation fault with Cls::{expr}() syntax).</li>
  <li><?php bugfix(60558); ?> (Invalid read and writes).</li>
  <li><?php bugfix(60536); ?> (Traits Segfault).</li>
  <li><?php bugfix(60444); ?> (Segmentation fault with include &amp; class extending).</li>
  <li><?php bugfix(60362); ?> (non-existent sub-sub keys should not have values).</li>
  <li><?php bugfix(60350); ?> (No string escape code for ESC (ascii 27), normally \e).</li>
  <li><?php bugfix(60321); ?> (ob_get_status(true) no longer returns an array when
    buffer is empty).</li>
  <li><?php bugfix(60282); ?> (Segfault when using ob_gzhandler() with open buffers).</li>
  <li><?php bugfix(60240); ?> (invalid read/writes when unserializing specially crafted
    strings).</li>
  <li><?php bugfix(60227); ?> (header() cannot detect the multi-line header with
     CR(0x0D)).</li>
  <li><?php bugfix(60174); ?> (Notice when array in method prototype error).</li>
  <li><?php bugfix(60169); ?> (Conjunction of ternary and list crashes PHP).</li>
  <li><?php bugfix(60120); ?> (proc_open's streams may hang with stdin/out/err when the data exceeds or is equal to 2048 bytes).
  <li><?php bugfix(60099); ?> (__halt_compiler() works in braced namespaces).</li>
  <li><?php bugfix(60038); ?> (SIGALRM cause segfault in php_error_cb).</li>
  <li><?php bugfix(55874); ?> (GCC does not provide __sync_fetch_and_add on some archs).</li>
  <li><?php bugfix(55871); ?> (Interruption in substr_replace()).</li>
  <li><?php bugfix(55825); ?> (Missing initial value of static locals in trait methods).</li>
  <li><?php bugfix(55801); ?> (Behavior of unserialize has changed).</li>
  <li><?php bugfix(55622); ?> (memory corruption in parse_ini_string).</li>
  <li><?php bugfix(55758); ?> (Digest Authenticate missed in 5.4) .</li>
  <li><?php bugfix(55748); ?> (multiple NULL Pointer Dereference with zend_strndup())
    (CVE-2011-4153).</li>
  <li><?php bugfix(55749); ?> (TOCTOU issue in getenv() on Windows builds).</li>
  <li><?php bugfix(55707); ?> (undefined reference to `__sync_fetch_and_add_4' on Linux
    parisc).</li>
  <li><?php bugfix(55705); ?> (Omitting a callable typehinted argument causes a segfault).</li>
  <li><?php bugfix(55475); ?> (is_a() triggers autoloader, new optional 3rd argument to
    is_a and is_subclass_of).</li>
  <li><?php bugfix(55471); ?> (ZTS build broken with dtrace).</li>
  <li><?php bugfix(55124); ?> (recursive mkdir fails with current (dot) directory in path).</li>
  <li><?php bugfix(55084); ?> (Function registered by header_register_callback is
    called only once per process).</li>
  <li>Implement <?php bugl(54514); ?> (Get php binary path during script execution).</li>
  <li><?php bugfix(52624); ?> (tempnam() by-pass open_basedir with nonexistent
    directory).</li>
  <li><?php bugfix(52211); ?> (iconv() returns part of string on error).</li>
  <li><?php bugfix(51860); ?> (Include fails with toplevel symlink to /).</li>
</ul></li>
</ul>

<ul>
<li>Improved generic SAPI support
<ul>
  <li>Added $_SERVER['REQUEST_TIME_FLOAT'] to include microsecond precision.</li>
  <li>Added max_input_vars directive to prevent attacks based on hash collisions.</li>
  <li>Added header_register_callback() which is invoked immediately
    prior to the sending of headers and after default headers have
    been added.</li>
  <li>Added http_response_code() function. <?php bugl(52555); ?>.</li>
  <li><?php bugfix(55500); ?> (Corrupted $_FILES indices lead to security concern).</li>
  <li><?php bugfix(54374); ?> (Insufficient validating of upload name leading to
    corrupted $_FILES indices).</li>
</ul></li>
</ul>

<ul>
<li>Improved Apache SAPI
<ul>
  <li><?php bugfix(60205); ?> (possible integer overflow in content_length).</li>
</ul></li>
</ul>

<ul>
<li>Improved CLI SAPI
<ul>
  <li>Added friendly log messages. <?php bugl(55109); ?>.</li>
  <li>Added built-in web server that is intended for testing purpose.</li>
  <li>Added command line option --rz &lt;name&gt; which shows information of the
    named Zend extension.</li>
  <li>Interactive readline shell improvements
  <ul>
    <li>Added "cli.pager" php.ini setting to set a pager for output.</li>
    <li>Added "cli.prompt" php.ini setting to configure the shell prompt.</li>
    <li>Added shortcut #inisetting=value to change ini settings at run-time.</li>
    <li>Changed shell not to terminate on fatal errors.</li>
    <li>Interactive shell works with shared readline extension. <?php bugl(53878); ?>.</li>
  </ul></li>
  <li><?php bugfix(60591); ?> (Memory leak when access a non-exists file).</li>
  <li><?php bugfix(60523); ?> (PHP Errors are not reported in browsers using built-in
    SAPI).</li>
  <li><?php bugfix(60477); ?> (Segfault after two multipart/form-data POST requests,
    one 200 RQ and one 404).</li>
  <li>Implement <?php bugl(60390); ?> (Missing $_SERVER['SERVER_PORT']).</li>
  <li><?php bugfix(60180); ?> ($_SERVER["PHP_SELF"] incorrect).</li>
  <li><?php bugfix(60159); ?> (Router returns false, but POST is not passed to requested
    resource).</li>
  <li><?php bugfix(60146); ?> (Last 2 lines of page not being output).</li>
  <li><?php bugfix(60115); ?> (memory definitely lost in cli server).</li>
  <li><?php bugfix(60112); ?> (If URI does not contain a file, index.php is not served).</li>
  <li><?php bugfix(55759); ?> (memory leak when using built-in server).</li>
  <li><?php bugfix(55755); ?> (SegFault when outputting header WWW-Authenticate).</li>
  <li><?php bugfix(55747); ?> (request headers missed in $_SERVER).</li>
  <li><?php bugfix(55726); ?> (Changing the working directory makes router script
    inaccessible).</li>
  <li><?php bugfix(55463); ?> (cli-server missing _SERVER[REMOTE_ADDR]).</li>
  <li><?php bugfix(55450); ?> (Built in web server not accepting file uploads).</li>
  <li><?php bugfix(55423); ?> (cli-server could not output correctly in some case).</li>
</ul></li>
</ul>

<ul>
<li>Improved CGI/FastCGI SAPI
<ul>
  <li>Added apache compatible functions: apache_child_terminate(),
    getallheaders(), apache_request_headers() and apache_response_headers().</li>
  <li>Improved performance of FastCGI request parsing.</li>
  <li>Fixed reinitialization of SAPI callbacks after php_module_startup().</li>
</ul></li>
</ul>

<ul>
<li>Improved PHP-FPM SAPI
<ul>
  <li>Added partial syslog support (on error_log only). <?php bugl(52052); ?>.</li>
  <li>Added .phar to default authorized extensions.</li>
  <li>Added process.max to control the number of process FPM can fork. <?php bugl(55166); ?>.</li>
  <li>Dropped restriction of not setting the same value multiple times, the last
    one holds.</li>
  <li>Lowered default value for Process Manager. <?php bugl(54098); ?>.</li>
  <li>Enhanced security by limiting access to user defined extensions.
    <?php bugl(55181); ?>.</li>
  <li>Enhanced error log when the primary script can't be open. <?php bugl(60199); ?>.</li>
  <li>Removed EXPERIMENTAL flag.</li>
  <li><?php bugfix(60659); ?> (FPM does not clear auth_user on request accept).</li>
  <li><?php bugfix(60629); ?> (memory corruption when web server closed the fcgi fd).</li>
</ul></li>
</ul>

<ul>
<li>Improved Litespeed SAPI
<ul>
  <li><?php bugfix(55769); ?> (Make Fails with "Missing Separator" error).</li>
</ul></li>
</ul>

<ul>
<li>Improved BCmath extension
<ul>
   <li><?php bugfix(60377); ?> (bcscale related crashes on 64bits platforms).</li>
</ul></li>
</ul>
<ul>
<li>Improved CURL extension
<ul>
  <li>Added support for CURLOPT_MAX_RECV_SPEED_LARGE and
    CURLOPT_MAX_SEND_SPEED_LARGE. <?php bugl(51815); ?>.</li>
  <li><?php bugfix(60439); ?> (curl_copy_handle segfault when used with
    CURLOPT_PROGRESSFUNCTION).</li>
</ul></li>
</ul>
<ul>
<li>Improved Date extension
<ul>
  <li>Added the + modifier to parseFromFormat to allow trailing text in the
    string to parse without throwing an error.</li>
</ul></li>
</ul>
<ul>
<li>Improved DBA extension
<ul>
  <li>Added Tokyo Cabinet abstract DB support.</li>
  <li>Added Berkeley DB 5 support.</li>
</ul></li>
</ul>
<ul>
<li>Improved DOM extension
<ul>
  <li>Added the ability to pass options to loadHTML.</li>
</ul></li>
</ul>
<ul>
<li>Improved filesystem functions
<ul>
  <li>scandir() now accepts SCANDIR_SORT_NONE as a possible sorting_order value.
    <?php bugl(53407); ?>.</li>
</ul></li>
</ul>
<ul>
<li>Improved fileinfo extension
<ul>
  <li>Fixed possible memory leak in finfo_open().</li>
  <li>Fixed memory leak when calling the Finfo constructor twice.</li>
  <li><?php bugfix(60094); ?> (C++ comment fails in c89).</li>
</ul></li>
</ul>
<ul>
<li>Improved HASH extension
<ul>
  <li>Added Jenkins's one-at-a-time hash support.</li>
  <li>Added FNV-1 hash support.</li>
  <li>Made Adler32 algorithm faster. <?php bugl(53213); ?>.</li>
  <li>Removed Salsa10/Salsa20, which are actually stream ciphers.</li>
  <li><?php bugfix(60221); ?> (Tiger hash output byte order).</li>
</ul></li>
</ul>
<ul>
<li>Improved intl extension
<ul>
  <li>Added Spoofchecker class, allows checking for visibly confusable characters and
    other security issues.</li>
  <li>Added Transliterator class, allowing transliteration of strings. </li>
  <li>Added support for UTS #46.</li>
  <li>Fixed memory leak in several Intl locale functions.</li>
  <li>Fixed build on Fedora 15 / Ubuntu 11.</li>
  <li><?php bugfix(55562); ?> (grapheme_substr() returns false on big length).</li>
</ul></li>
</ul>
<ul>
<li>Improved JSON extension
<ul>
  <li>Added new json_encode() option JSON_UNESCAPED_UNICODE. <?php bugl(53946); ?>.</li>
  <li>Added JsonSerializable interface.</li>
  <li>Added JSON_BIGINT_AS_STRING, extended json_decode() sig with $options.</li>
  <li>Added support for JSON_NUMERIC_CHECK option in json_encode() that converts
    numeric strings to integers.</li>
  <li>Added new json_encode() option JSON_UNESCAPED_SLASHES. <?php bugl(49366); ?>.</li>
  <li>Added new json_encode() option JSON_PRETTY_PRINT. <?php bugl(44331); ?>.</li>
</ul></li>
</ul>
<ul>
<li>Improved LDAP extension
<ul>
  <li>Added paged results support. <?php bugl(42060); ?>.</li>
</ul></li>
</ul>
<ul>
<li>Improved mbstring extension
<ul>
  <li>Added Shift_JIS/UTF-8 Emoji (pictograms) support.</li>
  <li>Added JIS X0213:2004 (Shift_JIS-2004, EUC-JP-2004, ISO-2022-JP-2004)
    support.</li>
  <li>Ill-formed UTF-8 check for security enhancements.</li>
  <li>Added MacJapanese (Shift_JIS) and gb18030 encoding support.</li>
  <li>Added encode/decode in hex format to mb_[en|de]code_numericentity().</li>
  <li>Added user JIS X0213:2004 (Shift_JIS-2004, EUC-JP-2004, ISO-2022-JP-2004)
    support.</li>
  <li>Added the user defined area for CP936 and CP950.</li>
  <li>Fixed possible crash in mb_ereg_search_init() using empty pattern.</li>
  <li><?php bugfix(60306); ?> (Characters lost while converting from cp936 to utf8).</li>
</ul></li>
</ul>
<ul>
<li>Improved MS SQL extension
<ul>
  <li><?php bugfix(60267); ?> (Compile failure with freetds 0.91).</li>
</ul></li>
</ul>
<ul>
<li>Improved MySQL extensions
<ul>
  <li>MySQL: Deprecated mysql_list_dbs(). <?php bugl(50667); ?>.</li>
  <li>mysqlnd: Added named pipes support. <?php bugl(48082); ?>.</li>
  <li>MySQLi: Added iterator support in MySQLi. mysqli_result implements
    Traversable.</li>
  <li>PDO_mysql: Removed support for linking with MySQL client libraries older
    than 4.1.</li>
  <li>ext/mysql, mysqli and pdo_mysql now use mysqlnd by default.</li>
  <li><?php bugfix(55473); ?> (mysql_pconnect leaks file descriptors on reconnect). </li>
  <li><?php bugfix(55653); ?> (PS crash with libmysql when binding same variable as
    param and out).</li>
</ul></li>
</ul>
<ul>
<li>Improved OpenSSL extension
<ul>
  <li>Added AES support. <?php bugl(48632); ?>.</li>
  <li>Added a "no_ticket" SSL context option to disable the SessionTicket TLS
    extension. <?php bugl(53447); ?>.</li>
  <li>Added no padding option to openssl_encrypt()/openssl_decrypt().</li>
  <li>Use php's implementation for Windows Crypto API in
    openssl_random_pseudo_bytes.</li>
  <li>On error in openssl_random_pseudo_bytes() made sure we set strong result
    to false.</li>
  <li>Fixed segfault with older versions of OpenSSL.</li>
  <li>Fixed possible attack in SSL sockets with SSL 3.0 / TLS 1.0.
    CVE-2011-3389.</li>
  <li><?php bugfix(61124); ?> (Crash when decoding an invalid base64 encoded string).</li>
  <li><?php bugfix(60279); ?> (Fixed NULL pointer dereference in
    stream_socket_enable_crypto, case when ssl_handle of session_stream is not
    initialized.</li>
</ul></li>
</ul>
<ul>
<li>Improved Oracle Database extension (OCI8)
<ul>
  <li>Increased maximum Oracle error message buffer length for new 11.2.0.3 size.</li>
  <li>Improved internal initalization failure error messages.</li>
  <li><?php bugfix(59985); ?> (show normal warning text for OCI_NO_DATA).</li>
</ul></li>
</ul>
<ul>
<li>Improved PDO
<ul>
  <li>Fixed PDO objects binary incompatibility.</li>
</ul></li>
</ul>
<ul>
<li>PDO DBlib driver
<ul>
  <li>Added nextRowset support.</li>
  <li><?php bugfix(60033); ?> (Incorrectly merged PDO dblib patches break
    uniqueidentifier column type).</li>
  <li><?php bugfix(50755); ?> (PDO DBLIB Fails with OOM).</li>
</ul></li>
</ul>
<ul>
<li>Improved Pdo Firebird driver
<ul>
  <li><?php bugfix(53280); ?> (segfaults if query column count less than param count). </li>
  <li><?php bugfix(48877); ?> ("bindValue" and "bindParam" do not work for PDO Firebird).</li>
  <li><?php bugfix(47415); ?> (segfaults when passing lowercased column name to
    bindColumn).</li>
</ul></li>
</ul>
<ul>
<li>Improved PostgreSQL extension
<ul>
  <li>Added support for "extra" parameter for PGNotify().</li>
</ul></li>
</ul>
<ul>
<li>Improved preg extension
<ul>
  <li>Changed third parameter of preg_match_all() to optional. <?php bugl(53238); ?>.</li>
</ul></li>
</ul>
<ul>
<li>Improved readline extension
<ul>
  <li><?php bugfix(54450); ?> (Enable callback support when built against libedit).</li>
</ul></li>
</ul>
<ul>
<li>Improved Reflection extension
<ul>
  <li>Added ReflectionClass::newInstanceWithoutConstructor() to create a new
    instance of a class without invoking its constructor. <?php bugl(55490); ?>.</li>
  <li>Added ReflectionExtension::isTemporary() and
    ReflectionExtension::isPersistent() methods.</li>
  <li>Added ReflectionZendExtension class.</li>
  <li>Added ReflectionClass::isCloneable().</li>
  <li><?php bugfix(60367); ?> (Reflection and Late Static Binding).</li>
  <li><?php bugfix(60357); ?> (__toString() method triggers E_NOTICE "Array to string
    conversion").</li>
</ul></li>
</ul>
<ul>
<li>Improved Session extension
<ul>
  <li>Expose session status via new function, session_status. <?php bugl(52982); ?>.</li>
  <li>Added support for object-oriented session handlers.</li>
  <li>Added support for storing upload progress feedback in session data.</li>
  <li>Changed session.entropy_file to default to /dev/urandom or /dev/arandom if
    either is present at compile time.</li>
  <li><?php bugfix(60860); ?> (session.save_handler=user without defined function core
    dumps).</li>
  <li>Implement <?php bugl(60551); ?> (session_set_save_handler should support a core's
    session handler interface).</li>
  <li><?php bugfix(60640); ?> (invalid return values).</li>
</ul></li>
</ul>
<ul>
<li>Improved SNMP extension
<ul>
  <li>Added OO API. <?php bugl(53594); ?> (php-snmp rewrite).</li>
  <li>Sanitized return values of existing functions. Now it returns FALSE on
    failure.</li>
  <li>Allow ~infinite OIDs in GET/GETNEXT/SET queries. Autochunk them to max_oids
    upon request.</li>
  <li>Introducing unit tests for extension with ~full coverage.
    IPv6 support. (<?php bugl(42918); ?>)</li>
  <li>Way of representing OID value can now be changed when SNMP_VALUE_OBJECT
    is used for value output mode. Use or'ed SNMP_VALUE_LIBRARY(default if
    not specified) or SNMP_VALUE_PLAIN. (<?php bugl(54502); ?>)</li>
  <li><?php bugfix(60749); ?> (SNMP module should not strip non-standard SNMP port
    from hostname).</li>
  <li><?php bugfix(60585); ?> (php build fails with USE flag snmp when IPv6 support
    is disabled).</li>
  <li><?php bugfix(53862); ?> (snmp_set_oid_output_format does not allow returning to default).</li>
  <li><?php bugfix(51336); ?> (snmprealwalk (snmp v1) does not handle end of OID tree correctly).</li>
  <li><?php bugfix(46065); ?> (snmp_set_quick_print() persists between requests).</li>
  <li><?php bugfix(45893); ?> (Snmp buffer limited to 2048 char).</li>
  <li><?php bugfix(44193); ?> (snmp v3 noAuthNoPriv doesn't work).</li>
</ul></li>
</ul>
<ul>
<li>Improved SOAP extension
<ul>
  <li>Added new SoapClient option "keep_alive". <?php bugl(60329); ?>.</li>
  <li>Fixed basic HTTP authentication for WSDL sub requests.</li>
</ul></li>
</ul>
<ul>
<li>Improved SPL extension
<ul>
  <li>Added RegexIterator::getRegex() method.</li>
  <li>Added SplObjectStorage::getHash() hook.</li>
  <li>Added CallbackFilterIterator and RecursiveCallbackFilterIterator.</li>
  <li>Added missing class_uses(..) as pointed out by <?php bugl(55266); ?>.</li>
  <li>Immediately reject wrong usages of directories under Spl(Temp)FileObject
    and friends.</li>
  <li>FilesystemIterator, GlobIterator and (Recursive)DirectoryIterator now use
    the default stream context.</li>
  <li><?php bugfix(60201); ?> (SplFileObject::setCsvControl does not expose third
    argument via Reflection).</li>
  <li><?php bugfix(55807); ?> (Wrong value for splFileObject::SKIP_EMPTY).</li>
  <li><?php bugfix(55287); ?> (spl_classes() not includes CallbackFilter classes)</li>
</ul></li>
</ul>
<ul>
<li>Improved Sysvshm extension
<ul>
  <li><?php bugfix(55750); ?> (memory copy issue in sysvshm extension).</li>
</ul></li>
</ul>
<ul>
<li>Improved Tidy extension
<ul>
  <li><?php bugfix(54682); ?> (Tidy::diagnose() NULL pointer dereference).</li>
</ul></li>
</ul>
<ul>
<li>Improved Tokenizer extension
<ul>
  <li><?php bugfix(54089); ?> (token_get_all with regards to __halt_compiler is
    not binary safe).</li>
</ul></li>
</ul>
<ul>
<li>Improved XSL extension
<ul>
  <li>Added XsltProcessor::setSecurityPrefs($options) and getSecurityPrefs() to
    define forbidden operations within XSLT stylesheets, default is not to
    enable write operations from XSLT. <?php bugfix(54446); ?>.</li>
  <li>XSL doesn't stop transformation anymore, if a PHP function can't be called</li>
</ul></li>
</ul>
<ul>
<li>Improved ZLIB extension
<ul>
  <li>Re-implemented non-file related functionality.</li>
  <li><?php bugfix(55544); ?> (ob_gzhandler always conflicts with zlib.output_compression).</li>
</ul></li>
</ul>

<!-- }}} --></section>

<a id="PHP_5_3"></a>
<section class="version" id="5.3.29"><!-- {{{ 5.3.29 -->
<h3>Version 5.3.29</h3>
<?php release_date('14-Aug-2014'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(66127); ?> (Segmentation fault with ArrayObject unset).</li>
  <li><?php bugfix(67247); ?> (spl_fixedarray_resize integer overflow).</li>
  <li><?php bugfix(67249); ?> (printf out-of-bounds read).</li>
  <li><?php bugfix(67250); ?> (iptcparse out-of-bounds read).</li>
  <li><?php bugfix(67252); ?> (convert_uudecode out-of-bounds read).</li>
  <li><?php bugfix(67359); ?> (Segfault in recursiveDirectoryIterator).</li>
  <li><?php bugfix(67390); ?> (insecure temporary file use in the configure script). (CVE-2014-3981)</li>
  <li><?php bugfix(67399); ?> (putenv with empty variable may lead to crash).</li>
  <li><?php bugfix(67492); ?> (unserialize() SPL ArrayObject / SPLObjectStorage Type Confusion) (CVE-2014-3515).</li>
  <li><?php bugfix(67498); ?> (phpinfo() Type Confusion Information Leak Vulnerability). (CVE-2014-4721)</li>
</ul></li>
<li>COM:
<ul>
  <li>Fixed missing type checks in com_event_sink.</li>
</ul></li>
<li>Date:
<ul>
  <li><?php bugfix(66060); ?> (Heap buffer over-read in DateInterval). (CVE-2013-6712)</li>
  <li><?php bugfix(67251); ?> (date_parse_from_format out-of-bounds read).</li>
  <li><?php bugfix(67253); ?> (timelib_meridian_with_check out-of-bounds read).</li>
</ul></li>
<li>Exif:
<ul>
  <li><?php bugfix(65873); ?> (Integer overflow in exif_read_data()).</li>
</ul></li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(66307); ?> (Fileinfo crashes with powerpoint files).</li>
  <li><?php bugfix(67326); ?> (fileinfo: cdf_read_short_sector insufficient boundary check). (CVE-2014-0207)</li>
  <li><?php bugfix(67327); ?> (fileinfo: CDF infinite loop in nelements DoS). (CVE-2014-0238)</li>
  <li><?php bugfix(67328); ?> (fileinfo: fileinfo: numerous file_printf calls resulting in performance degradation). (CVE-2014-0237)</li>
  <li><?php bugfix(67410); ?> (fileinfo: mconvert incorrect handling of truncated pascal string size) (CVE-2014-3478).</li>
  <li><?php bugfix(67411); ?> (fileinfo: cdf_check_stream_offset insufficient boundary check) (CVE-2014-3479).</li>
  <li><?php bugfix(67412); ?> (fileinfo: cdf_count_chain insufficient boundary check) (CVE-2014-3480).</li>
  <li><?php bugfix(67413); ?> (fileinfo: cdf_read_property_info insufficient boundary check) (CVE-2014-3487).</li>
</ul></li>
<li>Intl:
<ul>
  <li><?php bugfix(67349); ?> (Locale::parseLocale Double Free).</li>
  <li><?php bugfix(67397); ?> (Buffer overflow in locale_get_display_name and uloc_getDisplayName (libicu 4.8.1)).</li>
</ul></li>
<li>Network:
<ul>
  <li><?php bugfix(67432); ?> (Fix potential segfault in dns_get_record()). (CVE-2014-4049)</li>
</ul></li>
<li>OpenSSL:
<ul>
  <li>Fixed missing type checks in OpenSSL options.</li>
</ul></li>
<li>Session:
<ul>
  <li>Fixed missing type checks in php_session_create_id.</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.28"><!-- {{{ 5.3.28 -->
<h3>Version 5.3.28</h3>
<?php release_date('12-Dec-2013'); ?>
<ul><li>Openssl:
<ul>
  <li>Fixed handling null bytes in subjectAltName (CVE-2013-4248).</li>
  <li>Fixed memory corruption in openssl_x509_parse() (CVE-2013-6420). (Stefan Esser).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.27"><!-- {{{ 5.3.27 -->
<h3>Version 5.3.27</h3>
<?php release_date('11-Jul-2013'); ?>
<ul><li>Core:
<ul>
  <li><?php bugfix(64966); ?> (segfault in zend_do_fcall_common_helper_SPEC).</li>
  <li><?php bugfix(64960); ?> (Segfault in gc_zval_possible_root).</li>
  <li><?php bugfix(64934); ?> (Apache2 TS crash with get_browser()).</li>
  <li><?php bugfix(63186); ?> (compile failure on netbsd).</li>
</ul></li>
<li>DateTime:
<ul>
  <li><?php bugfix(53437); ?> (Crash when using unserialized DatePeriod instance).</li>
</ul></li>
<li>PDO_firebird:
<ul>
  <li><?php bugfix(64037); ?> (Firebird return wrong value for numeric field).</li>
  <li><?php bugfix(62024); ?> (Cannot insert second row with null using parametrized query).</li>
</ul></li>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(64949); ?> (Buffer overflow in _pdo_pgsql_error).</li>
</ul></li>
<li>pgsql:
<ul>
  <li><?php bugfix(64609); ?> (pg_convert enum type support).</li>
</ul></li>
<li>SPL:
<ul>
  <li><?php bugfix(64997); ?> (Segfault while using RecursiveIteratorIterator on 64-bits systems).</li>
</ul></li>
<li>XML:
<ul>
  <li><?php bugfix(65236); ?> (heap corruption in xml parser). (CVE-2013-4113)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.26"><!-- {{{ 5.3.26 -->
<h3>Version 5.3.26</h3>
<?php release_date('06-Jun-2013'); ?>
<ul>
<li>Core:
<ul>
 <li><?php bugfix(64879); ?> (Heap based buffer overflow in quoted_printable_encode, CVE-2013-2110).</li>
</ul>
</li>
<li>Calendar:
<ul>
 <li><?php bugfix(64895); ?> (Integer overflow in SndToJewish).</li>
</ul>
</li>
<li>FPM:
<ul>
 <li>Fixed some possible memory or resource leaks and possible null dereference detected by code coverity scan.</li>
 <li>Log a warning when a syscall fails.</li>
</ul>
</li>
<li>MySQLi:
<ul>
 <li><?php bugfix(64726); ?> (Segfault when calling fetch_object on a use_result and DB pointer has closed).</li>
</ul>
</li>
<li>Phar:
<ul>
 <li><?php bugfix(64214); ?> (PHAR PHPTs intermittently crash when run on DFS, SMB or with non std tmp dir).</li>
</ul>
</li>
<li>Streams:
<ul>
 <li><?php bugfix(64770); ?> (stream_select() fails with pipes returned by proc_open() on Windows x64).</li>
</ul>
</li>
<li>Zend Engine:
<ul>
 <li><?php bugfix(64821); ?> (Custom Exception crash when internal properties overridden).</li>
</ul>
</li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.25"><!-- {{{ 5.3.25 -->
<h3>Version 5.3.25</h3>
<?php release_date('09-May-2013'); ?>
<ul>
<li>Core:
<ul>
  <li> <?php bugfix(64578); ?> (debug_backtrace in set_error_handler corrupts zend heap: segfault). </li>
  <li> <?php bugfix(64458); ?> (dns_get_record result with string of length -1). </li>
  <li> <?php bugfix(47675); ?> (fd leak on Solaris).</li>
  <li> <?php bugfix(64577); ?> (fd leak on Solaris).</li>
</ul></li>
<li>Streams:
<ul>
  <li> Fixed Windows x64 version of stream_socket_pair() and improved error handling.</li>
</ul></li>
<li>Zip:
<ul>
  <li> <?php bugfix(64342); ?> (ZipArchive::addFile() has to check for file existence).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.24"><!-- {{{ 5.3.24 -->
<h3>Version 5.3.24</h3>
<?php release_date('11-Apr-2013'); ?>
<ul>
<li>Core:
<ul>
 <li><?php bugfix(64370); ?> (microtime(true) less than $_SERVER['REQUEST_TIME_FLOAT']).</li>
 <li><?php bugfix(63914); ?> (zend_do_fcall_common_helper_SPEC does not handle exceptions properly).</li>
 <li><?php bugfix(62343); ?> (Show class_alias In get_declared_classes()).</li>
</ul></li>

<li>PCRE:
<ul>
 <li>Merged PCRE 8.32.</li>
</ul></li>

<li>mysqlnd:
<ul>
 <li><?php bugfix(63530); ?> (mysqlnd_stmt::bind_one_parameter crashes, uses wrong alloc for stmt->param_bind).</li>
</ul></li>

<li>DateTime:
<ul>
 <li><?php bugfix(62852); ?> (Unserialize Invalid Date causes crash).</li>
</ul></li>

<li>Zip:
<ul>
 <li><?php bugfix(64452); ?> (Zip crash intermittently).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.23"><!-- {{{ 5.3.23 -->
<h3>Version 5.3.23</h3>
<?php release_date('14-March-2013'); ?>
<ul>
<li>Phar:
<ul>
 <li>Fixed timestamp update on Phar contents modification.</li>
</ul></li>
<li>SOAP
<ul>
 <li>Added check that soap.wsdl_cache_dir conforms to open_basedir
    (CVE-2013-1635). </li>
 <li>Disabled external entities loading (CVE-2013-1643, CVE-2013-1824).</li>
</ul></li>
<li>SPL:
<ul>
 <li><?php bugfix(64264); ?> (SPLFixedArray toArray problem). </li>
 <li><?php bugfix(64228); ?> (RecursiveDirectoryIterator always assumes SKIP_DOTS).</li>
 <li><?php bugfix(64106); ?> (Segfault on SplFixedArray[][x] = y when extended). </li>
 <li><?php bugfix(52861); ?> (unset fails with ArrayObject and deep arrays).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.22"><!-- {{{ 5.3.22 -->
<h3>Version 5.3.22</h3>
<?php release_date('21-February-2013'); ?>
<ul>
<li>Zend Engine:
<ul>
  <li><?php bugfix(64099); ?> (Wrong TSRM usage in zend_Register_class alias).</li>
  <li><?php bugfix(63899); ?> (Use after scope error in zend_compile).</li>
</ul></li>
</ul>

<ul>
<li>Core:
<ul>
  <li><?php bugfix(63943); ?> (Bad warning text from strpos() on empty needle).</li>
</ul></li>
</ul>

<ul>
<li>Date:
<ul>
  <li><?php bugfix(55397); ?> (comparsion of incomplete DateTime causes SIGSEGV).</li>
</ul></li>
</ul>

<ul>
<li>FPM:
<ul>
  <li><?php bugfix(63999); ?> (php with fpm fails to build on Solaris 10 or 11).</li>
</ul></li>
</ul>

<ul>
<li>SPL:
<ul>
  <li><?php bugfix(64106); ?> (Segfault on SplFixedArray[][x] = y when extended). </li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.21"><!-- {{{ 5.3.21 -->
<h3>Version 5.3.21</h3>
<?php release_date('17-January-2013'); ?>
<ul>
<li>Zend Engine:
<ul>
  <li><?php bugfix(63762); ?> (Sigsegv when Exception::$trace is changed by user).</li>
</ul></li>
</ul>

<ul>
<li>cURL extension:
<ul>
  <li>Fixed bug (segfault due to libcurl connection caching).</li>
  <li><?php bugfix(63795); ?> (CURL &gt;= 7.28.0 no longer support value 1 for CURLOPT_SSL_VERIFYHOST).</li>
  <li><?php bugfix(63352); ?> (Can't enable hostname validation when using curl stream wrappers).</li>
  <li><?php bugfix(55438); ?> (Curlwapper is not sending http header randomly).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.20"><!-- {{{ 5.3.20 -->
<h3>Version 5.3.20</h3>
<?php release_date('20-December-2012'); ?>
<ul>
<li>Zend Engine:
<ul>
  <li><?php bugfix(63635); ?> (Segfault in gc_collect_cycles).</li>
  <li><?php bugfix(63512); ?> (parse_ini_file() with INI_SCANNER_RAW removes quotes from value).</li>
  <li><?php bugfix(63468); ?> (wrong called method as callback with inheritance).</li>
</ul></li>
</ul>

<ul>
<li>Core:
<ul>
  <li><?php bugfix(63451); ?> (config.guess file does not have AIX 7 defined, shared objects are not created).</li>
  <li><?php bugfix(63377); ?> (Segfault on output buffer).</li>
</ul></li>
</ul>

<ul>
<li>Apache2 Handler SAPI:
<ul>
  <li>Enabled Apache 2.4 configure option for Windows.</li>
</ul></li>
</ul>

<ul>
<li>Date:
<ul>
  <li><?php bugfix(63435); ?> (Datetime::format('u') sometimes wrong by 1 microsecond).</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo:
<ul>
  <li><?php bugfix(63248); ?> (Load multiple magic files from a directory under Windows).</li>
  <li><?php bugfix(63590); ?> (Different results in TS and NTS under Windows).</li>
</ul></li>
</ul>

<ul>
<li>FPM:
<ul>
  <li><?php bugfix(63581); ?> (Possible null dereference and buffer overflow).</li>
</ul></li>
</ul>

<ul>
<li>Imap:
<ul>
  <li><?php bugfix(63126); ?> (DISABLE_AUTHENTICATOR ignores array).</li>
</ul></li>
</ul>

<ul>
<li>MySQLnd:
<ul>
  <li><?php bugfix(63398); ?> (Segfault when polling closed link).</li>
</ul></li>
</ul>

<ul>
<li>Reflection:
<ul>
  <li><?php bugfix(63614); ?> (Fatal error on Reflection).</li>
</ul></li>
</ul>

<ul>
<li>SOAP:
<ul>
  <li><?php bugfix(63271); ?> (SOAP wsdl cache is not enabled after initial requests).</li>
</ul></li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.3.19"><!-- {{{ 5.3.19 -->
<h3>Version 5.3.19</h3>
<?php release_date('22-November-2012'); ?>
<ul>
<li>Core:
<ul>
  <li><?php bugfix(63241); ?> (PHP fails to open Windows deduplicated files).</li>
  <li><?php bugfix(62444); ?> (Handle leak in is_readable on windows).</li>
</ul></li>
</ul>

<ul>
<li>Libxml:
<ul>
  <li><?php bugfix(63389); ?> (Missing context check on libxml_set_streams_context() causes memleak).</li>
</ul></li>
</ul>

<ul>
<li>Mbstring:
<ul>
  <li><?php bugfix(63447); ?> (max_input_vars doesn't filter variables when
    mbstring.encoding_translation = On).</li>
</ul></li>
</ul>

<ul>
<li>MySQL:
<ul>
  <li>Fixed compilation failure on mixed 32/64 bit systems.</li>
</ul></li>
</ul>

<ul>
<li>OCI8:
<ul>
  <li><?php bugfix(63265); ?> (Add ORA-00028 to the PHP_OCI_HANDLE_ERROR macro)</li>
</ul></li>
</ul>

<ul>
<li>PCRE:
<ul>
  <li><?php bugfix(63055); ?> (Segfault in zend_gc with SF2 testsuite).</li>
  <li><?php bugfix(63284); ?> (Upgrade PCRE to 8.31).</li>
</ul></li>
</ul>

<ul>
<li>PDO:
<ul>
  <li><?php bugfix(63235); ?> (buffer overflow in use of SQLGetDiagRec).</li>
</ul></li>
</ul>

<ul>
<li>PDO_pgsql:
<ul>
  <li><?php bugfix(62593); ?> (Emulate prepares behave strangely with PARAM_BOOL).</li>
</ul></li>
</ul>

<ul>
<li>Phar:
<ul>
  <li><?php bugfix(63297); ?> (Phar fails to write an openssl based signature).</li>
</ul></li>
</ul>

<ul>
<li>Streams:
<ul>
  <li><?php bugfix(63240); ?> (stream_get_line() return contains delimiter string).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.18"><!-- {{{ 5.3.18 -->
<h3>Version 5.3.18</h3>
<?php release_date('18-October-2012'); ?>
<ul>
<li>Core
<ul>
  <li><?php bugfix(63111); ?> (is_callable() lies for abstract static method).</li>
  <li><?php bugfix(63093); ?> (Segfault while load extension failed in zts-build).</li>
  <li><?php bugfix(62976); ?> (Notice: could not be converted to int when comparing some builtin classes).</li>
  <li><?php bugfix(61767); ?> (Shutdown functions not called in certain error situation).</li>
  <li><?php bugfix(61442); ?> (exception threw in __autoload can not be catched).</li>
  <li><?php bugfix(60909); ?> (custom error handler throwing Exception + fatal error = no shutdown function).</li>
</ul></li>
</ul>

<ul>
<li>cURL
<ul>
  <li><?php bugfix(62085); ?> (file_get_contents a remote file by Curl wrapper will cause cpu Soaring).</li>
</ul></li>
</ul>

<ul>
<li>FPM
<ul>
  <li><?php bugfix(62954); ?> (startup problems fpm / php-fpm).</li>
  <li><?php bugfix(62886); ?> (PHP-FPM may segfault/hang on startup).</li>
  <li><?php bugfix(63085); ?> (Systemd integration and daemonize).</li>
  <li><?php bugfix(62947); ?> (Unneccesary warnings on FPM).</li>
  <li><?php bugfix(62887); ?> (Only /status?plain&amp;full gives "last request cpu").</li>
  <li><?php bugfix(62216); ?> (Add PID to php-fpm init.d script).</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
  <li><?php bugfix(62915); ?> (defective cloning in several intl classes).</li>
</ul></li>
</ul>

<ul>
<li>SOAP
<ul>
  <li><?php bugfix(50997); ?> (SOAP Error when trying to submit 2nd Element of a choice).</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
  <li><?php bugfix(62987) ?> (Assigning to ArrayObject[null][something] overrides all undefined variables).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.17"><!-- {{{ 5.3.17 -->
<h3>Version 5.3.17</h3>
<?php release_date('13-September-2012'); ?>
<ul>
<li>Core
<ul>
    <li>Fixed bug (segfault while build with zts and GOTO vm-kind)</li>
    <li><?php bugfix(62955); ?> (Only one directive is loaded from "Per Directory Values" Windows registry)</li>
    <li><?php bugfix(62763); ?> (register_shutdown_function and extending class)</li>
    <li><?php bugfix(62744); ?> (dangling pointers made by zend_disable_class)</li>
    <li><?php bugfix(62716); ?> (munmap() is called with the incorrect length)</li>
    <li><?php bugfix(62460); ?> (php binaries installed as binary.dSYM)</li>
</ul></li>
</ul>

<ul>
<li>CURL
<ul>
    <li><?php bugfix(62839); ?> (curl_copy_handle segfault with CURLOPT_FILE)</li>
</ul></li>
</ul>

<ul>
<li>DateTime
<ul>
    <li><?php bugfix(62852); ?> (Unserialize invalid DateTime causes crash)</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
    <li>Fix null pointer dereferences in some classes of ext/intl</li>
</ul></li>
</ul>

<ul>
<li>MySQLnd
<ul>
    <li><?php bugfix(62885); ?> (mysqli_poll - Segmentation fault)</li>
</ul></li>
</ul>

<ul>
<li>PDO
<ul>
    <li><?php bugfix(62685); ?> (Wrong return datatype in PDO::inTransaction())</li>
</ul></li>
</ul>

<ul>
<li>Session
<ul>
    <li>Fixed bug (segfault due to retval is not initialized)</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
    <li><?php bugfix(62904); ?> (Crash when cloning an object which inherits SplFixedArray)</li>
</ul></li>
</ul>

<ul>
<li>Enchant
<ul>
    <li><?php bugfix(62838); ?> (enchant_dict_quick_check() destroys zval, but fails to initialize it)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.16"><!-- {{{ 5.3.16 -->
<h3>Version 5.3.16</h3>
<?php release_date('16-August-2012'); ?>
<ul>
<li>Core
<ul>
  <li><?php bugfix(62763); ?> (register_shutdown_function and extending class).</li>
  <li><?php bugfix(62744); ?> (dangling pointers made by zend_disable_class).</li>
  <li><?php bugfix(62716); ?> (munmap() is called with the incorrect length).</li>
  <li><?php bugfix(62460); ?> (php binaries installed as binary.dSYM).</li>
  <li><?php bugfix(60194); ?> (--with-zend-multibyte and --enable-debug reports LEAK with run-test.php).</li>
</ul></li>
</ul>

<ul>
<li>CURL
<ul>
  <li><?php bugfix(62839); ?> (curl_copy_handle segfault with CURLOPT_FILE).</li>
  <li><?php bugfix(62499); ?> (curl_setopt($ch, CURLOPT_COOKIEFILE, "") returns false).</li>
</ul></li>
</ul>

<ul>
<li>DateTime
<ul>
  <li><?php bugfix(62500); ?> (Segfault in DateInterval class when extended).</li>
</ul></li>
</ul>

<ul>
<li>Enchant
<ul>
  <li><?php bugfix(62838); ?> (enchant_dict_quick_check() destroys zval, but fails to initialize it).</li>
</ul></li>
</ul>

<ul>
<li>PDO
<ul>
  <li><?php bugfix(62685); ?> (Wrong return datatype in PDO::inTransaction()).</li>
</ul></li>
</ul>

<ul>
<li>Reflection
<ul>
  <li><?php bugfix(62715); ?> (ReflectionParameter::isDefaultValueAvailable() wrong result).</li>
</ul></li>
</ul>

<ul>
<li>Session
<ul>
  <li>Fixed bug (segfault due to retval is not initialized).</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
  <li><?php bugfix(62616); ?> (ArrayIterator::count() from IteratorIterator instance gives Segmentation fault).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.15"><!-- {{{ 5.3.15 -->
<h3>Version 5.3.15</h3>
<?php release_date('19-July-2012'); ?>
<ul>
<li>Zend Engine
<ul>
  <li><?php bugfix(51094); ?> (parse_ini_file() with INI_SCANNER_RAW cuts a value that includes a semi-colon)</li>
</ul></li>
</ul>

<ul>
<li>COM
<ul>
  <li><?php bugfix(62146); ?> com_dotnet cannot be built shared</li>
</ul></li>
</ul>

<ul>
<li>Core
<ul>
  <li>Fixed potential overflow in _php_stream_scandir, CVE-2012-2688</li>
  <li><?php bugfix(62432); ?> (ReflectionMethod random corrupt memory on high concurrent)</li>
  <li><?php bugfix(62443); ?> (Crypt SHA256/512 Segfaults With Malformed Salt)</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo
<ul>
  <li>Fixed magic file regex support</li>
</ul></li>
</ul>

<ul>
<li>FPM
<ul>
  <li><?php bugfix(61045); ?> (fpm don't send error log to fastcgi clients)</li>
  <li><?php bugfix(61835); ?> (php-fpm is not allowed to run as root)</li>
  <li><?php bugfix(61295); ?> (php-fpm should not fail with commented 'user' for non-root start)</li>
  <li><?php bugfix(61026); ?> (FPM pools can listen on the same address)</li>
  <li><?php bugfix(62033); ?> (php-fpm exits with status 0 on some failures to start)</li>
  <li><?php bugfix(62153); ?> (when using unix sockets, multiples FPM instances can be launched without errors)</li>
  <li><?php bugfix(62160); ?> (Add process.priority to set nice(2) priorities)</li>
  <li><?php bugfix(61218); ?> (FPM drops connection while receiving some binary values in FastCGI requests)</li>
  <li><?php bugfix(62205); ?> (php-fpm segfaults (null passed to strstr))</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
  <li><?php bugfix(62083); ?> (grapheme_extract() memory leaks)</li>
  <li><?php bugfix(62081); ?> (IntlDateFormatter constructor leaks memory when called twice)</li>
  <li><?php bugfix(62070); ?> (Collator::getSortKey() returns garbage)</li>
  <li><?php bugfix(62017); ?> (datefmt_create with incorrectly encoded timezone leaks pattern)</li>
  <li><?php bugfix(60785); ?> (memory leak in IntlDateFormatter constructor)</li>
</ul></li>
</ul>

<ul>
<li>JSON
<ul>
  <li>Reverted fix for bug <?php bugl(61537); ?></li>
</ul></li>
</ul>

<ul>
<li>Phar
<ul>
  <li><?php bugfix(62227); ?> (Invalid phar stream path causes crash)</li>
</ul></li>
</ul>

<ul>
<li>Reflection
<ul>
  <li><?php bugfix(62384); ?> (Attempting to invoke a Closure more than once causes segfault)</li>
  <li><?php bugfix(62202); ?> (ReflectionParameter::getDefaultValue() memory leaks with constant)</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
  <li><?php bugfix(62262); ?> (RecursiveArrayIterator does not implement Countable)</li>
</ul></li>
</ul>

<ul>
<li>SQLite
<ul>
  <li>Fixed open_basedir bypass, CVE-2012-3365</li>
</ul></li>
</ul>

<ul>
<li>XML Write
<ul>
  <li><?php bugfix(62064); ?> (memory leak in the XML Writer module)</li>
</ul></li>
</ul>

<ul>
<li>Zip
<ul>
  <li>Upgraded libzip to 0.10</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.14"><!-- {{{ 5.3.14 -->
<h3>Version 5.3.14</h3>
<?php release_date('06-June-2012'); ?>
<ul>
<li>CLI SAPI
<ul>
  <li><?php bugfix(61546); ?> (functions related to current script failed when chdir() in cli sapi)</li>
</ul></li>
</ul>

<ul>
<li>Core
<ul>
  <li>Fixed CVE-2012-2143</li>
  <li><?php bugfix(62005); ?> (unexpected behavior when incrementally assigning to a member of a null object)</li>
  <li><?php bugfix(61730); ?> (Segfault from array_walk modifying an array passed by reference)</li>
  <li>Fixed missing bound check in iptcparse()</li>
  <li><?php bugfix(61764); ?> ('I' unpacks n as signed if n &gt; 2^31-1 on LP64)</li>
  <li><?php bugfix(54197); ?> ([PATH=] sections incompatibility with user_ini.filename set to null)</li>
  <li><?php bugfix(61713); ?> (Logic error in charset detection for htmlentities)</li>
  <li><?php bugfix(61991); ?> (long overflow in realpath_cache_get())</li>
  <li>Changed php://fd to be available only for CLI.</li>
</ul></li>
</ul>

<ul>
<li>CURL
<ul>
  <li><?php bugfix(61948); ?> (CURLOPT_COOKIEFILE '' raises open_basedir restriction)</li>
</ul></li>
</ul>

<ul>
<li>COM
<ul>
  <li><?php bugfix(62146); ?> com_dotnet cannot be built shared</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo
<ul>
  <li><?php bugfix(61812); ?> (Uninitialised value used in libmagic)</li>
</ul></li>
</ul>

<ul>
<li>Iconv
<ul>
  <li>Fixed a bug that iconv extension fails to link to the correct library when another extension makes use of a library that links to the iconv library. See <a href="https://bugs.gentoo.org/show_bug.cgi?id=364139">https://bugs.gentoo.org/show_bug.cgi?id=364139</a> for detail</li>
</ul></li>
</ul>

<ul>
<li>Intl
<ul>
  <li><?php bugfix(62082); ?> (Memory corruption in internal function get_icu_disp_value_src_php()</li>
</ul></li>
</ul>

<ul>
<li>JSON
<ul>
  <li><?php bugfix(61537); ?> (json_encode() incorrectly truncates/discards information)</li>
</ul></li>
</ul>

<ul>
<li>PDO
<ul>
  <li><?php bugfix(61755); ?> (A parsing bug in the prepared statements can lead to access violations). (CVE-2012-3450)</li>
</ul></li>
</ul>

<ul>
<li>Phar
<ul>
<li><?php bugfix(61065); ?> (Secunia SA44335) (CVE-2012-2386)</li>
</ul></li>
</ul>

<ul>
<li>Streams
<ul>
  <li><?php bugfix(61961); ?> (file_get_contents leaks when access empty file with maxlen set)</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.13"><!-- {{{ 5.3.13 -->
<h3>Version 5.3.13</h3>
<?php release_date('08-May-2012'); ?>

<ul>
  <li><?php bugfix(61910); ?> Improve fix for PHP-CGI query string parameter vulnerability, CVE-2012-2311.</li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.12"><!-- {{{ 5.3.12 -->
<h3>Version 5.3.12</h3>
<?php release_date('03-May-2012'); ?>

<ul>
  <li><?php bugfix(61910); ?> Fix PHP-CGI query string parameter vulnerability, CVE-2012-1823.</li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.11"><!-- {{{ 5.3.11 -->
<h3>Version 5.3.11</h3>
<?php release_date('26-Apr-2012'); ?>

<ul>
<li>Core
<ul>
  <li><?php bugfix(61650); ?> (ini parser crashes when using ${xxxx} ini variables
    (without apache2)).</li>
  <li><?php bugfix(61273); ?> (call_user_func_array with more than 16333 arguments
    leaks / crashes).</li>
  <li><?php bugfix(61165); ?> (Segfault - strip_tags()).</li>
  <li><?php bugfix(61095); ?> (Incorect lexing of 0x00*+&lt;NUM&gt;).</li>
  <li><?php bugfix(61087); ?> (Memory leak in parse_ini_file when specifying
    invalid scanner mode).</li>
  <li><?php bugfix(61072); ?> (Memory leak when restoring an exception handler).</li>
  <li><?php bugfix(61058); ?> (array_fill leaks if start index is PHP_INT_MAX).</li>
  <li><?php bugfix(61000); ?> (Exceeding max nesting level doesn't delete numerical
    vars).</li>
  <li><?php bugfix(60895); ?> (Possible invalid handler usage in windows random
    functions).</li>
  <li><?php bugfix(60825); ?> (Segfault when running symfony 2 tests).</li>
  <li><?php bugfix(60801); ?> (strpbrk() mishandles NUL byte).</li>
  <li><?php bugfix(60569); ?> (Nullbyte truncates Exception $message).</li>
  <li><?php bugfix(60227); ?> (header() cannot detect the multi-line header with CR).</li>
  <li><?php bugfix(60222); ?> (time_nanosleep() does validate input params).</li>
  <li><?php bugfix(54374); ?> (Insufficient validating of upload name leading to
    corrupted $_FILES indices). (CVE-2012-1172).</li>
  <li><?php bugfix(52719); ?> (array_walk_recursive crashes if third param of the
    function is by reference).</li>
  <li>Improve performance of set_exception_handler while doing reset.</li>
  <li><?php bugfix(51860); ?> (Include fails with toplevel symlink to /).</li>
</ul></li>
</ul>

<ul>
<li>DOM
<ul>
  <li>Added debug info handler to DOM objects.</li>
</ul></li>
</ul>

<ul>
<li>FPM
<ul>
  <li><?php bugfix(61430); ?> (Transposed memset() params in sapi/fpm/fpm/fpm_shm.)</li>
  <li><?php bugfix(60811); ?> (php-fpm compilation problem).</li>
</ul></li>
</ul>

<ul>
<li>Fileinfo
<ul>
  <li>Upgraded libmagic to 5.</li>
  <li><?php bugfix(61565); ?> where php_stream_open_wrapper_ex tries to open a
    directory descriptor under windows.</li>
  <li><?php bugfix(61566); ?> failure caused by the posix lseek and read versions
    under windows in cdf_read().</li>
  <li><?php bugfix(61173); ?> (Unable to detect error from finfo constructor).</li>
</ul></li>
</ul>

<ul>
<li>Firebird Database extension (ibase)
<ul>
  <li><?php bugfix(60802); ?> (ibase_trans() gives segfault when passing params).</li>
</ul></li>
</ul>

<ul>
<li>Ibase
<ul>
  <li><?php bugfix(60947); ?> (Segmentation fault while executing ibase_db_info).</li>
</ul></li>
</ul>

<ul>
<li>Installation
<ul>
  <li><?php bugfix(61172); ?> (Add Apache 2.4 support).</li>
</ul></li>
</ul>

<ul>
<li>mysqli
<ul>
  <li><?php bugfix(61003); ?> (mysql_stat() require a valid connection).</li>
</ul></li>
</ul>

<ul>
<li>PDO_mysql
<ul>
  <li><?php bugfix(61207); ?> (PDO::nextRowset() after a multi-statement query doesn't
    always work).</li>
  <li><?php bugfix(61194); ?> (PDO should export compression flag with myslqnd).</li>
</ul></li>
</ul>

<ul>
<li>PDO_odbc
<ul>
  <li><?php bugfix(61212); ?> (PDO ODBC Segfaults on SQL_SUCESS_WITH_INFO).</li>
</ul></li>
</ul>

<ul>
<li>PDO_pgsql
<ul>
  <li><?php bugfix(61267); ?> (pdo_pgsql's PDO::exec() returns the number of SELECTed
    rows on postgresql &gt;= 9).</li>
</ul></li>
</ul>

<ul>
<li>PDO_Sqlite extension
<ul>
  <li>Add createCollation support.</li>
</ul></li>
</ul>

<ul>
<li>pgsql
<ul>
  <li><?php bugfix(60718); ?> (Compile problem with libpq (PostgreSQL 7.3 or less).</li>
</ul></li>
</ul>

<ul>
<li>Phar
<ul>
  <li><?php bugfix(61184); ?> (Phar::webPhar() generates headers with trailing NUL
    bytes).</li>
</ul></li>
</ul>

<ul>
<li>Readline
<ul>
  <li><?php bugfix(61088); ?> (Memory leak in readline_callback_handler_install).</li>
  <li>Add open_basedir checks to readline_write_history and readline_read_history.</li>
</ul></li>
</ul>

<ul>
<li>Reflection
<ul>
  <li><?php bugfix(61388); ?> (ReflectionObject:getProperties() issues invalid reads
    when get_properties returns a hash table with (inaccessible) dynamic
    numeric properties).</li>
  <li><?php bugfix(60968); ?> (Late static binding doesn't work with
    ReflectionMethod::invokeArgs()).</li>
</ul></li>
</ul>

<ul>
<li>Session
<ul>
  <li><?php bugfix(60860); ?> (session.save_handler=user without defined function core
    dumps).</li>
  <li><?php bugfix(60634); ?> (Segmentation fault when trying to die() in
    SessionHandler::write()).</li>
</ul></li>
</ul>

<ul>
<li>SOAP
<ul>
  <li><?php bugfix(61423); ?> (gzip compression fails).</li>
  <li><?php bugfix(60887); ?> (SoapClient ignores user_agent option and sends no
    User-Agent header).</li>
    <li><?php bugfix(60842); ?>, <?php bugfix(51775); ?> (Chunked response parsing error when
    chunksize length line is &gt; 10 bytes).</li>
  <li><?php bugfix(49853); ?> (Soap Client stream context header option ignored).</li>
</ul></li>
</ul>

<ul>
<li>SPL
<ul>
  <li>Fixed memory leak when calling SplFileInfo's constructor twice.</li>
  <li><?php bugfix(61418); ?> (Segmentation fault when DirectoryIterator's or
    FilesystemIterator's iterators are requested more than once without
    having had its dtor callback called in between).</li>
  <li><?php bugfix(61347); ?> (inconsistent isset behavior of Arrayobject).</li>
  <li><?php bugfix(61326); ?> (ArrayObject comparison).</li>
</ul></li>
</ul>

<ul>
<li>SQLite3 extension
<ul>
  <li>Add createCollation() method.</li>
</ul></li>
</ul>

<ul>
<li>Streams
<ul>
  <li><?php bugfix(61371); ?> (stream_context_create() causes memory leaks on use
    streams_socket_create).</li>
  <li><?php bugfix(61253); ?> (Wrappers opened with errors concurrency problem on ZTS).</li>
  <li><?php bugfix(61115); ?> (stream related segfault on fatal error in
    php_stream_context_link).</li>
  <li><?php bugfix(60817); ?> (stream_get_line() reads from stream even when there is
    already sufficient data buffered). stream_get_line() now behaves more like
    fgets(), as is documented.</li>
  <li>Further fix for bug <?php bugfix(60455); ?> (stream_get_line misbehaves if EOF is not
    detected together with the last read).</li>
  <li><?php bugfix(60106); ?> (stream_socket_server silently truncates long unix
    socket paths).</li>
</ul></li>
</ul>

<ul>
<li>Tidy
<ul>
  <li><?php bugfix(54682); ?> (tidy null pointer dereference).</li>
</ul></li>
</ul>

<ul>
<li>XMLRPC
<ul>
  <li><?php bugfix(61264); ?> (xmlrpc_parse_method_descriptions leaks temporary
    variable).</li>
  <li><?php bugfix(61097); ?> (Memory leak in xmlrpc functions copying zvals).</li>
</ul></li>
</ul>

<ul>
<li>Zlib
<ul>
  <li><?php bugfix(61306); ?> (initialization of global inappropriate for ZTS).</li>
  <li><?php bugfix(61287); ?> (A particular string fails to decompress).</li>
  <li><?php bugfix(61139); ?> (gzopen leaks when specifying invalid mode).</li>
</ul></li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.10"><!-- {{{ 5.3.10 -->
<h3>Version 5.3.10</h3>
<?php release_date('02-Feb-2012'); ?>

<ul>
<li>Core:
<ul>
  <li>Fixed arbitrary remote code execution vulnerability reported by Stefan
    Esser, CVE-2012-0830.</li>
</ul>
</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.3.9"><!-- {{{ 5.3.9 -->
<h3>Version 5.3.9</h3>
<?php release_date('10-Jan-2012'); ?>

<ul>
<li>Core:
<ul>
  <li>Added max_input_vars directive to prevent attacks based on hash collisions
    (Dmitry).</li>
  <li><?php bugfix(60205); ?> (possible integer overflow in content_length). (Laruence)</li>
  <li><?php bugfix(60139); ?> (Anonymous functions create cycles not detected by the
    GC). (Dmitry)</li>
  <li><?php bugfix(60138); ?> (GC crash with referenced array in RecursiveArrayIterator)
    (Dmitry).</li>
  <li><?php bugfix(60120); ?> (proc_open's streams may hang with stdin/out/err when
    the data exceeds or is equal to 2048 bytes). (Pierre, Pascal Borreli)</li>
  <li><?php bugfix(60099); ?> (__halt_compiler() works in braced namespaces). (Felipe)</li>
  <li><?php bugfix(60019); ?> (Function time_nanosleep() is undefined on OS X). (Ilia)</li>
  <li><?php bugfix(55874); ?> (GCC does not provide __sync_fetch_and_add on some archs).
    (klightspeed at netspace dot net dot au)</li>
  <li><?php bugfix(55798); ?> (serialize followed by unserialize with numeric object
    prop. gives integer prop). (Gustavo)</li>
  <li><?php bugfix(55749); ?> (TOCTOU issue in getenv() on Windows builds). (Pierre)</li>
  <li><?php bugfix(55707); ?> (undefined reference to `__sync_fetch_and_add_4' on Linux
    parisc). (Felipe)</li>
  <li><?php bugfix(55674); ?> (fgetcsv &amp; str_getcsv skip empty fields in some
    tab-separated records). (Laruence)</li>
  <li><?php bugfix(55649); ?> (Undefined function Bug()). (Laruence)</li>
  <li><?php bugfix(55622); ?> (memory corruption in parse_ini_string). (Pierre)</li>
  <li><?php bugfix(55576); ?> (Cannot conditionally move uploaded file without race
    condition). (Gustavo)</li>
  <li><?php bugfix(55510); ?>: $_FILES 'name' missing first character after upload.
    (Arpad)</li>
  <li><?php bugfix(55509); ?> (segfault on x86_64 using more than 2G memory). (Laruence)</li>
  <li><?php bugfix(55504); ?> (Content-Type header is not parsed correctly on
    HTTP POST request). (Hannes)</li>
  <li><?php bugfix(55475); ?> (is_a() triggers autoloader, new optional 3rd argument to
    is_a and is_subclass_of). (alan_k)</li>
  <li><?php bugfix(52461); ?> (Incomplete doctype and missing xmlns).
    (virsacer at web dot de, Pierre)</li>
  <li><?php bugfix(55366); ?> (keys lost when using substr_replace an array). (Arpad)</li>
  <li><?php bugfix(55273); ?> (base64_decode() with strict rejects whitespace after
    pad). (Ilia)</li>
  <li><?php bugfix(52624); ?> (tempnam() by-pass open_basedir with nonnexistent
    directory). (Felipe)</li>
  <li><?php bugfix(50982); ?> (incorrect assumption of PAGE_SIZE size). (Dmitry)</li>
  <li>Fixed invalid free in call_user_method() function. (Felipe)</li>
  <li><?php bugfix(43200); ?> (Interface implementation / inheritence not possible in
    abstract classes). (Felipe)</li>
</ul>
</li>
<li>BCmath:
<ul>
  <li><?php bugfix(60377); ?> (bcscale related crashes on 64bits platforms). (shm)</li>
</ul>
</li>
<li>Calendar:
<ul>
  <li><?php bugfix(55797); ?> (Integer overflow in SdnToGregorian leads to segfault (in
    optimized builds). (Gustavo)</li>
</ul>
</li>
<li>cURL:
<ul>
  <li><?php bugfix(60439); ?> (curl_copy_handle segfault when used with
    CURLOPT_PROGRESSFUNCTION). (Pierrick)</li>
  <li><?php bugfix(54798); ?> (Segfault when CURLOPT_STDERR file pointer is closed
    before calling curl_exec). (Hannes)</li>
  <li>Fixed issues were curl_copy_handle() would sometimes lose copied
    preferences. (Hannes)</li>
</ul>
</li>
<li>DateTime:
<ul>
  <li><?php bugfix(60373); ?> (Startup errors with log_errors on cause segfault).
    (Derick)</li>
  <li><?php bugfix(60236); ?> (TLA timezone dates are not converted properly from
    timestamp). (Derick)</li>
  <li><?php bugfix(55253); ?> (DateTime::add() and sub() result -1 hour on objects with
    time zone type 2). (Derick)</li>
  <li><?php bugfix(54851); ?> (DateTime::createFromFormat() doesn't interpret "D").
    (Derick)</li>
  <li><?php bugfix(53502); ?> (strtotime with timezone memory leak). (Derick)</li>
  <li><?php bugfix(52062); ?> (large timestamps with DateTime::getTimestamp and
    DateTime::setTimestamp). (Derick)</li>
  <li><?php bugfix(51994); ?> (date_parse_from_format is parsing invalid date using 'yz'
    format). (Derick)</li>
  <li><?php bugfix(52113); ?> (Seg fault while creating (by unserialization)
    DatePeriod). (Derick)</li>
  <li><?php bugfix(48476); ?> (cloning extended DateTime class without calling
    parent::__constr crashed PHP). (Hannes)</li>
</ul>
</li>
<li>EXIF:
<ul>
  <li><?php bugfix(60150); ?> (Integer overflow during the parsing of invalid exif
    header). (Stas, flolechaud at gmail dot com)</li>
</ul>
</li>
<li>Fileinfo:
<ul>
  <li><?php bugfix(60094); ?> (C++ comment fails in c89). (Laruence)</li>
  <li>Fixed possible memory leak in finfo_open(). (Felipe)</li>
  <li>Fixed memory leak when calling the Finfo constructor twice. (Felipe)</li>
</ul>
</li>
<li>Filter:
<ul>
  <li><?php bugfix(55478); ?> (FILTER_VALIDATE_EMAIL fails with internationalized
    domain name addresses containing &gt;1 -). (Ilia)</li>
</ul>
</li>
<li>FTP:
<ul>
  <li><?php bugfix(60183); ?> (out of sync ftp responses). (bram at ebskamp dot me,
    rasmus)</li>
</ul>
</li>
<li>Gd:
<ul>
  <li><?php bugfix(60160); ?> (imagefill() doesn't work correctly
    for small images). (Florian)</li>
</ul>
</li>
<li>Intl:
<ul>
  <li><?php bugfix(60192); ?> (SegFault when Collator not constructed
    properly). (Florian)</li>
  <li>Fixed memory leak in several Intl locale functions. (Felipe)</li>
</ul>
</li>
<li>JSON:
<ul>
  <li><?php bugfix(55543); ?> (json_encode() with JSON_NUMERIC_CHECK fails on objects
    with numeric string properties). (Ilia, dchurch at sciencelogic dot com)</li>
</ul>
</li>
<li>mbstring:
<ul>
  <li>Fixed possible crash in mb_ereg_search_init() using empty pattern. (Felipe)</li>
</ul>
</li>
<li>MS SQL:
<ul>
  <li><?php bugfix(60267); ?> (Compile failure with freetds 0.91). (Felipe)</li>
</ul>
</li>
<li>MySQL:
<ul>
  <li><?php bugfix(55550); ?> (mysql.trace_mode miscounts result sets). (Johannes)</li>
</ul>
</li>
<li>MySQLi extension:
<ul>
  <li><?php bugfix(55859); ?> (mysqli-&gt;stat property access gives error). (Andrey)</li>
  <li><?php bugfix(55582); ?> (mysqli_num_rows() returns always 0 for unbuffered, when
    mysqlnd is used). (Andrey)</li>
  <li><?php bugfix(55703); ?> (PHP crash when calling mysqli_fetch_fields).
    (eran at zend dot com, Laruence)</li>
</ul>
</li>
<li>mysqlnd:
<ul>
  <li><?php bugfix(55609); ?> (mysqlnd cannot be built shared). (Johannes)</li>
  <li><?php bugfix(55067); ?> (MySQL doesn't support compression - wrong config option).
    (Andrey)</li>
</ul>
</li>
<li>NSAPI SAPI:
<ul>
  <li>Don't set $_SERVER['HTTPS'] on unsecure connection (bug <?php bugl(55403); ?>). (Uwe
    Schindler)</li>
</ul>
</li>
<li>OpenSSL:
<ul>
  <li><?php bugfix(60279); ?> (Fixed NULL pointer dereference in
    stream_socket_enable_crypto, case when ssl_handle of session_stream is not
    initialized.) (shm)</li>
  <li>Fix segfault with older versions of OpenSSL. (Scott)</li>
</ul>
</li>
<li>Oracle Database extension (OCI8):
<ul>
  <li><?php bugfix(59985); ?> (show normal warning text for OCI_NO_DATA).
    (Chris Jones)</li>
  <li>Increased maximum Oracle error message buffer length for new 11.2.0.3 size.
    (Chris Jones)</li>
  <li>Improve internal initalization failure error messages. (Chris Jones)</li>
</ul>
</li>
<li>PDO
<ul>
  <li><?php bugfix(55776); ?> (PDORow to session bug). (Johannes)</li>
</ul>
</li>
<li>PDO Firebird:
<ul>
  <li><?php bugfix(48877); ?> ("bindValue" and "bindParam" do not work for PDO Firebird).
    (Mariuz)</li>
  <li><?php bugfix(47415); ?> (PDO_Firebird segfaults when passing lowercased column name to bindColumn).</li>
  <li><?php bugfix(53280); ?> (PDO_Firebird segfaults if query column count less than param count).
    (Mariuz)</li>
</ul>
</li>
<li>PDO MySQL driver:
<ul>
  <li><?php bugfix(60155); ?> (pdo_mysql.default_socket ignored). (Johannes)</li>
  <li><?php bugfix(55870); ?> (PDO ignores all SSL parameters when used with mysql
    native driver). (Pierre)</li>
  <li><?php bugfix(54158); ?> (MYSQLND+PDO MySQL requires #define
    MYSQL_OPT_LOCAL_INFILE). (Andrey)</li>
</ul>
</li>
<li>PDO OCI driver:
<ul>
  <li><?php bugfix(55768); ?> (PDO_OCI can't resume Oracle session after it's been
    killed). (mikhail dot v dot gavrilov at gmail dot com, Chris Jones, Tony)</li>
</ul>
</li>
<li>Phar:
<ul>
  <li><?php bugfix(60261); ?> (NULL pointer dereference in phar). (Felipe)</li>
  <li><?php bugfix(60164); ?> (Stubs of a specific length break phar_open_from_fp
    scanning for __HALT_COMPILER). (Ralph Schindler)</li>
  <li><?php bugfix(53872); ?> (internal corruption of phar). (Hannes)</li>
  <li><?php bugfix(52013); ?> (Unable to decompress files in a compressed phar). (Hannes)</li>
</ul>
</li>
<li>PHP-FPM SAPI:
<ul>
  <li><?php bugfix(60659); ?> (FPM does not clear auth_user on request accept).
    (bonbons at linux-vserver dot org)</li>
  <li><?php bugfix(60629); ?> (memory corruption when web server closed the fcgi fd).
    (fat)</li>
  <li><?php bugfix(60179); ?> (php_flag and php_value does not work properly). (fat)</li>
  <li><?php bugfix(55526); ?> (Heartbeat causes a lot of unnecessary events). (fat)</li>
  <li><?php bugfix(55533); ?> (The -d parameter doesn't work). (fat)</li>
  <li><?php implemented(52569); ?> (Add the "ondemand" process-manager
    to allow zero children). (fat)</li>
  <li><?php bugfix(55486); ?> (status show BIG processes number). (fat)</li>
  <li><?php bugfix(55577); ?> (status.html does not install). (fat)</li>
  <li>Backported from 5.4 branch (Dropped restriction of not setting the same
    value multiple times, the last one holds).
    (giovanni at giacobbi dot net, fat)</li>
  <li>Backported FR <?php bugl(55166); ?> from 5.4 branch (Added process.max to control
    the number of process FPM can fork). (fat)</li>
  <li>Backported FR <?php bugl(55181); ?> from 5.4 branch (Enhance security by limiting access
    to user defined extensions). (fat)</li>
  <li>Backported FR <?php bugl(54098); ?> from 5.4 branch (Lowered process manager
    default value). (fat)</li>
  <li>Backported FR <?php bugl(52052); ?> from 5.4 branch (Added partial syslog support). (fat)</li>
  <li><?php implemented(54577); ?> (Enhanced status page with full status and details
    about each processes. Also provide a web page (status.html) for
    real-time FPM status. (fat)</li>
  <li>Enhance error log when the primary script can't be open. FR <?php bugl(60199); ?>. (fat)</li>
  <li>Added .phar to default authorized extensions. (fat)</li>
</ul>
</li>
<li>Postgres:
<ul>
  <li><?php bugfix(60244); ?> (pg_fetch_* functions do not validate that row param
    is &gt;0). (Ilia)</li>
</ul>
</li>
<li>Reflection:
<ul>
  <li><?php bugfix(60367); ?> (Reflection and Late Static Binding). (Laruence)</li>
</ul>
</li>
<li>Session:
<ul>
  <li><?php bugfix(55267); ?> (session_regenerate_id fails after header sent). (Hannes)</li>
</ul>
</li>
<li>SimpleXML:
<ul>
  <li>Reverted the SimpleXML-&gt;query() behaviour to returning empty arrays
    instead of false when no nodes are found as it was since 5.3.3
    (bug <?php bugl(48601); ?>). (chregu, rrichards)</li>
</ul>
</li>
<li>SOAP
<ul>
  <li><?php bugfix(54911); ?> (Access to a undefined member in inherit SoapClient may
    cause Segmentation Fault). (Dmitry)</li>
  <li><?php bugfix(48216); ?> (PHP Fatal error: SOAP-ERROR: Parsing WSDL:
    Extra content at the end of the doc, when server uses chunked transfer
    encoding with spaces after chunk size). (Dmitry)</li>
  <li><?php bugfix(44686); ?> (SOAP-ERROR: Parsing WSDL with references). (Dmitry)</li>
</ul>
</li>
<li>Sockets:
<ul>
  <li><?php bugfix(60048); ?> (sa_len a #define on IRIX). (china at thewrittenword dot
    com)</li>
</ul>
</li>
<li>SPL:
<ul>
  <li><?php bugfix(60082); ?> (Crash in ArrayObject() when using recursive references).
    (Tony)</li>
  <li><?php bugfix(55807); ?> (Wrong value for splFileObject::SKIP_EMPTY).
    (jgotti at modedemploi dot fr, Hannes)</li>
  <li><?php bugfix(54304); ?> (RegexIterator::accept() doesn't work with scalar values).
    (Hannes)</li>
</ul>
</li>
<li>Streams:
<ul>
  <li><?php bugfix(60455); ?> (stream_get_line misbehaves if EOF is not detected together
    with the last read). (Gustavo)</li>
</ul>
</li>
<li>Tidy:
<ul>
  <li><?php bugfix(54682); ?> (Tidy::diagnose() NULL pointer dereference).
    (Maksymilian Arciemowicz, Felipe)</li>
</ul>
</li>
<li>XSL:
<ul>
  <li>Added xsl.security_prefs ini option to define forbidden operations within
    XSLT stylesheets, default is not to enable write operations. This option
    won't be in 5.4, since there's a new method. Fixes Bug <?php bugl(54446); ?>. (Chregu,
    Nicolas Gregoire)</li>
</ul>
</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.3.8"><!-- {{{ 5.3.8 -->
<h3>Version 5.3.8</h3>
<?php release_date('23-Aug-2011'); ?>

<ul>
<li>Core:
<ul>
  <li><?php bugfix(55439); ?> (crypt() returns only the salt for MD5). (Stas)</li>
</ul>
</li>
<li>OpenSSL:
<ul>
  <li>Reverted a change in timeout handling restoring PHP 5.3.6 behavior,
    as the new behavior caused mysqlnd SSL connections to hang (
    bug <?php bugl(55283); ?>).
    (Pierre, Andrey, Johannes)</li>
</ul>
</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.3.7"><!-- {{{ 5.3.7 -->
<h3>Version 5.3.7</h3>
<?php release_date('18-Aug-2011'); ?>

<ul>
<li>Upgraded bundled SQLite to version 3.7.7.1. (Scott)</li>
<li>Upgraded bundled PCRE to version 8.12. (Scott)</li>

<li>Zend Engine:
<ul>
  <li><?php bugfix(55156); ?> (ReflectionClass::getDocComment() returns comment even though the class has none). (Felipe)</li>
  <li><?php bugfix(55007); ?> (compiler fail after previous fail). (Felipe)</li>
  <li><?php bugfix(54910); ?> (Crash when calling call_user_func with unknown function name). (Dmitry)</li>
  <li><?php bugfix(54804); ?> (__halt_compiler and imported namespaces). (Pierrick, Felipe)</li>
  <li><?php bugfix(54624); ?> (class_alias and type hint). (Felipe)</li>
  <li><?php bugfix(54585); ?> (track_errors causes segfault). (Dmitry)</li>
  <li><?php bugfix(54423); ?> (classes from dl()'ed extensions are not destroyed).  (Tony, Dmitry)</li>
  <li><?php bugfix(54372); ?> (Crash accessing global object itself returned from its __get() handle). (Dmitry)</li>
  <li><?php bugfix(54367); ?> (Use of closure causes problem in ArrayAccess). (Dmitry)</li>
  <li><?php bugfix(54358); ?> (Closure, use and reference). (Dmitry)</li>
  <li><?php bugfix(54262); ?> (Crash when assigning value to a dimension in a non-array). (Dmitry)</li>
  <li><?php bugfix(54039); ?> (use() of static variables in lambda functions can break staticness). (Dmitry)</li>
</ul>
</li>

<li>Core:
<ul>
  <li>Updated crypt_blowfish to 1.2. (CVE-2011-2483) (Solar Designer) <a href="http://php.net/security/crypt_blowfish">(more info)</a></li>
  <li>Removed warning when argument of is_a() or is_subclass_of() is not  a known class. (Stas)</li>
  <li>Fixed crash in error_log(). (Felipe) Reported by Mateusz Kocielski.</li>
  <li>Added PHP_MANDIR constant telling where the manpages were installed into, and an --man-dir argument to php-config. (Hannes)</li>
  <li>Fixed a crash inside dtor for error handling. (Ilia)</li>
  <li>Fixed buffer overflow on overlog salt in crypt(). (Clément LECIGNE, Stas</li>
  <li><?php implemented(54459); ?> (Range function accuracy). (Adam)</li>

  <li><?php bugfix(55399); ?> (parse_url() incorrectly treats ':' as a valid path). (Ilia)</li>
  <li><?php bugfix(55339); ?> (Segfault with allow_call_time_pass_reference = Off). (Dmitry)</li>
  <li><?php bugfix(55295); ?> [NEW]: popen_ex on windows, fixed possible heap overflow (Pierre)</li>
  <li><?php bugfix(55258); ?> (Windows Version Detecting Error).  ( xiaomao5 at live dot com, Pierre)</li>
  <li><?php bugfix(55187); ?> (readlink returns weird characters when false result). (Pierre)</li>
  <li><?php bugfix(55082); ?> (var_export() doesn't escape properties properly). (Gustavo)</li>
  <li><?php bugfix(55014); ?> (Compile failure due to improper use of ctime_r()). (Ilia)</li>
  <li><?php bugfix(54939); ?> (File path injection vulnerability in RFC1867 File upload filename). (Felipe) Reported by Krzysztof Kotowicz. (CVE-2011-2202)</li>
  <li><?php bugfix(54935); ?> php_win_err can lead to crash. (Pierre)</li>
  <li><?php bugfix(54924); ?> (assert.* is not being reset upon request shutdown). (Ilia)</li>
  <li><?php bugfix(54895); ?> (Fix compiling with older gcc version without need for membar_producer macro). (mhei at heimpold dot de)</li>
  <li><?php bugfix(54866); ?> (incorrect accounting for realpath_cache_size). (Dustin Ward)</li>
  <li><?php bugfix(54723); ?> (getimagesize() doesn't check the full ico signature). (Scott)</li>
  <li><?php bugfix(54721); ?> (Different Hashes on Windows, BSD and Linux on wrong Salt size). (Pierre, os at irj dot ru)</li>
  <li><?php bugfix(54580); ?> (get_browser() segmentation fault when browscap ini directive is set through php_admin_value). (Gustavo)</li>
  <li><?php bugfix(54332); ?> (Crash in zend_mm_check_ptr // Heap corruption). (Dmitry)</li>
  <li><?php bugfix(54305); ?> (Crash in gc_remove_zval_from_buffer). (Dmitry)</li>
  <li><?php bugfix(54238); ?> (use-after-free in substr_replace()). (Stas) (CVE-2011-1148)</li>
  <li><?php bugfix(54204); ?> (Can't set a value with a PATH section in php.ini). (Pierre)</li>
  <li><?php bugfix(54180); ?> (parse_url() incorrectly parses path when ? in fragment). (tomas dot brastavicius at quantum dot lt, Pierrick)</li>
  <li><?php bugfix(54137); ?> (file_get_contents POST request sends additional line break). (maurice-php at mertinkat dot net, Ilia)</li>
  <li><?php bugfix(53848); ?> (fgetcsv() ignores spaces at beginnings of fields). (Ilia)</li>
  <li>Alternative fix for bug <?php bugfix(52550); ?>, as applied to the round() function (signed overflow), as the old fix impacted the algorithm for numbers with magnitude smaller than 0. (Gustavo)</li>
  <li><?php bugfix(53727); ?> (Inconsistent behavior of is_subclass_of with interfaces) (Ralph Schindler, Dmitry)</li>
  <li><?php bugfix(52935); ?> (call exit in user_error_handler cause stream relate core). (Gustavo)</li>
  <li><?php bugfix(51997); ?> (SEEK_CUR with 0 value, returns a warning). (Ilia)</li>
  <li><?php bugfix(50816); ?> (Using class constants in array definition fails). (Pierrick, Dmitry)</li>
  <li><?php bugfix(50363); ?> (Invalid parsing in convert.quoted-printable-decode filter). (slusarz at curecanti dot org)</li>
  <li><?php bugfix(48465); ?> (sys_get_temp_dir() possibly inconsistent when using  TMPDIR on Windows). (Pierre)</li>
</ul>
</li>

<li>Apache2 Handler SAPI:
<ul>
  <li><?php bugfix(54529); ?> (SAPI crashes on apache_config.c:197). (hebergement at riastudio dot fr)</li>
</ul>
</li>

<li>CLI SAPI:
<ul>
  <li><?php bugfix(52496); ?> (Zero exit code on option parsing failure). (Ilia)</li>
</ul>
</li>

<li>cURL extension:
<ul>
  <li>Added ini option curl.cainfo (support for custom cert db). (Pierre)</li>
  <li>Added CURLINFO_REDIRECT_URL support. (Daniel Stenberg, Pierre)</li>
  <li>Added support for CURLOPT_MAX_RECV_SPEED_LARGE and  CURLOPT_MAX_SEND_SPEED_LARGE. FR <?php bugfix(51815); ?>. (Pierrick)</li>
</ul>
</li>

<li>DateTime extension:
<ul>
  <li>Fixed bug where the DateTime object got changed while using date_diff(). (Derick)</li>
  <li><?php bugfix(54340); ?> (DateTime::add() method bug). (Adam)</li>
  <li><?php bugfix(54316); ?> (DateTime::createFromFormat does not handle trailing '|' correctly). (Adam)</li>
  <li><?php bugfix(54283); ?> (new DatePeriod(NULL) causes crash). (Felipe)</li>
  <li><?php bugfix(51819); ?> (Case discrepancy in timezone names cause Uncaught exception and fatal error). (Hannes)</li>
</ul>
</li>

<li>DBA extension:
<ul>
  <li>Supress warning on non-existent file open with Berkeley DB 5.2 (Chris Jones)</li>
  <li><?php bugfix(54242); ?> (dba_insert returns true if key already exists). (Felipe)</li>
</ul>
</li>

<li>Exif extesion:
<ul>
  <li><?php bugfix(54121); ?> (error message format string typo). (Ilia)</li>
</ul>
</li>

<li>Fileinfo extension:
<ul>
  <li><?php bugfix(54934); ?> (Unresolved symbol strtoull in HP-UX 11.11). (Felipe)</li>
</ul>
</li>

<li>Filter extension:
<ul>
  <li>Added 3rd parameter to filter_var_array() and filter_input_array() functions that allows disabling addition of empty elements. (Ilia)</li>
  <li><?php bugfix(53037); ?> (FILTER_FLAG_EMPTY_STRING_NULL is not implemented). (Ilia)</li>
</ul>
</li>

<li>Interbase extension:
<ul>
  <li><?php bugfix(54269); ?> (Short exception message buffer causes crash). (Felipe)</li>
</ul>
</li>

<li>intl extension:
<ul>
  <li><?php implemented(54561); ?> (Expose ICU version info). (David Zuelke, Ilia)</li>
  <li><?php implemented(54540); ?> (Allow loading of arbitrary resource bundles when fallback is disabled). (David Zuelke, Stas)</li>
</ul>
</li>

<li>Imap extension:
<ul>
  <li><?php bugfix(55313); ?> (Number of retries not set when params specified). (kevin at kevinlocke dot name)</li>
</ul>
</li>

<li>json extension:
<ul>
  <li><?php bugfix(54484); ?> (Empty string in json_decode doesn't reset  json_last_error()). (Ilia)</li>
</ul>
</li>

<li>LDAP extension:
<ul>
  <li><?php bugfix(53339); ?> (Fails to build when compilng with gcc 4.5 and DSO libraries). (Clint Byrum, Raphael)</li>
</ul>
</li>

<li>libxml extension:
<ul>
  <li><?php bugfix(54601); ?> (Removing the doctype node segfaults). (Hannes)</li>
  <li><?php bugfix(54440); ?> (libxml extension ignores default context). (Gustavo)</li>
</ul>
</li>

<li>mbstring extension:
<ul>
  <li><?php bugfix(54494); ?> (mb_substr() mishandles UTF-32LE and UCS-2LE). (Gustavo)</li>
</ul>
</li>

<li>MCrypt extension:
<ul>
  <li>Change E_ERROR to E_WARNING in mcrypt_create_iv when not enough data has been fetched (Windows). (Pierre)</li>
  <li><?php bugfix(55169); ?> (mcrypt_create_iv always fails to gather sufficient random  data on Windows). (Pierre)</li>
</ul>
</li>

<li>MySQL Improved extension:
<ul>
  <li>Fixed Bug <?php bugfix(54221); ?> (mysqli::get_warnings segfault when used in multi queries). (Andrey)</li>
</ul>
</li>

<li>mysqlnd
<ul>
  <li>Fixed crash when using more than 28,000 bound parameters. Workaround is to set mysqlnd.net_cmd_buffer_size to at least 9000. (Andrey)</li>
  <li><?php bugfix(54674); ?> mysqlnd valid_sjis_(head|tail) is using invalid operator and range). (nihen at megabbs dot com, Andrey)</li>
</ul>
</li>

<li>MySQLi extension:
<ul>
  <li><?php bugfix(55283); ?> (SSL options set by mysqli_ssl_set ignored for MySQLi persistent connections). (Andrey)</li>
</ul>
</li>

<li>OpenSSL extension:
<ul>
  <li>openssl_encrypt()/openssl_decrypt() truncated keys of variable length ciphers to the OpenSSL default for the algorithm. (Scott)</li>
  <li>On blocking SSL sockets respect the timeout option where possible. (Scott)</li>
  <li><?php bugfix(54992); ?> (Stream not closed and error not returned when SSL CN_match fails). (Gustavo, laird_ngrps at dodo dot com dot au)</li>
</ul>
</li>

<li>Oracle Database extension (OCI8):
<ul>
  <li>Added oci_client_version() returning the runtime Oracle client library version (Chris Jones)</li>
</ul>
</li>

<li>PCRE extension:
<ul>
  <li>Increased the backtrack limit from 100000 to 1000000 (Rasmus)</li>
</ul>
</li>

<li>PDO extension:
<ul>
  <li><?php bugfix(54929); ?> (Parse error with single quote in sql comment). (Felipe)</li>
  <li><?php bugfix(52104); ?> (bindColumn creates Warning regardless of ATTR_ERRMODE  settings). (Ilia)</li>
</ul>
</li>

<li>PDO DBlib driver:
<ul>
  <li><?php bugfix(54329); ?> (MSSql extension memory leak). (dotslashpok at gmail dot com)</li>
  <li><?php bugfix(54167); ?> (PDO_DBLIB returns null on SQLUNIQUE field). (mjh at hodginsmedia dot com, Felipe)</li>
</ul>
</li>

<li>PDO ODBC driver:
<ul>
  <li>Fixed data type usage in 64bit. (leocsilva at gmail dot com)</li>
</ul>
</li>

<li>PDO MySQL driver:
<ul>
  <li><?php bugfix(54644); ?> (wrong pathes in php_pdo_mysql_int.h). (Tony, Johannes)</li>
  <li><?php bugfix(53782); ?> (foreach throws irrelevant exception). (Johannes, Andrey)</li>
  <li><?php implemented(48587); ?> (MySQL PDO driver doesn't support SSL connections). (Rob)</li>
</ul>
</li>

<li>PDO PostgreSQL driver:
<ul>
  <li><?php bugfix(54318); ?> (Non-portable grep option used in PDO pgsql configuration). (bwalton at artsci dot utoronto dot ca)</li>
</ul>
</li>

<li>PDO Oracle driver:
<ul>
  <li><?php bugfix(44989); ?> (64bit Oracle RPMs still not supported by pdo-oci). (jbnance at tresgeek dot net)</li>
</ul>
</li>

<li>Phar extension:
<ul>
  <li><?php bugfix(54395); ?> (Phar::mount() crashes when calling with wrong parameters). (Felipe)</li>
</ul>
</li>

<li>PHP-FPM SAPI:
<ul>
  <li><?php implemented(54499); ?> (FPM ping and status_path should handle HEAD request). (fat)</li>
  <li><?php implemented(54172); ?> (Overriding the pid file location of php-fpm). (fat)</li>
  <li>Fixed missing Expires and Cache-Control headers for ping and status pages. (fat)</li>
  <li>Fixed memory leak. (fat) Reported and fixed by Giovanni Giacobbi.
  <li>Fixed wrong value of log_level when invoking fpm with -tt. (fat)</li>
  <li>Added xml format to the status page. (fat)</li>
  <li>Removed timestamp in logs written by children processes. (fat)</li>
  <li>Fixed exit at FPM startup on fpm_resources_prepare() errors. (fat)</li>
  <li>Added master rlimit_files and rlimit_core in the global configuration settings. (fat)</li>
  <li>Removed pid in debug logs written by chrildren processes. (fat)</li>
  <li>Added custom access log (also added per request %CPU and memory mesurement). (fat)</li>
  <li>Added a real scoreboard and several improvements to the status page. (fat)</li>
</ul>
</li>

<li>Reflection extension:
<ul>
  <li><?php bugfix(54347); ?> (reflection_extension does not lowercase module function name). (Felipe, laruence at yahoo dot com dot cn)</li>
</ul>
</li>

<li>SOAP extension:
<ul>
  <li><?php bugfix(55323); ?> (SoapClient segmentation fault when XSD_TYPEKIND_EXTENSION contains itself). (Dmitry)</li>
  <li><?php bugfix(54312); ?> (soap_version logic bug). (tom at samplonius dot org)</li>
</ul>
</li>

<li>Sockets extension:
<ul>
  <li>Fixed stack buffer overflow in socket_connect(). (CVE-2011-1938) Found by Mateusz Kocielski, Marek Kroemeke and Filip Palian. (Felipe)</li>
  <li>Changed socket_set_block() and socket_set_nonblock() so they emit warnings on error. (Gustavo)</li>
  <li><?php bugfix(51958); ?> (socket_accept() fails on IPv6 server sockets). (Gustavo)</li>
</ul>
</li>

<li>SPL extension:
<ul>
  <li><?php bugfix(54971); ?> (Wrong result when using iterator_to_array with use_keys on true). (Pierrick)</li>
  <li><?php bugfix(54970); ?> (SplFixedArray::setSize() isn't resizing). (Felipe)</li>
  <li><?php bugfix(54609); ?> (Certain implementation(s) of SplFixedArray cause hard crash). (Felipe)</li>
  <li><?php bugfix(54384); ?> (Dual iterators, GlobIterator, SplFileObject and SplTempFileObject crash when user-space classes don't call the paren constructor). (Gustavo)</li>
  <li><?php bugfix(54292); ?> (Wrong parameter causes crash in SplFileObject::__construct()). (Felipe)</li>
  <li><?php bugfix(54291); ?> (Crash iterating DirectoryIterator for dir name starting with \0). (Gustavo)</li>
  <li><?php bugfix(54281); ?> (Crash in non-initialized RecursiveIteratorIterator). (Felipe)</li>
</ul>
</li>

<li>Streams:
<ul>
  <li><?php bugfix(54946); ?> (stream_get_contents infinite loop). (Hannes)</li>
  <li><?php bugfix(54623); ?> (Segfault when writing to a persistent socket after closing a copy of the socket). (Gustavo)</li>
  <li><?php bugfix(54681); ?> (addGlob() crashes on invalid flags). (Felipe)</li>
</ul>
</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.3.6"><!-- {{{ 5.3.6 -->
<h3>Version 5.3.6</h3>
<?php release_date('17-Mar-2011'); ?>

<ul>
<li>Upgraded bundled Sqlite3 to version 3.7.4. (Ilia)</li>
<li>Upgraded bundled PCRE to version 8.11. (Ilia)</li>

<li>Zend Engine:
<ul>
  <li>Indirect reference to $this fails to resolve if direct $this is never used in method. (Scott)</li>
  <li>Fixed bug numerous crashes due to setlocale (crash on error, pcre, mysql etc.) on Windows in thread safe mode. (Pierre)</li>
  <li>Added options to debug backtrace functions. (Stas)</li>
  <li><?php bugfix(53971); ?> (isset() and empty() produce apparently spurious runtime error). (Dmitry)</li>
  <li><?php bugfix(53958); ?> (Closures can't 'use' shared variables by value and by reference). (Dmitry)</li>
  <li><?php bugfix(53629); ?> (memory leak inside highlight_string()). (Hannes, Ilia)</li>
  <li><?php bugfix(51458); ?> (Lack of error context with nested exceptions). (Stas)</li>
  <li><?php bugfix(47143); ?> (Throwing an exception in a destructor causes a fatal error). (Stas)</li>
  <li><?php bugfix(43512); ?> (same parameter name can be used multiple times in method/function definition). (Felipe)</li>
</ul>
</li>

<li>Core:
<ul>
  <li>Added ability to connect to HTTPS sites through proxy with basic authentication using stream_context/http/header/Proxy-Authorization (Dmitry)</li>
  <li>Changed default value of ini directive serialize_precision from 100 to 17. (Gustavo)</li>
  <li><?php bugfix(54055); ?> (buffer overrun with high values for precision ini setting). (Gustavo)</li>
  <li><?php bugfix(53959); ?> (reflection data for fgetcsv out-of-date). (Richard)</li>
  <li><?php bugfix(53577); ?> (Regression introduced in 5.3.4 in open_basedir with a trailing forward slash). (lekensteyn at gmail dot com, Pierre)</li>
  <li><?php bugfix(53682); ?> (Fix compile on the VAX). (Rasmus, jklos)</li>
  <li><?php bugfix(48484); ?> (array_product() always returns 0 for an empty array). (Ilia)</li>
  <li><?php bugfix(48607); ?> (fwrite() doesn't check reply from ftp server before exiting). (Ilia)</li>
</ul>
</li>

<li>Calendar extension:
<ul>
  <li><?php bugfix(53574); ?> (Integer overflow in SdnToJulian, sometimes leading to segfault). (Gustavo)</li>
</ul>
</li>

<li>DOM extension:
<ul>
  <li><?php implemented(39771); ?> (Made DOMDocument::saveHTML accept an optional DOMNode like DOMDocument::saveXML). (Gustavo)</li>
</ul>
</li>

<li>DateTime extension:
<ul>
  <li>Fixed a bug in DateTime-&gt;modify() where absolute date/time statements had no effect. (Derick)</li>
  <li><?php bugfix(53729); ?> (DatePeriod fails to initialize recurrences on 64bit big-endian systems). (Derick, rein@basefarm.no)</li>
  <li><?php bugfix(52808); ?> (Segfault when specifying interval as two dates). (Stas)</li>
  <li><?php bugfix(52738); ?> (Can't use new properties in class extended from DateInterval). (Stas)</li>
  <li><?php bugfix(52290); ?> (setDate, setISODate, setTime works wrong when DateTime created from timestamp). (Stas)</li>
  <li><?php bugfix(52063); ?> (DateTime constructor's second argument doesn't have a null default value). (Gustavo, Stas)</li>
</ul>
</li>

<li>Exif extension:
<ul>
  <li><?php bugfix(54002); ?> (crash on crafted tag, reported by Luca Carettoni). (Pierre) (CVE-2011-0708)</li>
</ul>
</li>

<li>Filter extension:
<ul>
  <li><?php bugfix(53924); ?> (FILTER_VALIDATE_URL doesn't validate port number). (Ilia, Gustavo)</li>
  <li><?php bugfix(53150); ?> (FILTER_FLAG_NO_RES_RANGE is missing some IP ranges). (Ilia)</li>
  <li><?php bugfix(52209); ?> (INPUT_ENV returns NULL for set variables (CLI)). (Ilia)</li>
  <li><?php bugfix(47435); ?> (FILTER_FLAG_NO_RES_RANGE don't work with ipv6). (Ilia, valli at icsurselva dot ch)</li>
</ul>
</li>

<li>Fileinfo extension:
<ul>
  <li><?php bugfix(54016); ?> (finfo_file() Cannot determine filetype in archives). (Hannes)</li>
</ul>
</li>

<li>Gettext
<ul>
  <li><?php bugfix(53837); ?> (_() crashes on Windows when no LANG or LANGUAGE environment variable are set). (Pierre)</li>
</ul>
</li>

<li>IMAP extension:
<ul>
  <li><?php implemented(53812); ?> (get MIME headers of the part of the email). (Stas)</li>
  <li><?php bugfix(53377); ?> (imap_mime_header_decode() doesn't ignore \t during long MIME header unfolding). (Adam)</li>
</ul>
</li>

<li>Intl extension:
<ul>
  <li><?php bugfix(53612); ?> (Segmentation fault when using cloned several intl objects). (Gustavo)</li>
  <li><?php bugfix(53512); ?> (NumberFormatter::setSymbol crash on bogus $attr values). (Felipe)</li>
  <li>Implemented clone functionality for number, date &amp; message formatters. (Stas).</li>
</ul>
</li>

<li>JSON extension:
<ul>
  <li><?php bugfix(53963); ?> (Ensure error_code is always set during some failed decodings). (Scott)</li>
</ul>
</li>

<li>mysqlnd
<ul>
  <li>Fixed problem with always returning 0 as num_rows for unbuffered sets. (Andrey, Ulf)</li>
</ul>
</li>

<li>MySQL Improved extension:
<ul>
  <li>Added 'db' and 'catalog' keys to the field fetching functions (FR <?php bugl(39847); ?>). (Kalle)</li>
  <li>Fixed buggy counting of affected rows when using the text protocol. The collected statistics were wrong when multi_query was used with mysqlnd (Andrey)</li>
  <li><?php bugfix(53795); ?> (Connect Error from MySqli (mysqlnd) when using SSL). (Kalle)</li>
  <li><?php bugfix(53503); ?> (mysqli::query returns false after successful LOAD DATA query). (Kalle, Andrey)</li>
  <li><?php bugfix(53425); ?> (mysqli_real_connect() ignores client flags when built to call libmysql). (Kalle, tre-php-net at crushedhat dot com)</li>
</ul>
</li>

<li>OpenSSL extension:
<ul>
  <li>Fixed stream_socket_enable_crypto() not honoring the socket timeout in server mode. (Gustavo)</li>
  <li><?php bugfix(54060); ?> (Memory leaks when openssl_encrypt). (Pierre)</li>
  <li><?php bugfix(54061); ?> (Memory leaks when openssl_decrypt). (Pierre)</li>
  <li><?php bugfix(53592); ?> (stream_socket_enable_crypto() busy-waits in client mode). (Gustavo)</li>
  <li><?php implemented(53447); ?> (Cannot disable SessionTicket extension for servers that do not support it) by adding a no_ticket SSL context option. (Adam, Tony)</li>
</ul>
</li>

<li>PDO MySQL driver:
<ul>
  <li><?php bugfix(53551); ?> (PDOStatement execute segfaults for pdo_mysql driver). (Johannes)</li>
  <li><?php implemented(47802); ?> (Support for setting character sets in DSN strings). (Kalle)</li>
</ul>
</li>

<li>PDO Oracle driver:
<ul>
  <li><?php bugfix(39199); ?> (Cannot load Lob data with more than 4000 bytes on ORACLE 10). (spatar at mail dot nnov dot ru)</li>
</ul>
</li>

<li>PDO PostgreSQL driver:
<ul>
  <li><?php bugfix(53517); ?> (segfault in pgsql_stmt_execute() when postgres is down). (gyp at balabit dot hu)</li>
</ul>

<li>Phar extension:
<ul>
  <li><?php bugfix(54247); ?> (format-string vulnerability on Phar). (Felipe) (CVE-2011-1153)</li>
  <li><?php bugfix(53541); ?> (format string bug in ext/phar). (crrodriguez at opensuse dot org, Ilia)</li>
  <li><?php bugfix(53898); ?> (PHAR reports invalid error message, when the directory does not exist). (Ilia)</li>
</ul>
</li>

<li>PHP-FPM SAPI:
<ul>
  <li>Enforce security in the fastcgi protocol parsing. (ef-lists at email dotde)</li>
  <li><?php bugfix(53777); ?> (php-fpm log format now match php_error log format). (fat)</li>
  <li><?php bugfix(53527); ?> (php-fpm --test doesn't set a valuable return value). (fat)</li>
  <li><?php bugfix(53434); ?> (php-fpm slowlog now also logs the original request). (fat)</li>
</ul>
</li>

<li>Readline extension:
<ul>
  <li><?php bugfix(53630); ?> (Fixed parameter handling inside readline() function). (jo at feuersee dot de, Ilia)</li>
</ul>
</li>

<li>Reflection extension:
<ul>
  <li><?php bugfix(53915); ?> (ReflectionClass::getConstant(s) emits fatal error on constants with self::). (Gustavo)</li>
</ul>
</li>

<li>Shmop extension:
<ul>
  <li><?php bugfix(54193); ?> (Integer overflow in shmop_read()). (Felipe) Reported by Jose Carlos Norte (CVE-2011-1092)</li>
</ul>
</li>

<li>SNMP extension:
<ul>
  <li><?php bugfix(51336); ?> (snmprealwalk (snmp v1) does not handle end of OID tree correctly). (Boris Lytochkin)</li>
</ul>
</li>

<li>SOAP extension:
<ul>
  <li>Fixed possible crash introduced by the NULL poisoning patch. (Mateusz Kocielski, Pierre)</li>
</ul>
</li>

<li>SPL extension:
<ul>
  <li>Fixed memory leak in DirectoryIterator::getExtension() and SplFileInfo::getExtension(). (Felipe)</li>
  <li><?php bugfix(53914); ?> (SPL assumes HAVE_GLOB is defined). (Chris Jones)</li>
  <li><?php bugfix(53515); ?> (property_exists incorrect on ArrayObject null and 0 values). (Felipe)</li>
  <li>Added SplFileInfo::getExtension(). FR <?php bugl(48767); ?>. (Peter Cowburn)</li>
</ul>
</li>

<li>SQLite3 extension:
<ul>
  <li>Fixed memory leaked introduced by the NULL poisoning patch. (Mateusz Kocielski, Pierre)</li>
  <li>Fixed memory leak on SQLite3Result and SQLite3Stmt when assigning to a reference. (Felipe)</li>
  <li>Add SQlite3_Stmt::readonly() for checking if a statement is read only. (Scott)</li>
  <li><?php implemented(53466); ?> (SQLite3Result::columnType() should return false after all of the rows have been fetched). (Scott)</li>
</ul>
</li>

<li>Streams:
<ul>
  <li><?php bugfix(54092); ?> (Segmentation fault when using HTTP proxy with the FTP wrapper). (Gustavo)</li>
  <li><?php bugfix(53913); ?> (Streams functions assume HAVE_GLOB is defined). (Chris Jones)</li>
  <li><?php bugfix(53903); ?> (userspace stream stat callback does not separate the elements of the returned array before converting them). (Gustavo)</li>
  <li><?php implemented(26158); ?> (open arbitrary file descriptor with fopen). (Gustavo)</li>
</ul>
</li>

<li>Tokenizer Extension
<ul>
  <li><?php bugfix(54089); ?> (token_get_all() does not stop after __halt_compiler). (Ilia)</li>
</ul>
</li>

<li>XSL extension:
<ul>
  <li>Fixed memory leaked introduced by the NULL poisoning patch. (Mateusz Kocielski, Pierre)</li>
</ul>
</li>

<li>Zip extension:
<ul>
  <li>Added the filename into the return value of stream_get_meta_data(). (Hannes)</li>
  <li><?php bugfix(53923); ?> (Zip functions assume HAVE_GLOB is defined). (Adam)</li>
  <li><?php bugfix(53893); ?> (Wrong return value for ZipArchive::extractTo()). (Pierre)</li>
  <li><?php bugfix(53885); ?> (ZipArchive segfault with FL_UNCHANGED on empty archive). (Stas, Maksymilian Arciemowicz). (CVE-2011-0421)</li>
  <li><?php bugfix(53854); ?> (Missing constants for compression type). (Richard, Adam)</li>
  <li><?php bugfix(53603); ?> (ZipArchive should quiet stat errors). (brad dot froehle at gmail dot com, Gustavo)</li>
  <li><?php bugfix(53579); ?> (stream_get_contents() segfaults on ziparchive streams). (Hannes)</li>
  <li><?php bugfix(53568); ?> (swapped memset arguments in struct initialization). (crrodriguez at opensuse dot org)</li>
  <li><?php bugfix(53166); ?> (Missing parameters in docs and reflection definition). (Richard)</li>
  <li><?php bugfix(49072); ?> (feof never returns true for damaged file in zip). (Gustavo, Richard Quadling)</li>
</ul>
</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.3.5"><!-- {{{ 5.3.5 -->
<h3>Version 5.3.5</h3>
<?php release_date('06-Jan-2011'); ?>
<ul>

<li><?php bugfix(53632); ?> (PHP hangs on numeric value 2.2250738585072011e-308). (CVE-2010-4645) (Rasmus, Scott)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.3.4"><!-- {{{ 5.3.4 -->
<h3>Version 5.3.4</h3>
<?php release_date('09-Dec-2010'); ?>

<ul>
<li>Upgraded bundled Sqlite3 to version 3.7.3. (Ilia)</li>
<li>Upgraded bundled PCRE to version 8.10. (Ilia)</li>

<li>Security enhancements:
<ul>
  <li>Fixed crash in zip extract method (possible CWE-170).
    (Maksymilian Arciemowicz, Pierre)</li>
  <li>Paths with NULL in them (foo\0bar.txt) are now considered as invalid. (Rasmus)</li>
  <li>Fixed a possible double free in imap extension (Identified by Mateusz
    Kocielski). (CVE-2010-4150). (Ilia)</li>
  <li>Fixed NULL pointer dereference in ZipArchive::getArchiveComment.
    (CVE-2010-3709). (Maksymilian Arciemowicz)</li>
  <li>Fixed possible flaw in open_basedir (CVE-2010-3436). (Pierre)</li>
  <li>Fixed MOPS-2010-24, fix string validation. (CVE-2010-2950). (Pierre)</li>
  <li>Fixed symbolic resolution support when the target is a DFS share. (Pierre)</li>
  <li><?php bugfix(52929); ?> (Segfault in filter_var with FILTER_VALIDATE_EMAIL with
    large amount of data) (CVE-2010-3710). (Adam)</li>
</ul>
</li>

<li>General improvements:
<ul>
  <li>Added stat support for zip stream. (Pierre)</li>
  <li>Added follow_location (enabled by default) option for the http stream
    support. (Pierre)</li>
  <li>Improved support for is_link and related functions on Windows. (Pierre)</li>
  <li>Added a 3rd parameter to get_html_translation_table. It now takes a charset
    hint, like htmlentities et al. (Gustavo)</li>
</ul>
</li>
<li>Implemented feature requests:
<ul>
  <li><?php implemented(52348); ?>, added new constant ZEND_MULTIBYTE to detect
    zend multibyte at runtime. (Kalle)</li>
  <li><?php implemented(52173); ?>, added functions pcntl_get_last_error() and
     pcntl_strerror(). (nick dot telford at gmail dot com, Arnaud)</li>
  <li>Implemented symbolic links support for open_basedir checks. (Pierre)</li>
  <li><?php implemented(51804); ?>, SplFileInfo::getLinkTarget on Windows. (Pierre)</li>
  <li><?php implemented(50692); ?>, not uploaded files don't count towards
    max_file_uploads limit. As a side improvement, temporary files are not opened
    for empty uploads and, in debug mode, 0-length uploads. (Gustavo)</li>
</ul>
</li>
<li>Improved MySQLnd:
<ul>
  <li>Added new character sets to mysqlnd, which are available in MySQL 5.5
    (Andrey)</li>
</ul>
</li>
<li>Improved PHP-FPM SAPI:
<ul>
  <li>Added '-p/--prefix' to php-fpm to use a custom prefix and run multiple
    instances. (fat)</li>
  <li>Added custom process title for FPM. (fat)</li>
  <li>Added '-t/--test' to php-fpm to check and validate FPM conf file. (fat)</li>
  <li>Added statistics about listening socket queue length for FPM.
    (andrei dot nigmatulin at gmail dot com, fat)</li>
</ul>
</li>
<li>Core:
<ul>
  <li>Fixed extract() to do not overwrite $GLOBALS and $this when using
    EXTR_OVERWRITE. (jorto at redhat dot com)</li>
  <li>Fixed bug in the Windows implementation of dns_get_record, where the two
    last parameters wouldn't be filled unless the type were DNS_ANY (Gustavo).</li>
  <li>Changed the $context parameter on copy() to actually have an effect. (Kalle)</li>
  <li>Fixed htmlentities/htmlspecialchars accepting certain ill-formed UTF-8
    sequences. (Gustavo)</li>
  <li><?php bugfix(53409); ?> (sleep() returns NULL on Windows). (Pierre)</li>
  <li><?php bugfix(53319); ?> (strip_tags() may strip '&lt;br /&gt;' incorrectly). (Felipe)</li>
  <li><?php bugfix(53304); ?> (quot_print_decode does not handle lower-case hex digits).
    (Ilia, daniel dot mueller at inexio dot net)</li>
  <li><?php bugfix(53248); ?> (rawurlencode RFC 3986 EBCDIC support misses tilde char).
    (Justin Martin)  </li>
  <li><?php bugfix(53226); ?> (file_exists fails on big filenames). (Adam)</li>
  <li><?php bugfix(53198); ?> (changing INI setting "from" with ini_set did not have any
    effect). (Gustavo)</li>
  <li><?php bugfix(53180); ?> (post_max_size=0 not disabling the limit when the content
    type is application/x-www-form-urlencoded or is not registered with PHP).
    (gm at tlink dot de, Gustavo)</li>
  <li><?php bugfix(53141); ?> (autoload misbehaves if called from closing session).
    (ladislav at marek dot su)</li>
  <li><?php bugfix(53021); ?> (In html_entity_decode, failure to convert numeric entities
    with ENT_NOQUOTES and ISO-8859-1). Fixed and extended the fix of ENT_NOQUOTES
    in html_entity_decode that had introduced the bug (rev #185591) to other
    encodings. Additionaly, html_entity_decode() now doesn't decode &amp;#34; if
    ENT_NOQUOTES is given. (Gustavo)</li>
  <li><?php bugfix(52931); ?> (strripos not overloaded with function overloading enabled).
    (Felipe)</li>
  <li><?php bugfix(52772); ?> (var_dump() doesn't check for the existence of
    get_class_name before calling it). (Kalle, Gustavo)</li>
  <li><?php bugfix(52534); ?> (var_export array with negative key). (Felipe)</li>
  <li><?php bugfix(52327); ?> (base64_decode() improper handling of leading padding in
    strict mode). (Ilia)</li>
  <li><?php bugfix(52260); ?> (dns_get_record fails with non-existing domain on Windows).
    (a_jelly_doughnut at phpbb dot com, Pierre)</li>
  <li><?php bugfix(50953); ?> (socket will not connect to IPv4 address when the host has
    both IPv4 and IPv6 addresses, on Windows). (Gustavo, Pierre)</li>
  <li><?php bugfix(50524); ?> (proc_open on Windows does not respect cwd as it does on
    other platforms). (Pierre)</li>
  <li><?php bugfix(49687); ?> (utf8_decode vulnerabilities and deficiencies in the number
    of reported malformed sequences). (CVE-2010-3870) (Gustavo)</li>
  <li><?php bugfix(49407); ?> (get_html_translation_table doesn't handle UTF-8). (Gustavo)</li>
  <li><?php bugfix(48831); ?> (php -i has different output to php --ini). (Richard,
    Pierre)</li>
  <li><?php bugfix(47643); ?> (array_diff() takes over 3000 times longer than php 5.2.4).
    (Felipe)</li>
  <li><?php bugfix(47168); ?> (printf of floating point variable prints maximum of 40
    decimal places). (Ilia)</li>
  <li><?php bugfix(46587); ?> (mt_rand() does not check that max is greater than min).
    (Ilia)</li>
  <li><?php bugfix(29085); ?> (bad default include_path on Windows). (Pierre)</li>
  <li><?php bugfix(25927); ?> (get_html_translation_table calls the ' &amp;#39; instead of
    &amp;#039;). (Gustavo)</li>
</ul>
</li>
<li>Zend engine:
<ul>
  <li>Reverted fix for bug <?php bugl(51176); ?> (Static calling in non-static method behaves
    like $this-&gt;). (Felipe)</li>
  <li>Changed deprecated ini options on startup from E_WARNING to E_DEPRECATED.
    (Kalle)</li>
  <li>Fixed NULL dereference in lex_scan on zend multibyte builds where the script
    had a flex incompatible encoding and there was no converter. (Gustavo)</li>
  <li>Fixed covariance of return-by-ref constraints. (Etienne)</li>
  <li><?php bugfix(53305); ?> (E_NOTICE when defining a constant starts with
    __COMPILER_HALT_OFFSET__). (Felipe)</li>
  <li><?php bugfix(52939); ?> (zend_call_function does not respect ZEND_SEND_PREFER_REF).
    (Dmitry)</li>
  <li><?php bugfix(52879); ?> (Objects unreferenced in __get, __set, __isset or __unset
    can be freed too early). (mail_ben_schmidt at yahoo dot com dot au, Dmitry)</li>
  <li><?php bugfix(52786); ?> (PHP should reset section to [PHP] after ini sections).
    (Fedora at famillecollet dot com)</li>
  <li><?php bugfix(52508); ?> (newline problem with parse_ini_file+INI_SCANNER_RAW).
    (Felipe)</li>
  <li><?php bugfix(52484); ?> (__set() ignores setting properties with empty names).
    (Felipe)</li>
  <li><?php bugfix(52361); ?> (Throwing an exception in a destructor causes invalid
    catching). (Dmitry)</li>
  <li><?php bugfix(51008); ?> (Zend/tests/bug45877.phpt fails). (Dmitry)</li>
</ul>
</li>
<li>Build issues:
<ul>
  <li><?php bugfix(52436); ?> (Compile error if systems do not have stdint.h)
    (Sriram Natarajan)</li>
  <li><?php bugfix(50345); ?> (nanosleep not detected properly on some solaris versions).
    (Ulf, Tony)</li>
  <li><?php bugfix(49215); ?> (make fails on glob_wrapper). (Felipe)</li>
</ul>
</li>
<li>Calendar extension:
<ul>
  <li><?php bugfix(52744); ?> (cal_days_in_month incorrect for December 1 BCE).
   (gpap at internet dot gr, Adam)</li>
</ul>
</li>
<li>cURL extension:
<ul>
  <li><?php bugfix(52828); ?> (curl_setopt does not accept persistent streams).
    (Gustavo, Ilia)</li>
  <li><?php bugfix(52827); ?> (cURL leaks handle and causes assertion error
    (CURLOPT_STDERR)). (Gustavo)</li>
  <li><?php bugfix(52202); ?> (CURLOPT_PRIVATE gets corrupted). (Ilia)</li>
  <li><?php bugfix(50410); ?> (curl extension slows down PHP on Windows). (Pierre)</li>
</ul>
</li>
<li>DateTime extension:
<ul>
  <li><?php bugfix(53297); ?> (gettimeofday implementation in php/win32/time.c can return
    1 million microsecs). (ped at 7gods dot org)</li>
  <li><?php bugfix(52668); ?> (Iterating over a dateperiod twice is broken). (Derick)</li>
  <li><?php bugfix(52454); ?> (Relative dates and getTimestamp increments by one day).
    (Derick)</li>
  <li><?php bugfix(52430); ?> (date_parse parse 24:xx:xx as valid time). (Derick)</li>
  <li>Added support for the ( and ) delimiters/separators to
    DateTime::createFromFormat(). (Derick)</li>
</ul>
</li>
<li>DBA extension:
<ul>
  <li>Added Berkeley DB 5.1 support to the DBA extension. (Oracle Corp.)</li>
</ul>
</li>
<li>DOM extension:
<ul>
  <li><?php bugfix(52656); ?> (DOMCdataSection does not work with splitText). (Ilia)</li>
</ul>
</li>
<li>Filter extension:
<ul>
  <li>Fixed the filter extension accepting IPv4 octets with a leading 0 as that
    belongs to the unsupported "dotted octal" representation. (Gustavo)</li>
  <li><?php bugfix(53236); ?> (problems in the validation of IPv6 addresses with leading
    and trailing :: in the filter extension). (Gustavo)</li>
  <li><?php bugfix(50117); ?> (problems in the validation of IPv6 addresses with IPv4
    addresses and ::). (Gustavo)</li>
</ul>
</li>
<li>GD extension:
<ul>
  <li><?php bugfix(53492); ?> (fix crash if anti-aliasing steps are invalid). (Pierre)</li>
</ul>
</li>
<li>GMP extension:
<ul>
  <li><?php bugfix(52906); ?> (gmp_mod returns negative result when non-negative is
    expected). (Stas)</li>
  <li><?php bugfix(52849); ?> (GNU MP invalid version match). (Adam)</li>
</ul>
</li>
<li>Hash extension:
<ul>
  <li><?php bugfix(51003); ?> (unaligned memory access in ext/hash/hash_tiger.c).
    (Mike, Ilia)</li>
</ul>
</li>
<li>Iconv extension:
<ul>
  <li><?php bugfix(52941); ?> (The 'iconv_mime_decode_headers' function is skipping
    headers). (Adam)</li>
  <li><?php bugfix(52599); ?> (iconv output handler outputs incorrect content type
    when flags are used). (Ilia)</li>
  <li><?php bugfix(51250); ?> (iconv_mime_decode() does not ignore malformed Q-encoded
    words). (Ilia)</li>
</ul>
</li>
<li>Intl extension:
<ul>
  <li>Fixed crashes on invalid parameters in intl extension. (CVE-2010-4409). (Stas, Maksymilian
    Arciemowicz)</li>
  <li>Added support for formatting the timestamp stored in a DateTime object.
    (Stas)</li>
  <li><?php bugfix(50590); ?> (IntlDateFormatter::parse result is limited to the integer
    range). (Stas)</li>
</ul>
</li>
<li>Mbstring extension:
<ul>
  <li><?php bugfix(53273); ?> (mb_strcut() returns garbage with the excessive length
    parameter). (CVE-2010-4156) (Mateusz Kocielski, Pierre, Moriyoshi)</li>
  <li><?php bugfix(52981); ?> (Unicode casing table was out-of-date. Updated with
    UnicodeData-6.0.0d7.txt and included the source of the generator program with
    the distribution) (Gustavo).</li>
  <li><?php bugfix(52681); ?> (mb_send_mail() appends an extra MIME-Version header).
    (Adam)</li>
</ul>
</li>
<li>MSSQL extension:
<ul>
  <li>Fixed possible crash in mssql_fetch_batch(). (Kalle)</li>
  <li><?php bugfix(52843); ?> (Segfault when optional parameters are not passed in to
    mssql_connect). (Felipe)</li>
</ul>
</li>
<li>MySQL extension:
<ul>
  <li><?php bugfix(52636); ?> (php_mysql_fetch_hash writes long value into int).
    (Kalle, rein at basefarm dot no)</li>
</ul>
</li>
<li>MySQLi extension:
<ul>
  <li><?php bugfix(52891); ?> (Wrong data inserted with mysqli/mysqlnd when using
    mysqli_stmt_bind_param and value> PHP_INT_MAX). (Andrey)</li>
  <li><?php bugfix(52686); ?> (mysql_stmt_attr_[gs]et argument points to incorrect type).
    (rein at basefarm dot no)</li>
  <li><?php bugfix(52654); ?> (mysqli doesn't install headers with structures it uses).
    (Andrey)</li>
  <li><?php bugfix(52433); ?> (Call to undefined method mysqli::poll() - must be static).
    (Andrey)</li>
  <li><?php bugfix(52417); ?> (MySQLi build failure with mysqlnd on MacOS X). (Andrey)</li>
  <li><?php bugfix(52413); ?> (MySQLi/libmysql build failure on OS X, FreeBSD). (Andrey)</li>
  <li><?php bugfix(52390); ?> (mysqli_report() should be per-request setting). (Kalle)</li>
  <li><?php bugfix(52302); ?> (mysqli_fetch_all does not work with MYSQLI_USE_RESULT).
    (Andrey)</li>
  <li><?php bugfix(52221); ?> (Misbehaviour of magic_quotes_runtime (get/set)). (Andrey)</li>
  <li><?php bugfix(45921); ?> (Can't initialize character set hebrew). (Andrey)</li>
</ul>
</li>
<li>MySQLnd:
<ul>
  <li><?php bugfix(52613); ?> (crash in mysqlnd after hitting memory limit). (Andrey)</li>
</ul>
</li>
<li>ODBC extension:
<ul>
<li><?php bugfix(52512); ?> (Broken error handling in odbc_execute).
    (mkoegler at auto dot tuwien dot ac dot at)</li>
</ul>
</li>
<li>Openssl extension:
<ul>
  <li>Fixed possible blocking behavior in openssl_random_pseudo_bytes on Windows.
    (Pierre)</li>
  <li><?php bugfix(53136); ?> (Invalid read on openssl_csr_new()). (Felipe)</li>
  <li><?php bugfix(52947); ?> (segfault when ssl stream option capture_peer_cert_chain
    used). (Felipe)</li>
</ul>
</li>
<li>Oracle Database extension (OCI8):
<ul>
  <li><?php bugfix(53284); ?> (Valgrind warnings in oci_set_* functions) (Oracle Corp.)</li>
  <li><?php bugfix(51610); ?> (Using oci_connect causes PHP to take a long time to
    exit).  Requires Oracle 11.2.0.2 client libraries (or Oracle bug fix
    9891199) for this patch to have an effect. (Oracle Corp.)</li>
</ul>
</li>
<li>PCNTL extension:
<ul>
  <li><?php bugfix(52784); ?> (Race condition when handling many concurrent signals).
    (nick dot telford at gmail dot com, Arnaud)</li>
</ul>
</li>
<li>PCRE extension:
<ul>
  <li><?php bugfix(52971); ?> (PCRE-Meta-Characters not working with utf-8). (Felipe)</li>
  <li><?php bugfix(52732); ?> (Docs say preg_match() returns FALSE on error, but it
    returns int(0)). (slugonamission at gmail dot com)</li>
</ul>
</li>
<li>PHAR extension:
<ul>
  <li><?php bugfix(50987); ?> (unaligned memory access in phar.c).
    (geissert at debian dot org, Ilia)</li>
</ul>
</li>
<li>PHP-FPM SAPI:
<ul>
  <li><?php bugfix(53412); ?> (segfault when using -y). (fat)</li>
  <li>Fixed inconsistent backlog default value (-1) in FPM on many systems. (fat)</li>
  <li><?php bugfix(52501); ?> (libevent made FPM crashed when forking - libevent has
    been removed). (fat)</li>
  <li><?php bugfix(52725); ?> (gcc builtin atomic functions were sometimes used when they
    were not available). (fat)</li>
  <li><?php bugfix(52693); ?> (configuration file errors are not logged to stderr). (fat)</li>
  <li><?php bugfix(52674); ?> (FPM Status page returns inconsistent Content-Type headers).
    (fat)</li>
  <li><?php bugfix(52498); ?> (libevent was not only linked to php-fpm). (fat)</li>
</ul>
</li>
<li>PDO:
<ul>
  <li><?php bugfix(52699); ?> (PDO bindValue writes long int 32bit enum).
    (rein at basefarm dot no) </li>
  <li><?php bugfix(52487); ?> (PDO::FETCH_INTO leaks memory). (Felipe)</li>
</ul>
</li>
<li>PDO DBLib driver:
<ul>
  <li><?php bugfix(52546); ?> (pdo_dblib segmentation fault when iterating MONEY values).
    (Felipe)</li>
</ul>
</li>
<li>PDO Firebird driver:
<ul>
  <li>Restored firebird support (VC9 builds only). (Pierre)</li>
  <li><?php bugfix(53335); ?> (pdo_firebird did not implement rowCount()).
    (preeves at ibphoenix dot com)</li>
  <li><?php bugfix(53323); ?> (pdo_firebird getAttribute() crash).
    (preeves at ibphoenix dot com)</li>
</ul>
</li>
<li>PDO MySQL driver:
<ul>
  <li><?php bugfix(52745); ?> (Binding params doesn't work when selecting a date inside a
    CASE-WHEN). (Andrey)</li>
</ul>
</li>
<li>PostgreSQL extension:
<ul>
  <li><?php bugfix(47199); ?> (pg_delete() fails on NULL). (ewgraf at gmail dot com)</li>
</ul>
</li>
<li>Reflection extension:
<ul>
  <li>Fixed ReflectionProperty::isDefault() giving a wrong result for properties
    obtained with ReflectionClass::getProperties(). (Gustavo)</li>
  <li><?php bugfix(53366); ?> (Reflection doesnt get dynamic property value from
    getProperty()). (Felipe)</li>
  <li><?php bugfix(52854); ?> (ReflectionClass::newInstanceArgs does not work for classes
    without constructors). (Johannes)</li>
</ul>
</li>
<li>SOAP extension:
<ul>
  <li><?php bugfix(44248); ?> (RFC2616 transgression while HTTPS request through proxy
    with SoapClient object). (Dmitry)</li>
</ul>
</li>
<li>SPL extension:
<ul>
  <li><?php bugfix(53362); ?> (Segmentation fault when extending SplFixedArray). (Felipe)</li>
  <li><?php bugfix(53279); ?> (SplFileObject doesn't initialise default CSV escape
    character). (Adam)</li>
  <li><?php bugfix(53144); ?> (Segfault in SplObjectStorage::removeAll()). (Felipe)</li>
  <li><?php bugfix(53071); ?> (SPLObjectStorage defeats gc_collect_cycles). (Gustavo)</li>
  <li><?php bugfix(52573); ?> (SplFileObject::fscanf Segmentation fault). (Felipe)</li>
  <li><?php bugfix(51763); ?> (SplFileInfo::getType() does not work symbolic link
    and directory). (Pierre)</li>
  <li><?php bugfix(50481); ?> (Storing many SPLFixedArray in an array crashes). (Felipe)</li>
  <li><?php bugfix(50579); ?> (RegexIterator::REPLACE doesn't work). (Felipe)</li>
</ul>
</li>
<li>SQLite3 extension:
<ul>
  <li><?php bugfix(53463); ?> (sqlite3 columnName() segfaults on bad column_number).
    (Felipe)</li>
</ul>
</li>
<li>Streams:
<ul>
  <li>Fixed forward stream seeking emulation in streams that don't support seeking
    in situations where the read operation gives back less data than requested
    and when there was data in the buffer before the emulation started. Also made
    more consistent its behavior -- should return failure every time less data
    than was requested was skipped. (Gustavo)</li>
  <li><?php bugfix(53241); ?> (stream casting that relies on fdopen/fopencookie fails
    with streams opened with, inter alia, the 'xb' mode). (Gustavo)</li>
  <li><?php bugfix(53006); ?> (stream_get_contents has an unpredictable behavior when the
    underlying stream does not support seeking). (Gustavo)</li>
  <li><?php bugfix(52944); ?> (Invalid write on second and subsequent reads with an
    inflate filter fed invalid data). (Gustavo)</li>
  <li><?php bugfix(52820); ?> (writes to fopencookie FILE* not commited when seeking the
    stream). (Gustavo)</li>
</ul>
</li>
<li>WDDX extension:
<ul>
  <li><?php bugfix(52468); ?> (wddx_deserialize corrupts integer field value when left
    empty). (Felipe)</li>
</ul>
</li>
<li>Zlib extension:
<ul>
  <li><?php bugfix(52926); ?> (zlib fopen wrapper does not use context). (Gustavo)</li>
</ul>
</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.3.3"><!-- {{{ 5.3.3 -->
<h3>Version 5.3.3</h3>
<?php release_date('22-Jul-2010'); ?>
<ul>
<li>Upgraded bundled sqlite to version 3.6.23.1. (Ilia)</li>
<li>Upgraded bundled PCRE to version 8.02. (Ilia)</li>
</ul>
<ul>
<li>Added support for JSON_NUMERIC_CHECK option in json_encode() that converts numeric strings to integers. (Ilia)</li>
<li>Added stream_set_read_buffer, allows to set the buffer for read operation. (Pierre)</li>
<li>Added stream filter support to mcrypt extension (ported from mcrypt_filter). (Stas)</li>
<li>Added full_special_chars filter to ext/filter. (Rasmus)</li>
<li>Added backlog socket context option for stream_socket_server(). (Mike)</li>
<li>Added fifth parameter to openssl_encrypt()/openssl_decrypt() (string $iv) to use non-NULL IV.
  Made implicit use of NULL IV a warning. (Sara)</li>
<li>Added openssl_cipher_iv_length(). (Sara)</li>
<li>Added FastCGI Process Manager (FPM) SAPI. (Tony)</li>
<li>Added recent Windows versions to php_uname and fix undefined windows version support. (Pierre)</li>
<li>Added Berkeley DB 5 support to the DBA extension. (Johannes, Chris Jones)</li>
<li>Added support for copy to/from array/file for pdo_pgsql extension. (Denis Gasparin, Ilia)</li>
<li>Added inTransaction() method to PDO, with specialized support for Postgres. (Ilia, Denis Gasparin)</li>
</ul>
<ul>
<li>Changed namespaced classes so that the ctor can only be named __construct now. (Stas)</li>
<li>Reset error state in PDO::beginTransaction() reset error state. (Ilia)</li>
</ul>
<ul>
<li><?php implemented(51295); ?> (SQLite3::busyTimeout not existing). (Mark)</li>
<li><?php implemented(35638); ?> (Adding udate to imap_fetch_overview results). (Charles_Duffy at dell dot com )</li>
<li>Rewrote var_export() to use smart_str rather than output buffering, prevents data disclosure if a fatal error occurs (CVE-2010-2531). (Scott)</li>
<li>Fixed possible buffer overflows in mysqlnd_list_fields,  mysqlnd_change_user. (Andrey)</li>
<li>Fixed possible buffer overflows when handling error packets in mysqlnd. Reported by Stefan Esser. (Andrey)</li>
<li>Fixed very rare memory leak in mysqlnd, when binding thousands of columns. (Andrey)</li>
<li>Fixed a crash when calling an inexistent method of a class that inherits PDOStatement if instantiated directly instead of doing by the PDO methods. (Felipe)</li>
</ul>
<ul>
<li>Fixed memory leak on error in mcrypt_create_iv on Windows. (Pierre)</li>
<li>Fixed a possible crash because of recursive GC invocation. (Dmitry)</li>
<li>Fixed a possible resource destruction issues in shm_put_var(). Reported by Stefan Esser. (Dmitry)</li>
<li>Fixed a possible information leak because of interruption of XOR operator. Reported by Stefan Esser. (Dmitry)</li>
<li>Fixed a possible memory corruption because of unexpected call-time pass by refernce and following memory clobbering through callbacks.
  Reported by Stefan Esser. (Dmitry)</li>
<li>Fixed a possible memory corruption in ArrayObject::uasort(). Reported by Stefan Esser. (Dmitry)</li>
<li>Fixed a possible memory corruption in parse_str(). Reported by Stefan Esser. (Dmitry)</li>
<li>Fixed a possible memory corruption in pack(). Reported by Stefan Esser. (Dmitry)</li>
<li>Fixed a possible memory corruption in substr_replace(). Reported by Stefan Esser. (Dmitry)</li>
<li>Fixed a possible memory corruption in addcslashes(). Reported by Stefan Esser. (Dmitry)</li>
<li>Fixed a possible stack exhaustion inside fnmatch(). Reported by Stefan Esser. (Ilia)</li>
<li>Fixed a possible dechunking filter buffer overflow. Reported by Stefan Esser. (Pierre)</li>
<li>Fixed a possible arbitrary memory access inside sqlite extension. Reported by Mateusz Kocielski. (Ilia)</li>
<li>Fixed string format validation inside phar extension. Reported by Stefan Esser. (Ilia)</li>
<li>Fixed handling of session variable serialization on certain prefix characters. Reported by Stefan Esser. (Ilia)</li>
<li>Fixed a NULL pointer dereference when processing invalid XML-RPC requests (Fixes CVE-2010-0397, bug <?php bugl(51288); ?>). (Raphael Geissert)</li>
<li>Fixed 64-bit integer overflow in mhash_keygen_s2k(). (Clément LECIGNE, Stas)</li>
<li>Fixed SplObjectStorage unserialization problems (CVE-2010-2225). (Stas)</li>
<li>Fixed the mail.log ini setting when no filename was given. (Johannes)</li>
</ul>
<ul>
<li><?php bugfix(52317); ?> (Segmentation fault when using mail() on a rhel 4.x (only 64 bit)). (Adam)</li>
<li><?php bugfix(52262); ?> (json_decode() shows no errors on invalid UTF-8). (Scott)</li>
<li><?php bugfix(52240); ?> (hash_copy() does not copy the HMAC key, causes wrong results and PHP crashes). (Felipe)</li>
<li><?php bugfix(52238); ?> (Crash when an Exception occured in iterator_to_array). (Johannes)</li>
<li><?php bugfix(52193); ?> (converting closure to array yields empty array). (Felipe)</li>
<li><?php bugfix(52183); ?> (Reflectionfunction reports invalid number of arguments for function aliases). (Felipe)</li>
<li><?php bugfix(52162); ?> (custom request header variables with numbers are removed). (Sriram Natarajan)</li>
<li><?php bugfix(52160); ?> (Invalid E_STRICT redefined constructor error). (Felipe)</li>
<li><?php bugfix(52138); ?> (Constants are parsed into the ini file for section names). (Felipe)</li>
<li><?php bugfix(52115); ?> (mysqli_result::fetch_all returns null, not an empty array).  (Andrey)</li>
<li><?php bugfix(52101); ?> (dns_get_record() garbage in 'ipv6' field on Windows).  (Pierre)</li>
<li><?php bugfix(52082); ?> (character_set_client &amp; character_set_connection reset after mysqli_change_user()). (Andrey)</li>
<li><?php bugfix(52043); ?> (GD doesn't recognize latest libJPEG versions). (php at group dot apple dot com, Pierre) </li>
<li><?php bugfix(52041); ?> (Memory leak when writing on uninitialized variable returned from function). (Dmitry)</li>
<li><?php bugfix(52060); ?> (Memory leak when passing a closure to method_exists()). (Felipe)</li>
<li><?php bugfix(52057); ?> (ReflectionClass fails on Closure class). (Felipe)</li>
<li><?php bugfix(52051); ?> (handling of case sensitivity of old-style constructors changed in 5.3+). (Felipe)</li>
<li><?php bugfix(52037); ?> (Concurrent builds fail in install-programs). (seanius at debian dot org, Kalle)</li>
<li><?php bugfix(52019); ?> (make lcov doesn't support TESTS variable anymore). (Patrick)</li>
<li><?php bugfix(52010); ?> (open_basedir restrictions mismatch on vacuum command). (Ilia)</li>
<li><?php bugfix(52001); ?> (Memory allocation problems after using variable variables). (Dmitry)</li>
<li><?php bugfix(51991); ?> (spl_autoload and *nix support with namespace). (Felipe)</li>
<li><?php bugfix(51943); ?> (AIX: Several files are out of ANSI spec). (Kalle, coreystup at gmail dot com)</li>
<li><?php bugfix(51911); ?> (ReflectionParameter::getDefaultValue() memory leaks with constant array). (Felipe)</li>
<li><?php bugfix(51905); ?> (ReflectionParameter fails if default value is an array with an access to self::). (Felipe)</li>
<li><?php bugfix(51899); ?> (Parse error in parse_ini_file() function when empy value followed by no newline). (Felipe)</li>
<li><?php bugfix(51844); ?> (checkdnsrr does not support types other than MX). (Pierre)</li>
<li><?php bugfix(51827); ?> (Bad warning when register_shutdown_function called with wrong num of parameters). (Felipe)</li>
<li><?php bugfix(51822); ?> (Segfault with strange __destruct() for static class variables). (Dmitry)</li>
<li><?php bugfix(51791); ?> (constant() aborts execution when fail to check undefined constant). (Felipe)</li>
<li><?php bugfix(51732); ?> (Fileinfo __construct or open does not work with NULL). (Pierre)</li>
<li><?php bugfix(51725); ?> (xmlrpc_get_type() returns true on invalid dates). (Mike)</li>
<li><?php bugfix(51723); ?> (Content-length header is limited to 32bit integer with Apache2 on Windows). (Pierre)</li>
<li><?php bugfix(51721); ?> (mark DOMNodeList and DOMNamedNodeMap as Traversable). (David Zuelke)</li>
<li><?php bugfix(51712); ?> (Test mysql_mysqlnd_read_timeout_long must fail on MySQL4). (Andrey)</li>
<li><?php bugfix(51697); ?> (Unsafe operations in free_storage of SPL iterators, causes crash during shutdown). (Etienne)</li>
<li><?php bugfix(51690); ?> (Phar::setStub looks for case-sensitive __HALT_COMPILER()). (Ilia)</li>
<li><?php bugfix(51688); ?> (ini per dir crashes when invalid document root  are given). (Pierre)</li>
<li><?php bugfix(51671); ?> (imagefill does not work correctly for small images). (Pierre)</li>
<li><?php bugfix(51670); ?> (getColumnMeta causes segfault when re-executing query after calling nextRowset). (Pierrick)</li>
<li><?php bugfix(51647); ?> Certificate file without private key (pk in another file) doesn't work. (Andrey)</li>
<li><?php bugfix(51629); ?> (CURLOPT_FOLLOWLOCATION error message is misleading). (Pierre)</li>
<li><?php bugfix(51627); ?> (script path not correctly evaluated). (russell dot tempero at rightnow dot com)</li>
<li><?php bugfix(51624); ?> (Crash when calling mysqli_options()). (Felipe)</li>
<li><?php bugfix(51615); ?> (PHP crash with wrong HTML in SimpleXML). (Felipe)</li>
<li><?php bugfix(51609); ?> (pg_copy_to: Invalid results when using fourth parameter). (Felipe)</li>
<li><?php bugfix(51608); ?> (pg_copy_to: WARNING: nonstandard use of \\ in a string literal). (cbandy at jbandy dot com)</li>
<li><?php bugfix(51607); ?> (pg_copy_from does not allow schema in the tablename argument). (cbandy at jbandy dot com)</li>
<li><?php bugfix(51605); ?> (Mysqli - zombie links). (Andrey)</li>
<li><?php bugfix(51604); ?> (newline in end of header is shown in start of message). (Daniel Egeberg)</li>
<li><?php bugfix(51590); ?> (JSON_ERROR_UTF8 is undefined). (Felipe)</li>
<li><?php bugfix(51583); ?> (Bus error due to wrong alignment in mysqlnd). (Rainer Jung)</li>
<li><?php bugfix(51582); ?> (Don't assume UINT64_C it's ever available). (reidrac at usebox dot net, Pierre)</li>
<li><?php bugfix(51577); ?> (Uninitialized memory reference with oci_bind_array_by_name) (Oracle Corp.)</li>
<li><?php bugfix(51562); ?> (query timeout in mssql can not be changed per query). (ejsmont dot artur at gmail dot com)</li>
<li><?php bugfix(51552); ?> (debug_backtrace() causes segmentation fault and/or memory issues). (Dmitry)</li>
<li><?php bugfix(51445); ?> (var_dump() invalid/slow *RECURSION* detection). (Felipe)</li>
<li><?php bugfix(51435); ?> (Missing ifdefs / logic bug in crypt code cause compile errors). (Felipe)</li>
<li><?php bugfix(51424); ?> (crypt() function hangs after 3rd call). (Pierre, Sriram)</li>
<li><?php bugfix(51394); ?> (Error line reported incorrectly if error handler throws an exception). (Stas)</li>
<li><?php bugfix(51393); ?> (DateTime::createFromFormat() fails if format string contains timezone). (Adam)</li>
<li><?php bugfix(51347); ?> (mysqli_close / connection memory leak). (Andrey, Johannes)</li>
<li><?php bugfix(51338); ?> (URL-Rewriter is still enabled if use_only_cookies is on). (Ilia, j dot jeising at gmail dot com)</li>
<li><?php bugfix(51291); ?> (oci_error doesn't report last error when called two times) (Oracle Corp.)</li>
<li><?php bugfix(51276); ?> (php_load_extension() is missing when HAVE_LIBDL is undefined). (Tony)</li>
<li><?php bugfix(51273); ?> (Faultstring property does not exist when the faultstring is empty) (Ilia, dennis at transip dot nl)</li>
<li><?php bugfix(51269); ?> (zlib.output_compression Overwrites Vary Header). (Adam)</li>
<li><?php bugfix(51257); ?> (CURL_VERSION_LARGEFILE incorrectly used after libcurl version 7.10.1). (aron dot ujvari at microsec dot hu)</li>
<li><?php bugfix(51242); ?> (Empty mysql.default_port does not default to 3306 anymore, but 0). (Adam)</li>
<li><?php bugfix(51237); ?> (milter SAPI crash on startup). (igmar at palsenberg dot com)</li>
<li><?php bugfix(51213); ?> (pdo_mssql is trimming value of the money column). (Ilia,  alexr at oplot dot com)</li>
<li><?php bugfix(51190); ?> (ftp_put() returns false when transfer was successful). (Ilia)</li>
<li><?php bugfix(51183); ?> (ext/date/php_date.c fails to compile with Sun Studio). (Sriram Natarajan)</li>
<li><?php bugfix(51176); ?> (Static calling in non-static method behaves like $this-&gt;). (Felipe)</li>
<li><?php bugfix(51171); ?> (curl_setopt() doesn't output any errors or warnings when an invalid option is provided). (Ilia)</li>
<li><?php bugfix(51128); ?> (imagefill() doesn't work with large images). (Pierre)</li>
<li><?php bugfix(51096); ?> ('last day' and 'first day' are handled incorrectly when parsing date strings). (Derick)</li>
<li><?php bugfix(51086); ?> (DBA DB4 doesn't work with Berkeley DB 4.8). (Chris Jones)</li>
<li><?php bugfix(51062); ?> (DBA DB4 uses mismatched headers and libraries). (Chris Jones)</li>
<li><?php bugfix(51026); ?> (mysqli_ssl_set not working). (Andrey)</li>
<li><?php bugfix(51023); ?> (filter doesn't detect int overflows with GCC 4.4). (Raphael Geissert)</li>
<li><?php bugfix(50999); ?> (unaligned memory access in dba_fetch()). (Felipe)</li>
<li><?php bugfix(50976); ?> (Soap headers Authorization not allowed). (Brain France, Dmitry)</li>
<li><?php bugfix(50828); ?> (DOMNotation is not subclass of DOMNode). (Rob)</li>
<li><?php bugfix(50810); ?> (property_exists does not work for private). (Felipe)</li>
<li><?php bugfix(50762); ?> (in WSDL mode Soap Header handler function only being called if defined in WSDL). (mephius at gmail dot com)</li>
<li><?php bugfix(50731); ?> (Inconsistent namespaces sent to functions registered with spl_autoload_register). (Felipe)</li>
<li><?php bugfix(50563); ?> (removing E_WARNING from parse_url). (ralph at smashlabs dot com, Pierre)</li>
<li><?php bugfix(50578); ?> (incorrect shebang in phar.phar). (Fedora at FamilleCollet dot com)</li>
<li><?php bugfix(50392); ?> (date_create_from_format enforces 6 digits for 'u' format character). (Derick)</li>
<li><?php bugfix(50383); ?> (Exceptions thrown in __call / __callStatic do not include file and line in trace). (Felipe)</li>
<li><?php bugfix(50358); ?> (Compile failure compiling ext/phar/util.lo). (Felipe)</li>
<li><?php bugfix(50101); ?> (name clash between global and local variable). (patch by yoarvi at gmail dot com)</li>
<li><?php bugfix(50055); ?> (DateTime::sub() allows 'relative' time modifications). (Derick)</li>
<li><?php bugfix(51002); ?> (fix possible memory corruption with very long names). (Pierre)</li>
<li><?php bugfix(49893); ?> (Crash while creating an instance of Zend_Mail_Storage_Pop3). (Dmitry)</li>
<li><?php bugfix(49819); ?> (STDOUT losing data with posix_isatty()). (Mike)</li>
<li><?php bugfix(49778); ?> (DateInterval::format("%a") is always zero when an interval is created from an ISO string). (Derick)</li>
<li><?php bugfix(49700); ?> (memory leaks in php_date.c if garbage collector is enabled). (Dmitry)</li>
<li><?php bugfix(49576); ?> (FILTER_VALIDATE_EMAIL filter needs updating) (Rasmus)</li>
<li><?php bugfix(49490); ?> (XPath namespace prefix conflict). (Rob)</li>
<li><?php bugfix(49429); ?> (odbc_autocommit doesn't work). (Felipe)</li>
<li><?php bugfix(49320); ?> (PDO returns null when SQLite connection fails). (Felipe)</li>
<li><?php bugfix(49234); ?> (mysqli_ssl_set not found). (Andrey)</li>
<li><?php bugfix(49216); ?> (Reflection doesn't seem to work properly on MySqli). (Andrey)</li>
<li><?php bugfix(49192); ?> (PHP crashes when GC invoked on COM object). (Stas)</li>
<li><?php bugfix(49081); ?> (DateTime::diff() mistake if start in January and interval &gt; 28 days). (Derick)</li>
<li><?php bugfix(49059); ?> (DateTime::diff() repeats previous sub() operation). (yoarvi@gmail.com, Derick)</li>
<li><?php bugfix(48983); ?> (DomDocument : saveHTMLFile wrong charset). (Rob)</li>
<li><?php bugfix(48930); ?> (__COMPILER_HALT_OFFSET__ incorrect in PHP &gt;= 5.3). (Felipe)</li>
<li><?php bugfix(48902); ?> (Timezone database fallback map is outdated). (Derick)</li>
<li><?php bugfix(48781); ?> (Cyclical garbage collector memory leak). (Dmitry)</li>
<li><?php bugfix(48601); ?> (xpath() returns FALSE for legitimate query). (Rob)</li>
<li><?php bugfix(48361); ?> (SplFileInfo::getPathInfo should return the parent dir). (Etienne)</li>
<li><?php bugfix(48289); ?> (iconv_mime_encode() quoted-printable scheme is broken). (Adam, patch from hiroaki dot kawai at gmail dot com).</li>
<li><?php bugfix(47842); ?> (sscanf() does not support 64-bit values). (Mike)</li>
<li><?php bugfix(46111); ?> (Some timezone identifiers can not be parsed). (Derick)</li>
<li><?php bugfix(45808); ?> (stream_socket_enable_crypto() blocks and eats CPU). (vincent at optilian dot com)</li>
<li><?php bugfix(43233); ?> (sasl support for ldap on Windows). (Pierre)</li>
<li><?php bugfix(35673); ?> (formatOutput does not work with saveHTML). (Rob)</li>
<li><?php bugfix(33210); ?> (getimagesize() fails to detect width/height on certain JPEGs). (Ilia)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.3.2"><!-- {{{ 5.3.2 -->
<h3>Version 5.3.2</h3>
<?php release_date('04-Mar-2010'); ?>
<ul>
<li>Security Fixes
	<ul>
		<li>Improved LCG entropy. (Rasmus, Samy Kamkar)</li>
		<li>Fixed safe_mode validation inside tempnam() when the directory path does not end with a /). (Martin Jansen)</li>
		<li>Fixed a possible open_basedir/safe_mode bypass in the session extension identified by Grzegorz Stachowiak. (Ilia)</li>
	</ul>
</li>


<li>Upgraded bundled sqlite to version 3.6.22. (Ilia)</li>
<li>Upgraded bundled libmagic to version 5.03. (Mikko)</li>
<li>Upgraded bundled PCRE to version 8.00. (Scott)</li>
<li>Updated timezone database to version 2010.3. (Derick)</li>

<li>Improved LCG entropy. (Rasmus, Samy Kamkar)</li>
<li>Improved crypt support for edge cases (UFC compatibility). (Solar Designer, Joey, Pierre)</li>

<li>Changed gmp_strval() to use full range from 2 to 62, and -2 to -36. FR <?php bugl(50283); ?> (David Soria Parra)</li>
<li>Changed "post_max_size" php.ini directive to allow unlimited post size by setting it to 0. (Rasmus)</li>
<li>Changed tidyNode class to disallow manual node creation. (Pierrick)</li>

<li>Removed automatic file descriptor unlocking happening on shutdown and/or  stream close (on all OSes). (Tony, Ilia)</li>

<li>Added libpng 1.4.0 support. (Pierre)</li>
<li>Added support for DISABLE_AUTHENTICATOR for imap_open. (Pierre)</li>
<li>Added missing host validation for HTTP urls inside FILTER_VALIDATE_URL. (Ilia)</li>
<li>Added stream_resolve_include_path(). (Mikko)</li>
<li>Added INTERNALDATE support to imap_append. (nick at mailtrust dot com)</li>
<li>Added support for SHA-256 and SHA-512 to php's crypt. (Pierre)</li>
<li>Added realpath_cache_size() and realpath_cache_get() functions. (Stas)</li>
<li>Added FILTER_FLAG_STRIP_BACKTICK option to the filter extension. (Ilia)</li>
<li>Added protection for $_SESSION from interrupt corruption and improved "session.save_path" check. (Stas)</li>
<li>Added LIBXML_PARSEHUGE constant to override the maximum text size of a single text node when using libxml2.7.3+. (Kalle)</li>
<li>Added ReflectionMethod::setAccessible() for invoking non-public methods through the Reflection API. (Sebastian)</li>
<li>Added Collator::getSortKey for intl extension. (Stas)</li>
<li>Added support for CURLOPT_POSTREDIR. FR <?php bugl(49571); ?>. (Sriram Natarajan)</li>
<li>Added support for CURLOPT_CERTINFO. FR <?php bugl(49253); ?>. (Linus Nielsen Feltzing &lt;linus@haxx.se&gt;)</li>
<li>Added client-side server name indication support in openssl. (Arnaud)</li>

<li>Improved fix for bug <?php bugl(50006); ?> (Segfault caused by uksort()). (Stas)</li>

<li>Fixed mysqlnd hang when queries exactly 16777214 bytes long are sent. (Andrey)</li>
<li>Fixed incorrect decoding of 5-byte BIT sequences in mysqlnd. (Andrey)</li>
<li>Fixed error_log() to be binary safe when using message_type 3. (Jani)</li>
<li>Fixed unnecessary invocation of setitimer when timeouts have been disabled. (Arvind Srinivasan)</li>
<li>Fixed memory leak in extension loading when an error occurs on Windows. (Pierre)</li>
<li>Fixed safe_mode validation inside tempnam() when the directory path does not end with a /). (Martin Jansen)</li>
<li>Fixed a possible open_basedir/safe_mode bypass in session extension identified by Grzegorz Stachowiak. (Ilia)</li>
<li>Fixed possible crash when a error/warning is raised during php startup. (Pierre)</li>
<li>Fixed possible bad behavior of rename on windows when used with symbolic links or invalid paths. (Pierre)</li>
<li>Fixed error output to stderr on Windows. (Pierre)</li>
<li>Fixed memory leaks in is_writable/readable/etc on Windows. (Pierre)</li>
<li>Fixed memory leaks in the ACL function on Windows. (Pierre)</li>
<li>Fixed memory leak in the realpath cache on Windows. (Pierre)</li>
<li>Fixed memory leak in zip_close. (Pierre)</li>
<li>Fixed crypt's blowfish sanity check of the "setting" string, to reject iteration counts encoded as 36 through 39. (Solar Designer, Joey, Pierre)</li>

<li><?php bugfix(51059); ?> (crypt crashes when invalid salt are given). (Pierre)</li>
<li><?php bugfix(50952); ?> (allow underscore _ in constants parsed in php.ini files). (Jani)</li>
<li><?php bugfix(50940); ?> (Custom content-length set incorrectly in Apache SAPIs). (Brian France, Rasmus)</li>
<li><?php bugfix(50930); ?> (Wrong date by php_date.c patch with ancient gcc/glibc versions). (Derick)</li>
<li><?php bugfix(50907); ?> (X-PHP-Originating-Script adding two new lines in *NIX). (Ilia)</li>
<li><?php bugfix(50859); ?> (build fails with openssl 1.0 due to md2 deprecation). (Ilia, hanno at hboeck dot de)</li>
<li><?php bugfix(50847); ?> (strip_tags() removes all tags greater then 1023 bytes long). (Ilia)</li>
<li><?php bugfix(50829); ?> (php.ini directive pdo_mysql.default_socket is ignored). (Ilia)</li>
<li><?php bugfix(50832); ?> (HTTP fopen wrapper does not support passwordless HTTP authentication). (Jani)</li>
<li><?php bugfix(50787); ?> (stream_set_write_buffer() has no effect on socket streams). (vnegrier at optilian dot com, Ilia)</li>
<li><?php bugfix(50761); ?> (system.multiCall crashes in xmlrpc extension). (hiroaki dot kawai at gmail dot com, Ilia)</li>
<li><?php bugfix(50756); ?> (CURLOPT_FTP_SKIP_PASV_IP does not exist). (Sriram)</li>
<li><?php bugfix(50732); ?> (exec() adds single byte twice to $output array). (Ilia)</li>
<li><?php bugfix(50728); ?> (All PDOExceptions hardcode 'code' property to 0). (Joey, Ilia)</li>
<li><?php bugfix(50723); ?> (Bug in garbage collector causes crash). (Dmitry)</li>
<li><?php bugfix(50690); ?> (putenv does not set ENV when the value is only one char). (Pierre)</li>
<li><?php bugfix(50680); ?> (strtotime() does not support eighth ordinal number). (Ilia)</li>
<li><?php bugfix(50661); ?> (DOMDocument::loadXML does not allow UTF-16). (Rob)</li>
<li><?php bugfix(50657); ?> (copy() with an empty (zero-byte) HTTP source succeeds but returns false). (Ilia)</li>
<li><?php bugfix(50632); ?> (filter_input() does not return default value if the variable does not exist). (Ilia)</li>
<li><?php bugfix(50576); ?> (XML_OPTION_SKIP_TAGSTART option has no effect). (Pierrick)</li>
<li><?php bugfix(50558); ?> (Broken object model when extending tidy). (Pierrick)</li>
<li><?php bugfix(50540); ?> (Crash while running ldap_next_reference test cases). (Sriram)</li>
<li><?php bugfix(50519); ?> (segfault in garbage collection when using set_error_handler and DomDocument). (Dmitry)</li>
<li><?php bugfix(50508); ?> (compile failure: Conflicting HEADER type declarations). (Jani)</li>
<li><?php bugfix(50496); ?> (Use of &lt;stdbool.h&gt; is valid only in a c99 compilation environment. (Sriram)</li>
<li><?php bugfix(50464); ?> (declare encoding doesn't work within an included file). (Felipe)</li>
<li><?php bugfix(50458); ?> (PDO::FETCH_FUNC fails with Closures). (Felipe, Pierrick)</li>
<li><?php bugfix(50445); ?> (PDO-ODBC stored procedure call from Solaris 64-bit causes seg fault). (davbrown4 at yahoo dot com, Felipe)</li>
<li><?php bugfix(50416); ?> (PROCEDURE db.myproc can't return a result set in the given context). (Andrey)</li>
<li><?php bugfix(50394); ?> (Reference argument converted to value in __call). (Stas)</li>
<li><?php bugfix(50351); ?> (performance regression handling objects, ten times slowerin 5.3 than in 5.2). (Dmitry)</li>
<li><?php bugfix(50392); ?> (date_create_from_format() enforces 6 digits for 'u' format character). (Ilia)</li>
<li><?php bugfix(50345); ?> (nanosleep not detected properly on some solaris versions). (Jani)</li>
<li><?php bugfix(50340); ?> (php.ini parser does not allow spaces in ini keys). (Jani)</li>
<li><?php bugfix(50334); ?> (crypt ignores sha512 prefix). (Pierre)</li>
<li><?php bugfix(50323); ?> (Allow use of ; in values via ;; in PDO DSN). (Ilia, Pierrick)</li>
<li><?php bugfix(50285); ?> (xmlrpc does not preserve keys in encoded indexed arrays). (Felipe)</li>
<li><?php bugfix(50282); ?> (xmlrpc_encode_request() changes object into array in calling function). (Felipe)</li>
<li><?php bugfix(50267); ?> (get_browser(null) does not use HTTP_USER_AGENT). (Jani)</li>
<li><?php bugfix(50266); ?> (conflicting types for llabs). (Jani)</li>
<li><?php bugfix(50261); ?> (Crash When Calling Parent Constructor with call_user_func()). (Dmitry)</li>
<li><?php bugfix(50255); ?> (isset() and empty() silently casts array to object). (Felipe)</li>
<li><?php bugfix(50240); ?> (pdo_mysql.default_socket in php.ini shouldn't used if it is empty). (foutrelis at gmail dot com, Ilia)</li>
<li><?php bugfix(50231); ?> (Socket path passed using --with-mysql-sock is ignored when mysqlnd is enabled). (Jani)</li>
<li><?php bugfix(50219); ?> (soap call Segmentation fault on a redirected url). (Pierrick)</li>
<li><?php bugfix(50212); ?> (crash by ldap_get_option() with LDAP_OPT_NETWORK_TIMEOUT). (Ilia, shigeru_kitazaki at cybozu dot co dot jp)</li>
<li><?php bugfix(50209); ?> (Compiling with libedit cannot find readline.h). (tcallawa at redhat dot com)</li>
<li><?php bugfix(50207); ?> (segmentation fault when concatenating very large strings on 64bit linux). (Ilia)</li>
<li><?php bugfix(50196); ?> (stream_copy_to_stream() produces warning when source is not file). (Stas)</li>
<li><?php bugfix(50195); ?> (pg_copy_to() fails when table name contains schema. (Ilia)</li>
<li><?php bugfix(50185); ?> (ldap_get_entries() return false instead of an empty array when there is no error). (Jani)</li>
<li><?php bugfix(50174); ?> (Incorrectly matched docComment). (Felipe)</li>
<li><?php bugfix(50168); ?> (FastCGI fails with wrong error on HEAD request to non-existant file). (Dmitry)</li>
<li><?php bugfix(50162); ?> (Memory leak when fetching timestamp column from Oracle database). (Felipe)</li>
<li><?php bugfix(50159); ?> (wrong working directory in symlinked files). (Dmitry)</li>
<li><?php bugfix(50158); ?> (FILTER_VALIDATE_EMAIL fails with valid addresses containing = or ?). (Pierrick)</li>
<li><?php bugfix(50152); ?> (ReflectionClass::hasProperty behaves like isset() not property_exists). (Felipe)</li>
<li><?php bugfix(50146); ?> (property_exists: Closure object cannot have properties). (Felipe)</li>
<li><?php bugfix(50145); ?> (crash while running bug35634.phpt). (Felipe)</li>
<li><?php bugfix(50140); ?> (With default compilation option, php symbols are unresolved for nsapi). (Uwe Schindler)</li>
<li><?php bugfix(50087); ?> (NSAPI performance improvements). (Uwe Schindler)</li>
<li><?php bugfix(50073); ?> (parse_url() incorrect when ? in fragment). (Ilia)</li>
<li><?php bugfix(50023); ?> (pdo_mysql doesn't use PHP_MYSQL_UNIX_SOCK_ADDR). (Ilia)</li>
<li><?php bugfix(50005); ?> (Throwing through Reflection modified Exception object makes segmentation fault). (Felipe)</li>
<li><?php bugfix(49990); ?> (SNMP3 warning message about security level printed twice). (Jani)</li>
<li><?php bugfix(49985); ?> (pdo_pgsql prepare() re-use previous aborted transaction). (ben dot pineau at gmail dot com, Ilia, Matteo)  </li>
<li><?php bugfix(49938); ?> (Phar::isBuffering() returns inverted value). (Greg)</li>
<li><?php bugfix(49936); ?> (crash with ftp stream in php_stream_context_get_option()). (Pierrick)</li>
<li><?php bugfix(49921); ?> (Curl post upload functions changed). (Ilia)</li>
<li><?php bugfix(49866); ?> (Making reference on string offsets crashes PHP). (Dmitry)</li>
<li><?php bugfix(49855); ?> (import_request_variables() always returns NULL). (Ilia, sjoerd at php dot net)</li>
<li><?php bugfix(49851); ?>, <?php bugl(50451); ?> (http wrapper breaks on 1024 char long headers). (Ilia)</li>
<li><?php bugfix(49800); ?> (SimpleXML allow (un)serialize() calls without warning). (Ilia, wmeler at wp-sa dot pl)</li>
<li><?php bugfix(49719); ?> (ReflectionClass::hasProperty returns true for a private property in base class). (Felipe)</li>
<li><?php bugfix(49677); ?> (ini parser crashes with apache2 and using ${something} ini variables). (Jani)</li>
<li><?php bugfix(49660); ?> (libxml 2.7.3+ limits text nodes to 10MB). (Felipe)</li>
<li><?php bugfix(49647); ?> (DOMUserData does not exist). (Rob)</li>
<li><?php bugfix(49600); ?> (imageTTFText text shifted right). (Takeshi Abe)</li>
<li><?php bugfix(49585); ?> (date_format buffer not long enough for >4 digit years). (Derick, Adam)</li>
<li><?php bugfix(49560); ?> (oci8: using LOBs causes slow PHP shutdown). (Oracle Corp.)</li>
<li><?php bugfix(49521); ?> (PDO fetchObject sets values before calling constructor). (Pierrick)</li>
<li><?php bugfix(49472); ?> (Constants defined in Interfaces can be overridden). (Felipe)</li>
<li><?php bugfix(49463); ?> (setAttributeNS fails setting default namespace). (Rob)</li>
<li><?php bugfix(49244); ?> (Floating point NaN cause garbage characters). (Sjoerd)</li>
<li><?php bugfix(49224); ?> (Compile error due to old DNS functions on AIX systems). (Scott)</li>
<li><?php bugfix(49174); ?> (crash when extending PDOStatement and trying to set queryString property). (Felipe)</li>
<li><?php bugfix(48811); ?> (Directives in PATH section do not get applied to subdirectories). (Patch by: ct at swin dot edu dot au)</li>
<li><?php bugfix(48590); ?> (SoapClient does not honor max_redirects). (Sriram)</li>
<li><?php bugfix(48190); ?> (Content-type parameter "boundary" is not case-insensitive in HTTP uploads). (Ilia)</li>
<li><?php bugfix(47848); ?> (importNode doesn't preserve attribute namespaces). (Rob)</li>
<li><?php bugfix(47409); ?> (extract() problem with array containing word "this"). (Ilia, chrisstocktonaz at gmail dot com)</li>
<li><?php bugfix(47281); ?> ($php_errormsg is limited in size of characters) (Oracle Corp.)</li>
<li><?php bugfix(46478); ?> (htmlentities() uses obsolete mapping table for character entity references). (Moriyoshi)</li>
<li><?php bugfix(45599); ?> (strip_tags() truncates rest of string with invalid attribute). (Ilia, hradtke)</li>
<li><?php bugfix(45120); ?> (PDOStatement->execute() returns true then false for same statement). (Pierrick)</li>
<li><?php bugfix(44827); ?> (define() allows :: in constant names). (Ilia)</li>
<li><?php bugfix(44098); ?> (imap_utf8() returns only capital letters). (steffen at dislabs dot de, Pierre)</li>
<li><?php bugfix(34852); ?> (Failure in odbc_exec() using oracle-supplied odbc driver). (tim dot tassonis at trivadis dot com)</li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.3.1"><!-- {{{ 5.3.1 -->
<h3>Version 5.3.1</h3>
<?php release_date('19-Nov-2009'); ?>
<ul>
<li>Security Fixes
	<ul>
		<li>Added "max_file_uploads" INI directive, which can be set to limit the number of file uploads per-request to 20 by default, to prevent possible DOS via temporary file exhaustion. (Ilia)</li>
		<li>Added missing sanity checks around exif processing. (Ilia)</li>
		<li>Fixed a safe_mode bypass in tempnam(). (Rasmus)</li>
		<li>Fixed a open_basedir bypass in posix_mkfifo(). (Rasmus)</li>
		<li><?php bugfix(50063); ?> (safe_mode_include_dir fails). (Johannes, christian at elmerot dot se)</li>
	</ul>
</li>

<li>Added error constant when json_encode() detects an invalid UTF-8 sequence. (Scott)</li>
<li>Added support for ACL on Windows for thread safe SAPI (Apache2 for example) and fix its support on NTS. (Pierre)</li>

<li>Upgraded bundled sqlite to version 3.6.19. (Scott)</li>
<li>Updated timezone database to version 2009.17 (2009q). (Derick)</li>

<li>Fixed crash in com_print_typeinfo when an invalid typelib is given. (Pierre)</li>
<li>Fixed a safe_mode bypass in tempnam() identified by Grzegorz Stachowiak. (Rasmus)</li>
<li>Fixed a open_basedir bypass in posix_mkfifo() identified by Grzegorz  Stachowiak. (Rasmus)</li>
<li>Fixed certificate validation inside php_openssl_apply_verification_policy (Ryan Sleevi, Ilia)</li>
<li>Fixed crash in SQLiteDatabase::ArrayQuery() and SQLiteDatabase::SingleQuery() when calling using Reflection. (Felipe)</li>
<li>Fixed crash when instantiating PDORow and PDOStatement through Reflection. (Felipe)</li>
<li>Fixed sanity check for the color index in imagecolortransparent. (Pierre)</li>
<li>Fixed scandir/readdir when used mounted points on Windows. (Pierre)</li>
<li>Fixed zlib.deflate compress filter to actually accept level parameter. (Jani)</li>
<li>Fixed leak on error in popen/exec (and related functions) on Windows. (Pierre)</li>
<li>Fixed possible bad caching of symlinked directories in the realpath cache on Windows. (Pierre)</li>
<li>Fixed atime and mtime in stat related functions on Windows. (Pierre)</li>
<li>Fixed spl_autoload_unregister/spl_autoload_functions wrt. Closures and Functors. (Christian Seiler)</li>
<li>Fixed open_basedir circumvention for "mail.log" ini directive. (Maksymilian Arciemowicz, Stas)</li>
<li>Fixed signature generation/validation for zip archives in ext/phar. (Greg)</li>
<li>Fixed memory leak in stream_is_local(). (Felipe, Tony)</li>
<li>Fixed BC break in mime_content_type(), removes the content encoding. (Scott) </li>

<li>Changed ini file directives [PATH=](on Win32) and [HOST=](on all) to be case  insensitive (garretts)</li>
<li>Restored shebang line check to CGI sapi (not checked by scanner anymore). (Jani)</li>

<li>Improve symbolic, mounted volume and junctions support for realpath on  Windows. (Pierre)</li>
<li>Improved readlink on Windows, suppress \??\ and use the drive syntax only. (Pierre)</li>
<li>Improved dns_get_record() AAAA support on windows. Always available when IPv6 is support is installed, format is now the same than on unix. (Pierre)</li>
<li>Improved the DNS functions on OSX to use newer APIs, also use Bind 9 API where available on other platforms. (Scott)</li>
<li>Improved shared extension loading on OSX to use the standard Unix dlopen() API. (Scott)</li>
<li><?php bugfix(50063); ?> (safe_mode_include_dir fails). (Johannes, christian at elmerot dot se)</li>
<li><?php bugfix(50052); ?> (Different Hashes on Windows and Linux on wrong Salt size). (Pierre)</li>
<li><?php bugfix(49910); ?> (no support for ././@LongLink for long filenames in phar tar support). (Greg)</li>
<li><?php bugfix(49908); ?> (throwing exception in __autoload crashes when interface is not defined). (Felipe)</li>
<li><?php bugfix(49847); ?> (exec() fails to return data inside 2nd parameter, given output lines &gt;4095 bytes). (Ilia)</li>
<li><?php bugfix(49809); ?> (time_sleep_until() is not available on OpenSolaris). (Jani)</li>
<li><?php bugfix(49757); ?> (long2ip() can return wrong value in a multi-threaded applications). (Ilia, Florian Anderiasch)</li>
<li><?php bugfix(49738); ?> (calling mcrypt after mcrypt_generic_deinit crashes). (Sriram Natarajan)</li>
<li><?php bugfix(49732); ?> (crashes when using fileinfo when timestamp conversion fails). (Pierre)</li>
<li><?php bugfix(49698); ?> (Unexpected change in strnatcasecmp()). (Rasmus)</li>
<li><?php bugfix(49630); ?> (imap_listscan function missing). (Felipe)</li>
<li><?php bugfix(49572); ?> (use of C++ style comments causes build failure). (Sriram Natarajan)</li>
<li><?php bugfix(49531); ?> (CURLOPT_INFILESIZE sometimes causes warning "CURLPROTO_FILE cannot be set"). (Felipe)</li>
<li><?php bugfix(49517); ?> (cURL's CURLOPT_FILE prevents file from being deleted after fclose). (Ilia)</li>
<li><?php bugfix(49470); ?> (FILTER_SANITIZE_EMAIL allows disallowed characters). (Ilia)</li>
<li><?php bugfix(49447); ?> (php engine need to correctly check for socket API  return status on windows). (Sriram Natarajan)</li>
<li><?php bugfix(49391); ?> (ldap.c utilizing deprecated ldap_modify_s). (Ilia)</li>
<li><?php bugfix(49361); ?> (wordwrap() wraps incorrectly on end of line boundaries). (Ilia, code-it at mail dot ru)</li>
<li><?php bugfix(49372); ?> (segfault in php_curl_option_curl). (Pierre)</li>
<li><?php bugfix(49306); ?> (inside pdo_mysql default socket settings are ignored). (Ilia)</li>
<li><?php bugfix(49289); ?> (bcmath module doesn't compile with phpize configure). (Jani)</li>
<li><?php bugfix(49286); ?> (php://input (php_stream_input_read) is broken). (Jani)</li>
<li><?php bugfix(49269); ?> (Ternary operator fails on Iterator object when used inside foreach declaration). (Etienne, Dmitry)</li>
<li><?php bugfix(49236); ?> (Missing PHP_SUBST(PDO_MYSQL_SHARED_LIBADD)). (Jani)</li>
<li><?php bugfix(49223); ?> (Inconsistency using get_defined_constants). (Garrett)</li>
<li><?php bugfix(49193); ?> (gdJpegGetVersionString() inside gd_compact identifies wrong type in declaration). (Ilia)</li>
<li><?php bugfix(49183); ?> (dns_get_record does not return NAPTR records). (Pierre)</li>
<li><?php bugfix(49144); ?> (Import of schema from different host transmits original authentication details). (Dmitry)</li>
<li><?php bugfix(49142); ?> (crash when exception thrown from __tostring()). (David Soria Parra)</li>
<li><?php bugfix(49986); ?> (Missing ICU DLLs on windows package). (Pierre)</li>
<li><?php bugfix(49132); ?> (posix_times returns false without error). (phpbugs at gunnu dot us)</li>
<li><?php bugfix(49125); ?> (Error in dba_exists C code). (jdornan at stanford dot edu)</li>
<li><?php bugfix(49122); ?> (undefined reference to mysqlnd_stmt_next_result on compile with --with-mysqli and MySQL 6.0). (Jani)</li>
<li><?php bugfix(49108); ?> (2nd scan_dir produces segfault). (Felipe)</li>
<li><?php bugfix(49098); ?> (mysqli segfault on error). (Rasmus)</li>
<li><?php bugfix(49095); ?> (proc_get_status['exitcode'] fails on win32). (Felipe)</li>
<li><?php bugfix(49092); ?> (ReflectionFunction fails to work with functions in fully qualified namespaces). (Kalle, Jani)</li>
<li><?php bugfix(49074); ?> (private class static fields can be modified by using reflection). (Jani)</li>
<li><?php bugfix(49072); ?> (feof never returns true for damaged file in zip). (Pierre)</li>
<li><?php bugfix(49065); ?> ("disable_functions" php.ini option does not work on  Zend extensions). (Stas)</li>
<li><?php bugfix(49064); ?> (--enable-session=shared does not work: undefined symbol: php_url_scanner_reset_vars). (Jani)</li>
<li><?php bugfix(49056); ?> (parse_ini_file() regression in 5.3.0 when using non-ASCII strings as option keys). (Jani)</li>
<li><?php bugfix(49052); ?> (context option headers freed too early when using --with-curlwrappers). (Jani)</li>
<li><?php bugfix(49047); ?> (The function touch() fails on directories on Windows). (Pierre)</li>
<li><?php bugfix(49032); ?> (SplFileObject::fscanf() variables passed by reference). (Jani)</li>
<li><?php bugfix(49027); ?> (mysqli_options() doesn't work when using mysqlnd). (Andrey)</li>
<li><?php bugfix(49026); ?> (proc_open() can bypass safe_mode_protected_env_vars restrictions). (Ilia)</li>
<li><?php bugfix(49012); ?> (phar tar signature algorithm reports as Unknown (0) in getSignature() call). (Greg)</li>
<li><?php bugfix(49020); ?> (phar misinterprets ustar long filename standard). (Greg)</li>
<li><?php bugfix(49018); ?> (phar tar stores long filenames wit prefix/name reversed). (Greg)</li>
<li><?php bugfix(49014); ?> (dechunked filter broken when serving more than 8192 bytes in a chunk). (andreas dot streichardt at globalpark dot com, Ilia)</li>
<li><?php bugfix(49000); ?> (PHP CLI in Interactive mode (php -a) crashes  when including files from function). (Stas)</li>
<li><?php bugfix(48994); ?> (zlib.output_compression does not output HTTP headers when set to a string value). (Jani)</li>
<li><?php bugfix(48980); ?> (Crash when compiling with pdo_firebird). (Felipe)</li>
<li><?php bugfix(48962); ?> (cURL does not upload files with specified filename). (Ilia)</li>
<li><?php bugfix(48929); ?> (Double \r\n after HTTP headers when "header" context option is an array). (David Zülke)</li>
<li><?php bugfix(48913); ?> (Too long error code strings in pdo_odbc driver). (naf at altlinux dot ru, Felipe)</li>
<li><?php bugfix(48912); ?> (Namespace causes unexpected strict behaviour with extract()). (Dmitry)</li>
<li><?php bugfix(48909); ?> (Segmentation fault in mysqli_stmt_execute()). (Andrey)</li>
<li><?php bugfix(48899); ?> (is_callable returns true even if method does not exist in parent class). (Felipe)</li>
<li><?php bugfix(48893); ?> (Problems compiling with Curl). (Felipe)</li>
<li><?php bugfix(48872); ?> (string.c: errors: duplicate case values). (Kalle)</li>
<li><?php bugfix(48854); ?> (array_merge_recursive modifies arrays after first one). (Felipe)</li>
<li><?php bugfix(48805); ?> (IPv6 socket transport is not working). (Ilia)</li>
<li><?php bugfix(48802); ?> (printf() returns incorrect outputted length). (Jani)</li>
<li><?php bugfix(48880); ?> (Random Appearing open_basedir problem). (Rasmus, Gwynne)</li>
<li><?php bugfix(48791); ?> (open office files always reported as corrupted). (Greg)</li>
<li><?php bugfix(48788); ?> (RecursiveDirectoryIterator doesn't descend into symlinked directories). (Ilia)</li>
<li><?php bugfix(48783); ?> (make install will fail saying phar file exists). (Greg)</li>
<li><?php bugfix(48774); ?> (SIGSEGVs when using curl_copy_handle()). (Sriram Natarajan)</li>
<li><?php bugfix(48771); ?> (rename() between volumes fails and reports no error on  Windows). (Pierre)</li>
<li><?php bugfix(48768); ?> (parse_ini_*() crash with INI_SCANNER_RAW). (Jani)</li>
<li><?php bugfix(48763); ?> (ZipArchive produces corrupt archive). (dani dot church at  gmail dot com, Pierre)</li>
<li><?php bugfix(48762); ?> (IPv6 address filter still rejects valid address). (Felipe)</li>
<li><?php bugfix(48757); ?> (ReflectionFunction::invoke() parameter issues). (Kalle)</li>
<li><?php bugfix(48754); ?> (mysql_close() crash php when no handle specified). (Johannes, Andrey)</li>
<li><?php bugfix(48752); ?> (Crash during date parsing with invalid date). (Pierre)</li>
<li><?php bugfix(48746); ?> (Unable to browse directories within Junction Points). (Pierre, Kanwaljeet Singla)</li>
<li><?php bugfix(48745); ?> (mysqlnd: mysql_num_fields returns wrong column count for mysql_list_fields). (Andrey)</li>
<li><?php bugfix(48740); ?> (PHAR install fails when INSTALL_ROOT is not the final install location). (james dot cohen at digitalwindow dot com, Greg)</li>
<li><?php bugfix(48733); ?> (CURLOPT_WRITEHEADER|CURLOPT_FILE|CURLOPT_STDERR warns on files that have been opened with r+). (Ilia)</li>
<li><?php bugfix(48719); ?> (parse_ini_*(): scanner_mode parameter is not checked for sanity). (Jani)</li>
<li><?php bugfix(48718); ?> (FILTER_VALIDATE_EMAIL does not allow numbers in domain   components). (Ilia)</li>
<li><?php bugfix(48681); ?> (openssl signature verification for tar archives broken). (Greg)</li>
<li><?php bugfix(48660); ?> (parse_ini_*(): dollar sign as last character of value fails). (Jani)</li>
<li><?php bugfix(48645); ?> (mb_convert_encoding() doesn't understand hexadecimal html-entities). (Moriyoshi)</li>
<li><?php bugfix(48637); ?> ("file" fopen wrapper is overwritten when using --with-curlwrappers). (Jani)</li>
<li><?php bugfix(48608); ?> (Invalid libreadline version not detected during configure). (Jani)</li>
<li><?php bugfix(48400); ?> (imap crashes when closing stream opened with OP_PROTOTYPE flag). (Jani)</li>
<li><?php bugfix(48377); ?> (error message unclear on converting phar with existing file). (Greg)</li>
<li><?php bugfix(48247); ?> (Infinite loop and possible crash during startup with errors when errors are logged). (Jani)</li>
<li><?php bugfix(48198); ?> error: 'MYSQLND_LLU_SPEC' undeclared. Cause for <?php bugl(48780); ?> and <?php bugl(46952); ?> - both fixed too. (Andrey)</li>
<li><?php bugfix(48189); ?> (ibase_execute error in return param). (Kalle)</li>
<li><?php bugfix(48182); ?> (ssl handshake fails during asynchronous socket connection). (Sriram Natarajan)</li>
<li><?php bugfix(48116); ?> (Fixed build with Openssl 1.0). (Pierre,  Al dot Smith at aeschi dot ch dot eu dot org)</li>
<li><?php bugfix(48057); ?> (Only the date fields of the first row are fetched, others are empty). (info at programmiernutte dot net)</li>
<li><?php bugfix(47481); ?> (natcasesort() does not sort extended ASCII characters correctly). (Herman Radtke)</li>
<li><?php bugfix(47351); ?> (Memory leak in DateTime). (Derick, Tobias John)</li>
<li><?php bugfix(47273); ?> (Encoding bug in SoapServer-&gt;fault). (Dmitry)</li>
<li><?php bugfix(46682); ?> (touch() afield returns different values on windows). (Pierre)</li>
<li><?php bugfix(46614); ?> (Extended MySQLi class gives incorrect empty() result). (Andrey)</li>
<li><?php bugfix(46020); ?> (with Sun Java System Web Server 7.0 on HPUX, #define HPUX). (Uwe Schindler)</li>
<li><?php bugfix(45905); ?> (imagefilledrectangle() clipping error). (markril at hotmail dot com, Pierre)</li>
<li><?php bugfix(45554); ?> (Inconsistent behavior of the u format char). (Derick)</li>
<li><?php bugfix(45141); ?> (setcookie will output expires years of &gt;4 digits). (Ilia)</li>
<li><?php bugfix(44683); ?> (popen crashes when an invalid mode is passed). (Pierre)</li>
<li><?php bugfix(43510); ?> (stream_get_meta_data() does not return same mode as used in fopen). (Jani)</li>
<li><?php bugfix(42434); ?> (ImageLine w/ antialias = 1px shorter). (wojjie at gmail dot com, Kalle)</li>
<li><?php bugfix(40013); ?> (php_uname() does not return nodename on Netware (Guenter Knauf)</li>
<li><?php bugfix(38091); ?> (Mail() does not use FQDN when sending SMTP helo). (Kalle, Rick Yorgason)</li>
<li><?php bugfix(28038); ?> (Sent incorrect RCPT TO commands to SMTP server) (Garrett)</li>
<li><?php bugfix(27051); ?> (Impersonation with FastCGI does not exec process as impersonated user). (Pierre)</li>
<li><?php peclbugfix(16842) ?> (oci_error return false when NO_DATA_FOUND is raised). (Chris Jones)</li>

</ul>
<!-- }}} --></section>

<section class="version" id="5.3.0"><!-- {{{ 5.3.0 -->
<h3>Version 5.3.0</h3>
<?php release_date('30-Jun-2009'); ?>
<ul>

	<li>Upgraded bundled PCRE to version 7.9. (Nuno)</li>
	<li>Upgraded bundled sqlite to version 3.6.15. (Scott)</li>

	<li>Moved extensions to PECL (Derick, Lukas, Pierre, Scott):
	<ul>
		<li>ext/dbase</li>
		<li>ext/fbsql</li>
		<li>ext/fdf</li>
		<li>ext/ncurses</li>
		<li>ext/mhash (BC layer is now entirely within ext/hash)</li>
		<li>ext/ming</li>
		<li>ext/msql</li>
		<li>ext/sybase (not maintained anymore, sybase_ct has to be used instead)</li>
	</ul>
	</li>

	<li>Removed the experimental RPL (master/slave) functions from mysqli. (Andrey)</li>
	<li>Removed zend.ze1_compatibility_mode. (Dmitry)</li>
	<li>Removed all zend_extension_* php.ini directives. Zend extensions are now
  always loaded using zend_extension directive. (Derick)</li>
	<li>Removed special treatment of "/tmp" in sessions for open_basedir.
  Note: This undocumented behaviour was introduced in 5.2.2. (Alexey)</li>
	<li>Removed shebang line check from CGI sapi (checked by scanner). (Dmitry)</li>

	<li>Changed PCRE, Reflection and SPL extensions to be always enabled. (Marcus)</li>
	<li>Changed md5() to use improved implementation. (Solar Designer, Dmitry)</li>
	<li>Changed HTTP stream wrapper to accept any code between and including
  200 to 399 as successful. (Mike, Noah Fontes)</li>
	<li>Changed __call() to be invoked on private/protected method access, similar to
  properties and __get(). (Andrei)</li>
	<li>Changed dl() to be disabled by default. Enabled only when explicitly
  registered by the SAPI. Currently enabled with cli, cgi and embed SAPIs.
  (Dmitry)</li>
	<li>Changed opendir(), dir() and scandir() to use default context when no context
  argument is passed. (Sara)</li>
	<li>Changed open_basedir to allow tightening in runtime contexts. (Sara)</li>
	<li>Changed PHP/Zend extensions to use flexible build IDs. (Stas)</li>
	<li>Changed error level E_ERROR into E_WARNING in Soap extension methods
  parameter validation. (Felipe)</li>
	<li>Changed openssl info to show the shared library version number. (Scott)</li>
	<li>Changed floating point behaviour to consistently use double precision on all
  platforms and with all compilers. (Christian Seiler)</li>
	<li>Changed round() to act more intuitively when rounding to a certain precision
  and round very large and very small exponents correctly. (Christian Seiler)</li>
	<li>Changed session_start() to return false when session startup fails. (Jani)</li>
	<li>Changed property_exists() to check the existence of a property independent of
  accessibility (like method_exists()). (Felipe)</li>
	<li>Changed array_reduce() to allow mixed $initial (Christian Seiler)</li>

	<li>Improved PHP syntax and semantics:
	<ul>
		<li>Added lambda functions and closures. (Christian Seiler, Dmitry)</li>
		<li>Added "jump label" operator (limited "goto"). (Dmitry, Sara)</li>
		<li>Added NOWDOC syntax. (Gwynne Raskind, Stas, Dmitry)</li>
		<li>Added HEREDOC syntax with double quotes. (Lars Strojny, Felipe)</li>
		<li>Added support for using static HEREDOCs to initialize static variables and
    class members or constants. (Matt)</li>
		<li>Improved syntax highlighting and consistency for variables in double-quoted
    strings and literal text in HEREDOCs and backticks. (Matt)</li>
		<li>Added "?:" operator. (Marcus)</li>
		<li>Added support for namespaces. (Dmitry, Stas, Gregory, Marcus)</li>
		<li>Added support for Late Static Binding. (Dmitry, Etienne Kneuss)</li>
		<li>Added support for __callStatic() magic method. (Sara)</li>
		<li>Added forward_static_call(_array) to complete LSB. (Mike Lively)</li>
		<li>Added support for dynamic access of static members using $foo::myFunc().
    (Etienne Kneuss)</li>
		<li>Improved checks for callbacks. (Marcus)</li>
		<li>Added __DIR__ constant. (Lars Strojny)</li>
		<li>Added new error modes E_USER_DEPRECATED and E_DEPRECATED.
    E_DEPRECATED is used to inform about stuff being scheduled for removal
    in future PHP versions. (Lars Strojny, Felipe, Marcus)</li>
		<li>Added "request_order" INI variable to control specifically $_REQUEST
    behavior. (Stas)</li>
		<li>Added support for exception linking. (Marcus)</li>
		<li>Added ability to handle exceptions in destructors. (Marcus)</li>
	</ul>
	</li>

	<li>Improved PHP runtime speed and memory usage:
	<ul>
		<li>Substitute global-scope, persistent constants with their values at compile
    time. (Matt)</li>
		<li>Optimized ZEND_SIGNED_MULTIPLY_LONG(). (Matt)</li>
		<li>Removed direct executor recursion. (Dmitry)</li>
		<li>Use fastcall calling convention in executor on x86. (Dmitry)</li>
		<li>Use IS_CV for direct access to $this variable. (Dmitry)</li>
		<li>Use ZEND_FREE() opcode instead of ZEND_SWITCH_FREE(IS_TMP_VAR). (Dmitry)</li>
		<li>Lazy EG(active_symbol_table) initialization. (Dmitry)</li>
		<li>Optimized ZEND_RETURN opcode to not allocate and copy return value if it is
    not used. (Dmitry)</li>
		<li>Replaced all flex based scanners with re2c based scanners.
    (Marcus, Nuno, Scott)</li>
		<li>Added garbage collector. (David Wang, Dmitry).</li>
		<li>Improved PHP binary size and startup speed with GCC4 visibility control.
    (Nuno)</li>
		<li>Improved engine stack implementation for better performance and stability.
    (Dmitry)</li>
		<li>Improved memory usage by moving constants to read only memory.
    (Dmitry, Pierre)</li>
		<li>Changed exception handling. Now each op_array doesn't contain
    ZEND_HANDLE_EXCEPTION opcode in the end. (Dmitry)</li>
		<li>Optimized require_once() and include_once() by eliminating fopen(3) on
    second usage. (Dmitry)</li>
		<li>Optimized ZEND_FETCH_CLASS + ZEND_ADD_INTERFACE into single
    ZEND_ADD_INTERFACE opcode. (Dmitry)</li>
		<li>Optimized string searching for a single character.
    (Michal Dziemianko, Scott)</li>
		<li>Optimized interpolated strings to use one less opcode. (Matt)</li>
	</ul>
	</li>

	<li>Improved php.ini handling: (Jani)
	<ul>
		<li>Added ".htaccess" style user-defined php.ini files support for CGI/FastCGI.</li>
		<li>Added support for special [PATH=/opt/httpd/www.example.com/] and
    [HOST=www.example.com] sections. Directives set in these sections can
    not be overridden by user-defined ini-files or during runtime.</li>
		<li>Added better error reporting for php.ini syntax errors.</li>
		<li>Allowed using full path to load modules using "extension" directive.</li>
		<li>Allowed "ini-variables" to be used almost everywhere ini php.ini files.</li>
		<li>Allowed using alphanumeric/variable indexes in "array" ini options.</li>
		<li>Added 3rd optional parameter to parse_ini_file() to specify the scanning
    mode of INI_SCANNER_NORMAL or INI_SCANNER_RAW. In raw mode option values
    and section values are treated as-is.</li>
		<li>Fixed get_cfg_var() to be able to return "array" ini options.</li>
		<li>Added optional parameter to ini_get_all() to only retrieve the current
    value. (Hannes)</li>
	</ul>
	</li>

	<li>Improved Windows support:
	<ul>
		<li>Update all libraries to their latest stable version. (Pierre, Rob, Liz,
    Garrett).</li>
		<li>Added Windows support for stat(), touch(), filemtime(), filesize() and
    related functions. (Pierre)</li>
		<li>Re-added socket_create_pair() for Windows in sockets extension. (Kalle)</li>
		<li>Added inet_pton() and inet_ntop() also for Windows platforms.
    (Kalle, Pierre)</li>
		<li>Added mcrypt_create_iv() for Windows platforms. (Pierre)</li>
		<li>Added ACL Cache support on Windows.
    (Kanwaljeet Singla, Pierre, Venkat Raman Don)</li>
		<li>Added constants based on Windows' GetVersionEx information.
    PHP_WINDOWS_VERSION_* and PHP_WINDOWS_NT_*. (Pierre)</li>
		<li>Added support for ACL (is_writable, is_readable, reports now correct
    results) on Windows. (Pierre, Venkat Raman Don, Kanwaljeet Singla)</li>
		<li>Added support for fnmatch() on Windows. (Pierre)</li>
		<li>Added support for time_nanosleep() and time_sleep_until() on Windows.
    (Pierre)</li>
		<li>Added support for symlink(), readlink(), linkinfo() and link() on Windows.
    They are available only when the running platform supports them. (Pierre)</li>
		<li>the GMP extension now relies on MPIR instead of the GMP library. (Pierre)</li>
		<li>Added Windows support for stream_socket_pair(). (Kalle)</li>
		<li>Drop all external dependencies for the core features. (Pierre)</li>
		<li>Drastically improve the build procedure (Pierre, Kalle, Rob):
		<ul>
			<li>VC9 (Visual C++ 2008) or later support</li>
			<li>Initial experimental x64 support</li>
		</ul>
		</li>
		<li>MSI installer now supports all recent Windows versions, including
    Windows 7. (John, Kanwaljeet Singla)</li>
	</ul>
	</li>

	<li>Improved and cleaned CGI code:
	<ul>
		<li>FastCGI is now always enabled and cannot be disabled.
    See sapi/cgi/CHANGES for more details. (Dmitry)</li>
		<li>Added CGI SAPI -T option which can be used to measure execution
    time of script repeated several times. (Dmitry)</li>
	</ul>
	</li>

	<li>Improved streams:
	<ul>
		<li>Fixed confusing error message on failure when no errors are logged. (Greg)</li>
		<li>Added stream_supports_lock() function. (Benjamin Schulz)</li>
		<li>Added context parameter for copy() function. (Sara)</li>
		<li>Added "glob://" stream wrapper. (Marcus)</li>
		<li>Added "params" as optional parameter for stream_context_create(). (Sara)</li>
		<li>Added ability to use stream wrappers in include_path. (Gregory, Dmitry)</li>
	</ul>
	</li>

	<li>Improved DNS API
	<ul>
		<li>Added Windows support for dns_check_record(), dns_get_mx(), checkdnsrr() and
    getmxrr(). (Pierre)</li>
		<li>Added support for old style DNS functions (supports OSX and FBSD). (Scott)</li>
		<li>Added a new "entries" array in dns_check_record() containing the TXT
    elements. (Felipe, Pierre)</li>
	</ul>
	</li>

	<li>Improved hash extension:
	<ul>
		<li>Changed mhash to be a wrapper layer around the hash extension. (Scott)</li>
		<li>Added hash_copy() function. (Tony)</li>
		<li>Added sha224 hash algorithm to the hash extension. (Scott)</li>
	</ul>
	</li>

	<li>Improved IMAP support (Pierre):
	<ul>
		<li>Added imap_gc() to clear the imap cache</li>
		<li>Added imap_utf8_to_mutf7() and imap_mutf7_to_utf8()</li>
	</ul>
	</li>

	<li>Improved mbstring extension:
	<ul>
		<li>Added "mbstring.http_output_conv_mimetypes" INI directive that allows
    common non-text types such as "application/xhtml+xml" to be converted
    by mb_output_handler(). (Moriyoshi)</li>
	</ul>
	</li>

	<li>Improved OCI8 extension (Chris Jones/Oracle Corp.):
	<ul>
		<li>Added Database Resident Connection Pooling (DRCP) and Fast
    Application Notification (FAN) support.</li>
		<li>Added support for Oracle External Authentication (not supported
    on Windows).</li>
		<li>Improve persistent connection handling of restarted DBs.</li>
		<li>Added SQLT_AFC (aka CHAR datatype) support to oci_bind_by_name.</li>
		<li><?php bugfix(45458); ?> (Numeric keys for associative arrays are not
    handled properly)</li>
		<li><?php bugfix(41069); ?> (Segmentation fault with query over DB link).</li>
		<li>Fixed define of SQLT_BDOUBLE and SQLT_BFLOAT constants with Oracle
    10g ORACLE_HOME builds.</li>
		<li>Changed default value of oci8.default_prefetch from 10 to 100.</li>
		<li><?php peclbugfix(16035); ?> (OCI8: oci_connect without ORACLE_HOME defined causes
    segfault) (Chris Jones/Oracle Corp.)</li>
		<li><?php peclbugfix(15988); ?> (OCI8: sqlnet.ora isn't read with older Oracle
    libraries) (Chris Jones/Oracle Corp.)</li>
		<li><?php peclbugfix(14268); ?> (Allow "pecl install oci8" command to "autodetect" an
    Instant Client RPM install) (Chris Jones/Oracle Corp.)</li>
		<li><?php peclbugfix(12431); ?> (OCI8 ping functionality is broken).</li>
		<li>Allow building (e.g from PECL) the PHP 5.3-based OCI8 code with
    PHP 4.3.9 onwards.</li>
		<li>Provide separate extensions for Oracle 11g and 10g on Windows.
    (Pierre, Chris)</li>
	</ul>
	</li>

	<li>Improved OpenSSL extension:
	<ul>
		<li>Added support for OpenSSL digest and cipher functions. (Dmitry)</li>
		<li>Added access to internal values of DSA, RSA and DH keys. (Dmitry)</li>
		<li>Fixed a memory leak on openssl_decrypt(). (Henrique)</li>
		<li>Fixed segfault caused by openssl_pkey_new(). (Henrique)</li>
		<li>Fixed bug caused by uninitilized variables in openssl_pkcs7_encrypt() and
    openssl_pkcs7_sign(). (Henrique)</li>
		<li>Fixed error message in openssl_seal(). (Henrique)</li>
	</ul>
	</li>

	<li>Improved pcntl extension: (Arnaud)
	<ul>
		<li>Added pcntl_signal_dispatch().</li>
		<li>Added pcntl_sigprocmask().</li>
		<li>Added pcntl_sigwaitinfo().</li>
		<li>Added pcntl_sigtimedwait().</li>
	</ul>
	</li>

	<li>Improved SOAP extension:
	<ul>
		<li>Added support for element names in context of XMLSchema's &lt;any>. (Dmitry)</li>
		<li>Added ability to use Traversable objects instead of plain arrays.
    (Joshua Reese, Dmitry)</li>
		<li>Fixed possible crash bug caused by an uninitialized value. (Zdash Urf)</li>
	</ul>
	</li>

	<li>Improved SPL extension:
	<ul>
		<li>Added SPL to list of standard extensions that cannot be disabled. (Marcus)</li>
		<li>Added ability to store associative information with objects in
    SplObjectStorage. (Marcus)</li>
		<li>Added ArrayAccess support to SplObjectStorage. (Marcus)</li>
		<li>Added SplDoublyLinkedList, SplStack, SplQueue classes. (Etienne)</li>
		<li>Added FilesystemIterator. (Marcus)</li>
		<li>Added GlobIterator. (Marcus)</li>
		<li>Added SplHeap, SplMinHeap, SplMaxHeap, SplPriorityQueue classes. (Etienne)</li>
		<li>Added new parameter $prepend to spl_autoload_register(). (Etienne)</li>
		<li>Added SplFixedArray. (Etienne, Tony)</li>
		<li>Added delaying exceptions in SPL's autoload mechanism. (Marcus)</li>
		<li>Added RecursiveTreeIterator. (Arnaud, Marcus)</li>
		<li>Added MultipleIterator. (Arnaud, Marcus, Johannes)</li>
	</ul>
	</li>

	<li>Improved Zend Engine:
	<ul>
		<li>Added "compact" handler for Zend MM storage. (Dmitry)</li>
		<li>Added "+" and "*" specifiers to zend_parse_parameters(). (Andrei)</li>
		<li>Added concept of "delayed early binding" that allows opcode caches to
    perform class declaration (early and/or run-time binding) in exactly
    the same order as vanilla PHP. (Dmitry)</li>
	</ul>
	</li>

	<li>Improved crypt() function: (Pierre)
	<ul>
		<li>Added Blowfish and extended DES support. (Using Blowfish implementation
    from Solar Designer).</li>
		<li>Made crypt features portable by providing our own implementations
    for crypt_r and the algorithms which are used when OS does not provide
    them. PHP implementations are always used for Windows builds.</li>
	</ul>
	</li>

	<li>Deprecated session_register(), session_unregister() and
  session_is_registered(). (Hannes)</li>
	<li>Deprecated define_syslog_variables(). (Kalle)</li>
	<li>Deprecated ereg extension. (Felipe)</li>

	<li>Added new extensions:
	<ul>
		<li>Added Enchant extension as a way to access spell checkers. (Pierre)</li>
		<li>Added fileinfo extension as replacement for mime_magic extension. (Derick)</li>
		<li>Added intl extension for Internationalization. (Ed B., Vladimir I.,
    Dmitry L., Stanislav M., Vadim S., Kirti V.)</li>
		<li>Added mysqlnd extension as replacement for libmysql for ext/mysql, mysqli
    and PDO_mysql. (Andrey, Johannes, Ulf)</li>
		<li>Added phar extension for handling PHP Archives. (Greg, Marcus, Steph)</li>
		<li>Added SQLite3 extension. (Scott)</li>
	</ul>
	</li>

	<li>Added new date/time functionality: (Derick)
	<ul>
		<li>date_parse_from_format(): Parse date/time strings according to a format.</li>
		<li>date_create_from_format()/DateTime::createFromFormat(): Create a date/time
    object by parsing a date/time string according to a given format.</li>
		<li>date_get_last_errors()/DateTime::getLastErrors(): Return a list of warnings
    and errors that were found while parsing a date/time string through:
		<ul>
			<li>strtotime() / new DateTime</li>
			<li>date_create_from_format() / DateTime::createFromFormat()</li>
			<li>date_parse_from_format().</li>
		</ul>
		</li>
		<li>support for abbreviation and offset based timezone specifiers for
    the 'e' format specifier, DateTime::__construct(), DateTime::getTimeZone()
    and DateTimeZone::getName().</li>
		<li>support for selectively listing timezone identifiers by continent or
    country code through timezone_identifiers_list() / DateTimezone::listIdentifiers().</li>
		<li>timezone_location_get() / DateTimezone::getLocation() for retrieving
    location information from timezones.</li>
		<li>date_timestamp_set() / DateTime::setTimestamp() to set a Unix timestamp
    without invoking the date parser. (Scott, Derick)</li>
		<li>date_timestamp_get() / DateTime::getTimestamp() to retrieve the Unix
    timestamp belonging to a date object.</li>
		<li>two optional parameters to timezone_transitions_get() /
    DateTimeZone::getTranstions() to limit the range of transitions being
    returned.</li>
		<li>support for "first/last day of &lt;month&gt;" style texts.</li>
		<li>support for date/time strings returned by MS SQL.</li>
		<li>support for serialization and unserialization of DateTime objects.</li>
		<li>support for diffing date/times through date_diff() / DateTime::diff().</li>
		<li>support for adding/subtracting weekdays with strtotime() and
    DateTime::modify().</li>
		<li>DateInterval class to represent the difference between two date/times.</li>
		<li>support for parsing ISO intervals for use with DateInterval.</li>
		<li>date_add() / DateTime::add(), date_sub() / DateTime::sub() for applying an
    interval to an existing date/time.</li>
		<li>proper support for "this week", "previous week"/"last week" and "next week"
    phrases so that they actually mean the week and not a seven day period
    around the current day.</li>
		<li>support for "&lt;xth&gt; &lt;weekday&gt; of" and "last &lt;weekday&gt; of" phrases to be used
    with months - like in "last saturday of februari 2008".</li>
		<li>support for "back of &lt;hour&gt;" and "front of &lt;hour&gt;" phrases that are used in
    Scotland.</li>
		<li>DatePeriod class which supports iterating over a DateTime object applying
    DateInterval on each iteration, up to an end date or limited by maximum
    number of occurences.</li>
	</ul>
	</li>

	<li>Added compatibility mode in GD, imagerotate, image(filled)ellipse
  imagefilter, imageconvolution and imagecolormatch are now always enabled.
  (Pierre)</li>
	<li>Added array_replace() and array_replace_recursive() functions. (Matt)</li>
	<li>Added ReflectionProperty::setAccessible() method that allows non-public
  property's values to be read through ::getValue() and set through
  ::setValue(). (Derick, Sebastian)</li>
	<li>Added msg_queue_exists() function to sysvmsg extension. (Benjamin Schulz)</li>
	<li>Added Firebird specific attributes that can be set via PDO::setAttribute()
  to control formatting of date/timestamp columns: PDO::FB_ATTR_DATE_FORMAT,
  PDO::FB_ATTR_TIME_FORMAT and PDO::FB_ATTR_TIMESTAMP_FORMAT. (Lars W)</li>
	<li>Added gmp_testbit() function. (Stas)</li>
	<li>Added icon format support to getimagesize(). (Scott)</li>
	<li>Added LDAP_OPT_NETWORK_TIMEOUT option for ldap_set_option() to allow
  setting network timeout (FR <?php bugl(42837); ?>). (Jani)</li>
	<li>Added optional escape character parameter to fgetcsv(). (David Soria Parra)</li>
	<li>Added an optional parameter to strstr() and stristr() for retrieval of either
  the part of haystack before or after first occurrence of needle.
  (Johannes, Felipe)</li>
	<li>Added xsl->setProfiling() for profiling stylesheets. (Christian)</li>
	<li>Added long-option feature to getopt() and made getopt() available also on
  win32 systems by adding a common getopt implementation into core.
  (David Soria Parra, Jani)</li>
	<li>Added support for optional values, and = as separator, in getopt(). (Hannes)</li>
	<li>Added lcfirst() function. (David C)</li>
	<li>Added PREG_BAD_UTF8_OFFSET_ERROR constant. (Nuno)</li>
	<li>Added native support for asinh(), acosh(), atanh(), log1p() and expm1().
  (Kalle)</li>
	<li>Added LIBXML_LOADED_VERSION constant (libxml2 version currently used). (Rob)</li>
	<li>Added JSON_FORCE_OBJECT flag to json_encode(). (Scott, Richard Quadling)</li>
	<li>Added timezone_version_get() to retrieve the version of the used timezone
  database. (Derick)</li>
	<li>Added 'n' flag to fopen to allow passing O_NONBLOCK to the underlying
  open(2) system call. (Mikko)</li>
	<li>Added "dechunk" filter which can decode HTTP responses with chunked
  transfer-encoding. HTTP streams use this filter automatically in case
  "Transfer-Encoding: chunked" header is present in response. It's possible to
  disable this behaviour using "http"=>array("auto_decode"=>0) in stream
  context. (Dmitry)</li>
	<li>Added support for CP850 encoding in mbstring extension.
  (Denis Giffeler, Moriyoshi)</li>
	<li>Added stream_cast() and stream_set_options() to user-space stream wrappers,
  allowing stream_select(), stream_set_blocking(), stream_set_timeout() and
  stream_set_write_buffer() to work with user-space stream wrappers. (Arnaud)</li>
	<li>Added header_remove() function. (chsc at peytz dot dk, Arnaud)</li>
	<li>Added stream_context_get_params() function. (Arnaud)</li>
	<li>Added optional parameter "new" to sybase_connect(). (Timm)</li>
	<li>Added parse_ini_string() function. (grange at lemonde dot fr, Arnaud)</li>
	<li>Added str_getcsv() function. (Sara)</li>
	<li>Added openssl_random_pseudo_bytes() function. (Scott)</li>
	<li>Added ability to send user defined HTTP headers with SOAP request.
  (Brian J.France, Dmitry)</li>
	<li>Added concatenation option to bz2.decompress stream filter.
  (Keisial at gmail dot com, Greg)</li>
	<li>Added support for using compressed connections with PDO_mysql. (Johannes)</li>
	<li>Added the ability for json_decode() to take a user specified depth. (Scott)</li>
	<li>Added support for the mysql_stmt_next_result() function from libmysql.
  (Andrey)</li>
	<li>Added function preg_filter() that does grep and replace in one go. (Marcus)</li>
	<li>Added system independent realpath() implementation which caches intermediate
  directories in realpath-cache. (Dmitry)</li>
	<li>Added optional clear_realpath_cache and filename parameters to
  clearstatcache(). (Jani, Arnaud)</li>
	<li>Added litespeed SAPI module. (George Wang)</li>
	<li>Added ext/hash support to ext/session's ID generator. (Sara)</li>
	<li>Added quoted_printable_encode() function. (Tony)</li>
	<li>Added stream_context_set_default() function. (Davey Shafik)</li>
	<li>Added optional "is_xhtml" parameter to nl2br() which makes the function
  output &lt;br&gt; when false and &lt;br /&gt; when true (FR <?php bugl(34381); ?>). (Kalle)</li>
	<li>Added PHP_MAXPATHLEN constant (maximum length of a path). (Pierre)</li>
	<li>Added support for SSH via libssh2 in cURL. (Pierre)</li>
	<li>Added support for gray levels PNG image with alpha in GD extension. (Pierre)</li>
	<li>Added support for salsa hashing functions in HASH extension. (Scott)</li>
	<li>Added DOMNode::getLineNo to get line number of parsed node. (Rob)</li>
	<li>Added table info to PDO::getColumnMeta() with SQLite. (Martin Jansen, Scott)</li>
	<li>Added mail logging functionality that allows logging of mail sent via
  mail() function. (Ilia)</li>
	<li>Added json_last_error() to return any error information from json_decode().
  (Scott)</li>
	<li>Added gethostname() to return the current system host name. (Ilia)</li>
	<li>Added shm_has_var() function. (Mike)</li>
	<li>Added depth parameter to json_decode() to lower the nesting depth from the
  maximum if required. (Scott)</li>
	<li>Added pixelation support in imagefilter(). (Takeshi Abe, Kalle)</li>
	<li>Added SplObjectStorage::addAll/removeAll. (Etienne)</li>

	<li><?php implemented(41712); ?> (curl progress callback: CURLOPT_PROGRESSFUNCTION).
  (sdteffen[at]gmail[dot].com, Pierre)</li>
	<li><?php implemented(47739); ?> (Missing cURL option do disable IPv6). (Pierre)</li>
	<li><?php implemented(39637); ?> (Missing cURL option CURLOPT_FTP_FILEMETHOD). (Pierre)</li>

	<li>Fixed an issue with ReflectionProperty::setAccessible().
  (Sebastian, Roman Borschel)</li>
	<li>Fixed html_entity_decode() incorrectly converting numeric html entities
  to different characters with cp1251 and cp866. (Scott)</li>
	<li>Fixed an issue in date() where a : was printed for the O modifier after a P
  modifier was used. (Derick)</li>
	<li>Fixed exec() on Windows to not eat the first and last double quotes. (Scott)</li>
	<li>Fixed readlink on Windows in thread safe SAPI (apache2.x etc.). (Pierre)</li>
	<li>Fixed a bug causing miscalculations with the "last &lt;weekday&gt; of &lt;n&gt; month"
  relative time string. (Derick)</li>
	<li>Fixed bug causing the algorithm parameter of mhash() to be modified. (Scott)</li>
	<li>Fixed invalid calls to free when internal fileinfo magic file is used. (Scott)</li>
	<li>Fixed memory leak inside wddx_add_vars() function. (Felipe)</li>
	<li>Fixed check in recode extension to allow builing of recode and mysql
  extensions when using a recent libmysql. (Johannes)</li>

	<li><?php peclbugfix(12794); ?> (PDOStatement->nextRowset() doesn't work). (Johannes)</li>
	<li><?php peclbugfix(12401); ?> (Add support for ATTR_FETCH_TABLE_NAMES). (Johannes)</li>

	<li><?php bugfix(48696); ?> (ldap_read() segfaults with invalid parameters). (Felipe)</li>
	<li><?php bugfix(48643); ?> (String functions memory issue). (Dmitry)</li>
	<li><?php bugfix(48641); ?> (tmpfile() uses old parameter parsing).
  (crrodriguez at opensuse dot org)</li>
	<li><?php bugfix(48624); ?> (.user.ini never gets parsed). (Pierre)</li>
	<li><?php bugfix(48620); ?> (X-PHP-Originating-Script assumes no trailing CRLF in
  existing headers). (Ilia)</li>
	<li><?php bugfix(48578); ?> (Can't build 5.3 on FBSD 4.11). (Rasmus)</li>
	<li><?php bugfix(48535); ?> (file_exists returns false when impersonate is used).
  (Kanwaljeet Singla, Venkat Raman Don)</li>
	<li><?php bugfix(48493); ?> (spl_autoload_register() doesn't work correctly when
  prepending functions). (Scott)</li>
	<li><?php bugfix(48215); ?> (Calling a method with the same name as the parent class
  calls the constructor). (Scott)</li>
	<li><?php bugfix(48200); ?> (compile failure with mbstring.c when
  --enable-zend-multibyte is used). (Jani)</li>
	<li><?php bugfix(48188); ?> (Cannot execute a scrollable cursors twice with PDO_PGSQL).
  (Matteo)</li>
	<li><?php bugfix(48185); ?> (warning: value computed is not used in
  pdo_sqlite_stmt_get_col line 271). (Matteo)</li>
	<li><?php bugfix(48087); ?> (call_user_method() invalid free of arguments). (Felipe)</li>
	<li><?php bugfix(48060); ?> (pdo_pgsql - large objects are returned as empty). (Matteo)</li>
	<li><?php bugfix(48034); ?> (PHP crashes when script is 8192 (8KB) bytes long). (Dmitry)</li>
	<li><?php bugfix(48004); ?> (Error handler prevents creation of default object). (Dmitry)</li>
	<li><?php bugfix(47880); ?> (crashes in call_user_func_array()). (Dmitry)</li>
	<li><?php bugfix(47856); ?> (stristr() converts needle to lower-case). (Ilia)</li>
	<li><?php bugfix(47851); ?> (is_callable throws fatal error). (Dmitry)</li>
	<li><?php bugfix(47816); ?> (pcntl tests failing on NetBSD). (Matteo)</li>
	<li><?php bugfix(47779); ?> (Wrong value for SIG_UNBLOCK and SIG_SETMASK constants).
  (Matteo)</li>
	<li><?php bugfix(47771); ?> (Exception during object construction from arg call calls
  object's destructor). (Dmitry)</li>
	<li><?php bugfix(47767); ?> (include_once does not resolve windows symlinks or junctions)
  (Kanwaljeet Singla, Venkat Raman Don)</li>
	<li><?php bugfix(47757); ?> (rename JPG to JPEG in phpinfo). (Pierre)</li>
	<li><?php bugfix(47745); ?> (FILTER_VALIDATE_INT doesn't allow minimum integer). (Dmitry)</li>
	<li><?php bugfix(47714); ?> (autoloading classes inside exception_handler leads to
  crashes). (Dmitry)</li>
	<li><?php bugfix(47671); ?> (Cloning SplObjectStorage instances). (Etienne)</li>
	<li><?php bugfix(47664); ?> (get_class returns NULL instead of FALSE). (Dmitry)</li>
	<li><?php bugfix(47662); ?> (Support more than 127 subpatterns in preg_match). (Nuno)</li>
	<li><?php bugfix(47596); ?> (Bus error on parsing file). (Dmitry)</li>
	<li><?php bugfix(47572); ?> (Undefined constant causes segmentation fault). (Felipe)</li>
	<li><?php bugfix(47560); ?> (explode()'s limit parameter odd behaviour). (Matt)</li>
	<li><?php bugfix(47549); ?> (get_defined_constants() return array with broken array
  categories). (Ilia)</li>
	<li><?php bugfix(47535); ?> (Compilation failure in ps_fetch_from_1_to_8_bytes()).
  (Johannes)</li>
	<li><?php bugfix(47534); ?> (RecursiveDiteratoryIterator::getChildren ignoring
  CURRENT_AS_PATHNAME). (Etienne)</li>
	<li><?php bugfix(47443); ?> (metaphone('scratch') returns wrong result). (Felipe)</li>
	<li><?php bugfix(47438); ?> (mysql_fetch_field ignores zero offset). (Johannes)</li>
	<li><?php bugfix(47398); ?> (PDO_Firebird doesn't implements quoter correctly). (Felipe)</li>
	<li><?php bugfix(47390); ?> (odbc_fetch_into - BC in php 5.3.0). (Felipe)</li>
	<li><?php bugfix(47359); ?> (Use the expected unofficial mimetype for bmp files). (Scott)</li>
	<li><?php bugfix(47343); ?> (gc_collect_cycles causes a segfault when called within a
  destructor in one case). (Dmitry)</li>
	<li><?php bugfix(47320); ?> ($php_errormsg out of scope in functions). (Dmitry)</li>
	<li><?php bugfix(47318); ?> (UMR when trying to activate user config). (Pierre)</li>
	<li><?php bugfix(47243); ?> (OCI8: Crash at shutdown on Windows) (Chris Jones/Oracle
  Corp.)</li>
	<li><?php bugfix(47231); ?> (offsetGet error using incorrect offset). (Etienne)</li>
	<li><?php bugfix(47229); ?> (preg_quote() should escape the '-' char). (Nuno)</li>
	<li><?php bugfix(47165); ?> (Possible memory corruption when passing return value by
  reference). (Dmitry)</li>
	<li><?php bugfix(47087); ?> (Second parameter of mssql_fetch_array()). (Felipe)</li>
	<li><?php bugfix(47085); ?> (rename() returns true even if the file in PHAR does not
  exist). (Greg)</li>
	<li><?php bugfix(47050); ?> (mysqli_poll() modifies improper variables). (Johannes)</li>
	<li><?php bugfix(47045); ?> (SplObjectStorage instances compared with ==). (Etienne)</li>
	<li><?php bugfix(47038); ?> (Memory leak in include). (Dmitry)</li>
	<li><?php bugfix(47031); ?> (Fix constants in DualIterator example). (Etienne)</li>
	<li><?php bugfix(47021); ?> (SoapClient stumbles over WSDL delivered with
  "Transfer-Encoding: chunked"). (Dmitry)</li>
	<li><?php bugfix(46994); ?> (OCI8: CLOB size does not update when using CLOB IN OUT param
  in stored procedure) (Chris Jones/Oracle Corp.)</li>
	<li><?php bugfix(46979); ?> (use with non-compound name *has* effect). (Dmitry)</li>
	<li><?php bugfix(46957); ?> (The tokenizer returns deprecated values). (Felipe)</li>
	<li><?php bugfix(46944); ?> (UTF-8 characters outside the BMP aren't encoded correctly).
  (Scott)</li>
	<li><?php bugfix(46897); ?> (ob_flush() should fail to flush unerasable buffers).
  (David C.)</li>
	<li><?php bugfix(46849); ?> (Cloning DOMDocument doesn't clone the properties). (Rob)</li>
	<li><?php bugfix(46847); ?> (phpinfo() is missing some settings). (Hannes)</li>
	<li><?php bugfix(46844); ?> (php scripts or included files with first line starting
  with # have the 1st line missed from the output). (Ilia)</li>
	<li><?php bugfix(46817); ?> (tokenizer misses last single-line comment (PHP 5.3+, with
  re2c lexer)). (Matt, Shire)</li>
	<li><?php bugfix(46811); ?> (ini_set() doesn't return false on failure). (Hannes)</li>
	<li><?php bugfix(46763); ?> (mb_stristr() wrong output when needle does not exist).
  (Henrique M. Decaria)</li>
	<li><?php bugfix(46755); ?> (warning: use statement with non-compound name). (Dmitry)</li>
	<li><?php bugfix(46746); ?> (xmlrpc_decode_request outputs non-suppressable error when
  given bad data). (Ilia)</li>
	<li><?php bugfix(46738); ?> (Segfault when mb_detect_encoding() fails). (Scott)</li>
	<li><?php bugfix(46731); ?> (Missing validation for the options parameter of the
  imap_fetch_overview() function). (Ilia)</li>
	<li><?php bugfix(46711); ?> (cURL curl_setopt leaks memory in foreach loops). (magicaltux
  [at] php [dot] net)</li>
	<li><?php bugfix(46701); ?> (Creating associative array with long values in the key fails
  on 32bit linux). (Shire)</li>
	<li><?php bugfix(46681); ?> (mkdir() fails silently on PHP 5.3). (Hannes)</li>
	<li><?php bugfix(46653); ?> (can't extend mysqli). (Johannes)</li>
	<li><?php bugfix(46646); ?> (Restrict serialization on some internal classes like Closure
  and SplFileInfo using exceptions). (Etienne)</li>
	<li><?php bugfix(46623); ?> (OCI8: phpinfo doesn't show compile time ORACLE_HOME with
  phpize) (Chris Jones/Oracle Corp.)</li>
	<li><?php bugfix(46578); ?> (strip_tags() does not honor end-of-comment when it
  encounters a single quote). (Felipe)</li>
	<li><?php bugfix(46546); ?> (Segmentation fault when using declare statement with
  non-string value). (Felipe)</li>
	<li><?php bugfix(46542); ?> (Extending PDO class with a __call() function doesn't work as
  expected). (Johannes)</li>
	<li><?php bugfix(46421); ?> (SplFileInfo not correctly handling /). (Etienne)</li>
	<li><?php bugfix(46347); ?> (parse_ini_file() doesn't support * in keys). (Nuno)</li>
	<li><?php bugfix(46268); ?> (DateTime::modify() does not reset relative time values).
  (Derick)</li>
	<li><?php bugfix(46241); ?> (stacked error handlers, internal error handling in general).
  (Etienne)</li>
	<li><?php bugfix(46238); ?> (Segmentation fault on static call with empty string method).
  (Felipe)</li>
	<li><?php bugfix(46192); ?> (ArrayObject with objects as storage serialization).
  (Etienne)</li>
	<li><?php bugfix(46185); ?> (importNode changes the namespace of an XML element). (Rob)</li>
	<li><?php bugfix(46178); ?> (memory leak in ext/phar). (Greg)</li>
	<li><?php bugfix(46160); ?> (SPL - Memory leak when exception is thrown in offsetSet).
  (Felipe)</li>
	<li><?php bugfix(46147); ?> (after stream seek, appending stream filter reads incorrect
  data). (Greg)</li>
	<li><?php bugfix(46127); ?> (php_openssl_tcp_sockop_accept forgets to set context on
  accepted stream) (Mark Karpeles, Pierre)</li>
	<li><?php bugfix(46115); ?> (Memory leak when calling a method using Reflection).
  (Dmitry)</li>
	<li><?php bugfix(46110); ?> (XMLWriter - openmemory() and openuri() leak memory on
  multiple calls). (Ilia)</li>
	<li><?php bugfix(46108); ?> (DateTime - Memory leak when unserializing). (Felipe)</li>
	<li><?php bugfix(46106); ?> (Memory leaks when using global statement). (Dmitry)</li>
	<li><?php bugfix(46099); ?> (Xsltprocessor::setProfiling - memory leak). (Felipe, Rob).</li>
	<li><?php bugfix(46087); ?> (DOMXPath - segfault on destruction of a cloned object).
  (Ilia)</li>
	<li><?php bugfix(46048); ?> (SimpleXML top-level @attributes not part of iterator).
  (David C.)</li>
	<li><?php bugfix(46044); ?> (Mysqli - wrong error message). (Johannes)</li>
	<li><?php bugfix(46042); ?> (memory leaks with reflection of mb_convert_encoding()).
  (Ilia)</li>
	<li><?php bugfix(46039); ?> (ArrayObject iteration is slow). (Arnaud)</li>
	<li><?php bugfix(46033); ?> (Direct instantiation of SQLite3stmt and SQLite3result cause
  a segfault.) (Scott)</li>
	<li><?php bugfix(45991); ?> (Ini files with the UTF-8 BOM are treated as invalid).
  (Scott)</li>
	<li><?php bugfix(45989); ?> (json_decode() doesn't return NULL on certain invalid
  strings). (magicaltux, Scott)</li>
	<li><?php bugfix(45976); ?> (Moved SXE from SPL to SimpleXML). (Etienne)</li>
	<li><?php bugfix(45928); ?> (large scripts from stdin are stripped at 16K border).
  (Christian Schneider, Arnaud)</li>
	<li><?php bugfix(45911); ?> (Cannot disable ext/hash). (Arnaud)</li>
	<li><?php bugfix(45907); ?> (undefined reference to 'PHP_SHA512Init'). (Greg)</li>
	<li><?php bugfix(45826); ?> (custom ArrayObject serialization). (Etienne)</li>
	<li><?php bugfix(45820); ?> (Allow empty keys in ArrayObject). (Etienne)</li>
	<li><?php bugfix(45791); ?> (json_decode() doesn't convert 0e0 to a double). (Scott)</li>
	<li><?php bugfix(45786); ?> (FastCGI process exited unexpectedly). (Dmitry)</li>
	<li><?php bugfix(45757); ?> (FreeBSD4.11 build failure: failed include; stdint.h).
  (Hannes)</li>
	<li><?php bugfix(45743); ?> (property_exists fails to find static protected member in
  child class). (Felipe)</li>
	<li><?php bugfix(45717); ?> (Fileinfo/libmagic build fails, missing err.h and getopt.h).
  (Derick)</li>
	<li><?php bugfix(45706); ?> (Unserialization of classes derived from ArrayIterator
  fails). (Etienne, Dmitry)</li>
	<li><?php bugfix(45696); ?> (Not all DateTime methods allow method chaining). (Derick)</li>
	<li><?php bugfix(45682); ?> (Unable to var_dump(DateInterval)). (Derick)</li>
	<li><?php bugfix(45447); ?> (Filesystem time functions on Vista and server 2008).
  (Pierre)</li>
	<li><?php bugfix(45432); ?> (PDO: persistent connection leak). (Felipe)</li>
	<li><?php bugfix(45392); ?> (ob_start()/ob_end_clean() and memory_limit). (Ilia)</li>
	<li><?php bugfix(45384); ?> (parse_ini_file will result in parse error with no trailing
  newline). (Arnaud)</li>
	<li><?php bugfix(45382); ?> (timeout bug in stream_socket_enable_crypto). (vnegrier at
  optilian dot com, Ilia)</li>
	<li><?php bugfix(45044); ?> (relative paths not resolved correctly). (Dmitry)</li>
	<li><?php bugfix(44861); ?> (scrollable cursor don't work with pgsql). (Matteo)</li>
	<li><?php bugfix(44842); ?> (parse_ini_file keys that start/end with underscore).
  (Arnaud)</li>
	<li><?php bugfix(44575); ?> (parse_ini_file comment # line problems). (Arnaud)</li>
	<li><?php bugfix(44409); ?> (PDO::FETCH_SERIALIZE calls __construct()). (Matteo)</li>
	<li><?php bugfix(44173); ?> (PDO->query() parameter parsing/checking needs an update).
  (Matteo)</li>
	<li><?php bugfix(44154); ?> (pdo->errorInfo() always have three elements in the returned
  array). (David C.)</li>
	<li><?php bugfix(44153); ?> (pdo->errorCode() returns NULL when there are no errors).
  (David C.)</li>
	<li><?php bugfix(44135); ?> (PDO MySQL does not support CLIENT_FOUND_ROWS). (Johannes,
  chx1975 at gmail dot com)</li>
	<li><?php bugfix(44100); ?> (Inconsistent handling of static array declarations with
  duplicate keys). (Dmitry)</li>
	<li><?php bugfix(43831); ?> ($this gets mangled when extending PDO with persistent
  connection). (Felipe)</li>
	<li><?php bugfix(43817); ?> (opendir() fails on Windows directories with parent directory
  unaccessible). (Dmitry)</li>
	<li><?php bugfix(43069); ?> (SoapClient causes 505 HTTP Version not supported error
  message). (Dmitry)</li>
	<li><?php bugfix(43008); ?> (php://filter uris ignore url encoded filternames and can't
  handle slashes). (Arnaud)</li>
	<li><?php bugfix(42362); ?> (HTTP status codes 204 and 304 should not be gzipped).
  (Scott, Edward Z. Yang)</li>
	<li><?php bugfix(41874); ?> (separate STDOUT and STDERR in exec functions). (Kanwaljeet
  Singla, Venkat Raman Don, Pierre)</li>
	<li><?php bugfix(41534); ?> (SoapClient over HTTPS fails to reestablish connection).
  (Dmitry)</li>
	<li><?php bugfix(38802); ?> (max_redirects and ignore_errors). (patch by
  datibbaw@php.net)</li>
	<li><?php bugfix(35980); ?> (touch() works on files but not on directories). (Pierre)</li>

</ul>
<!-- }}} --></section>

<a id="PHP_5_2"></a>
<section class="version" id="5.2.17"><!-- {{{ 5.2.17 -->
<h3>Version 5.2.17</h3>
<?php release_date('06-Jan-2011'); ?>
<ul>

<li><?php bugfix(53632); ?> (PHP hangs on numeric value 2.2250738585072011e-308). (CVE-2010-4645) (Rasmus, Scott)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.16"><!-- {{{ 5.2.16 -->
<h3>Version 5.2.16</h3>
<?php release_date('16-Dec-2010'); ?>
<ul>

<li><?php bugfix(53517); ?> (segfault in pgsql_stmt_execute() when postgres is down). (gyp at balabit dot hu)</li>
<li><?php bugfix(53516); ?> (Regression in open_basedir handling). (Ilia)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.15"><!-- {{{ 5.2.15 -->
<h3>Version 5.2.15</h3>
<?php release_date('08-Dec-2010'); ?>
<ul>

<li>Fixed extract() to do not overwrite $GLOBALS and $this when using EXTR_OVERWRITE. (jorto at redhat dot com)</li>
<li>Fixed crash in zip extract method (possible CWE-170).  (Maksymilian Arciemowicz, Pierre)</li>
<li>Fixed a possible double free in imap extension (Identified by Mateusz  Kocielski). (CVE-2010-4150). (Ilia)</li>
<li>Fixed possible flaw in open_basedir (CVE-2010-3436). (Pierre)</li>
<li>Fixed possible crash in mssql_fetch_batch(). (Kalle)</li>
<li>Fixed NULL pointer dereference in ZipArchive::getArchiveComment. (CVE-2010-3709). (Maksymilian Arciemowicz)</li>

<li><?php bugfix(53492); ?> (fix crash if anti-aliasing steps are invalid). (Pierre)</li>
<li><?php bugfix(53323); ?> (pdo_firebird getAttribute() crash). (preeves at ibphoenix dot com)</li>
<li><?php bugfix(52929); ?> (Segfault in filter_var with FILTER_VALIDATE_EMAIL with large amount of data). (CVE-2010-3709). (Adam)</li>
<li><?php bugfix(52879); ?> (Objects unreferenced in __get, __set, __isset or __unset can be freed too early). (mail_ben_schmidt at yahoo dot com dot au, Dmitry)</li>
<li><?php bugfix(52772); ?> (var_dump() doesn't check for the existence of  get_class_name before calling it). (Kalle, Gustavo)</li>
<li><?php bugfix(52546); ?> (pdo_dblib segmentation fault when iterating MONEY values). (Felipe, Adam)</li>
<li><?php bugfix(52436); ?> (Compile error if systems do not have stdint.h) (Sriram Natarajan)</li>
<li><?php bugfix(52390); ?> (mysqli_report() should be per-request setting). (Kalle)</li>
<li><?php bugfix(51008); ?> (Zend/tests/bug45877.phpt fails). (Dmitry)</li>
<li><?php bugfix(47643); ?> (array_diff() takes over 3000 times longer than php 5.2.4). (Felipe)</li>
<li><?php bugfix(44248); ?> (RFC2616 transgression while HTTPS request through proxy with SoapClient object). (Dmitry)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.14"><!-- {{{ 5.2.14 -->
<h3>Version 5.2.14</h3>
<?php release_date('22-Jul-2010'); ?>
<ul>
<li>Reverted bug fix <?php bugl(49521) ?> (PDO fetchObject sets values before calling constructor). (Felipe)</li>
</ul>
<ul>
<li>Updated timezone database to version 2010.5. (Derick)</li>
<li>Upgraded bundled PCRE to version 8.02. (Ilia)</li>
</ul>
<ul>
<li>Rewrote var_export() to use smart_str rather than output buffering, revents  data disclosure if a fatal error occurs (CVE-2010-2531). (Scott)</li>
<li>Fixed a possible interruption array leak in strrchr(). Reported by Péter Veres. (CVE-2010-2484) (Felipe)</li>
<li>Fixed a possible interruption array leak in strchr(), strstr(), substr(), chunk_split(), strtok(), addcslashes(), str_repeat(), trim(). (Felipe)</li>
<li>Fixed a possible memory corruption in substr_replace() (Dmitry)</li>
<li>Fixed SplObjectStorage unserialization problems (CVE-2010-2225). (Stas)</li>
<li>Fixed a possible stack exaustion inside fnmatch(). Reporeted by Stefan Esser (Ilia)</li>
<li>Reset error state in PDO::beginTransaction() reset error state. (Ilia)</li>
<li>Fixed a NULL pointer dereference when processing invalid XML-RPC requests (Fixes CVE-2010-0397, bug <?php bugl(51288); ?>). (Raphael Geissert)</li>
<li>Fixed handling of session variable serialization on certain prefix characters. Reported by Stefan Esser (Ilia)</li>
<li>Fixed a possible arbitrary memory access inside sqlite extension. Reported by Mateusz Kocielski. (Ilia)  </li>
<li>Fixed a crash when calling an inexistent method of a class that inherits  PDOStatement if instantiated directly instead of doing by the PDO methods. (Felipe)</li>
</ul>
<ul>
<li><?php bugfix(52317); ?> (Segmentation fault when using mail() on a rhel 4.x (only 64 bit)). (Adam)</li>
<li><?php bugfix(52238); ?> (Crash when an Exception occured in iterator_to_array). (Johannes)</li>
<li><?php bugfix(52237); ?> (Crash when passing the reference of the property of a non-object). (Dmitry)</li>
<li><?php bugfix(52163); ?> (SplFileObject::fgetss() fails due to parameter that can't be set). (Felipe)</li>
<li><?php bugfix(52162); ?> (custom request header variables with numbers are removed). (Sriram Natarajan)</li>
<li><?php bugfix(52160); ?> (Invalid E_STRICT redefined constructor error). (Felipe)</li>
<li><?php bugfix(52061); ?> (memory_limit above 2G). (Felipe)</li>
<li><?php bugfix(52041); ?> (Memory leak when writing on uninitialized variable returned from function). (Dmitry)</li>
<li><?php bugfix(52037); ?> (Concurrent builds fail in install-programs). (seanius at debian dot org, Kalle)</li>
<li><?php bugfix(52019); ?> (make lcov doesn't support TESTS variable anymore). (Patrick)</li>
<li><?php bugfix(52010); ?> (open_basedir restrictions mismatch on vacuum command). (Ilia, Felipe)</li>
<li><?php bugfix(51943); ?> (AIX: Several files are out of ANSI spec). (Kalle, coreystup at gmail dot com)</li>
<li><?php bugfix(51911); ?> (ReflectionParameter::getDefaultValue() memory leaks with constant array). (Felipe)</li>
<li><?php bugfix(51905); ?> (ReflectionParameter fails if default value is an array with an access to self::). (Felipe)</li>
<li><?php bugfix(51822); ?> (Segfault with strange __destruct() for static class variables). (Dmitry)</li>
<li><?php bugfix(51671); ?> (imagefill does not work correctly for small images). (Pierre)</li>
<li><?php bugfix(51670); ?> (getColumnMeta causes segfault when re-executing query after calling nextRowset). (Pierrick)</li>
<li><?php bugfix(51629); ?> (CURLOPT_FOLLOWLOCATION error message is misleading). (Pierre)</li>
<li><?php bugfix(51617); ?> (PDO PGSQL still broken against PostGreSQL &lt;7.4). (Felipe, wdierkes at 5dollarwhitebox dot org)</li>
<li><?php bugfix(51615); ?> (PHP crash with wrong HTML in SimpleXML). (Felipe)</li>
<li><?php bugfix(51609); ?> (pg_copy_to: Invalid results when using fourth parameter). (Felipe)</li>
<li><?php bugfix(51608); ?> (pg_copy_to: WARNING: nonstandard use of \\ in a string literal). (cbandy at jbandy dot com)</li>
<li><?php bugfix(51607); ?> (pg_copy_from does not allow schema in the tablename argument). (cbandy at jbandy dot com)</li>
<li><?php bugfix(51604); ?> (newline in end of header is shown in start of message). (Daniel Egeberg)</li>
<li><?php bugfix(51562); ?> (query timeout in mssql can not be changed per query). (ejsmont dot artur at gmail dot com)</li>
<li><?php bugfix(51552); ?> (debug_backtrace() causes segmentation fault and/or memory issues). (Dmitry)</li>
<li><?php bugfix(51532); ?> (Wrong prototype for SplFileObject::fscanf()). (Etienne)</li>
<li><?php bugfix(51445); ?> (var_dump() invalid/slow *RECURSION* detection). (Felipe)</li>
<li><?php bugfix(51393); ?> (DateTime::createFromFormat() fails if format string contains timezone). (Adam)</li>
<li><?php bugfix(51374); ?> (Wrongly initialized object properties). (Etienne)</li>
<li><?php bugfix(51338); ?> (URL-Rewriter is still enabled if use_only_cookies is on). (Ilia, j dot jeising at gmail dot com)</li>
<li><?php bugfix(51273); ?> (Faultstring property does not exist when the faultstring is empty) (Ilia, dennis at transip dot nl)</li>
<li><?php bugfix(51269); ?> (zlib.output_compression Overwrites Vary Header). (Adam)</li>
<li><?php bugfix(51263); ?> (imagettftext and rotated text uses wrong baseline)  (cschneid at cschneid dot com, Takeshi Abe)</li>
<li><?php bugfix(51237); ?> (milter SAPI crash on startup). (igmar at palsenberg dot com)</li>
<li><?php bugfix(51213); ?> (pdo_mssql is trimming value of the money column). (Ilia, alexr at oplot dot com)</li>
<li><?php bugfix(51192); ?> (FILTER_VALIDATE_URL will invalidate a hostname that includes '-'). (Adam, solar at azrael dot ws).</li>
<li><?php bugfix(51190); ?> (ftp_put() returns false when transfer was successful). (Ilia)</li>
<li><?php bugfix(51183); ?> (ext/date/php_date.c fails to compile with Sun Studio). (Sriram Natarajan)</li>
<li><?php bugfix(51171); ?> (curl_setopt() doesn't output any errors or warnings when an invalid option is provided). (Ilia)</li>
<li><?php bugfix(51128); ?> (imagefill() doesn't work with large images). (Pierre)</li>
<li><?php bugfix(51086); ?> (DBA DB4 doesn't work with Berkeley DB 4.8). (Chris Jones)</li>
<li><?php bugfix(51062); ?> (DBA DB4 uses mismatched headers and libraries). (Chris Jones)</li>
<li><?php bugfix(51023); ?> (filter doesn't detect int overflows with GCC 4.4). (Raphael Geissert)</li>
<li><?php bugfix(50762); ?> (in WSDL mode Soap Header handler function only being called if defined in WSDL). (mephius at gmail dot com)</li>
<li><?php bugfix(50698); ?> (SoapClient should handle wsdls with some incompatiable endpoints). (Justin Dearing)</li>
<li><?php bugfix(50383); ?> (Exceptions thrown in __call() / __callStatic() do not include file and line in trace). (Felipe)</li>
<li><?php bugfix(49730); ?> (Firebird - new PDO() returns NULL). (Felipe)</li>
<li><?php bugfix(49723); ?> (LimitIterator with empty SeekableIterator). (Etienne)</li>
<li><?php bugfix(49576); ?> (FILTER_VALIDATE_EMAIL filter needs updating) (Rasmus)</li>
<li><?php bugfix(49320); ?> (PDO returns null when SQLite connection fails). (Felipe)</li>
<li><?php bugfix(49267); ?> (Linking fails for iconv). (Moriyosh)</li>
<li><?php bugfix(48601); ?> (xpath() returns FALSE for legitimate query). (Rob)</li>
<li><?php bugfix(48289); ?> (iconv_mime_encode() quoted-printable scheme is broken).
  (Adam, patch from hiroaki dot kawai at gmail dot com).</li>
<li><?php bugfix(43314); ?> (iconv_mime_encode(), broken Q scheme). (Rasmus)</li>
<li><?php bugfix(33210); ?> (getimagesize() fails to detect width/height on certain
  JPEGs). (Ilia)</li>
<li><?php bugfix(23229); ?> (syslog() truncates messages). (Adam)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.2.13"><!-- {{{ 5.2.13 -->
<h3>Version 5.2.13</h3>
<?php release_date('25-Feb-2010'); ?>
<ul>
<li>Security Fixes
	<ul>
		<li>Improved LCG entropy. (Rasmus, Samy Kamkar)</li>
		<li>Fixed safe_mode validation inside tempnam() when the directory path does not end with a /). (Martin Jansen)</li>
		<li>Fixed a possible open_basedir/safe_mode bypass in the session extension identified by Grzegorz Stachowiak. (Ilia)</li>
	</ul>
</li>

<li>Updated timezone database to version 2010.2. (Derick)</li>
<li>Upgraded bundled PCRE to version 7.9. (Ilia)</li>

<li>Removed automatic file descriptor unlocking happening on shutdown and/or  stream close (on all OSes excluding Windows). (Tony, Ilia)</li>

<li>Changed tidyNode class to disallow manual node creation. (Pierrick)</li>

<li>Added missing host validation for HTTP urls inside FILTER_VALIDATE_URL. (Ilia)</li>

<li>Fixed bug in bundled libgd causing spurious horizontal lines drawn by  gdImageFilledPolygon (libgd #100). (Takeshi Abe)</li>
<li>Fixed build of mysqli with MySQL 5.5.0-m2. (Andrey)</li>

<li><?php bugfix(50940); ?> (Custom content-length set incorrectly in Apache sapis). (Brian France, Rasmus)</li>
<li><?php bugfix(50930); ?> (Wrong date by php_date.c patch with ancient gcc/glibc versions). (Derick)</li>
<li><?php bugfix(50859); ?> (build fails with openssl 1.0 due to md2 deprecation). (Ilia, hanno at hboeck dot de)</li>
<li><?php bugfix(50847); ?> (strip_tags() removes all tags greater then 1023 bytes long). (Ilia)</li>
<li><?php bugfix(50832); ?> (HTTP fopen wrapper does not support passwordless HTTP authentication). (Jani)</li>
<li><?php bugfix(50823); ?> (ReflectionFunction::isDeprecated producing &quot;cannot be called statically&quot; error). (Jani, Felipe)</li>
<li><?php bugfix(50791); ?> (Compile failure: Bad logic in defining fopencookie emulation). (Jani)</li>
<li><?php bugfix(50787); ?> (stream_set_write_buffer() has no effect on socket streams). (vnegrier at optilian dot com, Ilia)</li>
<li><?php bugfix(50772); ?> (mysqli constructor without parameters does not return a working mysqli object). (Andrey)</li>
<li><?php bugfix(50761); ?> (system.multiCall crashes in xmlrpc extension). (hiroaki dot kawai at gmail dot com, Ilia)</li>
<li><?php bugfix(50732); ?> (exec() adds single byte twice to $output array). (Ilia)</li>
<li><?php bugfix(50728); ?> (All PDOExceptions hardcode 'code' property to 0). (Joey, Ilia)</li>
<li><?php bugfix(50727); ?> (Accessing mysqli->affected_rows on no connection causes segfault). (Andrey, Johannes)</li>
<li><?php bugfix(50680); ?> (strtotime() does not support eighth ordinal number). (Ilia)</li>
<li><?php bugfix(50661); ?> (DOMDocument::loadXML does not allow UTF-16). (Rob)</li>
<li><?php bugfix(50657); ?> (copy() with an empty (zero-byte) HTTP source succeeds but returns false). (Ilia)</li>
<li><?php bugfix(50636); ?> (MySQLi_Result sets values before calling constructor). (Pierrick)</li>
<li><?php bugfix(50632); ?> (filter_input() does not return default value if the variable does not exist). (Ilia)</li>
<li><?php bugfix(50576); ?> (XML_OPTION_SKIP_TAGSTART option has no effect). (Pierrick)</li>
<li><?php bugfix(50575); ?> (PDO_PGSQL LOBs are not compatible with PostgreSQL 8.5). (Matteo)</li>
<li><?php bugfix(50558); ?> (Broken object model when extending tidy). (Pierrick)</li>
<li><?php bugfix(50540); ?> (Crash while running ldap_next_reference test cases). (Sriram)</li>
<li><?php bugfix(50508); ?> (compile failure: Conflicting HEADER type declarations). (Jani)</li>
<li><?php bugfix(50394); ?> (Reference argument converted to value in __call). (Stas)</li>
<li><?php bugfix(49851); ?> (http wrapper breaks on 1024 char long headers). (Ilia)</li>
<li><?php bugfix(49600); ?> (imageTTFText text shifted right). (Takeshi Abe)</li>
<li><?php bugfix(49585); ?> (date_format buffer not long enough for >4 digit years). (Derick, Adam)</li>
<li><?php bugfix(49463); ?> (setAttributeNS fails setting default namespace). (Rob)</li>
<li><?php bugfix(48667); ?> (Implementing Iterator and IteratorAggregate). (Etienne)</li>
<li><?php bugfix(48590); ?> (SoapClient does not honor max_redirects). (Sriram)</li>
<li><?php bugfix(48190); ?> (Content-type parameter &quot;boundary&quot; is not case-insensitive in HTTP uploads). (Ilia)</li>
<li><?php bugfix(47601); ?> (defined() requires class to exist when testing for class constants). (Ilia)</li>
<li><?php bugfix(47409); ?> (extract() problem with array containing word &quot;this&quot;). (Ilia, chrisstocktonaz at gmail dot com)</li>
<li><?php bugfix(47002); ?> (Field truncation when reading from dbase dbs with more then 1024 fields). (Ilia, sjoerd-php at linuxonly dot nl)</li>
<li><?php bugfix(45599); ?> (strip_tags() truncates rest of string with invalid attribute). (Ilia, hradtke)  </li>
<li><?php bugfix(44827); ?> (define() allows :: in constant names). (Ilia)</li>

</ul>
<!-- }}} --></section>

<section class="version" id="5.2.12"><!-- {{{ 5.2.12 -->
<h3>Version 5.2.12</h3>
<?php release_date('17-Dec-2009'); ?>
<ul>
<li>Security Fixes
	<ul>
		<li>Fixed a safe_mode bypass in tempnam() identified by Grzegorz Stachowiak. (Rasmus)</li>
		<li>Fixed a open_basedir bypass in posix_mkfifo() identified by Grzegorz Stachowiak. (Rasmus)</li>
		<li>Added "max_file_uploads" INI directive, which can be set to limit the number of file uploads per-request to 20 by default, to prevent possible DOS via temporary file exhaustion. (Ilia)</li>
		<li>Added protection for $_SESSION from interrupt corruption and improved "session.save_path" check, identified by Stefan Esser. (Stas)</li>
		<li><?php bugfix(49785); ?> (insufficient input string validation of htmlspecialchars()). (Moriyoshi, hello at iwamot dot com)</li>
	</ul>
</li>

<li>Updated timezone database to version 2009.19 (2009s). (Derick)</li>

<li>Added LIBXML_PARSEHUGE constant to overrides the maximum text size of a single text node when using libxml2.7.3+. (Kalle)</li>

<li>Changed "post_max_size" php.ini directive to allow unlimited post size by setting it to 0. (Rasmus)</li>

<li>Fixed error_log() to be binary safe when using message_type 3. (Jani)</li>
<li>Fixed unnecessary invocation of setitimer when timeouts have been disabled. (Arvind Srinivasan)</li>
<li>Fixed crash in com_print_typeinfo when an invalid typelib is given. (Pierre)</li>
<li>Fixed crash in SQLiteDatabase::ArrayQuery() and SQLiteDatabase::SingleQuery() when calling using Reflection. (Felipe)</li>
<li>Fixed crash when instantiating PDORow and PDOStatement through Reflection. (Felipe)</li>
<li>Fixed memory leak in openssl_pkcs12_export_to_file(). (Felipe)</li>

<li><?php bugfix(50445); ?> (PDO-ODBC stored procedure call from Solaris 64-bit causes seg fault). (davbrown4 at yahoo dot com, Felipe)</li>
<li><?php bugfix(50345); ?> (nanosleep not detected properly on some solaris versions). (Jani)</li>
<li><?php bugfix(50323); ?> (Allow use of ; in values via ;; in PDO DSN). (Ilia, Pierrick)</li>
<li><?php bugfix(50285); ?> (xmlrpc does not preserve keys in encoded indexed arrays). (Felipe)</li>
<li><?php bugfix(50282); ?> (xmlrpc_encode_request() changes object into array in calling function). (Felipe)</li>
<li><?php bugfix(50266); ?> (conflicting types for llabs). (Jani)</li>
<li><?php bugfix(50255); ?> (isset() and empty() silently casts array to object). (Felipe)</li>
<li><?php bugfix(50219); ?> (soap call Segmentation fault on a redirected url). (Pierrick)</li>
<li><?php bugfix(50209); ?> (Compiling with libedit cannot find readline.h). (tcallawa at redhat dot com)</li>
<li><?php bugfix(50207); ?> (segmentation fault when concatenating very large strings on 64bit linux). (Ilia)</li>
<li><?php bugfix(50195); ?> (pg_copy_to() fails when table name contains schema. (Ilia)</li>
<li><?php bugfix(50185); ?> (ldap_get_entries() return false instead of an empty array when there is no error). (Jani)</li>
<li><?php bugfix(50174); ?> (Incorrectly matched docComment). (Felipe)</li>
<li><?php bugfix(50168); ?> (FastCGI fails with wrong error on HEAD request to non-existent file). (Dmitry)</li>
<li><?php bugfix(50162); ?> (Memory leak when fetching timestamp column from Oracle database). (Felipe)</li>
<li><?php bugfix(50158); ?> (FILTER_VALIDATE_EMAIL fails with valid addresses containing = or ?). (Pierrick)</li>
<li><?php bugfix(50073); ?> (parse_url() incorrect when ? in fragment). (Ilia)</li>
<li><?php bugfix(50006); ?> (Segfault caused by uksort()). (Felipe)</li>
<li><?php bugfix(50005); ?> (Throwing through Reflection modified Exception object makes segmentation fault). (Felipe)</li>
<li><?php bugfix(49990); ?> (SNMP3 warning message about security level printed twice). (Jani)</li>
<li><?php bugfix(49985); ?> (pdo_pgsql prepare() re-use previous aborted transaction). (ben dot pineau at gmail dot com, Ilia, Matteo)</li>
<li><?php bugfix(49972); ?> (AppendIterator undefined function crash). (Johannes)</li>
<li><?php bugfix(49921); ?> (Curl post upload functions changed). (Ilia)</li>
<li><?php bugfix(49855); ?> (import_request_variables() always returns NULL). (Ilia, sjoerd at php dot net)</li>
<li><?php bugfix(49847); ?> (exec() fails to return data inside 2nd parameter, given output lines &gt;4095 bytes). (Ilia)</li>
<li><?php bugfix(49809); ?> (time_sleep_until() is not available on OpenSolaris). (Jani)</li>
<li><?php bugfix(49757); ?> (long2ip() can return wrong value in a multi-threaded applications). (Ilia, Florian Anderiasch)</li>
<li><?php bugfix(49738); ?> (calling mcrypt() after mcrypt_generic_deinit() crashes). (Sriram Natarajan)</li>
<li><?php bugfix(49719); ?> (ReflectionClass::hasProperty returns true for a private property in base class). (Felipe)</li>
<li><?php bugfix(49698); ?> (Unexpected change in strnatcasecmp()). (Rasmus)</li>
<li><?php bugfix(49677); ?> (ini parser crashes with apache2 and using ${something} ini variables). (Jani)</li>
<li><?php bugfix(49660); ?> (libxml 2.7.3+ limits text nodes to 10MB). (Felipe)</li>
<li><?php bugfix(49647); ?> (DOMUserData does not exist). (Rob)</li>
<li><?php bugfix(49630); ?> (imap_listscan() function missing). (Felipe)</li>
<li><?php bugfix(49627); ?> (error_log to specified file does not log time according to date.timezone). (Dmitry)</li>
<li><?php bugfix(49578); ?> (make install-pear fails). (Hannes)</li>
<li><?php bugfix(49536); ?> (mb_detect_encoding() returns incorrect results when mbstring.strict_mode is turned on). (Moriyoshi)</li>
<li><?php bugfix(49531); ?> (CURLOPT_INFILESIZE sometimes causes warning "CURLPROTO_FILE cannot be set"). (Felipe)</li>
<li><?php bugfix(49528); ?> (UTF-16 strings prefixed by BOMs wrongly converted). (Moriyoshi)</li>
<li><?php bugfix(49521); ?> (PDO fetchObject sets values before calling constructor). (Pierrick)</li>
<li><?php bugfix(49517); ?> (cURL's CURLOPT_FILE prevents file from being deleted after fclose()). (Ilia)</li>
<li><?php bugfix(49472); ?> (Constants defined in Interfaces can be overridden). (Felipe)</li>
<li><?php bugfix(49354); ?> (mb_strcut() cuts wrong length when offset is in the middle of a multibyte character). (Moriyoshi)</li>
<li><?php bugfix(49332); ?> (Build error with Snow Leopard). (Scott)</li>
<li><?php bugfix(49244); ?> (Floating point NaN cause garbage characters). (Sjoerd)</li>
<li><?php bugfix(49174); ?> (crash when extending PDOStatement and trying to set queryString property). (Felipe)</li>
<li><?php bugfix(49098); ?> (mysqli segfault on error). (Rasmus)</li>
<li><?php bugfix(48805); ?> (IPv6 socket transport is not working). (Ilia)</li>
<li><?php bugfix(48764); ?> (PDO_pgsql::query() always uses implicit prepared statements if v3 proto available). (Matteo, Mark Kirkwood)</li>
<li><?php bugfix(47848); ?> (importNode doesn't preserve attribute namespaces). (Rob)</li>
<li><?php bugfix(45120); ?> (PDOStatement-&gt;execute() returns true then false for same statement). (Pierrick)</li>
<li><?php bugfix(34852); ?> (Failure in odbc_exec() using oracle-supplied odbc driver). (tim dot tassonis at trivadis dot com)</li>

</ul>
<!-- }}} --></section>

<section class="version" id="5.2.11"><!-- {{{ 5.2.11 -->
<h3>Version 5.2.11</h3>
<?php release_date('16-Sep-2009'); ?>
<ul>
<li>Security Fixes
	<ul>
		<li>Fixed certificate validation inside php_openssl_apply_verification_policy. (Ryan Sleevi, Ilia)</li>
		<li>Added missing sanity checks around exif processing. (Ilia)</li>
		<li>Fixed sanity check for the color index in imagecolortransparent. (Pierre)</li>
		<li><?php bugfix(44683); ?> (popen crashes when an invalid mode is passed). (Pierre)</li>
	</ul>
</li>

<li>Updated timezone database to version 2009.13 (2009m) (Derick)</li>
<li>Fixed zlib.deflate compress filter to actually accept level parameter. (Jani)</li>
<li>Fixed leak on error in popen/exec (and related functions) on Windows. (Pierre)</li>
<li>Fixed regression in cURL extension that prevented flush of data to output defined as a file handle. (Ilia)</li>
<li>Fixed memory leak in stream_is_local(). (Felipe, Tony)</li>

<li><?php bugfix(49470); ?> (FILTER_SANITIZE_EMAIL allows disallowed characters). (Ilia)</li>
<li><?php bugfix(49447); ?> (php engine needs to correctly check for socket API return status on windows). (Sriram Natarajan)</li>
<li><?php bugfix(49372); ?> (segfault in php_curl_option_curl). (Pierre)</li>
<li><?php bugfix(49361); ?> (wordwrap() wraps incorrectly on end of line boundaries). (Ilia, code-it at mail dot ru)</li>
<li><?php bugfix(49289); ?> (bcmath module doesn't compile with phpize configure). (Jani)</li>
<li><?php bugfix(49286); ?> (php://input (php_stream_input_read) is broken). (Jani)</li>
<li><?php bugfix(49269); ?> (Ternary operator fails on Iterator object when used inside foreach declaration). (Etienne, Dmitry)</li>
<li><?php bugfix(49236); ?> (Missing PHP_SUBST(PDO_MYSQL_SHARED_LIBADD)). (Jani)</li>
<li><?php bugfix(49144); ?> (Import of schema from different host transmits original authentication details). (Dmitry)</li>
<li><?php bugfix(49132); ?> (posix_times returns false without error). (phpbugs at gunnu dot us)</li>
<li><?php bugfix(49125); ?> (Error in dba_exists C code). (jdornan at stanford dot edu)</li>
<li><?php bugfix(49095); ?> (proc_get_status['exitcode'] fails on win32). (Felipe)</li>
<li><?php bugfix(49074); ?> (private class static fields can be modified by using reflection). (Jani)</li>
<li><?php bugfix(49072); ?> (feof never returns true for damaged file in zip). (Pierre)</li>
<li><?php bugfix(49052); ?> (context option headers freed too early when using --with-curlwrappers). (Jani)</li>
<li><?php bugfix(49032); ?> (SplFileObject::fscanf() variables passed by reference). (Jani)</li>
<li><?php bugfix(49026); ?> (proc_open() can bypass safe_mode_protected_env_vars restrictions). (Ilia)</li>
<li><?php bugfix(49000); ?> (PHP CLI in Interactive mode (php -a) crashes when including files from function). (Stas)</li>
<li><?php bugfix(48994); ?> (zlib.output_compression does not output HTTP headers when set to a string value). (Jani)</li>
<li><?php bugfix(48980); ?> (Crash when compiling with pdo_firebird). (Felipe)</li>
<li><?php bugfix(48962); ?> (cURL does not upload files with specified filename). (Ilia)</li>
<li><?php bugfix(48929); ?> (Double \r\n after HTTP headers when &quot;header&quot; context option is an array). (David Zülke)</li>
<li><?php bugfix(48913); ?> (Too long error code strings in pdo_odbc driver). (naf at altlinux dot ru, Felipe)</li>
<li><?php bugfix(48802); ?> (printf() returns incorrect outputted length). (Jani)</li>
<li><?php bugfix(48801); ?> (Problem with imagettfbbox). (Takeshi Abe)</li>
<li><?php bugfix(48788); ?> (RecursiveDirectoryIterator doesn't descend into symlinked directories). (Ilia)</li>
<li><?php bugfix(48774); ?> (SIGSEGVs when using curl_copy_handle()). (Sriram Natarajan)</li>
<li><?php bugfix(48763); ?> (ZipArchive produces corrupt archive). (dani dot church at gmail dot com, Pierre)</li>
<li><?php bugfix(48762); ?> (IPv6 address filter still rejects valid address). (Felipe)</li>
<li><?php bugfix(48733); ?> (CURLOPT_WRITEHEADER|CURLOPT_FILE|CURLOPT_STDERR warns on files that have been opened with r+). (Ilia)</li>
<li><?php bugfix(48732); ?> (TTF Bounding box wrong for letters below baseline). (Takeshi Abe)</li>
<li><?php bugfix(48718); ?> (FILTER_VALIDATE_EMAIL does not allow numbers in domain components). (Ilia)</li>
<li><?php bugfix(48709); ?> (metaphone and 'wh'). (brettz9 at yahoo dot com, Felipe)</li>
<li><?php bugfix(48697); ?> (mb_internal_encoding() value gets reset by parse_str()). (Moriyoshi)</li>
<li><?php bugfix(48696); ?> (ldap_read() segfaults with invalid parameters). (Felipe)</li>
<li><?php bugfix(48693); ?> (Double declaration of __lambda_func when lambda wrongly formatted). (peter at lvp-media dot com, Felipe)</li>
<li><?php bugfix(48661); ?> (phpize is broken with non-bash shells). (Jani)</li>
<li><?php bugfix(48645); ?> (mb_convert_encoding() doesn't understand hexadecimal html-entities). (Moriyoshi)</li>
<li><?php bugfix(48637); ?> (&quot;file&quot; fopen wrapper is overwritten when using --with-curlwrappers). (Jani)</li>
<li><?php bugfix(48636); ?> (Error compiling of ext/date on netware). (guenter at php.net, Ilia)</li>
<li><?php bugfix(48629); ?> (get_defined_constants() ignores categorize parameter). (Felipe)</li>
<li><?php bugfix(48619); ?> (imap_search ALL segfaults). (Pierre)</li>
<li><?php bugfix(48608); ?> (Invalid libreadline version not detected during configure). (Jani)</li>
<li><?php bugfix(48555); ?> (ImageFTBBox() differs from previous versions for texts with new lines) (Takeshi Abe)</li>
<li><?php bugfix(48539); ?> (pdo_dblib fails to connect, throws empty PDOException &quot;SQLSTATE[] (null)&quot;). (Felipe)</li>
<li><?php bugfix(48465); ?> (sys_get_temp_dir() possibly inconsistent when using TMPDIR). (Ilia)</li>
<li><?php bugfix(48450); ?> (Compile failure under IRIX 6.5.30 building gd.c). (Kalle)</li>
<li><?php bugfix(48400); ?> (imap crashes when closing stream opened with OP_PROTOTYPE flag). (Jani)</li>
<li><?php bugfix(48284); ?> (hash &quot;adler32&quot; byte order is reversed). (Scott)</li>
<li><?php bugfix(48276); ?> (date(&quot;Y&quot;) on big endian machines produces the wrong result). (Scott)</li>
<li><?php bugfix(48247); ?> (Infinite loop and possible crash during startup with errors when errors are logged). (Jani)</li>
<li><?php bugfix(48182); ?> (ssl handshake fails during asynchronous socket connection). (Sriram Natarajan)</li>
<li><?php bugfix(48116); ?> (Fixed build with Openssl 1.0). (Pierre, Al dot Smith at aeschi dot ch dot eu dot org)</li>
<li><?php bugfix(48060); ?> (pdo_pgsql - large objects are returned as empty). (Matteo)</li>
<li><?php bugfix(48057); ?> (Only the date fields of the first row are fetched, others are empty). (info at programmiernutte dot net)</li>
<li><?php bugfix(47481); ?> (natcasesort() does not sort extended ASCII characters correctly). (Herman Radtke)</li>
<li><?php bugfix(47351); ?> (Memory leak in DateTime). (Derick, Tobias John)</li>
<li><?php bugfix(47273); ?> (Encoding bug in SoapServer->fault). (Dmitry)</li>
<li><?php bugfix(46020); ?> (with Sun Java System Web Server 7.0 on HPUX, #define HPUX). (Uwe Schindler)</li>
<li><?php bugfix(45905); ?> (imagefilledrectangle() clipping error). (markril at hotmail dot com, Pierre)</li>
<li><?php bugfix(45280); ?> (Reflection of instantiated COM classes causes PHP to crash) (Paul Richards, Kalle)</li>
<li><?php bugfix(45141); ?> (setcookie will output expires years of &gt;4 digits). (Ilia)</li>
<li><?php bugfix(44144); ?> (spl_autoload_functions() should return object instance when appropriate). (Hannes, Etienne)</li>
<li><?php bugfix(43510); ?> (stream_get_meta_data() does not return same mode as used in fopen). (Jani)</li>
<li><?php bugfix(42434); ?> (ImageLine w/ antialias = 1px shorter). (wojjie at gmail dot com, Kalle)</li>
<li><?php bugfix(28038); ?> (Sent incorrect RCPT TO commands to SMTP server) (Garrett)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.10"><!-- {{{ 5.2.10 -->
<h3>Version 5.2.10</h3>
<?php release_date('18-Jun-2009'); ?>
<ul>
	<li>Security Fixes
		<ul>
			<li><?php bugfix(48378); ?> (exif_read_data() segfaults on certain corrupted .jpeg files). (Pierre)</li>
		</ul>
	</li>

	<li>Updated timezone database to version 2009.9 (2009i) (Derick)</li>

	<li>Added "ignore_errors" option to http fopen wrapper. (David Zulke, Sara)</li>
	<li>Added new CURL options CURLOPT_REDIR_PROTOCOLS, CURLOPT_PROTOCOLS, and CURLPROTO_* for redirect fixes in CURL 7.19.4. (Yoram Bar Haim, Stas)</li>
	<li>Added support for Sun CC (FR <?php bugl(46595); ?> and FR <?php bugl(46513); ?>). (David Soria Parra)</li>

	<li>Changed default value of array_unique()'s optional sorting type parameter back to SORT_STRING to fix backwards compatibility breakage introduced in PHP 5.2.9. (Moriyoshi)</li>

	<li>Fixed memory corruptions while reading properties of zip files. (Ilia)</li>
	<li>Fixed memory leak in ob_get_clean/ob_get_flush. (Christian)</li>
	<li>Fixed segfault on invalid session.save_path. (Hannes)</li>
	<li>Fixed leaks in imap when a mail_criteria is used. (Pierre)</li>
	<li>Fixed missing erealloc() in fix for bug <?php bugl(40091); ?> in spl_autoload_register. (Greg)</li>

    <li><?php bugfix(48562); ?> (Reference recursion causes segfault when used in  wddx_serialize_vars()). (Felipe)</li>
    <li><?php bugfix(48557); ?> (Numeric string keys in Apache Hashmaps are not cast to integers). (David Zuelke)</li>
    <li><?php bugfix(48518); ?> (curl crashes when writing into invalid file handle). (Tony)</li>
    <li><?php bugfix(48514); ?> (cURL extension uses same resource name for simple and multi APIs). (Felipe)</li>
    <li><?php bugfix(48469); ?> (ldap_get_entries() leaks memory on empty search results). (Patrick)</li>
    <li><?php bugfix(48456); ?> (CPPFLAGS not restored properly in phpize.m4). (Jani, spisek at kerio dot com)</li>
    <li><?php bugfix(48448); ?> (Compile failure under IRIX 6.5.30 building cast.c).  (Kalle)</li>
    <li><?php bugfix(48441); ?> (ldap_search() sizelimit, timelimit and deref options  persist). (Patrick)</li>
    <li><?php bugfix(48434); ?> (Improve memory_get_usage() accuracy). (Arnaud)</li>
    <li><?php bugfix(48416); ?> (Force a cache limit in ereg() to stop excessive memory usage). (Scott)</li>
    <li><?php bugfix(48409); ?> (Crash when exception is thrown while passing function  arguments). (Arnaud)</li>
    <li><?php bugfix(48378); ?> (exif_read_data() segfaults on certain corrupted .jpeg  files). (Pierre)</li>
    <li><?php bugfix(48359); ?> (Script hangs on snmprealwalk if OID is not increasing). (Ilia, simonov at gmail dot com)</li>
    <li><?php bugfix(48336); ?> (ReflectionProperty::getDeclaringClass() does not work with redeclared property). (patch by Markus dot Lidel at shadowconnect dot com)</li>
    <li><?php bugfix(48326); ?> (constant MSG_DONTWAIT not defined). (Arnaud)</li>
    <li><?php bugfix(48313); ?> (fgetcsv() does not return null for empty rows). (Ilia)</li>
    <li><?php bugfix(48309); ?> (stream_copy_to_stream() and fpasstru() do not update stream position of plain files). (Arnaud)</li>
    <li><?php bugfix(48307); ?> (stream_copy_to_stream() copies 0 bytes when $source is a  socket). (Arnaud)</li>
    <li><?php bugfix(48273); ?> (snmp*_real_walk() returns SNMP errors as values). (Ilia, lytboris at gmail dot com)</li>
    <li><?php bugfix(48256); ?> (Crash due to double-linking of history.o). (tstarling at wikimedia dot org)</li>
    <li><?php bugfix(48248); ?> (SIGSEGV when access to private property via &amp;__get).  (Felipe)</li>
    <li><?php bugfix(48247); ?> (Crash on errors during startup). (Stas)</li>
    <li><?php bugfix(48240); ?> (DBA Segmentation fault dba_nextkey). (Felipe)</li>
    <li><?php bugfix(48224); ?> (Incorrect shuffle in array_rand). (Etienne)</li>
    <li><?php bugfix(48221); ?> (memory leak when passing invalid xslt parameter). (Felipe)</li>
    <li><?php bugfix(48207); ?> (CURLOPT_(FILE|WRITEHEADER options do not error out when    working with a non-writable stream). (Ilia)</li>
    <li><?php bugfix(48206); ?> (Iterating over an invalid data structure with RecursiveIteratorIterator leads to a segfault). (Scott)</li>
    <li><?php bugfix(48204); ?> (xmlwriter_open_uri() does not emit warnings on invalid paths). (Ilia)</li>
    <li><?php bugfix(48203); ?> (Crash when CURLOPT_STDERR is set to regular file). (Jani)</li>
    <li><?php bugfix(48202); ?> (Out of Memory error message when passing invalid file path) (Pierre)</li>
    <li><?php bugfix(48156); ?> (Added support for lcov v1.7). (Ilia)</li>
    <li><?php bugfix(48132); ?> (configure check for curl ssl support fails with --disable-rpath). (Jani)</li>
    <li><?php bugfix(48131); ?> (Don't try to bind ipv4 addresses to ipv6 ips via bindto). (Ilia)</li>
    <li><?php bugfix(48070); ?> (PDO_OCI: Segfault when using persistent connection). (Pierre, Matteo, jarismar dot php at gmail dot com)</li>
    <li><?php bugfix(48058); ?> (Year formatter goes wrong with out-of-int range). (Derick)</li>
    <li><?php bugfix(48038); ?> (odbc_execute changes variables used to form params array). (Felipe)</li>
    <li><?php bugfix(47997); ?> (stream_copy_to_stream returns 1 on empty streams). (Arnaud)</li>
    <li><?php bugfix(47991); ?> (SSL streams fail if error stack contains items). (Mikko)</li>
    <li><?php bugfix(47981); ?> (error handler not called regardless). (Hannes)</li>
    <li><?php bugfix(47969); ?> (ezmlm_hash() returns different values depend on OS). (Ilia)</li>
    <li><?php bugfix(47946); ?> (ImageConvolution overwrites background). (Ilia)</li>
    <li><?php bugfix(47940); ?> (memory leaks in imap_body). (Pierre, Jake Levitt)</li>
    <li><?php bugfix(47937); ?> (system() calls sapi_flush() regardless of output buffering). (Ilia)</li>
    <li><?php bugfix(47903); ?> (&quot;@&quot; operator does not work with string offsets). (Felipe)</li>
    <li><?php bugfix(47893); ?> (CLI aborts on non blocking stdout). (Arnaud)</li>
    <li><?php bugfix(47849); ?> (Non-deep import loses the namespace). (Rob)</li>
    <li><?php bugfix(47845); ?> (PDO_Firebird omits first row from query). (Lars W)</li>
    <li><?php bugfix(47836); ?> (array operator [] inconsistency when the array has PHP_INT_MAX index value). (Matt)</li>
    <li><?php bugfix(47831); ?> (Compile warning for strnlen() in main/spprintf.c). (Ilia, rainer dot jung at kippdata dot de)</li>
    <li><?php bugfix(47828); ?> (openssl_x509_parse() segfaults when a UTF-8 conversion fails). (Scott, Kees Cook, Pierre)</li>
    <li><?php bugfix(47818); ?> (Segfault due to bound callback param). (Felipe)</li>
    <li><?php bugfix(47801); ?> (__call() accessed via parent:: operator is provided incorrect method name). (Felipe)</li>
    <li><?php bugfix(47769); ?> (Strange extends PDO). (Felipe)</li>
    <li><?php bugfix(47745); ?> (FILTER_VALIDATE_INT doesn't allow minimum integer). (Dmitry)</li>
    <li><?php bugfix(47721); ?> (Alignment issues in mbstring and sysvshm extension) (crrodriguez at opensuse dot org, Ilia)</li>
    <li><?php bugfix(47704); ?> (PHP crashes on some &quot;bad&quot; operations with string offsets). (Dmitry)</li>
    <li><?php bugfix(47695); ?> (build error when xmlrpc and iconv are compiled against different iconv versions). (Scott)</li>
    <li><?php bugfix(47667); ?> (ZipArchive::OVERWRITE seems to have no effect). (Mikko, Pierre)</li>
    <li><?php bugfix(47644); ?> (Valid integers are truncated with json_decode()). (Scott)</li>
    <li><?php bugfix(47639); ?> (pg_copy_from() WARNING: nonstandard use of \\ in a string literal). (Ilia)</li>
    <li><?php bugfix(47616); ?> (curl keeps crashing). (Felipe)</li>
    <li><?php bugfix(47598); ?> (FILTER_VALIDATE_EMAIL is locale aware). (Ilia)</li>
    <li><?php bugfix(47566); ?> (pcntl_wexitstatus() returns signed status). (patch by james at jamesreno dot com)</li>
    <li><?php bugfix(47564); ?> (unpacking unsigned long 32bit bit endian returns wrong result). (Ilia)</li>
    <li><?php bugfix(47487); ?> (performance degraded when reading large chunks after fix of bug <?php bugl(44607); ?>). (Arnaud)</li>
    <li><?php bugfix(47468); ?> (enable cli|cgi-only extensions for embed sapi). (Jani)</li>
    <li><?php bugfix(47435); ?> (FILTER_FLAG_NO_PRIV_RANGE does not work with ipv6 addresses in the filter extension). (Ilia)</li>
    <li><?php bugfix(47430); ?> (Errors after writing to nodeValue parameter of an absent  previousSibling). (Rob)</li>
    <li><?php bugfix(47365); ?> (ip2long() may allow some invalid values on certain 64bit   systems). (Ilia)</li>
    <li><?php bugfix(47254); ?> (Wrong Reflection for extends class). (Felipe)</li>
    <li><?php bugfix(47042); ?> (cgi sapi is incorrectly removing SCRIPT_FILENAME). (Sriram Natarajan, David Soria Parra)</li>
    <li><?php bugfix(46882); ?> (Serialize / Unserialize misbehaviour under OS with different bit numbers). (Matt)</li>
    <li><?php bugfix(46812); ?> (get_class_vars() does not include visible private variable looking at subclass). (Arnaud)</li>
    <li><?php bugfix(46386); ?> (Digest authentication with SOAP module fails against MSSQL  SOAP services). (Ilia, lordelph at gmail dot com)</li>
    <li><?php bugfix(46109); ?> (Memory leak when mysqli::init() is called multiple times). (Andrey)</li>
    <li><?php bugfix(45997); ?> (safe_mode bypass with exec/system/passthru (windows only)). (Pierre)</li>
    <li><?php bugfix(45877); ?> (Array key '2147483647' left as string). (Matt)</li>
    <li><?php bugfix(45822); ?> (Near infinite-loops while parsing huge relative offsets). (Derick, Mike Sullivan)</li>
    <li><?php bugfix(45799); ?> (imagepng() crashes on empty image). (Martin McNickle, Takeshi Abe)</li>
    <li><?php bugfix(45622); ?> (isset($arrayObject-&gt;p) misbehaves with ArrayObject:: ARRAY_AS_PROPS set). (robin_fernandes at uk dot ibm dot com, Arnaud)</li>
    <li><?php bugfix(45614); ?> (ArrayIterator::current(), ::key() can show 1st private prop of wrapped object). (robin_fernandes at uk dot ibm dot com, Arnaud)</li>
    <li><?php bugfix(45540); ?> (stream_context_create creates bad http request). (Arnaud)</li>
    <li><?php bugfix(45202); ?> (zlib.output_compression can not be set with ini_set()). (Jani)</li>
    <li><?php bugfix(45191); ?> (error_log ignores date.timezone php.ini val when setting logging timestamps). (Derick)</li>
    <li><?php bugfix(45092); ?> (header HTTP context option not being used when compiled using --with-curlwrappers). (Jani)</li>
    <li><?php bugfix(44996); ?> (xmlrpc_decode() ignores time zone on iso8601.datetime). (Ilia, kawai at apache dot org) </li>
    <li><?php bugfix(44827); ?> (define() is missing error checks for class constants). (Ilia)</li>
    <li><?php bugfix(44214); ?> (Crash using preg_replace_callback() and global variables). (Nuno, Scott)</li>
    <li><?php bugfix(43073); ?> (TrueType bounding box is wrong for angle&lt;&gt;0). (Martin McNickle)</li>
    <li><?php bugfix(42663); ?> (gzinflate() try to allocate all memory with truncated data). (Arnaud)</li>
    <li><?php bugfix(42414); ?> (some odbc_*() functions incompatible with Oracle ODBC  driver). (jhml at gmx dot net)</li>
    <li><?php bugfix(42362); ?> (HTTP status codes 204 and 304 should not be gzipped). (Scott, Edward Z. Yang)</li>
    <li><?php bugfix(42143); ?> (The constant NAN is reported as 0 on Windows) (Kanwaljeet Singla, Venkat Raman Don)</li>
    <li><?php bugfix(38805); ?> (PDO truncates text from SQL Server text data type field). (Steph)</li>
</ul>
<!-- }}} --></section>

<section class="version" id="5.2.9"><!-- {{{ 5.2.9 -->
<h3>Version 5.2.9</h3>
<?php release_date('26-Feb-2009'); ?>
<ul>
	<li>Security Fixes
		<ul>
			<li>Fixed security issue in imagerotate(), background colour isn't validated correctly with a non truecolour image. Reported by Hamid Ebadi, APA Laboratory (Fixes CVE-2008-5498). (Scott)</li>
			<li>Fixed a crash on extract in zip when files or directories entry names contain  a relative path. (Pierre)</li>
			<li>Fixed explode() behavior with empty string to respect negative limit. (Shire)</li>
			<li>Fixed a segfault when malformed string is passed to json_decode(). (Scott)</li>
			<li>Fixed bug in xml_error_string() which resulted in messages being off by one. (Scott)</li>
		</ul>
	</li>

	<li>Changed __call() to be invoked on private/protected method access, similar to properties and __get(). (Andrei)</li>
	<li>Added optional sorting type flag parameter to array_unique(). Default is SORT_REGULAR. (Andrei)</li>
	<li>Fixed zip filename property read. (Pierre)</li>
	<li>Fixed error conditions handling in stream_filter_append(). (Arnaud)</li>

        <li><?php bugfix(47422); ?> (modulus operator returns incorrect results on 64 bit linux). (Matt)</li>
        <li><?php bugfix(47399); ?> (mb_check_encoding() returns true for some illegal SJIS characters). (for-bugs at hnw dot jp, Moriyoshi)</li>
        <li><?php bugfix(47353); ?> (crash when creating a lot of objects in object destructor). (Tony)</li>
        <li><?php bugfix(47322); ?> (sscanf %d doesn't work). (Felipe)</li>
        <li><?php bugfix(47282); ?> (FILTER_VALIDATE_EMAIL is marking valid email addresses as invalid). (Ilia)</li>
        <li><?php bugfix(47220); ?> (segfault in dom_document_parser in recovery mode). (Rob)</li>
        <li><?php bugfix(47217); ?> (content-type is not set properly for file uploads). (Ilia)</li>
        <li><?php bugfix(47174); ?> (base64_decode() interprets pad char in mid string as terminator). (Ilia)</li>
        <li><?php bugfix(47165); ?> (Possible memory corruption when passing return value by reference). (Dmitry)</li>
        <li><?php bugfix(47152); ?> (gzseek/fseek using SEEK_END produces strange results). (Felipe)</li>
        <li><?php bugfix(47131); ?> (SOAP Extension ignores &quot;user_agent&quot; ini setting). (Ilia)</li>
        <li><?php bugfix(47109); ?> (Memory leak on $a-&gt;{&quot;a&quot;.&quot;b&quot;} when $a is not an object). (Etienne, Dmitry)</li>
        <li><?php bugfix(47104); ?> (Linking shared extensions fails with icc). (Jani)</li>
        <li><?php bugfix(47049); ?> (SoapClient::__soapCall causes a segmentation fault). (Dmitry)</li>
        <li><?php bugfix(47048); ?> (Segfault with new pg_meta_data). (Felipe)</li>
        <li><?php bugfix(47042); ?> (PHP cgi sapi is removing SCRIPT_FILENAME for non apache). (Sriram Natarajan)</li>
        <li><?php bugfix(47037); ?> (No error when using fopen with empty string). (Cristian Rodriguez R., Felipe)</li>
        <li><?php bugfix(47035); ?> (dns_get_record returns a garbage byte at the end of a TXT record). (Felipe)</li>
        <li><?php bugfix(47027); ?> (var_export doesn't show numeric indices on ArrayObject). (Derick)</li>
        <li><?php bugfix(46985); ?> (OVERWRITE and binary mode does not work, regression introduced in 5.2.8). (Pierre)</li>
        <li><?php bugfix(46973); ?> (IPv6 address filter rejects valid address). (Felipe)</li>
        <li><?php bugfix(46964); ?> (Fixed pdo_mysql build with older version of MySQL). (Ilia)</li>
        <li><?php bugfix(46959); ?> (Unable to disable PCRE). (Scott)</li>
        <li><?php bugfix(46918); ?> (imap_rfc822_parse_adrlist host part not filled in correctly). (Felipe)</li>
        <li><?php bugfix(46889); ?> (Memory leak in strtotime()). (Derick)</li>
        <li><?php bugfix(46887); ?> (Invalid calls to php_error_docref()). (oeriksson at mandriva dot com, Ilia)</li>
        <li><?php bugfix(46873); ?> (extract($foo) crashes if $foo['foo'] exists). (Arnaud)</li>
        <li><?php bugfix(46843); ?> (CP936 euro symbol is not converted properly). (ty_c at cybozuy dot co dot jp, Moriyoshi)</li>
        <li><?php bugfix(46798); ?> (Crash in mssql extension when retrieving a NULL value inside a binary or image column type). (Ilia)</li>
        <li><?php bugfix(46782); ?> (fastcgi.c parse error). (Matt)</li>
        <li><?php bugfix(46760); ?> (SoapClient doRequest fails when proxy is used). (Felipe)</li>
        <li><?php bugfix(46748); ?> (Segfault when an SSL error has more than one error). (Scott)</li>
        <li><?php bugfix(46739); ?> (array returned by curl_getinfo should contain content_type key). (Mikko)</li>
        <li><?php bugfix(46699); ?> (xml_parse crash when parser is namespace aware). (Rob)</li>
        <li><?php bugfix(46419); ?> (Elements of associative arrays with NULL value are lost). (Dmitry)</li>
        <li><?php bugfix(46282); ?> (Corrupt DBF When Using DATE). (arne at bukkie dot nl)</li>
        <li><?php bugfix(46026); ?> (bz2.decompress/zlib.inflate filter tries to decompress after end of stream). (Greg)</li>
        <li><?php bugfix(46005); ?> (User not consistently logged under Apache2). (admorten at umich dot edu, Stas)</li>
        <li><?php bugfix(45996); ?> (libxml2 2.7 causes breakage with character data in xml_parse()). (Rob)</li>
        <li><?php bugfix(45940); ?> (MySQLI OO does not populate connect_error property on failed connect). (Johannes)</li>
        <li><?php bugfix(45923); ?> (mb_st[r]ripos() offset not handled correctly). (Moriyoshi)</li>
        <li><?php bugfix(45327); ?> (memory leak if offsetGet throws exception). (Greg)</li>
        <li><?php bugfix(45239); ?> (Encoding detector hangs with mbstring.strict_detection enabled). (Moriyoshi)</li>
        <li><?php bugfix(45161); ?> (Reusing a curl handle leaks memory). (Mark Karpeles, Jani)</li>
        <li><?php bugfix(44336); ?> (Improve pcre UTF-8 string matching performance). (frode at coretrek dot com, Nuno)</li>
        <li><?php bugfix(43841); ?> (mb_strrpos() offset is byte count for negative values). (Moriyoshi)</li>
        <li><?php bugfix(37209); ?> (mssql_execute with non fatal errors). (Kalle)</li>
        <li><?php bugfix(35975); ?> (Session cookie expires date format isn't the most compatible. Now matches that of setcookie()). (Scott)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.8"><!-- {{{ 5.2.8 -->
<h3>Version 5.2.8</h3>
<?php release_date('08-Dec-2008'); ?>
<ul>
	<li>Reverted bug fix <?php bugfix(42718); ?> that broke magic_quotes_gpc (Scott)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.2.7"><!-- {{{ 5.2.7 -->
<h3>Version 5.2.7</h3>
<?php release_date('04-Dec-2008'); ?>
<ul>
	<li>Security Fixes
		<ul>
			<li>Upgraded PCRE to version 7.8 (Fixes CVE-2008-2371) (Ilia)</li>
			<li>Fixed missing initialization of BG(page_uid) and BG(page_gid), reported by Maksymilian Arciemowicz. (Stas)</li>
			<li>Fixed incorrect php_value order for Apache configuration, reported by Maksymilian Arciemowicz. (Stas)</li>
			<li>Fixed a crash inside gd with invalid fonts (Fixes CVE-2008-3658). (Pierre)</li>
			<li>Fixed a possible overflow inside memnstr (Fixes CVE-2008-3659). (Laurent Gaffie)</li>
			<li>Fixed security issues detailed in CVE-2008-2665 and CVE-2008-2666. (Christian Hoffmann)</li>
			<li><?php bugfix(45151); ?> (Crash with URI/file..php (filename contains 2 dots)).(Fixes CVE-2008-3660) (Dmitry)</li>
			<li><?php bugfix(42862); ?> (IMAP toolkit crash: rfc822.c legacy routine buffer overflow). (Fixes CVE-2008-2829) (Dmitry)</li>
		</ul>
	</li>

<li>Updated timezone database to version 2008.9. (Derick)</li>
<li>Upgraded bundled libzip to 0.9.0. (Pierre)</li>

<li>Added logging option for error_log to send directly to SAPI. (Stas)</li>
<li>Added PHP_MAJOR_VERSION, PHP_MINOR_VERSION, PHP_RELEASE_VERSION,PHP_EXTRA_VERSION, PHP_VERSION_ID, PHP_ZTS and PHP_DEBUG constants. (Pierre)</li>
<li>Added &quot;PHP_INI_SCAN_DIR&quot; environment variable which can be used to either disable or change the compile time ini scan directory (FR <?php bugfix(45114); ?>). (Jani)</li>

<li>Fixed memory leak inside sqlite_create_aggregate(). (Felipe)</li>
<li>Fixed memory leak inside PDO sqlite's sqliteCreateAggregate() method. (Felipe)</li>
<li>Fixed memory leak inside readline_callback_handler_remove() function. (Felipe)</li>
<li>Fixed sybase_fetch_*() to continue reading after CS_ROW_FAIL status (Timm)</li>
<li>Fixed a bug inside dba_replace() that could cause file truncation with invalid keys. (Ilia)</li>
<li>Fixed memory leak inside readline_callback_handler_install() function. (Ilia)</li>
<li>Fixed memory leak inside readline_completion_function() function. (Felipe) </li>
<li>Fixed stream_get_contents() when using $maxlength and socket is not closed. indeyets [at] php [dot] net on <?php bugfix(46049); ?>. (Arnaud)</li>
<li>Fixed stream_get_line() to behave as documented on non-blocking streams. (Arnaud)</li>
<li>Fixed endless loop in PDOStatement::debugDumpParams().(jonah.harris at gmail dot com)</li>
<li>Fixed ability to use &quot;internal&quot; heaps in extensions. (Arnaud, Dmitry)</li>
<li>Fixed weekdays adding/subtracting algorithm. (Derick)</li>
<li>Fixed some ambiguities in the date parser. (Derick)</li>
<li>Fixed a bug with the YYYY-MM format not resetting the day correctly. (Derick)</li>
<li>Fixed a bug in the DateTime->modify() methods, it would not use the advanced relative time strings. (Derick)</li>
<li>Fixed extraction of zip files or directories when the entry name is a relative path. (Pierre)</li>
<li>Fixed read or write errors for large zip archives. (Pierre)</li>
<li>Fixed simplexml asXML() not to lose encoding when dumping entire document to file. (Ilia)</li>
<li>Fixed a crash inside PDO when trying instantiate PDORow manually. (Felipe)</li>
<li>Fixed build failure of ext/mysqli with libmysql 6.0 - missing rpl functions. (Andrey)</li>
<li>Fixed a regression when using strip_tags() and &lt; is within an attribute. (Scott)</li>
<li>Fixed a crash on invalid method in ReflectionParameter constructor. (Christian Seiler)</li>
<li>Reverted fix for bug <?php bugfix(44197); ?> due to behaviour change in minor version. (Felipe)</li>

<li><?php bugfix(46732); ?> (mktime.year description is wrong). (Derick)</li>
<li><?php bugfix(46696); ?> (cURL fails in upload files with specified content-type). (Ilia)</li>
<li><?php bugfix(46673); ?> (stream_lock call with wrong parameter). (Arnaud)</li>
<li><?php bugfix(46649); ?> (Setting array element with that same array produces inconsistent results). (Arnaud)</li>
<li><?php bugfix(46626); ?> (mb_convert_case does not handle apostrophe correctly). (Ilia)</li>
<li><?php bugfix(46543); ?> (ibase_trans() memory leaks when using wrong parameters). (Felipe)</li>
<li><?php bugfix(46521); ?> (Curl ZTS OpenSSL, error in config.m4 fragment). (jd at cpanel dot net)</li>
<li><?php bugfix(46496); ?> (wddx_serialize treats input as ISO-8859-1). (Mark Karpeles)</li>
<li><?php bugfix(46427); ?> (SoapClient() stumbles over its &quot;stream_context&quot; parameter). (Dmitry, Herman Radtke)</li>
<li><?php bugfix(46426); ?> (offset parameter of stream_get_contents() does not workfor &quot;0&quot;). (Felipe)</li>
<li><?php bugfix(46406); ?> (Unregistering nodeclass throws E_FATAL). (Rob)</li>
<li><?php bugfix(46389); ?> (NetWare needs small patch for _timezone). (patch by guenter@php.net)</li>
<li><?php bugfix(46388); ?> (stream_notification_callback inside of object destroys object variables). (Felipe)</li>
<li><?php bugfix(46381); ?> (wrong $this passed to internal methods causes segfault). (Tony)</li>
<li><?php bugfix(46379); ?> (Infinite loop when parsing '#' in one line file). (Arnaud)</li>
<li><?php bugfix(46366); ?> (bad cwd with / as pathinfo). (Dmitry)</li>
<li><?php bugfix(46360); ?> (TCP_NODELAY constant for socket_{get,set}_option). (bugs at trick dot vanstaveren dot us)</li>
<li><?php bugfix(46343); ?> (IPv6 address filter accepts invalid address). (Ilia)</li>
<li><?php bugfix(46335); ?> (DOMText::splitText doesn't handle multibyte characters). (Rob)</li>
<li><?php bugfix(46323); ?> (compilation of simplexml for NetWare breaks). (Patch by guenter@php.net)</li>
<li><?php bugfix(46319); ?> (PHP sets default Content-Type header for HTTP 304 response code, in cgi sapi). (Ilia)</li>
<li><?php bugfix(46313); ?> (Magic quotes broke $_FILES). (Arnaud)</li>
<li><?php bugfix(46308); ?> (Invalid write when changing property from inside getter). (Dmitry)</li>
<li><?php bugfix(46292); ?> (PDO::setFetchMode() shouldn't requires the 2nd arg when using FETCH_CLASSTYPE). (Felipe)</li>
<li>Fixed bugs <?php bugl(46274); ?>, <?php bugl(46249); ?> (pdo_pgsql always fill in NULL for empty BLOB and segfaults when returned by SELECT). (Felipe)</li>
<li><?php bugfix(46271); ?> (local_cert option is not resolved to full path). (Ilia)</li>
<li><?php bugfix(46247); ?> (ibase_set_event_handler() is allowing to pass callback without event). (Felipe)</li>
<li><?php bugfix(46246); ?> (difference between call_user_func(array($this, $method))and $this->$method()). (Dmitry)</li>
<li><?php bugfix(46222); ?> (ArrayObject EG(uninitialized_var_ptr) overwrite). (Etienne)</li>
<li><?php bugfix(46215); ?> (json_encode mutates its parameter and has some class-specific state). (Felipe)</li>
<li><?php bugfix(46206); ?> (pg_query_params/pg_execute convert passed values to strings). (Ilia)</li>
<li><?php bugfix(46191); ?> (BC break: DOMDocument saveXML() doesn't accept null). (Rob)</li>
<li><?php bugfix(46164); ?> (stream_filter_remove() closes the stream). (Arnaud)</li>
<li><?php bugfix(46157); ?> (PDOStatement::fetchObject prototype error). (Felipe)</li>
<li><?php bugfix(46147); ?> (after stream seek, appending stream filter reads incorrect data). (Greg)</li>
<li><?php bugfix(46139); ?> (PDOStatement->setFetchMode() forgets FETCH_PROPS_LATE). (chsc at peytz dot dk, Felipe)</li>
<li><?php bugfix(46127); ?> (php_openssl_tcp_sockop_accept forgets to set context on accepted stream). (Mark Karpeles, Pierre)</li>
<li><?php bugfix(46110); ?> (XMLWriter - openmemory() and openuri() leak memory on multiple calls). (Ilia)</li>
<li><?php bugfix(46088); ?> (RegexIterator::accept - segfault). (Felipe)</li>
<li><?php bugfix(46082); ?> (stream_set_blocking() can cause a crash in some circumstances). (Felipe)</li>
<li><?php bugfix(46064); ?> (Exception when creating ReflectionProperty object on dynamicly created property). (Felipe)</li>
<li><?php bugfix(46059); ?> (Compile failure under IRIX 6.5.30 building posix.c). (Arnaud)</li>
<li><?php bugfix(46053); ?> (SplFileObject::seek - Endless loop). (Arnaud)</li>
<li><?php bugfix(46051); ?> (SplFileInfo::openFile - memory overlap). (Arnaud)</li>
<li><?php bugfix(46047); ?> (SimpleXML converts empty nodes into object with nested array). (Rob)</li>
<li><?php bugfix(46031); ?> (Segfault in AppendIterator::next). (Arnaud)</li>
<li><?php bugfix(46029); ?> (Segfault in DOMText when using with Reflection). (Rob)</li>
<li><?php bugfix(46026); ?> (bzip2.decompress/zlib.inflate filter tries to decompress after end of stream). (Keisial at gmail dot com, Greg)</li>
<li><?php bugfix(46024); ?> (stream_select() doesn't return the correct number).(Arnaud)</li>
<li><?php bugfix(46010); ?> (warnings incorrectly generated for iv in ecb mode). (Felipe)</li>
<li><?php bugfix(46003); ?> (isset on nonexisting node return unexpected results). (Rob)</li>
<li><?php bugfix(45956); ?> (parse_ini_file() does not return false with syntax errors in parsed file). (Jani)</li>
<li><?php bugfix(45901); ?> (wddx_serialize_value crash with SimpleXMLElement object).(Rob)</li>
<li><?php bugfix(45862); ?> (get_class_vars is inconsistent with 'protected' and 'private' variables). (ilewis at uk dot ibm dot com, Felipe)</li>
<li><?php bugfix(45860); ?> (header() function fails to correctly replace all Status lines). (Dmitry)</li>
<li><?php bugfix(45805); ?> (Crash on throwing exception from error handler). (Dmitry)</li>
<li><?php bugfix(45765); ?> (ReflectionObject with default parameters of self::xxx cause an error). (Felipe)</li>
<li><?php bugfix(45751); ?> (Using auto_prepend_file crashes (out of scope stack address use)). (basant dot kukreja at sun dot com) </li>
<li><?php bugfix(45722); ?> (mb_check_encoding() crashes). (Moriyoshi)</li>
<li><?php bugfix(45705); ?> (rfc822_parse_adrlist() modifies passed address parameter). (Jani)</li>
<li><?php bugfix(45691); ?> (Some per-dir or runtime settings may leak into other requests). (Moriyoshi)</li>
<li><?php bugfix(45581); ?> (htmlspecialchars() double encoding &amp;#x hex items). (Arnaud)</li>
<li><?php bugfix(45580); ?> (levenshtein() crashes with invalid argument). (Ilia)</li>
<li><?php bugfix(45575); ?> (Segfault with invalid non-string as event handler callback). (Christian Seiler)</li>
<li><?php bugfix(45568); ?> (ISAPI doesn't properly clear auth_digest in header). (Patch by: navara at emclient dot com)</li>
<li><?php bugfix(45556); ?> (Return value from callback isn't freed). (Felipe)</li>
<li><?php bugfix(45555); ?> (Segfault with invalid non-string as register_introspection_callback). (Christian Seiler)</li>
<li><?php bugfix(45553); ?> (Using XPath to return values for attributes with a namespace does not work). (Rob)</li>
<li><?php bugfix(45529); ?> (new DateTimeZone() and date_create()-&gt;getTimezone() behave different). (Derick)</li>
<li><?php bugfix(45522); ?> (FCGI_GET_VALUES request does not return supplied values). (Arnaud)</li>
<li><?php bugfix(45486); ?> (mb_send_mail(); header 'Content-Type: text/plain; charset=' parsing incorrect). (Felipe)</li>
<li><?php bugfix(45485); ?> (strip_tags and &lt;?XML tag). (Felipe)</li>
<li><?php bugfix(45460); ?> (imap patch for fromlength fix in imap_headerinfo doesn't accept lengths of 1024). (Felipe, andrew at lifescale dot com)</li>
<li><?php bugfix(45449); ?> (filesize() regression using ftp wrapper). (crrodriguez at suse dot de)</li>
<li><?php bugfix(45423); ?> (fastcgi parent process doesn't invoke php_module_shutdown before shutdown). (basant dot kukreja at sun dot com)</li>
<li><?php bugfix(45406); ?> (session.serialize_handler declared by shared extension fails). (Kalle, oleg dot grenrus at dynamoid dot com)</li>
<li><?php bugfix(45405); ?> (snmp extension memory leak). (Federico Cuello, Rodrigo Campos)</li>
<li><?php bugfix(45392); ?> (ob_start()/ob_end_clean() and memory_limit). (Arnaud)</li>
<li><?php bugfix(45382); ?> (timeout bug in stream_socket_enable_crypto). (Ilia)</li>
<li><?php bugfix(45373); ?> (php crash on query with errors in params). (Felipe)</li>
<li><?php bugfix(45352); ?> (Segmentation fault because of tick function on second request). (Dmitry)</li>
<li><?php bugfix(45312); ?> (Segmentation fault on second request for array functions). (Dmitry)</li>
<li><?php bugfix(45303); ?> (Opening php:// wrapper in append mode results in a warning). (Arnaud)</li>
<li><?php bugfix(45251); ?> (double free or corruption with setAttributeNode()). (Rob)</li>
<li>Fixed bugs <?php bugl(45226); ?>, <?php bugl(18916); ?> (xmlrpc_set_type() segfaults and wrong behavior with valid ISO8601 date string). (Jeff Lawsons)</li>
<li><?php bugfix(45220); ?> (curl_read callback returns -1 when needs to return size_t (unsigned)). (Felipe)</li>
<li><?php bugfix(45181); ?> (chdir() should clear relative entries in stat cache). (Arnaud)</li>
<li><?php bugfix(45178); ?> (memory corruption on assignment result of &quot;new&quot; by reference). (Dmitry)</li>
<li><?php bugfix(45166); ?> (substr() overflow changes). (Felipe)</li>
<li><?php bugfix(45139); ?> (ReflectionProperty returns incorrect declaring class).(Felipe)</li>
<li><?php bugfix(45124); ?> ($_FILES['upload']['size'] sometimes return zero and sometimes the filesize). (Arnaud)</li>
<li><?php bugfix(45028); ?> (CRC32 output endianness is different between crc32() and hash()). (Tony)</li>
<li><?php bugfix(45004); ?> (pg_insert() does not accept 4 digit timezone format). (Ilia)</li>
<li><?php bugfix(44991); ?> (Compile Failure With freetds0.82). (jklowden at freetds dot org, matthias at dsx dot at)</li>
<li><?php bugfix(44938); ?> (gettext functions crash with overly long domain). (Christian Schneider, Ilia)</li>
<li><?php bugfix(44925); ?> (preg_grep() modifies input array). (Nuno)</li>
<li><?php bugfix(44900); ?> (OpenSSL extension fails to link with OpenSSL 0.9.6). (jd at cpanel dot net, Pierre)</li>
<li><?php bugfix(44891); ?> Memory leak using registerPHPFunctions and XSLT Variable as function parameter. (Rob)</li>
<li><?php bugfix(44882); ?> (SOAP extension object decoding bug). (Dmitry)</li>
<li><?php bugfix(44830); ?> (Very minor issue with backslash in heredoc). (Matt)</li>
<li><?php bugfix(44818); ?> (php://memory writeable when opened read only). (Arnaud)</li>
<li><?php bugfix(44811); ?> (Improve error message when creating a new SoapClient that contains invalid data). (Markus Fischer, David C)</li>
<li><?php bugfix(44798); ?> (Memory leak assigning value to attribute). (Ilia)</li>
<li><?php bugfix(44716); ?> (Progress notifications incorrect). (Hannes)</li>
<li><?php bugfix(44712); ?> (stream_context_set_params segfaults on invalid arguments). (Hannes)</li>
<li><?php bugfix(44617); ?> (wrong HTML entity output when substitute_character=entity). (Moriyoshi)</li>
<li><?php bugfix(44607); ?> (stream_get_line unable to correctly identify the &quot;ending&quot; in the stream content). (Arnaud)</li>
<li><?php bugfix(44425); ?> (Extending PDO/MySQL class with a __call() function doesn'twork). (Johannes)</li>
<li><?php bugfix(44327); ?> (PDORow::queryString property &amp; numeric offsets / Crash). (Felipe)</li>
<li>Fixed bugs <?php bugl(44251); ?>, <?php bugl(41125); ?> (PDO + quote() + prepare() can result in segfault). (tsteiner at nerdclub dot net)</li>
<li><?php bugfix(44246); ?> (closedir() accepts a file resource opened by fopen()). (Dmitry, Tony)</li>
<li><?php bugfix(44182); ?> (extract($a, EXTR_REFS) can fail to split copy-on-write references). (robin_fernandes at uk dot ibm dot com)</li>
<li><?php bugfix(44181); ?> (extract($a, EXTR_OVERWRITE|EXTR_REFS) can fail to create references to $a). (robin_fernandes at uk dot ibm dot com)</li>
<li><?php bugfix(44127); ?> (UNIX abstract namespace socket connect does not work). (Jani)</li>
<li><?php bugfix(43993); ?> (mb_substr_count() behaves differently to substr_count() with overlapping needles). (Moriyoshi)</li>
<li><?php bugfix(43958); ?> (class name added into the error message). (Dmitry)</li>
<li><?php bugfix(43941); ?> (json_encode silently cuts non-UTF8 strings). (Stas)</li>
<li><?php bugfix(43925); ?> (Incorrect argument counter in prepared statements with pgsql). (Felipe)</li>
<li><?php bugfix(43731); ?> (socket_getpeername: cannot use on stdin with inetd). (Arnaud)</li>
<li><?php bugfix(43723); ?> (SOAP not sent properly from client for &lt;choice&gt;). (Dmitry)</li>
<li><?php bugfix(43668); ?> (Added odbc.default_cursortype to control the ODBCcursor model). (Patrick)</li>
<li><?php bugfix(43666); ?> (Fixed code to use ODBC 3.52 datatypes for 64bit systems). (Patrick)</li>
<li><?php bugfix(43540); ?> (rfc1867 handler newlength problem). (Arnaud)</li>
<li><?php bugfix(43452); ?> (strings containing a weekday, or a number plus weekday behaved incorrect of the current day-of-week was the same as the one in the phrase).(Derick)</li>
<li><?php bugfix(43353); ?> (wrong detection of 'data' wrapper causes notice). (gk at gknw dot de, Arnaud)</li>
<li><?php bugfix(43053); ?> (Regression: some numbers shown in scientific notation). (int-e at gmx dot de)</li>
<li><?php bugfix(43045); ?> (SOAP encoding violation on &quot;INF&quot; for type double/float). (Dmitry)</li>
<li><?php bugfix(42855); ?> (dns_get_record() doesn't return all text from TXT record). (a dot u dot savchuk at gmail dot com)</li>
<li><?php bugfix(42737); ?> (preg_split('//u') triggers a E_NOTICE with newlines). (Nuno)</li>
<li><?php bugfix(42718); ?> (FILTER_UNSAFE_RAW not applied when configured as default filter). (Arnaud)</li>
<li><?php bugfix(42604); ?> (&quot;make test&quot; fails with --with-config-file-scan-dir=path). (Jani)</li>
<li><?php bugfix(42473); ?> (ob_start php://output and headers). (Arnaud)</li>
<li><?php bugfix(42318); ?> (problem with nm on AIX, not finding object files). (Dmitry)</li>
<li><?php bugfix(42294); ?> (Unified solution for round() based on C99 round). (Ilia)</li>
<li><?php bugfix(42078); ?> (pg_meta_data mix tables metadata from different schemas). (Felipe)</li>
<li><?php bugfix(41348); ?> (OCI8: allow compilation with Oracle 8.1). (Chris Jones)</li>
<li><?php bugfix(41033); ?> (enable signing with DSA keys. (gordyf at google dot com, Pierre)</li>
<li><?php bugfix(37100); ?> (data is returned truncated with BINARY CURSOR). (Tony)</li>
<li><?php bugfix(30312); ?> (crash in sybase_unbuffered_query() function). (Timm)</li>
<li><?php bugfix(24679); ?> (pg_* functions doesn't work using schema). (Felipe)</li>
<li><?php peclbugfix(14962); ?> (::extractTo 2nd argument is not really optional). (Mark van Der Velden)</li>
<li><?php bugfix(14032); ?> (Mail() always returns false but mail is sent). (Mikko)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.6"><!-- {{{ 5.2.6 -->
<h3>Version 5.2.6</h3>
<?php release_date('01-May-2008'); ?>
<ul>
	<li>Security Fixes
		<ul>
			<li>Fixed possible stack buffer overflow in FastCGI SAPI. (Andrei Nigmatulin)</li>
			<li>Properly address incomplete multibyte chars inside escapeshellcmd() (Ilia, Stefan Esser)</li>
			<li>Fixed security issue detailed in CVE-2008-0599. (Rasmus)</li>
			<li>Fixed a safe_mode bypass in cURL identified by Maksymilian Arciemowicz. (Ilia)</li>
			<li>Upgraded PCRE to version 7.6 (Nuno)</li>
		</ul>
	</li>
<li>Fixed two possible crashes inside posix extension (Tony)</li>
<li>Fixed incorrect heredoc handling when label is used within the block.  (Matt)</li>
<li>Fixed sending of uninitialized paddings which may contain some information. (Andrei Nigmatulin)</li>
<li>Fixed a bug in formatting timestamps when DST is active in the default timezone (Derick)</li>
<li>Fix integer overflow in printf(). (Stas, Maksymilian Aciemowicz)</li>
<li>Fixed potential memleak in stream filter parameter for zlib filter. (Greg)</li>
<li>Added Reflection API metadata for the methods of the DOM classes. (Sebastian)</li>
<li>Fixed weird behavior in CGI parameter parsing. (Dmitry, Hannes Magnusson)</li>
<li>Fixed a bug with PDO::FETCH_COLUMN|PDO::FETCH_GROUP mode when a column # by which to group by data is specified. (Ilia)</li>
<li>Fixed segfault in filter extension when using callbacks. (Arnar Mar Sig, Felipe)</li>
<li>Fixed faulty fix for bug <?php bugfix(40189); ?> (endless loop in zlib.inflate stream filter). (Greg)</li>

<li><?php bugfix(44742); ?> (timezone_offset_get() causes segmentation faults). (Derick)</li>
<li><?php bugfix(44720); ?> (Prevent crash within session_register()). (Scott)</li>
<li><?php bugfix(44703); ?> (htmlspecialchars() does not detect bad character set argument). (Andy Wharmby)</li>
<li><?php bugfix(44673); ?> (With CGI argv/argc starts from arguments, not from script) (Dmitry)</li>
<li><?php bugfix(44667); ?> (proc_open() does not handle pipes with the mode 'wb' correctly). (Jani)</li>
<li><?php bugfix(44663); ?> (Crash in imap_mail_compose if "body" parameter invalid). (Ilia)</li>
<li><?php bugfix(44650); ?> (escapeshellscmd() does not check arg count). (Ilia)</li>
<li><?php bugfix(44613); ?> (Crash inside imap_headerinfo()). (Ilia, jmessa)</li>
<li><?php bugfix(44603); ?> (Order issues with Content-Type/Length headers on POST). (Ilia)</li>
<li><?php bugfix(44594); ?> (imap_open() does not validate # of retries parameter). (Ilia)</li>
<li><?php bugfix(44591); ?> (imagegif's filename parameter). (Felipe)</li>
<li><?php bugfix(44557); ?> (Crash in imap_setacl when supplied integer as username) (Thomas Jarosch)</li>
<li><?php bugfix(44487); ?> (call_user_method_array issues a warning when throwing an exception). (David Soria Parra)</li>
<li><?php bugfix(44478); ?> (Inconsistent behaviour when assigning new nodes). (Rob, Felipe)</li>
<li><?php bugfix(44445); ?> (email validator does not handle domains starting/ending with a -). (Ilia)</li>
<li><?php bugfix(44440); ?> (st_blocks undefined under BeOS). (Felipe)</li>
<li><?php bugfix(44394); ?> (Last two bytes missing from output). (Felipe)</li>
<li><?php bugfix(44388); ?> (Crash inside exif_read_data() on invalid images) (Ilia)</li>
<li><?php bugfix(44373); ?> (PDO_OCI extension compile failed). (Felipe)</li>
<li><?php bugfix(44333); ?> (SEGFAULT when using mysql_pconnect() with client_flags). (Felipe)</li>
<li><?php bugfix(44306); ?> (Better detection of MIPS processors on Windows). (Ilia)</li>
<li><?php bugfix(44242); ?> (metaphone('CMXFXM') crashes PHP). (Felipe)</li>
<li><?php bugfix(44233); ?> (MSG_PEEK undefined under BeOS R5). (jonathonfreeman at gmail dot com, Ilia)</li>
<li><?php bugfix(44216); ?> (strftime segfaults on large negative value). (Derick)</li>
<li><?php bugfix(44209); ?> (strtotime() doesn't support 64 bit timestamps on 64 bit platforms). (Derick)</li>
<li><?php bugfix(44206); ?> (OCI8 selecting ref cursors leads to ORA-1000 maximum open cursors reached). (Oracle Corp.)</li>
<li><?php bugfix(44200); ?> (A crash in PDO when no bound targets exists and yet bound parameters are present). (Ilia)</li>
<li><?php bugfix(44197); ?> (socket array keys lost on socket_select). (Felipe)</li>
<li><?php bugfix(44191); ?> (preg_grep messes up array index). (Felipe)</li>
<li><?php bugfix(44189); ?> (PDO setAttribute() does not properly validate values for native numeric options). (Ilia)</li>
<li><?php bugfix(44184); ?> (Double free of loop-variable on exception). (Dmitry)</li>
<li><?php bugfix(44171); ?> (Invalid FETCH_COLUMN index does not raise an error). (Ilia)</li>
<li><?php bugfix(44166); ?> (Parameter handling flaw in PDO::getAvailableDrivers()). (Ilia)</li>
<li><?php bugfix(44159); ?> (Crash: $pdo->setAttribute(PDO::STATEMENT_ATTR_CLASS, NULL)). (Felipe)</li>
<li><?php bugfix(44152); ?> (Possible crash with syslog logging on ZTS builds). (Ilia)</li>
<li><?php bugfix(44141); ?> (private parent constructor callable through static function). (Dmitry)</li>
<li><?php bugfix(44113); ?> (OCI8 new collection creation can fail with OCI-22303). (Oracle Corp.)</li>
<li><?php bugfix(44069); ?> (Huge memory usage with concatenation using . instead of .=). (Dmitry)</li>
<li><?php bugfix(44046); ?> (crash inside array_slice() function with an invalid by-ref offset). (Ilia)</li>
<li><?php bugfix(44028); ?> (crash inside stream_socket_enable_crypto() when enabling encryption without crypto type). (Ilia)</li>
<li><?php bugfix(44018); ?> (RecursiveDirectoryIterator options inconsistancy). (Marcus)</li>
<li><?php bugfix(44008); ?> (OCI8 incorrect usage of OCI-Lob->close crashes PHP). (Oracle Corp.)</li>
<li><?php bugfix(43998); ?> (Two error messages returned for incorrect encoding for mb_strto[upper|lower]). (Rui)</li>
<li><?php bugfix(43994); ?> (mb_ereg 'successfully' matching incorrect). (Rui)</li>
<li><?php bugfix(43954); ?> (Memory leak when sending the same HTTP status code multiple times). (Scott)</li>
<li><?php bugfix(43927); ?> (koi8r is missing from html_entity_decode()). (andy at demos dot su, Tony)</li>
<li><?php bugfix(43912); ?> (Interbase column names are truncated to 31 characters). (Ilia)</li>
<li><?php bugfix(43875); ?> (Two error messages returned for $new and $flag argument in mysql_connect()). (Hannes)</li>
<li><?php bugfix(43863); ?> (str_word_count() breaks on cyrillic "ya" in locale cp1251). (phprus at gmail dot com, Tony)</li>
<li><?php bugfix(43841); ?> (mb_strrpos offset is byte count for negative values). (Rui)</li>
<li><?php bugfix(43840); ?> (mb_strpos bounds check is byte count rather than a character count). (Rui)</li>
<li><?php bugfix(43808); ?> (date_create never fails (even when it should)). (Derick)</li>
<li><?php bugfix(43793); ?> (zlib filter is unable to auto-detect gzip/zlib file headers). (Greg)</li>
<li><?php bugfix(43703); ?> (Signature compatibility check broken). (Dmitry)</li>
<li><?php bugfix(43677); ?> (Inconsistent behaviour of include_path set with php_value). (manuel at mausz dot at)</li>
<li><?php bugfix(43663); ?> (Extending PDO class with a __call() function doesn't work). (David Soria Parra)</li>
<li><?php bugfix(43647); ?> (Make FindFile use PATH_SEPARATOR instead of ";"). (Ilia)</li>
<li><?php bugfix(43635); ?> (mysql extension ingores INI settings on NULL values passed to mysql_connect()). (Ilia)</li>
<li><?php bugfix(43620); ?> (Workaround for a bug inside libcurl 7.16.2 that can result in a crash). (Ilia)</li>
<li><?php bugfix(43614); ?> (incorrect processing of numerical string keys of array in arbitrary serialized data). (Dmitriy Buldakov, Felipe)</li>
<li><?php bugfix(43606); ?> (define missing depencies of the exif extension). (crrodriguez at suse dot de)</li>
<li><?php bugfix(43589); ?> (a possible infinite loop in bz2_filter.c). (Greg)</li>
<li><?php bugfix(43580); ?> (removed bogus declaration of a non-existent php_is_url() function). (Ilia)</li>
<li><?php bugfix(43559); ?> (array_merge_recursive() doesn't behave as expected with duplicate NULL values). (Felipe, Tony)</li>
<li><?php bugfix(43533); ?> (escapeshellarg('') returns null). (Ilia)</li>
<li><?php bugfix(43527); ?> (DateTime created from a timestamp reports environment timezone). (Derick)</li>
<li><?php bugfix(43522); ?> (stream_get_line() eats additional characters). (Felipe, Ilia, Tony)</li>
<li><?php bugfix(43507); ?> (SOAPFault HTTP Status 500 - would like to be able to set the HTTP Status). (Dmitry)</li>
<li><?php bugfix(43505); ?> (Assign by reference bug). (Dmitry)</li>
<li><?php bugfix(43498); ?> (file_exists() on a proftpd server got SIZE not allowed in ASCII mode). (Ilia, crrodriguez at suse dot de)</li>
<li><?php bugfix(43497); ?> (OCI8 XML/getClobVal aka temporary LOBs leak UGA memory). (Chris)</li>
<li><?php bugfix(43495); ?> (array_merge_recursive() crashes with recursive arrays). (Ilia)</li>
<li><?php bugfix(43493); ?> (pdo_pgsql does not send username on connect when password is not available). (Ilia)</li>
<li><?php bugfix(43491); ?> (Under certain conditions, file_exists() never returns). (Dmitry)</li>
<li><?php bugfix(43483); ?> (get_class_methods() does not list all visible methods). (Dmitry)</li>
<li><?php bugfix(43482); ?> (array_pad() does not warn on very small pad numbers). (Ilia)</li>
<li><?php bugfix(43457); ?> (Prepared statement with incorrect parms doesn't throw exception with pdo_pgsql driver). (Ilia)</li>
<li><?php bugfix(43450); ?> (Memory leak on some functions with implicit object __toString() call). (David C.)</li>
<li><?php bugfix(43386); ?> (array_globals not reset to 0 properly on init). (Ilia)</li>
<li><?php bugfix(43377); ?> (PHP crashes with invalid argument for DateTimeZone). (Ilia)</li>
<li><?php bugfix(43373); ?> (pcntl_fork() should not raise E_ERROR on error). (Ilia)</li>
<li><?php bugfix(43364); ?> (recursive xincludes don't remove internal xml nodes properly). (Rob, patch from ddb@bitxtender.de)</li>
<li><?php bugfix(43301); ?> (mb_ereg*_replace() crashes when replacement string is invalid PHP expression and 'e' option is used). (Jani)</li>
<li><?php bugfix(43295); ?> (crash because of uninitialized SG(sapi_headers).mimetype). (Dmitry)</li>
<li><?php bugfix(43293); ?> (Multiple segfaults in getopt()). (Hannes)</li>
<li><?php bugfix(43279); ?> (pg_send_query_params() converts all elements in 'params' to strings). (Ilia)</li>
<li><?php bugfix(43276); ?> (Incomplete fix for bug <?php bugl(42739); ?>, mkdir() under safe_mode). (Ilia)</li>
<li><?php bugfix(43248); ?> (backward compatibility break in realpath()). (Dmitry)</li>
<li><?php bugfix(43221); ?> (SimpleXML adding default namespace in addAttribute). (Rob)</li>
<li><?php bugfix(43216); ?> (stream_is_local() returns false on "file://"). (Dmitry)</li>
<li><?php bugfix(43201); ?> (Crash on using uninitialized vals and __get/__set). (Dmitry)</li>
<li><?php bugfix(43182); ?> (file_put_contents() LOCK_EX does not work properly on file truncation). (Ilia)</li>
<li><?php bugfix(43175); ?> (__destruct() throwing an exception with __call() causes segfault). (Dmitry)</li>
<li><?php bugfix(43128); ?> (Very long class name causes segfault). (Dmitry)</li>
<li><?php bugfix(43105); ?> (PHP seems to fail to close open files). (Hannes)</li>
<li><?php bugfix(43092); ?> (curl_copy_handle() crashes with > 32 chars long URL). (Jani)</li>
<li><?php bugfix(43003); ?> (Invalid timezone reported for DateTime objects constructed using a timestamp). (Derick)</li>
<li><?php bugfix(42978); ?> (mismatch between number of bound params and values causes a crash in pdo_pgsql). (Ilia)</li>
<li><?php bugfix(42945); ?> (preg_split() swallows part of the string). (Nuno)</li>
<li><?php bugfix(42937); ?> (__call() method not invoked when methods are called on parent from child class). (Dmitry)</li>
<li><?php bugfix(42841); ?> (REF CURSOR and oci_new_cursor() crash PHP). (Chris)</li>
<li><?php bugfix(42838); ?> (Wrong results in array_diff_uassoc) (Felipe)</li>
<li><?php bugfix(42779); ?> (Incorrect forcing from HTTP/1.0 request to HTTP/1.1 response). (Ilia)</li>
<li><?php bugfix(42736); ?> (xmlrpc_server_call_method() crashes). (Tony)</li>
<li><?php bugfix(42692); ?> (Procedure 'int1' not present with doc/lit SoapServer). (Dmitry)</li>
<li><?php bugfix(42548); ?> (mysqli PROCEDURE calls can't return result sets). (Hartmut)</li>
<li><?php bugfix(42505); ?> (new sendmail default breaks on Netware platform) (Guenter Knauf)</li>
<li><?php bugfix(42369); ?> (Implicit conversion to string leaks memory). (David C., Rob).</li>
<li><?php bugfix(42272); ?> (var_export() incorrectly escapes char(0)). (Derick)</li>
<li><?php bugfix(42261); ?> (Incorrect lengths for date and boolean data types). (Ilia)</li>
<li><?php bugfix(42190); ?> (Constructing DateTime with TimeZone Indicator invalidates DateTimeZone). (Derick)</li>
<li><?php bugfix(42177); ?> (Warning "array_merge_recursive(): recursion detected" comes again...). (Felipe)</li>
<li><?php bugfix(41941); ?> (oci8 extension not lib64 savvy). (Chris)</li>
<li><?php bugfix(41828); ?> (Failing to call RecursiveIteratorIterator::__construct() causes a sefault). (Etienne)</li>
<li><?php bugfix(41599); ?> (setTime() fails after modify() is used). (Derick)</li>
<li><?php bugfix(41562); ?> (SimpleXML memory issue). (Rob)</li>
<li><?php bugfix(40013); ?> (php_uname() does not return nodename on Netware (Guenter Knauf)</li>
<li><?php bugfix(38468); ?> (Unexpected creation of cycle). (Dmitry)</li>
<li><?php bugfix(32979); ?> (OpenSSL stream-&gt;fd casts broken in 64-bit build) (stotty at tvnet dot hu)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.5"><!-- {{{ 5.2.5 -->
<h3>Version 5.2.5</h3>
<?php release_date('08-Nov-2007'); ?>
<ul>
	<li>Security Fixes
		<ul>
			<li>Fixed dl() to only accept filenames. reported by Laurent Gaffie.</li>
			<li>Fixed dl() to limit argument size to MAXPATHLEN (CVE-2007-4887).</li>
			<li>Fixed htmlentities/htmlspecialchars not to accept partial multibyte sequences.</li>
			<li>Fixed possible triggering of buffer overflows inside glibc implementations of the fnmatch(), setlocale() and glob() functions. Reported by Laurent Gaffie.</li>
			<li>Fixed "mail.force_extra_parameters" php.ini directive not to be modifiable in .htaccess due to the security implications reported by SecurityReason.</li>
			<li><?php bugfix(42869); ?> (automatic session id insertion adds sessions id to non-local forms).</li>
			<li><?php bugfix(41561); ?> (Values set with php_admin_* in httpd.conf can be overwritten with ini_set()).</li>
		</ul>
	</li>

<li>Upgraded PCRE to version 7.3 (Nuno)</li>
<li>Added optional parameter $provide_object to debug_backtrace(). (Sebastian)</li>
<li>Added alpha support for imagefilter() IMG_FILTER_COLORIZE. (Pierre)</li>
<li>Added ability to control memory consumption between request using ZEND_MM_COMPACT environment variable. (Dmitry)</li>

<li>Improved speed of array_intersect_key(), array_intersect_assoc(), array_uintersect_assoc(), array_diff_key(), array_diff_assoc() and array_udiff_assoc(). (Dmitry)</li>

<li>Fixed move_uploaded_file() to always set file permissions of resulting file according to UMASK. (Andrew Sitnikov)</li>
<li>Fixed possible crash in ext/soap because of uninitialized value. (Zdash Urf)</li>
<li>Fixed regression in glob() when enforcing safe_mode/open_basedir checks on paths containing '*'. (Ilia)</li>
<li>Fixed PDO crash when driver returns empty LOB stream. (Stas)</li>
<li>Fixed iconv_*() functions to limit argument sizes as workaround to libc bug (CVE-2007-4783, CVE-2007-4840 by Laurent Gaffie). (Christian Hoffmann, Stas)</li>
<li>Fixed missing brackets leading to build warning and error in the log. Win32 code. (Andrey)</li>
<li>Fixed leaks with multiple connects on one mysqli object. (Andrey)</li>
<li>Fixed endianness detection on MacOS when building universal binary. (Uwe Schindler, Christian Speich, Tony)</li>
<li>Fixed imagerectangle regression with 1x1 rectangle (libgd #106). (Pierre)</li>

<li><?php bugfix(43196); ?> (array_intersect_assoc() crashes with non-array input). (Jani)</li>
<li><?php bugfix(43139); ?> (PDO ignores ATTR_DEFAULT_FETCH_MODE in some cases with fetchAll()). (Ilia)</li>
<li><?php bugfix(43137); ?> (rmdir() and rename() do not clear statcache). (Jani)</li>
<li><?php bugfix(43130); ?> (Bound parameters cannot have - in their name). (Ilia)</li>
<li><?php bugfix(43099); ?> (XMLWriter::endElement() does not check # of params). (Ilia)</li>
<li><?php bugfix(43020); ?> (Warning message is missing with shuffle() and more than one argument). (Scott)</li>
<li><?php bugfix(42976); ?> (Crash when constructor for newInstance() or newInstanceArgs() fails) (Ilia)</li>
<li><?php bugfix(42943); ?> (ext/mssql: Move *timeout initialization from RINIT to connect time). (Ilia)</li>
<li><?php bugfix(42917); ?> (PDO::FETCH_KEY_PAIR doesn't work with setFetchMode). (Ilia)</li>
<li><?php bugfix(42890); ?> (Constant "LIST" defined by mysqlclient and c-client). (Andrey)</li>
<li><?php bugfix(42818); ?> ($foo = clone(array()); leaks memory). (Dmitry)</li>
<li><?php bugfix(42817); ?> (clone() on a non-object does not result in a fatal error). (Ilia)</li>
<li><?php bugfix(42785); ?> (json_encode() formats doubles according to locale rather  then following standard syntax). (Ilia)</li>
<li><?php bugfix(42783); ?> (pg_insert() does not accept an empty list for insertion). (Ilia)</li>
<li><?php bugfix(42773); ?> (WSDL error causes HTTP 500 Response). (Dmitry)</li>
<li><?php bugfix(42772); ?> (Storing $this in a static var fails while handling a cast to string). (Dmitry)</li>
<li><?php bugfix(42767); ?> (highlight_string() truncates trailing comment). (Ilia)</li>
<li><?php bugfix(42739); ?> (mkdir() doesn't like a trailing slash when safe_mode is enabled). (Ilia)</li>
<li><?php bugfix(42703); ?> (Exception raised in an iterator::current() causes segfault in FilterIterator) (Marcus)</li>
<li><?php bugfix(42699); ?> (PHP_SELF duplicates path). (Dmitry)</li>
<li><?php bugfix(42654); ?> (RecursiveIteratorIterator modifies only part of leaves) (Marcus)</li>
<li><?php bugfix(42643); ?> (CLI segfaults if using ATTR_PERSISTENT). (Ilia)</li>
<li><?php bugfix(42637); ?> (SoapFault : Only http and https are allowed). (Bill Moran)</li>
<li><?php bugfix(42629); ?> (Dynamically loaded PHP extensions need symbols exported on MacOSX). (jdolecek at NetBSD dot org)</li>
<li><?php bugfix(42627); ?> (bz2 extension fails to build with -fno-common). (dolecek at netbsd dot org)</li>
<li><?php bugfix(42596); ?> (session.save_path MODE option does not work). (Ilia)</li>
<li><?php bugfix(42590); ?> (Make the engine recognize \v and \f escape sequences). (Ilia)</li>
<li><?php bugfix(42587); ?> (behavior change regarding symlinked .php files). (Dmitry)</li>
<li><?php bugfix(42579); ?> (apache_reset_timeout() does not exist). (Jani)</li>
<li><?php bugfix(42549); ?> (ext/mysql failed to compile with libmysql 3.23). (Scott)</li>
<li><?php bugfix(42523); ?> (PHP_SELF duplicates path). (Dmitry)</li>
<li><?php bugfix(42512); ?> (ip2long('255.255.255.255') should return 4294967295 on 64-bit PHP). (Derick)</li>
<li><?php bugfix(42506); ?> (php_pgsql_convert() timezone parse bug) (nonunnet at gmail dot com, Ilia)</li>
<li><?php bugfix(42462); ?> (Segmentation when trying to set an attribute in a DOMElement). (Rob)</li>
<li><?php bugfix(42453); ?> (CGI SAPI does not shut down cleanly with -i/-m/-v cmdline options). (Dmitry)</li>
<li><?php bugfix(42452); ?> (PDO classes do not expose Reflection API information). (Hannes)</li>
<li><?php bugfix(42468); ?> (Write lock on file_get_contents fails when using a compression stream). (Ilia)</li>
<li><?php bugfix(42488); ?> (SoapServer reports an encoding error and the error itself breaks). (Dmitry)</li>
<li><?php bugfix(42378); ?> (mysqli_stmt_bind_result memory exhaustion). (Andrey)</li>
<li><?php bugfix(42359); ?> (xsd:list type not parsed). (Dmitry)</li>
<li><?php bugfix(42326); ?> (SoapServer crash). (Dmitry)</li>
<li><?php bugfix(42214); ?> (SoapServer sends clients internal PHP errors). (Dmitry)</li>
<li><?php bugfix(42189); ?> (xmlrpc_set_type() crashes php on invalid datetime values). (Ilia)</li>
<li><?php bugfix(42139); ?> (XMLReader option constants are broken using XML()). (Rob)</li>
<li><?php bugfix(42086); ?> (SoapServer return Procedure '' not present for WSIBasic compliant wsdl). (Dmitry)</li>
<li><?php bugfix(41822); ?> (Relative includes broken when getcwd() fails). (Ab5602, Jani)</li>
<li><?php bugfix(39651); ?> (proc_open() append mode doesn't work on windows). (Nuno)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.4"><!-- {{{ 5.2.4 -->
<h3>Version 5.2.4</h3>
<?php release_date('30-Aug-2007'); ?>
<ul>
<li>Security Fixes
	<ul>
		<li>Fixed "Floating point exception" inside wordwrap(). (Mattias Bengtsson, Ilia)</li>
		<li>Fixed several integer overflows in ImageCreate(), ImageCreateTrueColor(), ImageCopyResampled() and ImageFilledPolygon() reported by Mattias Bengtsson. (Tony)</li>
		<li>Fixed size calculation in chunk_split(). (Stas)</li>
		<li>Fixed integer overflow in str[c]spn(). (Stas)</li>
		<li>Fixed money_format() not to accept multiple %i or %n tokens. (Stas, Ilia)</li>
		<li>Fixed zend_alter_ini_entry() memory_limit interruption vulnerability. (Ilia)</li>
		<li>Fixed INFILE LOCAL option handling with MySQL extensions not to be allowed when open_basedir or safe_mode is active. (Stas)</li>
		<li>Fixed session.save_path and error_log values to be checked against open_basedir and safe_mode (CVE-2007-3378) (Stas, Maksymilian Arciemowicz)</li>
		<li>Fixed possible invalid read in glob() win32 implementation (CVE-2007-3806). (Tony)</li>
		<li>Improved fix for MOPB-03-2007. (Ilia)</li>
		<li>Corrected fix for CVE-2007-2872. (Ilia)</li>
	</ul>
</li>

<li>Removed --enable-versioning configure option. (Jani)</li>

<li>Upgraded PCRE to version 7.2 (Nuno)</li>
<li>Updated timezone database to version 2007.6. (Derick)</li>

<li>Improved openssl_x509_parse() to return extensions in readable form. (Dmitry)</li>

<li>Enabled changing the size of statement cache for non-persistent OCI8 connections. (Chris Jones, Tony)</li>

<li>Changed display_errors php.ini option to accept stderr as value which makes the error messages to be outputted to STDERR instead of STDOUT with CGI and CLI SAPIs (<?php bugl(22839); ?>). (Jani)</li>
<li>Changed error handler to send HTTP 500 instead of blank page on PHP errors. (Dmitry, Andrei Nigmatulin)</li>
<li>Changed mail() function to be always available. (Johannes)</li>

<li>Added check for unknown options passed to configure. (Jani)</li>
<li>Added persistent connection status checker to pdo_pgsql. (Elvis Pranskevichus, Ilia)</li>
<li>Added support for ATTR_TIMEOUT inside pdo_pgsql driver. (Ilia)</li>
<li>Added php_ini_loaded_file() function which returns the path to the actual php.ini in use. (Jani)</li>
<li>Added GD version constants GD_MAJOR_VERSION, GD_MINOR_VERSION GD_RELEASE_VERSION, GD_EXTRA_VERSION and GD_VERSION_STRING. (Pierre)</li>
<li>Added missing open_basedir checks to CGI. (anight at eyelinkmedia dot com, Tony)</li>
<li>Added missing format validator to unpack() function. (Ilia)</li>
<li>Added missing error check inside bcpowmod(). (Ilia)</li>
<li>Added CURLOPT_PRIVATE &amp; CURLINFO_PRIVATE constants.  (Andrey A. Belashkov, Tony)</li>
<li>Added missing MSG_EOR and MSG_EOF constants to sockets extension. (Jani)</li>
<li>Added PCRE_VERSION constant. (Tony)</li>
<li>Added ReflectionExtension::info() function to print the phpinfo() block for an extension. (Johannes)</li>

<li><?php implemented(41884); ?> (ReflectionClass::getDefaultProperties() does not handle static attributes). (Tony)</li>

<li>Fixed possible crash in imagepsloadfont(), work around a bug in the pslib on Windows. (Pierre)</li>
<li>Fixed oci8 and PDO_OCI extensions to allow configuring with Oracle 11g client libraries. (Chris Jones)</li>
<li>Fixed EOF handling in case of reading from file opened in write only mode. (Dmitry)</li>
<li>Fixed var_export() to use the new H modifier so that it can generate parseable PHP code for floats, independent of the locale. (Derick)</li>
<li>Fixed regression introduced by the fix for the libgd bug #74. (Pierre)</li>
<li>Fixed SimpleXML's behavior when used with empty(). (Sara)</li>
<li>Fixed crash in OpenSSL extension because of non-string passphrase. (Dmitry)</li>

<li><?php peclbugfix(11345); ?> (PDO_OCI crash after National language Support &quot;NLS&quot; environment initialization error). (Chris Jones)</li>
<li><?php peclbugfix(11216); ?> (crash in ZipArchive::addEmptyDir when a directory already exists). (Pierre)</li>

<li><?php bugfix(42368); ?> (Incorrect error message displayed by pg_escape_string). (Ilia)</li>
<li><?php bugfix(42365); ?> (glob() crashes and/or accepts way too many flags). (Jani)</li>
<li><?php bugfix(42364); ?> (Crash when using getRealPath with DirectoryIterator). (Johannes)</li>
<li><?php bugfix(42292); ?> ($PHP_CONFIG not set for phpized builds). (Jani)</li>
<li><?php bugfix(42261); ?> (header wrong for date field). (roberto at spadim dot com dot br, Ilia)</li>
<li><?php bugfix(42259); ?> (SimpleXMLIterator loses ancestry). (Rob)</li>
<li><?php bugfix(42247); ?> (ldap_parse_result() not defined under win32). (Jani)</li>
<li><?php bugfix(42243); ?> (copy() does not output an error when the first arg is a dir). (Ilia)</li>
<li><?php bugfix(42242); ?> (sybase_connect() crashes). (Ilia)</li>
<li><?php bugfix(42237); ?> (stream_copy_to_stream returns invalid values for mmaped streams). (andrew dot minerd at sellingsource dot com, Ilia)</li>
<li><?php bugfix(42233); ?> (Problems with æøå in extract()). (Jani)</li>
<li><?php bugfix(42222); ?> (possible buffer overflow in php_openssl_make_REQ). (Pierre)</li>
<li><?php bugfix(42211); ?> (property_exists() fails to find protected properties from a parent class). (Dmitry)</li>
<li><?php bugfix(42208); ?> (substr_replace() crashes when the same array is passed more than once). (crrodriguez at suse dot de, Ilia)</li>
<li><?php bugfix(42198); ?> (SCRIPT_NAME and PHP_SELF truncated when inside a userdir and using PATH_INFO). (Dmitry)</li>
<li><?php bugfix(42195); ?> (C++ compiler required always). (Jani)</li>
<li><?php bugfix(42183); ?> (classmap causes crash in non-wsdl mode). (Dmitry)</li>
<li><?php bugfix(42173); ?> (oci8 INTERVAL and TIMESTAMP type fixes). (Chris)</li>
<li><?php bugfix(42151); ?> (__destruct functions not called after catching a SoapFault exception). (Dmitry)</li>
<li><?php bugfix(42142); ?> (substr_replace() returns FALSE when length &gt; string length). (Ilia) </li>
<li><?php bugfix(42135); ?> (Second call of session_start() causes creation of SID). (Ilia)</li>
<li><?php bugfix(42134); ?> (oci_error() returns false after oci_new_collection() fails). (Tony)</li>
<li><?php bugfix(42119); ?> (array_push($arr,&amp;$obj) doesn't work with zend.ze1_compatibility_mode On). (Dmitry)</li>
<li><?php bugfix(42117); ?> (bzip2.compress loses data in internal buffer). (Philip, Ilia)</li>
<li><?php bugfix(42112); ?> (deleting a node produces memory corruption). (Rob)</li>
<li><?php bugfix(42107); ?> (sscanf broken when using %2$s format parameters). (Jani)</li>
<li><?php bugfix(42090); ?> (json_decode causes segmentation fault). (Hannes)</li>
<li><?php bugfix(42082); ?> (NodeList length zero should be empty). (Hannes)</li>
<li><?php bugfix(42072); ?> (No warning message for clearstatcache() with arguments). (Ilia)</li>
<li><?php bugfix(42071); ?> (ini scanner allows using NULL as option name). (Jani)</li>
<li><?php bugfix(42027); ?> (is_file() / is_dir() matches file/dirnames with wildcard char or trailing slash in Windows). (Dmitry)</li>
<li><?php bugfix(42019); ?> (configure option --with-adabas=DIR does not work). (Jani)</li>
<li><?php bugfix(42015); ?> (ldap_rename(): server error &quot;DSA is unwilling to perform&quot;). (bob at mroczka dot com, Jani)</li>
<li><?php bugfix(42009); ?> (is_a() and is_subclass_of() should NOT call autoload, in the same way as &quot;instanceof&quot; operator). (Dmitry)</li>
<li><?php bugfix(41989); ?> (move_uploaded_file() &amp; relative path in ZTS mode). (Tony)</li>
<li><?php bugfix(41984); ?> (Hangs on large SoapClient requests). (Dmitry)</li>
<li><?php bugfix(41983); ?> (Error Fetching http headers terminated by '\n'). (Dmitry)</li>
<li><?php bugfix(41973); ?> (--with-ldap=shared fails with LDFLAGS=&quot;-Wl,--as-needed&quot;). (Nuno)</li>
<li><?php bugfix(41971); ?> (PDOStatement::fetch and PDOStatement::setFetchMode causes unexpected behavior). (Ilia)</li>
<li><?php bugfix(41964); ?> (strtotime returns a timestamp for non-time string of pattern '(A|a) .+'). (Derick)</li>
<li><?php bugfix(41961); ?> (Ensure search for hidden private methods does not stray from class hierarchy). (robin_fernandes at uk dot ibm dot com)</li>
<li><?php bugfix(41947); ?> (SimpleXML incorrectly registers empty strings as  namespaces). (Rob)</li>
<li><?php bugfix(41929); ?> (Foreach on object does not iterate over all visible properties). (Dmitry)</li>
<li><?php bugfix(41919); ?> (crash in string to array conversion). (judas dot iscariote at gmail dot com, Ilia)</li>
<li><?php bugfix(41909); ?> (var_export() is locale sensitive when exporting float values). (Derick)</li>
<li><?php bugfix(41908); ?> (CFLAGS=&quot;-Os&quot; ./configure --enable-debug fails).  (christian at hoffie dot info, Tony) </li>
<li><?php bugfix(41904); ?> (proc_open(): empty env array should cause empty environment to be passed to process). (Jani)</li>
<li><?php bugfix(41867); ?> (SimpleXML: getName is broken). (Rob)</li>
<li><?php bugfix(41865); ?> (fputcsv(): 2nd parameter is not optional). (Jani)</li>
<li><?php bugfix(41861); ?> (SimpleXML: getNamespaces() returns the namespaces of  a node's siblings). (Rob)</li>
<li><?php bugfix(41845); ?> (pgsql extension does not compile with PostgreSQL &lt;7.4). (Ilia)</li>
<li><?php bugfix(41844); ?> (Format returns incorrect number of digits for negative years -0001 to -0999). (Derick)</li>
<li><?php bugfix(41842); ?> (Cannot create years &lt; 0100 &amp; negative years with date_create or new DateTime). (Derick)</li>
<li><?php bugfix(41833); ?> (addChild() on a non-existent node, no node created,  getName() segfaults). (Rob)</li>
<li><?php bugfix(41831); ?> (pdo_sqlite prepared statements convert resources to strings). (Ilia)</li>
<li><?php bugfix(41815); ?> (Concurrent read/write fails when EOF is reached). (Sascha)</li>
<li><?php bugfix(41813); ?> (segmentation fault when using string offset as an object). (judas dot iscariote at gmail dot com, Tony)</li>
<li><?php bugfix(41795); ?> (checkdnsrr does not support DNS_TXT type).  (lucas at facebook dot com, Tony)</li>
<li><?php bugfix(41773); ?> (php_strip_whitespace() sends headers with errors  suppressed). (Tony)</li>
<li><?php bugfix(41770); ?> (SSL: fatal protocol error due to buffer issues). (Ilia)</li>
<li><?php bugfix(41765); ?> (Recode crashes/does not work on amd64).  (nexus at smoula dot net, Stas)</li>
<li><?php bugfix(41724); ?> (libxml_get_last_error() - errors service request scope). (thekid at php dot net, Ilia)</li>
<li><?php bugfix(41717); ?> (imagepolygon does not respect thickness). (Pierre)</li>
<li><?php bugfix(41713); ?> (Persistent memory consumption on win32 since 5.2). (Dmitry)</li>
<li><?php bugfix(41711); ?> (NULL temporary lobs not supported in OCI8).  (Chris Jones, Tony)</li>
<li><?php bugfix(41709); ?> (strtotime() does not handle 00.00.0000). (Derick)</li>
<li><?php bugfix(41698); ?> (float parameters truncated to integer in prepared  statements). (Ilia)</li>
<li><?php bugfix(41692); ?> (ArrayObject shows weird behavior in respect to  inheritance). (Tony)</li>
<li><?php bugfix(41691); ?> (ArrayObject::exchangeArray hangs Apache). (Tony)</li>
<li><?php bugfix(41686); ?> (Omitting length param in array_slice not possible). (Ilia)</li>
<li><?php bugfix(41685); ?> (array_push() fails to warn when next index is already occupied). (Ilia)</li>
<li><?php bugfix(41655); ?> (open_basedir bypass via glob()). (Ilia)</li>
<li><?php bugfix(41640); ?> (get_class_vars produces error on class constants). (Johannes)</li>
<li><?php bugfix(41635); ?> (SoapServer and zlib.output_compression with FastCGI result in major slowdown). (Dmitry)</li>
<li><?php bugfix(41633); ?> (Crash instantiating classes with self-referencing constants). (Dmitry)</li>
<li><?php bugfix(41630); ?> (segfault when an invalid color index is present in the image data). (Reported by Elliot wccoder@gmail dot com) (Pierre)</li>
<li><?php bugfix(41628); ?> (PHP settings leak between Virtual Hosts in Apache 1.3). (Scott, manuel at mausz dot at)</li>
<li><?php bugfix(41608); ?> (segfault on a weird code with objects and switch()).  (Tony)</li>
<li><?php bugfix(41600); ?> (url rewriter tags doesn't work with namespaced tags). (Ilia)</li>
<li><?php bugfix(41596); ?> (Fixed a crash inside pdo_pgsql on some non-well-formed SQL queries). (Ilia)</li>
<li><?php bugfix(41594); ?> (OCI8 statement cache is flushed too frequently). (Tony)</li>
<li><?php bugfix(41582); ?> (SimpleXML crashes when accessing newly created element). (Tony)</li>
<li><?php bugfix(41576); ?> (configure failure when using --without-apxs or some other SAPIs disabling options). (Jani)</li>
<li><?php bugfix(41567); ?> (json_encode() double conversion is inconsistent with PHP). (Lucas, Ilia)</li>
<li><?php bugfix(41566); ?> (SOAP Server not properly generating href attributes). (Dmitry)</li>
<li><?php bugfix(41555); ?> (configure failure: regression caused by fix for <?php bugl(41265); ?>). (Jani)</li>
<li><?php bugfix(41527); ?> (WDDX deserialize numeric string array key). (Matt, Ilia)</li>
<li><?php bugfix(41523); ?> (strtotime('0000-00-00 00:00:00') is parsed as 1999-11-30). (Derick)</li>
<li><?php bugfix(41518); ?> (file_exists() warns of open_basedir restriction on  non-existent file). (Tony)</li>
<li><?php bugfix(41445); ?> (parse_ini_file() has a problem with certain types of  integer as sections). (Tony)</li>
<li><?php bugfix(41433); ?> (DBA: configure fails to include correct db.h for db4). (Jani)</li>
<li><?php bugfix(41372); ?> (Internal pointer of source array resets during array copying). (Dmitry)</li>
<li><?php bugfix(41350); ?> (my_thread_global_end() error during request shutdown on Windows). (Scott, Andrey)</li>
<li><?php bugfix(41278); ?> (get_loaded_extensions() should list Zend extensions). (Johannes)</li>
<li><?php bugfix(41127); ?> (Memory leak in ldap_{first|next}_attribute functions). (Jani)</li>
<li><?php bugfix(40757); ?> (get_object_vars get nothing in child class). (Dmitry)</li>
<li><?php bugfix(40705); ?> (Iterating within function moves original array pointer). (Dmitry)</li>
<li><?php bugfix(40509); ?> (key() function changed behaviour if global array is used within function). (Dmitry)</li>
<li><?php bugfix(40419); ?> (Trailing slash in CGI request does not work). (Dmitry)</li>
<li><?php bugfix(39330); ?> (apache2handler does not call shutdown actions before  apache child die). (isk at ecommerce dot com, Gopal, Tony)</li>
<li><?php bugfix(39291); ?> (ldap_sasl_bind() misses the sasl_authc_id parameter). (diafour at gmail dot com, Jani)</li>
<li><?php bugfix(37715); ?> (array pointers resetting on copy). (Dmitry)</li>
<li><?php bugfix(37273); ?> (Symlinks and mod_files session handler allow open_basedir bypass). (Ilia)</li>
<li><?php bugfix(36492); ?> (Userfilters can leak buckets). (Sara)</li>
<li>Fixed bugs <?php bugl(36796); ?>, <?php bugl(36918); ?>, <?php bugl(41371); ?> (stream_set_blocking() does not work). (Jani)</li>
<li><?php bugfix(35981); ?> (pdo-pgsql should not use pkg-config when not present). (Jani)</li>
<li><?php bugfix(31892); ?> (PHP_SELF incorrect without cgi.fix_pathinfo, but turning on screws up PATH_INFO). (Dmitry)</li>
<li><?php bugfix(21197); ?> (socket_read() outputs error with PHP_NORMAL_READ). (Nuno, Jani)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.3"><!-- {{{ 5.2.3 -->
<h3>Version 5.2.3</h3>
<?php release_date('31-May-2007'); ?>
<ul>
<li>Security Fixes
	<ul>
		<li>Fixed an integer overflow inside chunk_split() (by Gerhard Wagner, CVE-2007-2872)</li>
		<li>Fixed possible infinite loop in imagecreatefrompng. (by Xavier Roche, CVE-2007-2756)</li>
		<li>Fixed ext/filter Email Validation Vulnerability (MOPB-45 by Stefan Esser, CVE-2007-1900)</li>
		<li><?php bugfix(41492); ?> (open_basedir/safe_mode bypass inside realpath()) (by bugs dot php dot net at chsc dot dk)</li>
		<li>Improved fix for CVE-2007-1887 to work with non-bundled sqlite2 lib.</li>
		<li>Added mysql_set_charset() to allow runtime altering of connection encoding.</li>
	</ul>
</li>

<li>Changed CGI install target to php-cgi and 'make install' to install CLI when CGI is selected. (Jani)</li>
<li>Changed JSON maximum nesting depth from 20 to 128. (Rasmus)</li>

<li>Improved compilation of heredocs and interpolated strings. (Matt, Dmitry)</li>
<li>Optimized out a couple of per-request syscalls. (Rasmus)</li>
<li>Optimized digest generation in md5() and sha1() functions. (Ilia)</li>
<li>Upgraded bundled SQLite 3 to version 3.3.17. (Ilia)</li>

<li>Added "max_input_nesting_level" php.ini option to limit nesting level of input variables. Fix for MOPB-03-2007. (Stas)</li>
<li>Added a 4th parameter flag to htmlspecialchars() and htmlentities() that makes the function not encode existing html entities. (Ilia)</li>
<li>Added PDO::FETCH_KEY_PAIR mode that will fetch a 2 column result set into an associated array. (Ilia)</li>
<li>Added CURLOPT_TIMEOUT_MS and CURLOPT_CONNECTTIMEOUT_MS cURL constants. (Sara)</li>
<li>Added --ini switch to CLI that prints out configuration file names. (Marcus)</li>

<li><?php implemented(41416); ?> (getColumnMeta() should also return table name). (Tony)</li>

<li>Fixed filetype() and linkinfo() processing of symlinks on ZTS systems. (Oliver Block, Tony, Dmitry)</li>
<li>Fixed SOAP extension's handler() to work even when "always_populate_raw_post_data" is off. (Ilia)</li>
<li>Fixed altering $this via argument named "this". (Dmitry)</li>
<li>Fixed PHP CLI usage of php.ini from the binary location. (Hannes)</li>
<li>Fixed segfault in strripos(). (Tony, Joxean Koret)</li>
<li>Fixed gd build when used with freetype 1.x (Pierre, Tony)</li>
<li><?php bugfix(41525); ?> (ReflectionParameter::getPosition() not available). (Marcus)</li>
<li><?php bugfix(41511); ?> (Compile failure under IRIX 6.5.30 building md5.c). (Jani)</li>
<li><?php bugfix(41504); ?> (json_decode() incorrectly decodes JSON arrays with empty string keys). (Ilia)</li>
<li><?php bugfix(41477); ?> (no arginfo about SoapClient::__soapCall()). (Ilia)</li>
<li><?php bugfix(41455); ?> (ext/dba/config.m4 pollutes global $LIBS and $LDFLAGS).  (mmarek at suse dot cz, Tony)</li>
<li><?php bugfix(41442); ?> (imagegd2() under output control). (Tony)</li>
<li><?php bugfix(41430); ?> (Fatal error with negative values of maxlen parameter of  file_get_contents()). (Tony)</li>
<li><?php bugfix(41423); ?> (PHP assumes wrongly that certain ciphers are enabled in  OpenSSL). (Pierre)</li>
<li><?php bugfix(41421); ?> (Uncaught exception from a stream wrapper segfaults).  (Tony, Dmitry)</li>
<li><?php bugfix(41403); ?> (json_decode cannot decode floats if localeconv  decimal_point is not '.'). (Tony)</li>
<li><?php bugfix(41401); ?> (wrong unary operator precedence). (Stas)</li>
<li><?php bugfix(41394); ?> (dbase_create creates file with corrupted header). (Tony)</li>
<li><?php bugfix(41390); ?> (Clarify error message with invalid protocol scheme). (Scott)</li>
<li><?php bugfix(41378); ?> (fastcgi protocol lacks support for Reason-Phrase in  "Status:" header). (anight at eyelinkmedia dot com, Dmitry)</li>
<li><?php bugfix(41374); ?> (whole text concats values of wrong nodes). (Rob)</li>
<li><?php bugfix(41358); ?> (configure cannot determine SSL lib with libcurl >= 7.16.2). (Mike)</li>
<li><?php bugfix(41353); ?> (crash in openssl_pkcs12_read() on invalid input). (Ilia)</li>
<li><?php bugfix(41351); ?> (Invalid opcode with foreach ($a[] as $b)). (Dmitry, Tony)</li>
<li><?php bugfix(41347); ?> (checkdnsrr() segfaults on empty hostname). (Scott)</li>
<li><?php bugfix(41337); ?> (WSDL parsing doesn't ignore non soap bindings). (Dmitry)</li>
<li><?php bugfix(41326); ?> (Writing empty tags with Xmlwriter::WriteElement[ns]) (Pierre)</li>
<li><?php bugfix(41321); ?> (downgrade read errors in getimagesize() to E_NOTICE). (Ilia)</li>
<li><?php bugfix(41304); ?> (compress.zlib temp files left). (Dmitry)</li>
<li><?php bugfix(41293); ?> (Fixed creation of HTTP_RAW_POST_DATA when there is no default post handler). (Ilia)</li>
<li><?php bugfix(41291); ?> (FastCGI does not set SO_REUSEADDR).  (fmajid at kefta dot com, Dmitry)</li>
<li><?php bugfix(41287); ?> (Namespace functions don't allow xmlns definition to be  optional). (Rob)</li>
<li><?php bugfix(41283); ?> (Bug with deserializing array key that are doubles or floats in wddx). (Ilia)</li>
<li><?php bugfix(41257); ?> (lookupNamespaceURI does not work as expected). (Rob)</li>
<li><?php bugfix(41236); ?> (Regression in timeout handling of non-blocking SSL connections during reads and writes). (Ilia)</li>
<li><?php bugfix(41134); ?> (zend_ts_hash_clean not thread-safe).  (marco dot cova at gmail dot com, Tony)</li>
<li><?php bugfix(41097); ?> (ext/soap returning associative array as indexed without using WSDL). (Dmitry)</li>
<li><?php bugfix(41004); ?> (minOccurs="0" and null class member variable). (Dmitry)</li>
<li><?php bugfix(39542); ?> (Behavior of require/include different to &lt; 5.2.0). (Dmitry)</li>


</ul>

<!-- }}} --></section>

<section class="version" id="5.2.2"><!-- {{{ 5.2.2 -->
<h3>Version 5.2.2</h3>
<?php release_date('03-May-2007'); ?>
<ul>
<li>Security Fixes
	<ul>
	<li>Fixed CVE-2007-1001, GD wbmp used with invalid image size (by Ivan Fratric) (Pierre)</li>
	<li>Fixed a header injection via Subject and To parameters to the mail() function (MOPB-34 by Stefan Esser) (Ilia)</li>
	<li>Fixed asciiz byte truncation inside mail() (MOPB-33 by Stefan Esser) (Ilia)</li>
	<li>Fixed wrong length calculation in unserialize S type (MOPB-29 by Stefan Esser) (Stas)</li>
	<li>Fixed a bug in mb_parse_str() that can be used to activate register_globals (MOPB-26 by Stefan Esser) (Ilia)</li>
	<li>Fixed unallocated memory access/double free in in array_user_key_compare() (MOPB-24 by Stefan Esser) (Stas)</li>
	<li>Fixed a double free inside session_regenerate_id() (MOPB-22 by Stefan Esser) (Ilia)</li>
	<li>Added missing open_basedir &amp; safe_mode checks to zip:// and bzip:// wrappers. (MOPB-20, MOPB-21 by Stefan Esser). (Ilia)</li>
	<li>Fixed substr_compare and substr_count information leak (MOPB-14 by Stefan Esser) (Stas, Ilia)</li>
	<li>Limit nesting level of input variables with max_input_nesting_level as fix for (MOPB-03 by Stefan Esser) (Stas)</li>
	<li>Fixed CRLF injection inside ftp_putcmd(). (by loveshell[at]Bug.Center.Team) (Ilia)</li>
	<li>Fixed a possible super-global overwrite inside import_request_variables(). (by Stefano Di Paola, Stefan Esser) (Ilia)</li>
	<li>Fixed a remotely trigger-able buffer overflow inside make_http_soap_request(). (Ilia)</li>
	<li>Fixed a buffer overflow inside user_filter_factory_create(). (Ilia)</li>
	<li>Fixed a remotely trigger-able buffer overflow inside bundled libxmlrpc library. (Stas)</li>
  </ul>
</li>

<li>Improved bundled GD
  <ul>
  <li>Sync to 2.0.35</li>
  <li>Added imagegrabwindow and imagegrabscreen, capture a screen or a window using its handle (Pierre)</li>
  <li>colors allocated henceforth from the resulting image overwrite the palette colors (Rob Leslie)</li>
  <li>Improved thread safety of the gif support (Roman Nemecek, Nuno, Pierre)
    <ul>
      <li>Use the dimension of the GIF frame to create the destination image (Pierre)</li>
      <li>Load only once the local color map from a GIF data (Pierre)</li>
    </ul>
  </li>
  </ul>
</li>
<li>Improved thread safety of the freetype cache (Scott MacVicar, Nuno, Pierre)
  <ul>
    <li>imagearc huge CPU usage with large angles, libgd bug #74 (Pierre)</li>
  </ul>
</li>
<li>Improved FastCGI SAPI to support external pipe and socket servers on win32. (Dmitry)</li>
<li>Improved Zend Memory Manager
  <ul>
    <li>guarantee of reasonable time for worst cases of best-fit free block searching algorithm. (Dmitry)</li>
    <li>better cache usage and less fragmentation on erealloc() (Tony, Dmitry)</li>
  </ul>
</li>
<li>Improved SPL (Marcus)
  <ul>
    <li>Added SplFileInfo::getBasename(), DirectoryIterator::getBasename().</li>
    <li>Added SplFileInfo::getLinkTarget(), SplFileInfo::getRealPath().</li>
    <li>Made RecursiveFilterIterator::accept() abstract as stated in documentation.</li>
  </ul>
</li>
<li>Improved SOAP
  <ul>
    <li>Added ability to encode arrays with &quot;SOAP-ENC:Array&quot; type instead of WSDL type. To activate the ability use &quot;feature&quot;=&gt;SOAP_USE_XSI_ARRAY_TYPE option in SoapClient/SoapServer constructors. (Rob, Dmitry)</li>
  </ul>
</li>
<li>Added GMP_VERSION constant. (Tony)</li>
<li>Added --ri switch to CLI which allows to check extension information. (Marcus)</li>
<li>Added tidyNode::getParent() method (John, Nuno)</li>
<li>Added openbasedir and safemode checks in zip:// stream wrapper and ZipArchive::open (Pierre)</li>
<li>Added php_pdo_sqlite_external.dll, a version of the PDO SQLite driver that links against an external sqlite3.dll. This provides Windows users to upgrade their sqlite3 version outside of the PHP release cycle. (Wez, Edin)</li>
<li>Added linenumbers to array returned by token_get_all(). (Johannes)</li>

<li><?php implemented(40947); ?>, allow a single filter as argument for filter_var_array (Pierre)</li>
<li><?php implemented(39867); ?> (openssl PKCS#12 support) (Marc Delling, Pierre)</li>

<li>Upgraded SQLite 3 to version 3.3.16 (Ilia)</li>
<li>Upgraded libraries bundled in the Windows distribution. (Edin)
  <ul>
  <li>c-client (imap) to version 2006e</li>
  <li>libpq (PostgreSQL) to version 8.2.3</li>
  <li>libmysql (MySQL) to version 5.0.37</li>
  <li>openssl to version 0.9.8e</li>
  </ul>
</li>
<li>Upgraded PCRE to version 7.0 (Nuno)</li>
<li>Updated timezone database to version 2007.5. (Derick)</li>

<li>Fixed commandline handling for CLI and CGI. (Marcus, Johannes)</li>
<li>Fixed iterator_apply() with a callback using __call(). (Johannes)</li>
<li>Fixed possible multi bytes issues in openssl csr parser (Pierre)</li>
<li>Fixed shmop_open() with IPC_CREAT|IPC_EXCL flags on Windows. (Vladimir Kamaev, Tony).</li>
<li>Fixed possible leak in ZipArchive::extractTo when safemode checks fails (Ilia)</li>
<li>Fixed possible relative path issues in zip_open and TS mode (old API) (Pierre)</li>
<li>Fixed zend_llist_remove_tail (Michael Wallner, Dmitry)</li>
<li>Fixed a thread safety issue in gd gif read code (Nuno, Roman Nemecek)</li>
<li>Fixed crash on op-assign where argument is string offset (Brian, Stas)</li>


<li><?php bugfix(41215); ?> (setAttribute return code reversed). (Ilia)</li>
<li><?php bugfix(41192); ?> (Per Directory Values only work for one key). (Dmitry)</li>
<li><?php bugfix(41175); ?> (addAttribute() fails to add an attribute with an empty value). (Ilia)</li>
<li><?php bugfix(41159); ?> (mysql_pconnect() hash does not account for connect flags). (Ilia)</li>
<li><?php bugfix(41121); ?> (range() overflow handling for large numbers on 32bit machines). (Ilia)</li>
<li><?php bugfix(41118); ?> (PHP does not handle overflow of octal integers). (Tony)</li>
<li><?php bugfix(41109); ?> (recursiveiterator.inc says &quot;implements&quot; Iterator instead of &quot;extends&quot;). (Marcus)</li>
<li><?php bugfix(40130); ?> (TTF usage doesn't work properly under Netware). (Scott, gk at gknw dot de)</li>
<li><?php bugfix(41093); ?> (magic_quotes_gpc ignores first arrays keys). (Arpad, Ilia)</li>
<li><?php bugfix(41075); ?> (memleak when creating default object caused exception). (Dmitry)</li>
<li><?php bugfix(41067); ?> (json_encode() problem with UTF-16 input). (jp at df5ea dot net. Ilia)</li>
<li><?php bugfix(41063); ?> (chdir doesn't like root paths). (Dmitry)</li>
<li><?php bugfix(41061); ?> (&quot;visibility error&quot; in ReflectionFunction::export()). (Johannes)</li>
<li><?php bugfix(41043); ?> (pdo_oci crash when freeing error text with persistent connection). (Tony)</li>
<li><?php bugfix(41037); ?> (unregister_tick_function() inside the tick function crash PHP). (Tony)</li>
<li><?php bugfix(41034); ?> (json_encode() ignores null byte started keys in arrays). (Ilia)</li>
<li><?php bugfix(41026); ?> (segfault when calling &quot;self::method()&quot; in shutdown functions). (Tony)</li>
<li><?php bugfix(40999); ?> (mcrypt_create_iv() not using random seed). (Ilia)</li>
<li><?php bugfix(40998); ?> (long session array keys are truncated). (Tony)</li>
<li><?php bugfix(40935); ?> (pdo_mysql does not raise an exception on empty fetchAll()). (Ilia)</li>
<li><?php bugfix(40931); ?> (open_basedir bypass via symlink and move_uploaded_file()). (Tony)</li>
<li><?php bugfix(40921); ?> (php_default_post_reader crashes when post_max_size is exceeded). (trickie at gmail dot com, Ilia)</li>
<li><?php bugfix(40915); ?> (addcslashes unexpected behavior with binary input). (Tony)</li>
<li><?php bugfix(40899); ?> (memory leak when nesting list()). (Dmitry)</li>
<li><?php bugfix(40897); ?> (error_log file not locked). (Ilia)</li>
<li><?php bugfix(40883); ?> (mysql_query() is allocating memory incorrectly). (Tony)</li>
<li><?php bugfix(40872); ?> (inconsistency in offsetSet, offsetExists treatment of string enclosed integers). (Marcus)</li>
<li><?php bugfix(40861); ?> (strtotime() doesn't handle double negative relative time units correctly). (Derick, Ilia)</li>
<li><?php bugfix(40854); ?> (imap_mail_compose() creates an invalid terminator for multipart e-mails). (Ilia)</li>
<li><?php bugfix(40848); ?> (sorting issue on 64-bit Solaris). (Wez)</li>
<li><?php bugfix(40836); ?> (Segfault in ext/dom). (Rob)</li>
<li><?php bugfix(40833); ?> (Crash when using unset() on an ArrayAccess object retrieved via __get()). (Dmitry)</li>
<li><?php bugfix(40822); ?> (pdo_mysql does not return rowCount() on select). (Ilia)</li>
<li><?php bugfix(40815); ?> (using strings like &quot;class::func&quot; and static methods in set_exception_handler() might result in crash). (Tony)</li>
<li><?php bugfix(40809); ?> (Poor performance of &quot;.=&quot;). (Dmitry)</li>
<li><?php bugfix(40805); ?> (Failure executing function ibase_execute()). (Tony)</li>
<li><?php bugfix(40800); ?> (cannot disable memory_limit with -1). (Dmitry, Tony)</li>
<li><?php bugfix(40794); ?> (ReflectionObject::getValues() may crash when used with dynamic properties). (Tony)</li>
<li><?php bugfix(40784); ?> (Case sensitivity in constructor's fallback). (Tony)</li>
<li><?php bugfix(40770); ?> (Apache child exits when PHP memory limit reached). (Dmitry)</li>
<li><?php bugfix(40764); ?> (line thickness not respected for horizontal and vertical lines). (Pierre)</li>
<li><?php bugfix(40758); ?> (Test fcgi_is_fastcgi() is wrong on windows). (Dmitry)</li>
<li><?php bugfix(40754); ?> (added substr() &amp; substr_replace() overflow checks). (Ilia)</li>
<li><?php bugfix(40752); ?> (parse_ini_file() segfaults when a scalar setting is redeclared as an array). (Tony)</li>
<li><?php bugfix(40750); ?> (openssl stream wrapper ignores default_stream_timeout). (Tony)</li>
<li><?php bugfix(40727); ?> (segfault in PDO when failed to bind parameters). (Tony)</li>
<li><?php bugfix(40709); ?> (array_reduce() behaves strange with one item stored arrays). (Ilia)</li>
<li><?php bugfix(40703); ?> (Resolved a possible namespace conflict between libxmlrpc and MySQL's NDB table handler). (Ilia)</li>
<li><?php bugfix(40961); ?> (Incorrect results of DateTime equality check). (Mike)</li>
<li><?php bugfix(40678); ?> (Cross compilation fails). (Tony)</li>
<li><?php bugfix(40621); ?> (Crash when constructor called inappropriately). (Tony)</li>
<li><?php bugfix(40609); ?> (Segfaults when using more than one SoapVar in a request). (Rob, Dmitry)</li>
<li><?php bugfix(40606); ?> (umask is not being restored when request is finished). (Tony)</li>
<li><?php bugfix(40598); ?> (libxml segfault). (Rob)</li>
<li><?php bugfix(40591); ?> (list()=&quot;string&quot;; gives invalid opcode). (Dmitry)</li>
<li><?php bugfix(40578); ?> (imagettftext() multithreading issue). (Tony, Pierre)</li>
<li><?php bugfix(40576); ?> (double values are truncated to 6 decimal digits when encoding). (Tony)</li>
<li><?php bugfix(40560); ?> (DIR functions do not work on root UNC path). (Dmitry)</li>
<li><?php bugfix(40548); ?> (SplFileInfo::getOwner/getGroup give a warning on broken symlink). (Marcus)</li>
<li><?php bugfix(40546); ?> (SplFileInfo::getPathInfo() throws an exception if directory is in root dir). (Marcus)</li>
<li><?php bugfix(40545); ?> (multithreading issue in zend_strtod()). (Tony)</li>
<li><?php bugfix(40503); ?> (json_encode() value corruption on 32bit systems with overflown values). (Ilia)</li>
<li><?php bugfix(40467); ?> (Partial SOAP request sent when XSD sequence or choice include minOccurs=0). (Dmitry) </li>
<li><?php bugfix(40465); ?> (Ensure that all PHP elements are printed by var_dump). (wharmby at uk dot ibm dot com, Ilia)</li>
<li><?php bugfix(40464); ?> (session.save_path wont use default-value when safe_mode or open_basedir is enabled). (Ilia)</li>
<li><?php bugfix(40455); ?> (proc_open() uses wrong command line when safe_mode_exec_dir is set). (Tony)</li>
<li><?php bugfix(40432); ?> (strip_tags() fails with greater than in attribute). (Ilia)</li>
<li><?php bugfix(40431); ?> (dynamic properties may cause crash in ReflectionProperty methods). (Tony)</li>
<li><?php bugfix(40451); ?> (addAttribute() may crash when used with non-existent child node). (Tony)</li>
<li><?php bugfix(40442); ?> (ArrayObject::offsetExists broke in 5.2.1, works in 5.2.0). (olivier at elma dot fr, Marcus)</li>
<li><?php bugfix(40428); ?> (imagepstext() doesn't accept optional parameter). (Pierre)</li>
<li><?php bugfix(40417); ?> (Allow multiple instances of the same named PDO token in prepared statement emulation code). (Ilia)</li>
<li><?php bugfix(40414); ?> (possible endless fork() loop when running fastcgi). (Dmitry)</li>
<li><?php bugfix(40410); ?> (ext/posix does not compile on MacOS 10.3.9). (Tony)</li>
<li><?php bugfix(40392); ?> (memory leaks in PHP milter SAPI). (tuxracer69 at gmail dot com, Tony)</li>
<li><?php bugfix(40371); ?> (pg_client_encoding() not working on Windows). (Edin)</li>
<li><?php bugfix(40352); ?> (FCGI_WEB_SERVER_ADDRS function get lost). (Dmitry)</li>
<li><?php bugfix(40290); ?> (strtotime() returns unexpected result with particular timezone offset). (Derick)</li>
<li><?php bugfix(40286); ?> (PHP fastcgi with PHP_FCGI_CHILDREN don't kill children when parent is killed). (Dmitry)</li>
<li><?php bugfix(40261); ?> (Extremely slow data handling due to memory fragmentation). (Dmitry)</li>
<li><?php bugfix(40236); ?> (php -a function allocation eats memory). (Dmitry)</li>
<li><?php bugfix(40109); ?> (iptcembed fails on non-jfif jpegs). (Tony)</li>
<li><?php bugfix(39965); ?> (Latitude and longitude are backwards in date_sun_info()). (Derick)</li>
<li><?php bugfix(39836); ?> (SplObjectStorage empty after unserialize). (Marcus)</li>
<li><?php bugfix(39416); ?> (Milliseconds in date()). (Derick)</li>
<li><?php bugfix(39396); ?> (stream_set_blocking crashes on Win32). (Ilia, maurice at iceblog dot de)</li>
<li><?php bugfix(39351); ?> (relative include fails on Solaris). (Dmitry, Tony)</li>
<li><?php bugfix(39322); ?> (proc_terminate() destroys process resource). (Nuno)</li>
<li><?php bugfix(38406); ?> (crash when assigning objects to SimpleXML attributes). (Tony)</li>
<li><?php bugfix(37799); ?> (ftp_ssl_connect() falls back to non-ssl connection). (Nuno)</li>
<li><?php bugfix(36496); ?> (SSL support in imap_open() not working on Windows). (Edin)</li>
<li><?php bugfix(36226); ?> (Inconsistent handling when passing nillable arrays). (Dmitry)</li>
<li><?php bugfix(35872); ?> (Avoid crash caused by object store being referenced during RSHUTDOWN). (Andy) </li>
<li><?php bugfix(34794); ?> (proc_close() hangs when used with two processes). (jdolecek at netbsd dot org, Nuno)</li>
<li><?php bugfix(38710); ?> (data leakage because of nonexisting boundary checking in statements in mysqli) (Stas)</li>
<li><?php bugfix(37386); ?> (autocreating element doesn't assign value to first node). (Rob)</li>
<li><?php bugfix(37013); ?> (server hangs when returning circular object references). (Dmitry)</li>
<li><?php bugfix(33664); ?> Console window appears when using exec() (Richard Quadling, Stas)</li>
<li><?php peclbugfix(10194); ?> (crash in Oracle client when memory limit reached in the callback). (Tony)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.2.1"><!-- {{{ 5.2.1 -->
<h3>Version 5.2.1</h3>
<?php release_date('08-Feb-2007'); ?>
<ul>
<li>Added CURLOPT_TCP_NODELAY constant to Curl extension. (Sara)</li>
<li>Added support for hex numbers of any size. (Matt)</li>
<li>Added function stream_socket_shutdown(). It is a wrapper for system shutdown() function, that shut downs part of a full-duplex connection. (Dmitry)</li>
<li>Added internal heap protection (Dmitry)
 <ul>
   <li>memory-limit is always enabled (--enable-memory-limit removed)</li>
   <li>default value if memory-limit is set to 128M</li>
   <li>safe unlinking</li>
   <li>cookies</li>
   <li>canary protection (debug build only)</li>
   <li>random generation of cookies and canaries</li>
 </ul>
</li>
<li>Added forward support for 'b' prefix in front of string literals. (Andrei)</li>
<li>Added three new functions to ext/xmlwriter (Rob, Ilia)
 <ul>
   <li>xmlwriter_start_dtd_entity()</li>
   <li>xmlwriter_end_dtd_entity()</li>
   <li>xmlwriter_write_dtd_entity()</li>
 </ul>
</li>
<li>Added a meta tag to phpinfo() output to prevent search engines from indexing the page. (Ilia)</li>
<li>Added new function, sys_get_temp_dir(). (Hartmut)</li>
<li>Added missing object support to file_put_contents(). (Ilia)</li>
<li>Added support for md2, ripemd256 and ripemd320 algos to hash(). (Sara)</li>
<li>Added forward support for (binary) cast. (Derick)</li>
<li>Added optimization for imageline with horizontal and vertical lines (Pierre)</li>

<li>Removed dependency from SHELL32.DLL. (Dmitry)</li>
<li>Removed double &quot;wrong parameter count&quot; warnings in various functions.  (Hannes)</li>
<li>Moved extensions to PECL:
 <ul>
   <li>ext/informix (Derick, Tony)</li>
 </ul>
</li>
<li>Changed double-to-string utilities to use BSD implementation. (Dmitry, Tony)</li>
<li>Updated bundled libcURL to version 7.16.0 in the Windows distro. (Edin)</li>
<li>Updated timezone database to version 2006.16. (Derick)</li>
<li>cgi.* and fastcgi.* directives are moved to INI subsystem. The new directive cgi.check_shebang_line can be used to omitting check for &quot;#! /usr/bin/php&quot; line. (Dmitry).</li>
<li>Improved proc_open(). Now on Windows it can run external commands not through CMD.EXE. (Dmitry)</li>
<li>VCWD_REALPATH() is improved to use realpath cache without VIRTUAL_DIR. (Dmitry)</li>
<li>ext/bcmath initialization code is moved from request startup to module startup. (Dmitry)</li>
<li>Zend Memory Manager Improvements (Dmitry)
 <ul>
   <li>use HeapAlloc() instead of VirtualAlloc()</li>
   <li>use &quot;win32&quot; storage manager (instead of &quot;malloc&quot;) on Windows by default</li>
 </ul>
</li>
<li>Zip Extension Improvements (Pierre)
 <ul>
   <li>Fixed leak in statName and stateIndex</li>
   <li>Fixed return setComment (Hannes)</li>
   <li>Added addEmptyDir method</li>
 </ul>
</li>
<li>Filter Extension Improvements (Ilia, Pierre)
 <ul>
   <li>Fixed a bug when callback function returns a non-modified value.</li>
   <li>Added filter support for $_SERVER in cgi/apache2 sapis.</li>
   <li>Make sure PHP_SELF is filtered in Apache 1 sapi.</li>
   <li><?php bugfix(39358); ?> (INSTALL_HEADERS contains incorrect reference to php_filter.h).</li>
   <li>Added &quot;default&quot; option that allows a default value to be set for an invalid or missing value.</li>
   <li>Invalid filters fails instead of returning unsafe value</li>
   <li>Fixed possible double encoding problem with sanitizing filters</li>
   <li>Make use of space-strict strip_tags() function</li>
   <li>Fixed whitespace trimming</li>
   <li>Added support for FastCGI environment variables. (Dmitry)</li>
 </ul>
</li>
<li>PDO_MySQL Extension Improvements (Ilia)
 <ul>
   <li>Enabled buffered queries by default.</li>
   <li>Enabled prepared statement emulation by default.</li>
 </ul>
</li>

<li>Small optimization of the date() function. (Matt,Ilia)</li>
<li>Optimized the internal is_numeric_string() function. (Matt,Ilia)</li>
<li>Optimized array functions utilizing php_splice(). (Ilia)</li>
<li>Windows related optimizations (Dmitry, Stas)
 <ul>
   <li>COM initialization/deinitialization are done only if necessary</li>
   <li>removed unnecessary checks for ISREG file and corresponding stat() calls</li>
   <li>opendir() is reimplementation using GetFirstFile/GetNextFile those are faster then _findfirst/_findnext</li>
   <li>implemented registry cache that prevent registry lookup on each request. In case of modification of corresponding registry-tree PHP will reload it automatic</li>
   <li>start timeout thread only if necessary</li>
   <li>stat() is reimplementation using GetFileAttributesEx(). The new implementation is faster then implementation in MS VC CRT, but it doesn't support Windows 95.</li>
 </ul>
</li>
<li>Streams optimization (Dmitry)
 <ul>
   <li>removed unnecessary ftell() calls (one call for each included PHP file)</li>
   <li>disabled calls to read() after EOF</li>
 </ul>
</li>

<li>Fixed incorrect function names on FreeBSD where inet_pton() was named __inet_pton() and inet_ntop() was named __inet_ntop(). (Hannes)</li>
<li>Fixed FastCGI impersonation for persistent connections on Windows. (Dmitry)</li>
<li>Fixed wrong signature initialization in imagepng (Takeshi Abe)</li>
<li>Fixed ftruncate() with negative size on FreeBSD. (Hannes)</li>
<li>Fixed segfault in RegexIterator when given invalid regex. (Hannes)</li>
<li>Fixed segfault in SplFileObject-&gt;openFile()-&gt;getPathname(). (Hannes)</li>
<li>Fixed segfault in ZTS mode when OCI8 statements containing sub-statements  are destroyed in wrong order. (Tony)</li>
<li>Fixed the validate email filter so that the letter &quot;v&quot; can also be used in the user part of the email address. (Derick)</li>
<li><?php bugfix(40297); ?> (compile failure in ZTS mode when collections support is  missing). (Tony)</li>
<li><?php bugfix(40285); ?> (The PDO prepare parser goes into an infinite loop in some instances). (Ilia)</li>
<li><?php bugfix(40274); ?> (Sessions fail with numeric root keys). (Ilia)</li>
<li><?php bugfix(40259); ?> (ob_start call many times - memory error). (Dmitry)</li>
<li><?php bugfix(40231); ?> (file_exists incorrectly reports false). (Dmitry)</li>
<li><?php bugfix(40228); ?> (ZipArchive::extractTo does create empty directories  recursively). (Pierre)</li>
<li><?php bugfix(40200); ?> (The FastCgi version has different realpath results than  thread safe version). (Dmitry)</li>
<li><?php bugfix(40191); ?> (use of array_unique() with objects triggers segfault).  (Tony)</li>
<li><?php bugfix(40189); ?> (possible endless loop in zlib.inflate stream filter). (Greg, Tony)</li>
<li><?php bugfix(40169); ?> (CURLOPT_TCP_NODELAY only available in curl >= 7.11.2).  (Tony)</li>
<li><?php bugfix(40129); ?> (iconv extension doesn't compile with CodeWarrior on  Netware). (gk at gknw dot de, Tony)</li>
<li><?php bugfix(40127); ?> (apache2handler doesn't compile on Netware).  (gk at gknw dot de)</li>
<li><?php bugfix(40121); ?> (PDO_DBLIB driver wont free statements). (Ilia)</li>
<li><?php bugfix(40098); ?> (php_fopen_primary_script() not thread safe). (Ilia)</li>
<li><?php bugfix(40092); ?> (chroot() doesn't clear realpath cache). (Dmitry)</li>
<li><?php bugfix(40091); ?> (spl_autoload_register with 2 instances of the same class). (Ilia)</li>
<li><?php bugfix(40083); ?> (milter SAPI functions always return false/null). (Tony)</li>
<li><?php bugfix(40079); ?> (php_get_current_user() not thread safe). (Ilia, wharmby at uk dot ibm dot com)</li>
<li><?php bugfix(40078); ?> (ORA-01405 when fetching NULL values using oci_bind_array_by_name()). (Tony)</li>
<li><?php bugfix(40076); ?> (zend_alloc.c: Value of enumeration constant must be in  range of signed integer). (Dmitry)</li>
<li><?php bugfix(40073); ?> (exif_read_data dies on certain images). (Tony, Marcus)</li>
<li><?php bugfix(40036); ?> (empty() does not work correctly with ArrayObject when  using ARRAY_AS_PROPS). (Ilia)</li>
<li><?php bugfix(40012); ?> (php_date.c doesn't compile on Netware). (gk at gknw dot de, Derick)</li>
<li><?php bugfix(40009); ?> (http_build_query(array()) returns NULL). (Ilia)</li>
<li><?php bugfix(40002); ?> (Try/Catch performs poorly). (Dmitry)</li>
<li><?php bugfix(39993); ?> (tr_TR.UTF-8 locale has problems with PHP). (Ilia)</li>
<li><?php bugfix(39990); ?> (Cannot &quot;foreach&quot; over overloaded properties). (Dmitry)</li>
<li><?php bugfix(39988); ?> (type argument of oci_define_by_name() is ignored). (Chris Jones, Tony)</li>
<li><?php bugfix(39984); ?> (redirect response code in header() could be ignored  in CGI sapi). (Ilia)</li>
<li><?php bugfix(39979); ?> (PGSQL_CONNECT_FORCE_NEW will causes next connect to  establish a new connection). (Ilia)</li>
<li><?php bugfix(39971); ?> (pg_insert/pg_update do not allow now() to be used  for timestamp fields). (Ilia)</li>
<li><?php bugfix(39969); ?> (ini setting short_open_tag has no effect when using  --enable-maintainer-zts). (Dmitry)</li>
<li><?php bugfix(39952); ?> (zip ignoring --with-libdir on zlib checks) (judas dot iscariote at gmail dot com)</li>
<li><?php bugfix(39944); ?> (References broken). (Dmitry)</li>
<li><?php bugfix(39935); ?> (Extensions tidy,mcrypt,mhash,pdo_sqlite ignores  --with-libdir). (judas dot iscariote at gmail dot com, Derick)</li>
<li><?php bugfix(39903); ?> (Notice message when executing __halt_compiler() more than once). (Tony)</li>
<li><?php bugfix(39898); ?> (FILTER_VALIDATE_URL validates \r\n\t etc). (Ilia)</li>
<li><?php bugfix(39890); ?> (using autoconf 2.6x and --with-layout=GNU breaks PEAR install path). (Tony)</li>
<li><?php bugfix(39884); ?> (ReflectionParameter::getClass() throws exception for  type hint self). (thekid at php dot net)</li>
<li><?php bugfix(39878); ?> (CURL doesn't compile on Sun Studio Pro). (Ilia)</li>
<li><?php bugfix(39873); ?> (number_format() breaks with locale &amp; decimal points). (Ilia)</li>
<li><?php bugfix(39869); ?> (safe_read does not initialize errno). (michiel at boland dot org, Dmitry)</li>
<li><?php bugfix(39850); ?> (SplFileObject throws contradictory/wrong error messages when trying to open &quot;php://wrong&quot;). (Tony)</li>
<li><?php bugfix(39846); ?> (Invalid IPv4 treated as valid). (Ilia)</li>
<li><?php bugfix(39845); ?> (Persistent connections generate a warning in pdo_pgsql). (Ilia)</li>
<li><?php bugfix(39832); ?> (SOAP Server: parameter not matching the WSDL specified  type are set to 0). (Dmitry)</li>
<li><?php bugfix(39825); ?> (foreach produces memory error). (Dmitry)</li>
<li><?php bugfix(39816); ?> (apxs2filter ignores httpd.conf &amp; .htaccess php config  settings). (Ilia)</li>
<li><?php bugfix(39815); ?> (SOAP double encoding is not locale-independent). (Dmitry)</li>
<li><?php bugfix(39797); ?> (virtual() does not reset changed INI settings). (Ilia) </li>
<li><?php bugfix(39795); ?> (build fails on AIX because crypt_r() uses different  data struct). (Tony)</li>
<li><?php bugfix(39791); ?> (Crash in strtotime() on overly long relative date  multipliers). (Ilia)</li>
<li><?php bugfix(39787); ?> (PHP doesn't work with Apache 2.3). (mv at binarysec dot com).</li>
<li><?php bugfix(39782); ?> (setTime() on a DateTime constructed with a Weekday  yields incorrect results). (Ilia)</li>
<li><?php bugfix(39780); ?> (PNG image with CRC/data error raises fatal error) (Pierre)</li>
<li><?php bugfix(39779); ?> (Enable AUTH PLAIN mechanism in underlying libc-client). (michael dot heimpold at s2000 dot tu-chemnitz dot de, Ilia)</li>
<li><?php bugfix(39775); ?> (&quot;Indirect modification ...&quot; message is not shown). (Dmitry)</li>
<li><?php bugfix(39763); ?> (magic quotes are applied twice by ext/filter in  parse_str()). (Ilia) </li>
<li><?php bugfix(39760); ?> (cloning fails on nested SimpleXML-Object). (Rob)</li>
<li><?php bugfix(39759); ?> (Can't use stored procedures fetching multiple result  sets in pdo_mysql). (Ilia)</li>
<li><?php bugfix(39754); ?> (Some POSIX extension functions not thread safe). (Ilia, wharmby at uk dot ibm dot com)</li>
<li><?php bugfix(39751); ?> (putenv crash on Windows). (KevinJohnHoffman at gmail.com)</li>
<li><?php bugfix(39732); ?> (oci_bind_array_by_name doesn't work on Solaris 64bit). (Tony)</li>
<li><?php bugfix(39724); ?> (Broken build due to spl/filter usage of pcre extension). (Tony, Ilia)</li>
<li><?php bugfix(39718); ?> (possible crash if assert.callback is set in ini). (Ilia)</li>
<li><?php bugfix(39702); ?> (php crashes in the allocator on linux-m68k). (Dmitry)</li>
<li><?php bugfix(39685); ?> (iconv() - undefined function). (Hannes)</li>
<li><?php bugfix(39673); ?> (file_get_contents causes bus error on certain offsets). (Tony)</li>
<li><?php bugfix(39663); ?> (Memory leak in pg_get_notify() and a possible memory  corruption on Windows in pgsql and pdo_pgsql extensions). (Ilia, matteo at beccati dot com)</li>
<li><?php bugfix(39662); ?> (Segfault when calling asXML() of a cloned  SimpleXMLElement). (Rob, Tony)</li>
<li><?php bugfix(39656); ?> (crash when calling fetch() on a PDO statment object after closeCursor()). (Ilia, Tony)</li>
<li><?php bugfix(39653); ?> (ext/dba doesn't check for db-4.5 and db-4.4 when db4 support is enabled). (Tony)</li>
<li><?php bugfix(39652); ?> (Wrong negative results from memory_get_usage()). (Dmitry)</li>
<li><?php bugfix(39648); ?> (Implementation of PHP functions chown() and chgrp() are  not thread safe). (Ilia, wharmby at uk dot ibm dot com)</li>
<li><?php bugfix(39640); ?> (Segfault with &quot;Allowed memory size exhausted&quot;). (Dmitry)</li>
<li><?php bugfix(39625); ?> (Apache crashes on importStylesheet call). (Rob)</li>
<li><?php bugfix(39623); ?> (thread safety fixes on *nix for putenv() &amp; mime_magic). (Ilia, wharmby at uk dot ibm dot com)</li>
<li><?php bugfix(39621); ?> (str_replace() is not binary safe on strings with equal length). (Tony)</li>
<li><?php bugfix(39613); ?> (Possible segfault in imap initialization due to missing module dependency). (wharmby at uk dot ibm dot com, Tony)</li>
<li><?php bugfix(39606); ?> (Use of com.typelib_file in PHP.ini STILL causes A/V). (Rob)</li>
<li><?php bugfix(39602); ?> (Invalid session.save_handler crashes PHP). (Dmitry)</li>
<li><?php bugfix(39596); ?> (Creating Variant of type VT_ARRAY). (Rob)</li>
<li><?php bugfix(39583); ?> (ftp_put() does not change transfer mode to ASCII). (Tony)</li>
<li><?php bugfix(39576); ?> (array_walk() doesn't separate user data zval). (Tony)</li>
<li><?php bugfix(39575); ?> (move_uploaded_file() no longer working (safe mode  related)). (Tony)</li>
<li><?php bugfix(39571); ?> (timeout ssl:// connections). (Ilia)</li>
<li><?php bugfix(39564); ?> (PDO::errorInfo() returns inconsistent information when  sqlite3_step() fails). (Tony)</li>
<li><?php bugfix(39548); ?> (ZMSG_LOG_SCRIPT_NAME not routed to OutputDebugString() on Windows). (Dmitry)</li>
<li><?php bugfix(39538); ?> (fgetcsv can't handle starting newlines and trailing odd number of backslashes). (David Soria Parra, Pierre)</li>
<li><?php bugfix(39534); ?> (Error in maths to calculate of  ZEND_MM_ALIGNED_MIN_HEADER_SIZE). (wharmby at uk dot ibm dot com, Dmitry)</li>
<li><?php bugfix(39527); ?> (Failure to retrieve results when multiple unbuffered, prepared statements are used in pdo_mysql). (Ilia)</li>
<li><?php bugfix(39508); ?> (imagefill crashes with small images 3 pixels or less). (Pierre)</li>
<li><?php bugfix(39506); ?> (Archive corrupt with ZipArchive::addFile method). (Pierre)</li>
<li><?php bugfix(39504); ?> (xmlwriter_write_dtd_entity() creates Attlist tag, not  entity). (Hannes)</li>
<li><?php bugfix(39483); ?> (Problem with handling of \ char in prepared statements). (Ilia, suhachov at gmail dot com)</li>
<li><?php bugfix(39458); ?> (ftp_nlist() returns false on empty dirs). (Nuno)</li>
<li><?php bugfix(39454); ?> (Returning a SOAP array segfaults PHP). (Dmitry)</li>
<li><?php bugfix(39450); ?> (getenv() fills other super-globals). (Ilia, Tony)</li>
<li><?php bugfix(39449); ?> (Overloaded array properties do not work correctly). (Dmitry)</li>
<li><?php bugfix(39445); ?> (Calling debug_backtrace() in the __toString() function produces a crash). (Dmitry)</li>
<li><?php bugfix(39438); ?> (Fatal error: Out of memory). (Dmitry)</li>
<li><?php bugfix(39435); ?> ('foo' instanceof bar gives invalid opcode error). (Sara)</li>
<li><?php bugfix(39414); ?> (Syntax error while compiling with Sun Workshop Complier). (Johannes)</li>
<li><?php bugfix(39398); ?> (Booleans are not automatically translated to integers). (Ilia)</li>
<li><?php bugfix(39394); ?> (Missing check for older variants of openssl). (Ilia)</li>
<li><?php bugfix(39367); ?> (clearstatcache() doesn't clear realpath cache). (j at pureftpd dot org, Dmitry)</li>
<li><?php bugfix(39366); ?> (imagerotate does not use alpha with angle > 45 degrees) (Pierre)</li>
<li><?php bugfix(39364); ?> (Removed warning on empty haystack inside mb_strstr()). (Ilia)</li>
<li><?php bugfix(39362); ?> (Added an option to imap_open/imap_reopen to control the number of connection retries). (Ilia)</li>
<li>Fixed bugs <?php bugl(39361); ?>, <?php bugl(39400); ?> (mbstring function overloading problem). (Seiji)</li>
<li><?php bugfix(39354); ?> (Allow building of curl extension against libcurl 7.16.0). (Ilia) </li>
<li><?php bugfix(39350); ?> (crash with implode(&quot;\n&quot;, array(false))). (Ilia)</li>
<li><?php bugfix(39344); ?> (Unnecessary calls to OnModify callback routine for an extension INI directive). (wharmby at uk dot ibm dot com, Dmitry)</li>
<li><?php bugfix(39320); ?> (ZEND_HASH_APPLY_STOP causes deletion). (Marcus)</li>
<li><?php bugfix(39313); ?> (spl_autoload triggers Fatal error). (Marcus)</li>
<li><?php bugfix(39300); ?> (make install fails if wget is not available). (Tony)</li>
<li><?php bugfix(39297); ?> (Memory corruption because of indirect modification of overloaded array). (Dmitry)</li>
<li><?php bugfix(39286); ?> (misleading error message when invalid dimensions are given) (Pierre)</li>
<li><?php bugfix(39273); ?> (imagecopyresized may ignore alpha channel) (Pierre)</li>
<li><?php bugfix(39265); ?> (Fixed path handling inside mod_files.sh). (michal dot taborsky at gmail dot com, Ilia)</li>
<li><?php bugfix(39217); ?> (serialNumber might be -1 when the value is too large). (Pierre, Tony)</li>
<li><?php bugfix(39215); ?> (Inappropriate close of stdin/stdout/stderr). (Wez, Ilia)</li>
<li><?php bugfix(39201); ?> (Possible crash in Apache 2 with 413 ErrorHandler). (Ilia)</li>
<li><?php bugfix(39151); ?> (Parse error in recursiveiteratoriterator.php). (Marcus)</li>
<li><?php bugfix(39121); ?> (Incorrect return array handling in non-wsdl soap client). (Dmitry)</li>
<li><?php bugfix(39090); ?> (DirectoryFilterDots doxygen docs and example is wrong). (Marcus)</li>
<li><?php bugfix(38852); ?> (XML-RPC Breaks iconv). (Hannes)</li>
<li><?php bugfix(38770); ?> (unpack() broken with longs on 64 bit machines). (Ilia, David Soria Parra).</li>
<li><?php bugfix(38698); ?> (for some keys cdbmake creates corrupted db and cdb can't read valid db). (Marcus)</li>
<li><?php bugfix(38680); ?> (Added missing handling of basic types in json_decode). (Ilia)</li>
<li><?php bugfix(38604); ?> (Fixed request time leak inside foreach() when iterating through virtual properties). (Dmitry)</li>
<li><?php bugfix(38602); ?> (header( &quot;HTTP/1.0 ...&quot; ) does not change proto version). (Ilia)</li>
<li><?php bugfix(38542); ?> (proc_get_status() returns wrong PID on windows). (Nuno)</li>
<li><?php bugfix(38536); ?> (SOAP returns an array of values instead of an object). (Dmitry)</li>
<li><?php bugfix(38456); ?> (Apache2 segfaults when virtual() is called in .php  ErrorDocument). (Ilia)</li>
<li><?php bugfix(38325); ?> (spl_autoload_register() gives wrong line for &quot;class not found&quot;). (Ilia)</li>
<li><?php bugfix(38319); ?> (Remove bogus warnings from persistent PDO connections). (Ilia)</li>
<li><?php bugfix(38274); ?> (Memlimit fatal error sent to &quot;wrong&quot; stderr when using fastcgi). (Dmitry)</li>
<li><?php bugfix(38252); ?> (Incorrect PDO error message on invalid default fetch mode). (Ilia)</li>
<li><?php bugfix(37927); ?> (Prevent trap when COM extension processes argument of type VT_DISPATCH|VT_REF) (Andy)</li>
<li><?php bugfix(37773); ?> (iconv_substr() gives &quot;Unknown error&quot; when string length = 1&quot;). (Ilia)</li>
<li><?php bugfix(37627); ?> (session save_path check checks the parent directory). (Ilia)</li>
<li><?php bugfix(37619); ?> (proc_open() closes stdin on fork() failure). (jdolecek at NetBSD dot org, Nuno)</li>
<li><?php bugfix(37588); ?> (COM Property propputref converts to PHP function and can't be accesed). (Rob)</li>
<li><?php bugfix(36975); ?> (natcasesort() causes array_pop() to misbehave). (Hannes)</li>
<li><?php bugfix(36812); ?> (pg_execute() modifies input array). (Ilia)</li>
<li><?php bugfix(36798); ?> (Error parsing named parameters with queries containing high-ascii chars). (Ilia)</li>
<li><?php bugfix(36644); ?> (possible crash in variant_date_from_timestamp()). (Ilia)</li>
<li><?php bugfix(36427); ?> (proc_open() / proc_close() leak handles on windows). (jdolecek at NetBSD dot org, Nuno)</li>
<li><?php bugfix(36392); ?> (wrong number of decimal digits with %e specifier in sprintf). (Matt,Ilia)</li>
<li><?php bugfix(36214); ?> (__get method works properly only when conditional operator is used). (Dmitry)</li>
<li><?php bugfix(35634); ?> (Erroneous &quot;Class declarations may not be nested&quot; error raised). (Carl P. Corliss, Dmitry)</li>
<li><?php bugfix(35106); ?> (nested foreach fails when array variable has a reference). (Dmitry)</li>
<li><?php bugfix(34564); ?> (COM extension not returning modified &quot;out&quot; argument) (Andy)</li>
<li><?php bugfix(33734); ?> (Something strange with COM Object). (Rob)</li>
<li><?php bugfix(33386); ?> (ScriptControl only sees last function of class). (Rob)</li>
<li><?php bugfix(33282); ?> (Re-assignment by reference does not clear the is_ref flag) (Ilia, Dmitry, Matt Wilmas)</li>
<li><?php bugfix(30074); ?> (apparent symbol table error with  extract($blah, EXTR_REFS)) (Brian)</li>
<li><?php bugfix(29840); ?> (is_executable() does not honor safe_mode_exec_dir  setting). (Ilia)</li>
<li><?php peclbugfix(7295); ?> (ORA-01405: fetched column value is NULL on LOB fields). (Tony)</li>

</ul>

<!-- }}} --></section>

<section class="version" id="5.2.0"><!-- {{{ 5.2.0 -->
<h3>Version 5.2.0</h3>
<?php release_date('02-Nov-2006'); ?>
<ul>
<li>Updated bundled OpenSSL to version 0.9.8d in the Windows distro. (Edin)</li>
<li>Updated Postgresql client libraries to 8.1.4 in the Windows distro. (Edin)</li>
<li>Updated PCRE to version 6.7. (Ilia)</li>
<li>Updated libsqlite in ext/pdo_sqlite to 3.3.7. (Ilia)</li>
<li>Updated bundled MySQL client library to version 5.0.22 in the Windows distribution. (Edin)</li>
<li>Updated timezonedb to version 2006.14. (Derick)</li>

<li>Added ability to make SOAP call userspace PHP&lt;-&gt;XML converters. (Dmitry)</li>
<li>Added support for character sets in pg_escape_string() for PostgreSQL 8.1.4 and higher. (Ilia)</li>
<li>Added support for character sets in PDO quote() method for PostgreSQL 8.1.4 and higher. (Ilia)</li>
<li>Added DSA key generation support to openssl_pkey_new(), FR <?php bugl(38731); ?> (marci at balabit dot hu, Tony)</li>
<li>Added SoapServer::setObject() method (it is a simplified version of SoapServer::setClass() method). (Dmitry)</li>
<li>Added support for hexadecimal entity in imagettftext() for the bundled GD. (Pierre)</li>
<li>Added support for httpOnly flag for session extension and cookie setting functions. (Scott MacVicar, Ilia)</li>
<li>Added version specific registry keys to allow different configurations for different php version. (Richard, Dmitry)</li>
<li>Added &quot;PHPINIDir&quot; Apache directive to apache and apache_hooks SAPIs. (Dmitry)</li>
<li>Added an optional boolean parameter to memory_get_usage() and  memory_get_peak_usage() to get memory size allocated by emalloc() or real size of memory allocated from system. (Dmitry)</li>
<li>Added Zip Archive extension. (Pierre)</li>
<li>Added RFC1867 fileupload processing hook. (Stefan E.)</li>
<li>Added JSON and Filter extensions. (Derick, Rasmus, Pierre, Ilia)</li>
<li>Added error messages to disk_free_space() and disk_total_space() functions. FR <?php bugl(37971); ?> (Tony)</li>
<li>Added PATHINFO_FILENAME option to pathinfo() to get the filename. (Toby S.  and Christian S.)</li>
<li>Added array_fill_keys() function. (Marcus, Matt Wilmas)</li>
<li>Added posix_initgroups() function. (Ilia)</li>
<li>Added optional parameter to http_build_query() to allow specification of string separator. (Ilia)</li>
<li>Added image_type_to_extension() function. (Hannes, Ilia)</li>
<li>Added allow_url_include ini directive to complement allow_url_fopen. (Rasmus)</li>
<li>Added automatic module globals management. (Dmitry)</li>
<li>Added RFC2397 (data: stream) support. (Marcus)</li>
<li>Added new error mode E_RECOVERABLE_ERROR. (Derick, Marcus, Tony)</li>
<li>Added support for getenv() input filtering. (Rasmus)</li>
<li>Added support for constructors in interfaces to force constructor signature checks in implementations. (Marcus)</li>
<li>Added memory_get_peak_usage() function for retrieving peak memory usage of a PHP script. (Ilia)</li>
<li>Added pg_field_table() function. (Edin)</li>
<li>Added SimpleXMLElement::saveXML() as an alias for SimpleXMLElement::asXML(). (Hannes)</li>
<li>Added DOMNode::getNodePath() for getting an XPath for a node. (Christian)</li>
<li>Added gmp_nextprime() function. (ants dot aasma at gmail dot com, Tony)</li>
<li>Added error_get_last() function. (Mike)</li>

<li>Removed current working directory from the php.ini search path for CLI and re-added it for other SAPIs (restore to pre 5.1.x behavior). (Edin)</li>
<li>Moved extensions to PECL:
 <ul>
   <li>ext/filepro (Derick, Tony)</li>
   <li>ext/hwapi (Derick, Tony)</li>
 </ul>
</li>
<li>Disabled CURLOPT_FOLLOWLOCATION in curl when open_basedir or safe_mode are enabled. (Stefan E., Ilia)</li>

<li>Increased default memory limit to 16 megabytes to accommodate for a more accurate memory utilization measurement.</li>
<li>In addition to path to php.ini, PHPRC now may specify full file name. (Dmitry)</li>

<li>Optimized array/HashTable copying. (Matt Wilmas, Dmitry)</li>
<li>Optimized zend_try/zend_catch macros by eliminating memcpy(3). (Dmitry)</li>
<li>Optimized require_once() and include_once() by eliminating fopen(3) on second usage. (Dmitry)</li>
<li>Optimized request shutdown sequence. Restoring ini directives now iterates only over modified directives instead of all. (Dmitry)</li>

<li>Changed priority of PHPRC environment variable on win32 to be higher then value from registry. (Dmitry)</li>
<li>Changed __toString() to be called wherever applicable. (Marcus)</li>
<li>Changed E_ALL error reporting mode to include E_RECOVERABLE_ERROR. (Marcus)</li>
<li>Changed realpath cache to be disabled when &quot;open_basedir&quot; or &quot;safe_mode&quot; are enabled on per-request basis. (Ilia)</li>

<li>Improved SNMP extension: (Jani)
 <ul>
   <li>Renamed snmp_set_oid_numeric_print() to snmp_set_oid_output_format(). </li>
   <li>Added 2 new constants: SNMP_OID_OUTPUT_FULL and SNMP_OID_OUTPUT_NUMERIC</li>
   <li><?php bugfix(37564); ?> (AES privacy encryption not possible due to net-snmp 5.2 compatibility issue). (Patch: scott dot moynes+php at gmail dot com)</li>
 </ul>
</li>
<li>Improved OpenSSL extension: (Pierre)
 <ul>
   <li>Added support for all supported algorithms in openssl_verify</li>
   <li>Added openssl_pkey_get_details, returns the details of a key</li>
   <li>Added x509 v3 extensions support</li>
   <li>Added openssl_csr_get_subject() and openssl_csr_get_public_key()</li>
   <li>Added 3 new constants OPENSSL_VERSION_TEXT and OPENSSL_VERSION_NUMBER and OPENSSL_KEYTYPE_EC</li>
 </ul>
</li>
<li>Improved the Zend memory manager: (Dmitry)
 <ul>
   <li>Removed unnecessary &quot;--disable-zend-memory-manager&quot; configure option.</li>
   <li>Added &quot;--enable-malloc-mm&quot; configure option which is enabled by default in debug builds to allow using internal and external memory debuggers.</li>
   <li>Allow tweaking the memory manager with ZEND_MM_MEM_TYPE and ZEND_MM_SEG_SIZE  environment variables.</li>
   <li>For more information: Zend/README.ZEND_MM</li>
 </ul>
</li>
<li>Improved safe_mode check for the error_log() function. (Ilia)</li>
<li>Improved the error reporting in SOAP extension on request failure. (Ilia)</li>
<li>Improved crypt() on win32 to be about 10 times faster and to have friendlier license. (Frank, Dmitry)</li>
<li>Improved performance of the implode() function on associated arrays. (Ilia)</li>
<li>Improved performance of str_replace() when doing 1 char to 1 char or 1 char to many chars replacement. (Ilia)</li>
<li>Improved apache2filter SAPI:
 <ul>
   <li>Allowed PHP to be an arbitrary filter in the chain and read the script from the Apache stream. (John)</li>
   <li>Added support for apache2filter in the Windows build including binary support for both Apache 2.0.x (php5apache2_filter.dll) and Apache 2.2.x (php5apache2_2_filter.dll). (Edin)</li>
 </ul>
</li>
<li>Improved apache2handler SAPI:
 <ul>
   <li>Changed ap_set_content_type() to be called only once. (Mike)</li>
   <li>Added support for Apache 2.2 handler in the Windows distribution. (Edin)</li>
 </ul>
</li>
<li>Improved FastCGI SAPI: (Dmitry)
 <ul>
   <li>Removed source compatibility with libfcgi.</li>
   <li>Optimized access to FastCGI environment variables by using HashTable instead of linear search.</li>
   <li>Allowed PHP_FCGI_MAX_REQUESTS=0 that assumes no limit.</li>
   <li>Allowed PHP_FCGI_CHILDREN=0 that assumes no worker children. (FastCGI requests are handled by main process itself)</li>
 </ul>
</li>
<li>Improved CURL:
  <ul>
   <li>Added control character checks for &quot;open_basedir&quot; and &quot;safe_mode&quot; checks. (Ilia)</li>
   <li>Added implementation of curl_multi_info_read(). (Brian)</li>
  </ul>
</li>
<li>Improved PCRE: (Andrei)
 <ul>
   <li>Added run-time configurable backtracking/recursion limits.</li>
   <li>Added preg_last_error(). (Andrei)</li>
 </ul>
</li>
<li>Improved PDO:
  <ul>
   <li>Added new attribute ATTR_DEFAULT_FETCH_MODE. (Pierre)</li>
   <li>Added FETCH_PROPS_LATE. (Marcus)</li>
  </ul>
</li>
<li>Improved SPL: (Marcus)
 <ul>
   <li>Made most iterator code exception safe.</li>
   <li>Added RegExIterator and RecursiveRegExIterator.</li>
   <li>Added full caching support and ArrayAccess to CachingIterator.</li>
   <li>Added array functions to ArrayObject/ArrayIterator and made them faster.</li>
   <li>Added support for reading csv and skipping empty lines in SplFileObject.</li>
   <li>Added CachingIterator::TOSTRING_USE_INNER, calls inner iterator __toString.</li>
   <li>Added ability to set the CSV separator per SplFileObject.</li>
 </ul>
</li>
<li>Improved xmlReader: (Rob)
  <ul>
   <li>Added readInnerXml(), xmlReader::setSchema().</li>
   <li>Added readInnerXML(), readOuterXML(), readString(), setSchema(). (2.6.20+)</li>
   <li>Changed to passing libxml options when loading reader.</li>
  </ul>
</li>
<li>Fixed invalid read in imagecreatefrompng when an empty file is given (Pierre, Tony)</li>
<li>Fixed infinite loop when a wrong color index is given to imagefill (Pierre)</li>
<li>Fixed mess with CGI/CLI -d option (now it works with cgi; constants are working exactly like in php.ini; with FastCGI -d affects all requests). (Dmitry)</li>
<li>Fixed missing open_basedir check inside chdir() function. (Ilia)</li>
<li>Fixed overflow on 64bit systems in str_repeat() and wordwrap(). (Stefan E.)</li>
<li>Fixed XSLTProcessor::importStylesheet() to return TRUE on success (Christian)</li>
<li>Fixed leaks in openssl_csr_sign and openssl_csr_new (Pierre)</li>
<li>Fixed phpinfo() cutoff of variables at \0. (Ilia)</li>
<li>Fixed a bug in the filter extension that prevented magic_quotes_gpc from being applied when RAW filter is used. (Ilia)</li>
<li>Fixed memory leaks in openssl streams context options. (Pierre)</li>
<li>Fixed handling of extremely long paths inside tempnam() function. (Ilia)</li>
<li><?php bugfix(39304); ?> Segmentation fault with list unpacking of string offset). (Dmitry)</li>
<li><?php bugfix(39192); ?> Not including nsapi.h properly with SJSWS 7). This will make PHP 5.2 compatible to new Sun Webserver. (Uwe)</li>
<li><?php bugfix(39140); ?> Uncaught exception may cause crash). (Dmitry)</li>
<li><?php bugfix(39125); ?> Memleak when reflecting non-existing class/method). (Tony)</li>
<li><?php bugfix(39067); ?> getDeclaringClass() and private properties). (Tony)</li>
<li><?php bugfix(39039); ?> SSL: fatal protocol error when fetching HTTPS from servers running Google web server). (Ilia)</li>
<li><?php bugfix(39035); ?> Compatibility issue between DOM and  zend.ze1_compatibility_mode). (Rob)</li>
<li><?php bugfix(39034); ?> curl_exec() with return transfer returns TRUE on empty files). (Ilia)</li>
<li><?php bugfix(39032); ?> strcspn() stops on null character). (Tony)</li>
<li><?php bugfix(39020); ?> PHP in FastCGI server mode crashes). (Dmitry)</li>
<li><?php bugfix(39017); ?> foreach(($obj = new myClass) as $v); echo $obj; segfaults). (Dmitry)</li>
<li><?php bugfix(39004); ?> Fixed generation of config.nice with autoconf 2.60). (Ilia)</li>
<li><?php bugfix(39003); ?> __autoload() is called for type hinting). (Dmitry, Tony)</li>
<li><?php bugfix(39001); ?> ReflectionProperty returns incorrect declaring class for  protected properties). (Tony)</li>
<li><?php bugfix(38996); ?> PDO_MYSQL doesn&#39;t check connections for liveness). (Tony)</li>
<li><?php bugfix(38993); ?> Fixed safe_mode/open_basedir checks for session.save_path, allowing them to account for extra parameters). (Ilia)</li>
<li><?php bugfix(38989); ?> Absolute path with slash at beginning doesn&#39;t work on win). (Dmitry)</li>
<li><?php bugfix(38985); ?> Can&#39;t cast COM objects). (Wez)</li>
<li><?php bugfix(38981); ?> using FTP URLs in get_headers() causes crash). (Tony)</li>
<li><?php bugfix(38963); ?> Fixed a possible open_basedir bypass in tempnam()). (Ilia)</li>
<li><?php bugfix(38961); ?> metaphone() results in segmentation fault on NetBSD).  (Tony)</li>
<li><?php bugfix(38949); ?> Cannot get xmlns value attribute). (Rob)</li>
<li><?php bugfix(38942); ?> Double old-style-ctor inheritance). (Dmitry)</li>
<li><?php bugfix(38941); ?> imap extension does not compile against new version of the imap library). (Ilia)</li>
<li><?php bugfix(38934); ?> move_uploaded_file() cannot read uploaded file outside of open_basedir). (Ilia)</li>
<li><?php bugfix(38904); ?> apache2filter changes cwd to /). (Ilia, Hannes)</li>
<li><?php bugfix(38891); ?> get_headers() do not work with curl-wrappers). (Ilia)</li>
<li><?php bugfix(38882); ?> ldap_connect causes segfault with newer versions of OpenLDAP). (Tony)</li>
<li><?php bugfix(38859); ?> parse_url() fails if passing &#39;@&#39; in passwd). (Tony)</li>
<li><?php bugfix(38850); ?> lookupNamespaceURI doesn&#39;t return default namespace). (Rob)</li>
<li><?php bugfix(38844); ?> curl_easy_strerror() is defined only since cURL 7.12.0). (Tony)</li>
<li><?php bugfix(38813); ?> DOMEntityReference-&gt;__construct crashes when called  explicitly). (Rob)</li>
<li><?php bugfix(38808); ?> &quot;maybe ref&quot; issue for current() and others). (Dmitry)</li>
<li><?php bugfix(38779); ?> engine crashes when require()&#39;ing file with syntax error  through userspace stream wrapper). (Tony, Dmitry)</li>
<li><?php bugfix(38772); ?> inconsistent overriding of methods in different visibility contexts). (Dmitry)</li>
<li><?php bugfix(38759); ?> PDO sqlite2 empty query causes segfault). (Tony)</li>
<li><?php bugfix(38721); ?> Invalid memory read in date_parse()). (Tony, Derick)</li>
<li><?php bugfix(38700); ?> SoapClient::__getTypes never returns). (Dmitry)</li>
<li><?php bugfix(38693); ?> curl_multi_add_handle() set curl handle to null). (Ilia)</li>
<li><?php bugfix(38687); ?> sockaddr local storage insufficient for all sock families). (Sara)</li>
<li><?php bugfix(38661); ?> mixed-case URL breaks url-wrappers). (Ilia)</li>
<li><?php bugfix(38653); ?> memory leak in ReflectionClass::getConstant()). (Tony)</li>
<li><?php bugfix(38649); ?> uninit&#39;d optional arg in stream_socket_sendto()). (Sara)</li>
<li><?php bugfix(38637); ?> curl_copy_handle() fails to fully copy the cURL handle). (Tony, Ilia)</li>
<li><?php bugfix(38624); ?> Strange warning when incrementing an object property and  exception is thrown from __get method). (Tony)</li>
<li><?php bugfix(38623); ?> leaks in a tricky code with switch() and exceptions). (Dmitry)</li>
<li><?php bugfix(38579); ?> include_once() may include the same file twice). (Dmitry)</li>
<li><?php bugfix(38574); ?> missing curl constants and improper constant detection). (Ilia)</li>
<li><?php bugfix(38543); ?> shutdown_executor() may segfault when memory_limit is too low). (Dmitry)</li>
<li><?php bugfix(38535); ?> memory corruption in pdo_pgsql driver on error retrieval inside a failed query executed via query() method). (Ilia)</li>
<li><?php bugfix(38534); ?> segfault when calling setlocale() in userspace session  handler). (Tony)</li>
<li><?php bugfix(38524); ?> strptime() does not initialize the internal date storage structure). (Ilia)</li>
<li>Fixed bugs <?php bugl(38511); ?>, <?php bugl(38473); ?>, <?php bugl(38263); ?> (Fixed session extension request shutdown order to ensure it is shutdown before the extensions it may depend on). (Ilia)</li>
<li><?php bugfix(38488); ?> Access to &quot;php://stdin&quot; and family crashes PHP on win32). (Dmitry)</li>
<li><?php bugfix(38474); ?> getAttribute select attribute by order, even when  prefixed). (Rob)</li>
<li><?php bugfix(38467); ?> --enable-versioning causes make fail on OS X). (Tony)</li>
<li><?php bugfix(38465); ?> ReflectionParameter fails if default value is an access to self::). (Johannes)</li>
<li><?php bugfix(38464); ?> array_count_values() mishandles numeric strings).  (Matt Wilmas, Ilia)</li>
<li><?php bugfix(38461); ?> setting private attribute with __set() produces  segfault). (Tony)</li>
<li><?php bugfix(38458); ?> <?php peclbugfix(8944); ?>, <?php peclbugfix(7775); ?> (error retrieving columns after long/text columns with PDO_ODBC). (Wez)</li>
<li><?php bugfix(38454); ?> warning upon disabling handler via  xml_set_element_handler). (dtorop933 at gmail dot com, Rob)</li>
<li><?php bugfix(38451); ?> PDO_MYSQL doesn&#39;t compile on Solaris). (Tony)</li>
<li><?php bugfix(38450); ?> constructor is not called for classes used in userspace  stream wrappers). (Tony)</li>
<li><?php bugfix(38438); ?> DOMNodeList-&gt;item(0) segfault on empty NodeList). (Ilia)</li>
<li><?php bugfix(38431); ?> xmlrpc_get_type() crashes PHP on objects). (Tony)</li>
<li><?php bugfix(38427); ?> unicode causes xml_parser to misbehave). (Rob)</li>
<li><?php bugfix(38424); ?> Different attribute assignment if new or existing). (Rob)</li>
<li><?php bugfix(38400); ?> Use of com.typelib_file may cause a crash). (Ilia)</li>
<li><?php bugfix(38394); ?> PDO fails to recover from failed prepared statement execution). (Ilia)</li>
<li><?php bugfix(38377); ?> session_destroy() gives warning after session_regenerate_id()). (Ilia)</li>
<li><?php bugfix(38357); ?> dbase_open can&#39;t open DBase 3 dbf file). (rodrigo at fabricadeideias dot com, Mike)</li>
<li><?php bugfix(38354); ?> Unwanted reformatting of XML when using AsXML). (Christian)</li>
<li><?php bugfix(38347); ?> Segmentation fault when using foreach with an unknown/empty  SimpleXMLElement). (Tony)</li>
<li><?php bugfix(38322); ?> reading past array in sscanf() leads to arbitrary code  execution). (Tony)</li>
<li><?php bugfix(38315); ?> Constructing in the destructor causes weird behavior). (Dmitry)</li>
<li><?php bugfix(38303); ?> spl_autoload_register() suppress all errors silently). (Ilia)</li>
<li><?php bugfix(38290); ?> configure script ignores --without-cdb,inifile,flatfile). (Marcus)</li>
<li><?php bugfix(38289); ?> segfault in session_decode() when _SESSION is NULL).  (Tony)</li>
<li><?php bugfix(38287); ?> static variables mess up global vars). (Dmitry)</li>
<li><?php bugfix(38278); ?> session_cache_expire()&#39;s value does not match phpinfo&#39;s  session.cache_expire). (Tony)</li>
<li><?php bugfix(38276); ?> file_exists() works incorrectly with long filenames  on Windows). (Ilia, Tony)</li>
<li><?php bugfix(38269); ?> fopen wrapper doesn&#39;t fail on invalid hostname with  curlwrappers enabled). (Tony)</li>
<li><?php bugfix(38265); ?> heap corruption). (Dmitry)</li>
<li><?php bugfix(38261); ?> openssl_x509_parse() leaks with invalid cert) (Pierre)</li>
<li><?php bugfix(38255); ?> openssl possible leaks while passing keys) (Pierre)</li>
<li><?php bugfix(38253); ?> PDO produces segfault with default fetch mode). (Tony)</li>
<li><?php bugfix(38251); ?> socket_select() and invalid arguments). (Tony)</li>
<li><?php bugfix(38236); ?> Binary data gets corrupted on multipart/formdata POST). (Ilia)</li>
<li><?php bugfix(38234); ?> Exception in __clone makes memory leak). (Dmitry, Nuno)</li>
<li><?php bugfix(38229); ?> strtotime() does not parse YYYY-MM format). (Ilia)</li>
<li><?php bugfix(38224); ?> session extension can&#39;t handle broken cookies). (Ilia)</li>
<li><?php bugfix(38220); ?> Crash on some object operations). (Dmitry)</li>
<li><?php bugfix(38217); ?> ReflectionClass::newInstanceArgs() tries to allocate too  much memory). (Tony)</li>
<li><?php bugfix(38214); ?> gif interlace output cannot work). (Pierre)</li>
<li>Fixed bugs <?php bugl(38213); ?>, <?php bugl(37611); ?>, <?php bugl(37571); ?> (wddx encoding fails to handle certain  characters). (Ilia)</li>
<li><?php bugfix(38212); ?> Segfault on invalid imagecreatefromgd2part() parameters). (Pierre)</li>
<li><?php bugfix(38211); ?> variable name and cookie name match breaks script execution). (Dmitry)</li>
<li><?php bugfix(38199); ?> fclose() unable to close STDOUT and STDERR). (Tony)</li>
<li><?php bugfix(38198); ?> possible crash when COM reports an exception). (Ilia)</li>
<li><?php bugfix(38194); ?> ReflectionClass::isSubclassOf() returns TRUE for the class itself). (Ilia)</li>
<li><?php bugfix(38183); ?> disable_classes=Foobar causes disabled class to be called Foo). (Jani)</li>
<li><?php bugfix(38179); ?> imagecopy from a palette to a truecolor image loose alpha channel) (Pierre)</li>
<li><?php bugfix(38173); ?> Freeing nested cursors causes OCI8 to segfault). (Tony)</li>
<li><?php bugfix(38168); ?> Crash in pdo_pgsql on missing bound parameters). (Ilia)</li>
<li><?php bugfix(38161); ?> oci_bind_by_name() returns garbage when Oracle didn&#39;t set  the variable). (Tony)</li>
<li><?php bugfix(38146); ?> Cannot use array returned from foo::__get(&#39;bar&#39;) in write context). (Dmitry)</li>
<li><?php bugfix(38132); ?> ReflectionClass::getStaticProperties() retains \0 in key names). (Ilia)</li>
<li><?php bugfix(38125); ?> undefined reference to spl_dual_it_free_storage). (Marcus)</li>
<li><?php bugfix(38112); ?> corrupted gif segfaults) (Pierre)</li>
<li><?php bugfix(38096); ?> large timeout values ignored on 32bit machines in stream_socket_accept() and stream_socket_client()). (Ilia)</li>
<li><?php bugfix(38086); ?> stream_copy_to_stream() returns 0 when maxlen is bigger  than the actual length). (Tony)</li>
<li><?php bugfix(38072); ?> boolean arg for mysqli_autocommit() is always true on  Solaris). (Tony)</li>
<li><?php bugfix(38067); ?> Parameters are not decoded from utf-8 when using encoding option). (Dmitry)</li>
<li><?php bugfix(38064); ?> ignored constructor visibility). (Marcus)</li>
<li><?php bugfix(38055); ?> Wrong interpretation of boolean parameters). (Dmitry)</li>
<li><?php bugfix(38047); ?> &quot;file&quot; and &quot;line&quot; sometimes not set in backtrace from inside error handler). (Dmitry)</li>
<li><?php bugfix(38019); ?> segfault extending mysqli class). (Dmitry)</li>
<li><?php bugfix(38005); ?> SoapFault faultstring doesn&#39;t follow encoding rules). (Dmitry)</li>
<li><?php bugfix(38004); ?> Parameters in SoapServer are decoded twice). (Dmitry)</li>
<li><?php bugfix(38003); ?> in classes inherited from MySQLi it&#39;s possible to call  private constructors from invalid context). (Tony)</li>
<li><?php bugfix(37987); ?> invalid return of file_exists() in safe mode). (Ilia)</li>
<li><?php bugfix(37947); ?> zend_ptr_stack reallocation problem). (Dmitry)</li>
<li><?php bugfix(37945); ?> pathinfo() cannot handle argument with special characters like German &quot;Umlaut&quot;). (Mike)</li>
<li><?php bugfix(37931); ?> possible crash in OCI8 after database restart  when using persistent connections). (Tony)</li>
<li><?php bugfix(37923); ?> Display constant value in reflection::export). (Johannes)</li>
<li><?php bugfix(37920); ?> compilation problems on z/OS). (Tony)</li>
<li><?php bugfix(37870); ?> pgo_pgsql tries to de-allocate unused statements). (Ilia, ce at netage dot bg)</li>
<li><?php bugfix(37864); ?> file_get_contents() leaks on empty file). (Hannes)</li>
<li><?php bugfix(37862); ?> Integer pointer comparison to numeric value). (bugs-php at thewrittenword dot com)</li>
<li><?php bugfix(37846); ?> wordwrap() wraps incorrectly). (ddk at krasn dot ru, Tony)</li>
<li><?php bugfix(37816); ?> ReflectionProperty does not throw exception when accessing protected attribute). (Marcus)</li>
<li><?php bugfix(37811); ?> define not using toString on objects). (Marcus)</li>
<li><?php bugfix(37807); ?> segmentation fault during SOAP schema import). (Tony)</li>
<li><?php bugfix(37806); ?> weird behavior of object type and comparison). (Marcus)</li>
<li><?php bugfix(37780); ?> memory leak trying to execute a non existing file (CLI)). (Mike)</li>
<li><?php bugfix(37779); ?> empty include_path leads to search for files inside /). (jr at terragate dot net, Ilia)</li>
<li><?php bugfix(37747); ?> strtotime segfaults when given &quot;nextyear&quot;). (Derick)</li>
<li><?php bugfix(37720); ?> merge_php_config scrambles values). (Mike, pumuckel at metropolis dot de)</li>
<li><?php bugfix(37709); ?> Possible crash in PDO::errorCode()). (Ilia)</li>
<li><?php bugfix(37707); ?> clone without assigning leaks memory). (Ilia, Nuno, Dmitri)</li>
<li><?php bugfix(37705); ?> Semaphore constants not available). (Ilia)</li>
<li><?php bugfix(37671); ?> MySQLi extension fails to recognize BIT column). (Ilia)</li>
<li><?php bugfix(37667); ?> Object is not added into array returned by __get). (Marcus)</li>
<li><?php bugfix(37635); ?> parameter of pcntl signal handler is trashed). (Mike)</li>
<li><?php bugfix(37632); ?> Protected method access problem). (Marcus)</li>
<li><?php bugfix(37630); ?> MySQL extensions should link against thread safe client libs if built with ZTS). (Mike)</li>
<li><?php bugfix(37620); ?> mysqli_ssl_set validation is inappropriate). (Georg)</li>
<li><?php bugfix(37616); ?> DATE_RFC822 does not product RFC 822 dates). (Hannes Magnusson, Derick)</li>
<li><?php bugfix(37614); ?> Class name lowercased in error message). (Johannes)</li>
<li><?php bugfix(37587); ?> var without attribute causes segfault). (Marcus)</li>
<li><?php bugfix(37586); ?> Bumped minimum PCRE version to 6.6, needed for recursion limit support). (Ilia)</li>
<li><?php bugfix(37581); ?> oci_bind_array_by_name clobbers input array when using  SQLT_AFC, AVC). (Tony)</li>
<li><?php bugfix(37569); ?> WDDX incorrectly encodes high-ascii characters). (Ilia)</li>
<li><?php bugfix(37565); ?> Using reflection::export with simplexml causing a crash). (Marcus)</li>
<li><?php bugfix(37564); ?> AES privacy encryption not possible due to net-snmp 5.2 compatibility issue). (Jani, patch by scott dot moynes+php at gmail dot com)</li>
<li><?php bugfix(37563); ?> array_key_exists performance is poor for &amp;$array). (Ilia)</li>
<li><?php bugfix(37558); ?> timeout functionality doesn&#39;t work after a second PHP start-up on the same thread). (p dot desarnaud at wanadoo dot fr)</li>
<li><?php bugfix(37531); ?> oci8 persistent connection corruption). (Tony)</li>
<li><?php bugfix(37523); ?> namespaces added too late, leads to missing xsi:type attributes. incompatibility with libxml2-2.6.24). (Dmitry)</li>
<li><?php bugfix(37514); ?> strtotime doesn&#39;t assume year correctly). (Derick)</li>
<li><?php bugfix(37510); ?> session_regenerate_id changes session_id() even on  failure). (Hannes)</li>
<li><?php bugfix(37505); ?> touch() truncates large files). (Ilia)</li>
<li><?php bugfix(37499); ?> CLI segmentation faults during cleanup with sybase-ct  extension enabled). (Tony)</li>
<li><?php bugfix(37496); ?> FastCGI output buffer overrun). (Piotr, Dmitry)</li>
<li><?php bugfix(37487); ?> oci_fetch_array() array-type should always default to OCI_BOTH). (Tony)</li>
<li><?php bugfix(37457); ?> Crash when an exception is thrown in accept() method of  FilterIterator). (Marcus)</li>
<li><?php bugfix(37456); ?> DOMElement-&gt;setAttribute() loops forever). (Rob)</li>
<li><?php bugfix(37445); ?> Fixed crash in pdo_mysql resulting from premature object destruction). (Ilia)</li>
<li><?php bugfix(37428); ?> PHP crashes on windows if there are start-up errors and event log is used for logging them). (Edin)</li>
<li><?php bugfix(37418); ?> tidy module crashes on shutdown). (Tony)</li>
<li><?php bugfix(37416); ?> iterator_to_array() hides exceptions thrown in rewind() method). (Tony)</li>
<li><?php bugfix(37413); ?> Rejected versions of flex that don&#39;t work). (Ilia)</li>
<li><?php bugfix(37395); ?> recursive mkdir() fails to create nonexistent directories  in root dir). (Tony)</li>
<li><?php bugfix(37394); ?> substr_compare() returns an error when offset equals  string length). (Ilia)</li>
<li><?php bugfix(37392); ?> Unnecessary call to OCITransRollback() at the end of  request). (Tony)</li>
<li><?php bugfix(37376); ?> fastcgi.c compile fail with gcc 2.95.4). (Ilia)</li>
<li><?php bugfix(37368); ?> Incorrect timestamp returned for strtotime()). (Derick)</li>
<li><?php bugfix(37363); ?> PDO_MYSQL does not build if no other mysql extension is enabled). (Mike)</li>
<li><?php bugfix(37348); ?> make PEAR install ignore open_basedir). (Ilia)</li>
<li><?php bugfix(37341); ?> $_SERVER in included file is shortened to two entries, if $_ENV gets used). (Dmitry)</li>
<li><?php bugfix(37313); ?> sigemptyset() used without including &lt;signal.h&gt;). (jdolecek)</li>
<li><?php bugfix(37306); ?> max_execution_time = max_input_time). (Dmitry)</li>
<li><?php bugfix(37278); ?> SOAP not respecting uri in __soapCall). (Dmitry)</li>
<li><?php bugfix(37265); ?> Added missing safe_mode &amp; open_basedir checks to imap_body()). (Ilia)</li>
<li><?php bugfix(37262); ?> var_export() does not escape \0 character). (Ilia)</li>
<li><?php bugfix(37256); ?> php-fastcgi doesn&#39;t handle connection abort). (Dmitry)</li>
<li><?php bugfix(37244); ?> Added strict flag to base64_decode() that enforces  RFC3548 compliance). (Ilia)</li>
<li><?php bugfix(37144); ?> PHP crashes trying to assign into property of dead object). (Dmitry)</li>
<li><?php bugfix(36949); ?> invalid internal mysqli objects dtor). (Mike)</li>
<li><?php bugfix(36732); ?> req/x509 extensions support for openssl_csr_new and openssl_csr_sign) (ben at psc dot edu, Pierre)</li>
<li><?php bugfix(36759); ?> Objects destructors are invoked in wrong order when script is finished). (Dmitry)</li>
<li><?php bugfix(36681); ?> pdo_pgsql driver incorrectly ignored some errors). (Wez, Ilia)</li>
<li><?php bugfix(36630); ?> umask not reset at the end of the request). (Ilia)</li>
<li><?php bugfix(36515); ?> Unlinking buckets from non-existent brigades). (Sara)</li>
<li><?php bugfix(35973); ?> Error ORA-24806 occurs when trying to fetch a NCLOB  field). (Tony)</li>
<li><?php bugfix(35886); ?> file_get_contents() fails with some combinations of offset &amp; maxlen). (Nuno)</li>
<li><?php bugfix(35512); ?> Lack of read permission on main script results in  E_WARNING rather then E_ERROR). (Ilia)</li>
<li><?php bugfix(34180); ?> --with-curlwrappers causes PHP to disregard some HTTP  stream context options). (Mike)</li>
<li><?php bugfix(34066); ?> recursive array_walk causes segfault). (Tony)</li>
<li><?php bugfix(34065); ?> throw in foreach causes memory leaks). (Dmitry)</li>
<li><?php bugfix(34005); ?> oci_password_change() fails). (pholdaway at technocom-wireless dot com, Tony)</li>
<li><?php bugfix(33895); ?> Missing math constants). (Hannes)</li>
<li><?php bugfix(33770); ?> https:// or ftps:// do not work when --with-curlwrappers  is used and ssl certificate is not verifiable). (Ilia)</li>
<li><?php bugfix(29538); ?> number_format and problem with 0). (Matt Wilmas)</li>
<li><?php bugfix(28382); ?> openssl_x509_parse() extensions support) (Pierre)</li>
<li><?php peclbugfix(9061); ?> (oci8 might reuse wrong persistent connection). (Tony)</li>
<li><?php peclbugfix(8816); ?> (issue in php_oci_statement_fetch with more than one  piecewise column) (jeff at badtz-maru dot com, Tony)</li>
<li><?php peclbugfix(8112); ?> (OCI8 persistent connections misbehave when Apache  process times out). (Tony)</li>
<li><?php peclbugfix(7755); ?> (error selecting DOUBLE fields with PDO_ODBC). (&quot;slaws&quot;, Wez)</li>
</ul>
<!-- }}} --></section>

<a id="PHP_5_1"></a>
<section class="version" id="5.1.6"><!-- {{{ 5.1.6 -->
<h3>Version 5.1.6</h3>
<?php release_date('24-Aug-2006'); ?>
<ul>
	<li>Fixed memory_limit on 64bit systems. (Stefan E.)</li>
	<li><?php bugfix(38488); ?> (Access to "php://stdin" and family crashes PHP on win32). (Dmitry)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.1.5"><!-- {{{ 5.1.5 -->
<h3>Version 5.1.5</h3>
<?php release_date('17-Aug-2006'); ?>
<ul>
	<li>Fixed overflow on 64bit systems in str_repeat() and wordwrap(). (Stefan E.) </li>
	<li>Disabled CURLOPT_FOLLOWLOCATION in curl when open_basedir or safe_mode are enabled. (Stefan E., Ilia)</li>
	<li><?php bugfix(38322); ?> (reading past array in sscanf() leads to arbitrary code execution). (Tony)</li>
	<li><?php bugfix(38125); ?> (undefined reference to spl_dual_it_free_storage). (Marcus)</li>
	<li><?php bugfix(38112); ?> (corrupted gif segfaults) (Pierre)</li>
	<li><?php bugfix(37587); ?> (var without attribute causes segfault). (Marcus)</li>
	<li><?php bugfix(37576); ?> (FastCGI env (cgi vars) table overflow). (Piotr)</li>
	<li><?php bugfix(37496); ?>(FastCGI output buffer overrun). (Piotr, Dmitry)</li>
	<li><?php bugfix(37487); ?>(oci_fetch_array() array-type should always default to OCI_BOTH). (Tony)</li>
	<li><?php bugfix(37416); ?>(iterator_to_array() hides exceptions thrown in rewind() method). (Tony) </li>
	<li><?php bugfix(37392); ?>(Unnecessary call to OCITransRollback() at the end of request). (Tony)</li>
	<li><?php bugfix(37341); ?>($_SERVER in included file is shortened to two entries, if $_ENV gets used). (Dmitry)</li>
	<li><?php bugfix(37313); ?>(sigemptyset() used without including &lt;signal.h&gt;). (jdolecek)</li>
	<li><?php bugfix(37346); ?>(invalid colormap format) (Pierre)</li>
	<li><?php bugfix(37360); ?>(invalid gif size) (Pierre)</li>
	<li><?php bugfix(37306); ?>(max_execution_time = max_input_time). (Dmitry)</li>
	<li><?php bugfix(37278); ?>(SOAP not respecting uri in __soapCall). (Dmitry)</li>
	<li><?php bugfix(37265); ?>(Added missing safe_mode &amp; open_basedir checks to imap_body()). (Ilia)</li>
	<li><?php bugfix(37256); ?>(php-fastcgi doesn't handle connection abort). (Dmitry)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.1.4"><!-- {{{ 5.1.4 -->
<h3>Version 5.1.4</h3>
<?php release_date('04-May-2006'); ?>
<ul>
	<li>Added "capture_peer_cert" and "capture_peer_cert_chain" context options for SSL streams. (Wez).</li>
	<li>Added PDO::PARAM_EVT_* family of constants. (Sara)</li>
	<li>Fixed possible crash in highlight_string(). (Dmitry)</li>
	<li><?php bugfix(37291); ?>(FastCGI now longer works with isapi_fcgi.dll). (Dmitry)</li>
	<li><?php bugfix(37277); ?>(cloning Dom Documents or Nodes does not work). (Rob)</li>
	<li><?php bugfix(37276); ?>(problems with $_POST array). (Dmitry)</li>
	<li><?php bugfix(36632); ?>(bad error reporting for pdo_odbc exec UPDATE). (Wez).</li>
	<li><?php bugfix(35552); ?>(crash when pdo_odbc prepare fails). (Wez).</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.1.3"><!-- {{{ 5.1.3 -->
<h3>Version 5.1.3</h3>
<?php release_date('02-May-2006'); ?>
<ul>
<li>Updated bundled PCRE library to version 6.6. (Andrei)</li>
<li>Moved extensions to PECL:
<ul>
  <li>ext/msession (Derick)</li>
</ul></li>
<li>Reimplemented FastCGI interface. (Dmitry)</li>
<li>Improved SPL: (Marcus)
<ul>
  <li>Fixed issues with not/double calling of constructors of SPL iterators.</li>
  <li>Fixed issues with info-class/file-class in SPL directory handling classes.</li>
  <li>Fixed ArrayIterator::seek().</li>
  <li>Added SimpleXMLIterator::count().</li>
  <li>Dropped erroneous RecursiveDirectoryIterator::getSubPathInfo().</li>
</ul></li>
<li>Improved SimpleXML: (Marcus, Rob)
<ul>
  <li>Added SimpleXMLElement::getName() to retrieve name of element.</li>
  <li>Added ability to create elements on the fly.</li>
  <li>Added addChild() method for element creation supporting namespaces.</li>
  <li>Added addAttribute() method for attribute creation supporting namespaces.</li>
  <li>Added ability to delete specific elements and attributes by offset.</li>
</ul></li>
<li>Improved Reflection API: (Marcus)
<ul>
  <li>Added ReflectionClass::newInstanceArgs($args).</li>
  <li>Added ability to analyze extension dependency.</li>
  <li>Added ReflectionFunction::isDeprecated() and constant IS_DEPRECATED.</li>
  <li>Added ReflectionParameter::getDeclaringClass().</li>
  <li>Changed reflection constants to be prefixed with IS_. (Johannes)</li>
</ul></li>
<li>Improved cURL extension: (Ilia)
<ul>
  <li>Added curl_setopt_array() function that allows setting of multiple options via an associated array.</li>
  <li>Added the ability to retrieve the request message sent to the server.</li>
</ul></li>
<li>Improved GD extension: (Pierre)
<ul>
  <li>Added a weak/tolerant mode to the JPEG loader.</li>
  <li>Added filtering mode option to imagepng() to allow reducing file size.</li>
  <li>Fixed imagecolorallocate() and imagecolorallocatelapha() to return FALSE on error.</li>
</ul></li>
<li>Changed get_headers() to retrieve headers also from non-200 responses. (Ilia)</li>
<li>Changed get_headers() to use the default context. (Ilia)</li>
<li>Changed SOAP extension to cache WSDL structure in memory and thus speed up SoapClient/SoapServer construction. (Andrei, Dmitry)</li>
<li>Added lchown() and lchgrp() to change user/group ownership of symlinks. (Derick)</li>
<li>Added support for exif date format in strtotime(). (Derick)</li>
<li>Added a check for special characters in the session name. (Ilia)</li>
<li>Added "consumed" stream filter. (Marcus)</li>
<li>Added new mysqli constants for BIT and NEW_DECIMAL field types: MYSQLI_TYPE_NEWDECIMAL and MYSQLI_TYPE_BIT. FR <?php bugl(36007); ?>. (Georg)</li>
<li>Added imap_savebody() that allows message body to be written to a file. (Mike)</li>
<li>Added overflow checks to wordwrap() function. (Ilia)</li>
<li>Added support for BINARY_DOUBLE and BINARY_FLOAT to PDO_OCI and OCI8 (also fixes bug <?php bugl(36764); ?>). (Tony)</li>
<li>Eliminated run-time constant fetching for TRUE, FALSE and NULL. (Dmitry) </li>
<li>Removed the E_STRICT deprecation notice from "var". (Ilia)</li>
<li>Fixed reading stream filters never notified about EOF. (Mike)</li>
<li>Fixed tempnam() 2nd parameter to be checked against path components. (Ilia)</li>
<li>Fixed a bug that would not fill in the fifth argument to preg_replace() properly, if the variable was not declared previously. (Andrei)</li>
<li>Fixed safe_mode check for source argument of the copy() function. (Ilia)</li>
<li>Fixed mysqli bigint conversion under Windows (Georg)</li>
<li>Fixed XSS inside phpinfo() with long inputs. (Ilia)</li>
<li>Fixed Apache2 SAPIs header handler modifying header strings. (Mike)</li>
<li>Fixed 'auto_globals_jit' to work together with 'register_argc_argv'. (Dmitry)</li>
<li>Fixed offset/length parameter validation in substr_compare() function. (Ilia)</li>
<li>Fixed debug_zval_dump() to support private and protected members. (Dmitry)</li>
<li>Fixed SoapFault::getMessage(). (Dmitry)</li>
<li>Fixed issue with iconv_mime_decode where the "encoding" would only allow upper case specifiers. (Derick)</li>
<li>Fixed tiger hash algorithm generating wrong results on big endian platforms. (Mike)</li>
<li>Fixed crash with DOMImplementation::createDocumentType("name:"). (Mike)</li>
<li><?php bugfix(37205); ?> (Serving binary content/images fails with "comm with server aborted" FastCGI err). (Dmitry)</li>
<li><?php bugfix(37192); ?> (cc may complain about non-constant initializers in hash_adler.c). (Mike)</li>
<li><?php bugfix(37191); ?> (chmod takes off sticky bit when safe_mode is On). (Tony)	</li>
<li><?php bugfix(37167); ?> (PDO segfaults when throwing exception from the fetch handler). (Tony)</li>
<li><?php bugfix(37162); ?> (wddx does not build as a shared extension). (jdolecek at NetBSD dot org, Ilia)</li>
<li><?php bugfix(37158); ?> (fread behavior changes after calling stream_wrapper_register). (Wez)</li>
<li><?php bugfix(37138); ?> (__autoload tries to load callback'ed self and parent). (Dmitry)</li>
<li><?php bugfix(37103); ?> (libmbfl headers not installed). (Jani) </li>
<li><?php bugfix(37083); ?> (Frequent crashes in SOAP extension with new WSDL caching code in multithread WS). (Andrei, Dmitry)</li>
<li><?php bugfix(37062); ?> (compile failure on ARM architecture). (Tony)</li>
<li><?php bugfix(37061); ?> (curl_exec() doesn't zero-terminate binary strings). (Tony)</li>
<li><?php bugfix(37060); ?> (Type of retval of Countable::count() is not checked).  (Johannes)</li>
<li><?php bugfix(37059); ?> (oci_bind_by_name() doesn't support RAW and LONG RAW fields). (Tony)</li>
<li><?php bugfix(37057); ?> (xmlrpc_decode() may produce arrays with numeric strings, which are unaccessible). (Tony)</li>
<li><?php bugfix(37055); ?> (incorrect reference counting for persistent OCI8 connections). (Tony)</li>
<li><?php bugfix(37054); ?> (SoapClient Error Fetching http headers). (Dmitry)</li>
<li><?php bugfix(37053); ?> (html_errors with internal classes produces wrong links). (Tony)</li>
<li><?php bugfix(37046); ?> (foreach breaks static scope). (Dmitry)</li>
<li><?php bugfix(37045); ?> (Fixed check for special chars for http redirects). (Ilia)</li>
<li><?php bugfix(37017); ?> (strtotime fails before 13:00:00 with some time zones identifiers). (Derick)</li>
<li><?php bugfix(37002); ?> (Have to quote literals in INI when concatenating with vars). (Dmitry)</li>
<li><?php bugfix(36988); ?> (mktime freezes on long numbers). (Derick)</li>
<li><?php bugfix(36981); ?> (SplFileObject-&gt;fgets() ignores max_length). (Tony)</li>
<li><?php bugfix(36957); ?> (serialize() does not handle recursion). (Ilia)</li>
<li><?php bugfix(36944); ?> (strncmp &amp; strncasecmp do not return false on negative string length). (Tony)</li>
<li><?php bugfix(36941); ?> (ArrayIterator does not clone itself). (Marcus)</li>
<li><?php bugfix(36934); ?> (OCILob-&gt;read() doesn't move internal pointer when reading 0's). (Tony)</li>
<li><?php bugfix(36908); ?> (wsdl default value overrides value in soap request). (Dmitry)</li>
<li><?php bugfix(36898); ?> (__set() leaks in classes extending internal ones). (Tony, Dmitry)</li>
<li><?php bugfix(36886); ?> (User filters can leak buckets in some situations). (Ilia)</li>
<li><?php bugfix(36878); ?> (error messages are printed even though an exception has been thrown). (Tony)</li>
<li><?php bugfix(36875); ?> (is_*() functions do not account for open_basedir). (Ilia)</li>
<li><?php bugfix(36872); ?> (session_destroy() fails after call to session_regenerate_id(true)). (Ilia)</li>
<li><?php bugfix(36869); ?> (memory leak in output buffering when using chunked output). (Tony)</li>
<li><?php bugfix(36859); ?> (DOMElement crashes when calling __construct when cloning). (Tony)</li>
<li><?php bugfix(36857); ?> (Added support for partial content fetching to the HTTP streams wrapper). (Ilia)</li>
<li><?php bugfix(36851); ?> (Documentation and code discrepancies for NULL data in oci_fetch_*() functions). (Tony)</li>
<li><?php bugfix(36825); ?> (Exceptions thrown in ArrayObject::offsetGet cause segfault). (Tony)</li>
<li><?php bugfix(36820); ?> (Privileged connection with an Oracle password file fails). (Tony)</li>
<li><?php bugfix(36809); ?> (__FILE__ behavior changed). (Dmitry)</li>
<li><?php bugfix(36808); ?> (syslog ident becomes garbage between requests). (Tony)</li>
<li><?php bugfix(36802); ?> (mysqli_set_charset() crash with a non-open connection). (Ilia)</li>
<li><?php bugfix(36756); ?> (DOMDocument::removeChild corrupts node). (Rob)</li>
<li><?php bugfix(36749); ?> (SOAP: 'Error Fetching http body' when using HTTP Proxy). (Dmitry)</li>
<li><?php bugfix(36745); ?> (No error message when load data local file isn't found). (Georg)</li>
<li><?php bugfix(36743); ?> (In a class extending XMLReader array properties are not writable). (Tony)</li>
<li><?php bugfix(36727); ?> (segfault in pdo_pgsql bindValue() when no parameters are defined). (Tony)</li>
<li><?php bugfix(36721); ?> (The SoapServer is not able to send a header that it didn't receive). (Dmitry)</li>
<li><?php bugfix(36697); ?> (Transparency is lost when using imagecreatetruecolor). (Pierre)</li>
<li><?php bugfix(36689); ?> (Removed arbitrary limit on the length of syslog messages). (Ilia)</li>
<li><?php bugfix(36656); ?> (http_build_query generates invalid URIs due to use of square brackets). (Mike)</li>
<li><?php bugfix(36638); ?> (strtotime() returns false when 2nd argument &lt; 1). (Derick)</li>
<li><?php bugfix(36629); ?> (SoapServer::handle() exits on SOAP faults). (Dmitry)</li>
<li><?php bugfix(36625); ?> (pg_trace() does not work). (iakio at mono-space dot net)</li>
<li><?php bugfix(36614); ?> (Segfault when using Soap). (Dmitry)</li>
<li><?php bugfix(36611); ?> (assignment to SimpleXML object attribute changes argument type to string). (Tony)</li>
<li><?php bugfix(36606); ?> (pg_query_params() changes arguments type to string). (Tony)</li>
<li><?php bugfix(36599); ?> (DATE_W3C format constant incorrect). (Derick)</li>
<li><?php bugfix(36575); ?> (SOAP: Incorrect complex type instantiation with hierarchies). (Dmitry)</li>
<li><?php bugfix(36572); ?> (Added PDO::MYSQL_ATTR_DIRECT_QUERY constant that should be set when executing internal queries like "show master status" via MySQL). (Ilia)</li>
<li><?php bugfix(36568); ?> (memory_limit setting on win32 has no effect). (Dmitry)</li>
<li><?php bugfix(36513); ?> (comment will be outputted in last line). (Dmitry)</li>
<li><?php bugfix(36510); ?> (strtotime() fails to parse date strings with tabs). (Ilia, Derick)</li>
<li><?php bugfix(36459); ?> (Incorrect adding PHPSESSID to links, which contains \r\n). (Ilia)</li>
<li><?php bugfix(36458); ?> (sleep() accepts negative values). (Ilia)</li>
<li><?php bugfix(36436); ?> (DBA problem with Berkeley DB4). (Marcus)</li>
<li><?php bugfix(36434); ?> (Improper resolution of declaring class name of an inherited property). (Ilia)</li>
<li><?php bugfix(36420); ?> (segfault when access result-&gt;num_rows after calling result-&gt;close()). (Ilia,Tony)</li>
<li><?php bugfix(36403); ?> (oci_execute() no longer supports OCI_DESCRIBE_ONLY). (Tony)</li>
<li><?php bugfix(36400); ?> (Custom 5xx error does not return correct HTTP response error code). (Tony)</li>
<li><?php bugfix(36396); ?> (strtotime() fails to parse dates in dd-mm-yyyy format). (Derick)</li>
<li><?php bugfix(36388); ?> (ext/soap crashes when throwing exception and session persistence). (David)</li>
<li><?php bugfix(36382); ?> (PDO/PgSQL's getColumnMeta() crashes). (Derick)</li>
<li><?php bugfix(36359); ?> (splFileObject::fwrite() doesn't write when no data length specified). (Tony)</li>
<li><?php bugfix(36351); ?> (parse_url() does not parse numeric paths properly). (Ilia)</li>
<li><?php bugfix(36345); ?> (PDO/MySQL problem loading BLOB over 1MB). (Ilia)</li>
<li><?php bugfix(36337); ?> (ReflectionProperty fails to return correct visibility). (Ilia)</li>
<li><?php bugfix(36334); ?> (Added missing documentation about realpath cache INI  settings). (Ilia)</li>
<li><?php bugfix(36308); ?> (ReflectionProperty::getDocComment() does not reflect  extended class commentary). (Ilia)</li>
<li><?php bugfix(36306); ?> (crc32() differ on 32-bit and 64-bit platforms) (anight@eyelinkmedia dot com, Pierre)</li>
<li><?php bugfix(36303); ?> (foreach on error_zval produces segfault). (Dmitry)</li>
<li><?php bugfix(36295); ?> (typo in SplFileObject::flock() parameter name). (Tony)</li>
<li><?php bugfix(36287); ?> (Segfault with SplFileInfo conversion). (Marcus)</li>
<li><?php bugfix(36283); ?> (SOAPClient Compression Broken). (Dmitry)</li>
<li><?php bugfix(36268); ?> (Object destructors called even after fatal errors). (Dmitry)</li>
<li><?php bugfix(36258); ?> (SplFileObject::getPath() may lead to segfault). (Tony)</li>
<li><?php bugfix(36250); ?> (PHP causes ORA-07445 core dump in Oracle server 9.2.x). (Tony)</li>
<li><?php bugfix(36242); ?> (Possible memory corruption in stream_select()). (Tony)</li>
<li><?php bugfix(36235); ?> (ocicolumnname returns false before a successful fetch). (Tony)</li>
<li><?php bugfix(36226); ?> (Inconsistent handling when passing potential arrays). (Dmitry)</li>
<li><?php bugfix(36224); ?> (date(DATE_ATOM) gives wrong results). (Derick, Hannes Magnusson)</li>
<li><?php bugfix(36222); ?> (errorInfo in PDOException is always NULL). (Ilia)</li>
<li><?php bugfix(36208); ?> (symbol namespace conflicts using bundled gd). (Jakub Moc)</li>
<li><?php bugfix(36205); ?> (Memory leaks on duplicate cookies). (Dmitry)</li>
<li><?php bugfix(36185); ?> (str_rot13() crash on non-string parameter). (Pierre)</li>
<li><?php bugfix(36176); ?> (PDO_PGSQL - PDO::exec() does not return number of rows affected by the operation). (Ilia)</li>
<li><?php bugfix(36158); ?> (SIGTERM is not handled correctly when running as a FastCGI server). (Dmitry)</li>
<li><?php bugfix(36152); ?> (problems with curl+ssl and pgsql+ssl in same PHP). (Mike)</li>
<li><?php bugfix(36148); ?> (unpack("H*hex", $data) is adding an extra character to the end of the string). (Ilia)</li>
<li><?php bugfix(36134); ?> (DirectoryIterator constructor failed to detect empty directory names). (Ilia)</li>
<li><?php bugfix(36113); ?> (Reading records of unsupported type causes segfault). (Tony)</li>
<li><?php bugfix(36096); ?> (oci_result() returns garbage after oci_fetch() failed). (Tony)</li>
<li><?php bugfix(36083); ?> (SoapClient waits for responses on one-way operations). (Dmitry)</li>
<li><?php bugfix(36071); ?> (Engine Crash related with 'clone'). (Dmitry)</li>
<li><?php bugfix(36055); ?> (possible OCI8 crash in multi-threaded environment). (Tony)</li>
<li><?php bugfix(36046); ?> (parse_ini_file() miscounts lines in multi-line values). (Ilia)</li>
<li><?php bugfix(36038); ?> (ext/hash compile failure on Mac OSX). (Tony)</li>
<li><?php bugfix(36037); ?> (heredoc adds extra line number). (Dmitry)</li>
<li><?php bugfix(36016); ?> (realpath cache memleaks). (Dmitry, Nuno)</li>
<li><?php bugfix(36011); ?> (Strict errormsg wrong for call_user_func() and the likes). (Marcus)</li>
<li><?php bugfix(36010); ?> (Segfault when re-creating and re-executing statements with bound parameters). (Tony)</li>
<li><?php bugfix(36006); ?> (Problem with $this in __destruct()). (Dmitry)</li>
<li><?php bugfix(35999); ?> (recursive mkdir() does not work with relative path like "foo/bar"). (Tony)</li>
<li><?php bugfix(35998); ?> (SplFileInfo::getPathname() returns unix style filenames in win32). (Marcus)</li>
<li><?php bugfix(35988); ?> (Unknown persistent list entry type in module shutdown). (Dmitry)</li>
<li><?php bugfix(35954); ?> (Fatal com_exception casting object). (Rob)</li>
<li><?php bugfix(35900); ?> (stream_select() should warning when tv_sec is negative). (Ilia)</li>
<li><?php bugfix(35785); ?> (SimpleXML causes memory read error zend engine). (Marcus)</li>
<li><?php bugfix(34272); ?> (empty array onto COM object blows up). (Rob)</li>
<li><?php bugfix(29476); ?> (sqlite_fetch_column_types() locks the database forever). (Ilia)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.1.2"><!-- {{{ 5.1.2 -->
<h3>Version 5.1.2</h3>
<?php release_date('12-Jan-2006'); ?>
<ul>
<li>Updated libsqlite in ext/sqlite to 2.8.17. (Ilia)</li>
<li>Updated libsqlite in ext/pdo_sqlite to 3.2.8. (Ilia)</li>
<li>Updated to libxml2-2.6.22 and libxslt-1.1.15 in the win32 bundle. (Rob)</li>
<li>Added new extensions: (Ilia, Wez)
  <ul>
  <li>XMLWriter</li>
  <li>Hash</li>
  </ul></li>
<li>Added PNG compression support to GD extension. (Pierre)</li>
<li>Added reflection constants as class constants. (Johannes)</li>
<li>Added --enable-gcov configure option to enable C-level code coverage. (John, Jani, Ilia, Marcus)</li>
<li>Added missing support for 'B' format identifier to date() function. (Ilia)</li>
<li>Changed reflection to be an extension. (Marcus)</li>
<li>Improved SPL extension: (Marcus)
  <ul>
  <li>Added class SplFileInfo as root class for DirectoryIterator and SplFileObject</li>
  <li>Added SplTempFileObject</li>
  </ul></li>
<li>Improved SimpleXML extension: (Marcus)
  <ul>
  <li>Fixed memleaks</li>
  <li>Fixed var_dump()</li>
  <li>Fixed isset/empty/(bool) behavior</li>
  <li>Fixed iterator edge cases</li>
  <li>Added methods getNamespaces(), getDocNamespaces()</li>
  </ul></li>
<li>Upgraded pear to version 1.4.6. (Greg)</li>
<li>Added constants for libxslt and libexslt versions: LIBXSLT_VERSION, LIBXSLT_DOTTED_VERSION, LIBEXSLT_VERSION and LIBEXSLT_DOTTED_VERSION. (Pierre)</li>
<li>Added an optional parameter to parse_url() to allow retrieval of distinct URL components. (Ilia)</li>
<li>Fixed possible crash in apache_getenv()/apache_setenv() on invalid parameters. (Ilia)</li>
<li>Changed errors to warnings in imagecolormatch(). (Pierre)</li>
<li>Fixed segfault/leak in imagecolormatch(). (Pierre)</li>
<li>Fixed small leak in mysqli_stmt_fetch() when bound variable was empty string. (Andrey)</li>
<li>Fixed prepared statement name conflict handling in PDO_PGSQL. (Thies, Ilia)</li>
<li>Fixed memory corruption when PDO::FETCH_LAZY mode is being used. (Ilia)</li>
<li>Fixed possible leaks in imagecreatefromstring() with invalid data. (Pierre)</li>
<li>Fixed possible memory corruption inside mb_strcut(). (Ilia)</li>
<li>Fixed possible header injection by limiting each header to a single line. (Ilia)</li>
<li>Fixed possible XSS inside error reporting functionality. (Ilia)</li>
<li>Fixed many bugs in OCI8. (Tony)</li>
<li>Fixed crash and leak in mysqli when using 4.1.x client libraries and connecting to 5.x server. (Andrey)</li>
<li><?php bugfix(35916); ?> (Duplicate calls to stream_bucket_append() lead to a crash). (Ilia)</li>
<li><?php bugfix(35908); ?> (curl extension uses undefined GCRY_THREAD_OPTIONS_USER). (Ilia)</li>
<li><?php bugfix(35907); ?> (PDO_OCI uses hardcoded lib path $ORACLE_HOME/lib). (Tony)</li>
<li><?php bugfix(35887); ?> (wddx_deserialize not parsing dateTime fields properly). (Derick)</li>
<li><?php bugfix(35885); ?> (strtotime("NOW") no longer works). (Derick)</li>
<li><?php bugfix(35821); ?> (array_map() segfaults when exception is throwed from the callback). (Tony)</li>
<li><?php bugfix(35817); ?> (unpack() does not decode odd number of hexadecimal values). (Ilia)</li>
<li><?php bugfix(35797); ?> (segfault on PDOStatement::execute() with zend.ze1_compatibility_mode = On). (Tony, Ilia)</li>
<li><?php bugfix(35781); ?> (stream_filter_append() can cause segfault). (Tony)</li>
<li><?php bugfix(35760); ?> (sybase_ct doesn't compile on Solaris using old gcc). (Tony)</li>
<li><?php bugfix(35759); ?> (mysqli_stmt_bind_result() makes huge allocation when column empty). (Andrey)</li>
<li><?php bugfix(35751); ?> (using date with a timestamp makes httpd segfault). (Derick)</li>
<li><?php bugfix(35740); ?> (memory leak when including a directory). (Tony)</li>
<li><?php bugfix(35730); ?> (ext/mssql + freetds: Use correct character encoding and allow setting it). (Frank)</li>
<li><?php bugfix(35723); ?> (xmlrpc_introspection.c fails compile per C99 std). (Jani)</li>
<li><?php bugfix(35720); ?> (A final constructor can be overwritten). (Marcus)</li>
<li><?php bugfix(35713); ?> (getopt() returns array with numeric strings when passed options like '-1'). (Tony)</li>
<li><?php bugfix(35705); ?> (strtotime() fails to parse soap date format without TZ). (Ilia)</li>
<li><?php bugfix(35699); ?> (date() can't handle leap years before 1970). (Derick)</li>
<li><?php bugfix(35694); ?> (Improved error message for invalid fetch mode). (Ilia)</li>
<li><?php bugfix(35692); ?> (iconv_mime_decode() segmentation fault; with libiconv only). (Tony)</li>
<li><?php bugfix(35690); ?> (pack() tries to allocate huge memory block when packing  float values to strings). (Tony)</li>
<li><?php bugfix(35669); ?> (imap_mail_compose() crashes with multipart-multiboundary-email). (Ilia)</li>
<li><?php bugfix(35660); ?> (AIX TZ variable format not understood, yields UTC timezone). (Derick)</li>
<li><?php bugfix(35655); ?> (whitespace following end of heredoc is lost). (Ilia)</li>
<li><?php bugfix(35630); ?> (strtotime() crashes on certain relative identifiers). (Ilia)</li>
<li><?php bugfix(35629); ?> (crash in http:// wrapper on multiple redirects). (Ilia)</li>
<li><?php bugfix(35624); ?> (strtotime() does not handle 3 character weekdays). (Ilia)</li>
<li><?php bugfix(35612); ?> (iis6 Access Violation crash). (Dmitry, alacn.uhahaa)</li>
<li><?php bugfix(35594); ?> (Multiple calls to getopt() may result in a crash). (rabbitt at gmail dot com, Ilia)</li>
<li><?php bugfix(35571); ?> (Fixed crash in Apache 2 SAPI when more then one php  script is loaded via SSI include). (Ilia)</li>
<li><?php bugfix(35570); ?> (segfault when re-using soap client object). (Dmitry)</li>
<li><?php bugfix(35558); ?> (mktime() interpreting 3 digit years incorrectly). (Ilia)</li>
<li><?php bugfix(35543); ?> (php crash when calling non existing method of a class that extends PDO). (Tony)</li>
<li><?php bugfix(35539); ?> (typo in error message for ErrorException). (Tony)</li>
<li><?php bugfix(35536); ?> (mysql_field_type() doesn't handle NEWDECIMAL). (Tony)</li>
<li><?php bugfix(35517); ?> (mysql_stmt_fetch returns NULL on data truncation). (Georg)</li>
<li><?php bugfix(35509); ?> (string constant as array key has different behavior inside object). (Dmitry)</li>
<li><?php bugfix(35508); ?> (PDO fails when unknown fetch mode specified). (Tony)</li>
<li><?php bugfix(35499); ?> (strtotime() does not handle whitespace around the date string). (Ilia)</li>
<li><?php bugfix(35496); ?> (Crash in mcrypt_generic()/mdecrypt_generic() without proper init). (Ilia)</li>
<li><?php bugfix(35490); ?> (socket_sendto() unable to handle IPv6 addresses). (Tony)</li>
<li><?php bugfix(35461); ?> (Ming extension fails to compile with ming 0.3beta1). (Jani)</li>
<li><?php bugfix(35437); ?> (Segfault or Invalid Opcode 137/1/4). (Dmitry)</li>
<li><?php bugfix(35470); ?> (Assigning global using variable name from array doesn't function). (Dmitry)</li>
<li><?php bugfix(35456); ?> (+ 1 [time unit] format did not work). (Ilia)</li>
<li><?php bugfix(35447); ?> (xml_parse_into_struct() chokes on the UTF-8 BOM). (Rob)</li>
<li><?php bugfix(35431); ?> (PDO crashes when using LAZY fetch with fetchAll). (Wez)</li>
<li><?php bugfix(35430); ?> (PDO crashes on incorrect FETCH_FUNC use). (Tony)</li>
<li><?php bugfix(35427); ?> (str_word_count() handles '-' incorrectly). (Ilia)</li>
<li><?php bugfix(35425); ?> (idate() function ignores timezone settings). (Ilia)</li>
<li><?php bugfix(35422); ?> (strtotime() does not parse times with UTC as timezone). (Ilia)</li>
<li><?php bugfix(35414); ?> (strtotime() no longer works with ordinal suffix). (Ilia)</li>
<li><?php bugfix(35410); ?> (wddx_deserialize() doesn't handle large ints as keys properly). (Ilia)</li>
<li><?php bugfix(35409); ?> (undefined reference to 'rl_completion_matches'). (Jani)</li>
<li><?php bugfix(35399); ?> (Since fix of bug <?php bugl(35273); ?> SOAP decoding of soapenc:base64binary fails). (Dmitry)</li>
<li><?php bugfix(35393); ?> (changing static protected members from outside the class, one more reference issue). (Dmitry)</li>
<li><?php bugfix(35381); ?> (ssl library is not initialized properly). (Alan)</li>
<li><?php bugfix(35377); ?> (PDO_SQLITE: undefined reference to "fdatasync"). (Nuno, Jani)</li>
<li><?php bugfix(35373); ?> (HP-UX "alias not allowed in this configuration"). (Dmitry)</li>
<li><?php bugfix(35288); ?> (iconv() function defined as libiconv()). (Nuno)</li>
<li><?php bugfix(35103); ?> (mysqli handles bad unsigned (big)int incorrectly).(Andrey)</li>
<li><?php bugfix(35062); ?> (socket_read() produces warnings on non blocking sockets). (Nuno, Ilia)</li>
<li><?php bugfix(35028); ?> (SimpleXML object fails FALSE test). (Marcus)</li>
<li><?php bugfix(34729); ?> (Crash in ZTS mode under Apache). (Dmitry, Zeev) </li>
<li><?php bugfix(34429); ?> (Output buffering cannot be turned off with FastCGI). (Dmitry, Ilya)</li>
<li><?php bugfix(34359); ?> (Possible crash inside fopen http wrapper). (Ilia, Sara, Nuno)</li>
<li><?php bugfix(33789); ?> (Many Problems with SunFuncs). (Derick)</li>
<li><?php bugfix(33671); ?> (sun_rise and sun_set don't return a GMT timestamp if one passes an offset). (Derick)</li>
<li><?php bugfix(32820); ?> (date_sunrise and date_sunset don't handle GMT offset well). (Derick)</li>
<li><?php bugfix(31347); ?> (is_dir and is_file (incorrectly) return true for any string greater then 255 characters). (Nuno, Ilia)</li>
<li><?php bugfix(30937); ?> (date_sunrise() &amp; date_sunset() don't handle endless day/night at high latitudes). (Derick)</li>
<li><?php bugfix(30760); ?> (Remove MessageBox on win32 for E_CORE errors if display_startup_error is off). (Ilia)</li>
<li><?php bugfix(29955); ?> (mb_strtoupper() / lower() broken with Turkish encoding). (Rui)</li>
<li><?php bugfix(28899); ?> (mb_substr() and substr() behave differently when "mbstring.func_overload" is enabled). (Rui)</li>
<li><?php bugfix(27678); ?> (number_format() crashes with large numbers). (Marcus)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.1.1"><!-- {{{ 5.1.1 -->
<h3>Version 5.1.1</h3>
<?php release_date('28-Nov-2005'); ?>
<ul>
<li>Disabled native date class to prevent pear::date conflict. (Ilia)</li>
<li>Improved safe_mode/open_basedir checks in cURL extension. (Ilia, Jani)</li>
<li>Changed reflection constants be both PHP and class constants. (Johannes)</li>
<li>Added an additional field $frame['object'] to the result array of debug_backtrace() that contains a reference to the respective object when the frame was called from an object. (Sebastian)</li>
<li><?php bugfix(35423); ?> (RecursiveDirectoryIterator doesnt appear to recurse with RecursiveFilterIterator). (Marcus)</li>
<li><?php bugfix(35413); ?> (Removed -dev flag from Zend Engine version). (Ilia)</li>
<li><?php bugfix(35411); ?> (Regression with \{$ handling). (Ilia)</li>
<li><?php bugfix(35406); ?> (eval hangs when evall'ed code ends with comment w/o newline). (Marcus)</li>
<li><?php bugfix(35391); ?> (pdo_mysql::exec does not return number of affected rows). (Tony)</li>
<li><?php bugfix(35382); ?> (Comment in end of file produces fatal error). (Ilia)</li>
<li><?php bugfix(35360); ?> (exceptions in interactive mode (php -a) may cause crash). (Dmitry)</li>
<li><?php bugfix(35358); ?> (Incorrect error messages for PDO class constants). (Ilia)</li>
<li><?php bugfix(35338); ?> (pdo_pgsql does not handle binary bound params). (Wez)</li>
<li><?php bugfix(35316); ?> (Application exception trying to create COM object). (Rob)</li>
<li><?php bugfix(35170); ?> (PHP_AUTH_DIGEST differs under Apache 1.x and 2.x). (Ilia)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.1.0"><!-- {{{ 5.1.0 -->
<h3>Version 5.1.0</h3>
<?php release_date('24-Nov-2005'); ?>
<ul>
<li>Added support for class constants and static members for internal classes.  (Dmitry, Michael Wallner)</li>
<li>Added "new_link" parameter to mssql_connect() (Bug <?php bugl(34369); ?>). (Frank)</li>
<li>Added missing safe_mode checks for image* functions and cURL. (Ilia)</li>
<li>Added missing safe_mode/open_basedir checks for file uploads. (Ilia)</li>
<li>Added PDO_MYSQL_ATTR_USE_BUFFERED_QUERY parameter for pdo_mysql. (Ilia)</li>
<li>Added date_timezone_set() function to set the timezone that the date  functions will use. (Derick)</li>
<li>Added pg_fetch_all_columns() function to fetch all values of a column from a  result cursor. (Ilia)</li>
<li>Added support for LOCK_EX flag for file_put_contents(). (Ilia)</li>
<li>Added bindto socket context option. (Ilia)</li>
<li>Added offset parameter to the stream_copy_to_stream() function. (Ilia)</li>
<li>Added offset &amp; length parameters to substr_count() function. (Ilia)</li>
<li>Added man pages for "phpize" and "php-config" scripts. (Jakub Vrana)</li>
<li>Added support for .cc files in extensions. (Brian)</li>
<li>Added PHP_INT_MAX and PHP_INT_SIZE as predefined constants. (Andrey)</li>
<li>Added user opcode API that allow overloading of opcode handlers. (Dmitry)</li>
<li>Added an optional remove old session parameter to session_regenerate_id(). (Ilia)</li>
<li>Added array type hinting. (Dmitry)</li>
<li>Added the tidy_get_opt_doc() function to return documentation for  configuration options in tidy. (Patch by: nlopess@php.net)</li>
<li>Added support for .cc files in extensions. (Brian)</li>
<li>Added imageconvolution() function which can be used to apply a custom 3x3  matrix convolution to an image. (Pierre)</li>
<li>Added optional first parameter to XsltProcessor::registerPHPFunctions to  only allow certain functions to be called from XSLT. (Christian)</li>
<li>Added the ability to override the autotools executables used by the  buildconf script via the PHP_AUTOCONF and PHP_AUTOHEADER environmental  variables. (Jon)</li>
<li>Added several new functions to support the PostgreSQL v3 protocol introduced  in PostgreSQL 7.4. (Christopher)
  <ul>
  <li>pg_transaction_status() - in-transaction status of a database connection.</li>
  <li>pg_query_params() - execution of parameterized queries.</li>
  <li>pg_prepare() - prepare named queries.</li>
  <li>pg_execute() - execution of named prepared queries.</li>
  <li>pg_send_query_params() - async equivalent of pg_query_params().</li>
  <li>pg_send_prepare() - async equivalent of pg_prepare().</li>
  <li>pg_send_execute() - async equivalent of pg_execute().</li>
  <li>pg_result_error_field() - highly detailed error information, most importantly the SQLSTATE error code.</li>
  <li>pg_set_error_verbosity() - set verbosity of errors.</li>
  </ul></li>
<li>Added optional fifth parameter "count" to preg_replace_callback() and  preg_replace() to count the number of replacements made. FR <?php bugl(32275); ?>. (Andrey)</li>
<li>Added optional third parameter "charlist" to str_word_count() which contains  characters to be considered as word part. FR <?php bugl(31560); ?>. (Andrey, Ilia)</li>
<li>Added interface Serializable. (Stanislav, Marcus)</li>
<li>Added pg_field_type_oid() PostgreSQL function. (mauroi at digbang dot com)</li>
<li>Added zend_declare_property_...() and zend_update_property_...() API  functions for bool, double and binary safe strings. (Hartmut)</li>
<li>Added possibility to access INI variables from within .ini file. (Andrei)</li>
<li>Added variable $_SERVER['REQUEST_TIME'] containing request start time. (Ilia)</li>
<li>Added optional float parameter to gettimeofday(). (Ilia)</li>
<li>Added apache_reset_timeout() Apache1 function. (Rasmus)</li>
<li>Added sqlite_fetch_column_types() 3rd argument for arrays. (Ilia)</li>
<li>Added optional offset parameter to stream_get_contents() and  file_get_contents(). (Ilia)</li>
<li>Added optional maxlen parameter to file_get_contents(). (Ilia)</li>
<li>Added SAPI hook to get the current request time. (Rasmus)</li>
<li>Added new functions:
  <ul>
  <li>array_diff_key() (Andrey)</li>
  <li>array_diff_ukey() (Andrey)</li>
  <li>array_intersect_key() (Christiano Duarte)</li>
  <li>array_intersect_ukey() (Christiano Duarte)</li>
  <li>array_product() (Andrey)</li>
  <li>DomDocumentFragment::appendXML() (Christian)</li>
  <li>fputcsv() (David Sklar)</li>
  <li>htmlspecialchars_decode() (Ilia)</li>
  <li>inet_pton() (Sara)</li>
  <li>inet_ntop() (Sara)</li>
  <li>mysqli::client_info property (Georg)</li>
  <li>posix_access() (Magnus)</li>
  <li>posix_mknod() (Magnus)</li>
  <li>SimpleXMLElement::registerXPathNamespace() (Christian)</li>
  <li>stream_context_get_default() (Wez)</li>
  <li>stream_socket_enable_crypto() (Wez)</li>
  <li>stream_wrapper_unregister() (Sara)</li>
  <li>stream_wrapper_restore() (Sara)</li>
  <li>stream_filter_remove() (Sara)</li>
  <li>time_sleep_until() (Ilia)</li>
  </ul></li>
<li>Added DomDocument::$recover property for parsing not well-formed XML  Documents. (Christian)</li>
<li>Added Cursor support for MySQL 5.0.x in mysqli (Georg)</li>
<li>Added proxy support to ftp wrapper via http. (Sara)</li>
<li>Added MDTM support to ftp_url_stat. (Sara)</li>
<li>Added zlib stream filter support. (Sara)</li>
<li>Added bz2 stream filter support. (Sara)</li>
<li>Added max_redirects context option that specifies how many HTTP  redirects to follow. (Ilia)</li>
<li>Added support of parameter=&gt;value arrays to  xsl_xsltprocessor_set_parameter(). (Tony)</li>
<li>Improved PHP extension loading mechanism with support for module  dependencies and conflicts. (Jani, Dmitry)</li>
<li>Improved interactive mode of PHP CLI (php -a). (Johannes, Marcus)</li>
<li>Improved performance of:
  <ul>
  <li>general execution/compilation. (Andi, Thies, Sterling, Dmitry, Marcus)</li>
  <li>switch() statement. (Dmitry)</li>
  <li>several array functions. (Marcus)</li>
  <li>virtual path handling by adding a realpath() cache. (Andi)</li>
  <li>variable fetches. (Andi)</li>
  <li>magic method invocations. (Marcus)</li>
  </ul></li>
<li>Improved support for embedded server in mysqli. (Georg)</li>
<li>Improved mysqli extension. (Georg)
  <ul>
  <li>added constructor for mysqli_stmt and mysqli_result classes</li>
  <li>added new function mysqli_get_charset()</li>
  <li>added new function mysqli_set_charset()</li>
  <li>added new class mysqli_driver</li>
  <li>added new class mysqli_warning</li>
  <li>added new class mysqli_exception</li>
  <li>added new class mysqli_sql_exception</li>
  </ul></li>
<li>Improved SPL extension. (Marcus)
  <ul>
  <li>Moved RecursiveArrayIterator from examples into extension</li>
  <li>Moved RecursiveFilterIterator from examples into extension</li>
  <li>Added SplObjectStorage</li>
  <li>Made all SPL constants class constants</li>
  <li>Renamed CachingRecursiveIterator to RecursiveCachingIterator to follow Recursive&lt;*&gt;Iterator naming scheme.</li>
  <li>added standard hierarchy of Exception classes</li>
  <li>added interface Countable</li>
  <li>added interfaces Subject and SplObserver</li>
  <li>added spl_autoload*() functions</li>
  <li>converted several 5.0 examples into c code</li>
  <li>added class SplFileObject</li>
  <li>added possibility to use a string with class_parents() and class_implements(). (Andrey)</li>
  </ul></li>
<li>Changed type hints to allow "null" as default value for class and array.  (Marcus, Derick, Dmitry)</li>
<li>Changed SQLite extension to be a shared module in Windows distribution. (Edin)</li>
<li>Changed "instanceof" and "catch" operators, is_a() and is_subclass_of()  functions to not call __autoload(). (Dmitry)</li>
<li>Changed sha1_file() and md5_file() functions to use streams instead of low level IO. (Uwe)</li>
<li>Changed abstract private methods to be not allowed anymore. (Stas)</li>
<li>Changed stream_filter_(ap|pre)pend() to return resource. (Sara)</li>
<li>Changed mysqli_exception and sqlite_exception to use RuntimeException as  base if SPL extension is present. (Georg, Marcus)</li>
<li>Upgraded bundled libraries:
  <ul>
  <li>PCRE library to version 6.2. (Andrei)</li>
  <li>SQLite 3 library in ext/pdo_sqlite to 3.2.7. (Ilia)</li>
  <li>SQLite 2 library in ext/sqlite to 2.8.16. (Ilia)</li>
  </ul></li>
<li>Upgraded bundled libraries in Windows distribution. (Edin)
  <ul>
  <li>zlib 1.2.3</li>
  <li>curl 7.14.0</li>
  <li>openssl 0.9.8</li>
  <li>ming 0.3b</li>
  <li>libpq (PostgreSQL) 8.0.1</li>
  </ul></li>
<li><?php implemented(33452); ?> (Year belonging to ISO week). (Derick)</li>
<li>Allowed return by reference from internal functions. (Marcus, Andi, Dmitry)</li>
<li>Rewrote strtotime() with support for timezones and many new formats.  Implements feature requests <?php bugl(21399); ?>, <?php bugl(26694); ?>, <?php bugl(28088); ?>, <?php bugl(29150); ?>, <?php bugl(29585); ?> and  <?php bugl(29595); ?>. (Derick)</li>
<li>Moved extensions to PECL:
  <ul>
  <li>ext/cpdf        (Tony, Derick)</li>
  <li>ext/dio         (Jani, Derick)</li>
  <li>ext/fam         (Jani, Derick)</li>
  <li>ext/ingres_ii   (Jani, Derick)</li>
  <li>ext/mnogosearch (Jani, Derick)</li>
  <li>ext/w32api      (Jani, Derick)</li>
  <li>ext/yp          (Jani, Derick)</li>
  <li>ext/mcve        (Jani, Derick, Pierre)</li>
  <li>ext/oracle      (Jani, Derick)</li>
  <li>ext/ovrimos     (Jani, Derick, Pierre)</li>
  <li>ext/pfpro       (Jani, Derick, Pierre)</li>
  <li>ext/dbx         (Jani, Derick)</li>
  <li>ext/ircg        (Jani, Derick)</li>
  </ul></li>
<li>Removed php_check_syntax() function which never worked properly. (Ilia)</li>
<li>Removed garbage manager in Zend Engine which results in more aggressive  freeing of data. (Dmitry, Andi)</li>
<li>Fixed "make test" to work for phpized extensions. (Hartmut, Jani)</li>
<li>Fixed Apache 2 regression with sub-request handling on non-linux systems. (Ilia, Tony)</li>
<li>Fixed PDO shutdown problem (possible infinite loop running rollback on  shutdown). (Wez)</li>
<li><?php peclbugfix(3714); ?> (PDO: beginTransaction doesn't work if you're in  auto-commit mode). (Wez)</li>
<li>Fixed ZTS destruction. (Marcus)</li>
<li>Fixed __get/__set to allow recursive calls for different properties. (Dmitry)</li>
<li>Fixed a bug where stream_get_meta_data() did not return the "uri" element  for files opened with tmpname(). (Derick)</li>
<li>Fixed a problem with SPL iterators aggregating the inner iterator. (Marcus)</li>
<li>Fixed an error in mysqli_fetch_fields (returned NULL instead of an array  when row number &gt; field_count). (Georg)</li>
<li>Fixed bug in mysql::client_version(). (Georg)</li>
<li>Fixed bug in mysqli extension with unsigned int(11) being represented as  signed integer in PHP instead of string in 32bit systems. (Andrey)</li>
<li>Fixed bug with $HTTP_RAW_POST_DATA not getting set. (Brian)</li>
<li>Fixed crash inside stream_get_line() when length parameter equals 0. (Ilia)</li>
<li>Fixed ext/mysqli to allocate less memory when fetching bound params of type (MEDIUM|LONG)BLOB/(MEDIUM|LONG)TEXT. (Andrey)</li>
<li>Fixed extension initialization to respect dependencies between extensions. (Wez)</li>
<li>Fixed failing queries (FALSE returned) with mysqli_query() on 64 bit systems. (Andrey)</li>
<li>Fixed fgetcsv() and fputcsv() inconsistency. (Dmitry)</li>
<li>Fixed inheritance check to control return by reference and pass by  reference correctly (ArrayAccess can no longer support references correctly). (Marcus, Andi, Dmitry)</li>
<li>Fixed initializing and argument checking for posix_mknod(). (Derick)</li>
<li>Fixed memory corruption in ImageTTFText() with 64bit systems. (Andrey)</li>
<li>Fixed memory corruption in pg_copy_from() in case the as_null parameter was passed. (Derick)</li>
<li>Fixed memory corruption in stristr(). (Derick)</li>
<li>Fixed possible GLOBALS variable override when register_globals are ON. (Ilia, Stefan)</li>
<li>Fixed possible INI setting leak via virtual() in Apache 2 sapi. (Ilia)</li>
<li>Fixed possible register_globals toggle via parse_str(). (Ilia, Stefan)</li>
<li>Fixed potential GLOBALS overwrite via import_request_variables() and  possible crash and/or memory corruption. (Ilia)</li>
<li>Fixed segfaults when CURL callback functions throw exception. (Tony)</li>
<li>Fixed support for shared extensions on AIX. (Dmitry)</li>
<li><?php bugfix(35342); ?> (isset(DOMNodeList-&gt;length) returns false). (Rob)</li>
<li><?php bugfix(35341); ?> (Fix for bug <?php bugl(33760); ?> breaks build with older curl). (Tony)</li>
<li><?php bugfix(35336); ?> (crash on PDO::FETCH_CLASS + __set()). (Tony)</li>
<li><?php bugfix(35303); ?> (PDO prepare() crashes with invalid parameters). (Ilia)</li>
<li><?php bugfix(35293); ?> (PDO segfaults when using persistent connections). (Tony)</li>
<li><?php bugfix(35278); ?> (Multiple virtual() calls crash Apache 2 php module). (Ilia)</li>
<li><?php bugfix(35273); ?> (Error in mapping soap - java types). (Dmitry)</li>
<li><?php bugfix(35249); ?> (compile failure when ext/readline is compiled as shared). (Jani)</li>
<li><?php bugfix(35248); ?> (sqlite_query() doesn't set error_msg when return value is  being used). (Ilia)</li>
<li><?php bugfix(35243); ?> (php_mblen() crashes when compiled with thread-safety on  Linux). (Patch: shulmanb at il dot ibm dot com, Jani)</li>
<li><?php bugfix(35239); ?> (Objects can lose references). (Dmitry)</li>
<li><?php bugfix(35229); ?> (call_user_func() crashes when argument_stack is nearly  full). (Dmitry)</li>
<li><?php bugfix(35197); ?> (Destructor is not called). (Tony)</li>
<li><?php bugfix(35179); ?> (tokenizer extension needs T_HALT_COMPILER). (Greg)</li>
<li><?php bugfix(35176); ?> (include()/require()/*_once() produce wrong error messages  about main()). (Dmitry)</li>
<li><?php bugfix(35147); ?> (__HALT_COMPILER() breaks with --enable-zend-multibyte). (Dmitry, Moriyoshi)</li>
<li><?php bugfix(35143); ?> (gettimeofday() ignores current time zone). (Derick)</li>
<li><?php bugfix(35142); ?> (SOAP Client/Server Complex Object Support). (Dmitry)</li>
<li><?php bugfix(35135); ?> (PDOStatment without related PDO object may crash). (Ilia)</li>
<li><?php bugfix(35091); ?> (SoapClient leaks memory). (Dmitry)</li>
<li><?php bugfix(35079); ?> (stream_set_blocking(true) toggles, not enables blocking). (askalski at gmail dot com, Tony)</li>
<li><?php bugfix(35078); ?> (configure does not find ldap_start_tls_s). (Jani)</li>
<li><?php bugfix(35046); ?> (phpinfo() uses improper css enclosure). (Ilia)</li>
<li>Fixed bugs <?php bugl(35022); ?>, <?php bugl(35019); ?> (Regression in the behavior of key() and  current() functions). (Ilia)</li>
<li><?php bugfix(35017); ?> (Exception thrown in error handler may cause unexpected  behavior). (Dmitry)</li>
<li><?php bugfix(35014); ?> (array_product() always returns 0). (Ilia)</li>
<li><?php bugfix(35009); ?> (ZTS: Persistent resource destruct crashes when extension  is compiled as shared). (Dmitry)</li>
<li><?php bugfix(34996); ?> (ImageTrueColorToPalette() crashes when ncolors is zero). (Tony)</li>
<li><?php bugfix(34982); ?> (array_walk_recursive() modifies elements outside function scope). (Dmitry)</li>
<li><?php bugfix(34977); ?> (Compile failure on MacOSX due to use of varargs.h). (Tony)</li>
<li><?php bugfix(34968); ?> (bz2 extension fails on to build on some win32 setups). (Ilia)</li>
<li><?php bugfix(34965); ?> (tidy is not binary safe). (Mike)</li>
<li><?php bugfix(34957); ?> (PHP doesn't respect ACLs for access checks). (Wez)</li>
<li><?php bugfix(34950); ?> (Unable to get WSDL through proxy). (Dmitry)</li>
<li><?php bugfix(34938); ?> (dns_get_record() doesn't resolve long hostnames and  leaks). (Tony)</li>
<li><?php bugfix(34905); ?> (Digest authentication does not work with Apache 1). (Ilia)</li>
<li><?php bugfix(34902); ?> (mysqli::character_set_name() - undefined method). (Tony)</li>
<li><?php bugfix(34899); ?> (Fixed sqlite extension compile failure). (Ilia)</li>
<li><?php bugfix(34893); ?> (PHP5.1 overloading, Cannot access private property). (Dmitry)</li>
<li><?php bugfix(34884); ?> (Possible crash in ext/sqlite when sqlite.assoc_case is  being used). (Tony, Ilia)</li>
<li><?php bugfix(34879); ?> (str_replace, array_map corrupt negative array indexes on  64-bit platforms). (Dmitry)</li>
<li><?php bugfix(34873); ?> (Segmentation Fault on foreach in object). (Dmitry)</li>
<li><?php bugfix(34856); ?> (configure fails to detect libiconv's type). (Tony)</li>
<li><?php bugfix(34855); ?> (ibase_service_attach() segfault on AMD64).  (irie at gmx dot de, Tony)</li>
<li><?php bugfix(34851); ?> (SO_RECVTIMEO and SO_SNDTIMEO socket options expect  integer parameter on Windows). (Mike)</li>
<li><?php bugfix(34850); ?> (--program-suffix and --program-prefix not included in  man page names). (Jani)</li>
<li><?php bugfix(34821); ?> (zlib encoders fail on widely varying binary data on  windows). (Mike, Ilia)</li>
<li><?php bugfix(34818); ?> (several functions crash when invalid mysqli_link object  is passed). (Tony)</li>
<li><?php bugfix(34810); ?> (mysqli::init() and others use wrong $this pointer without  checks). (Tony)</li>
<li><?php bugfix(34809); ?> (FETCH_INTO in PDO crashes without a destination object). (Ilia)</li>
<li><?php bugfix(34802); ?> (Fixed crash on object instantiation failure). (Ilia)</li>
<li><?php bugfix(34796); ?> (missing SSL linking in ext/ftp when configured as shared). (Jani)</li>
<li><?php bugfix(34790); ?> (preg_match_all(), named capturing groups, variable  assignment/return =&gt; crash). (Dmitry)</li>
<li><?php bugfix(34788); ?> (SOAP Client not applying correct namespace to generated  values). (Dmitry)</li>
<li><?php bugfix(34787); ?> (SOAP Client not handling boolean types correctly). (Dmitry)</li>
<li><?php bugfix(34786); ?> (2 @ results in change to error_reporting() to random  value) (Dmitry, Tony)</li>
<li><?php bugfix(34785); ?> (subclassing of mysqli_stmt does not work). (Georg)</li>
<li><?php bugfix(34782); ?> (token_get_all() gives wrong result). (Dmitry)</li>
<li><?php bugfix(34777); ?> (Crash in dblib when fetching non-existent error info). (Ilia)</li>
<li><?php bugfix(34771); ?> (strtotime() fails with 1-12am/pm). (Derick)</li>
<li><?php bugfix(34767); ?> (Zend Engine 1 Compatibility not copying objects  correctly). (Dmitry)</li>
<li><?php bugfix(34758); ?> (PDO_DBLIB did not implement rowCount()). (Ilia)</li>
<li><?php bugfix(34757); ?> (iconv_substr() gives "Unknown error" when offset &gt; string length). (Tony)</li>
<li><?php bugfix(34742); ?> (ftp wrapper failures caused from segmented command  transfer). (Ilia)</li>
<li><?php bugfix(34725); ?> (CLI segmentation faults during cleanup). (Dmitry)</li>
<li><?php bugfix(34723); ?> (array_count_values() strips leading zeroes). (Tony)</li>
<li><?php bugfix(34712); ?> (zend.ze1_compatibility_mode = on segfault). (Dmitry)</li>
<li><?php bugfix(34704); ?> (Infinite recursion due to corrupt JPEG). (Marcus)</li>
<li><?php bugfix(34678); ?> (__call(), is_callable() and static methods). (Dmitry)</li>
<li><?php bugfix(34676); ?> (missing support for strtotime("midnight") and  strtotime("noon")). (Derick)</li>
<li><?php bugfix(34645); ?> (ctype corrupts memory when validating large numbers). (Ilia)</li>
<li><?php bugfix(34643); ?> (wsdl default value has no effect). (Dmitry)</li>
<li><?php bugfix(34623); ?> (Crash in pdo_mysql on longtext fields). (Ilia)</li>
<li><?php bugfix(34617); ?> (zend_deactivate: objects_store used after  zend_objects_store_destroy is called). (Dmitry)</li>
<li><?php bugfix(34590); ?> (User defined PDOStatement class can't implement  methods). (Marcus)</li>
<li><?php bugfix(34584); ?> (Segfault with SPL autoload handler). (Marcus)</li>
<li><?php bugfix(34581); ?> (crash with mod_rewrite). (Tony, Ilia)</li>
<li><?php bugfix(34565); ?> (mb_send_mail does not fetch  mail.force_extra_parameters). (Marco, Ilia)</li>
<li><?php bugfix(34557); ?> (php -m exits with "error" 1). (Johannes)</li>
<li><?php bugfix(34518); ?> (Unset doesn't separate container in CV). (Dmitry)</li>
<li><?php bugfix(34505); ?> (Possible memory corruption when unmangling properties  with empty names). (Tony)</li>
<li><?php bugfix(34478); ?> (Incorrect parsing of url's fragment (#...)). (Dmitry)</li>
<li><?php bugfix(34467); ?> (foreach + __get + __set inconsistency). (Dmitry)</li>
<li><?php bugfix(34456); ?> (Possible crash inside pspell extension). (Ilia)</li>
<li><?php bugfix(34453); ?> (parsing http://www.w3.org/2001/xml.xsd exception). (Dmitry)</li>
<li><?php bugfix(34450); ?> (Segfault when calling mysqli_close() in destructor). (Tony)</li>
<li><?php bugfix(34449); ?> (ext/soap: XSD_ANYXML functionality not exposed). (Dmitry)</li>
<li><?php bugfix(34420); ?> (Possible crash inside curl_multi_remove_handle()). (Ilia)</li>
<li><?php bugfix(34358); ?> (Fatal error: Cannot re-assign $this). (Dmitry)</li>
<li><?php bugfix(34331); ?> (php crashes when variables_order is empty). (Ilia)</li>
<li><?php bugfix(34321); ?> (Possible crash in filter code). (Ilia)</li>
<li><?php bugfix(34311); ?> (unserialize() crashes with chars above 191 dec). (Nuno)</li>
<li><?php bugfix(34310); ?> (foreach($arr as $c-&gt;d =&gt; $x) crashes). (Dmitry)</li>
<li><?php bugfix(34307); ?> (on_modify handler not called to set the default value if  setting from php.ini was invalid). (Andrei)</li>
<li><?php bugfix(34306); ?> (wddx_serialize_value() crashes with long array keys). (Jani)</li>
<li><?php bugfix(34304); ?> (date() doesn't have a modifier for ISO Week Day). (Derick)</li>
<li><?php bugfix(34302); ?> (date('W') do not return leading zeros for week 1 to 9).  (Derick)</li>
<li><?php bugfix(34299); ?> (ReflectionClass::isInstantiable() returns true for abstract classes). (Marcus)</li>
<li><?php bugfix(34284); ?> (CLI phpinfo showing html on _SERVER["argv"]). (Jani)</li>
<li><?php bugfix(34277); ?> (array_filter() crashes with references and objects).  (Dmitry)</li>
<li><?php bugfix(34276); ?> (setAttributeNS doesn't work with default namespace). (Rob)</li>
<li><?php bugfix(34260); ?> (Segfault with callbacks (array_map) + overloading). (Dmitry)</li>
<li><?php bugfix(34257); ?> (lib64 not handled correctly in ming extension). (Marcus)</li>
<li><?php bugfix(34221); ?> (Compiling xmlrpc as shared fails other parts). (Jani)</li>
<li><?php bugfix(34216); ?> (Segfault with autoload). (Marcus)</li>
<li><?php bugfix(34199); ?> (if($obj)/if(!$obj) inconsistency because of cast handler). (Dmitry, Alex)</li>
<li><?php bugfix(34191); ?> (ob_gzhandler does not enforce trailing \0). (Ilia)</li>
<li><?php bugfix(34156); ?> (memory usage remains elevated after memory limit is  reached). (Ilia)</li>
<li><?php bugfix(34148); ?> (+,- and . not supported as parts of scheme). (Ilia)</li>
<li><?php bugfix(34137); ?> (assigning array element by reference causes binary mess). (Dmitry)</li>
<li><?php bugfix(34103); ?> (line numbering not maintained in dom document). (Rob)</li>
<li><?php bugfix(34078); ?> (Reflection API problems in methods with boolean or  null default values). (Tony)</li>
<li><?php bugfix(34068); ?> (Numeric string as array key not cast to integer in  wddx_deserialize()). (Ilia)</li>
<li><?php bugfix(34064); ?> (arr[] as param to function in class gives invalid  opcode). (Dmitry)</li>
<li><?php bugfix(34062); ?> (Crash in catch block when many arguments are used). (Dmitry)</li>
<li><?php bugfix(34052); ?> (date('U') returns %ld not unix timestamp). (Nuno)</li>
<li><?php bugfix(34045); ?> (Buffer overflow with serialized object). (Dmitry)</li>
<li><?php bugfix(34001); ?> (pdo_mysql truncates numeric fields at 4 chars). (Ilia)</li>
<li><?php bugfix(33999); ?> (object remains object when cast to int). (Dmitry)</li>
<li><?php bugfix(33996); ?> (No information given for fatal error on passing invalid  value to typed argument). (Dmitry)</li>
<li><?php bugfix(33989); ?> (extract($GLOBALS,EXTR_REFS) crashes PHP). (Dmitry)</li>
<li><?php bugfix(33987); ?> (php script as ErrorDocument causes crash in Apache 2).  (Ilia)</li>
<li><?php bugfix(33967); ?> (misuse of Exception constructor doesn't display  errorfile). (Jani)</li>
<li><?php bugfix(33966); ?> (Wrong use of reflectionproperty causes a segfault). (Tony)</li>
<li><?php bugfix(33963); ?> (mssql_bind() fails on input parameters). (Frank)</li>
<li><?php bugfix(33958); ?> (duplicate cookies and magic_quotes=off may cause a crash). (Ilia)</li>
<li><?php bugfix(33957); ?> (gmdate('W')/date('W') sometimes returns wrong week number). (Derick)</li>
<li><?php bugfix(33940); ?> (array_map() fails to pass by reference when called  recursively). (Dmitry)</li>
<li><?php bugfix(33917); ?> (number_format() output with &gt; 1 char separators). (Jani)</li>
<li><?php bugfix(33904); ?> (input array keys being escaped when magic quotes is off). (Ilia)</li>
<li><?php bugfix(33903); ?> (spl_autoload_register class method). (Marcus)</li>
<li><?php bugfix(33899); ?> (CLI: setting extension_dir=some/path extension=foobar.so  does not work). (Jani)</li>
<li><?php bugfix(33882); ?> (CLI was looking for php.ini in wrong path). (Hartmut)</li>
<li><?php bugfix(33869); ?> (strtotime() problem with "+1days" format). (Ilia)</li>
<li><?php bugfix(33841); ?> (pdo sqlite driver forgets to update affected column  count on execution of prepared statments). (Ilia)</li>
<li><?php bugfix(33837); ?> (Informix ESQL version numbering schema changed). (Jani)</li>
<li><?php bugfix(33829); ?> (mime_content_type() returns text/plain for gzip and bzip  files). (Derick)</li>
<li><?php bugfix(33802); ?> (throw Exception in error handler causes crash). (Dmitry)</li>
<li><?php bugfix(33771); ?> (error_reporting falls to 0 when @ was used inside  try/catch block). (Tony)</li>
<li><?php bugfix(33760); ?> (cURL needs to implement CRYPTO_callback functions to  prevent locking). (Mike, Ilia)</li>
<li><?php bugfix(33732); ?> (Wrong behavior of constants in class and interface  extending). (Dmitry)</li>
<li><?php bugfix(33723); ?> (php_value overrides php_admin_value). (Dmitry)</li>
<li><?php bugfix(33720); ?> (mb_encode_mimeheader does not work for multibyte  chars). (Rui)</li>
<li><?php bugfix(33710); ?> (ArrayAccess objects does not initialize $this). (Dmitry)</li>
<li><?php bugfix(33690); ?> (Crash setting some ini directives in httpd.conf). (Rasmus)</li>
<li><?php bugfix(33673); ?> (Added detection for partially uploaded files). (Ilia)</li>
<li><?php bugfix(33605); ?> (substr_compare() crashes with negative offset and length). (Tony)</li>
<li><?php bugfix(33597); ?> (setcookie() "expires" date format doesn't comply with RFC). (Tony)</li>
<li><?php bugfix(33588); ?> (LDAP: RootDSE query not possible). (Jani)</li>
<li><?php bugfix(33578); ?> (strtotime() problem with "Oct17" format). (Derick)</li>
<li><?php bugfix(33578); ?> (strtotime() doesn't understand "11 Oct" format). (Derick)</li>
<li><?php bugfix(33562); ?> (date("") crashes). (Derick)</li>
<li><?php bugfix(33558); ?> (warning with nested calls to functions returning by  reference). (Dmitry)</li>
<li><?php bugfix(33536); ?> (strtotime() defaults to now even on non time string). (Derick)</li>
<li><?php bugfix(33532); ?> (Different output for strftime() and date()). (Derick)</li>
<li><?php bugfix(33523); ?> (Memory leak in xmlrpc_encode_request()). (Ilia)</li>
<li><?php bugfix(33520); ?> (crash if safe_mode is on and session.save_path is changed). (Dmitry)</li>
<li><?php bugfix(33512); ?> (Add missing support for isset()/unset() overloading to  complement the property get/set methods). (Dmitry)</li>
<li><?php bugfix(33491); ?> (crash after extending MySQLi internal class). (Tony)</li>
<li><?php bugfix(33475); ?> (cURL handle is not closed on curl_close(). (Ilia)</li>
<li><?php bugfix(33469); ?> (Compile error undefined reference to ifx_checkAPI). (Jani)</li>
<li><?php bugfix(33433); ?> (strtoll not available on Tru64). (Jani, Derick)</li>
<li><?php bugfix(33427); ?> (ext/odbc: check if unixODBC header file exists). (Jani)</li>
<li><?php bugfix(33415); ?> (strtotime() related bugs). (Derick)</li>
<li><?php bugfix(33414); ?> (Comprehensive list of incorrect days returned after  strtotime() / date() tests). (Derick)</li>
<li><?php bugfix(33389); ?> (double free() when exporting a ReflectionClass). (Marcus)</li>
<li><?php bugfix(33383); ?> (crash when retrieving empty LOBs). (Tony)</li>
<li><?php bugfix(33382); ?> (array_reverse() fails after *sort()),  introduced by  zend_hash_sort() optimizations in HEAD. (Tony)</li>
<li><?php bugfix(33340); ?> (CLI Crash when calling php:function from XSLT). (Rob)</li>
<li><?php bugfix(33326); ?> (Cannot build extensions with phpize on Macosx). (Jani)</li>
<li><?php bugfix(33318); ?> (throw 1; results in Invalid opcode 108/1/8). (Dmitry)</li>
<li><?php bugfix(33312); ?> (ReflectionParameter methods do not work correctly). (Dmitry)</li>
<li><?php bugfix(33299); ?> (php:function no longer handles returned dom objects).  (Rob, Joe Orton)</li>
<li><?php bugfix(33286); ?> (nested array_walk() calls and user array compare functions broken; FCI cache). (Andrei, patch from m.bretz@metropolis-ag.de)</li>
<li><?php bugfix(33277); ?> (private method accessed by child class). (Dmitry)</li>
<li><?php bugfix(33268); ?> (iconv_strlen() works only with a parameter of &lt; 3 in length). (Ilia)</li>
<li><?php bugfix(33257); ?> (array_splice() inconsistent when passed function instead of variable). (Dmitry)</li>
<li><?php bugfix(33243); ?> (ze1_compatibility_mode does not work as expected). (Dmitry)</li>
<li><?php bugfix(33242); ?> (Mangled error message when stream fails). (Derick)</li>
<li><?php bugfix(33222); ?> (segfault when CURL handle is closed in a callback). (Tony)</li>
<li><?php bugfix(33214); ?> (odbc_next_result does not signal SQL errors with  2-statement SQL batches). (rich at kastle dot com, Tony)</li>
<li><?php bugfix(33212); ?> ([GCC 4]: 'zend_error_noreturn' aliased to external symbol  'zend_error'). (Dmitry)</li>
<li><?php bugfix(33210); ?> (relax jpeg recursive loop protection). (Ilia)</li>
<li><?php bugfix(33201); ?> (Crash when fetching some data types). (Frank)</li>
<li><?php bugfix(33200); ?> (preg_replace(): magic_quotes_sybase=On makes 'e' modifier  misbehave). (Jani)</li>
<li><?php bugfix(33185); ?> (--enable-session=shared does not build). (Jani)</li>
<li><?php bugfix(33171); ?> (foreach enumerates private fields declared in base  classes). (Dmitry)</li>
<li><?php bugfix(33167); ?> (Possible crash inside pg_fetch_array()). (Ilia)</li>
<li><?php bugfix(33164); ?> (Soap extension incorrectly detects HTTP/1.1). (Ilia)</li>
<li><?php bugfix(33156); ?> (cygwin version of setitimer doesn't accept ITIMER_PROF). (Nuno)</li>
<li><?php bugfix(33153); ?> (crash in mssql_next result). (Frank)</li>
<li><?php bugfix(33150); ?> (shtool: insecure temporary file creation). (Jani)</li>
<li><?php bugfix(33136); ?> (method offsetSet in class extended from ArrayObject crash PHP). (Marcus)</li>
<li><?php bugfix(33125); ?> (imagecopymergegray() produces mosaic rainbow effect).  (Pierre)</li>
<li><?php bugfix(33116); ?> (crash when assigning class name to global variable in  __autoload). (Dmitry)</li>
<li><?php bugfix(33090); ?> (mysqli_prepare() doesn't return an error). (Georg)</li>
<li><?php bugfix(33076); ?> (str_ireplace() incorrectly counts result string length and may cause segfault). (Tony)</li>
<li><?php bugfix(33072); ?> (Add a safemode/open_basedir check for runtime  "session.save_path" change using session_save_path() function). (Rasmus)</li>
<li><?php bugfix(33070); ?> (Improved performance of bzdecompress() by several orders  of magnitude). (Ilia)</li>
<li><?php bugfix(33059); ?> (crash when moving xml attribute set in dtd). (Ilia)</li>
<li><?php bugfix(33057); ?> (Don't send extraneous entity-headers on a 304 as per  RFC 2616 section 10.3.5) (Rasmus, Choitel)</li>
<li><?php bugfix(33019); ?> (socket errors cause memory leaks in php_strerror()). (jwozniak23 at poczta dot onet dot pl, Tony).</li>
<li><?php bugfix(33017); ?> ("make distclean" gives an error with VPATH build). (Jani)</li>
<li><?php bugfix(33013); ?> ("next month" was handled wrong while parsing dates).  (Derick)</li>
<li><?php bugfix(32993); ?> (implemented Iterator function current() don't throw  exception). (Dmitry)</li>
<li><?php bugfix(32981); ?> (ReflectionMethod::getStaticVariables() causes apache2.0.54 seg fault). (Dmitry)</li>
<li><?php bugfix(32956); ?> (mysql_bind_result() doesn't support MYSQL_TYPE_NULL).  (Georg)</li>
<li><?php bugfix(32947); ?> (Incorrect option for mysqli default password). (Georg)</li>
<li><?php bugfix(32944); ?> (Disabling session.use_cookies doesn't prevent reading  session cookies). (Jani, Tony)</li>
<li><?php bugfix(32941); ?> (Sending structured SOAP fault kills a php). (Dmitry)</li>
<li><?php bugfix(32937); ?> (open_basedir looses trailing / in the limiter). (Adam Conrad)</li>
<li><?php bugfix(32936); ?> (http redirects URLs are not checked for control chars). (Ilia)</li>
<li><?php bugfix(32933); ?> (Cannot extend class "SQLiteDatabase"). (Marcus)</li>
<li><?php bugfix(32932); ?> (Oracle LDAP: ldap_get_entries(), invalid pointer). (Jani)</li>
<li><?php bugfix(32930); ?> (class extending DOMDocument doesn't clone properly). (Rob)</li>
<li><?php bugfix(32924); ?> (file included with "auto_prepend_file" can be included  with require_once() or include_once()). (Stas)</li>
<li><?php bugfix(32904); ?> (pg_get_notify() ignores result_type parameter). (Tony)</li>
<li><?php bugfix(32852); ?> (Crash with singleton and __destruct when  zend.ze1_compatibility_mode = On). (Dmitry)</li>
<li><?php bugfix(32833); ?> (Invalid opcode). (Dmitry)</li>
<li><?php bugfix(32813); ?> (parse_url() does not handle scheme-only urls properly). (Ilia)</li>
<li><?php bugfix(32810); ?> (temporary files not using plain file wrapper). (Ilia)</li>
<li><?php bugfix(32809); ?> (Missing T1LIB support on Windows). (Edin)</li>
<li><?php bugfix(32802); ?> (General cookie overrides more specific cookie). (Ilia)</li>
<li>Fixed bugs <?php bugl(32800); ?>, <?php bugl(32830); ?> (ext/odbc: Problems with 64bit systems). (Jani)</li>
<li><?php bugfix(32799); ?> (crash: calling the corresponding global var during the  destruct). (Dmitry)</li>
<li><?php bugfix(32776); ?> (SOAP doesn't support one-way operations). (Dmitry)</li>
<li><?php bugfix(32773); ?> (GMP functions break when second parameter is 0). (Stas)</li>
<li><?php bugfix(32759); ?> (incorrect determination of default value (COM)). (Wez)</li>
<li><?php bugfix(32758); ?> (Cannot access safearray properties in VB6 objects). (Wez)</li>
<li><?php bugfix(32755); ?> (Segfault in replaceChild() when DocumentFragment has no  children). (Rob)</li>
<li><?php bugfix(32753); ?> (Undefined constant SQLITE_NOTADB). (Ilia)</li>
<li><?php bugfix(32742); ?> (segmentation fault when the stream with a wrapper is not closed). (Tony, Dmitry)</li>
<li><?php bugfix(32699); ?> (pg_affected_rows() was defined when it was not available). (Derick)</li>
<li><?php bugfix(32686); ?> (Require/include file in destructor causes segfault). (Marcus)</li>
<li><?php bugfix(32682); ?> (ext/mssql: Error on module shutdown when called from  activescript). (Frank)</li>
<li><?php bugfix(32674); ?> (exception in iterator causes crash). (Dmitry)</li>
<li><?php bugfix(32660); ?> (Assignment by reference causes crash when field access is  overloaded (__get)). (Dmitry)</li>
<li><?php bugfix(32647); ?> (Using register_shutdown_function() with invalid callback  can crash PHP). (Jani)</li>
<li><?php bugfix(32615); ?> (Segfault in replaceChild() using fragment when  previousSibling is NULL). (Rob)</li>
<li><?php bugfix(32613); ?> (ext/snmp: use of snmp_shutdown() causes snmpapp.conf  access errors). (Jani, ric at arizona dot edu)</li>
<li><?php bugfix(32608); ?> (html_entity_decode() converts single quotes even if  ENT_NOQUOTES is given). (Ilia)</li>
<li><?php bugfix(32596); ?> (Segfault/Memory Leak by getClass (etc) in __destruct). (Dmitry)</li>
<li><?php bugfix(32591); ?> (ext/mysql: Unsatisfied symbol: ntohs with HP-UX). (Jani)</li>
<li><?php bugfix(32589); ?> (possible crash inside imap_mail_compose() function). (Ilia)</li>
<li><?php bugfix(32589); ?> (Possible crash inside imap_mail_compose, with charsets). (Ilia)</li>
<li><?php bugfix(32587); ?> (Apache2: errors sent to error_log do not include  timestamps). (Jani)</li>
<li><?php bugfix(32560); ?> (configure looks for incorrect db2 library). (Tony)</li>
<li><?php bugfix(32553); ?> (mmap loads only the 1st 2000000 bytes on Win32). (Ilia)</li>
<li><?php bugfix(32533); ?> (proc_get_status() returns the incorrect process status). (Ilia)</li>
<li><?php bugfix(32530); ?> (chunk_split() does not append endstr if chunklen is longer then the original string). (Ilia)</li>
<li><?php bugfix(32491); ?> (File upload error - unable to create a temporary file). (Uwe Schindler)</li>
<li><?php bugfix(32455); ?> (wrong setting property to unset value). (Dmitry)</li>
<li><?php bugfix(32429); ?> (method_exists() always return TRUE if __call method  exists). (Dmitry)</li>
<li><?php bugfix(32428); ?> (The @ warning error suppression operator is broken). (Dmitry)</li>
<li><?php bugfix(32427); ?> (Interfaces are not allowed 'static' access modifier). (Dmitry)</li>
<li><?php bugfix(32405); ?> (mysqli::fetch() returns bad data - 64bit problem). (Andrey)</li>
<li><?php bugfix(32296); ?> (get_class_methods() output has changed between 5.0.2 and  5.0.3). (Dmitry)</li>
<li><?php bugfix(32282); ?> (Segfault in mysqli_fetch_array on 64-bit). (Georg)</li>
<li><?php bugfix(32245); ?> (xml_parser_free() in a function assigned to the xml  parser gives a segfault). (Rob)</li>
<li><?php bugfix(32179); ?> (xmlrpc_encode() segfaults with recursive references). (Tony)</li>
<li><?php bugfix(32171); ?> (Userspace stream wrapper crashes PHP). (Tony, Dmitry)</li>
<li><?php bugfix(32160); ?> (copying a file into itself leads to data loss). (Ilia)</li>
<li><?php bugfix(32139); ?> (SOAP client does not auto-handle base64 encoding). (Ilia)</li>
<li><?php bugfix(32109); ?> ($_POST is not populated in multi-threaded environment).  (Moriyoshi)</li>
<li><?php bugfix(32080); ?> (segfault when assigning object to itself with  zend.ze1_compatibility_mode=On). (Dmitry)</li>
<li><?php bugfix(32021); ?> (Crash caused by range('', 'z')). (Derick)</li>
<li><?php bugfix(32013); ?> (ext/mysqli bind_result causes fatal error: memory limit). (Andrey)</li>
<li><?php bugfix(32010); ?> (Memory leak in mssql_fetch_batch). (fmk)</li>
<li><?php bugfix(32009); ?> (crash when mssql_bind() is called more than once). (Frank)</li>
<li><?php bugfix(31971); ?> (ftp_login fails on some SSL servers). (frantisek at augusztin dot com)</li>
<li><?php bugfix(31887); ?> (ISAPI: Custom 5xx error does not return correct HTTP  response message). (Jani)</li>
<li><?php bugfix(31828); ?> (Crash with zend.ze1_compatibility_mode=On). (Dmitry)</li>
<li><?php bugfix(31668); ?> (multi_query works exactly every other time - multi query  d/e flag global and not per connection). (Andrey)</li>
<li><?php bugfix(31636); ?> (another crash when echoing a COM object). (Wez)</li>
<li><?php bugfix(31583); ?> (php_std_date() uses short day names in non-y2k_compliance mode). (mike at php dot net)</li>
<li><?php bugfix(31525); ?> (object reference being dropped. $this getting lost). (Stas, Dmitry)</li>
<li><?php bugfix(31502); ?> (Wrong deserialization from session when using WDDX  serializer). (Dmitry)</li>
<li><?php bugfix(31478); ?> (segfault with empty() / isset()). (Moriyoshi)</li>
<li><?php bugfix(31465); ?> (False warning in unpack() when working with *). (Ilia)</li>
<li><?php bugfix(31363); ?> (broken non-blocking flock()). (ian at snork dot net)</li>
<li><?php bugfix(31358); ?> (Older GCC versions do not provide portable va_copy()). (Jani)</li>
<li><?php bugfix(31341); ?> (escape on curly inconsistent). (Dmitry)</li>
<li><?php bugfix(31256); ?> (PHP_EVAL_LIBLINE configure macro does not handle  -pthread). (Jani)</li>
<li><?php bugfix(31213); ?> (Side effects caused by fix of bug <?php bugl(29493); ?>). (Dmitry)</li>
<li><?php bugfix(31177); ?> (memory leaks and corruption because of incorrect  refcounting). (Dmitry)</li>
<li><?php bugfix(31158); ?> (array_splice on $GLOBALS crashes). (Dmitry)</li>
<li><?php bugfix(31054); ?> (safe_mode &amp; open_basedir checks only check first   include_path value). (Ilia)</li>
<li><?php bugfix(31033); ?> (php:function(string, nodeset) with xsl:key crashes PHP). (Rob)</li>
<li><?php bugfix(30961); ?> (Wrong line number in ReflectionClass getStartLine()). (Dmitry)</li>
<li><?php bugfix(30889); ?> (Conflict between __get/__set and ++ operator). (Dmitry)</li>
<li><?php bugfix(30833); ?> (array_count_values() modifying input array). (Tony)</li>
<li><?php bugfix(30828); ?> (debug_backtrace() reports incorrect class in overridden  methods). (Dmitry)</li>
<li><?php bugfix(30820); ?> (static member conflict with $this-&gt;member silently  ignored). (Dmitry)</li>
<li><?php bugfix(30819); ?> (Better support for LDAP SASL bind). (Jani)</li>
<li><?php bugfix(30791); ?> (magic methods (__sleep/__wakeup/__toString) call  __call if object is overloaded). (Dmitry)</li>
<li><?php bugfix(30707); ?> (Segmentation fault on exception in method).  (Stas, Dmitry)</li>
<li><?php bugfix(30702); ?> (cannot initialize class variable from class constant).  (Dmitry)</li>
<li><?php bugfix(30578); ?> (Output buffers flushed before calling __destruct()  functions). (Jani)</li>
<li><?php bugfix(30519); ?> (Interface not existing says Class not found). (Dmitry)</li>
<li><?php bugfix(30407); ?> (Strange behavior of default arguments). (Dmitry)</li>
<li><?php bugfix(30394); ?> (Assignment operators yield wrong result with __get/__set). (Dmitry)</li>
<li><?php bugfix(30332); ?> (zend.ze1_compatibility_mode isn't fully compatible with  array_push()). (Dmitry)</li>
<li><?php bugfix(30162); ?> (Catching exception in constructor causes lose of  $this). (Dmitry)</li>
<li><?php bugfix(30140); ?> (Problem with array in static properties). (Dmitry)</li>
<li><?php bugfix(30126); ?> (Enhancement for error message for abstract classes). (Marcus)</li>
<li><?php bugfix(30096); ?> (gmmktime does not return the current time). (Derick)</li>
<li><?php bugfix(30080); ?> (Passing array or non array of objects). (Dmitry)</li>
<li><?php bugfix(30052); ?> (Crash on shutdown after odbc_pconnect()). (Edin)</li>
<li><?php bugfix(29983); ?> (PHP does not explicitly set mime type &amp; charset). (Ilia)</li>
<li><?php bugfix(29975); ?> (memory leaks when set_error_handler() is used inside error handler). (Tony)</li>
<li><?php bugfix(29971); ?> (variables_order behavior). (Dmitry)</li>
<li><?php bugfix(29944); ?> (Function defined in switch, crashes). (Dmitry)</li>
<li><?php bugfix(29896); ?> (Backtrace argument list out of sync). (Dmitry)</li>
<li><?php bugfix(29728); ?> (Reflection API Feature: Default parameter value). (Marcus)</li>
<li><?php bugfix(29689); ?> (default value of protected member overrides default value of private and other private variable problems in inherited classes). (Stas)</li>
<li><?php bugfix(29683); ?> (headers_list() returns empty array). (Tony)</li>
<li><?php bugfix(29583); ?> (crash when echoing a COM object). (M.Sisolak, Wez)</li>
<li><?php bugfix(29522); ?> (accessing properties without connection). (Georg)</li>
<li><?php bugfix(29361); ?> (var_export() producing invalid code). (Derick)</li>
<li><?php bugfix(29338); ?> (unencoded spaces get ignored after certain tags). (Ilia)</li>
<li><?php bugfix(29335); ?> (fetch functions now use MYSQLI_BOTH as default). (Georg)</li>
<li><?php bugfix(29334); ?> (win32 mail() provides incorrect Date: header). (Jani)</li>
<li><?php bugfix(29311); ?> (calling parent constructor in mysqli). (Georg)</li>
<li><?php bugfix(29268); ?> (__autoload() not called with Reflection-&gt;getClass()). (Dmitry)</li>
<li><?php bugfix(29256); ?> (SOAP HTTP Error when envelop size is more than 24345  bytes). (Dmitry, Wez)</li>
<li><?php bugfix(29253); ?> (array_diff with $GLOBALS argument fails). (Dmitry)</li>
<li><?php bugfix(29236); ?> (memory error when wsdl-cache is enabled). (Dmitry)</li>
<li><?php bugfix(29210); ?> (Function: is_callable - no support for private and  protected classes). (Dmitry)</li>
<li><?php bugfix(29109); ?> (SoapFault exception: [WSDL] Out of memory). (Dmitry)</li>
<li><?php bugfix(29104); ?> (Function declaration in method doesn't work). (Dmitry)</li>
<li><?php bugfix(29061); ?> (soap extension segfaults). (Dmitry)</li>
<li><?php bugfix(29015); ?> (Incorrect behavior of member vars(non string ones)-numeric mem vars and others). (Dmitry)</li>
<li><?php bugfix(28985); ?> (__getTypes() returning nothing on complex WSDL). (Dmitry)</li>
<li><?php bugfix(28969); ?> (Wrong data encoding of special characters). (Dmitry)</li>
<li><?php bugfix(28839); ?> (SIGSEGV in interactive mode (php -a)). (kameshj at fastmail dot fm)</li>
<li><?php bugfix(28605); ?> (Need to use -[m]ieee option for Alpha CPUs). (Jani)</li>
<li><?php bugfix(28568); ?> (SAPI::known_post_content_types is not thread safe). (Moriyoshi)</li>
<li><?php bugfix(28377); ?> (debug_backtrace is intermittently passing args). (Dmitry)</li>
<li><?php bugfix(28355); ?> (glob wont error if dir is not readable). (Hartmut)</li>
<li><?php bugfix(28072); ?> (static array with some constant keys will be incorrectly  ordered). (Dmitry)</li>
<li><?php bugfix(27908); ?> (xml default_handlers not being called). (Rob)</li>
<li><?php bugfix(27598); ?> (list() array key assignment causes HUGE memory leak). (Dmitry)</li>
<li><?php bugfix(27268); ?> (Bad references accentuated by clone). (Dmitry)</li>
<li><?php bugfix(26456); ?> (Wrong results from Reflection-API getDocComment() when called via STDIN). (Dmitry)</li>
<li><?php bugfix(25922); ?> (In error handler, modifying 5th arg (errcontext) may  result in seg fault). (Dmitry)</li>
<li><?php bugfix(25359); ?> (array_multisort() doesn't work in a function if array is  global or reference). (Dmitry)</li>
<li><?php bugfix(22836); ?> (returning reference to uninitialized variable). (Dmitry)</li>
<li><?php bugfix(21306); ?> (ext/sesssion: catch bailouts of write handler during  RSHUTDOWN). (Jani, Xuefer at 21cn dot com)</li>
<li><?php bugfix(15854); ?> (boolean ini options may be incorrectly displayed as Off  when they are On). (Tony)</li>
<li>Fixed bugs <?php bugl(14561); ?>, <?php bugl(20382); ?>, <?php bugl(26090); ?>, <?php bugl(26320); ?>, <?php bugl(28024); ?>, <?php bugl(30532); ?>, <?php bugl(32086); ?>, <?php bugl(32270); ?>, <?php bugl(32555); ?>, <?php bugl(32588); ?>, <?php bugl(33056); ?> (strtotime() related bugs). (Derick)</li>
</ul>

<!-- }}} --></section>

<a id="PHP_5_0"></a>
<section class="version" id="5.0.5"><!-- {{{ 5.0.5 -->
<h3>Version 5.0.5</h3>
<?php release_date('05-Sep-2005'); ?>
<ul>
<li>Upgraded PCRE library to version 5.0. (Andrei)</li>
<li>Removed php_check_syntax() function which never worked properly. (Ilia)</li>
<li>Added new function mysqli_set_charset(). (Georg)</li>
<li>Added man pages for "phpize" and "php-config" scripts. (Jakub Vrana)</li>
<li>Added support for .cc files in extensions. (Brian)</li>
<li>Added PHP_INT_MAX and PHP_INT_SIZE as predefined constants. (Andrey)</li>
<li>Changed sha1_file() and md5_file() functions to use streams instead of
  low level IO. (Uwe)</li>
<li>Changed ming to support official 0.2a and 0.3 library versions. (Marcus)</li>
<li>Fixed failing queries problem (FALSE returned) with mysqli_query() on 64 bit.
  (Andrey)</li>
<li>Fixed memory corruption in pg_copy_from() in case the as_null parameter was
  passed. (Derick)</li>
<li>Fixed ext/mysqli to allocate less memory when fetching bound params
  of type (MEDIUM|LONG)BLOB/(MEDIUM|LONG)TEXT. (Andrey)</li>
<li>Fixed memory corruption in ImageTTFText() with 64bit systems. (Andrey)</li>
<li>Fixed memory corruption in stristr(). (Derick)</li>
<li>Fixed segfaults when CURL callback functions throw exception. (Tony)</li>
<li>Fixed various reentrancy bugs in user-sort functions, solves bugs <?php bugl(33286); ?> and
  <?php bugl(33295); ?>. (Mike Bretz)</li>
<li><?php bugfix(34307); ?> (on_modify handler not called to set the default value if
  setting from php.ini was invalid). (Andrei)</li>
<li><?php bugfix(34302); ?> (date('W') do not return leading zeros for week 1 to 9).
  (Derick)</li>
<li><?php bugfix(34299); ?> (ReflectionClass::isInstantiable() returns true for abstract
  classes). (Marcus)</li>
<li><?php bugfix(34277); ?> (array_filter() crashes with references and objects).
  (Dmitry)</li>
<li><?php bugfix(34260); ?> (Segfault with callbacks (array_map) + overloading).
  (Dmitry)</li>
<li><?php bugfix(34137); ?> (assigning array element by reference causes binary mess).
  (Dmitry)</li>
<li><?php bugfix(34078); ?> (Reflection API problems in methods with boolean or
  null default values). (Tony)</li>
<li><?php bugfix(34064); ?> (arr[] as param to function is allowed only if function
  receives argument by reference). (Dmitry)</li>
<li><?php bugfix(34062); ?> (Crash in catch block when many arguments are used).
  (Dmitry)</li>
<li><?php bugfix(33989); ?> (extract($GLOBALS,EXTR_REFS) crashes PHP). (Dmitry)</li>
<li><?php bugfix(33940); ?> (array_map() fails to pass by reference when called
  recursively). (Dmitry)</li>
<li><?php bugfix(33853); ?> (php:function call __autoload with lowercase param). (Marcus)</li>
<li><?php bugfix(33802); ?> (throw Exception in error handler causes crash). (Dmitry)</li>
<li><?php bugfix(33723); ?> (php_value overrides php_admin_value). (Dmitry)</li>
<li><?php bugfix(33710); ?> (ArrayAccess objects doen't initialize $this). (Dmitry)</li>
<li><?php bugfix(33588); ?> (LDAP: RootDSE query not possible). (Jani)</li>
<li><?php bugfix(33558); ?> (warning with nested calls to functions returning by
  reference). (Dmitry)</li>
<li><?php bugfix(33520); ?> (crash if safe_mode is on and session.save_path is changed).
  (Dmitry)</li>
<li><?php bugfix(33491); ?> (crash after extending MySQLi internal class). (Tony)</li>
<li><?php bugfix(33340); ?> (CLI Crash when calling php:function from XSLT). (Rob)</li>
<li><?php bugfix(33277); ?> (private method accessed by child class). (Dmitry)</li>
<li><?php bugfix(33268); ?> (iconv_strlen() works only with a parameter of &lt; 3 in
  length). (Ilia)</li>
<li><?php bugfix(33263); ?> (mysqli_real_escape doesn't work in __construct) (Georg)</li>
<li><?php bugfix(33257); ?> (array_splice() inconsistent when passed function instead
  of variable). (Dmitry)</li>
<li><?php bugfix(33243); ?> (ze1_compatibility_mode does not work as expected). (Dmitry)</li>
<li><?php bugfix(33242); ?> (Mangled error message when stream fails). (Derick)</li>
<li><?php bugfix(33222); ?> (segfault when CURL handle is closed in a callback). (Tony)</li>
<li><?php bugfix(33214); ?> (odbc_next_result does not signal SQL errors with
  2-statement SQL batches). (rich at kastle dot com, Tony)</li>
<li><?php bugfix(33210); ?> (relax jpeg recursive loop protection). (Ilia)</li>
<li><?php bugfix(33200); ?> (preg_replace(): magic_quotes_sybase=On makes 'e' modifier
  misbehave). (Jani)</li>
<li><?php bugfix(33185); ?> (--enable-session=shared does not build). (Jani)</li>
<li><?php bugfix(33171); ?> (foreach enumerates private fields declared in base
  classes). (Dmitry)</li>
<li><?php bugfix(33164); ?> (Soap extension incorrectly detects HTTP/1.1). (Ilia)</li>
<li><?php bugfix(33156); ?> (cygwin version of setitimer doesn't accept ITIMER_PROF).
  (Nuno)</li>
<li><?php bugfix(33116); ?> (crash when assigning class name to global variable in
  __autoload). (Dmitry)</li>
<li><?php bugfix(33090); ?> (mysqli_prepare() doesn't return an error). (Georg)</li>
<li><?php bugfix(33076); ?> (str_ireplace() incorrectly counts result string length
  and may cause segfault). (Tony)</li>
<li><?php bugfix(33072); ?> (Add a safemode/open_basedir check for runtime
  "session.save_path" change using session_save_path() function). (Rasmus)</li>
<li><?php bugfix(33070); ?> (Improved performance of bzdecompress() by several orders
  of magnitude). (Ilia)</li>
<li><?php bugfix(33059); ?> (crash when moving xml attribute set in dtd). (Ilia)</li>
<li><?php bugfix(33057); ?> (Don't send extraneous entity-headers on a 304 as per
  RFC 2616 section 10.3.5) (Rasmus, Choitel)</li>
<li><?php bugfix(33019); ?> (socket errors cause memory leaks in php_strerror()).
  (jwozniak23 at poczta dot onet dot pl, Tony).</li>
<li><?php bugfix(33017); ?> ("make distclean" gives an error with VPATH build). (Jani)</li>
<li><?php bugfix(33013); ?> ("next month" was handled wrong while parsing dates).
  (Derick)</li>
<li><?php bugfix(32981); ?> (ReflectionMethod::getStaticVariables() causes apache2.0.54
  seg fault). (Dmitry)</li>
<li><?php bugfix(32956); ?> (mysql_bind_result() doesn't support MYSQL_TYPE_NULL). (Georg)</li>
<li><?php bugfix(32947); ?> (Incorrect option for mysqli default password). (Georg)</li>
<li><?php bugfix(32944); ?> (Disabling session.use_cookies doesn't prevent reading
  session cookies). (Jani, Tony)</li>
<li><?php bugfix(32941); ?> (Sending structured SOAP fault kills a php). (Dmitry)</li>
<li><?php bugfix(32936); ?> (http redirects URLs are not checked for control chars). (Ilia)</li>
<li><?php bugfix(32933); ?> (Cannot extend class "SQLiteDatabase"). (Marcus)</li>
<li><?php bugfix(32932); ?> (Oracle LDAP: ldap_get_entries(), invalid pointer). (Jani)</li>
<li><?php bugfix(32930); ?> (class extending DOMDocument doesn't clone properly). (Rob)</li>
<li><?php bugfix(32904); ?> (pg_get_notify() ignores result_type parameter). (Tony)</li>
<li><?php bugfix(32852); ?> (Crash with singleton and __destruct when
  zend.ze1_compatibility_mode = On). (Dmitry)</li>
<li><?php bugfix(32813); ?> (parse_url() does not handle scheme-only urls properly). (Ilia)</li>
<li><?php bugfix(32810); ?> (temporary files not using plain file wrapper). (Ilia)</li>
<li><?php bugfix(32809); ?> (Missing T1LIB support on Windows). (Edin)</li>
<li><?php bugfix(32802); ?> (General cookie overrides more specific cookie). (Ilia)</li>
<li>Fixed bugs <?php bugl(32800); ?>, <?php bugl(32830); ?> (ext/odbc: Problems with 64bit systems). (Jani)</li>
<li><?php bugfix(32799); ?> (crash: calling the corresponding global var during the
  destruct). (Dmitry)</li>
<li><?php bugfix(32776); ?> (SOAP doesn't support one-way operations). (Dmitry)</li>
<li><?php bugfix(32773); ?> (GMP functions break when second parameter is 0). (Stas)</li>
<li><?php bugfix(32759); ?> (incorrect determination of default value (COM)). (Wez)</li>
<li><?php bugfix(32758); ?> (Cannot access safearray properties in VB6 objects). (Wez)</li>
<li><?php bugfix(32755); ?> (Segfault in replaceChild() when DocumentFragment has
  no children). (Rob)</li>
<li><?php bugfix(32753); ?> (Undefined constant SQLITE_NOTADB). (Ilia)</li>
<li><?php bugfix(32742); ?> (segmentation fault when the stream with a wrapper
  is not closed). (Tony, Dmitry)</li>
<li><?php bugfix(32699); ?> (pg_affected_rows() was defined when it was not available).
  (Derick)</li>
<li><?php bugfix(32686); ?> (Require/include file in destructor causes segfault).
  (Marcus)</li>
<li><?php bugfix(32682); ?> (ext/mssql: Error on module shutdown when called from
  activescript). (Frank)</li>
<li><?php bugfix(32674); ?> (exception in iterator causes crash). (Dmitry)</li>
<li><?php bugfix(32660); ?> (Assignment by reference causes crash when field access is
  overloaded (__get)). (Dmitry)</li>
<li><?php bugfix(32647); ?> (Using register_shutdown_function() with invalid callback
  can crash PHP). (Jani)</li>
<li><?php bugfix(32615); ?> (Segfault in replaceChild() using fragment when
  previousSibling is NULL). (Rob)</li>
<li><?php bugfix(32613); ?> (ext/snmp: use of snmp_shutdown() causes snmpapp.conf
  access errors). (Jani, ric at arizona dot edu)</li>
<li><?php bugfix(32608); ?> (html_entity_decode() converts single quotes even if
  ENT_NOQUOTES is given). (Ilia)</li>
<li><?php bugfix(32596); ?> (Segfault/Memory Leak by getClass (etc) in __destruct).
  (Dmitry)</li>
<li><?php bugfix(32591); ?> (ext/mysql: Unsatisfied symbol: ntohs with HP-UX). (Jani)</li>
<li><?php bugfix(32589); ?> (Possible crash inside imap_mail_compose, with charsets).
  (Ilia)</li>
<li><?php bugfix(32587); ?> (Apache2: errors sent to error_log do not include
  timestamps). (Jani)</li>
<li><?php bugfix(32560); ?> (configure looks for incorrect db2 library). (Tony)</li>
<li><?php bugfix(32553); ?> (mmap loads only the 1st 2000000 bytes on Win32). (Ilia)</li>
<li><?php bugfix(32533); ?> (proc_get_status() returns the incorrect process status). (Ilia)</li>
<li><?php bugfix(32530); ?> (chunk_split() does not append endstr if chunklen is
  longer then the original string). (Ilia)</li>
<li><?php bugfix(32491); ?> (File upload error - unable to create a temporary file).
  (Uwe Schindler)</li>
<li><?php bugfix(32405); ?> (mysqli::fetch() returns bad data - 64bit problem). (Andrey)</li>
<li><?php bugfix(32282); ?> (Segfault in mysqli_fetch_array on 64-bit). (Georg)</li>
<li><?php bugfix(32296); ?> (get_class_methods() output has changed between 5.0.2 and
  5.0.3). (Dmitry)</li>
<li><?php bugfix(32245); ?> (xml_parser_free() in a function assigned to the xml parser
  gives a segfault). (Rob)</li>
<li><?php bugfix(32171); ?> (Userspace stream wrapper crashes PHP). (Tony, Dmitry)</li>
<li><?php bugfix(32080); ?> (segfault when assigning object to itself with
  zend.ze1_compatibility_mode=On). (Dmitry)</li>
<li><?php bugfix(32013); ?> (ext/mysqli bind_result causes fatal error: memory
  limit). (Andrey)</li>
<li><?php bugfix(31887); ?> (ISAPI: Custom 5xx error does not return correct HTTP
  response message). (Jani)</li>
<li><?php bugfix(31828); ?> (Crash with zend.ze1_compatibility_mode=On). (Dmitry)</li>
<li><?php bugfix(31668); ?> (multi_query works exactly every other time - multi query
  d/e flag global and not per connection). (Andrey)</li>
<li><?php bugfix(31636); ?> (another crash when echoing a COM object). (Wez)</li>
<li><?php bugfix(31583); ?> (php_std_date() uses short day names in non-y2k_compliance
  mode). (mike at php dot net)</li>
<li><?php bugfix(31525); ?> (object reference being dropped. $this getting lost).
  (Stas, Dmitry)</li>
<li><?php bugfix(31502); ?> (Wrong deserialization from session when using WDDX
  serializer). (Dmitry)</li>
<li><?php bugfix(31465); ?> (False warning in unpack() when working with *). (Ilia)</li>
<li><?php bugfix(31363); ?> (broken non-blocking flock()). ian at snork dot net</li>
<li><?php bugfix(31213); ?> (Sideeffects caused by fix of bug <?php bugl(29493); ?>. (Dmitry)</li>
<li><?php bugfix(31158); ?> (array_splice on $GLOBALS crashes). (Dmitry)</li>
<li><?php bugfix(30961); ?> (Wrong linenumber in ReflectionClass getStartLine()).
  (Dmitry)</li>
<li><?php bugfix(30889); ?> (Conflict between __get/__set and ++ operator). (Dmitry)</li>
<li><?php bugfix(30833); ?> (array_count_values() modifying input array). (Tony)</li>
<li><?php bugfix(30828); ?> (debug_backtrace() reports incorrect class in overridden
  methods). (Dmitry)</li>
<li><?php bugfix(30820); ?> (static member conflict with $this-&gt;member silently
  ignored). (Dmitry)</li>
<li><?php bugfix(30819); ?> (Better support for LDAP SASL bind). (Jani)</li>
<li><?php bugfix(30791); ?> (magic methods (__sleep/__wakeup/__toString) call __call if
  object is overloaded). (Dmitry)</li>
<li><?php bugfix(30707); ?> (Segmentation fault on exception in method). (Stas, Dmitry)</li>
<li><?php bugfix(30702); ?> (cannot initialize class variable from class constant).
  (Dmitry)</li>
<li><?php bugfix(30519); ?> (Interface not existing says Class not found). (Dmitry)</li>
<li><?php bugfix(30394); ?> (Assignment operators yield wrong result with __get/__set).
  (Dmitry)</li>
<li><?php bugfix(30332); ?> (zend.ze1_compatibility_mode isnt fully compatable with
  array_push()). (Dmitry)</li>
<li><?php bugfix(30162); ?> (Catching exception in constructor causes lose of $this).
  (Dmitry)</li>
<li><?php bugfix(30140); ?> (Problem with array in static properties). (Dmitry)</li>
<li><?php bugfix(30126); ?> (Enhancement for error message for abstract classes).
  (Marcus)</li>
<li><?php bugfix(30080); ?> (Passing array or non array of objects). (Dmitry)</li>
<li><?php bugfix(29975); ?> (memory leaks when set_error_handler() is used inside error
  handler). (Tony)</li>
<li><?php bugfix(29971); ?> (variables_order behaviour). (Dmitry)</li>
<li><?php bugfix(29944); ?> (Function defined in switch, crashes). (Dmitry)</li>
<li><?php bugfix(29896); ?> (Backtrace argument list out of sync). (Dmitry)</li>
<li><?php bugfix(29683); ?> (headers_list() returns empty array). (Tony)</li>
<li><?php bugfix(29583); ?> (crash when echoing a COM object). (M.Sisolak, Wez)</li>
<li><?php bugfix(29338); ?> (unencoded spaces get ignored after certain tags). (Ilia)</li>
<li><?php bugfix(29210); ?> (Function: is_callable - no support for private and
  protected classes). (Dmitry)</li>
<li><?php bugfix(29104); ?> (Function declaration in method doesn't work). (Dmitry)</li>
<li><?php bugfix(29015); ?> (Incorrect behavior of member vars(non string ones)-numeric
  mem vars und others). (Dmitry)</li>
<li><?php bugfix(28839); ?> (SIGSEGV in interactive mode (php -a)).
  (kameshj at fastmail dot fm)</li>
<li><?php bugfix(28605); ?> (Need to use -[m]ieee option for Alpha CPUs). (Jani)</li>
<li><?php bugfix(28377); ?> (debug_backtrace is intermittently passing args). (Dmitry)</li>
<li><?php bugfix(27598); ?> (list() array key assignment causes HUGE memory leak).
  (Dmitry)</li>
<li><?php bugfix(26456); ?> (Wrong results from Reflection-API getDocComment() when
  called via STDIN). (Dmitry)</li>
<li><?php bugfix(25922); ?> (In error handler, modifying 5th arg (errcontext) may result
  in seg fault). (Dmitry)</li>
<li><?php bugfix(22836); ?> (returning reference to uninitialized variable). (Dmitry)</li>
<li><?php bugfix(29689); ?> (default value of protected member overrides default value of private)
  and other private variable problems in inherited classes (Stas)</li>
<li><?php bugfix(29253); ?> (array_diff with $GLOBALS argument fails). (Dmitry)</li>
<li>Abstract private methods are no longer allowed (Stas)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.4"><!-- {{{ 5.0.4 -->
<h3>Version 5.0.4</h3>
<?php release_date('31-Mar-2005'); ?>
<ul>
<li>Added SNMPv2 support. (harrie)</li>
<li>Added Oracle Instant Client support. (cjbj at hotmail dot com, Tony)</li>
<li>Added length and charsetnr for field array and object in mysqli. (Georg)</li>
<li>Added checks for negative values to gmp_sqrt(), gmp_powm(), gmp_sqrtrem()
  and gmp_fact() to prevent SIGFPE. (Tony)</li>
<li>Changed foreach() to throw an exception if IteratorAggregate::getIterator()
  does not return an Iterator. (Marcus)</li>
<li>Changed phpize not to require libtool. (Jani)</li>
<li>Updated bundled oniguruma library (used for multibyte regular expression)
  to 3.7.0. (Moriyoshi)</li>
<li>Updated bundled libmbfl library (used for multibyte functions). (Moriyoshi)<br>Fixed bugs:
  <ul>
    <li>Bug <?php bugl(32063); ?> (mb_convert_encoding ignores named entity 'alpha')</li>
    <li>Bug <?php bugl(31911); ?> (mb_decode_mimeheader() is case-sensitive to hex escapes)</li>
    <li>Bug <?php bugl(30573); ?> (compiler warnings in libmbfl due to invalid type cast)</li>
    <li>Bug <?php bugl(30549); ?> (incorrect character translations for some ISO8859 charsets)</li>
  </ul></li>
<li>Fixed bug preventing from building oci8 as shared.
  (stanislav dot voroniy at portavita dot nl, Tony)</li>
<li>Fixed a bug in mysql_affected_rows and mysql_stmt_affected_rows when the
  api function returns -1 (Georg)</li>
<li>Fixed several leaks in ext/browscap and sapi/embed. (Andrei)</li>
<li>Fixed several leaks in ext/filepro. (Tony)</li>
<li>Fixed build system to always use bundled libtool files. (Jani)</li>
<li>Fixed a bug in mysqli_stmt_execute() (type conversion with NULL values).
  (Georg)</li>
<li>Fixed segfault in mysqli_fetch_field_direct() when invalid field offset
  is passed. (Tony)</li>
<li>Fixed posix_getsid() &amp; posix_getpgid() to return sid &amp; pgid instead
  of true. (Tony)</li>
<li><?php bugfix(32394); ?> (offsetUnset() segfaults in a foreach). (Marcus)</li>
<li><?php bugfix(32373); ?> (segfault in bzopen() if supplied path to non-existent
  file). (Tony)</li>
<li><?php bugfix(32326); ?> (Check values of Connection/Transfer-Encoding
  case-incentively in SOAP extension). (Ilia)</li>
<li><?php bugfix(32290); ?> (call_user_func_array() calls wrong class method within
  child class). (Marcus)</li>
<li><?php bugfix(32238); ?> (spl_array.c: void function cannot return value). (Johannes)</li>
<li><?php bugfix(32210); ?> (proc_get_status() sets "running" always to true). (Ilia)</li>
<li><?php bugfix(32200); ?> (Prevent using both --with-apxs2 and --with-apxs2filter).
  (Jani)</li>
<li><?php bugfix(32134); ?> (Overloading offsetGet/offsetSet). (Marcus)</li>
<li><?php bugfix(32130); ?> (ArrayIterator::seek() does not throw an Exception on
  invalid index). (Marcus)</li>
<li><?php bugfix(32115); ?> (dateTime SOAP encoding of timezone incorrect). (Dmitry)</li>
<li><?php bugfix(32081); ?> (in mysqli default socket value is not being used). (Ilia)</li>
<li><?php bugfix(32021); ?> (Crash caused by range('', 'z')). (Derick)</li>
<li><?php bugfix(32011); ?> (Fragments which replaced Nodes are not globaly useable).
  (Rob)</li>
<li><?php bugfix(32001); ?> (xml_parse_into_struct() function exceeds maximum
  execution time). (Rob, Moriyoshi)</li>
<li><?php bugfix(31980); ?> (Unicode exif data not available on Windows). (Edin)</li>
<li><?php bugfix(31792); ?> (getrusage() does not provide ru_nswap value). (Ilia)</li>
<li><?php bugfix(31960); ?> (msql_fetch_row() and msql_fetch_array() dropping columns
  with NULL values). (Daniel Convissor)</li>
<li><?php bugfix(31878); ?> (Segmentation fault using clone keyword on nodes). (Rob)</li>
<li><?php bugfix(31858); ?> (--disable-cli does not force --without-pear). (Jani)</li>
<li><?php bugfix(31842); ?> (*date('r') does not return RFC2822 conforming date string).
  (Jani)</li>
<li><?php bugfix(31832); ?> (SOAP encoding problem with complex types in WSDL mode with
  multiple parts). (Dmitry)</li>
<li><?php bugfix(31797); ?> (exif_read_data() uses too low nesting limit). (Ilia)</li>
<li><?php bugfix(31796); ?> (readline completion handler does not handle empty return
  values). (Ilia)</li>
<li><?php bugfix(31755); ?> (Cannot create SOAP header in no namespace). (Dmitry)</li>
<li><?php bugfix(31754); ?> (dbase_open() fails for mode = 1). (Mehdi, Derick)</li>
<li><?php bugfix(31751); ?> (pg_parameter_status() missing on Windows). (Edin)</li>
<li><?php bugfix(31747); ?> (SOAP Digest Authentication doesn't work with
  "HTTP/1.1 100 Continue" response). (Dmitry)</li>
<li><?php bugfix(31732); ?> (mb_get_info() causes segfault when no parameters
  specified). (Tony)</li>
<li><?php bugfix(31710); ?> (Wrong return values for mysqli_autocommit/commit/rollback).
  (Georg)</li>
<li><?php bugfix(31705); ?> (parse_url() does not recognize http://foo.com#bar). (Ilia)</li>
<li><?php bugfix(31695); ?> (Cannot redefine endpoint when using WSDL). (Dmitry)</li>
<li><?php bugfix(31684); ?> (dio_tcsetattr(): misconfigured termios settings).
  (elod at itfais dot com)</li>
<li><?php bugfix(31683); ?> (changes to $name in __get($name) override future
  parameters). (Dmitry)</li>
<li><?php bugfix(31699); ?> (unserialize() float problem on non-English locales). (Ilia)</li>
<li><?php bugfix(31562); ?> (__autoload() problem with static variables). (Marcus)</li>
<li><?php bugfix(31651); ?> (ReflectionClass::getDefaultProperties segfaults with arrays).
  (Marcus)</li>
<li><?php bugfix(31623); ?> (OCILogin does not support password grace period).
  (daniel dot beet at accuratesoftware dot com, Tony)</li>
<li><?php bugfix(31527); ?> (crash in msg_send() when non-string is stored without
  being serialized). (Ilia)</li>
<li><?php bugfix(31515); ?> (Improve performance of scandir() by factor of 10 or so). (Ilia)</li>
<li><?php bugfix(31514); ?> (open_basedir uses path_translated rather then cwd for .
  translation). (Ilia)</li>
<li><?php bugfix(31480); ?> (Possible infinite loop in imap_mail_compose()). (Ilia)</li>
<li><?php bugfix(31479); ?> (Fixed crash in chunk_split(), when chunklen &gt; strlen). (Ilia)</li>
<li><?php bugfix(31465); ?> (False warning in unpack() when working with *). (Ilia)</li>
<li><?php bugfix(31454); ?> (session_set_save_handler crashes PHP when supplied
  non-existent object ref). (Tony)</li>
<li><?php bugfix(31444); ?> (Memory leak in zend_language_scanner.c).
  (hexer at studentcenter dot org)</li>
<li><?php bugfix(31442); ?> (unserialize broken on 64-bit systems). (Marcus)</li>
<li><?php bugfix(31440); ?> ($GLOBALS can be overwritten via GPC when register_globals
  is enabled). (Ilia)</li>
<li><?php bugfix(31422); ?> (No Error-Logging on SoapServer-Side). (Dmitry)</li>
<li><?php bugfix(31413); ?> (curl POSTFIELDS crashes on 64-bit platforms). (Joe)</li>
<li><?php bugfix(31396); ?> (compile fails with gd 2.0.33 without freetype). (Jani)</li>
<li><?php bugfix(31371); ?> (highlight_file() trims new line after heredoc). (Ilia)</li>
<li><?php bugfix(31361); ?> (simplexml/domxml segfault when adding node twice). (Rob)</li>
<li><?php bugfix(31348); ?> (CachingIterator::rewind() leaks). (Marcus)</li>
<li><?php bugfix(31346); ?> (ArrayIterator::next segfaults). (Marcus)</li>
<li><?php bugfix(31190); ?> (Unexpected warning then exception is thrown from
  call_user_func_array()). (phpbugs at domain51 dot net, Dmitry)</li>
<li><?php bugfix(31142); ?> (imap_mail_compose() fails to generate correct output). (Ilia)</li>
<li><?php bugfix(31139); ?> (XML Parser Functions seem to drop &amp; when parsing). (Rob)</li>
<li><?php bugfix(31398); ?> (When magic_guotes_gpc are enabled filenames with ' get cutoff).
  (Ilia)</li>
<li><?php bugfix(31288); ?> (Possible crash in mysql_fetch_field(), if mysql_list_fields()
  was not called previously). (Ilia)</li>
<li><?php bugfix(31107); ?>, <?php bugfix(31110); ?>, <?php bugfix(31111); ?>, <?php bugfix(31249); ?> (Compile failure of zend_strtod.c).
  (Jani)</li>
<li><?php bugfix(31110); ?> (PHP 4.3.10 does not compile on Tru64 UNIX 5.1B). (Derick)</li>
<li><?php bugfix(31107); ?> (Compile failure on Solaris 9 (Intel) and gcc 3.4.3). (Derick)</li>
<li><?php bugfix(31103); ?> (Better error message when c-client cannot be found). (Ilia)</li>
<li><?php bugfix(31101); ?> (missing kerberos header file path with --with-openssl). (Jani)</li>
<li><?php bugfix(31098); ?> (isset() / empty() incorrectly return true in dereference of
  a string type). (Moriyoshi)</li>
<li><?php bugfix(31087); ?> (broken php_url_encode_hash macro). (Ilia)</li>
<li><?php bugfix(31072); ?> (var_export() does not output an array element with an empty
  string key). (Derick)</li>
<li><?php bugfix(31060); ?> (imageftbbox() does not use linespacing parameter). (Jani)</li>
<li><?php bugfix(31056); ?> (php_std_date() returns invalid formatted date if
  y2k_compliance is On). (Ilia)</li>
<li><?php bugfix(31055); ?> (apache2filter: per request leak proportional to the full
  path of the request URI). (kameshj at fastmail dot fm)</li>
<li><?php bugfix(30901); ?> (can't send cookies with soap envelop). (Dmitry)</li>
<li><?php bugfix(30871); ?> (Misleading warning message for array_combine()). (Andrey)</li>
<li><?php bugfix(30868); ?> (evaluated pointer comparison in mbregex causes compile
  failure). (Moriyoshi)</li>
<li><?php bugfix(30862); ?> (Static array with boolean indexes). (Marcus)</li>
<li><?php bugfix(30726); ?> (-.1 like numbers are not being handled correctly). (Ilia)</li>
<li><?php bugfix(30725); ?> (PHP segfaults when an exception is thrown in getIterator()
  within foreach). (Marcus)</li>
<li><?php bugfix(30609); ?> (cURL functions bypass open_basedir). (Jani)</li>
<li><?php bugfix(30446); ?> (apache2handler: virtual() includes files out of sequence)</li>
<li><?php bugfix(30430); ?> (odbc_next_result() doesn't bind values and that results
  in segfault). (pdan-php at esync dot org, Tony)</li>
<li><?php bugfix(30266); ?> (Invalid opcode 137/1/8). (Marcus)</li>
<li><?php bugfix(30120); ?> (imagettftext() and imagettfbbox() accept too many
  parameters). (Jani)</li>
<li><?php bugfix(30106); ?> (SOAP cannot not parse 'ref' element. Causes Uncaught
  SoapFault exception). (Dmitry)</li>
<li><?php bugfix(29989); ?> (type re_registers redefined in oniguruma.h). (Moriyoshi)</li>
<li><?php bugfix(28803); ?> (enabled debug causes bailout errors with CLI on AIX
  because of fflush() called on already closed filedescriptor). (Tony)</li>
<li><?php bugfix(29767); ?> (Weird behaviour of __set($name, $value)). (Dmitry)</li>
<li><?php bugfix(29733); ?> (printf() handles repeated placeholders wrong).
  (bugs dot php dot net at bluetwanger dot de, Ilia)</li>
<li><?php bugfix(29424); ?> (width and height inverted for JPEG2000 files). (Ilia)</li>
<li><?php bugfix(29329); ?> (configure for mysqli with shared doesn't work). (Georg)</li>
<li><?php bugfix(29136); ?> (make test libtool failure on MacOSX). (Jani)</li>
<li><?php bugfix(28976); ?> (mail(): use "From:" from headers if sendmail_from is empty).
  (Jani)</li>
<li><?php bugfix(28930); ?> (PHP sources pick wrong header files generated by bison).
  (eggert at gnu dot org, Jani)</li>
<li><?php bugfix(28840); ?> (__destruct of a class that extends mysqli not called).
  (Marcus)</li>
<li><?php bugfix(28804); ?> (ini-file section parsing pattern is buggy).
  (wendland at scan-plus dot de)</li>
<li><?php bugfix(28451); ?> (corrupt EXIF headers have unlimited recursive IFD directory
  entries). (Andrei)</li>
<li><?php bugfix(28444); ?> (Cannot access undefined property for object with overloaded
  property access). (Dmitry)</li>
<li><?php bugfix(28442); ?> (Changing a static variables in a class changes it across
  sub/super classes.) (Marcus)</li>
<li><?php bugfix(28324); ?> (HTTP_SESSION_VARS appear when register_long_arrays is
  Off). (Tony)</li>
<li><?php bugfix(28074); ?> (FastCGI: stderr should be written in a FCGI stderr stream).
  (chris at ex-parrot dot com)</li>
<li><?php bugfix(28067); ?> (partially incorrect utf8 to htmlentities mapping). (Derick,
  Benjamin Greiner)</li>
<li><?php bugfix(28041); ?> (SOAP HTTP Digest Access Authentication). (Dmitry)</li>
<li><?php bugfix(27633); ?> (Double \r problem on ftp_get in ASCII mode on Win32). (Ilia)</li>
<li><?php bugfix(18613); ?> (Multiple OUs in x509 certificate not handled properly).
  (Jani)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.3"><!-- {{{ 5.0.3 -->
<h3>Version 5.0.3</h3>
<?php release_date('15-Dec-2004'); ?>
<ul>
<li>Added the %F modifier to *printf to render a non-locale-aware representation of a float with the . as decimal seperator. (Derick)</li>
<li>Fixed error handling in mysqli_multi_query. (Georg)</li>
<li>Extended the functionality of is_subclass_of() to accept either a class name or an object as first parameter. (Andrey)</li>
<li>Fixed potential problems with unserializing invalid serialize data. (Marcus)</li>
<li><?php bugfix(31034); ?> (Problem with non-existing iconv header file). (Derick) </li>
<li><?php bugfix(30995); ?> (snmp extension does not build with net-snmp 5.2). (Ilia) </li>
<li><?php bugfix(30994); ?> (SOAP server unable to handle request with references).  (Dmitry) </li>
<li><?php bugfix(30990); ?> (allow popen() on *NIX to accept 'b' flag). (Ilia) </li>
<li><?php bugfix(30967); ?> (properties in extended mysqli classes don't work). (Georg) </li>
<li><?php bugfix(30928); ?> (When Using WSDL, SoapServer doesn't handle private or protected properties). (Dmitry) </li>
<li><?php bugfix(30922); ?> (reflective functions crash PHP when interfaces extend themselves). (Tony, Dmitry) </li>
<li><?php bugfix(30904); ?> (segfault when recording soapclient into session). (Tony, Dmitry) </li>
<li><?php bugfix(30890); ?> (MySQLi testsuite) </li>
<li><?php bugfix(30856); ?> (ReflectionClass::getStaticProperties segfaults). (Marcus) </li>
<li><?php bugfix(30832); ?> ("!" stripped off comments in xml parser). (Rob) </li>
<li><?php bugfix(30799); ?> (SoapServer doesn't handle private or protected properties).  (Dmitry) </li>
<li><?php bugfix(30783); ?> (Apache crash when using ReflectionFunction:: getStaticVariables()). (Marcus) </li>
<li><?php bugfix(30750); ?> (Meaningful error message when upload directory is not accessible). (Ilia) </li>
<li><?php bugfix(30685); ?> (Malformed SOAPClient http header reequest). (Dmitry) </li>
<li><?php bugfix(30672); ?> (Problem handling exif data in jpeg images at unusual places). (Marcus) </li>
<li><?php bugfix(30658); ?> (Ensure that temporary files created by GD are removed).  (Ilia) </li>
<li><?php bugfix(30645); ?> (def. multi result set support for mysql_connect). (Georg) </li>
<li><?php bugfix(30637); ?> (compile with pear error). (Antony) </li>
<li><?php bugfix(30587); ?> (array_multisort doesn't separate zvals before changing them). (Tony) </li>
<li><?php bugfix(30572); ?> (crash when comparing SimpleXML attribute to a boolean).  (Andi) </li>
<li><?php bugfix(30566); ?> (attribute namespace URIs are inconsistent when parsing).  (Rob) </li>
<li><?php bugfix(30490); ?> (PEAR installation fails). (Antony) </li>
<li><?php bugfix(30475); ?> (curl_getinfo() may crash in some situations). (Ilia) </li>
<li><?php bugfix(30442); ?> (segfault when parsing ?getvariable[][ ). (Tony) </li>
<li><?php bugfix(30388); ?> (rename across filesystems loses ownership and permission info). (Tony) </li>
<li><?php bugfix(30387); ?> (stream_socket_client async connect was broken).  (vnegrier at esds dot com, Wez).  </li>
<li><?php bugfix(30381); ?> (Strange results with get_class_vars()). (Marcus) </li>
<li><?php bugfix(30375); ?> (cal_info() does not work without a parameter). (Ilia) </li>
<li><?php bugfix(30362); ?> (stream_get_line() not handling end string correctly).  (Ilia) </li>
<li><?php bugfix(30359); ?> (SOAP client requests have no port in "Host" field).  (Dmitry) </li>
<li><?php bugfix(30356); ?> (str_ireplace() does not work on all strings). (Ilia) </li>
<li><?php bugfix(30344); ?> (Reflection::getModifierNames() returns too long strings).  (Marcus) </li>
<li><?php bugfix(30329); ?> (Error Fetching http body, No Content-Length, connection closed or chunked data). (Dmitry) </li>
<li><?php bugfix(30282); ?> (segfault when using unknown/unsupported session.save_handler and/or session.serialize_handler). (Tony) </li>
<li><?php bugfix(30281); ?> (Prevent non-wbmp images from being detected as such).  (Ilia) </li>
<li><?php bugfix(30276); ?> (Possible crash in ctype_digit on large numbers). (Ilia) </li>
<li><?php bugfix(30230); ?> (exception handler not working with objects). (Marcus) </li>
<li><?php bugfix(30224); ?> (Sybase date strings are sometimes not null terminated).  (Ilia) </li>
<li><?php bugfix(30175); ?> (SOAP results aren't parsed correctly). (Dmitry) </li>
<li><?php bugfix(30147); ?> (OO sqlite_fetch_object did not reset error handler). (Wez) </li>
<li><?php bugfix(30133); ?> (get_current_user() crashes on Windows). (Edin) </li>
<li><?php bugfix(30061); ?> (xml_set_start_namespace_decl_handler not called). (Rob) </li>
<li><?php bugfix(30057); ?> (did not detect IPV6 on FreeBSD 4.1). (Wez) </li>
<li><?php bugfix(30042); ?> (strtotime does not use second param). (Derick) </li>
<li><?php bugfix(30027); ?> (Possible crash inside ftp_get()).  (cfield at affinitysolutions dot com) </li>
<li><?php bugfix(29954); ?> (array_reduce segfaults when initial value is array). (Tony) </li>
<li><?php bugfix(29883); ?> (isset gives invalid values on strings). (Tony, Dmitry) </li>
<li><?php bugfix(29801); ?> (Set limit on the size of mmapable data). (Ilia) </li>
<li><?php bugfix(29557); ?> (strtotime error). (Derick) </li>
<li><?php bugfix(29418); ?> (double free when openssl_csr_new fails).  (Kamesh Jayachandran).  </li>
<li><?php bugfix(29385); ?> (Soapserver always uses std class). (David, Dmitry) </li>
<li><?php bugfix(29211); ?> (SoapClient doesn't request wsdl through proxy). (Rob) </li>
<li><?php bugfix(28817); ?> (Var problem when extending domDocument). (Georg) </li>
<li><?php bugfix(28599); ?> (strtotime fails with zero base time). (Derick) </li>
<li><?php bugfix(28598); ?> (Lost support for MS Symbol fonts). (Pierre) </li>
<li><?php bugfix(28220); ?> (mb_strwidth() returns wrong width values for some hangul characters). (Moriyoshi) </li>
<li><?php bugfix(28228); ?> (NULL decimal separator is not being handled correctly).  (Ilia) </li>
<li><?php bugfix(28209); ?> (strtotime("now")). (Derick) </li>
<li><?php bugfix(27798); ?> (private / protected variables not exposed by get_object_vars() inside class). (Marcus) </li>
<li><?php bugfix(27728); ?> (Can't return within a zend_try {} block or the previous bailout state isn't restored. (Andi) </li>
<li><?php bugfix(27183); ?> (Userland stream wrapper segfaults on stream_write).  (Christian) </li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.2"><!-- {{{ 5.0.2 -->
<h3>Version 5.0.2</h3>
<?php release_date('23-Sep-2004'); ?>
<ul>
<li> Added new boolean (fourth) parameter to array_slice() that turns on the preservation of keys in the returned array. (Derick) </li>
<li> Added the sorting flag SORT_LOCALE_STRING to the sort() functions which makes them sort based on the current locale. (Derick) </li>
<li> Added interface_exists() and make class_exists() only return true for real classes. (Andrey) </li>
<li> Added PHP_EOL constant that contains the OS way of representing newlines.  (Paul Hudson, Derick) </li>
<li> Implemented periodic PCRE compiled regexp cache cleanup, to avoid memory exhaustion. (Andrei) </li>
<li> Renamed SoapClient-&gt;__call() to SoapClinet-&gt;__soapCall(). (Dmitry) </li>
<li> Fixed bug with raw_post_data not getting set (Brian) </li>
<li> Fixed a file-descriptor leak with phpinfo() and other 'special' URLs (Zeev) </li>
<li> <?php bugfix(30209); ?> (ReflectionClass::getMethod() lowercases attribute).  (Marcus) </li>
<li> <?php bugfix(30182); ?> (SOAP module processing WSDL file dumps core). (Dmitry) </li>
<li> <?php bugfix(30045); ?> (Cannot pass big integers (&gt; 2147483647) in SOAP requests).  (Dmitry) </li>
<li> <?php bugfix(29985); ?> (unserialize()/ __PHP_Incomplete_class does not report correctly class name). (Marcus, Tony) </li>
<li> <?php bugfix(29945); ?> (simplexml_load_file URL limitation 255 char). (Rob) </li>
<li> <?php bugfix(29873); ?> (No defines around pcntl_*priority definitions). (Derick) </li>
<li> <?php bugfix(29844); ?> (SOAP doesn't return the result of a valid SOAP request).  (Dmitry) </li>
<li> <?php bugfix(29842); ?> (soapclient return null value). (Dmitry) </li>
<li> <?php bugfix(29839); ?> (incorrect convert (xml:lang to lang)). (Dmitry) </li>
<li> <?php bugfix(29830); ?> (SoapServer::setClass() should not export non-public methods). (Dmitry) </li>
<li> <?php bugfix(29828); ?> (Interfaces no longer work). (Marcus) </li>
<li> <?php bugfix(29821); ?> (Fixed possible crashes in convert_uudecode() on invalid data). (Ilia) </li>
<li> <?php bugfix(29808); ?> (array_count_values() breaks with numeric strings). (Ilia) </li>
<li> <?php bugfix(29805); ?> (HTTP Authentication Issues). (Uwe Schindler) </li>
<li> <?php bugfix(29795); ?> (SegFault with Soap and Amazon's Web Services). (Dmitry) </li>
<li> <?php bugfix(29737); ?> (ip2long should return -1 if IP is 255.255.255.255 and FALSE on error). (Tony) </li>
<li> <?php bugfix(29711); ?> (Changed ext/xml to default to UTF-8 output). (Rob) </li>
<li> <?php bugfix(29678); ?> (opendir() with ftp:// wrapper segfaults if path does not have trailing slash). (Ilia) </li>
<li> <?php bugfix(29657); ?> (xml_* functions throw non descriptive error).  (Christian, Rob) </li>
<li> <?php bugfix(29656); ?> (segfault on result and statement properties). (Georg) </li>
<li> <?php bugfix(29566); ?> (foreach/string handling strangeness (crash)). (Dmitry) </li>
<li> <?php bugfix(29447); ?> (Reflection API issues). (Marcus) </li>
<li> <?php bugfix(29296); ?> (Added sslv2 and sslv3 transports). (Wez) </li>
<li> <?php bugfix(29283); ?> (Invalid statement handle in mysqli on execute). (Georg) </li>
<li> <?php bugfix(29913); ?> (parse_url() is now binary safe). (Ilia) </li>
<li> <?php bugfix(27994); ?> (segfault with Soapserver when WSDL-Cache is enabled).  (Dmitry) </li>
<li> <?php bugfix(27791); ?> (Apache 2.0 SAPI build against Apache 2 HEAD). (Joe Orton, Derick) </li>
<li> <?php bugfix(26737); ?> (private/protected properties not serialized when user declared method __sleep() exists). E_NOTICE thrown when __sleep() returns name of non-existing member. (Andrey, Curt)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.1"><!-- {{{ 5.0.1 -->
<h3>Version 5.0.1</h3>
<?php release_date('12-Aug-2004'); ?>
<ul>
<li> Changed destructor mechanism so that destructors are called prior to request shutdown. (Marcus) </li>
<li> Rewritten UNIX and Windows install help files. (Documentation Team) </li>
<li> Updated several libraries bundled with the windows release which now includes libxml2-2.6.11, libxslt-1.1.7 and iconv-1.9.1. (Rob, Edin) </li>
<li> Improved and moved ActiveScript SAPI to PECL.  (Wez) </li>
<li> Fixed unloading of dynamically loaded extensions.  (Marcus, kameshj at fastmail dot fm) </li>
<li> Fixed ReflectionClass::getMethod() and ReflectionClass::getProperty() to raise an ReflectionException instead of returning NULL on failure.  (Sebastian) </li>
<li> Fixed convert.* filters to consume remaining buckets_in on flush. (Sara) </li>
<li> Fixed bug in mysqli-&gt;client_version. (Georg) </li>
<li><?php bugfix(29606); ?> (php_strip_whitespace() prints to stdout rather then returning the value). (Ilia) </li>
<li><?php bugfix(29577); ?> (MYSQLI_CLIENT_FOUND_ROWS undefined) (Georg) </li>
<li><?php bugfix(29573); ?> (Segmentation fault, when exception thrown within PHP function called from XSLT). (Christian) </li>
<li><?php bugfix(29522); ?> (accessing properties without connection) (Georg) </li>
<li><?php bugfix(29505); ?> (get_class_vars() severely broken when used with arrays).  (Marcus) </li>
<li><?php bugfix(29490); ?> (.Net object instantiation failed). (Michael Sisolak).  </li>
<li><?php bugfix(29474); ?> (win32: usleep() doesn't work). (Wez) </li>
<li><?php bugfix(29449); ?> (win32: feof() hangs on empty tcp stream). (Wez) </li>
<li><?php bugfix(29437); ?> (Possible crash inside array_walk_recursive()). (Ilia) </li>
<li><?php bugfix(29431); ?> (crash when parsing invalid address; invalid address returned by stream_socket_recvfrom(), stream_socket_getname()). (Wez) </li>
<li><?php bugfix(29409); ?> (Segfault in PHP functions called from XSLT). (Rob) </li>
<li><?php bugfix(29395); ?> (sqlite_escape_string() returns bogus data on empty strings). (Ilia, Tony) </li>
<li><?php bugfix(29392); ?> (com_dotnet crashes when echo'ing an object). (Wez) </li>
<li><?php bugfix(29368); ?> (The destructor is called when an exception is thrown from the constructor). (Marcus) </li>
<li><?php bugfix(29354); ?> (Exception constructor marked as both public and protected).  (Marcus) </li>
<li><?php bugfix(29342); ?> (strtotime() does not handle empty date string properly).  (Ilia) </li>
<li><?php bugfix(29340); ?> (win32 build produces invalid php_ifx.dll). (Edin) </li>
<li><?php bugfix(29335); ?> (fetch functions now use MYSQLI_BOTH as default) (Georg) </li>
<li><?php bugfix(29291); ?> (get_class_vars() return names with NULLs). (Marcus) </li>
<li><?php bugfix(29264); ?> (gettext extension not working). (Edin) </li>
<li><?php bugfix(29258); ?> (variant_date_from_timestamp() does not honour timezone).  (Wez) </li>
<li><?php bugfix(29256); ?> (error when sending large packets on a socket). (Dmitry) </li>
<li><?php bugfix(29236); ?> (memory error when wsdl-cache is enabled). (Dmitry) </li>
<li><?php bugfix(29147); ?> (Compile Error in mnoGoSearch functions). (Sergey, Antony) </li>
<li><?php bugfix(29132); ?> ($_SERVER["PHP_AUTH_USER"] isn't defined). (Stefan) </li>
<li><?php bugfix(29119); ?> (html_entity_decode() misbehaves with UTF-8). (Moriyoshi) </li>
<li><?php bugfix(29109); ?> (SoapFault exception: [WSDL] Out of memory). (Dmitry) </li>
<li><?php bugfix(29061); ?> (soap extension segfaults). (Dmitry) </li>
<li><?php bugfix(28985); ?> (__getTypes() returning nothing on complex WSDL). (Dmitry) </li>
<li><?php bugfix(28969); ?> (Wrong data encoding of special characters). (Dmitry) </li>
<li><?php bugfix(28895); ?> (ReflectionClass::isAbstract always returns false). (Marcus) </li>
<li><?php bugfix(28829); ?> (Thread-unsafety in bcmath elementary values). (Sara) </li>
<li><?php bugfix(28464); ?> (catch() does not catch exceptions by interfaces). (Marcus) </li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.0"><!-- {{{ 5.0.0 -->
<h3>Version 5.0.0</h3>
<?php release_date('13-Jul-2004'); ?>
<ul>
<li>Updated PCRE to provide better error handling in certain cases. (Andrei)</li>
<li>Changed doc comments to require a single white space after '/**'. (Marcus)</li>
<li>Fixed strip_tags() to correctly handle '\0' characters. (Stefan)</li>
<li><?php bugfix(29019); ?> (Database not closing). (Marcus)</li>
<li><?php bugfix(29008); ?> (array_combine() does not handle non-numeric/string keys). (Ilia)</li>
<li><?php bugfix(28999); ?> (fixed behaviour of exec() to work as it did in 4.X). (Ilia)</li>
<li><?php bugfix(28895); ?> (ReflectionClass::isAbstract always returns false). (Marcus)</li>
<li><?php bugfix(28868); ?> (Internal filter registry not thread safe). (Sara)</li>
<li><?php bugfix(28851); ?> (call_user_func_array has typo in error message). (Marcus)</li>
<li><?php bugfix(28831); ?> (ArrayObject::offsetGet() does the work of offsetUnset()). (Marcus)</li>
<li><?php bugfix(28822); ?> (ArrayObject::offsetExists() works inverted). (Marcus)</li>
<li><?php bugfix(28789); ?> (ReflectionProperty getValue() fails on public static members). (Marcus)</li>
<li><?php bugfix(28771); ?> (Segfault when using xslt and clone). (Rob)</li>
<li><?php bugfix(28751); ?> (SoapServer does not call _autoload()). (Dmitry)</li>
<li><?php bugfix(28739); ?> (array_*diff() and array_*intersect() not clearing the fci cache before work). (Andrey)</li>
<li><?php bugfix(28721); ?> (appendChild() and insertBefore() unset DOMText).(Rob)</li>
<li><?php bugfix(28702); ?> (SOAP does not parse WSDL service address correctly). (Dmitry)</li>
<li><?php bugfix(28699); ?> (Reflection api bugs). (Marcus)</li>
<li><?php bugfix(28694); ?> (ReflectionExtension::getFunctions() crashes PHP). (Marcus)</li>
<li><?php bugfix(28512); ?> (Allocate enough space to store MSSQL data). (Frank)</li>
<li><?php bugfix(28325); ?> (Circular references not properly serialised). (Moriyoshi)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.0RC3"><!-- {{{ 5.0.0RC3 -->
<h3>Version 5.0.0 Release Candidate 3</h3>
<?php release_date('08-Jun-2004'); ?>
<ul>
<li>Moved the PDFLib extension to PECL. (Wez)</li>
<li>Added MySQL 4.1.2-alpha and 4.1.3-beta support to MySQLI extension. (Georg)</li>
<li>Added support for dumping private/protected properties to var_dump().  (Andrey)</li>
<li>Added count() support for COM arrays. (Wez)</li>
<li>Added Firebird/InterBase UDF source that allows PHP functions to be called from SQL (Ard)</li>
<li>Changed user error handler mechanism to relay to built-in error handler if it returns false. (Andrei) </li>
<li>Changed class type hints for function parameters to not allow the passing of NULL values. (Andi)</li>
<li>Changed tidy_node to tidyNode and removed tidy_exception. (John)</li>
<li>Fixed ip2long() to return FALSE if an IP address passed to this function is not valid. (Derick)</li>
<li>Fixed memory leak in memory manager. (Andi)</li>
<li>Fixed problem with exceptions returning from include(). (Dmitry)</li>
<li><?php bugfix(28641); ?> (Instance of Interface). (Marcus)</li>
<li><?php bugfix(28430); ?> (Extending mysqli class). (Georg)</li>
<li><?php bugfix(28311); ?> (Transparency detection code is off by 1). (Ilia, pikeman at pikeman dot sytes dot net)</li>
<li><?php bugfix(28304); ?> (Missing bounds check inside imagefilter()). (Ilia)</li>
<li><?php bugfix(28300); ?> (Userspace stream/filter names forced to lowercase). (Sara)</li>
<li><?php bugfix(28287); ?> (stream_*_register() not calling __autoload()). (Sara)</li>
<li><?php bugfix(28267); ?> (php_image_filter_contrast calls gdImageBrightness). (Ilia)</li>
<li><?php bugfix(28239); ?> (No results returned on SOAP call, no error given). (Dmitry)</li>
<li><?php bugfix(28205); ?> (num_rows property for statement object). (Georg)</li>
<li><?php bugfix(28161); ?> (COM: Array style properties could not be accessed). (Wez)</li>
<li><?php bugfix(28125); ?> (ArrayObject leaks when accessing elements). (Marcus)</li>
<li><?php bugfix(28100); ?> (NULL parameter support for mysqli_ssl_set). (Georg)</li>
<li><?php bugfix(28099); ?> (ArrayObject doesn't implement ArrayAccess). (Marcus)</li>
<li><?php bugfix(27929); ?> (SPL: change visibility of ArrayIterator::__construct). (Marcus)</li>
<li><?php bugfix(27640); ?> (memory leak of registered_zend_ini_directives).  (Dmitry)</li>
<li><?php bugfix(27063); ?> (SPL: ArrayObject does not handle PPP correctly). (Marcus)</li>
</ul>


<!-- }}} --></section>

<section class="version" id="5.0.0RC2"><!-- {{{ 5.0.0RC2 -->
<h3>Version 5.0.0 Release Candidate 2</h3>
<?php release_date('25-Apr-2004'); ?>
<ul>
<li> Implementing an interface/abstract method with the wrong prototype is now
  a fatal error. (Zeev)
</li>
<li> Reimplemented zend.ze1_compatibility_mode to have better PHP 4 compliance.
  (Dmitry, Andi)
</li>
<li> Under CLI, fclose() on php://stdin, php://stdout and php://stderr will now
  close the real stream.  Please update your CLI scripts to use STDIN, STDOUT
  and STDERR constants instead of fopen()/fclose(). (Wez)
</li>
<li> Moved yaz extension to PECL. (Wez)
</li>
<li> Added pty support to proc_open(). (Wez)
</li>
<li> Added possibility to check in which extension an internal class was defined
  in using reflection API. (Marcus)
</li>
<li> Changed tidy error handling to no longer use exceptions and
  renamed the "error_buf" property to errorBuffer. (John)
</li>
<li> Changed class and method names to use studlyCaps convention. (Marcus)
</li>
<li> Changed language parser to throw errors when a non-empty signature is used in
  a destructor definition. (Marcus)
</li>
<li> Changed HTTP file uploads not to throw E_WARNINGs and E_NOTICEs. The error
  value in the $_FILES global should be used for error handling. (Derick)
</li>
<li> Changed __construct() to always take precedence over old style constructor.
  (Dmitry)
</li>
<li> Fixed handling of return values from storred procedures in mssql_execute()
  with multiple result sets returned. (Frank)
</li>
<li> <?php bugfix(28096); ?> (stream_socket_accept() doesn't work with ssl). (Wez)
</li>
<li> <?php bugfix(28007); ?> (compile mssql extension with old versions of FreeTDS
  fails). (Frank)
</li>
<li> <?php bugfix(27997); ?> (SPL: Crash with getInnerIterator()). (Marcus)
</li>
<li> <?php bugfix(27974); ?> (COM doesn't pass array parameters). (Wez)
</li>
<li> <?php bugfix(27928); ?> (sqlite incorrectly handles invalid filenames). (Ilia)
</li>
<li> <?php bugfix(27923); ?> (in some cases using foreach() to iterate over values
  led to a false error message about the key being a reference). (Adam)
</li>
<li> <?php bugfix(27865); ?> (STDIN, STDOUT, STDERR are dup()d under CLI). (Wez)
</li>
<li> <?php bugfix(27821); ?> (xml_parse() segfaults when xml_set_object() is called from
  class method). (Andi, Rob)
</li>
<li> <?php bugfix(27742); ?> (WDSL SOAP Parsing Schema bug). (Dmitry)
</li>
<li> <?php bugfix(27722); ?> (Segfault on schema without targetNamespace). (Dmitry)
</li>
<li> <?php bugfix(27719); ?> (mktime issues on and around DST changeover). (Rasmus)
</li>
<li> <?php bugfix(27681); ?> (soap extension fails without HAVE_TM_GMTOFF). (Dmitry)
</li>
<li> <?php bugfix(27641); ?> (Object cloning in ze1_compatibility_mode was reimplemented)
  (Dmitry, Andi)
</li>
<li> <?php bugfix(27628); ?> (Simplify the process of making a POST request via stream
  context). (Ilia)
</li>
<li> <?php bugfix(27619); ?> (filters not applied to pre-buffered stream data). (Sara)
</li>
<li> <?php bugfix(27519); ?> (Reflection_Function constructor crashes with non-existant
  function's name). (Marcus)
</li>
<li> <?php bugfix(27469); ?> (serialize() objects of incomplete class). (Dmitry)
</li>
<li> <?php bugfix(27457); ?> (handling of numeric indexes in strtr()). (Dmitry)
</li>
<li> <?php bugfix(27397); ?> (debug_backtrace() not showing function arguments). (Zeev)
</li>
<li> <?php bugfix(27283); ?> (The last catch statement was sometimes skipped). (Andi)
</li>
<li> <?php bugfix(26441); ?> (When __set() returned a value it corrupted it). (Andi)
</li>
<li> <?php bugfix(19749); ?> (shouldn't mmap() files larger than memory_limit). (Wez)
</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.0RC1"><!-- {{{ 5.0.0RC1 -->
<h3>Version 5.0.0 Release Candidate 1</h3>
<?php release_date('18-Mar-2004'); ?>
<ul>
<li>Fixed numerous bugs with the just-in-time auto-global initialization, that
  could cause $_SERVER, $argv/$argc and other variables not to work properly.
  (Zeev)
</li>
<li>Fixed data corruption with constant assignments to object properties. (Zeev)
</li>
<li>Changed __toString() to be called automatically only with print and echo
  statements. (Andi)
</li>
<li>Replaced the exec_finished hook by the zend_post_deactive hook for
  extensions. The new hook will be run after the symbol table and destructors
  are run. (Derick)
</li>
<li>Fixed possible crash when internal get_method() is not defined. (Andi)
</li>
<li>Fixed calling methods using call_user_func() in conjunction with
  the array("Class","Method") syntax to use the scope of the PHP user function.
  (Dmitry)
</li>
<li>Fixed php-cgi to not ignore command-line switches when run in a web context.
  This fixes our test cases allowing INI with GET sections to work. (Rasmus)
</li>
<li>Fixed getopt() so it works without $_SERVER. (Rasmus, bfrance)
</li>
<li>Added support for PHP 4 style object comparisons which is enabled in
  ze1_compatiblity_mode. (Andi)
</li>
<li>Added support for PHP 4 style object conversion to long, double, and boolean
  values which is enabled in ze1_compatibility_mode. (Andi, Stas)
</li>
<li>Allow object oriented extensions to overload comparison functions and other
  operations. Solves problems using SimpleXML values. (Andi, Zeev)
</li>
<li>Fixed crash when accessing a class constant with a value which in turn is
  also a constant. (Dmitry)
</li>
<li>Fixed object's truth value conversion. It is always true unless
  ze1_compatibility_mode is on in which it behaves like in PHP 4. (Stas)
</li>
<li>Improved out of memory handling in new memory manager. (Stas)
</li>
<li>Fixed crash when an object references itself during destructor call. (Andi)
</li>
<li>Fixed crash in foreach() when iterating over object properties or a method's
  return values. (Andi)
</li>
<li>Fixed crash when an exception is thrown in a destructor. Such exceptions are
  now ignored as destruction happens out of context at no definite time. (Andi)
</li>
<li>Fixed crashes in exception handling. (Dmitry, Andi)
</li>
<li>Changed prototype checks so that they aren't done on constructors. (Andi)
</li>
<li>Changed prototype checks to output an E_STRICT message instead of
  an E_COMPILE_ERROR. (Andi)
</li>
<li>Changed Iterator::has_more() to Iterator::valid(). (Marcus)
</li>
<li>Upgraded bundled oniguruma library to version 2.2.2. (Rui, Moriyoshi)
</li>
<li>Added mb_list_encoding() to return an array with all mbstring supported
  encodings. (Derick)
</li>
<li>Added support for more ISO8601 datetime formats in strtotime(). (Moriyoshi)
	<ul>
		<li>Timezone specifier (ex. "20040301T02:00:00+19:00")</li>
		<li>Week specifier (ex. "1997W021")</li>
	</ul>
</li>
<li>Renamed php.ini option "zend2.implicit_clone" to
  "zend.ze1_compatibility_mode" as it doesn't only affect implicit cloning.
  (Andi, Zeev)
</li>
<li>Methods that override parent methods are now subject to prototype checking,
  and have to be compatible with the method they're overriding - this check is
  disabled in compatibility mode. (Andi, Zeev)
</li>
<li>Fixed crash in php_ini_scanned_files() when no additional INI files were
  actually parsed. (Jon)
</li>
<li>Fixed bug in gdImageFilledRectangle in the bundled GD library, that required
  x1 &lt; x2 and y1 &lt; y2 for coordinates. (Derick)
</li>
<li>Fixed crash with foreach() and temporary objects($obj-&gt;method()-&gt;a ...) where
  method returns a non-referenced object. (Andi, Zeev)
</li>
<li>Fixed problem preventing startup errors from being displayed. (Marcus)
</li>
<li>Fixed start-up problem if both SPL and SimpleXML were enabled. The double
  initialization of apache 1.3 was causing problems here. (Marcus, Derick)
</li>
<li><?php bugfix(27606); ?> (Expression must be a modifiable lvalue compiler error).
  (Derick)
</li>
<li><?php bugfix(27597); ?> (pg_fetch_array not returning false). (Marcus)
</li>
<li><?php bugfix(27586); ?> (ArrayObject::getIterator crashes with [] assignment).
  (Marcus)
</li>
<li><?php bugfix(27537); ?> (Objects pointing to each other segfaults). (Dmitry)
</li>
<li><?php bugfix(27535); ?> (Problem with object freeing mechanism). (Dmitry)
</li>
<li><?php bugfix(27504); ?> (Visibility bugs in call_user_function()). (Dmitry)
</li>
<li><?php bugfix(27457); ?> (handling of numeric indexes in strtr()). (Dmitry)
</li>
<li><?php bugfix(27338); ?> (memory leak inside tsrm_virtual_cwd.c on win32). (Ilia)
</li>
<li><?php bugfix(27291); ?> (get_browser matches browscap.ini patterns incorrectly).
  (Jay)
</li>
<li><?php bugfix(27287); ?> (wddx segfaults during deserialization). (Moriyoshi)
</li>
<li><?php bugfix(27263); ?> (session extension crashes when unserializing referenced
  values / objects). (Moriyoshi)
</li>
<li><?php bugfix(27237); ?> (Working with simplexml crashes apache2). (Rob)
</li>
<li><?php bugfix(27227); ?> (Mixed case class names causes Fatal Error in Constructor
  call). (Marcus)
</li>
<li><?php bugfix(27125); ?> (strval() doesn't work for objects with __toString()).
  (Marcus)
</li>
<li><?php bugfix(27123); ?> (Fix crash caused by bug in get_object_vars()). (Andi)
</li>
<li><?php bugfix(26677); ?> (mbstring compile errors with IRIX compiler).
  (K.Kosako &lt;kosako at sofnec dot co dot jp&gt;, Rui, Moriyoshi)
</li>
<li><?php bugfix(26206); ?> (register_long_arrays breaks superglobals). (Zeev)
</li>
<li><?php bugfix(25724); ?> (argv and argc not defined). (Zeev)
</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.0b4"><!-- {{{ 5.0.0b4 -->
<h3>Version 5.0.0 Beta 4</h3>
<?php release_date('12-Feb-2004'); ?>
<ul>
<li>Changed exceptions so that they must now inherit from the built-in Exception
class. This allows for a general catch(Exception $e) statement to catch all
exceptions. (Andi, Zeev)</li>
<li>Added SPL extension. (Marcus, Derick)</li>
<li>Added checks for invalid characters in a cookie name and cookie data
into set[raw]cookie(). (Brian)</li>
<li>Added support for ++ and += (and similar) to SimpleXML. (Andi, Zeev)</li>
<li>Added infrastructure for ++ and += (and similar) to object overloading
modules. (Andi, Zeev)</li>
<li>Added error message when trying to re-assign to $this variable. (Zeev, Andi)</li>
<li>Added support for an interface to extend another interface. (Zeev)</li>
<li>Added new pspell functions: (Brian)
  <ul>
    <li>pspell_config_dict_dir()</li>
    <li>pspell_config_data_dir()</li>
  </ul></li>
<li>Added new Interbase functions: (Ard)
  <ul>
    <li>ibase_service_attach() and ibase_service_detach().</li>
    <li>ibase_backup() and ibase_restore().</li>
    <li>ibase_maintain_db(), ibase_db_info() and ibase_server_info().</li>
  </ul></li>
<li>Added context option "http"/"request_fulluri" to send entire URI in request
which is required format for some proxies. (Sara)</li>
<li>Added optional third parameter 'strict' to array_keys(). (Andrey)</li>
<li>Added stream_lock() method to userspace streams interface. (Hartmut, Wez)</li>
<li>Added xsltprocessor-&gt;registerPHPFunctions(). (Christian)</li>
<li>Readded support for using classes before they are declared according to
the behavior in PHP 4. This won't work with classes who are using PHP 5
features such as interfaces. (Zeev, Andi)</li>
<li>Completely overhauled SimpleXML extension. (Marcus, Rob, Sterling)</li>
<li>Upgraded bundled SQLite library to version 2.8.11. (Ilia, Wez)</li>
<li>Improved destructor implementation to always call destructors on clean
shutdown. An order of destruction is not guaranteed. (Zeev, Andi)</li>
<li>Redesigned exception support. This fixes many bugs in the previous design
such as nested try's and problems with overloaded extensions. (Zeev, Andi)</li>
<li>Redesigned clone by adding a clone keyword (clone $obj) and copying all
properties before __clone() is called. Also allows calling parent __clone
function by using parent::__clone(). (Zeev, Andi)</li>
<li>Fixed interfaces to check for function return-by-reference equality when
inheriting and implementing interfaces. (Andi, Zeev)</li>
<li>Fixed foreach() to respect property visibility. (Marcus)</li>
<li>Fixed problem with parse error in include() file not stopping PHP's
execution. (Ilia)</li>
<li>Fixed var_export() to show public, protected and private modifiers properly.
(Derick)</li>
<li>Fixed problems with longlong values in mysqli. (Georg)</li>
<li>Fixed class name case preserving of user defined classes. (Marcus)</li>
<li><?php bugfix(27145); ?> (Unmangle private/protected property names before printing
them inside error messages). (Ilia)</li>
<li><?php bugfix(27103); ?> (preg_split('//u') incorrectly splits UTF-8 strings into
octets). (Moriyoshi)</li>
<li><?php bugfix(27042); ?> (SPL: SeekableIterator seek() broken). (Marcus)</li>
<li><?php bugfix(27008); ?> (Every class method can be called as static). (Marcus)</li>
<li><?php bugfix(26938); ?> (exec() has problems reading long lines).
(Ilia, runekl[at]opoint[dot]com</li>
<li><?php bugfix(26947); ?> (ext/dom: Crash when using DomDocument::getElementById()).
(Christian)</li>
<li><?php bugfix(26911); ?> (crash in sqlite extension when fetching data from empty
queries). (Ilia)</li>
<li><?php bugfix(26844); ?> (ext/mime_magic: magic file validation broken). (Jani)</li>
<li><?php bugfix(26819); ?> (http_build_query() crashes on NULL output). (Ilia)</li>
<li><?php bugfix(26817); ?> (http_build_query() does not handle private &amp; protected
object properties correctly). (Ilia)</li>
<li><?php bugfix(26815); ?> (foreach of (DOM) childnodes crashes when Xinclude is used).
(Rob)</li>
<li><?php bugfix(26796); ?> (SQLite causes crashes with other extensions *connect()
calls). (Marcus)</li>
<li><?php bugfix(26762); ?> (unserialize() produces lowercase classnames). (Marcus)</li>
<li><?php bugfix(26743); ?> (getElementsByTagName doesn't work properly). (Rob)</li>
<li><?php bugfix(26736); ?> (__autoload not invoked for parent classes). (Marcus)</li>
<li><?php bugfix(26723); ?> (domNode::appendChild() changes child node namespace). (Rob)</li>
<li><?php bugfix(26697); ?> (calling class_exists() on a nonexistent class in __autoload
results in segfault). (Marcus)</li>
<li><?php bugfix(26696); ?> (string index in a switch() crashes with multiple matches).
(Andi)</li>
<li><?php bugfix(26695); ?> (Reflection API does not recognize mixed-case class hints).
(Marcus)</li>
<li><?php bugfix(26690); ?> (make xsltProcessor-&gt;transformToUri use streams wrappers).
(Ilia)</li>
<li><?php bugfix(26680); ?> (Added version check in mysqli_report_index). (Georg)</li>
<li><?php bugfix(26675); ?> (Segfault on ArrayAccess use). (Marcus)</li>
<li><?php bugfix(26640); ?> (__autoload() not invoked by Reflection classes). (Jani)</li>
<li><?php bugfix(26543); ?> (call_user_func() broken for self, parent). (Stanislav)</li>
<li><?php bugfix(26077); ?> (memory leak when new() result is not assigned and no
constructor is defined). (Stanislav)</li>
<li><?php bugfix(26065); ?> (Crash when nesting classes). (Marcus)</li>
<li><?php bugfix(25816); ?> (disallow arrays in class constants). (Stanislav)</li>
<li><?php bugfix(25329); ?> (sqlite_create_function with method and reference to $this).
(Marcus)</li>
<li><?php bugfix(25038); ?> (call_user_func() issues a warning if function throws an
exception). (Marcus)</li>
<li><?php bugfix(24608); ?> (__set not triggered when overloading with array).
(Stanislav)</li>
<li><?php bugfix(24243); ?> (enabling browscap causes segfault). (Wez)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.0b3"><!-- {{{ 5.0.0b3 -->
<h3>Version 5.0.0 Beta 3</h3>
<?php release_date('21-Dec-2003'); ?>
<ul>
<li>Bundled new tidy extension (John, Wez)</li>
<li>Upgraded PCRE library to version 4.5. (Andrei)</li>
<li>Dropped Windows 95 support. (Andi)</li>
<li>Moved extensions to PECL:
 <ul>
  <li>ext/crack (Jani, Derick)</li>
  <li>ext/db (Jani, Derick)</li>
  <li>ext/mcal (Jani, Derick)</li>
  <li>ext/qtdom (Jani, Derick)</li>
  <li>ext/notes (Wez)</li>
 </ul></li>
<li>Added 'c' modifier to date() which returns the date in the ISO
8601 format.  (Derick, Manuzhai)</li>
<li>Added an optional parameter to microtime() to get the time as
float. (Andrey)</li>
<li>Added MacRoman encoding support to htmlentities(). (Derick,
Marcus Bointon)</li>
<li>Added possibility to call PHP functions as XSLT-functions.
(Christian)</li>
<li>Added possibility to prevent PHP from registering variables when
input filter.  support is used. (Derick)</li>
<li>Added iconv stream filter (convert.iconv.*). (Moriyoshi)</li>
<li>Added EXSLT support in ext/xsl. (Christian)</li>
<li>Added qdbm handler for dba extension. (mg at iceni dot pl, Marcus)</li>
<li>Added new functions:
 <ul>
  <li>dba_key_split() to split inifile keys in an array. (Marcus)</li>
  <li>time_nanosleep() signal safe sleep (Magnus, Ilia)</li>
  <li>headers_list(). (Sara)</li>
  <li>php_strip_whitespace(). strip whitespace &amp; comments from a
  script. (Ilia)</li>
  <li>php_check_syntax(). check php script for parse errors. (Ilia)</li>
  <li>image_type_to_extension(). return extension based on image type.
  (Ilia)</li>
  <li>stream_socket_sendto() and stream_socket_recvfrom(). (Wez)</li>
  <li>iconv_mime_decode_headers(). (Moriyoshi)</li>
  <li>get_declared_interfaces(). (Andrey, Marcus)</li>
  <li>sqlite_fetch_column_types(). (Ilia)</li>
 </ul></li>
<li>Added proxy support to http:// wrapper. (Sara)</li>
<li>Added rename(), rmdir() and mkdir() support to userstreams.
(Sara)</li>
<li>Added rename(), rmdir() and mkdir() support to ftp:// wrapper.
(Sara)</li>
<li>Changed rename(), rmdir() and mkdir() to be routed via streams
API. (Sara)</li>
<li>Changed stat() and family to be routed via streams API. (Sara)</li>
<li>Fixed include_once() / require_once() on Windows to honor
case-insensitivity; of files. (Andi)</li>
<li>Fixed get_declared_classes() to return only classes. (Andrey,
Marcus)</li>
<li>Fixed __autoload() to preserve case of the passed class name.
(Andi)</li>
<li><?php bugfix(26615); ?> () (runekl at opoint dot com, Derick)</li>
<li><?php bugfix(26591); ?> ("__autoload threw an exception" during an
uncaught). (Marcus)</li>
<li><?php bugfix(26534); ?> (stream_get_meta_data() -&gt; Access Violation).
(Wez)</li>
<li><?php bugfix(26528); ?> (HTML entities are not being decoded by
xml_parse()/xml_parse_into_struct()). (Ilia)</li>
<li><?php bugfix(26182); ?> (Object properties created redundantly). (Andi)</li>
<li><?php bugfix(26156); ?> (REPLACE_ZVAL_VALUE works on uninit stack-based
zvals). (Moriyoshi)</li>
<li><?php bugfix(26083); ?> (Non-working write support in ext/dom). (Ilia)</li>
<li><?php bugfix(26072); ?> (--disable-libxml does not work). (Jani)</li>
<li><?php bugfix(26001); ?> (serialize crashes when accessing an overloaded
object that has no properties (NULL hashtable)). (Wez)</li>
<li><?php bugfix(25664); ?> (COM crashes when calling a Delphi implementations
of ITypeInfo). (Wez)</li>
<li><?php bugfix(24837); ?> (Incorrect behaviour of PPP using foreach).
(Marcus)</li>
<li><?php bugfix(24693); ?> (Allow session.use_trans_sid to be
enabled/disabled from inside the script). (Ilia)</li>
<li><?php bugfix(24394); ?> (Serializing cross-referenced objects causes
segfault). (Moriyoshi)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.0b2"><!-- {{{ 5.0.0b2 -->
<h3>Version 5.0.0 Beta 2</h3>
<?php release_date('30-Oct-2003'); ?>
<ul>
<li>Lots and lots of changes in the Zend Engine 2 since beta 1:
 <ul>
  <li>Added Iterators</li>
  <li>Improved memory manager</li>
  <li>Added Reflection API</li>
  <li>Removed the not so working namespaces support</li>
  <li>Removed support for expressions within constant declerations.</li>
  <li>You can read about most changes in ZEND_CHANGES under the Zend
  directory.</li>
 </ul></li>
<li>Improved the DBX extension: (Marc)
 <ul>
  <li>Added DBX_RESULT_UNBUFFERED flag for dbx_query().</li>
  <li>Added dbx_fetch_row()</li>
  <li>Added SQLite support.</li>
 </ul></li>
<li>Improved the Interbase extension: (Ard Biesheuvel)
 <ul>
  <li>Added support for multiple databases into ibase_trans()</li>
  <li>Added support for CREATE DATABASE, SET TRANSACTION and EXECUTE
  PROCEDURE statements into ibase_query()</li>
  <li>Added ibase_commit_ret() and ibase_rollback_ret()</li>
  <li>Added ibase_drop_db()</li>
  <li>Added ibase_gen_id()</li>
  <li>Added ibase_name_result()</li>
  <li>Added ibase_errcode()</li>
  <li>Added ibase_affected_rows() and ibase_num_params()</li>
  <li>Added ibase_param_info()</li>
  <li>Added ibase_wait_event()</li>
  <li>Added ibase_set_event_handler() and ibase_free_event_handler()</li>
 </ul></li>
<li>Added new COM extension with integrated .Net support. (Wez)</li>
<li>Added new functions:
 <ul>
  <li>setrawcookie(). (Brian)</li>
  <li>pg_version(). (Marcus)</li>
  <li>dbase_get_header_info(). (Zak)</li>
  <li>snmp_read_mib(). (Jani)</li>
  <li>http_build_query(). (Sara)</li>
  <li>ftp_alloc(). (Sara)</li>
  <li>array_udiff(). (Andrey)</li>
  <li>array_udiff_assoc(). (Andrey)</li>
  <li>array_udiff_uassoc(). (Andrey)</li>
  <li>array_diff_uassoc(). (Andrey)</li>
  <li>convert_uuencode(). (Ilia)</li>
  <li>convert_uudecode(). (Ilia)</li>
  <li>substr_compare(). (Ilia)</li>
  <li>pcntl_wait(). (GeorgeS)</li>
 </ul></li>
<li>Added "resume_pos" context option to "ftp://" wrapper. (Sara)</li>
<li>Added optional parameter to OCIWriteTemporaryLob() to specify
the type of LOB (Patch by Novicky Marek &lt;novicky@aarongroup.cz&gt;).
(Thies)</li>
<li>Added reflection API. (Andrei, George, Timm)</li>
<li>Changed length parameter in fgetcsv() to be optional. (Moriyoshi)</li>
<li>Fixed IPv6 support in MacOSX Panther. (Dan, Marko)</li>
<li>Fixed fgetcsv() to correctly handle international (non-ascii)
characters. (Moriyoshi)</li>
<li>Fixed support for &lt;![CDATA[]]&gt; fields within XML documents
in ext/xml. (Sterling)</li>
<li>Fixed visibility of __construct and __clone. (Marcus)</li>
<li><?php bugfix(26003); ?> (fgetcsv() not binary-safe on null bytes).
(Moriyoshi)</li>
<li><?php bugfix(25756); ?> (SimpleXML's validate_schema_file() broken).
(Moriyoshi)</li>
<li><?php bugfix(25581); ?> (getimagesize() returns incorrect values on
bitmap (os2) files). (Marcus)</li>
<li><?php bugfix(25494); ?> (array_merge*() allows non-arrays as argument).
(Jay)</li>
<li><?php bugfix(24766); ?> (strange result array from unpack()). (Moriyoshi)</li>
<li><?php bugfix(24729); ?> ($obj = new $className; causes crash when
$className is not set). (Marcus)</li>
<li><?php bugfix(24565); ?> (cannot read array elements received via
$_REQUEST). (Zeev)</li>
<li><?php bugfix(24445); ?> (get_parent_class() returns different values).
(Sterling, Stanislav)</li>
<li><?php bugfix(24403); ?> (preg_replace() problem: Using $this when not
in object context). (Zeev)</li>
<li><?php bugfix(24399); ?> (PEAR DB isError crash [instanceof_function
fault?]).  (Sterling, Marcus)</li>
<li><?php bugfix(24396); ?> (foreach ($k=&gt;$v), the key $k is missing). (Zeev)</li>
<li><?php bugfix(24279); ?> (__get() crash when no value is returned). (Ilia)</li>
<li><?php bugfix(22367); ?> (undefined variable has a value). (Zeev)</li>
<li><?php bugfix(19859); ?> (allow fast_call_user_function to support __call).
(Stanislav)</li>
<li><?php bugfix(17997); ?> (Warning when switch() and reference are combined).
(Zeev)</li>
<li><?php bugfix(17988); ?> (strtotime failed to parse postgresql timestamp).
(Derick)</li>
</ul>

<!-- }}} --></section>

<section class="version" id="5.0.0b1"><!-- {{{ 5.0.0b1 -->
<h3>Version 5.0.0 Beta 1</h3>
<?php release_date('29-Jun-2003'); ?>
<ul>
<li>Switch to using Zend Engine 2, which includes numerous engine level improvements.
A full overview may be downloaded from <a href="http://www.zend.com/engine2/ZendEngine-2.0.pdf">http://www.zend.com/engine2/ZendEngine-2.0.pdf</a> (PDF).
</li>
<li>The SQLite (<a href="http://www.hwaci.com/sw/sqlite/">http://www.hwaci.com/sw/sqlite/</a>) extension is now bundled and
enabled by default. (Wez, Marcus, Tal)</li>
<li>Improved the speed of internal functions that use callbacks by 40% due to a
new internal fast_call_user_function() function. (Sterling)</li>
<li>Completely Overhauled XML support (Rob, Sterling, Chregu, Marcus)
 <ul>
  <li>Brand new Simplexml extension</li>
  <li>New DOM extension</li>
  <li>New XSL extension</li>
  <li>Moved the old DOM-XML and XSLT extensions to PECL</li>
  <li>ext/xml can now use both libxml2 and expat to parse XML</li>
  <li>Removed bundled expat</li>
 </ul>
</li>
<li>Removed the bundled MySQL client library. (Sterling)</li>
<li>New php.ini options:
  <ul>
   <li>"session.hash_function" and "session.hash_bits_per_character". (Sascha)</li>
   <li>"mail.force_extra_paramaters". (Derick)</li>
   <li>"register_long_arrays". (Zeev)</li>
  </ul>
</li>
<li>Improved the streams support: (Wez, Sara, Ilia)
 <ul>
  <li>Improved performance of readfile(), fpassthru() and some internal streams
  operations under Win32.</li>
  <li>stream_socket_client() - similar to fsockopen(), but more powerful.</li>
  <li>stream_socket_server() - Creates a server socket.</li>
  <li>stream_socket_accept() - Accept a client connection.</li>
  <li>stream_socket_get_name() - Get local or remote name of socket.</li>
  <li>stream_copy_to_stream()</li>
  <li>stream_get_line() - Reads either the specified number of bytes or until
  the ending string is found.</li>
  <li>Added context property to userspace streams object.</li>
  <li>Added generic crypto interface for streams (supports dynamic loading of
  OpenSSL)</li>
  <li>Added lightweight streaming input abstraction to the Zend Engine scanners
  to provide uniform support for include()'ing data from PHP streams across
  all platforms.</li>
  <li>Added 'string.base64' stream filter.</li>
  <li>Renamed stream_register_wrapper() to stream_wrapper_register().</li>
  <li>Added "ftp://" wrapper support to opendir(), stat() and unlink().</li>
  <li>Added context options 'method', 'header' and 'content' for "http://" fopen
  wrapper.</li>
 </ul>
</li>
<li>Improved the GD extension: (Pierre-Alain Joye, Ilia)
 <ul>
  <li>imagefilter() - Apply different filters to image. (Only available
  with bundled GD library)</li>
  <li>Antialiased drawing support:
   <ul>
    <li>imageantialias() - (de)active antialias</li>
    <li>imageline() and imagepolygon() antialias support</li>
   </ul>
  </li>
 </ul>
</li>
<li>Changed the length parameter in fgetss() to be optional. (Moriyoshi)</li>
<li>Changed ini parser to allow for handling of quoted multi-line values. (Ilia)</li>
<li>Changed get_extension_funcs() to return list of the built-in Zend Engine
functions if "zend" is specified as the module name. (Ilia)</li>
<li>Changed array_search() to accept also objects as a needle. (Moriyoshi)</li>
<li>Changed ext/mcrypt to require libmcrypt version 2.5.6 or greater. (Derick)</li>
<li>Changed uniqid() parameters to be optional and allow any prefix length. (Marcus)</li>
<li>Added new iconv functions. (Moriyoshi)
 <ul>
  <li>iconv_strlen()</li>
  <li>iconv_substr()</li>
  <li>iconv_strpos()</li>
  <li>iconv_strrpos()</li>
  <li>iconv_mime_decode()</li>
  <li>iconv_mime_encode()</li>
 </ul>
</li>
<li>Added misc. new functions:
 <ul>
  <li>ldap_sasl_bind(). (peter_c60@hotmail.com, Jani)</li>
  <li>imap_getacl(). (Dan, Holger Burbach)</li>
  <li>file_put_contents(). (Sterling)</li>
  <li>proc_nice() - Changes priority of the current process. (Ilia)</li>
  <li>pcntl_getpriority() and pcntl_setpriority(). (Ilia)</li>
  <li>idate(), date_sunrise() and date_sunset(). (Moshe Doron)</li>
  <li>strpbrk() - Searches a string for a list of characters. (Ilia)</li>
  <li>get_headers() - Returns headers sent by the server of the specified URL. (Ilia)</li>
  <li>str_split() - Breaks down a string into an array of elements based on length. (Ilia)</li>
  <li>array_walk_recursive(). (Ilia)</li>
  <li>array_combine(). (Andrey)</li>
 </ul>
</li>
<li>Added optional parameter to get_browser() to make it return an array. (Jay)</li>
<li>Added optional parameter to openssl_sign() to specify the hashing algorithm.(scott@planetscott.ca, Derick)</li>
<li>Added optional parameter to sha1(), sha1_file(), md5() and md5_file() which
makes them return the digest as binary data. (Michael Bretterklieber, Derick)</li>
<li>Added optional parameter to mkdir() to make directory creation recursive. (Ilia)</li>
<li>Added optional parameter to file() which makes the result array not contain
the line endings and to skip empty lines. (Ilia)</li>
<li>Added new range() functionality:
 <ul>
  <li>Support for float modifier. (Ilia)</li>
  <li>Detection of numeric values inside strings passed as high &amp; low. (Ilia)</li>
  <li>Proper handle the situations where high == low. (Ilia)</li>
  <li>Added an optional step parameter. (Jon)</li>
 </ul>
</li>
<li>Added encoding detection feature for expat XML parser. (Adam Dickmeiss, Moriyoshi)</li>
<li>Added missing multibyte (unicode) support and numeric entity support to
html_entity_decode(). (Moriyoshi)</li>
<li>Added IPv6 support to ext/sockets. (Sara)</li>
<li>Added input filter support. See README.input_filter for more info. (Rasmus)</li>
<li>Added a replace count for str_[i]replace(), see <?php bugl(8218); ?>. (Sara)</li>
<li>Fixed is_executable() to be available also on Windows. (Shane)</li>
<li>Fixed dirname() and strip_tags() to be binary-safe. (Moriyoshi)</li>
<li><?php bugfix(24098); ?> (crash in pathinfo()). (Ilia)</li>
<li><?php bugfix(21985); ?> and <?php bugl(22064); ?> (various mb_send_mail() issues). (Moriyoshi)</li>
<li><?php bugfix(21600); ?> (Assign by reference function call changes variable
contents). (Zeev)</li>
</ul>
<!-- }}} --></section>

<?php

changelog_footer(5, $MINOR_VERSIONS);
