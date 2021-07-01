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
$RELEASES = (function() {
    $data = [];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.8',
        'date'    => '01 Jul 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'e6092620eb3da03644b7b4fe5dc0a16e7e9d04de383e3858124afb3a8cb3fe3c',
            'tar.bz2' => 'bcb8a0127674a6f51b062ec553a6d7fb031640e3a94094ad5b9e9302d365b21a',
            'tar.xz'  => 'cbae837b40ad2a936dc26b7d03f0763db8961ab5b481ba232faefa104982198a',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.20',
        'date'    => '03 Jun 2021',
        'tags'    => [], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => '84b09e4617e960b36dfa15fdbf2e3cd7141a2e877216ea29391b12ae86963cf4',
            'tar.bz2' => '0ada6bc635e530fa7a4eb55e639dc070077108e5c9885f750b47007fd267b634',
            'tar.xz'  => '1fa46ca6790d780bf2cb48961df65f0ca3640c4533f0bca743cd61b71cb66335',
        ]
    ];

    /* PHP 7.3 Release */
    $data['7.3'] = [
        'version' => '7.3.29',
        'date'    => '01 Jul 2021',
        'tags'      => ['security'],
        'sha256'  => [
            'tar.gz'  => 'ba4de3955b0cbd33baee55a83568acc4347605e210a54b5654e4c1e09b544659',
            'tar.bz2' => 'a83a2878140bd86935f0046bbfe92672c8ab688fbe4ccf9704add6b9605ee4d0',
            'tar.xz'  => '7db2834511f3d86272dca3daee3f395a5a4afce359b8342aa6edad80e12eb4d0',
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

    return [ $version, $current ];
}
