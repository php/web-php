<?
require("shared.inc");
commonHeader("Incompatibilities between PHP 3.0 and Zend");
echo "\n<!--$MYSITE-->\n";
?>

<h2 align="center">Incompatibilities between PHP 3.0 and Zend</h2>
<ul>
  <li>Static variable and class member initializers only accept scalar values (in PHP 3.0 they accepted any valid expression).  The impact
    should be small, since initializers with anything but a simple  static value
    rarely make sense.</li>
  <li>The scope of break and continue is local to that of an  include()'d file or an eval()'d string.  There
    should be virtually no impact for this incompatibility.</li>
  <li>A return statement from a require()'d file no longer works.  It  hardly worked in PHP 3.0, so the impact should be fairly small.&nbsp;
    If you want this functionality - use include() instead.</li>
  <li>unset() is no longer a function, but a statement.  It was never  documented as a function,
    so the impact here will probably be non existent.</li>
  <li>The following letter combination is not supported within encapsulated  strings:  "{$".  If you have a string that includes this letter  combination, for example, print "{$somevar"; (which printed the  letter { and the contents of the variable $somevar in PHP 3.0),  it will result in a parse error under Zend.  In this case, you  would have to change the code to print
    &quot;\{$somevar&quot;;<br>
  This incompatability is due to the full variable reference  within quoted strings feature added in Zend.</li>
  <li>The function short_tags() no longer works.  In future betas, there will be alternatives to this function, but currently, there is no way to change PHP's short tags behavior in runtime, only by using configuration parameters (.htaccess variables would work well).</li>
  <li>You can't used PHP3 dynamic extensions (php3_*.dll on Windows) with PHP4.</li>
  <li>The string "0" is now considered empty. This is known to have an effect on phpMyAdmin.</li>
  <li>In PHP4, multiple calls to setcookie() are performed in the order called, whereas in PHP3 they were performed in reverse order.</li>
  <li>unset() now greaks the association between a locally scoped variable and one that is globally scoped if the reference is made using the "global" keyword.</li>
</ul>

<p>If any more incompatibilities are discovered, we will add them here.</p>

<? commonFooter(); ?>
