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
        'version' => '8.0.5',
        'date'    => '29 Apr 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '50aeac6fe9c2b5577d534369392ebb89c3e7a342b20ef538832b1df996cccb2a',
            'tar.bz2' => '195d934febefaac3b19ac586679149759324a434411ae8aca6f7d87553ef08e0',
            'tar.xz'  => '5dd358b35ecd5890a4f09fb68035a72fe6b45d3ead6999ea95981a107fd1f2ab',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.19',
        'date'    => '06 May 2021',
        'tags'    => [], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => 'd7062457ba9f8334ab8ae7e4fea8efe27e2506763551b25db9e6ab9beea8ed6f',
            'tar.bz2' => '25d09b8145b284d870431c1b40aba7944e4bf1836278538f8e29780e7f85ddea',
            'tar.xz'  => '6c17172c4a411ccb694d9752de899bb63c72a0a3ebe5089116bc13658a1467b2',
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
