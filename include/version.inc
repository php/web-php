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
        'version' => '8.4.7',
        'date' => '8 May 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'fd2be3b9320184e856426e01bd1a428110776ea8e976c3fb6b65808d03fc886a',
            'tar.bz2' => '6eccb1b06a4dd9cea314dbe70c762d3d4765471cb6ebf925b9da308978bff988',
            'tar.xz' => 'e29f4c23be2816ed005aa3f06bbb8eae0f22cc133863862e893515fc841e65e3',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.21',
        'date' => '8 May 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'e7f1748c1fa3d2bf8ef2e00508bd62325ba68c3b830b253bc561225a9ba5457d',
            'tar.bz2' => 'd0769e6e11cfa6c59a16de241668be8c7f31a729950a8d06190dfad2d8622b04',
            'tar.xz' => '4dfb329f209a552c3716394fc123bb62e80a468b55ce27fc8cb0fd5f30b9dcd6',
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
