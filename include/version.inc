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
        'version' => '8.1.3',
        'date'    => '17 Feb 2022',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '92d74f5a4af7de90cef6cda65bd0c341dc9a1027b32f70e7b8861f6f68a38bb2',
            'tar.bz2' => '354c4e2c506046eca812d1fc2526884a2f54b5e3d20ef0ede919a69eb232d0be',
            'tar.xz'  => '5d65a11071b47669c17452fb336c290b67c101efb745c1dbe7525b5caf546ec6',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.17',
        'date'    => '17 Mar 2022',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'bdbd792901c156c4d1710c9d266732d3c17f6ff63850d6660b9d8d3411188424',
            'tar.bz2' => '52811ee2dde71660ca32737a4ac696c24591eb22e846dd8e09ee77122660283f',
            'tar.xz'  => '4e7d94bb3d144412cb8b2adeb599fb1c6c1d7b357b0d0d0478dc5ef53532ebc5',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.28',
        'date'    => '17 Feb 2022',
        'tags'    => ['security'], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => 'a04014cd1646b90547907e2e0ac5371594533960de317b6c7ac70bcb42db92fb',
            'tar.bz2' => '2085086a863444b0e39547de1a4969fd1c40a0c188eb58fab2938b649b0c4b58',
            'tar.xz'  => '9cc3b6f6217b60582f78566b3814532c4b71d517876c25013ae51811e65d8fce',
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
