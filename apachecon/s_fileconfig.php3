<?php require "header.inc"?>
<H1>File-handling configuration</H1>

<UL>
<LI>Like the UNIX or DOS path, include_path specifies where
to look for files referenced by include().
<?example("include_path = /www/include:/shared/php/include:.");?>
<LI>Automatically prepend or append scripts to pages without
having to explicitly include them from each page.
<?example("auto_prepend_file = /usr/local/www/include/header.inc
auto_append_file = /usr/local/www/include/footer.inc");?>
<LI><B>URL fopen() wrapper</B> -- set at compile time, allows most
file functions to open files via HTTP and FTP
<?example('<?php readfile("http://quotes.com/q.cgi?n=CD");?>');?>
</UL>


<?php require "footer.inc"?>
