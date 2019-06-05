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
$PHP_7_3_RC_DATE = "16 May 2019";

$PHP_7_3_VERSION         = "7.3.6";
$PHP_7_3_DATE            = "30 May 2019";
$PHP_7_3_TAGS            = ['security']; // Set to ['security'] for security releases.
$PHP_7_3_SHA256     = array(
    "tar.bz2"       => "1e5ac8700154835c0910e3a814517da9b87bb4a82cc7011fea1a82096b6f6f77",
    "tar.gz"        => "72fbf223ff8659a61eed08eebffb4ede0256e7a69d2151ae24affa5377b70bb8",
    "tar.xz"        => "fefc8967daa30ebc375b2ab2857f97da94ca81921b722ddac86b29e15c54a164",
);

/* PHP 7.2 Release */
$PHP_7_2_RC = false; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "18 Apr 2019";

$PHP_7_2_VERSION         = "7.2.19";
$PHP_7_2_DATE            = "30 May 2019";
$PHP_7_2_TAGS            = ['security']; // Set to ['security'] for security releases.
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "ebd0b1f375fe07ed4925acc213d2f5ef76a61bd5de174e7b666b98421a90a099",
    "tar.gz"        => "1cd2266a058f3224d3cba594540045542606996f026eeef96747f27f6b3d22b6",
    "tar.xz"        => "4ffa2404a88d60e993a9fe69f829ebec3eb1e006de41b6048ce5e91bbeaa9282",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "25 Oct 2018";

$PHP_7_1_VERSION         = "7.1.30";
$PHP_7_1_DATE            = "30 May 2019";
$PHP_7_1_TAGS            = ['security'];
$PHP_7_1_SHA256     = array(
    'tar.bz2'       => '664850774fca19d2710b9aa35e9ae91214babbde9cd8d27fd3479cc97171ecb3',
    'tar.gz'        => 'a604edf85d5dfc28e6ff3016dad3954c50b93db69afc42295178b4fdf42e026c',
    'tar.xz'        => '6310599811536dbe87e4bcf212bf93196bdfaff519d0c821e4c0068efd096a7c',
);

$RELEASES = array(
    7 => array(
        $PHP_7_3_VERSION => array(
            "announcement" => true,
            "tags" => $PHP_7_3_TAGS,
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
            "tags" => $PHP_7_2_TAGS,
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
            "tags" => $PHP_7_1_TAGS,
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
