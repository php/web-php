<?php require "header.inc"?>
<H1>Encoding</H1>
<H2>Base64</H2>
<?example('<?php
 echo ($encoded = base64_encode(
           "A rose by any other name..."));
 echo ($decoded = base64_decode($encoded));
?>');?>
<?php
output(($encoded = base64_encode("A rose by any other name...")).
       "<BR>".
       ($decoded = base64_decode($encoded)));
?>
<H2>HTML</H2>
<?example('<?php
 echo htmlspecialchars(
            "This & that are <problems>.");
?>');?>
<?php output(htmlspecialchars(htmlspecialchars("This & that are <problems>."))); ?>
<?php require "footer.inc"?>
