<?php // vim: et
// $Id$
$_SERVER['BASE_PAGE'] = 'downloads.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

// Try to make this page non-cached
header_nocache();

$gpg = array(
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

<p class="panel"><a href="http://snaps.php.net/">Development Snapshots</a></a>
<p class="panel"><a href="/git.php">Development sources (git)</a></a>
<p class="panel"><a href="/releases/">Old archives</a></p>

<div class="otherbins">
<p class="announcements">
 We do not distribute UNIX/Linux binaries. Most Linux
 distributions come with PHP these days, so if you do
 not want to compile your own, go to your distribution\'s
 download site. Binaries available on external servers:
</p>
<p class="panel"><a href="http://windows.php.net">Windows Binaries</a></p>
<ul class="toc">
 <li class="panel"><a href="http://www.ampps.com/">Mac OS X (AMPPS)</a></li>
 <li class="panel"><a href="http://www.mamp.info/">Mac OS X (MAMP)</a></li>
 <li class="panel"><a href="http://bitnami.com/stack/mamp">Mac OS X (BitNami)</a></li>
 <li class="panel"><a href="http://bitnami.com/stack/wamp">Windows (BitNami)</a></li>
 <li class="panel"><a href="http://bitnami.com/stack/lamp">Linux (BitNami)</a></li>
 <li class="panel"><a href="http://www.opencsw.org/packages/php5">Solaris OpenCSW packages</a></li>
 <li class="panel"><a href="http://iuscommunity.org/">Redhat/CentOS Binaries (IUS)</a></li>
 <li class="panel"><a href="http://rpms.famillecollet.com/">Fedora/Redhat/CentOS Binaries (Remi)</a></li>
</ul>
</div>


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
<?php
$SHOW_COUNT = 3;
$MAJOR = 5;

$releases = array_slice($RELEASES[$MAJOR], 0, $SHOW_COUNT);
$rows = array_chunk($releases, 2, $preserve_keys = true);

$i = 0;
foreach ($rows as $row) {
   echo "<div class='row-fluid'>\n";
   foreach ($row as $v => $a) {
       $stable = $i++ === 0 ? "" : "(Old Stable)";
       $mver = substr($v, 0, strrpos($v, "."));
?>
<div class="download-box">
  <h1 id="v<?php echo $v; ?>">PHP <?php echo "$mver $stable"; ?></h1>

  <ul>
<?php
foreach($a["source"] as $rel) {
    echo " <li>\n  ";

        download_link($rel["filename"], $rel["name"]);
        echo " <span class='releasedate'>({$rel["date"]})</span>\n";
        echo " <span class=\"md5sum\">md5: {$rel["md5"]}</span><br />\n";
        (isset($rel["note"]) && $rel["note"] ? "<p><strong>Note:</strong>{$rel["note"]}</p>": "");
    echo " </li>\n";
}
?>
  </ul>
      <a href="/ChangeLog-<?php echo $MAJOR; ?>.php#<?php echo urlencode($v); ?>" class="changelog">Changelog for PHP <?php echo $v; ?></a>
GPG Keys
<pre class="gpg">
<?php echo $gpg[$mver]; ?>
</pre>
</div>

<?php
    }
    echo "</div>\n";
} // for
?>

<hr/>
<h1>GPG Keys & Signatures</h1>
<p>
Each release is tagged and signed in the <a href='git.php'>PHP Git Repository</a>,
and the signatures for individual archive is also available as .asc file.<br>
</p>
<?php
site_footer(array('sidebar' => $SIDEBAR_DATA));

