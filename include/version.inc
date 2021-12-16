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
        'version' => '8.1.0',
        'date'    => '25 Nov 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '848705043ea4a6e022246ae12a1bff6afcf5c73ea98c6ac4d2108d6028c5c125',
            'tar.bz2' => '0725ed2baea125496a898455d501a77460218b2a0cfad773fa9322f491b82b61',
            'tar.xz'  => 'a1317eff0723a2b3d3122bbfe107a1158570ea2822dc35a5fb360086db0f6bbc',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.13',
        'date'    => '18 Nov 2021',
        'tags'    => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'b4c2d27c954e1b0d84fd4bfef4d252e154ba479e7db11abd89358f2164ee7cc8',
            'tar.bz2' => 'c2419d7ba4395f44747043f4e6f5b47fa08125705fb9f88377e453068a815836',
            'tar.xz'  => 'cd976805ec2e9198417651027dfe16854ba2c2c388151ab9d4d268513d52ed52',
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
