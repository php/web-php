<?require "header.inc"?>
<h1>Adding Authentication</h1>
Add this line:
<?example('<? if($REQUEST_METHOD=="POST") include "auth.inc"; ?>');?>
auth.inc contains:
<?example('<?
    function authenticate() {
        Header("WWW-authenticate: basic realm=\"Photo Album\"");
        Header("HTTP/1.0 401 Unauthorized");?>
        In order to proceed you will need a valid username/password.
        <?
        exit;
    }

    if(!isset($PHP_AUTH_USER)) {
        authenticate();
    } else {
	if($PHP_AUTH_USER != "rasmus" || $PHP_AUTH_PW != "php") {
            authenticate();
        }
    }
?>');?>

<?php require "footer.inc"?>
