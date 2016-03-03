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
 *             "eol" => "bool, true to mark as EOL (affects bug tracker and eol.php)"
 *         ),
 *     ),
 * );
 */

/* PHP 7.0 Release */
$PHP_7_0_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = '18 Feb 2016';

$PHP_7_0_VERSION         = "7.0.4";
$PHP_7_0_DATE            = "03 Mar 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "0171201350941327399a5c3e678a86e5",
                       "tar.gz"        => "ce986fe03df3d1050966fdea21224040",
                       "tar.xz"        => "82c60fc8167dd964119447da539af4f7",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "a246c503709c189ba8e1e22ed2cb22abc27da43a997ff1b3318e181baf529dcc",
                       "tar.gz"        => "f6cdac2fd37da0ac0bbcee0187d74b3719c2f83973dfe883d5cde81c356fe0a8",
                       "tar.xz"        => "584e0e374e357a71b6e95175a2947d787453afc7f9ab7c55651c10491c4df532",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = '5.6.19RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '18 Feb 2016';

$PHP_5_6_VERSION         = "5.6.18";
$PHP_5_6_DATE            = "04 Feb 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "7340353bedd998286ba2c4d87d7864f8",
                       "tar.gz"        => "9ce52b13aefd652d221f100341497d74",
                       "tar.xz"        => "177ba962557795866ae331ad4ad99bba",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "c3cd4a29a9562309d36e2b128407d6eaa5c7dde590d2b1a464457383e517f4ed",
                       "tar.gz"        => "76da4150dc2da86b7b63b1aad3c20d1d11964796251ac0dd4d26d0a3f5045015",
                       "tar.xz"        => "54dd9106c3469bc7028644d72ac140af00655420bbaaf4a742a64e9ed02ec1b0",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.33";
$PHP_5_5_DATE            = "03 Mar 2016";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "adba9179ddeccb21974493b6eeb8caa2",
                       "tar.gz"        => "87a0ac3bff1db155ee381086b4a88edb",
                       "tar.xz"        => "c1b9e661a8e6e98bdd03aae7ac9534fe",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "c490b1ed4df596b48eb68f630d89ca512945e2650840e7dace1119cc7e600aa9",
                       "tar.gz"        => "d2747bcf2cc94f652ac216f522904863a22042c66fabcf82ad7449d261d7a45b",
                       "tar.xz"        => "b91dbd3c53f9895e8f7b29e5fed25a64dd3a76b454f6ef7265e73c96b4303f30",
);

$RELEASES = array(
    7 => array(
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

$PHP_7_VERSION = $PHP_7_0_VERSION; // Some scripts require this set
$PHP_7_DATE    = $PHP_7_0_DATE; // Used by buumpRelease script
$PHP_7_RC_DATE = $PHP_7_0_RC_DATE; // Used by master

