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
$PHP_7_0_RC = "7.0.6RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = '14 Apr 2016';

$PHP_7_0_VERSION         = "7.0.5";
$PHP_7_0_DATE            = "31 Mar 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "b15e6836babcbf0aa446678ee38f896b",
                       "tar.gz"        => "c8379f3875caf95ce14266ca8212eb4e",
                       "tar.xz"        => "dcaaf14356875b80f937cc6700c58acb",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "2c09af7fe64537ea795f098b9b542ead407ef83f7cdc65b3787115ccbbb51de9",
                       "tar.gz"        => "f9d93419031b4df663fc48f03b8a833545de8776225e46637563e2be6029908d",
                       "tar.xz"        => "c41f1a03c24119c0dd9b741cdb67880486e64349fc33527767f6dc28d3803abb",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = "5.6.21RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '18 Apr 2016';

$PHP_5_6_VERSION         = "5.6.20";
$PHP_5_6_DATE            = "31 Marc 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "e6422449bb0342f074eb649a9adf586b",
                       "tar.gz"        => "bdb3cb4dd2306ed247bd8ad7002ef179",
                       "tar.xz"        => "e81f3993997acafeac2ddd2c8bab7153",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "5ac7bf7caec7a79b18cf458e786fd1609ad2da771224b80bc15cc6f01b22bf1f",
                       "tar.gz"        => "9a7ec6e1080ee93dcbe7df3e49ea1c3c3da5fc2258aff763f39ab3786baf8d56",
                       "tar.xz"        => "2b87d40213361112af49157a435e0d4cdfd334c9b7c731c8b844932b1f444e7a",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.34";
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

