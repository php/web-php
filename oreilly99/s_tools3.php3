<?php require "header.inc"?>
<h1>Auto Prepend and Auto Append</h1>

<p>Include a PHP script before and after each PHP-parsed
file.

<p>Can include a common set of functions, or wrap content
with a common header and footer.

<?example('<Directory /files/>
SetHandler application/x-httpd-php3
php3_auto_prepend header.inc
php3_auto_append  footer.inc
</Directory>
');?>

<?php require "footer.inc"?>
