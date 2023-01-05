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
        'version' => '8.2.0',
        'date' => '08 Dec 2022',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '435c4c2439db648cdf34236f7cd459f93f943fb788b66723a033610d4a059fc6',
            'tar.bz2' => '1bf4fca663f93d9e0b4909bd6eae0583a1ce383e7f05df126f28f272fa1fd51a',
            'tar.xz' => '6ea4c2dfb532950fd712aa2a08c1412a6a81cd1334dd0b0bf88a8e44c2b3a943',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.14',
        'date' => '05 Jan 2023',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '4755af2563ad187ceaf4a3632359c55e3f3be4050e0299e0f713bbb5e0531965',
            'tar.bz2' => '14ca99333dd604a504a2368946485ac35d379c4da96d28dc515d7eb502dffa32',
            'tar.xz' => 'e16e47a872d58685913ac848ce92ec49f42c1828110c98c65fb6265a08724a1a',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.26',
        'date' => '24 Nov 2022',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '3c83a7355a640b2ba436b8202e8597df8f9daadee1ec9241729ece8e578d21cd',
            'tar.bz2' => '6df87af96f275a75889ece6e3fe4a13abd93a767a9992863bdc0e90f1e887ee7',
            'tar.xz' => '0765bfbe640dba37ccc36d2bc7c7b7ba3d2c3381c9cd4305f66eca83e82a40b3',
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
