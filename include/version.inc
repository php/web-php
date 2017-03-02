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
$PHP_7_1_RC = "7.1.3RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "02 Mar 2017";

$PHP_7_1_VERSION         = "7.1.2";
$PHP_7_1_DATE            = "16 Feb 2017";
$PHP_7_1_MD5     = array(
    "tar.bz2"       => "ec1d51abaea07e4a84f9dca856a0fa81",
    "tar.gz"        => "2d1553f3f912b1cb7b9a5ee63230454d",
    "tar.xz"        => "d79afea1870277c86fac903566fb6c5d",
);
$PHP_7_1_SHA256     = array(
    "tar.bz2"       => "e0f2214e2366434ee231156ba70cfefd0c59790f050d8727a3f1dc2affa67004",
    "tar.gz"        => "e6773217c9c719ca22abb104ae3d437d53daceaf31faf2e5eeb1f9f5028005d8",
    "tar.xz"        => "d815a0c39fd57bab1434a77ff0610fb507c22f790c66cd6f26e27030c4b3e971",
);

/* PHP 7.0 Release */
$PHP_7_0_RC = "7.0.17RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "02 Mar 2017";

$PHP_7_0_VERSION         = "7.0.16";
$PHP_7_0_DATE            = "16 Feb 2017";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "ef8efd33842f1b2e6ea60bb54b418a6e",
                       "tar.gz"        => "1ea52de602608a54527698908019fff3",
                       "tar.xz"        => "6161aba9d24322d889da5d2ff944bddf",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "83c5f57575dc0feca563af529d6f1d60183bf9c2c13e98a6da131fbd0a3597ab",
                       "tar.gz"        => "bc6709dc7612957d0533c09c9c8a9c2e7c4fd9d64e697707bb1b39670eab61d4",
                       "tar.xz"        => "244ac39bc657448962860aa7a590e4417f68513ad5e86ee2727b1328b0537309",
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

