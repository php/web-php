<?php require "header.inc"?>
<H1>Functions</H1>

<?example('<?function log_data($user, $data) {
    mysql_query("INSERT INTO userdata VALUES (\'".
                uniqid()."\', \'$user\', \'$data\')");
}?>');?>

<H4>Pass-by-reference</H4>

<?example('<?function sum_array(const $input) {
    while (list(,$value) = each($input)) {
        $total += $input;
    }
    return $total;
}?>');?>

<H4>Default values</H4>

<?example('<?function pageheader($title = "Default Title") {?>
    <HTML><HEAD><TITLE>
    <?echo $title?>
    </TITLE></HEAD><BODY>
<?}?>');?>

<?php require "footer.inc"?>
