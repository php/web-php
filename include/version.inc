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
$PHP_5_VERSION = "5.2.7";
$PHP_5_DATE    = "04 December 2008";
$PHP_5_MD5     = array(
                       "tar.bz2"       => "9ffc42edbb7faad965699666ddd559bc",
                       "tar.gz"        => "f1f413a9f10ff7f38787b0a3bc299e92",
                       "zip"           => "b57a68ca548f14e5a2b8811751c63f88",
                       "installer"     => "a9d67f05ce3387668db1c98ceda83808",
                       "nts.zip"       => "f54e29610fc309be99bf5ed0e5ccf5d9",
                       "nts.installer" => "9db3efcafd3459b49e93d699f56bc4f9",
                       "nts.debugpack" => "87d4feaa1f572a42f2e238bee68dcbab",
                       "debugpack"     => "d2cc721696bdc0c4256183b18ab1dfb8"
);

$PHP_5_RC      = '5.3.0alpha3';
$PHP_5_RC_DATE = "04 December 2008";

$PHP_5_WINDOWS_NOTE_MSI = "";
$PHP_5_WINDOWS_NOTE_ZIP = "";
$PHP_5_WINDOWS_DATE_MSI = "04 December 2008";
$PHP_5_WINDOWS_DATE_ZIP = "04 December 2008";

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
