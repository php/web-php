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
 *                 "notes"    => "this file was updated 29feb due to broken phar files..",
 *             ),
 *             "announcement" => "bool, release announcement exists in releases/?"
 *         ),
 *     ),
 * );
 */
$RELEASES = array(
    5 => array(
        "5.2.1" => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-5.2.1.tar.bz2",
                    "name"     => "PHP 5.2.1 (tar.bz2)",
                    "md5"      => "261218e3569a777dbd87c16a15f05c8d",
                    "date"     => "08 Feb 2007",
                ),
                array(
                    "filename" => "php-5.2.1.tar.gz",
                    "name"     => "PHP 5.2.1 (tar.gz)",
                    "md5"      => "604eaee2b834bb037d2c83e53e300d3f",
                    "date"     => "08 Feb 2007",
                ),
            ),
            "windows" => array( /* Prefix the key with dot if the windows stuff isn't available yet*/
                array(
                    "filename" => "php-5.2.1-Win32.zip",
                    "name"     => "PHP 5.2.1 zip package",
                    "md5"      => "682dd66fb03c7dd24c522f474e1b04b6",
                    "date"     => "08 Feb 2007",
                ),
                array(
                    "filename" => "php-5.2.1-win32-installer.msi",
                    "name"     => "PHP 5.2.1 installer",
                    "md5"      => "f0a1445f4adfdc2e00a81b2eb788be5c",
                    "date"     => "12 Feb 2007",
                    "note"     => "This file was updated February 12th to fix problems when upgrading from previous PHP versions.",
                ),
                array(
                    "filename" => "pecl-5.2.1-Win32.zip",
                    "name"     => "PECL 5.2.1 Win32 binaries",
                    "md5"      => "dc8b394146faf7effa6f26df02e8e534",
                    "date"     => "08 Feb 2007",
                ),
                array(
                    "filename" => "php-5.2.1-nts-Win32.zip",
                    "name"     => "PHP 5.2.1 Non-thread-safe Win32 binaries",
                    "md5"      => "815c8c61af58fffdc34d34c24310ffe2",
                    "date"     => "08 Feb 2007",
                ),
                array(
                    "filename" => "pecl-5.2.1-nts-Win32.zip",
                    "name"     => "PECL 5.2.1 Non-thread-safe Win32 binaries",
                    "md5"      => "ffd78a31a704d68c8adadc9288261583",
                    "date"     => "08 Feb 2007",
                ),
            ),
        ),
        //"5.2.2RC1" => array(), /* Yes, it should be empty - unless we want it in the version feed? */
    ),
    4 => array(
        "4.4.5" => array(
            "announcement" => true,
            "source" => array(
                array(
                    "filename" => "php-4.4.5.tar.bz2",
                    "name"     => "PHP 4.4.5 (tar.bz2)",
                    "md5"      => "bf61d557c82962dc9533f6ef35283d4c",
                    "date"     => "14 Feb 2007",
                ),
                array(
                    "filename" => "php-4.4.5.tar.gz",
                    "name"     => "PHP 4.4.5 (tar.gz)",
                    "md5"      => "cfc1d47cdc7c1bfd27666abb8fe97a45",
                    "date"     => "14 Feb 2007",
                ),
            ),
            "windows" => array( /* Prefix the key with dot if they don't exists yet */
                array(
                    "filename" => "php-4.4.5-Win32.zip",
                    "name"     => "PHP 4.4.5 zip package",
                    "md5"      => "c4197ede538cc911b04cdf3d7c0e37f1",
                    "date"     => "14 Feb 2007",
                    "note"     => "(CGI binary plus server API versions for Apache, Apache2 (experimental), ISAPI, NSAPI, Servlet and Pi3Web. MySQL support built-in, many extensions included, packaged as zip)<br />",
                ),
            ),
        ),
        //"4.4.6RC1" => array(), /* Yes, it should be empty.. unless we want it in the version feed..? */
    ),
);

