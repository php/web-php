<?php
// $Id$

$_SERVER['BASE_PAGE'] = 'mirroring-troubles.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA = '
<h3>Other mirror information</h3>
<p>
 Properly working mirror sites are listed on <a href="/mirrors.php">our
 mirrors page</a> and set by <a href="/my.php">my.php</a>. See also the
 instructions for <a href="/mirroring.php">setting up a mirror</a>.
</p>
';

site_header("The PHP mirrors problem and troubleshooting guide", array("current" => "help"));
?>

<h1>Common troubles that PHP.net mirrors face</h1>
<p>
 Mirroring a PHP.net server requires a few specific settings and
 considerations, and this document provides a list of problems with possible
 solutions. The mirror tools check for these problems and automatically
 disable the problematic mirrors. The [<strong>?</strong>] link within each 
 title may be used to test this mirror.
</p>

<a name="multiviews"></a>
<h3>MultiViews are on [<a href="/functions">?</a>]</h3>
<p>
 Because the 'Options' directive may be ignored in VirtualHost, a 
 solution is to move the MultiViews option into a specific 
 directory and disable it from there. For example:
</p>
<pre class="info">
  &lt;VirtualHost *:80&gt;
    &lt;Directory /path/to/phpweb&gt;
      Options -Indexes -MultiViews
    &lt;/Directory&gt;
   
    DocumentRoot /path/to/phpweb
    ServerName ....
    ....
  &lt;/VirtualHost&gt; 
</pre>
<p>
 The <a href="mirroring.php#settings">mirror settings</a> example also 
 demonstrates this use. See also the Apache documentation that describes
 <a href="http://httpd.apache.org/docs/content-negotiation.html">
 Content Negotiation</a>.
</p>

<a name="content-type"></a>
<h3>Improper Content-Type [<a href="/manual/en/faq.html.php">?</a>]</h3>
<p>
 Some pages are returning incorrect <code>Content-Type</code> headers. For example,
 xx.php.net/manual/en/faq.html.php should be returning <code>text/html</code> 
 instead of <code>application/x-httpd-php</code>. See also the Apache 
 documentation describing 
 <a href="http://httpd.apache.org/docs/content-negotiation.html">Content 
 Negotiation</a>. This problem might be specific to 
 <a href="http://apache.lexa.ru/">Russian Apache</a>.
</p>

<a name="manual-redirect"></a>
<h3>Manual redirects [<a href="/manual/">?</a>]</h3>
<p>
 By default, Apache inserts an alias for <code>/manual/</code> in the configuration 
 and this causes problems for mirrors. So for example if you find that 
 the manuals are listed on the documentation page but all of the links 
 open up a search page, you probably suffer from this problem and must
 remove that alias.
</p>

<a name="shortcuts"></a>
<h3>Broken manual shortcuts [<a href="/echo">?</a>]</h3>
<p>
 If the shortcut features [e.g. xx.php.net/echo] are not working, be sure 
 the manual files are really under <code>DOCUMENT_ROOT</code> and that the English 
 manual files are present. Also make sure that you have a correct 
 ErrorDocument setting.
</p>

<a name="invalid-data"></a>
<h3>Invalid data types [<a href="/testing">?</a>]</h3>
<p>
 Invalid data is being received, and this is probably caused by improper error 
 handler settings. See the <a href="mirroring.php">mirror guidelines</a>
 for how to setup the ErrorDocument.
</p>

<a name="var"></a>
<h3>A misguided var handler [<a href="/manual/en/ref.var.php">?</a>]</h3>
<p>
 The <a href="mirroring.php">mirroring guidelines</a> mention that Apache2
 enables a 'var' handler by default and this may be disabled by using
 <code>RemoveHandler var</code> in the configuration file.
</p>

<a name="msi"></a>
<h3>Mishandling of .msi files</h3>
<p>
 When improperly set, users are not given a "download this file" prompt 
 when attempting to download the PHP Installer (a .msi file). Your web 
 server configuration should be adjusted to force .msi files as 
 'application/octet-stream'. In Apache this may be done by using: 
 <code>AddType application/octet-stream .msi</code>
</p>

<a name="unlisted"></a>
<h3>An unlisted mirror</h3>
<p>
 If you have an official mirror server but it's not listed on 
 <a href="/mirrors.php">mirrors.php</a> or available from 
 <a href="/my.php">my.php</a> then your mirror most likely failed the mirror
 tests and suffers from one of the problems listed here.  Mirrors that fail
 the tests are automatically removed from the listing for our user's 
 convenience. We send out weekly notifications to all disabled mirror 
 maintainers, and to the mirrors@lists.php.net mailing list.
</p>

<a name="slow"></a>
<h3>Slow response time</h3>
<p>
 Although this test is currently a little unfair (it's only based from the 
 USA), the response time of the server exceeds five seconds. Please confirm 
 the speed of these mirrors and we'll likely adjust the testing procedure. 
 This test will be performed from multiple locations in the future.
</p>

<a name="outbound"></a>
<h3>Unable to do external searches [<a href="results.php?q=curl&p=manual&l=en">?</a>]</h3>
<p>
 Several searches require outbound connections to www.php.net, so this is
 a test for that. The www.php.net box then connects to a third-party search engine.
</p>

<?php 
site_footer();

