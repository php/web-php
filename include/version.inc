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

/* PHP 7.2 Release */
$PHP_7_2_RC = false; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "18 Jan 2018";

$PHP_7_2_VERSION         = "7.2.2";
$PHP_7_2_DATE            = "1 Feb 2018";
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "f841ac58e17471f2241ea892b34edb01dc9b93ad9f661ffe4e3f1f476a8f4aee",
    "tar.gz"        => "5963df05fec21927c03fe9f7bf379be2d1eacde6c0f9dcde6143c7133e55abd4",
    "tar.xz"        => "47d7607d38a1d565fc43ea942c92229a7cd165f156737f210937e375b243cb11",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = "7.1.14RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "18 Jan 2018";;

$PHP_7_1_VERSION         = "7.1.13";
$PHP_7_1_DATE            = "4 Jan 2018";
$PHP_7_1_SHA256     = array(
    "tar.bz2"       => "35fda51d2d44600940185fd5818d336a79e77ab3c98e2bd075091f2f91cf98a1",
    "tar.gz"        => "12fcbf59c9eb9af215ef38815d5da39b9d74549092c34b0dfc31442699740ce9",
    "tar.xz"        => "1a0b3f2fb61959b57a3ee01793a77ed3f19bde5aa90c43dcacc85ea32f64fc10",
);

/* PHP 7.0 Release */
$PHP_7_0_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "07 December 2017";

$PHP_7_0_VERSION         = "7.0.27";
$PHP_7_0_DATE            = "04 Jan 2018";
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "99fa2563bb4c4c1cde9febe87cfe97324227d7b4b8828f2e936e507127394131",
                       "tar.gz"        => "809c0181e970dd17c6a6cabbf64518e719c7253e7490f8e1279bc1e1fbdf7996",
                       "tar.xz"        => "4b2bc823e806dbf7b62fe0b92b0d14b0c6e03f88c3fc5d96278416c54ce11f6c",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = "05 Jan 2017";

$PHP_5_6_VERSION         = "5.6.33";
$PHP_5_6_DATE            = "04 Jan 2018";
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "07f696a9761dcd839e2045c95c3a4d2ffb52c54417477cca9d30a14975b831cc",
                       "tar.gz"        => "bedfac81cfaa25961812a1aec458c4109411a14991b43a416343ffb830b8da6a",
                       "tar.xz"        => "9004995fdf55f111cd9020e8b8aff975df3d8d4191776c601a46988c375f3553",
);

$RELEASES = array(
    7 => array(
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
$PHP_5_DATE    = $PHP_5_6_DATE; // Used by buumpRelease script
$PHP_5_RC_DATE = $PHP_5_6_RC_DATE; // Used by master

$PHP_7_VERSION = $PHP_7_2_VERSION; // Some scripts require this set
$PHP_7_DATE    = $PHP_7_2_DATE; // Used by buumpRelease script
$PHP_7_RC_DATE = $PHP_7_2_RC_DATE; // Used by master

