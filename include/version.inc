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

    /* PHP 8.5 Release */
    $data['8.5'] = [
        'version' => '8.5.9',
        'date' => '30 Jul 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            // WARNING: Order of SHA256 entries here is DIFFERENT from the
            // order in the manifest
            'tar.gz' => 'd735459c2cbaeb0673d416c33d372d9ff261d562f6b29da48f3e6aeaeca083af',
            'tar.bz2' => '703c082ad9d2946ac647f3596812300d2c62b360d2f31a999021692a9b39476c',
            'tar.xz' => '0db7855f25bcd0ab1d592cdb35e284d6f6a5d2ae0f6f621122e364cc39b708f4',
        ]
    ];

    /* PHP 8.4 Release */
    $data['8.4'] = [
        'version' => '8.4.25',
        'date' => '27 Aug 2026',
        'tags' => [''], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '5cde1da976b728fa09e6b549a4c8afcd0c180337028dacf34f73b11be50253db',
            'tar.bz2' => '952ccc1785266b958f4a1dcfc580e08eabbb79f44222d1eff192bcd98d91f6e3',
            'tar.xz' => 'dc1ad8b4109898d9db49744450403874858c23efc685b1032a50bd1e83906848',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.33',
        'date' => '30 Jul 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'f43566da482abeb1614a512dabeda74967847ce8e176a977390d7a115e7812fd',
            'tar.bz2' => 'f9c9f4d0cd7692c6e3da363cd4ca72a826a49ae18f5ed430b6fcae7bc2881e18',
            'tar.xz' => 'e293ed620cec74651bb4a071317892a478aa6840fab22db45c72d77cd42f9676',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.33',
        'date' => '30 Jul 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '9a525d4db1237ede408e454b46f5a93b9e45d83d71753592e3f921903d917e07',
            'tar.bz2' => '5362f2a7a0e7168ce722fea0048b1a1d28e0f7cc265c417df670c65670695018',
            'tar.xz' => 'fbdeace9b38220436a4c8fd79b900df92878151db145e641750743a283b514c1',
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

function show_source_releases()
{
    global $RELEASES;

    $SHOW_COUNT = 4;

    $current_uri = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8');

    $i = 0; foreach ($RELEASES as $MAJOR => $major_releases): /* major releases loop start */
        $releases = array_slice($major_releases, 0, $SHOW_COUNT);
?>
        <a id="v<?php echo $MAJOR; ?>"></a>
        <?php foreach ($releases as $v => $a): ?>
          <?php $mver = substr($v, 0, strrpos($v, '.')); ?>
          <?php $stable = $i++ === 0 ? "Current Stable" : "Old Stable"; ?>

          <h3 id="v<?php echo $v; ?>" class="title">
            <span class="release-state"><?php echo $stable; ?></span>
            PHP <?php echo $v; ?>
            (<a href="/ChangeLog-<?php echo $MAJOR; ?>.php#<?php echo urlencode($v); ?>" class="changelog">Changelog</a>)
          </h3>
          <div class="content-box">

            <ul>
              <?php foreach ($a['source'] as $rel): ?>
                <li>
                  <?php download_link($rel['filename'], $rel['filename']); ?>
                  <span class="releasedate"><?php echo date('d M Y', strtotime($rel['date'])); ?></span>
                  <?php
                    if (isset($rel['sha256'])) {
                        echo sha256_html($rel['sha256']);
                    }
                   ?>
                  <?php if (isset($rel['note']) && $rel['note']): ?>
                    <p>
                      <strong>Note:</strong>
                      <?php echo $rel['note']; ?>
                    </p>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
              <li>
                <a href="/downloads.php?os=windows&osvariant=windows-downloads&version=<?php echo urlencode($mver); ?>">
                  Windows downloads
                </a>
              </li>
            </ul>

            <a href="<?php echo $current_uri; ?>#gpg-<?php echo $mver; ?>">GPG Keys for PHP <?php echo $mver; ?></a>
          </div>
        <?php endforeach; ?>
    <?php endforeach; /* major releases loop end */ ?>
<?php
}
