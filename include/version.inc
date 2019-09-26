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
    $PHP_7_3_VERSION         = "7.3.10";
    $PHP_7_3_DATE            = "26 Sep 2019";
    $PHP_7_3_TAGS            = ['security']; // Set to ['security'] for security releases.
    $PHP_7_3_SHA256     = array(
        "tar.bz2"       => "506dd871c0fb8f00f872f53dd3b1dfa5f23a9edb4dfc521e5669c78a78c45448",
        "tar.gz"        => "fb670723a9b8fda31c89529f27e0dda289d8af4b6ce9f152c8010876639c0fb4",
        "tar.xz"        => "42f00a15419e05771734b7159c8d39d639b8a5a6770413adfa2615f6f923d906",
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
    $PHP_7_1_VERSION         = "7.1.32";
    $PHP_7_1_DATE            = "29 Aug 2019";
    $PHP_7_1_TAGS            = ['security'];
    $PHP_7_1_SHA256     = array(
        'tar.bz2'       => 'd7c7a1adddc75ac17f63349e966db25930b6b3ce736640349bea9e10909cab7a',
        'tar.gz'        => '6e51a2fc610352438b2a1c40310468a1e2b5baf2fff43be77f9f408a9111590c',
        'tar.xz'        => '7f38b5bdaae3184d325a8c70e86c010afcc33651d15faafe277a0db6d2ea2741',
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
