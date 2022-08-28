<?php
include_once __DIR__ . '/../include/prepend.inc';

$page = isset($_GET['page']) ? htmlspecialchars($_GET['page'], ENT_QUOTES, 'UTF-8') : '';
$page = strtr($page, ["\r" => "", "\n" => ""]);

// Redirect to new manual page
mirror_redirect("/manual/" . $page);
