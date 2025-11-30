<?php

return [
    'common_header' => 'PHP 8.5 es una actualización importante del lenguaje PHP, con nuevas características que incluyen la Extensión URI, el Operador Pipe y soporte para modificar propiedades al clonar.',
    'main_title' => 'Más inteligente, más rápido, construido para el mañana.',
    'main_subtitle' => '<p><strong>PHP 8.5 es una actualización importante del lenguaje PHP</strong>, con nuevas características que incluyen la <strong>extensión URI</strong>, el <strong>operador Pipe</strong> y soporte para <strong>modificar propiedades al clonar</strong>.</p>',

    'whats_new' => 'Novedades en 8.5',
    'upgrade_now' => 'Actualizar a PHP 8.5',
    'old_version' => 'PHP 8.4 y anteriores',
    'badge_new' => 'NUEVO',
    'documentation' => 'Doc',
    'released' => 'Lanzado el 20 de noviembre de 2025',
    'key_features' => 'Características clave en PHP 8.5',
    'key_features_description' => '<p><strong>Más rápido</strong>, <strong>limpio</strong> y <strong>construido para desarrolladores</strong>.</p>',

    'features_pipe_operator_title' => 'Operador Pipe',
    'features_pipe_operator_description' => '<p>El operador <code>|></code> permite encadenar callables de izquierda a derecha, pasando valores suavemente a través de múltiples funciones sin variables intermedias.</p>',
    'features_persistent_curl_share_handles_title' => 'Handles cURL Persistentes Compartidos',
    'features_persistent_curl_share_handles_description' => '<p>Los handles ahora pueden persistir a través de múltiples peticiones PHP, evitando el costo de inicialización repetida de conexiones a los mismos hosts.</p>',
    'features_clone_with_title' => 'Clone With',
    'features_clone_with_description' => '<p>Clona objetos y actualiza propiedades con la nueva sintaxis <code>clone()</code>, simplificando el patrón en clases <code>readonly</code>.</p>',
    'features_uri_extension_title' => 'Extensión URI',
    'features_uri_extension_description' => '<p>PHP 8.5 añade una extensión URI integrada para analizar, normalizar y manejar URLs siguiendo los estándares <em>RFC 3986</em> y <em>WHATWG URL</em>.</p>',
    'features_no_discard_title' => 'Atributo #[\NoDiscard]',
    'features_no_discard_description' => '<p>El atributo <code>#[\NoDiscard]</code> advierte cuando un valor de retorno no se usa, ayudando a prevenir errores y mejorando la seguridad.</p>',
    'features_fcc_in_const_expr_title' => 'Closures y Callables de Primera Clase en Expresiones Constantes',
    'features_fcc_in_const_expr_description' => '<p>Los closures estáticos y callables de primera clase ahora pueden usarse en expresiones constantes, como parámetros de atributos.</p>',

    'pipe_operator_title' => 'Operador Pipe',
    'pipe_operator_description' => '<p>El operador pipe permite encadenar llamadas a funciones sin tener que lidiar con variables intermedias. Esto permite reemplazar muchas "llamadas anidadas" con una cadena que se puede leer hacia adelante, en lugar de hacerlo de adentro hacia afuera.</p><p>Aprende más sobre esta característica en el artículo de <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">The PHP Foundation</a>.</p>',

    'array_first_last_title' => 'Funciones array_first() y array_last()',
    'array_first_last_description' => '<p>Las funciones <code>array_first()</code> y <code>array_last()</code> devuelven el primer o último valor de un array, respectivamente. Si el array está vacío, se devuelve <code>null</code> (facilitando su usabilidad con el operador <code>??</code>).</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>Ahora es posible actualizar propiedades durante la clonación de objetos pasando un array asociativo a la función <code>clone()</code>. Esto permite un soporte directo en las clases <code>readonly</code>.</p>',

    'uri_extension_title' => 'Extensión URI',
    'uri_extension_description' => '<p>La nueva extensión URI proporciona APIs para analizar y modificar de forma segura URIs y URLs de acuerdo con los estándares RFC 3986 y WHATWG URL.</p><p>Desarrollado por las librerías <a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) y <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL).</p><p>Aprende más sobre esta característica en el artículo de <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">The PHP Foundation</a>.</p>',

    'no_discard_title' => 'Atributo #[\NoDiscard]',
    'no_discard_description' => '<p>Al agregar el atributo <code>#[\NoDiscard]</code> a una función, PHP verificará si el valor devuelto se consume y emitirá una advertencia si no lo es. Esto permite mejorar la seguridad de APIs donde el valor devuelto es importante, pero se podría olvidar usar el valor de retorno por accidente.</p><p>El cast <code>(void)</code> puede usarse para indicar que un valor no se usa intencionalmente.</p>',

    'persistent_curl_share_handles_title' => 'Handles cURL persistentes compartidos',
    'persistent_curl_share_handles_description' => '<p>A diferencia de <code>curl_share_init()</code>, los handles creados por <code>curl_share_init_persistent()</code> no serán destruidos al final de la petición PHP. Si se encuentra un handle persistente compartido con el mismo conjunto de opciones compartidas, será reutilizado, evitando el costo de inicializar handles cURL de nuevo.</p>',

    'fcc_in_const_expr_title' => 'Closures y Callables de Primera Clase en Expresiones Constantes',
    'fcc_in_const_expr_description' => '<p>Los closures estáticos y callables de primera clase ahora pueden usarse en expresiones constantes. Esto incluye parámetros de atributos, valores predeterminados de propiedades y parámetros, y constantes.</p>',

    'new_classes_title' => 'Características y mejoras adicionales',
    'fatal_error_backtrace' => 'Los errores fatales (como el tiempo máximo de ejecución excedido) ahora incluyen un backtrace.',
    'const_attribute_target' => 'Los atributos ahora pueden apuntar a constantes.',
    'override_attr_properties' => 'El atributo {0} ahora puede aplicarse a propiedades.',
    'deprecated_traits_constants' => 'El atributo {0} puede usarse en traits y constantes.',
    'asymmetric_static_properties' => 'Las propiedades estáticas ahora soportan visibilidad asimétrica.',
    'final_promoted_properties' => 'Las propiedades pueden marcarse como <code>final</code> usando la promoción de propiedades en constructores.',
    'closure_getCurrent' => 'Se agregó el método <code>Closure::getCurrent()</code> para simplificar la recursión en funciones anónimas.',
    'partitioned_cookies' => 'Las funciones {0} y {1} ahora soportan la clave "partitioned".',
    'get_set_error_handler' => 'Las nuevas funciones {0} y {1} están disponibles.',
    'new_dom_element_methods' => 'Los nuevos métodos {0} y {1} están disponibles.',
    'grapheme_levenshtein' => 'Se agregó la función {0}.',
    'delayed_target_validation' => 'El nuevo atributo {0} puede usarse para suprimir errores en tiempo de compilación de atributos del núcleo y extensiones que se usan en destinos inválidos.',

    'bc_title' => 'Deprecaciones y cambios de compatibilidad hacia atrás',
    'bc_backtick_operator' => 'El operador backtick como alias de {0} ha sido deprecado.',
    'bc_non_canonical_cast_names' => 'Los nombres de cast no canónicos <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code> y <code>(binary)</code> han sido deprecados. Use <code>(bool)</code>, <code>(int)</code>, <code>(float)</code> y <code>(string)</code> en su lugar, respectivamente.',
    'bc_disable_classes' => 'La configuración INI {0} ha sido eliminada ya que causa que se rompan varias suposiciones del motor.',
    'bc_semicolon_after_case' => 'Terminar sentencias <code>case</code> con punto y coma en lugar de dos puntos ha sido deprecado.',
    'bc_null_array_offset' => 'Usar <code>null</code> como offset en un array o al llamar {0} ahora está deprecado. Use una cadena vacía en su lugar.',
    'bc_class_alias_names' => 'Ya no es posible usar "array" y "callable" como nombres de alias de clase en {0}.',
    'bc_sleep_wakeup' => 'Los métodos mágicos {0} y {1} han sido deprecados. Los métodos mágicos {2} y {3} deben usarse en su lugar.',
    'bc_casting_nan' => 'Una advertencia es emitida al convertir {0} a otros tipos.',
    'bc_non_array_destructuring' => 'La desestructuración de valores no-array (distintos de <code>null</code>) usando {0} o {1} ahora emite una advertencia.',
    'bc_casting_non_int_floats' => 'Una advertencia es emitida al convertir floats (o cadenas que parecen floats) a <code>int</code> si no pueden representarse como uno.',

    'footer_title' => 'Mejor sintaxis, rendimiento mejorado y seguridad de tipos.',
    'footer_description' => '<p class="first-paragraph">La lista completa de cambios está registrada en el <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>.</p><p>Por favor consulte la <a href="/manual/es/migration85.php" target="_blank">guía de migración</a> para una lista detallada de nuevas características y cambios incompatibles hacia atrás.</p>',
];
