<?php require "header.inc"?>
<H1>Regular Expression Handling</H1>

<UL>
<LI>Full POSIX extended regular expressions.
<LI>No support for Perl syntax yet (\w, \W, \s, etc) but most can be emulated with POSIX constructs ([[:space:]], [[:alpha:]], etc).

<?example('<?php
    echo ereg_replace("will be ([[:alpha:]]+)", "has been \\\\1", "This string will be modified.");
?>');?>
<H6>Output:</H6><BLOCKQUOTE>
<?php
    echo ereg_replace("will be ([[:alpha:]]+)",
                      "has been \\1", "This string will be modified.");
?>
</BLOCKQUOTE>

<?php require "footer.inc"?>
