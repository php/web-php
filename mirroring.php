<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'mirroring.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
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
    array(
        'current' => 'community',
        'layout_span' => 12,
    )
);

?>
<h1>Mirroring The PHP Website</h1>

<p>
 If you would like to participate in the official PHP mirrors program,
 please read and follow these instructions carefully. You should have
 the consent of your hosting company (if you aren't a hosting company
 yourself), and be prepared for some potentially significant bandwidth
 usage. As of 25 September, 2013, the network of mirrors is averaging
 251GB per day (about 7.52TB per month). At the time of the updating
 of this page, this load was spread across 90 active mirrors, indicating
 an overall average of 2.9GB per mirror.  This can go up to 12GB per
 day or more for busy mirrors, such as those in the US, UK, and India.
 And immediately following new releases of PHP, the traffic spikes even
 higher (as should be expected) due to a surge in the number of downloads.
 Please be sure your server or hosting account is able to handle a minimum
 of roughly 42 gigabytes of transfer each month without incurring any
 additional costs or penalties, as the mirrors with the fewest requests
 per month are still averaging this amount of bandwidth usage per month.
 In the event that such action is taken against your account, remember:
 it is your responsibility.
</p>

<p>
 Official mirror program participants are required to use PHP 5.3.21 or
 greater, but please note that we encourage maintainers to always use the
 latest stable versions of actively-developed branches.  Please note that
 we do, somewhat regularly (about once per year) require existing
 maintainers to upgrade their PHP versions to a new minimum, so always
 being proactive in upgrades will ensure that your mirror remains in
 compliance with the official mirrors program. Set it up as an Apache
 module with the settings <a href="#settings">outlined below</a>, or in
 any other Apache connected way (CGI, FastCGI, etc), considering the
 requested PHP settings outlined below in the Apache vhost instructions.
 The size of the full website is approximately 4.7 gigabytes.
</p>

<p>
 <b>NOTE:</b> Some of our maintainers prefer to use web servers other
 than Apache, such as <a href="http://wiki.nginx.org/Main" target="_blank">Nginx</a>.
 While this is permitted (as long as everything ultimately works as
 directed), we do not officially support these setups at this time.
 If you would like to learn how to set up an alternative environment,
 feel free to post a question to current mirror maintainers on the
 mailing list at <a href="mailto:php-mirrors@lists.php.net">php-mirrors@lists.php.net</a>.
</p>

<p>
 Applications to join the official mirror program are reviewed on a
 case-by-case basis, but we will only approve those from ISPs and web
 hosting providers; universities and state-recognized academic institutions;
 PHP-centric web development firms; and PHP user groups and individual
 enthusiasts.  Under no circumstances will we even review applications from
 marketing firms, website portals or directories, or anything of
 questionable moral or legal standing.  We also reserve the right, at our
 discretion, and without warning, to refuse any application for any reason,
 or to suspend or expell any active mirrors if it is discovered that any
 information on the application was false or otherwise incorrect, or if
 the mirrors fails to remain in compliance with the official mirrors program.
</p>

<a name="rule"></a>
<p class="warn">
 Please note that we are currently only accepting new applications for
 countries in which we don't already have two official mirror presences.
 For a list of active official mirrors, see <a href="/mirrors.php">mirrors.php</a>.
 Prior to attempting to set up an official mirror site, you are advised to contact <a
 href="mailto:php-mirrors@lists.php.net">php-mirrors@lists.php.net</a> (a public
 mailing list, archived in numerous places on the Internet) to inquire as to
 whether or not your application may be accepted. We have found that this limit
 serves our users well, so please do not ask to provide a third mirror for a country
 that already has two.  Please also be aware that the mirror is required to be
 physically located in the country you would like to serve.  If there are already
 two mirrors in a country for which you would like to provide an official mirror,
 you may add your information to the official waiting list, which can be found
 <a href="http://php.parasane.net/mirrors/waitinglist.php">here</a>.  If and when
 a vacancy becomes available, we will go through the applications on the waiting
 list before entertaining new public applications.
</p>

<p>
 If you are not an official mirror (e.g. you mirror the site for your company's
 internal use), you should not synchronize from our network more frequently
 than once every six hours, or you may find your IP blocked. Also, please make
 an effort to only mirror those parts of the site that you actually need.
 (For example, <a href="#exclude">exclude the manual in all languages that you
 will not be using and exclude the distributions directory</a>.)
</p>

<h2>Get Files With Rsync</h2>

<p>
 First, you need to have a <a href="http://rsync.samba.org/">rsync</a>
 installed.  To better serve our official mirror providers and maintainers,
 we switched to a geographically-decentralized distribution architecture.  By
 switching from a single United States-based master server to three Regional
 Rsync Nodes (RRNs), we're able to reduce the amount of latency and time to
 transfer data between an RRN and a mirror, serve more requests per hour
 (allowing for a closer to real-time network update globally), and provide
 redundancy in the event of an outage of a sync server.
</p>

<p>
 To synchronize your server with the appropriate RRN, first view the <a
 href="/images/oidk.net-rsync-distribution-plan-may2012.png">coverage map</a>
 and identify which RRN your mirror should be using.  Next, modify the
 following code for use with your mirror.  Replace <code>YOUR_RRN_HOSTNAME</code>
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
 Setting up an unofficial mirror, and want to only mirror one
 language of the manual? Add:
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
 Official PHP mirror sites should provide the exact content coming from our servers,
 and must not be altered in any way unless explicitly stated in the mirroring
 guidelines. Failing to do will result in immediate termination and permanent
 expulsion of your participation in the program.
</p>

<h2>Add SQLite 3 Support</h2>

<p>
 <a href="http://www.sqlite.org">SQLite</a> is an embedded
 SQL database implementation that has very high performance for applications
 with low write concurrency. PHP mirrors currently employ SQLite for URL
 shortcut lookups, and it is a requirement of all official mirrors to have
 it installed and available to PHP.
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

     ServerName ccx.php.net
     ServerAlias cc.php.net www.php.net the.cname.you.set.up.example.com
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
 You should only start to set up an Apache VirtualHost for an official
 mirror if you have <a href="#rule">contacted us first</a> and received
 the permanent names for your mirror. The names for all official PHP mirrors
 are in the convention: <code>ccx.php.net</code>, where <code>cc</code>
 stands for the 2-letter ISO country code of your mirror's location and
 <code>x</code> is an incremental identifier for the mirrors of that country.
 Do not assume that you know the code you will receive until your application
 has been reviewed and approved, and do not submit an application saying, for
 example, "We are applying to become DE1.PHP.NET."  It's possible that the
 mirror already exists, but is experiencing issues that have it temporarily
 removed from active rotation, and delisted from the roster of mirrors. We do
 not want anyone to waste their time only to have their application altered
 or rejected. The mirrors should also listen for the <code>cc.php.net</code>
 hostname, as we moved to providing a simple load-balancing solution:
 <a href="http://en.wikipedia.org/wiki/Round-robin_DNS">round-robin DNS</a>.
 All mirrors are required to be configured for both CC and CCX, so any active
 mirror can receive traffic for their respective <code>cc.php.net</code>
 hostname, thus providing redundancy and improved uptime for visitors.
</p>

<p>
 Before adding new official mirrors to our DNS, we require the maintainers
 to set up the mirrors with an address we can use as a CNAME in the DNS.
 This subdomain (<code>the.cname.you.set.up.example.com</code> in the above
 example) will be checked by mirror admins before the mirror is added.
 Therefore it is important that the mirror is capable of serving requests
 for this name and the <code>(www.)cc(x).php.net</code> address provided by the
 mirror administrators.
</p>

<p class="warn">
 The hostname you provide to us must be a configured hostname to be entered
 into our DNS as a CNAME, not an IP address to be used as an A record. Your
 local DNS information may then translate into both IPv4 and IPv6, should
 you so desire and have the capabilities, but may not exclude IPv4 from the
 record until further notice.
</p>

<p>
 When setting up the vhost, provide an asterisk, a hostname, or an IP
 address in the VirtualHost container's header (depending on whether
 you would like to make the vhost work for all IPs handled by Apache,
 or just a specific hostname/IP address). Consult
 <a href="http://httpd.apache.org/docs/vhosts/index.html">the Apache
 documentation</a> for the differences of the two methods. It is very
 important to use your <code>ccx.php.net</code> address as the ServerName, so
 URL redirections will keep the requests in the php.net domain, ensuring
 that the My PHP.net service will work.  Failure to do so will also cause
 your mirror to show up as an unofficial mirror, and to be removed from the
 roster page.
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
 the appropriate RRN from the coverage map every five minutes, to
 speed up the distribution of updates to the site and available packages.
 Something like:
</p>

<pre class="info">
   */5 * * * * rsync -avzC --timeout=600 --delete --delete-after --include='distributions/*.exe' YOUR_RRN_HOSTNAME::phpweb /your/local/path
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
 proud supporter of PHP and open source technology, and you will be
 worshipped every hour, on the hour, in song and dance, by millions of
 <a href="http://en.wikipedia.org/wiki/Proboscis_monkey" target="_blank">proboscis monkeys</a>
 the world over.  Well, okay, perhaps not.... but folks will certainly
 appreciate your generosity and support!
</p>

<h2>Mirror Setup Troubleshooting</h2>

<p>
 The <a href="/mirroring-troubles.php">mirror troubleshooting guide</a> 
 contains information about the common and potential problems discovered 
 when setting up and maintaining a PHP.net mirror. Included are links that 
 perform many of the tests executed by the automated mirror management tools.
</p> 

<h2>Data Registered About Official Mirrors</h2>

<p>
 Once you have done the above and your site appears to work, send a message
 to <a href="mailto:php-mirrors@lists.php.net">php-mirrors@lists.php.net</a>
 with the following information, and appropriate steps will be taken to
 integrate your mirror site:
</p>

<ul>
 <li>
  Your country.
 </li>
 <li>
  The ccx.php.net address you used to set up the mirror site, which
  you obtained previously in a conversation with the mirror admins.
 </li>
 <li>
  Your name and email address to be registered as the admin of the mirror.
 </li>
 <li>
  A hostname that we can use as a CNAME for the country-code-based
  name of the mirror (<code>the.cname.you.set.up.example.com</code> in the
  above setup example). Using a name means you can move the mirror to
  another IP address without coordinating with us at all (though, obviously,
  it must still be in the country you intend to serve).
 </li>
 <li>
  Whether or not you've installed local stats support on your mirror.
 </li>
 <li>
  The name of the sponsor approved previously by mirror program staff.
 </li>
 <li>
  The URL of the sponsor. This link is provided with the sponsor's name
  at the bottom of pages, with the sponsor image on the front page and
  in the mirror listing.
 </li>
</ul>

<p>
 There is a mailing list named <code>"php-mirrors"</code> at
 <code>lists.php.net</code>, to which you are required to subscribe.
 This mailing list is very low-traffic and only used for communication
 between mirror maintainers and php.net webmasters, and to provide
 automatic information on mirror outages and other issues.
</p>
<p>
 To subscribe send an empty message
 to: <a href="mailto:php-mirrors-subscribe@lists.php.net">php-mirrors-subscribe@lists.php.net</a>
</p>

<p>
 We also operate an EFNet channel, and encourage you to join us there.
 If you are interested, please join us at <code>#php.mirrors</code>.
 Many maintainers and staff members idle in the room around the clock,
 and are available to address questions, concerns, or issues in
 real-time (keeping in mind that the mailing list is the official
 support channel, and this is just a convenient additional method of
 communication between teams).
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
