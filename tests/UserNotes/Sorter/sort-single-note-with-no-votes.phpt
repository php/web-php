--TEST--
sort a single note with no votes
--INI--
precision=-1
--FILE--
<?php
require_once __DIR__ . "/../../../autoload.php";

$notes = [
    [
        "votes" => ["up" => 0, "down" => 0],
        "xwhen" => 1613487094,
    ],
];

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
array(1) {
  [0]=>
  array(7) {
    ["ts"]=>
    int(1613487094)
    ["upvotes"]=>
    int(0)
    ["downvotes"]=>
    int(0)
    ["score"]=>
    int(0)
    ["total"]=>
    int(0)
    ["rating"]=>
    float(0.5)
    ["sort"]=>
    float(41.4)
  }
}
