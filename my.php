<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'my.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Try to make this page non-cached
header_nocache();

// Languages array copy and options to list
$langs   = $ACTIVE_ONLINE_LANGUAGES;
$options = array();

// We have post data, and it is an available language
if (isset($_POST['my_lang']) && isset($langs[$_POST['my_lang']])) {
    
    // Set the language preference
    myphpnet_language($_POST['my_lang']);
    
    // Add this as first option, selected
    $options[] = '<option value="' . $_POST['my_lang'] . '" selected>' .
                 $langs[$_POST['my_lang']] . "</option>\n";
    
    // Remove, so it is not listed two times
    unset($langs[$_POST['my_lang']]);
}

// We have received a cookie and it is an available language
elseif (isset($langs[myphpnet_language()])) {

    // Add this as first option, selected
    $options[] = '<option value="' . myphpnet_language() . '" selected>' .
                 $langs[myphpnet_language()] . "</option>\n";
    
    // Remove, so it is not listed two times
    unset($langs[myphpnet_language()]);
}

// We have no cookie and no form submitted
else {
    // Add this as first option, selected
    $options[] = "<option value=\"not_set\" selected=\"selected\">Not Set</option>\n";
}

// Add all other languages
foreach ($langs as $code => $name) {
    $options[] = '<option value="' . $code . '">' . $name . "</option>\n";
}

// Assemble form from collected data
$langpref = "<select name=\"my_lang\">\n" .
            join("", $options) . "</select>\n";
            
// Save URL shortcut fallback setting
if (isset($_POST['urlsearch'])) {
    myphpnet_urlsearch($_POST['urlsearch']);
}

if (isset($_POST["showug"])) {
    myphpnet_showug($_POST["showug"] == "enable");
}

// Set preferred mirror site, prepare mirror array
if (isset($_POST['mirror'])) {
    myphpnet_mirror($_POST['mirror']);
}
$mirror_sites = $MIRRORS;
$mirror_sites["NONE"] = array(7 => MIRROR_OK);

myphpnet_save();

site_header("My PHP.net", array("current" => "community"));
?>

<form action="/my.php" method="post">
<h1>My PHP.net</h1>

<p>
 This page allows you to customize the PHP.net site.
</p>

<?php if (!is_official_mirror()) { ?>
<p class="warn">
 This is not an official PHP.net mirror site, and therefore the settings
 you set and see here will <strong>not</strong> be effective on any
 official PHP.net mirror site. The settings you specify here are only
 going to be active for this URL, and only if you have cookies enabled.
</p>
<?php } else { ?>
<p>
 These settings are cookie-based and will work on all official PHP.net
 mirror sites.
</p>
<?php } ?>

<h2>Preferred language</h2>

<p>
 If you use a shortcut or search for a function, the language used
 is determined by checking for the following settings. The list is
 in priority order, the first is the most important. Normally you don't
 need to set your preferred language, as your last seen language is
 always remembered, and is a good estimate of your preferred language
 most of the time.
</p>

<div class="indent">
<table border="0" cellpadding="3" cellspacing="2" class="standard">
<?php

// Data for the language settings table
$langinfo = array(
    
    "Your preferred language" =>
    $langpref,
    
    "Last seen language" =>
    (isset($_COOKIE['LAST_LANG']) ? htmlentities($_COOKIE['LAST_LANG'], ENT_QUOTES | ENT_IGNORE, 'UTF-8') : "None"),
    
    "Your Accept-Language browser setting" =>
    (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? htmlentities($_SERVER['HTTP_ACCEPT_LANGUAGE'], ENT_QUOTES | ENT_IGNORE, 'UTF-8') : "None"),
    
    "The mirror's default language" =>
    default_language(),
    
    "Default" => "en"
);

// Write a row for all settings
foreach ($langinfo as $lin => $lid) {
    echo " <tr>\n  <td class=\"sub\">" . $lin . "</td>\n";
    echo "  <td>" . $lid . "</td>\n </tr>\n";
}

?>
</table>
</div>

<p>
 These settings are only overridden in case you have passed a language
 setting URL parameter or POST data to a page or you are viewing a manual
 page in a particular language. In these cases, the explicit specification
 overrides the language selected from the above list.
</p>

<p>
 The language setting is honored when you use a
 <a href="/urlhowto.php">URL shortcut</a>, when you start
 a function list search on a non-manual page, when you visit
 the <a href="/download-docs.php">manual download</a> or
 <a href="/docs.php">language selection</a> pages, etc.
</p>

<h2>Your country</h2>

<p>
 The PHP.net site and mirror sites try to detect your country
 using the <a href="http://www.directi.com/?site=ip-to-country">Directi
 Ip-to-Country Database</a>. This information is used to mark
 the events in your country specially and to offer close mirror
 sites if possible on the download page and on the mirror listing
 page.
</p>

<div class="indent">
<?php
if (i2c_valid_country()) {
    echo "We detected that you are from <b>" . $COUNTRIES[$COUNTRY] . "</b>";
} else {
    echo "We were unable to detect your country";
}
?>
</div>

<h2>URL search fallback</h2>

<p>
 When you try to access a PHP.net page via a URL shortcut, and
 the site is unable to find that particular page, it falls back
 to a documentation search, or a function list lookup, depending on
 your choice. The default is a function list lookup, as most of
 the URL shortcut users try to access function documentation pages.
</p>

<div class="indent">
 Your setting: <input type="radio" name="urlsearch" value="quickref"
<?php
$type = myphpnet_urlsearch();
if ($type === MYPHPNET_URL_NONE || $type === MYPHPNET_URL_FUNC) {
    echo ' checked="checked"';
}
echo '> Function list search <input type="radio" name="urlsearch" value="manual"';
if ($type === MYPHPNET_URL_MANUAL) {
    echo ' checked="checked"';
}
?>
> PHP Documentation search
</div>

<h2>Mirror site redirection</h2>

<p>
 The php.net site redirects users to mirror sites in several cases
 automatically. It tries to find a close mirror first (a mirror in the
 user's country), and if no such mirror is found, it selects one mirror
 randomly. Here you can set one preferred mirror site for yourself in
 case you are not satisfied with the automatic selection.
</p>

<p>
 Please note that in case the site finds your preferred mirror site disabled
 for some reason, it will fall back to the automatic selection procedure, but
 will not alter your preferences, so next time when your selected server works,
 the redirections will lead you there. 
</p>

<div class="indent">
 <select name="mirror">
<?php
$mirror = myphpnet_mirror();
foreach ($mirror_sites as $murl => $mdata) {
    
    // Skip inactive mirrors
    if (mirror_status($murl) != MIRROR_OK ||
        $murl == "http://www.php.net/" || $murl == 'http://php.net/') { continue; }
    
    // Compute user friendly mirror name
    if ($murl == "NONE") {
        $mname = "Automatic selection (default)";
    } else {
        $tmpurl = " (" .substr($murl, strpos($murl, '//') + 2, -1). ")";
        if (isset($COUNTRIES[$mdata[0]])) {
            $mname = $COUNTRIES[$mdata[0]] . $tmpurl;
        } else {
            $mname = "Unknown" . $tmpurl;
        }
    }
    
    // Print out mirror option with selection if needed
    printf (
        "  <option value=\"$murl\"%s>$mname</option>\n",
        ($mirror == $murl ? ' selected="selected"' : '')
    );
}
?>
 </select>
</div>
<br>
<h2>User Group tips</h2>

<p>
We are experimenting with listing nearby user groups. This feature is highly experimental
and will very likely change a lot and be broken at times.
</p>
<label for="showugenable">Enable UG tips</label> <input type="radio" name="showug" id="showugenable" value="enable" <?php    echo myphpnet_showug() ? "checked=checked" : "" ?>><br>
<label for="showugdisable">Disable UG tips</label> <input type="radio" name="showug" id="showugdisable" value="disable" <?php echo myphpnet_showug() ? "" : "checked=checked" ?>>

<p class="center">
 <input type="submit" value="Set All Preferences">
</p>
</form>

<?php site_footer(); ?>
