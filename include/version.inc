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
    /* PHP 8.0 Release */
    $PHP_8_0_VERSION         = "8.0.0";
    $PHP_8_0_DATE            = "26 Nov 2020";
    $PHP_8_0_TAGS            = []; // Set to ['security'] for security releases.
    $PHP_8_0_SHA256     = array(
        "tar.gz"        => "3ed7b48d64357d3e8fa9e828dbe7416228f84105b8290c2f9779cd66be31ea71",
        "tar.bz2"       => "5e832dc37eabf444410b4ea6fb3d66b72e44e7407a3b49caa5746edcf71b9d09",
        "tar.xz"        => "b5278b3eef584f0c075d15666da4e952fa3859ee509d6b0cc2ed13df13f65ebb",
    );

    /* PHP 7.4 Release */
    $PHP_7_4_VERSION         = "7.4.13";
    $PHP_7_4_DATE            = "26 Nov 2020";
    $PHP_7_4_TAGS            = []; // Set to ['security'] for security releases.
    $PHP_7_4_SHA256     = array(
        "tar.gz"        => "0865cff41e7210de2537bcd5750377cfe09a9312b9b44c1a166cf372d5204b8f",
        "tar.bz2"       => "15a339857e11c92eb47fddcd0dfe8aaa951a9be7c57ab7230ccd497465a31fda",
        "tar.xz"        => "aead303e3abac23106529560547baebbedba0bb2943b91d5aa08fff1f41680f4",
    );

    /* PHP 7.3 Release */
    $PHP_7_3_VERSION         = "7.3.25";
    $PHP_7_3_DATE            = "26 Nov 2020";
    $PHP_7_3_TAGS            = ['']; // Set to ['security'] for security releases.
    $PHP_7_3_SHA256     = array(
        "tar.bz2"       => "69315a4daa91e3b07c90eef86fe205c8812c4ac5ce119c9953ecc9f42e7702fb",
        "tar.gz"        => "097c7a2a2f9189b33799d79ee5a8aac68a4d72696c1cd69c66ef5d0941ce28ad",
        "tar.xz"        => "c71c00ad03079efb78d1a6b8623ca4f725be697dbd9a46debacbcc9a2475f329",
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
        8 => array(
            $PHP_8_0_VERSION => array(
                "announcement" => true,
                "tags" => $PHP_8_0_TAGS,
                "date" => $PHP_8_0_DATE,
                "source" => array(
                    array(
                        "filename" => "php-$PHP_8_0_VERSION.tar.bz2",
                        "name"     => "PHP $PHP_8_0_VERSION (tar.bz2)",
                        "sha256"   => $PHP_8_0_SHA256["tar.bz2"],
                        "date"     => $PHP_8_0_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_8_0_VERSION.tar.gz",
                        "name"     => "PHP $PHP_8_0_VERSION (tar.gz)",
                        "sha256"   => $PHP_8_0_SHA256["tar.gz"],
                        "date"     => $PHP_8_0_DATE,
                    ),
                    array(
                        "filename" => "php-$PHP_8_0_VERSION.tar.xz",
                        "name"     => "PHP $PHP_9_0_VERSION (tar.xz)",
                        "sha256"   => $PHP_8_0_SHA256["tar.xz"],
                        "date"     => $PHP_8_0_DATE,
                    ),
                ),
			),
		),
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
