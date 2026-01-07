<?php

return [
    'common_header' => 'PHP 8.0 は、PHP 言語のメジャーアップデートです。このアップデートには、たくさんの新機能や最適化が含まれています。たとえば名前付き引数、union 型、アトリビュート、コンストラクタでのプロパティのプロモーション、match 式、 nullsafe 演算子、JIT、型システムの改善、エラーハンドリング、一貫性の向上などです。',
    'documentation' => 'Doc',
    'main_title' => 'Released!',
    'main_subtitle' => 'PHP 8.0 は、PHP 言語のメジャーアップデートです。<br class="display-none-md"> このアップデートには、たくさんの新機能や最適化が含まれています。たとえば 名前付き引数、 union 型、アトリビュート、コンストラクタでのプロパティのプロモーション、match 式、nullsafe 演算子、JIT、型システムの改善、エラーハンドリング、一貫性の向上などです。',
    'upgrade_now' => 'PHP 8 にアップデートしよう!',

    'named_arguments_title' => '名前付き引数',
    'named_arguments_description' => '<li>必須の引数だけを指定し、オプションの引数はスキップしています。</li><li>引数の順番に依存せず、自己文書化(self-documented)されています。</li>',
    'attributes_title' => 'アトリビュート',
    'attributes_description' => 'PHPDoc のアノテーションの代わりに、PHP ネイティブの文法で構造化されたメタデータを扱えるようになりました。',
    'constructor_promotion_title' => 'コンストラクタでの、プロパティのプロモーション',
    'constructor_promotion_description' => 'ボイラープレートのコードを減らすため、コンストラクタでプロパティを定義し、初期化します。',
    'union_types_title' => 'Union 型',
    'union_types_description' => 'PHPDoc のアノテーションを使って型を組み合わせる代わりに、実行時に検証が行われる union型 をネイティブで使えるようになりました。',
    'match_expression_title' => 'Match 式',
    'match_expression_description' => '<p><code>match</code> は <code>switch</code> 文に似ていますが、以下の機能があります:</p>
        <ul>
            <li><code>match</code> は式なので、結果を返したり、変数に保存したりできます。</li>
            <li><code>match</code> の分岐は一行の式だけをサポートしており、<code>break</code> 文は不要です。</li>
            <li><code>match</code> は、型と値について、厳密な比較を行います。</li>
        </ul>',

    'nullsafe_operator_title' => 'Nullsafe 演算子',
    'nullsafe_operator_description' => '<code>null</code> チェックの条件を追加する代わりに、nullsafe演算子 を使って呼び出しをチェインさせられるようになりました。呼び出しチェインのひとつが失敗すると、チェインの実行全体が停止し、<code>null</code> と評価されます。',
    'saner_string_number_comparisons_title' => '数値と文字列の比較',
    'saner_string_number_comparisons_description' => '数値形式の文字列と比較する場合は、PHP 8 は数値として比較を行います。それ以外の場合は、数値を文字列に変換し、文字列として比較を行います。',
    'consistent_internal_function_type_errors_title' => '内部関数の型に関するエラーが一貫したものに',
    'consistent_internal_function_type_errors_description' => 'ほとんどの内部関数は、引数の検証に失敗すると <code>Error</code> 例外をスローするようになりました。',

    'jit_compilation_title' => 'JIT (ジャストインタイム) コンパイル',
    'jit_compilation_description' => 'PHP 8 は JITコンパイル のエンジンをふたつ搭載しています。トレーシングJITは、もっとも有望なふたつの人工的なベンチマークで、約3倍のパフォーマンスを示しました。また、長期間動いている特定のあるアプリケーションでは、1.5-2倍のパフォーマンス向上が見られました。典型的なアプリケーションのパフォーマンスは、PHP 7.4 と同等でした。',
    'jit_performance_title' => 'PHP 8 のパフォーマンスに対するJITの貢献',

    'type_improvements_title' => '型システムとエラーハンドリングの改善',
    'arithmetic_operator_type_checks' => '算術/ビット演算子のより厳密な型チェック',
    'abstract_trait_method_validation' => 'トレイトの抽象メソッドの検証',
    'magic_method_signatures' => 'マジックメソッドのシグネチャ',
    'engine_warnings' => 'エンジンの警告を整理',
    'lsp_errors' => '互換性のないメソッドシグネチャは fatal error に。',
    'at_operator_no_longer_silences_fatal_errors' => '<code>@</code> 演算子は、致命的なエラーを隠さなくなりました。',
    'inheritance_private_methods' => 'private メソッドの継承時のシグネチャチェック',
    'mixed_type' => '<code>mixed</code> 型のサポート',
    'static_return_type' => '戻り値で <code>static</code> 型をサポート',
    'internal_function_types' => '内部関数に型アノテーション',
    'email_thread' => 'Email thread',
    'opaque_objects_instead_of_resources' => '一部の拡張機能が、リソースからオブジェクトに移行:
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>',

    'other_improvements_title' => 'その他文法の調整や改善',
    'allow_trailing_comma' => '引数やクロージャーのuseリストの最後にカンマがつけられるように <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'catch で例外のキャプチャが不要に',
    'variable_syntax_tweaks' => '変数の文法の調整',
    'namespaced_names_as_token' => '名前空間の名前を単一のトークンとして扱う',
    'throw_expression' => '<code>throw</code> は式になりました',
    'class_name_literal_on_object' => 'オブジェクトに対して <code>::class</code> が使えるように',

    'new_classes_title' => '新しいクラス、インターフェイス、関数',
    'weak_map_class' => '<a href="https://wiki.php.net/rfc/weak_maps">Weak Map</a> クラス',
    'stringable_interface' => '<a href="https://wiki.php.net/rfc/stringable">Stringable</a> インターフェイス',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> をオブジェクトベースで実装',
    'new_dom_apis' => 'New DOM Traversal and Manipulation APIs',

    'footer_title' => 'パフォーマンスの向上、より良い文法、型システムの改善',
    'footer_description' => '<p>
            PHP 8 のソースコードのダウンロードは、
            <a href="http://www.php.net/downloads">downloads</a> のページをどうぞ。
            Windows 用のバイナリは <a href="https://windows.php.net/download">PHP for Windows</a> のページにあります。
            変更の一覧は <a href="http://www.php.net/ChangeLog-8.php">ChangeLog</a> にあります。
        </p>
        <p>
            <a href="/manual/ja/migration80.php">移行ガイド</a> が PHP マニュアルで利用できます。
            新機能や下位互換性のない変更の詳細については、移行ガイドを参照して下さい。
        </p>',
];
