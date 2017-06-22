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
$PHP_7_1_RC_DATE = "25 May 2017";

$PHP_7_1_VERSION         = "7.1.6";
$PHP_7_1_DATE            = "08 Jun 2017";
$PHP_7_1_MD5     = array(
    "tar.bz2"       => "fb88987cd0c7fefa527f2170a2617f78",
    "tar.gz"        => "5334434e5d72cbf64eea14246c344449",
    "tar.xz"        => "eafc7a79cc8cc62c9292c96f9c9ccf90",
);
$PHP_7_1_SHA256     = array(
    "tar.bz2"       => "6e3576ca77672a18461a4b089c5790647f1b2c19f82e4f5e94c962609aabffcf",
    "tar.gz"        => "7ff8c01af791c7e499ee77e1b82e4b1d56e379efe1f706b1203d48751481fd9f",
    "tar.xz"        => "01584dc521ab7ec84b502b61952f573652fe6aa00c18d6d844fb9209f14b245b",
);

/* PHP 7.0 Release */
$PHP_7_0_RC = "7.0.21RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "22 June 2017";

$PHP_7_0_VERSION         = "7.0.20";
$PHP_7_0_DATE            = "08 Jun 2017";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "d742b313c9dfea6fa6bfbb831b4240f8",
                       "tar.gz"        => "251965824f089328941489407bcb2a26",
                       "tar.xz"        => "e84615871c1c6dbd0860746a31f3a7c8",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "cdfddfe01cc615218e333e34a1c761c9ef8fdf5199b27617264a02705eda7fc3",
                       "tar.gz"        => "b44947f0c1926928d5c2f176506b878c32b5cd09ce3b5b52bbbecf4328ab812d",
                       "tar.xz"        => "31b9cf1fb83fe3cd82c2f6603a0ae81ae6abacb5286827e362d8f85e68908e0a",
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

