<?php

$_SERVER['BASE_PAGE'] = 'releases/index.php';
include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . "/../include/branches.inc";

if (isset($_GET["serialize"]) || isset($_GET["json"])) {
    $RELEASES = $RELEASES + $OLDRELEASES;

    $machineReadable = [];

    $supportedVersions = [];
    foreach (get_active_branches(false) as $major => $releases) {
        $supportedVersions[$major] = array_keys($releases);
    }

    if (isset($_GET["version"])) {
        $versionArray = version_array($_GET["version"]);
        $ver = $versionArray[0];

        if (isset($RELEASES[$ver])) {
            $combinedReleases = array_replace_recursive($RELEASES, $OLDRELEASES);

            $max = (int) ($_GET['max'] ?? 1);
            if ($max == -1) {
                $max = PHP_INT_MAX;
            }

            $count = 0;
            foreach ($combinedReleases[$ver] as $version => $release) {
                if ($max <= $count) {
                    break;
                }

                if (compare_version($versionArray, $version) == 0) {
                    if (!isset($_GET['max'])) {
                        $release['supported_versions'] = $supportedVersions[$ver] ?? [];
                    }
                    $machineReadable[$version] = $release;
                    $count++;
                }
            }

            if (!isset($_GET['max']) && !empty($machineReadable)) {
                $version = key($machineReadable);
                $machineReadable = current($machineReadable);
                $machineReadable["version"] = $version;
            }
        }

        if (empty($machineReadable)) {
            $machineReadable = ["error" => "Unknown version"];
        }
    } else {
        foreach ($RELEASES as $major => $release) {
            $version = key($release);
            $r = current($release);
            $r["version"] = $version;
            $r['supported_versions'] = $supportedVersions[$major] ?? [];
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

// Human Readable.
site_header("Releases", [
    'current' => 'downloads',
    'css' => '/styles/releases.css',
]);

echo "<h1>Unsupported Historical Releases</h1>\n\n";
echo "<p>
 We have collected all the official information and code available for
 past PHP releases. You can find more details on the current release
 on <a href=\"/downloads.php\">our downloads page</a>. Please note that
 <em>older releases are listed for archival purposes only, and
 they are no longer supported</em>.
</p>\n";

$active_majors = array_keys($RELEASES);
$latest = max($active_majors);
foreach ($OLDRELEASES as $major => $a) {
    echo '<a id="v' . $major . '"></a>';
    if (!in_array($major, $active_majors, false)) {
        echo "\n<br>\n";
        echo "<p>Support for PHP $major has been <b style=\"color: red;\">discontinued</b> ";
        echo "since <b>" . current($a)['date'] . '</b>. ';
        echo "Please consider upgrading to $latest.</p>\n";
    }

    $i = 0;
    foreach ($a as $ver => $release) {
        $i++;
        mk_rel(
            $major,
            $ver,
            $release["date"],
            $release["announcement"] ?? false,
            $release["source"] ?? [],
            $release["windows"] ?? [],
            $release["museum"] ?? ($i >= 3),
        );
    }
}

site_footer(['sidebar' =>
'<div class="panel">
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
    <ul>' . recentEOLBranchesHTML() . '</ul>
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
 <a href="https://museum.php.net/">PHP Museum</a>
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
', ]);

function recentEOLBranchesHTML(): string {
    $eol = [];
    foreach (get_eol_branches() as $branches) {
        foreach ($branches as $branch => $detail) {
            $detail_date = $detail['date'];
            while (isset($eol[$detail_date])) $detail_date++;
            $eol[$detail_date] = sprintf('<li>%s: %s</li>', $branch, date('j M Y', $detail_date));
        }
    }
    krsort($eol);
    return implode('', array_slice($eol, 0, 2));
}

/**
 * @param bool|array $announcement
 */
function mk_rel(int $major,
                string $ver,
                string $date,
                $announcement,
                array $source,
                array $windows,
                bool $museum): void {
    printf("<a id=\"%s\"></a>\n<h2>%1\$s</h2>\n<ul>\n <li>Released: %s</li>\n <li>Announcement: ",
           ($pos = strpos($ver, " ")) ? substr($ver, 0, $pos) : $ver,
           $date);

    if ($announcement) {
        if (is_array($announcement)) {
            foreach ($announcement as $ann => $url) {
                echo "<a href=\"$url\">$ann</a> ";
            }
        } else {
            $url = str_replace(".", "_", $ver);
            echo "<a href=\"/releases/{$url}.php\">English</a>";
        }
    } else {
        echo "None";
    }
    echo "</li>\n";

    if ($major > 3) {
        echo " <li><a href=\"/ChangeLog-{$major}.php#{$ver}\">ChangeLog</a></li>";
    }
    echo "\n <li>\n  Download:\n";
    echo "<ul>\n";

    if (!$museum) {
        foreach (array_merge($source, $windows) as $src) {
            echo " <li>\n";
            if (isset($src['filename'])) {
                download_link($src["filename"], $src["name"]); echo "<br>\n";
                $linebreak = '';
                foreach (['md5', 'sha256'] as $cs) {
                    if (isset($src[$cs])) {
                        echo $linebreak;
                        echo "<span class=\"{$cs}sum\">{$cs}: {$src[$cs]}</span>\n";
                        $linebreak = "<br/>";
                    }
                }
            } else {
                echo "<a href=\"{$src['link']}\">{$src['name']}</a>";
            }
            echo " </li>\n";
        }

    } else { /* $museum */
        foreach ($source as $src) {
            if (!isset($src["filename"])) {
                continue;
            }
            printf('<li><a href="https://museum.php.net/php%d/%s">%s</a></li>',
                   $major, $src["filename"], $src["name"]);
        }
        foreach ($windows as $src) {
            printf('<li><a href="https://museum.php.net/%s/%s">%s</a></li>',
                   ($major == 5 ? "php5" : "win32"), $src["filename"], $src["name"]);
        }
    }

    echo "</ul>\n";
    echo "</li>\n";
    echo "</ul>\n";
}
