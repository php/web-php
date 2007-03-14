<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ideas.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("SoC Ideas");
?>

<h1>Ideas for Google Summer of Code Projects</h1>

<p>Here you'll find a couple of ideas for Google Summer of Code projects. This list is not exhaustive and you may
propose any &quot;crazy&quot; idea you may have though.</p>

<p>Before you submit your proposal, you are encouraged to contact the possible mentors for the project you are applying.
If the project hasn't any mentor assigned or if you are submiting an off-list project, please contact one of our
<a href="/mailing-lists.php">mailing lists</a> to discuss the proposal before submiting it.</p>

<p>If your project is to be written in PHP, please make sure you read the
<a href="http://pear.php.net/manual/en/standards.php">PEAR Coding Standards</a> when applying.</p>

<p>If you are applying for a project in the PHP code itself (in C), you may find useful the PHP hackers guide, which
also includes our C coding standards (TBD).</p>

<p>Your proposal should include the following:</p>
<ul>
 <li>Name and e-mail</li>
 <li>Detailed description of what you intent to do including, if possible, a list of quantifiable results</li>
 <li>Project Schedule: How long will the project take? When can you begin work?</li>
 <li>Availability: How many hours per week can you spend working on this? What other obligations do you have this summer?</li>
 <li>Bio: Who are you? What makes you the best person to work on this project?</li>
</ul>

<hr/>
<p>&nbsp;</p>

<a name="ze"></a>
<h2>Zend Engine</h2>

<h3>New Reference Counting Implementation</h3>
<p><strong>Description</strong>: The Zend Engine, the compiling and interpreting kernel of PHP, uses
<a href="http://en.wikipedia.org/wiki/Reference_counting">reference counting</a> to keep track of which
objects are no longer referenced and thus can be destroyed. A major weakness of the Zend Engine's
current reference counting implementation is that it cannot detect reference cycles, that is objects
that reference each other in a circular graph structure which is not referenced itself from outside the
circle.<br/>The work would involve implementing a reference counting algorithm that can cope with
circular references, for instance the one described <a href="http://www.research.ibm.com/people/d/dfb/papers/Bacon01Concurrent.pdf">here</a>
and integrate it into the Zend Engine.<br/>
<strong>Possible mentor(s)</strong>: <a href="mailto:derick@php.net">Derick Rethans</a></p>

<hr/>

<a name="qa"></a>
<h2>Quality Assurance</h2>

<h3>Automatic code checker</h3>
<p><strong>Description</strong>: The PHP API has a couple of varargs functions that are error prone and may easily cause segfaults
in PHP, especially on less used platforms. The list of such functions include zend_parse_parameters*(), zend_error() and a few
others. Our current check script is made in PHP and is regex based. It is available at <a href="http://cvs.php.net/viewvc.cgi/php-src/scripts/dev/check_parameters.php?view=markup">http://cvs.php.net/viewvc.cgi/php-src/scripts/dev/check_parameters.php?view=markup</a>. This script is difficult to maintain and generates way too many false-positives.
The work would involve constructing or probably reusing a parse tree for the PHP code and its extensions (mixed C/C++) and generate
error messages for the problems found. A sample output of the script mentioned is available at: <a
href="http://gcov.php.net/viewer.php?version=PHP_HEAD&amp;func=params">http://gcov.php.net/viewer.php?version=PHP_HEAD&amp;func=params</a>.<br/>
<strong>Possible mentor(s)</strong>: <a href="mailto:nlopess@php.net">Nuno Lopes</a></p>

<hr/>

<a name="docs"></a>
<h2>Documentation</h2>

<h3><a href="http://wiki.phpdoc.info/LiveDocs">Livedocs</a></h3>
<p><strong>Description</strong>:
Livedocs is a tool to display DocBook XML files in a web browser on the fly,
without the need of building all HTML target files first. It was started as
a project to simplify the task of PHP Manual contributors, to check their
changes as they will show up in the documentation. To use Livedocs, a little
preprocessing work is needed, but after that, the script collection even works
on modified XML files. <br/>

The main advantage of Livedocs for the PHP Manual is the dramatically reduced
time-to-live interval, since modified XML files can be pushed to servers
without the need of building all the HTML files even for small changes.
Additionally to this, Livedocs also does a good job of providing search
results for keywords found in the manual, as well as keeping track of
relations of translated files to their English equivalents, notifying
readers, if they read a seriously outdated translation.
<br/>
Possible projects on livedocs include: improve docbook compatibility,
implement a browser-based docbook editor (maybe based on an existing one:
<a href="http://summerofcode.wordpress.com/2006/09/29/beacon-02/">[1]</a>
<a href="http://bitfluxeditor.org/">[2]</a>, ...),
make livedocs more generic (i.e. not so phpdoc specific), etc... (your imagination is the limit!)
<br/>
<strong>Possible mentor(s)</strong>: (not yet assigned)</p>

<hr/>

<a name="other"></a>
<h2>Other</h2>

<h3>Support for Mutation Testing in PHPUnit</h3>
<p><strong>Description</strong>: <a href="http://en.wikipedia.org/wiki/Mutation_testing">Mutation Testing</a>,
or Automated Error Seeding, is an approach where the testing tool makes some
change to the tested code, runs the tests, and if the tests pass displays a
message saying what it changed. This approach is different than code coverage
analysis, because it can find code that is executed by the running of tests but
not actually tested. It is not meant as a replacement for code coverage analysis,
but complementary.<br/>More information can be found
<a href="http://www.phpunit.de/wiki/Ideas#SupportforMutationTesting">here</a>.
<br/><br/><strong>Possible mentor(s)</strong>: <a href="mailto:sebastian@php.net">Sebastian Bergmann</a></p>

<!--
	Note: SoC 2006 Ideas. these need to be either ported to the "new style" or cleaned up

<a name="php"></a>
<h4>Core PHP</h4>

<ul>
 <li>Unicode conversion of all internal functions for PHP 6</li>
</ul>

<a name="pear"></a>
<h4>Pear</h4>

<ul>
 <li>PHP 4 to PHP 5 (and PHP 6?) conversion script</li>
 <li>Expand PEAR::MDB2_Schema to cover all aspects of schema evolution
  <a href="http://pooteeweet.org/files/phptek06/database_schema_deployment.pdf">[1]</a>
 </li>
 <li>New package to read, create or modify OpenDocument files</li>
 <li>Create a 5.1+ port of MDB2</li>
</ul>

<a name="pecl"></a>
<h4>Pecl</h4>

<ul>
 <li>Opcode optimizer for APC</li>
 <li>PHP Aspect rewrite</li>
 <li>Transaction Manager - Possible mentor Andi</li>
 <li>OCR Extension - Possible mentor Andi</li>
 <li>Script pre-processor - e.g. Support for C-like #define statements</li>
 <li>Named Pipe stream protocol transport</li>
 <li>SCTP stream protocol transport</li>
</ul>

<a name="other"></a>
<h4>Other</h4>

<ul>
 <li>re2php - Add PHP Support to <a href="http://re2c.sf.net/">re2c</a></li>
 <li>ANTLR - Add PHP Code Generation Target to <a href="http://www.antlr.org/v3/index.html">ANTLR 3</a>
</ul>
-->

<?php site_footer(); ?>
