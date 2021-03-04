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
        'version' => '8.0.2',
        'date'    => '04 Feb 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'cc17a32f76beb5f405da39a548218b3b6736710884fcd761838098553df149da',
            'tar.bz2' => '000fa89e3eae317c0b17ee048229cd68a38a3b0fef72c558681fd004057ba3e6',
            'tar.xz'  => '84dd6e36f48c3a71ff5dceba375c1f6b34b71d4fa9e06b720780127176468ccc',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.16',
        'date'    => '04 Mar 2021',
        'tags'    => [], // Set to ['security'] for security releases
        'sha256'  => [
            'tar.gz'  => 'ef2d2b463fc3444895ec599337b663a8832c6ade148d9832417e59aa2b9e93da',
            'tar.bz2' => '85710f007cfd0fae94e13a02a3a036f4e81ef43693260cae8a2e1ca93659ce3e',
            'tar.xz'  => '1c16cefaf88ded4c92eed6a8a41eb682bb2ef42429deb55f1c4ba159053fb98b',
        ]
    ];

    /* PHP 7.3 Release */
    $data['7.3'] = [
        'version' => '7.3.27',
        'date'    => '04 Feb 2021',
        'tags'      => ['security'],
        'sha256'  => [
            'tar.gz'  => '4b7b9bd0526ad3f2c8d6fd950ea7b0ab2478b5b09755c6a620a4f3bcfbf59154',
            'tar.bz2' => '9d2006f5e835acf5e408e34d8050a4935f2121ab18bda42775a27ed59bdae003',
            'tar.xz'  => '65f616e2d5b6faacedf62830fa047951b0136d5da34ae59e6744cbaf5dca148d',
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
