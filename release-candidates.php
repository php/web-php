<?php
$_SERVER['BASE_PAGE'] = 'qa.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/release-qa.php';

$SITE_UPDATE = date("D M d H:i:s Y T", filectime(__FILE__));

site_header("Release Candidates", [
	'current' => 'downloads',
]);

?>
<h1>Release Candidate Builds</h1>
<p>
	This page contains links to the Release Candidate builds that the release
	managers create before each actual release. These builds are meant for the
	community to test whether no inadvertent changes have been made, and
	whether no regressions have been introduced.
</p>

<h3>Available QA Releases:</h3>
<?php show_release_qa($QA_RELEASES); ?>
<p>
<br>
<strong>Windows users:</strong>
See <a href="https://windows.php.net/qa/">here</a> for the Windows QA builds.
</p>
<?php

site_footer();

function show_release_qa($QA_RELEASES) {
	// The checksum configuration array
	global $QA_CHECKSUM_TYPES;

	echo "<!-- RELEASE QA -->\n";

	if (!empty($QA_RELEASES['releases'])) {

		$plural = count($QA_RELEASES['releases']) > 1 ? 's' : '';

		// QA Releases
		echo "<span class='lihack'>\n";
		echo "Providing QA for the following <a href='/rc.php'>test release{$plural}</a>:<br> <br>\n";
		echo "</span>\n";
		echo "<table>\n";

		foreach ($QA_RELEASES['releases'] as $pversion => $info) {

			echo "<tr>\n";
			echo "<td colspan=\"" . (sizeof($QA_CHECKSUM_TYPES) + 1) . "\">\n";
			echo "<h3 style=\"margin: 0px;\">{$info['version']}</h3>\n";
			echo "</td>\n";
			echo "</tr>\n";

			foreach ($info['files'] as $file_type => $file_info) {
				echo "<tr>\n";
				echo "<td width=\"20%\"><a href=\"{$file_info['path']}\">php-{$info['version']}.tar.{$file_type}</a></td>\n";

				foreach ($QA_CHECKSUM_TYPES as $algo) {
					echo '<td>';
					echo '<strong>' . strtoupper($algo) . ':</strong> ';

					if (isset($file_info[$algo]) && strlen($file_info[$algo])) {
						echo $file_info[$algo];
					} else {
						echo '(<em><small>No checksum value available</small></em>)&nbsp;';
					}

					echo "</td>\n";
				}

				echo "</tr>\n";
			}
		}

		echo "</table>\n";
	} else {
		echo "<span class='lihack'>There are no QA releases available at the moment to test.</span>";
	}

	echo "<!-- END -->\n";
}
