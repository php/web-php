<?php
$_SERVER['BASE_PAGE'] = 'license/distrib-guidelines-code.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("Distribution Guidelines", ["current" => "help"]);
?>
<h2>PHP Distribution Guidelines</h2>

<p>
  You may redistribute PHP in source or binary form, provided
  you respect the terms of the <a href="/license/">license</a>.
</p>
<p>
  In plain English, this means that you have to include the full license text
  in human-readable form with every distributed copy of PHP, whether source
  or binary. One way of doing this is to put a copy of the PHP license into a
  text file that you include with the source or binary package before
  distribution. This ensures that the license information can be read
  properly even when a binary is shipped.
  A text file containing license and copyright information is sometimes
  given the filename "Notice" or "NOTICE" and may be referred to as a "notice file".
</p>
<p>
  Some files in the PHP codebase have been contributed under other licenses.
  If you want to distribute these files, you also need to respect the terms
  of those licenses.
  To check, look for the terms indicated in the license + copyright comment
  block at the top of the source file.
  Keep in mind, sometimes the license terms are included in a separate license file in the
  same directory as the source file.
</p>
<p>
  The license terms for such a file may require that its own license and copyright
  information must be included with every distributed copy (including binaries).
  This is quite a common requirement, which can be satisfied by adding the
  appropriate license text into a text file for distribution purposes, like the
  notice file suggested above.
</p>
<p>
  A single notice file could be used to hold the collection of license
  and copyright information that applies to PHP in general and
  any files with additional licenses that you want to distribute (for example
  Zend, TSRM etc.)
  It is good practice to indicate which source file(s) a particular license
  applies to.
</p>

<h3>Modified products derived from PHP</h3>
<p>
  You can distribute your own software product which has been derived
  from PHP, in source or binary form, provided that:
</p>
<ul>
 <li>
  relevant copyright information and license(s) from
  the PHP codebase are distributed in human-readable form with
  every copy, as described above.
 </li>
</ul>

<?php site_footer();
