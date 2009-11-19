<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER["DOCUMENT_ROOT"] . "/include/releases.inc";

if (isset($_GET["serialize"])) {
	include_once $_SERVER["DOCUMENT_ROOT"] . "/include/version.inc";
  $RELEASES[5][$PHP_5_3_VERSION]["date"] = $PHP_5_3_DATE;
	$RELEASES = $RELEASES + $OLDRELEASES;

	if (isset($_GET["version"])) {
		$ver = (int)$_GET["version"];

		if (isset($RELEASES[$ver])) {
			list($version, $r) = each($RELEASES[$ver]);

			if (isset($_GET["max"])) {
				$max = (int)$_GET["max"];
				if ($max == -1) { $max = PHP_INT_MAX; }

				$return = array($version => $r);

				$count = 1;
				foreach($OLDRELEASES[$ver] as $version => $release) {
					if ($max <= $count++) {
						break;
					}

					$return[$version] = $release;
				}
				echo serialize($return);
			} else {
				$r["version"] = $version;

				echo serialize($r);
			}
		} else {
			echo serialize(array("error" => "Unkown version"));
		}
	} else {
		$array = array();
		foreach($RELEASES as $major => $release) {
			list($version, $r) = each($release);
			$r["version"] = $version;
			$array[$major] = $r;
		}
		echo serialize($array);
	}
	return;
}


// Tarball list generated with:
// cvs status -v php[34]/INSTALL |grep 'php_'|awk '{print $1}'|grep -Ev '(RC[0-9]*|rc[_0-9]*|REL|[ab][a0-9-]+|b..rc.|b.pl.|bazaar|pre|[ab])$'|sed -e 's,php_,,' -e 's,_,.,g'|sort -n|while read ver; do echo "        <option value=\"php-${ver}.tar.gz\">$ver</option>"; done
$SIDEBAR_DATA = '
<h3>Other PHP Releases</h3>
<p>
 Release candidates and beta versions are not listed here.
 You will be able to find those as well as even PHP 3 and
 PHP 2 releases in the <a href="http://museum.php.net/">PHP
 Museum</a>.
</p>

<h3>Still searching?</h3>
<p>
 If this page and the suggested links are unable to help you,
 you might try to search for a PHP tarball on FileWatcher:
</p>
 
<form action="http://www.filewatcher.com/_/" method="get">
 <p>
  <input type="hidden" name="min" value="500000" />
  <input type="hidden" name="af" value="1" />
  <select name="q" onchange="this.form.submit()">
   <option value="">-select version-</option>
   <option value="php-3.0.tar.gz">3.0.0</option>
   <option value="php-3.0.1.tar.gz">3.0.1</option>
   <option value="php-3.0.2.tar.gz">3.0.2</option>
   <option value="php-3.0.3.tar.gz">3.0.3</option>
   <option value="php-3.0.4.tar.gz">3.0.4</option>
   <option value="php-3.0.5.tar.gz">3.0.5</option>
   <option value="php-3.0.6.tar.gz">3.0.6</option>
   <option value="php-3.0.7.tar.gz">3.0.7</option>
   <option value="php-3.0.8.tar.gz">3.0.8</option>
   <option value="php-3.0.9.tar.gz">3.0.9</option>
   <option value="php-3.0.10.tar.gz">3.0.10</option>
   <option value="php-3.0.11.tar.gz">3.0.11</option>
   <option value="php-3.0.12.tar.gz">3.0.12</option>
   <option value="php-3.0.13.tar.gz">3.0.13</option>
   <option value="php-3.0.14.tar.gz">3.0.14</option>
   <option value="php-3.0.15.tar.gz">3.0.15</option>
   <option value="php-3.0.16.tar.gz">3.0.16</option>
   <option value="php-3.0.17.tar.gz">3.0.17</option>
   <option value="php-3.0.18.tar.gz">3.0.18</option>
   <option value="">--------</option>
   <option value="php-4.0.0.tar.gz">4.0.0</option>
   <option value="php-4.0.1.tar.gz">4.0.1</option>
   <option value="php-4.0.1pl1.tar.gz">4.0.1pl1</option>
   <option value="php-4.0.2.tar.gz">4.0.2</option>
   <option value="php-4.0.3.tar.gz">4.0.3</option>
   <option value="php-4.0.4.tar.gz">4.0.4</option>
   <option value="php-4.0.4pl1.tar.gz">4.0.4pl1</option>
   <option value="php-4.0.5.tar.gz">4.0.5</option>
   <option value="php-4.0.6.tar.gz">4.0.6</option>
   <option value="php-4.1.0.tar.gz">4.1.0</option>
   <option value="php-4.1.1.tar.gz">4.1.1</option>
   <option value="php-4.1.2.tar.gz">4.1.2</option>
   <option value="php-4.2.0.tar.gz">4.2.0</option>
   <option value="php-4.2.1.tar.gz">4.2.1</option>
   <option value="php-4.2.2.tar.gz">4.2.2</option>
   <option value="php-4.2.3.tar.gz">4.2.3</option>
   <option value="php-4.3.0.tar.gz">4.3.0</option>
   <option value="php-4.3.1.tar.gz">4.3.1</option>
   <option value="php-4.3.2.tar.gz">4.3.2</option>
   <option value="php-4.3.3.tar.gz">4.3.3</option>
   <option value="php-4.3.4.tar.gz">4.3.4</option>
   <option value="php-4.3.5.tar.gz">4.3.5</option>
   <option value="php-4.3.6.tar.gz">4.3.6</option>
   <option value="php-4.3.7.tar.gz">4.3.7</option>
   <option value="php-4.3.8.tar.gz">4.3.8</option>
   <option value="php-4.3.9.tar.gz">4.3.9</option>
   <option value="php-4.3.10.tar.gz">4.3.10</option>
   <option value="php-4.3.11.tar.gz">4.3.11</option>
   <option value="php-4.4.0.tar.gz">4.4.0</option>
   <option value="php-4.4.1.tar.gz">4.4.1</option>
   <option value="php-4.4.2.tar.gz">4.4.2</option>
   <option value="php-4.4.3.tar.gz">4.4.3</option>
   <option value="php-4.4.4.tar.gz">4.4.4</option>
   <option value="php-4.4.5.tar.gz">4.4.5</option>
   <option value="php-4.4.6.tar.gz">4.4.6</option>
   <option value="php-4.4.7.tar.gz">4.4.7</option>
   <option value="">--------</option>
   <option value="php-5.0.0.tar.gz">5.0.0</option>
   <option value="php-5.0.1.tar.gz">5.0.1</option>
   <option value="php-5.0.2.tar.gz">5.0.2</option>
   <option value="php-5.0.3.tar.gz">5.0.3</option>
   <option value="php-5.0.4.tar.gz">5.0.4</option>
   <option value="php-5.0.5.tar.gz">5.0.5</option>
   <option value="php-5.1.0.tar.gz">5.1.0</option>
   <option value="php-5.1.1.tar.gz">5.1.1</option>
   <option value="php-5.1.2.tar.gz">5.1.2</option>
   <option value="php-5.1.3.tar.gz">5.1.3</option>
   <option value="php-5.1.4.tar.gz">5.1.4</option>
   <option value="php-5.1.5.tar.gz">5.1.5</option>
   <option value="php-5.1.6.tar.gz">5.1.6</option>
   <option value="php-5.2.0.tar.gz">5.2.0</option>
   <option value="php-5.2.1.tar.gz">5.2.1</option>
   <option value="php-5.2.2.tar.gz">5.2.2</option>
   <option value="php-5.2.3.tar.gz">5.2.3</option>
   <option value="php-5.2.4.tar.gz">5.2.4</option>
   <option value="php-5.2.5.tar.gz">5.2.5</option>
   <option value="php-5.2.6.tar.gz">5.2.6</option>
  </select>
 </p>
</form>

<div class="information">
 <strong>Want a PHP serialize()d list of the PHP releases?</strong><br />
 <p>Add <a href="?serialize=1">?serialize=1</a> to the url</p>
 <p>Only want PHP 5 releases? <a href="?serialize=1&version=5">&version=5</a></p>
 <p>The last 3? <a href="?serialize=1&version=5&max=3">&max=3</a></p>
</div>
';

site_header("Releases");
?>

<h1>Unsupported Historical Releases</h1>

<p>
 We have collected all the official information and code available for
 past PHP releases. You can find more details on the current release
 on <a href="/downloads.php">our downloads page</a>. Please note that
 <em>older releases are listed for archaeological purposes only, and
 they are no longer supported</em>.
</p>

<?php
function mk_rel($major, $ver, $date, $announcement, $source, $windows, $museum) {
	printf("<a name=\"%s\"></a>\n<h2>%1\$s</h2>\n<ul>\n <li>Released: %s</li>\n <li>Announcement: ", ($pos = strpos($ver, " ")) ? substr($ver, 0, $pos) : $ver, $date);
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
			download_link($src["filename"], $src["name"]); echo "<br />\n";
			if (isset($src["md5"])) {
				echo '<span class="md5sum">md5: ' .$src["md5"]. "</span>\n";
			}
			echo " </li>\n";
		}
		echo "</ul>\n";
	} else {
		foreach($source as $src) {
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
	echo '<a name="v' .$major. '"></a>';
	if ($major != $latest) {
		echo "\n<hr />\n";
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

site_footer();

