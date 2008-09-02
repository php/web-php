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
$PHP_5_VERSION = "5.2.6";
$PHP_5_DATE    = "01 May 2008";
$PHP_5_MD5     = array(
                       "tar.bz2"       => "7380ffecebd95c6edb317ef861229ebd",
                       "tar.gz"        => "1720f95f26c506338f0dba3a51906bbd",
                       "zip"           => "c7e5010114f58282858d7d78e6509cdc",
                       "installer"     => "94e551037e7c9c056f90179f351c0560",
                       "pecl.zip"      => "f0e7b245589d705eef731b51142d5def",
                       "nts.zip"       => "1d3661a086f352ec7e318e7c2eeba4de",
                       "pecl.nts"      => "62b102221920092dfefc08756aa3e926",
                       "nts.installer" => "96a2326b16bda488734d3956a48201b7",
                       "nts.debugpack" => "4c1fd96c8a78e1896d37da81467ff70d",
                       "debugpack"     => "24dde2726e3e0cefbb83c0c375ea1f84"
);

$PHP_5_RC      = '5.3.0alpha2';
$PHP_5_RC_DATE = "02 September 2008";

$PHP_5_WINDOWS_NOTE_MSI = "Update May 6th: Added missing XSL and IMAP extension";
$PHP_5_WINDOWS_NOTE_ZIP = "Update May 3rd: Added missing XSL and IMAP extension";
$PHP_5_WINDOWS_DATE_MSI = "6 May 2008";
$PHP_5_WINDOWS_DATE_ZIP = "3 May 2008";

/* PHP 4 Release */
$PHP_4_VERSION = "4.4.9";
$PHP_4_DATE    = "07 August 2008";
$PHP_4_MD5     = array(
                       "tar.bz2"   => "2e3b2a0e27f10cb84fd00e5ecd7a1880",
                       "tar.gz"    => "9bcc1aba50be0dfeeea551d018375548",
                       "zip"       => "7395068d5489a9f8abf50c6e4b48622f",
);

$PHP_4_RC      = false; //"4.4.9RC1";
$PHP_4_RC_DATE = "22 July 2008";

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
                    "filename" => "php-$PHP_5_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION zip package",
                    "md5"      => $PHP_5_MD5["zip"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION-win32-installer.msi",
                    "name"     => "PHP $PHP_5_VERSION installer",
                    "md5"      => $PHP_5_MD5["installer"],
                    "date"     => $PHP_5_WINDOWS_DATE_MSI,
                    "note"     => $PHP_5_WINDOWS_NOTE_MSI,
                ),
                array(
                    "filename" => "pecl-$PHP_5_VERSION-Win32.zip",
                    "name"     => "PECL $PHP_5_VERSION Win32 binaries",
                    "md5"      => $PHP_5_MD5["pecl.zip"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-debug-pack-$PHP_5_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Win32 Debug Pack",
                    "md5"      => $PHP_5_MD5["debugpack"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Non-thread-safe zip package",
                    "md5"      => $PHP_5_MD5["nts.zip"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION-nts-win32-installer.msi",
                    "name"     => "PHP $PHP_5_VERSION Non-thread-safe installer",
                    "md5"      => $PHP_5_MD5["nts.installer"],
                    "date"     => $PHP_5_WINDOWS_DATE_MSI,
                    "note"     => $PHP_5_WINDOWS_NOTE_MSI,
                ),
                array(
                    "filename" => "php-debug-pack-$PHP_5_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Win32 Debug Pack",
                    "md5"      => $PHP_5_MD5["nts.debugpack"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),

                array(
                    "filename" => "pecl-$PHP_5_VERSION-nts-Win32.zip",
                    "name"     => "PECL $PHP_5_VERSION Non-thread-safe Win32 binaries",
                    "md5"      => $PHP_5_MD5["pecl.nts"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                    //"note"     => "(Most of these <a href='http://pecl.php.net/'>PECL</a> extension files come standard with the PHP 4 Windows binaries, but have since been moved into this separate PECL download.  Files such as php_pdf.dll, php_ssh2.dll, etc.)",
                ),
            ),
        ),
        $PHP_5_RC => array(),
    ),
    4 => array(
        $PHP_4_VERSION => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-$PHP_4_VERSION.tar.bz2",
                    "name"     => "PHP $PHP_4_VERSION (tar.bz2)",
                    "md5"      => $PHP_4_MD5["tar.bz2"],
                    "date"     => $PHP_4_DATE,
                ),
                array(
                    "filename" => "php-$PHP_4_VERSION.tar.gz",
                    "name"     => "PHP $PHP_4_VERSION (tar.gz)",
                    "md5"      => $PHP_4_MD5["tar.gz"],
                    "date"     => $PHP_4_DATE,
                ),
            ),
            "windows" => array( /* Prefix the key with dot if they don't exists yet */
                array(
                    "filename" => "php-$PHP_4_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_4_VERSION zip package",
                    "md5"      => $PHP_4_MD5["zip"],
                    "date"     => $PHP_4_DATE,
                ),
            ),
        ),
        $PHP_4_RC => array(),
    ),
);
