<?php

declare(strict_types=1);

namespace phpweb\Test\Unit;

use PHPUnit\Framework;

#[Framework\Attributes\CoversFunction('clean_AntiSPAM')]
final class CleanAntiSpamTest extends Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../../include/email-validation.inc';
    }

    #[Framework\Attributes\DataProvider('provideEmailAndExpectedEmail')]
    public function testCleanAntiSpamReturnsCleanedEmail(
        string $email,
        string $expectedEmail,
    ): void
    {
        $cleanedEmail = clean_AntiSPAM($email);

        self::assertSame($expectedEmail, $cleanedEmail);
    }

    /**
     * @return \Generator<string, array{0: string, 1: string}>
     */
    public static function provideEmailAndExpectedEmail(): \Generator
    {
        $values = [
            'asasasd324324@php.net' => 'asasasd324324@php.net',
            'jcastagnetto-delete-this-@yahoo.com' => 'jcastagnetto@yahoo.com',
            'jcastagnetto-i-hate-spam@NOSPAMyahoo.com' => 'jcastagnetto@yahoo.com',
            'jcastagnetto-NO-SPAM@yahoo.com' => 'jcastagnetto@yahoo.com',
            'jcastagnetto@NoSpam-yahoo.com' => 'jcastagnetto@yahoo.com',
            'jesusmc@scripps.edu' => 'jesusmc@scripps.edu',
            'jmcastagnetto@chek2.com' => 'jmcastagnetto@chek2.com',
            'jmcastagnetto@yahoo.com' => 'jmcastagnetto@yahoo.com',
            'some-wrong@asdas.com' => 'some-wrong@asdas.com',
            'wrong-address-with@@@@-remove_me-and-some-i-hate_SPAM-stuff' => 'wrong-address-with@@@@and-somestuff',
            'wrong-email-address@lists.php.net' => 'wrong-email-address@lists.php.net',
        ];

        foreach ($values as $email => $expectedEmail) {
            yield $email => [
                $email,
                $expectedEmail,
            ];
        }
    }
}
