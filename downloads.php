<?php // vim: et
// $Id$
$_SERVER['BASE_PAGE'] = 'downloads.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

// Try to make this page non-cached
header_nocache();

$SHOW_COUNT = 3;
$MAJOR = 5;

$releases = array_slice($RELEASES[$MAJOR], 0, $SHOW_COUNT);

$gpg = array(
    "5.6" => <<< GPG
pub   2048R/33CFC8B3 2014-01-14 [expires: 2020-01-13]
      Key fingerprint = 6E4F 6AB3 21FD C07F 2C33  2E3A C2BF 0BC4 33CF C8B3
uid                  Ferenc Kovacs &lt;tyrael@php.net&gt;

pub   2048R/90D90EC1 2013-07-18 [expire : 2016-07-17]
      Key fingerprint = 0BD7 8B5F 9750 0D45 0838  F95D FE85 7D9A 90D9 0EC1
uid                  Julien Pauli &lt;jpauli@php.net&gt;

GPG
,
    "5.5" => <<< GPG
pub   2048R/90D90EC1 2013-07-18 [expire : 2016-07-17]
      Key fingerprint = 0BD7 8B5F 9750 0D45 0838  F95D FE85 7D9A 90D9 0EC1
uid                  Julien Pauli &lt;jpauli@php.net&gt;

pub   4096R/7267B52D 2012-03-20 [expires: 2016-03-19]
      Key fingerprint = 0B96 609E 270F 565C 1329  2B24 C13C 70B8 7267 B52D
uid                  David Soria Parra &lt;dsp@php.net&gt;

GPG
,
    "5.4" => <<< GPG
pub   2048D/5DA04B5D 2012-03-19
      Key fingerprint = F382 5282 6ACD 957E F380  D39F 2F79 56BC 5DA0 4B5D
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@gmail.com&gt;
uid                  Stanislav Malyshev (PHP key) &lt;stas@php.net&gt;
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@sugarcrm.com&gt;
GPG
,
    "5.3" => <<< GPG
pub   4096R/7267B52D 2012-03-20 [expires: 2016-03-19]
      Key fingerprint = 0B96 609E 270F 565C 1329  2B24 C13C 70B8 7267 B52D
uid                  David Soria Parra &lt;dsp@php.net&gt;
pub   2048R/FC9C83D7 2012-03-18 [expires: 2017-03-17]
      Key fingerprint = 0A95 E9A0 2654 2D53 835E  3F3A 7DEC 4E69 FC9C 83D7
uid                  Johannes Schlüter &lt;johannes@schlueters.de&gt;
uid                  Johannes Schlüter &lt;johannes@php.net&gt;
GPG
);

$SIDEBAR_DATA = '
<p class="panel"><a href="download-docs.php">Documentation download</a></p>
<p class="panel"><a href="download-logos.php">PHP logos</a></p>

<p class="panel"><a href="http://snaps.php.net/">Development Snapshots</a></p>
<p class="panel"><a href="/git.php">Development sources (git)</a></p>
<p class="panel"><a href="/releases/">Old archives</a></p>
';

site_header("Downloads",
    array(
        'link' => array(
            array(
                "rel"   => "alternate",
                "type"  => "application/atom+xml",
                "href"  => $MYSITE . "releases/feed.php",
                "title" => "PHP Release feed"
            ),
        ),
        "current" => "downloads",
    )
);
?>
<a id="v5"></a>
<?php $i = 0; foreach ($releases as $v => $a): ?>
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
          <span class="md5sum"><?php echo $rel['md5']; ?></span>
          <?php if (isset($rel['note']) && $rel['note']): ?>
            <p>
              <strong>Note:</strong>
              <?php echo $rel['note']; ?>
            </p>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>

    <a href="#gpg-<?php echo $mver; ?>">GPG Keys for PHP <?php echo $mver; ?></a>
  </div>
<?php endforeach; ?>

<hr>
<h2>GPG Keys</h2>
<p>
The releases are tagged and signed in the <a href='git.php'>PHP Git Repository</a>.
The following official GnuPG keys of the current PHP Release Manager can be used
to verify the tags:
</p>
<?php foreach ($gpg as $branch => $data): ?>
  <h3 id="gpg-<?php echo $branch; ?>" class="content-header">PHP <?php echo $branch; ?></h3>
  <div class="content-box">
  <pre>
<?php echo $data; ?>
  </pre>
</div>
<?php endforeach; ?>

<?php
site_footer(array('sidebar' => $SIDEBAR_DATA));
