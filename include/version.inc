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
$PHP_5_WINDOWS_DATE = "10 March 2009";
$PHP_5_WINDOWS_VERSION = "5.2.9-1";

$PHP_5_MD5     = array(
                       "tar.bz2"       => "280d6cda7f72a4fc6de42fda21ac2db7",
                       "tar.gz"        => "98b647561dc664adefe296106056cf11",
                       "zip"           => "2ed82c452806327d9fa50fa29d4c74f9",
                       "installer"     => "5006e3ba05dee5a65a56d6f052e62a72",
                       "nts.zip"       => "59d8edb7a615a8af7f5c6a92373763c3",
                       "nts.installer" => "3b22025347e3c216667d12795547cd9d",
                       "nts.debugpack" => "73327228073e0b944b9134a83a1421bd",
                       "debugpack"     => "5ad7e63d2038603964be6828c4475113"
);

$PHP_5_RC      = '5.3.0RC1';
$PHP_5_RC_DATE = "24 March 2009";

$PHP_5_WINDOWS_NOTE_MSI = "";
$PHP_5_WINDOWS_NOTE_ZIP = "The PECL package will <em>not</em> be released for
this version. The 5.2.6 PECL package does however work with this release";

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
                    // The debug packs dont have its own version apparently
                    "filename" => "php-debug-pack-$PHP_5_VERSION-Win32.zip",
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
                ),
                array(
                    // The debug packs dont have its own version apparently
                    "filename" => "php-debug-pack-$PHP_5_VERSION-nts-Win32.zip",
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
