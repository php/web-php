<?php
/* $Id$ */
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

  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <title>PHP: <?php echo $title ?></title>

 <link rel="shortcut icon" href="<?php echo $STATIC_ROOT ?>favicon.ico" />
 <link rel="search" type="application/opensearchdescription+xml" href="http://php.net/phpnetimprovedsearch.src" title="Add PHP.net search" />
 <link rel="alternate" type="application/atom+xml" href="<?php echo $MYSITE ?>releases/feed.php" title="PHP Release feed" />
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

 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic,600italic|Source+Code+Pro&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/theme-base.css?t=20131120b" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/theme-medium.css?t=20131120" media="screen" />

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
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/workarounds.ie7.css" media="screen" />
 <![endif]-->

 <!--[if lte IE 9]>
 <link rel="stylesheet" type="text/css" href="<?php echo $STATIC_ROOT ?>styles/workarounds.ie9.css" media="screen" />
 <![endif]-->

 <!--[if IE]>
 <script type="text/javascript" src="<?php echo $STATIC_ROOT ?>js/ext/html5.js"></script>
 <![endif]-->

<?php if (!empty($_SERVER["BASE_HREF"])): ?>
 <base href="<?php echo $_SERVER["BASE_HREF"] ?>" />
<?php endif ?>

</head>
<body class="<?php print $curr; ?> <?php echo $classes; ?>">

<nav id="head-nav" class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a href="/" class="brand"><img src="/images/logos/php-logo@2x.png" width="48" height="24" alt="php"/></a>
      <div id="mainmenu-toggle-overlay"></div>
      <input type="checkbox" id="mainmenu-toggle"></input>
      <ul class="nav">
        <li class="<?php echo $curr == "downloads" ? "active" : ""?>"><a href="/downloads">Downloads</a></li>
        <li class="<?php echo $curr == "docs" ? "active" : ""?>"><a href="/docs.php">Documentation</a></li>
        <li class="<?php echo $curr == "community" ? "active" : ""?>"><a href="/get-involved" >Get Involved</a></li>
        <li class="<?php echo $curr == "help" ? "active" : ""?>"><a href="/support">Help</a></li>
      </ul>
      <form class="navbar-search span3" id="topsearch" action="/search.php">
          <input type="search" name="pattern" class="search-query" placeholder="Search"/>
      </form>
    </div>
  </div>
</nav>



<?php if (!empty($config['intro'])):?>
<div id="intro">
  <div class="container">
    <?php echo $config['intro'];?>
  </div>
</div>
<?php endif;?>

<div id="layout" class="container">
<?php if (!empty($config['breadcrumbs'])): ?>
  <div id="breadcrumbs" class="row-fluid">
    <div class="breadcrumbs-inner">
    <ul>
      <?php
          $breadcrumbs = $config['breadcrumbs'];
          $last = array_pop($breadcrumbs);
          foreach ($breadcrumbs as $crumb) {
              echo "      <li><a href='{$crumb['link']}'>{$crumb['title']}</a> <span class='divider'>/</span></li>";
          }
          echo "      <li><a href='{$last['link']}'>{$last['title']}</a></li>";

      ?>
    </ul>
      <div id="prevnext-container">
        <?php
          if (isset($config['prev'])) {
            echo "<a class='prev' href='{$config['prev'][0]}'>&laquo; {$config['prev'][1]}</a>";
          }
          if (isset($config['next'])) {
            echo "<a class='next' href='{$config['next'][0]}'>{$config['next'][1]} &raquo;</a>";
          }
        ?>
      </div>
    </div>
  </div>
<?php endif; ?>

  <div class="row-fluid">
<?php if (!empty($config["leftmenu"])): ?>
    <aside class='layout-menu span3'>
        
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

<section id="layout-content" class="<?php echo $curr ?> span<?php echo $config['layout_span']; ?>">
