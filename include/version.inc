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
        'version' => '7.3.30',
        'date'    => '26 Aug 2021',
        'tags'      => ['security'],
        'sha256'  => [
            'tar.gz'  => '3810a9b631eb7f236ecf02b9a78bab8d957b6cfdb1646a29e3b34e01d36c0510',
            'tar.bz2' => 'ccc532e660761df9b5509b9b913d2dc049b0a9954108fe212aeeb8bc2556b502',
            'tar.xz'  => '0ebfd656df0f3b1ea37ff2887f8f2d1a71cd160fb0292547c0ee0a99e58ffd1b',
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
