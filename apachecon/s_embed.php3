<?php require "header.inc"; ?>
<H1>HTML-Embedded</H1>
<?example('<html><?echo $variable?></html>');?>
<h1>vs. Traditional Scripting</h1>
<?example('#!perl
use CGI;
$q = new CGI;
$q->AutoEscape(\'true\');
print $q->header(-type => \'text/html\');
$q->import_names();
print $q->start_html(-title => "Test");
print $Q::variable;
print $q->end_html();')
?>
<?php require "footer.inc"; ?>
