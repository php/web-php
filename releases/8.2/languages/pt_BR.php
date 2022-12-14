<?php

return [
    'common_header' => 'PHP 8.2 é a grande atualização da linguagem PHP. Classe somente leitura, null, false e true como tipos stand alone, depreciação de propriedades dinâmicas, melhorias de desempenho e mais',
    'documentation' => 'Doc',
    'main_title' => 'Lançado!',
    'main_subtitle' => 'PHP 8.2 é a grande atualização da linguagem PHP.<br class="display-none-md">Esta atualização inclui muitos novos recursos e otimizações. Classe somente leitura, tipo independente, null, false e true como tipos stand alone, propriedades dinâmicas obsoletas, melhorias de desempenho e muito mais.',
    'upgrade_now' => 'Atualize para PHP 8.2 agora!',
    'readonly_classes_title' => 'Classes somente leitura',
    'dnf_types_title' => 'Tipos DNF (Disjunctive Normal Form)',
    'dnf_types_description' => 'Tipos DNF nos permite <a href="/manual/pt_BR/language.types.type-system.php#language.types.type-system.composite.union">união</a> e <a href="/manual/pt_BR/language.types.type-system.php#language.types.type-system.composite.intersection">interseção</a> de tipos, seguindo uma regra estrita: ao combinar tipos de união e interseção, os tipos de interseção devem ser agrupados com colchetes',
    'null_false_true_types_title' => 'Permite <code>null</code>, <code>false</code> e <code>true</code> como tipos stand alone',
    'random_title' => 'Nova extensão "Random"',
    'random_description' => '<p>A extensão "random" fornece uma nova API orientada a objetos para geração de números aleatórios. Em vez de depender de um gerador de números aleatórios globalmente semeado (RNG) usando o algoritmo Mersenne Twister, a API orientada a objetos fornece várias classes ("Engine"s) que fornecem acesso a algoritmos modernos que armazenam seu estado em objetos para permitir várias sequências semeáveis ​​independentes .</p>
        <p>A classe <code>\Random\Randomizer</code> fornece uma interface de alto nível para usar a aleatoriedade do mecanismo para gerar um número inteiro aleatório, embaralhar um array ou string, selecionar chaves de array aleatórias e muito mais.</p >',
    'constants_in_traits_title' => 'Constantes em Traits',
    'constants_in_traits_description' => 'Você não pode acessar a constante através do nome da Trait, mas você pode acessar a constante através da classe que usa a Trait.',
    'deprecate_dynamic_properties_title' => 'Propriedades dinâmicas obsoletas',
    'deprecate_dynamic_properties_description' => '<p>A criação de propriedades dinâmicas está obsoleta para ajudar a evitar enganos e erros de digitação, a menos que a classe opte por usar o atributo de <code>#[\AllowDynamicProperties]</code>. <code>stdClass</code> permite propriedades dinâmicas.</p>
        <p>O uso dos métodos mágicos <code>__get</code>/<code>__set</code> não é afetado por esta alteração.</p>',
    'new_classes_title' => 'Novas classes, Interfaces, e Funções',
    'new_mysqli' => 'Nova função <a href="/manual/pt_BR/mysqli.execute-query.php"><code>mysqli_execute_query</code></a> e método <a href="/manual/pt_BR/mysqli.execute-query. php"><code>mysqli::execute_query</code></a> .',
    'new_attributes' => 'Novos atributos <a href="/manual/pt_BR/class.allow-dynamic-properties.php"><code>#[\AllowDynamicProperties]</code></a> e <a href="/manual/pt_BR/class.sensitive-parameter.php"><code>#[\SensitiveParameter]</code></a>.',
    'new_zip' => 'Novos métodos <a href="/manual/pt_BR/ziparchive.getstreamindex.php"><code>ZipArchive::getStreamIndex</code></a>, <a href="/manual/pt_BR/ziparchive.getstreamname.php"><code>ZipArchive::getStreamName</code></a>, e <a href="/manual/pt_BR/ziparchive.clearerror.php"><code>ZipArchive::clearError</code></a>.',
    'new_reflection' => 'Novo método <a href="/manual/pt_BR/reflectionfunction.isanonymous.php"><code>ReflectionFunction::isAnonymous</code></a> e <a href="/manual/pt_BR/reflectionmethod.hasprototype.php"><code>ReflectionMethod::hasPrototype</code></a> .',
    'new_functions' => 'Novas funções<a href="/manual/pt_BR/function.curl_upkeep.php"><code>curl_upkeep</code></a>, <a href="/manual/pt_BR/function.memory-reset-peak-usage.php"><code>memory_reset_peak_usage</code></a>, <a href="/manual/pt_BR/function.ini-parse-quantity.php"><code>ini_parse_quantity</code></a>, <a href="/manual/pt_BR/function.libxml-get-external-entity-loader.php"><code>libxml_get_external_entity_loader</code></a>, <a href="/manual/pt_BR/function.sodium-crypto-stream-xchacha20-xor-ic.php"><code>sodium_crypto_stream_xchacha20_xor_ic</code></a>, <a href="/manual/pt_BR/function.openssl-cipher-key-length.php"><code>openssl_cipher_key_length</code></a>.',
    'bc_title' => 'Alterações obsoletas e incompatíveis',
    'bc_string_interpolation' => 'Interpolação de string obsoleta <code>${}</code>.',
    'bc_utf8' => 'Funções obsoletas<a href="/manual/pt_BR/function.utf8-encode.php"><code>utf8_encode</code></a> e <a href="/manual/pt_BR/function.utf8-decode. php"><code>utf8_decode</code></a> .',
    'bc_datetime' => 'Métodos <a href="/manual/pt_BR/datetime.createfromimmutable.php"><code>DateTime::createFromImmutable</code></a> e <a href="/manual/pt_BR/datetimeimmutable.createfrommutable.php "><code>DateTimeImmutable::createFromMutable</code></a> tem um tipo de retorno provisório de <code>static</code>.',
    'bc_odbc' => 'Extensions <code>ODBC</code> e <code>PDO_ODBC</code> escapes the username e password.',
    'bc_str_locale_sensitive' => 'Funções <a href="/manual/pt_BR/function.strtolower.php"><code>strtolower</code></a> e <a href="/manual/pt_BR/function.strtoupper.php"><code>strtoupper</code></a> não são mais sensíveis à localidade.',
    'bc_spl_enforces_signature' => 'Métodos <a href="/manual/pt_BR/splfileobject.getcsvcontrol.php"><code>SplFileObject::getCsvControl</code></a>, <a href="/manual/pt_BR/splfileobject.fflush.php"><code>SplFileObject::fflush</code></a>, <a href="/manual/pt_BR/splfileobject.ftell.php"><code>SplFileObject::ftell</code></a>, <a href="/manual/pt_BR/splfileobject.fgetc.php"><code>SplFileObject::fgetc</code></a>, e <a href="/manual/pt_BR/splfileobject.fpassthru.php"><code>SplFileObject::fpassthru</code></a> impõe a sua assinatura.',
    'bc_spl_false' => 'Método <a href="/manual/pt_BR/splfileobject.haschildren.php"><code>SplFileObject::hasChildren</code></a> tem um tipo de retorno provisório de <code>false</code>.',
    'bc_spl_null' => 'Método <a href="/manual/pt_BR/splfileobject.getchildren.php"><code>SplFileObject::getChildren</code></a> tem um tipo de retorno provisório de <code>null</code>.',
    'bc_spl_deprecated' => 'O método interno <code>SplFileInfo::_bad_state_ex</code> foi obsoleto.',
    'footer_title' => 'Melhor desempenho, melhor sintaxe, segurança de tipo aprimorada.',
    'footer_description' => '<p>Para downloads dos fontes do PHP 8.2, visite a página <a href="/downloads">downloads</a>. Os binários do Windows podem ser encontrados no site <a href="https://windows.php.net/download">PHP para Windows</a>. A lista de mudanças está registrada no <a href="/ChangeLog-8.php#PHP_8_2">ChangeLog</a>.</p>
    <p>O <a href="/manual/pt_BR/migration82.php">guia de migração</a> está disponível no Manual do PHP. Consulte-o para obter uma lista detalhada de novos recursos e alterações incompatíveis com versões anteriores.</ p>',
];

