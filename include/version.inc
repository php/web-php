<?php // vim: et
/* The format is:
 * array(
 *     "major release number" => array(
 *         "release" => array(
 *             "source/windows" => array(
 *                 "filename" => "filename.tar.bz2",
 *                 "name"     => "package name",
 *                 "md5"      => "crc32, right?",
 *                 "date"     => "this files release date",
 *                 "note"     => "this file was updated 29feb due to broken phar files..",
 *             ),
 *             "announcement" => "bool, release announcement exists in releases/?"
 *         ),
 *     ),
 * );6 Dec
/* PHP 5.4 Release */
$PHP_5_4_RC = '5.4.14RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '28 Mar 2013';

$PHP_5_4_VERSION         = "5.4.13";
$PHP_5_4_DATE            = "14 Mar 2013";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "cacd308e978b7cf9ba4993196612ccf7",
                       "tar.gz"        => "445025340677d5bfe22eb670d6db6795",
);

/* PHP 5.3 Release */
$PHP_5_3_RC      = '5.3.24RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_3_RC_DATE = '28 Mar 2013';

$PHP_5_3_VERSION         = "5.3.23";
$PHP_5_3_DATE            = "14 Mar 2013";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "ab7bd1dd3bbc8364cb9fcaa2d79fb502",
                       "tar.gz"        => "9cd92b0de2b51dcd372f46fa623984f4",
);

$RELEASES = array(
    5 => array(
        $PHP_5_4_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_4_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_4_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_4_MD5["tar.bz2"],
                    "date"     => $PHP_5_4_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_4_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_4_VERSION (tar.gz)",
                    "md5"      => $PHP_5_4_MD5["tar.gz"],
                    "date"     => $PHP_5_4_DATE,
                ),
                array(
                    "link"  => 'http://windows.php.net/download/#php-5.4',
                    "name"  => "Windows $PHP_5_4_VERSION binaries and source",
                ),
            ),
        ),
        $PHP_5_3_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_3_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_3_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_3_MD5["tar.bz2"],
                    "date"     => $PHP_5_3_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_3_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_3_VERSION (tar.gz)",
                    "md5"      => $PHP_5_3_MD5["tar.gz"],
                    "date"     => $PHP_5_3_DATE,
                ),
                array(
                    "link"  => 'http://windows.php.net/download/#php-5.3',
                    "name"  => "Windows $PHP_5_3_VERSION binaries and source",
                ),
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_4_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_4_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_4_RC_DATE; // Used by master

