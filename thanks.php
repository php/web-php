<?
require_once 'prepend.inc';
commonHeader("Thanks");
?>

<h1>Thanks</h1>

<p>
<? print_link("http://chek.com/", "Chek.com"); ?> provides the server and 
bandwidth that run the main www.php.net mirror site.
</p>

<p>
<? print_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS"); ?> provides
DNS services for the php.* domains.
</p>

<p>
<? print_link("http://www.pair.com/", "pair Networks"); ?> provides
the server and bandwidth for CVS and mailing list services.
</p>

<p>
<? print_link("http://valinux.com/", "VA Linux Systems"); ?> provides the server and 
bandwidth that run various services for php.net.
</p>

<p>
And special thanks to all the companies who donate server space and bandwidth to host
our international array of <? print_link("/mirrors.php", "mirror sites");?>.
</p>

<? commonFooter(); ?>
