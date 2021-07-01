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
    $data = [];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.8',
        'date'    => '01 Jul 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '084a1e8020e86fb99b663d195fd9ac98a9f37dfcb9ecb5c159054cdb8f388945',
            'tar.bz2' => '14bd77d71a98943e14b324da83e31b572781df583cda9650a184fae3214cd16f',
            'tar.xz'  => 'dc1668d324232dec1d05175ec752dade92d29bb3004275118bc3f7fc7cbfbb1c',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.21',
        'date'    => '01 Jul 2021',
        'tags'    => [], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '4b9623accbe4b8923a801212f371f784069535009185e7bf7e4dec66bbea61db',
            'tar.bz2' => '36ec6102e757e2c2b7742057a700bbff77c76fa0ccbe9c860398c3d24e32822a',
            'tar.xz'  => 'cf43384a7806241bc2ff22022619baa4abb9710f12ec1656d0173de992e32a90',
        ]
    ];

    /* PHP 7.3 Release */
    $data['7.3'] = [
        'version' => '7.3.29',
        'date'    => '01 Jul 2021',
        'tags'      => ['security'],
        'sha256'  => [
            'tar.gz'  => 'ba4de3955b0cbd33baee55a83568acc4347605e210a54b5654e4c1e09b544659',
            'tar.bz2' => 'a83a2878140bd86935f0046bbfe92672c8ab688fbe4ccf9704add6b9605ee4d0',
            'tar.xz'  => '7db2834511f3d86272dca3daee3f395a5a4afce359b8342aa6edad80e12eb4d0',
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

    return [ $version, $current ];
}
