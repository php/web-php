<?php

declare(strict_types=1);

namespace phpweb\Test\Unit;

use PHPUnit\Framework;

#[Framework\Attributes\CoversFunction('gen_challenge')]
#[Framework\Attributes\UsesFunction('gen_minus')]
#[Framework\Attributes\UsesFunction('gen_plus')]
#[Framework\Attributes\UsesFunction('print_infix')]
#[Framework\Attributes\UsesFunction('print_prefix')]
final class GenChallengeTest extends Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../../manual/spam_challenge.php';

        mt_srand(9001);
    }

    public function testGenChallengeReturnsChallenge(): void {
        $challenges = array_map(static function (): array {
            [$function, $argumentOne, $argumentTwo, $question] = gen_challenge();

            return [
                'function' => $function,
                'argumentOne' => $argumentOne,
                'argumentTwo' => $argumentTwo,
                'question' => $question,
            ];
        }, range(1, 20));

        $expected = [
            [
                'function' => 'min',
                'argumentOne' => 'two',
                'argumentTwo' => 'one',
                'question' => 'min(two, one)',
            ],
            [
                'function' => 'minus',
                'argumentOne' => 'five',
                'argumentTwo' => 'five',
                'question' => 'five minus five',
            ],
            [
                'function' => 'minus',
                'argumentOne' => 'four',
                'argumentTwo' => 'four',
                'question' => 'four minus four',
            ],
            [
                'function' => 'min',
                'argumentOne' => 'nine',
                'argumentTwo' => 'seven',
                'question' => 'min(nine, seven)',
            ],
            [
                'function' => 'minus',
                'argumentOne' => 'seven',
                'argumentTwo' => 'six',
                'question' => 'seven minus six',
            ],
            [
                'function' => 'max',
                'argumentOne' => 'three',
                'argumentTwo' => 'six',
                'question' => 'max(three, six)',
            ],
            [
                'function' => 'max',
                'argumentOne' => 'six',
                'argumentTwo' => 'five',
                'question' => 'max(six, five)',
            ],
            [
                'function' => 'max',
                'argumentOne' => 'four',
                'argumentTwo' => 'three',
                'question' => 'max(four, three)',
            ],
            [
                'function' => 'min',
                'argumentOne' => 'two',
                'argumentTwo' => 'nine',
                'question' => 'min(two, nine)',
            ],
            [
                'function' => 'plus',
                'argumentOne' => 'eight',
                'argumentTwo' => 'one',
                'question' => 'eight plus one',
            ],
            [
                'function' => 'plus',
                'argumentOne' => 'three',
                'argumentTwo' => 'five',
                'question' => 'three plus five',
            ],
            [
                'function' => 'min',
                'argumentOne' => 'eight',
                'argumentTwo' => 'three',
                'question' => 'min(eight, three)',
            ],
            [
                'function' => 'max',
                'argumentOne' => 'zero',
                'argumentTwo' => 'nine',
                'question' => 'max(zero, nine)',
            ],
            [
                'function' => 'min',
                'argumentOne' => 'five',
                'argumentTwo' => 'nine',
                'question' => 'min(five, nine)',
            ],
            [
                'function' => 'minus',
                'argumentOne' => 'six',
                'argumentTwo' => 'four',
                'question' => 'six minus four',
            ],
            [
                'function' => 'max',
                'argumentOne' => 'one',
                'argumentTwo' => 'one',
                'question' => 'max(one, one)',
            ],
            [
                'function' => 'plus',
                'argumentOne' => 'five',
                'argumentTwo' => 'zero',
                'question' => 'five plus zero',
            ],
            [
                'function' => 'minus',
                'argumentOne' => 'nine',
                'argumentTwo' => 'eight',
                'question' => 'nine minus eight',
            ],
            [
                'function' => 'minus',
                'argumentOne' => 'three',
                'argumentTwo' => 'one',
                'question' => 'three minus one',
            ],
            [
                'function' => 'min',
                'argumentOne' => 'three',
                'argumentTwo' => 'one',
                'question' => 'min(three, one)',
            ],
        ];

        self::assertSame($expected, $challenges);
    }
}
