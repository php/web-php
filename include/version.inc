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
        'version' => '8.0.12',
        'date'    => '21 Oct 2021',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'a5b78f04a89d3b401465febf449c7ea9de48681f92803dd8dc2bf922812d572b',
            'tar.bz2' => 'b4886db1df322dc8fb128d8b34ae7e94f6fc682ecb29ff4f5a591d4de9feadbf',
            'tar.xz'  => 'a501017b3b0fd3023223ea25d98e87369b782f8a82310c4033d7ea6a989fea0a',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.26',
        'date'    => '18 Nov 2021',
        'tags'    => ['security'], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '890a7e730f96708a68a77b19fd57fec33cc81573f7249111c870edac42b91a72',
            'tar.bz2' => 'd68b88a8f8a437648affcc7793e5e062fa0ec5171f7fd0af385b12c78b1c004d',
            'tar.xz'  => 'e305b3aafdc85fa73a81c53d3ce30578bc94d1633ec376add193a1e85e0f0ef8',
        ]
    ];

    /* PHP 7.3 Release */
    $data['7.3'] = [
        'version' => '7.3.33',
        'date'    => '18 Nov 2021',
        'tags'      => ['security'],
        'sha256'  => [
            'tar.gz'  => '9a369c32c6f52036b0a890f290327f148a1904ee66aa56e2c9a7546da6525ec8',
            'tar.bz2' => 'f412487d7d953437e7978a0d7b6ec99bf4a85cf3378014438a8577b89535451a',
            'tar.xz'  => '166eaccde933381da9516a2b70ad0f447d7cec4b603d07b9a916032b215b90cc',
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
