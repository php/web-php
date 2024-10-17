<?php

use phpweb\LangChooser;
use const releases\php83\LANGUAGES;

$_SERVER['BASE_PAGE'] = 'releases/8.3/index.php';
require_once __DIR__ . '/common.php';
require_once __DIR__ . '/../../src/autoload.php';

$langChooser = new LangChooser(LANGUAGES, [], "", "");
[$lang,] = $langChooser->chooseCode("", "", $_SERVER['HTTP_ACCEPT_LANGUAGE']);

mirror_redirect("/releases/8.3/$lang.php");
