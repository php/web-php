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
$PHP_5_6_RC = '5.6.13RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '20 Aug 2015';

$PHP_5_6_VERSION         = "5.6.12";
$PHP_5_6_DATE            = "06 Aug 2015";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "4578dee9d979114610a444bee263ed9b",
                       "tar.gz"        => "0bd6e2ff625ab8c20b5ed8dae1e88594",
                       "tar.xz"        => "f2cc602602eb2b121779f2c4b8bacaba",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "6f27104272af7b2a996f85e4100fac627630fbdaf39d7bd263f16cf529c8853a",
                       "tar.gz"        => "7799b42606c1770d1ad90bfc7521d2b6c294c4c27dcf1a206dee562533b4f984",
                       "tar.xz"        => "f8a8446866c0dc3f33319aa196ce87b64d71cab3dd96e39c8816adccc7e8ef33",
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

