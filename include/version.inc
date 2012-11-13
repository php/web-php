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
 * );
 */

/* PHP 5.4 Release */
$PHP_5_4_RC = '5.4.9RC1'; // set to false when there is no RC
$PHP_5_4_RC_DATE = '08 Nov 2012';

$PHP_5_4_VERSION         = "5.4.8";
$PHP_5_4_DATE            = "18 Oct 2012";

$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "bb8c816a9299be8995255ef70c63b800",
                       "tar.gz"        => "b25b735f342efbfdcdaf00b83189f183",
);

/* PHP 5.3 Release */
$PHP_5_3_RC      = '5.3.19RC1';
$PHP_5_3_RC_DATE = '08 Nov 2012';

$PHP_5_3_VERSION         = "5.3.18";
$PHP_5_3_DATE            = "18 Oct 2012";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "52539c19d0f261560af3c030143dfa8f",
                       "tar.gz"        => "ff2009aadc7c4d1444f6cd8e45f39a41",
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

