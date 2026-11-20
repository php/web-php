<?php

return [
    'common_header' => 'PHP 8.1 ist ein Minor-Update der Sprache PHP und beinhaltet viele neue Features und Verbesserungen. Unter anderem Enumerations, Readonly-Properties, First-Class Callable Syntax, Fibers, Intersection-Types, Performance-Optimierungen.',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.1 ist ein Minor-Update der Sprache PHP.<br class="display-none-md"> Es beinhaltet viele neue Features und Verbesserungen.<br>Unter anderem Enumerations, Readonly-Properties, First-Class Callable Syntax, Fibers, Intersection-Types, Performance-Optimierungen.',
    'upgrade_now' => 'Wechsle jetzt zu PHP 8.1!',
    'documentation' => 'Doc',

    'enumerations_title' => 'Enumerations',
    'enumerations_content' => '<p>Du kannst nun Enums statt Konstanten für mehr Typensicherheit und direkter Validierung nutzen.</p>',

    'readonly_properties_title' => 'Readonly-Properties',
    'readonly_properties_content' => '<p>Readonly-Properties können nach einer Initialisierung nicht mehr verändert werden.<br/>Sie sind ein ideales Werkzeug um Value-Objekte und Data-Transfer-Objekte zu erstellen.</p>',

    'first_class_callable_syntax_title' => 'First-Class Callable Syntax',
    'first_class_callable_syntax_content' => '<p>Durch die sogenannte First-Class Callable Syntax kannst du eine Referenz zu jeder beliebigen Funktion erhalten.</p>',

    'new_in_initializers_title' => 'New in Initialisierungen',
    'new_in_initializers_content' => '<p>Objekte können nun als Default-Wert für Parameter, statische Variablen, Konstanten, so wie als Argument für Attribute genutzt werden.</p>
            <p>Dies ermöglicht nun auch die Nutzung von <strong>verschachtelten Attributen</strong>.</p>',

    'pure_intersection_types_title' => 'Pure-Intersection-Types',
    'pure_intersection_types_content' => '<p>Nutze die Intersection-Types, wenn du sicherstellen möchtest, dass das übergebene Objekt mehrere Typen implementieren.</p>
            <p>Es ist aktuell nicht möglich eine Kombination aus Intersection- und Union-Types zu nutzen, wie z.B. <code>A&B|C</code>.</p>',

    'never_return_type_title' => 'Der Rückgabetyp Never',
    'never_return_type_content' => '<p>Eine Funktion mit dem Rückgabetyp <code>never</code> gibt an, dass sie keinen Rückgabewert besitzt und die Funktion entweder eine Exception wirft oder das Script durch <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code>, oder einer ähnlichen Funktion terminiert wird.</p>',

    'final_class_constants_title' => 'Final Klassen Konstanten',
    'final_class_constants_content' => '<p>Es ist nun möglich Klassen Konstanten als final zu definieren, sodass diese in einer Vererbung nicht überschrieben werden können.</p>',

    'octal_numeral_notation_title' => 'Explizite Oktalsystem-Zahl Notation',
    'octal_numeral_notation_content' => '<p>Du kannst nun Oktalsystem-Zahlen explizit durch einen <code>0o</code>-Prefix angeben.</p>',

    'fibers_title' => 'Fibers',
    'fibers_content' => '<p>Fibers sind eine grundlegende Funktionalität zur Implementierung von verzahnten Abläufen. Sie sind dazu gedacht Code-Blöcke zu erstellen, die pausiert und wiederaufgenommen werden ähnlich wie die Generator-Implementierung, jedoch von überall aus. Fibers selbst stellen keine Nebenläufigkeit bereit und benötigen somit eine Event-Loop Implementierung. Aber sie ermöglichen die gemeinsame Nutzung einer API in einem blockierenden und nicht blockierenden Kontext.</p><p>Fibers können dazu dienen, Funktionen wie z.B. <code>Promise::then()</code> oder Generator basierte Koroutinen zu ersetzen. Generell wird davon ausgegangen, dass Bibliotheken-Entwickler eine Abstraktion um die Fibers herum bauen werden, sodass man selten in Berührung mit den Fibers kommen wird.</p>',

    'array_unpacking_title' => 'Entpacken von Arrays mit string-basierten Keys',
    'array_unpacking_content' => '<p>PHP unterstützte bereits das Entpacken von Arrays mit int-basiertem Key in andere Arrays. Jetzt ist es auch möglich Arrays mit einem string-basiertem Key oder auch einer Kombination aus beiden Varianten zu entpacken.</p>',

    'performance_title' => 'Performance-Optimierungen',
    'performance_chart' => '<strong>Symfony Demo App Request Zeit</strong><br>
                25 aufeinanderfolgende Läufe, 250 Requests (sek)<br>
                (kleiner ist besser)<br>',
    'performance_results_title' => 'Das Ergebnis (Relativ zu PHP 8.0):',
    'performance_results_symfony' => '23.0% schnellere Symfony Demo',
    'performance_results_wordpress' => '3.5% schnelleres WordPress',
    'performance_related_functions_title' => 'Performance relevante Features in PHP 8.1:',
    'performance_jit_arm64' => 'JIT Backend für ARM64 (AArch64)',
    'performance_inheritance_cache' => 'Vererbungscache (verhindern das Relinken von Klassen in bei jedem Request)',
    'performance_fast_class_name_resolution' => 'Schnelleres auflösen von Klassennamen (verhindern von Kleinschreibungsumwandlung und Hash Lookups )',
    'performance_timelib_date_improvements' => 'timelib und ext/date Performance-Optimierungen',
    'performance_spl' => 'SPL Dateisystem Iteratoren-Optimierungen',
    'performance_serialize_unserialize' => 'Serialisierung- / Deserialisierung-Optimierungen',
    'performance_internal_functions' => 'Einige Optimierungen an internen Funktionen (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())',
    'performance_jit' => 'JIT Verbesserungen und Korrekturen',

    'other_new_title' => 'Neue Klassen, Interfaces und Funktionen',
    'other_new_returntypewillchange' => 'Neues Attribut <code>#[ReturnTypeWillChange]</code>.',
    'other_new_fsync_fdatasync' => 'Neue Funktionen <code>fsync</code> und <code>fdatasync</code>.',
    'other_new_array_is_list' => 'Neue Funktion <code>array_is_list</code>.',
    'other_new_sodium_xchacha20' => 'Neue Sodium XChaCha20 Funktionen.',

    'bc_title' => 'Veraltete Funktionalität und inkompatible Änderungen zu vorherigen PHP Versionen',
    'bc_null_to_not_nullable' => 'Übergabe von null an nicht null-fähige interne Funktionsparameter ist veraltet.',
    'bc_return_types' => 'Interne PHP Klassen-Methoden besitzen nun Rückgabetypen',
    'bc_serializable_deprecated' => 'Das <code>Serializable</code> Interface ist nun veraltet.',
    'bc_html_entity_encode_decode' => 'HTML-Entitäten en/decode Funktionen verarbeiten und ersetzen einfache Anführungszeichen im Standard.',
    'bc_globals_restrictions' => 'Restriktionen an der <code>$GLOBALS</code> Variable.',
    'bc_mysqli_exceptions' => 'MySQLi: Der Standard Error-Modus wirft nun Exceptions.',
    'bc_float_to_int_conversion' => 'Implizite nicht kompatible Float zu Int Konvertierung ist veraltet.',
    'bc_finfo_objects' => 'finfo Erweiterung: <code>file_info</code> nutzt nun das finfo-Objekt statt einer resource.',
    'bc_imap_objects' => 'IMAP: imap nutzt nun das <code>IMAP\Connection</code> Objekt statt des resource-Typen.',
    'bc_ftp_objects' => 'FTP Erweiterung: Nutzt nun das <code>FTP\Connection</code> Objekt statt des resource-Typen.',
    'bc_gd_objects' => 'GD Erweiterung: Die Klasse <code>GdFont</code> ersetzt nun den zuvor genutzten resource-Typ.',
    'bc_ldap_objects' => 'LDAP: Die resource-Typen wurden auf <code>LDAP\Connection</code>, <code>LDAP\Result</code> und <code>LDAP\ResultEntry</code> umgestellt.',
    'bc_postgresql_objects' => 'PostgreSQL: Die resource-Typen wurden auf <code>PgSql\Connection</code>, <code>PgSql\Result</code> und <code>PgSql\Lob</code> umgestellt.',
    'bc_pspell_objects' => 'Pspell: Der resource-Typ von pspell und pspell config wurden auf <code>PSpell\Dictionary</code> und <code>PSpell\Config</code> umgestellt.',

    'footer_title' => 'Bessere Performance, verbesserte Syntax und verbesserte Typensicherheit.',
    'footer_content' => '<p>
        Für den direkten Code-Download von PHP 8.1 schaue bitte auf der <a href="https://www.php.net/downloads">Downloads</a> Seite vorbei.
        Windows Pakete können auf der <a href="https://windows.php.net/download">PHP für Windows</a> Seite gefunden werden.
        Die Liste der Änderungen ist im <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog</a> festgehalten.
      </p>
      <p>
        Der <a href="/manual/de/migration81.php">Migration Guide</a> ist im PHP Manual verfügbar. Lies dort
        nach für detaillierte Informationen zu den neuen Funktionen und inkompatiblen Änderungen zu vorherigen PHP
        Versionen.
      </p>',
];
