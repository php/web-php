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
        'version' => '8.1.12',
        'date' => '27 Oct 2022',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'e0e7c823c9f9aa4c021f5e34ae1a7acafc2a9f3056ca60eb70a8af8f33da3fdf',
            'tar.bz2' => 'f87d73e917facf78de7bcde53fc2faa4d4dbe0487a9406e1ab68c8ae8f33eb03',
            'tar.xz' => '08243359e2204d842082269eedc15f08d2eca726d0e65b93fb11f4bfc51bbbab',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.25',
        'date' => '27 Oct 2022',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '349a2b5a01bfccbc9af8afdf183e57bed3349706a084f3c4694aa4c7ff7cb2e9',
            'tar.bz2' => '09d716bceb5b3db76d9023b10c1681ebbe040e51f4c18dfd35f9ff8b73bbcf8c',
            'tar.xz' => 'a291b71d0498707fc5514eb5b9513e88f0f1d4890bcdefd67282ded8a2bfb941',
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
