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
        'version' => '8.2.5',
        'date' => '13 Apr 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8974dea2507155471660b13a0bcbdc165ac778eeb845a7dbd65d5ffb92738c0a',
            'tar.bz2' => 'e5a80663cca4f6044ad86a489798147c7af037eca96f6cd357ab36d28cb63757',
            'tar.xz' => '800738c359b7f1e67e40c22713d2d90276bc85ba1c21b43d99edd43c254c5f76',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.18',
        'date' => '13 Apr 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8b6b12902e7d6bdf68668acc067b4d75a3c504722f768098c5f80c7d7bfd2563',
            'tar.bz2' => 'd2ac30d6b574fca594fe0cc01c0693e23585b27443e342b0aab07274cde4416e',
            'tar.xz' => 'f3553370f8ba42729a9ce75eed17a2111d32433a43b615694f6a571b8bad0e39',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.28',
        'date' => '14 Feb 2023',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '7432184eae01e4e8e39f03f80e8ec0ca2c8bfebc56e9a7b983541ca8805df22f',
            'tar.bz2' => '9d5e74935c900e3b9c7b6bc740596b71933630eb9f63717c0c4923d8c788c62e',
            'tar.xz' => '5e07278a1f315a67d36a676c01343ca2d4da5ec5bdb15d018e4248b3012bc0cd',
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
