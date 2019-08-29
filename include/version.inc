<?php // vim: et
/* The format is:
 * array(
 *     "major release number" => array(
 *         "release" => array(
 *             "source/windows" => array(
 *                 "filename" => "filename.tar.bz2",
 *                 "name"     => "package name",
 *                 "sha256"   => "shasum -256",
 *                 "date"     => "this files release date",
 *                 "note"     => "this file was updated 29feb due to broken phar files..",
 *             ),
 *             "announcement" => "bool, release announcement exists in releases/?",
 *         ),
 *     ),
 * );
 */
$RELEASES = (function() {
    /* PHP 7.3 Release */
    $PHP_7_3_VERSION         = "7.3.9";
    $PHP_7_3_DATE            = "29 Aug 2019";
    $PHP_7_3_TAGS            = ['security']; // Set to ['security'] for security releases.
    $PHP_7_3_SHA256     = array(
        "tar.bz2"       => "a39c9709a8c9eb7ea8ac4933ef7a78b92f7e5735a405c8b8e42ee39541d963c4",
        "tar.gz"        => "5ecc1b1ad7228ed2e99a970c45358871644fcab1d9fd079a7b129326a7bde42d",
        "tar.xz"        => "4007f24a39822bef2805b75c625551d30be9eeed329d52eb0838fa5c1b91c1fd",
    );

    /* PHP 7.2 Release */
    $PHP_7_2_VERSION         = "7.2.22";
    $PHP_7_2_DATE            = "29 Aug 2019";
    $PHP_7_2_TAGS            = ['security']; // Set to ['security'] for security releases.
    $PHP_7_2_SHA256     = array(
        "tar.bz2"       => "c10a9883b586ada5ef1149f2571625b27efdcc3e70a04fbb9121979633b0f08a",
        "tar.gz"        => "6e2ccc77484c27971d4550b7071a57b79bc910bfb2d4a74a57ae2c18b78c3dc7",
        "tar.xz"        => "eb597fcf8dc0a6211a42a6346de4f63ee166829a6df6d8ed767fe14be8d1c3a3",
    );

    /* PHP 7.1 Release */
    $PHP_7_1_VERSION         = "7.1.31";
    $PHP_7_1_DATE            = "01 Aug 2019";
    $PHP_7_1_TAGS            = ['security'];
    $PHP_7_1_SHA256     = array(
        'tar.bz2'       => '767573c2b732e78cc647602ec61fc948941a941a4071db59b522cf5e076825dd',
        'tar.gz'        => 'ea0558735653b9ce63e9cea41dd8f0d0b90dba6c39d39dd9a6aad5cc58b0bdfc',
        'tar.xz'        => '5cb53b63592ec4361f0ab12c684b10430344821a024881a387ead4299df78fa5',
    );

    return array(
        7 => array(
            $PHP_7_3_VERSION => array(
                "announcement" => true,
                "tags" => $PHP_7_3_TAGS,
                "date" => $PHP_7_3_DATE,
                "source" => array(
                    array(
                        "filename" => "php-$PHP_7_3_VERSION.tar.bz2",
                        "name"     => "PHP $PHP_7_3_VERSION (tar.bz2)",
                        "sha256"   => $PHP_7_3_SHA256["tar.bz2"],
                        "date"     => $PHP_7_3_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_7_3_VERSION.tar.gz",
                        "name"     => "PHP $PHP_7_3_VERSION (tar.gz)",
                        "sha256"   => $PHP_7_3_SHA256["tar.gz"],
                        "date"     => $PHP_7_3_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_7_3_VERSION.tar.xz",
                        "name"     => "PHP $PHP_7_3_VERSION (tar.xz)",
                        "sha256"   => $PHP_7_3_SHA256["tar.xz"],
                        "date"     => $PHP_7_3_DATE,
                    ),
                ),
            ),
            $PHP_7_2_VERSION => array(
                "announcement" => true,
                "tags" => $PHP_7_2_TAGS,
                "date" => $PHP_7_2_DATE,
                "source" => array(
                    array(
                        "filename" => "php-$PHP_7_2_VERSION.tar.bz2",
                        "name"     => "PHP $PHP_7_2_VERSION (tar.bz2)",
                        "sha256"   => $PHP_7_2_SHA256["tar.bz2"],
                        "date"     => $PHP_7_2_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_7_2_VERSION.tar.gz",
                        "name"     => "PHP $PHP_7_2_VERSION (tar.gz)",
                        "sha256"   => $PHP_7_2_SHA256["tar.gz"],
                        "date"     => $PHP_7_2_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_7_2_VERSION.tar.xz",
                        "name"     => "PHP $PHP_7_2_VERSION (tar.xz)",
                        "sha256"   => $PHP_7_2_SHA256["tar.xz"],
                        "date"     => $PHP_7_2_DATE,
                    ),
                ),
            ),
            $PHP_7_1_VERSION => array(
                "announcement" => true,
                "tags" => $PHP_7_1_TAGS,
                "date" => $PHP_7_1_DATE,
                "source" => array(
                    array(
                        "filename" => "php-$PHP_7_1_VERSION.tar.bz2",
                        "name"     => "PHP $PHP_7_1_VERSION (tar.bz2)",
                        "sha256"   => $PHP_7_1_SHA256["tar.bz2"],
                        "date"     => $PHP_7_1_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_7_1_VERSION.tar.gz",
                        "name"     => "PHP $PHP_7_1_VERSION (tar.gz)",
                        "sha256"   => $PHP_7_1_SHA256["tar.gz"],
                        "date"     => $PHP_7_1_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_7_1_VERSION.tar.xz",
                        "name"     => "PHP $PHP_7_1_VERSION (tar.xz)",
                        "sha256"   => $PHP_7_1_SHA256["tar.xz"],
                        "date"     => $PHP_7_1_DATE,
                    ),
                ),
            ),
        ),
    );
})();

// Get latest release version and info.
function release_get_latest() {
    global $RELEASES;

    $version = null;
    $current = null;
    foreach ($RELEASES as $versions) {
        foreach ($versions as $ver => $info) {
            if (version_compare($ver, $version) > 0) {
                $version = $ver;
                $current = $info;
            }
        }
    }

    return [ $version, $current ];
}
