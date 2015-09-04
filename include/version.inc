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
$PHP_5_6_RC_DATE = '20 Aug 2015';

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

$PHP_5_5_VERSION         = "5.5.28";
$PHP_5_5_DATE            = "06 Aug 2015";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "5595dffa11f153e5b5cb8bf57242797e",
                       "tar.gz"        => "4a29be836e9609d12468f8819287faec",
                       "tar.xz"        => "d0caf908b129f2538d942d756c4cb04e",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "197d2c572e030c177e53d3763d59ac6d363d7c78dc22e6cc1e2ac65573d9c2f3",
                       "tar.gz"        => "6084f25a39ab2f79ade46bf0258a1cd6c9bbb09a106b40dd996dbdf8cd3b08f2",
                       "tar.xz"        => "d060455c804c622cda9f3f5f084b10c6ceba73ee76c1720897e17137a0f75ecd",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '4 Sep 2014';

$PHP_5_4_VERSION         = "5.4.44";
$PHP_5_4_DATE            = "06 Aug 2015";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "25725eb0dff0d45351b01fb483709b8d",
                       "tar.gz"        => "9a6f79bc68eb926d230448905229dd1c",
);
$PHP_5_4_SHA256     = array(
                       "tar.bz2"       => "8dd59e5ce9248cf36ac3de5412a518b8b24c01ace6c46ce3d12e4ce981a3856d",
                       "tar.gz"        => "1799998e48da3d8f34722840628e18789e26ea21741d4e498ade6749b3266602",
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

