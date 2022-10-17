<?php // vim: et
$_SERVER['BASE_PAGE'] = 'downloads.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/gpg-keys.inc';
include_once __DIR__ . '/include/version.inc';

// Try to make this page non-cached
header_nocache();

$SHOW_COUNT = 4;

$SIDEBAR_DATA = '
<div class="panel">
  <a href="/supported-versions.php">Supported Versions</a>
  <div class="body">
    Check the <a href="/supported-versions.php">supported versions</a> page for
    more information on the support lifetime of each version of PHP.
  </div>
</div>

<p class="panel"><a href="download-docs.php">Documentation download</a></p>
<p class="panel"><a href="download-logos.php">PHP logos</a></p>

<p class="panel"><a href="/git.php">Development sources (git)</a></p>
<p class="panel"><a href="/releases/">Old archives</a></p>
';

site_header("Downloads",
    [
        'link' => [
            [
                "rel" => "alternate",
                "type" => "application/atom+xml",
                "href" => $MYSITE . "releases/feed.php",
                "title" => "PHP Release feed"
            ],
        ],
        "current" => "downloads",
    ]
);
?>
<?php $i = 0; foreach ($RELEASES as $MAJOR => $major_releases): /* major releases loop start */
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

<hr>
<h2>GPG Keys</h2>
<p>
The releases are tagged and signed in the <a href='git.php'>PHP Git Repository</a>.
The following official GnuPG keys of the current PHP Release Manager can be used
to verify the tags:
</p>

<?php gpg_key_show_keys(true /* activeOnly */); ?>

<p>
  <a href="gpg-keys.php">
    A full list of GPG keys used for current and older releases is also
    available.
  </a>
</p>

<?php
site_footer(['sidebar' => $SIDEBAR_DATA]);
