<?php require "header.inc"?>
<H1>Environment and Form Variables</H1>

<UL>
<LI>Specify the order in which user-derived variables are added
to the global namespace, if at all.
<?example('gpc_order = CGP');?>
<LI>Create HTTP_POST_VARS, HTTP_GET_VARS, and HTTP_COOKIE_VARS
arrays for direct access to variables from specific sources.
<?example('track_vars = on');?>
<LI>Automatically escape quotes in strings so they can easily be
placed inside an SQL query.
<?example('magic_quotes_gpc = on
magic_quotes_runtime = on');?>
</UL>

<?php require "footer.inc"?>
