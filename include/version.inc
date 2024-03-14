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
        'version' => '8.3.4',
        'date' => '14 Mar 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '0e2801e47fb1b92d2743204fcf650ce2fcad1a13ef7a44fe05738101a383e4a2',
            'tar.bz2' => '3c5caf18e0c0a243aaec913a39ecb092043195adde4c3fc42e945da5b9277695',
            'tar.xz' => '39a337036a546e5c28aea76cf424ac172db5156bd8a8fd85252e389409a5ba63',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.17',
        'date' => '14 Mar 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '1d8ab98e1c09518c672c5afcbef0e61f9003173c7638fc686461ae670d12742e',
            'tar.bz2' => '191316c203267d96160b47d22f955d4dc11793de8a5f327e0c2a76275a6894ea',
            'tar.xz' => '1cc4ef733ba58f6557db648012471f1916e5bac316303aa165535bedab08ee35',
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
