<?
require("shared.inc");
commonHeader("Bugs Database Dos and Don'ts");
?>

<ul>
<li>Please don't report bugs in versions older than two revisions before the latest one available.  E.g., if the latest revision is 3.0.5, please don't report problems in versions earlier than 3.0.3.  Instead, upgrade first to the latest version, and see if the problem isn't solved.  Only if it isn't - submit a bug report here.
<li>Don't report bugs in the 3.1 tree.  We know very well that there are lots of problems there, and we don't even pretend that it works right.  There's no point at cluttering the bugs database with 3.1 related issues.  For 3.1 related problems, please mail the PHP development mailing list instead, at <a href="mailto:php-dev@lists.php.net">php-dev@lists.php.net</a>.
<li>Don't report missing functions in the documentation as a 'documentation problem', or as anything else.  We have an uptodate list of which functions are missing from the documentation, and the only reason they're missing from there is that nobody had the time to document them just yet.  Consult the PHP mailing list (<a href="mailto:php3@lists.php.net">php3@lists.php.net</a>) instead, and if you gather enough information - feel free to submit your own documentation of the function to us.
<li>Don't group more than one issue (problem report or change request) in one problem report.  Instead, separate them into multiple problem reports.
<li>Always check the <a href="/FAQ.php3">PHP FAQ</a> before submitting bug reports.
<li>Never submit the same bug report more than once.
</ul>

<? commonFooter(); ?>
