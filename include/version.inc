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
    $PHP_7_4_VERSION         = "7.4.9";
    $PHP_7_4_DATE            = "03 Sep 2020";
    $PHP_7_4_TAGS            = []; // Set to ['security'] for security releases.
    $PHP_7_4_SHA256     = array(
        "tar.gz"        => "e720f1286f895ca37f1c75a2ca338ad2f2456664d7097298167181b25b212feb",
        "tar.bz2"       => "e90bfc9ed98d24e53b51ffd4eb636cf5cd9d71ed7c6f8e4b6e9981e9882174e7",
        "tar.xz"        => "c2d90b00b14284588a787b100dee54c2400e7db995b457864d66f00ad64fb010",
    );

    /* PHP 7.3 Release */
    $PHP_7_3_VERSION         = "7.3.22";
    $PHP_7_3_DATE            = "03 Sep 2020";
    $PHP_7_3_TAGS            = ['']; // Set to ['security'] for security releases.
    $PHP_7_3_SHA256     = array(
        "tar.bz2"       => "c790b8172520b2ff773d6cf80774ea0a678a2f16e8ee6b11d68802094448689e",
        "tar.gz"        => "759426cb4054e3f23316c39710faff0bb8063fd0ea50fc2c5efa590429af1a22",
        "tar.xz"        => "0e66606d3bdab5c2ae3f778136bfe8788e574913a3d8138695e54d98562f1fb5",
    );

    /* PHP 7.2 Release */
    $PHP_7_2_VERSION         = "7.2.33";
    $PHP_7_2_DATE            = "06 Aug 2020";
    $PHP_7_2_TAGS            = ['security']; // Set to ['security'] for security releases.
    $PHP_7_2_SHA256     = array(
        "tar.bz2"       => "03dda3a3a0c8befc9b381bc9cf4638d13862783fc7b8aef43fdd4431ab85854d",
        "tar.gz"        => "97bb6b88ddfa44f36c4fc84a1a718faef476f61b532d26ea29e3e9f6cd79d839",
        "tar.xz"        => "0f160a3483ffce36be5962fab7bcf09d605ee66c5707df83e4195cb796bbb03a",
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
