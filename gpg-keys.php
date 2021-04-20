<?php // vim: et
$_SERVER['BASE_PAGE'] = 'gpg-keys.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/gpg-keys.inc';

site_header('GPG Keys');
?>

<h1>GPG Keys</h1>

<p>
  Starting in April 2012, PHP release tags have been signed in Git by the
  release managers for each branch. The following GnuPG keys can be used to
  verify these tags:
</p>

<?php gpg_key_show_keys(false /* activeOnly */); ?>

<h3 id="keyring" class="content-header">Keyring</h3>

<p>
  You can download the keyring with all Release Manager public keys:
  <?php download_link('php-keyring.gpg', 'php-keyring.gpg'); ?>
</p>

<?php
site_footer();
