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
        'version' => '8.1.8',
        'date'    => '07 Jul 2022',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '889d910558d2492f7f2236921b9bcde620674c8b684ec02d126060f8ca45dc8d',
            'tar.bz2' => 'b8815a5a02431453d4261e3598bd1f28516e4c0354f328c12890f257870e4c01',
            'tar.xz'  => '04c065515bc347bc68e0bb1ac7182669a98a731e4a17727e5731650ad3d8de4c',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.21',
        'date'    => '07 Jul 2022',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '2f51f6e90e2e8efd3a20db08f0dd61d7f8d5a9362f8c7325f1ad28ccea5be0ac',
            'tar.bz2' => '1cb7762d1ffecceaeebafb9f6e24132ca23fb1443cb5630d0fccf53f04cfa126',
            'tar.xz'  => 'e87a598f157e0cf0606e64382bb91c8b30c47d4a0fc96b2c17ad547a27869b3b',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.30',
        'date'    => '09 Jun 2022',
        'tags'    => ['security'], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => 'e37ea37e0f79109351ac615da85eb7c2c336101fc5bc802ee79a124a4310dc10',
            'tar.bz2' => 'b601bb12e53720469b60ea816776cac1c0696b09888a11ad2379b2eee835386e',
            'tar.xz'  => 'ea72a34f32c67e79ac2da7dfe96177f3c451c3eefae5810ba13312ed398ba70d',
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
