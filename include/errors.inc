<?php
/*
  This script provides functions to print out
  error messages for users in case something is
  not available.
*/

use phpweb\I18n\Languages;

// A 'good looking' 404 error message page
function error_404(): void
{
    global $MYSITE;
    status_header(404);
    site_header('404 Not Found', ["noindex"]);
    echo "<h1>Not Found</h1>\n<p><strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong> not found on this server.</p>\n";
    site_footer();
    exit;
}

// A 'good looking' 404 error message page for manual pages
function error_404_manual(): void
{
    global $MYSITE;
    status_header(404);
    site_header('404 Not Found', ["noindex"]);
    echo "<h1>Not Found</h1>\n" .
         "<p>The manual page you are looking for (<strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong>) is not available on this server right now. " .
         "Please check back later, or if the problem persists, " .
         "<a href=\"/contact.php\">contact the webmasters</a>.</p>\n";
    site_footer();
    exit;
}

// An error message page for manual pages from inactive languages
function error_inactive_manual_page($lang_name, $en_page): void
{
    global $MYSITE;
    status_header(404);
    site_header('Page gone', ["noindex"]);
    echo "<h1>Page gone</h1>\n" .
         "<p>The " . htmlspecialchars($lang_name) . " manual page you are looking for (<strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong>) is no longer available.</p>\n";
    $en_url = htmlspecialchars(substr($MYSITE, 0, -1) . $en_page);
    echo "<p>The English page is available at <a href=\"{$en_url}\">{$en_url}</a></p>\n";
    echo "<p>Several other languages are also available:</p>\n";
    echo "<ul>\n";
    foreach (Languages::ACTIVE_ONLINE_LANGUAGES as $alt_lang => $alt_lang_name) {
        if ($alt_lang === "en") {
            continue;
        }
        $alt_url = htmlspecialchars(substr($MYSITE, 0, -1) . str_replace("/en/", "/{$alt_lang}/", $en_page));
        echo "<li><a href=\"{$alt_url}\">" . htmlspecialchars($alt_lang_name) . "</a></li>\n";
    }
    echo "</ul>\n";
    site_footer();
    exit;
}

// This service is not working right now
function error_noservice(): void
{
    global $MYSITE;
    site_header('Service not working', ["noindex"]);
    echo "<h1>Service not working</h1>\n" .
         "<p>The service you tried to access with <strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong> is not available on this server right now. " .
         "Please check back later, or if the problem persists, " .
         "<a href=\"/contact.php\">contact the webmasters</a>.</p>\n";
    site_footer();
    exit;
}

// There is no such mirror
function error_nomirror($mirror): void {
    site_header("No such mirror", ["noindex"]);
    echo "<h1>No such mirror</h1>\n<p>The mirror you tried to access (" .
         htmlspecialchars($mirror) .
         ") is not registered php.net mirror. Please check back later," .
         " or if the problem persists, " .
         "<a href=\"/contact.php\">contact the webmasters</a>.</p>\n";
    site_footer();
    exit;
}

// Send out a proper status header
function status_header(int $status): bool
{
    $text = [
        200 => 'OK',
        301 => 'Moved Permanently',
        302 => 'Found',
        404 => 'Not Found',
    ];
    if (!isset($text[$status])) {
        return false;
    }

    // Only respond with HTTP/1.0 for a 1.0 request specifically.
    // Respond with 1.1 for anything else.
    $proto = strcasecmp($_SERVER['SERVER_PROTOCOL'], 'HTTP/1.0') ? '1.1' : '1.0';

    @header("HTTP/$proto $status {$text[$status]}");
    @header("Status: $status {$text[$status]}", true, $status);

    return true;
}

/******************************************************************************
In the future every mirror will have SQLite instead of hacks like this. Or, some
other means like a ginormous array! But the point is we'll end up storing
everything like functions, variables, constants, common search terms, etc.

This exists today because as of PHP 5.3.0 there are over 200 links within the
php.ini files so these create nicer urls and allow language detection to work.

The most commonly searched terms have also been added.

TODO: Determine if we want to continue 301 -OR- make these official URLs.
******************************************************************************/

function is_known_ini(string $ini): ?string {
    $inis = [
        'engine' => 'apache.configuration.php#ini.engine',
        'short-open-tag' => 'ini.core.php#ini.short-open-tag',
        'asp-tags' => 'ini.core.php#ini.asp-tags',
        'precision' => 'ini.core.php#ini.precision',
        'y2k-compliance' => 'ini.core.php#ini.y2k-compliance',
        'output-buffering' => 'outcontrol.configuration.php#ini.output-buffering',
        'output-handler' => 'outcontrol.configuration.php#ini.output-handler',
        'zlib.output-compression' => 'zlib.configuration.php#ini.zlib.output-compression',
        'zlib.output-compression-level' => 'zlib.configuration.php#ini.zlib.output-compression-level',
        'zlib.output-handler' => 'zlib.configuration.php#ini.zlib.output-handler',
        'implicit-flush' => 'outcontrol.configuration.php#ini.implicit-flush',
        'allow-call-time-pass-reference' => 'ini.core.php#ini.allow-call-time-pass-reference',
        'open-basedir' => 'ini.core.php#ini.open-basedir',
        'disable-functions' => 'ini.core.php#ini.disable-functions',
        'disable-classes' => 'ini.core.php#ini.disable-classes',
        'zend.assertions' => 'ini.core.php#ini.zend.assertions',
        'syntax-highlighting' => 'misc.configuration.php#ini.syntax-highlighting',
        'ignore-user-abort' => 'misc.configuration.php#ini.ignore-user-abort',
        'realpath-cache-size' => 'ini.core.php#ini.realpath-cache-size',
        'realpath-cache-ttl' => 'ini.core.php#ini.realpath-cache-ttl',
        'expose-php' => 'ini.core.php#ini.expose-php',
        'max-execution-time' => 'info.configuration.php#ini.max-execution-time',
        'max-input-time' => 'info.configuration.php#ini.max-input-time',
        'max-input-vars' => 'info.configuration.php#ini.max-input-vars',
        'max-input-nesting-level' => 'info.configuration.php#ini.max-input-nesting-level',
        'memory-limit' => 'ini.core.php#ini.memory-limit',
        'error-reporting' => 'errorfunc.configuration.php#ini.error-reporting',
        'display-errors' => 'errorfunc.configuration.php#ini.display-errors',
        'display-startup-errors' => 'errorfunc.configuration.php#ini.display-startup-errors',
        'log-errors' => 'errorfunc.configuration.php#ini.log-errors',
        'log-errors-max-len' => 'errorfunc.configuration.php#ini.log-errors-max-len',
        'ignore-repeated-errors' => 'errorfunc.configuration.php#ini.ignore-repeated-errors',
        'ignore-repeated-source' => 'errorfunc.configuration.php#ini.ignore-repeated-source',
        'report-memleaks' => 'errorfunc.configuration.php#ini.report-memleaks',
        'track-errors' => 'errorfunc.configuration.php#ini.track-errors',
        'xmlrpc-errors' => 'errorfunc.configuration.php#ini.xmlrpc-errors',
        'html-errors' => 'errorfunc.configuration.php#ini.html-errors',
        'docref-root' => 'errorfunc.configuration.php#ini.docref-root',
        'docref-ext' => 'errorfunc.configuration.php#ini.docref-ext',
        'error-prepend-string' => 'errorfunc.configuration.php#ini.error-prepend-string',
        'error-append-string' => 'errorfunc.configuration.php#ini.error-append-string',
        'error-log' => 'errorfunc.configuration.php#ini.error-log',
        'syslog.facility' => 'errorfunc.configuration.php#ini.syslog.facility',
        'syslog.filter' => 'errorfunc.configuration.php#ini.syslog.filter',
        'syslog.ident' => 'errorfunc.configuration.php#ini.syslog.ident',
        'arg-separator.output' => 'ini.core.php#ini.arg-separator.output',
        'arg-separator.input' => 'ini.core.php#ini.arg-separator.input',
        'variables-order' => 'ini.core.php#ini.variables-order',
        'request-order' => 'ini.core.php#ini.request-order',
        'register-globals' => 'ini.core.php#ini.register-globals',
        'register-long-arrays' => 'ini.core.php#ini.register-long-arrays',
        'register-argc-argv' => 'ini.core.php#ini.register-argc-argv',
        'auto-globals-jit' => 'ini.core.php#ini.auto-globals-jit',
        'post-max-size' => 'ini.core.php#ini.post-max-size',
        'magic-quotes-gpc' => 'info.configuration.php#ini.magic-quotes-gpc',
        'magic-quotes-runtime' => 'info.configuration.php#ini.magic-quotes-runtime',
        'auto-prepend-file' => 'ini.core.php#ini.auto-prepend-file',
        'auto-append-file' => 'ini.core.php#ini.auto-append-file',
        'default-mimetype' => 'ini.core.php#ini.default-mimetype',
        'default-charset' => 'ini.core.php#ini.default-charset',
        'always-populate-raw-post-data' => 'ini.core.php#ini.always-populate-raw-post-data',
        'include-path' => 'ini.core.php#ini.include-path',
        'doc-root' => 'ini.core.php#ini.doc-root',
        'user-dir' => 'ini.core.php#ini.user-dir',
        'extension-dir' => 'ini.core.php#ini.extension-dir',
        'enable-dl' => 'info.configuration.php#ini.enable-dl',
        'cgi.force-redirect' => 'ini.core.php#ini.cgi.force-redirect',
        'cgi.redirect-status-env' => 'ini.core.php#ini.cgi.redirect-status-env',
        'cgi.fix-pathinfo' => 'ini.core.php#ini.cgi.fix-pathinfo',
        'fastcgi.impersonate' => 'ini.core.php#ini.fastcgi.impersonate',
        'cgi.rfc2616-headers' => 'ini.core.php#ini.cgi.rfc2616-headers',
        'file-uploads' => 'ini.core.php#ini.file-uploads',
        'upload-tmp-dir' => 'ini.core.php#ini.upload-tmp-dir',
        'upload-max-filesize' => 'ini.core.php#ini.upload-max-filesize',
        'allow-url-fopen' => 'filesystem.configuration.php#ini.allow-url-fopen',
        'allow-url-include' => 'filesystem.configuration.php#ini.allow-url-include',
        'from' => 'filesystem.configuration.php#ini.from',
        'user-agent' => 'filesystem.configuration.php#ini.user-agent',
        'default-socket-timeout' => 'filesystem.configuration.php#ini.default-socket-timeout',
        'auto-detect-line-endings' => 'filesystem.configuration.php#ini.auto-detect-line-endings',
        'date.timezone' => 'datetime.configuration.php#ini.date.timezone',
        'date.default-latitude' => 'datetime.configuration.php#ini.date.default-latitude',
        'date.default-longitude' => 'datetime.configuration.php#ini.date.default-longitude',
        'date.sunrise-zenith' => 'datetime.configuration.php#ini.date.sunrise-zenith',
        'date.sunset-zenith' => 'datetime.configuration.php#ini.date.sunset-zenith',
        'filter.default' => 'filter.configuration.php#ini.filter.default',
        'filter.default-flags' => 'filter.configuration.php#ini.filter.default-flags',
        'pcre.backtrack-limit' => 'pcre.configuration.php#ini.pcre.backtrack-limit',
        'pcre.recursion-limit' => 'pcre.configuration.php#ini.pcre.recursion-limit',
        'pdo-odbc.connection-pooling' => 'ref.pdo-odbc.php#ini.pdo-odbc.connection-pooling',
        'phar.readonly' => 'phar.configuration.php#ini.phar.readonly',
        'phar.require-hash' => 'phar.configuration.php#ini.phar.require-hash',
        'define-syslog-variables' => 'network.configuration.php#ini.define-syslog-variables',
        'smtp' => 'mail.configuration.php#ini.smtp',
        'smtp-port' => 'mail.configuration.php#ini.smtp-port',
        'sendmail-from' => 'mail.configuration.php#ini.sendmail-from',
        'sendmail-path' => 'mail.configuration.php#ini.sendmail-path',
        'sql.safe-mode' => 'ini.core.php#ini.sql.safe-mode',
        'odbc.default-db' => 'odbc.configuration.php#ini.uodbc.default-db',
        'odbc.default-user' => 'odbc.configuration.php#ini.uodbc.default-user',
        'odbc.default-pw' => 'odbc.configuration.php#ini.uodbc.default-pw',
        'odbc.allow-persistent' => 'odbc.configuration.php#ini.uodbc.allow-persistent',
        'odbc.check-persistent' => 'odbc.configuration.php#ini.uodbc.check-persistent',
        'odbc.max-persistent' => 'odbc.configuration.php#ini.uodbc.max-persistent',
        'odbc.max-links' => 'odbc.configuration.php#ini.uodbc.max-links',
        'odbc.defaultlrl' => 'odbc.configuration.php#ini.uodbc.defaultlrl',
        'odbc.defaultbinmode' => 'odbc.configuration.php#ini.uodbc.defaultbinmode',
        'mysql.allow-local-infile' => 'mysql.configuration.php#ini.mysql.allow-local-infile',
        'mysql.allow-persistent' => 'mysql.configuration.php#ini.mysql.allow-persistent',
        'mysql.max-persistent' => 'mysql.configuration.php#ini.mysql.max-persistent',
        'mysql.max-links' => 'mysql.configuration.php#ini.mysql.max-links',
        'mysql.default-port' => 'mysql.configuration.php#ini.mysql.default-port',
        'mysql.default-socket' => 'mysql.configuration.php#ini.mysql.default-socket',
        'mysql.default-host' => 'mysql.configuration.php#ini.mysql.default-host',
        'mysql.default-user' => 'mysql.configuration.php#ini.mysql.default-user',
        'mysql.default-password' => 'mysql.configuration.php#ini.mysql.default-password',
        'mysql.connect-timeout' => 'mysql.configuration.php#ini.mysql.connect-timeout',
        'mysql.trace-mode' => 'mysql.configuration.php#ini.mysql.trace-mode',
        'mysqli.allow-local-infile' => 'mysqli.configuration.php#ini.mysqli.allow-local-infile',
        'mysqli.max-links' => 'mysqli.configuration.php#ini.mysqli.max-links',
        'mysqli.allow-persistent' => 'mysqli.configuration.php#ini.mysqli.allow-persistent',
        'mysqli.default-port' => 'mysqli.configuration.php#ini.mysqli.default-port',
        'mysqli.default-socket' => 'mysqli.configuration.php#ini.mysqli.default-socket',
        'mysqli.default-host' => 'mysqli.configuration.php#ini.mysqli.default-host',
        'mysqli.default-user' => 'mysqli.configuration.php#ini.mysqli.default-user',
        'mysqli.default-pw' => 'mysqli.configuration.php#ini.mysqli.default-pw',
        'oci8.privileged-connect' => 'oci8.configuration.php#ini.oci8.privileged-connect',
        'oci8.max-persistent' => 'oci8.configuration.php#ini.oci8.max-persistent',
        'oci8.persistent-timeout' => 'oci8.configuration.php#ini.oci8.persistent-timeout',
        'oci8.ping-interval' => 'oci8.configuration.php#ini.oci8.ping-interval',
        'oci8.statement-cache-size' => 'oci8.configuration.php#ini.oci8.statement-cache-size',
        'oci8.default-prefetch' => 'oci8.configuration.php#ini.oci8.default-prefetch',
        'oci8.old-oci-close-semantics' => 'oci8.configuration.php#ini.oci8.old-oci-close-semantics',
        'opcache.preload' => 'opcache.configuration.php#ini.opcache.preload',
        'pgsql.allow-persistent' => 'pgsql.configuration.php#ini.pgsql.allow-persistent',
        'pgsql.auto-reset-persistent' => 'pgsql.configuration.php#ini.pgsql.auto-reset-persistent',
        'pgsql.max-persistent' => 'pgsql.configuration.php#ini.pgsql.max-persistent',
        'pgsql.max-links' => 'pgsql.configuration.php#ini.pgsql.max-links',
        'pgsql.ignore-notice' => 'pgsql.configuration.php#ini.pgsql.ignore-notice',
        'pgsql.log-notice' => 'pgsql.configuration.php#ini.pgsql.log-notice',
        'sqlite3.extension-dir' => 'sqlite3.configuration.php#ini.sqlite3.extension-dir',
        'bcmath.scale' => 'bc.configuration.php#ini.bcmath.scale',
        'browscap' => 'misc.configuration.php#ini.browscap',
        'session.save-handler' => 'session.configuration.php#ini.session.save-handler',
        'session.save-path' => 'session.configuration.php#ini.session.save-path',
        'session.use-cookies' => 'session.configuration.php#ini.session.use-cookies',
        'session.cookie-secure' => 'session.configuration.php#ini.session.cookie-secure',
        'session.use-only-cookies' => 'session.configuration.php#ini.session.use-only-cookies',
        'session.name' => 'session.configuration.php#ini.session.name',
        'session.auto-start' => 'session.configuration.php#ini.session.auto-start',
        'session.cookie-lifetime' => 'session.configuration.php#ini.session.cookie-lifetime',
        'session.cookie-path' => 'session.configuration.php#ini.session.cookie-path',
        'session.cookie-domain' => 'session.configuration.php#ini.session.cookie-domain',
        'session.cookie-httponly' => 'session.configuration.php#ini.session.cookie-httponly',
        'session.serialize-handler' => 'session.configuration.php#ini.session.serialize-handler',
        'session.gc-probability' => 'session.configuration.php#ini.session.gc-probability',
        'session.gc-divisor' => 'session.configuration.php#ini.session.gc-divisor',
        'session.gc-maxlifetime' => 'session.configuration.php#ini.session.gc-maxlifetime',
        'session.bug-compat-42' => 'session.configuration.php#ini.session.bug-compat-42',
        'session.bug-compat-warn' => 'session.configuration.php#ini.session.bug-compat-warn',
        'session.referer-check' => 'session.configuration.php#ini.session.referer-check',
        'session.entropy-length' => 'session.configuration.php#ini.session.entropy-length',
        'session.entropy-file' => 'session.configuration.php#ini.session.entropy-file',
        'session.cache-limiter' => 'session.configuration.php#ini.session.cache-limiter',
        'session.cache-expire' => 'session.configuration.php#ini.session.cache-expire',
        'session.sid-length' => 'session.configuration.php#ini.session.sid-length',
        'session.use-trans-sid' => 'session.configuration.php#ini.session.use-trans-sid',
        'session.hash-function' => 'session.configuration.php#ini.session.hash-function',
        'session.hash-bits-per-character' => 'session.configuration.php#ini.session.hash-bits-per-character',
        'session.upload-progress.enabled' => 'session.configuration.php#ini.session.upload-progress.enabled',
        'session.upload-progress.cleanup' => 'session.configuration.php#ini.session.upload-progress.cleanup',
        'session.upload-progress.prefix' => 'session.configuration.php#ini.session.upload-progress.prefix',
        'session.upload-progress.name' => 'session.configuration.php#ini.session.upload-progress.name',
        'session.upload-progress.freq' => 'session.configuration.php#ini.session.upload-progress.freq',
        'session.upload-progress.min-freq' => 'session.configuration.php#ini.session.upload-progress.min-freq',
        'url-rewriter.tags' => 'session.configuration.php#ini.url-rewriter.tags',
        'assert.active' => 'info.configuration.php#ini.assert.active',
        'assert.exception' => 'info.configuration.php#ini.assert.exception',
        'assert.warning' => 'info.configuration.php#ini.assert.warning',
        'assert.bail' => 'info.configuration.php#ini.assert.bail',
        'assert.callback' => 'info.configuration.php#ini.assert.callback',
        'assert.quiet-eval' => 'info.configuration.php#ini.assert.quiet-eval',
        'zend.enable-gc' => 'info.configuration.php#ini.zend.enable-gc',
        'com.typelib-file' => 'com.configuration.php#ini.com.typelib-file',
        'com.allow-dcom' => 'com.configuration.php#ini.com.allow-dcom',
        'com.autoregister-typelib' => 'com.configuration.php#ini.com.autoregister-typelib',
        'com.autoregister-casesensitive' => 'com.configuration.php#ini.com.autoregister-casesensitive',
        'com.autoregister-verbose' => 'com.configuration.php#ini.com.autoregister-verbose',
        'mbstring.language' => 'mbstring.configuration.php#ini.mbstring.language',
        'mbstring.internal-encoding' => 'mbstring.configuration.php#ini.mbstring.internal-encoding',
        'mbstring.http-input' => 'mbstring.configuration.php#ini.mbstring.http-input',
        'mbstring.http-output' => 'mbstring.configuration.php#ini.mbstring.http-output',
        'mbstring.encoding-translation' => 'mbstring.configuration.php#ini.mbstring.encoding-translation',
        'mbstring.detect-order' => 'mbstring.configuration.php#ini.mbstring.detect-order',
        'mbstring.substitute-character' => 'mbstring.configuration.php#ini.mbstring.substitute-character',
        'mbstring.func-overload' => 'mbstring.configuration.php#ini.mbstring.func-overload',
        'gd.jpeg-ignore-warning' => 'image.configuration.php#ini.image.jpeg-ignore-warning',
        'exif.encode-unicode' => 'exif.configuration.php#ini.exif.encode-unicode',
        'exif.decode-unicode-motorola' => 'exif.configuration.php#ini.exif.decode-unicode-motorola',
        'exif.decode-unicode-intel' => 'exif.configuration.php#ini.exif.decode-unicode-intel',
        'exif.encode-jis' => 'exif.configuration.php#ini.exif.encode-jis',
        'exif.decode-jis-motorola' => 'exif.configuration.php#ini.exif.decode-jis-motorola',
        'exif.decode-jis-intel' => 'exif.configuration.php#ini.exif.decode-jis-intel',
        'tidy.default-config' => 'tidy.configuration.php#ini.tidy.default-config',
        'tidy.clean-output' => 'tidy.configuration.php#ini.tidy.clean-output',
        'soap.wsdl-cache-enabled' => 'soap.configuration.php#ini.soap.wsdl-cache-enabled',
        'soap.wsdl-cache-dir' => 'soap.configuration.php#ini.soap.wsdl-cache-dir',
        'soap.wsdl-cache-ttl' => 'soap.configuration.php#ini.soap.wsdl-cache-ttl',
    ];

    return $inis[$ini] ?? null;
}

function is_known_variable(string $variable): ?string {
    $variables = [
        // Variables
        'globals' => 'reserved.variables.globals.php',
        '-server' => 'reserved.variables.server.php',
        '-get' => 'reserved.variables.get.php',
        '-post' => 'reserved.variables.post.php',
        '-files' => 'reserved.variables.files.php',
        '-request' => 'reserved.variables.request.php',
        '-session' => 'reserved.variables.session.php',
        '-cookie' => 'reserved.variables.cookies.php',
        '-env' => 'reserved.variables.environment.php',
        'this' => 'language.oop5.basic.php',
        'php-errormsg' => 'reserved.variables.phperrormsg.php',
        'argv' => 'reserved.variables.argv.php',
        'argc' => 'reserved.variables.argc.php',
        'http-response-header' => 'reserved.variables.httpresponseheader.php',
        'http-server-vars' => 'reserved.variables.server.php',
        'http-get-vars' => 'reserved.variables.get.php',
        'http-post-vars' => 'reserved.variables.post.php',
        'http-session-vars' => 'reserved.variables.session.php',
        'http-post-files' => 'reserved.variables.files.php',
        'http-cookie-vars' => 'reserved.variables.cookies.php',
    ];

    return $variables[ltrim($variable, '$')] ?? null;
}

function is_known_term(string $term): ?string {
    $terms = [
        '<>' => 'language.operators.comparison.php',
        '<=>' => 'language.operators.comparison.php',
        'spaceship' => 'language.operators.comparison.php',
        '==' => 'language.operators.comparison.php',
        '===' => 'language.operators.comparison.php',
        '@' => 'language.operators.errorcontrol.php',
        '__halt_compiler' => 'function.halt-compiler.php',
        '__PHP_Incomplete_Class' => 'function.unserialize.php',
        'and' => 'language.operators.logical.php',
        'apache' => 'install.php',
        'array' => 'language.types.array.php',
        'arrays' => 'language.types.array.php',
        'as' => 'control-structures.foreach.php',
        'case' => 'control-structures.switch.php',
        'catch' => 'language.exceptions.php',
        'checkbox' => 'faq.html.php',
        'class' => 'language.oop5.basic.php',
        'classes' => 'language.oop5.basic.php',
        'closures' => 'functions.anonymous.php',
        'cookie' => 'features.cookies.php',
        'date' => 'function.date.php',
        'default' => 'control-structures.switch.php',
        'do' => 'control-structures.do.while.php',
        'enddeclare' => 'control-structures.declare.php',
        'endfor' => 'control-structures.alternative-syntax.php',
        'endforeach' => 'control-structures.alternative-syntax.php',
        'endif' => 'control-structures.alternative-syntax.php',
        'endswitch' => 'control-structures.alternative-syntax.php',
        'endwhile' => 'control-structures.alternative-syntax.php',
        'exception' => 'language.exceptions.php',
        'extends' => 'language.oop5.basic.php#language.oop5.basic.extends',
        'false' => 'language.types.boolean.php',
        'file' => 'function.file.php',
        'final' => 'language.oop5.final.php',
        'finally' => 'language.exceptions.php',
        'fopen' => 'function.fopen.php',
        'for' => 'control-structures.for.php',
        'foreach' => 'control-structures.foreach.php',
        'form' => 'language.variables.external.php',
        'forms' => 'language.variables.external.php',
        'function' => 'language.functions.php',
        'gd' => 'book.image.php',
        'get' => 'reserved.variables.get.php',
        'global' => 'language.variables.scope.php',
        'globals' => 'language.variables.scope.php',
        'header' => 'function.header.php',
        'heredoc' => 'language.types.string.php#language.types.string.syntax.heredoc',
        'htaccess' => 'configuration.file.php',
        'if' => 'control-structures.if.php',
        'implements' => 'language.oop5.interfaces.php',
        'include' => 'function.include.php',
        'insteadof' => 'language.oop5.traits.php#language.oop5.traits.conflict',
        'int' => 'language.types.integer.php',
        'ip' => 'reserved.variables.server.php',
        'iterable' => 'language.types.iterable.php',
        'juggling' => 'language.types.type-juggling.php',
        'location' => 'function.header.php',
        'mail' => 'function.mail.php',
        'mixed' => 'language.types.mixed.php',
        'modulo' => 'language.operators.arithmetic.php',
        'mysql' => 'mysql.php',
        'never' => 'language.types.never.php',
        'new' => 'language.oop5.basic.php#language.oop5.basic.new',
        'nowdoc' => 'language.types.string.php#language.types.string.syntax.nowdoc',
        'null' => 'language.types.null.php',
        'numeric' => 'reserved.other-reserved-words.php',
        'object' => 'language.types.object.php',
        'operator' => 'language.operators.php',
        'operators' => 'language.operators.php',
        'or' => 'language.operators.logical.php',
        'parent' => 'reserved.classes.php#reserved.classes.special',
        'php.ini' => 'configuration.file.php',
        'php-mysql.dll' => 'book.mysql.php',
        'php-self' => 'reserved.variables.server.php',
        'query-string' => 'reserved.variables.server.php',
        'readonly' => 'language.oop5.properties.php#language.oop5.properties.readonly-properties',
        'redirect' => 'function.header.php',
        'reference' => 'index.php',
        'referer' => 'reserved.variables.server.php',
        'referrer' => 'reserved.variables.server.php',
        'remote-addr' => 'reserved.variables.server.php',
        'request' => 'reserved.variables.request.php',
        'self' => 'reserved.classes.php#reserved.classes.special',
        'session' => 'features.sessions.php',
        'smtp' => 'book.mail.php',
        'ssl' => 'book.openssl.php',
        'static' => 'language.oop5.static.php',
        'stdin' => 'wrappers.php.php',
        'string' => 'language.types.string.php',
        'superglobal' => 'language.variables.superglobals.php',
        'superglobals' => 'language.variables.superglobals.php',
        'switch' => 'control-structures.switch.php',
        'timestamp' => 'function.time.php',
        'true' => 'language.types.boolean.php',
        'try' => 'language.exceptions.php',
        'upload' => 'features.file-upload.php',
        'use' => 'language.namespaces.php',
        'void' => 'language.types.void.php',
        'xor' => 'language.operators.logical.php',
        'yield from' => 'language.generators.syntax.php#control-structures.yield.from',
        'yield' => 'language.generators.syntax.php#control-structures.yield',

        '__COMPILER_HALT_OFFSET__' => 'function.halt-compiler.php',
        'DEFAULT_INCLUDE_PATH' => 'reserved.constants.php',
        'E_ALL' => 'errorfunc.constants.php',
        'E_COMPILE_ERROR' => 'errorfunc.constants.php',
        'E_COMPILE_WARNING' => 'errorfunc.constants.php',
        'E_CORE_ERROR' => 'errorfunc.constants.php',
        'E_CORE_WARNING' => 'errorfunc.constants.php',
        'E_DEPRECATED' => 'errorfunc.constants.php',
        'E_ERROR' => 'errorfunc.constants.php',
        'E_NOTICE' => 'errorfunc.constants.php',
        'E_PARSE' => 'errorfunc.constants.php',
        'E_RECOVERABLE_ERROR' => 'errorfunc.constants.php',
        'E_STRICT' => 'errorfunc.constants.php',
        'E_USER_DEPRECATED' => 'errorfunc.constants.php',
        'E_USER_ERROR' => 'errorfunc.constants.php',
        'E_USER_NOTICE' => 'errorfunc.constants.php',
        'E_USER_WARNING' => 'errorfunc.constants.php',
        'E_WARNING' => 'errorfunc.constants.php',
        'PEAR_EXTENSION_DIR' => 'reserved.constants.php',
        'PEAR_INSTALL_DIR' => 'reserved.constants.php',
        'PHP_BINARY' => 'reserved.constants.php',
        'PHP_BINDIR' => 'reserved.constants.php',
        'PHP_CONFIG_FILE_PATH' => 'reserved.constants.php',
        'PHP_CONFIG_FILE_SCAN_DIR' => 'reserved.constants.php',
        'PHP_DATADIR' => 'reserved.constants.php',
        'PHP_DEBUG' => 'reserved.constants.php',
        'PHP_EOL' => 'reserved.constants.php',
        'PHP_EXTENSION_DIR' => 'reserved.constants.php',
        'PHP_EXTRA_VERSION' => 'reserved.constants.php',
        'PHP_FD_SETSIZE' => 'reserved.constants.php',
        'PHP_FLOAT_DIG' => 'reserved.constants.php',
        'PHP_FLOAT_EPSILON' => 'reserved.constants.php',
        'PHP_FLOAT_MAX' => 'reserved.constants.php',
        'PHP_FLOAT_MIN' => 'reserved.constants.php',
        'PHP_INT_MAX' => 'reserved.constants.php',
        'PHP_INT_MIN' => 'reserved.constants.php',
        'PHP_INT_SIZE' => 'reserved.constants.php',
        'PHP_LIBDIR' => 'reserved.constants.php',
        'PHP_LOCALSTATEDIR' => 'reserved.constants.php',
        'PHP_MAJOR_VERSION' => 'reserved.constants.php',
        'PHP_MANDIR' => 'reserved.constants.php',
        'PHP_MAXPATHLEN' => 'reserved.constants.php',
        'PHP_MINOR_VERSION' => 'reserved.constants.php',
        'PHP_OS_FAMILY' => 'reserved.constants.php',
        'PHP_OS' => 'reserved.constants.php',
        'PHP_PREFIX' => 'reserved.constants.php',
        'PHP_RELEASE_VERSION' => 'reserved.constants.php',
        'PHP_SAPI' => 'reserved.constants.php',
        'PHP_SHLIB_SUFFIX' => 'reserved.constants.php',
        'PHP_SYSCONFDIR' => 'reserved.constants.php',
        'PHP_VERSION_ID' => 'reserved.constants.php',
        'PHP_VERSION' => 'reserved.constants.php',
        'PHP_WINDOWS_EVENT_CTRL_BREAK' => 'reserved.constants.php',
        'PHP_WINDOWS_EVENT_CTRL_C' => 'reserved.constants.php',
        'PHP_ZTS' => 'reserved.constants.php',
    ];

    return $terms[$term] ?? null;
}

/*
Search snippet provider: A dirty proof-of-concept:
    This will probably live in sqlite one day, and be more intelligent (tagging?)
    This is a 100% hack currently, and let's hope temporary does not become permanent (Hello year 2014!)
    And this is English only today... we should add translation support via the manual, generated by PhD

    This really is a proof-of-concept, where the choices below are the most popular searched terms at php.net
    It should also take into account vague searches, such as 'global' and 'str'. The search works well enough for,
    most terms, so something like $_SERVER isn't really needed but it's defined below anyways...
*/
function is_known_snippet(string $term): ?string {
    $snippets = [
        'global' => '
		The <b>global</b> keyword is used to manipulate <a href="/language.variables.scope">variable scope</a>, and
		there is also the concept of <a href="/language.variables.superglobals">super globals</a> in PHP,
		which are special variables with a global scope.',
        'string' => '
		There is the <a href="/language.types.string">string type</a>, which is a scalar,
		and also many <a href="/ref.strings">string functions.</a>',
        'str' => '
		Many <a href="/ref.strings">string functions</a> begin with <b>str</b>,
		and there is also the <a href="/language.types.string">string type</a>.',
        '_server' => '
		<a href="/reserved.variables.server">$_SERVER</a>
		is a <a href="/language.variables.superglobals">super global</a>,
		and is home to many predefined variables that are typically provided by a web server',
        'class' => '
		A <a href="/language.oop5">class</a> is an OOP (Object Oriented Programming) concept,
		and PHP is both a procedural and OOP friendly language.',
        'function' => '
		PHP contains thousands of functions. You might be interested in how a
		<a href="/language.functions">function is defined</a>, or
		<a href="/about.prototypes">how to read a function prototype</a>.
		See also the list of <a href="/extensions">PHP extensions</a>',
    ];

    $term = ltrim(strtolower(trim($term)), '$');
    return $snippets[$term] ?? null;
}

/**
 * @param string $uri
 * @return array<string, string>
 */
function get_legacy_manual_urls(string $uri): array
{
    $filename = $_SERVER["DOCUMENT_ROOT"] . "/manual/legacyurls.json";
    $pages_ids = json_decode(file_get_contents($filename), true);
    $page_id = preg_replace_callback('/^manual\/[a-z_A-Z]+\/(.*?)(\.php)?$/', function (array $matches): string {
        if (count($matches) < 2) {
            return '';
        }
        return $matches[1];
    }, $uri);

    if (!isset($pages_ids[$page_id])) {
        return [];
    }

    $legacy_urls = [];
    foreach ($pages_ids[$page_id] as $php_version) {
        $legacy_urls[$php_version] = convert_manual_uri_to_legacy($uri, $php_version);
    }

    return $legacy_urls;
}

/**
 * @param array<string, string> $legacy_urls URLs to legacy manuals, indexed by major PHP version
 */
function fallback_to_legacy_manuals(array $legacy_urls): void
{
    global $MYSITE;
    status_header(404);
    site_header('404 Not Found', ["noindex"]);

    $original_url = htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']);
    $legacy_links = '';
    foreach ($legacy_urls as $php_version => $url) {
        $legacy_links .= '<li><a href="' . htmlspecialchars($url) . '">PHP ' . $php_version . ' legacy manual</a></li>';
    }

    echo <<<HTML
<h1>Not Found</h1>
<p>The manual page you are looking for (<strong>$original_url</strong>) is not available.</p>

<p>However, this page exists in a legacy manual for the following PHP versions.</p>
<ul id="legacy-links">$legacy_links</ul>
<p>Please note that legacy manuals are maintained by Zend and not the PHP Documentation Group. Any questions about their content should be reported via the "Report a Bug" links on the appropriate pages.</p>

<p>If you were looking for this page in the current PHP version and believe this to be a mistake, please check back later, or if the problem persists, <a href="/contact.php">contact the webmasters</a>.</p>
HTML;

    site_footer();
    exit;
}

function convert_manual_uri_to_legacy(string $uri, int $php_version): string
{
    $parts = explode('/', $uri);

    return sprintf('https://php-legacy-docs.zend.com/manual/php%s/%s/%s', $php_version, $parts[1], $parts[2]);
}
