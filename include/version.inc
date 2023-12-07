<?php
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
$RELEASES = (function () {
    $data = [];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.0',
        'date' => '23 Nov 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '557ae14650f1d1984d3213e3fcd8d93a5f11418b3f8026d3a2d5022251163951',
            'tar.bz2' => 'de67d0833d42b196e5a66fa1a332f45e296cbe8e9472e9256b2a071c34dc5ed6',
            'tar.xz' => '1db84fec57125aa93638b51bb2b15103e12ac196e2f960f0d124275b2687ea54',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.13',
        'date' => '23 Nov 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '6a194038f5a9e46d8f70a9d59c072c3b08d6edbdd8e304096e24ccf2225bcf1b',
            'tar.bz2' => '66529f43b213131e6b253c5602bef05f049458d21292730fccd63b48a06d67ba',
            'tar.xz' => '2629bba10117bf78912068a230c68a8fd09b7740267bd8ebd3cfce91515d454b',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.26',
        'date' => '23 Nov 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'd954cecfc3d294c2fccbe2b1a6bef784ce0d6c5d44a9e28f8a527e092825f2cb',
            'tar.bz2' => '83bde249c84aa1a043a8c8d0eea09345c2cae69b9784cdf02229fc916fbb9ea0',
            'tar.xz' => '17f87133596449327451ad4b8d9911bfaea59ff5109f3a6f2bb679f967a8ea0f',
        ]
    ];

    $ret = [];
    foreach ($data as $release) {
        $version = $release['version'];
        [$major] = explode('.', $version, 2);

        $info = [
            'announcement' => $release['announcement'] ?? true,
            'tags' => $release['tags'],
            'date' => $release['date'],
            'source' => [],
        ];
        foreach ($release['sha256'] as $format => $hash) {
            $info['source'][] = [
                'filename' => "php-{$version}.{$format}",
                'name' => "PHP {$version} ({$format})",
                'sha256' => $hash,
                'date' => $release['date'],
            ];
        }
        $ret[$major][$version] = $info;
    }
    return $ret;
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

    return [$version, $current];
}
