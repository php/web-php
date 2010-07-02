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
$PHP_5_3_RC      = '5.3.3RC2';
$PHP_5_3_RC_DATE = '01 July 2010';

$PHP_5_3_VERSION         = "5.3.2";
$PHP_5_3_DATE            = "04 Mar 2010";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "46f500816125202c48a458d0133254a4",
                       "tar.gz"        => "4480d7c6d6b4a86de7b8ec8f0c2d1871",
);

/* PHP 5.2 Release */
$PHP_5_2_RC      = '5.2.14RC2';
$PHP_5_2_RC_DATE = "01 July 2010";

$PHP_5_2_VERSION         = "5.2.13";
$PHP_5_2_DATE            = "25 February 2010";
$PHP_5_2_WINDOWS_DATE    = $PHP_5_2_DATE;
$PHP_5_2_WINDOWS_VERSION = $PHP_5_2_VERSION;

$PHP_5_2_MD5     = array(
                       "tar.bz2"       => "eb4d0766dc4fb9667f05a68b6041e7d1",
                       "tar.gz"        => "cdf95cdc1ebccccce9c96653fd593dd4",
                       "zip"           => "3074bad887d613acf992ebdfea0e4465",
                       "installer"     => "891e3262428851ebe71d5432a97be6d5",
                       "nts.zip"       => "a7bd052e7a1413b743c07ae37171980d",
                       "nts.installer" => "d0e502db99565afde77b4f58f13fbad2",
                       "debugpack"     => "e3382d5acbb527d21b768766f563a75d",
                       "nts.debugpack" => "3693478973cd41752e2c0a1c3cddb997",
);

$PHP_5_2_WINDOWS_NOTE_MSI = "";
$PHP_5_2_WINDOWS_NOTE_ZIP = "
The PECL package will <em>not</em> be released for
this version. The 5.2.6 PECL package does however work with this release";

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

