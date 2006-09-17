<?php
// $Id$
$_SERVER['BASE_PAGE'] = basename(__FILE__);
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("UPGRADE NOTES - PHP 5.1");
?>

<h1>UPGRADE NOTES - PHP 5.1</h1>

<ol>
<li><a href="#cirh">Changes in reference handling</a>
    <ol>
     <li><a href="#overview">Overview</a></li>
     <li><a href="#cirh2">Code that worked under PHP 4.3, but now fails</a></li>
     <li><a href="#cirh3">Code that was valid under PHP 4.3, but now throws an error</a></li>
     <li><a href="#cirh4">Code that failed under PHP 4.3, but now works</a></li>
     <li><a href="#cirh5">Code that 'should have worked' under PHP 5.0</a></li>
     <li><a href="#cirh6">Warnings that came and went</a></li>
     </ol></li>
<li><a href="#reading">Reading []</a></li>
<li><a href="#is_a">instanceof, is_a(), is_subclass_of(), catch</a></li>
<li><a href="#int">Integer values in function parameters</a></li>
<li><a href="#abstract">Abstract private methods</a></li>
<li><a href="#ami">Access modifiers in interfaces</a></li>
<li><a href="#cir">Changes in inheritance rules</a></li>
<li><a href="#cc">Class constants</a></li>
<li><a href="#extensions">Extensions</a>
     <ol>
     <li><a href="#extensions1">Extensions that are gone from the PHP core</a></li>
     <li><a href="#extensions2">Class constants in new PHP 5.1 extensions</a></li>
     </ol></li>
<li><a href="#date">Date/time support</a></li>
<li><a href="#db">Changes in database support</a>
     <ol>
     <li><a href="#db1">PDO overview</a></li>
     <li><a href="#db2">Changes in MySQL support</a></li>
     <li><a href="#db3">Changes in SQLite support</a></li>
     </ol></li>
<li><a href="#misc">Further migration information</a></li>
<li><a href="#estrict">Checking for E_STRICT errors</a></li>
</ol>

<a name="cirh"></a><h2>1. Changes in reference handling</h2>

<a name="overview"></a><h3>1a. Overview</h3>

<p>
From the PHP script writer's point of view, the change most likely to impact
legacy code is in the way that references are handled in all PHP versions
post-dating the PHP 4.4.0 release.
</p>

<p>
Until and including PHP 4.3, it was possible to send, assign or return variables
by reference that should really be returned by value, such as a constant, a
temporary value (e.g. the result of an expression), or the result of a function
that had itself been returned by value, as here:
</p>

<?php 
highlight_string('<?php

$foo = "123";

function return_value() {
    global $foo;
    return $foo;
}

$bar = &return_value();

?>'); 
?>

<p>
Although this code would usually work as expected under PHP 4.3, in the general
case the result is undefined. The Zend Engine could not act correctly on these
values as references. This bug could and did lead to various hard-to-reproduce
memory corruption problems, particularly where the code base was large.
</p>

<p>
In PHP 4.4.0, PHP 5.0.4 and all subsequent PHP releases, the Engine was fixed
to 'know' when the reference operation is being used on a value that should
not be referenced. The actual value is now used in such cases, and a warning
is emitted. The warning takes the form of an E_NOTICE in PHP 4.4.0 and up,
and E_STRICT in PHP 5.0.4 and up.
</p>

<p>
Code that could potentially produce memory corruption can no longer do so.
However, some legacy code might work differently as a result.
</p>

<a name="cirh2"></a><h3>1b. Code that worked under PHP 4.3, but now fails</h3>
 
<?php 
highlight_string('
<?php

function func(&$arraykey) {
    return $arraykey; // function returns by value!
}

$array = array(\'a\', \'b\', \'c\');
foreach (array_keys($array) as $key) {
    $y = &func($array[$key]);
    $z[] =& $y;
}

var_dump($z);

?>
'); ?>

<p>
Running the above script under any version of PHP that pre-dates the reference
fix would produce this output:</p>

<?php
highlight_string('
array(3) {
  [0]=>
  &string(1) "a"
  [1]=>
  &string(1) "b"
  [2]=>
  &string(1) "c"
}

'); ?>

<p>Following the reference fix, the same code would result in:</p>

<?php
highlight_string('
array(3) {
  [0]=>
  &string(1) "c"
  [1]=>
  &string(1) "c"
  [2]=>
  &string(1) "c"
}
'); ?>


<p>
This is because, following the changes, func() assigns by value. The value
of $y is re-assigned, and reference-binding is preserved from $z. Prior
to the fix, the value was assigned by reference, leading $y to be
re-bound on each assignment. The attempt to bind to a temporary value
by reference was the cause of the memory corruption.</p>

<p>
Such code can be made to work identically in both the pre-fix and the
post-fix PHP versions. The signature of func() can be altered to return
by reference, or the reference assignment can be removed from the result
of func().</p>

<?php
highlight_string('
<?php

function func() {
    return \'function return\';
}

$x = \'original value\';
$y =& $x;
$y = &func();
echo $x;

?>
'); ?>

<p>
In PHP 4.3 $x would be 'original value', whereas after the changes it would
be 'function return' - remember that where the function does not return by
reference, the reference assignment is converted to a regular assignment.
Again, this can be brought to a common base, either by forcing func() to
return by reference or by eliminating the by-reference assignment.
</p>

<a name="cirh3"></a><h3>1c. Code that was valid under PHP 4.3, but now throws an error</h3>

<?php
highlight_string('
<?php

class Foo {

    function getThis() {
        return $this;
    }

    function destroyThis() {
        $baz =& $this->getThis();
    }
}

$bar = new Foo();
$bar->destroyThis();
var_dump($bar);

?>
');
?>

<p>
In PHP 5.0.3, $bar evaluated to NULL instead of returning an object.
That happened because getThis() returns by value, but the value here
is assigned by reference. Although it now works in the expected way,
this is actually invalid code which will throw an E_NOTICE under
PHP 4.4 or an E_STRICT under PHP 5.0.4 and up.
</p>

<a name="cirh4"></a><h3>1d. Code that failed under PHP 4.3, but now works</h3>

<?php
highlight_string('
<?php

function &f() {
    $x = "foo";
    var_dump($x);
    print "$x\n";
    return($a);
}

for ($i = 0; $i < 3; $i++) {
    $h = &f();
}

?>
'); ?>

<p>
In PHP 4.3 the third call to var_dump produces NULL, due to the memory
corruption caused by returning an uninitialized value by reference.
This is valid code in PHP 5.0.4 and up, but threw errors in earlier
releases of PHP.
</p>

<?php
highlight_string('
<?php

$arr = array(\'a1\' => array(\'alfa\' => \'ok\'));
$arr =& $arr[\'a1\'];
echo \'-\'.$arr[\'alfa\']."-\n";

?>
'); ?>

<p>
Until PHP 5.0.5, it wasn't possible to assign an array element by
reference in this way. It now is.
</p>

<a name="cirh5"></a><h3>1e. Code that 'should have worked' under PHP 5.0</h3>

<p>
There are a couple of instances of bugs reported under PHP 5.0 prior
to the reference fixes which now 'work'. However, in both cases errors
are thrown by PHP 5.1, because the code was invalid in the first place.
Returning values by reference using self:: now works in the general
case but throws an E_STRICT warning, and although your mileage may
vary when assigning by reference to an overloaded object, you will
still see an E_ERROR when you try it, even where the assignment
itself appears to work.
</p>

<a name="cirh6"></a><h3>1f. Warnings that came and went</h3>

<?php
highlight_string('<?php

function & foo() {
    $var = \'ok\';
    return $var;
}

function & bar() {
    return foo();
}

$a =& bar();
echo "$a\n";

?>
'); ?>

<p>
Nested calls to functions returning by reference are valid code under both
PHP 4.3 and PHP 5.1, but threw an unwarranted E_NOTICE or E_STRICT under
the intervening PHP releases.
</p>

<a name="reading"></a><h2>2. Reading []</h2>

<?php
highlight_string('
<?php

class XmlTest {

    function test_ref(&$test) {
        $test = "ok";
    }

    function test($test) { }

    function run() {
        $ar = array();
        $this->test_ref($ar[]);
        var_dump($ar);
        $this->test($ar[]);
    }
}

$o = new XmlTest();
$o->run();

?>
'); ?>

<p>
This should always have thrown a fatal E_ERROR, because [] cannot be used
for reading in PHP. It is invalid code in PHP 4.4.2 and PHP 5.0.5 upward.
</p>

<a name="is_a"></a><h2>3. instanceof, is_a(), is_subclass_of(), catch</h2>

<p>
In PHP 5.0, is_a() was deprecated and replaced by the &quot;instanceof&quot; operator.
There were some issues with the initial implementation of &quot;instanceof&quot;, which
relied on __autoload() to search for missing classes. If the class was not
present, &quot;instanceof&quot; would throw a fatal E_ERROR due to the failure of
__autoload() to discover that class. The same behaviour occurred in the
&quot;catch&quot; operator and the is_subclass_of() function, for the same reason.
</p>

<p>
None of these functions or operators call __autoload() in PHP 5.1, and
the class_exists() workarounds used in code written for PHP 5.0, while
not problematic in any way, are no longer necessary.
</p>

<a name="int"></a><h3>4. Integer values in function parameters</h3>

<p>
With the advent of PHP 5.0, a new parameter parsing API was introduced
which is used by a large number of PHP functions. In all versions of
PHP between 5.0 and 5.1, the handling of integer values was very strict
and would reject non-well formed numeric values when a PHP function
expected an integer. These checks have now been relaxed to support
non-well formed numeric strings such as &quot; 123&quot; and &quot;123 &quot;, and will
no longer fail as they did under PHP 5.0. However, to promote code
safety and input validation, PHP functions will now emit an E_NOTICE
when such strings are passed as integers.
</p>

<a name="abstract"></a><h2>5. Abstract private methods</h2>

Abstract private methods were supported between PHP 5.0.0 and PHP 5.0.4,
but were then disallowed on the grounds that the behaviours of 'private'
and 'abstract' are mutually exclusive.

<a name="ami"></a><h2>6. Access modifiers in interfaces</h2>

<p>
Under PHP 5.0, function declarations in interfaces were treated in exactly
the same way as function declarations in classes. This has not been the case
since October 2004, at which point only the 'public' access modifier was
allowed in interface function declarations. Since April 2005 - which pre-dates
the PHP 5.0b1 release - the 'static' modifier has also been allowed. However,
the 'protected' and 'private' modifiers will now throw an E_ERROR, as will
'abstract'. Note that this change should not affect your existing code, as
none of these modifiers makes sense in the context of interfaces anyway.
</p>

<a name="cir"></a><h2>7. Changes in inheritance rules</h2>

<p>
Under PHP 5.0, it was possible to have a function declaration in a derived class
that did not match the declaration of the same function in the base class, e.g.
</p>

<?php
highlight_string('
class Base {
    function &return_by_ref() {
        $r = 1;
        return $r;
    }
}

class Derived extends Base {
    function return_by_ref() {
        return 1;
    }
}
'); ?>

<p>This code will cause an E_STRICT error to be emitted under PHP 5.1.</p>

<a name="cc"></a><h2>8. Class constants</h2>

<p>Under PHP 5.0, the following code was valid:</p>

<?php
highlight_string('
<?php

class test {
    const foobar = \'foo\';
    const foobar = \'bar\';
}

?>
'); ?>

<p>Under PHP 5.1, redefinition of a class constant will throw a fatal E_ERROR.</p>

<a name="extensions"></a><h2>9. Extensions</h2>

<a name="extensions1"></a><h3>9a. Extensions that are gone from the PHP core</h3>

<p>
One of the first things you're likely to notice when you download PHP 5.1 is that
several of the older extensions have disappeared. Those extensions that are still
actively maintained are available in the PHP Extension Community Library (PECL),
at <a href="http://pecl.php.net">http://pecl.php.net</a>. Windows binaries are built regularly, and you can obtain
the binaries for PECL extensions built against PHP 5.1 from
<a href="http://pecl4win.php.net/list.php/5_1">http://pecl4win.php.net/list.php/5_1</a>.
</p>

<pre>
Extension           Alternative/status
=========           ========================
ext/cpdf            pecl/pdflib
ext/dbx             pecl/dbx
ext/dio             pecl/dio
ext/fam             not actively maintained
ext/ingres_ii       pecl/ingres
ext/ircg            not actively maintained
ext/mcve            pecl/mcve
ext/mnogosearch     not actively maintained
ext/oracle          ext/oci8 or ext/pdo_oci
ext/ovrimos         not actively maintained
ext/pfpro           not actively maintained
                    - alternatives at <a href="http://pecl.php.net/packages.php?catpid=18&amp;catname=Payment">http://pecl.php.net/packages.php?catpid=18&amp;catname=Payment</a>
ext/w32api          pecl/ffi
ext/yp              not actively maintained
sapi/activescript   <a href="http://pecl4win.php.net/ext.php/php5activescript.dll">http://pecl4win.php.net/ext.php/php5activescript.dll</a> (PECL package)
                    or pecl/activescript (CVS)
</pre>

<p>
Modules in PECL that are not actively maintained (i.e. have not been supported
for some time, have no active maintainer working on them currently, and do not
have any PECL package releases), are still available in CVS at
<a href="http://cvs.php.net/pecl/">http://cvs.php.net/pecl/</a>. However, unreleased PHP modules are by their nature
unsupported, and your mileage may vary when attempting to install or use them.
</p>

<a name="extensions2"></a><h3>9b. Class constants in new PHP 5.1 extensions</h3>

<p>
The Zend Engine 2.1 API allows extension developers to declare class constants
in object oriented extensions. New extensions written for PHP 5.1, including SPL,
PDO, ext/XMLReader and ext/date, have their constants in the format
</p>

PDO::CLASS_CONSTANT

<p>rather than in the C format</p>

PDO_CLASS_CONSTANT

<p>in order to minimise pollution of the global namespace in PHP.</p>

<a name="date"></a><h2>10. Date/time support</h2>

<p>
Date/time support has been fully rewritten in PHP 5.1, and no longer
uses the system settings to 'know' the timezone in operation. It will
instead utilize, in the following order:
</p>

<ul>
<li>The timezone set using the date_default_timezone_set() function (if any)</li>
<li>The TZ environment variable (if non empty)</li>
<li>The date.timezone ini option (if set)</li>
<li>&quot;magical&quot; guess (if the operating system supports it)</li>
<li>If none of the above options succeeds, UTC</li>
</ul>

<p>
To ensure accuracy (and avoid an E_STRICT warning), you will need to define
your timezone in your php.ini using the following format:
</p>

date.timezone = Europe/London

<p>
The supported timezones are listed, in this format, in the PHP manual at
<a href="http://www.php.net/manual/en/timezones.php">http://www.php.net/manual/en/timezones.php</a>.
</p>

<a name="db"></a><h2>11. Changes in database support</h2>

<a name="db1"></a><h3>11a. PDO overview</h3>

<p>
PHP Data Objects (PDO) were introduced as a PECL extension under PHP 5.0,
and became part of the core PHP distribution in PHP 5.1. The PDO extension
provides a consistent interface for database access, and is used alongside
database-specific PDO drivers. Each driver may also have database-specific
functions of its own, but basic data access functionality such as issuing
queries and fetching data is covered by PDO functions, using the driver
named in PDO::__construct().
</p>

<p>
Note that the PDO extension, and its drivers, are intended to be built as
shared extensions. This will enable straightforward driver upgrades from
PECL, without forcing you to rebuild all of PHP.
</p>

<p>
At the point of the PHP 5.1 release, PDO is more than ready for widespread
testing and could be adopted in most situations. However, it is important
to understand that PDO and its drivers are comparatively young and may be
missing certain database-specific features; evaluate PDO carefully before
you use it in new projects.
</p>

<p>
Legacy code will generally rely on the pre-existing database extensions,
which are still maintained.
</p>

<p>
There is more in-depth information about the PDO extension in the manual
at <a href="http://www.php.net/manual/ref.pdo.php">http://www.php.net/manual/ref.pdo.php</a>.
</p>

<a name="db2"></a><h3>11b. Changes in MySQL support</h3>

<p>
In PHP 4, MySQL 3 support was built-in. With the release of PHP 5.0 there
were two MySQL extensions, named 'mysql' and 'mysqli', which were designed
to support MySQL &lt; 4.1 and MySQL 4.1 and up, respectively. With the
introduction of PDO, which provides a very fast interface to all the
database APIs supported by PHP, the PDO_MYSQL driver can support any
of the current versions (MySQL 3, 4 or 5) in PHP code written for PDO,
depending on the MySQL library version used during compilation. The
older MySQL extensions remain in place for reasons of back compatibility,
but are not enabled by default.
</p>

<a name="db3"></a><h3>11c. Changes in SQLite support</h3>

<p>
In PHP 5.0, SQLite 2 support was provided by the built-in sqlite
extension, which was also available as a PECL extension in PHP 4.3
and PHP 4.4. With the introduction of PDO, the sqlite extension doubles
up to act as a 'sqlite2' driver for PDO; it is due to this that the
sqlite extension in PHP 5.1 has a dependency upon the PDO extension.
</p>

<p>PHP 5.1 ships with a number of alternative interfaces to sqlite:</p>

<p>
The sqlite extension provides the &quot;classic&quot; sqlite procedural/OO API
that you may have used in prior versions of PHP. It also provides the
PDO 'sqlite2' driver, which allows you to access legacy SQLite 2
databases using the PDO API.
</p>

<p>
PDO_SQLITE provides the 'sqlite' version 3 driver. SQLite version 3
is vastly superior to SQLite version 2, but the file formats of the
two versions are not compatible.
</p>

<p>
If your SQLite-based project is already written and working against
earlier PHP versions, then you can continue to use ext/sqlite without
problems, but will need to explicitly enable both PDO and sqlite. New
projects should use PDO and the 'sqlite' (version 3) driver, as this is
faster than SQLite 2, has improved locking concurrency, and supports
both prepared statements and binary columns natively.
</p>

<p>
You must enable PDO to use the SQLite extension. If you want to build the 
PDO extension as a shared extension, then the SQLite extension must also 
be built shared. The same holds true for any extension that provides a PDO driver
</p>

<a name="misc"></a><h2>12. Further migration information</h2>

<p>
For general information about migrating from PHP 4 to PHP 5, please refer to
the relevant section in the PHP manual at <a href="http://www.php.net/manual/migration5.php">http://www.php.net/manual/migration5.php</a>.
</p>

<a name="estrict"></a><h2>13. Checking for E_STRICT errors</h2>

<p>
If you only have a single script to check, you can pick up E_STRICT
errors using PHP's commandline lint facility:
</p>

php -d error_reporting=4095 -l script_to_check.php

<p>For larger projects, the shell script below will achieve the same task:</p>

<pre>
#!/bin/sh

directory=$1

shift

# These extensions are checked
extensions=&quot;php inc&quot;

check_file ()
{
  echo -ne &quot;Doing PHP syntax check on $1 ...&quot;

  # Options:
  ERRORS=`/www/php/bin/php -d display_errors=1 -d html_errors=0 -d error_prepend_string=&quot; &quot; -d error_append_string=&quot; &quot; -d error_reporting=4095 -l $1 | grep -v &quot;No syntax errors detected&quot;`

  if test -z &quot;$ERRORS&quot;; then
    echo -ne &quot;OK.&quot;
  else
    echo -e &quot;Errors found!\n$ERRORS&quot;
  fi

  echo
}

# loop over remaining file args
for FILE in &quot;$@&quot; ; do
  for ext in $extensions; do
     if echo $FILE | grep &quot;\.$ext$&quot; &gt; /dev/null; then
       if test -f $FILE; then
         check_file &quot;$FILE&quot;
       fi
     fi
  done
done
</pre>
<?php site_footer(); ?>
