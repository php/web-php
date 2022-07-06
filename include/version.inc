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
        'version' => '8.1.7',
        'date'    => '09 Jun 2022',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '5f0b422a117633c86d48d028934b8dc078309d4247e7565ea34b2686189abdd8',
            'tar.bz2' => 'b816753eb005511e695d90945c27093c3236cc73db1262656d9fadd73ead7e9d',
            'tar.xz'  => 'f042322f1b5a9f7c2decb84b7086ef676896c2f7178739b9672afafa964ed0e5',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.20',
        'date'    => '09 Jun 2022',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '7e21fd985966264194cde63503b57fd0f0170b32a39bd7af2384c1071b50f164',
            'tar.bz2' => 'cb7666bf67ed9f6c987d4836caf03d4b364537e6a75e56cd5c986760ecc2fdd8',
            'tar.xz'  => '973fec765336ee01f47536a5db1c2eee98df9d34a41522b7b6c760159bf0a77b',
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

    return [ $version, $current ];
}
