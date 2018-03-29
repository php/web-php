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
$PHP_7_2_RC = '7.2.4RC1'; // Current RC version (e.g., '7.2.1RC1') or false
$PHP_7_2_RC_DATE = "15 Mar 2018";

$PHP_7_2_VERSION         = "7.2.3";
$PHP_7_2_DATE            = "1 Mar 2018";
$PHP_7_2_SHA256     = array(
    "tar.bz2"       => "4a735aac0ba764dd8208ea29007d3916396c5292e003ba8d3bec49edcdd5bf92",
    "tar.gz"        => "5dc98f2266db40c5e4d9b5edf5e29e2449e819fff8321a07eb3830cf0b104bbb",
    "tar.xz"        => "b3a94f1b562f413c0b96f54bc309706d83b29ac65d9b172bc7ed9fb40a5e651f",
);

/* PHP 7.1 Release */
$PHP_7_1_RC = "7.1.16RC1"; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_1_RC_DATE = "15 Mar 2018";

$PHP_7_1_VERSION         = "7.1.15";
$PHP_7_1_DATE            = "1 Mar 2018";
$PHP_7_1_SHA256     = array(
    "tar.bz2"       => "e117a54738e9485de5fc75673d39dbe937dd87f0f9cc9e281960ef9b961adcbd",
    "tar.gz"        => "0669c68a52cbd2f1cfa83354918ed03b0bcaa34ed9bafaee7dfd343461b881d4",
    "tar.xz"        => "0e17192fb43532e4ebaa190ecec9c7e59deea7dadb7dab67b19c2081a68bd817",
);

/* PHP 7.0 Release */
$PHP_7_0_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_7_0_RC_DATE = "07 December 2017";

$PHP_7_0_VERSION         = "7.0.29";
$PHP_7_0_DATE            = "29 Mar 2018";
$PHP_7_0_SHA256     = array(
                       "tar.bz2"       => "989142d5c5ff7a11431254f9c1995235bad61a3364b99c966e11e06aa10d3fbc",
                       "tar.gz"        => "5efe45e345f967cb20f9ff92cd514753872a65feffea1bf311c71864344bd8e8",
                       "tar.xz"        => "ca79d3ecc123bff4b623d4a1bbf5ad53ad39f5f2f5912fecc0ea97e95eba21cc",
);

/* PHP 5.6 Release */
$PHP_5_6_RC = false; // Current RC version (e.g., '5.6.7RC1') or false
$PHP_5_6_RC_DATE = "05 Jan 2017";

$PHP_5_6_VERSION         = "5.6.34";
$PHP_5_6_DATE            = "01 Mar 2018";
$PHP_5_6_SHA256     = array(
                       "tar.bz2"       => "e19f499d8cee4b0b0780361ecb6a00c41654772a754803ab9ea866b8d47cf2cd",
                       "tar.gz"        => "de28251ef6d7eb945eb7b770ff668b9f978d9adad52a8c763f6ee409a96732ea",
                       "tar.xz"        => "21453be3a045204cd2717543ef42771324f411f40962ecda4fe841930a933128",
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

