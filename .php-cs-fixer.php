<?php

$header = <<<TXT
Any ideas?

@see https://github.com/php/web-php
TXT;

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

$config = new PhpCsFixer\Config();

$finder = $config->getFinder()
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->exclude('manual/en/')
    ->name('*.inc')
    ->name(__FILE__)
    ->notPath('include/last_updated.inc')
    ->notPath('include/pregen-confs.inc')
    ->notPath('include/pregen-news.inc')
    ->notPath('tests/run-tests.php');

$config
    ->setRiskyAllowed(true)
    ->setRules([
        'array_indentation' => true,
        'constant_case' => true,
        'header_comment' => [
            'comment_type' => 'PHPDoc',
            'header' => $header,
        ],
        'indentation_type' => true,
        'line_ending' => true,
        'no_extra_blank_lines' => true,
        'no_trailing_whitespace' => true,
        'ordered_class_elements' => true,
        'single_space_after_construct' => true,
        'strict_param' => true,
        'trim_array_spaces' => true,
        'visibility_required' => true,
        'whitespace_after_comma_in_array' => true,
    ]);

return $config;
