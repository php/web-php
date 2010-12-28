<?php /* vim: set filetype=css : */ 
$str = date(DATE_RSS, strtotime("+1 hour"));
header("Expires: $str");
header("Content-Type: text/css");
?>
<?php if (rand(1, 9000) == 1337): ?>
#headhome {
    background: url(/images/ele-running.gif) no-repeat -10px;
    position: relative;
    z-index: 1;
}
#headhome a {
    background: none;
}
<?php endif ?>

