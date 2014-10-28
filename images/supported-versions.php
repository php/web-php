<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/branches.inc';

// Sizing constants.
$margin_left = 80;
$margin_right = 50;
$header_height = 24;
$year_width = 120;
$branch_height = 30;
$footer_height = 24;

function branches_to_show() {
	// Basically: show all 5.3+ branches with EOL dates > min_date().
	$branches = array();

	// Flatten out the majors.
	foreach (get_all_branches() as $major => $major_branches) {
		foreach ($major_branches as $branch => $version) {
			if (version_compare($branch, '5.3', 'ge') && get_branch_security_eol_date($branch) > min_date()) {
				$branches[$branch] = $version;
			}
		}
	}

	ksort($branches);
	return $branches;
}

function min_date() {
	$now = new DateTime('January 1');
	return $now->sub(new DateInterval('P3Y'));
}

function max_date() {
	$now = new DateTime('January 1');
	return $now->add(new DateInterval('P5Y'));
}

function date_horiz_coord(DateTime $date) {
	$diff = $date->diff(min_date());
	if (!$diff->invert) {
		return $GLOBALS['margin_left'];
	}
	return $GLOBALS['margin_left'] + ($diff->days / (365.24 / $GLOBALS['year_width']));
}

$branches = branches_to_show();
$i = 0;
foreach ($branches as $branch => $version) {
	$branches[$branch]['top'] = $header_height + ($branch_height * $i++);
}

if (!isset($non_standalone)) {
	header('Content-Type: image/svg+xml');
	echo '<?xml version="1.0"?>';
}

$years = iterator_to_array(new DatePeriod(min_date(), new DateInterval('P1Y'), max_date()));
$width = $margin_left + $margin_right + ((count($years) - 1) * $year_width);
$height = $header_height + $footer_height + (count($branches) * $branch_height);
?>
<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 <?php echo $width ?> <?php echo $height ?>" width="<?php echo $width ?>" height="<?php echo $height ?>">
	<style type="text/css">
		<![CDATA[
			@import url(/fonts/Fira/fira.css);

			text {
				fill: #333;
				font-family: "Fira Sans", "Source Sans Pro", Helvetica, Arial, sans-serif;
				font-size: <?php echo (2 / 3) * $header_height; ?>px;
			}

			g.eol rect,
			.branches rect.eol {
				fill: #f33;
			}

			g.eol text {
				fill: white;
			}

			g.security rect,
			.branches rect.security {
				fill: #f93;
			}

			g.stable rect,
			.branches rect.stable {
				fill: #9c9;
			}

			.branch-labels text {
				alignment-baseline: central;
				text-anchor: middle;
			}

			.today line {
				stroke: #f33;
				stroke-dasharray: 7,7;
				stroke-width: 3px;
			}

			.today text {
				fill: #f33;
				text-anchor: middle;
			}

			.years line {
				stroke: black;
			}

			.years text {
				text-anchor: middle;
			}
		]]>
	</style>

	<!-- Branch labels -->
	<g class="branch-labels">
		<?php foreach ($branches as $branch => $version): ?>
			<g class="<?php echo get_branch_support_state($branch) ?>">
				<rect x="0" y="<?php echo $version['top'] ?>" width="<?php echo 0.5 * $margin_left ?>" height="<?php echo $branch_height ?>" />
				<text x="<?php echo 0.25 * $margin_left ?>" y="<?php echo $version['top'] + (0.5 * $branch_height) ?>">
					<?php echo htmlspecialchars($branch) ?>
				</text>
			</g>
		<?php endforeach ?>
	</g>

	<!-- Branch blocks -->
	<g class="branches">
		<?php foreach ($branches as $branch => $version): ?>
			<?php
			$x_release = date_horiz_coord(get_branch_release_date($branch));
			$x_bug = date_horiz_coord(get_branch_bug_eol_date($branch));
			$x_eol = date_horiz_coord(get_branch_security_eol_date($branch));
			?>
			<rect class="stable" x="<?php echo $x_release ?>" y="<?php echo $version['top'] ?>" width="<?php echo $x_bug - $x_release ?>" height="<?php echo $branch_height ?>" />
			<rect class="security" x="<?php echo $x_bug ?>" y="<?php echo $version['top'] ?>" width="<?php echo $x_eol - $x_bug ?>" height="<?php echo $branch_height ?>" />
		<?php endforeach ?>
	</g>

	<!-- Year lines -->
	<g class="years">
		<?php foreach ($years as $date): ?>
			<line x1="<?php echo date_horiz_coord($date) ?>" y1="<?php echo $header_height ?>" x2="<?php echo date_horiz_coord($date) ?>" y2="<?php echo $header_height + (count($branches) * $branch_height) ?>" />
			<text x="<?php echo date_horiz_coord($date) ?>" y="<?php echo 0.8 * $header_height; ?>">
				<?php echo $date->format('j M Y') ?>
			</text>
		<?php endforeach ?>
	</g>

	<!-- Today -->
	<g class="today">
		<?php
		$now = new DateTime;
		$x = date_horiz_coord($now);
		?>
		<line x1="<?php echo $x ?>" y1="<?php echo $header_height ?>" x2="<?php echo $x ?>" y2="<?php echo $header_height + (count($branches) * $branch_height) ?>" />
		<text x="<?php echo $x ?>" y="<?php echo $header_height + (count($branches) * $branch_height) + (0.8 * $footer_height) ?>">
			<?php echo 'Today: '.$now->format('j M Y') ?>
		</text>
	</g>
</svg>
