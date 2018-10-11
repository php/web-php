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
$PHP_7_3_RC  = '7.3.0RC3';
$PHP_7_3_RC_DATE = "11 Oct 2018";
	
/* PHP 7.2 Release */
$PHP_7_2_RC = '7.2.11RC1'; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "27 Sep 2018";

$PHP_7_2_VERSION         = "7.2.10";
$PHP_7_2_DATE            = "13 Sep 2018";
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "01b6129a0921a1636b07da9bc598a876669e45a462cef4b5844fc26862dbda9d",
    "tar.gz"        => "d2d908b49b6005e65dcc46cdc986603a19b7ff103119fce8ddd4648586d430a4",
    "tar.xz"        => "01c2154a3a8e3c0818acbdbc1a956832c828a0380ce6d1d14fea495ea21804f0",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = '7.1.23RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "27 Sep 2018";

$PHP_7_1_VERSION         = "7.1.22";
$PHP_7_1_DATE            = "13 Sep 2018";
$PHP_7_1_SHA256     = array(
    'tar.bz2'       => 'c8e91f19c8aa810ae95f228ff31cf0e4805cb89f4c10870ee12c85491b26e763',
    'tar.gz'        => '1d275115593a33315647094a5a4ee9bd73c7960c08686cee35dc2e683a68b157',
    'tar.xz'        => '9194c9b3a592d8376fde837dde711ec01ee26f8607fc2884047ef6f7c089b15d',
);

/* PHP 7.0 Release */
$PHP_7_0_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "07 December 2017";

$PHP_7_0_VERSION         = "7.0.32";
$PHP_7_0_DATE            = "13 Sep 2018";
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "56e8d8cf9c08178afa8663589805f83bdb01634efd98131977038e24066492e1",
                       "tar.gz"        => "08d13389f611ec55f3b9164347a97e410099238a3dd85946e556a288ce366fbe",
                       "tar.xz"        => "ff6f62afeb32c71b3b89ecbd42950ef6c5e0c329cc6e1c58ffac47e6f1f883c4",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = "05 Jan 2017";

$PHP_5_6_VERSION         = "5.6.38";
$PHP_5_6_DATE            = "13 Sep 2018";
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "d65b231bbdd63be4439ef5ced965cfd63e62983429dbd4dfcfb49981593ebc03",
                       "tar.gz"        => "3b74d46cd79a45cce90c8059e09d8bd0beeb5de562cbb0cb42f96ff8fa665fd4",
                       "tar.xz"        => "c2fac47dc6316bd230f0ea91d8a5498af122fb6a3eb43f796c9ea5f59b04aa1e",
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

