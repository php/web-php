<?php // -*- C++ -*-

require("shared.inc");

$try_files = array();

$function = strtolower($function);

function tryprefix($func, $prefix) {
    global $try_files, $MIRRORS, $MYSITE;

    // Get the country code, to find native
    // language manual entries first
    $cc = $MIRRORS[$MYSITE][0];
    $int_manual_try = array();
    $en_manual_try = array();

    $func = ereg_replace("_","-",$func);
    $func = ereg_replace('\(.*\)',"-",$func);

    $int_manual_try[] = "/manual/${cc}/${prefix}${func}.php";
    $en_manual_try[] = "/manual/${prefix}${func}.php";

    $nosp = ereg_replace(" ", "", $func);
    if ($nosp != $func) {
	$int_manual_try[] = "/manual/${cc}/${prefix}${nosp}.php";
	$en_manual_try[] = "/manual/${prefix}${nosp}.php";
    }
    $dasp = ereg_replace(" ", "-", $func);
    if ($dasp != $func) {
	$int_manual_try[] = "/manual/${cc}/${prefix}${dasp}.php";
	$en_manual_try[] = "/manual/${prefix}${dasp}.php";
    }
    $noul = ereg_replace("-", "", $func);
    if ($noul != $func) {
	$int_manual_try[] = "/manual/${cc}/${prefix}${noul}.php";
	$en_manual_try[] = "/manual/${prefix}${noul}.php";
    }
    $try_files = array_merge($try_files, $int_manual_try, $en_manual_try);
}

tryprefix($function, "function.");
tryprefix($function, "class.");
tryprefix($function, "ref.");
tryprefix($function, "feature-");
tryprefix($function, "construct.");
tryprefix($function, "control-structures.");

reset($try_files);
while (list($dummy, $file) = each($try_files)) {
    if (file_exists($DOCUMENT_ROOT.$file)) {
	Header("Location: $file");
	exit;
    }
}

Header("Location: search.php?pattern=".urlencode($function)."&show=nosource");
exit;


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
or click <A HREF="/quickref.php">here</A> for an alphabetical list of all PHP functions.
<P>

<?php commonFooter(); ?>
