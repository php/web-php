<?php

/**
 * Any ideas?
 *
 * @see https://github.com/php/web-php
 */

 $_SERVER['BASE_PAGE'] = 'releases/8.0/index.php';
include __DIR__ . '/../../include/site.inc';

mirror_redirect('/releases/8.0/en.php');
