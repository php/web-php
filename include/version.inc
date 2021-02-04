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
        'version' => '8.0.1',
        'date'    => '07 Jan 2021',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => 'f1fee0429aa2cce6bc5df5d7e65386e266b0aab8a5fad7882d10eb833d2f5376',
            'tar.bz2' => 'c44e76af40d133de64564f9caf5daec52bbe84c1ccb4e4500a62233d614ebdee',
            'tar.xz'  => '208b3330af881b44a6a8c6858d569c72db78dab97810332978cc65206b0ec2dc',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.15',
        'date'    => '04 Feb 2021',
        'tags'      => [],
        'sha256'  => [
            'tar.gz'  => 'c7403988b69212335dec79e869abe9dbb23d60ea7f6eb16fd6ff99ed6b5f1c87',
            'tar.bz2' => '1bd7be0293446c3d3cbe3c9fae6045119af0798fb0869db61932796dc23a7757',
            'tar.xz'  => '9b859c65f0cf7b3eff9d4a28cfab719fb3d36a1db3c20d874a79b5ec44d43cb8',
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
