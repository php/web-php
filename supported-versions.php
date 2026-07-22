<?php
$_SERVER['BASE_PAGE'] = 'supported-versions.php';

include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/branches.inc';

site_header('Supported Versions', ['css' => ['supported-versions.css']]);

// Version notes: if you need to make a note about a version having an unusual
// support lifetime, add it under a heading with an anchor, and add the anchor
// and branch names to the array below ('x.y' => '#anchor-name').
$VERSION_NOTES = [
	'8.5' => 'https://www.php.net/manual/migration85.php',
	'8.4' => 'https://www.php.net/manual/migration84.php',
	'8.3' => 'https://www.php.net/manual/migration83.php',
	'8.2' => 'https://www.php.net/manual/migration82.php',
];
?>

<h1>Supported Versions</h1>

<p>
	Each release branch of PHP is fully supported for two years from its initial
	stable release. During this period, bugs and security issues that have been
	reported are fixed and are released in regular point releases.
</p>

<p>
	After this two year period of active support, each branch is then supported
	for two additional years for critical security issues only. Releases during
	this period are made on an as-needed basis: there may be multiple point
	releases, or none, depending on the number of reports.
</p>

<p>
	Once the four years of support are completed, the branch reaches its end of
	life and is no longer supported. <a href="/eol.php">A table of end of life
	branches is available.</a>
</p>

<h3>Currently Supported Versions</h3>

<table class="standard">
	<thead>
		<tr>
			<th>Branch</th>
			<th colspan="2">Initial Release</th>
			<th colspan="2">Active Support Until</th>
			<th colspan="2">Security Support Until</th>
			<th colspan="2">Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach (get_active_branches(false) as $major => $releases): ?>
			<?php ksort($releases) ?>
			<?php foreach ($releases as $branch => $release): ?>
				<?php
                $state = get_branch_support_state($branch);
                $initial = get_branch_release_date($branch);
                $until = get_branch_bug_eol_date($branch);
                $eol = get_branch_security_eol_date($branch);
                $now = new DateTime('now');
                ?>
				<tr class="<?php echo $state ?>">
					<td>
						<a href="/downloads.php?version=<?php echo htmlspecialchars($branch) ?>"><?php echo htmlspecialchars($branch) ?></a>
					</td>
					<td><?php echo htmlspecialchars($initial->format('j M Y')) ?></td>
					<td class="collapse-phone"><em><?php echo htmlspecialchars(format_interval($initial, $now)) ?></em></td>
					<td><?php echo htmlspecialchars($until->format('j M Y')) ?></td>
					<td class="collapse-phone"><em><?php echo htmlspecialchars(format_interval($until, $now)) ?></em></td>
					<td><?php echo htmlspecialchars($eol->format('j M Y')) ?></td>
					<td class="collapse-phone"><em><?php echo htmlspecialchars(format_interval($eol, $now)) ?></em></td>
					<td>
						<?php if (isset($VERSION_NOTES[$branch])): ?>
							<a href="<?php echo htmlspecialchars($VERSION_NOTES[$branch]) ?>">
								Migration guide for PHP <?php echo htmlspecialchars($branch) ?>
							</a>
						<?php else: ?>
							 —
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach ?>
		<?php endforeach ?>
	</tbody>
</table>

<p>
	Or, visualised as a calendar:
</p>

<?php
/* Chrome doesn't handle @font-face directives in SVG files included via <img>
 * tags (which is odd, since it does handle them when you view the SVG files by
 * themselves). Instead, we'll just pull the SVG into the page inline, thereby
 * ensuring that we have the same text formatting as the rest of the page. */

$non_standalone = true;
include __DIR__ . '/images/supported-versions.php';
?>

<h4>Key</h4>

<table class="standard">
	<tr class="stable">
		<td>Active support</td>
		<td>
			A release that is being actively supported. Reported bugs and security
			issues are fixed and regular point releases are made.
		</td>
	</tr>
	<tr class="security">
		<td>Security fixes only</td>
		<td>
			A release that is supported for critical security issues only. Releases
			are only made on an as-needed basis.
		</td>
	</tr>
	<tr class="eol">
		<td>End of life</td>
		<td>
			A release that is no longer supported. Users of this release should
			upgrade as soon as possible, as they may be exposed to unpatched security
			vulnerabilities.
		</td>
	</tr>
</table>

<?php site_footer(); ?>
