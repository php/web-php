<?php // -*- C++ -*-

$try_files = array();

$function = strtolower($function);

function tryprefix($func, $prefix) {
    global $try_files;

    $func = ereg_replace("_","-",$func);
    $func = ereg_replace('\(.*\)',"-",$func);
    $try_files[] = "/manual/${prefix}${func}.php3";
    $nosp = ereg_replace(" ", "", $func);
    if ($nosp != $func) {
	$try_files[] = "/manual/${prefix}${nosp}.php3";
    }
    $dasp = ereg_replace(" ", "-", $func);
    if ($dasp != $func) {
	$try_files[] = "/manual/${prefix}${dasp}.php3";
    }
    $noul = ereg_replace("-", "", $func);
    if ($noul != $func) {
	$try_files[] = "/manual/${prefix}${noul}.php3";
    }
}

tryprefix($function, "function.");
tryprefix($function, "class.");
tryprefix($function, "ref.");
tryprefix($function, "feature-");
tryprefix($function, "construct.");

reset($try_files);
while (list($dummy, $file) = each($try_files)) {
    if (file_exists($DOCUMENT_ROOT.$file)) {
	Header("Location: $file");
	exit;
    }
}

Header("Location: search.php3?pattern=".urlencode($function)."&show=nosource");
exit;


require("shared.inc");
CommonHeader("Quick Manual Reference");

?>
<h3>Oops!</h3>
The function <B><?php echo $function;?></B> doesn't seem to exist.

<h3>Why not?</h3>
<UL>
<LI>there is no manual page for that function ... yet
<LI>you may have mis-spelt the function name
<LI>you may have entered an alias to a function name, and that alias doesn't have it's own manual page<BR>
e.g. <B>mysql_num_rows</B> is the "real" function name, not <B>mysql_numrows</B><BR>
<LI>you entered a bunch of stuff I don't recognize<BR>
e.g. you should enter <B>mysql_result</B>, not <B>mysql_result($q1,0,"foobar");</B>
</UL>
<BR>

If all else fails, just click <A HREF="/manual/">here</A> to go to the table of contents for the online documentation, 
or click <A HREF="/quickref.php3">here</A> for an alphabetical list of all PHP functions.
<P>

<?php commonFooter(); ?>
