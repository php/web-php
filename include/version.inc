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
    /* PHP 7.4 Release */
    $PHP_7_4_VERSION         = "7.4.12";
    $PHP_7_4_DATE            = "29 Oct 2020";
    $PHP_7_4_TAGS            = []; // Set to ['security'] for security releases.
    $PHP_7_4_SHA256     = array(
        "tar.gz"        => "f056d74409a71f17218f76538c6a2d7b59ee99db9db7685fa0ab9cd0d4c0f286",
        "tar.bz2"       => "6e6f73cc239edfc462b56a45724019691f85b57b7492e1eb5b4b60f7faa19967",
        "tar.xz"        => "e82d2bcead05255f6b7d2ff4e2561bc334204955820cabc2457b5239fde96b76",
    );

    /* PHP 7.3 Release */
    $PHP_7_3_VERSION         = "7.3.24";
    $PHP_7_3_DATE            = "29 Oct 2020";
    $PHP_7_3_TAGS            = ['']; // Set to ['security'] for security releases.
    $PHP_7_3_SHA256     = array(
        "tar.bz2"       => "55b7afbb2037b0f8fefc481a85f8df4f7a278b4b7f0ed9f674c50ec389cca598",
        "tar.gz"        => "ac06577e2aeb69d4bed3c1532ed84a548f01399e5481c144c3e61d146be8ced6",
        "tar.xz"        => "78b0b417a147ab7572c874334d11654e3c61ec5b3f2170098e5db02fb0c89888",
    );

    /* PHP 7.2 Release */
    $PHP_7_2_VERSION         = "7.2.34";
    $PHP_7_2_DATE            = "01 Oct 2020";
    $PHP_7_2_TAGS            = ['security']; // Set to ['security'] for security releases.
    $PHP_7_2_SHA256     = array(
        "tar.bz2"       => "0e5816d668a2bb14aca68cef8c430430bd86c3c5233f6c427d1a54aac127abcf",
        "tar.gz"        => "8b2777c741e83f188d3ca6d8e98ece7264acafee86787298fae57e05d0dddc78",
        "tar.xz"        => "409e11bc6a2c18707dfc44bc61c820ddfd81e17481470f3405ee7822d8379903",
    );

    return array(
        7 => array(
            $PHP_7_4_VERSION => array(
                "announcement" => true,
                "tags" => $PHP_7_4_TAGS,
                "date" => $PHP_7_4_DATE,
                "source" => array(
                    array(
                        "filename" => "php-$PHP_7_4_VERSION.tar.bz2",
                        "name"     => "PHP $PHP_7_4_VERSION (tar.bz2)",
                        "sha256"   => $PHP_7_4_SHA256["tar.bz2"],
                        "date"     => $PHP_7_4_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_7_4_VERSION.tar.gz",
                        "name"     => "PHP $PHP_7_4_VERSION (tar.gz)",
                        "sha256"   => $PHP_7_4_SHA256["tar.gz"],
                        "date"     => $PHP_7_4_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_7_4_VERSION.tar.xz",
                        "name"     => "PHP $PHP_7_4_VERSION (tar.xz)",
                        "sha256"   => $PHP_7_4_SHA256["tar.xz"],
                        "date"     => $PHP_7_4_DATE,
                    ),
                ),
            ),
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
