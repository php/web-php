<?php
$_SERVER['BASE_PAGE'] = 'qa.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/release-qa.php';

if (isset($_GET["format"])) {
    $output = $QA_RELEASES;

    if (($_GET['only'] ?? null) === 'dev_versions') {
        $output = $output['reported'];
    }

    switch ($_GET['format'] ?? null) {
        case 'json':
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($output);
            exit;
        case 'serialize':
        default:
            header('Content-Type: text/plain; charset=UTF-8');
            echo serialize($output);
            exit;
    }
}

$SITE_UPDATE = date("D M d H:i:s Y T", filectime(__FILE__));

$SIDEBAR_DATA = '
<div class="panel">
  Test Releases
  <div class="body">
    The downloads on this page are not meant to be run in production. They are
    for testing only.
  </div>

  <div class="body">
    If you find a problem when running your library or application with these
    builds, please file a report on
    <a href="https://github.com/php/php-src/issues/">GitHub Issues</a>.
  </div>
  <br/>
  QA Releases API
  <div class="body">
    <p>
      The QA API is based on the query string.
    </p>
    <p>
      Pass in the <code>format</code> parameter, with <code>serialize</code> or
      <code>json</code> as value to obtain all information:
    </p>
    <ul>
      <li><a href="https://php.net/pre-release-builds.php?format=json">/pre-release-builds.php?format=json</a></li>
      <li><a href="https://php.net/pre-release-builds.php?format=serialize">/pre-release-builds.php?format=serialize</a></li>
    </ul>
    <p>
      To only try dev version numbers, add <code>only=dev_versions</code>:
    </p>
    <ul>
      <li><a href="https://php.net/pre-release-builds.php?format=json&only=dev_versions">/pre-release-builds.php?format=json&only=dev_versions</a></li>
    </ul>
  </div>
</div>
';

site_header("Pre-Release Builds", [
    'current' => 'downloads',
]);

?>
<h1>Pre-Release Builds</h1>
<p>
This page contains links to the Pre-release builds that the release
managers create before each actual release. These builds are meant for the
community to test whether no inadvertent changes have been made, and
whether no regressions have been introduced.
</p>

<h2 id="source">Source Builds</h2>
<?php if (!empty($QA_RELEASES['releases'])) : ?>
  <?php
    $sourceReleases = $QA_RELEASES['releases'];
    uksort($sourceReleases, static function ($a, $b) {
        return version_compare($b, $a);
    });
    $plural = count($sourceReleases) > 1 ? 's' : '';
  ?>

  <?php foreach ($sourceReleases as $pversion => $info) : ?>
  <h3 class="title">
    PHP <?php echo $info['version']; ?>
  </h3>
  <div class="content-box">

    <ul>
      <?php foreach ($info['files'] as $file_type => $file_info) : ?>
        <li>
          <a href="<?php echo $file_info['path'] ?>"><?php echo "php-{$info['version']}.tar.{$file_type}"; ?></a>
          <span class="releasedate"><?php echo date('d M Y', strtotime($info['date'])); ?></span>
            <?php foreach ($QA_CHECKSUM_TYPES as $algo): ?>
              <span class="<?php echo $algo; ?>">
              <?php if (isset($file_info[$algo]) && strlen($file_info[$algo])) : ?>
                <?php echo $file_info[$algo]; ?>
              <?php else: ?>
                <em><small>No checksum value available</small></em>)&nbsp;
              <?php endif; ?>
            <?php endforeach; ?>
          </li>
        <?php endforeach; ?>
      </ul>
	<?php endforeach; ?>
<?php else: ?>
	<p>There are no QA releases available at the moment to test.</p>
<?php endif; ?>

<h2 id="windows">Windows Builds</h2>
<?php
$winQaFile = __DIR__ . '/backend/win-qa-releases.json';
$winQaBase = 'https://downloads.php.net/~windows/qa/';
$winQaMessage = '';
$winQaReleases = [];

if (is_readable($winQaFile)) {
  $raw = @file_get_contents($winQaFile);
  $decoded = $raw ? json_decode($raw, true) : null;
  if (is_array($decoded)) {
    $allowedBranches = [];
    if (!empty($QA_RELEASES['releases'])) {
      foreach (array_keys($QA_RELEASES['releases']) as $pversion) {
        $parts = explode('.', (string) $pversion);
        if (count($parts) >= 2) {
          $branchKey = $parts[0] . '.' . $parts[1];
          $allowedBranches[$branchKey] = true;
        }
      }
    }

    $buildLabel = static function (string $key, array $entry): string {
      $tool = 'VS';
      if (strpos($key, 'vs17') !== false) {
        $tool .= '17';
      } elseif (strpos($key, 'vs16') !== false) {
        $tool .= '16';
      } elseif (strpos($key, 'vc15') !== false) {
        $tool = 'VC15';
      }

      $arch = (strpos($key, 'x64') !== false) ? 'x64' : ((strpos($key, 'x86') !== false) ? 'x86' : '');
      $ts = (strpos($key, 'nts') !== false) ? 'Non Thread Safe' : 'Thread Safe';

      if (strncmp($key, 'nts-', 4) === 0) {
        $ts = 'Non Thread Safe';
      } elseif (strncmp($key, 'ts-', 3) === 0) {
        $ts = 'Thread Safe';
      }

      return trim(($tool ? $tool . ' ' : '') . ($arch ? $arch . ' ' : '') . $ts);
    };

    $packageNames = [
      'zip' => 'Zip',
      'debug_pack' => 'Debug Pack',
      'devel_pack' => 'Development package (SDK to develop PHP extensions)',
    ];

    $makeListItem = static function (string $label, array $fileInfo, ?string $mtime, bool $includeSha) use ($winQaBase): ?string {
      $path = $fileInfo['path'] ?? '';
      if ($path === '') {
        return null;
      }

      $href = $winQaBase . ltrim($path, '/');
      $size = $fileInfo['size'] ?? '';
      $sha = $fileInfo['sha256'] ?? '';
      $hrefAttr = htmlspecialchars($href, ENT_QUOTES, 'UTF-8');
      $labelText = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');

      $parts = ['<a href="' . $hrefAttr . '">' . $labelText . '</a>'];
      if ($size !== '') {
        $parts[] = '<span class="size">' . htmlspecialchars($size, ENT_QUOTES, 'UTF-8') . '</span>';
      }

      if ($mtime) {
        $timestamp = strtotime($mtime);
        if ($timestamp) {
          $parts[] = '<span class="releasedate">' . gmdate('d M Y', $timestamp) . '</span>';
        }
      }

      if ($includeSha && $sha !== '') {
        $parts[] = '<span class="sha256">' . htmlspecialchars($sha, ENT_QUOTES, 'UTF-8') . '</span>';
      }

      return '<li>' . implode(' ', $parts) . '</li>';
    };

    foreach ($decoded as $branch => $info) {
      if (!is_array($info) || empty($info['version'])) {
        continue;
      }

      if ($branch === 'comment') {
        continue;
      }

      if (!empty($allowedBranches) && empty($allowedBranches[$branch])) {
        continue;
      }

      $topItems = [];
      if (!empty($info['source']) && is_array($info['source'])) {
        $item = $makeListItem('Download source code', $info['source'], $info['source']['mtime'] ?? null, false);
        if ($item !== null) {
          $topItems[] = $item;
        }
      }

      if (!empty($info['test_pack']) && is_array($info['test_pack'])) {
        $item = $makeListItem('Download tests package (phpt)', $info['test_pack'], $info['test_pack']['mtime'] ?? null, false);
        if ($item !== null) {
          $topItems[] = $item;
        }
      }

      $builds = [];
      foreach ($info as $buildKey => $entry) {
        if (!is_array($entry) || in_array($buildKey, ['version', 'source', 'test_pack'], true)) {
          continue;
        }

        $label = $buildLabel($buildKey, $entry);
        if ($label === '') {
          continue;
        }

        $packageItems = [];
        foreach ($packageNames as $pkgKey => $pkgLabel) {
          if (empty($entry[$pkgKey]) || !is_array($entry[$pkgKey])) {
            continue;
          }

          $rendered = $makeListItem($pkgLabel, $entry[$pkgKey], $entry['mtime'] ?? null, true);
          if ($rendered !== null) {
            $packageItems[] = $rendered;
          }
        }

        if (empty($packageItems)) {
          continue;
        }

        $builds[] = [
          'label' => $label,
          'items' => $packageItems,
        ];
      }

      if (empty($topItems) && empty($builds)) {
        continue;
      }

      $winQaReleases[] = [
        'version_label' => $info['version'],
        'top_items' => $topItems,
        'builds' => $builds,
      ];
    }
    if (!empty($winQaReleases)) {
      usort($winQaReleases, static function ($a, $b) {
        return version_compare($b['version_label'], $a['version_label']);
      });
    }
  } else {
    $winQaMessage = 'Windows QA release index could not be parsed.';
  }
} else {
  $winQaMessage = 'Windows QA release index is unavailable.';
}

if ($winQaMessage !== '') {
  echo '<p>', htmlspecialchars($winQaMessage), '</p>';
} elseif (empty($winQaReleases)) {
  echo "<p>No Windows QA builds match the currently active QA releases.</p>";
} else {
  foreach ($winQaReleases as $release) {
    $versionLabel = $release['version_label'];

    echo '<h3 class="title">PHP ', htmlspecialchars($versionLabel), '</h3>';
    echo '<div class="content-box windows-qa">';
    if (!empty($release['top_items'])) {
      echo '<ul class="windows-qa-list">';
      foreach ($release['top_items'] as $item) {
        echo $item;
      }
      echo '</ul>';
    }

    foreach ($release['builds'] as $build) {
      echo '<h5 style="margin:-10px 0 0 10px;">' . $build['label'] . '</h5>';
      echo '<ul class="windows-qa-list">';
      foreach ($build['items'] as $item) {
        echo $item;
      }
      echo '</ul>';
    }
    echo '</div>';
  }
}
?>

<?php
site_footer(['sidebar' => $SIDEBAR_DATA]);

