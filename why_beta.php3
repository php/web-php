<html><head><title>Why BETA?</title>
<? $title="Why BETA?";
   include "include/header.inc"; ?>

<h2>Why BETA?</h2>
or
<h2>When is PHP 3.0 going to be as stable as PHP/FI 2.0?</h2>

<p>This is probably one of the biggest questions one considers before upgrading.  Especially in production sites,
nobody wants to find out that the scripts that used to run fine until the upgrade suddenly stopped working, or
worse, cause the server to crash.

<p>Fortunately, the answer is that PHP 3.0 is never going to be as stable as PHP/FI 2.0, because PHP/FI 2.0 is
never going to reach the stability of PHP 3.0.  PHP 3.0 and PHP/FI 2.0 are different by design and approach.
Lessons learned from defficiencies in PHP/FI 2.0 were implemented in this complete rewrite.  The core language
parser is literally all new, designed and written from scratch to be more efficient, and more importantly, much
more reliable and stable.  In addition, the new design made implementing new language features such as lists,
for loops and more powerful functions feasable.

<p>Apart of the language core, a lot of new functions have been added, which also contribute to making PHP 3.0
the most powerful web development tool around.  More than half of the SQL drivers have been rewritten from scratch
to use the new powerful features that PHP 3.0 offers, like persistent links to the server, and were added
a lot of functionality that makes them more efficient and easier to use.

<p>Under Windows, PHP 3.0 features a native Microsoft Visual C++ port, identical to the UNIX version in features
and stability (compiles out of the same source tree).  PHP 3.0 will soon offer a native IIS module (via ISAPI)
and NSAPI module under the Win32 environment as well.

<p>So, if it's so good, why is it tagged as BETA when you can get PHP/FI 2.0 final release and avoid trouble with
beta software?  The answer is simple.  PHP 3.0 is tagged as BETA simply because we can't be sure it's as stable
as we think it is, before it is widely used by many people in 'real life' situations long enough.  Even though
we don't think that would happen, especially after the 6 weeks long alpha test, we want to be sure that the new code
runs on all hardware setups PHP/FI 2.0 ran on and performs well on each and every script.  As soon as
the designated BETA test period ends, and assuming that no fatal party-crashing bugs are found, the current BETA
with minor updates and bugfixes will be tagged as the final release.  The final release for PHP 3.0 should be expected
within the next couple of months.


<h2>Who should use PHP 3.0 and who should still use PHP/FI 2.0?</h2>

New users should now begin with PHP 3.0.  It is now definite that PHP 3.0 is going to replace PHP/FI 2.0, and no
further development is planned on the PHP/FI 2.0 core.

Regarding users of PHP/FI 2.0, not everybody should take the time and upgrade to PHP 3.0 (especially since it does require some time, as this
isn't a 100% downwards compatible upgrade).  The approach that should apply here is "if it ain't broke don't fix it".
That means that if you have a site, designed with PHP/FI 2.0, that works fine, takes the load well and doesn't
give you any trouble - you might as well stay with it.  PHP 3.0 can't give you something better than that already
perfect situation.
Just about everybody else should begin migrating to PHP 3.0.  Bug reports are likely to be solved quicker than bugs
in PHP/FI 2.0 (the development team of PHP 3.0 contains 6 people, and the code is much easier to fix) and more
importantly, the new implementation is much less prone to bugs.  The efficiency of the new language implementation
is much better, which means that the load of a PHP 3.0 based site is roughly 35% of the load of a PHP/FI 2.0 based site.
And of course, you're presented with a whole new set of powerful tools and language features that were not available
in PHP/FI 2.0.

More information about the new PHP 3.0 features and changes from PHP/FI 2.0 are described in the
<a href="changes.php3">changes</a> file.  Answers to several frequently asked questions can be found in the
<a href="FAQ.php3">FAQ</a>.

<?include "include/footer.inc"; ?>
