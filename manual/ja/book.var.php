<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/refs.basic.vartype.inc";
$setup = array (
  'home' => 
  array (
    0 => 'index.php',
    1 => 'PHP Manual',
  ),
  'head' => 
  array (
    0 => 'UTF-8',
    1 => 'ja',
  ),
  'this' => 
  array (
    0 => 'book.var.php',
    1 => '変数操作',
  ),
  'up' => 
  array (
    0 => 'refs.basic.vartype.php',
    1 => '変数・データ型関連',
  ),
  'prev' => 
  array (
    0 => 'class.reflectionexception.php',
    1 => 'ReflectionException',
  ),
  'next' => 
  array (
    0 => 'intro.var.php',
    1 => '導入',
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/book.var.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="book.var" class="book">
 
 <h1 class="title">変数操作</h1>

 

 









 









 










<ul class="chunklist chunklist_book"><li><a href="intro.var.php">導入</a></li><li><a href="var.setup.php">インストール/設定</a><ul class="chunklist chunklist_book chunklist_children"><li><a href="var.requirements.php">要件</a></li><li><a href="var.installation.php">インストール手順</a></li><li><a href="var.configuration.php">実行時設定</a></li><li><a href="var.resources.php">リソース型</a></li></ul></li><li><a href="var.constants.php">定義済み定数</a></li><li><a href="ref.var.php">変数操作 関数</a><ul class="chunklist chunklist_book chunklist_children"><li><a href="function.boolval.php">boolval</a> — 変数の boolean としての値を取得する</li><li><a href="function.debug-zval-dump.php">debug_zval_dump</a> — 内部的な Zend の値を表す文字列をダンプする</li><li><a href="function.doubleval.php">doubleval</a> — floatval のエイリアス</li><li><a href="function.empty.php">empty</a> — 変数が空であるかどうかを検査する</li><li><a href="function.floatval.php">floatval</a> — 変数の float 値を取得する</li><li><a href="function.get-defined-vars.php">get_defined_vars</a> — 全ての定義済の変数を配列で返す</li><li><a href="function.get-resource-type.php">get_resource_type</a> — リソース型を返す</li><li><a href="function.gettype.php">gettype</a> — 変数の型を取得する</li><li><a href="function.import-request-variables.php">import_request_variables</a> — GET/POST/Cookie 変数をグローバルスコープにインポートする</li><li><a href="function.intval.php">intval</a> — 変数の整数としての値を取得する</li><li><a href="function.is-array.php">is_array</a> — 変数が配列かどうかを検査する</li><li><a href="function.is-bool.php">is_bool</a> — 変数が boolean であるかを調べる</li><li><a href="function.is-callable.php">is_callable</a> — 引数が、関数としてコール可能な構造であるかどうかを調べる</li><li><a href="function.is-double.php">is_double</a> — is_float のエイリアス</li><li><a href="function.is-float.php">is_float</a> — 変数の型が float かどうか調べる</li><li><a href="function.is-int.php">is_int</a> — 変数が整数型かどうかを検査する</li><li><a href="function.is-integer.php">is_integer</a> — is_int のエイリアス</li><li><a href="function.is-long.php">is_long</a> — is_int のエイリアス</li><li><a href="function.is-null.php">is_null</a> — 変数が NULL かどうか調べる</li><li><a href="function.is-numeric.php">is_numeric</a> — 変数が数字または数値形式の文字列であるかを調べる</li><li><a href="function.is-object.php">is_object</a> — 変数がオブジェクトかどうかを検査する</li><li><a href="function.is-real.php">is_real</a> — is_float のエイリアス</li><li><a href="function.is-resource.php">is_resource</a> — 変数がリソースかどうかを調べる</li><li><a href="function.is-scalar.php">is_scalar</a> — 変数がスカラかどうかを調べる</li><li><a href="function.is-string.php">is_string</a> — 変数の型が文字列かどうかを調べる</li><li><a href="function.isset.php">isset</a> — 変数がセットされていること、そして NULL でないことを検査する</li><li><a href="function.print-r.php">print_r</a> — 指定した変数に関する情報を解りやすく出力する</li><li><a href="function.serialize.php">serialize</a> — 値の保存可能な表現を生成する</li><li><a href="function.settype.php">settype</a> — 変数の型をセットする</li><li><a href="function.strval.php">strval</a> — 変数の文字列としての値を取得する</li><li><a href="function.unserialize.php">unserialize</a> — 保存用表現から PHP の値を生成する</li><li><a href="function.unset.php">unset</a> — 指定した変数の割当を解除する</li><li><a href="function.var-dump.php">var_dump</a> — 変数に関する情報をダンプする</li><li><a href="function.var-export.php">var_export</a> — 変数の文字列表現を出力または返す</li></ul></li></ul></div><?php manual_footer(); ?>