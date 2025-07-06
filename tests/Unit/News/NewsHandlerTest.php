<?php

declare(strict_types=1);

namespace News;

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
}
