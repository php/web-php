<?php
include_once "prepend.inc";
commonHeader("Setting Up Local Search");
?>

<h1>Setting Up Local Search</h1>

<p>
 If you are hosting an official or unofficial mirror, and you would like
 to have local search support, follow these steps.
</p>

<ol>
 <li>
  <p>
   <a href="http://sourceforge.net/projects/htdig/">Get ht://Dig</a><br /><br />
   Download the latest version of ht://Dig and expand it somewhere. ht://Dig
   is a website search program package. It creates an index of your mirror sites
   pages and provides some methods to search in the index. The search.php page
   uses ht://Dig to find pages matching some criteria.
  </p>
 </li>
 <li>
  <p>
   Run configure and install htdig<br /> <br />   
   The steps below assume you install htdig to <tt>/usr/local/htdig</tt>. Change
   this path in all steps to a different one, if you choose some other directory.
   <pre>
       % ./configure --prefix=/usr/local/htdig --with-cgi-bin-dir=/usr/local/htdig/bin \
       --with-image-dir=/usr/local/htdig/gifs --with-image-url-prefix=/gifs \
       --with-search-dir=/usr/local/htdig/conf

       % make

       % make install    
   </pre>
  </p>
 </li>
 <li>
  <p>
   Grab <a href="/mirrorkit.tgz">mirrorkit.tgz</a>, and extract
   the contents of the <tt>search</tt> folder somewhere<br /><br />
   Copy php.conf to /usr/local/htdig/conf (to the conf subfolder of the
   folder you installed htdig to) and edit the paths contained within it
   to match your system. Copy phphead.html and phpnomatch.html into
   <tt>/usr/local/htdig/common/*</tt>. Copy <tt>htphp.sh</tt> into 
   <tt>/usr/local/htdig/bin/</tt> and edit the <tt>HTBINDIR</tt> line
   in the script to suit your system.
  </p>
 </li>
 <li>
  <p>
   Edit your VirtualHost configuration as outlined on the
   <a href="/mirroring.php">mirroring page</a>.
  </p>
 </li>
 <li>
  <p>
   Edit <tt>/usr/local/htdig/conf/htdig.conf</tt> and change the
   <tt>start_url</tt> line to whatever your mirror is (eg. uk.php.net)
  </p>
 </li>
 <li>
  <p>
   Run <tt>/usr/local/htdig/bin/rundig</tt><br /><br />
   You'll probably want to have cron run it once a week.
   If you get an error like: 'Unable to open word list file
   '/usr/local/htdig/db/db.wordlist' while running "rundig",
   you probably have a webserver running behind NAT. Try
   putting yourmirror.php.net to <tt>/etc/hosts</tt> with
   your local IP.
  </p>
 </li>
 <li>
  <p>
   Check the mirror site's search page if it works (full site
   search or manual search).
  </p>
 <li>
</ol>

<h2>Search Setup Troubleshooting</h2>

<p>
 Make sure that you index the mirror site with the URL it knows about
 itself. For official mirror sites it is the name the mirror site is 
 registered under (eg. uk.php.net), without the www prefix.
</p>

<p>
 If you have any questions, try to ask them on the PHP Mirrors' mailing list
 (<a href="mailto:mirrors@php.net">mirrors@php.net</a>). We cannot guarantee,
 that we can solve your problem, of course, but it is worth a try.
</p>

<p>
 Originally written by <gareth (at) omnipotent.net> 1998-Apr-13
 Updated by Dejan Markic <dejan (at) php.net> 2003-Jan-17
 Last updated: 2003-Jan-18
</p>

<h1>Setup With Multidig</h1>

<ul>
 <li>
  <p>Install htdig as described in the previous list [1-2].</p>
 </li>
 <li>
  <p>Run 'new-db php'.</p>
 </li>
 <li>
  <p>
   Add the contents of <tt>search/php.conf</tt> from the
   <a href="/mirrorkit.tgz">mirrorkit.tgz</a> at the end
   of the <tt>/usr/local/htdig/conf/php.conf</tt> generated
   in previous step.
  </p>
 </li>
 <li>
  <p> 
   Run 'add-urls php' and enter the url of your mirror site
  </p>
 </li>
 <li>
  <p>
   Copy <tt>phphead.html</tt> and <tt>phpnomatch.html</tt> into
   <tt>/usr/local/htdig/conf/common/</tt>
  </p>
 </li>
 <li>
  <p>
   Run your multidig script. See the multig documentation for
   more information.
  </p>
 </li>
 <li>
  <p>  
   Copy <tt>htphp.sh</tt> into <tt>/usr/local/htdig/bin/</tt>
   and edit the <tt>HTBINDIR</tt> line in the script to suit your
   system.
  </p>
 </li>
</ul>

<p>
 Originally written by <Philippe.Rochat (at) epfl.ch> 1998-Apr-13
 Updated by Gabor Hojtsy <goba (at) php.net> 2003-Jan-18
 Last updated: 2003-Jan-18
</p>

<?php commonFooter(); ?>
