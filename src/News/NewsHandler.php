<?php

declare(strict_types=1);

namespace phpweb\News;

use DateTimeImmutable;

use function array_filter;
use function array_values;
use function is_array;
use function preg_match;
use function str_replace;
use function strip_tags;
use function trim;

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

    /**
     * @param NewsEntryStruct $data
     * @param list<string>|string $tags
     */
    public static function isTagged(array $data, array|string $tags): bool
    {
        $tags = is_array($tags) ? $tags : [$tags];

        foreach ($data['category'] as $category) {
            if (in_array($category['term'], $tags, true)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param NewsEntryStruct $data
     */
    public static function parseTeaserCutoff(array $data): ?DateTimeImmutable
    {
        $finalTeaserDate = $data['finalTeaserDate'] ?? null;
        if (!$finalTeaserDate) {
            return null;
        }

        return new DateTimeImmutable($finalTeaserDate);
    }

    /**
     * Attempts to get a single line of plain text that can be used to
     * describe this news article.
     *
     * Tries to extract the top paragraph. In the future, if we add a plain
     * text key, it can try for that first.
     *
     * @param NewsEntryStruct $data
     */
    public static function extractTeaser(array $data, int $maxLength = 160): string
    {
        if (preg_match('/<p>(.*?)<\/p>/s', $data['content'], $matches)) {
            $content = trim(strip_tags(str_replace("\n", " ", trim($matches[1]))));

            if (mb_strlen($content) > $maxLength) {
                $content = mb_substr($content, 0, $maxLength) . '...';
            }

            return $content;
        }

        return '';
    }
}
