<?php

return [
    'common_header' => "PHP 8.0 est une mise à jour majeure du langage PHP. Elle contient beaucoup de nouvelle fonctionnalités et d'optimisations, incluant les arguments nommés, les types d'union, attributs, promotion de propriétés de constructeur, l'expression match, l'opérateur nullsafe, JIT (Compilation à la Volée), et des améliorations dans le système de typage, la gestion d'erreur, et de cohérence.",
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.0 est une mise à jour majeure du langage PHP.<br class="display-none-md"> Elle contient beaucoup de nouvelles fonctionnalités et d\'optimisations, incluant les arguments nommés, les types d\'union, attributs, promotion de propriété de constructeur, l\'expression match, l\'opérateur nullsafe, JIT (Compilation à la Volée), et des améliorations dans le système de typage, la gestion d\'erreur, et de cohérence.',
    'upgrade_now' => 'Migrez à PHP 8 maintenant!',

    'named_arguments_title' => 'Arguments nommés',
    'named_arguments_description' => '<li>Spécifiez uniquement les paramètres requis, omettant ceux optionnels.</li><li>Les arguments sont indépendants de l\'ordre et auto-documentés.</li>',
    'attributes_title' => 'Attributs',
    'attributes_description' => 'Au lieux d\'annotations PHPDoc, vous pouvez désormais utiliser les métadonnées structurés avec la syntaxe native de PHP.',
    'constructor_promotion_title' => 'Promotion de propriétés de constructeur',
    'constructor_promotion_description' => 'Moins de code redondant pour définir et initialiser les propriétés.',
    'union_types_title' => "Types d'union",
    'union_types_description' => "Au lieu d'annotation PHPDoc pour une combinaison de type, vous pouvez utiliser les déclarations de types d'union native qui sont validées lors de l'exécution.",
    'match_expression_title' => 'Expression match',
    'match_expression_description' => '<p>La nouvelle instruction <code>match</code> est similaire à <code>switch</code> et a les fonctionnalités suivantes :</p>
        <ul>
            <li>Match est une expression, signifiant que son résultat peut être enregistré dans une variable ou retourné.</li>
            <li>Les branches de <code>match</code> supportent uniquement les expressions d\'une seule ligne, et n\'a pas besoin d\'une déclaration <code>break</code>.</li>
            <li>Match fait des comparaisons strictes.</li>
        </ul>',

    'nullsafe_operator_title' => 'Opérateur Nullsafe',
    'nullsafe_operator_description' => "Au lieu de faire des vérifications conditionnelles de <code>null</code>, vous pouvez utiliser une chaîne d'appel avec le nouvel opérateur nullsafe. Qui lorsque l'évaluation d'un élément de la chaîne échoue, l'exécution de la chaîne complète est terminée et la chaîne entière évalue à <code>null</code>.",
    'saner_string_number_comparisons_title' => 'Comparaisons entre les chaînes de caractères et les nombres plus saines',
    'saner_string_number_comparisons_description' => 'Lors de la comparaison avec une chaîne numérique, PHP 8 utilise une comparaison de nombre. Sinon, il convertit le nombre à une chaîne de caractères et utilise une comparaison de chaîne de caractères.',
    'consistent_internal_function_type_errors_title' => 'Erreurs de type cohérent pour les fonctions internes',
    'consistent_internal_function_type_errors_description' => 'La plupart des fonctions internes lancent désormais une exception <code>Error</code> si la validation du paramètre échoue.',

    'jit_compilation_title' => 'Compilation Juste-à-Temps (JIT)',
    'jit_compilation_description' => "PHP 8 introduit deux moteurs de compilation JIT (juste à temps/compilation à la volée). Le Tracing JIT, le plus prometteur des deux, montre environ 3 fois plus de performances sur des benchmarks synthétiques et 1,5-2 fois plus de performances sur certaines applications à longue durée d'exécution. Généralement les performances des applications sont identiques à PHP 7.4.",
    'jit_performance_title' => 'Contribution relative du JIT à la performance de PHP 8',

    'type_improvements_title' => "Amélioration du système de typage et de la gestion d'erreur",
    'arithmetic_operator_type_checks' => 'Vérification de type plus sévère pour les opérateurs arithmétiques et bit à bit',
    'abstract_trait_method_validation' => 'Validation de méthode abstraite des traits',
    'magic_method_signatures' => 'Signature valide des méthodes magiques',
    'engine_warnings' => 'Reclassifications des avertissements du moteur',
    'lsp_errors' => 'Erreur fatale pour des signatures de méthodes incompatibles',
    'at_operator_no_longer_silences_fatal_errors' => "L'opérateur <code>@</code> ne silence plus les erreurs fatales.",
    'inheritance_private_methods' => 'Héritages avec les méthodes privées',
    'mixed_type' => 'Type <code>mixed</code>',
    'static_return_type' => 'Type de retour <code>static</code>',
    'internal_function_types' => 'Types pour les fonctions internes',
    'email_thread' => 'Discussion e-mail',
    'opaque_objects_instead_of_resources' => 'Objets opaques au lieu de ressources pour les extensions
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, et
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>',

    'other_improvements_title' => 'Autres ajustements de syntaxe et améliorations',
    'allow_trailing_comma' => 'Autorisation des virgules trainantes dans les listes de paramètres <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        et dans les listes des use d\'une fermeture <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'Les catchs non capturant',
    'variable_syntax_tweaks' => 'Ajustement de la Syntaxe des Variables',
    'namespaced_names_as_token' => 'Traite les noms des espaces de nom comme un seul token',
    'throw_expression' => '<code>throw</code> est désormais une expression',
    'class_name_literal_on_object' => 'Autorisation de <code>::class</code> sur les objets',

    'new_classes_title' => 'Nouvelles Classes, Interfaces, et Fonctions',
    'weak_map_class' => 'Classe <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a>',
    'stringable_interface' => 'Interface <a href="https://wiki.php.net/rfc/stringable">Stringable</a>',
    'token_as_object' => 'Implémentation objet de <a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a>',
    'new_dom_apis' => 'Nouvelles APIs pour traverser et manipuler le DOM',

    'footer_title' => 'Meilleures performances, meilleure syntaxe, amélioration de la sécurité de type.',
    'footer_description' => '<p>
            Pour le téléchargement des sources de PHP 8 veuillez visiter la page de <a href="http://www.php.net/downloads">téléchargement</a>.
            Les binaires Windows peuvent être trouvés sur le site de <a href="https://windows.php.net/download">PHP pour Windows</a>.
            La liste des changements est notée dans le <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
        </p>
        <p>
            Le <a href="/manual/fr/migration80.php">guide de migration</a> est disponible dans le manuel PHP.
            Veuillez le consulter pour une liste détaillée des nouvelles fonctionnalités et changements non rétrocompatibles.
        </p>',
];
