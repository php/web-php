<?
    function authenticate() {
        Header("WWW-authenticate: basic realm=\"Photo Album\"");
        Header("HTTP/1.0 401 Unauthorized");?>
        In order to proceed you will need a valid username/password.
        <?
        exit;
    }

    if(!isset($PHP_AUTH_USER)) {
        authenticate();
    }
?>
