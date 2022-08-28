<?php
// Define $MYSITE and $LAST_UPDATED variables
include_once __DIR__ . '/include/prepend.inc';

// Define release_get_latest() function.
include_once __DIR__ . '/include/version.inc';

// Text/plain content type for better readability in browsers
header("Content-type: text/plain; charset=utf-8");

// Provide information on local stats setup
$mirror_stats = (int) (isset($_SERVER['MIRROR_STATS']) && $_SERVER['MIRROR_STATS'] == '1');

// SHA256 check last release file (identifies rsync setup problems)
[ , $latest ] = release_get_latest();
$dist = $latest['source'][0];
$filename = __DIR__ . "/distributions/{$dist['filename']}";
if (!file_exists($filename)) {
    $hash_ok = 0;
} elseif (isset($dist['sha256']) &&
        function_exists('hash_file') &&
        in_array('sha256', hash_algos(), true)) {
    $hash_ok = (int)(hash_file('sha256', $filename) === $dist['sha256']);
} else {
    $hash_ok = 0;
}

// Does this mirror have sqlite?
// Gets all available sqlite versions for possible future sqlite wrapper
$sqlite = get_available_sqlites();

$exts = implode(',', get_loaded_extensions());

echo implode('|', [
    $MYSITE,            	// 0 : CNAME for mirror as accessed (CC, CC1, etc.)
    PHP_VERSION,       	// 1 : PHP version overview
    $LAST_UPDATED,      	// 2 : Update problems
    $sqlite,            	// 3 : SQLite support?
    $mirror_stats,      	// 4 : Optional local stats support
    default_language(), 	// 5 : Mirror language
    'manual-noalias',   	// 6 : /manual alias check is done elsewhere now
    $hash_ok,            	// 7 : Rsync setup problems
    $exts,              	// 8 : List of php extensions separated by comma
    gethostname(),		// 9 : The configured hostname of the local system
    $_SERVER['SERVER_ADDR'],	// 10: The IP address under which we're running
]);
