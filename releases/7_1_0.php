<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/7_1_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 7.1.0 Release Announcement");
?>

     <h1>PHP 7.1.0 Release Announcement</h1>

     <p>The PHP development team announces the immediate availability of PHP 7.1.0. This release is the first point release in the 7.x series.</p>

     <p>PHP 7.1.0 comes with numerous improvements and new features such as</p>

     <ul>
          <li><a href="https://wiki.php.net/rfc/nullable_types">Nullable types</a></li>
          <li><a href="https://wiki.php.net/rfc/void_return_type">Void return type</a></li>
          <li><a href="https://wiki.php.net/rfc/iterable">Iterable pseudo-type</a></li>
          <li><a href="https://wiki.php.net/rfc/class_const_visibility">Class constant visiblity modifiers</a></li>
          <li><a href="https://wiki.php.net/rfc/short_list_syntax">Square bracket syntax for <code>list()</code></a> and <a href="https://wiki.php.net/rfc/list_keys">the ability to specify keys in <code>list()</code></a></li>
          <li><a href="https://wiki.php.net/rfc/multiple-catch">Catching multiple exceptions types</a></li>
          <li><a href="https://wiki.php.net/rfc#php_71">Many more features and changes…</a></li>
     </ul>

     <p>For source downloads of PHP 7.1.0 please visit our <a href="http://www.php.net/downloads">downloads</a> page, Windows binaries can be found on the <a href="http://windows.php.net/download">PHP for Windows</a> site. The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-7.php#7.1.0">ChangeLog</a>.</p>

     <p>The <a href="http://php.net/manual/en/migration71.php">migration guide</a> is available in the PHP Manual. Please consult it for the detailed list of new features and backward incompatible changes.</p>

     <p>Many thanks to all the contributors and supporters!</p>

<?php site_footer(); ?>
