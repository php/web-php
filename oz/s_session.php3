<?php require "header.inc"; ?>
<h1>Session Support</h1>

<?php example('<?php
session_start();
if (!session_is_registered("mySession")) {
    session_register("mySession");
}
?>
'); ?>

<h2>Session Data Backends</h2>
<?php example('<?php

session_set_save_handler("myOpen", "myClose",
                         "myRead", "myWrite",
                         "myDestroy", "myGC");
session_module_name("mm");

session_module_name("files");
?>
'); ?>

<?php require "footer.inc"; ?>
