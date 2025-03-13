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
        'version' => '8.4.5',
        'date' => '13 Mar 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'f05530d350f1ffe279e097c2af7a8d78cab046ef99d91f6b3151b06f0ab05d05',
            'tar.bz2' => '9378c78887d0cd7462fc5c17f2de30c852f20f79d28795e2573fe3250d39436e',
            'tar.xz' => '0d3270bbce4d9ec617befce52458b763fd461d475f1fe2ed878bb8573faed327',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.19',
        'date' => '13 Mar 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'bb21d1a5eb9a8b27668b2926fa9279a5878bb6fdee55450621f7865e062dcf3a',
            'tar.bz2' => 'ad6902a2a02f94ec3e9982069e2668bba3ce47e2f6bbbab95eb6b7db7bf3d350',
            'tar.xz' => '976e4077dd25bec96b5dfe8938052d243bbd838f95368a204896eff12756545f',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.27',
        'date' => '19 Dec 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '179cc901760d478ffd545d10702ebc2a1270d8c13471bdda729d20055140809a',
            'tar.bz2' => '6e57dbaf769a7f3deb4f0f48b8c535e671cc0a18022ed7f6ff23b50e941d4b60',
            'tar.xz' => '3eec91294d8c09b3df80b39ec36d574ed9b05de4c8afcb25fa215d48f9ecbc6b',
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
