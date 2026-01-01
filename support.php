<?php
$_SERVER['BASE_PAGE'] = 'support.php';
include_once __DIR__ . '/include/prepend.inc';

$SIDEBAR_DATA = '
<div class="panel" style="position:fixed">
  <div class="headline">Table of Contents</div>
  <div class="body">
    <ul>
      <li><a href="#documentation">Documentation</a></li>
      <li><a href="#community-support">Community Support</a></li>
      <li><a href="#user-groups-events">User Groups &amp; Events</a></li>
      <li><a href="#archive">Archive (Legacy resources)</a></li>
      <!-- Purposefully no link to the webmasters -->
    </ul>
  </div>
</div>
';

site_header(
    'Getting Help',
    [
        'current' => 'help',
    ],
);
?>

<h2 id="documentation">Documentation</h2>

<p>
 A good place to start is by skimming through the ever-growing list of <a
 href="/FAQ.php">frequently asked questions (with answers, of course)</a>. Then
 have a look at the rest of the online manual and other resources in the <a
 href="/docs.php">documentation</a> section.
</p>

<h2 id="community-support">Community Support</h2>

<p>
 For day-to-day help and troubleshooting, the broader PHP community is very active in a few places:
</p>
<ul>
 <li>
  <p><strong>Reddit:</strong> <a href="https://www.reddit.com/r/PHP/">r/PHP</a> — look for the Weekly help threads that are pinned to the top for beginner and general questions.</p>
 </li>
 <li>
  <p><strong>Stack Overflow:</strong> browse or ask questions using the <a href="https://stackoverflow.com/questions/tagged/php">php tag</a>.</p>
 </li>
 <li>
  <strong>Discord:</strong> there are many community-ran servers for chat-based help and discussion. Here are a couple of popular ones:
  <ul>
   <li><a href="https://phpc.chat/">phpc.chat</a></li>
   <li><a href="https://discord.gg/php-developers-484326318851358720">PHP Developers</a></li>
  </ul>
 </li>
 <li>
  <strong>IRC:</strong> real-time chat at <a href="https://libera.chat/">Libera.Chat</a> in <strong>#phpc</strong>.
  This channel is also bridged with Discord via <a href="https://phpc.chat/">phpc.chat</a>.
 </li>
</ul>

<h2 id="user-groups-events">User Groups &amp; Events</h2>

<p>
 Connect with local and regional PHP User Groups and find upcoming meetups, conferences, and training sessions:
</p>
<ul>
 <li>Find a user group near you on <a href="https://php.ug/">PHP.ug</a>.</li>
 <li>Browse upcoming events on the <a href="/cal.php">event calendar</a>.</li>
 <li>Want to list an event? Submit it <a href="/submit-event.php">here</a>.</li>
</ul>

<h2 id="archive">Archive (Legacy Resources)</h2>

<h3 id="mailing-lists">Mailing Lists</h3>
<p>
 Historically, a number of mailing lists were devoted to talking about PHP and related projects. While
 many are no longer active, you can still find their descriptions and archives on <a href="mailing-lists.php">this page</a>.
</p>

<h3 id="newsgroups">Newsgroups</h3>
<p>
 There was a PHP language NNTP newsgroup at comp.lang.php, and many of our support mailing
 lists are also reflected onto our news server at <a href="news://news.php.net">news://news.php.net/</a>.
 The server also has a read only web interface at
 <a href="https://news-web.php.net/">https://news-web.php.net/</a>.
</p>
<p>
 Please note that these are legacy resources and primarily useful for historical reference.
</p>

<h2 id="webmasters">PHP.net webmasters</h2>

<p>
 If you have a problem or suggestion <em>in connection with the PHP.net
 website</em>, <a href="/contact.php">please contact the webmasters</a>.
</p>
<p>
 If you have problems setting up PHP or using some functionality,
 please ask your question on a support channel detailed above,
 the webmasters will not answer any such questions.
</p>

<?php site_footer(['sidebar' => $SIDEBAR_DATA]); ?>
