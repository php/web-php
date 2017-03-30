<?php // vim: et
/* The format is:
 * array(
 *     "major release number" => array(
 *         "release" => array(
 *             "source/windows" => array(
 *                 "filename" => "filename.tar.bz2",
 *                 "name"     => "package name",
 *                 "md5"      => "crc32, right?",
 *                 "sha256"   => "shasum -256",
 *                 "date"     => "this files release date",
 *                 "note"     => "this file was updated 29feb due to broken phar files..",
 *             ),
 *             "announcement" => "bool, release announcement exists in releases/?",
 *         ),
 *     ),
 * );
 */

/* PHP 7.1 Release */
$PHP_7_1_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "02 Mar 2017";

$PHP_7_1_VERSION         = "7.1.3";
$PHP_7_1_DATE            = "16 Mar 2017";
$PHP_7_1_MD5     = array(
    "tar.bz2"       => "1306085cf74ba682dbcbfb4dff67b650",
    "tar.gz"        => "d3294c06b207ee23126210f8276032bb",
    "tar.xz"        => "d604d688be17f4a05b99dbb7fb9581f4",
);
$PHP_7_1_SHA256     = array(
    "tar.bz2"       => "c145924d91b7a253eccc31f8d22f15b61589cd24d78105e56240c1bb6413b94f",
    "tar.gz"        => "4bfadd0012b966eced448497272150ffeede13136a961aacb9e71553b8e929ec",
    "tar.xz"        => "e4887c2634778e37fd962fbdf5c4a7d32cd708482fe07b448804625570cb0bb0",
);

/* PHP 7.0 Release */
$PHP_7_0_RC = "7.0.18RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "30 Mar 2017";

$PHP_7_0_VERSION         = "7.0.17";
$PHP_7_0_DATE            = "16 Mar 2017";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "12ebc113a221959cebaf33ba22fd46c1",
                       "tar.gz"        => "5fd4e26265b213610a4be7fdc88dcee4",
                       "tar.xz"        => "549df69a7a3c79d49fcafe2097579d9e",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "aee503926b96d807692fac3e0fd64e3259788f5139819a983152679cb6e91d4b",
                       "tar.gz"        => "1f42ffe9895dad746baf4a0e8d81f2272f55fdef66cf298ac911d8791ceb1e80",
                       "tar.xz"        => "471c16fcdd6a5e1a37199e97bcaeea6117626229785185be7532aaa7c6ee04be",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = "05 Jan 2017";

$PHP_5_6_VERSION         = "5.6.30";
$PHP_5_6_DATE            = "19 Jan 2017";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "67566191957b5fcac8567a5a9bbdced7",
                       "tar.gz"        => "8c7ef86c259abad33f213405a35a13c2",
                       "tar.xz"        => "68753955a8964ae49064c6424f81eb3e",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "a105c293fa1dbff118b5b0ca74029e6c461f8c78f49b337a2a98be9e32c27906",
                       "tar.gz"        => "8bc7d93e4c840df11e3d9855dcad15c1b7134e8acf0cf3b90b932baea2d0bde2",
                       "tar.xz"        => "a363185c786432f75e3c7ff956b49c3369c3f6906a6b10459f8d1ddc22f70805",
);

/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.38";
$PHP_5_5_DATE            = "21 Jul 2016";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "312244a0eecad602a1555ed2434e223f",
                       "tar.gz"        => "c2545f7164f8f8b2187fb404f11ceb35",
                       "tar.xz"        => "72302e26f153687e2ca922909f927443",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "473c81ebb2e48ca468caee031762266651843d7227c18a824add9b07b9393e38",
                       "tar.gz"        => "4f458c9b504269615715a62f182b7c2f89bb8284f484befc221b56a1571b506e",
                       "tar.xz"        => "cb527c44b48343c8557fe2446464ff1d4695155a95601083e5d1f175df95580f",
);

$RELEASES = array(
    7 => array(
        $PHP_7_1_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.bz2)",
                    "md5"      => $PHP_7_1_MD5["tar.bz2"],
                    "sha256"   => $PHP_7_1_SHA256["tar.bz2"],
                    "date"     => $PHP_7_1_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.gz)",
                    "md5"      => $PHP_7_1_MD5["tar.gz"],
                    "sha256"   => $PHP_7_1_SHA256["tar.gz"],
                    "date"     => $PHP_7_1_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.xz)",
                    "md5"      => $PHP_7_1_MD5["tar.xz"],
                    "sha256"   => $PHP_7_1_SHA256["tar.xz"],
                    "date"     => $PHP_7_1_DATE,
                ),
            ),
        ),
        $PHP_7_0_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.bz2)",
                    "md5"      => $PHP_7_0_MD5["tar.bz2"],
                    "sha256"   => $PHP_7_0_SHA256["tar.bz2"],
                    "date"     => $PHP_7_0_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.gz)",
                    "md5"      => $PHP_7_0_MD5["tar.gz"],
                    "sha256"   => $PHP_7_0_SHA256["tar.gz"],
                    "date"     => $PHP_7_0_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.xz)",
                    "md5"      => $PHP_7_0_MD5["tar.xz"],
                    "sha256"   => $PHP_7_0_SHA256["tar.xz"],
                    "date"     => $PHP_7_0_DATE,
                ),
            ),
        ),
    ),
    5 => array(
        $PHP_5_6_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_6_MD5["tar.bz2"],
                    "sha256"   => $PHP_5_6_SHA256["tar.bz2"],
                    "date"     => $PHP_5_6_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.gz)",
                    "md5"      => $PHP_5_6_MD5["tar.gz"],
                    "sha256"   => $PHP_5_6_SHA256["tar.gz"],
                    "date"     => $PHP_5_6_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.xz",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.xz)",
                    "md5"      => $PHP_5_6_MD5["tar.xz"],
                    "sha256"   => $PHP_5_6_SHA256["tar.xz"],
                    "date"     => $PHP_5_6_DATE,
                ),
            ),
        ),
        $PHP_5_5_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_5_MD5["tar.bz2"],
                    "sha256"   => $PHP_5_5_SHA256["tar.bz2"],
                    "date"     => $PHP_5_5_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.gz)",
                    "md5"      => $PHP_5_5_MD5["tar.gz"],
                    "sha256"   => $PHP_5_5_SHA256["tar.gz"],
                    "date"     => $PHP_5_5_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.xz",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.xz)",
                    "md5"      => $PHP_5_5_MD5["tar.xz"],
                    "sha256"   => $PHP_5_5_SHA256["tar.xz"],
                    "date"     => $PHP_5_5_DATE,
                ),
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_6_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_6_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_6_RC_DATE; // Used by master

$PHP_7_VERSION = $PHP_7_1_VERSION; // Some scripts require this set
$PHP_7_DATE    = $PHP_7_1_DATE; // Used by buumpRelease script
$PHP_7_RC_DATE = $PHP_7_1_RC_DATE; // Used by master

