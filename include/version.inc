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

    /* PHP 8.4 Release */
    $data['8.4'] = [
        'version' => '8.4.8',
        'date' => '5 Jun 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '26d5ae014925b7dee3a61ec02422795f008fbb3a36f9355edaee2d9d78b89b07',
            'tar.bz2' => '36569c64dd1499e570c436603b641eee7cde4af576af786597d0ee711b3a3a8a',
            'tar.xz' => 'aa6a4d330b47eacd83e351658ba8c47747a1e4356456219cfb6d75e7838da091',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.22',
        'date' => '5 Jun 2025',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8fc57c9df455354679e4a127defb60e1af8718ece4cd4827e500f5c7f2449103',
            'tar.bz2' => '99133e2cda2af37baa79db17d8efd414628f14a02ec75f1418a0aa3f6aa6673b',
            'tar.xz' => '66c86889059bd27ccf460590ca48fcaf3261349cc9bdba2023ac6a265beabf36',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.28',
        'date' => '13 Mar 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '3318300888de5023720cc84efad5e005e53f30b5f0072fae65a750dabcaf6ec3',
            'tar.bz2' => '2919cc1b92190a58dc17904b92e626600b96ce49a4c72e77513786a4406acce5',
            'tar.xz' => 'af8c9153153a7f489153b7a74f2f29a5ee36f5cb2c6c6929c98411a577e89c91',
        ]
    ];

    /* PHP 8.1 Release */
    $data['8.1'] = [
        'version' => '8.1.32',
        'date' => '13 Mar 2025',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '4846836d1de27dbd28e89180f073531087029a77e98e8e019b7b2eddbdb1baff',
            'tar.bz2' => 'a04fdd3df05f948df8a8f2c5d27ab54c1f43822c525f31fd20c19a282452d07c',
            'tar.xz' => 'c582ac682a280bbc69bc2186c21eb7e3313cc73099be61a6bc1d2cd337cbf383',
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
                <a href="https://windows.php.net/download#php-<?php echo urlencode($mver); ?>">
                  Windows downloads
                </a>
              </li>
            </ul>

            <a href="#gpg-<?php echo $mver; ?>">GPG Keys for PHP <?php echo $mver; ?></a>
          </div>
        <?php endforeach; ?>
    <?php endforeach; /* major releases loop end */ ?>
<?php
}
