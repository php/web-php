<?php
include_once "prepend.inc";
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
 <li>This site is <?php echo is_official_mirror ? "" : "not"; ?> an official PHP.net mirror site</li>
 <li>The mirror site's address is <?php print_link($MYSITE); ?></li>
 <li>The provider of this mirror is <?php print_link(mirror_provider_url(), mirror_provider()); ?></li>
</ul>

<h2>Mirror Services</h2>

<ul>
 <li>Default language is <?php echo $LANGUAGES[default_language()]; ?></li>
 <li>Local search support is <?php echo has_search() ? "available" : "not available"; ?></li>
 <li>Local visitor statistics is <?php echo has_stats() ? "available" : "not available"; ?></li>
</ul>

<h2>Mirror Status</h2>

<ul>
 <li>The site was last updated at <?php echo strftime("%c %Z", $LAST_UPDATED); ?></li>
 <li>
  The mirror is currently
<?php
    $status = mirror_status();
    if ($status == MIRROR_OK) { echo "listed in the mirrors' list"; }
    else {
        echo "not listed in the mirrors' list, becuase it ";
        if ($status == MIRROR_OUTDATED)        { echo "is outdated"; }
        elseif ($status == MIRROR_DOESNOTWORK) { echo "has accessibility problems"; }
        elseif ($status == MIRROR_NOTACTIVE)   { echo "is disabled"; }
    }
?>
  </li>
</ul>

<?php commonFooter(); ?>
