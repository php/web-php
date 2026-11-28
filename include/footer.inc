<?php

use phpweb\ProjectGlobals;

// 2026 design pages (see site_header()) render their own layout, so they only
// need the footer, the search modal and the closing tags.
if (site_design() === '2026') {
    if (($config['footer'] ?? true) !== false) {
        echo fancy_footer($config['footer_credit'] ?? '');
    }
    require __DIR__ . "/search-modal.inc";
    echo "</body>\n</html>\n";
    return;
}

?>
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
// Render the fancy shared footer on every page unless the caller opts out with
// 'footer' => false — used by the release landing pages (releases/*/release.inc),
// which emit the footer inline via ReleasePage::getPrefooter().
//
// 'footer_credit' optionally supplies extra markup for the footer's credit row.
if (($config['footer'] ?? true) !== false) {
    echo fancy_footer($config['footer_credit'] ?? '');
}
?>
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
   $path = ProjectGlobals::getPublicRoot() . '/js/' . $filename;
   echo '<script src="/cached.php?t=' . @filemtime($path) . '&amp;f=/js/' . $filename . '"></script>' . "\n";
 }
?>
<?php
 $jsfiles = ["interactive-examples.js"];
 foreach ($jsfiles as $filename) {
   $path = ProjectGlobals::getPublicRoot() . '/js/' . $filename;
   echo '<script type="module" src="/cached.php?t=' . @filemtime($path) . '&amp;f=/js/' . $filename . '"></script>' . "\n";
 }
?>

<a id="toTop" href="javascript:;"><span id="toTopHover"></span><img width="40" height="40" alt="To Top" src="/images/to-top@2x.png"></a>

<?php require __DIR__ . "/search-modal.inc"; ?>

</body>
</html>
