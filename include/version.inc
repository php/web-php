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
        'version' => '8.3.13',
        'date' => '24 Oct 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'ffe34317d2688ed3161809c90ca4135c84ebfdfd12a46880a264d7d1e1d7739a',
            'tar.bz2' => 'c7791c82e1a554ccaf84a40ba71cc1417ba9af67fb5b39780837fd7c7eb6f124',
            'tar.xz' => '89adb978cca209124fe53fd6327bc4966ca21213a7fa2e9504f854e340873018',
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
        'version' => '8.1.30',
        'date' => '26 Sep 2024',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '80addd302b7e9708e0d106779c3827520eccaf14af1149174b51da33d63e6af7',
            'tar.bz2' => 'cb1625e5ac49b91037477e3e7767bb0624343971aeb992f4791b618af571d23e',
            'tar.xz' => 'f24a6007f0b25a53cb7fbaee69c85017e0345b62089c2425a0afb7e177192ed1',
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
