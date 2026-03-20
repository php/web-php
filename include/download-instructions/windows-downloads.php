<?php
$baseDownloads  = 'https://downloads.php.net/~windows/releases/archives/';

$dataStr = @file_get_contents(__DIR__ . '/../../backend/win-releases.json');
$releases = $dataStr ? json_decode($dataStr, true) : null;

if (!is_array($releases)) {
	echo '<p>Windows release index is temporarily unavailable.</p>';
	return;
}

if (!isset($releases[$version]) || !is_array($releases[$version])) {
	echo '<p>No Windows builds found for PHP ' . htmlspecialchars($version ?? '') . '.</p>';
	return;
}

$verBlock = $releases[$version];
$fullVersion = isset($verBlock['version']) ? $verBlock['version'] : $version;

function ws_build_label(string $k, array $entry): string {
	$tool = 'VS';
	if (strpos($k, 'vs17') !== false) {
		$tool .= '17';
	} elseif (strpos($k, 'vs16') !== false) {
		$tool .= '16';
	} elseif (strpos($k, 'vc15') !== false) {
		$tool = 'VC15';
	}

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

echo <<<'HTML'
<strong>Architecture</strong>
<p>It is recommended to use x64 builds of PHP as almost all Windows installations currently support x64.</p>
<strong>Thread Safety</strong>
<p>NTS builds are for single-threaded use cases, typically PHP running via FastCGI or on the CLI. TS builds support multithreaded SAPIs and are intended for PHP loaded as a web server module. So, if you want to use PHP as FastCGI with IIS, use the Non-Thread Safe (NTS) builds of PHP, or if you want to use the Apache HTTP Server, use the Thread Safe (TS) builds of PHP.</p>
<strong>Visual Studio Versions</strong>
<p>The builds below are built using Visual Studio 2019 (VS16) or Visual Studio 2022 (VS17) compiler. They require the Visual C++ Redistributable for Visual Studio 2015-2022 <a href="https://aka.ms/vs/17/release/vc_redist.x64.exe">x64</a> or <a href="https://aka.ms/vs/17/release/vc_redist.x86.exe">x86</a> installed.</p>
HTML;

echo '<h3>PHP ' . htmlspecialchars($version) . ' (' . $fullVersion . ')</h3>';

if (!empty($verBlock['source']['path'])) {
	echo '<p><strong><a href="' . $baseDownloads . $verBlock['source']['path'] . '">Download source code</a></strong> <span class="size">' . ($verBlock['source']['size'] ?? '') . '</span></p>', PHP_EOL;
}
if (!empty($verBlock['test_pack']['path'])) {
	echo '<p><strong><a href="' . $baseDownloads . $verBlock['test_pack']['path'] . '">Download tests package (phpt)</a></strong> <span class="size">' . ($verBlock['test_pack']['size'] ?? '') . '</span></p>', PHP_EOL;
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
	if (!is_array($entry)) {
		continue;
	}
	if (in_array($k, ['version', 'source', 'test_pack'], true)) {
		continue;
	}

	$isNts = (strncmp($k, 'nts-', 4) === 0) || (strpos($k, 'nts') !== false);
	$arch = (strpos($k, 'x64') !== false) ? 'x64' : ((strpos($k, 'x86') !== false) ? 'x86' : '');
	$bucketKey = ($isNts ? 'nts' : 'ts') . '-' . ($arch !== '' ? $arch : 'other');

	if (!isset($buckets[$bucketKey])) {
		$bucketKey = 'other';
	}
	$buckets[$bucketKey][] = [$k, $entry];
}

foreach (['nts-x64', 'ts-x64', 'nts-x86', 'ts-x86'] as $bk) {
	foreach ($buckets[$bk] as [$k, $entry]) {
		$label = ws_build_label($k, $entry);
		if ($label === '') {
			continue;
		}

		echo PHP_EOL;
		echo '<div class="win-build" id="' . $k . '">', PHP_EOL;
		echo "\t", '<h4>' . $label . '</h4>', PHP_EOL;

		foreach(['zip', 'debug_pack', 'devel_pack'] as $type) {
			if (!empty($entry[$type]['path'])) {
				$p = $entry[$type]['path'];
				echo "\t", '<p><strong><a href="' . $baseDownloads . $p . '">' . $package_names[$type] . '</a></strong> <span class="size">' . $entry[$type]['size'] . '</span><br>', PHP_EOL;
				echo "\t", '<span class="sha256"><strong>sha256:</strong> ' . $entry[$type]['sha256'] ?? '' . '</span></p>', PHP_EOL;
			}
		}

		echo '</div>', PHP_EOL;
	}
}
?>
