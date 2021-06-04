<?php
function bugfix($number) {
    echo "Fixed bug "; bugl($number);
}

function bugl($number) {
    echo "<a href=\"http://bugs.php.net/$number\">#$number</a>";
}

function implemented($number) {
    echo "Implemented FR "; bugl($number);
}

function peclbugfix($number) {
    echo "Fixed PECL bug "; bugl($number);
}

function peclbugl($number) {
    echo "<a href=\"http://pecl.php.net/bugs/bug.php?id=$number\">#$number</a>";
}

function githubissue($repo, $number) {
    echo "Fixed issue "; githubissuel($repo, $number);
}

function githubissuel($repo, $number) {
    echo "<a href=\"https://github.com/$repo/issues/$number\">#$number</a>";
}

function release_date($in) {
    $time = strtotime($in);
    $human_readable = date('d M Y', $time);
    $for_tools = date('Y-m-d', $time);
    echo "<time class='releasedate' datetime='{$for_tools}'>{$human_readable}</time>";
}

function changelog_sidebar(?int $current = null): string {
	$majors = [8, 7, 5, 4];
	$ret = "<div class=\"panel\">ChangeLogs<div class=\"body\"><ul>\n";
	foreach ($majors as $major) {
		if ($major === $current) {
			$ret .= "  <li><b>PHP {$major}.x</b></li>\n";
		} else {
			$ret .= "  <li><a href=\"/ChangeLog-{$major}.php\">PHP {$major}.x</a></li>\n";
		}
	}
	return $ret .= "</ul></body></body>\n";
}
