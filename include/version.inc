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

/* PHP 5 Release */
$PHP_5_VERSION = "5.2.9";
$PHP_5_DATE    = "26 February 2009";
$PHP_5_WINDOWS_DATE = "8 April 2009";
$PHP_5_WINDOWS_VERSION = "5.2.9-2";

$PHP_5_MD5     = array(
                       "tar.bz2"       => "280d6cda7f72a4fc6de42fda21ac2db7",
                       "tar.gz"        => "98b647561dc664adefe296106056cf11",
                       "zip"           => "316b9c81bab08e6547a730315ea2abfd",
                       "installer"     => "e2162faa3467aed01651df4269aa6944",
                       "nts.zip"       => "8f85777941f7722fcbfe08e7de358f7d",
                       "nts.installer" => "4e7a1bec2b268d3d2d28cb89f629b680",
                       "nts.debugpack" => "4b7b695a257527f2896312f98dc30fd3",
                       "debugpack"     => "b52e9a152e105c7391c832fdfe0fa06f",
);

$PHP_5_RC      = '5.2.10RC2';
$PHP_5_RC_DATE = "11 June 2009";

// Hack that works so 5.3.0 and 5.2.10 can have an RC party together (today)
$RCS = array('5.2.10 RC2' => 'June 11, 2009', '5.3.0 RC3' => 'June 11, 2009');

$PHP_5_WINDOWS_NOTE_MSI = "Updated 9th of April: Added the missing oci8 DLL";
$PHP_5_WINDOWS_NOTE_ZIP = "Updated 9th of April: Added the missing oci8 DLL<br />
The PECL package will <em>not</em> be released for
this version. The 5.2.6 PECL package does however work with this release";

$RELEASES = array(
    5 => array(
        $PHP_5_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_5_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_5_VERSION (tar.bz2)",
                    "md5"      => $PHP_5_MD5["tar.bz2"],
                    "date"     => $PHP_5_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION.tar.gz",
                    "name"     => "PHP $PHP_5_VERSION (tar.gz)",
                    "md5"      => $PHP_5_MD5["tar.gz"],
                    "date"     => $PHP_5_DATE,
                ),
            ),
            "windows" => array( /* Prefix the key with dot if the windows stuff isn't available yet*/
                array(
                    "filename" => "php-$PHP_5_WINDOWS_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_5_WINDOWS_VERSION zip package",
                    "md5"      => $PHP_5_MD5["zip"],
                    "date"     => $PHP_5_WINDOWS_DATE,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_WINDOWS_VERSION-win32-installer.msi",
                    "name"     => "PHP $PHP_5_WINDOWS_VERSION installer",
                    "md5"      => $PHP_5_MD5["installer"],
                    "date"     => $PHP_5_WINDOWS_DATE,
                    "note"     => $PHP_5_WINDOWS_NOTE_MSI,
                ),
/*
		array(
                    "filename" => "pecl-$PHP_5_WINDOWS_VERSION-Win32.zip",
                    "name"     => "PECL $PHP_5_WINDOWS_VERSION Win32 binaries",
                    "md5"      => $PHP_5_MD5["pecl.zip"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
*/
                array(
                    "filename" => "php-debug-pack-$PHP_5_WINDOWS_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Win32 Debug Pack",
                    "md5"      => $PHP_5_MD5["debugpack"],
                    "date"     => $PHP_5_WINDOWS_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_WINDOWS_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_WINDOWS_VERSION Non-thread-safe zip package",
                    "md5"      => $PHP_5_MD5["nts.zip"],
                    "date"     => $PHP_5_WINDOWS_DATE,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_WINDOWS_VERSION-nts-win32-installer.msi",
                    "name"     => "PHP $PHP_5_WINDOWS_VERSION Non-thread-safe installer",
                    "md5"      => $PHP_5_MD5["nts.installer"],
                    "date"     => $PHP_5_WINDOWS_DATE,
                    "note"     => $PHP_5_WINDOWS_NOTE_MSI,
                ),
                array(
                    "filename" => "php-debug-pack-$PHP_5_WINDOWS_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Non-thread-safe Win32 Debug Pack",
                    "md5"      => $PHP_5_MD5["nts.debugpack"],
                    "date"     => $PHP_5_WINDOWS_DATE,
                ),
/*
                array(
                    "filename" => "pecl-$PHP_5_WINDOWS_VERSION-nts-Win32.zip",
                    "name"     => "PECL $PHP_5_WINDOWS_VERSION Non-thread-safe Win32 binaries",
                    "md5"      => $PHP_5_MD5["pecl.nts"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                    //"note"     => "(Most of these <a href='http://pecl.php.net/'>PECL</a> extension files come standard with the PHP 4 Windows binaries, but have since been moved into this separate PECL download.  Files such as php_pdf.dll, php_ssh2.dll, etc.)",
                ),
*/
            ),
        ),
        $PHP_5_RC => array(),
    ),
);

