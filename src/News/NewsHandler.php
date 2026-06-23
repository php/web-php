<?php

declare(strict_types=1);

namespace phpweb\News;

use DateTimeImmutable;
use function array_filter;
use function array_values;
use function count;
use function is_array;
use function preg_match;
use function str_replace;
use function strip_tags;
use function trim;

/**
 * @phpstan-type NewsEntryStruct array{
 *     title: string,
 *     id: string,
 *     published: string,
 *     updated?: string,
 *     link?: list<array{
 *        href: string,
 *        rel: string,
 *        type?: string,
 *     }>,
 *     category: list<array{
 *         term: string,
 *         label: string,
 *     }>,
 *     newsImage?: array{
 *         link: string,
 *         content: string,
 *     },
 *     content: string,
 *     intro?: string,
 *     finalTeaserDate?: string,
 * }
 */
final class NewsHandler
{
    private const MAX_FRONT_PAGE_NEWS = 25;

    /**
     * @return NewsEntryStruct|null
     */
    public function getLastestNews(): array|null
    {
        $news = $this->getPregeneratedNews();
        if (!isset($news[0])) {
            return null;
        }

        return $news[0];
    }

    /**
     * @param list<string> $tags
     * @return list<NewsEntryStruct>
     */
    public function getTaggedEntries(array $tags, ?int $limit = null): array
    {
        $entries = [];
        foreach ($this->getPregeneratedNews() as $entry) {
            if (!self::isTagged($entry, $tags)) {
                continue;
            }

            $entries[] = $entry;
            if ($limit !== null && count($entries) >= $limit) {
                break;
            }
        }

        return $entries;
    }

    /**
     *  Looks up generated news with frontpage tags.
     *
     * @return list<NewsEntryStruct>
     */
    public function getFrontPageNews(int $limit = self::MAX_FRONT_PAGE_NEWS): array
    {
        return $this->getTaggedEntries(['frontpage'], $limit);
    }

    /**
     * @return list<NewsEntryStruct>
     */
    public function getConferences(?int $limit = null): array
    {
        return $this->getTaggedEntries(['cfp', 'conferences'], $limit);
    }

    /**
     * @return list<NewsEntryStruct>
     */
    public function getNewsByYear(int $year): array
    {
        return array_values(array_filter(
            $this->getPregeneratedNews(),
            static fn (array $entry): bool => (int) (new DateTimeImmutable($entry['published']))->format('Y') === $year,
        ));
    }

    /**
     * @return list<NewsEntryStruct>
     */
    public function getPregeneratedNews(): array
    {
        $NEWS_ENTRIES = null;
        include __DIR__ . '/../../include/pregen-news.inc';

        /** @phpstan-ignore-next-line - pregen-news sets global variable */
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
