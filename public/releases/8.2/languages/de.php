<?php

return [
    'common_header' => 'PHP 8.2 ist ein Minor-Update der Sprache PHP und beinhaltet viele neue Features und Verbesserungen. Unter anderem readonly Klassen, die Typen null, false und true und Performance-Optimierungen.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.2 ist ein Minor-Update der Sprache PHP und beinhaltet viele neue Features und Verbesserungen.<br class="display-none-md">Unter anderem readonly Klassen, die Typen null, false und true und Performance-Optimierungen.',
    'upgrade_now' => 'Wechsle jetzt zu PHP 8.2!',
    'readonly_classes_title' => 'Readonly Klassen',
    'dnf_types_title' => 'Disjunktive Normalform (DNF) Typen',
    'dnf_types_description' => 'DNF Typen erlauben die Nutzung von <a href="/manual/en/language.types.type-system.php#language.types.type-system.composite.union">Verbund</a>- und <a href="/manual/en/language.types.type-system.php#language.types.type-system.composite.intersection">Intersektionstypen</a>, durch das Befolgen von strikten Regeln: wenn Verbundstypen mit Intersektionstypen gleichzeitig genutzt werden müssen Intersektionstypen geklammert werden.',
    'null_false_true_types_title' => '<code>null</code>, <code>false</code>, und <code>true</code> als eigene Typen',
    'random_title' => 'Neue "Random" Erweiterung',
    'random_description' => '<p>Die "random" Erweiterungen stellt eine neue objektorientierte API bereit, um Zufallszahlen zu generieren. Statt auf den global Seed des "random number generator (RNG)" zu setzen, welcher den Mersenne Twister Algorithmus nutzt, stellt die objektorientierte API mehrere Klassen ("Engine"s) mit modernen Algorithmen zur Verfügung, welche jeweils ihren eigenen und somit unabhängigen Seed setzen können.</p>
        <p>Die <code>\Random\Randomizer</code> Klasse stellt Funktionen bereit, um Zufallszahlen zu generieren, Arrays oder auch Strings zufällig zu mischen und viele mehr.</p>',
    'constants_in_traits_title' => 'Konstanten in Traits',
    'constants_in_traits_description' => 'Es kann nicht auf Konstanten eines Traits durch den Namen des Traits zugegriffen werden, jedoch über die implementierende Klasse.',
    'deprecate_dynamic_properties_title' => 'Missbilligung von Dynamische Properties',
    'deprecate_dynamic_properties_description' => '<p>Das dynamische Erstellen / zuweisen von Properties wurden als veraltet markiert um Fehler zu vermeiden. Eine Klasse kann jedoch durch das Attribut <code>#[\AllowDynamicProperties]</code> weiterhin die Nutzung erlauben. Die <code>stdClass</code> erlaubt dynamische Properties weiterhin.</p>
        <p>Die Nutzung von der magischen Methoden <code>__get</code>/<code>__set</code> sind nicht von dieser Änderung betroffen.</p>',
    'new_classes_title' => 'Neue Klassen, Interfaces, and Funktionen',
    'new_mysqli' => 'Neue <a href="/manual/en/mysqli.execute-query.php"><code>mysqli_execute_query</code></a> Funktion und neue <a href="/manual/en/mysqli.execute-query.php"><code>mysqli::execute_query</code></a> Methode.',
    'new_attributes' => 'Neue Attribute <a href="/manual/en/class.allow-dynamic-properties.php"><code>#[\AllowDynamicProperties]</code></a> und <a href="/manual/en/class.sensitive-parameter.php"><code>#[\SensitiveParameter]</code></a>.',
    'new_zip' => 'Neue <a href="/manual/en/ziparchive.getstreamindex.php"><code>ZipArchive::getStreamIndex</code></a>, <a href="/manual/en/ziparchive.getstreamname.php"><code>ZipArchive::getStreamName</code></a>, und <a href="/manual/en/ziparchive.clearerror.php"><code>ZipArchive::clearError</code></a> Methoden.',
    'new_reflection' => 'Neue <a href="/manual/en/reflectionfunction.isanonymous.php"><code>ReflectionFunction::isAnonymous</code></a> und <a href="/manual/en/reflectionmethod.hasprototype.php"><code>ReflectionMethod::hasPrototype</code></a> Methoden.',
    'new_functions' => 'Neue <a href="/manual/en/function.curl_upkeep.php"><code>curl_upkeep</code></a>, <a href="/manual/en/function.memory-reset-peak-usage.php"><code>memory_reset_peak_usage</code></a>, <a href="/manual/en/function.ini-parse-quantity.php"><code>ini_parse_quantity</code></a>, <a href="/manual/en/function.libxml-get-external-entity-loader.php"><code>libxml_get_external_entity_loader</code></a>, <a href="/manual/en/function.sodium-crypto-stream-xchacha20-xor-ic.php"><code>sodium_crypto_stream_xchacha20_xor_ic</code></a>, <a href="/manual/en/function.openssl-cipher-key-length.php"><code>openssl_cipher_key_length</code></a> Funktionen.',
    'bc_title' => 'Veraltete Funktionalität und inkompatible Änderungen zu vorherigen PHP Versionen',
    'bc_string_interpolation' => 'Die Nutzung der String Interpolation <code>${}</code> ist als veraltet markiert.',
    'bc_utf8' => 'Die Funktionen <a href="/manual/en/function.utf8-encode.php"><code>utf8_encode</code></a> und <a href="/manual/en/function.utf8-decode.php"><code>utf8_decode</code></a> sind als veraltet markiert.',
    'bc_datetime' => 'Die Methoden <a href="/manual/en/datetime.createfromimmutable.php"><code>DateTime::createFromImmutable</code></a> und <a href="/manual/en/datetimeimmutable.createfrommutable.php"><code>DateTimeImmutable::createFromMutable</code></a> haben nun den Rückgabetyp <code>static</code>.',
    'bc_odbc' => 'Die Erweiterungen <code>ODBC</code> und <code>PDO_ODBC</code> maskieren nun den Benutzernamen und das Passwort.',
    'bc_str_locale_sensitive' => 'Die Funktionen <a href="/manual/en/function.strtolower.php"><code>strtolower</code></a> und <a href="/manual/en/function.strtoupper.php"><code>strtoupper</code></a> sind nicht mehr Locale-Sensitiv.',
    'bc_spl_enforces_signature' => 'Die Methoden <a href="/manual/en/splfileobject.getcsvcontrol.php"><code>SplFileObject::getCsvControl</code></a>, <a href="/manual/en/splfileobject.fflush.php"><code>SplFileObject::fflush</code></a>, <a href="/manual/en/splfileobject.ftell.php"><code>SplFileObject::ftell</code></a>, <a href="/manual/en/splfileobject.fgetc.php"><code>SplFileObject::fgetc</code></a>, und <a href="/manual/en/splfileobject.fpassthru.php"><code>SplFileObject::fpassthru</code></a> forcieren nun ihre Signatur.',
    'bc_spl_false' => 'Die Methode <a href="/manual/en/splfileobject.haschildren.php"><code>SplFileObject::hasChildren</code></a> hat nun den Rückgabetypen <code>false</code>.',
    'bc_spl_null' => 'Die Methode <a href="/manual/en/splfileobject.getchildren.php"><code>SplFileObject::getChildren</code></a> hat nun den Rückgabetypen <code>null</code>.',
    'bc_spl_deprecated' => 'Die interne Methode <code>SplFileInfo::_bad_state_ex</code> wurde als veraltet markiert.',
    'footer_title' => 'Bessere Performance, verbesserte Syntax und verbesserte Typensicherheit.',
    'footer_content' => '<p>
        Für den direkten Code-Download von PHP 8.2 schaue bitte auf der <a href="/downloads">Downloads</a> Seite vorbei.
        Windows Pakete können auf der <a href="https://windows.php.net/download">PHP für Windows</a> Seite gefunden werden.
        Die Liste der Änderungen ist im <a href="/ChangeLog-8.php#PHP_8_2">ChangeLog</a> festgehalten.
      </p>
      <p>
        Der <a href="/manual/de/migration82.php">Migration Guide</a> ist im PHP Manual verfügbar. Lies dort
        nach für detaillierte Informationen zu den neuen Funktionen und inkompatiblen Änderungen zu vorherigen PHP
        Versionen.
      </p>',
];
