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

/* PHP 7.0 Release */
$PHP_7_0_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = '07 Jul 2016';

$PHP_7_0_VERSION         = "7.0.9";
$PHP_7_0_DATE            = "21 Jul 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "63b32d3e97df7b30c2bcd138ef0b21c0",
                       "tar.gz"        => "32ea3ce54d7d5ed03c6c600dffd65813",
                       "tar.xz"        => "6294813fb3c8158cfde74302f573cac7",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "2ee6968b5875f2f38700c58a189aad859a6a0b85fc337aa102ec2dc3652c3b7b",
                       "tar.gz"        => "93895a6a610c94751c890e5ee91a7f4bc0eae476b95fe30425d13f7ae88753d5",
                       "tar.xz"        => "970c322ba3e472cb0264b8ba9d4d92e87918da5d0cca53c4aba2a70545b8626d",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = '5.6.24RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '07 Jul 2016';

$PHP_5_6_VERSION         = "5.6.23";
$PHP_5_6_DATE            = "23 Jun 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "147734b7e0164ebdd2dc18474fcfb309",
                       "tar.gz"        => "5120140b7b3117e50807836a1869e250",
                       "tar.xz"        => "c2d2155e50bcbaa0ee7a63845862c894",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "facd280896d277e6f7084b60839e693d4db68318bfc92085d3dc0251fd3558c7",
                       "tar.gz"        => "5f2274a13970887e8c81500c2afe292d51c3524d1a06554b0a87c74ce0a24ffe",
                       "tar.xz"        => "39141e9a617af172aedbbacee7a63eb15502850f7cea20d759a9cffa7cfb0a1a",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.37";
$PHP_5_5_DATE            = "23 Jun 2016";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "3a4b249bee5451a0982263a94a8a8c9d",
                       "tar.gz"        => "6431716479805df74df27377ce485bd1",
                       "tar.xz"        => "707a528176283b8eecba1fa3c7123dd2",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "d2380ebe46caf17f2c4cd055867d00a82e6702dc5f62dc29ce864a5742905d88",
                       "tar.gz"        => "7cef04b549fdbe00c26dc785b6ba10439672a1596db518fc46632ecba45f44b9",
                       "tar.xz"        => "c322444fdf6d3ba26aa67d67ee32d1e815a877f35831351c83763431a80e3612",
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

