<?php
if ($options['os'] === 'windows' && $options['osvariant'] === 'windows-wsl') {
    $options['os'] = 'linux';
    $options['osvariant'] = 'linux-deb-bookworm';
    $options['multiversion'] = 'true';
}
if ($options['os'] === 'osx') {
    $version = match($options['version']) {
        'php84' => '@8.4',
        'php83' => '@8.3',
        'php82' => '@8.2',
        'php81' => '@8.1',
        default => ''
    };

    $versionDir = match($options['version']) {
        'php84' => '8.4',
        'php83' => '8.3',
        'php82' => '8.2',
        'php81' => '8.1',
        default => '8.4'
    };

    echo <<<ENDOSX
<p>
    On the OSX command line shell, enter:
</p>
<div class="phpcode"><pre>
brew install php{$version}
</pre></div>
<p>
To enable PHP in Apache add the following to httpd.conf and restart Apache:
</p>
<div class="phpcode"><pre>
LoadModule php_module \$HOMEBREW_PREFIX/opt/php/lib/httpd/modules/libphp.so

&lt;FilesMatch \.php$>
SetHandler application/x-httpd-php
&lt;/FilesMatch>
</pre></div>
<p>
Finally, check DirectoryIndex includes index.php
</p>
<div class="phpcode"><pre>
DirectoryIndex index.php index.html
</pre></div>
<p>
The php.ini and php-fpm.ini file can be found in:
</p>
<div class="phpcode"><pre>
\$HOMEBREW_PREFIX/etc/php/{$versionDir}/
</pre></div>
</p>
ENDOSX;
    return;
}
?>
<?php
if ($options['os'] === 'linux' && str_starts_with($options['osvariant'], 'linux-deb')) {
    if ($options['version'] === 'default' && $options['multiversion'] != 'true') {
    echo <<<ENDAPT
<p>
    On the command line shell, enter:
</p>
<div class="phpcode"><pre>
sudo apt-get update
sudo apt-get install php
</pre></div>
ENDAPT;
    } else {
        $version = match($options['version']) {
            'php84' => '8.4',
            'php83' => '8.3',
            'php82' => '8.2',
            'php81' => '8.1',
            default => '8.4'
        };
        echo <<<ENDAPT
<p>
    On the command line shell, enter:
</p>
<div class="phpcode"><pre>
sudo apt -y install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php{$version}
</pre></div>
ENDAPT;
    }
    return;
}
?>
<p>
There are no instructions yet.
</p>

<?php var_dump($options); ?>
