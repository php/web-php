<?php require "header.inc"?>
<h1>Functions</h1>

<p>By seperating commonly used navigation elements into functions,
we get "change it once, change it everywhere" ease of development.

<p>Used in conjunction with auto_prepend, we can make our functions
always available without extra code.

<?example('<?commonHeader("Title");?>
<p>This is my page.
<?commonFooter();?>
');?>

<?php require "footer.inc"?>
