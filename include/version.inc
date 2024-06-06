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
        'version' => '8.3.7',
        'date' => '09 May 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '2e11d10b651459a8767401e66b5d70e3b048e446579fcdeb0b69bcba789af8c4',
            'tar.bz2' => '01c20cde1c5a5696651875ed22f507849679fba740f8c421616b7d43d7f797da',
            'tar.xz' => 'd53433c1ca6b2c8741afa7c524272e6806c1e895e5912a058494fea89988570a',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.19',
        'date' => '09 May 2024',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8bfdd20662b41a238a5acd84fab3e05c36a685fcb56e6d8ac18eeb87057ab2bc',
            'tar.bz2' => '3c18f7ce51b7c7b26b797e1f97079d386b30347eb04e817f5e6c8e9b275e2a6a',
            'tar.xz' => 'aecd63f3ebea6768997f5c4fccd98acbf897762ed5fc25300e846197a9485c13',
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
