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
$PHP_5_6_RC = '5.6.11RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '25 Jun 2015';

$PHP_5_6_VERSION         = "5.6.10";
$PHP_5_6_DATE            = "11 Jun 2015";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "83b17e0cdc72a3a486f5e6342e76c45e",
                       "tar.gz"        => "5afb2f6467f525ae38a9ce6f1acf5c6a",
                       "tar.xz"        => "4631ef265253d2f496b3574d297f26ed",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "0a579c81c724ea41815eee0caa8ea7d8eeb302458519d8cc4fc5b055577c8c45",
                       "tar.gz"        => "7759d6e178be524085e1482921748c14d11cbd0a133ba8aabb96c391ce7ed3fc",
                       "tar.xz"        => "1af720c955b0a57aa47606e928616e84c78868aff2a5f269c70601a77d6da8c1",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.27";
$PHP_5_5_DATE            = "09 Jul 2015";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "e105f664450efd87513f5b4a2055e917",
                       "tar.gz"        => "39cc2659f8d777e803816f7b437d9001",
                       "tar.xz"        => "2efe7c087d7073bffa64e5d538f22711",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "c4b4c6a534c0ca67a9ae39bec4f51e52d13e820135dd016eae230e15337e1f70",
                       "tar.gz"        => "57cc716ebb37a62654c154582e48a282055b08ce91995c79b0be41b9940237f0",
                       "tar.xz"        => "7ee398058067a7d8184e402fcdccb25003852cb8dc94eefa3cda051a3e47fdd8",
);
/* PHP 5.4 Release */
$PHP_5_4_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_4_RC_DATE = '4 Sep 2014';

$PHP_5_4_VERSION         = "5.4.43";
$PHP_5_4_DATE            = "09 Jul 2015";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "eedfa86393db2ae49a163d1f80aa2c19",
                       "tar.gz"        => "b09580551c32ba191e926bbbdea4e082",
);
$PHP_5_4_SHA256     = array(
                       "tar.bz2"       => "25d7724fb00ad1b520f5bad2173717031153d0a8e3de2c75e7a084c76f8ecd6b",
                       "tar.gz"        => "cfc2176adc05f009666ecfab4a1cc66cc546c5d071245b2a048b3d113f67a2af",
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

