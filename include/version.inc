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
/* PHP 5.5 Release */
$PHP_5_5_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '27 Dec 2013';

$PHP_5_5_VERSION         = "5.5.8";
$PHP_5_5_DATE            = "9 Jan 2014";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "42fe814a3cbbf34b21a2c39f66ee0001",
                       "tar.gz"        => "1ed2b0193ecaca8b980a9b6a90357f1c",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '9 Jan 2014';

$PHP_5_4_VERSION         = "5.4.24";
$PHP_5_4_DATE            = "9 Jan 2014";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "acef880cc808b85e216897ee88187ee1",
                       "tar.gz"        => "5f91782611a4bd665a3df162b43237c2",
);

/* PHP 5.3 Release */
$PHP_5_3_RC      = false; //'5.3.27RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_3_RC_DATE = '20 Jun 2013';

$PHP_5_3_VERSION         = "5.3.28";
$PHP_5_3_DATE            = "12 Dec 2013";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "56ff88934e068d142d6c0deefd1f396b",
                       "tar.gz"        => "eec3fb5ccb6d8c238f973d306bebb00e",
);

$RELEASES = array(
    5 => array(
        $PHP_5_5_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_5_MD5["tar.bz2"],
                    "date"     => $PHP_5_5_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.gz)",
                    "md5"      => $PHP_5_5_MD5["tar.gz"],
                    "date"     => $PHP_5_5_DATE,
                ),
                /*
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.xz",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.xz)",
                    "md5"      => $PHP_5_5_MD5["tar.xz"],
                    "date"     => $PHP_5_5_DATE,
                ),
                 */
            ),
        ),
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
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_5_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_5_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_5_RC_DATE; // Used by master

