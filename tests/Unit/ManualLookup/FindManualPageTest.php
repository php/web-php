<?php

declare(strict_types=1);

namespace {
    // include/manual-lookup.inc defines global functions and depends on the global
    // get_manual_search_sections(). That lives in include/site.inc, which cannot be
    // required in isolation, so repeat the list from site.inc here.
    if (!function_exists('get_manual_search_sections')) {
        /** @return list<string> */
        function get_manual_search_sections(): array
        {
            return [
                "", "book.", "ref.", "function.", "class.", "enum.",
                "features.", "control-structures.", "language.",
                "about.", "faq.",
            ];
        }
    }

    require_once phpweb\ProjectGlobals::getProjectRoot() . '/include/manual-lookup.inc';
}

namespace phpweb\Test\Unit\ManualLookup {

    use phpweb\ProjectGlobals;
    use PHPUnit\Framework;

    #[Framework\Attributes\CoversFunction('find_manual_page')]
    #[Framework\Attributes\CoversFunction('find_manual_page_slow')]
    #[Framework\Attributes\RunTestsInSeparateProcesses]
    #[Framework\Attributes\PreserveGlobalState(false)]
    final class FindManualPageTest extends Framework\TestCase
    {
        // Manual pages checked into public/manual/en/ that the searches below resolve to.
        private const SLOW_PATH_PAGE = '/manual/en/function.strpos.php';

        private const FAST_PATH_PAGE = '/manual/en/function.rtrim.php';

        private string $database;

        protected function setUp(): void
        {
            $this->database = ProjectGlobals::getBackendRoot() . '/manual-lookup.sqlite';

            // A database here means a live checkout with an rsynced manual, not a test one
            if (file_exists($this->database)) {
                self::markTestSkipped('manual-lookup.sqlite is present, refusing to overwrite it');
            }
        }

        protected function tearDown(): void
        {
            @unlink($this->database);
        }

        /**
         * Regression test for the production fatal:
         *   Uncaught PDOException: SQLSTATE[HY000]: General error: 8
         *   attempt to write a readonly database in include/manual-lookup.inc
         *
         * A read-only, locked or truncated database must fall back to the slow
         * search rather than throwing.
         */
        public function testFallsBackToSlowSearchWhenSqliteQueryFails(): void
        {
            file_put_contents($this->database, 'this is not a sqlite database');

            self::assertSame(self::SLOW_PATH_PAGE, find_manual_page('en', 'strpos'));
        }

        public function testFallsBackToSlowSearchForDottedKeywordWhenSqliteQueryFails(): void
        {
            // A dotted keyword takes the other SQL branch, which must fall back too
            file_put_contents($this->database, 'this is not a sqlite database');

            self::assertSame(self::SLOW_PATH_PAGE, find_manual_page('en', 'function.strpos'));
        }

        public function testFallsBackToSlowSearchWhenNoDatabasePresent(): void
        {
            self::assertSame(self::SLOW_PATH_PAGE, find_manual_page('en', 'strpos'));
        }

        /**
         * The fast path maps the keyword to a different page than the slow search
         * would find, so a match on it proves the database was really used.
         */
        #[Framework\Attributes\RequiresPhpExtension('pdo_sqlite')]
        public function testUsesSqliteFastPathWhenDatabaseIsValid(): void
        {
            $dbh = new \PDO('sqlite:' . $this->database);
            $dbh->exec('CREATE TABLE fs (lang TEXT, prefix TEXT, keyword TEXT, name TEXT, prio INT)');
            $dbh->exec(sprintf(
                "INSERT INTO fs (lang, prefix, keyword, name, prio) VALUES ('en', 'function.', 'strpos', '%s', 3)",
                self::FAST_PATH_PAGE,
            ));
            $dbh = null;

            self::assertSame(self::FAST_PATH_PAGE, find_manual_page('en', 'strpos'));
        }
    }
}
