<?php require "header.inc"?>
<H1>C-like File Handling</H1>

<H4>Reading from a file</H4>
<?example('<?php
$file = fopen("sample.txt", "r");
while (!feof($file)) {
    echo fgetss($file, 1024), "<BR>";
}
?>');?>
<H6>Output:</H6><BLOCKQUOTE>
<h6>
<?php
$file = fopen("sample.txt", "r");
while (!feof($file)) {
    echo fgetss($file, 1024), "<BR>";
}
?>
</h6>
</BLOCKQUOTE>

<H4>Writing to a file</H4>
<?example('<?php
$file = fopen("agent.log", "a");
fputs($file, $HTTP_USER_AGENT."\n");
?>');?>

</UL>

<?php require "footer.inc"?>
