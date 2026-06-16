<?php

/**
 * En-revision: 20b1bbed844a4609f3400ef0cd4e6be6fea323af
 */

return [
    'common_header' => 'PHP 8.1 es una actualización importante del lenguaje PHP. Enumeraciones, propiedades de solo lectura, sintaxis first-class callable, fibers, tipos de intersección, mejoras de rendimiento y más.',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.1 es una actualización importante del lenguaje PHP.<br class="display-none-md"> Contiene muchas características nuevas y mejoradas, incluyendo enumeraciones, propiedades de solo lectura, sintaxis first-class callable, fibers, tipos de intersección, mejoras de rendimiento y más.',
    'upgrade_now' => '¡Actualizar a PHP 8.1 ahora!',
    'documentation' => 'Doc',

    'enumerations_title' => 'Enumeraciones',
    'enumerations_content' => 'Use <code>enum</code> en lugar de un conjunto de constantes y obtenga la validación lista para su uso.',

    'readonly_properties_title' => 'Propiedades de solo lectura',
    'readonly_properties_content' => '<p>Las propiedades de solo lectura no se pueden cambiar después de la inicialización, es decir, después de que se les asigne un valor. Son una excelente manera de modelar objetos de valor y objetos de transferencia de datos.</p>',

    'first_class_callable_syntax_title' => 'Sintaxis First-class Callable',
    'first_class_callable_syntax_content' => '<p>Ahora es posible obtener una referencia a cualquier función; esto se llama sintaxis First-class Callable.</p>',

    'new_in_initializers_title' => 'Expresión New en constructor',
    'new_in_initializers_content' => '<p>Los objetos instanciados pueden ahora se utilizados como parámetros por defecto, así como variables estáticas, constantes globales, así como argumentos de atributos.</p>
            <p>Esto efectivamente permite usar <strong>atributos anidados</strong>.</p>',

    'pure_intersection_types_title' => 'Tipos de intersección pura',
    'pure_intersection_types_content' => '<p>Utilice tipos de intersección cuando un valor necesite resolver varias restricciones de tipado al mismo tiempo.</p>
            <p>Actualmente no es posible mezclar tipos de intersección y unión como <code>A&B|C</code>.</p>',

    'never_return_type_title' => 'Tipo de retorno Never',
    'never_return_type_content' => '<p>Una función o método declarado con el tipo <code>never</code> indica que no devolverá un valor y producirá una excepción o finalizará la ejecución del script con una llamada de <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code>, o similar.</p>',

    'final_class_constants_title' => 'Constantes de clase final',
    'final_class_constants_content' => '<p>Es posible declarar la constante <code>final</code> en la clase, para que no puedan ser sobreescrita en las clases heredadas.</p>',

    'octal_numeral_notation_title' => 'Notación numérica octal explícita',
    'octal_numeral_notation_content' => '<p>Ahora es posible escribir números octales con el prefijo explícito <code>0o</code>.</p>',

    'fibers_title' => 'Fibers',
    'fibers_content' => '<p>Fibers es la forma primitiva para la implementación ligera de concurrencia. Son un medio para crear bloques de código que se puedan pausarse y reanudarse como generadores (Generators), pero desde cualquier lugar de la pila. Los Fibers en sí mismo, no proporcionan la concurrecia mágicamente, todavía se necesita tener un bucle de eventos. Sin embargo, permiten que las implementaciones de bloqueo y no-bloqueo compartan la misma API.</p><p>Los Fibers permiten deshacerse del código repetitivo visto anteriormente con <code>Promise::then()</code> o las corutinas basadas en el generador (Generator). Las bibliotecas generalmente construirán más abstracciones alrededor de Fibers, por lo que no hay necesidad de interactuar con ellas directamente.</p>',
    
    'array_unpacking_title' => 'Soporte de desestructuración de Arrays',
    'array_unpacking_content' => '<p>PHP soportaba la desestructuración de Arrays, pero solo si el Array tenía keys de tipo integer. Ahora también es posible la desestructuración de Arrays con keys de tipo string.</p>',

    'performance_title' => 'Mejoras de rendimiento',
    'performance_chart' => '<strong>Aplicación de demostración de Symfony - tiempo de solicitudes</strong><br>
                25 ejecuciones consecutivas, 250 solicitudes (seg)<br>
                (menos es mejor)<br>',
    'performance_results_title' => 'El resultado (en relación con PHP 8.0):',
    'performance_results_symfony' => 'La aplicación de demostración de Symfony es 23.0% más rápida',
    'performance_results_wordpress' => 'Un sitio WordPress es 3.5% más rápido',
    'performance_related_functions_title' => 'Características relacionadas con el rendimiento en PHP 8.1:',
    'performance_jit_arm64' => 'JIT backend para ARM64 (AArch64)',
    'performance_inheritance_cache' => 'Caché heredado (Evite volver a vincular clases en cada solicitud)',
    'performance_fast_class_name_resolution' => 'Resolución rápida de nombres de clases (evita la resolución de nombres en minúscula y la búsqueda vía hash)',
    'performance_timelib_date_improvements' => 'Mejoras en el rendimiento de timelib and ext/date',
    'performance_spl' => 'Mejoras en los iteradores del sistema de archivos SPL',
    'performance_serialize_unserialize' => 'Optimización en serialize/unserialize',
    'performance_internal_functions' => 'Optimización de algunas funciones internas (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())',
    'performance_jit' => 'Mejoras y correcciones de JIT',

    'other_new_title' => 'Nuevas clases, interfaces y funciones',
    'other_new_returntypewillchange' => 'Nuevo atributo <code>#[ReturnTypeWillChange]</code>.',
    'other_new_fsync_fdatasync' => 'Nuevas funciones <code>fsync</code> y <code>fdatasync</code>.',
    'other_new_array_is_list' => 'Nueva función <code>array_is_list</code>.',
    'other_new_sodium_xchacha20' => 'Nuevas funciones para Sodium XChaCha20.',

    'bc_title' => 'Obsolescencias y la falta de compatibilidad con versiones anteriores',
    'bc_null_to_not_nullable' => 'Pasar null como parámetro en funciones internas non-nullable queda obsoleto.',
    'bc_return_types' => 'Tipos de retorno en los métodos de clase integrados de PHP',
    'bc_serializable_deprecated' => 'Interfaz <code>Serializable</code> es obsoleta.',
    'bc_html_entity_encode_decode' => 'Las funciones de entidad HTML en/decode procesan comillas simples y son sustituidas por defecto.',
    'bc_globals_restrictions' => 'Restricciones en la variable <code>$GLOBALS</code>.',
    'bc_mysqli_exceptions' => 'MySQLi: Modo de error predeterminado establecido en excepciones.',
    'bc_float_to_int_conversion' => 'La conversión implícita incompatible de float a int es obsoleta.',
    'bc_finfo_objects' => 'Extensión finfo: recursos de <code>file_info</code> migrado a objetos finfo existentes.',
    'bc_imap_objects' => 'IMAP: imap resources migrated to <code>IMAP\Connection</code> class objects.',
    'bc_ftp_objects' => ' Extensión FTP: Recursos de conexión migrados a la clase <code>FTP\Connection</code>.',
    'bc_gd_objects' => 'Extensión GD: Los indetificadores de fuentes (Font) migrados a la clase <code>GdFont</code>.',
    'bc_ldap_objects' => 'LDAP: recursos migrados a las clases <code>LDAP\Connection</code>, <code>LDAP\Result</code>, y <code>LDAP\ResultEntry</code>.',
    'bc_postgresql_objects' => 'PostgreSQL: recursos migrados a las clases <code>PgSql\Connection</code>, <code>PgSql\Result</code>, y <code>PgSql\Lob</code>.',
    'bc_pspell_objects' => 'Pspell: los recursos de configuración de pspell y pspell han sido migrados a las clases <code>PSpell\Dictionary</code>, <code>PSpell\Config</code>.',

    'footer_title' => 'Mejor rendimiento, mejor sintaxis, mejor seguridad de tipos.',
    'footer_content' => '<p>
        Para descargar el código fuente de PHP 8.1, visite la página de <a href="https://www.php.net/downloads">descargas</a>.
        Los binarios de Windows se encuentran en el sitio de <a href="https://windows.php.net/download">PHP para Windows</a>.
        La lista de cambios se registra en el <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog</a>.
      </p>
      <p>
        <a href="/manual/es/migration81.php">La guía de migración</a> está disponible en el Manual de PHP. Por favor,
        consúltelo para obtener una lista detallada de las nuevas características y los cambios incompatibles con versiones anteriores.
      </p>',
];
