<?php

/**
 * En-revision: 213a4fafd56620a4efebddaa5bf246afb0758782
 */

return [
    'common_header' => 'PHP8.1は、PHPのメジャーアップデートです。Enum、読み取り専用プロパティ、callableの新シンタックス、Fiber、交差型、パフォーマンス向上など数々の新機能があります。',
    'main_title' => 'リリース！',
    'main_subtitle' => 'PHP8.1は、PHPのメジャーアップデートです。<br class="display-none-md"> Enum、読み取り専用プロパティ、callableの新シンタックス、Fiber、交差型、パフォーマンス向上など数々の新機能があります。',
    'upgrade_now' => '今すぐアップデートする。',
    'documentation' => 'ドキュメント',

    'enumerations_title' => 'ENUM型',
    'enumerations_content' => '<p>定数のかわりにENUMを使うことで、すっきりと書けるようになります。</p>',

    'readonly_properties_title' => '読み取り専用プロパティ',
    'readonly_properties_content' => '<p>読み取り専用プロパティは、一度でも値を割り当てると、その後変更することはできません。<br>これはValue ObjectやData Transfer Objectを実現するのに最適です。</p>',

    'first_class_callable_syntax_title' => '第一級callable',
    'first_class_callable_syntax_content' => '<p>任意の関数へのリファレンスを取得できるようになりました。第一級callableと呼ばれます。</p>',

    'new_in_initializers_title' => '引数デフォルト値にNew',
    'new_in_initializers_content' => '<p>引数デフォルト値、およびstatic変数、グローバル定数、アトリビュート引数にnewを書けるようになりました。</p>
            <p>特に<strong>アトリビュートの入れ子</strong>において威力を発揮します。</p>',

    'pure_intersection_types_title' => '交差型',
    'pure_intersection_types_content' => '<p>交差型は、複数の型を全て満たすことを示す型です。</p>
            <p><code>A&B|C</code>のように、交差型とUNION型を混在させることは今のところできません。</p>',

    'never_return_type_title' => 'Never型',
    'never_return_type_content' => '<p>値を返さないことを示す<code>never</code>型が追加されました。<code>die()</code>、<code>exit()</code>、<code>trigger_error()</code>等、関数内でスクリプトが中断される場合に使います。</p>',

    'final_class_constants_title' => 'Finalクラス定数',
    'final_class_constants_content' => '<p>Finalクラス定数は、子クラスで上書きされないことが保証されるクラス定数です。</p>',

    'octal_numeral_notation_title' => '8進数表記',
    'octal_numeral_notation_content' => '<p>8進数を<code>0o</code>のプレフィックスで書くことができるようになりました。</p>',

    'fibers_title' => 'Fiber',
    'fibers_content' => '<p>Fiberは同時実行を実現する軽量な機能です。ジェネレータのような、スタックのどこからでも一時停止や再開が可能なコードを作ることができます。ただしFiber自体は必要最低限の機能しか持っていないため、非同期処理を実現するためにはイベントループ等の実装が必要です。</p><p>ユーザがFiberを直接使用することはほとんどなく、ライブラリを経由して利用することが推奨されます。</p>',

    'array_unpacking_title' => '文字列キー配列のアンパック',
    'array_unpacking_content' => '<p>これまでPHPは、スプレッド演算子による配列展開は数値キーしか対応していませんでした。PHP8.1では文字列キーの配列についてもアンパックに対応します。</p>',

    'performance_title' => 'パフォーマンス向上',
    'performance_chart' => '<strong>Symfonyデモ リクエスト時間</strong><br>
                秒間250リクエストを25回連続実行<br>',
    'performance_results_title' => 'PHP8.0に対して：',
    'performance_results_symfony' => 'Symfonyデモでは23.0%の高速化を達成。',
    'performance_results_wordpress' => 'WordPressでは3.5%の高速化を達成。',
    'performance_related_functions_title' => 'PHP8.1でのパフォーマンス向上技術：',
    'performance_jit_arm64' => 'ARM64 (AArch64)へのJITバックエンド対応。',
    'performance_inheritance_cache' => 'リクエスト毎にクラスを再リンクせず、キャッシュを継続する。',
    'performance_fast_class_name_resolution' => 'クラス名の解決の高速化。',
    'performance_timelib_date_improvements' => 'timelibおよびext/dateの高速化。',
    'performance_spl' => 'SPLイテレータの改良。',
    'performance_serialize_unserialize' => 'serialize/unserializeの最適化。',
    'performance_internal_functions' => 'いくつかの内部関数(get_declared_classes()・explode()・strtr()・strnatcmp()・dechex()等)の最適化。',
    'performance_jit' => 'JITの改善。',

    'other_new_title' => '新しいクラス・インターフェイス・関数',
    'other_new_returntypewillchange' => '<code>#[ReturnTypeWillChange]</code>アトリビュート。',
    'other_new_fsync_fdatasync' => '<code>fsync</code>・<code>fdatasync</code>関数。',
    'other_new_array_is_list' => '<code>array_is_list</code>関数。',
    'other_new_sodium_xchacha20' => 'SodiumがXChaCha20暗号化に対応。',

    'bc_title' => '互換性のない変更点',
    'bc_null_to_not_nullable' => 'nullableでない内部関数にnullを渡すことを非推奨化。',
    'bc_return_types' => 'ビルトインクラスの返り値の型判定が厳格になりました。',
    'bc_serializable_deprecated' => '<code>Serializable</code>インターフェイスを非推奨化。',
    'bc_html_entity_encode_decode' => 'HTMLエンコード関数は、デフォルトでシングルクォートもエスケープするようになりました。',
    'bc_globals_restrictions' => '<code>$GLOBALS</code>の扱いが他のグローバル変数と同じようになりました。',
    'bc_mysqli_exceptions' => 'MySQLiのエラーモードのデフォルトが例外になりました。',
    'bc_float_to_int_conversion' => 'floatからintへ暗黙の型変換を非推奨化。',
    'bc_finfo_objects' => '<code>file_info</code>が返す型はリソースからfinfoオブジェクトになりました。',
    'bc_imap_objects' => 'imap関数が返す型はリソースから<code>IMAP\Connection</code>オブジェクトになりました。',
    'bc_ftp_objects' => 'FTP関数が返す型はリソースから<code>FTP\Connection</code>オブジェクトになりました。',
    'bc_gd_objects' => 'GDのフォント関数が返す型はリソースから<code>GdFont</code>オブジェクトになりました。',
    'bc_ldap_objects' => 'LDAP関数が返す型はリソースから<code>LDAP\Connection</code>・<code>LDAP\Result</code>・<code>LDAP\ResultEntry</code>オブジェクトになりました。',
    'bc_postgresql_objects' => 'PostgreSQL関数が返す型はリソースから<code>PgSql\Connection</code>・<code>PgSql\Result</code>・<code>PgSql\Lob</code>オブジェクトになりました。',
    'bc_pspell_objects' => 'Pspell関数が返す型はリソースから<code>PSpell\Dictionary</code>・<code>PSpell\Config</code>オブジェクトになりました。',

    'footer_title' => 'より良いパフォーマンス、より良いシンタックス、より良い型安全性。',
    'footer_content' => '<p>
        PHP 8.1 ソースコードのダウンロードは <a href="https://www.php.net/downloads">こちらから</a>。
        Windowsのバイナリは<a href="https://windows.php.net/download">こちらから</a>。
        変更点の一覧は<a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">こちら</a>にあります。
      </p>
      <p>
        マニュアルから<a href="/manual/ja/migration81.php">マイグレーションガイド</a>が利用可能です。
        新機能や互換性のない変更の詳細については、マイグレーションガイドを参照してください。
      </p>',
];
