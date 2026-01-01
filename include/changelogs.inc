<?php

function bugfix($number): void {
    echo "Fixed bug "; bugl($number);
}

function bugl($number): void {
    echo "<a href=\"https://bugs.php.net/$number\">#$number</a>";
}

function implemented($number): void {
    echo "Implemented FR "; bugl($number);
}

function peclbugfix($number): void {
    echo "Fixed PECL bug "; bugl($number);
}

function peclbugl($number): void {
    echo "<a href=\"https://pecl.php.net/bugs/bug.php?id=$number\">#$number</a>";
}

function githubissue($repo, $number): void {
    echo "Fixed issue "; githubissuel($repo, $number);
}

function githubissuel($repo, $number): void {
    echo "<a href=\"https://github.com/$repo/issues/$number\">GH-$number</a>";
}

function githubsecurityl($repo, $id): void {
    echo "<a href=\"https://github.com/$repo/security/advisories/GHSA-$id\">GHSA-$id</a>";
}

function release_date($in): void {
    $time = strtotime($in);
    $human_readable = date('d M Y', $time);
    $for_tools = date('Y-m-d', $time);
    echo "<time class='releasedate' datetime='{$for_tools}'>{$human_readable}</time>";
}

function changelog_makelink(string $branch): string {
    return '<a href="#PHP_' . urlencode(strtr($branch, '.', '_')) . '">' . htmlentities($branch) . '</a>';
}

function changelog_header(int $major_version, array $minor_versions): void {
    site_header("PHP {$major_version} ChangeLog", [
        'current' => 'docs',
        'css' => ['changelog.css'],
        'layout_span' => 12,
    ]);
    echo "<h1>PHP {$major_version} ChangeLog</h1>\n";
    $glue = '';
    foreach ($minor_versions as $branch) {
        echo $glue, changelog_makelink($branch);
        $glue = ' | ';
    }
    echo "\n";
}

function changelog_footer(int $current_major, array $minor_versions): void {
    $sidebar = "<div class=\"panel\">ChangeLogs<div class=\"body\"><ul>\n";
    foreach ([8, 7, 5, 4] as $major) {
        if ($major === $current_major) {
            $sidebar .= "  <li><b>PHP {$major}.x</b>\n    <ul>";
            foreach ($minor_versions as $branch) {
                $sidebar .= "      <li>" . changelog_makelink($branch) . "</li>\n";
            }
            $sidebar .= "    </ul></li>\n";
        } else {
            $sidebar .= "  <li><a href=\"/ChangeLog-{$major}.php\">PHP {$major}.x</a></li>\n";
        }
    }
    site_footer(['sidebar' => "$sidebar</ul></div></div>"]);
}
