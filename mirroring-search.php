<?php
include_once "prepend.inc";
commonHeader("Setting Up Local Search");
?>

<h1>Setting Up Local Search</h1>

<div class="tip">
Please note that mirror sites are not using their local search setup.
All mirror sites employ Google for searches. This is a temporary measure,
while we are working towards adding a better (Mnogosearch based) search
setup option for mirror sites.
</div>

<p>
 If you are hosting an official or unofficial mirror, and you would like
 to have local search support, follow these steps. This document complements
 the instructions found <a href="/mirroring.php">on the mirroring page</a>.
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
       --with-image-dir=/usr/local/htdig/gifs --with-image-url-prefix=/images \
       --with-search-dir=/usr/local/htdig/conf

       % make

       % make install    
   </pre>
   For Redhat 8 and 9, you will need this configure line:
   <pre>
       % CXXFLAGS=-Wno-deprecated CPPFLAGS=-Wno-deprecated \ 
       ./configure --prefix=/usr/local/htdig --with-cgi-bin-dir=/usr/local/htdig/bin \
       --with-image-dir=/usr/local/htdig/gifs --with-image-url-prefix=/images \
       --with-search-dir=/usr/local/htdig/conf
   </pre>
  </p>
 </li>
 <li>
  <p>
   Grab <a href="/mirrorkit.tgz">mirrorkit.tgz</a>, and extract
   the contents of the <tt>search</tt> folder somewhere<br /><br />
   Copy <tt>php.conf</tt> to <tt>/usr/local/htdig/conf</tt> (to the <tt>conf</tt>
   subfolder of the folder you installed htdig to) and edit the paths
   contained within it to match your system. Copy <tt>phphead.html</tt>
   and <tt>phpnomatch.html</tt> into <tt>/usr/local/htdig/common/*</tt>.
   Copy <tt>htphp.sh</tt> into <tt>/usr/local/htdig/bin/</tt> and edit
   the <tt>HTBINDIR</tt> line in the script to suit your system.
  </p>
 </li>
 <li>
  <p>
   Edit your VirtualHost configuration as outlined on the
   <a href="/mirroring.php">mirroring page</a>. See the optimization
   notes below on the exclude settings.
  </p>
 </li>
 <li>
  <p>
   Edit <tt>/usr/local/htdig/conf/php.conf</tt> and change the
   <tt>start_url</tt> line to whatever your mirror is (eg. uk.php.net)
   Note that you'll need to run the indexing with this name, as the search
   script limits the search results to the official name of your mirror
   site. Therefore if you would like to go on to the next step before
   being registered as an official mirror, you need to add the mirror
   with it's soon to be official name to your <tt>/etc/hosts</tt> file.
   After you are registered to be an official mirror, you can remove
   this entry from <tt>/etc/hosts</tt> of course.
  </p>
 </li>
 <li>
  <p>
   Run <tt>/usr/local/htdig/bin/rundig -c /usr/local/htdig/conf/php.conf</tt><br /><br />
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
 </li>
</ol>

<h2>Search Setup Troubleshooting</h2>

<p>
 Make sure that you index the mirror site with the URL it knows about
 itself. For official mirror sites it is the name the mirror site is 
 registered under (eg. uk.php.net), without the www prefix.
</p>

<p>
 If the search is not perfomed on your mirror, check twice that the
 htphp.sh script is excutable by PHP. This is vital to the search to
 work.
</p>

<p>
 If you have any questions, try to ask them on the PHP Mirrors' mailing list
 (<a href="mailto:mirrors@php.net">mirrors@php.net</a>). We cannot guarantee,
 that we can solve your problem, of course, but it is worth a try.
</p>

<p>
 Originally written by &lt;gareth (at) omnipotent.net&gt; 1998-Apr-13
 Updated by Dejan Markic &lt;dejan (at) php.net&gt; 2003-Jan-17
 Last updated: 2003-Jan-18
</p>

<h2>Optimizing The Search</h2>

<p>
 The <tt>php.conf</tt> in the mirror kit contains an <tt>exclude_urls</tt> setting,
 which excludes the printed pages the manual howto and the calendar page
 from the indexes. This will make your search index much smaller, than
 indexing all the site contents.
</p>

<p>
 You may however add more exclude parameters if you want to make your local
 search even more faster. If you do not expect users on your mirror to search
 in some language pages, you may restrict the database to the most used
 languages. This will speed up the indexing process, as well as the search
 execution. Add some more exclude parameters separated with spaces in case
 you choose this way.
</p>

<p>
 Please do not forget to reflect your actual <tt>exclude_urls</tt> setting in
 the <tt>HTSEARCH_EXCLUDE</tt> vhost setting, as you can see on
 <a href="mirroring.php">the mirroring page</a>. This information will be
 used in the future to support the automatic customization of an advanced
 search page on mirrors.
</p>

<h1>Setup With Multidig</h1>

<ol>
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
</ol>

<p>
 Originally written by &lt;Philippe.Rochat (at) epfl.ch&gt; 1998-Apr-13
 Updated by Gabor Hojtsy &lt;goba (at) php.net&gt; 2003-Jan-18
 Last updated: 2003-Jan-18
</p>

<?php commonFooter(); ?>
