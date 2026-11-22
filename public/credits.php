<?php

$_SERVER['BASE_PAGE'] = 'credits.php';
require_once __DIR__ . '/../include/prepend.inc';

site_header("Credits", ["current" => "community", 'css' => ['credits.css']]);
require __DIR__ . '/../include/credits.inc';
site_footer();
