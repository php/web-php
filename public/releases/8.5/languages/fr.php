<?php

return [
    'common_header' => 'PHP 8.5 est une mise à jour majeure du langage PHP, avec de nouvelles fonctionnalités incluant l\'extension URI, l\'opérateur Pipe et la prise en charge de la modification des propriétés lors du clonage.',
    'main_title' => 'Plus intelligent, plus rapide, conçu pour le futur.',
    'main_subtitle' => '<p><strong>PHP 8.5 est une mise à jour majeure du langage PHP</strong>, avec de nouvelles fonctionnalités incluant l\'<strong>extension URI</strong>, l\'<strong>opérateur Pipe</strong> et la prise en charge de la <strong>modification des propriétés lors du clonage</strong>.</p>',

    'whats_new' => 'Nouveautés de la version 8.5',
    'upgrade_now' => 'Passer à PHP 8.5',
    'old_version' => 'PHP 8.4 et versions antérieures',
    'badge_new' => 'NOUVEAU',
    'documentation' => 'Doc',
    'released' => 'Publié le 20 nov. 2025',
    'key_features' => 'Fonctionnalités clés de PHP 8.5',
    'key_features_description' => '<p><strong>Plus rapide</strong>, <strong>plus propre</strong> et <strong>conçu pour les développeurs</strong>.</p>',

    'features_pipe_operator_description' => '<p>L\'opérateur <code>|></code> permet d\'enchaîner des callables de gauche à droite, en transmettant les valeurs fluidement à travers plusieurs fonctions sans variables intermédiaires.</p>',
    'features_persistent_curl_share_handles_description' => '<p>Les handles peuvent désormais être conservés entre plusieurs requêtes PHP, évitant le coût de l\'initialisation répétée des connexions vers les mêmes hôtes.</p>',
    'features_clone_with_description' => '<p>Clonez des objets et mettez à jour leurs propriétés grâce à la nouvelle syntaxe <code>clone()</code>, simplifiant le pattern « with-er » pour les classes <code>readonly</code>.</p>',
    'features_uri_extension_description' => '<p>PHP 8.5 ajoute une extension URI native pour analyser, normaliser et gérer les URL conformément aux standards <em>RFC 3986</em> et <em>WHATWG URL</em>.</p>',
    'features_no_discard_description' => '<p>L\'attribut <code>#[\NoDiscard]</code> émet un avertissement lorsqu\'une valeur de retour n\'est pas utilisée, aidant à prévenir les erreurs et à améliorer la sécurité globale des API.</p>',
    'features_fcc_in_const_expr_description' => '<p>Les closures statiques et les callables de première classe peuvent désormais être utilisés dans les expressions constantes, comme les paramètres d\'attributs.</p>',

    'pipe_operator_title' => 'Opérateur Pipe',
    'pipe_operator_description' => '<p>L\'opérateur pipe permet d\'enchaîner des appels de fonctions sans avoir recours à des variables intermédiaires. Il permet de remplacer de nombreux « appels imbriqués » par une chaîne qui se lit de gauche à droite, plutôt que de l\'intérieur vers l\'extérieur.</p><p>Pour en savoir plus sur l\'histoire de cette fonctionnalité, consultez <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">le blog de la PHP Foundation</a>.</p>',

    'array_first_last_title' => 'Fonctions <code>array_first()</code> et <code>array_last()</code>',
    'array_first_last_description' => '<p>Les fonctions <code>array_first()</code> et <code>array_last()</code> retournent respectivement la première ou la dernière valeur d\'un tableau. Si le tableau est vide, <code>null</code> est retourné (ce qui facilite la composition avec l\'opérateur <code>??</code>).</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>Il est désormais possible de mettre à jour des propriétés lors du clonage d\'un objet en passant un tableau associatif à la fonction <code>clone()</code>. Cela permet une prise en charge simple du pattern « with-er » pour les classes <code>readonly</code>.</p>',

    'uri_extension_title' => 'Extension URI',
    'uri_extension_description' => '<p>La nouvelle extension URI, toujours disponible, fournit des API pour analyser et modifier de manière sécurisée les URI et URL selon les standards RFC 3986 et WHATWG URL.</p><p>Propulsée par les bibliothèques <a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) et <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL).</p><p>Pour en savoir plus sur l\'histoire de cette fonctionnalité, consultez <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">le blog de la PHP Foundation</a>.</p>',

    'no_discard_title' => 'Attribut <code>#[\NoDiscard]</code>',
    'no_discard_description' => '<p>En ajoutant l\'attribut <code>#[\NoDiscard]</code> à une fonction, PHP vérifie si la valeur retournée est consommée et émet un avertissement dans le cas contraire. Cela permet d\'améliorer la sécurité des API pour lesquelles la valeur de retour est importante, mais peut facilement être oubliée par inadvertance.</p><p>Le cast associé <code>(void)</code> peut être utilisé pour indiquer qu\'une valeur est intentionnellement ignorée.</p>',

    'persistent_curl_share_handles_title' => 'Handles cURL partagés persistants',
    'persistent_curl_share_handles_description' => '<p>Contrairement à <code>curl_share_init()</code>, les handles créés par <code>curl_share_init_persistent()</code> ne seront pas détruits à la fin de la requête PHP. Si un handle partagé persistant avec le même ensemble d\'options de partage est trouvé, il sera réutilisé, évitant ainsi le coût d\'initialisation des handles cURL à chaque fois.</p>',

    'fcc_in_const_expr_title' => 'Closures et callables de première classe dans les expressions constantes',
    'fcc_in_const_expr_description' => '<p>Les closures statiques et les callables de première classe peuvent désormais être utilisés dans les expressions constantes. Cela inclut les paramètres d\'attributs, les valeurs par défaut des propriétés et des paramètres, ainsi que les constantes.</p>',

    'new_classes_title' => 'Fonctionnalités supplémentaires et améliorations',
    'fatal_error_backtrace' => 'Les erreurs fatales (comme le dépassement du temps d\'exécution maximum) incluent désormais une trace d\'appels.',
    'const_attribute_target' => 'Les attributs peuvent désormais cibler les constantes.',
    'override_attr_properties' => 'L\'attribut {0} peut désormais être appliqué aux propriétés.',
    'deprecated_traits_constants' => 'L\'attribut {0} peut être utilisé sur les traits et les constantes.',
    'asymmetric_static_properties' => 'Les propriétés statiques prennent désormais en charge la visibilité asymétrique.',
    'final_promoted_properties' => 'Les propriétés peuvent être marquées comme <code>final</code> via la promotion de propriétés dans le constructeur.',
    'closure_getCurrent' => 'Ajout de la méthode <code>Closure::getCurrent()</code> pour simplifier la récursion dans les fonctions anonymes.',
    'partitioned_cookies' => 'Les fonctions {0} et {1} prennent désormais en charge la clé « partitioned ».',
    'get_set_error_handler' => 'Les nouvelles fonctions {0} et {1} sont disponibles.',
    'new_dom_element_methods' => 'Les nouvelles méthodes {0} et {1} sont disponibles.',
    'grapheme_levenshtein' => 'Ajout de la fonction {0}.',
    'delayed_target_validation' => 'Le nouvel attribut {0} peut être utilisé pour supprimer les erreurs à la compilation provenant des attributs du noyau et des extensions utilisés sur des cibles invalides.',

    'bc_title' => 'Dépréciations et ruptures de compatibilité ascendante',
    'bc_backtick_operator' => 'L\'opérateur backtick en tant qu\'alias de {0} a été déprécié.',
    'bc_non_canonical_cast_names' => 'Les noms de cast non canoniques <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code> et <code>(binary)</code> ont été dépréciés. Utilisez respectivement <code>(bool)</code>, <code>(int)</code>, <code>(float)</code> et <code>(string)</code> à la place.',
    'bc_disable_classes' => 'Le paramètre INI {0} a été supprimé car il entraîne des ruptures dans diverses hypothèses du moteur.',
    'bc_semicolon_after_case' => 'La terminaison des instructions <code>case</code> par un point-virgule au lieu d\'un deux-points a été dépréciée.',
    'bc_null_array_offset' => 'L\'utilisation de <code>null</code> comme décalage de tableau ou lors de l\'appel de {0} est désormais dépréciée. Utilisez une chaîne vide à la place.',
    'bc_class_alias_names' => 'Il n\'est plus possible d\'utiliser « array » et « callable » comme noms d\'alias de classe dans {0}.',
    'bc_sleep_wakeup' => 'Les méthodes magiques {0} et {1} ont été légèrement dépréciées. Les méthodes magiques {2} et {3} devraient être utilisées à la place.',
    'bc_casting_nan' => 'Un avertissement est désormais émis lors du cast de {0} vers d\'autres types.',
    'bc_non_array_destructuring' => 'La déstructuration de valeurs non-tableau (autres que <code>null</code>) avec {0} ou {1} émet désormais un avertissement.',
    'bc_casting_non_int_floats' => 'Un avertissement est désormais émis lors du cast de nombres flottants (ou de chaînes ressemblant à des flottants) en <code>int</code> s\'ils ne peuvent pas être représentés comme tels.',

    'footer_title' => 'Une syntaxe améliorée, de meilleures performances et une sécurité de typage renforcée.',
    'footer_description' => '<p class="first-paragraph">La liste complète des modifications est consignée dans le <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">journal des modifications</a>.</p><p>Veuillez consulter le <a href="/manual/fr/migration85.php" target="_blank">guide de migration</a> pour une liste détaillée des nouvelles fonctionnalités et des changements incompatibles avec les versions précédentes.</p>',
];
