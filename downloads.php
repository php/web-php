<?php
require_once 'prepend.inc';
commonHeader("Downloads");
$server = $SERVER_NAME;
?>

<h1>Latest version of PHP 4.0</h1>

<h2>Complete Source Code</h2>
<ul>
  <li><?php download_link("php-4.0.6.tar.gz", "PHP 4.0.6"); ?> - 23 June 2001</li>
</ul>

<h2>Win32 Binaries</h2>
<ul>
  <li><?php download_link("php-4.0.6-Win32.zip", "PHP 4.0.6 zip package"); ?> - 23 June 2001<br>
  (CGI binary plus server API versions for Apache, AOLserver, ISAPI and NSAPI. MySQL
  support built-in, many extensions included, packaged as zip)</li>
  <li><?php download_link("php406-installer.exe", "PHP 4.0.6 installer"); ?> - 23 June 2001<br>
  (CGI only, MySQL support built-in, packaged as Windows installer to install and
  configure PHP, and automatically configure IIS, PWS and Xitami, with manual
  configuration for other servers. N.B. no external extensions included)</li>
<!--
  <li>Win32 binaries will be posted soon!</li>
-->
<!--
  <li>Java binaries will be posted soon!</li>
  <li>Servlet Server API:
    <a href="http://www.php.net/do_download.php?download_file=php-4.0.2-Win32-servlet-jdk118.zip&source_site=<?php echo $server; ?>">jdk1.1.8</a>,
    <a href="http://www.php.net/do_download.php?download_file=php-4.0.2-Win32-servlet-jdk122.zip&source_site=<?php echo $server; ?>">jdk1.2.2</a>,
    <a href="http://www.php.net/do_download.php?download_file=php-4.0.2-Win32-servlet-jdk13.zip&source_site=<?php echo $server; ?>">jdk1.3</a>
  <li>Java extensions:
    <a href="http://www.php.net/do_download.php?download_file=php-4.0.2-Win32-java-jdk118.zip&source_site=<?php echo $server; ?>">jdk1.1.8</a>,
    <a href="http://www.php.net/do_download.php?download_file=php-4.0.2-Win32-java-jdk122.zip&source_site=<?php echo $server; ?>">jdk1.2.2</a>,
    <a href="http://www.php.net/do_download.php?download_file=php-4.0.2-Win32-java-jdk13.zip&source_site=<?php echo $server; ?>">jdk1.3</a>
-->
</ul>

<?php echo hdelim(); ?>

<h1>Other Downloads</h1>

<ul>
  <li>For downloadable documentation, go to the <a href="docs.php">documentation</a> page
  <li>Get some <a href="download-logos.php">PHP logos</A> for your site
  <li>To download the latest development version, see the <a href="anoncvs.php">instructions on using anonymous CVS</a>
  <li><a href="http://www.zend.com/zend/optimizer.php">Zend Optimizer</a> for PHP 4.0.3 and later is available on Zend Technologies' web site.
</ul>

<?php echo hdelim(); ?>

<h1>Older Versions of PHP</h1>

<ul>
  <li>PHP 4.0.5
    <ul>
      <li><?php download_link("php-4.0.5.tar.gz", "Source Code"); ?></li>
      <li><?php download_link("php-4.0.5-Win32.zip", "Windows Binary (zip)"); ?></li>
    </ul><br>
  </li>
  <li>PHP 4.0.4pl1
    <ul>
      <li><?php download_link("php-4.0.4pl1.tar.gz", "Source Code"); ?></li>
      <li><?php download_link("php-4.0.4pl1-Win32.zip", "Windows Binary (zip)"); ?></li>
    </ul><br>
  </li>
  <li>PHP 3.0.x (latest)
    <ul>
      <li><?php download_link("php-3.0.18.tar.gz", "PHP 3.0.18 Source Code"); ?></li>
      <li><?php download_link("php-3.0.17-win32.zip", "PHP 3.0.17 Windows Binary (zip)"); ?></li>
    </ul><br>
  </li>
  <li><a href="ftp://ftp.nerosworld.com/pub/php/dist">PHP/FI 2.0</a> Source and related files</li>
</ul>

<p>
<i>Older releases are listed for archeological purposes only. They are no longer supported.</i>
</p>

<?php commonFooter(); ?>
