<?php
require("shared.inc");
commonHeader("License Information");
?>

<p>You can download the text of the latest version (2.02) of the
PHP license <a href="2_02.txt">here</a>.

<a name="#FAQ"><h1>Frequently Asked Questions</h1></a>

<p><b>Q.</b> Why is PHP 4 not dual-licensed under the GNU General
Public License (GPL) like PHP 3 was?</p>

<p><b>A.</b> Because PHP 4 uses the Zend scripting engine library,
which is under the QPL, and the developers of PHP chose to no longer
continue releasing our code under a dual-license scheme.</p>

<p><b>Q.</b> What does the PHP license mean then, in simple words?</p>

<p><b>A.</b> (Note: This answer should in no way be taken to replace
the PHP license, it is intended to give you a general impression
of what the license means.) Essentially, the PHP license gives you
the right to use, distribute and modify PHP as much as you want,
for both commercial and non-commercial use. You just have to make
it clear to the user that what you have distributed contains PHP.</p

<p><b>Q.</b> The Zend license says I may not charge money for stuff
I sell along with Zend.  Does that mean I cannot sell PHP scripts
or web sites that I build?</p>

<p><b>A.</b> <strong>No.</strong>  Not at all.  This clause only
concerns software built around the Zend scriping engine library,
not scripts that PHP executes, using that library. You are free
to distribute PHP source code you write freely or commercially,
without any concern about the PHP or Zend licenses. You may also
package PHP as a whole with your commercial applications as much
as you want. You just can't build commercial applications that use
the Zend scriping engine library directly.</p>

<p><b>Q.</b> So, what's the point of the Zend license?  When should
I be concerned about it?</p>

<p><b>A.</b> You should be aware of the Zend license in two cases.
First, if you publish patches to the Zend scriping engine library.
The Zend license allows Zend Technologies, Ltd. to use those
patches royalty-free (see the license for exact details). Second,
the license prevents commercial use of the Zend scriping engine
library to build commercial applications.  If you want to use the
Zend scriping engine library commercially (for example, as a macro
language in a commercial word processor you're writing), you must
contact Zend Technologies, Ltd. for licensing information.

<p><b>Q.</b> Where can I get more information on the QPL?</p>

<p><b>A.</b> The authors of the QPL, Troll Tech AS,
have published an annotated version of the license which
makes it easier to understand. You can view it online <a
href="http://www.troll.no/qpl/annotated.html">here</a>.

<p><b>Q.</b> You suck! I'm going to take the last version of PHP 3
that was distributed under the GPL and fork! How would you like
that?</p>

<p><b>A.</b> With fries.</p>

<?php commonFooter(); ?>
