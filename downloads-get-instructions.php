<?php
$file = 'unknown';
$latestPhpVersion = '8.4';

if ($options['os'] === 'windows') {
	if ($options['osvariant'] === 'windows-wsl-debian') {
		$options['os'] = 'linux';
	    $options['osvariant'] = 'linux-debian';
	}
	if ($options['osvariant'] === 'windows-wsl-ubuntu') {
		$options['os'] = 'linux';
	    $options['osvariant'] = 'linux-ubuntu';
	}
}
if ($options['os'] === 'osx') {
    if ($options['version'] === 'default') {
		$options['version'] = $latestPhpVersion;
	}
}

if (in_array($options['usage'], ['fw-drupal', 'fw-laravel', 'fw-symfony', 'fw-wordpress'])) {
	$file = "{$options['usage']}";
	$options['os'] = null;
}

$multiversion = false;

if (array_key_exists('multiversion', $options)) {
	$multiversion = $options['multiversion'] === 'Y';
}

switch ($options['os']) {
	case 'linux':
		$defaultOrCommunity = ($options['version'] !== 'default' || $multiversion) ? 'community' : 'default';
		if ($defaultOrCommunity === 'community' && $options['version'] == 'default') {
			$options['version'] = $latestPhpVersion;
		}
		$file = "{$options['osvariant']}-{$options['usage']}-{$defaultOrCommunity}";
		break;
	case 'osx':
	case 'windows':
		$file = "{$options['osvariant']}";
		break;
}

$version = $options['version'];
$versionNoDot = str_replace('.', '', $version);

if (file_exists(__DIR__ . "/include/download-instructions/{$file}.php")) {
	include __DIR__ . "/include/download-instructions/{$file}.php";
	return true;
} else {
?>
<p>
There are no instructions yet. Try using the generic installation from source.
</p>
<?php
	return false;
}
?>
