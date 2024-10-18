<?php

use phpweb\LangChooser;
use const releases\php80\LANGUAGES;

$_SERVER['BASE_PAGE'] = 'releases/8.0/index.php';
require_once __DIR__ . '/common.php';
require_once __DIR__ . '/../../src/autoload.php';

$langChooser = new LangChooser(LANGUAGES, [], "", "");
[$lang,] = $langChooser->chooseCode("", "", $_SERVER['HTTP_ACCEPT_LANGUAGE']);

mirror_redirect("/releases/8.0/$lang.php");
