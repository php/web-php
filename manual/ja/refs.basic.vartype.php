<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/funcref.inc";
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
    0 => 'refs.basic.vartype.php',
    1 => '変数・データ型関連',
  ),
  'up' => 
  array (
    0 => 'funcref.php',
    1 => '関数リファレンス',
  ),
  'prev' => 
  array (
    0 => 'changelog.strings.php',
    1 => '変更履歴',
  ),
  'next' => 
  array (
    0 => 'book.array.php',
    1 => '配列',
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/refs.basic.vartype.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="refs.basic.vartype" class="set">
   <h1 class="title">変数・データ型関連</h1>
   









   








   








   









   








   









   










   








   








   









  <ul class="chunklist chunklist_set"><li><a href="book.array.php">配列</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.array.php">導入</a></li><li><a href="array.setup.php">インストール/設定</a></li><li><a href="array.constants.php">定義済み定数</a></li><li><a href="array.sorting.php">配列のソート</a></li><li><a href="ref.array.php">配列 関数</a></li></ul></li><li><a href="book.classobj.php">クラス/オブジェクト</a> — クラス/オブジェクトの情報<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.classobj.php">導入</a></li><li><a href="classobj.setup.php">インストール/設定</a></li><li><a href="classobj.constants.php">定義済み定数</a></li><li><a href="classobj.examples.php">例</a></li><li><a href="ref.classobj.php">クラス/オブジェクト関数</a></li></ul></li><li><a href="book.classkit.php">Classkit</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.classkit.php">導入</a></li><li><a href="classkit.setup.php">インストール/設定</a></li><li><a href="classkit.constants.php">定義済み定数</a></li><li><a href="ref.classkit.php">Classkit 関数</a></li></ul></li><li><a href="book.ctype.php">Ctype</a> — 文字タイプチェック<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.ctype.php">導入</a></li><li><a href="ctype.setup.php">インストール/設定</a></li><li><a href="ctype.constants.php">定義済み定数</a></li><li><a href="ref.ctype.php">Ctype 関数</a></li></ul></li><li><a href="book.filter.php">Filter</a> — データのフィルタリング<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.filter.php">導入</a></li><li><a href="filter.setup.php">インストール/設定</a></li><li><a href="filter.filters.php">フィルタの型</a></li><li><a href="filter.constants.php">定義済み定数</a></li><li><a href="filter.examples.php">例</a></li><li><a href="ref.filter.php">Filter 関数</a></li></ul></li><li><a href="book.funchand.php">関数処理</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.funchand.php">導入</a></li><li><a href="funchand.setup.php">インストール/設定</a></li><li><a href="funchand.constants.php">定義済み定数</a></li><li><a href="ref.funchand.php">関数処理 関数</a></li></ul></li><li><a href="book.objaggregation.php">Object Aggregation</a> — オブジェクトの集約/合成 [PHP 4]<ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.objaggregation.php">導入</a></li><li><a href="objaggregation.examples.php">例</a></li><li><a href="ref.objaggregation.php">オブジェクトの集約関数</a></li></ul></li><li><a href="book.quickhash.php">Quickhash</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.quickhash.php">導入</a></li><li><a href="quickhash.setup.php">インストール/設定</a></li><li><a href="quickhash.constants.php">定義済み定数</a></li><li><a href="quickhash.examples.php">例</a></li><li><a href="class.quickhashintset.php">QuickHashIntSet</a> — QuickHashIntSet クラス</li><li><a href="class.quickhashinthash.php">QuickHashIntHash</a> — QuickHashIntHash クラス</li><li><a href="class.quickhashstringinthash.php">QuickHashStringIntHash</a> — QuickHashStringIntHash クラス</li><li><a href="class.quickhashintstringhash.php">QuickHashIntStringHash</a> — QuickHashIntStringHash クラス</li></ul></li><li><a href="book.reflection.php">リフレクション</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.reflection.php">導入</a></li><li><a href="reflection.setup.php">インストール/設定</a></li><li><a href="reflection.constants.php">定義済み定数</a></li><li><a href="reflection.examples.php">例</a></li><li><a href="reflection.extending.php">拡張</a></li><li><a href="class.reflection.php">Reflection</a> — Reflection クラス</li><li><a href="class.reflectionclass.php">ReflectionClass</a> — ReflectionClass クラス</li><li><a href="class.reflectionzendextension.php">ReflectionZendExtension</a> — ReflectionZendExtension クラス</li><li><a href="class.reflectionextension.php">ReflectionExtension</a> — ReflectionExtension クラス</li><li><a href="class.reflectionfunction.php">ReflectionFunction</a> — ReflectionFunction クラス</li><li><a href="class.reflectionfunctionabstract.php">ReflectionFunctionAbstract</a> — ReflectionFunctionAbstract クラス</li><li><a href="class.reflectionmethod.php">ReflectionMethod</a> — ReflectionMethod クラス</li><li><a href="class.reflectionobject.php">ReflectionObject</a> — ReflectionObject クラス</li><li><a href="class.reflectionparameter.php">ReflectionParameter</a> — ReflectionParameter クラス</li><li><a href="class.reflectionproperty.php">ReflectionProperty</a> — ReflectionProperty クラス</li><li><a href="class.reflector.php">Reflector</a> — Reflector インターフェイス</li><li><a href="class.reflectionexception.php">ReflectionException</a> — ReflectionException クラス</li></ul></li><li><a href="book.var.php">変数操作</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="intro.var.php">導入</a></li><li><a href="var.setup.php">インストール/設定</a></li><li><a href="var.constants.php">定義済み定数</a></li><li><a href="ref.var.php">変数操作 関数</a></li></ul></li></ul></div><?php manual_footer(); ?>