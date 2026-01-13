<?php

return [
    'common_header' => 'PHP 8.0 is een omvangrijke update van de PHP programmeertaal. Het bevat veel nieuwe mogelijkheden en optimalisaties, waaronder argument naamgeving, unie types, attributen, promotie van constructor eigenschappen, expressie vergelijking, null-veilige operator, JIT, en verbeteringen aan het type systeem, foute afhandeling, en consistentie.',
    'documentation' => 'Doc',
    'main_title' => 'Beschikbaar!',
    'main_subtitle' => 'PHP 8.0 is een omvangrijke update van de PHP programmeertaal.<br class="display-none-md"> Het bevat veel nieuwe mogelijkheden en optimalisaties, waaronder argument naamgeving, unie types, attributen, promotie van constructor eigenschappen, expressie vergelijking, null-veilige operator, JIT, en verbeteringen aan het type systeem, foute afhandeling, en consistentie.',
    'upgrade_now' => 'Update naar PHP 8!',

    'named_arguments_title' => 'Argument naamgeving',
    'named_arguments_description' => '<li>Geef enkel vereiste parameters op, sla optionele parameters over.</li><li>Argumenten hebben een onafhankelijke volgorde en documenteren zichzelf.</li>',
    'attributes_title' => 'Attributen',
    'attributes_description' => 'In plaats van met PHPDoc annotaties kan je nu gestructureerde metadata gebruiken in PHP\'s eigen syntaxis.',
    'constructor_promotion_title' => 'Promotie van constructor eigenschappen',
    'constructor_promotion_description' => 'Minder standaardcode nodig om eigenschappen te definiëren en initialiseren.',
    'union_types_title' => 'Unie types',
    'union_types_description' => 'In plaats van met PHPDoc annotaties kan je de mogelijke types via unie types declareren zodat deze ook gevalideerd worden tijdens de runtime.',
    'match_expression_title' => 'Expressie vergelijking',
    'match_expression_description' => '<p>De nieuwe <code>match</code> is gelijkaardig aan <code>switch</code> en heeft volgende eigenschappen:</p>
        <ul>
            <li>Match is een expressie, dit wil zeggen dat je het in een variabele kan bewaren of teruggeven.</li>
            <li>Match aftakkingen zijn expressies van één enkele lijn en bevatten geen <code>break</code> statements.</li>
            <li>Match vergelijkingen zijn strikt.</li>
        </ul>',

    'nullsafe_operator_title' => 'Null-veilige operator',
    'nullsafe_operator_description' => 'In plaats van een controle op <code>null</code> uit te voeren kan je nu een ketting van oproepen vormen met de null-veilige operator. Wanneer één expressie in de ketting faalt, zal de rest van de ketting niet uitgevoerd worden en is het resultaat van de hele ketting <code>null</code>.',
    'saner_string_number_comparisons_title' => 'Verstandigere tekst met nummer vergelijkingen',
    'saner_string_number_comparisons_description' => 'Wanneer PHP 8 een vergelijking uitvoert tegen een numerieke tekst zal er een numerieke vergelijking uitgevoerd worden. Anders zal het nummer naar een tekst omgevormd worden en er een tekstuele vergelijking uitgevoerd worden.',
    'consistent_internal_function_type_errors_title' => 'Consistente type fouten voor interne functies',
    'consistent_internal_function_type_errors_description' => 'De meeste interne functies gooien nu een <code>Error</code> exception als de validatie van parameters faalt.',

    'jit_compilation_title' => 'Just-In-Time compilatie',
    'jit_compilation_description' => 'PHP 8 introduceert twee systemen voor JIT compilatie. De tracerende JIT is veelbelovend en presteert ongeveer 3 keer beter bij synthetische metingen en kan sommige langlopende applicaties 1.5–2 keer verbeteren. Prestaties van typische web applicaties ligt in lijn met PHP 7.4.',
    'jit_performance_title' => 'Relatieve JIT bijdrage aan de prestaties van PHP 8',

    'type_improvements_title' => 'Type systeem en verbeteringen van de fout afhandeling',
    'arithmetic_operator_type_checks' => 'Strikte type controles bij rekenkundige/bitsgewijze operatoren',
    'abstract_trait_method_validation' => 'Validatie voor abstracte trait methodes',
    'magic_method_signatures' => 'Correcte signatures bij magic methods',
    'engine_warnings' => 'Herindeling van de engine warnings',
    'lsp_errors' => 'Fatal error bij incompatibele method signatures',
    'at_operator_no_longer_silences_fatal_errors' => 'De <code>@</code> operator werkt niet meer bij het onderdrukken van fatale fouten.',
    'inheritance_private_methods' => 'Overerving bij private methods',
    'mixed_type' => '<code>mixed</code> type',
    'static_return_type' => '<code>static</code> return type',
    'internal_function_types' => 'Types voor interne functies',
    'email_thread' => 'Email draadje',
    'opaque_objects_instead_of_resources' => 'Opaque objects in plaats van resources voor
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, and
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        extensies',

    'other_improvements_title' => 'Andere syntaxis aanpassingen en verbeteringen',
    'allow_trailing_comma' => 'Sta toe om een komma te plaatsen bij het laatste parameter in een lijst <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        en bij de use in closures <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'Catches die niets vangen',
    'variable_syntax_tweaks' => 'Variabele Syntaxis Aanpassingen',
    'namespaced_names_as_token' => 'Namespaced namen worden als één enkel token afgehandeld',
    'throw_expression' => '<code>throw</code> is nu een expressie',
    'class_name_literal_on_object' => '<code>::class</code> werkt bij objecten',

    'new_classes_title' => 'Nieuwe Classes, Interfaces, en Functies',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> object implementatie',
    'new_dom_apis' => 'New DOM Traversal and Manipulation APIs',

    'footer_title' => 'Betere prestaties, betere syntaxis, verbeterd type systeem.',
    'footer_description' => '<p>
            Ga naar de <a href="http://www.php.net/downloads">downloads</a> pagina om de PHP 8 code te verkrijgen.
            Uitvoerbare bestanden voor Windows kan je vinden op de <a href="https://windows.php.net/download">PHP voor Windows</a> website.
            De volledige lijst met wijzigingen is vastgelegd in een <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
        </p>
        <p>
            De <a href="/manual/en/migration80.php">migratie gids</a> is beschikbaar in de PHP Handleiding. Gebruik
            deze om een gedetailleerde lijst te krijgen van nieuwe opties en neerwaarts incompatibele aanpassingen.
        </p>',
];
