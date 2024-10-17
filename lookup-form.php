<?php
/*

 This page is a fallback search for mobile users without JavaScript.

*/

// Ensure that our environment is set up
$_SERVER['BASE_PAGE'] = 'lookup-form.php';
include_once __DIR__ . '/include/prepend.inc';

// Do not index this fallback page
site_header("PHP.net Manual Lookup", ["noindex"]);

?>

<h1>PHP.net Manual Lookup</h1>

<form class="lookup-form" action="/manual-lookup.php" method="get">
    <input type="hidden" name="show" value="quickref">
    <div class="">
        <input
            type="search"
            name="function"
            value=""
            aria-label="Lookup docs"
        />
        <button type="submit">Search</button>
    </div>
</form>

<?php

site_footer();
