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
        'version' => '8.0.0',
        'date'    => '26 Nov 2020',
        'tags'    => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz'  => '3ed7b48d64357d3e8fa9e828dbe7416228f84105b8290c2f9779cd66be31ea71',
            'tar.bz2' => '5e832dc37eabf444410b4ea6fb3d66b72e44e7407a3b49caa5746edcf71b9d09',
            'tar.xz'  => 'b5278b3eef584f0c075d15666da4e952fa3859ee509d6b0cc2ed13df13f65ebb',
        ]
    ];

    /* PHP 7.4 Release */
    $data['7.4'] = [
        'version' => '7.4.14',
        'date'    => '07 Jan 2021',
        'tags'      => [],
        'sha256'  => [
            'tar.gz'  => 'd359183e2436f4ab30b70d4fbd881b5705a46b2e68cc6069fe91cd63d6e98e13',
            'tar.bz2' => '6889ca0605adee3aa7077508cd79fcef1dbd88461cdf25e7c1a86997b8d0a1f6',
            'tar.xz'  => 'f9f3c37969fcd9006c1dbb1dd76ab53f28c698a1646fa2dde8547c3f45e02886',
        ]
    ];

    /* PHP 7.3 Release */
    $data['7.3'] = [
        'version' => '7.3.25',
        'date'    => '26 Nov 2020',
        'tags'      => [],
        'sha256'  => [
            'tar.gz'  => '097c7a2a2f9189b33799d79ee5a8aac68a4d72696c1cd69c66ef5d0941ce28ad',
            'tar.bz2' => '69315a4daa91e3b07c90eef86fe205c8812c4ac5ce119c9953ecc9f42e7702fb',
            'tar.xz'  => 'c71c00ad03079efb78d1a6b8623ca4f725be697dbd9a46debacbcc9a2475f329',
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
