<?php

include_once "prepend.inc";

// Redirect to new manual page (lang can also contain en/print for example)
mirror_redirect("/manual/" . $_GET['lang'] . "/" . $_GET['file']);

?>