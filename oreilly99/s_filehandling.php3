<?php require "header.inc"?>
<H1>File Handling</H1>

<?example('<PRE><?php readfile("/proc/cpuinfo");?></PRE>');?>
<H2>Output:</H2>
<PRE style="font-size: 12px"><?php readfile("/proc/cpuinfo");?></PRE>

<?php require "footer.inc"?>
