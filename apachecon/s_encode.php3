<?php require "header.inc"?>
<H1>Encoding</H1>
<H2>Base64</H2>
<?example('<?php
    echo ($encoded = base64_encode($mydata));
    echo ($decoded = base64_decode($encoded));
?>');?>
<H6>Output:</H6><BLOCKQUOTE>
<h6>
<?php
    echo ($encoded = base64_encode("A rose by any other name..."));
    echo "<BR>";
    echo ($decoded = base64_decode($encoded));
?>
</h6>
</BLOCKQUOTE>
<H2>HTML</H2>
<?example('<?php
    echo htmlspecialchars("This & that are <problems>.");
?>');?>
<H6>Output:</H6><BLOCKQUOTE>
<h6>
<?php
    echo htmlspecialchars("This & that are <problems>.");
?>
</h6>
</BLOCKQUOTE>

<?php require "footer.inc"?>
