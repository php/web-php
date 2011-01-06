<?php // vim: et
/* The format is:
 * array(
 *     "major release number" => array(
 *         "release" => array(
 *             "source/windows" => array(
 *                 "filename" => "filename.tar.bz2",
 *                 "name"     => "package name",
 *                 "md5"      => "crc32, right?",
 *                 "date"     => "this files release date",
 *                 "note"     => "this file was updated 29feb due to broken phar files..",
 *             ),
 *             "announcement" => "bool, release announcement exists in releases/?"
 *         ),
 *     ),
 * );
 */

/* PHP 5.3 Release */
$PHP_5_3_RC      = false; // '5.3.4RC2'; // false; 
$PHP_5_3_RC_DATE = '02 December 2010';

$PHP_5_3_VERSION         = "5.3.5";
$PHP_5_3_DATE            = "06 January 2010";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "8aaf20c95e91f25c5b6a591e5d6d61b9",
                       "tar.gz"        => "fb727a3ac72bf0ce37e1a20468a7bb81",
);

/* PHP 5.2 Release */
$PHP_5_2_RC      = false; // '5.2.15RC2'; // false;
$PHP_5_2_RC_DATE = "02 December 2010";

$PHP_5_2_VERSION         = "5.2.17";
$PHP_5_2_DATE            = "06 January 2010";
$PHP_5_2_WINDOWS_DATE    = $PHP_5_2_DATE;
$PHP_5_2_WINDOWS_VERSION = $PHP_5_2_VERSION;

$PHP_5_2_MD5     = array(
                       "tar.bz2"       => "66a3e5755df257c814c42d90546bc3de",
                       "tar.gz"        => "a8ad77d821a8e708a37b05131e8407d3",
                       "zip"           => "f4683c473c6c6db8b0d856eb84a97cdc",
                       "installer"     => "57f3d5fd4ff30f889cc9309c4f3bee17",
					   "nts.zip"       => "0b214f3225ee41422c08d0a722bb0a9f",
                       "nts.installer" => "fa6878e8f6ac124c2fde1af80347e286",
                       "debugpack"     => "f3619fe2abc4ab33e71e5b8330cb33c9",
                       "nts.debugpack" => "71c17dc6831349fffd79f0746eddee13",
);

$PHP_5_2_WINDOWS_NOTE_MSI = "";
$PHP_5_2_WINDOWS_NOTE_ZIP = "";

$RELEASES = array(
    5 => array(
        $PHP_5_3_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_3_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_3_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_3_MD5["tar.bz2"],
                    "date"     => $PHP_5_3_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_3_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_3_VERSION (tar.gz)",
                    "md5"      => $PHP_5_3_MD5["tar.gz"],
                    "date"     => $PHP_5_3_DATE,
                ),
            ),
        ),
        $PHP_5_2_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_2_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_2_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_2_MD5["tar.bz2"],
                    "date"     => $PHP_5_2_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_2_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_2_VERSION (tar.gz)",
                    "md5"      => $PHP_5_2_MD5["tar.gz"],
                    "date"     => $PHP_5_2_DATE,
                ),
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_3_VERSION; // Some scripts require this set

