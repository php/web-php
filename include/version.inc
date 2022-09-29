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

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.10',
        'date' => '01 Sep 2022',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '3ea4f323109dfbc8d2631d08aa0e08602c1f713678e9dc6c750f081ef49eab0f',
            'tar.bz2' => '2de8e0402285f7c56887defe651922308aded58ba60befcf3b77720209e31f10',
            'tar.xz' => '90e7120c77ee83630e6ac928d23bc6396603d62d83a3cf5df8a450d2e3070162',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.23',
        'date' => '01 Sep 2022',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'a2dd50e9c4a0328d921b6bc914e8b4e6572f94f09867318f88acca5ac4fa76c7',
            'tar.bz2' => '1412db46800a45ced377c2892ec6261b3c412f13dc133bfc998cfb2f147b40cf',
            'tar.xz' => '65e474b6bd8cfc9d4a8a56268a755e2f9d3e7499e1687e6401a9f2b047600f87',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.32',
        'date' => '29 Sep 2022',
        'tags' => ['security'], // Set to ['security'] for security releases
        'sha256' => [
            'tar.gz' => '197e3372afd69694eb6b230838305eb9e1cbe5db272e0fa3bbe0d38e329a95bc',
            'tar.bz2' => '9b4c3c21ffbb4f35d7b865dbf88538bba1742335248ae1cc2afc303d456e3aa6',
            'tar.xz' => '323332c991e8ef30b1d219cb10f5e30f11b5f319ce4c6642a5470d75ade7864a',
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
