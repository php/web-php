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

$PHP_5_3_VERSION         = "5.3.4";
$PHP_5_3_DATE            = "09 December 2010";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "2c069d8f690933e3bf6a8741ed818150",
                       "tar.gz"        => "b69b36132899c5ca3bf155efa0218676",
);

/* PHP 5.2 Release */
$PHP_5_2_RC      = false; // '5.2.15RC2'; // false;
$PHP_5_2_RC_DATE = "02 December 2010";

$PHP_5_2_VERSION         = "5.2.15";
$PHP_5_2_DATE            = "09 December 2010";
$PHP_5_2_WINDOWS_DATE    = $PHP_5_2_DATE;
$PHP_5_2_WINDOWS_VERSION = $PHP_5_2_VERSION;

$PHP_5_2_MD5     = array(
                       "tar.bz2"       => "d4ccad187b12835024980a0cea362893",
                       "tar.gz"        => "dbbb2beed6b51e05d134744f137091a9",
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

