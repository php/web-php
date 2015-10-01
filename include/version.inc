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
$PHP_5_6_RC = '5.6.14RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '17 Sep 2015';

$PHP_5_6_VERSION         = "5.6.13";
$PHP_5_6_DATE            = "03 Sep 2015";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "64d9a82068e3b0bbb16c261261391172",
                       "tar.gz"        => "349f183c0f8e2567772e2eb3dee84504",
                       "tar.xz"        => "de4a8ff544986d9e0da90522fa66f195",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "6358837c9cbab41b91ede59dbf0670ae0fb925a1369ecbc1a44a27212420f893",
                       "tar.gz"        => "92acc6c067f5e015a6881b4119eafec10eca11722e810f2c2083f72e17119bcf",
                       "tar.xz"        => "c1f0837df20cd3bed149033924770deca3e7e2d18e2e7e81395096576f153fdc",
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
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '4 Sep 2014';

$PHP_5_4_VERSION         = "5.4.45";
$PHP_5_4_DATE            = "03 Sep 2015";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "185f67f1ca652b18bc0cca9d7edbde7c",
                       "tar.gz"        => "ba580e774ed1ab256f22d1fa69a59311",
);
$PHP_5_4_SHA256     = array(
                       "tar.bz2"       => "4e0d28b1554c95cfaea6fa2b64aac85433f158ce72bb571bcd5574f98f4c6582",
                       "tar.gz"        => "25bc4723955f4e352935258002af14a14a9810b491a19400d76fcdfa9d04b28f",
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

