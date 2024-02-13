<?php

declare(strict_types=1);

namespace phpweb\Test\Unit;

use PHPUnit\Framework;

#[Framework\Attributes\CoversFunction('is_emailable_address')]
final class IsEmailableAddressTest extends Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../../include/email-validation.inc';
    }

    #[Framework\Attributes\DataProvider('provideInvalidEmail')]
    public function testIsEmailableAddressReturnsFalseWhenEmailIsInvalid(string $email): void
    {
        $isEmailableAddress = is_emailable_address($email);

        self::assertFalse($isEmailableAddress);
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideInvalidEmail(): \Generator
    {
        $values = [
            'jcastagnetto-i-hate-spam@NOSPAMyahoo.test',
            'jcastagnetto@NoSpam-yahoo.com',
            'jmcastagnetto@chek2.com',
            'wrong-address-with@@@@-remove_me-and-some-i-hate_SPAM-stuff',
            'wrong-email-address@lists.php.net',
        ];

        foreach ($values as $value) {
            yield $value => [
                $value,
            ];
        }
    }

    #[Framework\Attributes\DataProvider('provideValidEmail')]
    public function testIsEmailableAddressReturnsTrueWhenEmailIsValid(string $email): void
    {
        $isEmailableAddress = is_emailable_address($email);

        self::assertTrue($isEmailableAddress);
    }

    /**
     * @return \Generator<string, array{0: string}>
     */
    public static function provideValidEmail(): \Generator
    {
        $values = [
            'asasasd324324@php.net',
            'jcastagnetto-delete-this-@yahoo.com',
            'jcastagnetto-NO-SPAM@yahoo.com',
            'jesusmc@scripps.edu',
            'jmcastagnetto@yahoo.com',
            'some-wrong@asdas.com',
        ];

        foreach ($values as $value) {
            yield $value => [
                $value,
            ];
        }
    }
}
