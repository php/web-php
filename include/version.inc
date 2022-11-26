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
        'version' => '8.1.13',
        'date' => '24 Nov 2022',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'eed1981ce9999d807cb139a9d463ae54bbeda2a57a9a28ad513badf5b99b0073',
            'tar.bz2' => '93fcfdfaaa3d094a0fdb18ce08d20f20d526ee3f07a146a8a8ec82ce00b237ca',
            'tar.xz' => 'b15ef0ccdd6760825604b3c4e3e73558dcf87c75ef1d68ef4289d8fd261ac856',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.26',
        'date' => '24 Nov 2022',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '3c83a7355a640b2ba436b8202e8597df8f9daadee1ec9241729ece8e578d21cd',
            'tar.bz2' => '6df87af96f275a75889ece6e3fe4a13abd93a767a9992863bdc0e90f1e887ee7',
            'tar.xz' => '0765bfbe640dba37ccc36d2bc7c7b7ba3d2c3381c9cd4305f66eca83e82a40b3',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.33',
        'date' => '03 Nov 2022',
        'tags' => ['security'], // Set to ['security'] for security releases
        'sha256' => [
            'tar.gz' => '5a2337996f07c8a097e03d46263b5c98d2c8e355227756351421003bea8f463e',
            'tar.bz2' => '4e8117458fe5a475bf203128726b71bcbba61c42ad463dffadee5667a198a98a',
            'tar.xz' => '924846abf93bc613815c55dd3f5809377813ac62a9ec4eb3778675b82a27b927',
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
