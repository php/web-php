<?php
include_once 'prepend.inc';
include_once 'mirrortable.inc';
commonHeader("Mirror Sites");
?>

<h1>Mirror Sites</h1>

<p>
 Here you can find information about the mirrors of php.net. This page only
 lists the official mirrors, registered in our database. The mirrors automatically
 detected to be outdated or disfunctional are not listed for your convinience, so
 there may be a mirror (or some mirrors) with problems in your country additionaly
 to those listed here. Therefore if you cannot find mirror sites in your country
 here, or the mirror site you used seems to be disappeared, check back later.
</p>
<p>
 We would like to advice you to choose a mirror site close to use in your
 everyday work. All mirror sites are expected to provide the same service
 (with the possible exception of local search support, in which case the
 main site performs the search). This means that you don't loose anything,
 if you go with a local mirror site, but you gain speed. The current mirror
 is highlighted in the list below.
</p>
<p>
 If you are interested in hosting a mirror of this site,
 <?php print_link("/mirroring.php", "here's how"); ?>.
</p>

<?php
mirror_list();
commonFooter();
