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

<p class="panel"><a href="downloads.php?source=Y">Source Tarballs</a></p>
<p class="panel"><a href="download-docs.php">Documentation Download</a></p>
<p class="panel"><a href="download-logos.php">PHP Logos</a></p>

<p class="panel"><a href="/pre-release-builds.php">Pre-Release Builds</a></p>
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
        "css" => [
            "prism.css",
            "code-syntax.css",
        ],
        "js_files" => [
            "js/ext/prism.js",
        ],
    ],
);

function option(string $value, string $desc, $attributes = []): string
{
    return '<option value="' . $value . '"' . implode(' ', array_keys(array_filter($attributes))) . '>' . $desc . '</option>';
}

$usage = [
    'web' => 'Web Development',
    'cli' => 'CLI/Library Development',
    'fw-drupal' => 'Drupal Development',
    'fw-joomla' => 'Joomla Development',
    'fw-laravel' => 'Laravel Development',
    'fw-symfony' => 'Symfony Development',
    'fw-wordpress' => 'WordPress Development',
];

$os = [
    'linux' => [
        'name' => 'Linux',
        'variants' => [
            'linux-debian' => 'Debian',
            'linux-fedora' => 'Fedora',
            'linux-redhat' => 'RedHat',
            'linux-ubuntu' => 'Ubuntu',
            'linux-docker' => 'Docker',
        ],
    ],
    'osx' => [
        'name' => 'macOS',
        'variants' => [
            'osx-homebrew' => 'Homebrew',
            'osx-homebrew-php' => 'Homebrew-PHP',
            'osx-docker' => 'Docker',
            'osx-macports' => 'MacPorts',
        ],
    ],
    'windows' => [
        'name' => 'Windows',
        'variants' => [
            'windows-downloads' => 'ZIP Downloads',
            'windows-native' => 'Single Line Installer',
            'windows-chocolatey' => 'Chocolatey',
            'windows-scoop' => 'Scoop',
            'windows-winget' => 'Winget',
            'windows-docker' => 'Docker',
            'windows-wsl-debian' => 'WSL/Debian',
            'windows-wsl-ubuntu' => 'WSL/Ubuntu',
        ],
    ],
];

$versions = [
    '8.5' => 'version 8.5',
    '8.4' => 'version 8.4',
    '8.3' => 'version 8.3',
    '8.2' => 'version 8.2',
    'default' => 'OS default version',
];


$platform = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ?? '';
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$auto_os = null;
$auto_osvariant = null;

if (!empty($platform) || !empty($ua)) {
    $platform = strtolower(trim($platform, '"'));
    if ($platform === 'windows' || stripos($ua, 'Windows') !== false) {
        $auto_os = 'windows';
    } elseif ($platform === 'macos' || stripos($ua, 'Mac') !== false) {
        $auto_os = 'osx';
    } elseif ($platform === 'linux' || stripos($ua, 'Linux') !== false) {
        $auto_os = 'linux';
        if (stripos($ua, 'Ubuntu') !== false) {
            $auto_osvariant = 'linux-ubuntu';
        } elseif (stripos($ua, 'Debian') !== false) {
            $auto_osvariant = 'linux-debian';
        } elseif (stripos($ua, 'Fedora') !== false) {
            $auto_osvariant = 'linux-fedora';
        } elseif (stripos($ua, 'Red Hat') !== false || stripos($ua, 'RedHat') !== false) {
            $auto_osvariant = 'linux-redhat';
        }
    }
}

$defaults = [
    'os' => $auto_os ?? 'linux',
    'version' => 'default',
    'usage' => 'web',
];

$options = array_merge($defaults, $_GET);

if ($auto_osvariant && (!array_key_exists('osvariant', $options) || !array_key_exists($options['osvariant'], $os[$options['os']]['variants']))) {
    $options['osvariant'] = $auto_osvariant;
} elseif (!array_key_exists('osvariant', $options) || !array_key_exists($options['osvariant'], $os[$options['os']]['variants'])) {
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
            <?php foreach ($versions as $value => $version) { ?>
                <?= option($value, $version, [
                    'selected' => array_key_exists('version', $options) && $options['version'] === $value,
                ]); ?>
            <?php } ?>
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

        <button type="submit" class="button">Update Instructions</button>
</form>

<div class="tip">
    <p>
        Did you find a mistake? Didn't find what you were looking for?
        Please <a href='https://github.com/php/web-php/issues/new?template=download-page.yml'>submit an issue</a>.
    </p>
</div>

<h2>Instructions</h2>
<div id="instructions" class="instructions">
<?php $instructionsShown = include 'downloads-get-instructions.php'; ?>
<?php if (!$instructionsShown): ?>

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

<?php endif; ?>
</div>

    <script>
        let currentController = null;

        function loadInstructions(url) {
            const form = document.querySelector('#instructions-form')
            const instructions = document.getElementById('instructions')

            if (currentController) {
                currentController.abort()
            }
            currentController = new AbortController()

            fetch(url, {signal: currentController.signal})
                .then(response => {
                    if (!response.ok) {
                        instructions.innerHTML = `<p class="error">Error ${response.status}: Unable to load data.</p>`
                        throw new Error(`HTTP ${response.status} ${response.statusText}`)
                    }
                    return response.text()
                })
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html')

                    const newForm = doc.querySelector('#instructions-form')
                    const newInstructions = doc.querySelector('#instructions')

                    if (newForm && form) form.innerHTML = newForm.innerHTML
                    if (newInstructions && instructions) instructions.innerHTML = newInstructions.innerHTML

                    removeUpdateInstructionsButton()

                    if (window.Prism && typeof Prism.highlightAll === 'function') {
                        Prism.highlightAll()
                    }
                })
                .catch(err => {
                    if (err.name === 'AbortError') return;
                    console.error('Request failed:', err)
                    if (!instructions.querySelector('.error')) {
                        instructions.innerHTML = `<p class="error">An unexpected error occurred.</p>`
                    }
                });
        }

        function removeUpdateInstructionsButton() {
            const btn = document.querySelector('#instructions-form button[type="submit"]')
            if (btn && window.fetch && window.AbortController) {
                btn.remove()
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            removeUpdateInstructionsButton()
        })

        document.addEventListener('change', function (e) {
            if (e.target.closest('#instructions-form')) {
                const form = e.target.closest('#instructions-form')
                const params = new URLSearchParams(new FormData(form)).toString()
                const newUrl = form.action.split('?')[0] + '?' + params

                history.pushState({url: newUrl}, '', newUrl)
                loadInstructions(newUrl)
            }
        })

        window.addEventListener('popstate', function (e) {
            if (e.state && e.state.url) {
                loadInstructions(e.state.url)
            }
        })
    </script>

<?php
site_footer(['sidebar' => $SIDEBAR_DATA]);
