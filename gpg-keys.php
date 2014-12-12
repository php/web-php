<?php // vim: et
$_SERVER['BASE_PAGE'] = 'gpg-keys.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/gpg-keys.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

site_header('GPG Keys');
?>

<h1>GPG Keys</h1>

<p>
  Starting in April 2012, PHP release tags have been signed in Git by the
  release managers for each branch. The following GnuPG keys can be used to
  verify these tags:
</p>

<?php foreach ($GPG_KEYS as $branch => $data): ?>
  <h3 id="gpg-<?php echo $branch; ?>" class="content-header">PHP <?php echo $branch; ?></h3>

  <div class="content-box">
    <pre>
<?php echo $data; ?>
    </pre>
  </div>
<?php endforeach ?>

<?php
site_footer();
