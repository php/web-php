<?php
$css_files = [
    '/fonts/Fira/fira.css',
    '/fonts/Font-Awesome/css/fontello.css',
        '/styles/variables.css',
    '/styles/theme-base.css',
    '/styles/theme-medium.css',
        '/styles/base.css',
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

$JS = [];
if (isset($config["js_files"])) {
    foreach($config['js_files'] as $filename) {
        $path = dirname(__DIR__) . '/' . $filename;
        $JS[$filename] = @filemtime($path);
    }
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

  <?php if (!empty($_SERVER["BASE_HREF"])): ?>
   <base href="<?php echo $_SERVER["BASE_HREF"]; ?>">
  <?php endif ?>

  <title><?php echo $title ?></title>

  <?php foreach($CSS as $filename => $modified): ?>
    <link rel="stylesheet" type="text/css" href="/cached.php?t=<?php echo $modified?>&amp;f=<?php echo $filename?>" media="screen">
  <?php endforeach ?>

 <link rel="icon" type="image/svg+xml" sizes="any" href="<?php echo $MYSITE ?>favicon.svg?v=2">
 <link rel="icon" type="image/png" sizes="196x196" href="<?php echo $MYSITE ?>favicon-196x196.png?v=2">
 <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $MYSITE ?>favicon-32x32.png?v=2">
 <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $MYSITE ?>favicon-16x16.png?v=2">
 <link rel="shortcut icon" href="<?php echo $MYSITE ?>favicon.ico?v=2">

 <link rel="search" type="application/opensearchdescription+xml" href="https://www.php.net/phpnetimprovedsearch.src" title="Add PHP.net search">
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

<?php foreach($JS as $filename => $modified): ?>
<script type="text/javascript" src="/cached.php?t=<?php echo $modified?>&amp;f=<?php echo $filename?>"></script>
<?php endforeach ?>

<?php if (!empty($_SERVER["BASE_HREF"])): ?>
 <base href="<?php echo $_SERVER["BASE_HREF"] ?>">
<?php endif ?>

<?php if (isset($config['meta_tags'])) { echo $config['meta_tags']; } ?>

<?php if (is_primary_site()) { ?>
<!-- Matomo -->
<script>
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(["setDoNotTrack", true]);
    _paq.push(["disableCookies"]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="https://analytics.php.net/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<!-- End Matomo Code -->
<?php } ?>
</head>
<body class="<?php echo $curr; ?> <?php echo $classes; ?>">
<header>
    <nav>
        <a href="/" aria-label="PHP Home" class="header-logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -1 100 50" fill="currentColor">
                <path d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"></path>
                <path d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0"></path>
                <path d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053"></path>
            </svg>
        </a>

        <div id="js-nav-menu" class="header-menu-container" aria-label="Menu">
            <div class="header-menu">
                <?php foreach (get_nav_items() as $entry) { ?>
                    <a href="<?= $entry->href ?>"><?= $entry->name ?></a>
                <?php } ?>
            </div>

            <div class="header-actions">
                <button type="button" id="navbar__search-button" class="header-button-search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path>
                    </svg>
                    Search documentation...
                    <kbd><kbd>/</kbd></kbd>
                </button>

                <?php if (!empty($config['language_switcher'])) { ?>
                    <div class="select header-languages">
                        <select onchange="location = this.value" aria-label="Select language">
                            <?php foreach ($config['language_switcher'] as $item) { ?>
                                <option value="<?= $item['url'] ?>"<?= $item['selected'] ? ' selected' : '' ?>><?= $item['name'] ?></option>
                            <?php } ?>
                        </select>

                        <svg viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                  clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                <?php } ?>

                <?php if (isset($config['theme_switcher']) && $config['theme_switcher']) { ?>
                    <button type="button" aria-label="Switch to system theme"
                            class="header-light-dark-mode-button js-theme-switcher">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                             class="">
                            <path fill="currentColor"
                                  d="M9.52734 16.7852h1.24996v2.5195H9.52734v-2.5195Zm-3.62304-1.501-1.78125 1.7812-.88477-.8838.44238-.4414.89746-.8984.44239-.4414.88379.8838Zm9.8223-.4424 1.3388 1.3398-.8838.8838-1.7812-1.7812.8838-.8838.4424.4414ZM6.61621 6.61621c1.95259-1.95249 5.11869-1.9524 7.07129 0 1.9526 1.95264 1.9526 5.11869 0 7.07129-1.9526 1.9527-5.11863 1.9527-7.07129 0-1.95241-1.9526-1.95253-5.11871 0-7.07129ZM12.8037 7.5C11.3393 6.03577 8.96445 6.03565 7.5 7.5c-1.46441 1.46444-1.46424 3.8393 0 5.3037 1.46451 1.4645 3.8393 1.4645 5.3037 0 1.4645-1.4644 1.4645-3.8392 0-5.3037ZM3.51953 9.52734v1.24996H1V9.52734h2.51953Zm15.78517 0v1.24996h-2.5195V9.52734h2.5195ZM5.9043 5.02051l-.88379.88379-1.78223-1.78223.88379-.88379L5.9043 5.02051Zm11.1611-.89746L15.2842 5.9043l-.8838-.88379.4414-.44239.8984-.89746.4414-.44238.8838.88477ZM9.52734 1h1.24996v2.51953H9.52734V1Z"></path>
                        </svg>
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                             class="hidden">
                            <path fill="currentColor" fill-rule="evenodd"
                                  d="M16.3206 11.5837c-.5616.1539-1.1526.2361-1.7622.2361-3.6772 0-6.65822-2.98106-6.65822-6.6583 0-.60954.08215-1.20052.23597-1.76214-2.85657.76023-4.96116 3.36465-4.96116 6.4606 0 3.69204 2.99298 6.68504 6.68499 6.68504 3.09602 0 5.70042-2.1046 6.46062-4.9613Zm.2115-1.3049c-.6124.2364-1.2779.366-1.9737.366-3.0283 0-5.48323-2.45498-5.48323-5.4833 0-.69574.12956-1.36121.36589-1.9736.11523-.29842.25567-.58423.41892-.8548.06807-.11277.14002-.22291.21582-.33019C10.004 2.00097 9.93212 2 9.85998 2c-.41211 0-.81677.03172-1.21172.09283C4.88261 2.67555 2 5.93113 2 9.85996 2 14.2009 5.51904 17.72 9.85998 17.72c3.92892 0 7.18452-2.8826 7.76722-6.6483.0611-.395.0928-.7996.0928-1.21174 0-.07214-.001-.14413-.003-.2158-.1073.07575-.2174.14773-.3302.2158-.2706.16324-.5563.30374-.8547.41884Z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                             class="hidden">
                            <path fill="currentColor" fill-rule="evenodd"
                                  d="M16.541 9.86c0 3.6898-2.9912 6.681-6.681 6.681V3.179c3.6898 0 6.681 2.99119 6.681 6.681ZM9.86 17.72c4.3409 0 7.86-3.5191 7.86-7.86C17.72 5.51904 14.2009 2 9.86 2 5.51904 2 2 5.51904 2 9.86c0 4.3409 3.51904 7.86 7.86 7.86Z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                <?php } ?>
            </div>
        </div>

        <div class="header-mobile-menu-button-container">
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <!-- Hamburger Icon -->
                <svg id="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                     aria-hidden="true">
                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
                <!-- Close Icon - hidden by default -->
                <svg id="close-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                     aria-hidden="true" class="hidden">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
        </div>
    </nav>
</header>

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
