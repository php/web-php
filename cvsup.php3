<?
require("shared.inc");
commonHeader("Using CVSup to maintain local CVS repository");
?>
<h3>Using CVSup to maintain local CVS repository</h3>

In addition to anonymous CVS, we also provide read-only access to
our CVS repository by using CVSup. While CVSup is faster at updating
large trees, it is not as widely available as the standard cvs client.
We will describe now how you can use CVSup.<p>

<ol>
<li>Download the appropiate binary distribution from
<a href="http://www.polstra.com/projects/freeware/CVSup/"
>the CVSup homepage</a>.
<li>Follow the instructions in the Install file of the binary distribution
<li>Create a php.cvsup file containing the following content:<p>
<pre>
*default host=CVSup.php.net
*default base=/usr/src/php
*default release=cvs
*default compress
*default tag=.
*default delete use-rel-suffix
php3
php4
</pre><p>
This will cause the php3 and php4 trees to be stored in /usr/src/php
(you need to create that directory manually).
<li>At a command prompt, simply type:<p>
<code>cvsup php.cvsup</code>
<li>If you are behind a firewall, you might need to use:<p>
<code>cvsup -P - php.cvsup</code>
<li>To build PHP, you need to install a few utilities (GNU autoconf,
libtool, bison). Cd into php3 or php4 and run <code>./buildconf</code>.
</ol>

<? commonFooter(); ?>
