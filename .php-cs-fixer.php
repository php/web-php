<?php

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

$config = new PhpCsFixer\Config();

$finder = $config->getFinder()
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->exclude('manual/en/')
    ->name(__FILE__);

$config->setRules([
    'array_indentation' => true,
    'indentation_type' => true,
    'no_trailing_whitespace' => true,
    'single_space_after_construct' => true,
    'visibility_required' => true,
    'whitespace_after_comma_in_array' => true,
]);

return $config;
