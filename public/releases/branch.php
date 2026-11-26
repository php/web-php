<?php

$_SERVER['BASE_PAGE'] = 'releases/branch.php';

require_once __DIR__ . '/../../include/prepend.inc';
require_once __DIR__ . '/../../include/branches.inc';

$branch = $_GET['version'] ?? '';
if ($branch === '') {
    header('Location: /supported-versions.php');
    exit;
}

$branches = get_all_branches();
if (!is_string($branch)
    || !preg_match('/\A([0-9]+)\.[0-9]+\z/', $branch, $matches)
    || !isset($branches[$matches[1]][$branch])
) {
    http_response_code(404);
    site_header('PHP Release Branch Not Found');
    ?>
    <h1>PHP Release Branch Not Found</h1>
    <p>See the <a href="/supported-versions.php">supported versions</a> for available branches.</p>
    <?php
    site_footer();
    return;
}

$release = $branches[$matches[1]][$branch];
$state = get_branch_support_state($branch);
$status = match ($state) {
    'stable' => 'Active support',
    'security' => 'Security fixes only',
    'eol' => 'End of life',
    'future' => 'Upcoming',
    default => 'Unknown',
};
$latest = $release['version'];
$dates = ['Initial release' => get_branch_release_date($branch)];
if (version_compare($branch, '5.3', '>=')) {
    $dates['Active support ends'] = get_branch_bug_eol_date($branch);
    $dates['Security support ends'] = get_branch_security_eol_date($branch);
} else {
    // The historical data records the final release as the end of life.
    $dates['End of life'] = get_branch_security_eol_date($branch);
    if ($state === null && $dates['End of life'] !== null) {
        $status = 'End of life';
    }
}

site_header("PHP $branch Release");
?>

<h1>PHP <?= htmlspecialchars($branch) ?> Release</h1>

<dl>
    <dt>Support status</dt>
    <dd><?= htmlspecialchars($status) ?></dd>
    <dt>Latest release</dt>
    <dd><?= htmlspecialchars($latest) ?></dd>
    <?php foreach ($dates as $label => $date): ?>
        <dt><?= htmlspecialchars($label) ?></dt>
        <dd>
            <?php if ($date !== null): ?>
                <time datetime="<?= $date->format('Y-m-d') ?>"><?= $date->format('j M Y') ?></time>
            <?php else: ?>
                Unknown
            <?php endif; ?>
        </dd>
    <?php endforeach; ?>
</dl>

<ul>
    <?php if ($status === 'End of life'): ?>
        <li><a href="/releases/">Old source archives</a></li>
    <?php elseif ($state === 'stable' || $state === 'security'): ?>
        <li><a href="/downloads.php?version=<?= rawurlencode($branch) ?>">Download PHP <?= htmlspecialchars($branch) ?></a></li>
    <?php endif; ?>
    <?php if (is_file(__DIR__ . "/$branch/index.php")): ?>
        <li><a href="/releases/<?= rawurlencode($branch) ?>/">What's new in PHP <?= htmlspecialchars($branch) ?></a></li>
    <?php endif; ?>
    <li><a href="/supported-versions.php">Supported versions</a></li>
</ul>

<?php site_footer(); ?>
