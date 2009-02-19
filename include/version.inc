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
$PHP_5_VERSION = "5.2.8";
$PHP_5_DATE    = "08 December 2008";
$PHP_5_MD5     = array(
                       "tar.bz2"       => "8760a833cf10433d3e72271ab0d0eccf",
                       "tar.gz"        => "e748cace3cfecb66fb6de9a945f98e2a",
                       "zip"           => "71511834881753ea0906f2bca91632b9",
                       "installer"     => "159def484800411060a9eacccafd2253",
                       "nts.zip"       => "207abb02054c5ce996bc350352224acc",
                       "nts.installer" => "d4490964818542c416644b3d67f5b350",
                       "nts.debugpack" => "240566ce66761ab076ae9901547b7ce2",
                       "debugpack"     => "fabc6e79c1c66dc80320165336b5ed54"
);

$PHP_5_RC      = '5.2.9RC3';
$PHP_5_RC_DATE = "19 February 2009";

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
                    "filename" => "php-$PHP_5_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION zip package",
                    "md5"      => $PHP_5_MD5["zip"],
                    "date"     => $PHP_5_DATE,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION-win32-installer.msi",
                    "name"     => "PHP $PHP_5_VERSION installer",
                    "md5"      => $PHP_5_MD5["installer"],
                    "date"     => $PHP_5_DATE,
                    "note"     => $PHP_5_WINDOWS_NOTE_MSI,
                ),
/*
		array(
                    "filename" => "pecl-$PHP_5_VERSION-Win32.zip",
                    "name"     => "PECL $PHP_5_VERSION Win32 binaries",
                    "md5"      => $PHP_5_MD5["pecl.zip"],
                    "date"     => $PHP_5_WINDOWS_DATE_ZIP,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
*/
                array(
                    "filename" => "php-debug-pack-$PHP_5_VERSION-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Win32 Debug Pack",
                    "md5"      => $PHP_5_MD5["debugpack"],
                    "date"     => $PHP_5_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Non-thread-safe zip package",
                    "md5"      => $PHP_5_MD5["nts.zip"],
                    "date"     => $PHP_5_DATE,
                    "note"     => $PHP_5_WINDOWS_NOTE_ZIP,
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION-nts-win32-installer.msi",
                    "name"     => "PHP $PHP_5_VERSION Non-thread-safe installer",
                    "md5"      => $PHP_5_MD5["nts.installer"],
                    "date"     => $PHP_5_DATE,
                ),
                array(
                    "filename" => "php-debug-pack-$PHP_5_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Non-thread-safe Win32 Debug Pack",
                    "md5"      => $PHP_5_MD5["nts.debugpack"],
                    "date"     => $PHP_5_DATE,
                ),
/*
                array(
                    "filename" => "pecl-$PHP_5_VERSION-nts-Win32.zip",
                    "name"     => "PECL $PHP_5_VERSION Non-thread-safe Win32 binaries",
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
