<?php
// Disable caching, annoying while developing
$v = "?v=" .$_SERVER["REQUEST_TIME"];
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Pragma: no-cache");

// shorturl; http://wiki.snaplog.com/short_url
if ($shortname = get_shortname($_SERVER["BASE_PAGE"])) {
    $shorturl = "http://php.net/" . $shortname;
    header("Link: <$shorturl>; rel=shorturl");
}

// For static content
// FIXME: How does static.php.net work? Will it get the /js/ folders?
$STATIC_ROOT = "/";
if ($MYSITE == "http://www.php.net/") {
    $STATIC_ROOT = "http://static.php.net/www.php.net/";
} elseif (!empty($_SERVER["STATIC_ROOT"])) {
    $STATIC_ROOT = $_SERVER["STATIC_ROOT"];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $lang?>">
<head>
 
 <title>PHP: <?php echo $title ?></title>
 
 <meta charset="utf-8"/>
 
 <link rel="shortcut icon" href="<?php echo $STATIC_ROOT ?>favicon.ico" />
 <link rel="search" type="application/opensearchdescription+xml" href="http://www.php.net/phpnetimprovedsearch.src" title="Add PHP.net search" />
 <link rel="alternate" type="application/atom+xml" href="<?php echo $MYSITE ?>releases.atom" title="PHP Release feed" />
 <link rel="alternate" type="application/atom+xml" href="<?php echo $MYSITE ?>feed.atom" title="PHP: Hypertext Preprocessor" />
 <link rel="canonical" href="http://php.net<?php echo $_SERVER['BASE_PAGE']?>" />
<?php if ($shortname): ?>
 <link rel="shorturl" href="<?php echo $shorturl ?>" />
<?php endif ?>
 
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/reset.css<?php echo $v?>" media="all" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/structure.css<?php echo $v?>" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/doc.css<?php echo $v?>" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/theme.css<?php echo $v?>" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/dynamic.php<?php echo $v?>" media="screen" />
 
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
 <script type="text/javascript" src="<?php echo $STATIC_ROOT ?>js/common.js<?php echo $v?>"></script>
 <base href="<?php echo $_SERVER["BASE_HREF"] ?>" />
 
</head>
<body>

<div id="headnav">
 
 <ul id="headmenu">
  <li id="headsearch">
    <form method="post" action="/search.php" id="topsearch">
      <fieldset>
        <input type="search" id="headsearch-keywords" name="pattern" placeholder="Search..." size="30" accesskey="s" />
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
  <li class="<?php echo $curr == "downloads" ? "current" : ""?>">
    <a href="/downloads.php" class="menu-link">Downloads</a>
  </li>
  <li class="parent <?php echo $curr == "docs" ? "current" : ""?>">
    <a href="#docs" class="menu-link">Documentation</a>
    <div class="children" id="docs"><div class="children-1"><div class="children-2">
        <?php doc_toc($lang); ?>
        <br style="clear: both;" />
    </div></div></div>
  </li>
  <li class="parent <?php echo $curr == "community" ? "current" : ""?>">
    <a href="#community" class="menu-link">Community</a>
    <div class="children" id="community"><div class="children-1"><div class="children-2">
    <?php news_toc(array('news')) ?>
    <?php news_toc(array('conferences', 'papers')) ?>
    <dl>
      <dt><a href="http://wiki.php.net/">PHP Wiki</a></dt>
        <dd><a href="http://wiki.php.net/rfc">Write a RFC</a></dd>
      <dt><a href="/get-involved.php">Get Involved</a></dt>
        <dd><a href="#">Report bugs</a></dd>
        <dd><a href="#">Contribute code</a></dd>
        <dd><a href="#">Organize an event</a></dd>
        <dd><a href="#">Write documentation</a></dd>
        <dd><a href="#">Test PHP</a></dd>
      <dt><a href="/cal.php">Calendar of Events</a></dt>
    </dl>
    <dl>
      <dt><a href="/mailing-lists.php">Mailing lists</a></dt>
        <dd><a href="/unsub.php">Unsubscribe from mailing list</a></dd>
        <!-- FIXME: This links.php stuff should be removed? -->
      <dt><a href="/links.php">PHP related sites</a></dt>
        <dd><a href="http://planet-php.net">Planet PHP</a></dd>
      <dt><a href="#">About PHP.net</a></dt>
        <dd><a href="/sites.php">Other PHP.net sites</a></dd>
        <dd><a href="/my.php">My PHP.net</a></dd>
        <dd><a href="/credits.php">Who's behind this?</a></dd>
        <dd><a href="http://people.php.net/">Developers profiles</a></dd>
        <dd><a href="/contact.php">Contact us</a></dd>
        <dd><a href="/thanks.php">Thanks</a></dd>
    </dl>
    <br style="clear: both;" />
    </div></div></div>
  </li>
  <li class="parent <?php echo $curr == "help" ? "current" : ""?>">
    <a href="#support" class="menu-link">Help</a>
    <div class="children" id="support"><div class="children-1"><div class="children-2">
    <dl>
      <dt><a href="#">Navigation tips</a></dt>
        <dd><a href="/sidebars.php">Search sidebars</a></dd>
        <dd><a href="/urlhowto.php">URL Howto</a></dd>
        <dd><a href="/tips.php">Quick Reference tips</a></dd>
        <dd><a href="/sites.php">Other PHP sites</a></dd>
    </dl>
    <dl>
      <dt><a href="#">Support</a></dt>
        <dd><a href="/mailing-lists.php">Mailing lists</a></dd>
        <dd><a href="/support.php">General resources</a></dd>
        <dd><a href="/ChangeLog-5.php">Changelog (PHP 5)</a></dd>
        <dd><a href="/svn.php">SVN (PHP Source)</a></dd>
    </dl>
    <dl>
      <dt><a href="http://bugs.php.net/">Bugs</a></dt>
        <dd><a href="http://bugs.php.net/report.php">Report a bug</a></dd>
        <dd><a href="http://bugs.php.net/how-to-report.php">How to file a bug report</a></dd>
        <dd><a href="http://bugs.php.net/search.php">Search reported bugs</a></dd>
    </dl>
    <dl>
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

<div id='mega-drop-down'>
 <div id='menu-container'>
 </div>
</div>

<div id="layout">
<?php
if (!empty($SIDEBAR_DATA)) {
    echo '<aside class="tips">', "\n$SIDEBAR_DATA\n</aside>\n";
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

