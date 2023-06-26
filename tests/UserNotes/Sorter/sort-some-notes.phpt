--TEST--
sort some notes
--INI--
precision=-1
--FILE--
<?php

use phpweb\UserNotes\Sorter;
use phpweb\UserNotes\UserNote;

require_once __DIR__ . "/../../../src/autoload.php";

$notes = [
    new UserNote('1', '', '', '1613487094', '', '', 0, 2),
    new UserNote('2', '', '', '1508180150', '', '', 0, 0),
    new UserNote('3', '', '', '1508179844', '', '', 14, 3),
    new UserNote('4', '', '', '1508179844', '', '', 14, 3),
];

$sorter = new Sorter();
$sorter->sort($notes);
var_dump(array_map(function (UserNote $note): array {
    return [
        "id" => $note->id,
        "ts" => $note->ts,
        "upvotes" => $note->upvotes,
        "downvotes" => $note->downvotes,
    ];
}, $notes));
?>
--EXPECT--
array(4) {
  [2]=>
  array(4) {
    ["id"]=>
    string(1) "3"
    ["ts"]=>
    string(10) "1508179844"
    ["upvotes"]=>
    int(14)
    ["downvotes"]=>
    int(3)
  }
  [3]=>
  array(4) {
    ["id"]=>
    string(1) "4"
    ["ts"]=>
    string(10) "1508179844"
    ["upvotes"]=>
    int(14)
    ["downvotes"]=>
    int(3)
  }
  [1]=>
  array(4) {
    ["id"]=>
    string(1) "2"
    ["ts"]=>
    string(10) "1508180150"
    ["upvotes"]=>
    int(0)
    ["downvotes"]=>
    int(0)
  }
  [0]=>
  array(4) {
    ["id"]=>
    string(1) "1"
    ["ts"]=>
    string(10) "1613487094"
    ["upvotes"]=>
    int(0)
    ["downvotes"]=>
    int(2)
  }
}
