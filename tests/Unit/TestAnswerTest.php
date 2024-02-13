<?php

declare(strict_types=1);

namespace phpweb\Test\Unit;

use PHPUnit\Framework;

#[Framework\Attributes\CoversFunction('test_answer')]
#[Framework\Attributes\UsesFunction('minus')]
#[Framework\Attributes\UsesFunction('plus')]
final class TestAnswerTest extends Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../../manual/spam_challenge.php';
    }

    #[Framework\Attributes\DataProvider('provideFunctionArgumentsAnswerAndExpectedIsValid')]
    public function testAnswerReturnsIsValid(
        string $function,
        string $argumentOne,
        string $argumentTwo,
        string $answer,
        bool $expectedIsValid,
    ): void {
        $isValid = test_answer(
            $function,
            $argumentOne,
            $argumentTwo,
            $answer,
        );

        self::assertSame($expectedIsValid, $isValid);
    }

    /**
     * @return array<int, array{function: string, argumentOne: string, argumentTwo: string, answer: string, expectedIsValid: bool}>
     */
    public static function provideFunctionArgumentsAnswerAndExpectedIsValid(): array
    {
        return [
            [
                'function' => 'max',
                'argumentOne' => 'two',
                'argumentTwo' => 'one',
                'answer' => 'two',
                'expectedIsValid' => true,
            ],
            [
                'function' => 'min',
                'argumentOne' => 'two',
                'argumentTwo' => 'one',
                'answer' => 'one',
                'expectedIsValid' => true,
            ],
            [
                'function' => 'minus',
                'argumentOne' => 'five',
                'argumentTwo' => 'five',
                'answer' => 'zero',
                'expectedIsValid' => true,
            ],
            [
                'function' => 'plus',
                'argumentOne' => 'eight',
                'argumentTwo' => 'one',
                'answer' => 'nine',
                'expectedIsValid' => true,
            ],
            [
                'function' => 'max',
                'argumentOne' => 'three',
                'argumentTwo' => 'six',
                'answer' => 'nine',
                'expectedIsValid' => false,
            ],
            [
                'function' => 'min',
                'argumentOne' => 'two',
                'argumentTwo' => 'nine',
                'answer' => 'seven',
                'expectedIsValid' => false,
            ],
            [
                'function' => 'minus',
                'argumentOne' => 'seven',
                'argumentTwo' => 'six',
                'answer' => 'four',
                'expectedIsValid' => false,
            ],
            [
                'function' => 'plus',
                'argumentOne' => 'eight',
                'argumentTwo' => 'one',
                'answer' => 'seven',
                'expectedIsValid' => false,
            ],
        ];
    }
}
