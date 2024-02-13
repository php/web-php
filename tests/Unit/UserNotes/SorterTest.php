<?php

declare(strict_types=1);

namespace phpweb\Test\Unit\UserNotes;

use PHPUnit\Framework;
use phpweb\UserNotes\Sorter;
use phpweb\UserNotes\UserNote;

#[Framework\Attributes\CoversClass(Sorter::class)]
#[Framework\Attributes\UsesClass(UserNote::class)]
final class SorterTest extends Framework\TestCase
{
    public function testSortSortsNotesWhenNotesAreEmpty(): void
    {
        $notes = [];

        $sorter = new Sorter();

        $sorter->sort($notes);

        self::assertSame([], $notes);
    }

    public function testSortSortsSingleNoteWithNoVotes(): void
    {
        $notes = [
            new UserNote('1', '', '', '1613487094', '', '', 0, 0),
        ];

        $sorter = new Sorter();

        $sorter->sort($notes);

        $normalized = array_map(static function (UserNote $note): array {
            return self::normalize($note);
        }, $notes);

        $expected = [
            0 => [
                'downvotes' => 0,
                'id' => '1',
                'ts' => '1613487094',
                'upvotes' => 0,
            ],
        ];

        self::assertSame($expected, $normalized);
    }

    public function testSortSortsSomeNotes(): void
    {
        $notes = [
            new UserNote('1', '', '', '1613487094', '', '', 0, 2),
            new UserNote('2', '', '', '1508180150', '', '', 0, 0),
            new UserNote('3', '', '', '1508179844', '', '', 14, 3),
            new UserNote('4', '', '', '1508179844', '', '', 14, 3),
        ];

        $sorter = new Sorter();

        $sorter->sort($notes);

        $normalized = array_map(static function (UserNote $note): array {
            return self::normalize($note);
        }, $notes);

        $expected = [
            2 => [
                'downvotes' => 3,
                'id' => '3',
                'ts' => '1508179844',
                'upvotes' => 14,
            ],
            3 => [
                'downvotes' => 3,
                'id' => '4',
                'ts' => '1508179844',
                'upvotes' => 14,
            ],
            1 => [
                'downvotes' => 0,
                'id' => '2',
                'ts' => '1508180150',
                'upvotes' => 0,
            ],
            0 => [
                'downvotes' => 2,
                'id' => '1',
                'ts' => '1613487094',
                'upvotes' => 0,
            ],
        ];

        self::assertSame($expected, $normalized);
    }

    public function testSortSortsFullNotes(): void
    {
        $file = file(__DIR__ . '/../../../backend/notes/d7/d7742c269d23ea86');

        $notes = [];

        foreach ($file as $line) {
            @list($id, $sect, $rate, $ts, $user, $note, $up, $down) = explode('|', $line);
            $notes[$id] = new UserNote($id, $sect, $rate, $ts, $user, base64_decode($note, true), (int) $up, (int) $down);
        }

        $sorter = new Sorter();

        $sorter->sort($notes);

        $normalized = array_map(static function (UserNote $note): array {
            return self::normalize($note);
        }, $notes);

        $expected = [
            110464 => [
                'downvotes' => 2,
                'id' => '110464',
                'ts' => '1351105628',
                'upvotes' => 10,
            ],
            93816 => [
                'downvotes' => 1,
                'id' => '93816',
                'ts' => '1254343074',
                'upvotes' => 4,
            ],
            92849 => [
                'downvotes' => 1,
                'id' => '92849',
                'ts' => '1249997359',
                'upvotes' => 4,
            ],
            70394 => [
                'downvotes' => 3,
                'id' => '70394',
                'ts' => '1160823504',
                'upvotes' => 7,
            ],
            106407 => [
                'downvotes' => 2,
                'id' => '106407',
                'ts' => '1320695958',
                'upvotes' => 5,
            ],
            87868 => [
                'downvotes' => 2,
                'id' => '87868',
                'ts' => '1230396484',
                'upvotes' => 5,
            ],
            82229 => [
                'downvotes' => 1,
                'id' => '82229',
                'ts' => '1207066654',
                'upvotes' => 3,
            ],
            80363 => [
                'downvotes' => 1,
                'id' => '80363',
                'ts' => '1200066332',
                'upvotes' => 3,
            ],
            75146 => [
                'downvotes' => 1,
                'id' => '75146',
                'ts' => '1179195708',
                'upvotes' => 3,
            ],
            102773 => [
                'downvotes' => 3,
                'id' => '102773',
                'ts' => '1299300266',
                'upvotes' => 6,
            ],
            111422 => [
                'downvotes' => 2,
                'id' => '111422',
                'ts' => '1361224553',
                'upvotes' => 4,
            ],
            94469 => [
                'downvotes' => 2,
                'id' => '94469',
                'ts' => '1257516214',
                'upvotes' => 4,
            ],
            99476 => [
                'downvotes' => 1,
                'id' => '99476',
                'ts' => '1282186230',
                'upvotes' => 2,
            ],
            99332 => [
                'downvotes' => 1,
                'id' => '99332',
                'ts' => '1281503061',
                'upvotes' => 2,
            ],
            96926 => [
                'downvotes' => 1,
                'id' => '96926',
                'ts' => '1269330508',
                'upvotes' => 2,
            ],
            93887 => [
                'downvotes' => 1,
                'id' => '93887',
                'ts' => '1254733546',
                'upvotes' => 2,
            ],
            87061 => [
                'downvotes' => 1,
                'id' => '87061',
                'ts' => '1226944352',
                'upvotes' => 2,
            ],
            85835 => [
                'downvotes' => 1,
                'id' => '85835',
                'ts' => '1221823065',
                'upvotes' => 2,
            ],
            72466 => [
                'downvotes' => 1,
                'id' => '72466',
                'ts' => '1169208947',
                'upvotes' => 2,
            ],
            69927 => [
                'downvotes' => 1,
                'id' => '69927',
                'ts' => '1159299208',
                'upvotes' => 2,
            ],
            41762 => [
                'downvotes' => 1,
                'id' => '41762',
                'ts' => '1082561916',
                'upvotes' => 2,
            ],
            107678 => [
                'downvotes' => 2,
                'id' => '107678',
                'ts' => '1330185500',
                'upvotes' => 3,
            ],
            89788 => [
                'downvotes' => 2,
                'id' => '89788',
                'ts' => '1237801686',
                'upvotes' => 3,
            ],
            74286 => [
                'downvotes' => 2,
                'id' => '74286',
                'ts' => '1175594279',
                'upvotes' => 3,
            ],
            58688 => [
                'downvotes' => 2,
                'id' => '58688',
                'ts' => '1131719326',
                'upvotes' => 3,
            ],
            45088 => [
                'downvotes' => 2,
                'id' => '45088',
                'ts' => '1093449145',
                'upvotes' => 3,
            ],
            49739 => [
                'downvotes' => 0,
                'id' => '49739',
                'ts' => '1107758025',
                'upvotes' => 2,
            ],
            108426 => [
                'downvotes' => 2,
                'id' => '108426',
                'ts' => '1335372412',
                'upvotes' => 2,
            ],
            107240 => [
                'downvotes' => 2,
                'id' => '107240',
                'ts' => '1327390683',
                'upvotes' => 2,
            ],
            105984 => [
                'downvotes' => 2,
                'id' => '105984',
                'ts' => '1317340435',
                'upvotes' => 2,
            ],
            99440 => [
                'downvotes' => 4,
                'id' => '99440',
                'ts' => '1282058725',
                'upvotes' => 4,
            ],
            93566 => [
                'downvotes' => 2,
                'id' => '93566',
                'ts' => '1253094436',
                'upvotes' => 2,
            ],
            88798 => [
                'downvotes' => 1,
                'id' => '88798',
                'ts' => '1234090865',
                'upvotes' => 1,
            ],
            84910 => [
                'downvotes' => 2,
                'id' => '84910',
                'ts' => '1217938595',
                'upvotes' => 2,
            ],
            83914 => [
                'downvotes' => 1,
                'id' => '83914',
                'ts' => '1213760931',
                'upvotes' => 1,
            ],
            78483 => [
                'downvotes' => 1,
                'id' => '78483',
                'ts' => '1192337362',
                'upvotes' => 1,
            ],
            74763 => [
                'downvotes' => 1,
                'id' => '74763',
                'ts' => '1177577911',
                'upvotes' => 1,
            ],
            74432 => [
                'downvotes' => 1,
                'id' => '74432',
                'ts' => '1176269720',
                'upvotes' => 1,
            ],
            47879 => [
                'downvotes' => 1,
                'id' => '47879',
                'ts' => '1102066114',
                'upvotes' => 1,
            ],
            40617 => [
                'downvotes' => 0,
                'id' => '40617',
                'ts' => '1078853206',
                'upvotes' => 0,
            ],
            38375 => [
                'downvotes' => 1,
                'id' => '38375',
                'ts' => '1071743640',
                'upvotes' => 1,
            ],
            106295 => [
                'downvotes' => 3,
                'id' => '106295',
                'ts' => '1319574977',
                'upvotes' => 2,
            ],
            95875 => [
                'downvotes' => 3,
                'id' => '95875',
                'ts' => '1264517173',
                'upvotes' => 2,
            ],
            102336 => [
                'downvotes' => 2,
                'id' => '102336',
                'ts' => '1297217360',
                'upvotes' => 1,
            ],
            93781 => [
                'downvotes' => 2,
                'id' => '93781',
                'ts' => '1254189367',
                'upvotes' => 1,
            ],
            90065 => [
                'downvotes' => 2,
                'id' => '90065',
                'ts' => '1238827503',
                'upvotes' => 1,
            ],
        ];

        self::assertSame($expected, $normalized);
    }

    private static function normalize(UserNote $note): array
    {
        return [
            'downvotes' => $note->downvotes,
            'id' => $note->id,
            'ts' => $note->ts,
            'upvotes' => $note->upvotes,
        ];
    }
}
