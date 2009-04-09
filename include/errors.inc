<?php
// $Id$

/*
  This script provides functions to print out
  error messages for users in case something is
  not available.
*/

// A 'good looking' 404 error message page
function error_404()
{
    global $MYSITE;
    status_header(404);
    site_header('404 Not Found', array("noindex"));
    echo "<h1>Not Found</h1>\n<p><strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong> not found on this server.</p>\n";
    site_footer();
    exit;
}

// A 'good looking' 404 error message page for manual pages
function error_404_manual()
{
    global $MYSITE;
    status_header(404);
    site_header('404 Not Found', array("noindex"));
    echo "<h1>Not Found</h1>\n" .
         "<p>The manual page you are looking for (<strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong>) is not available on this server right now. " .
         "Please check back later, or if the problem persist, " .
         "<a href=\"/contact.php\">contact the webmasters</a>.</p>\n";
    site_footer();
    exit;
}

// This service is not working right now
function error_noservice()
{
    global $MYSITE;
    site_header('Service not working', array("noindex"));
    echo "<h1>Service not working</h1>\n" .
         "<p>The service you tried to access with <strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong> is not available on this server right now. " .
         "Please check back later, or if the problem persist, " .
         "<a href=\"/contact.php\">contact the webmasters</a>.</p>\n";
    site_footer();
    exit;
}

// There is no such mirror
function error_nomirror($mirror) {
	site_header("No such mirror", array("noindex"));
	echo "<h1>No such mirror</h1>\n<p>The mirror you tried to access (" .
		 htmlspecialchars($mirror) .
		 ") is not registered php.net mirror. Please check back later," .
		 " or if the problem persist, " .
		 "<a href=\"/contact.php\">contact the webmasters</a>.</p>\n";
	site_footer();
	exit;
}

// Send out a proper status header
function status_header($num)
{
    // Set status text
    switch ($num) {
        case 200: $status = "OK"; break;
        case 301: $status = "Moved Permanently"; break;
        case 302: $status = "Found"; break;
        case 404: $status = "Not Found"; break;
        default: return FALSE;
    }

    // Figure out HTTP protocol version - use 1.1 answer for 1.1 request,
    // answer with HTTP/1.0 for any other (ancient or futuristic) user
    switch (strtoupper($_SERVER['SERVER_PROTOCOL'])) {
        case 'HTTP/1.0':
            @header("HTTP/1.0 $num $status");
            break;

        case 'HTTP/1.1':
        default:
            @header("HTTP/1.1 $num $status");
            break;
    }
    
    // BC code for PHP < 4.3.0
    @header("Status: $num $status", TRUE, $num);
    
    return TRUE;
}

/******************************************************************************
In the future every mirror will have SQLite instead of hacks like this. Or, some
other means like a ginormous array! But the point is we'll end up storing
everything like functions, variables, constants, common search terms, etc.

This exists today because as of PHP 5.3.0 there are over 200 links within the
php.ini files so these create nicer urls and allow language detection to work.

Initially this only contains ini settings referred to within php.ini-* and is
ordered as such (top to bottom).

TODO: Determine if we want to continue 301 -OR- make these official URLs.
******************************************************************************/

function is_known_ini ($ini) {
$inis = array(
	'engine'						=> 'apache.configuration.php#ini.engine',
	'short-open-tag'				=> 'ini.core.php#ini.short-open-tag',
	'asp-tags'						=> 'ini.core.php#ini.asp-tags',
	'precision'						=> 'ini.core.php#ini.precision',
	'y2k-compliance'				=> 'ini.core.php#ini.y2k-compliance',
	'output-buffering'				=> 'outcontrol.configuration.php#ini.output-buffering',
	'output-handler'				=> 'outcontrol.configuration.php#ini.output-handler',
	'zlib.output-compression'		=> 'zlib.configuration.php#ini.zlib.output-compression',
	'zlib.output-compression-level'	=> 'zlib.configuration.php#ini.zlib.output-compression-level',
	'zlib.output-handler'			=> 'zlib.configuration.php#ini.zlib.output-handler',
	'implicit-flush'				=> 'outcontrol.configuration.php#ini.implicit-flush',
	'allow-call-time-pass-reference'=> 'ini.core.php#ini.allow-call-time-pass-reference',
	'safe-mode'						=> 'ini.sect.safe-mode.php#ini.safe-mode',
	'safe-mode-gid'					=> 'ini.sect.safe-mode.php#ini.safe-mode-gid',
	'safe-mode-include-dir'			=> 'ini.sect.safe-mode.php#ini.safe-mode-include-dir',
	'safe-mode-exec-dir'			=> 'ini.sect.safe-mode.php#ini.safe-mode-exec-dir',
	'safe-mode-allowed-env-vars'	=> 'ini.sect.safe-mode.php#ini.safe-mode-allowed-env-vars',
	'safe-mode-protected-env-vars'	=> 'ini.sect.safe-mode.php#ini.safe-mode-protected-env-vars',
	'open-basedir'					=> 'ini.sect.safe-mode.php#ini.open-basedir',
	'disable-functions'				=> 'ini.sect.safe-mode.php#ini.disable-functions',
	'disable-classes'				=> 'ini.sect.safe-mode.php#ini.disable-classes',
	'syntax-highlighting'			=> 'misc.configuration.php#ini.syntax-highlighting',
	'ignore-user-abort'				=> 'misc.configuration.php#ini.ignore-user-abort',
	'realpath-cache-size'			=> 'ini.core.php#ini.realpath-cache-size',
	'realpath-cache-ttl'			=> 'ini.core.php#ini.realpath-cache-ttl',
	'expose-php'					=> 'ini.core.php#ini.expose-php',
	'max-execution-time'			=> 'info.configuration.php#ini.max-execution-time',
	'max-input-time'				=> 'info.configuration.php#ini.max-input-time',
	'max-input-nesting-level'		=> 'info.configuration.php#ini.max-input-nesting-level',
	'memory-limit'					=> 'ini.core.php#ini.memory-limit',
	'error-reporting'				=> 'errorfunc.configuration.php#ini.error-reporting',
	'display-errors'				=> 'errorfunc.configuration.php#ini.display-errors',
	'display-startup-errors'		=> 'errorfunc.configuration.php#ini.display-startup-errors',
	'log-errors'					=> 'errorfunc.configuration.php#ini.log-errors',
	'log-errors-max-len'			=> 'errorfunc.configuration.php#ini.log-errors-max-len',
	'ignore-repeated-errors'		=> 'errorfunc.configuration.php#ini.ignore-repeated-errors',
	'ignore-repeated-source'		=> 'errorfunc.configuration.php#ini.ignore-repeated-source',
	'report-memleaks'				=> 'errorfunc.configuration.php#ini.report-memleaks',
	'track-errors'					=> 'errorfunc.configuration.php#ini.track-errors',
	'xmlrpc-errors'					=> 'errorfunc.configuration.php#ini.xmlrpc-errors',
	'html-errors'					=> 'errorfunc.configuration.php#ini.html-errors',
	'docref-root'					=> 'errorfunc.configuration.php#ini.docref-root',
	'docref-ext'					=> 'errorfunc.configuration.php#ini.docref-ext',
	'error-prepend-string'			=> 'errorfunc.configuration.php#ini.error-prepend-string',
	'error-append-string'			=> 'errorfunc.configuration.php#ini.error-append-string',
	'error-log'						=> 'errorfunc.configuration.php#ini.error-log',
	'arg-separator.output'			=> 'ini.core.php#ini.arg-separator.output',
	'arg-separator.input'			=> 'ini.core.php#ini.arg-separator.input',
	'variables-order'				=> 'ini.core.php#ini.variables-order',
	'request-order'					=> 'ini.core.php#ini.request-order',
	'register-globals'				=> 'ini.core.php#ini.register-globals',
	'register-long-arrays'			=> 'ini.core.php#ini.register-long-arrays',
	'register-argc-argv'			=> 'ini.core.php#ini.register-argc-argv',
	'auto-globals-jit'				=> 'ini.core.php#ini.auto-globals-jit',
	'post-max-size'					=> 'ini.core.php#ini.post-max-size',
	'magic-quotes-gpc'				=> 'info.configuration.php#ini.magic-quotes-gpc',
	'magic-quotes-runtime'			=> 'info.configuration.php#ini.magic-quotes-runtime',
	'magic-quotes-sybase'			=> 'sybase.configuration.php#ini.magic-quotes-sybase',
	'auto-prepend-file'				=> 'ini.core.php#ini.auto-prepend-file',
	'auto-append-file'				=> 'ini.core.php#ini.auto-append-file',
	'default-mimetype'				=> 'ini.core.php#ini.default-mimetype',
	'default-charset'				=> 'ini.core.php#ini.default-charset',
	'always-populate-raw-post-data'	=> 'ini.core.php#ini.always-populate-raw-post-data',
	'include-path'					=> 'ini.core.php#ini.include-path',
	'doc-root'						=> 'ini.core.php#ini.doc-root',
	'user-dir'						=> 'ini.core.php#ini.user-dir',
	'extension-dir'					=> 'ini.core.php#ini.extension-dir',
	'enable-dl'						=> 'info.configuration.php#ini.enable-dl',
	'cgi.force-redirect'			=> 'ini.core.php#ini.cgi.force-redirect',
	'cgi.redirect-status-env'		=> 'ini.core.php#ini.cgi.redirect-status-env',
	'cgi.fix-pathinfo'				=> 'ini.core.php#ini.cgi.fix-pathinfo',
	'fastcgi.impersonate'			=> 'ini.core.php#ini.fastcgi.impersonate',
	'cgi.rfc2616-headers'			=> 'ini.core.php#ini.cgi.rfc2616-headers',
	'file-uploads'					=> 'ini.core.php#ini.file-uploads',
	'upload-tmp-dir'				=> 'ini.core.php#ini.upload-tmp-dir',
	'upload-max-filesize'			=> 'ini.core.php#ini.upload-max-filesize',
	'allow-url-fopen'				=> 'filesystem.configuration.php#ini.allow-url-fopen',
	'allow-url-include'				=> 'filesystem.configuration.php#ini.allow-url-include',
	'from'							=> 'filesystem.configuration.php#ini.from',
	'user-agent'					=> 'filesystem.configuration.php#ini.user-agent',
	'default-socket-timeout'		=> 'filesystem.configuration.php#ini.default-socket-timeout',
	'auto-detect-line-endings'		=> 'filesystem.configuration.php#ini.auto-detect-line-endings',
	'date.timezone'					=> 'datetime.configuration.php#ini.date.timezone',
	'date.default-latitude'			=> 'datetime.configuration.php#ini.date.default-latitude',
	'date.default-longitude'		=> 'datetime.configuration.php#ini.date.default-longitude',
	'date.sunrise-zenith'			=> 'datetime.configuration.php#ini.date.sunrise-zenith',
	'date.sunset-zenith'			=> 'datetime.configuration.php#ini.date.sunset-zenith',
	'filter.default'				=> 'filter.configuration.php#ini.filter.default',
	'filter.default-flags'			=> 'filter.configuration.php#ini.filter.default-flags',
	'sqlite.assoc-case'				=> 'sqlite.configuration.php#ini.sqlite.assoc-case',
	'pcre.backtrack-limit'			=> 'pcre.configuration.php#ini.pcre.backtrack-limit',
	'pcre.recursion-limit'			=> 'pcre.configuration.php#ini.pcre.recursion-limit',
	'pdo-odbc.connection-pooling'	=> 'ref.pdo-odbc.php#ini.pdo-odbc.connection-pooling',
	'phar.readonly'					=> 'phar.configuration.php#ini.phar.readonly',
	'phar.require-hash'				=> 'phar.configuration.php#ini.phar.require-hash',
	'define-syslog-variables'		=> 'network.configuration.php#ini.define-syslog-variables',
	'smtp'							=> 'mail.configuration.php#ini.smtp',
	'smtp-port'						=> 'mail.configuration.php#ini.smtp-port',
	'sendmail-from'					=> 'mail.configuration.php#ini.sendmail-from',
	'sendmail-path'					=> 'mail.configuration.php#ini.sendmail-path',
	'sql.safe-mode'					=> 'ini.core.php#ini.sql.safe-mode',
	'uodbc.default-db'				=> 'odbc.configuration.php#ini.uodbc.default-db',
	'uodbc.default-user'			=> 'odbc.configuration.php#ini.uodbc.default-user',
	'uodbc.default-pw'				=> 'odbc.configuration.php#ini.uodbc.default-pw',
	'uodbc.allow-persistent'		=> 'odbc.configuration.php#ini.uodbc.allow-persistent',
	'uodbc.check-persistent'		=> 'odbc.configuration.php#ini.uodbc.check-persistent',
	'uodbc.max-persistent'			=> 'odbc.configuration.php#ini.uodbc.max-persistent',
	'uodbc.max-links'				=> 'odbc.configuration.php#ini.uodbc.max-links',
	'uodbc.defaultlrl'				=> 'odbc.configuration.php#ini.uodbc.defaultlrl',
	'uodbc.defaultbinmode'			=> 'odbc.configuration.php#ini.uodbc.defaultbinmode',
	'mysql.allow-persistent'		=> 'mysql.configuration.php#ini.mysql.allow-persistent',
	'mysql.max-persistent'			=> 'mysql.configuration.php#ini.mysql.max-persistent',
	'mysql.max-links'				=> 'mysql.configuration.php#ini.mysql.max-links',
	'mysql.default-port'			=> 'mysql.configuration.php#ini.mysql.default-port',
	'mysql.default-socket'			=> 'mysql.configuration.php#ini.mysql.default-socket',
	'mysql.default-host'			=> 'mysql.configuration.php#ini.mysql.default-host',
	'mysql.default-user'			=> 'mysql.configuration.php#ini.mysql.default-user',
	'mysql.default-password'		=> 'mysql.configuration.php#ini.mysql.default-password',
	'mysql.connect-timeout'			=> 'mysql.configuration.php#ini.mysql.connect-timeout',
	'mysql.trace-mode'				=> 'mysql.configuration.php#ini.mysql.trace-mode',
	'mysqli.max-links'				=> 'mysqli.configuration.php#ini.mysqli.max-links',
	'mysqli.default-port'			=> 'mysqli.configuration.php#ini.mysqli.default-port',
	'mysqli.default-socket'			=> 'mysqli.configuration.php#ini.mysqli.default-socket',
	'mysqli.default-host'			=> 'mysqli.configuration.php#ini.mysqli.default-host',
	'mysqli.default-user'			=> 'mysqli.configuration.php#ini.mysqli.default-user',
	'mysqli.default-pw'				=> 'mysqli.configuration.php#ini.mysqli.default-pw',
	'oci8.privileged-connect'		=> 'oci8.configuration.php#ini.oci8.privileged-connect',
	'oci8.max-persistent'			=> 'oci8.configuration.php#ini.oci8.max-persistent',
	'oci8.persistent-timeout'		=> 'oci8.configuration.php#ini.oci8.persistent-timeout',
	'oci8.ping-interval'			=> 'oci8.configuration.php#ini.oci8.ping-interval',
	'oci8.statement-cache-size'		=> 'oci8.configuration.php#ini.oci8.statement-cache-size',
	'oci8.default-prefetch'			=> 'oci8.configuration.php#ini.oci8.default-prefetch',
	'oci8.old-oci-close-semantics'	=> 'oci8.configuration.php#ini.oci8.old-oci-close-semantics',
	'pgsql.allow-persistent'		=> 'pgsql.configuration.php#ini.pgsql.allow-persistent',
	'pgsql.auto-reset-persistent'	=> 'pgsql.configuration.php#ini.pgsql.auto-reset-persistent',
	'pgsql.max-persistent'			=> 'pgsql.configuration.php#ini.pgsql.max-persistent',
	'pgsql.max-links'				=> 'pgsql.configuration.php#ini.pgsql.max-links',
	'pgsql.ignore-notice'			=> 'pgsql.configuration.php#ini.pgsql.ignore-notice',
	'pgsql.log-notice'				=> 'pgsql.configuration.php#ini.pgsql.log-notice',
	'sybct.allow-persistent'		=> 'sybase.configuration.php#ini.sybct.allow-persistent',
	'sybct.max-persistent'			=> 'sybase.configuration.php#ini.sybct.max-persistent',
	'sybct.max-links'				=> 'sybase.configuration.php#ini.sybct.max-links',
	'sybct.min-server-severity'		=> 'sybase.configuration.php#ini.sybct.min-server-severity',
	'sybct.min-client-severity'		=> 'sybase.configuration.php#ini.sybct.min-client-severity',
	'sybct.timeout'					=> 'sybase.configuration.php#ini.sybct.timeout',
	'bcmath.scale'					=> 'bc.configuration.php#ini.bcmath.scale',
	'browscap'						=> 'misc.configuration.php#ini.browscap',
	'session.save-handler'			=> 'session.configuration.php#ini.session.save-handler',
	'session.save-path'				=> 'session.configuration.php#ini.session.save-path',
	'session.use-cookies'			=> 'session.configuration.php#ini.session.use-cookies',
	'session.cookie-secure'			=> 'session.configuration.php#ini.session.cookie-secure',
	'session.use-only-cookies'		=> 'session.configuration.php#ini.session.use-only-cookies',
	'session.name'					=> 'session.configuration.php#ini.session.name',
	'session.auto-start'			=> 'session.configuration.php#ini.session.auto-start',
	'session.cookie-lifetime'		=> 'session.configuration.php#ini.session.cookie-lifetime',
	'session.cookie-path'			=> 'session.configuration.php#ini.session.cookie-path',
	'session.cookie-domain'			=> 'session.configuration.php#ini.session.cookie-domain',
	'session.cookie-httponly'		=> 'session.configuration.php#ini.session.cookie-httponly',
	'session.serialize-handler'		=> 'session.configuration.php#ini.session.serialize-handler',
	'session.gc-probability'		=> 'session.configuration.php#ini.session.gc-probability',
	'session.gc-divisor'			=> 'session.configuration.php#ini.session.gc-divisor',
	'session.gc-maxlifetime'		=> 'session.configuration.php#ini.session.gc-maxlifetime',
	'session.bug-compat-42'			=> 'session.configuration.php#ini.session.bug-compat-42',
	'session.bug-compat-warn'		=> 'session.configuration.php#ini.session.bug-compat-warn',
	'session.referer-check'			=> 'session.configuration.php#ini.session.referer-check',
	'session.entropy-length'		=> 'session.configuration.php#ini.session.entropy-length',
	'session.entropy-file'			=> 'session.configuration.php#ini.session.entropy-file',
	'session.cache-limiter'			=> 'session.configuration.php#ini.session.cache-limiter',
	'session.cache-expire'			=> 'session.configuration.php#ini.session.cache-expire',
	'session.use-trans-sid'			=> 'session.configuration.php#ini.session.use-trans-sid',
	'session.hash-function'			=> 'session.configuration.php#ini.session.hash-function',
	'session.hash-bits-per-character'=> 'session.configuration.php#ini.session.hash-bits-per-character',
	'url-rewriter.tags'				=> 'session.configuration.php#ini.url-rewriter.tags',
	'assert.active'					=> 'info.configuration.php#ini.assert.active',
	'assert.warning'				=> 'info.configuration.php#ini.assert.warning',
	'assert.bail'					=> 'info.configuration.php#ini.assert.bail',
	'assert.callback'				=> 'info.configuration.php#ini.assert.callback',
	'assert.quiet-eval'				=> 'info.configuration.php#ini.assert.quiet-eval',
	'com.typelib-file'				=> 'com.configuration.php#ini.com.typelib-file',
	'com.allow-dcom'				=> 'com.configuration.php#ini.com.allow-dcom',
	'com.autoregister-typelib'		=> 'com.configuration.php#ini.com.autoregister-typelib',
	'com.autoregister-casesensitive'=> 'com.configuration.php#ini.com.autoregister-casesensitive',
	'com.autoregister-verbose'		=> 'com.configuration.php#ini.com.autoregister-verbose',
	'mbstring.language'				=> 'mbstring.configuration.php#ini.mbstring.language',
	'mbstring.internal-encoding'	=> 'mbstring.configuration.php#ini.mbstring.internal-encoding',
	'mbstring.http-input'			=> 'mbstring.configuration.php#ini.mbstring.http-input',
	'mbstring.http-output'			=> 'mbstring.configuration.php#ini.mbstring.http-output',
	'mbstring.encoding-translation'	=> 'mbstring.configuration.php#ini.mbstring.encoding-translation',
	'mbstring.detect-order'			=> 'mbstring.configuration.php#ini.mbstring.detect-order',
	'mbstring.substitute-character'	=> 'mbstring.configuration.php#ini.mbstring.substitute-character',
	'mbstring.func-overload'		=> 'mbstring.configuration.php#ini.mbstring.func-overload',
	'image.jpeg-ignore-warning'		=> 'image.configuration.php#ini.image.jpeg-ignore-warning',
	'exif.encode-unicode'			=> 'exif.configuration.php#ini.exif.encode-unicode',
	'exif.decode-unicode-motorola'	=> 'exif.configuration.php#ini.exif.decode-unicode-motorola',
	'exif.decode-unicode-intel'		=> 'exif.configuration.php#ini.exif.decode-unicode-intel',
	'exif.encode-jis'				=> 'exif.configuration.php#ini.exif.encode-jis',
	'exif.decode-jis-motorola'		=> 'exif.configuration.php#ini.exif.decode-jis-motorola',
	'exif.decode-jis-intel'			=> 'exif.configuration.php#ini.exif.decode-jis-intel',
	'tidy.default-config'			=> 'tidy.configuration.php#ini.tidy.default-config',
	'tidy.clean-output'				=> 'tidy.configuration.php#ini.tidy.clean-output',
	'soap.wsdl-cache-enabled'		=> 'soap.configuration.php#ini.soap.wsdl-cache-enabled',
	'soap.wsdl-cache-dir'			=> 'soap.configuration.php#ini.soap.wsdl-cache-dir',
	'soap.wsdl-cache-ttl'			=> 'soap.configuration.php#ini.soap.wsdl-cache-ttl',
	);
	
	$ini = str_replace('_', '-', strtolower(trim($ini)));
	
	if (isset($inis[$ini])) {
		return $inis[$ini];
	}
	return false;
}
