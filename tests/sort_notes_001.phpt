--TEST--
sort some notes
--FILE--
<?php
require_once __DIR__ . "/../src/UserNotes/Sorter.php";

$notes = [
    [
        "votes" => ["up" => 0, "down" => 2],
        "xwhen" => 1613487094,
    ], [
        "votes" => ["up" => 0, "down" => 0],
        "xwhen" => 1508180150,
    ], [
        "votes" => ["up" => 14, "down" => 3],
        "xwhen" => 1508179844,
    ], [
        "votes" => ["up" => 14, "down" => 3],
        "xwhen" => 1508179844,
    ],
];

$sorter = new phpweb\UserNotes\Sorter();
$sorter->sort($notes);
var_dump(array_map(function (array $note) {
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
array(4) {
  [2]=>
  array(7) {
    ["ts"]=>
    int(1508179844)
    ["upvotes"]=>
    int(14)
    ["downvotes"]=>
    int(3)
    ["score"]=>
    int(11)
    ["total"]=>
    int(17)
    ["rating"]=>
    float(0.82352941176471)
    ["sort"]=>
    float(87.411764705882)
  }
  [3]=>
  array(7) {
    ["ts"]=>
    int(1508179844)
    ["upvotes"]=>
    int(14)
    ["downvotes"]=>
    int(3)
    ["score"]=>
    int(11)
    ["total"]=>
    int(17)
    ["rating"]=>
    float(0.82352941176471)
    ["sort"]=>
    float(87.411764705882)
  }
  [1]=>
  array(7) {
    ["ts"]=>
    int(1508180150)
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
    float(45.492313503873)
  }
  [0]=>
  array(7) {
    ["ts"]=>
    int(1613487094)
    ["upvotes"]=>
    int(0)
    ["downvotes"]=>
    int(2)
    ["score"]=>
    int(-2)
    ["total"]=>
    int(2)
    ["rating"]=>
    int(0)
    ["sort"]=>
    float(43.4)
  }
}
