<?php

/**
 * En-revision: 213a4fafd56620a4efebddaa5bf246afb0758782
 */

return [
    'common_header' => 'PHP 8.1 é uma atualização importante da linguagem PHP. Enums, propriedades somente leitura, sintaxe de callables de primeira classe, fibras, tipos de interseção, melhorias de performance e mais.',
    'main_title' => 'Lançado!',
    'main_subtitle' => 'PHP 8.1 é uma atualização importante da linguagem PHP.<br class="display-none-md"> Ela contem muitas funcionalidades novas, incluindo enums, propriedades&nbsp;somente&nbsp;leitura, sintaxe de&nbsp;chamáveis de&nbsp;primeira&nbsp;classe, fibras, tipos&nbsp;de&nbsp;interseção, melhorias de performance e mais.',
    'upgrade_now' => 'Atualize para o PHP 8.1 agora!',
    'documentation' => 'Doc',

    'enumerations_title' => 'Enumerações',
    'enumerations_content' => 'Use enum em vez de um conjunto de constantes e obtenha validação de forma transparente.',

    'readonly_properties_title' => 'Propriedades Somente Leitura',
    'readonly_properties_content' => '<p>Propriedades somente leitura não podem ser alteradas após a inicialização, ou seja, após um valor ser atribuido a elas.<br>Elas são uma ótima maneira de modelar objetos de valor (Value Objects) e objetos de transferência de dados (DTO).</p>',

    'first_class_callable_syntax_title' => 'Sintaxe de Callabes de Primeira Classe',
    'first_class_callable_syntax_content' => '<p>Agora é possível obter a referência de qualquer função – isso é chamado de sintaxe de callable de primeira classe.</p>',

    'new_in_initializers_title' => 'New em inicializadores',
    'new_in_initializers_content' => '<p>Objetos agora podem ser usados como valor padrão de parâmetros, variáveis estáticas, e constantes globais, bem como em argumentos de atributos.</p>
            <p>Isso efetivamente torna possível usar <strong>atributos aninhados</strong>.</p>',

    'pure_intersection_types_title' => 'Tipos de Interseção Puros',
    'pure_intersection_types_content' => '<p>Use tipos de interseção quando um valor precisa satisfazer múltiplas restrições de tipo ao mesmo tempo.</p>
            <p>Atualmente não é possível misturar tipos de interseção e união como <code>A&B|C</code>.</p>',

    'never_return_type_title' => 'Tipo de retorno never',
    'never_return_type_content' => '<p>Uma função ou método declarada com o tipo <code>never</code> indica que ela não irá retornar um valor e irá lançar uma exceção ou terminar a execução do script com uma chamada de <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code>, ou algo similar.</p>',

    'final_class_constants_title' => 'Constantes de classe finais',
    'final_class_constants_content' => '<p>É possível declarar constantes de classe como final, de forma que elas não possam ser sobrescritas em classes filhas.</p>',

    'octal_numeral_notation_title' => 'Notação explícita de numeral octal',
    'octal_numeral_notation_content' => '<p>Agora é possível escrever números octais com o prefixo explícito <code>0o</code>.</p>',

    'fibers_title' => 'Fibras',
    'fibers_content' => '<p>Fibras são primitivos para implementar concorrência cooperativa leve. Elas são meios de criar blocos de código que podem ser pausados e retomados como Geradores, mas de qualquer lugar da pilha de execução. Fibras em si não fornecem concorrência magicamente, um laço de eventos ainda é necessário. No entanto, elas permitem que implementações bloqueantes e não bloqueantes compartilhem a mesma API.</p><p>Fibras permitem livrar-se de código boilerplate visto anteriormente com <code>Promise::then()</code> ou corrotinas baseadas em Geradores. Bibliotecas geralmente constróem abstrações adicionais em torno das Fibras, então não há necessidade de interagir com elas diretamente.</p>',

    'array_unpacking_title' => 'Suporte a desempacotamento de array para arrays com chaves string',
    'array_unpacking_content' => '<p>PHP já suportava o desempacotamento dentro de arrays através do operador de espalhamento, mas somente se o array tivesse chaves de inteiro. Agora também é possível desempacotar arrays com chaves string.</p>',

    'performance_title' => 'Melhorias de Performance',
    'performance_chart' => '<strong>Tempo de requisição do App Demo Symfony</strong><br>
                25 execuções consecutivas, 250 requisições (sec)<br>
                (menos é melhor)<br>',
    'performance_results_title' => 'O resultado (relativo ao PHP 8.0):',
    'performance_results_symfony' => '23.0% mais rápido no Demo Symfony',
    'performance_results_wordpress' => '3.5% mais rápido no WordPress',
    'performance_related_functions_title' => 'Funcionalidades relacionadas a performance no PHP 8.1:',
    'performance_jit_arm64' => 'Backend JIT para ARM64 (AArch64)',
    'performance_inheritance_cache' => 'Cache de herança (evita religamento de classes em cada requisição)',
    'performance_fast_class_name_resolution' => 'Resolução rápida de nome de classe (evita conversão em minúsculas e busca via hash)',
    'performance_timelib_date_improvements' => 'Melhorias de performance na timelib e ext/date',
    'performance_spl' => 'Melhorias em iteradores de sistema de arquivo SPL',
    'performance_serialize_unserialize' => 'Otimizações em serialize/unserialize',
    'performance_internal_functions' => 'Otimização de algumas funções internas (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())',
    'performance_jit' => 'Melhorias e correções no JIT',

    'other_new_title' => 'Novas Classes, Interfaces e Funções',
    'other_new_returntypewillchange' => 'Novo atributo <code>#[ReturnTypeWillChange]</code>.',
    'other_new_fsync_fdatasync' => 'Novas funções <code>fsync</code> e <code>fdatasync</code>.',
    'other_new_array_is_list' => 'Nova função <code>array_is_list</code>.',
    'other_new_sodium_xchacha20' => 'Novas funções Sodium XChaCha20.',

    'bc_title' => 'Depreciações e quebras de retrocompatibilidade',
    'bc_null_to_not_nullable' => 'Passagem de null para parâmetros não anuláveis em funções internas está depreciada.',
    'bc_return_types' => 'Tipos de retorno provisórios em métodos de classes embutidas do PHP.',
    'bc_serializable_deprecated' => 'Interface <code>Serializable</code> depreciada.',
    'bc_html_entity_encode_decode' => 'Funções de de/codificação de entidades HTML processam aspas simples e as substituem por padrão.',
    'bc_globals_restrictions' => 'Restrições da variável <code>$GLOBALS</code>.',
    'bc_mysqli_exceptions' => 'MySQLi: Modo de erro padrão definido para exceções.',
    'bc_float_to_int_conversion' => 'Conversão implícita incompatível de float para int está depreciada.',
    'bc_finfo_objects' => 'Extenção finfo: Recursos <code>file_info</code> migrados para objetos finfo existentes.',
    'bc_imap_objects' => 'IMAP: Recursos imap migrados para objetos da classe <code>IMAP\Connection</code>.',
    'bc_ftp_objects' => 'Extensão FTP: Recursos de conexão migrados para objetos da classe <code>FTP\Connection</code>.',
    'bc_gd_objects' => 'Extensão GD: Identificadores de fonte migrados para objetos da classe <code>GdFont</code>.',
    'bc_ldap_objects' => 'LDAP: Recursos migrados para objetos <code>LDAP\Connection</code>, <code>LDAP\Result</code>, e <code>LDAP\ResultEntry</code>.',
    'bc_postgresql_objects' => 'PostgreSQL: Recursos migrados para <code>PgSql\Connection</code>, <code>PgSql\Result</code>, e <code>PgSql\Lob</code> objects.',
    'bc_pspell_objects' => 'Pspell: Recursos de dicionário e configuração migrados para objetos de classe <code>PSpell\Dictionary</code> e <code>PSpell\Config</code>.',

    'footer_title' => 'Mais performance, melhor sintaxe, segurança de tipos aperfeiçoada.',
    'footer_content' => '<p>
        Para downloads dos fontes do PHP 8.1, por favor visite a página de <a href="https://www.php.net/downloads">downloads</a>.
        Binarios para Windows podem ser encontrados no site <a href="https://windows.php.net/download">PHP for Windows</a>.
        A lista de mudanças está registrada em <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog</a>.
      </p>
      <p>
        O <a href="/manual/pt_BR/migration81.php">guia de migração</a> está disponível no Manual do PHP. Por favor,
        consulte-o para uma lista delhadada de novas funcionalidades e mudanças incompatíveis com versões anteriores.
      </p>',
];
