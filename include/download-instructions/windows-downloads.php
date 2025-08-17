<?php
$cacheFile = (sys_get_temp_dir() ?? __DIR__) . '/releases.json';
$releasesUrl = 'https://downloads.php.net/~windows/releases/releases.json';
$fallbackReleasesUrl = 'https://downloads.internal.php.net/~windows/releases/releases.json';
$maxAge = 3600;

$needFetch = true;
if (file_exists($cacheFile)) {
	$mtime = @filemtime($cacheFile) ?: 0;
	if (time() - $mtime < $maxAge) {
		$needFetch = false;
	}
}

if ($needFetch) {
	$context = stream_context_create([
		'http' => [
			'header' => "User-Agent: web-php/1.1",
            'timeout' => 5,
		],
        'ssl' => [
            'allow_self_signed' => true,
            'verify_peer_name' => false,
        ],
	]);
	$json = @file_get_contents($releasesUrl, false, $context);
	if ($json === false || $json === null) {
		$json = @file_get_contents($fallbackReleasesUrl, false, $context);
	}
	if ($json !== false && $json !== null) {
		$tmp = $cacheFile . '.tmp';
		if (@file_put_contents($tmp, $json) !== false) {
			@rename($tmp, $cacheFile);
		}
	}
}

$dataStr = @file_get_contents($cacheFile);
$releases = $dataStr ? json_decode($dataStr ?? $json, true) : null;

if (!is_array($releases)) {
	echo '<p>Windows release index is temporarily unavailable.</p>';
    if (file_exists($cacheFile)) {
        @unlink($cacheFile);
    }
	return;
}

if (!isset($releases[$version]) || !is_array($releases[$version])) {
	echo '<p>No Windows builds found for PHP ' . htmlspecialchars($version) . '.</p>';
	return;
}

$verBlock = $releases[$version];
$fullVersion = isset($verBlock['version']) ? $verBlock['version'] : $version;

$baseDownloads  = 'https://downloads.php.net/~windows/releases/';

function ws_build_label(string $k, array $entry): string {
	$tool = 'VS';
	if (strpos($k, 'vs17') !== false) { $tool .= '17'; }
	elseif (strpos($k, 'vs16') !== false) { $tool .= '16'; }
	elseif (strpos($k, 'vc15') !== false) { $tool = 'VC15'; }

	$arch = (strpos($k, 'x64') !== false) ? 'x64' : ((strpos($k, 'x86') !== false) ? 'x86' : '');
	$ts = (strpos($k, 'nts') !== false) ? 'Non Thread Safe' : 'Thread Safe';
	if (strncmp($k, 'nts-', 4) === 0) {
		$ts = 'Non Thread Safe';
	} elseif (strncmp($k, 'ts-', 3) === 0) {
		$ts = 'Thread Safe';
	}

	$mtime = isset($entry['mtime']) ? strtotime($entry['mtime']) : 0;
	$mt = $mtime ? gmdate('Y-M-d H:i:s', $mtime) : '';
	return trim(($tool ? $tool . ' ' : '') . ($arch ? $arch . ' ' : '') . $ts . ($mt ? ' <span class="time">' . $mt . ' UTC</span>' : ''));
}

echo '<h3>PHP ' . htmlspecialchars($version) . ' (' . $fullVersion . ')</h3>';

if (!empty($verBlock['source']['path'])) {
	echo '<p><strong><a href="' . $baseDownloads . $verBlock['source']['path'] . '">Download source code</a></strong> <span class="size">' . $verBlock['source']['size'] ?? '' . '</span></p>';
}
if (!empty($verBlock['test_pack']['path'])) {
	echo '<p><strong><a href="' . $baseDownloads . $verBlock['test_pack']['path'] . '">Download tests package (phpt)</a></strong> <span class="size">' . $verBlock['test_pack']['size'] ?? '' . '</span></p>';
}

$buckets = [
	'nts-x64' => [],
	'ts-x64'  => [],
	'nts-x86' => [],
	'ts-x86'  => [],
];

$package_names = [
    'zip' => 'Zip',
    'debug_pack' => 'Debug Pack',
    'devel_pack' => 'Development package (SDK to develop PHP extensions)',
];

foreach ($verBlock as $k => $entry) {
	if (!is_array($entry)) { continue; }
	if (in_array($k, ['version', 'source', 'test_pack'], true)) { continue; }

	$isNts = (strncmp($k, 'nts-', 4) === 0) || (strpos($k, 'nts') !== false);
	$arch = (strpos($k, 'x64') !== false) ? 'x64' : ((strpos($k, 'x86') !== false) ? 'x86' : '');
	$bucketKey = ($isNts ? 'nts' : 'ts') . '-' . ($arch !== '' ? $arch : 'other');
	if (!isset($buckets[$bucketKey])) { $bucketKey = 'other'; }
	$buckets[$bucketKey][] = [$k, $entry];
}

foreach (['nts-x64', 'ts-x64', 'nts-x86', 'ts-x86'] as $bk) {
	foreach ($buckets[$bk] as [$k, $entry]) {
		$label = ws_build_label($k, $entry);
		if ($label === '') { continue; }

		echo '<div class="win-build">';
		echo '<h4>' . $label . '</h4>';

		foreach(['zip', 'debug_pack', 'devel_pack'] as $type) {
			if (!empty($entry[$type]['path'])) {
				$p = $entry[$type]['path'];
				echo '<p><strong><a href="' . $baseDownloads . $p . '">' . $package_names[$type] . '</a></strong> <span class="size">' . $entry[$type]['size'] . '</span><br>';
				echo '<span class="sha256"><strong>sha256:</strong> ' . $entry[$type]['sha256'] ?? '' . '</span></p>';
			}
		}

		echo '</div>';
	}
}

?>
