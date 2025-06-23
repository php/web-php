<?php
$_SERVER['BASE_PAGE'] = 'history/timeline.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('30 years of PHP', ['css' => 'history.css']);

$path = __DIR__ . '/timeline-data.json';
$events = json_decode(file_get_contents($path), true);

final readonly class HistoryEntry {
    public function __construct(
        private string $title,
        private string $description,
        private DateTimeImmutable $date,
        private string $linkHref,
        private int $priority,
    ) {}

    public function renderHtml(): string
    {
        $html = <<<"HTML"
            <article class="timeline-event">
                <aside>
                    {$this->date->format("M d")}
                </aside>
                <div>
                    <header>
                        <a href="$this->linkHref">
                            <h3 class="importance-{$this->priority}">
                                $this->title
                            </h3>
                        </a>
            HTML;

        if ($this->description !== '' && $this->priority !== 1) {
            $html .= <<<"HTML"
                    <span class="timeline-tooltip">
                        <img src="/images/i.svg" alt="">
                        <span class="timeline-tooltip--text">$this->description</span>
                    </span>
            HTML;
        }

        $html .= <<<"HTML"

                </header>
            HTML;

        if ($this->description !== '' && $this->priority === 1) {
            $html .= "<p>$this->description</p>";
        }

        return $html . <<<"HTML"
                </div>
            </article>
            HTML;
    }
}

$grouped = [];
foreach ($events as $event) {
    $year = substr($event['date'], 0, 4);
    $grouped[$year][] = new HistoryEntry(
        $event['title'],
        $event['description'],
        new DateTimeImmutable($event['date']),
        $event['href'],
        $event['priority'],
    );
}

$sidebarLinks = join('', array_map(fn ($year) => "<li><a href='#year-$year'>$year</a></li>", array_keys($grouped)));
$SIDEBAR_DATA = <<<"HTML"
        <h3>Jump to Year</h3>
        <ul>$sidebarLinks</ul>
    HTML;
?>

    <h1 class="title">30 years of PHP history</h1>
    <p>
        Welcome to the PHP Timeline — a curated historical journey of key milestones, releases, and ideas that shaped the PHP language over the years.
        Explore the highlights and contributions that helped PHP become one of the most widely used languages on the web.
    </p>
    <div class="timeline">
<?php
foreach ($grouped as $year => $items) {
    echo "<div class='timeline-year' id='year-$year'><h2 class='title'>$year</h2>";
    foreach ($items as $event) {
        echo $event->renderHtml();
    }
    echo "</div>";
}
?>
    </div>

<?php site_footer(['elephpants' => true, 'sidebar' => $SIDEBAR_DATA]);
