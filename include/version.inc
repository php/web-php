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
    $PHP_7_3_VERSION         = "7.3.8";
    $PHP_7_3_DATE            = "01 Aug 2019";
    $PHP_7_3_TAGS            = ['security']; // Set to ['security'] for security releases.
    $PHP_7_3_SHA256     = array(
        "tar.bz2"       => "d566c630175d9fa84a98d3c9170ec033069e9e20c8d23dea49ae2a976b6c76f5",
        "tar.gz"        => "31af3eff3337fb70733c9b02a3444c3dae662ecab20aeec7fdc3c42e22071490",
        "tar.xz"        => "f6046b2ae625d8c04310bda0737ac660dc5563a8e04e8a46c1ee24ea414ad5a5",
    );

    /* PHP 7.2 Release */
    $PHP_7_2_VERSION         = "7.2.20";
    $PHP_7_2_DATE            = "04 Jul 2019";
    $PHP_7_2_TAGS            = []; // Set to ['security'] for security releases.
    $PHP_7_2_SHA256     = array(
        "tar.bz2"       => "9fb829e54e54c483ae8892d1db0f7d79115cc698f2f3591a8a5e58d9410dca84",
        "tar.gz"        => "d1dbf6f299514c9aa55b2995928b798b27c21811a0447f0688993cdf36be0749",
        "tar.xz"        => "eff09da83e235c2ba25c85deea1d4f663bd71d50fd51ad11e1acebe26d733494",
    );

    /* PHP 7.1 Release */
    $PHP_7_1_VERSION         = "7.1.30";
    $PHP_7_1_DATE            = "30 May 2019";
    $PHP_7_1_TAGS            = ['security'];
    $PHP_7_1_SHA256     = array(
        'tar.bz2'       => '664850774fca19d2710b9aa35e9ae91214babbde9cd8d27fd3479cc97171ecb3',
        'tar.gz'        => 'a604edf85d5dfc28e6ff3016dad3954c50b93db69afc42295178b4fdf42e026c',
        'tar.xz'        => '6310599811536dbe87e4bcf212bf93196bdfaff519d0c821e4c0068efd096a7c',
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
