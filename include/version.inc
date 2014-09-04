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
 *             "announcement" => "bool, release announcement exists in releases/?"
 *         ),
 *     ),
 * );
/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '11 Sep 2014';

$PHP_5_6_VERSION         = "5.6.0";
$PHP_5_6_DATE            = "28 Aug 2014";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "1f889357528809a6675e2f23995832d7",
                       "tar.gz"        => "7e39f839eee4ffbf011cdcd21b5f1c4f",
                       "tar.xz"        => "642825d75ce2634d9513d5b21dbee521",
);
/* PHP 5.5 Release */
$PHP_5_5_RC = '5.5.17RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '4 Sep 2014';

$PHP_5_5_VERSION         = "5.5.16";
$PHP_5_5_DATE            = "21 Aug 2014";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "331a87fb27e100a88b3845d34582f769",
                       "tar.gz"        => "5def6d89792caa70448c67cd510e0f3e",
                       "tar.xz"        => "243f641c58b7d58b94b5431e0b730a5e",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // '5.4.32RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '7 Aug 2014';

$PHP_5_4_VERSION         = "5.4.32";
$PHP_5_4_DATE            = "21 Aug 2014";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "0de30057773755c742ef4916c473292c",
                       "tar.gz"        => "f0bd6e6cf4ea39dd5ef5c5b7e640b49b",
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

