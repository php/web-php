<?php require "header.inc"?>
<H1>Limits configuration</H1>

<font size=+3>You can set a limit on the amount of memory a script can allocate.</font>
<?example("memory_limit = 8388608");?><BR>
<font size=+3>You can set a limit on the amount of memory a script can allocate.</font>
<?example("max_execution_time = 30");?><BR>
<font size=+3>Safe mode restricts pages to opening files that are owned
by the same user id as the script is owned by. Also adds the uid
to authentication realms.</font>
<?example("safe_mode = on");?><BR>


<?php require "footer.inc"?>
