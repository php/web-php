<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'mirror.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
commonHeader("Information About This PHP Mirror Site");
?>

<h1>Information About This PHP Mirror Site</h1>

<p>
 Here you can get more information about this PHP Mirror site, as
 well as some details about the provider. The information you find
 here may be helpful in choosing your preferred mirror site for your
 everyday work.
</p>

<h2>General Information</h2>

<ul>
 <li>This site is <?php echo is_official_mirror() ? "" : "not"; ?> an official PHP.net mirror site</li>
 <li>The mirror site's address is <?php print_link($MYSITE); ?></li>
 <li>The provider of this mirror is <?php print_link(mirror_provider_url(), mirror_provider()); ?></li>
</ul>

<h2>Mirror Services</h2>

<ul>
 <li>Default language is <?php echo $LANGUAGES[default_language()]; ?></li>
 <li>Local visitor statistics is <?php echo have_stats() ? "available" : "not available"; ?></li>
</ul>

<h2>Mirror Status</h2>

<ul>
 <li>The site was last updated at <?php echo strftime("%c %Z", $LAST_UPDATED); ?></li>
</ul>

<?php commonFooter(); ?>
