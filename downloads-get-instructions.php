<?php
$file = 'unknown';
$latestPhpVersion = '8.5';

if (!isset($options)) {
    $options = [
        'os' => '',
        'usage' => '',
        'version' => '',
    ];
}

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
if ($options['os'] === 'osx' || $options['os'] === 'windows') {
    if ($options['version'] === 'default') {
        $options['version'] = $latestPhpVersion;
    }
}

if (in_array($options['usage'], ['fw-drupal', 'fw-laravel', 'fw-symfony', 'fw-wordpress', 'fw-joomla'])) {
    $file = "{$options['usage']}";
    $options['os'] = null;
}

$multiversion = false;

if (array_key_exists('multiversion', $options)) {
    $multiversion = $options['multiversion'] === 'Y';
}

$source = false;

if (array_key_exists('source', $options)) {
    if ($options['source'] === 'Y') {
        $source = $options['source'] === 'Y';
    }
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
        if($options['osvariant'] === "{$options['os']}-docker") {
            $file = "{$options['osvariant']}-{$options['usage']}";
        } elseif($options['osvariant'] === "{$options['os']}-scoop") {
            $file = "{$options['osvariant']}-" . ($options['version'] == $latestPhpVersion ? 'main' : 'versions');
        } else {
            $file = "{$options['osvariant']}";
        }
        break;
}

if ($source) {
    $file = "{$options['os']}-source";
}

$version = $options['version'];
$versionNoDot = str_replace('.', '', $version);

if (file_exists(__DIR__ . "/include/download-instructions/{$file}.php")) {
    include __DIR__ . "/include/download-instructions/{$file}.php";
    if ($source) {
        return false;
    }
    return true;
} else {
?>
<p>
    There are no instructions yet. Try using the <a href="https://www.php.net/manual/en/install.php">generic installation from source</a>.
</p>
<?php
    return false;
}
?>
