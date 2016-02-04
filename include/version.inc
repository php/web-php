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
$PHP_5_6_RC = "5.6.18RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '21 Jan 2016';

$PHP_5_6_VERSION         = "5.6.17";
$PHP_5_6_DATE            = "07 Jan 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "23e2183852b172a8e2b2c739b7dde4ca",
                       "tar.gz"        => "9cbf226d0b5d852e66a0b7272368ecea",
                       "tar.xz"        => "5e080e4b7df5db24f1b64313f8114bd8",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "77b45f56a1e63e75bb22b42cfb8b438ec4083c59ce774b4d7c1685544b7add3b",
                       "tar.gz"        => "f5036535651e919415f4b6589391c95e4ff48f2d391818251c45da216791aac8",
                       "tar.xz"        => "ea9d5749380c7c7171e131616466deacd7cb124b5010eafc34e551b0a7b0fb2c",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.31";
$PHP_5_5_DATE            = "07 Jan 2016";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "ebb66ad8e2bcf1a966b10d86e81a0119",
                       "tar.gz"        => "360049884d844865aa563a5517287969",
                       "tar.xz"        => "6c487db7e7c07072bd70c7c0475c1308",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "fb4a382b9a9dceb749b7ef047d8251320bc8d371c843714e5b4f4b70d61ba277",
                       "tar.gz"        => "59a4417029ba5497d17ee02b65f419129ecf9ca8a1d864e0bccd5a3d4407a597",
                       "tar.xz"        => "a9ac5b94fcc3811b661a090dddd716f81e43947240b35e6a0123e609a135ac54",
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

