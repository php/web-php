<?php
$_SERVER['BASE_PAGE'] = 'eol.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/branches.inc';

// Notes for specific branches can be added here, and will appear in the table.
$BRANCH_NOTES = array(
	'5.5' => '<a href="/migration56">A guide is available for migrating from PHP 5.5 to 5.6.</a>',
	'5.4' => '<a href="/migration55">A guide is available for migrating from PHP 5.4 to 5.5.</a>',
	'5.3' => '<a href="/migration54">A guide is available for migrating from PHP 5.3 to 5.4.</a>',
	'5.2' => '<a href="/migration53">A guide is available for migrating from PHP 5.2 to 5.3.</a>',
	'5.1' => '<a href="/migration52">A guide is available for migrating from PHP 5.1 to 5.2.</a>',
	'5.0' => '<a href="/migration51">A guide is available for migrating from PHP 5.0 to 5.1.</a>',
	'4.4' => '<a href="/migration5">A guide is available for migrating from PHP 4 to PHP 5.0.</a><br>The end of life for PHP 4.4 also marks the end of life for PHP 4 as a whole.',
);

site_header('Unsupported Branches');
?>

<h1>Unsupported Branches</h1>

<p>
	This page lists the end of life date for each unsupported branch of PHP. If
	you are using these releases, you are strongly urged to upgrade to
	<a href="/supported-versions">a current version</a>, as using older versions
	may expose you to security vulnerabilities and bugs that have been fixed in
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
				<?php $eolDate = get_branch_security_eol_date($branch) ?>
				<?php $eolPeriod = format_interval($eolDate, null) ?>
					<tr>
						<td><?php echo htmlspecialchars($branch); ?></td>
						<td>
							<?php echo $eolDate->format('j M Y') ?>
						</td>
						<td>
							<em><?php echo $eolPeriod ?></em>
						</td>
						<td>
							<a href="<?php echo htmlspecialchars($detail['link']); ?>">
								<?php echo htmlspecialchars($detail['version']); ?>
							</a>
						</td>
						<td>
							<?php echo isset($BRANCH_NOTES[$branch]) ? $BRANCH_NOTES[$branch] : ''; ?>
					</td>
				</tr>
			<?php endforeach ?>
		<?php endforeach ?>
	</tbody>
</table>

<?php site_footer(); ?>
