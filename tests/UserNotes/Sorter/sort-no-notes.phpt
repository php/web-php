--TEST--
sort no notes
--INI--
precision=-1
--FILE--
<?php
require_once __DIR__ . "/../../../autoload.php";

$notes = [];

$sorter = new phpweb\UserNotes\Sorter();
$sorter->sort($notes);
var_dump(array_map(function (array $note): array {
    return [
        "ts" => $note["xwhen"],
        "upvotes" => $note["votes"]["up"],
        "downvotes" => $note["votes"]["down"],
        "score" => $note["score"],
        "total" => $note["total"],
        "rating" => $note["rating"],
        "sort" => $note["sort"],
    ];
}, $notes));
?>
--EXPECT--
array(0) {
}
