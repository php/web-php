<?php require "header.inc"?>
<h2>Basic data types</h2>
<ul>
<li>numbers (integer and real)
<li>strings
<li>booleans
</ul>
<h2>Dynamic typing</h2>
<ul>
<li>Don't have to declare types
<li>Automatic conversion done
</ul>
<?php example('<?php echo 5 + "1.5" + "10e2"; ?>')?>
<h2>Output:</h2>
<?php output(5 + "1.5" + "10e2"); ?>
<?php require "footer.inc"?>
