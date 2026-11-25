<?php

use phpweb\News\ConferenceSchedule;
use phpweb\News\NewsHandler;

$_SERVER['BASE_PAGE'] = 'get-involved.php';
require_once __DIR__ . '/../include/prepend.inc';

site_header("Get Involved", [
    "current" => "community",
    "css" => ["get-involved.css"],
]);
?>

<script>
    // The developer guide used to live on this page; send its old anchors
    // along to contributing.php so existing links keep working.
    const movedAnchors = ['#contributing-to-php', '#ways-to-contribute', '#php-src', '#references'];

    if (movedAnchors.includes(location.hash)) {
        location.replace('/contributing.php' + location.hash);
    }
</script>

<h1>Get Involved</h1>

<p>
 PHP is maintained by a worldwide community of developers. If you're
 looking to get connected, or if you want to help shape the language
 itself, here are the ways you can get started.
</p>

<div class="get-involved-callout">
 <p>
  <strong>Looking to contribute to PHP?</strong>
  To work on the language itself, we cover how on the
  <a href="/contributing.php">Contributing to PHP</a> page.
 </p>
</div>

<h2 class="content-header" id="in-person">Meet the community in person</h2>

<div class="get-involved-grid">
 <section class="get-involved-card">
  <h3><a href="/conferences/">Conferences</a></h3>
  <p>
   PHP conferences are held all over the world. Find one near
   you, or one you'd consider traveling to.
  </p>
  <p>
   Or if you're interested in speaking, check out the
   <a href="/conferences/?view=cfps">open calls for papers</a>.
  </p>
 </section>

 <section class="get-involved-card">
  <h3><a href="https://php.ug/">User groups</a></h3>
  <p>
   PHP developers around the world meet up in their local city to share
   what they're learning and working on.
  </p>
  <p>Find one near you on
   <a href="https://php.ug/">PHP.ug</a>.
  </p>
 </section>

 <section class="get-involved-card">
  <h3><a href="/cal.php">Events calendar</a></h3>
  <p>
   See our list of meetups, training sessions, and other community events.
  </p>
  <p>
   Running an event? <a href="/submit-event.php">Submit it to the calendar</a>.
  </p>
 </section>
</div>

<h2 class="content-header" id="online">Join the conversation online</h2>

<div class="get-involved-grid">
 <section class="get-involved-card">
  <h3><a href="https://phpc.chat/">PHP Community Discord</a></h3>
  <p>
   The PHP Community chat is hosted on Discord and also bridged to IRC: #phpc on
   <a href="https://libera.chat/">Libera.Chat</a>.
  </p>
 </section>

 <section class="get-involved-card">
  <h3><a href="https://www.reddit.com/r/PHP/">r/PHP</a></h3>
  <p>
   The r/PHP Reddit community hosts news, discussions, and weekly help threads.
  </p>
 </section>

 <section class="get-involved-card">
  <h3><a href="/support.php">Getting help</a></h3>
  <p>
   The <a href="/support.php">help page</a> lists the
   best places to ask questions.
  </p>
 </section>
</div>

<h2 class="content-header" id="contribute">Contribute to PHP</h2>

<div class="content-box">
 <p>
  Anybody who programs in PHP can help build it. How to start:
 </p>
 <ul class="listed">
  <li>Testing <a href="/pre-release-builds.php">release candidates</a> and reporting what breaks</li>
  <li>Filing and fixing bugs on <a href="https://github.com/php/php-src/issues/">GitHub Issues</a></li>
  <li>Improving and translating <a href="https://doc.php.net/guide/">the documentation</a></li>
  <li>Proposing changes to the language through <a href="https://wiki.php.net/rfc/howto">the RFC process</a></li>
 </ul>
 <p>
  <a href="/contributing.php"><strong>Read the full guide to contributing to PHP &raquo;</strong></a>
 </p>
</div>

<h2 class="content-header" id="fund">Support the people who build PHP</h2>

<div class="content-box">
 <p>
  <a href="https://thephp.foundation/">The PHP Foundation</a> funds developers
  to work on the PHP language full-time. Individuals and companies can
  <a href="https://thephp.foundation/sponsor/">sponsor the Foundation</a> to
  keep that work going.
 </p>
</div>

<h2 class="content-header" id="follow">Follow PHP's development</h2>

<ul class="content-box listed">
 <li><a href="/archive/">PHP news</a>: release announcements and project news (also available as an <a href="/feed.atom">Atom feed</a>)</li>
 <li><a href="https://wiki.php.net/rfc">RFCs</a>: proposals for new language features, under discussion and voting</li>
 <li><a href="/mailing-lists.php">Mailing lists</a>: including the internals list, where PHP's development is discussed</li>
 <li><a href="https://github.com/php">PHP on GitHub</a>: the source for PHP, its documentation, and this website</li>
</ul>

<?php

$SIDEBAR_DATA = '
<div class="panel">
  <div class="headline">Table of Contents</div>
  <div class="body">
    <ul>
      <li><a href="#in-person">Meet the community in person</a></li>
      <li><a href="#online">Join the conversation online</a></li>
      <li><a href="#contribute">Contribute to PHP</a></li>
      <li><a href="#fund">Support the people who build PHP</a></li>
      <li><a href="#follow">Follow PHP\'s development</a></li>
    </ul>
  </div>
</div>
';

$schedule = new ConferenceSchedule((new NewsHandler())->getConferences(), gmdate('Y-m-d'));

$renderConferencePanel = static function (string $title, string $href, array $entries): string {
    if ($entries === []) {
        return '';
    }

    $html = '<div class="panel">';
    $html .= '<a href="' . $href . '" class="headline">' . $title . '</a>';
    $html .= '<div class="body"><ul>';
    foreach (array_slice($entries, 0, 4) as $entry) {
        $link = $href . '#' . parse_url($entry["id"], PHP_URL_FRAGMENT);
        $html .= '<li><a href="' . $link . '">' . $entry["title"] . '</a></li>';
    }
    $html .= '</ul></div>';
    $html .= '</div>';

    return $html;
};

$SIDEBAR_DATA .= $renderConferencePanel('Upcoming conferences', '/conferences/', $schedule->upcomingConferences);
$SIDEBAR_DATA .= $renderConferencePanel('Open calls for papers', '/conferences/?view=cfps', $schedule->openCallsForPapers);
$SIDEBAR_DATA .= '<p class="panel"><a href="/cal.php">User Group Events</a></p>';

site_footer(['sidebar' => $SIDEBAR_DATA]);
