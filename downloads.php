<?
require("shared.inc");
commonHeader("Downloads ");
$server = ($SERVER_PORT == "81" ? $SERVER_NAME . ":81" : $SERVER_NAME);
?>

<h2>PHP 4</h2>
<ul>
  <li><a href="http://www.php.net/do_download.php?download_file=php-4.0.1.tar.gz&source_site=<?php echo $server; ?>">PHP 4.0.1 Release Source</a></li> - 28 June 2000</li>
  <li><a href="http://www.php.net/do_download.php?download_file=php-4.0.1-Win32.zip&source_site=<?php echo $server; ?>">PHP 4.0.1 Release Binaries for Win32</a> - 28 June 2000<br>(CGI binary and ISAPI module included, MySQL support built-in)</li>
  <p>Other add-ons:
  <ul>
    <li>Servlet Server API:
      <a href="http://www.php.net/do_download.php?download_file=php-4.0.1-Win32-servlet-jdk118.zip&source_site=<?php echo $server; ?>">jdk1.1.8</a>,
      <a href="http://www.php.net/do_download.php?download_file=php-4.0.1-Win32-servlet-jdk122.zip&source_site=<?php echo $server; ?>">jdk1.2.2</a>,
      <a href="http://www.php.net/do_download.php?download_file=php-4.0.1-Win32-servlet-jdk13.zip&source_site=<?php echo $server; ?>">jdk1.3</a>
    <li>Java extensions:
      <a href="http://www.php.net/do_download.php?download_file=php-4.0.1-Win32-java-jdk118.zip&source_site=<?php echo $server; ?>">jdk1.1.8</a>,
      <a href="http://www.php.net/do_download.php?download_file=php-4.0.1-Win32-java-jdk122.zip&source_site=<?php echo $server; ?>">jdk1.2.2</a>,
      <a href="http://www.php.net/do_download.php?download_file=php-4.0.1-Win32-java-jdk13.zip&source_site=<?php echo $server; ?>">jdk1.3</a>
  </ul>
  <p>
<!--
  <p>Java add-ons will be posted shortly.</p>
-->
  <LI>For downloadable documentation, go to the <A HREF="docs.php">documentation</A> page
  <li>To download the latest development version, see the <a href="version4/cvs.php">instructions on using CVS</a>.</li>
  <li><a href="http://www.zend.com/zend/optimizer.php">Zend Optimizer RC</a> for PHP 4.0.1 is available on Zend Technologies' web site.</li>
</ul>

<hr>
<h2>Old versions of PHP</h2>

<UL>
<LI>Download <a href="download-php3.php">PHP 3.0</a> (source code and Windows binaries distributions available).</li>
<!--
<li>Instructions on how to use the <a href="http://www.php.net/cvs-php3.php">PHP 3.0 CVS tree</a>.</li>
-->
<LI><A HREF="download-logos.php">PHP logos</A> for your site
<LI><A HREF="ftp://ftp.nerosworld.com/pub/php/dist">PHP/FI 2.0 Distributions and related files - no longer supported</A>
</UL>

<?
commonFooter();
?>
