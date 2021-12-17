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
        'version' => '8.1.1',
        'date'    => '16 Dec 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '4e4cf3f843a5111f6c55cd21de8f26834ea3cd4a5be77c88357cbcec4a2d671d',
            'tar.bz2' => '8f8bc9cad6cd124edc111f7db0a109745e2f638770a101b3c22a2953f7a9b40e',
            'tar.xz'  => '33c09d76d0a8bbb5dd930d9dd32e6bfd44e9efcf867563759eb5492c3aff8856',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.14',
        'date'    => '16 Dec 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'e67ebd8c4c77247ad1fa88829e5b95d51a19edf3d87814434de261e20a63ea20',
            'tar.bz2' => 'bb381fdf4817ad7c24c23ea7f77cad68dceb86eb3ac1a37acedadf8ad0a0cd4b',
            'tar.xz'  => 'fbde8247ac200e4de73449d9fefc8b495d323b5be9c10cdb645fb431c91156e3',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.27',
        'date'    => '16 Dec 2021',
        'tags'    => [], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '564fd5bc9850370db0cb4058d9087f2f40177fa4921ce698a375416db9ab43ca',
            'tar.bz2' => '184aaef313fbf28c9987f6aa07b655cd1b0eae9e7e17061775a3e7d880185563',
            'tar.xz'  => '3f8b937310f155822752229c2c2feb8cc2621e25a728e7b94d0d74c128c43d0c',
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
