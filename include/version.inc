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
        'version' => '8.1.2',
        'date'    => '20 Jan 2022',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '9992409c0543e0c8e89914f7307e1485a08c057091146e4731565b59065f8bde',
            'tar.bz2' => '913dc7dd4388427fa33ea4ac89834e856ff5394f4218eace260a3a279f5b53a9',
            'tar.xz'  => '6b448242fd360c1a9f265b7263abf3da25d28f2b2b0f5465533b69be51a391dd',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.16',
        'date'    => '17 Feb 2022',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'ce0ea32ff9c5af18cfb70197b40caf55824400dc8d5b4258a783ec9168baa5b1',
            'tar.bz2' => 'f49f8181ee29463a0d23a0c65969e92d58fee8ac564df917cff58e48d65e1849',
            'tar.xz'  => 'f27a2f25259e8c51e42dfd74e24a546ee521438ad7d9f6c6e794aa91f38bab0a',
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
