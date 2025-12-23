<?php
$_SERVER['BASE_PAGE'] = 'eol.php';

include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/branches.inc';

// Notes for specific branches can be added here, and will appear in the table.
$BRANCH_NOTES = [
    '8.1' => '<a href="/migration82">A guide is available for migrating from PHP 8.1 to 8.2.</a>',
    '8.0' => '<a href="/migration81">A guide is available for migrating from PHP 8.0 to 8.1.</a>',
    '7.4' => '<a href="/migration80">A guide is available for migrating from PHP 7.4 to 8.0.</a>',
    '7.3' => '<a href="/migration74">A guide is available for migrating from PHP 7.3 to 7.4.</a>',
    '7.2' => '<a href="/migration73">A guide is available for migrating from PHP 7.2 to 7.3.</a>',
    '7.1' => '<a href="/migration72">A guide is available for migrating from PHP 7.1 to 7.2.</a>',
    '7.0' => '<a href="/migration71">A guide is available for migrating from PHP 7.0 to 7.1.</a>',
    '5.6' => '<a href="/migration70">A guide is available for migrating from PHP 5.6 to 7.0.</a>',
    '5.5' => '<a href="/migration56">A guide is available for migrating from PHP 5.5 to 5.6.</a>',
    '5.4' => '<a href="https://php-legacy-docs.zend.com/manual/php5/en/migration55">A guide is available for migrating from PHP 5.4 to 5.5.</a>',
    '5.3' => '<a href="https://php-legacy-docs.zend.com/manual/php5/en/migration54">A guide is available for migrating from PHP 5.3 to 5.4.</a>',
    '5.2' => '<a href="https://php-legacy-docs.zend.com/manual/php5/en/migration53">A guide is available for migrating from PHP 5.2 to 5.3.</a>',
    '5.1' => '<a href="https://php-legacy-docs.zend.com/manual/php5/en/migration52">A guide is available for migrating from PHP 5.1 to 5.2.</a>',
    '5.0' => '<a href="https://php-legacy-docs.zend.com/manual/php5/en/migration51">A guide is available for migrating from PHP 5.0 to 5.1.</a>',
    '4.4' => '<a href="https://php-legacy-docs.zend.com/manual/php5/en/migration5">A guide is available for migrating from PHP 4 to 5.0.</a>',
];

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
			<th>Date</th>
			<th>Last Release</th>
			<th>Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach (get_eol_branches() as $major => $branches): ?>
			<?php foreach ($branches as $branch => $detail): ?>
				<?php $eolDate = get_branch_security_eol_date($branch) ?>
				<?php $eolPeriod = format_interval($eolDate, new DateTime('now')) ?>
					<tr>
						<td><?php echo htmlspecialchars($branch); ?></td>
						<td>
							<?php echo $eolDate->format('j M Y') ?>
							<br/>
							<em>(<?php echo $eolPeriod ?>)</em>
						</td>
						<td>
							<a href="<?php echo htmlspecialchars($detail['link']); ?>">
								<?php echo htmlspecialchars($detail['version']); ?>
							</a>
						</td>
						<td>
							<?php echo $BRANCH_NOTES[$branch] ?? ''; ?>
					</td>
				</tr>
			<?php endforeach ?>
		<?php endforeach ?>
	</tbody>
</table>

<?php site_footer(); ?>
