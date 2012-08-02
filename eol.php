<?php
$_SERVER['BASE_PAGE'] = 'eol.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/branches.inc';

// Notes for specific branches can be added here, and will appear in the table.
$BRANCH_NOTES = array(
	'4.4' => 'Has known remote code execution vulnerabilities.',
);

site_header('Unsupported Branches');
?>

<h1>Unsupported Branches</h1>

<p>
	This page lists the end of life date for each unsupported branch of PHP. If
	you are using these releases, you are strongly urged to upgrade to
	<a href="/downloads">a current version</a>, as using older versions may
	expose you to security vulnerabilities and bugs that have been fixed in
	more recent versions of PHP.
</p>

<table class="standard">
	<thead>
		<tr>
			<th>Branch</th>
			<th colspan="2">Date</th>
			<th>Last Release</th>
			<th>Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach (get_eol_branches() as $major => $branches): ?>
			<?php foreach ($branches as $branch => $detail): ?>
				<tr>
					<td><?php echo htmlspecialchars($branch); ?></td>
					<td>
						<?php echo date('j M Y', $detail['date']); ?>
					</td>
					<td>
						<?php echo number_format($ago = floor((time() - $detail['date']) / 86400)); ?>
						day<?php echo ($ago != 1 ? 's' : ''); ?> ago
					</td>
					<td>
						<a href="/releases/#<?php echo htmlspecialchars($detail['version']); ?>">
							<?php echo htmlspecialchars($detail['version']); ?>
						</a>
					</td>
					<td>
						<?php echo isset($BRANCH_NOTES[$branch]) ? $BRANCH_NOTES[$branch] : ''; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</tbody>
</table>

<?php site_footer(); ?>
