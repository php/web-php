<?php require "header.inc"?>
<H1>
Language Overview</H1>
<h6>Hello World</h6>
<?example('<html><head><title>PHP Test</title></head>
<body>
<?php echo "Hello World<P>"; ?>
</body></html>
')?>
<h6>Displaying a Variable</h6>
<?example('<?php echo $HTTP_USER_AGENT; ?>')?>
<h6>Output:</h6>
<blockquote><?php echo $HTTP_USER_AGENT; ?></blockquote>
<?php require "footer.inc"?>
