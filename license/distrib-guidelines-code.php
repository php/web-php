<?php
$_SERVER['BASE_PAGE'] = 'license/distrib-guidelines-code.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("Code Distribution Guidelines", ["current" => "help"]);
?>
<h2>PHP Code Distribution Guidelines</h2>

<p>
    The PHP code can be redistributed in source or binary form provided that
    you respect the terms of the <a href="/license/#bsd-3-clause">license</a>.
</p>
<p>
    In plain English, this means that you have to include the full license text
    in human-readable form with every distributed copy of PHP, whether in source
    or binary form. One way of doing this is to put a copy of the license in a
    text file that you include with the source or binary package before distribution.
    This ensures that the license information can be read properly even when a
    binary is shipped instead of source code. A text file containing license and
    copyright information is sometimes given the filename "Notice" or "NOTICE,"
    and may be referred to as a "notice file."
</p>
<p>
    Some files in the PHP codebase have been contributed under other licenses.
    If you want to distribute these files, you must also respect the terms of
    their licenses. Look for the terms in the license/copyright comment block at
    the top of the source file. Sometimes the license terms are included in a
    separate license file in the same directory as the source file. The license
    terms may require that its own license and copyright information be included
    with every distributed copy (including binaries). This is a common requirement,
    which may be satisfied by adding the appropriate license text to a text file
    for distribution purposes, like the notice file suggested above.
</p>
<p>
    A single notice file may list all the licenses and copyright information
    applicable to the entire codebase you are distributing. It is good practice to
    indicate which source file(s) a particular license applies to.
</p>

<h3>Modified products derived from PHP</h3>

<p>
    You may distribute your own software product derived from PHP, in source or
    binary form, provided that relevant copyright information and license(s) from
    the PHP codebase are distributed in human-readable form with every copy, as
    described above.
</p>
<p>
    In accordance with the <a href="/license/#bsd-3-clause">license</a>, you may
    not use the name of any copyright holders or contributors to endorse or
    promote products derived from PHP without specific prior written permission.
</p>
<p>
    Please do not use "PHP" in the names of products derived from PHP. This
    creates confusion and implies a relationship between your product and the PHP
    project that may not exist. However, you may indicate that your product works
    with, is compatible with, or is intended for use with PHP.
</p>

<?php site_footer();
