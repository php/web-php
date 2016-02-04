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
$PHP_7_0_RC_DATE = '21 Jan 2016';

$PHP_7_0_VERSION         = "7.0.3";
$PHP_7_0_DATE            = "04 Feb 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "702e9b8e2cb704fdd50137e39f53f50b",
                       "tar.gz"        => "235b1217a9ec7bee6e0bd517e3636d45",
                       "tar.xz"        => "3c5d2b5b392b78fa92c48822e25ccb56",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "826823d754f09c779222a99becf9c53a4dc719dba2d777aca7807c6ca68e6fc6",
                       "tar.gz"        => "5521df8db153aba35c90cf1a1829106b6bbdac32425216d440f9cc29f00a7c08",
                       "tar.xz"        => "3af2b62617a0e46214500fc3e7f4a421067224913070844d3665d6cc925a1cca",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '21 Jan 2016';

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

$PHP_5_5_VERSION         = "5.5.32";
$PHP_5_5_DATE            = "04 Feb 2016";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "47443f39152d671d24bc839e6a49049d",
                       "tar.gz"        => "6b8bb7992db739c993b0e4bc4cacba34",
                       "tar.xz"        => "2bdf251ea06106b6176408254d919a30",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "b0f2c108db8e05db9f6366aaba9a754fd0ee31f3f86ee889561b608dfd6e92ee",
                       "tar.gz"        => "419aa62a68a640192799928a29e5cd4cd5b965458223bea2b3209a68c3e95989",
                       "tar.xz"        => "02f569dcf5bd57dd5e390ddcab8609e3957a698e2db0b793cf2c11a7e33743c9",
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

