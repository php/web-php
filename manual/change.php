<?php
// $Id$
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
// Redirect to new manual page
mirror_redirect("/manual/" . $_GET['page']);
?>