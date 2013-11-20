<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'mirrors.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/layout.inc';

$header_config = array(
    'current' => 'community',
    'css'     => array('mirror.css')
);
site_header("Mirror Sites", $header_config);

function print_mirror_box($countryname, $countrycode, $country, $homecountry = false) {
?>
    <div class="mirror <?php echo $homecountry ? "homecountry" : ""?>">
            <div class="title"><?php echo $countryname; ?>
                <img alt="<?php echo $countrycode; ?>"
                     height="25"
                     width="45"
                     src="<?php echo $_SERVER['STATIC_ROOT'] . '/images/flags/beta/' . strtolower($countrycode) . '.png'; ?>">
            </div>
            <?php foreach($country as $mirror): ?>
            <div class="entry">
                <div class="url"><a href="<?php echo $mirror['url']; ?>" title="<?php echo clean($mirror['url']); ?>"><?php echo clean($mirror['url']); ?></a></div>
                <div class="provider"><a href="<?php echo $mirror['provider_url']; ?>" title="<?php echo clean($mirror['provider_title']); ?>"><?php echo clean($mirror['provider_title']); ?></a></div>
            </div>
            <?php endforeach; ?>
        </div>
<?php
}

// Lets group the mirrors by country code, for easy output on the page.
$grouped_mirrors = array();
foreach($MIRRORS as $key => $mirror) {

    // If the mirror is not all right or it is virtual (not an official mirror), skip it
    if (mirror_status($key) != MIRROR_OK || mirror_type($key) == MIRROR_VIRTUAL) { continue; }

    if(!isset($grouped_mirrors[$mirror[0]])) {
        $grouped_mirrors[$mirror[0]] = array();
    }

    $grouped_mirrors[$mirror[0]][] = array(
        'url'            => $key,
        'country_code'   => $mirror[0],
        'provider_title' => $mirror[1],
        'provider_url'   => $mirror[3]
    );
}

$close = count_mirrors($COUNTRY);
?>
<div id="mirrors-container">

    <h1 class="title">Mirror Sites</h1>

    <div class="mirrors-header">
        <p>
         Listed below are the official, active, and fully functional PHP.net mirrors.
         Some mirrors might be missing from this list because mirrors are
         automatically deactivated when problems arise.  Mirrors are continuously
         checked and reactivated when appropriate.
        </p>
        <p>
         We suggest you <a href="my.php">choose</a> a PHP.net mirror that is
         geographically close to you. All mirrors provide identical features and
         services, with the only difference being the increased speed that close
         mirrors provide. Your current mirror is highlighted in the list below.
        </p>
        <p>
         If you are interested in hosting a mirror of this site,
         <a href="/mirroring.php">read our mirroring page</a>.
        </p>
    </div>

    <div class="mirrors-list">
<?php if ($close) {
    $mnum = (($close > 1) ? "mirrors" : "mirror");
    echo "<p>We have automatically detected the following $mnum to be close to you</p>";

    if (isset($grouped_mirrors[$COUNTRY])) {
        print_mirror_box($COUNTRIES[$COUNTRY], $COUNTRY, $grouped_mirrors[$COUNTRY], 1);
        echo "<br />";
    }
}
?>

    <?php foreach($grouped_mirrors as $mirrorcode => $country): ?>
        <?php print_mirror_box($COUNTRIES[$mirrorcode], $mirrorcode, $country) ?>
    <?php endforeach ?>

    </div>

</div>

<?php
site_footer();

