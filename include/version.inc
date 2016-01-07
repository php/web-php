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
$PHP_7_0_RC_DATE = '24 Dec 2015';

$PHP_7_0_VERSION         = "7.0.2";
$PHP_7_0_DATE            = "07 Jan 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "8c71b2ffd29311e4b7ac7788bd107554",
                       "tar.gz"        => "992667cdad38c5f77a4bb6c62c9a942f",
                       "tar.xz"        => "ce5964672e4ec0b66ff088a6bafde8c7",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "9b1b75fbd9c92c6b0003b234e550965038826d11ea1f430bf279964da9da2236",
                       "tar.gz"        => "040198aef3dc5f17c253c1282160aabc6a05ca0b18b3d6fc9213970363083412",
                       "tar.xz"        => "556121271a34c442b48e3d7fa3d3bbb4413d91897abbb92aaeced4a7df5f2ab2",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '15 Oct 2015';

$PHP_5_6_VERSION         = "5.6.16";
$PHP_5_6_DATE            = "26 Nov 2015";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "765b164b89af1f03ae2fdf39a4e4e1df",
                       "tar.gz"        => "dc3c848000a80b805c1393abe39341fa",
                       "tar.xz"        => "3f1d999ed1f9cb5713c9a0161c557f2f",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "4fe6f40964c1bfaba05fc144ba20a2cdad33e11685f4f101ea5a48b98bbcd2ae",
                       "tar.gz"        => "b6618df6b11a275fa28596f1775727679f8492e100f3bd488d8a8bfbfc19349f",
                       "tar.xz"        => "8ef43271d9bd8cc8f8d407d3ba569de9fa14a28985ae97c76085bb50d597de98",
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

