<?php
require_once 'prepend.inc';
commonHeader("Bugs Database Dos and Don'ts");
?>

<h1>PHP Bug reporting Dos And Don'ts</h1>

<ul>
<li>Please don't report bugs in versions older than two revisions
    before the latest one available. E.g., if the latest revision
    is 4.0.6, please don't report problems in versions earlier than
    4.0.4. Instead, upgrade first to the latest version, and see
    if the problem isn't solved. Only if it isn't - submit a bug
    report here.</li>
<li>Don't report missing functions in the documentation as a
    'documentation problem', or as anything else. We have an
    uptodate list of which functions are missing from the
    documentation, and the only reason they're missing from
    there is that nobody had the time to document them just yet.
    Consult the PHP mailing list
    (<a href="mailto:php-general@lists.php.net">php-general@lists.php.net</a>)
    instead, and if you gather enough information - feel free to
    submit your own documentation of the function to us.</li>
<li>Don't group more than one issue (problem report or change request)
    in one problem report. Instead, separate them into multiple
    problem reports.</li>
<li>Always check the <a href="/FAQ.php">PHP FAQ</a> before submitting
    bug reports.</li>
<li>Always search the bug database first for similar problem you are
    experiencing. It might have already been reported and fixed. Or 
    it isn't a bug at all.</li>
<li>If PHP is crashing for you, please
    <a href="bugs-generating-backtrace.php">generate a gdb backtrace</a>
    and submit it with your bug report.</li>
<li>Never submit bug reports when it is obvious that there aren't nearly
    enough details for us to solve it. For example, "phpinfo() dumps core"
    makes a pretty useless bug report, unless you at least provide us
    with the gdb backtrace, the switches you've compiled PHP with, etc.</li>
<li>Never add the php.ini file into the bug report.</li>
<li>Never add over 15 lines long example scripts into bug report.
    If you are unable to create a short script that shows what the
    problem is, put the long script into some place where it can
    be accessed and add an URL for it into the report.</li>
<li>Never submit the same bug report more than once.</li>
<li>Always report bugs in the English language.</li>
<li>If you are trying to report bugs in PHP 4.0, please
    go <a href="http://bugs.php.net/">here</a>.</li>
</ul>

<?php commonFooter(); ?>
