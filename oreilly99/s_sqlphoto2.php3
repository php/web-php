<?php require "header.inc"?>
<H1>SQL'izing the Photo Album Example</H1>

<h2>The SQL-enabled auth.inc file</h2>
<?example('<? function authenticate() {
        Header("WWW-authenticate: basic realm=\"Photo Album\"");
        Header("HTTP/1.0 401 Unauthorized");?>
        In order to proceed you will need a valid username/password.
        <?
        exit;
    }

    if(!isset($PHP_AUTH_USER)) {
        authenticate();
    } else {
        mysql_pconnect("localhost") or die("DB Unavailable");
        mysql_select_db("mydb") or die("Unable to select database");
        $id=strtolower($PHP_AUTH_USER);
        $query = mysql_query("select * from users where id=\'$id\' and password=\'$PHP_AUTH_PW\'");
        if(!mysql_num_rows($query)) {
            authenticate();
        }
    } ?>')?>
<?php require "footer.inc"?>
