--TEST--
sort a single note with no votes
--INI--
precision=-1
--FILE--
<?php

use phpweb\UserNotes\Sorter;
use phpweb\UserNotes\UserNote;

require_once __DIR__ . "/../../../src/autoload.php";

$notes = [
    new UserNote('1', '', '', '1613487094', '', '', 0, 0),
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
array(1) {
  [0]=>
  array(4) {
    ["id"]=>
    string(1) "1"
    ["ts"]=>
    string(10) "1613487094"
    ["upvotes"]=>
    int(0)
    ["downvotes"]=>
    int(0)
  }
}
