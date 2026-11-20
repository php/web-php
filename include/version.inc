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

    /* PHP 8.6 Release */
    $data['8.6'] = [
        'version' => '8.6.0',
        'date' => '19 Nov 2026',
        'tags' => [], // Set to ['security'] for security releases.
        'sha256' => [
            // WARNING: Order of SHA256 entries here is DIFFERENT from the
            // order in the manifest
            'tar.gz' => '62337dccde3d9fcc39797d4529f42637613036eaf3875353c206874e5813a3c1',
            'tar.bz2' => '9e233e38999a89f351a33ae6a7276d1caf5addcba11e09e3bbe3a8d25f411ff1',
            'tar.xz' => '5f84beaa3d763aee1e4feed99bf54ec692c383b322e25626807b589238c3a087',
        ]
    ];

    /* PHP 8.5 Release */
    $data['8.5'] = [
        'version' => '8.5.13',
        'date' => '19 Nov 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            // WARNING: Order of SHA256 entries here is DIFFERENT from the
            // order in the manifest
            'tar.gz' => '3aeb20a7e667e197929747f76047409196f91f0172357439319cba344df8b3e1',
            'tar.bz2' => '47d50c36016784a4a71f019cd7bfa29c31e4be0de22d3fa06095b280a6299e2f',
            'tar.xz' => '607602acaf0c3061818e9916ec44a058e8b3d43959a83862b9cd3ec7bf5b785f',
        ]
    ];

    /* PHP 8.4 Release */
    $data['8.4'] = [
        'version' => '8.4.28',
        'date' => '19 Nov 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'deffc88c60fcfb99f683a9f6689e9c91cf41b7cba50bd5f01a232a98c27f2cd4',
            'tar.bz2' => 'b23aa1be5b74629ad624fd01365c0e4df6d8878473983f337349433ef349c1f7',
            'tar.xz' => '0c8ec360e5dd8154f270b2fd50cd44ecc824e6ee39c85f911312b80d4daecd72',
        ]
    ];

    /* PHP 8.3 Release */
    $data['8.3'] = [
        'version' => '8.3.37',
        'date' => '19 Nov 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'cdd2ed867cb104ececff7c0292142c807c68a6b6da1b114ead4d586fba628a4f',
            'tar.bz2' => '7837b43cd4e18db5deac21ee6f00866e4779a705f2e54faea83c8a6cf56fd1d8',
            'tar.xz' => '0237af84478b7a7649d3964153f1b8653d622550b846f56d63062de683fb86bb',
        ]
    ];

    /* PHP 8.2 Release */
    $data['8.2'] = [
        'version' => '8.2.36',
        'date' => '19 Nov 2026',
        'tags' => ['security'], // Set to ['security'] for security releases.
        'sha256' => [
            'tar.gz' => 'c871dbdc1cd3d898e48632c8b5fcc73f1b0e1cbb15ef816579ced7f2ae1696a8',
            'tar.bz2' => 'f4306b4ada602637ef35df2e0f4aa059d559952bc87926ed746fad2b0a777b72',
            'tar.xz' => 'df50a00d2b453096608bf2bd98a9fab9a3df8678a77b93011b65c3cfe9a018fa',
        ]
    ];

    $ret = [];
    foreach ($data as $release) {
        $release += ['announcement' => true];
        $version = $release['version'];
        [$major] = explode('.', $version, 2);

        $info = [
            'announcement' => $release['announcement'],
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

    $SHOW_COUNT = 5;

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
