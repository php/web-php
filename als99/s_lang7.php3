<?php require "header.inc"?>
<h2>Arrays</h2>
<h3>Ordered arrays</h3>
<?example('<?php
$a[0] = 1;
$a[1] = "foo";
$a[] = 1.57;
?>'); ?>
<h3>Associative arrays</h3>
<?example('<?php
$catch_it[\'cat\'] = "mouse";
$catch_it[\'dog\'] = "cat";
?>');?>
<h3>Manipulating</h3>
<ul>
<li><B>Sorting:</B> sort(), rsort(), ksort(), usort()
<li><B>Traversal:</B> reset(), end(), next(), each(), current(), key()
</ul>
<?php require "footer.inc"?>
