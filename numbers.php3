<?
require("shared.inc");
commonHeader("Interesting Numbers");
?>
<h3>Is PHP the most popular server-embedded scripting language on the Net?</h3>
<P>
Perl rules the cgi scripting world.  No argument with that.  But when it comes to
dedicated web scripting languages embedded in the web server the case can be made for
this state to be true.
</P>
<P>
The latest <a href="/usage.php3">PHP usage numbers</a> from <a href="http://www.netcraft.com">Netcraft</a> are in.
Out of <b>7,370,946</b> visible domains on the Internet, <b>795,034 (10.79%)</b> showed they were on servers with the Apache module
version of PHP installed.   Of the 7 million+ visible domains, <b>4,078,326</b> domains are on Apache or Apache-derived
servers capable of running the Apache module version of PHP and PHP is on <b>19.49%</b> of those.
</P>
<P>
To answer our question we need to look at the two main contenders: ASP and Cold Fusion.  Consider that there are 
<b>1,632,440</b> IIS-driven domains.  Let's be generous and say that perhaps 75% of the IIS-driven domains use 
some sort of server-side scripting.  That leaves <b>1,224,330</b> domains.  And if ASP has 60% of that market, 
that gives it <b>734,598</b> domains with 
<b>489,732</b> domains to be split up between Cold Fusion and others.  If we look at domains running Netscape servers, 
we see <b>557,498</b> of those.  Assuming the server-side scripting is split up between Cold Fusion and LiveWire and others, 
this might give Cold Fusion another <b>200,000</b> potential domains if we are being generous, again.
</P>
<P>The marketshare percentages used here were completely pulled out of a hat (a red one, actually) and have
no factual basis.  They might be completely different.  If either ASP or Cold Fusion is on more domains than
the Apache module version of PHP, then the other is way behind.  But, if our rough estimates here are correct,
PHP could very well be ahead of both ASP and Cold Fusion.  I don't know about you, but we think that is pretty
cool.  
</P>
<? commonFooter(); ?>
