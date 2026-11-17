<?php

declare(strict_types=1);

namespace phpweb\News;

use function usort;

/**
 * Groups and orders conference/CFP news entries for the /conferences page and its CFP view.
 *
 * Conferences and calls for papers are separate, unlinked news entries, each with a single
 * finalTeaserDate that means different things: for a conference it's the event's start date,
 * for a CFP it's the submission deadline. They live on different pages:
 *
 *  - The conferences view shows conferences only, split by start date into upcoming (soonest
 *    first) and past (most recent first). A conference with no finalTeaserDate falls into past.
 *  - The CFP view shows CFPs only, split by deadline into open (deadline today or later, soonest
 *    first) and closed (deadline passed, or no deadline, most recently closed first).
 *
 * finalTeaserDate nuance: for a conference it's start date, for a CFP it's end date
 */
final class ConferenceSchedule
{
    /** @var list<array> Conferences starting today or later, soonest first. */
    public private(set) array $upcomingConferences = [];

    /** @var list<array> Conferences already started (or undated), most recent first. */
    public private(set) array $pastConferences = [];

    /** @var list<array> CFPs whose submission deadline has not passed, soonest deadline first. */
    public private(set) array $openCallsForPapers = [];

    /** @var list<array> CFPs whose deadline has passed (or is unknown), most recently closed first. */
    public private(set) array $closedCallsForPapers = [];

    /**
     * @param list<array> $entries conference/CFP entries, e.g. from NewsHandler::getConferences()
     * @param string $today today's date as 'Y-m-d'
     */
    public function __construct(array $entries, string $today)
    {
        foreach ($entries as $entry) {
            $this->assignConferenceOrCfp($entry, $today);
        }

        $this->upcomingConferences = self::sortedByDate($this->upcomingConferences, ascending: true);
        $this->openCallsForPapers = self::sortedByDate($this->openCallsForPapers, ascending: true);
        $this->pastConferences = self::sortedByDate($this->pastConferences, ascending: false);
        $this->closedCallsForPapers = self::sortedByDate($this->closedCallsForPapers, ascending: false);
    }

    /**
     * The entry's primary term. A few posts announce a conference and open its CFP at once,
     * carrying both terms; anything that is a conference is treated as a conference (and so
     * placed by its date), leaving Cfp for CFP-only posts.
     *
     * @param array<array-key, mixed> $entry
     */
    public static function termFor(array $entry): ?Category
    {
        $found = null;
        foreach ($entry['category'] as $category) {
            $term = Category::tryFrom($category['term']);

            if ($term === Category::Conferences) {
                return $term;
            }

            if ($term === Category::Cfp) {
                $found = $term;
            }
        }

        return $found;
    }

    /**
     * @param array<array-key, mixed> $conferenceOrCfp
     */
    private function assignConferenceOrCfp(array $conferenceOrCfp, string $today): void
    {
        $isFuture = isset($conferenceOrCfp['finalTeaserDate']) && $conferenceOrCfp['finalTeaserDate'] >= $today;
        $isCfp = self::termFor($conferenceOrCfp) === Category::Cfp;

        match (true) {
            $isCfp && $isFuture => $this->openCallsForPapers[] = $conferenceOrCfp,
            $isCfp => $this->closedCallsForPapers[] = $conferenceOrCfp,
            $isFuture => $this->upcomingConferences[] = $conferenceOrCfp,
            default => $this->pastConferences[] = $conferenceOrCfp,
        };
    }

    /**
     * Sort entries by finalTeaserDate ('Y-m-d'), keeping undated entries last.
     *
     * @param list<array> $entries
     *
     * @return list<array>
     */
    private static function sortedByDate(array $entries, bool $ascending): array
    {
        usort($entries, static function (array $a, array $b) use ($ascending): int {
            $aDate = $a['finalTeaserDate'] ?? '';
            $bDate = $b['finalTeaserDate'] ?? '';

            // Push undated entries to the end whichever way the dated ones are ordered.
            if ($aDate === '' || $bDate === '') {
                return ($aDate === '' ? 1 : 0) <=> ($bDate === '' ? 1 : 0);
            }

            return $ascending ? $aDate <=> $bDate : $bDate <=> $aDate;
        });

        return $entries;
    }
}
