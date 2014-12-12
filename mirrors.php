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
        <?php print_full_mirror_list() ?>
    </div>

</div>

<?php
site_footer();

