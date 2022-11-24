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
