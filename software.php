<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'software.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP Software", array("current" => "help"));
?>

<h1>PHP Software</h1>

<p>
 This page contains a list of sites where you can find software distributed
 under the <a href="/license/3_01.txt">PHP license</a>.  
</p>

<p>
 <?php echo make_image("logos/php-icon-white.gif", $alt = "php.net", "left") ?>&nbsp;
 <a href="http://php.net/">php.net</a><br>
 &nbsp;Main site for the PHP project.<br clear="left">
</p>
<p>
 <?php echo make_image("pear-icon.png", $alt = "pear.php.net", "left") ?>&nbsp;
 <a href="http://pear.php.net/">pear.php.net</a><br>
 &nbsp;The PEAR project where you can find reusable components for PHP .<br clear="left">
</p>
<p>
 <?php echo make_image("pecl-icon.png", $alt = "pecl.php.net", "left") ?>&nbsp;
 <a href="http://pecl.php.net/">pecl.php.net</a><br>
 &nbsp;The PECL project where you can find PHP extensions.<br clear="left">
</p>

<?php site_footer();
