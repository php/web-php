<?php
$_SERVER['BASE_PAGE'] = 'license/contrib-guidelines-code.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("Contributor Guidelines for Code Developers", ["current" => "help"]);
?>
<h2>PHP Contributor Guidelines for Code Developers</h2>

<p>
  Before you complete the form to request a Git account, you must understand and accept the principles under which PHP
  itself is developed. These are summarized in the next paragraph.
</p>
<p>
  Any code contributed to PHP must be contributed under the terms of the Modified BSD License or other compatible,
  permissive BSD-style license. PHP is distributed under the <a href="/license/#bsd-3-clause">Modified BSD License</a>.
  This includes implementation code, test cases, utility scripts and tools&mdash;that is, all code associated with the PHP
  project. If you contribute code that isn't entirely your own (for example, it may be partially derived from other Open
  Source software), you should add a comment to the source code indicating the origin and license of the original code.
  If you are unsure of the license, you must confirm with the owner that they grant permission to contribute it to PHP
  under the Modified BSD License.
</p>
<p>
  Specifically regarding source code licensed under the GNU General Public License (GPL) or GNU Lesser General Public
  License (LGPL):
</p>
<ul>
  <li>GPL or LGPL licensed code cannot be used as a basis for any derived work contributed to PHP.</li>
  <li>Extensions which link to GPL licensed libraries will not be accepted.</li>
  <li>Extensions which link to LGPL licensed libraries are strongly discouraged.</li>
</ul>


<h2>Guidelines for Related Projects</h2>

<p>
  For related projects, please refer to the Project websites:
</p>
<ul>
  <li><a href="https://pecl.php.net/copyright.php">PECL</a></li>
  <li><a href="https://pear.php.net/copyright.php">PEAR</a></li>
</ul>

<?php site_footer();
