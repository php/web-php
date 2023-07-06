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
        'version' => '8.2.8',
        'date' => '06 Jul 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '6419b74e9b675c8d5a1afd2788c4d7996a19bbe2be409716ccb2067897af9df1',
            'tar.bz2' => '995ed4009c7917c962d31837a1a3658f36d4af4f357b673c97ffdbe6403f8517',
            'tar.xz' => 'cfe1055fbcd486de7d3312da6146949aae577365808790af6018205567609801',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.20',
        'date' => '08 Jun 2023',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'b7d3e2a0c5bed37bb39e4627550d0ee5a4a600042b83c63037b0f5f84793cbe6',
            'tar.bz2' => '55578587514a2707500f85319e57c0d4df9b8803cdb26566595ac4bf459dc4dd',
            'tar.xz' => '4c9973f599e93ed5e8ce2b45ce1d41bb8fb54ce642824fd23e56b52fd75029a6',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.29',
        'date' => '08 Jun 2023',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'db6ee08df5706365f624cde1cffb20ad6de1effe59d7e886337213a09f2e2684',
            'tar.bz2' => '4801a1f0e17170286723ab54acd045ac78a9656021d56f104a64543eec922e12',
            'tar.xz' => '14db2fbf26c07d0eb2c9fab25dbde7e27726a3e88452cca671f0896bbb683ca9',
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
