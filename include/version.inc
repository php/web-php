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

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.2',
        'date' => '18 Jan 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'decf0f51e5415b21fb6350753e45b6c3be5cc0868e4ec561e5c89326c8e6ef16',
            'tar.bz2' => '582b3c837a8d952efffe274a5e49706c43a88c162830c2a8c358089fe7449284',
            'tar.xz' => '4ffa3e44afc9c590e28dc0d2d31fc61f0139f8b335f11880a121b9f9b9f0634e',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.15',
        'date' => '18 Jan 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'f9390d23708c65f428e868583dce7ab4a69e88ab6f377137a56643076f966b8f',
            'tar.bz2' => '50c3e220b7aa63a85716233c902eb44cc0a4667ed0b8335722ae2391b1355e7a',
            'tar.xz' => 'eca5deac02d77d806838275f8a3024b38b35ac0a5d9853dcc71c6cbe3f1f8765',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.27',
        'date' => '21 Dec 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '9aa5d7a29389d799885d90740932697006d5d0f55d1def67678e0c14f6ab7b2d',
            'tar.bz2' => 'a15fd73ea44f2df30b07d24786e07d1948b0ea3eed0b8b845735d500dc28bff1',
            'tar.xz' => '479e65c3f05714d4aace1370e617d78e49e996ec7a7579a5be47535be61f0658',
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

    return [$version, $current];
}
