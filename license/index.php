<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'license/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("License Information");
?>

<h1>License Information</h1>

<p>
 You can download the text of the latest version (3.0) of the
 PHP license <a href="3_0.txt">here</a>.
</p>

<a name="#FAQ"><h1>Frequently Asked Questions</h1></a>

<p>
 <strong>Q.</strong> I've written a project in PHP that I'm going to release
 as open source, and I'd like to call it PHPTransmogrifier. Is that
 OK?
</p>

<p>
 <strong>A.</strong> We cannot really stop you from using PHP in the name of
 your project unless you include any code from the PHP distribution, in
 which case you would be violating the license. But we would really
 prefer if people would come up with their own names independent of the
 PHP name.
</p>

<p>
 Why you ask? You are only trying to contribute to the PHP
 community. That may be true, but by using the PHP name you are
 explicitly linking your efforts to those of the entire PHP development
 community and the years of work that has gone into the PHP project.
 Every time a flaw is found in one of the thousands of applications out
 there that call themselves "PHP-Something" the negative karma that
 generates reflects unfairly on the entire PHP project. We had nothing
 to do with PHP-Nuke, for example, and every bugtraq posting on that
 says "PHP" in it. Your particular project may in fact be the greatest
 thing ever, but we have to be consistent in how we handle these
 requests and we honestly have no way of knowing whether your project
 is actually the greatest thing ever.
</p>

<p>
 So, please, pick a name that stands on its own merits. If your
 stuff is good, it will not take long to establish a reputation for
 yourselves. Look at Zope, for example, that is a framework for Python
 that doesn't have Python in the name. Smarty as well doesn't have PHP
 in the name and does quite well.
</p>

<p>
 <strong>Q.</strong> Why is PHP 4 not dual-licensed under the GNU General
 Public License (GPL) like PHP 3 was?
</p>

<p>
 <strong>A.</strong> GPL enforces many restrictions on what can and cannot
 be done with the licensed code. The PHP developers decided to
 release PHP under a much more loose license (Apache-style), to help
 PHP become as popular as possible.
</p>

<p>
 <em>
  Note: the following questions and answers only apply to version
  2.01 and 2.02 of the PHP license. Ignore for version 3.0.
 </em>
</p>

<p>
 <strong>Q.</strong> What does the PHP license mean then, in simple words?
</p>

<p>
 <strong>A.</strong> (Note: This answer should in no way be taken to replace
 the PHP license, it is intended to give you a general impression
 of what the license means.) Essentially, the PHP license gives you
 the right to use, distribute and modify PHP as much as you want,
 for both commercial and non-commercial use. You just have to make
 it clear to the user that what you have distributed contains PHP.
</p>

<p>
 <strong>Q.</strong> The Zend license says I may not charge money for stuff
 I sell along with Zend. Does that mean I cannot sell PHP scripts
 or web sites that I build?
</p>

<p>
 <strong>A.</strong> <strong>No.</strong> Not at all. This clause only
 concerns software built around the Zend scripting engine library,
 not scripts that PHP executes, using that library. You are free
 to distribute PHP source code you write freely or commercially,
 without any concern about the PHP or Zend licenses. You may also
 package PHP as a whole with your commercial applications as much
 as you want. You just can't build commercial applications that use
 the Zend scripting engine library directly.
</p>

<p>
 <strong>Q.</strong> So, what's the point of the Zend license?
 When should I be concerned about it?
</p>

<p>
 <strong>A.</strong> You should be aware of the Zend license in two cases.
 First, if you publish patches to the Zend scripting engine library.
 The Zend license allows Zend Technologies, Ltd. to use those
 patches royalty-free (see the license for exact details). Second,
 the license prevents commercial use of the Zend scripting engine
 library to build commercial applications. If you want to use the
 Zend scripting engine library commercially (for example, as a macro
 language in a commercial word processor you're writing), you must
 contact <a href="mailto:license@zend.com">Zend Technologies,
 Ltd.</a> for licensing information.
</p>

<p>
 <strong>Q.</strong> Where can I get more information on the QPL?
</p>

<p>
 <strong>A.</strong> The authors of the QPL, Troll Tech AS,
 have published an annotated version of the license which
 makes it easier to understand. You can view it online <a
 href="http://www.troll.no/qpl/annotated.html">here</a>.
</p>

<p>
 <strong>Q.</strong> You suck! I'm going to take the last version of PHP 3
 that was distributed under the GPL and fork! How would you like
 that?
</p>

<p>
 <strong>A.</strong> With fries.
</p>

<?php site_footer(); ?>
