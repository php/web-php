<?php

namespace phpweb\Releases;

use function array_slice;
use function date;
use function download_link;
use function htmlspecialchars;
use function sha256_html;
use function strrpos;
use function strtotime;
use function substr;
use function urlencode;
use function version_compare;

final class Releases
{
    /**
     * Get latest release version and info
     *
     * @return array{string, array<mixed>|null}
     */
    public function getLatest(): array {
        global $RELEASES;

        $version = '0.0.0';
        $current = null;
        foreach ($RELEASES as $versions) {
            foreach ($versions as $ver => $info) {
                if (version_compare($ver, $version) > 0) {
                    $version = $ver;
                    $current = $info;
                }
            }
        }

        return [$version, $current];
    }

    public function showSource(): void
    {
        global $RELEASES;

        $SHOW_COUNT = 4;

        $current_uri = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8');

        $i = 0; foreach ($RELEASES as $MAJOR => $major_releases): /* major releases loop start */
        $releases = array_slice($major_releases, 0, $SHOW_COUNT);
?>
        <a id="v<?php echo $MAJOR; ?>"></a>
        <?php foreach ($releases as $v => $a): ?>
          <?php $mver = substr($v, 0, strrpos($v, '.')); ?>
          <?php $stable = $i++ === 0 ? "Current Stable" : "Old Stable"; ?>

          <h3 id="v<?php echo $v; ?>" class="title">
            <span class="release-state"><?php echo $stable; ?></span>
            PHP <?php echo $v; ?>
            (<a href="/ChangeLog-<?php echo $MAJOR; ?>.php#<?php echo urlencode($v); ?>" class="changelog">Changelog</a>)
          </h3>
          <div class="content-box">

            <ul>
              <?php foreach ($a['source'] as $rel): ?>
                <li>
                  <?php download_link($rel['filename'], $rel['filename']); ?>
                  <span class="releasedate"><?php echo date('d M Y', strtotime($rel['date'])); ?></span>
                  <?php
                    if (isset($rel['sha256'])) {
                        echo sha256_html($rel['sha256']);
                    }
                   ?>
                  <?php if (isset($rel['note']) && $rel['note']): ?>
                    <p>
                      <strong>Note:</strong>
                      <?php echo $rel['note']; ?>
                    </p>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
              <li>
                <a href="/downloads.php?os=windows&osvariant=windows-downloads&version=<?php echo urlencode($mver); ?>">
                  Windows downloads
                </a>
              </li>
            </ul>

            <a href="<?php echo $current_uri; ?>#gpg-<?php echo $mver; ?>">GPG Keys for PHP <?php echo $mver; ?></a>
          </div>
<?php endforeach; ?>
<?php endforeach; /* major releases loop end */ ?>
<?php
    }
}
