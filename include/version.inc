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
/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '2 Apr 2015';

$PHP_5_6_VERSION         = "5.6.8";
$PHP_5_6_DATE            = "16 Apr 2015";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "a5a6df33aade0cb5425e4374e3832f0b",
                       "tar.gz"        => "0167d60fd45891f131f0ccdb51c13cb5",
                       "tar.xz"        => "526a5a7f593de632cd9e8546335de8b7",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "0af0045745d61eeb74a3ea744529a2481b27cb689da720e6c0250675043724e4",
                       "tar.gz"        => "c5b1c75c5671c239473eb611129f33ac432a55a1c341990b70009a2aa3b8dbc3",
                       "tar.xz"        => "4c417387b88e100ca306adeda8051eb9fad93dae8da983f962dabf91a14b2b7b",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  '5.5.25RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '30 Apr 2015';

$PHP_5_5_VERSION         = "5.5.24";
$PHP_5_5_DATE            = "16 Apr 2015";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "f9a8f3e4bb88b33b087bd63732b1402a",
                       "tar.gz"        => "f5666659d9279f725f4351866bb73bed",
                       "tar.xz"        => "32e5ab1d77186142474cb65c685659bd",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "801b5cf2e0c01b07314d4ac3c8a7c28d524bdd8263ebdd0e33a99008251316a2",
                       "tar.gz"        => "43e6b83fe8151f8d2062ca4da915312fc92e47789801049231c705a8b29b05bc",
                       "tar.xz"        => "ffb6235a25043cab71e6445cfc9e8bf16ae80a2835f0373cdd948fcc31eafe57",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '4 Sep 2014';

$PHP_5_4_VERSION         = "5.4.40";
$PHP_5_4_DATE            = "16 Apr 2015";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "19dafb2b9fc31517cf5c3309fb8a9923",
                       "tar.gz"        => "df24e449e79f06981a4b4162105a9cd4",
);
$PHP_5_4_SHA256     = array(
                       "tar.bz2"       => "4898ffe8ac3ccb2d8cc94f7d76a9ea0414d954f5d4479895ddfccdc2e158a51a",
                       "tar.gz"        => "663f5d06cd648e81ba4f2d6ad621bb580d83de70240c832dae527c97954da33d",
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
        $PHP_5_4_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_4_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_4_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_4_MD5["tar.bz2"],
                    "sha256"   => $PHP_5_4_SHA256["tar.bz2"],
                    "date"     => $PHP_5_4_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_4_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_4_VERSION (tar.gz)",
                    "md5"      => $PHP_5_4_MD5["tar.gz"],
                    "sha256"   => $PHP_5_4_SHA256["tar.gz"],
                    "date"     => $PHP_5_4_DATE,
                ),
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_6_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_6_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_6_RC_DATE; // Used by master

