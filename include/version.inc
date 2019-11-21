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
    $PHP_7_3_VERSION         = "7.3.12";
    $PHP_7_3_DATE            = "21 Nov 2019";
    $PHP_7_3_TAGS            = []; // Set to ['security'] for security releases.
    $PHP_7_3_SHA256     = array(
        "tar.bz2"       => "d317b029f991410578cc38ba4b76c9f764ec29c67e7124e1fec57bceb3ad8c39",
        "tar.gz"        => "d617e5116f8472a628083f448ebe4afdbc4ac013c9a890b08946649dcbe61b34",
        "tar.xz"        => "aafe5e9861ad828860c6af8c88cdc1488314785962328eb1783607c1fdd855df",
    );

    /* PHP 7.2 Release */
    $PHP_7_2_VERSION         = "7.2.25";
    $PHP_7_2_DATE            = "21 Nov 2019";
    $PHP_7_2_TAGS            = []; // Set to ['security'] for security releases.
    $PHP_7_2_SHA256     = array(
        "tar.bz2"       => "7cb336b1ed0f9d87f46bbcb7b3437ee252d0d5060c0fb1a985adb6cbc73a6b9e",
        "tar.gz"        => "b2cb1bd46454d33b2c65c2fd559f464cd14e57dd47b953adf5caa77fdf0de52b",
        "tar.xz"        => "746efeedc38e6ff7b1ec1432440f5fa801537adf6cd21e4afb3f040e5b0760a9",
    );

    /* PHP 7.1 Release */
    $PHP_7_1_VERSION         = "7.1.33";
    $PHP_7_1_DATE            = "24 Oct 2019";
    $PHP_7_1_TAGS            = ['security'];
    $PHP_7_1_SHA256     = array(
        'tar.bz2'       => '95a5e5f2e2b79b376b737a82d9682c91891e60289fa24183463a2aca158f4f4b',
        'tar.gz'        => '0055f368ffefe51d5a4483755bd17475e88e74302c08b727952831c5b2682ea2',
        'tar.xz'        => 'bd7c0a9bd5433289ee01fd440af3715309faf583f75832b64fe169c100d52968',
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
