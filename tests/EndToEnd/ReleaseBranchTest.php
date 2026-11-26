<?php

declare(strict_types=1);

namespace phpweb\Test\EndToEnd;

use DOMDocument;
use DOMElement;
use DOMNodeList;
use DOMXPath;
use PHPUnit\Framework;

#[Framework\Attributes\CoversNothing]
final class ReleaseBranchTest extends Framework\TestCase
{
    public function testSupportedVersionsLinkToBranchSupportDetails(): void
    {
        $listing = $this->getPage('/supported-versions.php', 200);
        $rows = $listing->query('//table[thead/tr/th = "Branch"]/tbody/tr');
        self::assertInstanceOf(DOMNodeList::class, $rows);
        self::assertGreaterThan(0, $rows->length);

        foreach ($rows as $row) {
            self::assertInstanceOf(DOMElement::class, $row);
            $branch = trim((string) $listing->evaluate('string(td[1]/a)', $row));
            $href = $listing->evaluate('string(td[1]/a/@href)', $row);
            self::assertIsString($href);
            self::assertSame('/releases/branch.php?version=' . $branch, $href);

            $details = $this->getPage($href, 200);
            self::assertSame('PHP ' . $branch . ' Release', $details->evaluate('string(//h1)'));
            $supportDates = $details->query('//dl/dd/time');
            self::assertInstanceOf(DOMNodeList::class, $supportDates);
            self::assertCount(3, $supportDates);
            foreach ([2, 4, 6] as $index => $column) {
                $date = $supportDates->item($index);
                self::assertInstanceOf(DOMElement::class, $date);
                self::assertSame(
                    trim((string) $listing->evaluate("string(td[$column])", $row)),
                    $date->textContent,
                );
            }
        }
    }

    public function testUnknownBranchReturnsNotFound(): void
    {
        $this->getPage('/releases/branch.php?version=999.999', 404);
    }

    private function getPage(string $path, int $status): DOMXPath
    {
        $handle = curl_init('http://' . getenv('HTTP_HOST') . $path);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $body = curl_exec($handle);
        self::assertSame($status, curl_getinfo($handle, CURLINFO_HTTP_CODE), $path);
        self::assertIsString($body);

        $document = new DOMDocument();
        self::assertTrue($document->loadHTML($body, LIBXML_NOERROR | LIBXML_NOWARNING));

        return new DOMXPath($document);
    }
}
