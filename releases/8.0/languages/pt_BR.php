<?php

return [
    'common_header' => 'PHP 8.0 é uma atualização importante da linguagem PHP. Ela contém muitos novos recursos e otimizações, incluindo argumentos nomeados, união de tipos, atributos, promoção de propriedade do construtor, expressão match, operador nullsafe, JIT e melhorias no sistema de tipos, tratamento de erros e consistência.',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.0 é uma atualização importante da linguagem PHP. <br class="display-none-md"> Ela contém muitos novos recursos e otimizações, incluindo argumentos nomeados, união de tipos, atributos, promoção de propriedade do construtor, expressão match, operador nullsafe, JIT e melhorias no sistema de tipos, tratamento de erros e consistência.',
    'upgrade_now' => 'Atualize para o PHP 8!',

    'named_arguments_title' => 'Argumentos nomeados',
    'named_arguments_description' => '<li>Especifique apenas os parâmetros obrigatórios, pulando os opcionais.</li><li>Os argumentos são independentes da ordem e autodocumentados.</li>',
    'attributes_title' => 'Atributos',
    'attributes_description' => 'Em vez de anotações PHPDoc, agora você pode usar metadados estruturados com a sintaxe nativa do PHP.',
    'constructor_promotion_title' => 'Promoção de propriedade de construtor',
    'constructor_promotion_description' => 'Menos código boilerplate para definir e inicializar propriedades.',
    'union_types_title' => 'União de tipos',
    'union_types_description' => 'Em vez de anotações PHPDoc para uma combinação de tipos, você pode usar declarações de união de tipos nativa que são validados em tempo de execução',
    'match_expression_title' => 'Expressão match',
    'match_expression_description' => '<p>A nova expressão <code>match</code> é semelhante ao <code>switch</code> e tem os seguintes recursos:</p>
        <ul>
            <li>Match é uma expressão, o que significa que seu resultado pode ser armazenado em uma variável ou
                retornado.</li>
            <li>Match suporta apenas expressões de uma linha e não precisa de uma declaração <code>break</code>.</li>
            <li>Match faz comparações estritas.</li>
        </ul>',

    'nullsafe_operator_title' => 'Operador nullsafe',
    'nullsafe_operator_description' => 'Em vez de verificar condições nulas, agora você pode usar uma cadeia de chamadas com o novo operador nullsafe. Quando a avaliação de um elemento da cadeia falha, a execução de toda a cadeia é abortada e toda a cadeia é avaliada como nula.',
    'saner_string_number_comparisons_title' => 'Comparações mais inteligentes entre strings e números',
    'saner_string_number_comparisons_description' => 'Ao comparar com uma string numérica, o PHP 8 usa uma comparação numérica. Caso contrário, ele converte o número em uma string e usa uma comparação de string.',
    'consistent_internal_function_type_errors_title' => 'Erros consistentes para tipos de dados em funções internas',
    'consistent_internal_function_type_errors_description' => 'A maioria das funções internas agora lançam uma exceção <code>Error</code> se a validação do parâmetro falhar.',

    'jit_compilation_title' => 'Compilação Just-In-Time',
    'jit_compilation_description' => 'PHP 8 apresenta dois motores de compilação JIT. Tracing JIT, o mais promissor dos dois, mostra desempenho cerca de 3 vezes melhor em benchmarks sintéticos e melhoria de 1,5 a 2 vezes em alguns aplicativos específicos de longa execução. O desempenho típico das aplicações está no mesmo nível do PHP 7.4.',
    'jit_performance_title' => 'Relative JIT contribution to PHP 8 performance',

    'type_improvements_title' => 'Melhorias no sistema de tipo e tratamento de erros',
    'arithmetic_operator_type_checks' => 'Verificações de tipo mais rígidas para operadores aritméticos / bit a bit',
    'abstract_trait_method_validation' => 'Validação de método abstrato em traits',
    'magic_method_signatures' => 'Assinaturas corretas de métodos mágicos',
    'engine_warnings' => 'Avisos de motor reclassificados',
    'lsp_errors' => 'Erro fatal para assinaturas de método incompatíveis',
    'at_operator_no_longer_silences_fatal_errors' => 'O operador <code>@</code> não silencia mais os erros fatais.',
    'inheritance_private_methods' => 'Herança com métodos privados',
    'mixed_type' => 'Tipo <code>mixed</code>',
    'static_return_type' => 'Tipo de retorno <code>static</code>',
    'internal_function_types' => 'Tipagem de funções internas',
    'email_thread' => 'Discussão por email',
    'opaque_objects_instead_of_resources' => 'Objetos opacos em vez de recursos para
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, e
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        extensões',

    'other_improvements_title' => 'Outros ajustes e melhorias de sintaxe',
    'allow_trailing_comma' => 'Permitir vírgula no final da lista de parâmetros <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        e listas de uso em closures <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'Catches sem variável na captura de exceção',
    'variable_syntax_tweaks' => 'Ajustes de sintaxe para variáveis',
    'namespaced_names_as_token' => 'Tratamento de nomes de namespace como token único',
    'throw_expression' => '<code>throw</code> como expressão',
    'class_name_literal_on_object' => 'Permitir <code>::class</code> em objetos',

    'new_classes_title' => 'Novas classes, interfaces e funções',
    'weak_map_class' => 'Classe <a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a>',
    'stringable_interface' => 'Interface <a href="https://wiki.php.net/rfc/stringable">Stringable</a>',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> implementado com objetos',
    'new_dom_apis' => 'New DOM Traversal and Manipulation APIs',

    'footer_title' => 'Obtenha melhoria de desempenho gratuita.<br class="display-none-lg display-block-md">
        Obtenha melhor sintaxe.<br class="display-block-lg display-none-md display-block-sm">
        Obtenha mais segurança de tipos.',
    'footer_description' => '<p>
            Para downloads do código-fonte do PHP 8, visite a página de
            <a href="http://www.php.net/downloads">downloads</a>.
            Os binários do Windows podem ser encontrados na página <a href="https://windows.php.net/download">PHP para
                Windows</a>.
            A lista de mudanças é registrada no <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a>.
        </p>
        <p>
            O <a href="/manual/pt_BR/migration80.php">guia de migração</a> está disponível no Manual do PHP.
            Consulte-o para obter uma lista detalhada de novos recursos e alterações incompatíveis com versões anteriores.
        </p>',
];
