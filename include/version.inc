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
        'version' => '8.3.9',
        'date' => '04 Jul 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'f484dec6ee005c83f899af02fc021e1bc3b1d7b3f143ca062ef66b0fcee96566',
            'tar.bz2' => '96edc6d82b7503a6650541fc477abd5456df28dfaa8c9388ff9e31d9fe1e3112',
            'tar.xz' => 'bf4d7b8ea60a356064f88485278bd6f941a230ec16f0fc401574ce1445ad6c77',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.21',
        'date' => '04 Jul 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '0c6323699309a4d2e71057f01bc071b199f240973c349287b667a3ab36a496c6',
            'tar.bz2' => 'f9876fe7d4d96d41aced199b58a1f7ae7b6655ddc92673135feded7f6939d77f',
            'tar.xz' => '8cc44d51bb2506399ec176f70fe110f0c9e1f7d852a5303a2cd1403402199707',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.29',
        'date' => '06 Jun 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8b2609bf1d3173aa38269a9af21532c65f730aadd3051f9aae011eea9e246de5',
            'tar.bz2' => '87a60313263f2f533f180e719272ca5e47cd9884d4ec3c93720198eaffae0827',
            'tar.xz' => '288884af60581d4284baba2ace9ca6d646f72facbd3e3c2dd2acc7fe6f903536',
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

    $version = '0.0.0';
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
