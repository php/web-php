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

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.10',
        'date' => '01 Sep 2022',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '3ea4f323109dfbc8d2631d08aa0e08602c1f713678e9dc6c750f081ef49eab0f',
            'tar.bz2' => '2de8e0402285f7c56887defe651922308aded58ba60befcf3b77720209e31f10',
            'tar.xz' => '90e7120c77ee83630e6ac928d23bc6396603d62d83a3cf5df8a450d2e3070162',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.22',
        'date' => '04 Aug 2022',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '56fce7529a9798fd0895bca3539d2a65b9cac5d23ffbdf6338419c62ed083519',
            'tar.bz2' => 'e342918d3ecd422f10032df0ac3ffb0e17f568fad6cf8e232b6f7a6a1fdc3c9c',
            'tar.xz' => '130937c0fa3050cd33d6c415402f6ccbf0682ae83eb8d39c91164224ddfe57f1',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.30',
        'date' => '09 Jun 2022',
        'tags' => ['security'], // Set to ['security'] for security releases
        'sha256' => [
            'tar.gz' => 'e37ea37e0f79109351ac615da85eb7c2c336101fc5bc802ee79a124a4310dc10',
            'tar.bz2' => 'b601bb12e53720469b60ea816776cac1c0696b09888a11ad2379b2eee835386e',
            'tar.xz' => 'ea72a34f32c67e79ac2da7dfe96177f3c451c3eefae5810ba13312ed398ba70d',
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
