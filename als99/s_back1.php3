<?php require "header.inc"?>
<h1>Configuration</h1>

<UL>

<li><h2>Compile-time settings</h2>
<?example("--enable-asp-tags");?>
<li><h2>Environment variables</h2>
<?example("PHP_INCLUDE_PATH=/path/to/include:.");?>
<li><h2>php3.ini (php.ini)</h2>
<?example("include_path=/path/to/include:.");?>
<li><h2>Apache directives</h2>
<?example("php3_include_path /path/to/include:.");?>
<?example("php_value include_path /path/to/include:.");?>

</UL>

<?php require "footer.inc"?>
