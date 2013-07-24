    </section><!-- layout-content -->
    <?php
    if (!empty($config['spanning-content'])) {
        print "<div class='spanning-content'>";
        print $config['spanning-content'];
        print "</div>";
    }

    ?>
<?php if (!empty($config['sidebar'])): ?>
    <aside class="tips span3">
        <div class="border first"></div>
        <div class="border second"></div>
        <div class="border third"></div>
        <div class="inner"><?php echo $config['sidebar']; ?></div>
    </aside>
<?php endif; ?>

  </div><!-- layout -->
  </div>
         
  <footer>
    <div class="container footer-content">
      <div class="row-fluid">
      <ul class="footmenu">
        <li><a href="/copyright.php">Copyright &copy; 2001-<?php echo date('Y'); ?> The PHP Group</a></li>
        <li><a href="/my.php">My PHP.net</a></li>
        <li><a href="/contact.php">Contact</a></li>
        <li><a href="/sites.php">Other PHP.net sites</a></li>
        <li><a href="/mirrors.php">Mirror sites</a></li>
        <li><a href="/privacy.php">Privacy policy</a></li>
      </ul>
      </div>
    </div>
  </footer>

    <?php
    // if elephpants enabled, insert placeholder nodes
    // to be populated with images via javascript.
    if (isset($config['elephpants']) && $_SERVER['REQUEST_URI'] == '/') {
        print "<div class='elephpants'><div class=images></div></div>";
    }
    ?>


 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 <script type="text/javascript" src="/js/common.js<?php echo $v?>"></script>
 <?php include 'uservoice.inc' ?>

</body>
</html>

