<?php
$_SERVER['BASE_PAGE'] = 'license/contrib-guidelines-code.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("Contributor Guidelines", ["current" => "help"]);
?>
<h2>PHP Contributor Guidelines for Code Developers</h2>

<p>
  Before you contribute code to PHP, you must understand and accept the principles under which PHP
  itself is developed. These are summarised in the next paragraph.
</p>
<p>
  Any code contributed to PHP must be contributed under the Modified BSD License or other, compatible permissive license.
  PHP is distributed under the <a href="/license/#bsd-3-clause">Modified BSD License</a>.
  This includes implementation code, test cases, utility scripts and tools - that is, all code associated
  with the PHP project. If you contribute code that isn't entirely your own
  (for example it may be partially derived from other Open Source software) you are asked to add a comment
  into the source code to indicate the origin and the license of the original code.
  If you are unsure of the license, you are asked to confirm with the owner of the code that they
  grant permission for it to be contributed to PHP under the
  terms of the Modified BSD License or other compatible license.
</p>
<p>
  Specifically regarding source code licensed under the GNU General Public License (GPL):
</p>
<ul>
  <li>GPL-licensed code cannot be used as a basis for any work contributed to PHP.</li>
  <li>Extensions linking to GPL-licensed libraries will not be accepted.</li>
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
