<?php require "header.inc"?>
<H1>File Handling</H1>

<H4>Pass through</H4>
<?example('<PRE><?php readfile("sample.txt");?></PRE>');?>
<H6>Output:</H6><BLOCKQUOTE>
<h6>
<PRE style="font-size: 12pt"><?php readfile("sample.txt");?></PRE>
</h6>
</BLOCKQUOTE>

<H4>Read into an array</H4>
<?example('<?php
$a = file("sample.txt");
for ($i = 0; $i < count($a); $i++) {
    echo $a[$i], "<BR>";
}
?>');?>
<H6>Output:</H6><BLOCKQUOTE>
<h6>
<?php
$a = file("sample.txt");
for ($i = 0; $i < count($a); $i++) {
    echo $a[$i], "<BR>";
}
?>
</h6>
</BLOCKQUOTE>

</UL>

<?php require "footer.inc"?>
