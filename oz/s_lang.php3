<?php require "header.inc"?>
<H1>Language Overview</H1>
<h2>Hello World</h2>
<?example('<html><head><title>PHP Test</title></head>
<body>
<?php echo "Hello World"; ?>
</body></html>
')?>
<h2>Displaying a Variable</h2>
<?example('<?php echo $HTTP_USER_AGENT; ?>')?>
<?php output($HTTP_USER_AGENT); ?>
<?php require "footer.inc"?>
