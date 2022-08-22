<?php

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

$config = new PhpCsFixer\Config();

$finder = $config->getFinder()
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->exclude('manual/en/')
    ->name('*.inc')
    ->name('.php-cs-fixer.php')
    ->notPath('include/last_updated.inc')
    ->notPath('include/pregen-confs.inc')
    ->notPath('include/pregen-news.inc')
    ->notPath('include/releases.inc')
    ->notPath('tests/run-tests.php');

$config
    ->setRiskyAllowed(true)
    ->setRules([
        'array_indentation' => true,
        'array_syntax' => true,
        'class_attributes_separation' => true,
        'constant_case' => true,
        'indentation_type' => true,
        'line_ending' => true,
        'no_extra_blank_lines' => true,
        'no_trailing_whitespace' => true,
        'ordered_class_elements' => true,
        'single_space_after_construct' => true,
        'strict_param' => true,
        'switch_case_space' => true,
        'trim_array_spaces' => true,
        'visibility_required' => true,
        'whitespace_after_comma_in_array' => true,
    ]);

return $config;
