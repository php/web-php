<?php
include_once 'prepend.inc';
commonHeader("Mirroring php.net");
?>

<p>
 If you want to become an official PHP mirror, please be sure to
 read and follow these instructions carefully. You should have the
 consent of your hosting company (if you aren't a hosting company
 yourself), and be prepared for some reasonably significant bandwidth
 usage (a reasonable estimate as of 2/2002 is 150MB/day). The PHP
 website requires PHP 4 with the settings <a href="#settings">outlined
 below</a>. The size of the full website is approximately 3/4 gigabytes.
</p>

<a name="rule"></a>
<p>
 <strong>
  Please note that we are currently only accepting new official
  mirrors in countries where we don't already have two active official
  mirrors. For a list of official mirrors have a look at
  <a href="/mirrors.php">mirrors.php</a>. Before you start to set up
  an official mirror site, it is advisable to contact <a
  href="mailto:mirrors@php.net">mirrors@php.net</a>, and ask if you
  have chance to get your mirror site accepted. We would not like
  to put too much pressure on our rsync server, so we need to limit
  the number of mirror sites.
 </strong>
</p>

<p>
 If you are not an official mirror (eg. mirror the site for your company's
 internal use), you should not rsync from <tt>rsync.php.net</tt> more frequently
 than every three hours, or you may find your ip blocked. Also, please make
 an effort to only mirror those parts of the site that you actually need.
 (For example, <a href="#exclude">exclude the manual in all languages that you
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
 Create a virtualhost which looks something like:
</p>

<a name="settings"></a>
<pre>
   &lt;VirtualHost *-or-your-hostname-here&gt;
     ServerName *-or-your-hostname-here
     ServerAlias xx.php.net www.xx.php.net
     ServerAdmin yourname@yourdomain.com
     
     # Webroot of PHP mirror site
     DocumentRoot /www/htdocs/phpweb
     
     # These PHP settings are necessary to run a mirror
     php_value include_path .:/www/htdocs/phpweb/include
     php_flag register_globals on
     
     # Log server activity
     ErrorLog logs/error_log
     TransferLog logs/access_log
     
     # Set directory index
     DirectoryIndex index.php
     
     # Handle errors with local error handler script
     ErrorDocument 401 /error/index.php
     ErrorDocument 403 /error/index.php
     ErrorDocument 404 /error/index.php
     
     # Add types not specified by Apache by default
     AddType application/octet-stream .chm
     AddType application/octet-stream .bz2
     AddType application/x-pilot .prc .pdb 

     # The next line is only necessary if 
     # generating stats (see /stats/README.stats)
     Alias /stats/ /path/to/local/stats/

     # The next lines are only necessary if you would
     # like to provide local search support (see /Mirrors-htdig.tgz)
     SetEnv HTSEARCH_PROG /local/htdig/bin/htphp.sh
     SetEnv HTSEARCH_EXCLUDE "/print/ /printwn/ /manual/howto /cal.php"

   &lt;/VirtualHost&gt;
</pre>
   
<p>
 Provide an asterisk or a hostname in the VirtualHost container's
 header and in the ServerName directive. Consult the Apache
 documentation for differences of the two methods. Change the
 DocumentRoot and include_path settings as appropriate, and
 provide settings according to your local search and stats
 setup, if your mirror is going to provide these. After you
 restart Apache, your mirror site should start working.
</p>

<p>
 The official names for PHP mirrors are in the convention:
 <tt>"xx.php.net"</tt>, where <tt>"xx"</tt> is replaced by the
 2-letter country code of your mirror's location. If there already
 is a <tt>"xx.php.net"</tt>, then you will probably get
 <tt>"xx2.php.net"</tt>. <a href="#rule">Please read the note in
 bold above</a>.
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
 You should try to stagger your times a bit from the example to help
 spread the load on the <tt>rsync.php.net</tt> server. Don't be afraid
 if you cannot find several pieces of the site in your local copy,
 like the tutorial PHP page or the printed pages' directories. These
 are handled automatically on the fly and are not real files.
</p>

<h1>Data Registered About Official Mirrors</h1>

<p>
 Once you have done the above and your site appears to work, send
 a message to <a href="mailto:mirrors@php.net">mirrors@php.net</a>
 with the following information, and appropriate steps will be taken
 to integrate your mirror site:
</p>

<ul>
 <li>
  Your country.
 </li>
 <li>
  The xx.php.net address you used to set up the mirror site.
 </li>
 <li>
  Your name and email address to be registered as the admin of the mirror.
 </li>
 <li>
  A hostname that we can use as a CNAME for the country-code-based
  name of the mirror. Please do not provide an IP address. Using a name
  means you can move the mirror to another IP address without
  coordinating with us at all.
 </li>
 <li>
  Whether or not you've installed local searching support on
  your mirror. This uses <a href="http://www.htdig.org">ht://Dig</a>,
  for which setup instructions can be found in
  <a href="/Mirrors-htdig.tgz">Mirrors-htdig.tgz</a>
 </li>
 <li>
  Whether or not you've installed local stats support on your mirror.
  This uses <a href="http://www.mrunix.net/webalizer/">webalizer</a>,
  for which instructions for setting it up can be found in
  stats/README.stats.
 </li>
 <li>
  The name of the hosting company.
 </li>
 <li>
  The URL of the hosting company. This link is provided with the
  companies name at the bottom of pages, and in the mirror listing.
 </li>
 <li>
  The preferred default language for your country. Currently only
  the manuals are translated. If there is no manual in your language,
  then we will set the default language for your mirror to English for
  now. If you see a new manual language showing up, which fits your
  mirror better, then please contact us to modify your mirror
  information.
 </li>
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
 if you would like to display a logo on the mirror site promoting your
 company, you are able to do so by following these steps:
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
 We have chosen a banner size which conforms with the
 <a href="http://www.iab.net/standards/adunits.asp">Internet
 Advertising Bureau standards</a>.
</p>

<p>
 And finally, don't forget to put a nice little PHP logo somewhere
 on your hosting company's site if possible. Grab one of the logos
 from the <a href="/download-logos.php">Download logos</a> page, and
 link it to your mirror.
</p>

<p>
 <em>
  Thank you for being a mirror!
 </em>
</p>

<?php commonFooter(); ?>
