<?php
include_once 'prepend.inc';
commonHeader("My PHP.net");

// Languages array copy and options to list
$langs = $LANGUAGES; $options = array();

// We have post data, and it is an available language
if (isset($_POST['my_lang']) && isset($langs[$_POST['my_lang']])) {
    
    // Set the language in a cookie for a year and for all *.php.net servers
    setcookie("MYPHPNET", $_POST['my_lang'], time() + 60*60*24*365, '/', '.php.net');
    
    // Add this as first option, selected
    $options[] = '<option value="' . $_POST['my_lang'] . '" selected>' .
                 $langs[$_POST['my_lang']] . "</option>\n";
    
    // Remove, so it is not listed two times
    unset($langs[$_POST['lang']]);
}

// We have recevied a cookie and it is an available language
elseif (isset($_COOKIE['MYPHPNET']) && isset($langs[$_COOKIE['MYPHPNET']])) {

    // Add this as first option, selected
    $options[] = '<option value="' . $_COOKIE['MYPHPNET'] . '" selected>' .
                 $langs[$_COOKIE['MYPHPNET']] . "</option>\n";
    
    // Remove, so it is not listed two times
    unset($langs[$_COOKIE['MYPHPNET']]);
}

// We have no cookie and no form submitted
else {
    // Add this as first option, selected
    $options[] = "<option value=\"not_set\" selected>Not Set</option>\n";
}

// Add all other languages
foreach ($langs as $code => $name) {
    $options[] = '<option value="' . $code . '">' . $name . "</option>\n";
}

// Assemble form from collected data
$langpref = "<form action=\"/my.php\" method=\"POST\">\n<select name=\"my_lang\">\n" .
            join("", $options) . "</select>\n<input type=\"submit\" value=\"Set\">\n</form>";

?>

<h1>My PHP.net</h1>

<p>
This page allows you to customize the PHP.net site to some degree
to your own liking. Currently you can only set the language you
prefer, thus overriding any other automatic language selection.
</p>

<p>
These settings will be active on all official PHP.net mirror sites,
and are stored using cookies, so you need to have cookies enabled
to let your settings work.
</p>

<h2>Preferred language</h2>

<p>
If you use a shortcut or search for a function, the language used
is determined by checking for the following settings. The list is
in priority order, the first is the most important.
</p>

<table border="0" cellpadding="3" cellspacing="2">
 <tr>
  <td bgcolor="#dddddd">Your preferred language</td>
  <td bgcolor="#eeeeee"><?php echo $langpref; ?></td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Last seen language</td>
  <td bgcolor="#eeeeee"><?php echo (isset($_COOKIE['LAST_LANG']) ? $_COOKIE['LAST_LANG'] : "None"); ?></td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Your Accept-Language browser setting (parsed)</td>
  <td bgcolor="#eeeeee"><?php echo join(", ", $UA_LANGS); ?></td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">The mirror's default language</td>
  <td bgcolor="#eeeeee"><?php echo default_language(); ?></td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Default</td>
  <td bgcolor="#eeeeee">en</td>
 </tr>
</table>

<p>
These settings are only overriden in case you have passed a language
setting URL parameter or POST data to a page or you are viewing a manual
page in a particular language. In these cases, the explicit specification
overrides the language selected from the above list.
</p>

<p>
The language setting is honored when you use an
<a href="/urlhowto.php">URL shortcut</a>, when you start
a function list search on a non-manual page, when you visit
the <a href="/download-docs.php">manual download</a> or
<a href="/docs.php">language selection</a> pages, etc.
</p>

<?php commonFooter(); ?>
