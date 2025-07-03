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
        'version' => '8.4.10',
        'date' => '3 Jul 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'bd25c40ece60d1b3c879c11f517d335b8d6a872174c32ebb088b9494d8bb2cf2',
            'tar.bz2' => '8815d10659cde5f03be4d169205d62b7b29ed0edc7cdd84b6384cda0310c3108',
            'tar.xz' => '14983a9ef8800e6bc2d920739fd386054402f7976ca9cd7f711509496f0d2632',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.22',
        'date' => '5 Jun 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8fc57c9df455354679e4a127defb60e1af8718ece4cd4827e500f5c7f2449103',
            'tar.bz2' => '99133e2cda2af37baa79db17d8efd414628f14a02ec75f1418a0aa3f6aa6673b',
            'tar.xz' => '66c86889059bd27ccf460590ca48fcaf3261349cc9bdba2023ac6a265beabf36',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.29',
        'date' => '3 Jul 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '0b27d330769d4bc67b1d8864347c38744b289664a946919c3ddb2235d326b3cd',
            'tar.bz2' => '51979e8d198cbade2aad4ffe9f53dd3f04f9602d3089e5979985e058ade4267c',
            'tar.xz' => '475f991afd2d5b901fb410be407d929bc00c46285d3f439a02c59e8b6fe3589c',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.33',
        'date' => '3 Jul 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'ee33568a0e2be0b722b3f9a88cecc578316b66b25c90cd0a4f3b1a5cdc3cd826',
            'tar.bz2' => 'b6553451841c1a569865d7fdc83024621ee4434cd8fbfeb0a31588ac9c70685f',
            'tar.xz' => '9db83bf4590375562bc1a10b353cccbcf9fcfc56c58b7c8fb814e6865bb928d1',
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
