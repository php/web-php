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
$PHP_5_3_RC      = '5.3.4RC1'; // false; 
$PHP_5_3_RC_DATE = '18 November 2010';

$PHP_5_3_VERSION         = "5.3.3";
$PHP_5_3_DATE            = "22 July 2010";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "21ceeeb232813c10283a5ca1b4c87b48",
                       "tar.gz"        => "5adf1a537895c2ec933fddd48e78d8a2",
);

/* PHP 5.2 Release */
$PHP_5_2_RC      = '5.2.15RC1'; // false;
$PHP_5_2_RC_DATE = "18 November 2010";

$PHP_5_2_VERSION         = "5.2.14";
$PHP_5_2_DATE            = "22 July 2010";
$PHP_5_2_WINDOWS_DATE    = $PHP_5_2_DATE;
$PHP_5_2_WINDOWS_VERSION = $PHP_5_2_VERSION;

$PHP_5_2_MD5     = array(
                       "tar.bz2"       => "bfdfc0e62fe437020cc04078269d1414",
                       "tar.gz"        => "6dff7429a1b43aa1c76a43e909215608",
                       "zip"           => "ade390d572b2d6d16056eb5bf3577c40",
                       "installer"     => "7040598a802d56dbda00bb8361ea5c7b",
                       "nts.zip"       => "d0811299456ce19401ed82fbe6655627",
                       "nts.installer" => "ba21711163904cf80cc91c83ec28318d",
                       "debugpack"     => "9db94257f022912a1c645c91b939ab06",
                       "nts.debugpack" => "b6cc7e0746512ab17bd889149614c930",
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
            "windows" => array( /* Prefix the key with dot if the windows stuff isn't available yet*/
                array(
                    "filename" => "php-$PHP_5_2_WINDOWS_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_5_2_WINDOWS_VERSION zip package",
                    "md5"      => $PHP_5_2_MD5["zip"],
                    "date"     => $PHP_5_2_WINDOWS_DATE,
                    "note"     => $PHP_5_2_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_2_WINDOWS_VERSION-win32-installer.msi",
                    "name"     => "PHP $PHP_5_2_WINDOWS_VERSION installer",
                    "md5"      => $PHP_5_2_MD5["installer"],
                    "date"     => $PHP_5_2_WINDOWS_DATE,
                    "note"     => $PHP_5_2_WINDOWS_NOTE_MSI,
                ),
/*
		array(
                    "filename" => "pecl-$PHP_5_2_WINDOWS_VERSION-Win32.zip",
                    "name"     => "PECL $PHP_5_2_WINDOWS_VERSION Win32 binaries",
                    "md5"      => $PHP_5_2_MD5["pecl.zip"],
                    "date"     => $PHP_5_2_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_2_WINDOWS_NOTE_ZIP,
                ),
*/
                array(
                    "filename" => "php-debug-pack-$PHP_5_2_WINDOWS_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_5_2_VERSION Win32 Debug Pack",
                    "md5"      => $PHP_5_2_MD5["debugpack"],
                    "date"     => $PHP_5_2_WINDOWS_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_2_WINDOWS_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_2_WINDOWS_VERSION Non-thread-safe zip package",
                    "md5"      => $PHP_5_2_MD5["nts.zip"],
                    "date"     => $PHP_5_2_WINDOWS_DATE,
                    "note"     => $PHP_5_2_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_2_WINDOWS_VERSION-nts-win32-installer.msi",
                    "name"     => "PHP $PHP_5_2_WINDOWS_VERSION Non-thread-safe installer",
                    "md5"      => $PHP_5_2_MD5["nts.installer"],
                    "date"     => $PHP_5_2_WINDOWS_DATE,
                    "note"     => $PHP_5_2_WINDOWS_NOTE_MSI,
                ),
                array(
                    "filename" => "php-debug-pack-$PHP_5_2_WINDOWS_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_2_VERSION Non-thread-safe Win32 Debug Pack",
                    "md5"      => $PHP_5_2_MD5["nts.debugpack"],
                    "date"     => $PHP_5_2_WINDOWS_DATE,
                ),
/*
                array(
                    "filename" => "pecl-$PHP_5_2_WINDOWS_VERSION-nts-Win32.zip",
                    "name"     => "PECL $PHP_5_2_WINDOWS_VERSION Non-thread-safe Win32 binaries",
                    "md5"      => $PHP_5_2_MD5["pecl.nts"],
                    "date"     => $PHP_5_2_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_2_WINDOWS_NOTE_ZIP,
                    //"note"     => "(Most of these <a href='http://pecl.php.net/'>PECL</a> extension files come standard with the PHP 4 Windows binaries, but have since been moved into this separate PECL download.  Files such as php_pdf.dll, php_ssh2.dll, etc.)",
                ),
*/
            ),
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_3_VERSION; // Some scripts require this set

