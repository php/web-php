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
        'version' => '8.2.6',
        'date' => '11 May 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '1b8463df1f180ed39475cfcded1ff106242ccb823f99c9fc1a407c0b76afa2c8',
            'tar.bz2' => '44a70c52f537662c10d91eedbf51fd765c9961be6ba2508ed63bf7a26cdd3100',
            'tar.xz' => '10b796f0ed45574229851212b30a596a76e70ae365322bcaaaf9c00fa7d58cca',
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
