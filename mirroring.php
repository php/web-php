<?php
require_once 'prepend.inc';

commonHeader("Mirroring php.net");
?>

<p>
If you want to become an official PHP mirror, please be sure to
read and follow these instructions carefully. You should have the
consent of your hosting company (if you aren't a hosting company
yourself), and be prepared for some reasonably significant bandwidth
usage (a reasonable estimate as of 2/2002 is 150MB/day). The PHP
website requires PHP 4 with the settings <a href="#settings">outlined
bellow</a>.
</p>

<p>
<strong>Please note that we are currently only accepting new official
mirrors in countries where we don't already have two active official
mirrors. For a list of official mirrors have a look at
<a href="/mirrors.php">mirrors.php</a>.</strong>
</p>

<p>
If you are not an official mirror (eg. mirror the site for your company's
internal use), you should not rsync from <tt>rsync.php.net</tt> more frequently
than every three hours, or you may find your ip blocked. Also, please make
an effort to only mirror those parts of the site that you actually need.
(For example, <a href="#exclude">exclude the manual in all of languages that you
will not be using and exclude the distributions directory</a>.)
</p>

<h1>How To Mirror The PHP Website</h1>

<p>
First, you need to have a <a href="http://rsync.samba.org/">rsync</a> installed.
As you have rsync, fetch the web files with the following:
</p>

<pre>
    rsync -avzC --timeout=600 --delete --delete-after \
      rsync.php.net::phpweb /your/local/path 
</pre>

<a name="exclude"></a>
<p>
Setting up an unofficial mirror, and want to only mirror one
language of the manual? Add:
</p>

<pre>
    --include='manual/en/' --include='manual/en/**' --exclude='manual/**'
</pre>

<p>
after <tt>"--delete-after"</tt> in the command line above (substituting your
prefered language code in place of <tt>'en'</tt>). You can also exclude the
distributions directory by adding <tt>"--exclude='distributions/'"</tt>
</p>

<p>
If <tt>/your/local/path</tt> isn't in your web document tree (why isn't it?), 
then symlink the <tt>phpweb/</tt> directory to the correct place on your server.
</p>

<p>
Now, make sure your web server is set up to serve up <tt>.php</tt> files
as PHP parsed files. If it isn't, add the mime-type to your config.
</p>

<p>
Rename the <tt>configuration.inc-dist</tt> file to <tt>configuration.inc</tt>
and edit it appropriately.
</p>

<p>
Once you create a virtualhost which looks something like:
</p>

<a name="settings"></a>
<pre>
   &lt;VirtualHost your-hostname-here&gt;
     ServerName your-hostname-here
     ServerAlias xx.php.net www.xx.php.net
     ServerAdmin yourname@yourdomain.com
     DocumentRoot /www/htdocs/phpweb
     php_value include_path .:/www/htdocs/phpweb/include
     php_flag register_globals on
     ErrorLog logs/error_log
     TransferLog logs/access_log
     DirectoryIndex index.php index.html
     ErrorDocument 404 /error/index.php
     ErrorDocument 403 /error/index.php
     AddType application/octet-stream .chm
     AddType application/octet-stream .bz2
     # next line is only necessary if generating stats (<a href="/stats/README.stats">see stats/README.stats</a>)
     Alias /stats/ /path/to/local/stats/
   &lt;/VirtualHost&gt;
</pre>
   
<p>
modified to reflect your local paths and country, of course,
then your site should start working.
</p>

<p>
The official names for PHP mirrors are in the convention:
<tt>"xx.php.net"</tt>, where <tt>"xx"</tt> is replaced by the
2-letter country code of your mirror's location. If there already
is a <tt>"xx.php.net"</tt>, then you should set up your <tt>ServerName</tt>
to be <tt>"xx2.php.net"</tt>. For a list of what's available and what
is taken, have a look at the <a href="/mirrors.php">list of mirrors</a>.
</p>

<p>
You must also set up a cron job that periodically does an rsync
to refresh your web directory. This will ensure that your web site
is up to date. Something like:
</p>

<pre>
   23 * * * * /usr/local/bin/rsync -avzC --delete --delete-after rsync.php.net::phpweb /your/local/path
</pre>

<p>
You should try to stagger your times a bit from the example to help spread the
load on the <tt>rsync.php.net</tt> server.
</p>

<h1>Data Registered About Official Mirrors</h1>

<p>
Once you have done the above and your site appears to work, send
a message to mirrors@php.net with the following information, and
appropriate steps will be taken to integrate your mirror site:
</p>

<ul>
 <li>Your name and email address as the admin for the mirror.</li>
 <li>Your country (we will update the DNS for php.net).</li>
 <li>A hostname that we can use as a CNAME for the country-code-based
  name of the mirror. This is preferable to an IP address, because
  it means you can move the mirror to another IP address without
  coordinating with us at all.</li>
 <li>Whether or not you've installed local searching support on
  your mirror. This uses <a href="http://www.htdig.org">ht://Dig</a>,
  for which setup instructions can be found in
  <a href="/Mirrors-htdig.tgz">Mirrors-htdig.tgz</a></li>
 <li>Whether or not you've installed local stats support on your mirror.
  This uses webalizer, for which instructions for setting it up
  can be found in <a href="/stats/README.stats">stats/README.stats</a></li>
 <li>The name of your hosting company.</li>
 <li>The URL of the site that hosts the mirror. This is where you want
  people will go when they click on the link for your mirror at the
  bottom of each page.</li>
 <li>The preferred default language for your country (currently only
  the manuals are translated). Don't worry if there's no content
  available in the preferred language yet, so long as English is
  an acceptable secondary default.</li>
</ul>

<p>
There is a mailing list named <tt>"php-mirrors"</tt> at
<tt>lists.php.net</tt>. It is not required to sign up to
this mailing list. Besides the name, the traffic on this
list is mainly interesting for the webmasters of php.net,
and we are able to keep in touch with you using your given
email address. Anyway if you would like to follow what's
happening, you can subscribe, by sending an empty message
to: <a href="mailto:php-mirrors-subscribe@lists.php.net">php-mirrors-subscribe@lists.php.net</a>
</p>

<p>
We would like to thank you for providing php.net with a mirror, so
if you would like to display a logo on the site promoting your mirror,
you are able to do so by following these steps:
</p>

<ul>
 <li>Create a 120 x 60 pixel sized logo button.</li>
 <li>Copy it to your <tt>/www/htdocs/phpweb/backend</tt> as <tt>mirror.gif</tt>, <tt>mirror.jpg</tt> or <tt>mirror.png</tt>.</li>
 <li>Go visit your mirror URL and check if it's there.</li>
</ul>

<p>
The PHP Group do reserve the right to refuse images based on content, but
most things should be fine.
</p>

<p>
We have chosen a banner size that go along with the
<a href="http://www.iab.net/iab_banner_standards/bannersizes.html">Internet
Advertising Bureau standards</a>.
</p>

<p>
And finally, don't forget to put a nice little PHP logo somewhere
on your hosting company's site if possible. Grab one of the logos
from the <a href="/download-logos.php">Download logos</a> page, and
link it to your mirror.
</p>

<p>
<em>Thank you for being a mirror!</em>
</p>

<?php
commonFooter();
?>
