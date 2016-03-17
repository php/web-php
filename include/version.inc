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
$PHP_7_0_RC = "7.0.5RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = '17 Mar 2016';

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
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '18 Feb 2016';

$PHP_5_6_VERSION         = "5.6.19";
$PHP_5_6_DATE            = "03 Marc 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "aec4374c660d7b160497001c25f8c75e",
                       "tar.gz"        => "0b723125d28ec4b52206c506430302d1",
                       "tar.xz"        => "aab960cc1b2bfbeb00d030a9d42b38bd",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "2a24a3f84971680ac0a4c71050067de4f76ee235aa4a041fae21bfa69975c168",
                       "tar.gz"        => "fce49cddac9337f0c83afbafac5acfb82ba9f876a5a880c88240feac8c9b7a22",
                       "tar.xz"        => "bb32337f93a00b71789f116bddafa8848139120e7fb6f4f98a84f52dbcb8329f",
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

