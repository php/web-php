<?php
require_once 'prepend.inc';
commonHeader("Thanks");
?>

<h1>Thanks</h1>

<p>
<?php print_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS"); ?> provides
DNS services for the php domains.
</p>

<p>
<?php print_link("http://promote.pair.com/direct.pl?php.net", "pair Networks"); ?> provides
the servers and bandwidth for CVS and mailing list services.
</p>

<p>
<?php print_link("http://www.rackshack.net/", "RackShack"); ?> provides
the server and bandwidth for www.php.net.
</p>

<p>
<?php print_link("http://www.rackspace.com/", "Rackspace"); ?> provides
the server and bandwidth for various php.net websites.
</p>

<p>
<?php print_link("http://vasoftware.com/", "VA Software Corporation"); ?> provides
the server and bandwidth that run various services for php.net.
</p>

<p>
And special thanks to all the companies who donate server space and bandwidth to host
our international array of <?php print_link("/mirrors.php", "mirror sites");?>.
</p>

<h1>Thanks Emeritus</h1>
<p>Special 'legacy' thanks go to the people and companies who have helped us in our past.</p>

<p><?php print_link("http://www.synacor.com", "Synacor"); ?> provided us with many terabytes of 
bandwidth and hosting for www.php.net and others for many years. PHP.net is very grateful for all their support.
</p>

<p><?php print_link("http://www.vasoftware.com", "VA Software Corp."); ?> helped us by donating a server and resources
to enable us to build manuals and distribute our content via rsync. We appreciate all their support.</p>

<?php commonFooter(); ?>
