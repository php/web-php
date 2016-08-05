<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/releases.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

/* Branch overrides. For situations where we've changed the exact dates for a
 * branch's active support and security fix EOLs, these can be reflected here.
 *
 * Supported keys are:
 *    - stable:   the end of active support (usually two years after release).
 *    - security: the end of security support (usually release + 3 years).
 */
$BRANCHES = array(
	/* 3.0 is here because version_compare() can't handle the only version in
	 * $OLDRELEASES, and it saves another special case in
	 * get_branch_security_eol_date(). */
	'3.0' => array(
		'security' => '2000-10-20',
	),
	'5.3' => array(
		'stable'   => '2013-07-11',
		'security' => '2014-08-14',
	),
	'5.4' => array(
		'stable'   => '2014-09-14',
		'security' => '2015-09-03',
	),
	'5.5' => array(
		'stable'   => '2015-07-10',
		'security' => '2016-07-21',
	),
	'5.6' => array(
		'stable'   => '2016-12-31',
		'security' => '2018-12-31',
	),
);

/* Time to keep EOLed branches in the array returned by get_active_branches(),
 * which is used on the front page download links and the supported versions
 * page. (Currently 28 days.) */
$KEEP_EOL = new DateInterval('P28D');

function format_interval($from, $to) {
	try {
		$from_obj = $from instanceof DateTime ? $from : new DateTime($from);
		$to_obj = $to instanceof DateTime ? $to : new DateTime($to);
		$diff = $to_obj->diff($from_obj);

		$times = array();
		if ($diff->y) {
			$times[] = array($diff->y,'year');
			if ($diff->m) {
					$times[] = array($diff->m,'month');
			}
		} elseif ($diff->m) {
			$times[] = array($diff->m,'month');
		} elseif ($diff->d) {
			$times[] = array($diff->d,'day');
		} else {
			$eolPeriod = 'today';
		}
		if ($times) {
			$eolPeriod = implode(', ', 
										array_map(
											function($t) {
												return "$t[0] $t[1]" .
														($t[0] != 1 ? 's' : '');
											},
											$times
										)
								);

			if ($diff->invert) {
				$eolPeriod = "$eolPeriod ago";
			} else {
				$eolPeriod = "in $eolPeriod";
			}
		}
	} catch(Exception $e) {
		$eolPeriod = 'unknown';
	}

	return $eolPeriod;
}

function version_number_to_branch($version) {
	$parts = explode('.', $version);
	if (count($parts) > 1) {
		return "$parts[0].$parts[1]";
	}
}

function get_all_branches() {
	$branches = array();

	foreach ($GLOBALS['OLDRELEASES'] as $major => $releases) {
		foreach ($releases as $version => $release) {
			if ($branch = version_number_to_branch($version)) {
				if (!isset($branches[$major][$branch]) || version_compare($version, $branches[$major][$branch]['version'], 'gt')) {
					$branches[$major][$branch] = $release;
					$branches[$major][$branch]['version'] = $version;
				}
			}
		}
	}

	foreach ($GLOBALS['RELEASES'] as $major => $releases) {
		foreach ($releases as $version => $release) {
			if ($branch = version_number_to_branch($version)) {
				if (!isset($branches[$major][$branch]) || version_compare($version, $branches[$major][$branch]['version'], 'gt')) {
					$branches[$major][$branch] = $release;
					$branches[$major][$branch]['version'] = $version;
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

function get_active_branches($include_recent_eols = true) {
	$branches = array();
	$now = new DateTime;

	foreach ($GLOBALS['RELEASES'] as $major => $releases) {
		foreach ($releases as $version => $release) {
			if ($branch = version_number_to_branch($version)) {
        $threshold = get_branch_security_eol_date($branch);
        if ($include_recent_eols) {
          $threshold->add($GLOBALS['KEEP_EOL']);
        }
				if ($now < $threshold) {
					$branches[$major][$branch] = $release;
					$branches[$major][$branch]['version'] = $version;
				}
			}
		}
		if (!empty($branches[$major])) {
			ksort($branches[$major]);
		}
	}

	ksort($branches);
	return $branches;
}

/* If you provide an array to $always_include, note that the version numbers
 * must be in $RELEASES _and_ must be the full version number, not the branch:
 * ie provide array('5.3.29'), not array('5.3'). */
function get_eol_branches($always_include = null) {
	$always_include = $always_include ? $always_include : array();
	$branches = array();
	$now = new DateTime;

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
				if ($now < get_branch_security_eol_date($branch)) {
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

/* $branch is expected to have at least two components: MAJOR.MINOR or
 * MAJOR.MINOR.REVISION (the REVISION will be ignored if provided). This will
 * return either null (if no release exists on the given branch), or the usual
 * version metadata from $RELEASES for a single release. */
function get_initial_release($branch) {
	$branch = version_number_to_branch($branch);
	if (!$branch) {
		return null;
	}
	$major = substr($branch, 0, strpos($branch, '.'));

	if (isset($GLOBALS['OLDRELEASES'][$major]["$branch.0"])) {
		return $GLOBALS['OLDRELEASES'][$major]["$branch.0"];
	}

	/* If there's only been one release on the branch, it won't be in
	 * $OLDRELEASES yet, so let's check $RELEASES. */
	if (isset($GLOBALS['RELEASES'][$major]["$branch.0"])) {
		// Fake a date like we have on the oldreleases array.
		$release = $GLOBALS['RELEASES'][$major]["$branch.0"];
		$release['date'] = $release['source'][0]['date'];
		return $release;
	}

	// Shrug.
	return null;
}

function get_final_release($branch) {
	$branch = version_number_to_branch($branch);
	if (!$branch) {
		return null;
	}
	$major = substr($branch, 0, strpos($branch, '.'));

	$last = "$branch.0";
	foreach ($GLOBALS['OLDRELEASES'][$major] as $version => $release) {
		if (version_number_to_branch($version) == $branch && version_compare($version, $last, '>')) {
			$last = $version;
		}
	}

	if (isset($GLOBALS['OLDRELEASES'][$major][$last])) {
		return $GLOBALS['OLDRELEASES'][$major][$last];
	}
	
	/* If there's only been one release on the branch, it won't be in
	 * $OLDRELEASES yet, so let's check $RELEASES. */
	if (isset($GLOBALS['RELEASES'][$major][$last])) {
		// Fake a date like we have on the oldreleases array.
		$release = $GLOBALS['RELEASES'][$major][$last];
		$release['date'] = $release['source'][0]['date'];
		return $release;
	}

	// Shrug.
	return null;
}

function get_branch_bug_eol_date($branch) {
	if (isset($GLOBALS['BRANCHES'][$branch]['stable'])) {
		return new DateTime($GLOBALS['BRANCHES'][$branch]['stable']);
	}

	$date = get_branch_release_date($branch);

	return $date ? $date->add(new DateInterval('P2Y')) : null;
}

function get_branch_security_eol_date($branch) {
	if (isset($GLOBALS['BRANCHES'][$branch]['security'])) {
		return new DateTime($GLOBALS['BRANCHES'][$branch]['security']);
	}

	/* Versions before 5.3 are based solely on the final release date in
	 * $OLDRELEASES. */
	if (version_compare($branch, '5.3', '<')) {
		$release = get_final_release($branch);

		return $release ? new DateTime($release['date']) : null;
	}

	$date = get_branch_release_date($branch);
	return $date ? $date->add(new DateInterval('P3Y')) : null;
}

function get_branch_release_date($branch) {
	$initial = get_initial_release($branch);

	return $initial ? new DateTime($initial['date']) : null;
}

function get_branch_support_state($branch) {
	$initial = get_branch_release_date($branch);
	$bug = get_branch_bug_eol_date($branch);
	$security = get_branch_security_eol_date($branch);

	if ($initial && $bug && $security) {
		$now = new DateTime;

		if ($now >= $security) {
			return 'eol';
		} elseif ($now >= $bug) {
			return 'security';
		} elseif ($now >= $initial) {
			return 'stable';
		} else {
			return 'future';
		}
	}

	return null;
}
