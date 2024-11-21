<?php
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

    /* PHP 8.4 Release */
    $data['8.4'] = [
        'version' => '8.4.1',
        'date' => '21 Nov 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'c3d1ce4157463ea43004289c01172deb54ce9c5894d8722f4e805461bf9feaec',
            'tar.bz2' => 'ef8a270118ed128b765fc31f198c7f4650c8171411b0f6a3a1a3aba11fcacc23',
            'tar.xz' => '94c8a4fd419d45748951fa6d73bd55f6bdf0adaefb8814880a67baa66027311f',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.14',
        'date' => '21 Nov 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'e4ee602c31e2f701c9f0209a2902dd4802727431246a9155bf56dda7bcf7fb4a',
            'tar.bz2' => 'f56fa669ce4c01452a2921f40034d779d8c2b97d0749493ad4781813b9221cf8',
            'tar.xz' => '58b4cb9019bf70c0cbcdb814c7df79b9065059d14cf7dbf48d971f8e56ae9be7',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.26',
        'date' => '21 Nov 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '04e47b46b347ed6404dcc9e9989486710b075eafc8490500fd271aeeac5d83cb',
            'tar.bz2' => 'be57c347d451c905bcb4336832a864d9928dd0e20989b872705fea0ba6476c6b',
            'tar.xz' => '54747400cb4874288ad41a785e6147e2ff546cceeeb55c23c00c771ac125c6ef',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.31',
        'date' => '21 Nov 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '618923b407c4575bfee085f00c4aaa16a5cc86d4b1eb893c0f352d61541bbfb1',
            'tar.bz2' => '0b39828b345151caf1b795d9f4b923c9887231776c33076dfc9d90a44390d0dc',
            'tar.xz' => 'c4f244d46ba51c72f7d13d4f66ce6a9e9a8d6b669c51be35e01765ba58e7afca',
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

    $version = '0.0.0';
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
