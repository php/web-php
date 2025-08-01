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
        'version' => '8.4.11',
        'date' => '31 Jul 2025',
        'tags' => [''], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '422548cd8cf14ab0264ba510d3586476b0e77a3272356ba486bc82e706dc6cc8',
            'tar.bz2' => '2c39c75b54df89b01195b72ad0ee1fcd490c71db18bc52bcd61fb2ffb57b26fa',
            'tar.xz' => '04cd331380a8683a5c2503938eb51764d48d507c53ad4208d2c82e0eed779a00',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.24',
        'date' => '31 Jul 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'b827c512b59270c3dc7e19614314fc345022c423e6443c960746310792d0de82',
            'tar.bz2' => 'e4e12da490746924624c91406b60b31967e4d7bdeabbab9e8cb5354884ee9964',
            'tar.xz' => '388ee5fd111097e97bae439bff46aec4ea27f816d3f0c2cb5490a41410d44251',
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
