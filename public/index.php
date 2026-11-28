<?php

use phpweb\Homepage\PackagistStats;

(function ($uri): void {
    // Special redirect cases not able to be captured in error.php
    $shortcuts = [
        '/?:' => '/language.operators.comparison#language.operators.comparison.ternary',
        '/??' => '/language.operators.comparison#language.operators.comparison.coalesce',
        '/??=' => '/language.operators.assignment#language.operators.assignment.other',
    ];
    if (isset($shortcuts[$uri])) {
        header("Location: {$shortcuts[$uri]}");
        exit;
    }
})($_SERVER['REQUEST_URI'] ?? '');

// Get the modification date of this PHP file
$timestamps = [(int) @getlastmod()];

/*
   The date of prepend.inc represents the age of ALL included files. Please
   touch it if you modify any other include file (and the modification affects
   the display of the index page). The cost of stat'ing them all is prohibitive.
*/
$timestamps[] = (int) @filemtime(__DIR__ . "/../include/prepend.inc");

// These are the only dynamic parts of the frontpage
$timestamps[] = (int) @filemtime(__DIR__ . "/../include/version.inc");
$timestamps[] = (int) @filemtime(__DIR__ . "/include/pregen-news.inc");
$timestamps[] = (int) @filemtime(__DIR__ . "/backend/packagist-stats.json");
$timestamps[] = (int) @filemtime(__DIR__ . "/styles/base.css");
$timestamps[] = (int) @filemtime(__DIR__ . "/styles/components.css");
$timestamps[] = (int) @filemtime(__DIR__ . "/styles/homepage.css");
$timestamps[] = (int) @filemtime(__DIR__ . "/js/site-header.js");
$timestamps[] = (int) @filemtime(__DIR__ . "/js/homepage.js");
$timestamps[] = (int) @filemtime(__DIR__ . "/js/copy-code.js");
$timestamps[] = (int) @filemtime(__DIR__ . "/js/keyboard.js");

// The release timeline and the years-open count change with the year
$timestamps[] = (new DateTimeImmutable(date('Y') . '-01-01'))->getTimestamp();

// The latest of these modification dates is our real Last-Modified date
$timestamp = max($timestamps);

// Note that this is not a RFC 822 date (the tz is always GMT)
$tsstring = gmdate("D, d M Y H:i:s ", $timestamp) . "GMT";

// Check if the client has the same page cached
if (($_SERVER["HTTP_IF_MODIFIED_SINCE"] ?? null) === $tsstring) {
    header("HTTP/1.1 304 Not Modified");
    exit();
}

header("Last-Modified: " . $tsstring);

$_SERVER['BASE_PAGE'] = 'index.php';
require_once __DIR__ . '/../include/prepend.inc';
require_once __DIR__ . '/../include/homepage.inc';

$supportedReleases = homepage_actively_supported_releases();
$latestNews = homepage_latest_news();
$featured = homepage_featured_release();
$history = homepage_release_history();
$packagist = homepage_packagist_stats();
$logos = require __DIR__ . '/../include/homepage/logos.php';
$examples = require __DIR__ . '/../include/homepage/examples.php';
$yearsOpen = (int) date('Y') - 1995;

site_header(null, [
    'current' => 'home',
    'description' => 'Build websites, APIs, and applications with PHP: a modern, open source language with mature tools and a global community.',
    'design' => '2026',
    'css' => ['homepage.css'],
    'js_files' => ['js/homepage.js'],
    'release_pill_href' => '#release',
    'cache_control' => 5 * 60, // 5 minutes
]);
?>
  <div class="home-page">

    <main id="main" class="page-guides">
      <section class="hero" aria-labelledby="hero-heading">
        <div class="hero__grid" aria-hidden="true"></div>
        <div class="container hero__inner">
          <h1 id="hero-heading" class="hero__title">The web runs<br>on <span class="hero__accent">PHP.</span></h1>
          <p class="hero__lead">Build your next project on it too. Whether it's a website, an API, or a command-line tool, you get a modern, open source language, a mature ecosystem, and a global community.</p>
          <div class="hero__cta">
            <div class="hero__actions">
              <a href="#start" class="button button--primary">Get started<?= site_icon('arrow-right') ?></a>
              <a href="/downloads.php" class="text-link">Download PHP<?= site_icon('arrow-right') ?></a>
            </div>
          </div>
          <div class="hero__art draft-enter" aria-hidden="true">
            <?= site_svg('hero-php-globe') ?>
          </div>
        </div>

        <div class="latest">
          <section class="latest__row" aria-labelledby="latest-news-heading">
            <div class="container latest__inner">
              <h2 id="latest-news-heading" class="latest__label">Latest news</h2>
              <div class="latest__body">
<?php if ($latestNews): ?>
                <p class="latest-news">
                  <time datetime="<?= $latestNews['date']->format(DATE_W3C) ?>" class="latest-news__date"><?= $latestNews['date']->format('j M Y') ?></time><a href="<?= $latestNews['url'] ?>" class="latest-news__title"><?= $latestNews['title'] ?></a>
                </p>
<?php endif; ?>
              </div>
              <a href="/archive/" class="text-link text-link--brand latest__all">All news<?= site_icon('arrow-right') ?></a>
            </div>
          </section>
          <section class="latest__row" aria-labelledby="latest-releases-heading">
            <div class="container latest__inner">
              <h2 id="latest-releases-heading" class="latest__label">Latest releases</h2>
              <div class="latest__body">
                <ul role="list" class="latest-releases">
<?php foreach ($supportedReleases as $release): ?>
                  <li class="latest-releases__item">
                    <a href="/downloads.php?version=<?= $release['branch'] ?>" class="latest-releases__version"><?= $release['version'] ?></a>
                    <span aria-hidden="true" class="latest-releases__separator">·</span>
                    <a href="/ChangeLog-<?= $release['major'] ?>.php#<?= $release['version'] ?>" class="latest-releases__link" aria-label="PHP <?= $release['version'] ?> changelog">Changelog</a>
                    <span aria-hidden="true" class="latest-releases__separator">·</span>
                    <a href="/migration<?= $release['major'] . $release['minor'] ?>" class="latest-releases__link" aria-label="Upgrading to PHP <?= $release['branch'] ?>">Upgrading</a>
                  </li>
<?php endforeach; ?>
                </ul>
              </div>
              <a href="/releases/" class="text-link text-link--brand latest__all">All releases<?= site_icon('arrow-right') ?></a>
            </div>
          </section>
        </div>
      </section>

      <section id="proof" class="logo-wall" aria-labelledby="proof-heading">
        <div class="container">
          <h2 id="proof-heading" class="logo-wall__eyebrow">Powered by PHP</h2>
          <div class="logo-wall__body">
            <ul role="list" class="logo-wall__list" aria-label="Selected projects built with PHP">
<?php foreach ($logos as $logo):
    $title = "{$logo['name']}: {$logo['story']}";
    $size = "--logo-width: {$logo['width']}"
        . (isset($logo['width_sm']) ? "; --logo-width-sm: {$logo['width_sm']}" : '')
        . (isset($logo['height_sm']) ? "; --logo-height-sm: {$logo['height_sm']}" : '');
?>
              <li role="img" aria-label="<?= htmlspecialchars($title) ?>" title="<?= htmlspecialchars($title) ?>" class="logo-wall__item">
                <?= site_svg('logos/' . $logo['icon'], ['class' => 'logo-wall__mark', 'style' => $size]) ?>
<?php if (isset($logo['wordmark'])): ?>
                <span class="logo-wall__wordmark <?= $logo['wordmark_class'] ?? '' ?>"><?= $logo['wordmark'] ?></span>
<?php endif; ?>
              </li>
<?php endforeach; ?>
            </ul>
<?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="logo-wall__cross" style="left: <?= round($i / 6 * 100, 4) ?>%" aria-hidden="true"></div>
<?php endfor; ?>
          </div>
        </div>
      </section>

      <section id="language" class="section" aria-labelledby="language-heading">
        <div class="container">
          <div class="section-intro section-intro--center">
            <h2 id="language-heading" class="section-title section-title--large">Everything the web needs.</h2>
            <p class="lead">Security. AI &amp; agents. APIs &amp; JSON. Databases. Scalability. Performance. PHP connects the pieces of the modern web.</p>
          </div>
          <div class="panel language-panel">
            <div class="split">
              <div class="split__body">
                <h3 class="card-title">Made for the web,<br>from the beginning.</h3>
                <p class="lead">PHP has grown with the web. From dynamic pages and forms to data pipelines and AI agents, the language and its ecosystem grow with your application.</p>
                <div class="link-row"><a href="/manual/introduction.php" class="text-link text-link--brand">Meet the language<?= site_icon('arrow-right') ?></a></div>
              </div>
              <div class="language-panel__art" aria-hidden="true">
                <div class="draft-grid"></div>
                <?= site_svg('web-capabilities') ?>
              </div>
            </div>
            <div class="panel__footer language-panel__footer">
              <p>From a single request to long-running services.</p>
              <p class="language-panel__since">Open source since 1995</p>
            </div>
          </div>

          <p class="tagline tagline--center">We’ve come a long way from a <?= homepage_scribble('personal home page.') ?></p>

          <div data-code-showcase class="code-showcase">
            <div class="code-showcase__layout">
              <div class="code-showcase__sidebar">
                <p class="code-showcase__folder"><?= site_icon('folder-open') ?><span>examples</span></p>
                <div role="tablist" aria-label="PHP code examples" aria-orientation="vertical" class="code-showcase__tabs">
<?php $first = true; foreach ($examples as $id => $example): ?>
                  <button type="button" role="tab" id="example-tab-<?= $id ?>" aria-controls="example-<?= $id ?>" aria-selected="<?= $first ? 'true' : 'false' ?>" tabindex="<?= $first ? '0' : '-1' ?>" class="code-showcase__tab"><?= str_replace('_', '_<wbr>', $example['file']) ?></button>
<?php $first = false; endforeach; ?>
                </div>
              </div>
              <div class="code-showcase__panels">
<?php
$highlight = static fn (string $code): string => preg_replace(
    '~^<div class="phpcode"><pre><code[^>]*>|</code></pre></div>$~',
    '',
    highlight_php_trimmed($code, true),
);

$first = true; foreach ($examples as $id => $example):
    $lines = substr_count($example['code'], "\n") + 1;
    $expandedLines = $lines;

    // highlight_php_trimmed() takes code without the opening tag, so it's added
    // back here. The imports go after the first blank line, so highlight the
    // code on either side of it separately.
    [$head, $body] = explode("\n\n", preg_replace('/^<\?php\n/', '', $example['code']), 2);
    $code = '<span class="default">&lt;?php</span>' . "\n" . $highlight($head) . "\n\n";

    if (isset($example['imports'])) {
        $importCount = substr_count($example['imports'], "\n") + 1;
        $code .= '<span data-copy-ignore class="code-fold__summary"><span class="keyword">use</span> '
            . '<button type="button" data-imports-toggle aria-expanded="false" aria-label="Show ' . $importCount . ' imports" title="Show imports" class="code-fold__toggle">...</button>;</span>'
            . '<span hidden class="code-fold__body">' . $highlight($example['imports']) . '</span>'
            . "\n\n";
        $lines += 2;
        $expandedLines = $lines + $importCount - 1;
    }

    $code .= $highlight($body);
?>
                <div id="example-<?= $id ?>" role="tabpanel" aria-labelledby="example-tab-<?= $id ?>" data-copy-scope class="code-showcase__panel"<?= $first ? '' : ' hidden' ?>>
                  <div class="code-showcase__tabbar">
                    <div class="code-showcase__file"><?= $example['file'] ?></div>
                    <button type="button" data-copy-code class="copy-button" aria-label="Copy <?= $example['file'] ?>" title="Copy code">
                      <?= site_icon('document-duplicate', 'icon copy-button__icon copy-button__icon--copy') ?>
                      <?= site_icon('check', 'icon copy-button__icon copy-button__icon--done') ?>
                    </button>
                  </div>
                  <p class="code-showcase__description"><?= $example['description'] ?></p>
                  <div role="region" aria-label="<?= $example['file'] ?> code" tabindex="0" class="code-showcase__code">
                    <pre aria-hidden="true" class="code-showcase__gutter" data-lines="<?= implode("\n", range(1, $lines)) ?>" data-lines-expanded="<?= implode("\n", range(1, $expandedLines)) ?>"></pre>
                    <pre class="phpcode"><code><?= $code ?></code></pre>
                  </div>
                  <div class="terminal">
                    <div class="terminal__header">
                      <p class="terminal__tab">Terminal</p>
                      <p class="tok-comment">Example session</p>
                    </div>
                    <pre class="terminal__body"><span class="terminal__prompt" aria-hidden="true">$ </span><?php [$program, $arguments] = explode(' ', $example['command'], 2); ?><span class="tok-function"><?= $program ?></span> <?= htmlspecialchars($arguments) ?>

<span class="tok-comment"><?= htmlspecialchars($example['output']) ?></span></pre>
                  </div>
                </div>
<?php $first = false; endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="ecosystem" class="section section--tinted ecosystem" aria-labelledby="ecosystem-heading">
        <div class="hatch" aria-hidden="true"></div>
        <div class="container">
          <div class="section-intro section-intro--split">
            <h2 id="ecosystem-heading" class="section-title">A package for<br>almost everything.</h2>
            <p class="tagline">A little less <?= homepage_scribble('reinventing the wheel.') ?></p>
          </div>

          <div class="panel ecosystem__panel">
            <div class="split">
              <div class="ecosystem__stats">
                <div class="dot-paper" aria-hidden="true"></div>
                <div class="ecosystem__stats-body">
                  <p class="ecosystem__headline-stat"><span aria-hidden="true"><?= PackagistStats::abbreviate($packagist['packages']) ?></span><span class="sr-only"><?= PackagistStats::spoken($packagist['packages']) ?></span></p>
                  <p class="ecosystem__headline-label">packages published</p>
                  <div class="ecosystem__stat-row">
                    <div class="stat-card">
                      <p class="stat-card__value"><span aria-hidden="true"><?= PackagistStats::abbreviate($packagist['versions']) ?></span><span class="sr-only"><?= PackagistStats::spoken($packagist['versions']) ?></span></p>
                      <p class="stat-card__label">versions</p>
                    </div>
                    <div class="stat-card">
                      <p class="stat-card__value"><span aria-hidden="true"><?= PackagistStats::abbreviate($packagist['downloads']) ?></span><span class="sr-only"><?= PackagistStats::spoken($packagist['downloads']) ?></span></p>
                      <p class="stat-card__label">installs</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="ecosystem__composer">
                <div class="ecosystem__badges" aria-hidden="true">
                  <div class="badge badge--composer">
                    <img src="/images/homepage/composer.svg" alt="" width="47" height="62" loading="lazy">
                  </div>
                  <div class="badge badge--packagist">
                    <?= site_svg('logos/packagist') ?>
                  </div>
                </div>
                <h3 class="card-title">Composer + Packagist</h3>
                <p class="lead">Declare what your project needs, lock exact versions, and install the same dependency graph everywhere. Search Packagist to find packages for databases, APIs, testing, queues, files, and almost everything between.</p>
                <div class="command-line"><span class="command-line__prompt" aria-hidden="true">$</span>composer require vendor/package</div>
                <div class="link-row">
                  <a href="https://getcomposer.org/" class="text-link text-link--brand">Get Composer<?= site_icon('arrow-up-right') ?></a>
                  <a href="https://packagist.org/" class="text-link text-link--brand">Browse Packagist<?= site_icon('arrow-up-right') ?></a>
                </div>
              </div>
            </div>

            <div class="panel__footer ecosystem__pie">
              <div class="ecosystem__pie-body">
                <div class="ecosystem__pie-icon" aria-hidden="true">🥧</div>
                <div>
                  <h3 class="ecosystem__pie-title">Extensions, as easy as PIE.</h3>
                  <p>PIE is PHP’s official extension installer. Find, install, and update native extensions with a Composer-like workflow.</p>
                </div>
              </div>
              <div class="link-row">
                <a href="https://github.com/php/pie" class="text-link text-link--brand">Meet PIE<?= site_icon('arrow-up-right') ?></a>
                <a href="https://packagist.org/extensions" class="text-link text-link--brand">Browse extensions<?= site_icon('arrow-up-right') ?></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="release" class="section" aria-labelledby="release-heading">
        <div class="container">
          <div class="section-intro section-intro--split">
            <h2 id="release-heading" class="section-title">Still moving.<br>Always improving.</h2>
            <p class="tagline">More to <?= homepage_scribble('build with.') ?></p>
          </div>
          <div class="panel release-card">
            <div class="split">
              <div class="release-card__version">
                <div class="draft-grid" aria-hidden="true"></div>
                <div class="release-card__ring release-card__ring--outer" aria-hidden="true"></div>
                <div class="release-card__ring release-card__ring--inner" aria-hidden="true"></div>
                <?= site_icon('logos/php-mark', 'release-card__logo') ?>
                <div class="release-card__numeral">
                  <p class="release-card__numeral-outline" aria-hidden="true" data-text="<?= $featured['branch'] ?>"></p>
                  <p><?= $featured['branch'] ?><span class="release-card__plus" aria-hidden="true"></span></p>
                </div>
                <div class="release-card__dates">
<?php if ($featured['released']): ?>
                  <p>Released <?= $featured['released']->format('F j, Y') ?></p>
<?php endif; ?>
<?php if ($featured['latest'] && $featured['latest'] !== $featured['branch'] . '.0'): ?>
                  <p>Latest patch <a href="/ChangeLog-<?= strtok($featured['latest'], '.') ?>.php#<?= $featured['latest'] ?>"><?= $featured['latest'] ?></a><?= $featured['latest_date'] ? ' · ' . $featured['latest_date']->format('F j, Y') : '' ?></p>
<?php endif; ?>
                </div>
              </div>
              <div class="split__body release-card__features">
                <h3 class="card-title">Meet PHP <?= $featured['branch'] ?>.</h3>
                <dl class="feature-list">
<?php foreach ($featured['features'] as $feature): ?>
                  <div class="feature-list__item">
                    <dt><?= site_svg($feature['icon']) ?><a href="<?= $featured['url'] ?>#<?= $feature['anchor'] ?>"><?= $feature['title'] ?></a></dt>
                    <dd><?= $feature['description'] ?></dd>
                  </div>
<?php endforeach; ?>
                </dl>
                <div class="link-row"><a href="<?= $featured['url'] ?>" class="text-link text-link--brand">Explore all PHP <?= $featured['branch'] ?> features<?= site_icon('arrow-right') ?></a></div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="community" class="section section--lavender circuit-texture" aria-labelledby="community-heading">
        <div class="container community">
          <div class="community__intro">
            <h2 id="community-heading" class="section-title">Built by people.<br>Open by design.</h2>
            <p class="lead">PHP has been community-owned for <?= $yearsOpen ?> years. The language evolves through public proposals, discussion, and votes, and is <strong>free from corporate control.</strong></p>
            <p class="lead">Contribute to the language, improve the docs, or help someone find their feet. There’s a place for you here.</p>
            <div class="community__actions">
              <a href="/get-involved.php" class="button button--primary">Get involved<?= site_icon('arrow-right') ?></a>
              <a href="https://wiki.php.net/rfc" class="text-link">Explore the RFCs<?= site_icon('arrow-up-right') ?></a>
            </div>
          </div>
          <div class="foundation-card">
            <div class="foundation-card__body">
              <?= site_svg('logos/php-foundation', ['class' => 'foundation-card__logo', 'role' => 'img', 'aria-label' => 'The PHP Foundation']) ?>
              <h3 class="card-title">Funding the people behind PHP.</h3>
              <p class="lead">Your support funds work on PHP’s core, helping maintain and improve the language that so much of the web depends on.</p>
            </div>
            <div class="foundation-card__footer">
              <a href="https://thephp.foundation/sponsor/" class="button button--soft">Donate to PHP<?= site_icon('arrow-right') ?></a>
              <a href="https://thephp.foundation/" class="text-link">Meet the Foundation<?= site_icon('arrow-up-right') ?></a>
            </div>
          </div>
        </div>
      </section>

      <section id="start" class="section" aria-labelledby="start-heading">
        <div class="container">
          <div class="section-intro section-intro--split">
            <div>
              <h2 id="start-heading" class="section-title section-title--large">Get started.</h2>
              <p class="lead">Get PHP running, find your feet in the language, and explore a world of packages ready to help.</p>
            </div>
            <a href="/manual/getting-started.php" class="button button--primary">Get started with PHP<?= site_icon('arrow-right') ?></a>
          </div>
          <ol role="list" class="start-steps">
            <li class="start-step">
              <h3 class="start-step__title">Get set up.</h3>
              <p>Install PHP locally or configure it for your servers. Find the setup that fits your tools and infrastructure.</p>
              <div class="link-row">
                <a href="/manual/install.php" class="text-link text-link--brand">Installation guide<?= site_icon('arrow-right') ?></a>
              </div>
            </li>
            <li class="start-step">
              <h3 class="start-step__title">Learn the language.</h3>
              <p>Dive into the documentation or follow a guided tutorial. Explore the features, functions, and patterns you’ll use.</p>
              <div class="link-row">
                <a href="/docs.php" class="text-link text-link--brand">Read the docs<?= site_icon('arrow-right') ?></a>
                <a href="/manual/tutorial.php" class="text-link text-link--brand">Take the tutorial<?= site_icon('arrow-right') ?></a>
              </div>
            </li>
            <li class="start-step">
              <h3 class="start-step__title">Explore the package ecosystem.</h3>
              <p>Find reusable packages and native extensions for the work your application needs to do.</p>
              <div class="link-row">
                <a href="https://packagist.org/" class="text-link text-link--brand">Browse Packagist<?= site_icon('arrow-up-right') ?></a>
                <a href="https://packagist.org/extensions" class="text-link text-link--brand">Find extensions<?= site_icon('arrow-up-right') ?></a>
              </div>
            </li>
          </ol>
        </div>
      </section>

      <section id="history" data-release-history aria-labelledby="history-heading" class="history">
        <div class="container history__intro">
          <h2 id="history-heading" class="section-title section-title--small">PHP through the years.</h2>
          <p class="history__hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 7l-5 5 5 5M15 7l5 5-5 5M4 12h16"/></svg>
            <span>Three decades of releases. Drag, scroll, or use your arrow keys to explore. Open any version for its notes, or <a href="/manual/history.php.php">read the story</a>.</span>
          </p>
        </div>
        <div class="history__base" aria-hidden="true"></div>
        <p id="history-help" class="sr-only">Drag or scroll horizontally to explore releases. Follow a version to read its release details. Use the arrow keys to move between releases, or Home and End to jump to the first and last. Taller marks indicate major versions. PHP 6 was never released.</p>
        <div data-history-scroll class="history__scroll">
          <div data-history-track class="history__track" style="width: <?= $history['width'] ?>px">
            <ol role="list" aria-label="PHP release milestones" aria-describedby="history-help">
<?php foreach ($history['releases'] as $i => $release): ?>
              <li class="history__release" style="left: <?= $release['left'] ?>px">
                <a draggable="false" data-history-release<?php if ($release['url']): ?> href="<?= $release['url'] ?>"<?php endif; ?> title="<?= $release['title'] ?>" aria-label="<?= $release['title'] ?>"<?= $i === array_key_last($history['releases']) ? '' : ' tabindex="-1"' ?> class="history__mark<?= $release['major'] ? ' history__mark--major' : '' ?>">
                  <span class="history__label"><?= $release['branch'] ?></span>
                </a>
              </li>
<?php endforeach; ?>
            </ol>
            <div class="history__ruler" aria-hidden="true"></div>
            <div class="history__years" aria-hidden="true">
<?php foreach ($history['years'] as $year): ?>
              <span style="left: <?= $year['left'] ?>px"><?= $year['year'] ?></span>
<?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>
    </main>
<?= fancy_footer() ?>
  </div>
<?php site_footer(['footer' => false]); ?>
