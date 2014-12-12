<?php
// $Id$

$_SERVER['BASE_PAGE'] = 'manual/help-translate.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
site_header("Help translate the PHP Manual");
?>

<h3>Looking for a translation?</h3>
<p>
The PHP Manual has over 30 translations already setup, but due to inactivity many have been taken offline. The odds are high that your language has already started a translation, but for various reasons it's no longer being updated or shown at php.net.
</p>

<h3>How to help translate the PHP Manual</h3>
<p>
If you're interested in helping translate a specific language, then please read the translation section of the <a href="http://doc.php.net/tutorial/">Guide for Manual Contributors</a> and contact the appropriate mailing list. Whether or not your language is shown below, you are very welcome to help translate the PHP Manual from English to another language.
</p>

<h3>Using outdated translations</h3>
<p>
The following list of languages already contain SVN modules, and will show up on the documentation development server. Warning: These translations are considered outdated, so content within each may be completely wrong or insecure!
</p>

<h3>Inactive languages already in SVN</h3>
<ul>
<?php
// $archived are manuals we have old versions of
$archived = array('da', 'kr', 'pl', 'tw');

foreach ($INACTIVE_ONLINE_LANGUAGES as $cc => $lang) {
    $link = 'no archive';
    if (in_array($cc, $archived)) {
        $link = '<a href="http://docs.php.net/manual/'. $cc .'">archive</a>';
    }
    echo '<li>', $lang, ': (', $link, ')</li>';
}
?>
</ul>

<?php
site_footer();
