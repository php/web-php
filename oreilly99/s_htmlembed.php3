<?php require("header.inc"); ?>

<h1>HTML Embedding</h1>
<ul>
<li>SGML style: &lt;? code ?&gt;
<li>XML style: &lt;?php code ?&gt;
<li>ASP style: &lt;% code %&gt;
<li>Javascript style: &lt;script language="php"&gt;code&lt;/script&gt;
</ul>
<?php example('
<HTML><HEAD>
 <TITLE>Search results for "<?php print $query; ?>"</TITLE>
</HEAD>
<BODY>

'); ?>

<h1>Traditional CGI Programming</h1>
<?php example('
#!/usr/bin/perl

print "<HTML><HEAD>\n";
print " <TITLE>Search results for \"$query\"</TITLE>\n";
print "</HEAD>\n";
print "<BODY>\n";

'); ?>

<?php require("footer.inc"); ?>
