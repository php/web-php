<?php

declare(strict_types=1);

namespace phpweb\Spam;

final readonly class Challenge
{
    private const NUMBERS = [
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
    ];

    private const CHALLENGES = [
        // name, print, generator
        'max' => [
            'max',
            [
                self::class,
                'print_prefix',
            ],
        ],
        'min' => [
            'min',
            [
                self::class,
                'print_prefix',
            ],
        ],
        'minus' => [
            [
                self::class,
                'minus',
            ],
            [
                self::class,
                'print_infix',
            ],
            [
                self::class,
                'gen_minus',
            ],
        ],
        'plus' => [
            [
                self::class,
                'plus',
            ],
            [
                self::class,
                'print_infix',
            ],
            [
                self::class,
                'gen_plus',
            ],
        ],
    ];

    private function __construct(
        public string $function,
        public string $argumentOne,
        public string $argumentTwo,
        public string $question,
    ) {
    }

    public static function create(): self
    {
        $function = array_rand(self::CHALLENGES);

        $challenge = self::CHALLENGES[$function];

        $a = mt_rand(0, 9);
        $argumentOne = self::NUMBERS[$a];

        $b = isset($challenge[2]) ? $challenge[2]($a) : mt_rand(0, 9);
        $argumentTwo = self::NUMBERS[$b];

        $question = $challenge[1](
            $function,
            $argumentOne,
            $argumentTwo,
        );

        return new self(
            $function,
            $argumentOne,
            $argumentTwo,
            $question,
        );
    }

    public static function isValidAnswer(
        string $function,
        string $argumentOne,
        string $argumentTwo,
        string $answer,
    ): bool {
        if (!array_key_exists($function, self::CHALLENGES)) {
            return false;
        }

        $challenge = self::CHALLENGES[$function];

        $a = array_search($argumentOne, self::NUMBERS, true);

        if (!is_int($a)) {
            return false;
        }

        $b = array_search($argumentTwo, self::NUMBERS, true);

        if (!is_int($b)) {
            return false;
        }

        $expected = self::NUMBERS[$challenge[0]($a, $b)];

        return $expected === $answer;
    }

    private static function plus(int $a, int $b): int
    {
        return $a + $b;
    }

    private static function gen_plus(int $a): int
    {
        return mt_rand(0, 9 - $a);
    }

    private static function minus(int $a, int $b): int
    {
        return $a - $b;
    }

    private static function gen_minus(int $a): int
    {
        return mt_rand(0, $a);
    }

    private static function print_infix(string $name, string $a, string $b): string
    {
        return "$a $name $b";
    }

    private static function print_prefix(string $name, string $a, string $b): string
    {
        return "$name($a, $b)";
    }
}
