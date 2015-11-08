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
$PHP_5_6_RC_DATE = '15 Oct 2015';

$PHP_5_6_VERSION         = "5.6.15";
$PHP_5_6_DATE            = "29 Oct 2015";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "bdfa8fb1b895a25e1cc05c162f9ae5fc",
                       "tar.gz"        => "4ec2fe201e24c6f65bf7bd4bac1bc880",
                       "tar.xz"        => "c726a86238017c2d9db0171b14d300e7",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "11a0645c4d4b749e256da1e0d6df89dd886b5b06b83c914d942653661dbd1c38",
                       "tar.gz"        => "bb2d4c226a4897b7c3659c2538a87aef7ec104f58f5ae930a263dd77fb8ebc40",
                       "tar.xz"        => "cf52e2e621e60997269663fa4bc06253191fa2a41dc9b08c8c911435b3ebcca9",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.30";
$PHP_5_5_DATE            = "01 Oct 2015";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "181d153c9fba7ff46534df1bdab4d853",
                       "tar.gz"        => "42ce02c3dd2f477bfe210a4c1ef95f4e",
                       "tar.xz"        => "ef6d848756ea9d19b7a7e1a9d824d7c1",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "e7332a713cecdd1cb44a1b1336739885c9789f633f0f51236b25e48ab03c3b29",
                       "tar.gz"        => "8ad57f4317391354e66c83d26752f67515b2e923277eb97b2b420dfeff3c1007",
                       "tar.xz"        => "d00dc06fa5e0f3de048fb0cf940b3cc59b43b3f8cad825d4fffb35503cf2e8f2",
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
    ),
);

$PHP_5_VERSION = $PHP_5_6_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_6_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_6_RC_DATE; // Used by master

