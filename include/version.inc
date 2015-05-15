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
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '30 Apr 2015';

$PHP_5_5_VERSION         = "5.5.25";
$PHP_5_5_DATE            = "14 May 2015";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "b3c38f0a12e27722585d962d86dfdd16",
                       "tar.gz"        => "a96b82d2369dd7b7111be6ade789f34f",
                       "tar.xz"        => "f58edc4f10d63f03e425c5378f727a7c",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "68df37e725ddd05675c0df906041038127938ecc52113a54d10e1e4029262c63",
                       "tar.gz"        => "c9397f60bff139e0df441c5e2766108c5bc7ad690de136eb9f5b2f9bbf771240",
                       "tar.xz"        => "ac10015dddfc103b58ccc949504bd50f0d79d0abe74a0cc7842251af06ce8b07",
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

