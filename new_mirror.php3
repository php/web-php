<?
require("shared.inc");
commonHeader("Mirroring the PHP Web Site");
?>

<h2>Mirroring the PHP Web Site</h2>

<P><b>Note:</b> We are currently re-thinking our mirroring scheme and 
don't want to set up new mirrors at this time.  Please check back in a
week or two for more news.  The old instructions are included below
for informational purposes...</P>

<p>The PHP site has a network of mirrors around the world, that duplicate
most of the functionality.  Small parts of the site (e.g., the bugs
database) are specific to one mirror, but all of the static content
(i.e., the content that does not require database access) is mirrored
to sites around the world.</p>

<p>If you want to mirror the PHP web site yourself, please make sure you
can comply with the following terms:</p>

<ol>
<li>The mirror web server must be Apache 1.2.x or 1.3.x, running PHP
    version 3.0 or later as a module.  Sites running alpha, beta
    or release candidate versions of PHP 3.0 will not be accepted.
<li>The box running the mirror would have to have the 'rsync' program
    set-up.
<li>The box running the mirror would have to update its content
    from the main PHP repository at least once every 12 hours.  
<li>The box running the mirror would have to have approximately 30-50MB
    of free space.
</ol>


<p>If you think you can comply with these terms, please send us a note to
core@php.net, with the subject line "Request for a new mirror".  In
it, please inform us your name and contact Email, your company and its
web site, which country you're from, and any other information which
you may want to add and seems relavant.</p>

<p>Until recently, we've accepted anybody who sent us a request to be added as a
mirror.  That caused some trouble, since it became very difficult to track
which mirrors are uptodate, which mirrors run which versions of PHP, and so
forth.  For that reason, and because the PHP mirrors already cover most of the
globe, we may not need a particular mirror.  Should that happen, please, don't
take it personally, and thanks in advance for the support of PHP.</p>

<p>We'd especially like mirrors in parts of the world that aren't covered yet (if
there are any), high bandwidth sites and sites from countries with exotic flags :)</p>

<p>Thanks for the interest in mirroring the PHP web site!</p>

<? commonFooter(); ?>
