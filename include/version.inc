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
$PHP_5_3_RC      = '5.3.1RC1';
$PHP_5_3_RC_DATE = "03 Sep 2009";

$PHP_5_3_VERSION         = "5.3.0";
$PHP_5_3_DATE            = "30 June 2009";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "846760cd655c98dfd86d6d97c3d964b0",
                       "tar.gz"        => "f4905eca4497da3f0beb5c96863196b4",
);

/* PHP 5.2 Release */
$PHP_5_2_RC      = false;
$PHP_5_2_RC_DATE = //"10 Sep 2009";

$PHP_5_2_VERSION         = "5.2.11";
$PHP_5_2_DATE            = "17 September 2009";
$PHP_5_2_WINDOWS_DATE    = $PHP_5_2_DATE;
$PHP_5_2_WINDOWS_VERSION = $PHP_5_2_VERSION;

$PHP_5_2_MD5     = array(
                       "tar.bz2"       => "286bf34630f5643c25ebcedfec5e0a09",
                       "tar.gz"        => "0223d71f0d6987c06c54b7557ff47f1d",
                       "zip"           => "adac50ae1449b76f10ff1865bb4f94f1",
                       "installer"     => "3cedc71fc90f88239d629cdb735d87c0",
                       "nts.zip"       => "b724475450a13af4cd99c518fd495340",
                       "nts.installer" => "4fe1344093e26c2a51a82094bac131ad",
                       "debugpack"     => "38cb1b783dd08dff41f445b582d2ffed",
                       "nts.debugpack" => "19d026d6e4322dc64694010ae254e978",
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

