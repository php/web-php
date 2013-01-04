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
$PHP_5_4_RC = '5.4.11RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '03 Jan 2013';

$PHP_5_4_VERSION         = "5.4.10";
$PHP_5_4_DATE            = "20 Dec 2012";

$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "cb716b657a30570b9b468b9e7bc551a1",
                       "tar.gz"        => "1e7fbe418658d5433bd315030584c45c",
);

/* PHP 5.3 Release */
$PHP_5_3_RC      = '5.3.21RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_3_RC_DATE = '03 Jan 2013';

$PHP_5_3_VERSION         = "5.3.20";
$PHP_5_3_DATE            = "20 Dec 2012";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "00241b9e89e93adf3baac32c56211e4e",
                       "tar.gz"        => "1e202851bf2ba1ee96d7dc5b48944119",
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

