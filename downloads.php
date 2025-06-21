<?php
$_SERVER['BASE_PAGE'] = 'downloads.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/gpg-keys.inc';
include_once __DIR__ . '/include/version.inc';

// Try to make this page non-cached
header_nocache();

$SIDEBAR_DATA = '
<div class="panel">
  <a href="/supported-versions.php">Supported Versions</a>
  <div class="body">
    Check the <a href="/supported-versions.php">supported versions</a> page for
    more information on the support lifetime of each version of PHP.
  </div>
</div>

<p class="panel"><a href="download-docs.php">Documentation Download</a></p>
<p class="panel"><a href="download-logos.php">PHP Logos</a></p>

<p class="panel"><a href="/release-candidates.php">Release Candidates</a></p>
<p class="panel"><a href="/git.php">Development Sources (git)</a></p>
<p class="panel"><a href="/releases/">Old Archives</a></p>
';

site_header("Downloads",
    [
        'link' => [
            [
                "rel" => "alternate",
                "type" => "application/atom+xml",
                "href" => $MYSITE . "releases/feed.php",
                "title" => "PHP Release feed",
            ],
        ],
        "current" => "downloads",
        "js_files" => [
            "/js/version-choice.js",
        ],
    ],
);

function option(string $id, string $value, string $desc)
{
    $selected = '';
	if (array_key_exists($id, $_GET) && $_GET[$id] === $value) {
        $selected = ' selected';
    }

	echo <<<ENDOPT
	<option value="{$value}"{$selected}>{$desc}</option>

ENDOPT;
}
?>
<h1>Downloads &amp; Installation Instructions</h1>

<form>
Get PHP for
<select id="os" name="os">
    <?= option('os', 'linux', 'Linux'); ?>
    <?= option('os', 'osx', 'OSX'); ?>
    <?= option('os', 'windows', 'Windows'); ?>
</select>

<select id="osvariant" name="osvariant">
	<?= option('osvariant', 'linux-deb-buster', 'Debian Buster'); ?>
	<?= option('osvariant', 'linux-deb-bullseye', 'Debian Bullseye'); ?>
	<?= option('osvariant', 'linux-deb-bookworm', 'Debian Bookworm'); ?>
	<?= option('osvariant', 'linux-rpm-fedora41', 'Fedora 41'); ?>
	<?= option('osvariant', 'linux-rpm-fedora42', 'Fedora 42'); ?>
	<?= option('osvariant', 'linux-rpm-redhat', 'RedHat'); ?>
	<?= option('osvariant', 'osx-latest', 'Latest'); ?>
	<?= option('osvariant', 'windows-wsl', 'with WSL'); ?>
	<?= option('osvariant', 'windows-normal', 'without WSL'); ?>
</select>

to work on
<select id="usage" name="usage">
	<?= option('usage', 'web', 'Web Development'); ?>
	<?= option('usage', 'cli', 'Command Line Libraries'); ?>
	<?= option('usage', 'fw-drupal', 'Drupal'); ?>
	<?= option('usage', 'fw-laravel', 'Laravel'); ?>
	<?= option('usage', 'fw-symfony', 'Symfony'); ?>
</select>

with
<select id="version" name="version">
	<?= option('version', 'php84', 'version 8.4'); ?>
	<?= option('version', 'php83', 'version 8.3'); ?>
	<?= option('version', 'php82', 'version 8.2'); ?>
	<?= option('version', 'php81', 'version 8.1'); ?>
	<?= option('version', 'default', 'OS default version'); ?>
</select>

<input type='submit' value="Go!"></input>

<br/>

I want to have multiple versions at the same time:
<input type="checkbox" id="multiversion" name="multiversion" label="I want to have multiple versions at the same time">
</input>
</form>

<h2>Instructions</h2>
<div id="instructions">
<?php include 'downloads-get-instructions.php'; ?>
</div>

<!--
<p>
    <a href="/manual/install.general.php">Installing PHP</a> is covered
    thoroughly in the PHP documentation.
</p>
-->

<h2>Binaries</h2>

<p>
    <a href="https://windows.php.net/download/">Binaries are available for
    Microsoft Windows</a>. The PHP project does not currently release binary packages
    for other platforms such as Linux or macOS, but they are packaged by distributions
    and other providers. For more information, see:

    <ul>
        <li>
            <a href="/manual/install.unix.php">Installation instructions for Unix systems</a>
        </li>
        <li>
            <a href="/manual/install.macosx.php">Installation instructions for macOS</a>
        </li>
    </ul>
</p>

<h2>Source Code</h2>
<?php show_source_releases(); ?>

<hr>
<h2>GPG Keys</h2>
<p>
The releases are tagged and signed in the <a href='git.php'>PHP Git Repository</a>.
The following official GnuPG keys of the current PHP Release Manager can be used
to verify the tags:
</p>

<?php gpg_key_show_keys(true /* activeOnly */); ?>

<p>
  <a href="gpg-keys.php">
    A full list of GPG keys used for current and older releases is also
    available.
  </a>
</p>

<?php
site_footer(['sidebar' => $SIDEBAR_DATA]);
