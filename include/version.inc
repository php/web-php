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
        'version' => '8.1.11',
        'date' => '29 Sep 2022',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '3660e8408321149f5d382bb8eeb9ea7b12ea8dd7ea66069da33f6f7383750ab2',
            'tar.bz2' => 'af6250b18b4403b6eeff9b4a02786ac86a12a208141f6f65478f79256f47f246',
            'tar.xz' => '3005198d7303f87ab31bc30695de76e8ad62783f806b6ab9744da59fe41cc5bd',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.24',
        'date' => '29 Sep 2022',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '6020843a2f1ce36745d958b3ca17f3fdc42e78a43899f552ab5dbc509ff19232',
            'tar.bz2' => '908e17cea331d5abb8506b4a89c6392b962e127c391327777c7485eb4b415d43',
            'tar.xz' => '8e6a63ac9cdabe4c345b32a54b18f348d9e50a1decda217faf2d61278d22f08b',
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
