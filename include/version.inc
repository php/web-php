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
        'version' => '8.0.9',
        'date'    => '29 Jul 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '1f0d72e90ab6ad0ae13329a96b281f71bc592563ce4e3a4c816b8da4b5854fb4',
            'tar.bz2' => '6ac8edebd295ddc43fb010653c43ccf203cd7cdc40981b210ed5275994040806',
            'tar.xz'  => '71a01b2b56544e20e28696ad5b366e431a0984eaa39aa5e35426a4843e172010',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.22',
        'date'    => '29 Jul 2021',
        'tags'    => [], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '4ca2642b99a822237d7f84dc19682be702ad0e2d5d282f7646d84b746d454e34',
            'tar.bz2' => '5022bbca661bc1ab5dfaee72873bcd0f0980d9dd34f980a682029496f51caae1',
            'tar.xz'  => '8e078cd7d2f49ac3fcff902490a5bb1addc885e7e3b0d8dd068f42c68297bde8',
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
