<?php
$_SERVER['BASE_PAGE'] = 'releases/8_6_0.php';
require_once __DIR__ . '/../../include/prepend.inc';
site_header('PHP 8.6.0 Release Announcement', ['cache' => true, 'cache_control' => 30 * 60]);
?>
<h1>PHP 8.6.0 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 8.6.0. This release marks a major update to the PHP language.</p>

<p>PHP 8.6 comes with numerous improvements and new features such as:</p>
<ul>
  <li>Partial Function Application</li>
  <li>New <code>\Time\Duration</code> class</li>
  <li>New <code>Io\Poll</code> API for monitoring streams</li>
  <li>New <code>clamp()</code> function</li>
  <li>New <code>SortDirection</code> enum</li>
  <li>Default values for readonly properties</li>
</ul>
<p>See <a href="/releases/8.6/en.php">what’s new in PHP 8.6</a> for more highlights and examples.</p>
<p>
  Source downloads for PHP 8.6.0 are available on our <a href="https://www.php.net/downloads.php?source=Y">downloads page</a>.
  Windows source and binaries are available on the <a href="https://www.php.net/downloads.php?os=windows">Windows downloads page</a>.
  The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#8.6.0">ChangeLog</a>.
</p>
<p>
  The <a href="/manual/en/migration86.php">migration guide</a> in the PHP Manual lists new features and backward-incompatible changes in detail.
</p>
<p>Kudos to all the contributors and supporters!</p>

<?php site_footer();
