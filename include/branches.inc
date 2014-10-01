<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/releases.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

function version_number_to_branch($version) {
	$parts = explode('.', $version);
	if (count($parts) > 1) {
		return "$parts[0].$parts[1]";
	}
}

/* If you provide an array to $always_include, note that the version numbers
 * must be in $RELEASES _and_ must be the full version number, not the branch:
 * ie provide array('5.3.29'), not array('5.3'). */
function get_eol_branches($always_include = null) {
	$always_include = $always_include ? $always_include : array();
	$branches = array();

	// Gather the last release on each branch into a convenient array.
	foreach ($GLOBALS['OLDRELEASES'] as $major => $releases) {
		foreach ($releases as $version => $release) {
			if ($branch = version_number_to_branch($version)) {
				if (!isset($branches[$major][$branch]) || version_compare($version, $branches[$major][$branch]['version'], 'gt')) {
					$branches[$major][$branch] = array(
						'date' => strtotime($release['date']),
						'link' => "/releases#$version",
						'version' => $version,
					);
				}
			}
		}
	}

	/* Exclude releases from active branches, where active is defined as "in
	 * the $RELEASES array and not explicitly marked as EOL there". */
	foreach ($GLOBALS['RELEASES'] as $major => $releases) {
		foreach ($releases as $version => $release) {
			if ($branch = version_number_to_branch($version)) {
				if (empty($release['eol'])) {
					/* This branch isn't EOL: remove it from our array. */
					if (isset($branches[$major][$branch])) {
						unset($branches[$major][$branch]);
					}
				} else {
					/* Add the release information to the EOL branches array, since it
					 * should be newer than the information we got from $OLDRELEASES. */
					$always_include[] = $version;
				}
			}
		}
	}

	// Include any release in the always_include list that's in $RELEASES.
	if ($always_include) {
		foreach ($always_include as $version) {
			$parts = explode('.', $version);
			$major = $parts[0];

			if (isset($GLOBALS['RELEASES'][$major][$version])) {
				$release = $GLOBALS['RELEASES'][$major][$version];
				if ($branch = version_number_to_branch($version)) {
					$branches[$major][$branch] = array(
						'date' => strtotime($release['source'][0]['date']),
						'link' => "/downloads#v$version",
						'version' => $version,
					);
				}
			}
		}
	}

	krsort($branches);
	foreach ($branches as $major => &$branch) {
		krsort($branch);
	}

	return $branches;
}
