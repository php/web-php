<?php $v = "?v=" .$_SERVER["REQUEST_TIME"]; // Disable caching, annoying while developing ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $lang?>">
<head>
 
 <title>PHP: <?php echo $title ?></title>
 
 <meta charset="utf-8"/>
 
 <link rel="shortcut icon" href="http://static.php.net/www.php.net/favicon.ico" />
 <link rel="search" type="application/opensearchdescription+xml" href="http://www.php.net/phpnetimprovedsearch.src" title="Add PHP.net search" />
 <link rel="alternate" type="application/atom+xml" href="http://www.php.net/releases.atom" title="PHP Release feed" />
 <link rel="alternate" type="application/atom+xml" title="PHP: Hypertext Preprocessor" href="http://www.php.net/feed.atom" />
 <link rel="canonical" href="http://php.net/index.php" />
 
 <link rel="stylesheet" type="text/css" href="/styles/reset.css<?php echo $v?>" media="all" /> 
 <link rel="stylesheet" type="text/css" href="/styles/structure.css<?php echo $v?>" media="screen" />
 <link rel="stylesheet" type="text/css" href="/styles/doc.css<?php echo $v?>" media="screen" />
 <link rel="stylesheet" type="text/css" href="/styles/theme.css<?php echo $v?>" media="screen" />
 
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 <script type="text/javascript" src="/js/jquery.hoverIntent.minified.js"></script>
 <script type="text/javascript" src="/js/jquery.autocomplete.js"></script>
 <script type="text/javascript" src="/js/common.js<?php echo $v?>"></script>
 <base href="<?php echo $_SERVER["BASE_PAGE"] ?>" />
 
</head>
<body>

<div id="headnav">
 
 <ul id="headmenu">
  <li id="headsearch">
    <form method="post" action="/search.php" id="topsearch">
      <fieldset>
        <input type="text" id="headsearch-keywords" name="pattern" value="Search..." size="30" accesskey="s" />
        <input type="submit"
          value="Go"
          id="headsearch-submit"
          class="submit" />
       </fieldset>
    </form>
  </li>
  <li id="headhome">
    <a href="/" rel="home" class="menu-link">Home</a>
  </li>
  <li>
    <a href="/downloads.php" class="menu-link">Downloads</a>
  </li>
  <li class="parent <?php echo $curr == "docs" ? "current" : ""?>">
    <a href="/docs.php" class="menu-link">Documentation</a>
    <div class="children"><div class="children-1"><div class="children-2">
        <?php doc_toc($lang); ?>
        <br style="clear: both;" />
    </div></div></div>
  </li>
  <li class="parent <?php echo $curr == "community" ? "current" : ""?>">
    <a href="/community.php" class="menu-link">Community</a>
    <div class="children"><div class="children-1"><div class="children-2">
    <?php news_toc() ?>
    <dl>
      <dt><a href="http://wiki.php.net/">PHP Wiki</a></dt>
        <dd><a href="http://wiki.php.net/rfc">Write a RFC</a></dd>
      <dt><a href="#">Get Involved</a></dt>
        <dd><a href="#">Report bugs</a></dd>
        <dd><a href="#">Contribute code</a></dd>
        <dd><a href="#">Organize an event</a></dd>
        <dd><a href="#">Write documentation</a></dd>
        <dd><a href="#">Test PHP</a></dd>
    </dl>
    <dl>
      <dt><a href="/mailing-lists.php">Mailing lists</a></dt>
        <dd><a href="/unsub.php">Unsubscribe from mailing list</a></dd>
      <dt><a href="/links.php">PHP related sites</a></dt>
      <dt><a href="#">About PHP.net</a></dt>
        <dd><a href="/sites.php">Other PHP.net sites</a></dd>
        <dd><a href="/my.php">My PHP.net</a></dd>
        <dd><a href="#">Contribute to the website</a></dd>
        <dd><a href="/credits.php">Who's behind this?</a></dd>
        <dd><a href="/contact.php">Contact us</a></dd>
        <dd><a href="/mirrors.php">Mirror sites</a></dd>
    </dl>
    <br style="clear: both;" />
    </div></div></div>
  </li>
  <li class="parent <?php echo $curr == "help" ? "current" : ""?>">
    <a href="/support.php" class="menu-link">Help</a>
    <div class="children"><div class="children-1"><div class="children-2">
    <dl style="width: 250px;">
      <dt><a href="#">Navigation tips</a></dt>
        <dd><a href="/sidebars.php">Search sidebars</a></dd>
        <dd><a href="/urlhowto.php">URL Howto</a></dd>
        <dd><a href="/tips.php">Quick Reference tips</a></dd>
        <dd><a href="/sites.php">Other PHP sites</a></dd>
    </dl>
    <dl style="width: 250px;">
      <dt><a href="#">Support</a></dt>
        <dd><a href="/mailing-lists.php">Mailing lists</a></dd>
        <dd><a href="/support.php">General resources</a></dd>
    </dl>
    <dl style="swidth: 250px";>
      <dt><a href="http://bugs.php.net/">Bugs</a></dt>
        <dd><a href="http://bugs.php.net/report.php">Report a bug</a></dd>
        <dd><a href="http://bugs.php.net/how-to-report.php">How to file a bug report</a></dd>
        <dd><a href="http://bugs.php.net/search.php">Search reported bugs</a></dd>
      <dt><a href="/license/index.php">License information</a></dt>
        <dd><a href="/license/contrib-guidelines-code.php">Contributor Guidelines</a></dd>
        <dd><a href="/license/distrib-guidelines-code.php">Distribution Guidelines</a></dd>
        <dd><a href="/software.php">Software covered by the PHP license</a></dd>
    </dl>
    <br style="clear: both;" />
    </div></div></div>
  </li>
  
 </ul>
<br style="clear: both;" />
</div>

<div id="layout">
<?php
if (!empty($SIDEBAR_DATA)) {
    echo '<aside id="leftbar">', "\n$SIDEBAR_DATA\n</aside>\n";
}
if (!empty($config["leftmenu"])) {
    echo "<aside class='layout-menu'><ul>";
    foreach($config["leftmenu"] as $section) {
        echo "<li><a href='{$section["link"]}'>{$section["title"]}</a>\n";
        echo "<ul>";
        foreach($section["children"] as $item) {
            if ($item["current"]) {
                echo "<li class='current'><a href='{$item["link"]}'>{$item["title"]}</a></li>\n";
            } else {
                echo "<li><a href='{$item["link"]}'>{$item["title"]}</a></li>\n";
            }
        }
        echo "</ul>";
        echo "</li>";
    }
    echo "</ul></aside>\n";
}
?>
<section class="layout-content <?php echo $curr ?>">

