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
$PHP_5_VERSION = "5.2.2";
$PHP_5_DATE    = "03 May 2007";
$PHP_5_MD5     = array(
                       "tar.bz2"   => "d084337867d70b50a10322577be0e44e",
                       "tar.gz"    => "7a920d0096900b2b962b21dc5c55fe3c",
                       "zip"       => "634cf45c34f80dfb1284cabf1bbb1417",
                       "installer" => "eea060523d095ae421409e8a9c343207",
                       "pecl.zip"  => "5d206368799dfbac983d83954328ae3a",
                       "nts.zip"   => "b9abde6658b91ab66acb26eca699b5f6",
                       "pecl.nts"  => "902360747287abaf4c8906efb609f2f8",
);

/* PHP 4 Release */
$PHP_4_VERSION = "4.4.7";
$PHP_4_DATE    = "03 May 2007";
$PHP_4_MD5     = array(
                       "tar.bz2"   => "3f21b44d37a57ca3876d3aea713c700d",
                       "tar.gz"    => "2669d2049822ac14abb263703d24f643",
                       "zip"       => "e774e79530d610c58c5f2da433d14e0f",
);

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
                    "date"     => $PHP_5_DATE,
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
//        "5.2.3" => array(), /* Yes, it should be empty - unless we want it in the version feed? */
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
                    "note"     => "(CGI binary plus server API versions for Apache, Apache2 (experimental), ISAPI, NSAPI, Servlet and Pi3Web. MySQL support built-in, many extensions included, packaged as zip)<br />",
                ),
            ),
        ),
//        "4.4.7RC1" => array(), /* Yes, it should be empty.. unless we want it in the version feed..? */
    ),
);

