<?php require "header.inc"?>
<H1>Limits configuration</H1>

<UL>
<LI>You can set a limit on the amount of memory a script can allocate.
<?example("memory_limit = 8388608");?>
<LI>You can set a limit on the amount of memory a script can allocate.
<?example("max_execution_time = 30");?>
<LI>Safe mode restricts pages to opening files that are owned
by the same user id as the script is owned by. Also adds the uid
to authentication realms.
<?example("safe_mode = on");?>
</UL>


<?php require "footer.inc"?>
