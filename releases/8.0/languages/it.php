<?php

return [
    'common_header' => 'PHP 8.0 è una nuova versione major del linguaggio PHP. Contiene molte nuove funzionalità ed ottimizzazioni quali i named arguments, la definizione di tipi unione, gli attributi, la promozione a proprietà degli argomenti del costruttore, l\'espressione match, l\'operatore nullsafe, la compilazione JIT e miglioramenti al sistema dei tipi, alla gestione degli errori e alla consistenza.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.0 è una nuova versione major del linguaggio PHP.<br class="display-none-md"> Contiene molte nuove funzionalità ed ottimizzazioni quali i named arguments, la definizione di tipi unione, gli attributi, la promozione a proprietà degli argomenti del costruttore, l\'espressione match, l\'operatore nullsafe, la compilazione JIT e miglioramenti al sistema dei tipi, alla gestione degli errori e alla consistenza.',
    'upgrade_now' => 'Aggiorna a PHP 8!',

    'named_arguments_title' => 'Named arguments',
    'named_arguments_description' => '<li>Indica solamente i parametri richiesti, saltando quelli opzionali.</li><li>Gli argomenti sono indipendenti dall\'ordine e auto-documentati.</li>',
    'attributes_title' => 'Attributi',
    'attributes_description' => 'Invece delle annotazioni PHPDoc, ora puoi usare metadati strutturati nella sintassi nativa PHP.',
    'constructor_promotion_title' => 'Promozione a proprietà degli argomenti del costruttore',
    'constructor_promotion_description' => 'Meno ripetizioni di codice per definire ed inizializzare le proprietà.',
    'union_types_title' => 'Tipi unione',
    'union_types_description' => 'Invece di indicare una combinazione di tipi con le annotazioni PHPDoc, puoi usare una dichiarazione nativa di tipo unione che viene validato durante l\'esecuzione.',
    'match_expression_title' => 'Espressione match',
    'match_expression_description' => '<p>La nuova espressione <code>match</code> è simile allo <code>switch</code> e ha le seguenti funzionalità:</p>
        <ul>
            <li>Match è un\'espressione, ovvero il suo risultato può essere salvato in una variabile o ritornato.</li>
            <li>I rami del <code>match</code> supportano solo espressioni a singola linea e non necessitano di un\'espressione <code>break</code>.</li>
            <li>Match esegue comparazioni strict.</li>
        </ul>',

    'nullsafe_operator_title' => 'Operatore nullsafe',
    'nullsafe_operator_description' => "Invece di controllare la presenza di un <code>null</code>, puoi ora usare una catena di chiamate con il nuovo operatore nullsafe. Quando la valutazione di un elemento della catena fallisce, l'esecuzione della catena si interrompe e l'intera catena restituisce il valore <code>null</code>.",
    'saner_string_number_comparisons_title' => 'Comparazioni più coerenti di stringhe e numeri',
    'saner_string_number_comparisons_description' => 'Nella comparazione di una stringa numerica, PHP 8 usa la comparazione numerica. Altrimenti, converte il numero in una stringa e usa la comparazione tra stringhe.',
    'consistent_internal_function_type_errors_title' => 'Tipi di errori consistenti per le funzioni native',
    'consistent_internal_function_type_errors_description' => 'La maggior parte delle funzioni native ora lanciano una eccezione <code>Error</code> se la validazione degli argomenti fallisce.',

    'jit_compilation_title' => 'Compilazione Just-In-Time',
    'jit_compilation_description' => 'PHP 8 intrduce due motori di compilazione JIT. Tracing JIT, il più promettente dei due, mostra delle prestazioni 3 volte superiori nei benchmarks sintetici e 1.5–2 volte superiori per alcuni specifici processi applicativi a lunga esecuzione. Le prestazioni delle tipiche applicazioni web sono al pari con PHP 7.4.',
    'jit_performance_title' => 'Miglioramenti delle performance in PHP 8 grazie a JIT',

    'type_improvements_title' => 'Sistema dei tipi e miglioramenti alla gestione degli errori',
    'arithmetic_operator_type_checks' => 'Controlli più stringenti per gli operatori aritmetici e bitwise',
    'abstract_trait_method_validation' => 'Validazione dei metodi astratti nei trait',
    'magic_method_signatures' => 'Firme corrette nei metodi magici',
    'engine_warnings' => 'Riclassificazione degli errori',
    'lsp_errors' => 'Errori fatali per firme di metodi non compatibili',
    'at_operator_no_longer_silences_fatal_errors' => "L'operatore <code>@</code> non silenzia più gli errori fatali.",
    'inheritance_private_methods' => 'Ereditarietà e metodi privati',
    'mixed_type' => 'Tipo <code>mixed</code>',
    'static_return_type' => 'Tipo di ritorno <code>static</code>',
    'internal_function_types' => 'Tipi per le funzioni native',
    'email_thread' => 'Email thread',
    'opaque_objects_instead_of_resources' => 'Oggetti opachi invece che risorse per le estensioni
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, e
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>',

    'other_improvements_title' => 'Altre ritocchi e migliorie di sintassi',
    'allow_trailing_comma' => 'Permessa una virgola finale nella lista dei parametri <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        e nell\'espressione use per le closure <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'Catch senza argomento',
    'variable_syntax_tweaks' => 'Correzioni alla sintassi di variabile',
    'namespaced_names_as_token' => 'Trattamento dei nomi di namespace come un singolo token',
    'throw_expression' => "<code>throw</code> è ora un'espressione",
    'class_name_literal_on_object' => "Permesso l'utilizzo di <code>::class</code> sugli oggetti",

    'new_classes_title' => 'Nuove classi, interfacce e funzioni',
    'weak_map_class' => 'Classe <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a>',
    'stringable_interface' => 'Interfaccia <a href="https://wiki.php.net/rfc/stringable">Stringable</a>',
    'token_as_object' => 'Classe <a href="https://wiki.php.net/rfc/token_as_object">PhpToken</a> come alternativa a token_get_all()',
    'new_dom_apis' => 'New DOM Traversal and Manipulation APIs',

    'footer_title' => 'Performance migliorate, migliore sintassi, e migliore sicurezza dei tipi.',
    'footer_description' => '<p>
            Per scaricare il codice sorgente visita di PHP 8 visita la pagina di <a href="http://www.php.net/downloads">download</a>.
            I binari eseguibili per Windows possono essere trovati sul sito <a href="https://windows.php.net/download">PHP for Windows</a>.
            Una lista dei cambiamenti è registrata nel <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
        </p>
        <p>
            La <a href="/manual/en/migration80.php">guida alla migrazione</a> è disponibile nel manuale PHP.
            Consultatelo per una lista completa delle nuove funzionalità e dei cambiamenti non retrocompatibili.
        </p>',
];
