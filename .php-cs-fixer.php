<?php

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

$config = new PhpCsFixer\Config();

$finder = $config->getFinder()
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->exclude('manual/en/')
    ->name(__FILE__)
    ->notPath('tests/run-tests.php');

$config->setRules([
    'array_indentation' => true,
    'constant_case' => true,
    'indentation_type' => true,
    'line_ending' => true,
    'no_extra_blank_lines' => true,
    'no_trailing_whitespace' => true,
    'ordered_class_elements' => true,
    'single_space_after_construct' => true,
    'trim_array_spaces' => true,
    'visibility_required' => true,
    'whitespace_after_comma_in_array' => true,
]);

return $config;
