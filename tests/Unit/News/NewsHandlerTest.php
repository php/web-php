<?php

declare(strict_types=1);

namespace News;

use DateTimeImmutable;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use phpweb\News\NewsHandler;

#[CoversClass(NewsHandler::class)]
final class NewsHandlerTest extends TestCase
{
    public function testGetLastestNews(): void
    {
        $newsHandler = new NewsHandler();
        $news = $newsHandler->getPregeneratedNews();
        self::assertArrayHasKey(0, $news);
        self::assertSame($news[0], $newsHandler->getLastestNews());
    }

    public function testGetConferences(): void
    {
        $conferences = (new NewsHandler())->getConferences();
        self::assertNotEmpty($conferences);
        foreach ($conferences as $conference) {
            $isConference = false;
            foreach ($conference['category'] as $category) {
                if ($category['term'] === 'cfp' || $category['term'] === 'conferences') {
                    $isConference = true;
                    break;
                }
            }

            self::assertTrue($isConference);
        }
    }

    public function testGetNewsByYear(): void
    {
        $news = (new NewsHandler())->getNewsByYear(2018);
        self::assertNotEmpty($news);
        foreach ($news as $entry) {
            self::assertSame('2018', (new DateTimeImmutable($entry['published']))->format('Y'));
        }
    }

    public function testGetFrontPageNews(): void
    {
        $frontPage = (new NewsHandler())->getFrontPageNews();
        self::assertCount(25, $frontPage);
        foreach ($frontPage as $news) {
            self::assertContains(['term' => 'frontpage', 'label' => 'PHP.net frontpage news'], $news['category']);
        }
    }
}
