<?php
/**
 * The header of the redesigned pages, rendered by header.inc.
 * Styled by /styles/components.css; /js/site-header.js wires up the theme
 * switcher, search, mobile menu and language switcher.
 *
 * The pill beside the logo announces the featured release (see
 * homepage_featured_release()) and links to its release page.
 *
 * Optional site_header() options:
 *   'release_pill_href' where the pill links to instead (the homepage uses its
 *                       own release section).
 *   'language_switcher' list of ['name' => …, 'url' => …, 'selected' => bool];
 *                       the switcher only shows on pages that have translations.
 */

/** @var array<string, mixed> $config */
$languages = $config['language_switcher'] ?? [];

// This runs inside site_header(), so the release data files that homepage.inc
// loads would otherwise define their variables locally and the release helpers,
// which read them from $GLOBALS, would find nothing.
global $RELEASES, $OLDRELEASES, $BRANCHES, $KEEP_EOL;
require_once __DIR__ . '/homepage.inc';

$navItems = array_filter(get_nav_items(), fn ($item) => $item->image === null);
$featured = homepage_featured_release();
$releasePillHref = $config['release_pill_href'] ?? $featured['url'];
?>
  <a href="#main" class="skip-link">Skip to content</a>
  <header class="site-header">
    <div class="site-header__bar">
      <div class="site-header__brand">
        <a href="/" aria-label="PHP homepage"><?= site_icon('logos/php-mark', 'site-header__logo') ?></a>
        <a href="<?= htmlspecialchars($releasePillHref) ?>" class="release-pill"><?= $featured['branch'] ?> is here<?= site_icon('arrow-right') ?></a>
      </div>
      <nav aria-label="Main navigation" class="site-header__nav">
<?php foreach ($navItems as $item): ?>
        <a href="<?= $item->href ?>"><?= $item->name ?></a>
<?php endforeach; ?>
      </nav>
      <div class="site-header__actions">
<?php if ($languages): ?>
        <label for="language-switcher" class="sr-only">Language</label>
        <div class="language-select">
          <select id="language-switcher" class="language-select__control" data-language-switcher>
<?php foreach ($languages as $language): ?>
            <option value="<?= htmlspecialchars($language['url']) ?>"<?= $language['selected'] ? ' selected' : '' ?>><?= htmlspecialchars($language['name']) ?></option>
<?php endforeach; ?>
          </select>
          <?= site_icon('chevron-down', 'icon language-select__chevron') ?>
        </div>
<?php endif; ?>
        <a href="/lookup-form.php" aria-label="Search docs" class="icon-button" data-search-fallback>
          <?= site_icon('search', 'icon-button__icon') ?>
        </a>
        <button type="button" id="navbar__search-button" aria-label="Search docs" class="icon-button" hidden>
          <?= site_icon('search', 'icon-button__icon') ?>
        </button>
        <button type="button" data-theme-toggle data-theme="system" aria-label="Theme: system. Switch to light" class="icon-button">
          <?= site_icon('sun', 'icon-button__icon theme-icon theme-icon--light') ?><?= site_icon('moon', 'icon-button__icon theme-icon theme-icon--dark') ?><?= site_icon('computer-desktop', 'icon-button__icon theme-icon theme-icon--system') ?>
        </button>
        <a href="/menu.php" aria-label="Menu" class="icon-button site-header__menu-toggle" data-menu-fallback>
          <svg viewBox="0 0 24 24" class="icon-button__icon menu-icon" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
        </a>
        <button type="button" data-menu-toggle aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu" class="icon-button site-header__menu-toggle" hidden>
          <svg viewBox="0 0 24 24" class="icon-button__icon menu-icon menu-icon--open" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
          <svg viewBox="0 0 24 24" class="icon-button__icon menu-icon menu-icon--close" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
        </button>
      </div>
    </div>
    <nav id="mobile-menu" aria-label="Mobile navigation" hidden class="mobile-menu">
<?php foreach ($navItems as $item): ?>
      <a href="<?= $item->href ?>"><?= $item->name ?></a>
<?php endforeach; ?>
    </nav>
  </header>
