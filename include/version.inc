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
$PHP_7_0_RC = "7.0.7RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = '12 May 2016';

$PHP_7_0_VERSION         = "7.0.6";
$PHP_7_0_DATE            = "28 Apr 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "c89a1046ff06f6aff699057376e297b6",
                       "tar.gz"        => "c9e2ff2d6f843a584179ce96e63e38f9",
                       "tar.xz"        => "5f0c5d999a6b5c700b31fd9618d5651d",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "14ddf192a9965c858c1e742a61456be2f34a4db87556172c0d76f08de96329b7",
                       "tar.gz"        => "f6b47cb3e02530d96787ae5c7888aefbd1db6ae4164d68b88808ee6f4da94277",
                       "tar.xz"        => "1b237a9455e5476a425dbb9d99966bad68107747c601958cb9558a7fb49ab419",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '18 Apr 2016';

$PHP_5_6_VERSION         = "5.6.21";
$PHP_5_6_DATE            = "28 Apr 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "141464ce6b297aa2295b8416c6dbd5e5",
                       "tar.gz"        => "89047bc5219b95dcb47c045774893c4f",
                       "tar.xz"        => "177c69d47024541739c439c9d9eb6ba5",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "b4ed7ab574b689fd6d6494fde954826c06efc85c505e017b8d776c7c7f479590",
                       "tar.gz"        => "5997668c1f6f2d86a59cf75cc86b4a94687884614dec481fad7e13a76b70fcd5",
                       "tar.xz"        => "566ff1a486cb0485ed477a91ea292423f77a58671270ff73b74e67e3ce7084f9",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.35";
$PHP_5_5_DATE            = "28 Apr 2016";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "8da184329677c955ffff4b3c07401f0d",
                       "tar.gz"        => "74cce9e38b84e078c2836d74ed0e9e26",
                       "tar.xz"        => "5b4af75b14f7e7d4941cafa1c6d26a33",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "2d648dd648e820fd64693ce72f9bf07064d147220e594e39fb9f6310238258d7",
                       "tar.gz"        => "21e10a49c62ab34a7edc976af686a952e70142f19135ca8da67758e1c8c3df30",
                       "tar.xz"        => "9bef96634af853960be085690b2f4cea5850b749ea950942769b22b1a9f24873",
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

