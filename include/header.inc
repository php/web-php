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
<body class="<?php echo $curr; ?> <?php echo $classes; ?>">

<nav class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <a href="/" aria-label="PHP Home" class="brand">
      <img
        src="/images/logos/php-logo-white.svg"
        alt="PHP Logo"
        width="80"
        height="40"
      >
    </a>

    <div
      id="navbar-offcanvas"
      tabindex="-1"
      class="navbar-offcanvas"
      aria-label="Menu"
    >
      <button
        id="navbar-menu-btn-close"
        class="navbar-menu-btn navbar-menu-btn-close"
      >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
      </button>
      <ul class="navbar-nav">
        <li class="<?= $curr == "downloads" ? "active" : ""; ?>">
          <a href="/downloads">Downloads</a>
        </li>
        <li class="<?= $curr == "docs" ? "active" : ""; ?>">
          <a href="/docs.php">Documentation</a>
        </li>
        <li class="<?= $curr == "community" ? "active" : ""; ?>">
          <a href="/get-involved" >Get Involved</a>
        </li>
        <li class="<?= $curr == "help" ? "active" : ""; ?>">
          <a href="/support">Help</a>
        </li>
        <li class="navbar-release <?= $curr === "php8" ? "active" : ""; ?>">
          <a href="/releases/8.3/index.php">
            <img src="/images/php8/logo_php8_3.svg" alt="php8.3">
          </a>
        </li>
      </ul>
    </div>

    <div class="navbar-right">
        <button class="navbar-search-btn">Search</button>

        <button aria-label="Search" class="navbar-search-btn-mobile">
          <!-- https://feathericons.com search -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
        <button
          id="navbar-menu-btn-open"
          aria-label="Menu"
          class="navbar-menu-btn navbar-menu-btn-open"
        >
          <!-- https://pictogrammers.com/library/mdi/icon/menu/ -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg>
        </button>
      </div>
    </div>

    <div
      id="navbar-backdrop"
      class="navbar-backdrop"
    ></div>
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
