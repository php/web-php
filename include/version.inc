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

$PHP_5_2_VERSION         = "5.2.16";
$PHP_5_2_DATE            = "16 December 2010";
$PHP_5_2_WINDOWS_DATE    = $PHP_5_2_DATE;
$PHP_5_2_WINDOWS_VERSION = $PHP_5_2_VERSION;

$PHP_5_2_MD5     = array(
                       "tar.bz2"       => "3b0bd012bd53bac9a5fefca61eccd5c6",
                       "tar.gz"        => "68f2c92b5b33d131b1ea70ece9fc40ad",
                       "zip"           => "49438bad72fb57ee078a8a22e5459ec4",
                       "installer"     => "c9bc784aa00be843991030b93cb9081c",
					   "nts.zip"       => "e738ff4c3f2d6dd109e35507bf301913",
                       "nts.installer" => "05dce41ea1d54d4a6c45c03200ac712f",
                       "debugpack"     => "43fac8a0ec9dd228e216fad4d05ae75c",
                       "nts.debugpack" => "2c82f2de285933a2b9c1d3b582387307",
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

