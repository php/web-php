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
        'version' => '7.4.25',
        'date'    => '21 Oct 2021',
        'tags'    => ['security'], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '3b2632252c933cac489a20f68b8f4ab769e5a0a3bf22b6ef47427aff6922e31f',
            'tar.bz2' => '27992570caf3e2e5323ab7b37853c44c1529b1d31ea94d9776efa91d5a781313',
            'tar.xz'  => '12a758f1d7fee544387a28d3cf73226f47e3a52fb3049f07fcc37d156d393c0a',
        ]
    ];

    /* PHP 7.3 Release */
    $data['7.3'] = [
        'version' => '7.3.32',
        'date'    => '28 Oct 2021',
        'tags'      => ['security'],
        'sha256'  => [
            'tar.gz'  => '4739160cbd8f5d4529429ac01e181cba9705a515666002e76e4e34891c034fcb',
            'tar.bz2' => '7c158b306e53434f1e0a88647aa561814308aaff8713ed7d237ed8f1399c216f',
            'tar.xz'  => '94effa250b80f031e77fbd98b6950c441157a2a8f9e076ee68e02f5b0b7a3fd9',
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
