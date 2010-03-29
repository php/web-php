<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'searchbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/include/prepend.inc";

// Gecko would like to see the target to be _content, while IE/Opera would
// like to see the target to be _main. Other browsers are not expected
// to visit this page, or support for them will be added in the future.
if (preg_match("!Gecko!", $_SERVER['HTTP_USER_AGENT'])) {
    $target = ' target="_content"'; 
} else {
    $target = ' target="_main"';
}
if (isset($EXPL_LANG)) {
    $lang_input = "  <input type=\"hidden\" name=\"lang\" value=\"{$EXPL_LANG}\" />\n";
} else { $lang_input = ""; }

echo <<<SEARCHBAR_END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <title>PHP: Search Sidebar</title>
 <link rel="shortcut icon" href="{$_SERVER['STATIC_ROOT']}/favicon.ico" />
 <style type="text/css">@import url("{$_SERVER['STATIC_ROOT']}/styles/searchbar.css");</style>
 <base href="{$_SERVER['BASE_HREF']}" />
</head>
<body onload="document.sform.pattern.focus();">
<h1>
 <a href="/"{$target}>php</a> search
</h1>
<form method="post" action="/search.php"{$target} id="sform">
 <p class="input">$lang_input
  Search for<br />
  <input type="text" name="pattern" value="" /><br />
  in the<br />
  <select name="show">
   <option value="quickref" selected="selected">function list</option>
   <option value="all"      >all php.net sites</option>
   <option value="local"    >this mirror only</option>
   <option value="manual"   >online documentation</option>
   <option value="bugdb"    >bug database</option>
   <option value="news_archive">Site News Archive</option>
   <option value="changelogs">All Changelogs</option>
   <option value="pear"     >just pear.php.net</option>
   <option value="pecl"     >just pecl.php.net</option>
   <option value="talks"    >just talks.php.net</option>
   <option value="maillist" >general mailing list</option>
   <option value="devlist"  >developer mailing list</option>
   <option value="phpdoc"   >documentation mailing list</option>
  </select><br />
  <input type="submit" value="Search" />
 </p>
</form>
<p class="copyright">
 <a href="/copyright.php"{$target}>Copyright &copy; 2002 - 2010 The PHP Group</a><br />All rights reserved.
</p>
</body>
</html>
SEARCHBAR_END;
