<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/releases.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

function version_number_to_branch($version) {
	$parts = explode('.', $version);
	if (count($parts) > 1) {
		return "$parts[0].$parts[1]";
	}
}

function get_eol_branches() {
	$branches = array();

	// Gather the last release on each branch into a convenient array.
	foreach ($GLOBALS['OLDRELEASES'] as $major => $releases) {
		foreach ($releases as $version => $release) {
			if ($branch = version_number_to_branch($version)) {
				if (!isset($branches[$major][$branch]) || version_compare($version, $branches[$major][$branch]['version'], 'gt')) {
					$branches[$major][$branch] = array(
						'date' => strtotime($release['date']),
						'version' => $version,
					);
				}
			}
		}
	}

	/* Exclude releases from active branches, where active is defined as "in
	 * the $RELEASES array". */
	foreach ($GLOBALS['RELEASES'] as $major => $releases) {
		foreach ($releases as $version => $release) {
			if ($branch = version_number_to_branch($version)) {
				if (isset($branches[$major][$branch])) {
					unset($branches[$major][$branch]);
				}
			}
		}
	}

	krsort($branches);
	foreach ($branches as $major => $branch) {
		krsort($branch);
	}

	return $branches;
}
