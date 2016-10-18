<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/branches.inc";

if (isset($_GET["serialize"]) || isset($_GET["json"])) {
	$RELEASES[5][$PHP_5_6_VERSION]["date"] = $PHP_5_6_DATE;
	$RELEASES                              = $RELEASES + $OLDRELEASES;

	$machineReadable = array();

	if (isset($_GET["version"])) {
		$ver = (int)$_GET["version"];

		if (isset($RELEASES[$ver])) {
			list($version, $r) = each($RELEASES[$ver]);

			if (isset($_GET["max"])) {
				$max = (int)$_GET["max"];
				if ($max == -1) { $max = PHP_INT_MAX; }

				$machineReadable = array($version => $r);

				$count = 1;

				/* check if other $RELEASES[$ver] are there */
				/* e.g., 5_3, 5_4, and 5_5 all exist and have a release */
				while(($z = each($RELEASES[$ver])) && $count++ < $max) {
					$machineReadable[$z[0]] = $z[1];
				}

				foreach($OLDRELEASES[$ver] as $version => $release) {
					if ($max <= $count++) {
						break;
					}

					$machineReadable[$version] = $release;
				}
			} else {
				$r["version"] = $version;

				$machineReadable = $r;
			}
		} else {
			$machineReadable = array("error" => "Unknown version");
		}
	} else {
		$machineReadable = array();
		foreach($RELEASES as $major => $release) {
			list($version, $r) = each($release);
			$r["version"] = $version;
			$machineReadable[$major] = $r;
		}
	}

	if (isset($_GET["serialize"])) {
		header('Content-type: text/plain');
		echo serialize($machineReadable);
	} elseif (isset($_GET["json"])) {
		header('Content-Type: application/json');
		echo json_encode($machineReadable);
	}
	return;
}


// Tarball list generated with:
// cvs status -v php[34]/INSTALL |grep 'php_'|awk '{print $1}'|grep -Ev '(RC[0-9]*|rc[_0-9]*|REL|[ab][a0-9-]+|b..rc.|b.pl.|bazaar|pre|[ab])$'|sed -e 's,php_,,' -e 's,_,.,g'|sort -n|while read ver; do echo "        <option value=\"php-${ver}.tar.gz\">$ver</option>"; done

// Show the two most recent EOLed branches.
$eol = array();
foreach (get_eol_branches() as $major => $branches) {
	foreach ($branches as $branch => $detail) {
		$eol[$detail['date']] = sprintf('<li>%s: %s</li>', $branch, date('j M Y', $detail['date']));
	}
}
krsort($eol);
$eol = implode('', array_slice($eol, 0, 2));

$SIDEBAR_DATA = '
<div class="panel">
  <a class="headline" href="/supported-versions.php">Supported Versions</a>
  <div class="body">
    Check the <a href="/supported-versions.php">supported versions</a> page for
    more information on the support lifetime of each version of PHP.
  </div>
</div>

<div class="panel">
  <a class="headline" href="/eol.php">End of Life Dates</a>
  <div class="body">
    <p>The most recent branches to reach end of life status are:</p>
    <ul>'.$eol.'</ul>
  </div>
</div>

<p class="panel">
 <a href="/ChangeLog-7.php">PHP 7 ChangeLog</a>
</p>
<p class="panel">
 <a href="/ChangeLog-5.php">PHP 5 ChangeLog</a>
</p>
<p class="panel">
 <a href="/ChangeLog-4.php">PHP 4 ChangeLog</a>
</p>

<div class="panel">
 <a href="http://museum.php.net/">PHP Museum</a>
</div>

<div class="panel">
  <div class="headline">Want a PHP serialized list of the PHP releases?</div>
  <div class="body">
    <ul>
      <li>Add <a href="?serialize">?serialize</a> to the url</li>
      <li>Only want PHP 5 releases? <a href="?serialize&amp;version=5">&amp;version=5</a></li>
      <li>The last 3? <a href="?serialize&amp;version=5&amp;max=3">&amp;max=3</a></li>
    </ul>
  </div>
</div>

<div class="panel">
  <div class="headline">Want a JSON list of the PHP releases?</div>
  <div class="body">
    <ul>
      <li>Add <a href="?json">?json</a> to the url</li>
      <li>Only want PHP 5 releases? <a href="?json&amp;version=5">&amp;version=5</a></li>
      <li>The last 3? <a href="?json&amp;version=5&amp;max=3">&amp;max=3</a></li>
    </ul>
  </div>
</div>
';

site_header("Releases", array(
    'current' => 'downloads',
    'css' => '/styles/releases.css',
));
?>

<h1>Unsupported Historical Releases</h1>

<p>
 We have collected all the official information and code available for
 past PHP releases. You can find more details on the current release
 on <a href="/downloads.php">our downloads page</a>. Please note that
 <em>older releases are listed for archival purposes only, and
 they are no longer supported</em>.
</p>

<p>
 <em>Note to Windows users: Only PHP 5.3+ versions are available as both VC6 and VC9 builds.
 All versions prior were built using VC6.</em>
</p>

<?php
function mk_rel($major, $ver, $date, $announcement, $source, $windows, $museum) {
	printf("<a id=\"%s\"></a>\n<h2>%1\$s</h2>\n<ul>\n <li>Released: %s</li>\n <li>Announcement: ", ($pos = strpos($ver, " ")) ? substr($ver, 0, $pos) : $ver, $date);
	if ($announcement) {
		if (is_array($announcement)) {
			foreach($announcement as $ann => $url) {
				echo '<a href="'.$url.'">' .$ann. '</a> ';
			}
		} else {
			$url = str_replace(".", "_", $ver);
			echo '<a href="/releases/' .$url. '.php">English</a>';
		}
	} else {
		echo "None";
	}
	echo "</li>\n";

	if ($major != 3) {
		echo ' <li><a href="/ChangeLog-'.$major.'.php#' .$ver. '">ChangeLog</a></li>';
	}
	echo "\n <li>\n  Download:\n";

	if (!$museum) {
		echo "<ul>\n";
		foreach(array_merge($source, $windows) as $src) {
			echo " <li>\n";
			if (isset($src['filename'])) {
				download_link($src["filename"], $src["name"]); echo "<br>\n";
				if (isset($src["md5"])) {
					echo '<span class="md5sum">md5: ' .$src["md5"]. "</span>\n";
				}
			} else {
				echo '<a href="'.$src['link'].'">'.$src['name'].'</a>';
			}
			echo " </li>\n";
		}
		echo "</ul>\n";
	} else {
		foreach($source as $src) {
			if (!isset($src["filename"])) {
				continue;
			}
			printf('<a href="http://museum.php.net/php%d/%s">%s</a>'."\n", $major, $src["filename"], $src["name"]);
		}
		foreach($windows as $src) {
			printf('<a href="http://museum.php.net/%s/%s">%s</a>'."\n", ($major == 5 ? "php5" : "win32"), $src["filename"], $src["name"]);
		}
	}

	echo "  </li>\n";
	echo " </ul>\n";
}

$latest = max(array_keys($OLDRELEASES));
foreach($OLDRELEASES as $major => $a) {
	echo '<a id="v' .$major. '"></a>';
	if ($major != $latest) {
		echo "\n<hr>\n";
		if ($major == 4) {
			echo '<p>Support for PHP 4 has been <b style="color: red;">discontinued</b> since 2007-12-31. Please consider upgrading to PHP 5.</p>'."\n";
		}
	}

	$i = 0;
	foreach($a as $ver => $release) {
		$i++;
		mk_rel(
			$major,
			$ver,
			$release["date"],
			isset($release["announcement"]) ? $release["announcement"] : false,
			$release["source"],
			(isset($release["windows"]) ? $release["windows"] : array()),
			isset($release["museum"]) ? $release["museum"] : ($i<3 ? false : true)
		);
	}
}

site_footer(array("sidebar" => $SIDEBAR_DATA));

