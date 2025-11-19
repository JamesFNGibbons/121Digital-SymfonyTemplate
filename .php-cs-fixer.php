<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->name('*.php')
    ->exclude([
        'vendor',
        'node_modules',
        'tests',
        'public',
        'bin'
    ])
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(false) // No risky rules needed for Symfony conventions
    ->setRules([
        // Base standard
        '@PSR12' => true,

        // Symfony-friendly rules
        'array_syntax' => ['syntax' => 'short'],
        'single_quote' => true,
        'no_unused_imports' => true,
        'no_trailing_whitespace' => true,
        'blank_line_after_namespace' => true,
        'concat_space' => ['spacing' => 'one'],

        // Use Symfony-style braces (always on next line for class/method)
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'next',
            'position_after_control_structures' => 'same',
            'allow_single_line_anonymous_class_with_empty_body' => true,
        ],

        // Class layout / spacing
        'class_attributes_separation' => [
            'elements' => [
                'const' => 'one',
                'property' => 'one',
                'method' => 'one',
            ],
        ],

        // Import ordering (same as Symfony)
        'ordered_imports' => [
            'imports_order' => ['class', 'function', 'const'],
            'sort_algorithm' => 'alpha',
        ],

        // Casing / consistency
        'native_function_casing' => true,
        'magic_constant_casing' => true,
        'magic_method_casing' => true,
        'lowercase_cast' => true,
        'lowercase_static_reference' => true,

        // PSR-4 / namespace hygiene
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'single_import_per_statement' => true,
        'group_import' => false,

        // Symfony does NOT enforce:
        // - one-line class definitions
        // - native_constant_invocation
        // - blank line after opening tag

        'class_definition' => [
            'single_line' => false,
        ],
    ])
    ->setFinder($finder);