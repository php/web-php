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
$RELEASES = (function () {
    $data = [];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.11',
        'date' => '28 Sep 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '48b1b41279a678a4d4afcd0b256ed921ebf2a91febb0634fdc4449b91c75799f',
            'tar.bz2' => '38192daeffabf4af6c427bf17ac1f82565d9c7522e0dbd32215162944434b28b',
            'tar.xz' => '29af82e4f7509831490552918aad502697453f0869a579ee1b80b08f9112c5b8',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.23',
        'date' => '31 Aug 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'ec5330b3978edc8fe2f78830720505bf69d12542622b5cddccee63ae3a0e5b58',
            'tar.bz2' => '929a62785177da892ddffca074bab2f1ff578473a0d4adb915c12f5f3e34ec1b',
            'tar.xz' => 'fc48422fa7e75bb45916fc192a9f9728cb38bb2b5858572c51ea15825326360c',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.30',
        'date' => '03 Aug 2023',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '449d2048fcb20a314d8c218097c6d1047a9f1c5bb72aa54d5d3eba0a27a4c80c',
            'tar.bz2' => '98a9cb6a0e27a6950cdf4b26dcac48f2be2d936d5224a502f066cf3d4cf19b92',
            'tar.xz' => '216ab305737a5d392107112d618a755dc5df42058226f1670e9db90e77d777d9',
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
