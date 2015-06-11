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
$PHP_5_6_RC = '5.6.10RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '28 May 2015';

$PHP_5_6_VERSION         = "5.6.9";
$PHP_5_6_DATE            = "14 May 2015";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "561f37377833772ace776143c5687884",
                       "tar.gz"        => "b83de326a3bdb3802266d304ca5ac5e4",
                       "tar.xz"        => "f6b90cd0503310c38e9573bae1eb38c7",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "19d3b87b7b8bba3be24cf6d757d16b723a98881c3af8d15469fd25501e9abcb9",
                       "tar.gz"        => "49527ba66357fe65bcd463dfb8dcff1b8879419f88b3c334f50696a2aceacb87",
                       "tar.xz"        => "1fac497b596f5e4e87d87a7ca90f8725e39a8ca3f9d7adb500fa83c4bb70a73f",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '28 May 2015';

$PHP_5_5_VERSION         = "5.5.26";
$PHP_5_5_DATE            = "11 Jun 2015";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "383a4b35327809afd2822e1e5efc8ee1",
                       "tar.gz"        => "00cdcf41c6432eb82ce5c4b687eef801",
                       "tar.xz"        => "a3de70d115b8580e50c433f83691cfaf",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "816afffdb03ff4c542bc172a2f77f9c69b817df82d60cce05c1b4f578c2c926e",
                       "tar.gz"        => "bee980d433bab99d07ee2bf6f2dcb87d746e49d57adec7d0ce7edb39306695ec",
                       "tar.xz"        => "97672c41cf2f95628dbffb63648147b43b23ea41b99ad22ccf5f4fe9b6e91b51",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '4 Sep 2014';

$PHP_5_4_VERSION         = "5.4.41";
$PHP_5_4_DATE            = "14 May 2015";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "e00817b920cfc6dde2d01d7a74c654c0",
                       "tar.gz"        => "f614a3a074a43c10a072897e9b2c90a2",
);
$PHP_5_4_SHA256     = array(
                       "tar.bz2"       => "5bc4b45a1280ff80a3cf5b8563716f325cfd0121d7fd25aa54d56ff38b3b8272",
                       "tar.gz"        => "638cf19c865bc4eba2a4bab8952116a62691d1a72e1e2c9a9a2aadee92d1ce2e",
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

