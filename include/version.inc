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
$PHP_7_3_RC  = '7.3.4RC1'; // Current RC version (e.g., '7.3.1RC1') or false
$PHP_7_3_RC_DATE = "21 Mar 2019";

$PHP_7_3_VERSION         = "7.3.3";
$PHP_7_3_DATE            = "07 Mar 2019";
$PHP_7_3_SHA256     = array(
    "tar.bz2"       => "61969e943adfea79701a34b8e701edd3f95be829d16601a4aabeb05f83023ce6",
    "tar.gz"        => "9bde40cbf8608ae9c595a6643a02cf0c692c131e2b3619af3fd2af8425d8e677",
    "tar.xz"        => "6bb03e79a183d0cb059a6d117bbb2e0679cab667fb713a13c6a16f56bebab9b3",
);

/* PHP 7.2 Release */
$PHP_7_2_RC = '7.2.17RC1'; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "21 Mar 2019";

$PHP_7_2_VERSION         = "7.2.16";
$PHP_7_2_DATE            = "07 Mar 2019";
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "2c0ad10053d58694cd14323248ecd6d9ba71d2733d160973c356ad01d09e7f38",
    "tar.gz"        => "fb95e0bb69caba1dfd3bbac4eeef7a0485e5ea3d6191d35ad5657e18243aa02d",
    "tar.xz"        => "7d91ed3c1447c6358a3d53f84599ef854aca4c3622de7435e2df115bf196e482",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "25 Oct 2018";

$PHP_7_1_VERSION         = "7.1.27";
$PHP_7_1_DATE            = "07 Mar 2019";
$PHP_7_1_SHA256     = array(
    'tar.bz2'       => 'dad7ecd30941911528e471c555a01911a68aa9219696bfc1e005f8b669f4ec4b',
    'tar.gz'        => '353b9ed341048388cc95e6fa6dab587eee44a3d4d297989aa297936090864357',
    'tar.xz'        => '25672a3a6060eff37c865a0c84e284da50b7ee8cd57174c78f0ae244b90a96a8',
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
