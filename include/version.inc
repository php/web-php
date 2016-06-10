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
$PHP_7_0_RC = "7.0.8RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = '09 Jun 2016';

$PHP_7_0_VERSION         = "7.0.7";
$PHP_7_0_DATE            = "26 May 2016";
$PHP_7_0_MD5     = array(
                       "tar.bz2"       => "cc231de15146ca14a69610f695995ab8",
                       "tar.gz"        => "197ec66d134da8968ddd0b89f1cfac2a",
                       "tar.xz"        => "75f8d1693a470cefe2a50abd283eb291",
);
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "474f2925c4782b94016e3afbb17b14ff9cc6f4fdb6f6e231b36a378bb18a3d1a",
                       "tar.gz"        => "66282ff4a9f88fe9607d9574e15bf335885b964245591a1740adb3f79c514a67",
                       "tar.xz"        => "9cc64a7459242c79c10e79d74feaf5bae3541f604966ceb600c3d2e8f5fe4794",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = '5.6.23RC1'; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = '09 Jun 2016';

$PHP_5_6_VERSION         = "5.6.22";
$PHP_5_6_DATE            = "26 May 2016";
$PHP_5_6_MD5     = array(
                       "tar.bz2"       => "2244754a50d0a5f07c20967d0c9e0b8d",
                       "tar.gz"        => "e2aa4768b3eae84fefe914272eae8ecb",
                       "tar.xz"        => "19a5bcbddc105dfb29482ab779fcc795",
);
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "90da8a80cc52fa699cf2bfa4c6fa737c772df7c92b81ef483460aa3b1e9f88c6",
                       "tar.gz"        => "4ce0f58c3842332c4e3bb2ec1c936c6817294273abaa37ea0ef7ca2a68cf9b21",
                       "tar.xz"        => "c96980d7de1d66c821a4ee5809df0076f925b2fe0b8c362d234d92f2f0a178e2",
);
/* PHP 5.5 Release */
$PHP_5_5_RC =  false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_5_RC_DATE = '25 Jun 2015';

$PHP_5_5_VERSION         = "5.5.36";
$PHP_5_5_DATE            = "26 May 2016";
$PHP_5_5_MD5     = array(
                       "tar.bz2"       => "8be3d821bfedc091d3c0befc9309b945",
                       "tar.gz"        => "90bcbc3c45dc35532208fc84774c0341",
                       "tar.xz"        => "1db93aa3a3cfd7cfe0f41f3697db35a4",
);
$PHP_5_5_SHA256     = array(
                       "tar.bz2"       => "2484edfaa3de606d74f927b55c5206f51b1ae24ea8e428aa9fc15474c7bb71bb",
                       "tar.gz"        => "ef829f9a9600a858e2363533b80c4e4773505bdc8ea3692d703fc893f267728a",
                       "tar.xz"        => "e1bbe33d6b4da66b15c483131520a9fc505eeb6629fa70c5cfba79590a1d0801",
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

