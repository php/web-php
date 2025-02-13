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
        'version' => '8.4.4',
        'date' => '13 Feb 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '719551f50a81961f802aa9102bf4a1a0b5a315074330ab37bc8035a15f4be71b',
            'tar.bz2' => '192a325fd3ca09b6c528dd6014ee07d803c3162514d4bb0d3e0981d00ac700ec',
            'tar.xz' => '05a6c9a2cc894dd8be719ecab221b311886d5e0c02cb6fac648dd9b3459681ac',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.16',
        'date' => '16 Jan 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '61441627dca50cf0173e3f054ffe8c4f5db6552555c43cab87a8ecacfd201c7e',
            'tar.bz2' => 'e9208218cbdcb816834b6c5ed8ddc5748fb12ff777cf9e0e03bb4896276608b6',
            'tar.xz' => '40d3b4e6cac33d3bcefe096d75a28d4fb4e3a9615eb20a4de55ba139fbfacdd5',
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
