<?php

return [
    'common_header' => 'PHP 8.0 es una actualización importante del lenguaje php que contiene nuevos recursos y optimizaciones incluyendo argumentos nombrados, tipos de uniones, atributos, promoción de propiedades constructivas, expresiones de equivalencia, operador nullsafe, JIT (traducción dinámica) y también mejoras en el sistema de tipos, manejo de errores y consistencia en general.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.0 es una actualización importante del lenguaje PHP que contiene nuevos recursos y optimizaciones incluyendo argumentos nombrados, tipos de uniones, atributos, promoción de propiedades constructivas, expresiones match, operador nullsafe, JIT (traducción dinámica) y también mejoras en el sistema de tipos, manejo de errores y consistencia en general.',
    'upgrade_now' => 'Actualizate a PHP 8!',

    'named_arguments_title' => 'Argumentos nombrados',
    'named_arguments_description' => '<li>Solamente especifica los parámetros requeridos, omite los opcionales.</li><li>Los argumentos son independientes del orden y se documentan automáticamente.</li>',
    'attributes_title' => 'Atributos',
    'attributes_description' => 'En vez de anotaciones en PHPDoc, puedes usar metadatos estructurados con la sintaxis nativa de PHP.',
    'constructor_promotion_title' => 'Promoción de propiedades constructivas',
    'constructor_promotion_description' => 'Menos código repetitivo para definir e inicializar una propiedad.',
    'union_types_title' => 'Tipos de unión',
    'union_types_description' => 'En vez de anotaciones en PHPDoc para combinar tipos, puedes usar una declaración de tipo unión nativa que será validada en el momento de ejecución.',
    'match_expression_title' => 'Expresiones match',
    'match_expression_description' => '<p>Las nuevas expresiones <code>match</code> son similares a <code>switch</code> y tienen las siguientes características: </p>
        <ul>
            <li>Match es una expresión; esto quiere decir que pueden ser almacenadas como variables o devueltas.</li>
            <li>Match soporta expresiones de una línea y no necesitan romper declarar un <code>break</code>.</li>
            <li>Match hace comparaciones estrictas.</li>
        </ul>',

    'nullsafe_operator_title' => 'Operador Nullsafe',
    'nullsafe_operator_description' => 'En vez de verificar condiciones nulas, tu puedes utilizar una cadena de llamadas con el nuevo operador nullsafe. Cuando la evaluación de un elemento falla, la ejecución de la entire cadena es abortada y la cadena entera es evaluada como <code>null</code>.',
    'saner_string_number_comparisons_title' => 'Comparaciones inteligentes entre “strings” y números',
    'saner_string_number_comparisons_description' => 'Cuando comparas con un “string” numérico, PHP8 usa comparación numérica o de otro caso convierte el número a un "string" y asi los compara.',
    'consistent_internal_function_type_errors_title' => 'Errores consistentes para funciones internas.',
    'consistent_internal_function_type_errors_description' => 'La mayoría de las funciones internas ahora proveen un <code>Error</code> de excepción si el parámetro no es validado.',

    'jit_compilation_title' => 'JIT (traducciones dinámicas)',
    'jit_compilation_description' => 'PHP8 introduce 2 motores de compilación JIT. Transit JIT, es el más prometedor de los  dos y performa 3 veces mejor en benchmarks sintéticos y 1.5-2 mejor en algunas aplicaciones específicas a largo plazo. Performancia de aplicaciones típicas es a la par de las de PHP7.4',
    'jit_performance_title' => 'JIT contribuciones al funcionamiento relativo de PHP8',

    'type_improvements_title' => 'Mejorias en los tipos de sistemas y manejo de errores',
    'arithmetic_operator_type_checks' => 'Verificaciones estrictas de operadores aritméticos/bitwise.',
    'abstract_trait_method_validation' => 'Validación de métodos con características abstractas',
    'magic_method_signatures' => 'Firmas correctas de métodos mágicos',
    'engine_warnings' => 'Reclacificamiento de errores fatales',
    'lsp_errors' => 'Errores fatales incompatibles con el método de firma',
    'at_operator_no_longer_silences_fatal_errors' => 'El operador <code>@</code> no omitirá errores fatales.',
    'inheritance_private_methods' => 'Herencia con métodos privados',
    'mixed_type' => 'Tipo <code>mixed</code>',
    'static_return_type' => 'Tipo retorno <code>static</code>',
    'internal_function_types' => 'Tipos para funciones internas',
    'email_thread' => 'Email thread',
    'opaque_objects_instead_of_resources' => 'Objetos opacos en ves de recursos para
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>,
        y <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a> extensiones',

    'other_improvements_title' => 'Otros ajustes y mejoras del sintax',
    'allow_trailing_comma' => 'Permitir una coma al final de una lista de parámetros <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        y lista de use en closures <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'Catches que no capturan',
    'variable_syntax_tweaks' => 'Ajustes al syntax variable',
    'namespaced_names_as_token' => 'Tratamiento de nombres de namespace como tokens únicos',
    'throw_expression' => '<code>throw</code> es ahora una expresión',
    'class_name_literal_on_object' => 'Permitir <code>::class</code> on objects',

    'new_classes_title' => 'Nuevas clases, interfaces y funciones',
    'weak_map_class' => '<a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> clase',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> Implementación de objeto',
    'new_dom_apis' => 'New DOM Traversal and Manipulation APIs',

    'footer_title' => 'Mejor performancia, mejor syntax, aumentada seguridad de tipos.',
    'footer_description' => '<p>
            Para bajar el código fuente de PHP8 visita la página <a href="http://www.php.net/downloads">downloads</a>.
            Código binario para windows lo puedes encontrar en la página <a href="https://windows.php.net/download">PHP for Windows</a>.
            La lista de cambios está disponible en la página <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
        </p>
        <p>
            La <a href="/manual/en/migration80.php">guía de migración</a> está disponible en el manual de PHP.
            Por favor consultala para una lista detallada de alteraciones cambios y compatibilidad.
        </p>',
];
