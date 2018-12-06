<?php // vim: et
/* The format is:
 * array(
 *     "major release number" => array(
 *         "release" => array(
 *             "source/windows" => array(
 *                 "filename" => "filename.tar.bz2",
 *                 "name"     => "package name",
 *                 "sha256"   => "shasum -256",
 *                 "date"     => "this files release date",
 *                 "note"     => "this file was updated 29feb due to broken phar files..",
 *             ),
 *             "announcement" => "bool, release announcement exists in releases/?",
 *         ),
 *     ),
 * );
 */
/* PHP 7.3 Release */
$PHP_7_3_RC  = false;
$PHP_7_3_RC_DATE = "22 Nov 2018";

$PHP_7_3_VERSION         = "7.3.0";
$PHP_7_3_DATE            = "06 Dec 2018";
$PHP_7_3_SHA256     = array(
    "tar.bz2"       => "7a267daec9969a997c5c8028c350229646748e0fcc71e2f2dbb157ddcee87c67",
    "tar.gz"        => "391bd0f91d9bdd01ab47ef9607bad8c65e35bc9bb098fb7777b2556e2c847b11",
    "tar.xz"        => "7d195cad55af8b288c3919c67023a14ff870a73e3acc2165a6d17a4850a560b5",
);

/* PHP 7.2 Release */
$PHP_7_2_RC = false; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "25 Oct 2018";

$PHP_7_2_VERSION         = "7.2.13";
$PHP_7_2_DATE            = "06 Dec 2018";
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "5b4a46fb76491bcd3eee1213773382e570f6ecf9b22d623b24e2822298b3e92d",
    "tar.gz"        => "e563cee406b1ec96649c22ed2b35796cfe4e9aa9afa6eab6be4cf2fe5d724744",
    "tar.xz"        => "14b0429abdb46b65c843e5882c9a8c46b31dfbf279c747293b8ab950c2644a4b",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "25 Oct 2018";

$PHP_7_1_VERSION         = "7.1.25";
$PHP_7_1_DATE            = "06 Dec 2018";
$PHP_7_1_SHA256     = array(
    'tar.bz2'       => '002cdc880ac7cfaede2c389204d366108847db0f3ac72edf1ba95c0577f9aaac',
    'tar.gz'        => '7dc40e202140e8b4fb3d992c15a68d98dc06b805e6b218497d260abbe51f5958',
    'tar.xz'        => '0fd8dad1903cd0b2d615a1fe4209f99e53b7292403c8ffa1919c0f4dd1eada88',
);

/* PHP 7.0 Release */
$PHP_7_0_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "07 December 2017";

$PHP_7_0_VERSION         = "7.0.33";
$PHP_7_0_DATE            = "06 Dec 2018";
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "4933ea74298a1ba046b0246fe3771415c84dfb878396201b56cb5333abe86f07",
                       "tar.gz"        => "d71a6ecb6b13dc53fed7532a7f8f949c4044806f067502f8fb6f9facbb40452a",
                       "tar.xz"        => "ab8c5be6e32b1f8d032909dedaaaa4bbb1a209e519abb01a52ce3914f9a13d96",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = "05 Jan 2017";

$PHP_5_6_VERSION         = "5.6.39";
$PHP_5_6_DATE            = "06 Dec 2018";
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "b3db2345f50c010b01fe041b4e0f66c5aa28eb325135136f153e18da01583ad5",
                       "tar.gz"        => "127b122b7d6c7f3c211c0ffa554979370c3131196137404a51a391d8e2e9c7bb",
                       "tar.xz"        => "8147576001a832ff3d03cb2980caa2d6b584a10624f87ac459fcd3948c6e4a10",
);

$RELEASES = array(
    7 => array(
        $PHP_7_3_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_3_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_3_VERSION (tar.bz2)",
                    "sha256"   => $PHP_7_3_SHA256["tar.bz2"],
                    "date"     => $PHP_7_3_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_3_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_3_VERSION (tar.gz)",
                    "sha256"   => $PHP_7_3_SHA256["tar.gz"],
                    "date"     => $PHP_7_3_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_3_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_3_VERSION (tar.xz)",
                    "sha256"   => $PHP_7_3_SHA256["tar.xz"],
                    "date"     => $PHP_7_3_DATE,
                ),
            ),
        ),
        $PHP_7_2_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_2_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_2_VERSION (tar.bz2)",
                    "sha256"   => $PHP_7_2_SHA256["tar.bz2"],
                    "date"     => $PHP_7_2_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_2_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_2_VERSION (tar.gz)",
                    "sha256"   => $PHP_7_2_SHA256["tar.gz"],
                    "date"     => $PHP_7_2_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_2_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_2_VERSION (tar.xz)",
                    "sha256"   => $PHP_7_2_SHA256["tar.xz"],
                    "date"     => $PHP_7_2_DATE,
                ),
            ),
        ),
        $PHP_7_1_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.bz2)",
                    "sha256"   => $PHP_7_1_SHA256["tar.bz2"],
                    "date"     => $PHP_7_1_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.gz)",
                    "sha256"   => $PHP_7_1_SHA256["tar.gz"],
                    "date"     => $PHP_7_1_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_1_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_1_VERSION (tar.xz)",
                    "sha256"   => $PHP_7_1_SHA256["tar.xz"],
                    "date"     => $PHP_7_1_DATE,
                ),
            ),
        ),
        $PHP_7_0_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.bz2)",
                    "sha256"   => $PHP_7_0_SHA256["tar.bz2"],
                    "date"     => $PHP_7_0_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.gz",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.gz)",
                    "sha256"   => $PHP_7_0_SHA256["tar.gz"],
                    "date"     => $PHP_7_0_DATE,
                ),
                array(
                    "filename" => "php-$PHP_7_0_VERSION.tar.xz",
                    "name"     => "PHP $PHP_7_0_VERSION (tar.xz)",
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
                    "sha256"   => $PHP_5_6_SHA256["tar.bz2"],
                    "date"     => $PHP_5_6_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.gz)",
                    "sha256"   => $PHP_5_6_SHA256["tar.gz"],
                    "date"     => $PHP_5_6_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_6_VERSION.tar.xz",
                    "name"     => "PHP $PHP_5_6_VERSION (tar.xz)",
                    "sha256"   => $PHP_5_6_SHA256["tar.xz"],
                    "date"     => $PHP_5_6_DATE,
                ),
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_6_VERSION; // Some scripts require this set
$PHP_5_DATE    = $PHP_5_6_DATE; // Used by bumpRelease script
$PHP_5_RC_DATE = $PHP_5_6_RC_DATE; // Used by master

$PHP_7_VERSION = $PHP_7_2_VERSION; // Some scripts require this set
$PHP_7_DATE    = $PHP_7_2_DATE; // Used by bumpRelease script
$PHP_7_RC_DATE = $PHP_7_2_RC_DATE; // Used by master
