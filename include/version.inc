<?php // vim: et
/* The format is:
 * array(
 *     "major release number" => array(
 *         "release" => array(
 *             "source/windows" => array(
 *                 "filename" => "filename.tar.bz2",
 *                 "name"     => "package name",
 *                 "md5"      => "crc32, right?",
 *                 "date"     => "this files release date",
 *                 "note"     => "this file was updated 29feb due to broken phar files..",
 *             ),
 *             "announcement" => "bool, release announcement exists in releases/?",
 *             "eol" => "bool, true to mark as EOL (affects bug tracker and eol.php)"
 *         ),
 *     ),
 * );
/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '11 Sep 2014';

$PHP_5_6_VERSION         = "5.6.2";
$PHP_5_6_DATE            = "16 Oct 2014";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "97202449bf4f011c477ff860b173a92a",
                       "tar.gz"        => "f0b54371fae6d4b6b99fb3d360f086ac",
                       "tar.xz"        => "c976f54d429a0e5214659b0098e44e37",
);
/* PHP 5.5 Release */
$PHP_5_5_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '02 Oct 2014';

$PHP_5_5_VERSION         = "5.5.18";
$PHP_5_5_DATE            = "16 Oct 2014";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "6f0d581ed35a2c65188a9513ccc142a0",
                       "tar.gz"        => "53cdc7589cb301871888c7776eed3cf9",
                       "tar.xz"        => "3984f32985842afebe5795457e26931f",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '4 Sep 2014';

$PHP_5_4_VERSION         = "5.4.34";
$PHP_5_4_DATE            = "16 Oct 2014";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "1afe3a10cefec9618acb785ef5064bf9",
                       "tar.gz"        => "718ce85dc1bca0c925a9013638be4ae9",
);

/* PHP 5.3 Release */
$PHP_5_3_RC      = false; //'5.3.29RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_3_RC_DATE = '31 Jul 2013';

$PHP_5_3_VERSION         = "5.3.29";
$PHP_5_3_DATE            = "14 Aug 2014";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "9469e240cbe6ac865aeaec89b253dd30",
                       "tar.gz"        => "ebfa96ea636b2a7ece71e78ad116a338",
                       "tar.xz"        => "dcff9c881fe436708c141cfc56358075"
);

$RELEASES = array(
    5 => array(
        $PHP_5_6_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_6_MD5["tar.bz2"],
                    "date"     => $PHP_5_6_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.gz)",
                    "md5"      => $PHP_5_6_MD5["tar.gz"],
                    "date"     => $PHP_5_6_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.xz",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.xz)",
                    "md5"      => $PHP_5_6_MD5["tar.xz"],
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
                    "date"     => $PHP_5_5_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.gz)",
                    "md5"      => $PHP_5_5_MD5["tar.gz"],
                    "date"     => $PHP_5_5_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_5_VERSION.tar.xz",
                    "name"     => "PHP $PHP_5_5_VERSION (tar.xz)",
                    "md5"      => $PHP_5_5_MD5["tar.xz"],
                    "date"     => $PHP_5_5_DATE,
                ),
            ),
        ),
        $PHP_5_4_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_4_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_4_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_4_MD5["tar.bz2"],
                    "date"     => $PHP_5_4_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_4_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_4_VERSION (tar.gz)",
                    "md5"      => $PHP_5_4_MD5["tar.gz"],
                    "date"     => $PHP_5_4_DATE,
                ),
            ),
        ),
        $PHP_5_3_VERSION => array(
            "announcement" => true,
            "eol" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_3_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_3_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_3_MD5["tar.bz2"],
                    "date"     => $PHP_5_3_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_3_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_3_VERSION (tar.gz)",
                    "md5"      => $PHP_5_3_MD5["tar.gz"],
                    "date"     => $PHP_5_3_DATE,
                ),
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_6_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_6_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_6_RC_DATE; // Used by master

