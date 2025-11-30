<?php

return [
    'common_header' => 'PHP 8.5 は、PHP 言語のメジャーアップデートです。URI 拡張モジュール、パイプ演算子、クローン時のプロパティ変更機能などの新機能が含まれています。',
    'main_title' => 'より賢く、より速く。未来へ向けて。',
    'main_subtitle' => '<p><strong>PHP 8.5 は、PHP 言語のメジャーアップデートです</strong>。<strong>URI 拡張モジュール</strong>、<strong>パイプ演算子</strong>、<strong>クローン時のプロパティ変更</strong>機能などの新機能が含まれています。</p>',

    'whats_new' => '8.5 の新機能',
    'upgrade_now' => 'PHP 8.5 にアップグレード',
    'old_version' => 'PHP 8.4 以前',
    'badge_new' => 'NEW',
    'documentation' => 'Doc',
    'released' => '2025/11/20 リリース',
    'key_features' => 'PHP 8.5 の主な機能',
    'key_features_description' => '<p><strong>より速く</strong>、<strong>よりクリーンに</strong>。そして<strong>開発者のために</strong>。</p>',

    'features_pipe_operator_title' => 'パイプ演算子',
    'features_pipe_operator_description' => '<p><code>|></code> 演算子を使うと callable を左から右にチェインさせ、中間変数を使わずに値を複数の関数にスムーズに受け渡せます。</p>',
    'features_persistent_curl_share_handles_title' => '持続的な cURL 共有ハンドル',
    'features_persistent_curl_share_handles_description' => '<p>ハンドルを複数の PHP リクエストにまたがって持続させられるようになります。同じホストへの接続初期化を繰り返すコストを避けることができます。</p>',
    'features_clone_with_title' => 'Clone With',
    'features_clone_with_description' => '<p>新しい <code>clone()</code> 構文でオブジェクトを clone してプロパティを更新します。<code>readonly</code> クラスの "with-er" パターンが簡潔になります。</p>',
    'features_uri_extension_title' => 'URI 拡張モジュール',
    'features_uri_extension_description' => '<p>URL のパース、正規化、処理を行う新しい組み込みの URI 拡張モジュールが PHP 8.5 で追加されました。</p>',
    'features_no_discard_title' => '#[\NoDiscard] アトリビュート',
    'features_no_discard_description' => '<p><code>#[\NoDiscard]</code> アトリビュートを使うと、戻り値が利用されていない場合に警告を出します。ミスを防ぎ全体の API 安全性を向上するのに役立ちます。</p>',
    'features_fcc_in_const_expr_title' => '定数式でのクロージャと第一級 callable',
    'features_fcc_in_const_expr_description' => '<p>static なクロージャと第一級 callable が、アトリビュートの引数などの定数式で使えるようになります。</p>',

    'pipe_operator_title' => 'パイプ演算子',
    'pipe_operator_description' => '<p>パイプ演算子を使うと、中間変数を扱うことなく複数の関数呼び出しを繋げることができます。これによってたくさんの「入れ子呼び出し」を置き換え、中から外ではなく先に向かって読むことができるようになります。</p><p>この機能の背景について詳しくは <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">PHP Foundation のブログ</a>をお読みください。</p>',

    'array_first_last_title' => 'array_first() ・ array_last() 関数',
    'array_first_last_description' => '<p><code>array_first()</code>、<code>array_last()</code> 関数は、それぞれ配列の最初と最後の値を返します。空配列の場合は <code>null</code> を返します（そのため <code>??</code> 演算子と組み合わせやすいです）。</p>',

    'clone_with_title' => 'Clone With',
    'clone_with_description' => '<p><code>clone()</code> 関数に連想配列を渡すことで、オブジェクトのクローン時にプロパティを更新することができるようになります。これによって、<code>readonly</code> クラスの "with-er" パターンを簡単に実装することができるようになります。</p>',

    'uri_extension_title' => 'URI 拡張モジュール',
    'uri_extension_description' => '<p>常に有効な新しい URI 拡張モジュールは、RFC 3986 と WHATWG URL 標準にしたがって URI や URL を安全にパース・編集できる API を提供します。</p><p><a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) と <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL) ライブラリを利用しています。</p><p>この機能の背景は <a href="https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/" target="_blank" rel="noopener noreferrer">PHP Foundation のブログ</a>をお読みください。</p>',

    'no_discard_title' => '#[\NoDiscard] アトリビュート',
    'no_discard_description' => '<p><code>#[\NoDiscard]</code> アトリビュートを関数に追加すると、戻り値が利用されたかを PHP がチェックし、されていなければ警告を出します。これにより、戻り値が重要なのにそれを利用することをうっかり忘れやすい API の安全性を高めることができます。</p><p>関連する <code>(void)</code> キャストを使うと、戻り値を使っていないのが意図的であることを明示できます。</p>',

    'persistent_curl_share_handles_title' => '持続的な cURL 共有ハンドル',
    'persistent_curl_share_handles_description' => '<p><code>curl_share_init()</code> と違い、<code>curl_share_init_persistent()</code> で作られたハンドルは PHP のリクエスト終了時に破棄されません。もし同じオプションが設定された持続的な共有ハンドルが存在すればそれが再利用されるため、cURL ハンドルを毎回初期化するコストを避けることができます。</p>',

    'fcc_in_const_expr_title' => '定数式でのクロージャと第一級 callable',
    'fcc_in_const_expr_description' => '<p>static なクロージャと第一級 callable が定数式で利用できるようになります。これはアトリビュートの引数、プロパティやパラメータのデフォルト値、定数を含みます。</p>',

    'new_classes_title' => 'その他の新機能・改善',
    'fatal_error_backtrace' => 'Fatal エラー（実行時間の最大値の超過など）にバックトレースが含まれるようになります。',
    'const_attribute_target' => 'アトリビュートが定数を対象にすることができるようになります。',
    'override_attr_properties' => '{0} アトリビュートをプロパティに適用できるようになります。',
    'deprecated_traits_constants' => '{0} アトリビュートをトレイトと定数に使用できるようになります。',
    'asymmetric_static_properties' => 'static プロパティで非対称可視性を利用できるようになります。',
    'final_promoted_properties' => 'コンストラクタのプロモーションで、プロパティを <code>final</code> にすることができるようになります。',
    'closure_getCurrent' => '無名関数の再帰を簡単に行うための <code>Closure::getCurrent()</code> メソッドが追加されました。',
    'partitioned_cookies' => '関数 {0} と {1} で "partitioned" キーが利用できます。',
    'get_set_error_handler' => '{0} と {1} 関数が追加されました。',
    'new_dom_element_methods' => '{0} と {1} メソッドが追加されました。',
    'grapheme_levenshtein' => '{0} 関数が追加されました。',
    'delayed_target_validation' => 'PHP コアと拡張モジュールのアトリビュートを不正なターゲットに利用したときに発生するコンパイル時エラーを抑制する {0} アトリビュートが追加されました。',

    'bc_title' => '推奨されなくなる機能・下位互換性のない変更',
    'bc_backtick_operator' => '{0} のエイリアスとして使われているバッククォート演算子は非推奨になりました。',
    'bc_non_canonical_cast_names' => '正規化されていない型名 <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code>, <code>(binary)</code> でのキャストは非推奨になりました。 代わりにそれぞれ <code>(bool)</code>, <code>(int)</code>, <code>(float)</code>, <code>(string)</code> を使ってください。',
    'bc_disable_classes' => 'さまざまな PHP エンジンの想定を壊してしまうため、{0} INI ディレクティブは削除されました。',
    'bc_semicolon_after_case' => '<code>case</code> 文の末尾にコロンではなくセミコロンを使うことは非推奨になりました。',
    'bc_null_array_offset' => '配列のオフセットや {0} の引数に <code>null</code> を使うことは推奨されなくなりました。代わりに空文字列を使ってください。',
    'bc_class_alias_names' => '{0} でクラス名のエイリアスに "array" と "callable" を使うことはできなくなりました。',
    'bc_sleep_wakeup' => 'マジックメソッド {0} と {1} は soft-deprecated になりました。代わりに {2} と {3} を使ってください。',
    'bc_casting_nan' => '{0} を他の型にキャストすると警告が出るようになりました。',
    'bc_non_array_destructuring' => '配列ではない値（<code>null</code> を除く）を {0} や {1} で分解すると警告が出るようになりました。',
    'bc_casting_non_int_floats' => 'float（または数値形式の文字列）を <code>int</code> にキャストする際、その値を <code>int</code> として表現できない場合に警告が出るようになりました。',

    'footer_title' => 'より良い構文、進化したパフォーマンスと型安全性。',
    'footer_description' => '<p class="first-paragraph">変更点の完全な一覧は<a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>をご覧ください。</p><p>新機能や下位互換性のない変更の詳細については <a href="/manual/ja/migration85.php" target="_blank">移行ガイド</a> を参照してください。</p>',
];
