<?php require("header.inc"); ?>

<h1>CGI vs. Server Module</h1>
<ul>
<li>CGI has per-request process startup overhead
<li>Server modules provides process-persistent resources
<li>CGI programs can not handle HTTP authentication
<li>Apache module the most common form of PHP
<li>No difference in amount of parsed code
</ul>

<?php require("footer.inc"); ?>
