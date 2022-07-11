<?php

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

$config = new PhpCsFixer\Config();

$finder = $config->getFinder()
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->name(__FILE__);

$config->setRules([
    '@PSR12' => true,
]);

return $config;
