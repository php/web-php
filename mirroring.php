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

<h3>CVS repository mirroring</h3>
<p>
 If you are interested in using a local copy of our
 CVS repository for yourself, we provide 
 <a href="/cvsup.php">CVSUp instructions</a>
 separately.
</p>
';

site_header("Mirroring The PHP Website");

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
 If you would like to become an official PHP mirror, please be sure to
 read and follow these instructions carefully. You should have the
 consent of your hosting company (if you aren't a hosting company
 yourself), and be prepared for some reasonably significant bandwidth
 usage. A reasonable estimate as of September 2006 is 2GB/day, which
 can go up to 12GB/day for busy mirrors, like uk.php.net. The PHP website
 requires at least PHP 4.3.x, but PHP 5 is preferred. Set it up as an Apache
 module with the settings <a href="#settings">outlined below</a>, or in
 any other Apache connected way (CGI, FastCGI, etc), considering the requested
 PHP settings outlined below in the Apache vhost instructions. The size of
 the full website is approximately 1.7 gigabyte.
</p>

<a name="rule"></a>
<p class="warn">
 Please note that we are currently only accepting new official
 mirrors in countries where we don't already have two active official
 mirrors. For a list of official mirrors have a look at
 <a href="/mirrors.php">mirrors.php</a>. Before you start to set up
 an official mirror site, it is advisable to contact <a
 href="mailto:mirrors@php.net">mirrors@php.net</a>, and ask if you
 have chance to get your mirror site accepted.  We have this limit in
 place to avoid overloading our rsync server and monitoring infrastructure
 as well as the people who actively assist mirror sites stay up to date and
 correctly configured.  We have found that this 2 mirror limit per country
 serves our users well, so please do not ask to be the 3rd in a country that
 already has 2 unless you have a very good reason.  Please also ensure 
 that the mirror is located in the country you would like to register the 
 mirror for.
</p>

<p>
 If you are not an official mirror (eg. mirror the site for your company's
 internal use), you should not rsync from <tt>rsync.php.net</tt> more frequently
 than once a day, or you may find your IP blocked. Also, please make
 an effort to only mirror those parts of the site that you actually need.
 (For example, <a href="#exclude">exclude the manual in all languages that you
 will not be using and exclude the distributions directory</a>.)
</p>

<h2>Get Files With Rsync</h2>

<p>
 First, you need to have a <a href="http://rsync.samba.org/">rsync</a> installed.
 As you have rsync, fetch the web files with the following:
</p>

<pre>
    rsync -avzC --timeout=600 --delete --delete-after \
      --include='distributions/*.exe' \
      rsync.php.net::phpweb /your/local/path 
</pre>

<a name="exclude"></a>
<p>
 Setting up an unofficial mirror, and want to only mirror one
 language of the manual? Add:
</p>

<pre>
    --include='manual/en/' --include='manual/en/**' --exclude='manual/**' --exclude='distributions/manual/**'
</pre>

<p>
 after <tt>"--delete-after"</tt> in the command line above (substituting your
 prefered language code in place of <tt>'en'</tt>). You can also exclude the
 whole distributions directory (and the related extra folder) by replacing
 <tt>"--exclude='distributions/manual/**'"</tt> with
 <tt>"--exclude='distributions/**' --exclude='extra/**'"</tt>.
</p>

<p>
 If <tt>/your/local/path</tt> isn't in your web document tree (why isn't it?),
 then symlink the <tt>phpweb/</tt> directory to the correct place on your
 server.
</p>

<p>
 Official PHP mirror sites should provide the exact content coming from
 <tt>rsync.php.net</tt>, and should not be altered in any way not described
 in the mirroring guidelines. Failing to do so can result in immediate
 removal of your mirror from our list.
</p>

<h2>Add SQLite Support</h2>

<p>
 <a href="http://www.sqlite.org">SQLite</a> is an embedded
 SQL database implementation that has very high performance for applications
 with low write concurrency. PHP mirrors currently employ SQLite for URL
 shortcut lookups, and will use it for manual page displays and searching
 in the future.
</p>

<p>
 To install the SQLite PHP extension, you need to have PEAR installed, with
 which you can get SQLite: <tt>% pecl install sqlite</tt>. Ensure that your
 <tt>php.ini</tt> has an extension line to load in the SQLite extension by
 default, while starting up the web server. See also the 
 <a href="/manual/ref.sqlite">sqlite extensions</a> documentation for details.
</p>

<h2>Setup Apache VirtualHost</h2>

<p>
 Make sure your web server is set up to serve up <tt>.php</tt> files
 as PHP parsed files. If it isn't, add the mime-type to your config.
</p>
<p class="warn">
 Please make sure you have turned off output compression for binary files
</p>

<p>
 Create a virtualhost which looks something like:
</p>

<a name="settings"></a>
<pre>
&lt;VirtualHost *-or-your-hostname-or-your-ip-here&gt;
     &lt;Directory /www/htdocs/phpweb&gt;
          # Do not display directory listings if index is not present,
          # and do not try to match filenames if extension is omitted
          Options -Indexes -MultiViews
     &lt;/Directory&gt;

     ServerName xx.php.net
     ServerAlias the.cname.you.set.up.example.com www.xx.php.net
     ServerAdmin yourname@example.com
     
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
 are in the convention: <tt>"xx.php.net"</tt>, where <tt>"xx"</tt> is
 replaced by the 2-letter country code of your mirror's location. If
 there already is a <tt>"xx.php.net"</tt>, then you will probably get
 <tt>"xx2.php.net"</tt>.
</p>

<p>
 Before adding new official mirrors to our DNS, we require the maintainers
 to set up the mirrors with an address we can use as a CNAME in the DNS.
 This subdomain (<tt>the.cname.you.set.up.example.com</tt> in the above
 example) will be checked by mirror admins before the mirror is added.
 Therefore it is important that the mirror is capable of serving requests
 for this name and the <tt>(www.)xx.php.net</tt> address provided by the
 mirror administrators.
</p>

<p>
 When setting up the vhost, provide an asterisk, a hostname or an IP
 address in the VirtualHost container's header depending on whether
 you would like to make the vhost work for all IPs handled by Apache,
 or just a specific hostname/IP address. Consult
 <a href="http://httpd.apache.org/docs/vhosts/index.html">the Apache
 documentation</a> for the differences of the two methods. It is very
 important to use your <tt>xx.php.net</tt> address as the ServerName, so
 URL redirections will keep the requests in the php.net domain, ensuring
 that the My PHP.net service will work.
</p>

<p>
 Change the DocumentRoot and include_path settings as appropriate,
 specify the mirror's preferred language, and provide settings according
 to your stats setup, if your mirror is going to provide it. For the
 preferred language setting, choose one from those available as
 manual translations. If you provide something else, your default
 language will be English. After you restart Apache, your mirror
 site should start working.
</p>

<h2>Setup Local Stats</h2>

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

<pre>
   <?php echo $minute; ?> * * * * rsync -avzC --timeout=600 --delete --delete-after --include='distributions/*.exe' rsync.php.net::phpweb /your/local/path
</pre>

<p>
 Remember to specify the same rsync parameters you used to get
 the phpweb files. You should try to stagger your times a bit from the
 example to help spread the load on the <tt>rsync.php.net</tt> server.
</p>

<h2>Sponsor Logo</h2>

<p>
 We would like to thank you for providing a mirror, so
 if you would like to display a logo on the mirror site promoting your
 company, you are able to do so by following these steps:
</p>

<ul>
 <li>Create a 120 x 60 pixel sized logo button.</li>
 <li>Copy it to your <tt>/www/htdocs/phpweb/backend</tt> folder as <tt>mirror.gif</tt>, <tt>mirror.jpg</tt> or <tt>mirror.png</tt>.</li>
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
 link it to your mirror.
</p>

<h2>Mirror Setup Troubleshooting</h2>

<ul>
<li>
 Don't be afraid if you cannot find several pieces of the site in your
 local copy, like the tutorial PHP page or the printed pages' directories.
 These are handled automatically on the fly and are not real files.
</li>

<li>
 If you find that the manuals are listed on the documentation page, but
 all of the links open up a search page, you probably have an Apache /manual/
 alias in effect. Remove that alias, restart Apache, and the manuals will
 be showing up.
</li>

<li>
 If the shortcut features [eg. xx.php.net/echo] are not working, check that
 the manual files are really under DOCUMENT_ROOT and that at least the
 English manual is present. Also make sure that you have a correct
 ErrorDocument setting.
</li>

<li>
 If you have an offical mirror site but it is not listed on
 <a href="/mirrors.php">mirrors.php</a>, then your mirror is probably detected
 to be nonfunctional for our users. Mirror sites inaccessible for more than
 three days, not updated for more than seven days, or having any major error in
 their setup are removed automatically from the listing for our user's
 convenience. We send out a notification to all automatically disabled mirror
 site owners every week.
</li>
</ul>

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
  The xx.php.net address you used to set up the mirror site, which
  you obtained previously in a conversation with the mirror admins.
 </li>
 <li>
  Your name and email address to be registered as the admin of the mirror.
 </li>
 <li>
  A hostname that we can use as a CNAME for the country-code-based
  name of the mirror (<tt>the.cname.you.set.up.example.com</tt> in the
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
 There is a mailing list named <tt>"php-mirrors"</tt> at
 <tt>lists.php.net</tt>. It is not required to sign up to
 this mailing list. Besides the name, the traffic on this
 list is mainly interesting for the webmasters of PHP.net,
 and we are able to keep in touch with you using your given
 email address. Anyway if you would like to follow what is
 happening, you can subscribe, by sending an empty message
 to: <a href="mailto:php-mirrors-subscribe@lists.php.net">php-mirrors-subscribe@lists.php.net</a>
</p>

<p>
 <em>
  Thank you for providing a mirror!
 </em>
</p>

<?php site_footer(); ?>
