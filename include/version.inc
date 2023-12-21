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
        'version' => '8.3.1',
        'date' => '21 Dec 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '2b10218b5e81915d1708ab4b6351362d073556ec73a790553c61fd89c119924e',
            'tar.bz2' => 'c40fae9197fa68a532f6a062c316dafe3b04c545136b54b9ead4932fc26c6ae1',
            'tar.xz' => '56445b1771b2ba5b7573453f9e8a9451e2d810b1741a352fa05259733b1e9758',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.14',
        'date' => '21 Dec 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '4c1fbb55a10ece7f4532feba9f3f88b9b211c11320742977588738374c03255f',
            'tar.bz2' => 'f871e131333d60ae6c537b1adddbc2aea54c436c562af986fb8309c060040b9e',
            'tar.xz' => '763ecd39fcf51c3815af6ef6e43fa9aa0d0bd8e5a615009e5f4780c92705f583',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.27',
        'date' => '21 Dec 2023',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '9aa5d7a29389d799885d90740932697006d5d0f55d1def67678e0c14f6ab7b2d',
            'tar.bz2' => 'a15fd73ea44f2df30b07d24786e07d1948b0ea3eed0b8b845735d500dc28bff1',
            'tar.xz' => '479e65c3f05714d4aace1370e617d78e49e996ec7a7579a5be47535be61f0658',
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
