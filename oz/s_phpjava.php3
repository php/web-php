<?php require "header.inc"; ?>

<H1>PHP and Java</H1>

<h2>4.0b3 and up has Java support:</h2>

<?php example('<?php

$frame = new Java("java.awt.Frame", "PHP 4");
$button = new Java("java.awt.Button","Hello World");
$frame->add("North", $button);
$frame->validate();
$frame->pack();
$frame->visible = True;

$thread = new Java("java.lang.Thread");
$thread->sleep(10000);

$frame->dispose();

?>'); ?>

<?php require "footer.inc"; ?>
