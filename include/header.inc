<?php
$css_files = [
    '/fonts/Fira/fira.css',
    '/fonts/Font-Awesome/css/fontello.css',
    '/styles/theme-base.css',
    '/styles/theme-medium.css',
];

if (isset($config['css'])) {
    $css_files = array_merge($css_files, (array) $config['css']);
}
if (isset($config["css_overwrite"])) {
    $css_files = $config["css_overwrite"];
}

foreach($css_files as $filename) {
    // files that do not start with / are assumed to be located in the /styles
    // directory
    if ($filename[0] !== '/') {
        $filename = "/styles/$filename";
    }
    $path = dirname(__DIR__) . $filename;
    $CSS[$filename] = @filemtime($path);
}

if (isset($shortname) && $shortname) {
    header("Link: <$shorturl>; rel=shorturl");
}

if ($config["cache"]) {
    if (is_numeric($config["cache"])) {
        $timestamp = $config["cache"];
    } else {
        $timestamp = filemtime($_SERVER["DOCUMENT_ROOT"] . "/" . $_SERVER["BASE_PAGE"]);
    }
    $tsstring = gmdate("D, d M Y H:i:s ", $timestamp) . "GMT";

    if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"]) && $_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    }
    header("Last-Modified: " . $tsstring);
}
if (!isset($config["languages"])) {
    $config["languages"] = [];
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $lang?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PHP: <?php echo $title ?></title>

 <link rel="icon" type="image/svg+xml" sizes="any" href="<?php echo $MYSITE ?>favicon.svg?v=2">
 <link rel="icon" type="image/png" sizes="196x196" href="<?php echo $MYSITE ?>favicon-196x196.png?v=2">
 <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $MYSITE ?>favicon-32x32.png?v=2">
 <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $MYSITE ?>favicon-16x16.png?v=2">
 <link rel="shortcut icon" href="<?php echo $MYSITE ?>favicon.ico?v=2">

 <link rel="search" type="application/opensearchdescription+xml" href="http://php.net/phpnetimprovedsearch.src" title="Add PHP.net search">
 <link rel="alternate" type="application/atom+xml" href="<?php echo $MYSITE ?>releases/feed.php" title="PHP Release feed">
 <link rel="alternate" type="application/atom+xml" href="<?php echo $MYSITE ?>feed.atom" title="PHP: Hypertext Preprocessor">

<?php if (isset($_SERVER['BASE_PAGE'])): ?>
 <link rel="canonical" href="https://www.php.net/<?php echo $_SERVER['BASE_PAGE']?>">
<?php if ($shortname): ?>
 <link rel="shorturl" href="<?php echo $shorturl ?>">
 <link rel="alternate" href="<?php echo $shorturl ?>" hreflang="x-default">
<?php endif ?>
<?php endif ?>

<?php foreach($config["meta-navigation"] as $rel => $page): ?>
 <link rel="<?php echo $rel ?>" href="<?php echo $MYSITE ?><?php echo $page ?>">
<?php endforeach ?>

<?php foreach($config["languages"] as $code): ?>
 <link rel="alternate" href="<?php echo $MYSITE ?>manual/<?php echo $code?>/<?php echo $config["thispage"] ?>" hreflang="<?php echo $code?>">
<?php endforeach ?>

<?php foreach($CSS as $filename => $modified): ?>
<link rel="stylesheet" type="text/css" href="/cached.php?t=<?php echo $modified?>&amp;f=<?php echo $filename?>" media="screen">
<?php endforeach ?>

<?php if (!empty($_SERVER["BASE_HREF"])): ?>
 <base href="<?php echo $_SERVER["BASE_HREF"] ?>">
<?php endif ?>

<?php if (isset($config['meta_tags'])) { echo $config['meta_tags']; } ?>

</head>
<body class="<?php print $curr; ?> <?php echo $classes; ?>">

<nav id="head-nav" class="navbar navbar-fixed-top">
  <div class="navbar-inner clearfix">
    <a href="/" class="brand"><img src="/images/logos/php-logo.svg" width="48" height="24" alt="php"></a>
    <div id="mainmenu-toggle-overlay"></div>
    <input type="checkbox" id="mainmenu-toggle">
    <ul class="nav">
      <li class="<?php echo $curr == "downloads" ? "active" : ""?>"><a href="/downloads">Downloads</a></li>
      <li class="<?php echo $curr == "docs" ? "active" : ""?>"><a href="/docs.php">Documentation</a></li>
      <li class="<?php echo $curr == "community" ? "active" : ""?>"><a href="/get-involved" >Get Involved</a></li>
      <li class="<?php echo $curr == "help" ? "active" : ""?>"><a href="/support">Help</a></li>
      <li class="<?php echo $curr === "php8" ? "active" : "" ?>">
        <a href="/releases/8.1/index.php">
          <img src="/images/php8/logo_php8_1.svg" alt="php8.1" height="22" width="60">
        </a>
      </li>
    </ul>
    <form class="navbar-search" id="topsearch" action="/search.php">
      <input type="hidden" name="show" value="quickref">
      <input type="search" name="pattern" class="search-query" placeholder="Search" accesskey="s">
    </form>
  </div>
  <div id="flash-message"></div>
</nav>
<?php if (!empty($config["headsup"])): ?>
<div class="headsup"><?php echo $config["headsup"]?></div>
<?php endif ?>
<nav id="trick"><div><?php doc_toc("en") ?></div></nav>
<div id="goto">
    <div class="search">
         <div class="text"></div>
         <div class="results"><ul></ul></div>
   </div>
</div>

<?php if (!empty($config['breadcrumbs'])): ?>
  <div id="breadcrumbs" class="clearfix">
    <div id="breadcrumbs-inner">
    <?php if (isset($config['next'])): ?>
      <div class="next">
        <a href="<?php echo $config['next'][0]; ?>">
          <?php echo $config['next'][1]; ?> &raquo;
        </a>
      </div>
    <?php endif; ?>
    <?php if (isset($config['prev'])): ?>
      <div class="prev">
        <a href="<?php echo $config['prev'][0]; ?>">
          &laquo; <?php echo $config['prev'][1]; ?>
        </a>
      </div>
    <?php endif; ?>
      <ul>
      <?php
          $breadcrumbs = $config['breadcrumbs'];
          $last = array_pop($breadcrumbs);
          foreach ($breadcrumbs as $crumb) {
              echo "      <li><a href='{$crumb['link']}'>{$crumb['title']}</a></li>";
          }
          echo "      <li><a href='{$last['link']}'>{$last['title']}</a></li>";

      ?>
      </ul>
    </div>
  </div>
<?php endif; ?>


<?php if (!empty($config['intro'])):?>
<div id="intro" class="clearfix">
  <div class="container">
    <?php echo $config['intro'];?>
  </div>
</div>
<?php endif;?>


<div id="layout" class="clearfix">
  <section id="layout-content">
