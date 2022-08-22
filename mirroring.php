<?php
$_SERVER['BASE_PAGE'] = 'mirroring.php';
include_once __DIR__ . '/include/prepend.inc';
$SIDEBAR_DATA = '
<h3>Existing mirror sites</h3>
<p>
 Properly working mirror sites are listed on <a href="/mirrors.php">our
 mirrors page</a>.
</p>
';
/*
<h3>SVN repository mirroring</h3>
<p>
 If you are interested in using a local copy of our
 SVN repository for yourself, we provide
 <a href="/svnsync.php">svnsync instructions</a>
 separately.
</p>
';
*/

site_header(
    'Mirroring The PHP Website',
    [
        'current' => 'community',
        'layout_span' => 12,
    ]
);

?>
<h1>Mirroring The PHP Website</h1>

<p>
 The PHP project does no have an official mirror program anymore, but you can
 set-up a mirror for your own network or company.
</p>

<p>
 You should not synchronize from our network more frequently
 than once every six hours, or you may find your IP blocked. Also, please make
 an effort to only mirror those parts of the site that you actually need.
 (For example, <a href="#exclude">exclude the manual in all languages that you
 will not be using and exclude the distributions directory</a>.)
</p>

<h2>Get Files With Rsync</h2>

<p>
 First, you need to have a <a href="http://rsync.samba.org/">rsync</a>
 installed. 
 To synchronize your server with the appropriate rsync location, first view the <a
 href="/images/oidk.net-rsync-distribution-plan-may2012.png">coverage map</a>
 and identify which location your mirror should be using. Next, modify the
 following code for use with your mirror. Replace <code>YOUR_RRN_HOSTNAME</code>
 with your RRN's hostname as indicated by the coverage map and be sure to
 change <code>/your/local/path</code> with the path to where your php.net
 mirror will reside on the filesystem.
</p>

<pre class="info">
    rsync -avzC --timeout=600 --delete --delete-after \
      --include='distributions/*.exe' \
      YOUR_RRN_HOSTNAME::phpweb /your/local/path
</pre>

<a name="exclude"></a>
<p>
 If you only want to mirror mirror one language of the manual? Add:
</p>

<pre class="info">
    --include='manual/en/' --include='manual/en/**' --exclude='manual/**' --exclude='distributions/manual/**'
</pre>

<p>
 after <code>"--delete-after"</code> in the command line above (substituting your
 prefered language code in place of <code>'en'</code>). You can also exclude the
 whole distributions directory (and the related extra folder) by replacing
 <code>"--exclude='distributions/manual/**'"</code> with
 <code>"--exclude='distributions/**' --exclude='extra/**'"</code>.
</p>

<p>
 PHP mirror sites should provide the exact content coming from our servers,
 and must not be altered in any way unless explicitly stated in the mirroring
 guidelines. Failing to do will result in immediate termination and permanent
 expulsion of your participation in the program.
</p>

<h2>Add SQLite 3 Support</h2>

<p>
 <a href="http://www.sqlite.org">SQLite</a> is an embedded
 SQL database implementation that has very high performance for applications
 with low write concurrency. PHP mirrors can currently employ SQLite for URL
 shortcut lookups.
</p>

<p>
 There are a couple of SQLite 3 implementations in PHP. One is via the
 PDO extension by using the SQLite driver (pdo_sqlite, which is required).
 The other is via the SQLite3 extension. These extensions are both compiled
 into PHP by default. Note: Some Linux distributions disable many extensions
 in their package systems, including SQLite. Please make sure you install the
 "php5-sqlite" (or similar) package if using such a system.
</p>

<h2>Setup Apache VirtualHost</h2>

<p>
 Make sure your web server is set up to serve <code>.php</code> files as PHP
 parsed files. If it isn't, add the MIME type to your config.
</p>
<p class="warn">
 Please make sure you have turned off output compression for binary files.
</p>

<p>
 Create a VirtualHost entry, which looks something like:
</p>

<a name="settings"></a>
<pre class="info">
&lt;VirtualHost *-or-your-hostname-or-your-ip-here&gt;
     &lt;Directory /www/htdocs/phpweb&gt;
          # Do not display directory listings if index is not present,
          # and do not try to match filenames if extension is omitted
          Options -Indexes -MultiViews
     &lt;/Directory&gt;

     ServerName mymirror.example.com
     ServerAdmin yourname@example.com
     UseCanonicalName On

     # Webroot of PHP mirror site
     DocumentRoot /www/htdocs/phpweb

     # Log server activity
     ErrorLog logs/error_log
     TransferLog logs/access_log

     # Set directory index
     DirectoryIndex index.php index.html

     # Handle errors with local error handler script
     ErrorDocument 401 /error.php
     ErrorDocument 403 /error.php
     ErrorDocument 404 /error.php

     # Add types not specified by Apache by default
     AddType application/octet-stream .chm .bz2 .tgz .msi
     AddType application/x-pilot .prc .pdb

     # Set mirror's preferred language here
     SetEnv MIRROR_LANGUAGE "en"

     # The next two lines are only necessary if generating
     # stats (see below), otherwise you should comment them out
     Alias /stats/ /path/to/local/stats/
     SetEnv MIRROR_STATS 1

     # Apache2 has 'AddHandler type-map var' enabled by default.
     # Remove the comment sign on the line below if you have it enabled.
     # RemoveHandler var

     # Turn spelling support off (which would break URL shortcuts)
     &lt;IfModule mod_speling.c&gt;
       CheckSpelling Off
     &lt;/IfModule&gt;

     # A few recommended PHP directives
     php_flag display_errors off

     # If you have Russian Apache with mod_charset installed,
     # do not forget to search for this line in your existing
     # configuration, and comment it out:
     # AddHandler strip-meta-http .htm .html

&lt;/VirtualHost&gt;
</pre>

<p>
 When setting up the vhost, provide an asterisk, a hostname, or an IP
 address in the VirtualHost container's header (depending on whether
 you would like to make the vhost work for all IPs handled by Apache,
 or just a specific hostname/IP address). Consult
 <a href="http://httpd.apache.org/docs/vhosts/index.html">the Apache
 documentation</a> for the differences of the two methods.
</p>

<p>
 Change the DocumentRoot setting as appropriate,
 specify the mirror's preferred language, and provide settings according
 to your stats setup, if your mirror is going to provide stats. For the
 preferred language setting, choose one from those available as
 manual translations. If you provide something else, your default
 language will be English. After you restart Apache, your mirror
 site should start working.
</p>

<h2>Setting Up Local Stats</h2>

<p>
 Setting up local stats can be a plus on your mirror. We
 provide <a href="/mirroring-stats.php">some setup
 instructions for that</a>.
</p>

<h2>Setup Regular Updates</h2>

<p>
 You must also set up a cron job that periodically does an rsync to
 refresh your web directory. We prefer that all mirrors update from
 the appropriate RRN from the coverage map not more than once an hour, to
 speed up the distribution of updates to the site and available packages.
 Something like:
</p>

<pre class="info">
   5 * * * * rsync -avzC --timeout=600 --delete --delete-after --include='distributions/*.exe' YOUR_RRN_HOSTNAME::phpweb /your/local/path
</pre>

<p>
 Remember to specify the same rsync parameters you used to get the
 <code>phpweb</code> files as explained near the top of this page.
 If you're unable to synchronize every five minutes, you may pick
 your own update frequency, provided it does not exceed fifteen
 minutes.
</p>

<h2>Sponsor Logo</h2>

<p>
 We would like to thank you for providing a mirror, so
 if you would like to display a logo on the mirror site promoting your
 company, you are able to do so by following these steps:
</p>

<ul>
 <li>Create a 120 x 60 pixel sized logo button.</li>
 <li>Copy it to your <code>/www/htdocs/phpweb/backend</code> folder as <code>mirror.gif</code>, <code>mirror.jpg</code> or <code>mirror.png</code>.</li>
 <li>Go visit your mirror URL (e.g. http://foo.php.net/mirror.php) and check if it is there.</li>
</ul>

<p>
 The <a href="/credits.php">PHP Group</a> and the Network Infrastructure Manager reserve the
 right to refuse images based on content, but most things should be fine.
</p>

<p>
 We have chosen a banner size which conforms with the
 <a href="http://www.iab.net/standards/adunits.asp">Internet
 Advertising Bureau standards</a>.
</p>

<p>
 And finally, don't forget to put a nice little PHP logo somewhere
 on your hosting company's site if possible. Grab one of the logos
 from the <a href="/download-logos.php">logos download</a> page, and
 link it to your mirror.  This shows the community that you are a
 proud supporter of PHP and open source technology.
</p>

<h2>Mirror Setup Troubleshooting</h2>

<p>
 The <a href="/mirroring-troubles.php">mirror troubleshooting guide</a>
 contains information about the common and potential problems discovered
 when setting up and maintaining a PHP.net mirror. Included are links that
 perform many of the tests executed by the automated mirror management tools.
</p>

<p>
 There is a mailing list named <code>"php-mirrors"</code> at
 <code>lists.php.net</code>, to which you can subscribe.
 This mailing list is very low-traffic and only used for communication
 between mirror maintainers and php.net webmasters.
</p>
<p>
 To subscribe send an empty message
 to: <a href="mailto:php-mirrors-subscribe@lists.php.net">php-mirrors-subscribe@lists.php.net</a>
</p>

<p>
 <em>
  Thank you for your interest in providing a mirror!  If you ever have any
  questions or concerns, drop us a line at
  <a href="mailto:php-mirrors@lists.php.net">php-mirrors@lists.php.net</a>
  --- we are here to help!
 </em>
</p>

<?php site_footer(); ?>
