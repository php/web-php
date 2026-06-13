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

<?php if(!isset($config['footer']) || $config['footer']): ?>
  <footer>
    <div class="container footer-content">
      <div class="row-fluid">
      <ul class="footmenu">
<?php
global $LANG;
if (!empty($_SERVER['BASE_PAGE'])
    && str_starts_with($_SERVER['BASE_PAGE'], 'manual/' . $LANG . '/')) {
?>
        <li><a href="/manual/<?php echo $LANG; ?>/copyright.php">Copyright &copy; 2001-<?php echo date('Y'); ?> The PHP Documentation Group</a></li>
<?php
} else {
?>
        <li><a href="/copyright.php">Copyright &copy; 2001-<?php echo date('Y'); ?> The PHP Group</a></li>
<?php
}
?>
        <li><a href="/my.php">My PHP.net</a></li>
        <li><a href="/contact.php">Contact</a></li>
        <li><a href="/sites.php">Other PHP.net sites</a></li>
        <li><a href="/privacy.php">Privacy policy</a></li>
<?php if (!empty($_SERVER['BASE_PAGE']) && strncmp($_SERVER['BASE_PAGE'], 'manual', 6) !== 0): ?>
        <li><a href="https://github.com/php/web-php/blob/master/<?php echo urlencode($_SERVER['BASE_PAGE']); ?>">View Source</a></li>
<?php endif; ?>
      </ul>
      </div>
    </div>
  </footer>
<?php endif; ?>
    <?php
    // if elephpants enabled, insert placeholder nodes
    // to be populated with images via javascript.
    if (isset($config['elephpants']) && $config['elephpants']) {
        echo "<div class='elephpants'><div class=images></div></div>";
    }
    ?>

<?php
 $jsfiles = ["ext/jquery-3.6.0.min.js", "ext/FuzzySearch.min.js", "ext/mousetrap.min.js", "ext/jquery.scrollTo.min.js", "search.js", "common.js"];
 foreach ($jsfiles as $filename) {
   $path = dirname(__DIR__) . '/js/' . $filename;
   echo '<script src="/cached.php?t=' . filemtime($path) . '&amp;f=/js/' . $filename . '"></script>' . "\n";
 }
?>
<?php
 $jsfiles = ["interactive-examples.js"];
 foreach ($jsfiles as $filename) {
   $path = dirname(__DIR__) . '/js/' . $filename;
   echo '<script type="module" src="/cached.php?t=' . filemtime($path) . '&amp;f=/js/' . $filename . '"></script>' . "\n";
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
