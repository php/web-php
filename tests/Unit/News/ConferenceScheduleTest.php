<?php

declare(strict_types=1);

namespace News;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use phpweb\News\ConferenceSchedule;

#[CoversClass(ConferenceSchedule::class)]
final class ConferenceScheduleTest extends TestCase
{
    public function testConferencesSplitByStartDateRelativeToToday(): void
    {
        $schedule = new ConferenceSchedule([
            self::entry('future', ['conferences'], '2020-06-02'),
            self::entry('today', ['conferences'], '2020-06-01'),
            self::entry('past', ['conferences'], '2020-05-31'),
        ], '2020-06-01');

        // Today counts as upcoming; upcoming is ordered soonest first.
        self::assertSame(['today', 'future'], self::ids($schedule->upcomingConferences));
        self::assertSame(['past'], self::ids($schedule->pastConferences));
        self::assertSame([], $schedule->openCallsForPapers);
        self::assertSame([], $schedule->closedCallsForPapers);
    }

    public function testUpcomingConferencesAreOrderedSoonestFirst(): void
    {
        $schedule = new ConferenceSchedule([
            self::entry('later', ['conferences'], '2020-09-01'),
            self::entry('sooner', ['conferences'], '2020-07-01'),
            self::entry('middle', ['conferences'], '2020-08-01'),
        ], '2020-06-01');

        self::assertSame(['sooner', 'middle', 'later'], self::ids($schedule->upcomingConferences));
    }

    public function testPastConferencesAreOrderedMostRecentFirstWithUndatedLast(): void
    {
        $schedule = new ConferenceSchedule([
            self::entry('older', ['conferences'], '2020-01-01'),
            self::entry('undated', ['conferences'], null),
            self::entry('newer', ['conferences'], '2020-05-01'),
        ], '2020-06-01');

        // A conference with no start date can't be placed, so it sorts last.
        self::assertSame(['newer', 'older', 'undated'], self::ids($schedule->pastConferences));
    }

    public function testCfpsSplitIntoOpenAndClosedByDeadline(): void
    {
        $schedule = new ConferenceSchedule([
            self::entry('open', ['cfp'], '2020-06-01'),
            self::entry('closed', ['cfp'], '2020-05-31'),
            self::entry('undated', ['cfp'], null),
        ], '2020-06-01');

        // Today counts as open; a CFP with no deadline can't be confirmed open, so it is closed.
        self::assertSame(['open'], self::ids($schedule->openCallsForPapers));
        // Closed is ordered most-recently-closed first, with the undated CFP last.
        self::assertSame(['closed', 'undated'], self::ids($schedule->closedCallsForPapers));
        self::assertSame([], $schedule->upcomingConferences);
        self::assertSame([], $schedule->pastConferences);
    }

    public function testOpenCallsForPapersAreOrderedSoonestDeadlineFirst(): void
    {
        $schedule = new ConferenceSchedule([
            self::entry('later', ['cfp'], '2020-09-01'),
            self::entry('sooner', ['cfp'], '2020-07-01'),
        ], '2020-06-01');

        self::assertSame(['sooner', 'later'], self::ids($schedule->openCallsForPapers));
    }

    public function testEntriesCarryingBothTermsAreTreatedAsConferences(): void
    {
        // A post that announces a conference and opens its CFP at once, in either term order.
        $schedule = new ConferenceSchedule([
            self::entry('conf-first', ['conferences', 'cfp'], '2020-07-01'),
            self::entry('cfp-first', ['cfp', 'conferences'], '2020-05-01'),
        ], '2020-06-01');

        self::assertSame(['conf-first'], self::ids($schedule->upcomingConferences));
        self::assertSame(['cfp-first'], self::ids($schedule->pastConferences));
        self::assertSame([], $schedule->openCallsForPapers);
        self::assertSame([], $schedule->closedCallsForPapers);
    }

    public function testConferencesWithoutAFinalTeaserDateFallIntoPast(): void
    {
        $schedule = new ConferenceSchedule([
            self::entry('undated', ['conferences'], null),
        ], '2020-06-01');

        self::assertSame(['undated'], self::ids($schedule->pastConferences));
        self::assertSame([], $schedule->upcomingConferences);
    }

    /**
     * @param list<string> $terms
     *
     * @return array<string, mixed>
     */
    private static function entry(string $id, array $terms, ?string $finalTeaserDate): array
    {
        $entry = [
            'id' => $id,
            'title' => $id,
            'category' => array_map(static fn (string $term): array => ['term' => $term, 'label' => $term], $terms),
        ];

        if ($finalTeaserDate !== null) {
            $entry['finalTeaserDate'] = $finalTeaserDate;
        }

        return $entry;
    }

    /**
     * @param list<array> $entries
     *
     * @return list<string>
     */
    private static function ids(array $entries): array
    {
        return array_map(static fn (array $entry): string => (string) $entry['id'], $entries);
    }
}
