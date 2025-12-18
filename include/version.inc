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
        'version' => '8.5.1',
        'date' => '18 Dec 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            // WARNING: Order of SHA256 entries here is DIFFERENT from the
            // order in the manifest
            'tar.gz' => '915492958081409a5e3ef99df969bcfa5b33bdf9517bd077991747e17fa2c1b7',
            'tar.bz2' => '55f428c426e7241752ea9afff160bb64c32a9321cbd6d17d1c145b8df8823737',
            'tar.xz' => '3f5bf99ce81201f526d25e288eddb2cfa111d068950d1e9a869530054ff98815',
        ]
    ];

    /* PHP 8.4 Release */
    $data['8.4'] = [
        'version' => '8.4.16',
        'date' => '18 Dec 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8e35d24f148ea7c2a93e9b9bcc329e8bf78b5bb922f3723a727c74c19d184e98',
            'tar.bz2' => '6c48c65eba6a2f7a102925d08772239b1f45110aed2187fdd81b933ed439c692',
            'tar.xz' => 'f66f8f48db34e9e29f7bfd6901178e9cf4a1b163e6e497716dfcb8f88bcfae30',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.29',
        'date' => '18 Dec 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8565fa8733c640b60da5ab4944bf2d4081f859915b39e29b3af26cf23443ed97',
            'tar.bz2' => 'c7337212e655325d499ea8108fa76f69ddde2fff7cb0fad36aa63eed540cb8a5',
            'tar.xz' => 'f7950ca034b15a78f5de9f1b22f4d9bad1dd497114d175cb1672a4ca78077af5',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.30',
        'date' => '18 Dec 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'a0fa6673ba4b0c8335fbab08afb7c2e13a3791f2b5a0928c7ad3d7ad872edf26',
            'tar.bz2' => '104820b6c8fc959dde4b3342135f42bdabf246e86918a16381a17d8447c866fa',
            'tar.xz' => 'bc90523e17af4db46157e75d0c9ef0b9d0030b0514e62c26ba7b513b8c4eb015',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.33',
        'date' => '3 Jul 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'ee33568a0e2be0b722b3f9a88cecc578316b66b25c90cd0a4f3b1a5cdc3cd826',
            'tar.bz2' => 'b6553451841c1a569865d7fdc83024621ee4434cd8fbfeb0a31588ac9c70685f',
            'tar.xz' => '9db83bf4590375562bc1a10b353cccbcf9fcfc56c58b7c8fb814e6865bb928d1',
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
                    if (isset($rel['md5']))    echo '<span class="md5sum">', $rel['md5'], '</span>';
                    if (isset($rel['sha256'])) echo '<span class="sha256">', $rel['sha256'], '</span>';
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
