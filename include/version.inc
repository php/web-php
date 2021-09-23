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
        'version' => '8.0.10',
        'date'    => '26 Aug 2021',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '4612dca9afe8148801648839175ab588097ace66658c6859e9f283ecdeaf84b3',
            'tar.bz2' => 'c94547271410900845b084ec2bcb3466af363eeca92cb24bd611dcbdc26f1587',
            'tar.xz'  => '66dc4d1bc86d9c1bc255b51b79d337ed1a7a035cf71230daabbf9a4ca35795eb',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.23',
        'date'    => '26 Aug 2021',
        'tags'    => ['security'], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '2aaa481678ad4d2992e7bcf161e0e98c7268f4979f7ca8b3d97dd6de19c205d6',
            'tar.bz2' => 'd1e094fe6e4f832e0a64be9c69464ba5d593fb216f914efa8bbb084e0a7a5727',
            'tar.xz'  => 'cea52313fcffe56343bcd3c66dbb23cd5507dc559cc2e3547cf8f5452e88a05d',
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
