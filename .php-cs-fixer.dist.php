<?php

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

$config = new PhpCsFixer\Config();

$finder = $config->getFinder()
    ->ignoreDotFiles(false)
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

$config
    ->setCacheFile(__DIR__ . '/.build/php-cs-fixer/php-cs-fixer.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        'array_indentation' => true,
        'array_syntax' => true,
        'binary_operator_spaces' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'class_attributes_separation' => true,
        'class_definition' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'constant_case' => true,
        'elseif' => true,
        'function_declaration' => true,
        'include' => true,
        'increment_style' => [
            'style' => 'post',
        ],
        'indentation_type' => true,
        'is_null' => true,
        'line_ending' => true,
        'new_with_parentheses' => true,
        'no_extra_blank_lines' => true,
        'no_mixed_echo_print' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_spaces_after_function_name' => true,
        'no_superfluous_elseif' => true,
        'no_trailing_whitespace' => true,
        'ordered_class_elements' => true,
        'random_api_migration' => true,
        'single_space_around_construct' => [
            'constructs_contain_a_single_space' => [
                'yield_from',
            ],
            'constructs_preceded_by_a_single_space' => [],
            'constructs_followed_by_a_single_space' => [],
        ],
        'strict_param' => true,
        'switch_case_space' => true,
        'ternary_operator_spaces' => true,
        'trailing_comma_in_multiline' => [
            'elements' => [
                'arguments',
                'arrays',
                'match',
                'parameters',
            ],
        ],
        'trim_array_spaces' => true,
        'unary_operator_spaces' => true,
        'visibility_required' => true,
        'void_return' => true,
        'whitespace_after_comma_in_array' => true,
    ]);

return $config;
