<?
require("shared.inc");
commonHeader("PHP 4.0 & Zend License FAQ");
?>


<table border="0">
<tr><td><b>Q.</b></td><td bgcolor="#ffbbaa"> Why is PHP 4.0 no longer under the GNU Public License (GPL)?</td></tr>
<tr><td><b>A.</b></td><td bgcolor="#aaffbb"> There are several reasons.  First off, even PHP 3.0 could be distributed under the PHP License, at the user's discretion.  The reason for that was that the GPL is often too restrictive;  Since we didn't want to discourage commercial companies from redistributing PHP along with their PHP-based applications;  And, since we wanted to give commercial companies the ability to contribute to PHP (almost all commercial companies cannot contribute code to GPL'd software, for legal reasons) - we've decided to drop the GPL altogether.</td></tr>

<tr><td><b>Q.</b></td><td bgcolor="#ffbbaa"> What does the PHP license mean then, in simple words?</td></tr>
<tr><td><b>A.</b></td><td bgcolor="#aaffbb"> This paragraph should in no way be taken to replace the PHP license,
it is intended to give you a general impression of what the license means.
Essentially, the PHP license gives you the right to use, distribute and modify PHP as much as you want, for both freeware/opensource and commercial use.  If you distribute it commercially, you must put a note that makes it clear to the user that the package he bought contains PHP, which is free software.  It also states that Zend is distributed under the Zend license, which is essentially the QPL.  For more information on what that means, read the next FAQ. In one short sentence, the second version of the PHP license, makes PHP more free than ever before.</td></tr>

<tr><td><b>Q.</b></td><td bgcolor="#ffbbaa"> The Zend license says I may not charge money for stuff I sell along with Zend.  Does that mean I cannot sell PHP scripts or web sites that I build?
<tr><td><b>A.</b></td><td bgcolor="#aaffbb"> <strong>No.</strong>  Not at all.  This clause only concerns software built around Zend, not scripts that PHP executes, using Zend.  You are free to distribute PHP source code you write freely or commercially, without any concern about the PHP or the Zend licenses.
You may also package PHP as a whole with your commercial applications as much as you want;  You just can't build commercial applications that use the Zend library directly.
</td></tr>

<tr><td><b>Q.</b></td><td bgcolor="#ffbbaa"> So, what's the point of the Zend license?  When should I be concerned about it?</td></tr>
<tr><td><b>A.</b></td><td bgcolor="#aaffbb"> You should be aware of the Zend license in two cases.  First, if you publish patches to the Zend engine.  The Zend license allows us (Andi Gutmans & Zeev Suraski) to use these patches royalty-free (see the license for exact details).  Second, the license prevents commercial use of the Zend library to build commercial applications.  If you want to use the Zend library commercially (for example, as a macro language in a commercial word processor you're writing), you must contact us for licensing information.  Again, this does not concern PHP in any way. 

<tr><td><b>Q.</b></td><td bgcolor="#ffbbaa"> Where can I get more information on the QPL?</td></tr>
<tr><td><b>A.</b></td><td bgcolor="#aaffbb"> The authors of the QPL, Troll Tech AS, have published an annotated version of the license which makes it easier to understand. You can view it at http://www.troll.no/qpl/annotated.html

</table>

<? commonFooter(); ?>
