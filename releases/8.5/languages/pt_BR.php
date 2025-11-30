<?php

return [
    'common_header' => 'PHP 8.5 é uma atualização importante da linguagem PHP, trazendo novos recursos como a extensão URI, o operador Pipe e suporte para modificar propriedades durante a clonagem.',
    'main_title' => 'Mais inteligente, mais rápido, preparado para o futuro.',
    'main_subtitle' => '<p><strong>PHP 8.5 é uma atualização importante da linguagem PHP</strong>, com novos recursos como a <strong>extensão URI</strong>, o <strong>operador Pipe</strong> e suporte para <strong>modificar propriedades durante a clonagem</strong>.</p>',

    'whats_new' => 'Novidades no 8.5',
    'upgrade_now' => 'Atualize para PHP 8.5',
    'old_version' => 'PHP 8.4 e anteriores',
    'badge_new' => 'NOVO',
    'documentation' => 'Doc',
    'released' => 'Lançado em 20 de Novembro de 2025',
    'key_features' => 'Principais recursos do PHP 8.5',
    'key_features_description' => '<p><strong>Mais rápido</strong>, <strong>mais limpo</strong> e <strong>feito para desenvolvedores</strong>.</p>',

    'features_pipe_operator_title' => 'Operador Pipe',
    'features_pipe_operator_description' => '<p>O operador <code>|></code> permite encadear funções da esquerda para a direita, passando valores entre múltiplas chamadas sem variáveis intermediárias.</p>',
    'features_persistent_curl_share_handles_title' => 'cURL Share Handles Persistentes',
    'features_persistent_curl_share_handles_description' => '<p>Agora é possível manter handles compartilhados entre várias requisições PHP, evitando o custo de inicializar conexões repetidas para os mesmos hosts.</p>',
    'features_clone_with_title' => 'Clone With',
    'features_clone_with_description' => '<p>Clone objetos e atualize propriedades usando a nova sintaxe <code>clone()</code>, facilitando o padrão “with-er” para classes <code>readonly</code>.</p>',
    'features_uri_extension_title' => 'Extensão URI',
    'features_uri_extension_description' => '<p>O PHP 8.5 adiciona uma extensão nativa para analisar, normalizar e manipular URLs seguindo os padrões <em>RFC 3986</em> e <em>WHATWG URL</em>.</p>',
    'features_no_discard_title' => 'Atributo #[\NoDiscard]',
    'features_no_discard_description' => '<p>O atributo <code>#[\NoDiscard]</code> emite um aviso quando o valor de retorno não é usado, ajudando a evitar erros e aumentando a segurança de APIs.</p>',
    'features_fcc_in_const_expr_title' => 'Closures e First-Class Callables em Expressões Constantes',
    'features_fcc_in_const_expr_description' => '<p>Closures estáticas e first-class callables agora podem ser usadas em expressões constantes, como parâmetros de atributos.</p>',

    'pipe_operator_title' => 'Operador Pipe',
    'pipe_operator_description' => '<p>O operador pipe permite encadear chamadas de função sem lidar com variáveis intermediárias. Isso substitui chamadas aninhadas por um fluxo mais legível de cima para baixo.</p><p>Saiba mais sobre os bastidores desse recurso no <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">blog da The PHP Foundation</a>.</p>',

    'array_first_last_title' => 'Funções array_first() e array_last()',
    'array_first_last_description' => '<p>As funções <code>array_first()</code> e <code>array_last()</code> retornam, respectivamente, o primeiro ou o último valor de um array. Se o array estiver vazio, retornam <code>null</code>, o que facilita o uso com o operador <code>??</code>.</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p>Agora é possível modificar propriedades durante a clonagem passando um array associativo para a função <code>clone()</code>. Isso simplifica o padrão “with-er” para classes <code>readonly</code>.</p>',

    'uri_extension_title' => 'Extensão URI',
    'uri_extension_description' => '<p>A nova extensão URI, sempre disponível, fornece APIs para analisar e modificar URIs e URLs seguindo os padrões RFC 3986 e WHATWG URL.</p><p>Baseada nas bibliotecas <a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) e <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL).</p><p>Saiba mais sobre esse recurso no <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">blog da The PHP Foundation</a>.</p>',

    'no_discard_title' => 'Atributo #[\NoDiscard]',
    'no_discard_description' => '<p>Ao marcar uma função com <code>#[\NoDiscard]</code>, o PHP verificará se o valor retornado foi usado e emitirá um aviso caso não seja. Isso aumenta a segurança de APIs em que o retorno é importante, mas pode ser facilmente ignorado.</p><p>O cast <code>(void)</code> pode ser usado para indicar que o valor está sendo descartado intencionalmente.</p>',

    'persistent_curl_share_handles_title' => 'cURL Share Handles Persistentes',
    'persistent_curl_share_handles_description' => '<p>Diferente de <code>curl_share_init()</code>, handles criados com <code>curl_share_init_persistent()</code> não são destruídos ao final da requisição PHP. Se um handle persistente com o mesmo conjunto de opções for encontrado, ele será reutilizado, evitando o custo de inicializar o cURL a cada requisição.</p>',

    'fcc_in_const_expr_title' => 'Closures e First-Class Callables em Expressões Constantes',
    'fcc_in_const_expr_description' => '<p>Closures estáticas e first-class callables agora podem ser usadas em expressões constantes, incluindo parâmetros de atributos, valores padrão de propriedades e parâmetros, além de constantes.</p>',

    'new_classes_title' => 'Recursos e melhorias adicionais',
    'fatal_error_backtrace' => 'Erros fatais (como tempo máximo de execução excedido) agora exibem um backtrace.',
    'const_attribute_target' => 'Atributos agora podem ter como alvo constantes.',
    'override_attr_properties' => 'Atributo {0} agora pode ser aplicado a propriedades.',
    'deprecated_traits_constants' => 'O atributo {0} pode ser usado em traits e constantes.',
    'asymmetric_static_properties' => 'Propriedades estáticas agora suportam visibilidade assimétrica.',
    'final_promoted_properties' => 'Propriedades promovidas no construtor podem ser marcadas como <code>final</code>.',
    'closure_getCurrent' => 'Adicionado o método <code>Closure::getCurrent()</code> para simplificar recursão em funções anônimas.',
    'partitioned_cookies' => 'As funções {0} e {1} agora suportam a chave "partitioned".',
    'get_set_error_handler' => 'Novas funções {0} e {1} estão disponíveis.',
    'new_dom_element_methods' => 'Novos métodos {0} e {1} estão disponíveis.',
    'grapheme_levenshtein' => 'Nova função {0}.',
    'delayed_target_validation' => 'O novo atributo {0} pode ser usado para suprimir erros de compilação de atributos do core e de extensões aplicados a alvos inválidos.',

    'bc_title' => 'Descontinuações e quebras de compatibilidade',
    'bc_backtick_operator' => 'O operador backtick como alias de {0} foi descontinuado.',
    'bc_non_canonical_cast_names' => 'Casts não canônicos <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code> e <code>(binary)</code> foram descontinuados. Use <code>(bool)</code>, <code>(int)</code>, <code>(float)</code> e <code>(string)</code>.',
    'bc_disable_classes' => 'A diretiva INI {0} foi removida por quebrar várias garantias internas do engine.',
    'bc_semicolon_after_case' => 'Finalizar declarações <code>case</code> com ponto e vírgula, ao invés de dois pontos, foi descontinuado.',
    'bc_null_array_offset' => 'Usar <code>null</code> como índice de array ou ao chamar {0} agora é descontinuado. Use string vazia.',
    'bc_class_alias_names' => 'Não é mais possível usar "array" e "callable" como nomes de alias de classe em {0}.',
    'bc_sleep_wakeup' => 'Os métodos mágicos {0} e {1} foram suavemente descontinuados. Use {2} e {3}.',
    'bc_casting_nan' => 'Agora um aviso é emitido ao converter {0} para outros tipos.',
    'bc_non_array_destructuring' => 'Desestruturar valores que não sejam arrays (exceto <code>null</code>) usando {0} ou {1} agora emite um aviso.',
    'bc_casting_non_int_floats' => 'Agora um aviso é emitido ao converter floats (ou strings que parecem floats) para <code>int</code> quando o valor não pode ser representado como inteiro.',

    'footer_title' => 'Melhor desempenho, sintaxe aprimorada e maior segurança de tipos.',
    'footer_description' => '<p class="first-paragraph">A lista completa de mudanças está registrada no <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>.</p><p>Consulte o <a href="/manual/pt_BR/migration85.php" target="_blank">guia de migração</a> para uma lista detalhada de novos recursos e alterações incompatíveis.</p>',
];
