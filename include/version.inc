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
$PHP_5_4_RC = false; //'5.4.14RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '28 Mar 2013';

$PHP_5_4_VERSION         = "5.4.14";
$PHP_5_4_DATE            = "11 Apr 2013";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "cfdc044be2c582991a1fe0967898fa38",
                       "tar.gz"        => "08df8196af12bc850409a7bff13bf8f0",
);

/* PHP 5.3 Release */
$PHP_5_3_RC      = false; //'5.3.24RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_3_RC_DATE = '28 Mar 2013';

$PHP_5_3_VERSION         = "5.3.24";
$PHP_5_3_DATE            = "11 Apr 2013";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "9820604df98c648297dcd31ffb8214e8",
                       "tar.gz"        => "cb0311a6a5ed6ffff8f41f713f9d8e84",
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

