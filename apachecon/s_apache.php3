<?php require "header.inc"?>
<H1>Apache-specific Functions</H1>
<UL>
<?example('<?virtual("/status/");?>');?>
<LI>Virtual() makes an Apache sub-request.
<?example('<?$a = getallheaders();
    while (list($key,$value) = each($a)) {
        echo "$key: $value<BR>";
    }
?>');?>
<LI>Builds an array containing all of the request headers.
<?example('<?apache_note("key", "value");
    $note = apache_note("key");
?>');?>
<LI>Set and get entries from the Apache request notes table
(communicate with other modules).
</UL>

<?php require "footer.inc"?>
