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

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.12',
        'date' => '26 Oct 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'b2b74a91f5fac14ce10ece0ac210f6f5d72f4367a3cb638e80d117d183750a21',
            'tar.bz2' => '704325f56b1b4c17f9f951e1ffef5c64e148896053f34e2626152cbaa2f05893',
            'tar.xz' => 'e1526e400bce9f9f9f774603cfac6b72b5e8f89fa66971ebc3cc4e5964083132',
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
