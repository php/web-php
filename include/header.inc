<?php
/* $Id$ */
// Disable caching, annoying while developing
$v = "?v=" .$_SERVER["REQUEST_TIME"];
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
header("Pragma: no-cache");

// Version information for the mega drop down.
include $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

if (isset($shortname) && $shortname) {
    header("Link: <$shorturl>; rel=shorturl");
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $lang?>">
<head>

 <title>PHP: <?php echo $title ?></title>

 <meta charset="utf-8"/>

 <link rel="shortcut icon" href="<?php echo $STATIC_ROOT ?>favicon.ico" />
 <link rel="search" type="application/opensearchdescription+xml" href="http://php.net/phpnetimprovedsearch.src" title="Add PHP.net search" />
 <link rel="alternate" type="application/atom+xml" href="<?php echo $MYSITE ?>releases.atom" title="PHP Release feed" />
 <link rel="alternate" type="application/atom+xml" href="<?php echo $MYSITE ?>feed.atom" title="PHP: Hypertext Preprocessor" />

<?php if (isset($_SERVER['BASE_PAGE'])): ?>
 <link rel="canonical" href="http://php.net/<?php echo $_SERVER['BASE_PAGE']?>" />
<?php if ($shortname): ?>
 <link rel="shorturl" href="<?php echo $shorturl ?>" />
<?php endif ?>
<?php endif ?>

<?php foreach($config["meta-navigation"] as $rel => $page): ?>
 <link rel="<?php echo $rel ?>" href="<?php echo $MYSITE ?><?php echo $page ?>" />
<?php endforeach ?>

 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/reset.css<?php echo $v?>" media="all" />
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/theme.css<?php echo $v?>" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/doc.css<?php echo $v?>" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/home.css<?php echo $v?>" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/dynamic.php<?php echo $v?>" media="screen" />

 <?php
 if(isset($config['css']) && is_array($config['css'])):
     foreach($config['css'] as $file):
 ?>
      <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/<?= $file; ?>" media="screen" />
 <?php
     endforeach;
 endif;
 ?>

 <!--[if lte IE 7]>
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/workarounds.ie7.css<?php echo $v?>" media="screen" />
 <![endif]-->

 <!--[if lte IE 9]>
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/workarounds.ie9.css<?php echo $v?>" media="screen" />
 <![endif]-->

 <!--[if IE]>
 <script type="text/javascript" src="<?php echo $STATIC_ROOT ?>js/ext/html5.js<?php echo $v?>"></script>
 <![endif]-->

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
 <script type="text/javascript">
 if (typeof jQuery == 'undefined') {
    document.write('<script type="text/javascript" src="<?php echo $STATIC_ROOT ?>js/ext/jquery-1.7.2.min.js"><' + '/script>');
    document.write('<script type="text/javascript" src="<?php echo $STATIC_ROOT ?>js/ext/jquery-ui-1.8.7.min.js"><' + '/script>');
 }
 </script>
 <script type="text/javascript" src="<?php echo $STATIC_ROOT ?>js/ext/jquery.ui.totop.js"></script>
 <script type="text/javascript" src="<?php echo $STATIC_ROOT ?>js/common.js<?php echo $v?>"></script>
 <script type="text/javascript" src="<?php echo $STATIC_ROOT ?>js/usernotes.js"></script>
<?php if (!empty($_SERVER["BASE_HREF"])): ?>
 <base href="<?php echo $_SERVER["BASE_HREF"] ?>" />
<?php endif ?>

</head>
<body class="<?php print $curr; ?> <?php echo $classes; ?>">

<div id="head-beta-warning">
  <p id="beta-warning">
    <span class="blurb">Welcome to the php.net beta site. If you want to revert back, <a href="?setbeta=0">click here</a></span>
    <a href="#" id="beta-warning-close">X</a>
  </p>
</div>

<nav id="headnav">

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
  <li id="headhome" class="parent <?php echo $curr == "home" ? "current" : ""?>">
    <a href="/" rel="home" class="menu-link">Home</a>
    <div class="children downloads"><div class="children-1"><div class="children-2">
        <div class="download">
            <h2>Download PHP</h2>
<?php if(!empty($RELEASES[5])): ?>
            <ul class="download-list">
<?php
    foreach ($RELEASES[5] as $version => $release):
        $windowsVersionLink = substr($version, 0, strrpos($version, '.'));
?>
            <li rel="/downloads.php#v<?php echo $version ?>">
                <a href="/downloads.php#v<?php echo $version ?>" class="version" title="Download PHP">PHP <?php echo $version ?></a>
                <a href="/ChangeLog-5.php#<?php echo $version ?>" title="Release Notes for <?php echo $version ?>">Release Notes</a>
                <!-- (size) should go here, but it's not in version.inc at present -->
             </li>
    <?php endforeach; ?>
            </ul>
<?php endif; ?>
        </div>
        <div class="children-left">
            <div class="what-is-php-container">
                <div class="what-is-php downloads-<?php count($RELEASES[5]); ?>">
                    <p>
                        PHP is a popular general-purpose scripting language that is
                        especially suited to web development.
                    </p><p>
                        Fast, flexible and pragmatic, PHP powers everything from your blog to the largest social networking site in the world.
                    </p>
                    <p class="tutorial"><a href="/tut.php">Begin Tutorial &raquo;</a></p>
                </div>
            </div>
        </div>
        <br style="clear: both;" />
    </div></div></div>
  </li>
  <li class="parent <?php echo $curr == "downloads" ? "current" : ""?>">
    <a href="#downloads" class="menu-link">Downloads</a>
    <div class="children" id="downloads">
      <div class="children-1">
        <div class="children-2">

          <dl>
            <dt><a href="/downloads.php" title="Current Releases">Current Releases</a></dt>
            <dd><a href="http://php.net/downloads.php#5.5" title="PHP 5.5">PHP 5.5</a></dd>
            <dd><a href="http://php.net/downloads.php#5.4" title="PHP 5.4">PHP 5.4</a></dd>
            <dd><a href="http://php.net/downloads.php#5.3" title="PHP 5.3">PHP 5.3</a></dd>
          </dl>

          <dl>
            <dt>Development Releases</dt>
            <dd><a href="http://www.php.net/git.php" title="Git">Git</a></dd>
            <dd><a href="https://github.com/php/php-src/" title="Github">Github</a></dd>
            <dd><a href="http://snaps.php.net/" title="Snaps">Snaps</a></dd>
          </dl>

          <dl>
            <dt>Other Downloads</dt>
            <dd><a href="http://www.php.net/releases/" title="Archived Versions">Archived Versions</a></dd>
            <dd><a href="http://pecl.php.net/packages.php" title="PECL">PECL</a></dd>
            <dd><a href="http://pear.php.net/packages.php" title="PEAR">PEAR</a></dd>
            <dd><a href="http://php.net/downloads.php" title="Non-core systems">Non-core systems</a></dd>
          </dl>
          <br style="clear: both;" />

        </div>
      </div>
    </div>
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
    <dl>
      <?php news_toc(array('news')) ?>
      <dt><a href="/cal.php">Calendar of Events</a></dt>
    </dl>
    <dl>
      <?php news_toc(array('conferences', 'papers')) ?>
    </dl>
    <dl>
      <dt><a href="https://wiki.php.net/">PHP Wiki</a></dt>
        <dd><a href="https://wiki.php.net/rfc">Write an RFC</a></dd>
      <dt><a href="/get-involved.php">Get Involved</a></dt>
        <dd><a href="https://bugs.php.net/how-to-report.php">Report bugs</a></dd>
        <dd><a href="https://github.com/php/php-src/blob/master/README.SUBMITTING_PATCH" target="_blank">Contribute code</a></dd>
<!--        <dd><a href="#">Organize an event</a></dd>-->
        <dd><a href="https://wiki.php.net/doc/howto">Write documentation</a></dd>
        <dd><a href="http://qa.php.net">Test PHP</a></dd>
        <dd></dd>
    </dl>
    <dl>
      <dt><a href="/mailing-lists.php">Mailing lists</a></dt>
        <dd><a href="/unsub.php">Unsubscribe from mailing list</a></dd>
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
        <dd><a href="/git.php">Git (PHP Source)</a></dd>
    </dl>
    <dl>
      <dt><a href="https://bugs.php.net/">Bugs</a></dt>
        <dd><a href="https://bugs.php.net/report.php">Report a bug</a></dd>
        <dd><a href="https://bugs.php.net/how-to-report.php">How to file a bug report</a></dd>
        <dd><a href="https://bugs.php.net/search.php">Search reported bugs</a></dd>
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
</nav>

<div id='mega-drop-down'>
 <div id='menu-container'>
 </div>
</div>

<div id="layout">
<?php if (!empty($SIDEBAR_DATA)): ?>
    <aside class="tips">
        <div class="border first"></div>
        <div class="border second"></div>
        <div class="border third"></div>
        <div class="inner"><?php echo $SIDEBAR_DATA; ?></div>
    </aside>
<?php endif; ?>
    
<?php if (!empty($config["leftmenu"])): ?>
    <aside class='layout-menu'>
        
        <ul class='parent-menu-list'>
            <?php foreach($config['leftmenu'] as $section): ?>
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
        </ul>
    </aside>
<?php endif; ?>

<?php include 'uservoice.inc' ?>


<section class="layout-content <?php echo $curr ?>">

