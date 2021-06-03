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
        'version' => '8.0.7',
        'date'    => '03 Jun 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '1e7462455bec8062ef3fc7c74f1f496417cb80aa374ce11edb35015de248c3c1',
            'tar.bz2' => '72b2f2c96f35748b1d6e8a71af4ead439b17129aefe611eb0baf1bd313635f79',
            'tar.xz'  => 'd5fc2e4fc780a32404d88c360e3e0009bc725d936459668e9c2ac992f2d83654',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.20',
        'date'    => '03 Jun 2021',
        'tags'    => [], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '84b09e4617e960b36dfa15fdbf2e3cd7141a2e877216ea29391b12ae86963cf4',
            'tar.bz2' => '0ada6bc635e530fa7a4eb55e639dc070077108e5c9885f750b47007fd267b634',
            'tar.xz'  => '1fa46ca6790d780bf2cb48961df65f0ca3640c4533f0bca743cd61b71cb66335',
        ]
    ];

    /* PHP 7.3 Release */
    $data['7.3'] = [
        'version' => '7.3.28',
        'date'    => '29 Apr 2021',
        'tags'      => ['security'],
        'sha256'  => [
            'tar.gz'  => '1f0d9b94e1b11518ffabd19b646c2fee95ea42ca9cd8d337f8d07986fdceede1',
            'tar.bz2' => '8f636e644594388436ea05ff34c9eb135e6dc119c1130199e9488d5795439964',
            'tar.xz'  => 'a2a84dbec8c1eee3f46c5f249eaaa2ecb3f9e7a6f5d0604d2df44ff8d4904dbe',
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
