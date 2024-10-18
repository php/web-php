<?php
/*

 This page is a fallback menu for mobile users without Javascript.

*/

// Ensure that our environment is set up
$_SERVER['BASE_PAGE'] = 'menu.php';
include_once __DIR__ . '/include/prepend.inc';

// Do not index this fallback page
site_header("Menu", ["noindex"]);

?>

<h1>Menu</h1>

<p>Use the links below to browse the PHP.net website.</p>

<ul class="menu">
    <?php foreach (get_nav_items() as $entry): ?>
        <li class="menu__item">
            <a class="menu__link" href="<?= $entry->href ?>"><?= $entry->name ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<?php

site_footer();
