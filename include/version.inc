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
        'version' => '8.3.20',
        'date' => '10 Apr 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '515ed37529df6b7f569ba68d505713bce23a93a58471dedac4ecfd17c44e5650',
            'tar.bz2' => '36b4e6a323cd45673a54f296e9d2666b7f5df57641031c77c4fd8137bc4ebeb3',
            'tar.xz' => 'f15914e071b5bddaf1475b5f2ba68107e8b8846655f9e89690fb7cd410b0db6c',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.28',
        'date' => '13 Mar 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '3318300888de5023720cc84efad5e005e53f30b5f0072fae65a750dabcaf6ec3',
            'tar.bz2' => '2919cc1b92190a58dc17904b92e626600b96ce49a4c72e77513786a4406acce5',
            'tar.xz' => 'af8c9153153a7f489153b7a74f2f29a5ee36f5cb2c6c6929c98411a577e89c91',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.32',
        'date' => '13 Mar 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '4846836d1de27dbd28e89180f073531087029a77e98e8e019b7b2eddbdb1baff',
            'tar.bz2' => 'a04fdd3df05f948df8a8f2c5d27ab54c1f43822c525f31fd20c19a282452d07c',
            'tar.xz' => 'c582ac682a280bbc69bc2186c21eb7e3313cc73099be61a6bc1d2cd337cbf383',
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
