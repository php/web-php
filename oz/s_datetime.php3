<?php require "header.inc"?>
<H2>Date and Time Handling</H2>

<?php example('<?php echo date("M d, Y H:i:s", time()); ?>'); ?>
<?php output(date("M d, Y H:i:s", time())); ?>

<?example('<?php
$dday = mktime(0, 0, 0, 1, 1, 2000);
$diff = $dday - time();
$days = $diff / 86400;
if ($days > 1) {
    printf( "Only %d day%s left!<BR>\n", $days, $days == 1 ?  "" : "s");
} else {
    $hours = $diff / 3600;
    if ($hours > 1) {
        printf( "Only %d hour%s left!<BR>\n", $hours, $hours == 1 ?  "" :  "s");
    } else {
        echo  "Log out and hide under your table!<BR>\n";
    }
}
?>');?>
<?php
$dday = mktime(0, 0, 0, 1, 1, 2000);
$diff = $dday - time();
$days = $diff / 86400;
if ($days > 1) {
    $out=sprintf( "Only %d day%s left!<BR>\n", $days, $days == 1 ?  "" : "s");
} else {
    $hours = $diff / 3600;
    if ($hours > 1) {
        $out=sprintf( "Only %d hour%s left!<BR>\n", $hours, $hours == 1 ?  "" :  "s");
    } else {
        $out = "Log out and hide under your table!<BR>\n";
    }
}
output($out)

;?>

<H2>Calendar Conversions</H2>
<UL>
<LI>Converts between calendars (Julian, Gregorian, Mayan, etc)
</UL>

<?php require "footer.inc"?>
