<?php require "header.inc"?>
<H1>File Handling</H1>

<H4>Read into an array</H4>
<?example('<?php
$a = file("/proc/cpuinfo");
for ($i = 0; $i < count($a); $i++) {
    echo $a[$i], "<BR>";
}
?>');?>
<H2>Output:</H2>
<FONT SIZE="-1">
<?php
$a = file("/proc/cpuinfo");
for ($i = 0; $i < count($a); $i++) {
    echo $a[$i], "<BR>";
}
?>
</FONT>

<?php require "footer.inc"?>
