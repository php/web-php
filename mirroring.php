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

site_header("Mirroring The PHP Website", array("current" => "community"));

// Get a minute to print out for the cron example
function make_seed()
{
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());
$minute = rand(0, 59);
?>

<h1>Mirroring The PHP Website</h1>

<p>
 If you would like to participate in the official PHP mirrors program,
 read and follow these instructions carefully. You should have the
 consent of your hosting company (if you aren't a hosting company
 yourself), and be prepared for some potentially significant bandwidth
 usage.  As of January 2011, the network is averaging 223GB per day spread
 across 115 mirrors, or roughly 1.9GB per day.  This can go up to 12GB per
 day or more for busy mirrors, such as those in the US, UK, and India.
 Please be sure your server or hosting account is able to handle a minimum
 of roughly 58 gigabytes of transfer each month without incurring any
 additional costs or penalties.  In the event that such action is taken
 against your account, remember, it is your responsibility.
</p>

<p>
 Official mirror program participants are required to use PHP 5.2.0 or greater,
 with a preference towards PHP 5.3.
 Set it up as an Apache module with the settings
 <a href="#settings">outlined below</a>, or in any other Apache connected
 way (CGI, FastCGI, etc), considering the requested PHP settings outlined
 below in the Apache vhost instructions. The size of the full website is
 approximately 2.1 gigabytes.
</p>

<p>
 Applications to join the official mirror program are reviewed on a
 case-by-case basis, but we will only approve those from ISPs and web
 hosting providers, universities and state-recognized academic institutions,
 and PHP-centric web development firms.  Under no circumstances will we
 permit new applications from marketing firms, website portals or
 directories, or anything of questionable moral or legal standing.  We
 also reserve the right, at our discretion, to refuse any application for
 any reason.
</p>

<a name="rule"></a>
<p class="warn">
 Please note that we are currently only accepting new official
 mirrors in countries where we don't already have two official
 mirrors. For a list of active official mirrors, have a look at
 <a href="/mirrors.php">mirrors.php</a>. Before you start to set up
 an official mirror site, you are advised to contact <a
 href="mailto:mirrors@php.net">mirrors@php.net</a> (a publicly-available
 mailing list, publicly archived around the web) and ask if your
 application will have a chance to be accepted.  We have this limit in
 place to avoid overloading our rsync servers and monitoring infrastructure.
 We have found that this 2 mirror limit per country serves our users well,
 so please do not ask to be the 3rd in a country that already has 2
 unless you have a very good reason.  Please also be aware that the
 mirror is required to be physically located in the country you would
 like to serve.  If there are already two mirrors in a country for
 which you would like to provide an official mirror, we operate an
 official waiting list, to which you may add your name and information
 <a href="http://php.parasane.net/mirrors/waitinglist.php">here</a>.  If
 and when a spot becomes available, we will go through the applications
 on the waiting list before entertaining new public applications.
</p>

<p>
 If you are not an official mirror (e.g. you mirror the site for your company's
 internal use), you should not rsync from <code>rsync.php.net</code> more frequently
 than once a day, or you may find your IP blocked. Also, please make
 an effort to only mirror those parts of the site that you actually need.
 (For example, <a href="#exclude">exclude the manual in all languages that you
 will not be using and exclude the distributions directory</a>.)
</p>

<h2>Get Files With Rsync</h2>

<p>
 First, you need to have a <a href="http://rsync.samba.org/">rsync</a>
 installed.  As you have rsync, fetch the web files with the following:
</p>

<pre class="info">
    rsync -avzC --timeout=600 --delete --delete-after \
      --include='distributions/*.exe' \
      rsync.php.net::phpweb /your/local/path 
</pre>

<!--
We will be changing the above to include the following in the coming
days/weeks/months as we move toward a distributed network:

americas.rsync.php.net
asia.rsync.php.net
europe.rsync.php.net
-->

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
 If <code>/your/local/path</code> isn't in your web document tree (why isn't it?),
 then symlink the <code>phpweb/</code> directory to the correct place on your
 server.
</p>

<p>
 Official PHP mirror sites should provide the exact content coming from
 <code>rsync.php.net</code>, and should not be altered in any way not described
 in the mirroring guidelines. Failing to do so can result in immediate
 removal of your mirror from our list.
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
 PDO extension by using the SQLite driver (pdo_sqlite), which is what you
 should be sure is installed. The other is via the SQLite3 extension.
 These extensions are both compiled into PHP by default.
 Note: Some Linux distributions disable many extensions in their
 package systems, including SQLite. Please make sure you install the
 "php5-sqlite" (or similiar) package if using such a system.
</p>

<h2>Setup Apache VirtualHost</h2>

<p>
 Make sure your web server is set up to serve up <code>.php</code> files
 as PHP parsed files. If it isn't, add the mime-type to your config.
</p>
<p class="warn">
 Please make sure you have turned off output compression for binary files
</p>

<p>
 Create a virtualhost which looks something like:
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
     ServerAlias cc.php.net www.ccx.php.net www.cc.php.net the.cname.you.set.up.example.com
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
 You should only start to set up an Apache virtualhost for an official
 mirror, if you have <a href="#rule">contacted us first</a>, and asked
 for a possible name for your mirror. The official names for PHP mirrors
 are in the convention: <code>"ccx.php.net"</code>, where <code>"cc"</code>
 stands for the 2-letter ISO country code of your mirror's location and
 <code>"x"</code> is an incremental identifier for the mirrors of that country.
 Do not assume that you know the code you will receive until your
 application has been reviewed and approved, and do not submit an application
 saying, for example, "We are applying to become DE1.PHP.NET," because it's
 possible that the mirror already exists, but is experiencing issues that
 have it temporarily removed from active rotation.
 We do not want anyone to waste their time only to have their application
 altered or rejected.
 The mirrors should also listen for the <code>"cc.php.net"</code> hostname
 as we have <a href="http://en.wikipedia.org/wiki/Round-robin_DNS">round robin
 dns</a> configured for the those records, so any active mirror can receive
 traffic for their respective <code>"cc.php.net"</code> hostname.
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

<p>
 When setting up the vhost, provide an asterisk, a hostname or an IP
 address in the VirtualHost container's header depending on whether
 you would like to make the vhost work for all IPs handled by Apache,
 or just a specific hostname/IP address. Consult
 <a href="http://httpd.apache.org/docs/vhosts/index.html">the Apache
 documentation</a> for the differences of the two methods. It is very
 important to use your <code>ccx.php.net</code> address as the ServerName, so
 URL redirections will keep the requests in the php.net domain, ensuring
 that the My PHP.net service will work, plus it will cause the mirror to show
 up as an unofficial mirror.
</p>

<p>
 Change the DocumentRoot setting as appropriate,
 specify the mirror's preferred language, and provide settings according
 to your stats setup, if your mirror is going to provide it. For the
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
 You must also set up a cron job that periodically does an rsync
 to refresh your web directory. This will ensure that your web site
 is up to date. Something like:
</p>

<pre class="info">
   <?php echo $minute; ?> * * * * rsync -avzC --timeout=600 --delete --delete-after --include='distributions/*.exe' rsync.php.net::phpweb /your/local/path
</pre>

<p>
 Remember to specify the same rsync parameters you used to get
 the phpweb files. You should try to stagger your times a bit from the
 example to help spread the load on the <code>rsync.php.net</code> server.
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
 <li>Go visit your mirror URL and check if it is there.</li>
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
 link it to your mirror.  This shows the community that you are a
 proud supporter of PHP and open source technology, and you will be
 worshipped every hour, on the hour, by millions.  Well, okay, not
 worshipped.... but folks will certainly appreciate your generosity
 and support!
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
  another IP address without coordinating with us at all.
 </li>
 <li>
  Whether or not you've installed local stats support on your mirror.
 </li>
 <li>
  The name of the hosting company.
 </li>
 <li>
  The URL of the hosting company. This link is provided with the
  company's name at the bottom of pages, with the sponsor image on
  the frontpage and in the mirror listing.
 </li>
</ul>

<p>
 There is a mailing list named <code>"php-mirrors"</code> at
 <code>lists.php.net</code> which we would appreciate if you could sign up to.
 This mailing list is extremly low traffic and only used for communication
 between mirror maintainers and the php.net webmasters.
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
