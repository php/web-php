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
$PHP_7_0_RC_DATE = '17 Mar 2016';

$PHP_7_0_VERSION         = "7.0.5";
$PHP_7_0_DATE            = "31 Mar 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "b15e6836babcbf0aa446678ee38f896b",
                       "tar.gz"        => "c8379f3875caf95ce14266ca8212eb4e",
                       "tar.xz"        => "dcaaf14356875b80f937cc6700c58acb",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "2c09af7fe64537ea795f098b9b542ead407ef83f7cdc65b3787115ccbbb51de9",
                       "tar.gz"        => "f9d93419031b4df663fc48f03b8a833545de8776225e46637563e2be6029908d",
                       "tar.xz"        => "c41f1a03c24119c0dd9b741cdb67880486e64349fc33527767f6dc28d3803abb",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = '5.6.20RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '17 Mar 2016';

$PHP_5_6_VERSION         = "5.6.19";
$PHP_5_6_DATE            = "03 Marc 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "aec4374c660d7b160497001c25f8c75e",
                       "tar.gz"        => "0b723125d28ec4b52206c506430302d1",
                       "tar.xz"        => "aab960cc1b2bfbeb00d030a9d42b38bd",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "2a24a3f84971680ac0a4c71050067de4f76ee235aa4a041fae21bfa69975c168",
                       "tar.gz"        => "fce49cddac9337f0c83afbafac5acfb82ba9f876a5a880c88240feac8c9b7a22",
                       "tar.xz"        => "bb32337f93a00b71789f116bddafa8848139120e7fb6f4f98a84f52dbcb8329f",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.34";
$PHP_5_5_DATE            = "31 Mar 2016";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "1151274c4dce9a81f6b1174d1fa88a45",
                       "tar.gz"        => "ff8d5a16839d6c59970f807b6dd9525a",
                       "tar.xz"        => "166344c07e59b6b64d2231a9688f6046",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "af88884416a92619de842ad0fd23f7f7e8140efb0b9194f98a38a78781e5851c",
                       "tar.gz"        => "0e573b406441294b233e35e1f2e12d7896d68457e3e10bf6e1f4825e75271cca",
                       "tar.xz"        => "6989a4f9900e6ddec7248790449bbb4aa55728730bff4973acb49d236c9e9e2a",
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

