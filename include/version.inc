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

    /* PHP 8.5 Release */
    $data['8.5'] = [
        'version' => '8.5.11',
        'date' => '24 Sep 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            // WARNING: Order of SHA256 entries here is DIFFERENT from the
            // order in the manifest
            'tar.gz' => '338630ba9450f0b938bef8d740162c61c33bf64a1b421c6333c01df8a9fdb0ab',
            'tar.bz2' => 'dc940716a8c73e531c0078eecb955d595d321ec2cc9d47149cf0089ea6e18f64',
            'tar.xz' => 'd9be75c08e8c316f4c8f4194d8fbe1750a15f6a6d9d4e3fe72082abeeb800360',
        ]
    ];

    /* PHP 8.4 Release */
    $data['8.4'] = [
        'version' => '8.4.26',
        'date' => '24 Sep 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'c248abaebc4bb777b80968f0760da0da8e989836e896c9ff637b6775d7d37662',
            'tar.bz2' => '4209694d7b0f63c45a3773e07cdc2bbfc71249265a5d951b1ff53e1147edc5ca',
            'tar.xz' => '32a2de53862ad44ed4a5005244ce4f1b50c271e74dced215449a4443b40569f1',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.35',
        'date' => '24 Sep 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'e60396276fd57e8210f88919d9acd4aab98d65fbb7f431c13285ca1fb04ff205',
            'tar.bz2' => 'e279d9ec90d9bcab900d146816e5b11d3e8924b80e2ba36c7d7dae7d71dcbf2d',
            'tar.xz' => 'ff4630fbbbd94359134b7d3c223db59329905bdc4f5a9ef93d257b48e358619a',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.34',
        'date' => '24 Sep 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'b42a58817acdf3e672d497a8f5314c1ee801b4ca94ebae41878bd29cf7764105',
            'tar.bz2' => '0467d63a819016811d35fd14f734764813ab149750379790634294c723cd7562',
            'tar.xz' => '5351330c54de240f54f7527c26ef292e239749e6fe11db0330acb5317e02bb39',
        ]
    ];

    $ret = [];
    foreach ($data as $release) {
        $release += ['announcement' => true];
        $version = $release['version'];
        [$major] = explode('.', $version, 2);

        $info = [
            'announcement' => $release['announcement'],
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
