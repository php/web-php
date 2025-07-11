<?php

declare(strict_types=1);

namespace phpweb\News;

use DateTimeImmutable;

use function array_filter;
use function array_values;
use function is_array;

final class NewsHandler
{
    private const MAX_FRONT_PAGE_NEWS = 25;

    public function getLastestNews(): array|null
    {
        $news = $this->getPregeneratedNews();
        if (!isset($news[0])) {
            return null;
        }

        return $news[0];
    }

    /** @return list<array> */
    public function getFrontPageNews(): array
    {
        $frontPage = [];
        foreach ($this->getPregeneratedNews() as $entry) {
            foreach ($entry['category'] as $category) {
                if ($category['term'] !== 'frontpage') {
                    continue;
                }

                $frontPage[] = $entry;
                if (count($frontPage) >= self::MAX_FRONT_PAGE_NEWS) {
                    break 2;
                }
            }
        }

        return $frontPage;
    }

    /** @return list<array> */
    public function getConferences(): array
    {
        $conferences = [];
        foreach ($this->getPregeneratedNews() as $entry) {
            foreach ($entry['category'] as $category) {
                if ($category['term'] !== 'cfp' && $category['term'] !== 'conferences') {
                    continue;
                }

                $conferences[] = $entry;
                break;
            }
        }

        return $conferences;
    }

    /** @return list<array> */
    public function getNewsByYear(int $year): array
    {
        return array_values(array_filter(
            $this->getPregeneratedNews(),
            static fn (array $entry): bool => (int) (new DateTimeImmutable($entry['published']))->format('Y') === $year,
        ));
    }

    public function getPregeneratedNews(): array
    {
        $NEWS_ENTRIES = null;
        include __DIR__ . '/../../include/pregen-news.inc';

        return is_array($NEWS_ENTRIES) ? $NEWS_ENTRIES : [];
    }
}
