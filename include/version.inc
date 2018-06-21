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
$PHP_7_3_RC  = '7.3.0alpha2';
$PHP_7_3_RC_DATE = "21 Jun 2018";
	
/* PHP 7.2 Release */
$PHP_7_2_RC = false; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "7 Jun 2018";

$PHP_7_2_VERSION         = "7.2.7";
$PHP_7_2_DATE            = "21 Jun 2018";
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "cc81675a96af4dd18d8ffc02f26a36c622abadf86af7ecfea7bcde8d3c96d5a3",
    "tar.gz"        => "014f0560cfa22e6301b0024a6fd888c3612a0dc102ff355fa2b49544d16d43b1",
    "tar.xz"        => "eb01c0153b3baf1f64b8b044013ce414b52fede222df3f509e8ff209478f31f0",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = "7.1.19RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "7 Jun 2018";

$PHP_7_1_VERSION         = "7.1.18";
$PHP_7_1_DATE            = "24 May 2018";
$PHP_7_1_SHA256     = array(
    "tar.bz2"       => "580e375515ede831a6d82e13c0ec25dd08b225c6d87dfc24d7cd5f3bd542bf8e",
    "tar.gz"        => "07c24ae4dd59d81d3dc0ce89025ae667979150e2ee0e9e30dd89e04e31d510fb",
    "tar.xz"        => "8bd91cea072ea5b368cc9b4533a1a683eb426abdacbf024bb6ffa9b799cd3b01",
);

/* PHP 7.0 Release */
$PHP_7_0_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "07 December 2017";

$PHP_7_0_VERSION         = "7.0.30";
$PHP_7_0_DATE            = "26 Apr 2018";
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "213f38400c239b8fab2f6f59d6f4d4bd463d0a75bd4edf723dd4d5fea8850b50",
                       "tar.gz"        => "54e7615205123b940b996300bf99c707c2317b6b78388061a204b23ab3388a26",
                       "tar.xz"        => "c90892fb68ab9b8476519658d3f78f6388f2609ae1309bdc2a2e1cc9f92dd686",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = "05 Jan 2017";

$PHP_5_6_VERSION         = "5.6.36";
$PHP_5_6_DATE            = "26 Apr 2018";
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "626a0e3f5d8a0e686a2b930f0dd3a0601fe3dcb5e43dd0e8c3fab631e64e172a",
                       "tar.gz"        => "06086a8b6a9964ef8009c4d9176b4eeb0c564ea39c1213f015e24f3466d2d69f",
                       "tar.xz"        => "18f536bf548e909b4e980379d0c4e56d024b2b1eb1c9768fd169360491f1d6dd",
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
$PHP_5_DATE    = $PHP_5_6_DATE; // Used by bumpRelease script
$PHP_5_RC_DATE = $PHP_5_6_RC_DATE; // Used by master

$PHP_7_VERSION = $PHP_7_2_VERSION; // Some scripts require this set
$PHP_7_DATE    = $PHP_7_2_DATE; // Used by bumpRelease script
$PHP_7_RC_DATE = $PHP_7_2_RC_DATE; // Used by master

