<?php

return [
    'common_header' => 'PHP 8.0 ist ein Major-Update der Sprache PHP. Es beinhaltet viele neue Funktionen und Optimierungen wie beispielsweise Named Arguments, Union Types, Attribute, Constructor Property Promotion, Match Ausdrücke, Nullsafe Operator, JIT und Verbesserungen des Typen-Systems, der Fehlerbehandlung und der Konsistenz.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.0 ist ein Major-Update der Sprache PHP.<br class="display-none-md"> Es beinhaltet viele neue Funktionen und Optimierungen wie beispielsweise Named Arguments, Union Types, Attribute, Constructor Property Promotion, Match Ausdrücke, Nullsafe Operator, JIT und Verbesserungen des Typen-Systems, der Fehlerbehandlung und der Konsistenz.',
    'upgrade_now' => 'Wechsle jetzt zu PHP 8!',

    'named_arguments_title' => 'Named Arguments',
    'named_arguments_description' => '<li>Gib nur notwendige Parameter an, überspringe optionale.</li><li>Parameter sind unabhängig von der Reihenfolge und selbstdokumentierend.</li>',
    'attributes_title' => 'Attribute',
    'attributes_description' => 'Anstelle von PHPDoc Annotations kannst du nun strukturierte Meta-Daten in nativer PHP Syntax nutzen.',
    'constructor_promotion_title' => 'Constructor Property Promotion',
    'constructor_promotion_description' => 'Weniger Codewiederholungen für das Definieren und Initialisieren von Objektattributen.',
    'union_types_title' => 'Union Types',
    'union_types_description' => 'Anstelle von PHPDoc Annotations für kombinierte Typen kannst du native Union-Type-Deklarationen verwenden, welche zur Laufzeit validiert werden.',
    'match_expression_title' => 'Match Ausdruck',
    'match_expression_description' => '<p>Der neue <code>match</code> Ausdruck ist ähnlich wie die <code>switch</code> Anweisung und bietet folgende Funktionen:</p>
        <ul>
            <li>Da Match ein Ausdruck ist, kann sein Ergebnis in einer Variable gespeichert oder ausgegeben werden.</li>
            <li>Match Zweige unterstützen nur einzeilige Ausdrücke und benötigen keinen <code>break</code> Ausdruck.</li>
            <li>Match führt strikte Vergleiche durch.</li>
        </ul>',

    'nullsafe_operator_title' => 'Nullsafe Operator',
    'nullsafe_operator_description' => 'Anstelle von Null-Checks kannst du Funktionsaufrufe nun direkt mit dem neuen Nullsafe Operator aneinanderreihen. Wenn ein Funktionsaufruf innerhalb der Kette Null zurückliefert, wird die weitere Ausführung abgebrochen und die gesamte Kette wird zu Null ausgewertet.',
    'saner_string_number_comparisons_title' => 'Vernünftige String-zu-Zahl Vergleiche',
    'saner_string_number_comparisons_description' => 'Wenn eine Zahl mit einem numerischen String verglichen wird, benutzt PHP 8 einen Zahlen-Vergleich. Andernfalls wird die Zahl zu einem String konvertiert und ein String-Vergleich durchgeführt.',
    'consistent_internal_function_type_errors_title' => 'Konsistente Typen-Fehler für interne Funktionen',
    'consistent_internal_function_type_errors_description' => 'Die meisten internen Funktionen erzeugen nun eine <code>Error</code> Exception wenn die Typenvalidierung der Parameter fehlschlägt.',

    'jit_compilation_title' => 'Just-In-Time Compiler',
    'jit_compilation_description' => 'PHP 8 führt zwei JIT Compiler Engines ein. Tracing-JIT, der vielversprechendere der beiden, zeigt eine bis zu drei mal bessere Performance in synthetischen Benchmarks und eine 1,5 bis zweifache Verbesserung in einigen speziellen, langlaufenden Anwendungen. Die Performance einer typischen Anwendung ist auf dem Niveau von PHP 7.4.',
    'jit_performance_title' => 'Relativer Beitrag des JIT Compilers zur Performance von PHP 8',

    'type_improvements_title' => 'Verbesserungen am Typen-System und an der Fehlerbehandlung',
    'arithmetic_operator_type_checks' => 'Striktere Typen-Checks für arithmetische/bitweise Operatoren',
    'abstract_trait_method_validation' => 'Validierung abstrakter Methoden in einem Trait',
    'magic_method_signatures' => 'Korrekte Signaturen magischer Funktionen',
    'engine_warnings' => 'Neue Klassifizierung von Engine-Warnings',
    'lsp_errors' => 'Inkompatiblen Methoden-Signaturen erzeugen einen Fatal Error',
    'at_operator_no_longer_silences_fatal_errors' => 'Der <code>@</code> Operator unterdrückt keine Fatal Errors mehr.',
    'inheritance_private_methods' => 'Vererbung mit privaten Methoden',
    'mixed_type' => '<code>mixed</code> Typ',
    'static_return_type' => '<code>static</code> als Rückgabetyp',
    'internal_function_types' => 'Typen für interne Funktionen',
    'email_thread' => 'E-Mail-Thread',
    'opaque_objects_instead_of_resources' => 'Objekte ohne Methoden anstelle des resource Typs für
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, und
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        Extension',

    'other_improvements_title' => 'Weitere Syntax-Anpassungen und Verbesserungen',
    'allow_trailing_comma' => 'Erlauben eines abschließenden Kommas in Parameter-Listen <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        und Closure Use Listen <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>.',
    'non_capturing_catches' => 'Catches ohne Exception-Variable',
    'variable_syntax_tweaks' => 'Anpassungen an der Syntax für Variablen',
    'namespaced_names_as_token' => 'Namespaces werden als ein Token ausgewertet',
    'throw_expression' => '<code>throw</code> ist jetzt ein Ausdruck',
    'class_name_literal_on_object' => 'Nutzung von <code>::class</code> auf Objekten',

    'new_classes_title' => 'Neue Klassen, Interfaces, und Funktionen',
    'weak_map_class' => '<a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> Klasse',
    'stringable_interface' => '<a href="https://wiki.php.net/rfc/stringable">Stringable</a> Interface',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> mit einer Objekt-Implementierung',
    'new_dom_apis' => 'Neue APIs für DOM-Traversal and -Manipulation',

    'footer_title' => 'Bessere Performance, bessere Syntax, optimierte Typsicherheit.',
    'footer_description' => '<p>
            Für den direkten Code-Download von PHP 8 schaue bitte auf der <a href="http://www.php.net/downloads">Downloads</a> Seite vorbei.
            Windows Pakete können auf der <a href="https://windows.php.net/download">PHP für Windows</a> Seite gefunden werden.
            Die Liste der Änderungen ist im <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a> festgehalten.
        </p>
        <p>
            Der <a href="/manual/de/migration80.php">Migration Guide</a> ist im PHP Manual verfügbar. Lies dort
            nach für detaillierte Informationen zu den neuen Funktionen und inkompatiblen Änderungen zu vorherigen PHP
            Versionen.
        </p>',
];
