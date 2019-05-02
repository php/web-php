<?php // vim: et
/* The format is:
 * array(
 *     "major release number" => array(
 *         "release" => array(
 *             "source/windows" => array(
 *                 "filename" => "filename.tar.bz2",
 *                 "name"     => "package name",
 *                 "sha256"   => "shasum -256",
 *                 "date"     => "this files release date",
 *                 "note"     => "this file was updated 29feb due to broken phar files..",
 *             ),
 *             "announcement" => "bool, release announcement exists in releases/?",
 *         ),
 *     ),
 * );
 */
/* PHP 7.3 Release */
$PHP_7_3_RC  = false; // Current RC version (e.g., '7.3.1RC1') or false
$PHP_7_3_RC_DATE = "18 Apr 2019";

$PHP_7_3_VERSION         = "7.3.5";
$PHP_7_3_DATE            = "02 May 2019";
$PHP_7_3_SHA256     = array(
    "tar.bz2"       => "4380b80ef98267c3823c3416eb05f7729ba7a33de6b3d14ec96013215d62c35e",
    "tar.gz"        => "c953749b7f3310a3a74f920ef698f6d1c04636d11656ac9ffb3ab10d34e30e1e",
    "tar.xz"        => "e1011838a46fd4a195c8453b333916622d7ff5bce4aca2d9d99afac142db2472",
);

/* PHP 7.2 Release */
$PHP_7_2_RC = false; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "18 Apr 2019";

$PHP_7_2_VERSION         = "7.2.18";
$PHP_7_2_DATE            = "02 May 2019";
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "fa1a27b12d1173207e81e798a48d4a7f77ba897f5c5200ac0b5d62aa8b4c4b72",
    "tar.gz"        => "48aeb291814f3cd3ba03c52e79e8e61896d0271fd4c228198f80a072e568f84b",
    "tar.xz"        => "9970dbb3ab1298c9e6aac54bebfa841c8ad14b18eead65594a68fa841364cb8d",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "25 Oct 2018";

$PHP_7_1_VERSION         = "7.1.28";
$PHP_7_1_DATE            = "04 Apr 2019";
$PHP_7_1_SHA256     = array(
    'tar.bz2'       => '739e8733fe1fc5e69e6226da6dba7a31bacfd2e3871ad2c97a792638f22c54c9',
    'tar.gz'        => '4df587338d4c5dfe27050c7ac72a6b7583ecaee9d3fbfc03427667a86e081999',
    'tar.xz'        => '45131497ec0a947e3f9145c000e8fcc1f86b46518ee3f6810d80efa2d39521e2',
);

$RELEASES = array(
    7 => array(
        $PHP_7_3_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_3_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_3_VERSION (tar.bz2)",
                    "sha256"   => $PHP_7_3_SHA256["tar.bz2"],
                    "date"     => $PHP_7_3_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_3_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_3_VERSION (tar.gz)",
                    "sha256"   => $PHP_7_3_SHA256["tar.gz"],
                    "date"     => $PHP_7_3_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_3_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_3_VERSION (tar.xz)",
                    "sha256"   => $PHP_7_3_SHA256["tar.xz"],
                    "date"     => $PHP_7_3_DATE,
                ),
            ),
        ),
        $PHP_7_2_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_2_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_2_VERSION (tar.bz2)",
                    "sha256"   => $PHP_7_2_SHA256["tar.bz2"],
                    "date"     => $PHP_7_2_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_2_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_2_VERSION (tar.gz)",
                    "sha256"   => $PHP_7_2_SHA256["tar.gz"],
                    "date"     => $PHP_7_2_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_2_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_2_VERSION (tar.xz)",
                    "sha256"   => $PHP_7_2_SHA256["tar.xz"],
                    "date"     => $PHP_7_2_DATE,
                ),
            ),
        ),
        $PHP_7_1_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.bz2)",
                    "sha256"   => $PHP_7_1_SHA256["tar.bz2"],
                    "date"     => $PHP_7_1_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.gz)",
                    "sha256"   => $PHP_7_1_SHA256["tar.gz"],
                    "date"     => $PHP_7_1_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.xz)",
                    "sha256"   => $PHP_7_1_SHA256["tar.xz"],
                    "date"     => $PHP_7_1_DATE,
                ),
            ),
        ),
    ),
);

$PHP_7_VERSION = $PHP_7_3_VERSION; // Some scripts require this set
$PHP_7_DATE    = $PHP_7_3_DATE; // Used by bumpRelease script
$PHP_7_RC_DATE = $PHP_7_3_RC_DATE; // Used by master
