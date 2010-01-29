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
$PHP_5_3_RC      = '5.3.2RC1'; /* false; */
$PHP_5_3_RC_DATE = "22 Dec 2009";

$PHP_5_3_VERSION         = "5.3.1";
$PHP_5_3_DATE            = "19 Nov 2009";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "63e97ad450f0f7259e785100b634c797",
                       "tar.gz"        => "41fbb368d86acb13fc3519657d277681",
);

/* PHP 5.2 Release */
$PHP_5_2_RC      = '5.2.13RC1';
$PHP_5_2_RC_DATE = "28 Jan 2010";

$PHP_5_2_VERSION         = "5.2.12";
$PHP_5_2_DATE            = "17 December 2009";
$PHP_5_2_WINDOWS_DATE    = $PHP_5_2_DATE;
$PHP_5_2_WINDOWS_VERSION = $PHP_5_2_VERSION;

$PHP_5_2_MD5     = array(
                       "tar.bz2"       => "5b7077e366c7eeab34da31dd860a1923",
                       "tar.gz"        => "e6d6cc6570c77f60d8d4c99565d42ffd",
                       "zip"           => "e04f2944175dc19d7d007b5e889690b4",
                       "installer"     => "df73529935bb855842e38afda8a295d7",
                       "nts.zip"       => "ff0c67bb622c062f0820598e8d6bc12c",
                       "nts.installer" => "418656307a52c99f2175c748da31a9d8",
                       "debugpack"     => "b21a5abb9e5bae4c657d0983986c4434",
                       "nts.debugpack" => "e2620df81442ddefc0c3450be58540f9",
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

