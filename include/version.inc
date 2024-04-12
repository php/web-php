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

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.6',
        'date' => '11 Apr 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '39695f5bd107892e36fd2ed6b3d3a78140fd4b05d556d6c6531a921633cacb5f',
            'tar.bz2' => '6324b1ddd8eb3025b041034b88dc2bc0b4819b0022129eeaeba37e47803108bc',
            'tar.xz' => '53c8386b2123af97626d3438b3e4058e0c5914cb74b048a6676c57ac647f5eae',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.18',
        'date' => '11 Apr 2024',
        'tags' => [ 'security' ], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'b934ca7e8c82945c5cbf0aa2a3f66727eb5b5098e551819e1b090572d6a51ead',
            'tar.bz2' => 'ca0b07c254200320f518ac5b3df540a9cf14d866f3c93edc3013b52e06fac796',
            'tar.xz' => '44b306fc021e56441f691da6c3108788bd9e450f293b3bc70fcd64b08dd41a50',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.28',
        'date' => '11 Apr 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'a2a9d853f4a4c9ff8631da5dc3a6cec5ab083ef37a214877b0240dcfcdfdefea',
            'tar.bz2' => '8be450096e0153c47d75384e7dd595cc897f1d53ce0060708ce9589bcc3141ee',
            'tar.xz' => '95d0b2e9466108fd750dab5c30a09e5c67f5ad2cb3b1ffb3625a038a755ad080',
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
