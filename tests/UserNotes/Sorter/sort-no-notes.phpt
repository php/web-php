--TEST--
sort no notes
--INI--
precision=-1
--FILE--
<?php

use phpweb\UserNotes\Sorter;
use phpweb\UserNotes\UserNote;

require_once __DIR__ . "/../../../src/autoload.php";

$notes = [];

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
array(0) {
}
