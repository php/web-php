<?php require "header.inc"?>
<h1>AddHandler and Action</h1>

<p>Instead of serving up a file, call a script and tell it what
file to serve up.

<?example('<Directory /files>
AddHandler file-action html
Action file-action /path/to/handler.php
</Directory>
');?>

<?example('<?
$file = file($DOCUMENT_ROOT.$PATH_INFO);
echo "There are ", count($file), 
     " lines in $PATH_INFO.";
?>
');?>

<?php require "footer.inc"?>
