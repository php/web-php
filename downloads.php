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
    ],
);

function option(string $value, string $desc, $attributes = []): string
{
    return '<option value="' . $value . '"' . implode(' ', array_keys(array_filter($attributes))) . '>' . $desc . '</option>';
}

$usage = [
    'web' => 'Web Development',
    'cli' => 'Command Line Libraries',
    'fw-drupal' => 'Drupal',
    'fw-laravel' => 'Laravel',
    'fw-symfony' => 'Symfony',
];

$os = [
    'linux' => [
        'name' => 'Linux',
        'variants' => [
            'linux-deb-buster' => 'Debian Buster',
            'linux-deb-bullseye' => 'Debian Bullseye',
            'linux-deb-bookworm' => 'Debian Bookworm',
            'linux-rpm-fedora41' => 'Fedora 41',
            'linux-rpm-fedora42' => 'Fedora 42',
            'linux-rpm-redhat' => 'RedHat',
        ],
    ],
    'osx' => [
        'name' => 'macOS',
        'variants' => [
            'osx-latest' => 'macOS Latest',
        ],
    ],
    'windows' => [
        'name' => 'Windows',
        'variants' => [
            'windows-wsl' => 'Windows with WSL',
            'windows-normal' => 'Windows without WSL',
        ],
    ],
];

$defaults = [
    'os' => 'linux',
    'version' => 'php84',
    'usage' => 'web',
];

$options = array_merge($defaults, $_GET);
if (!array_key_exists('osvariant', $options) || !array_key_exists($options['osvariant'], $os[$options['os']]['variants'])) {
    $options['osvariant'] = array_key_first($os[$options['os']]['variants']);
}
?>
<h1>Downloads &amp; Installation Instructions</h1>

    <form class="instructions-form" id="instructions-form">
    <div class="instructions-row">
        I want to use PHP for
        <select id="usage" name="usage">
            <?php foreach ($usage as $value => $description) { ?>
                <?= option($value, $description, [
                    'selected' => array_key_exists('usage', $options) && $options['usage'] === $value,
                ]); ?>
            <?php } ?>
        </select>.
    </div>

    <div class="instructions-row">
        I work with
        <select id="os" name="os">
            <?php foreach ($os as $value => $item) { ?>
                <?= option($value, $item['name'], [
                    'selected' => array_key_exists('os', $options) && $options['os'] === $value,
                ]); ?>
            <?php } ?>
        </select>

        <?php if (array_key_exists('os', $options) && array_key_exists('osvariant', $options)) { ?>
            <select id="osvariant" name="osvariant">
                <?php foreach ($os[$options['os']]['variants'] as $value => $description) { ?>
                    <?= option($value, $description, [
                        'selected' => $options['osvariant'] === $value,
                    ]); ?>
                <?php } ?>
            </select>
        <?php } ?>,
        and use
        <select id="version" name="version">
            <?= option('php84', 'version 8.4'); ?>
            <?= option('php83', 'version 8.3'); ?>
            <?= option('php82', 'version 8.2'); ?>
            <?= option('php81', 'version 8.1'); ?>
            <?= option('default', 'OS default version'); ?>
        </select>
    </div>

    <label for="multiversion" class="instructions-label">
        I want to be able to use multiple PHP versions:
        <input type="checkbox" id="multiversion" name="multiversion" value="Y"
            <?= array_key_exists('multiversion', $options) && $options['multiversion'] === 'Y' ? 'checked' : '' ?>/>
    </label>

    <label for="source" class="instructions-label">
        I want to compile everything from source:
        <input type="checkbox" id="source" name="source" value="Y"
            <?= array_key_exists('source', $options) && $options['source'] === 'Y' ? 'checked' : '' ?>/>
    </label>

    <noscript>
        <button type="submit" class="button">Update Instructions</button>
    </noscript>
</form>

<h2>Instructions</h2>
<div id="instructions" class="instructions">
<?php include 'downloads-get-instructions.php'; ?>
</div>

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

    <script>
        window.onload = function () {
            let form = document.getElementById("instructions-form")

            form.addEventListener('change', function () {
                form.submit();
            });
        }
    </script>

<?php
site_footer(['sidebar' => $SIDEBAR_DATA]);
