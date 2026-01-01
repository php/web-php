<?php
/*

 This script handles all 401, 403 and 404 error redirects,
 and some directory requests (like /images). Uses the
 preferred language setting and the REQUEST_URI to guess what
 page should be displayed. In case there is no page that can
 be displayed, the user is redirected to a search page.

*/

use phpweb\I18n\Languages;
use phpweb\UserPreferences;

// Ensure that our environment is set up
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/errors.inc';

// Get URI for this request, strip leading slash
// See langchooser.inc for more info on STRIPPED_URI
$URI = substr($_SERVER['STRIPPED_URI'], 1);
$queryString = $_SERVER['QUERY_STRING'] ?? '';

// ============================================================================
// Mozilla Search Sidebar plugin resource file handling (need to be mirror
// dependent, so the search results will show up in the sidebar)
if ($URI == 'phpnetsearch.src') {
    status_header(200);
    include_once __DIR__ . '/include/mozsearch.inc';
    exit;
}
// FIXME: Nuke the old firefox search plugin
if ($URI == 'phpnetimprovedsearch.src') {
    status_header(200);
    include_once __DIR__ . '/include/mozopensearch.inc';
    exit;
}

// ============================================================================
// BC: handle bugs.php moved completely to bugs.php.net
if (preg_match("!^bugs.php\\?(.+)$!", $URI, $array)) {
    mirror_redirect("https://bugs.php.net/?$array[1]");
}

// ============================================================================
// FC: handle advisories
if (preg_match("!^security/advisories/PHPSA-(\\d+)\\.php$!", $URI, $array)) {
    status_header(200);
    $_GET["id"] = $array[1];
    include_once __DIR__ . '/security/index.php';
    exit;
}

// ============================================================================
// Omit query string from URL and urldecode special chars
$URI = urldecode(preg_replace("!(\\?.*$)!", "", $URI));

// ============================================================================
// An empty URI is useless at this point, so let's give them the search page
if (empty($URI)) {
    mirror_redirect("/search.php");
}

// ============================================================================
// Perform a redirect for manual figures, other images display a 404 automatically
if (preg_match("!^manual/(\\w+)/(print|printwn)/figures/(.+)$!", $URI, $parts)) {
    mirror_redirect("/manual/$parts[1]/figures/$parts[3]");
} elseif (preg_match("!\\.(pdf|gif|jpg|png)$!i", $URI)) {
    error_404();
}

// ============================================================================
// BC: handle .php3 files that were renamed to .php
if (preg_match("!(.*\\.php)3$!", $URI, $array)) {
    mirror_redirect("/$array[1]");
}

// ============================================================================
// BC: handle moving english manual down into its own directory (also supports
//     default language manual accessibility on mirror sites through /manual/filename)
// @todo do we rely on this? how about removing it...
if (preg_match("!^manual/([^/]*)$!", $URI, $array)) {
    if (!isset(Languages::INACTIVE_ONLINE_LANGUAGES[$array[1]])) {
        mirror_redirect("/manual/$LANG/$array[1]");
    }
} elseif (preg_match("!^manual/html/([^/]+)$!", $URI, $array)) {
    $array[1] = preg_replace("!.html$!", ".php", $array[1]);
    mirror_redirect("/manual/$LANG/$array[1]");
}

// ============================================================================
// BC: News archive moved to subfolder
if (preg_match("!^news-(\\d+)(\\.|$)!", $URI, $array)) {
    mirror_redirect("/archive/$array[1].php");
}

// ============================================================================
// BC: Release files moved to subfolder
if (preg_match("!^release_([^\\.]+)(\\.php$|$)!", $URI, $array)) {
    mirror_redirect("/releases/$array[1].php");
}

// ============================================================================
// BC: Printer friendly manual page handling was separate previously, but we
// only need to redirect the old URLs now. Our pages are now printer friendly
// by design.
if (preg_match("!^manual/(\\w+)/(print|printwn|html)((/.+)|$)!", $URI, $array)) {
    $array[3] = preg_replace("!.html$!", ".php", $array[3]);
    mirror_redirect("/manual/$array[1]$array[3]");
}

// ============================================================================
// If someone is looking for something in distributions/* and it isn't there,
// send them to the /releases page since that is likely to be most helpful.
if (preg_match("!^distributions/.*!", $URI, $array)) {
    status_header(404);
    include_once __DIR__ . "/releases/index.php";
}

// ============================================================================
// The trailing slash only causes problems from now on
$URI = rtrim($URI, '/');

// ============================================================================
// Some nice URLs for getting something for download
if (preg_match("!^get/([^/]+)$!", $URI, $what)) {
    switch ($what[1]) {
        case "php":
            $URI = "downloads";
            break;
        case "docs": // intentional
        case "documentation":
            $URI = "download-docs";
            break;
    }
}

// ============================================================================
// Nice URLs for download files, so wget works completely well with download links
if (preg_match("!^get/([^/]+)/from/([^/]+)(/mirror)?$!", $URI, $dlinfo)) {

    $df = $dlinfo[1];
    if (strpos($df, "7-LATEST") !== false) {
        include_once __DIR__ . "/include/version.inc";
        [$latest] = release_get_latest();
        $df = str_replace("7-LATEST", $latest, $df);
    }

    $mr = "https://www.php.net/";

    // Check if that mirror really exists if not, bail out
    if (!isset($MIRRORS[$mr])) {
        error_nomirror($mr);
        exit;
    }

    // Start the download process
    include __DIR__ . "/include/do-download.inc";
    $filename = get_actual_download_file($df);
    if ($filename) {
        status_header(200);
        download_file($mr, $filename);
    } else {
        status_header(404);
        /* The file didn't exist on this server.. ask the user to pick another mirror */
        include __DIR__ . "/include/get-download.inc";
    }
    exit;
}

// php.net/42 --> likely a bug number
if (is_numeric($URI)) {
    mirror_redirect("https://bugs.php.net/bug.php?id=$URI");
}

// php.net/GH-123 -> php-src GH issue #123
if (preg_match('/^GH-(\d+)$/', $URI, $matches)) {
    mirror_redirect("https://github.com/php/php-src/issues/" . $matches[1]);
}

// php.net/supported-versions.PHP -> supported-versions.php
if ($URI == 'supported-versions.PHP') {
    mirror_redirect("https://www.php.net/supported-versions.php");
}


// ============================================================================
// Redirect if the entered URI was a PHP page name (except some pages,
// which we display in the mirror's language or the explicitly specified
// language [see below])
if (!in_array($URI, ['mirror-info', 'error', 'mod'], true) &&
    file_exists($_SERVER['DOCUMENT_ROOT'] . "/$URI.php")) {
    mirror_redirect("/$URI.php");
}

// Work with lowercased URI from now
$URI = strtolower($URI);

// Redirection hack, see error.inc for detailed description
// These expect -foo not _foo
$term = str_replace('_', '-', $URI);

if ($path = is_known_ini($term)) {
    status_header(301);
    mirror_redirect("/manual/$LANG/$path");
    exit;
}
if ($path = is_known_variable($term)) {
    status_header(301);
    mirror_redirect("/manual/$LANG/$path");
    exit;
}
if ($path = is_known_term($term)) {
    status_header(301);
    mirror_redirect("/manual/$LANG/$path");
    exit;
}

// ============================================================================
// Major manual page modifications (need to handle shortcuts and pages in all languages)
// Used permanent HTTP redirects, so search engines will be able to pick up the correct
// new URLs for these pages.
$manual_page_moves = [
    // entry point changed
    'installation' => 'install',

    // XML Id changed (see https://github.com/php/doc-en/commit/0d51ca45814bbc60d7a1e6cf6fc7213f0b49c8d5)
    'enum.random.intervalboundary' => 'enum.random-intervalboundary',
    'enum.random.intervalboundary.intro' => 'enum.random-intervalboundary.intro',
    'enum.random.intervalboundary.synopsis' => 'enum.random-intervalboundary.synopsis',

    // was split among platforms (don't know where to redirect)
    'install.apache' => 'install',
    'install.apache2' => 'install',
    'install.netscape-enterprise' => 'install',
    'install.otherhttpd' => 'install',

    // moved to platform sections
    'install.caudium' => 'install.unix.caudium',
    'install.commandline' => 'install.unix.commandline',
    'install.fhttpd' => 'install.unix.fhttpd',
    'install.hpux' => 'install.unix.hpux',
    'install.iis' => 'install.windows.iis',
    'install.linux' => 'install.unix',
    'install.omnihttpd' => 'install.windows.omnihttpd',
    'install.openbsd' => 'install.unix.openbsd',
    'install.sambar' => 'install.windows.sambar',
    'install.solaris' => 'install.unix.solaris',
    'install.xitami' => 'install.windows.xitami',
    'install.windows.installer.msi' => 'install.windows',
    'install.windows.installer' => 'install.windows',

    // Internals docs where moved
    'zend' => 'internals2.ze1.zendapi',
    'zend-api' => 'internals2.ze1.zendapi',
    'internals.pdo' => 'internals2.pdo',
    'phpdevel' => 'internals2.ze1.php3devel',
    'tsrm' => 'internals2.ze1.tsrm',

    // Replaced extensions
    'aspell' => 'pspell',

    // Refactored
    'regexp.reference' => 'regexp.introduction',
    "security" => "manual/security",

    // MongoDB converted from set to book
    'set.mongodb' => 'book.mongodb',
    'mongodb.installation.homebrew' => 'mongodb.installation#mongodb.installation.homebrew',
    'mongodb.installation.manual' => 'mongodb.installation#mongodb.installation.manual',
    'mongodb.installation.pecl' => 'mongodb.installation#mongodb.installation.pecl',
    'mongodb.installation.windows' => 'mongodb.installation#mongodb.installation.windows',
    'mongodb.persistence.deserialization' => 'mongodb.persistence#mongodb.persistence.deserialization',
    'mongodb.persistence.serialization' => 'mongodb.persistence#mongodb.persistence.serialization',
];

if (isset($manual_page_moves[$URI])) {
    status_header(301);
    mirror_redirect("/" . $manual_page_moves[$URI]);
} elseif (preg_match("!^manual/([^/]+)/([^/]+).php$!", $URI, $match) &&
          isset($manual_page_moves[$match[2]])) {
    status_header(301);

    $parts = explode('#', $manual_page_moves[$match[2]], 2);
    if (count($parts) === 1) {
        mirror_redirect("/manual/{$match[1]}/{$parts[0]}.php");
    } else {
        mirror_redirect("/manual/{$match[1]}/{$parts[0]}.php#{$parts[1]}");
    }
}

$manual_redirections = [
    'class.oci-lob' => 'class.ocilob',
    'oci-lob.append' => 'ocilob.append',
    'oci-lob.close' => 'ocilob.close',
    'oci-lob.eof' => 'ocilob.eof',
    'oci-lob.erase' => 'ocilob.erase',
    'oci-lob.export' => 'ocilob.export',
    'oci-lob.flush' => 'ocilob.flush',
    'oci-lob.free' => 'ocilob.free',
    'oci-lob.getbuffering' => 'ocilob.getbuffering',
    'oci-lob.import' => 'ocilob.import',
    'oci-lob.load' => 'ocilob.load',
    'oci-lob.read' => 'ocilob.read',
    'oci-lob.rewind' => 'ocilob.rewind',
    'oci-lob.save' => 'ocilob.save',
    'oci-lob.seek' => 'ocilob.seek',
    'oci-lob.setbuffering' => 'ocilob.setbuffering',
    'oci-lob.size' => 'ocilob.size',
    'oci-lob.tell' => 'ocilob.tell',
    'oci-lob.truncate' => 'ocilob.truncate',
    'oci-lob.write' => 'ocilob.write',
    'oci-lob.writetemporary' => 'ocilob.writetemporary',
    'class.oci-collection' => 'class.ocicollection',
    'oci-collection.append' => 'ocicollection.append',
    'oci-collection.assign' => 'ocicollection.assign',
    'oci-collection.assignelem' => 'ocicollection.assignelem',
    'oci-collection.free' => 'ocicollection.free',
    'oci-collection.getelem' => 'ocicollection.getelem',
    'oci-collection.max' => 'ocicollection.max',
    'oci-collection.size' => 'ocicollection.size',
    'oci-collection.trim' => 'ocicollection.trim',
    'splstack.setiteratormode' => 'spldoublylinkedlist.setiteratormode',
    'splqueue.setiteratormode' => 'spldoublylinkedlist.setiteratormode',
    'class.allow-dynamic-properties' => 'class.allowdynamicproperties',
    'class.return-type-will-change' => 'class.returntypewillchange',
    'class.sensitive-parameter' => 'class.sensitiveparameter',
    'function.curl-file-create' => 'curlfile.construct',
    'simplexmliterator.current' => 'simplexmlelement.current',
    'simplexmliterator.getchildren' => 'simplexmlelement.getchildren',
    'simplexmliterator.haschildren' => 'simplexmlelement.haschildren',
    'simplexmliterator.key' => 'simplexmlelement.key',
    'simplexmliterator.next' => 'simplexmlelement.next',
    'simplexmliterator.rewind' => 'simplexmlelement.rewind',
    'simplexmliterator.valid' => 'simplexmlelement.valid',
];

if (preg_match("!^manual/([^/]+)/([^/]+?)(?:\.php)?$!", $URI, $match) && isset($manual_redirections[$match[2]])) {
    status_header(301);
    mirror_redirect("/manual/$match[1]/" . $manual_redirections[$match[2]]);
}

// ============================================================================
// Define shortcuts for PHP files, manual pages and external redirects
$uri_aliases = [

    # PHP page shortcuts
    "download" => "downloads",
    "getphp" => "downloads",
    "getdocs" => "download-docs",
    "documentation" => "docs",
    "mailinglists" => "mailing-lists",
    "mailinglist" => "mailing-lists",
    "changelog" => "ChangeLog-8",
    "gethelp" => "support",
    "help" => "support",
    "unsubscribe" => "unsub",
    "subscribe" => "mailing-lists",
    "logos" => "download-logos",

    # manual shortcuts
    "intro" => "introduction",
    "whatis" => "introduction",
    "whatisphp" => "introduction",
    "what_is_php" => "introduction",
    "composer" => "install.composer.intro",

    "windows" => "install.windows",
    "win32" => "install.windows",

    "globals" => "language.variables.predefined",
    "register_globals" => "security.globals",
    "registerglobals" => "security.globals",
    "manual/en/security.registerglobals.php" => "security.globals", // fix for 4.3.8 configure
    "magic_quotes" => "security.magicquotes",
    "magicquotes" => "security.magicquotes",
    "gd" => "image",
    "bcmath" => "bc",
    'streams' => 'book.stream',
    "mongodb" => "book.mongodb",
    "hrtime" => "function.hrtime", // Prefer function over PECL ext

    "callback" => "language.pseudo-types",
    "number" => "language.pseudo-types",
    "mixed" => "language.pseudo-types",
    "bool" => "language.types.boolean",
    "boolean" => "language.types.boolean",
    "int" => "language.types.integer",
    "integer" => "language.types.integer",
    "float" => "language.types.float",
    "string" => "language.types.string",
    "heredoc" => "language.types.string",
    "<<<" => "language.types.string",
    "object" => "language.types.object",
    "null" => "language.types.null",
    'callable' => 'language.types.callable',

    "htaccess" => "configuration.changes",
    "php_value" => "configuration.changes",

    "ternary" => "language.operators.comparison",
    "instanceof" => "language.operators.type",
    "if" => "language.control-structures",
    "static" => "language.variables.scope",
    "global" => "language.variables.scope",
    "@" => "language.operators.errorcontrol",
    "&" => "language.references",
    "**" => "language.operators.arithmetic",
    "..." => "functions.arguments",
    "splat" => "functions.arguments",
    "arrow" => "functions.arrow",
    "fn" => "functions.arrow",
    "pipe" => "operators.functional",
    "|>" => "operators.functional",
    // ?:, ??, ??=
    // These shortcuts can not be captured here since they
    // don't actually produce a 404 error.
    // Instead, we have a small check in index.php directly.

    "dowhile" => "control-structures.do.while",

    "tut" => "tutorial",
    "tut.php" => "tutorial", // BC

    "faq.php" => "faq",      // BC
    "bugs.php" => "bugs",     // BC
    "bugstats.php" => "bugstats", // BC
    "docs-echm.php" => "download-docs", // BC

    "odbc" => "uodbc", // BC

    "links" => "support", // BC
    "links.php" => "support", // BC
    "oracle" => "oci8",
    "cli" => "features.commandline",

    "oop" => "language.oop5",
    "enum" => "language.enumerations",
    "enums" => "language.enumerations",

    "const" => "language.constants.syntax",
    "class" => "language.oop5.basic",
    "new" => "language.oop5.basic",
    "extends" => "language.oop5.basic",
    "clone" => "language.oop5.cloning",
    "construct" => "language.oop5.decon",
    "destruct" => "language.oop5.decon",
    "public" => "language.oop5.visibility",
    "private" => "language.oop5.visibility",
    "protected" => "language.oop5.visibility",
    "var" => "language.oop5.visibility",
    "abstract" => "language.oop5.abstract",
    "interface" => "language.oop5.interfaces",
    "interfaces" => "language.oop5.interfaces",
    "autoload" => "language.oop5.autoload",
    "__autoload" => "language.oop5.autoload",
    "language.oop5.reflection" => "book.reflection", // BC
    "::" => "language.oop5.paamayim-nekudotayim",

    "__construct" => "language.oop5.decon",
    "__destruct" => "language.oop5.decon",
    "__call" => "language.oop5.overloading",
    "__callstatic" => "language.oop5.overloading",
    "__get" => "language.oop5.overloading",
    "__set" => "language.oop5.overloading",
    "__isset" => "language.oop5.overloading",
    "__unset" => "language.oop5.overloading",
    "__sleep" => "language.oop5.magic",
    "__wakeup" => "language.oop5.magic",
    "__tostring" => "language.oop5.magic",
    "__invoke" => "language.oop5.magic",
    "__set_state" => "language.oop5.magic",
    "__debuginfo" => "language.oop5.magic",
    "__clone" => "language.oop5.cloning",

    "throw" => "language.exceptions",
    "try" => "language.exceptions",
    "catch" => "language.exceptions",
    "lsb" => "language.oop5.late-static-bindings",
    "namespace" => "language.namespaces",
    "use" => "language.namespaces.using",

    "factory" => "language.oop5.patterns",
    "singleton" => "language.oop5.patterns",

    "trait" => "language.oop5.traits",
    "traits" => "language.oop5.traits",

    "news.php" => "archive/index", // BC
    "readme.mirror" => "mirroring", // BC

    "php5" => "language.oop5",
    "zend_changes.txt" => "language.oop5", // BC
    "zend2_example.phps" => "language.oop5", // BC
    "zend_changes_php_5_0_0b2.txt" => "language.oop5", // BC
    "zend-engine-2" => "language.oop5", // BC
    "zend-engine-2.php" => "language.oop5", // BC

    "news_php_5_0_0b2.txt" => "ChangeLog-5", // BC
    "news_php_5_0_0b3.txt" => "ChangeLog-5", // BC

    "manual/about-notes.php" => "manual/add-note",   // BC
    "software/index.php" => "software",          // BC
    "releases.php" => "releases/index",    // BC

    "migration7" => "migration70",      // Consistent with migration5
    "update_5_2.txt" => "migration52",      // BC
    "readme_upgrade_51.php" => "migration51",      // BC
    "internals" => "internals2",       // BC
    "configuration.directives" => "ini.core",       // BC

    # regexp. BC
    "regexp.reference.backslash" => "regexp.reference.escape",
    "regexp.reference.circudollar" => "regexp.reference.anchors",
    "regexp.reference.squarebrackets" => "regexp.reference.character-classes",
    "regexp.reference.verticalbar" => "regexp.reference.alternation",

    # external shortcut aliases ;)
    "dochowto" => "phpdochowto",

    # CVS -> SVN
    "anoncvs.php" => "git",
    "cvs-php.php" => "git-php",

    # SVN -> Git
    "svn" => "git",
    "svn.php" => "git",
    "svn-php" => "git-php",
    "svn-php.php" => "git-php",

    # CVSUp -> Nada
    "cvsup" => "mirroring",

    # Other items
    "security/crypt" => "security/crypt_blowfish",

    # Bugfixes
    "array_sort" => "sort", // #64743
    "array-sort" => "sort", // #64743

    # Removed pages
    "tips.php" => "urlhowto",
    "tips" => "urlhowto",
    "release-candidates.php" => "pre-release-builds",
];

$external_redirects = [
    "php4news" => "https://github.com/php/php-src/raw/PHP-4.4/NEWS",
    "php5news" => "https://github.com/php/php-src/raw/PHP-5.6/NEWS",
    "php53news" => "https://github.com/php/php-src/raw/PHP-5.3/NEWS",
    "php54news" => "https://github.com/php/php-src/raw/PHP-5.4/NEWS",
    "php55news" => "https://github.com/php/php-src/raw/PHP-5.5/NEWS",
    "php56news" => "https://github.com/php/php-src/raw/PHP-5.6/NEWS",
    "php70news" => "https://github.com/php/php-src/raw/PHP-7.0/NEWS",
    "php71news" => "https://github.com/php/php-src/raw/PHP-7.1/NEWS",
    "php72news" => "https://github.com/php/php-src/raw/PHP-7.2/NEWS",
    "php73news" => "https://github.com/php/php-src/raw/PHP-7.3/NEWS",
    "php74news" => "https://github.com/php/php-src/raw/PHP-7.4/NEWS",
    "php80news" => "https://github.com/php/php-src/raw/PHP-8.0/NEWS",
    "phptrunknews" => "https://github.com/php/php-src/raw/master/NEWS",
    "pear" => "https://pear.php.net/",
    "bugs" => "https://bugs.php.net/",
    "bugstats" => "https://bugs.php.net/stats.php",
    "phpdochowto" => "https://doc.php.net/guide/",
    "rev" => "https://doc.php.net/revcheck.php?p=graph&lang=$LANG",
    "release/5_3_0.php" => "/releases/5_3_0.php", // PHP 5.3.0 release announcement had a typo
    "ideas.php" => "https://wiki.php.net/ideas", // BC
    "releases.atom" => "/releases/feed.php", // BC, No need to pre-generate it
    "spec" => "https://github.com/php/php-langspec",
    "sunglasses" => "https://www.youtube.com/watch?v=dQw4w9WgXcQ", // Temporary easter egg for bug#66144
];

// Temporary hack to fix bug #49956 for mysqli -- Please don't hate me for this. Data taken from mysqli/summary.xml
$mysqli_redirects = [
    "mysqli_affected_rows" => "mysqli.affected-rows",
    "mysqli_get_client_version" => "mysqli.client-version",
    "mysqli_connect_errno" => "mysqli.connect-errno",
    "mysqli_connect_error" => "mysqli.connect-error",
    "mysqli_errno" => "mysqli.errno",
    "mysqli_error" => "mysqli.error",
    "mysqli_field_count" => "mysqli.field-count",
    "mysqli_get_host_info" => "mysqli.host-info",
    "mysqli_get_proto_info" => "mysqli.protocol-version",
    "mysqli_get_server_version" => "mysqli.server-version",
    "mysqli_info" => "mysqli.info",
    "mysqli_insert_id" => "mysqli.insert-id",
    "mysqli_sqlstate" => "mysqli.sqlstate",
    "mysqli_warning_count" => "mysqli.warning-count",
    "mysqli_autocommit" => "mysqli.autocommit",
    "mysqli_change_user" => "mysqli.change-user",
    "mysqli_character_set_name" => "mysqli.character-set-name",
    "mysqli_close" => "mysqli.close",
    "mysqli_commit" => "mysqli.commit",
    "mysqli_connect" => "mysqli.construct",
    "mysqli_debug" => "mysqli.debug",
    "mysqli_dump_debug_info" => "mysqli.dump-debug-info",
    "mysqli_get_charset" => "mysqli.get-charset",
    "mysqli_get_connection_stats" => "mysqli.get-connection-stats",
    "mysqli_get_client_info" => "mysqli.get-client-info",
    "mysqli_get_client_stats" => "mysqli.get-client-stats",
    "mysqli_get_cache_stats" => "mysqli.get-cache-stats",
    "mysqli_get_server_info" => "mysqli.get-server-info",
    "mysqli_get_warnings" => "mysqli.get-warnings",
    "mysqli_init" => "mysqli.init",
    "mysqli_kill" => "mysqli.kill",
    "mysqli_more_results" => "mysqli.more-results",
    "mysqli_multi_query" => "mysqli.multi-query",
    "mysqli_next_result" => "mysqli.next-result",
    "mysqli_options" => "mysqli.options",
    "mysqli_ping" => "mysqli.ping",
    "mysqli_prepare" => "mysqli.prepare",
    "mysqli_query" => "mysqli.query",
    "mysqli_real_connect" => "mysqli.real-connect",
    "mysqli_real_escape_string" => "mysqli.real-escape-string",
    "mysqli_real_query" => "mysqli.real-query",
    "mysqli_refresh" => "mysqli.refresh",
    "mysqli_rollback" => "mysqli.rollback",
    "mysqli_select_db" => "mysqli.select-db",
    "mysqli_set_charset" => "mysqli.set-charset",
    "mysqli_set_local_infile_default" => "mysqli.set-local-infile-default",
    "mysqli_set_local_infile_handler" => "mysqli.set-local-infile-handler",
    "mysqli_ssl_set" => "mysqli.ssl-set",
    "mysqli_stat" => "mysqli.stat",
    "mysqli_stmt_init" => "mysqli.stmt-init",
    "mysqli_store_result" => "mysqli.store-result",
    "mysqli_thread_id" => "mysqli.thread-id",
    "mysqli_thread_safe" => "mysqli.thread-safe",
    "mysqli_use_result" => "mysqli.use-result",
    "mysqli_stmt_affected_rows" => "mysqli-stmt.affected-rows",
    "mysqli_stmt_errno" => "mysqli-stmt.errno",
    "mysqli_stmt_error" => "mysqli-stmt.error",
    "mysqli_stmt_field_count" => "mysqli-stmt.field-count",
    "mysqli_stmt_insert_id" => "mysqli-stmt.insert-id",
    "mysqli_stmt_param_count" => "mysqli-stmt.param-count",
    "mysqli_stmt_sqlstate" => "mysqli-stmt.sqlstate",
    "mysqli_stmt_attr_get" => "mysqli-stmt.attr-get",
    "mysqli_stmt_attr_set" => "mysqli-stmt.attr-set",
    "mysqli_stmt_bind_param" => "mysqli-stmt.bind-param",
    "mysqli_stmt_bind_result" => "mysqli-stmt.bind-result",
    "mysqli_stmt_close" => "mysqli-stmt.close",
    "mysqli_stmt_data_seek" => "mysqli-stmt.data-seek",
    "mysqli_stmt_execute" => "mysqli-stmt.execute",
    "mysqli_stmt_fetch" => "mysqli-stmt.fetch",
    "mysqli_stmt_free_result" => "mysqli-stmt.free-result",
    "mysqli_stmt_get_result" => "mysqli-stmt.get-result",
    "mysqli_stmt_get_warnings" => "mysqli-stmt.get-warnings",
    "mysqli_stmt_more_results" => "mysqli-stmt.more-results",
    "mysqli_stmt_next_result" => "mysqli-stmt.next-result",
    "mysqli_stmt_num_rows" => "mysqli-stmt.num-rows",
    "mysqli_stmt_prepare" => "mysqli-stmt.prepare",
    "mysqli_stmt_reset" => "mysqli-stmt.reset",
    "mysqli_stmt_result_metadata" => "mysqli-stmt.result-metadata",
    "mysqli_stmt_send_long_data" => "mysqli-stmt.send-long-data",
    "mysqli_stmt_store_result" => "mysqli-stmt.store-result",
    "mysqli_field_tell" => "mysqli-result.current-field",
    "mysqli_num_fields" => "mysqli-result.field-count",
    "mysqli_fetch_lengths" => "mysqli-result.lengths",
    "mysqli_num_rows" => "mysqli-result.num-rows",
    "mysqli_data_seek" => "mysqli-result.data-seek",
    "mysqli_fetch_all" => "mysqli-result.fetch-all",
    "mysqli_fetch_array" => "mysqli-result.fetch-array",
    "mysqli_fetch_assoc" => "mysqli-result.fetch-assoc",
    "mysqli_fetch_field_direct" => "mysqli-result.fetch-field-direct",
    "mysqli_fetch_field" => "mysqli-result.fetch-field",
    "mysqli_fetch_fields" => "mysqli-result.fetch-fields",
    "mysqli_fetch_object" => "mysqli-result.fetch-object",
    "mysqli_fetch_row" => "mysqli-result.fetch-row",
    "mysqli_field_seek" => "mysqli-result.field-seek",
    "mysqli_free_result" => "mysqli-result.free",
    "mysqli_embedded_server_end" => "mysqli-driver.embedded-server-end",
    "mysqli_embedded_server_start" => "mysqli-driver.embedded-server-start",
];

// Merge this temporary hack with $uri_aliases so it'll be treated as such
$uri_aliases = array_merge($uri_aliases, $mysqli_redirects);

// ============================================================================
// "Rewrite" the URL, if it was a shortcut

if (isset($uri_aliases[$URI])) {
    $URI = $uri_aliases[$URI];
    /* If it was a page alias, redirect right away */
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/$URI.php")) {
        $target = "/$URI.php";
        if ($queryString !== '') {
            $target .= (strpos($target, '?') === false ? '?' : '&') . $queryString;
        }
        mirror_redirect($target);
    }
}

// ============================================================================
// Execute external redirect if a rule exists for the URI
if (isset($external_redirects[$URI])) {
    mirror_redirect($external_redirects[$URI]);
}

// Temporary hack for mirror-info, until all the pages
// will be capable of being included from anywhere
if ($URI == 'mirror-info') {
    status_header(200);
    include_once __DIR__ . "/$URI.php";
    exit;
}

// ============================================================================
// Try to find the page using the preferred language as a manual page
include_once __DIR__ . "/include/manual-lookup.inc";
$try = find_manual_page($LANG, $URI);
if ($try) {
    status_header(200);
    include_once __DIR__ . $try;
    exit;
}
// BC. The class methods are now classname.methodname
if (preg_match("!^manual/(.+)/function\.(.+)-(.+).php$!", $URI, $array)) {
    $try = find_manual_page($array[1], $array[2] . "." . $array[3]);
    if ($try) {
        status_header(301);
        mirror_redirect($try);
        exit;
    }
}

// ============================================================================
// For manual pages for inactive languages, point visitors to the English page
if (preg_match("!^manual/([^/]+)/([^/]+).php$!", $URI, $match) &&
    isset(Languages::INACTIVE_ONLINE_LANGUAGES[$match[1]])) {
    $try = find_manual_page("en", $match[2]);
    if ($try) {
        error_inactive_manual_page(Languages::INACTIVE_ONLINE_LANGUAGES[$match[1]], $try);
    }
}

// ============================================================================
// 404 page for manual pages (eg. not built language)
if (strpos($URI, "manual/") === 0) {
    $legacy_manual_urls = get_legacy_manual_urls($URI);
    if (count($legacy_manual_urls) > 0) {
        fallback_to_legacy_manuals($legacy_manual_urls);
    }
    error_404_manual();
}

// ============================================================================
// If no match was found till this point, the last action is to start a
// search with the URI the user typed in
$fallback = ($userPreferences->searchType === UserPreferences::URL_MANUAL ? "404manual" : "404quickref");
mirror_redirect(
    '/search.php?show=' . $fallback . '&lang=' . urlencode($LANG) .
    '&pattern=' . substr($_SERVER['REQUEST_URI'], 1),
);
