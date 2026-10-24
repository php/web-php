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
        'version' => '8.5.12',
        'date' => '21 Oct 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            // WARNING: Order of SHA256 entries here is DIFFERENT from the
            // order in the manifest
            'tar.gz' => '81a0f450349e84b08eb43faa85f8a4c835684f3cc1c50471775d1317a046c525',
            'tar.bz2' => 'ffb60edc437ced63b5137e4984db379a8111c50049c711510d8b958277efc1a8',
            'tar.xz' => '08bc2eba2a588654ade1357174aa646b761556c862dda0678345ee29ed481209',
        ]
    ];

    /* PHP 8.4 Release */
    $data['8.4'] = [
        'version' => '8.4.27',
        'date' => '21 Oct 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '5bafed9994c1a49796b25b5f61c22c9183bfe046b6acc7b363842d03c77f972f',
            'tar.bz2' => 'b2530a877c722f4b08c9e174a30cb08bac2b7e1903ee6e9e315f0aa9f5f82c24',
            'tar.xz' => 'dcf93923b0e38e0d5252b25b796520b5a47761a08b3488b6d0b5d1115764d3f0',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.36',
        'date' => '21 Oct 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'c93f3441f87f6ab156bef4432db215d7e61ca2c0183bb3a2aa28d9886ab59f53',
            'tar.bz2' => '46f4b45e3688ed2b1819015a7b532c15b51cc055bdd3b13fd00ddfeebeedcd5f',
            'tar.xz' => 'dd54693aa334c5c4d72e9aee96b082c2473750a18a6c1d105789c93a3b1692fd',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.35',
        'date' => '21 Oct 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '9db4204f0a2d1911277ae832185e07bb4c3b3559772753a70d2968ca346d6910',
            'tar.bz2' => '0f43efd1ac24d4f90002c8d4d570bf4c4d59fa14313bf270aae8cf04d9dfdef3',
            'tar.xz' => '5737b98601fe5ab1b8c5db0c82ed3158acb9283ed3081ffe2faffb9ac81455e6',
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
