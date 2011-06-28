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

/* PHP 5.4 Release */
$PHP_5_4_RC = '5.4.0alpha1';
$PHP_5_4_RC_DATE = "28 June 2011";
$PHP_5_4_MD5     = array(
                       "tar.bz2"       => "82bbe879b5379c60a68ee0ba025326a0",
                       "tar.gz"        => "3e448c52ad779b5af17d9622ab87ac6d",
);


/* PHP 5.3 Release */
$PHP_5_3_RC      = '5.3.7RC1'; // false; 
$PHP_5_3_RC_DATE = '16 June 2011';

$PHP_5_3_VERSION         = "5.3.6";
$PHP_5_3_DATE            = "17 March 2011";

$PHP_5_3_MD5     = array(
                       "tar.bz2"       => "2286f5a82a6e8397955a0025c1c2ad98",
                       "tar.gz"        => "88a2b00047bc53afbbbdf10ebe28a57e",
);

/* PHP 5.2 Release */
$PHP_5_2_RC      = false; // '5.2.15RC2'; // false;
$PHP_5_2_RC_DATE = "02 December 2010";

$PHP_5_2_VERSION         = "5.2.17";
$PHP_5_2_DATE            = "06 January 2011";
$PHP_5_2_WINDOWS_DATE    = $PHP_5_2_DATE;
$PHP_5_2_WINDOWS_VERSION = $PHP_5_2_VERSION;

$PHP_5_2_MD5     = array(
                       "tar.bz2"       => "b27947f3045220faf16e4d9158cbfe13",
                       "tar.gz"        => "04d321d5aeb9d3a051233dbd24220ef1",
                       "zip"           => "f4e290e3eb4ef6e6453fbe5fef03eb06",
                       "installer"     => "80f5fe97b17bfafd2c0dd71e7a0779fd",
					   "nts.zip"       => "c7bea134ed5cb618e0da5962c0fd87fd",
                       "nts.installer" => "a6a9a897622ace5d3cb09598e87dcce8",
                       "debugpack"     => "99d52159201dd3636e2ca8d0b7772a8b",
                       "nts.debugpack" => "49b3a9dfed60c8746ce42eb107bb5c23",
);

$PHP_5_2_WINDOWS_NOTE_MSI = "";
$PHP_5_2_WINDOWS_NOTE_ZIP = "";

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
        ),
    ),
);

$PHP_5_VERSION = $PHP_5_3_VERSION; // Some scripts require this set
$PHP_5_RC_DATE = $PHP_5_3_RC_DATE; // Used by master

