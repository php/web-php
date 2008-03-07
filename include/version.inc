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
$PHP_5_VERSION = "5.2.5";
$PHP_5_DATE    = "08 November 2007";
$PHP_5_MD5     = array(
                       "tar.bz2"   => "1fe14ca892460b09f06729941a1bb605",
                       "tar.gz"    => "61a0e1661b70760acc77bc4841900b7a",
                       "zip"       => "a1e31c0d872ab030a2256b1cd6d3b7d1",
                       "installer" => "f9396b654721d9a18c95ea6412c3d54e",
                       "pecl.zip"  => "a3553b61c9332d08a5044cf9bf89f2df",
                       "nts.zip"   => "41ef1582f43cfdb6e546a626b9ef93d6",
                       "pecl.nts"  => "6e5ac694907b4aae080b2c9b6e83748a",
);

$PHP_5_RC      = '5.2.6RC2';
$PHP_5_RC_DATE = "06 March 2008";

/* PHP 4 Release */
$PHP_4_VERSION = "4.4.8";
$PHP_4_DATE    = "03 January 2008";
$PHP_4_MD5     = array(
                       "tar.bz2"   => "ed31e77414e0331e787487b53732dbca",
                       "tar.gz"    => "8ad5d1ca793d55b24cd82e591248c04e",
//                     "zip"       => "e774e79530d610c58c5f2da433d14e0f",
);

$PHP_4_RC      = false;
$PHP_4_RC_DATE = "20 December 2007";

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
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION-win32-installer.msi",
                    "name"     => "PHP $PHP_5_VERSION installer",
                    "md5"      => $PHP_5_MD5["installer"],
                    "date"     => "15 November 2007",
                    "note"     => "Updated due to problems with the original installer for this release.",
                ),
                array(
                    "filename" => "pecl-$PHP_5_VERSION-Win32.zip",
                    "name"     => "PECL $PHP_5_VERSION Win32 binaries",
                    "md5"      => $PHP_5_MD5["pecl.zip"],
                    "date"     => $PHP_5_DATE,
                ),
                array(
                    "filename" => "php-$PHP_5_VERSION-nts-Win32.zip",
                    "name"     => "PHP $PHP_5_VERSION Non-thread-safe Win32 binaries",
                    "md5"      => $PHP_5_MD5["nts.zip"],
                    "date"     => $PHP_5_DATE,
                ), 
                array(
                    "filename" => "pecl-$PHP_5_VERSION-nts-Win32.zip",
                    "name"     => "PECL $PHP_5_VERSION Non-thread-safe Win32 binaries",
                    "md5"      => $PHP_5_MD5["pecl.nts"],
                    "date"     => $PHP_5_DATE,
                    "note"     => "(Most of these <a href='http://pecl.php.net/'>PECL</a> extension files come standard with the PHP 4 Windows binaries, but have since been moved into this separate PECL download.  Files such as php_pdf.dll, php_ssh2.dll, etc.)",
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
                    "md5"      => "09ffff4b1a54bbadb8fee6acd85a2c1f", //$PHP_4_MD5["zip"],
                    "date"     => "12 Feb 2008", //$PHP_4_DATE,
                ),
            ),
        ),
        $PHP_4_RC => array(),
    ),
);

