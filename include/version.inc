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
        'version' => '8.5.8',
        'date' => '02 Jul 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            // WARNING: Order of SHA256 entries here is DIFFERENT from the
            // order in the manifest
            'tar.gz' => '6ebc55e52af4396385e689f7af0f28944fbbf966843433b573e9dc1dc03df539',
            'tar.bz2' => '22f938efc6c4eaa8bf2e40ae11466140309496aa5d5a19204272fb2596fd11dd',
            'tar.xz' => '58910198d19e873048fe87cdfe16bc790025417ede3d1651bfa1c4b533d573f2',
        ]
    ];

    /* PHP 8.4 Release */
    $data['8.4'] = [
        'version' => '8.4.23',
        'date' => '02 Jul 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'f43b69572cabfb91c023356f3ce197c782d8a255bc084c1a6af58c0e86cf7573',
            'tar.bz2' => 'c142c063b10cff68d072766e3ffbfb3654a089b938668b0830356437ee95e0fa',
            'tar.xz' => '1ab9f52008414e43bb2427ffa288eff2a4de39e1a830f957e800ba368d887a72',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.32',
        'date' => '02 Jul 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '8e1f03eea0b07bc29e1f94d3cfcf0532b0421ec63c1792346b58c3ad8e40fc9b',
            'tar.bz2' => 'f777ca24661966f94b31f6840cdad437cf30501537db8b872b1b7a1c244b8d02',
            'tar.xz' => '8698ec1f9402fa5e5e872ae3d0916b62f5f27503c1fbfc9cc3521e113355ea92',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.32',
        'date' => '02 Jul 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => '56c9d6911da0d337e2c1681f6a767ac0571821e1f16c8fdf9c248bf317d99b94',
            'tar.bz2' => '8f21e988ca4dd5e14dd9fb889884487843566e487280027c4efab6c93188a2d1',
            'tar.xz' => 'e02aa173c236c12791696254d607da680e6d5516f8f5c2339642de7c4f944bd2',
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
