<?php
$_SERVER['BASE_PAGE'] = 'elephpant.php';
include_once __DIR__ . '/include/prepend.inc';
site_header("ElePHPant", ["current" => "footer"]);
?>

<a id="copyright"></a>
<h1>ElePHPant</h1>

<p>
 The ElePHPant is the adorable, elephantine mascot of the PHP project.
 Occasionally, official stuffed toy elePHPants designed by
 <a href="http://www.elroubio.net">Vincent Pontier</a> are made available.
 You may have seen pictures of them (from
 <a href="https://www.flickr.com/groups/elephpants/">Flickr</a>) at the bottom
 of the php.net homepage. Beware of imitators.
</p>

<p>
 <img src="images/logos/elephpant-running-78x48.gif" alt="">
</p>

<p>
 For more information on the PHP Group and the PHP project, please see
 <a href="https://www.php.net/">the PHP homepage</a>.
</p>

<?php
// Print the common footer.
site_footer([
    'elephpants' => true,
]);
