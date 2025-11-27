    </section><!-- layout-content -->
    <?php
    if (!empty($config['spanning-content'])) {
        echo "<div class='spanning-content'>";
        echo $config['spanning-content'];
        echo "</div>";
    }

    ?>
<?php if (!empty($config['related_menu']) || !empty($config['related_menu_deprecated'])): ?>
    <aside class='layout-menu'>

        <ul class='parent-menu-list'>
            <?php if (!empty($config['related_menu'])): ?>
            <?php foreach($config['related_menu'] as $section): ?>
            <li>
                <a href="<?php echo $section['link']; ?>"><?php echo $section['title']; ?></a>

                <?php if ($section['children']): ?>
                    <ul class='child-menu-list'>

                        <?php
                        foreach($section['children'] as $item):
                            $cleanTitle = $item['title'];
                        ?>
                        <li class="<?php echo ($item['current']) ? 'current' : ''; ?>">
                            <a href="<?php echo $item['link']; ?>" title="<?php echo $cleanTitle; ?>"><?php echo $cleanTitle; ?></a>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                <?php endif; ?>

            </li>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($config['related_menu_deprecated'])): ?>
            <li>
                <span class="header">Deprecated</span>
                <ul class="child-menu-list">
                <?php foreach ($config['related_menu_deprecated'] as $item): ?>
                    <li class="<?php echo ($item['current']) ? 'current' : ''; ?>">
                        <a href="<?php echo $item['link']; ?>" title="<?php echo $item['title']; ?>"><?php echo $item['title']; ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </aside>
<?php endif; ?>

<?php if (!empty($config['sidebar'])): ?>
<aside class="tips">
    <div class="inner"><?php echo $config['sidebar']; ?></div>
</aside>
<?php endif; ?>

  </div><!-- layout -->

<?php
// if elephpants enabled, insert placeholder nodes
// to be populated with images via javascript.
if (isset($config['elephpants']) && $config['elephpants']) {
    echo "<div class='elephpants'><div class=images></div></div>";
}
?>

    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <div>
                    <a href="/" class="footer-logo" aria-label="Go to Homepage">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -1 100 50" fill="currentColor">
                            <path d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"></path>
                            <path d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0"></path>
                            <path d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"></path>
                        </svg>
                    </a>

                    <p>PHP is developed and maintained by a global community of contributors.
                        <a href="https://thephp.foundation/" target="_blank">The PHP Foundation</a> helps fund this
                        work. <br>
                        If PHP is part of your business or projects, consider sponsoring the Foundation.</p>

                    <div class="social-icons">
                        <a href="https://www.linkedin.com/company/phpnet/" target="_blank" rel="noopener noreferrer">
                            <span class="sr-only">Linkedin</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11.9428 1.75H12.0572C14.2479 1.74999 15.9686 1.74998 17.312 1.93059C18.6886 2.11568 19.7809 2.50271 20.6391 3.36091C21.4973 4.21911 21.8843 5.31137 22.0694 6.68802C22.25 8.03144 22.25 9.75214 22.25 11.9428V12.0572C22.25 14.2479 22.25 15.9686 22.0694 17.312C21.8843 18.6886 21.4973 19.7809 20.6391 20.6391C19.7809 21.4973 18.6886 21.8843 17.312 22.0694C15.9686 22.25 14.2479 22.25 12.0572 22.25H11.9428C9.7521 22.25 8.03144 22.25 6.68802 22.0694C5.31137 21.8843 4.21911 21.4973 3.36091 20.6391C2.50272 19.7809 2.11568 18.6886 1.93059 17.312C1.74998 15.9686 1.74999 14.2479 1.75 12.0572V12.0572V11.9428V11.9428C1.74999 9.75211 1.74998 8.03144 1.93059 6.68802C2.11568 5.31137 2.50272 4.21911 3.36091 3.36091C4.21911 2.50271 5.31137 2.11568 6.68802 1.93059C8.03143 1.74998 9.75214 1.74999 11.9428 1.75ZM8.00195 10.5C8.00195 9.94771 7.55424 9.5 7.00195 9.5C6.44967 9.5 6.00195 9.94771 6.00195 10.5L6.00195 17C6.00195 17.5523 6.44967 18 7.00195 18C7.55424 18 8.00195 17.5523 8.00195 17L8.00195 10.5ZM11.002 9C11.4073 9 11.7564 9.2412 11.9134 9.58791C12.5213 9.215 13.2365 9 14.002 9C16.2111 9 18.002 10.7909 18.002 13V17C18.002 17.5523 17.5542 18 17.002 18C16.4497 18 16.002 17.5523 16.002 17V13C16.002 11.8954 15.1065 11 14.002 11C12.8974 11 12.002 11.8954 12.002 13L12.002 17C12.002 17.5523 11.5542 18 11.002 18C10.4497 18 10.002 17.5523 10.002 17L10.002 10C10.002 9.44771 10.4497 9 11.002 9ZM8.25977 7C8.25977 7.69036 7.70012 8.25 7.00977 8.25H7.00078C6.31043 8.25 5.75078 7.69036 5.75078 7C5.75078 6.30964 6.31043 5.75 7.00078 5.75H7.00977C7.70012 5.75 8.25977 6.30964 8.25977 7Z"
                                      fill="currentColor"></path>
                            </svg>
                        </a>
                        <a href="https://fosstodon.org/@php" target="_blank" rel="noopener noreferrer">
                            <span class="sr-only">@php@fosstodon.org</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M21.5 6.5c-.3-2.2-2.3-3.9-4.6-4.2-.4 0-1.9-.3-5.3-.3s-4.2.2-4.6.3c-2.2.3-4.3 1.9-4.8 4C2 7.6 2 8.8 2 9.9a38.5 38.5 0 0 0 .8 7.9c.4 2 2.4 3.5 4.2 4.2a11.6 11.6 0 0 0 7 .1l1.5-.6v-1.6a19 19 0 0 1-4.1.4c-2.3 0-3-1-3.2-1.5a4.7 4.7 0 0 1-.2-1.3c1.3.3 2.7.5 4 .5h1c1.3 0 2.7-.1 4-.4h.2a5 5 0 0 0 4.3-4.8V6.5Zm-3.3 7.9H16V9c0-1.1-.4-1.7-1.4-1.7-1 0-1.6.7-1.6 2v3h-2.2v-3c0-1.3-.5-2-1.6-2-1 0-1.4.6-1.4 1.7v5.3H5.6V8.9c0-1.1.3-2 .9-2.6a3 3 0 0 1 2.3-1c1.2 0 2 .4 2.6 1.2l.5 1 .6-1c.5-.8 1.4-1.2 2.5-1.2 1 0 1.8.3 2.4 1 .6.6.8 1.5.8 2.6v5.5Z"></path>
                            </svg>
                        </a>
                        <a href="https://github.com/php/" target="_blank" rel="noopener noreferrer">
                            <span class="sr-only">GitHub</span>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                      clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>

                    <a href="https://thephp.foundation/sponsor/" target="_blank" class="button-primary">Donate</a>
                </div>
                <div class="footer-links-container">
                    <div class="footer-links-grid">
                        <div>
                            <h3>PHP</h3>
                            <ul role="list">
                                <li><a href="/my.php">My PHP.net</a></li>
                                <li><a href="/downloads.php">Downloads</a></li>
                                <li><a href="/contact.php">Contact</a></li>
                                <li><a href="/sites.php">Other PHP.net sites</a></li>
                                <?php if (!empty($_SERVER['BASE_PAGE']) && strncmp($_SERVER['BASE_PAGE'], 'manual', 6) !== 0) { ?>
                                    <li>
                                        <a href="https://github.com/php/web-php/blob/master/<?php echo urlencode($_SERVER['BASE_PAGE']); ?>">View
                                            Source</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div>
                            <h3>Learn</h3>
                            <ul role="list">
                                <li><a href="/docs.php">Documentation</a></li>
                                <li><a href="/get-involved.php">Get Involved</a></li>
                                <li><a href="/support.php">Help</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-links-grid">
                        <div>
                            <h3>The PHP Foundation</h3>
                            <ul role="list">
                                <li><a href="https://thephp.foundation/" target="_blank" rel="noopener noreferrer">About
                                        the Foundation</a></li>
                                <li><a href="https://thephp.foundation/sponsor/" target="_blank"
                                       rel="noopener noreferrer">Sponsor</a>
                                </li>
                                <li><a href="https://thephp.foundation/contact/" target="_blank"
                                       rel="noopener noreferrer">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3>Legal</h3>
                            <ul role="list">
                                <li><a href="/privacy.php">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-credits">
                <?php
                global $LANG;
                if (!empty($_SERVER['BASE_PAGE']) && str_starts_with($_SERVER['BASE_PAGE'], 'manual/' . $LANG . '/')) { ?>
                    <p><a href="/manual/<?php echo $LANG; ?>/copyright.php">Copyright &copy;
                            2001-<?php echo date('Y'); ?> The PHP Documentation Group</a></p>
                <?php } else { ?>
                    <p><a href="/copyright.php">Copyright &copy; 2001-<?php echo date('Y'); ?> The PHP Group</a></p>
                <?php } ?>

                <?php if (isset($config['footer_note'])) { ?>
                    <?= $config['footer_note'] ?>
                <?php } ?>
            </div>
        </div>
    </footer>

<?php
 $jsfiles = ["ext/jquery-3.6.0.min.js", "ext/FuzzySearch.min.js", "ext/mousetrap.min.js", "ext/jquery.scrollTo.min.js", "search.js", "common.js"];
 foreach ($jsfiles as $filename) {
   $path = dirname(__DIR__) . '/js/' . $filename;
   echo '<script src="/cached.php?t=' . @filemtime($path) . '&amp;f=/js/' . $filename . '"></script>' . "\n";
 }
?>
<?php
 $jsfiles = ["interactive-examples.js"];
 foreach ($jsfiles as $filename) {
   $path = dirname(__DIR__) . '/js/' . $filename;
   echo '<script type="module" src="/cached.php?t=' . @filemtime($path) . '&amp;f=/js/' . $filename . '"></script>' . "\n";
 }
?>

<a id="toTop" href="javascript:;"><span id="toTopHover"></span><img width="40" height="40" alt="To Top" src="/images/to-top@2x.png"></a>

<div id="search-modal__backdrop" class="search-modal__backdrop">
  <div
    role="dialog"
    aria-label="Search modal"
    id="search-modal"
    class="search-modal"
  >
    <div class="search-modal__header">
      <div class="search-modal__form">
        <div class="search-modal__input-icon">
          <!-- https://feathericons.com search -->
          <svg xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true"
            width="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </div>
        <input
          type="search"
          id="search-modal__input"
          class="search-modal__input"
          placeholder="Search docs"
          aria-label="Search docs"
        />
      </div>

      <button aria-label="Close" class="search-modal__close">
        <!-- https://pictogrammers.com/library/mdi/icon/close/ -->
        <svg
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true"
          width="24"
          viewBox="0 0 24 24"
        >
          <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/>
        </svg>
      </button>
    </div>
    <div
      role="listbox"
      aria-label="Search results"
      id="search-modal__results"
      class="search-modal__results"
    ></div>
    <div class="search-modal__helper-text">
      <div>
        <kbd>↑</kbd> and <kbd>↓</kbd> to navigate •
        <kbd>Enter</kbd> to select •
        <kbd>Esc</kbd> to close • <kbd>/</kbd> to open
      </div>
      <div>
        Press <kbd>Enter</kbd> without
        selection to search using Google
      </div>
    </div>
  </div>
</div>

</body>
</html>
