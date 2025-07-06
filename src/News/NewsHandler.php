<?php

declare(strict_types=1);

namespace phpweb\News;

use function is_array;

final class NewsHandler
{
    public function getLastestNews(): array|null
    {
        $news = $this->getPregeneratedNews();
        if (!isset($news[0])) {
            return null;
        }

        return $news[0];
    }

    public function getPregeneratedNews(): array
    {
        $NEWS_ENTRIES = null;
        include __DIR__ . '/../../include/pregen-news.inc';

        return is_array($NEWS_ENTRIES) ? $NEWS_ENTRIES : [];
    }
}
