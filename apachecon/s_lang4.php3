<?php require "header.inc"?>
<h1>Looping Control Structures</h1>
<?example('<?for ($loop = 0; $loop < 10; $loop++) {
      echo "<P>$loop.";
    }?>');?>
<?example('<?$loop = 0;
    while ($loop < 10) {
        echo "<P>$loop.";'.' $loop++;
    }?>');?>
<?example('<?do {
        echo "<P>$loop."; $loop++;
    } while ($i < 10);?>');?>
<?php require "footer.inc"?>
