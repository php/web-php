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
$PHP_5_5_RC_DATE = '23 May 2013';

$PHP_5_5_VERSION         = "5.5.2";
$PHP_5_5_DATE            = "15 Aug 2013";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "caf7f4d86514a568fb3c8021b096a9f0",
                       "tar.gz"        => "2a90884749f97868071538098b3debc1",
                       "tar.xz"        => "95c6d7a4c36c475b10447954dea056a5",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '01 Aug 2013';

$PHP_5_4_VERSION         = "5.4.18";
$PHP_5_4_DATE            = "15 Aug 2013";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "b2e185b46b22a48a385cf21a0dc76e65",
                       "tar.gz"        => "d0a3f55deceaec921f45f76d7b4e764b",
);

/* PHP 5.3 Release */
$PHP_5_3_RC      = false; //'5.3.27RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_3_RC_DATE = '20 Jun 2013';

$PHP_5_3_VERSION         = "5.3.27";
$PHP_5_3_DATE            = "11 Jul 2013";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "25ae23a5b9615fe8d33de5b63e1bb788",
                       "tar.gz"        => "bd03bfa9e7db40b6f2950fcbcf6a8276",
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
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.xz",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.xz)",
                    "md5"      => $PHP_5_5_MD5["tar.xz"],
                    "date"     => $PHP_5_5_DATE,
                ),
                array(
                    "link"  => 'http://windows.php.net/download/#php-5.5',
                    "name"  => "Windows $PHP_5_5_VERSION binaries and source",
                ),
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

$PHP_5_VERSION = $PHP_5_5_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_5_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_5_RC_DATE; // Used by master

