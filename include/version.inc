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
        'version' => '8.0.11',
        'date'    => '23 Sep 2021',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'c6a461f57b4bcb46cd4dec443253b1e2e8e981466f1280093322b7864afe8be7',
            'tar.bz2' => '70ed874285e4010c1e2e8937bfb56b13b9ed1b3789dcaf274b793b00c1f4403a',
            'tar.xz'  => 'e3e5f764ae57b31eb65244a45512f0b22d7bef05f2052b23989c053901552e16',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.24',
        'date'    => '23 Sep 2021',
        'tags'    => ['security'], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '8cc1758cf7ff45428c17641b1be84cd917a2909ba40c770f06a814d8b7f36333',
            'tar.bz2' => 'f50e32b788864349041f19e31dcc65b1fcc65bc19122918f607526432edf2f32',
            'tar.xz'  => 'ff7658ee2f6d8af05b48c21146af5f502e121def4e76e862df5ec9fa06e98734',
        ]
    ];

    /* PHP 7.3 Release */
    $data['7.3'] = [
        'version' => '7.3.31',
        'date'    => '23 Sep 2021',
        'tags'      => ['security'],
        'sha256'  => [
            'tar.gz'  => '57ca37b08d3eed4cadc3976e78b0f51d0305bb6e60333f6e8c76e8aee07c3f0f',
            'tar.bz2' => '6951f78524684f439186fe039ab14fb2459cea8f47ac829a159724a283f7f32b',
            'tar.xz'  => 'd1aa8f44595d01ac061ff340354d95e146d6152f70e799b44d6b8654fb45cbcc',
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
