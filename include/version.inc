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
$PHP_5_5_RC = '5.5.13RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '15 May 2014';

$PHP_5_5_VERSION         = "5.5.12";
$PHP_5_5_DATE            = "1 May 2014";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "943af92c2e67bba29429bdd9acf9cbd4",
                       "tar.gz"        => "b6a6e9c72589c265aafb7b3353a34030",
                       "tar.xz"        => "3fb091987063135fd86b3b5ba5010479",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '20 Mar 2014';

$PHP_5_4_VERSION         = "5.4.28";
$PHP_5_4_DATE            = "2 May 2014";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "1676c807683041445f0df63913738571",
                       "tar.gz"        => "7fd1235a56d4579ef3c9497a983c4a83",
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

