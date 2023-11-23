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
        'version' => '8.1.25',
        'date' => '26 Oct 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '1a8c59d6b3eccb404c229e947558d2bf1220c3dec0b0036690fadc07f39934ab',
            'tar.bz2' => 'a86a88c1840c1bc832bcfd2fbec3b8a1942c8314da5dff53f09f9c98d0c12e8a',
            'tar.xz' => '66fdba064aa119b1463a7969571d42f4642690275d8605ab5149bcc5107e2484',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.30',
        'date' => '03 Aug 2023',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '449d2048fcb20a314d8c218097c6d1047a9f1c5bb72aa54d5d3eba0a27a4c80c',
            'tar.bz2' => '98a9cb6a0e27a6950cdf4b26dcac48f2be2d936d5224a502f066cf3d4cf19b92',
            'tar.xz' => '216ab305737a5d392107112d618a755dc5df42058226f1670e9db90e77d777d9',
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
