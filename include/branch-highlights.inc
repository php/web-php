<?php

return [
    '8.5' => [
        'features' => [
            [
                'title' => 'URI Extension',
                'about' => 'PHP 8.5 adds a built-in URI extension to parse, normalize, and handle URLs following RFC 3986 and WHATWG URL standards.',
            ],
            [
                'title' => 'Pipe Operator',
                'about' => 'The |> operator enables chaining callables left-to-right, passing values smoothly through multiple functions without intermediary variables.',
            ],
            [
                'title' => 'Clone With',
                'about' => 'Clone objects and update properties with the new clone() syntax, making the "with-er" pattern simple for readonly classes.',
            ],
            [
                'title' => '#[\NoDiscard] Attribute',
                'about' => 'The #[\NoDiscard] attribute warns when a return value isn’t used, helping prevent mistakes and improving overall API safety.',
            ],
            [
                'title' => 'Closures and First-Class Callables in Constant Expressions',
                'about' => 'Static closures and first-class callables can now be used in constant expressions, such as attribute parameters.',
            ],
            [
                'title' => 'Persistent cURL Share Handles',
                'about' => 'Handles can now be persisted across multiple PHP requests, avoiding the cost of repeated connection initialization to the same hosts.',
            ],
        ],
    ],
    '8.4' => [
        'support_label' => 'Supported',
        'features' => [
            [
                'title' => 'Property Hooks',
                'short' => 'Property Hooks allow intercepting properties',
            ],
            [
                'title' => 'Asymmetric Property Visibility',
                'short' => 'Asymmetric Visibility for get and set',
            ],
            [
                'title' => '#[Deprecated] Attribute',
                'short' => '#[Deprecated] attribute signals removal intent',
            ],
            [
                'title' => 'Additional Array Functions',
                'short' => 'New array lookup and query options',
            ],
        ],
    ],
    '8.3' => [
        'support_label' => 'Security Support',
        'features' => [
            [
                'title' => 'Typed Class Constants',
                'short' => 'Class constants can now be typed',
            ],
            [
                'title' => 'Dynamic Class Constants',
                'about' => 'Class constants can now be accessed via dynamic calls',
            ],
            [
                'title' => 'Readonly Deep Cloning',
                'short' => 'Enhanced deep cloning of readonly instances',
            ],
            [
                'title' => 'Randomizer Improvements',
                'short' => 'Generate random strings from provided character sets',
            ],
        ],
    ],
    '8.2' => [
        'support_label' => 'Security Support',
        'features' => [
            [
                'title' => 'Readonly classes',
                'short' => 'Entire classes can now be marked Readonly',
            ],
            [
                'title' => 'Disjunction Normal Form Types',
                'short' => 'Improved type support with Disjunction Normal Forms',
            ],
            [
                'title' => 'Improved Standalone Types',
                'short' => 'Null, true and false are now usable as types',
            ],
        ],
    ],

    /*
     * The rest of these were AI generated
     */

    '8.1' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Enums',
                'short' => 'Native support for Enumerations',
            ],
            [
                'title' => 'Fibers',
                'short' => 'Core support for asynchronous programming',
            ],
            [
                'title' => 'Readonly Properties',
                'short' => 'Class properties can be permanently marked readonly',
            ],
            [
                'title' => 'First-class Callable Syntax',
                'short' => 'Clean syntax for creating closures from callables',
            ],
        ],
    ],
    '8.0' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Named Arguments',
                'short' => 'Pass arguments to functions based on parameter names',
            ],
            [
                'title' => 'Attributes',
                'short' => 'Native syntax for structured metadata (annotations)',
            ],
            [
                'title' => 'Constructor Property Promotion',
                'short' => 'Shorthand syntax for defining and initializing properties',
            ],
            [
                'title' => 'Match Expression',
                'short' => 'Strict, expression-based alternative to switch statements',
            ],
        ],
    ],
    '7.4' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Typed Properties',
                'short' => 'Class properties fully support type declarations',
            ],
            [
                'title' => 'Arrow Functions',
                'short' => 'Concise syntax for simple one-liner closures',
            ],
            [
                'title' => 'Null Coalescing Assignment',
                'short' => 'Assign values quickly using the ??= operator',
            ],
            [
                'title' => 'Spread Operator in Arrays',
                'short' => 'Unpack arrays directly inside other arrays using ...',
            ],
        ],
    ],
    '7.3' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Flexible Heredoc/Nowdoc',
                'short' => 'Improved formatting and indentation parsing for multi-line strings',
            ],
            [
                'title' => 'Trailing Commas',
                'short' => 'Allow trailing commas in function calls',
            ],
            [
                'title' => 'Array Destructuring References',
                'short' => 'List destructuring supports assignment by reference',
            ],
            [
                'title' => 'is_countable()',
                'short' => 'New function to safely verify if a variable is countable',
            ],
        ],
    ],
    '7.2' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Object Typehint',
                'short' => 'Use \'object\' as a formal type declaration',
            ],
            [
                'title' => 'Argon2 Hashing',
                'short' => 'Native support for the Argon2 password hashing algorithm',
            ],
            [
                'title' => 'Libsodium Integration',
                'short' => 'Modern cryptography via the core Sodium extension',
            ],
            [
                'title' => 'Abstract Method Overriding',
                'short' => 'Traits can now be overridden by abstract methods',
            ],
        ],
    ],
    '7.1' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Nullable Types',
                'short' => 'Prepend types with a question mark to allow nulls',
            ],
            [
                'title' => 'Void Return Type',
                'short' => 'Functions can explicitly declare a \'void\' return',
            ],
            [
                'title' => 'Iterable Pseudo-type',
                'short' => 'Accept arrays or Traversable objects interchangeably',
            ],
            [
                'title' => 'Multi-catch Exceptions',
                'short' => 'Catch multiple exception types within a single block',
            ],
        ],
    ],
    '7.0' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Scalar Type Declarations',
                'short' => 'Type hinting for int, float, string, and bool',
            ],
            [
                'title' => 'Return Type Declarations',
                'short' => 'Specify the strict return type of a function',
            ],
            [
                'title' => 'Null Coalescing Operator',
                'short' => 'Simplify isset checks with the ?? operator',
            ],
            [
                'title' => 'Spaceship Operator',
                'short' => 'Combined comparison using the <=> operator',
            ],
        ],
    ],
    '5.6' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Variadic Functions',
                'short' => 'Accept variable-length argument lists using ...',
            ],
            [
                'title' => 'Argument Unpacking',
                'short' => 'Unpack arrays dynamically into function arguments',
            ],
            [
                'title' => 'Constant Scalar Expressions',
                'short' => 'Use basic math and expressions when defining constants',
            ],
            [
                'title' => 'Exponentiation Operator',
                'short' => 'Calculate powers easily using the ** operator',
            ],
        ],
    ],
    '5.5' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Generators',
                'short' => 'Create simple iterators using the \'yield\' keyword',
            ],
            [
                'title' => 'Finally Keyword',
                'short' => 'Execute code unconditionally after try/catch blocks',
            ],
            [
                'title' => '::class Resolution',
                'short' => 'Fetch fully qualified class names as strings',
            ],
            [
                'title' => 'empty() Expressions',
                'short' => 'The empty() construct now accepts arbitrary expressions',
            ],
        ],
    ],
    '5.4' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Traits',
                'short' => 'Enable horizontal code reuse across independent classes',
            ],
            [
                'title' => 'Short Array Syntax',
                'short' => 'Define arrays cleanly using the [] syntax',
            ],
            [
                'title' => 'Built-in Web Server',
                'short' => 'Integrated CLI web server for local development',
            ],
            [
                'title' => 'Closure $this',
                'short' => 'Anonymous functions can automatically access object scope',
            ],
        ],
    ],
    '5.3' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Namespaces',
                'short' => 'Organize code and prevent naming collisions',
            ],
            [
                'title' => 'Late Static Binding',
                'short' => 'Reference the called class context using static::',
            ],
            [
                'title' => 'Closures',
                'short' => 'Support for anonymous functions and inline callbacks',
            ],
            [
                'title' => 'Ternary Shortcut',
                'short' => 'Omit the middle expression using the ?: operator',
            ],
        ],
    ],
    '5.2' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'JSON Support',
                'short' => 'Native json_encode and json_decode functions added',
            ],
            [
                'title' => 'Filter Extension',
                'short' => 'Built-in data validation and sanitization filters',
            ],
            [
                'title' => 'Zip Extension',
                'short' => 'Native support for creating and reading ZIP archives',
            ],
            [
                'title' => 'DateTime Extension',
                'short' => 'Introduction of the object-oriented DateTime class',
            ],
        ],
    ],
    '5.1' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'PDO Extension',
                'short' => 'Standardized, lightweight interface for database access',
            ],
            [
                'title' => 'Performance Upgrades',
                'short' => 'Significant execution speed improvements over 5.0',
            ],
            [
                'title' => 'Magic Methods',
                'short' => 'Added support for __isset() and __unset()',
            ],
            [
                'title' => 'Type Hinting for Arrays',
                'short' => 'Allow \'array\' as an explicit parameter type hint',
            ],
        ],
    ],
    '5.0' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Zend Engine 2',
                'short' => 'A completely rewritten core engine for better performance',
            ],
            [
                'title' => 'Robust Object Model',
                'short' => 'Introduction of true OOP with visibility (public/protected/private)',
            ],
            [
                'title' => 'Exceptions',
                'short' => 'Standardized try/catch error handling model',
            ],
            [
                'title' => 'SimpleXML',
                'short' => 'An easy-to-use extension for parsing XML structures',
            ],
        ],
    ],
    '4.4' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Reference Memory Fixes',
                'short' => 'Fixed major memory corruption issues related to references',
            ],
            [
                'title' => 'max_input_nesting_level',
                'short' => 'Added an INI directive to limit the nesting level of input variables',
            ],
            [
                'title' => 'Stream-based Hashing',
                'short' => 'File hashing functions now use streams instead of low-level IO',
            ],
            [
                'title' => 'SORT_LOCALE_STRING',
                'short' => 'Added flag to sort arrays based on the current locale',
            ],
        ],
    ],
    '4.3' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Command Line Interface',
                'short' => 'Introduced a separate CLI SAPI for developing shell applications',
            ],
            [
                'title' => 'Streams API',
                'short' => 'Unified approach to handling files, pipes, sockets, and I/O resources',
            ],
            [
                'title' => 'Bundled GD Library',
                'short' => 'The GD image manipulation library is now bundled by default',
            ],
            [
                'title' => 'New Build System',
                'short' => 'A more portable and less resource-consuming build process',
            ],
        ],
    ],
    '4.2' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'register_globals Off',
                'short' => 'External variables are no longer registered in the global scope by default',
            ],
            [
                'title' => 'Sockets Overhaul',
                'short' => 'Major overhaul of the sockets extension for better reliability',
            ],
            [
                'title' => 'File Upload Performance',
                'short' => 'Highly improved performance and handling of file uploads',
            ],
            [
                'title' => 'Apache 2 Support',
                'short' => 'Introduced experimental support for the Apache 2 web server',
            ],
        ],
    ],
    '4.1' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Superglobals',
                'short' => 'Introduced autoglobal arrays like $_GET, $_POST, and $_SESSION',
            ],
            [
                'title' => 'Windows Performance',
                'short' => 'Revolutionary performance and stability improvements under Windows',
            ],
            [
                'title' => 'Output Compression',
                'short' => 'Added turn-key output compression support',
            ],
            [
                'title' => 'Extension Versioning',
                'short' => 'Added infrastructure to support version numbers for different extensions',
            ],
        ],
    ],
    '4.0' => [
        'support_label' => 'End of Life',
        'features' => [
            [
                'title' => 'Zend Engine',
                'short' => 'A new, highly optimized two-stage parse and execute engine',
            ],
            [
                'title' => 'Native Sessions',
                'short' => 'Built-in support for HTTP session management',
            ],
            [
                'title' => 'Output Buffering',
                'short' => 'Ability to buffer output before sending it to the browser',
            ],
            [
                'title' => 'Enhanced OOP',
                'short' => 'More comprehensive object-oriented programming support over PHP 3',
            ],
        ],
    ],
];
