<?php require "header.inc"?>
<H1>Linking from MS-Access</H1>
<h2>Windows-side</h2>
<ul>
<li>Install MyODBC from www.mysql.com
<li>Create a user DSN in the ODBC control panel. 
<li>Create Access Table and do a "Link Table" 
</ul>
<h2>Unix-side</h2>
<ul>
<li>Fix permissions to allow remote connections
</ul>
<h2>Tips</h2>
<ul>
<li>Make sure you have a primary key before you link
<li>Re-link if you change the table schema
</ul>
<?php require "footer.inc"?>
