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
        'version' => '8.2.2',
        'date' => '02 Feb 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'd82dda50356cebf6b6e14dbb576b14bc8b85f0f4476a787f0f50611f11eb37d2',
            'tar.bz2' => 'f5223a5274eda8b40c19e47de0de4678c65d64401ccf710e2464962eb8136804',
            'tar.xz' => 'bdc4aa38e652bac86039601840bae01c0c3653972eaa6f9f93d5f71953a7ee33',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.15',
        'date' => '02 Feb 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '4035236180efac535ff4f22db9ef3195672f31e3e0aa88f89c38ac0715beca3b',
            'tar.bz2' => '18da0a94228f4207f8b9e3e23e881f2b74d0d6caefb908bdb5863d4a01035cc6',
            'tar.xz' => 'cd450fb4ee50488c5bf5f08851f514e5a1cac18c9512234d9e16c3a1d35781a6',
        ]
    ];

    /* PHP 8.0 Release */
    $data['8.0'] = [
        'version' => '8.0.27',
        'date' => '05 Jan 2023',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'fe2376faaf91c28ead89a36e118c177f4a8c9a7280a189b97265da1af1f4d305',
            'tar.bz2' => '5fd882b14377c158c1b55cc6ace91fb8c19b77c596d5831ad124fbbbc902dbc8',
            'tar.xz' => 'f942cbfe2f7bacbb8039fb79bbec41c76ea779ac5c8157f21e1e0c1b28a5fc3a',
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
