<?php
require_once 'prepend.inc';

header("Cache-Control: private");
header("Pragma: no-cache");

$SIDEBAR_DATA = '
<h3>Binaries for other systems</h3>
<p>
We do not distribute UNIX/Linux binaries. Most Linux
distributions come with PHP these days, so if you do
not want to compile your own, go to your distribution\'s
download site. Binaries available on external servers:
<ul>
<li>' . make_link("http://www.entropy.ch/software/macosx/php/", "Mac OS X") . '</li>
<li>' . make_link("http://developer.novell.com/ndk/leadedge.htm#le169", "Novell NetWare") . '</li>
<li>' . make_link("http://silk.apana.org.au/php/", "OS/2") . '</li>
<li>' . make_link("http://php.alexwaugh.com/", "RISC OS") . '</li>
<li>' . make_link("http://freeware.sgi.com/index-by-alpha.html#php", "SGI IRIX 6.5.x") . '</li>
</ul>
</p>

<h3>Other Downloads</h3>
<p>
For downloadable manual packages, go to the '.
make_link("download-docs.php", "documentation download").'
page
</p>

<p>
Get some '.
make_link("download-logos.php", "PHP logos").'
for your site, and some PHP icons to use on
your computer
</p>

<p>
To download the latest development version,
see the '.
make_link("anoncvs.php","instructions on using anonymous CVS").'
</p>

<p>'.
make_link("http://www.zend.com/zend/optimizer.php", "Zend Optimizer").'
for PHP 4.0.3 and later is
available on Zend Technologies\' web site
</p>

<p> For '.
make_link("http://gtk.php.net/", "PHP-GTK").'
downloads, please visit our site dedicated
to ' . make_link("http://gtk.php.net/", "PHP-GTK").'.
</p>
';

commonHeader("Downloads");
$server = $SERVER_NAME;
?>

<h1>Latest version of PHP</h1>

<p>
Before you download, please make sure you are using a <a
href="mirrors.php">mirror</a> close to you.
<?php
$cm = find_closest_mirrors();
$cmn = count($cm);
if ($cmn > 0) {
	if(!in_array("http://$server/", $cm)) {
		echo "We found ";
		echo ($cmn > 1 ? "$cmn mirrors" : "a mirror");
		echo " near you. We recommend that you use one of these.\n";
		echo " Please visit: ";
		foreach ($cm as $num => $mirror) {
			echo '<a href="' . $mirror . 'downloads.php">' . $mirror . '</a>';
			if ($num < $cmn-1) { echo " or "; }
		}
		echo ". You can also change mirrors at the bottom of this page.";
		if ($server == "www.php.net" || $server == "php.net") {
			$mirror = $cm[0];
		} else {
			$mirror = "http://$server/";
		}
	} else {
	    echo "You can change mirrors at the bottom of the page.";
		$mirror = "";
	}
} else {
    echo "You can change mirrors at the bottom of the page.";
        srand ((double)microtime()*1000000);
	
	if ($server == "www.php.net" || $server == "php.net") {
		$default_mirrors = array("http://us2.php.net/", "http://ca.php.net/", "http://us3.php.net/","http://rs1.php.net/");
		$mirror = $default_mirrors[rand(0, count($default_mirrors)-1)];
	} else {
		$mirror = "";
	}
}
?>
</p>

<h2>Complete Source Code</h2>
<ul>
  <li><a href="<?php echo $mirror; ?>do_download.php?download_file=php-4.2.3.tar.bz2">PHP 4.2.3 (tar.bz2)</a> [2,694KB] - 6 September 2002</li>
  <li><a href="<?php echo $mirror; ?>do_download.php?download_file=php-4.2.3.tar.gz">PHP 4.2.3 (tar.gz)</a> [3,334KB] - 6 September 2002</li>
</ul>

<p>
  See the <a href="ChangeLog-4.php">ChangeLog</a> for a complete list of changes.
</p>

<h2>Patches to latest version</h2>
<ul>
  <li><?php download_link("php-4.2.0-to-4.2.2.patch.gz", "PHP 4.2.0 to 4.2.2 patch"); ?>  - 22 July 2002<br />
  This unified diff will enable you to update your local PHP source to the latest version from 4.2.0.</li>
  <li><?php download_link("php-4.2.1-to-4.2.2.patch.gz", "PHP 4.2.1 to 4.2.2 patch"); ?>  - 22 July 2002<br />
  This unified diff will enable you to update your local PHP source to the latest version from 4.2.1.</li>
</ul>

<h2>Windows Binaries</h2>
All Windows binaries can be used on Windows 95/98/Me and on Windows NT/2000/XP.
<ul>
  <li><a href="<?php echo $mirror; ?>do_download.php?download_file=php-4.2.3-Win32.zip">PHP 4.2.3 zip package</a> [5,417KB] - 6 September 2002<br />
  (CGI binary plus server API versions for Apache, Apache2 (experimental), ISAPI, NSAPI, Servlet and Pi3Web. MySQL
  support built-in, many extensions included, packaged as zip)</li>

  <li><a href="<?php echo $mirror; ?>do_download.php?download_file=php-4.2.3-installer.exe">PHP 4.2.3 installer</a> [928KB]- 6 September 2002<br />
  (CGI only, MySQL support built-in, packaged as Windows installer to install and
  configure PHP, and automatically configure IIS, PWS and Xitami, with manual
  configuration for other servers. N.B. no external extensions included)</li>
<?php /*  <li>Win32 binaries will be posted soon!</li> */ ?>
</ul>

<h2>File Uploads Security Fix</h2>
<ul>
  <li><?php download_link("rfc1867.c.diff-4.1.x.gz", "for PHP 4.1.0/4.1.1"); ?> - 27 February 2002<br>
  (Apply in php-4.1.x/main)</li>
  <li><?php download_link("rfc1867.c.diff-4.0.6.gz", "for PHP 4.0.6"); ?> - 27 February 2002<br>
  (Apply in php-4.0.6/main)</li>
  <li><?php download_link("mime.c.diff-3.0.gz", "for PHP 3.0"); ?> - 27 February 2002<br>
  (Apply in php-3.0.x/functions)</li>
</ul>

<h2>Patches</h2>
<ul>
  <li><?php download_link("php-4.0.6-memlimit.diff.gz", "PHP 4.0.6 memory limit fix"); ?> - 1 July 2001<br>
  (This patch fixes a bug in the 4.0.6 memory limit option. This is only needed when configuring
  PHP with --enable-memory-limit). If you have problems applying the patch try using GNU patch.</li>
  <li><?php download_link("php-4.0.6-to-4.1.1.patch.gz", "PHP 4.0.6 to 4.1.1 patch"); ?>  - 03 January 2002<br>
  This unified diff will enable you to update your local PHP source to the latest version from 4.0.6.</li>
  <li><?php download_link("php-4.1.0-to-4.1.1.patch.gz", "PHP 4.1.0 to 4.1.1 patch"); ?>  - 03 January 2002<br>
  This unified diff will enable you to update your local PHP source to the latest version from 4.1.0.</li> 	
</ul>

<?php echo hdelim(); ?>

<h1>Older Versions of PHP</h1>

<p>
<i>Older releases are listed for archaeological purposes only. They are no longer supported.</i>
</p>

<ul>
  <li>PHP 4.2.1
    <ul>
      <li><?php download_link("php-4.2.1.tar.gz", "Source Code"); ?></li>
      <li><?php download_link("php-4.2.1-Win32.zip", "Windows Binary (zip)"); ?></li>
    </ul><br>
  </li>
  <li>PHP 4.1.2
    <ul>
      <li><?php download_link("php-4.1.2.tar.gz", "Source Code"); ?></li>
      <li><?php download_link("php-4.1.2-Win32.zip", "Windows Binary (zip)"); ?></li>
    </ul><br>
  </li>
  <li>PHP 3.0.x (latest)
    <ul>
      <li><?php download_link("php-3.0.18.tar.gz", "PHP 3.0.18 Source Code"); ?></li>
      <li><?php download_link("php-3.0.17-win32.zip", "PHP 3.0.17 Windows Binary (zip)"); ?></li>
    </ul><br>
  </li>
  
  <li>If you are searching for older versions of PHP, go to the new <a href="http://ftp.proventum.net/pub/php/">"PHP Museum"</a>.</li>
  <li>Search for PHP tarballs on AllTheWeb.com:
    <form action="http://www.alltheweb.com/search" method="GET">
      <input type="hidden" name="cat" value="ftp">
      <input type="hidden" name="ftype" value="6">
<?php /*

cvs status -v php[34]/INSTALL |grep 'php_'|awk '{print $1}'|grep -Ev '(RC[0-9]*|rc[_0-9]*|REL|[ab][a0-9-]+|b..rc.|b.pl.|bazaar|pre|[ab])$'|sed -e 's,php_,,' -e 's,_,.,g'|sort -n|while read ver; do echo "        <option value=\"php-${ver}.tar.gz\">$ver</option>"; done
*/?>
      <select name="query" onchange="this.form.submit()">
        <option value="">--select version--</option>
        <option value="php-3.0.tar.gz">3.0</option>
        <option value="php-3.0.1.tar.gz">3.0.1</option>
        <option value="php-3.0.10.tar.gz">3.0.10</option>
        <option value="php-3.0.11.tar.gz">3.0.11</option>
        <option value="php-3.0.12.tar.gz">3.0.12</option>
        <option value="php-3.0.13.tar.gz">3.0.13</option>
        <option value="php-3.0.14.tar.gz">3.0.14</option>
        <option value="php-3.0.15.tar.gz">3.0.15</option>
        <option value="php-3.0.16.tar.gz">3.0.16</option>
        <option value="php-3.0.17.tar.gz">3.0.17</option>
        <option value="php-3.0.18.tar.gz">3.0.18</option>
        <option value="php-3.0.2.tar.gz">3.0.2</option>
        <option value="php-3.0.3.tar.gz">3.0.3</option>
        <option value="php-3.0.4.tar.gz">3.0.4</option>
        <option value="php-3.0.5.tar.gz">3.0.5</option>
        <option value="php-3.0.6.tar.gz">3.0.6</option>
        <option value="php-3.0.7.tar.gz">3.0.7</option>
        <option value="php-3.0.8.tar.gz">3.0.8</option>
        <option value="php-3.0.9.tar.gz">3.0.9</option>
        <option value="php-4.0.0.tar.gz">4.0.0</option>
        <option value="php-4.0.1.tar.gz">4.0.1</option>
        <option value="php-4.0.1pl1.tar.gz">4.0.1pl1</option>
        <option value="php-4.0.2.tar.gz">4.0.2</option>
        <option value="php-4.0.3.tar.gz">4.0.3</option>
        <option value="php-4.0.4.tar.gz">4.0.4</option>
        <option value="php-4.0.4pl1.tar.gz">4.0.4pl1</option>
        <option value="php-4.0.5.tar.gz">4.0.5</option>
        <option value="php-4.0.6.tar.gz">4.0.6</option>
        <option value="php-4.1.0.tar.gz">4.1.0</option>
        <option value="php-4.1.1.tar.gz">4.1.1</option>
        <option value="php-4.1.2.tar.gz">4.1.2</option>
        <option value="php-4.2.0.tar.gz">4.2.0</option>
        <option value="php-4.2.1.tar.gz">4.2.1</option>
        <option value="php-4.2.2.tar.gz">4.2.2</option>
      </select>
    </form>
  </li>
</ul>

<?php commonFooter(); ?>
