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

/* PHP 7.2 Release */
$PHP_7_2_RC = '7.2.3RC1'; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "15 Feb 2018";

$PHP_7_2_VERSION         = "7.2.2";
$PHP_7_2_DATE            = "1 Feb 2018";
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "f841ac58e17471f2241ea892b34edb01dc9b93ad9f661ffe4e3f1f476a8f4aee",
    "tar.gz"        => "5963df05fec21927c03fe9f7bf379be2d1eacde6c0f9dcde6143c7133e55abd4",
    "tar.xz"        => "47d7607d38a1d565fc43ea942c92229a7cd165f156737f210937e375b243cb11",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = "7.1.15RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "15 Feb 2018";

$PHP_7_1_VERSION         = "7.1.14";
$PHP_7_1_DATE            = "1 Feb 2018";
$PHP_7_1_SHA256     = array(
    "tar.bz2"       => "63b2fd139ed7656756b0fa290bc42f8fff854723c3d2710a700e646370c581f4",
    "tar.gz"        => "8c7360209d255ee46d388bdcd43ef1a2d14b370c331be30ea628ece18a1e7683",
    "tar.xz"        => "c09f0c1074f5689b492d79034adb84e6a6c6d08c6763c02282e6318d41156779",
);

/* PHP 7.0 Release */
$PHP_7_0_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "07 December 2017";

$PHP_7_0_VERSION         = "7.0.28";
$PHP_7_0_DATE            = "01 Mar 2018";
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "ae5491b4613f3710e3d09e688ba3d30d3acc1112c7b96a8703663b8a95063c7f",
                       "tar.gz"        => "cd2fd94feb0d5809ffb9d900138643fa74e70656436e5f2595b03239dd97aa9c",
                       "tar.xz"        => "e738ffce2c30bc0e84be9446af86bef0a0607d321f1a3d04bbfe2402fb5f6de0",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = "05 Jan 2017";

$PHP_5_6_VERSION         = "5.6.33";
$PHP_5_6_DATE            = "04 Jan 2018";
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "07f696a9761dcd839e2045c95c3a4d2ffb52c54417477cca9d30a14975b831cc",
                       "tar.gz"        => "bedfac81cfaa25961812a1aec458c4109411a14991b43a416343ffb830b8da6a",
                       "tar.xz"        => "9004995fdf55f111cd9020e8b8aff975df3d8d4191776c601a46988c375f3553",
);

$RELEASES = array(
    7 => array(
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
        $PHP_7_0_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.bz2)",
                    "sha256"   => $PHP_7_0_SHA256["tar.bz2"],
                    "date"     => $PHP_7_0_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.gz)",
                    "sha256"   => $PHP_7_0_SHA256["tar.gz"],
                    "date"     => $PHP_7_0_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.xz)",
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
                    "sha256"   => $PHP_5_6_SHA256["tar.bz2"],
                    "date"     => $PHP_5_6_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.gz)",
                    "sha256"   => $PHP_5_6_SHA256["tar.gz"],
                    "date"     => $PHP_5_6_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.xz",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.xz)",
                    "sha256"   => $PHP_5_6_SHA256["tar.xz"],
                    "date"     => $PHP_5_6_DATE,
                ),
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_6_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_6_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_6_RC_DATE; // Used by master

$PHP_7_VERSION = $PHP_7_2_VERSION; // Some scripts require this set
$PHP_7_DATE    = $PHP_7_2_DATE; // Used by buumpRelease script
$PHP_7_RC_DATE = $PHP_7_2_RC_DATE; // Used by master

