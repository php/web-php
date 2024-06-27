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

    <?php
    // if elephpants enabled, insert placeholder nodes
    // to be populated with images via javascript.
    if (isset($config['elephpants']) && $config['elephpants']) {
        echo "<div class='elephpants'><div class=images></div></div>";
    }
    ?>

 <!-- External and third party libraries. -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php
 $jsfiles = ["ext/hogan-3.0.2.min.js", "ext/typeahead.min.js", "ext/mousetrap.min.js", "ext/jquery.scrollTo.min.js", "search.js", "common.js"];
 foreach ($jsfiles as $filename) {
   $path = dirname(__DIR__) . '/js/' . $filename;
   echo '<script src="/cached.php?t=' . @filemtime($path) . '&amp;f=/js/' . $filename . '"></script>' . "\n";
 }
?>

<a id="toTop" href="javascript:;"><span id="toTopHover"></span><img width="40" height="40" alt="To Top" src="/images/to-top@2x.png"></a>

</body>
</html>
