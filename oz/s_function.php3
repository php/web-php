<?php require "header.inc"?>
<H1>User-defined Functions</H1>

<?example('<?php
function log_data($user, $data) {
 mysql_query("INSERT INTO userdata VALUES (\'".
            uniqid()."\', \'$user\', \'$data\')");
}
?>');?>

<H1>Pass-by-reference</H1>

<?php example('<?php log_data($PHP_AUTH_USER, &$data); ?>'); ?>

<H1>Default values</H1>

<?php example('<?php
function header($title="Default Title") {?>
    <HTML><HEAD><TITLE>
    <?php echo $title; ?>
    </TITLE></HEAD><BODY><?php
}
?>');?>

<?php require "footer.inc"?>
