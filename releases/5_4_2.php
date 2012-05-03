<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_4_2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.4.2 Release Announcement");
?>

<h1>PHP 5.4.2 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.4.2. This release delivers a security fix.</p>

<p>There is a vulnerability in certain CGI-based setups that has gone
unnoticed for at least 8 years. <a
href="http://tools.ietf.org/html/draft-robinson-www-interface-00#section-7">Section
7 of the CGI spec</a> states:</p>

<cite>
   Some systems support a method for supplying a array of strings to the
   CGI script. This is only used in the case of an `indexed' query. This
   is identified by a "GET" or "HEAD" HTTP request with a URL search
   string not containing any unencoded "=" characters.
</cite>

<p>So requests that do not have a "=" in the query string are treated
differently from those who do in some CGI implementations. For PHP this
means that a request containing ?-s may dump the PHP source code for the
page, but a request that has ?-s&amp;a=1 is fine.</p>

<p>A large number of sites run PHP as either an Apache module through
mod_php or using php-fpm under nginx. Neither of these setups are
vulnerable to this. Straight shebang-style CGI also does not appear to
be vulnerable.</p>

<p>If you are using Apache mod_cgi to run PHP you may be vulnerable. To see
if you are just add ?-s to the end of any of your URLs. If you see your
source code, you are vulnerable. If your site renders normally, you are not.</p>

<p>Making a bad week worse, we had a bug in our bug system that toggled the
private flag of a bug report to public on a comment to the bug report
causing this issue to go public before we had time to test solutions to
the level we would like.</p>

<p>To fix this update to PHP 5.3.12 or PHP 5.4.2. We recognize that since
this is a rather outdated way to run PHP it may not be feasible to
upgrade these sites to a modern version of PHP, so an alternative is to
configure your web server to not let these types of requests with query
strings starting with a "-" and not containing a "=" through. Adding a
rule like this should not break any sites. For Apache using mod_rewrite
it would look like this:</p>

<pre>
    RewriteCond %{QUERY_STRING} ^(%2d|-)[^=]+$ [NC]
    RewriteRule ^(.*) $1? [L]
</pre>

<p>If you are writing your own rule, be sure to take the urlencoded ?%2ds
version into account.</p>

<p>For source downloads of PHP 5.4.2 please visit
our <a href="/downloads.php">downloads page</a>, Windows binaries can be found
on <a href="http://windows.php.net/download/">windows.php.net/download/</a>. A
<a href="/ChangeLog-5.php#5.4.2">ChangeLog</a> exists.</p>

<?php site_footer(); ?>
