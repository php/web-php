--TEST--
sort sample notes from strpos notes
--INI--
precision=-1
--FILE--
<?php

use phpweb\UserNotes\Sorter;
use phpweb\UserNotes\UserNote;

require_once __DIR__ . "/../../../src/autoload.php";

$file = file(__DIR__ . "/../../../backend/notes/d7/d7742c269d23ea86");
$notes = [];
foreach ($file as $line) {
    @list($id, $sect, $rate, $ts, $user, $note, $up, $down) = explode("|", $line);
    $notes[$id] = new UserNote($id, $sect, $rate, $ts, $user, base64_decode($note, true), (int) $up, (int) $down);
}

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
array(46) {
  [110464]=>
  array(4) {
    ["id"]=>
    string(6) "110464"
    ["ts"]=>
    string(10) "1351105628"
    ["upvotes"]=>
    int(10)
    ["downvotes"]=>
    int(2)
  }
  [93816]=>
  array(4) {
    ["id"]=>
    string(5) "93816"
    ["ts"]=>
    string(10) "1254343074"
    ["upvotes"]=>
    int(4)
    ["downvotes"]=>
    int(1)
  }
  [92849]=>
  array(4) {
    ["id"]=>
    string(5) "92849"
    ["ts"]=>
    string(10) "1249997359"
    ["upvotes"]=>
    int(4)
    ["downvotes"]=>
    int(1)
  }
  [70394]=>
  array(4) {
    ["id"]=>
    string(5) "70394"
    ["ts"]=>
    string(10) "1160823504"
    ["upvotes"]=>
    int(7)
    ["downvotes"]=>
    int(3)
  }
  [106407]=>
  array(4) {
    ["id"]=>
    string(6) "106407"
    ["ts"]=>
    string(10) "1320695958"
    ["upvotes"]=>
    int(5)
    ["downvotes"]=>
    int(2)
  }
  [87868]=>
  array(4) {
    ["id"]=>
    string(5) "87868"
    ["ts"]=>
    string(10) "1230396484"
    ["upvotes"]=>
    int(5)
    ["downvotes"]=>
    int(2)
  }
  [82229]=>
  array(4) {
    ["id"]=>
    string(5) "82229"
    ["ts"]=>
    string(10) "1207066654"
    ["upvotes"]=>
    int(3)
    ["downvotes"]=>
    int(1)
  }
  [80363]=>
  array(4) {
    ["id"]=>
    string(5) "80363"
    ["ts"]=>
    string(10) "1200066332"
    ["upvotes"]=>
    int(3)
    ["downvotes"]=>
    int(1)
  }
  [75146]=>
  array(4) {
    ["id"]=>
    string(5) "75146"
    ["ts"]=>
    string(10) "1179195708"
    ["upvotes"]=>
    int(3)
    ["downvotes"]=>
    int(1)
  }
  [102773]=>
  array(4) {
    ["id"]=>
    string(6) "102773"
    ["ts"]=>
    string(10) "1299300266"
    ["upvotes"]=>
    int(6)
    ["downvotes"]=>
    int(3)
  }
  [111422]=>
  array(4) {
    ["id"]=>
    string(6) "111422"
    ["ts"]=>
    string(10) "1361224553"
    ["upvotes"]=>
    int(4)
    ["downvotes"]=>
    int(2)
  }
  [94469]=>
  array(4) {
    ["id"]=>
    string(5) "94469"
    ["ts"]=>
    string(10) "1257516214"
    ["upvotes"]=>
    int(4)
    ["downvotes"]=>
    int(2)
  }
  [99476]=>
  array(4) {
    ["id"]=>
    string(5) "99476"
    ["ts"]=>
    string(10) "1282186230"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [99332]=>
  array(4) {
    ["id"]=>
    string(5) "99332"
    ["ts"]=>
    string(10) "1281503061"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [96926]=>
  array(4) {
    ["id"]=>
    string(5) "96926"
    ["ts"]=>
    string(10) "1269330508"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [93887]=>
  array(4) {
    ["id"]=>
    string(5) "93887"
    ["ts"]=>
    string(10) "1254733546"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [87061]=>
  array(4) {
    ["id"]=>
    string(5) "87061"
    ["ts"]=>
    string(10) "1226944352"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [85835]=>
  array(4) {
    ["id"]=>
    string(5) "85835"
    ["ts"]=>
    string(10) "1221823065"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [72466]=>
  array(4) {
    ["id"]=>
    string(5) "72466"
    ["ts"]=>
    string(10) "1169208947"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [69927]=>
  array(4) {
    ["id"]=>
    string(5) "69927"
    ["ts"]=>
    string(10) "1159299208"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [41762]=>
  array(4) {
    ["id"]=>
    string(5) "41762"
    ["ts"]=>
    string(10) "1082561916"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(1)
  }
  [107678]=>
  array(4) {
    ["id"]=>
    string(6) "107678"
    ["ts"]=>
    string(10) "1330185500"
    ["upvotes"]=>
    int(3)
    ["downvotes"]=>
    int(2)
  }
  [89788]=>
  array(4) {
    ["id"]=>
    string(5) "89788"
    ["ts"]=>
    string(10) "1237801686"
    ["upvotes"]=>
    int(3)
    ["downvotes"]=>
    int(2)
  }
  [74286]=>
  array(4) {
    ["id"]=>
    string(5) "74286"
    ["ts"]=>
    string(10) "1175594279"
    ["upvotes"]=>
    int(3)
    ["downvotes"]=>
    int(2)
  }
  [58688]=>
  array(4) {
    ["id"]=>
    string(5) "58688"
    ["ts"]=>
    string(10) "1131719326"
    ["upvotes"]=>
    int(3)
    ["downvotes"]=>
    int(2)
  }
  [45088]=>
  array(4) {
    ["id"]=>
    string(5) "45088"
    ["ts"]=>
    string(10) "1093449145"
    ["upvotes"]=>
    int(3)
    ["downvotes"]=>
    int(2)
  }
  [49739]=>
  array(4) {
    ["id"]=>
    string(5) "49739"
    ["ts"]=>
    string(10) "1107758025"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(0)
  }
  [108426]=>
  array(4) {
    ["id"]=>
    string(6) "108426"
    ["ts"]=>
    string(10) "1335372412"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(2)
  }
  [107240]=>
  array(4) {
    ["id"]=>
    string(6) "107240"
    ["ts"]=>
    string(10) "1327390683"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(2)
  }
  [105984]=>
  array(4) {
    ["id"]=>
    string(6) "105984"
    ["ts"]=>
    string(10) "1317340435"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(2)
  }
  [99440]=>
  array(4) {
    ["id"]=>
    string(5) "99440"
    ["ts"]=>
    string(10) "1282058725"
    ["upvotes"]=>
    int(4)
    ["downvotes"]=>
    int(4)
  }
  [93566]=>
  array(4) {
    ["id"]=>
    string(5) "93566"
    ["ts"]=>
    string(10) "1253094436"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(2)
  }
  [88798]=>
  array(4) {
    ["id"]=>
    string(5) "88798"
    ["ts"]=>
    string(10) "1234090865"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(1)
  }
  [84910]=>
  array(4) {
    ["id"]=>
    string(5) "84910"
    ["ts"]=>
    string(10) "1217938595"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(2)
  }
  [83914]=>
  array(4) {
    ["id"]=>
    string(5) "83914"
    ["ts"]=>
    string(10) "1213760931"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(1)
  }
  [78483]=>
  array(4) {
    ["id"]=>
    string(5) "78483"
    ["ts"]=>
    string(10) "1192337362"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(1)
  }
  [74763]=>
  array(4) {
    ["id"]=>
    string(5) "74763"
    ["ts"]=>
    string(10) "1177577911"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(1)
  }
  [74432]=>
  array(4) {
    ["id"]=>
    string(5) "74432"
    ["ts"]=>
    string(10) "1176269720"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(1)
  }
  [47879]=>
  array(4) {
    ["id"]=>
    string(5) "47879"
    ["ts"]=>
    string(10) "1102066114"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(1)
  }
  [40617]=>
  array(4) {
    ["id"]=>
    string(5) "40617"
    ["ts"]=>
    string(10) "1078853206"
    ["upvotes"]=>
    int(0)
    ["downvotes"]=>
    int(0)
  }
  [38375]=>
  array(4) {
    ["id"]=>
    string(5) "38375"
    ["ts"]=>
    string(10) "1071743640"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(1)
  }
  [106295]=>
  array(4) {
    ["id"]=>
    string(6) "106295"
    ["ts"]=>
    string(10) "1319574977"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(3)
  }
  [95875]=>
  array(4) {
    ["id"]=>
    string(5) "95875"
    ["ts"]=>
    string(10) "1264517173"
    ["upvotes"]=>
    int(2)
    ["downvotes"]=>
    int(3)
  }
  [102336]=>
  array(4) {
    ["id"]=>
    string(6) "102336"
    ["ts"]=>
    string(10) "1297217360"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(2)
  }
  [93781]=>
  array(4) {
    ["id"]=>
    string(5) "93781"
    ["ts"]=>
    string(10) "1254189367"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(2)
  }
  [90065]=>
  array(4) {
    ["id"]=>
    string(5) "90065"
    ["ts"]=>
    string(10) "1238827503"
    ["upvotes"]=>
    int(1)
    ["downvotes"]=>
    int(2)
  }
}

