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
$PHP_7_1_RC_DATE = "05 Jan 2017";

$PHP_7_1_VERSION         = "7.1.1";
$PHP_7_1_DATE            = "19 Jan 2017";
$PHP_7_1_MD5     = array(
    "tar.bz2"       => "cd5b7dfc4bcf99fe11cae7917e9453e1",
    "tar.gz"        => "7c565ddf31d69dbc19027e51b6968b79",
    "tar.xz"        => "65eef256f6e7104a05361939f5e23ada",
);
$PHP_7_1_SHA256     = array(
    "tar.bz2"       => "d791d39d7b54ec42441a05a5f06d68a495647d843210e3ae4f2c6adb99c675bc",
    "tar.gz"        => "c136279d539c3c2c25176bf149c14913670e79bb27ee6b73e1cd69003985a70d",
    "tar.xz"        => "b3565b0c1441064eba204821608df1ec7367abff881286898d900c2c2a5ffe70",
);

/* PHP 7.0 Release */
$PHP_7_0_RC = "7.0.15RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "05 Jan 2017";

$PHP_7_0_VERSION         = "7.0.14";
$PHP_7_0_DATE            = "08 Dec 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "903ff1fd199201d7e69dc0963797072b",
                       "tar.gz"        => "5e20062f39fb3bd5afeed916866acad9",
                       "tar.xz"        => "a51f1d4f03f4e4c745856e9f76fca476",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "fbc4369a0d42b55fd1ce75eb4f3d17b012da754a67567d8e3288fbfbb7490534",
                       "tar.gz"        => "320cfd2184e7252d3d77eae5d5474554fa04ab9fbee7c6094c07e8bd3b5b632b",
                       "tar.xz"        => "0f1dff6392a1cc2ed126b9695f580a2ed77eb09d2c23b41cabfb41e6f27a8c89",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = '5.6.30RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = "05 Jan 2017";

$PHP_5_6_VERSION         = "5.6.29";
$PHP_5_6_DATE            = "08 Dec 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "b2772a0bdada0e20f4e1937f71416bcc",
                       "tar.gz"        => "826ae90570ad480ee4541d6a320b406a",
                       "tar.xz"        => "190bf5b52d1fc68d5500a8cdc7e33164",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "499b844c8aa7be064c111692e51a093ba94e54d2d9abb01e70ea76183a1825bb",
                       "tar.gz"        => "0b1b939129a7286c5a474ac2cf845b979477f26dff36639e04022def9e252574",
                       "tar.xz"        => "0ff352a433f73e2c82b0d5b283b600402518569bf72a74e247f356dacbf322a7",
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

