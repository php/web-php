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
        'version' => '8.3.12',
        'date' => '26 Sep 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '7090e551e05b26384546345d6a162c71b74550febf75bdfd16dfd1f0cfa8647c',
            'tar.bz2' => '807633496ccdb370a8905458db82bd67366e98a6d59728914b797b87e9caecbf',
            'tar.xz' => 'f774e28633e26fc8c5197f4dae58ec9e3ff87d1b4311cbc61ab05a7ad24bd131',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.24',
        'date' => '26 Sep 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '5d26441969279a594e404bb9f2e17b6f74bb10606fe05911e739137673ae6c4c',
            'tar.bz2' => '4cc76ec644eee97d17c92bfe8d0e84714fedf299a538b7dfadc0639dd0dc432f',
            'tar.xz' => '80a5225746a9eb484475b312d4c626c63a88a037d8e56d214f30205e1ba1411a',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.29',
        'date' => '06 Jun 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8b2609bf1d3173aa38269a9af21532c65f730aadd3051f9aae011eea9e246de5',
            'tar.bz2' => '87a60313263f2f533f180e719272ca5e47cd9884d4ec3c93720198eaffae0827',
            'tar.xz' => '288884af60581d4284baba2ace9ca6d646f72facbd3e3c2dd2acc7fe6f903536',
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
