<?php
$_SERVER['BASE_PAGE'] = 'qa.php';
include_once __DIR__ . '/include/prepend.inc';
include_once __DIR__ . '/include/release-qa.php';

if (isset($_GET["format"])) {
    $output = $QA_RELEASES;

    if (($_GET['only'] ?? null) === 'dev_versions') {
        $output = $output['reported'];
    }

    switch ($_GET['format'] ?? null) {
        case 'json':
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($output);
            exit;
        case 'serialize':
        default:
            header('Content-Type: text/plain; charset=UTF-8');
            echo serialize($output);
            exit;
    }
}

$SITE_UPDATE = date("D M d H:i:s Y T", filectime(__FILE__));

$SIDEBAR_DATA = '
<div class="panel">
  Test Releases
  <div class="body">
    The downloads on this page are not meant to be run in production. They are
    for testing only.
  </div>

  <div class="body">
    If you find a problem when running your library or application with these
    builds, please file a report on
    <a href="https://github.com/php/php-src/issues/">GitHub Issues</a>.
  </div>
  <br/>
  QA Releases API
  <div class="body">
    <p>
      The QA API is based on the query string.
    </p>
    <p>
      Pass in the <code>format</code> parameter, with <code>serialize</code> or
      <code>json</code> as value to obtain all information:
    </p>
    <ul>
      <li><a href="https://php.net/release-candidates.php?format=json">/release-candidates.php?format=json</a></li>
      <li><a href="https://php.net/release-candidates.php?format=serialize">/release-candidates.php?format=serialize</a></li>
    </ul>
    <p>
      To only tried dev version numbers, add <code>only=dev_versions</code>:
    </p>
    <ul>
      <li><a href="https://php.net/release-candidates.php?format=json&only=dev_versions">/release-candidates.php?format=json&only=dev_versions</a></li>
    </ul>
  </div>
</div>
';

site_header("Release Candidates", [
    'current' => 'downloads',
]);

?>
<h1>Release Candidate Builds</h1>
<p>
This page contains links to the Release Candidate builds that the release
managers create before each actual release. These builds are meant for the
community to test whether no inadvertent changes have been made, and
whether no regressions have been introduced.
</p>

<h3>Available QA Releases:</h3>
<?php if (!empty($QA_RELEASES['releases'])) : ?>
  <?php $plural = count($QA_RELEASES['releases']) > 1 ? 's' : ''; ?>

  <?php foreach ($QA_RELEASES['releases'] as $pversion => $info) : ?>
  <h3 class="title">
    PHP <?php echo $info['version']; ?>
  </h3>
  <div class="content-box">

    <ul>
      <?php foreach ($info['files'] as $file_type => $file_info) : ?>
        <li>
          <a href="<?php echo $file_info['path'] ?>"><?php echo "php-{$info['version']}.tar.{$file_type}"; ?></a>
          <span class="releasedate"><?php echo date('d M Y', strtotime($info['date'])); ?></span>
            <?php foreach ($QA_CHECKSUM_TYPES as $algo): ?>
              <span class="<?php echo $algo; ?>">
              <?php if (isset($file_info[$algo]) && strlen($file_info[$algo])) : ?>
                <?php echo $file_info[$algo]; ?>
              <?php else: ?>
                <em><small>No checksum value available</small></em>)&nbsp;
              <?php endif; ?>
            <?php endforeach; ?>
          </li>
        <?php endforeach; ?>
      </ul>
	<?php endforeach; ?>
<?php else: ?>
	<span class='lihack'>There are no QA releases available at the moment to test.</span>
<?php endif; ?>

<p>
	<br/>
	<strong>Windows users:</strong>
	See <a href="https://windows.php.net/qa/">here</a> for the Windows QA builds.
</p>

<?php
site_footer(['sidebar' => $SIDEBAR_DATA]);

