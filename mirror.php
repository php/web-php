<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'mirror.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
$SIDEBAR_DATA = '
<h3>More mirror sites</h3>
<p>
 Find more available mirrors on our <a href="/mirrors.php">mirror
 sites page</a>.
</p>

<h3>Mirroring PHP.net</h3>
<p>
 If you are interested in mirroring our website, you can
 find more information and setup details on <a href="/mirroring.php">our
 mirroring page</a>.
</p>
';

$MIRROR_IMAGE = '';

// Try to find a sponsor image in case this is an official mirror
if (is_official_mirror()) {

    // Iterate through possible mirror provider logo types in priority order
    $types = array("gif", "jpg", "png");
    while (list(,$ext) = each($types)) {

        // Check if file exists for this type
        if (file_exists("backend/mirror." . $ext)) {

            // Create image HTML code
            $MIRROR_IMAGE = make_image(
                'mirror.' . $ext,
                htmlspecialchars(mirror_provider()),
                FALSE,
                FALSE,
                'backend',
                0
            );

            // Add size information depending on mirror type
            if (is_primary_site() || is_backup_primary()) {
                $MIRROR_IMAGE = resize_image($MIRROR_IMAGE, 125, 125);
            } else {
                $MIRROR_IMAGE = resize_image($MIRROR_IMAGE, 120, 60);
            }

            // We have found an image
            break;
        }
    }
}
site_header("Information About This PHP Mirror Site", array("current" => "community"));
?>

<h1>Information About This PHP Mirror Site</h1>

<p>
 Here you can get more information about this PHP Mirror site, as
 well as some details about the provider. The information you find
 here may be helpful in choosing your preferred mirror site for your
 everyday work. Note that the PHP.net webmaster team is only capable
 of tracking official mirror sites, and trying to ensure that those
 provide the best service possible.
</p>

<h2>General Information</h2>

<ul>
 <li>This site is <?php echo is_official_mirror() ? "" : "not"; ?> an official PHP.net mirror site</li>
 <li>The mirror site's address is <?php print_link($MYSITE); ?></li>
</ul>

<?php if (is_official_mirror()) { ?>
<h2>Mirror Provider</h2>
<ul>
 <li>
  <p>The provider of this mirror is <?php print_link(mirror_provider_url(), mirror_provider()); ?></p>
  <?php if ($MIRROR_IMAGE) { ?>
  <p><?php echo $MIRROR_IMAGE; ?></p>
  <?php } ?>
 </li>
</ul>
<?php } ?>

<h2>Mirror Services</h2>

<ul>
 <li>Default language is <?php echo $LANGUAGES[default_language()]; ?></li>
 <li>Local visitor statistics are <?php echo have_stats() ? "available" : "not available"; ?></li>
</ul>

<h2>Mirror Status</h2>

<ul>
 <li>The site was last updated at <?php echo strftime("%c %Z", $LAST_UPDATED); ?></li>
</ul>

<?php site_footer(); ?>
