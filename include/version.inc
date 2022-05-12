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

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.6',
        'date'    => '12 May 2022',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'e847745fd66fc8c57fac993a609fefcded93fddccd225f0620a26bb5ae5753c3',
            'tar.bz2' => '7b353304b7407554f70d3e101a226a1fc22decae5c4c42ed270c4e389bfa1b66',
            'tar.xz'  => 'da38d65bb0d5dd56f711cd478204f2b62a74a2c2b0d2d523a78d6eb865b2364c',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.19',
        'date'    => '12 May 2022',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '48e57634d350bcab4745d25d9d94ffa474649bf4f7e879fad163226c0d107bb5',
            'tar.bz2' => 'eba0e67fdaf6904b2e4b84e064be0a0d61b2cb64a23f81a0ca9b1a51bc3a8330',
            'tar.xz'  => 'ba62219c4b0486cbb2a04f0796749a46b0ee1f5a142ed454212b4e2460cb0fab',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.29',
        'date'    => '14 Apr 2022',
        'tags'    => ['security'], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => 'f73f89873bb9447cb99eb4863cf0a0deab4481cb8acf7552c0e70647e6885854',
            'tar.bz2' => '7dde58a02b225c25130c6e2ae2cbba7254bb0340f7fe17291478176d866f9482',
            'tar.xz'  => '7d0f07869f33311ff3fe1138dc0d6c0d673c37fcb737eaed2c6c10a949f1aed6',
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
