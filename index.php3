<html><head><title>Professional Home Pages Version 3.0</title>
<? $title="Welcome";
   include "include/header.inc"; ?>
<blockquote>
<p>Welcome to the PHP3 network of sites.
<?error_reporting(0); if(filesize("localtop.inc")) { include "localtop.inc"; } error_reporting(1);?>

<p>PHP 3.0 is a complete rewrite of the popular web development scripting language PHP/FI 2.0.  It is currently
in a public ALPHA testing phase, which means you should play with it, but probably shouldn't use it
in your production site just yet.  We highly recommend you try this version (it can run alongside PHP/FI 2.0)
in order to help us find bugs, and in order to see what's new and improved.

<p>This server is currently running PHP version <? echo phpversion() ?> (which means PHP 3.0 is pretty stable, after all).

<ul>
<li><a href="register.php3">Register PHP 3.0</a> (completely free, required before downloading)
<li>Lost your registration password?  <a href="oh_no.php3">Get it back here</a>
<li><a href="download.php3">Download PHP 3.0!</a>
<li><a href="patches.php3">Download patches</a> for official PHP 3.0 releases
<li><a href="config.php3">Configure PHP 3.0</a> online (JavaScript required)
<li>Read what has <a href="changes.php3">changed</a> since PHP/FI 2.0
<li><a href="bug-form.php3">Report bugs</a> you found in PHP 3.0
</ul>
<br>

<?include "include/footer.inc";?>
