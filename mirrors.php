<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'mirrors.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/mirrortable.inc';
site_header("Mirror Sites");
?>

<h1>Mirror Sites</h1>

<p>
 Here you can find information about the mirrors of PHP.net. This page only
 lists the official mirrors, registered in our database. The mirrors automatically
 detected to be outdated or disfunctional are not listed for your convinience, so
 there may be a mirror (or some mirrors) with problems in your country additionaly
 to those listed here. Therefore if you cannot find mirror sites in your country
 here, or the mirror site you used seems to be disappeared, check back later.
</p>
<p>
 We suggest you to choose a mirror site geographically close to you. All mirror sites
 are expected to provide the same service. This means that you don't lose anything
 if you go with a local mirror site, but you gain speed. The current mirror is
 highlighted in the list below.
</p>
<p>
 If you are interested in hosting a mirror of this site,
 <a href="/mirroring.php">read our mirroring page</a>.
</p>

<?php
mirror_list();
site_footer();
