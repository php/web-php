<?php require "header.inc"?>
<h2>Arrays</h2>
<ul>
<li>Ordered arrays
<?example('<? $a[0] = 1; $a[1] = "foo"; $a[2] = 1.57; ?>'); ?>
<li>Associative arrays
<?example('<? $a[\'cat\'] = "mouse"; $a[\'dog\'] = "cat"; ?>');?>
<li>Manipulating
<ul>
<li><B>Sorting:</B> sort(), rsort(), ksort(), usort()
<li><B>Traversal:</B> reset(), next(), current, each()
</ul>
<?php require "footer.inc"?>
