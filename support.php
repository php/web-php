<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'support.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA ='
<div class="panel" style="position:fixed">
  <div class="headline">Table of Contents</div>
  <div class="body">
    <ul>
      <li><a href="#documentation">Documentation</a></li>
      <li><a href="#mailing-lists">Mailing Lists</a></li>
      <li><a href="#newsgroups">Newsgroups</a></li>
      <li><a href="#user-groups">User Groups</a></li>
      <li><a href="#events-training">Events &amp; Training</a></li>
      <li><a href="#irc">IRC</a></li>
      <!-- Purposefully no link to the webmasters -->
    </ul>
  </div>
</div>
';

site_header(
    'Getting Help',
    array(
        'current' => 'help',
    )
);
?>

<h2 id="documentation">Documentation</h2>

<p>
 A good place to start is by skimming through the ever-growing list of <a
 href="/FAQ.php">frequently asked questions (with answers, of course)</a>. Then
 have a look at the rest of the online manual and other resources in the <a
 href="/docs.php">documentation</a> section.
</p>

<h2 id="mailing-lists">Mailing Lists</h2>

<p>
 There are a number of mailing lists devoted to talking about PHP and related
 projects. <a href="mailing-lists.php">This list</a> describes them all, has
 links to searchable archives for all of the lists, and explains how to
 subscribe to the lists.
</p>

<h2 id="newsgroups">Newsgroups</h2>

<p>
 The PHP language newsgroup is comp.lang.php, available on any
 news server around the globe. In addition to this many of our mailing
 lists are also reflected onto the news server at
 <a href="news://news.php.net">news://news.php.net/</a>. The
 server also has a read only web interface at
 <a href="http://news.php.net/">http://news.php.net/</a>.
</p>

<p>
 Mailing list messages are transfered to newsgroup posts and
 newsgroup posts are sent to the mailing lists. Please note
 that these newsgroups are only available on this server.
</p>

<h2 id="user-groups">User Groups</h2>

<p>
 Chances are that there is a User Group in your neighborhood, which are generally
 a great resource both for beginners and experienced PHP users.
 Check out the User Group listing on <a href="http://php.ug/">PHP.ug</a> to see if there
 is one close by.
</p>

<h2 id="events-training">Events &amp; Training</h2>

<p>
 A list of upcoming events (such as user group meetings and PHP training
 sessions) is included in the right-hand column of the front page, and
 on the <a href="/cal.php">event calendar page</a>. If you want to list
 an upcoming event, just fill out the form <a
 href="/submit-event.php">on this page</a>.
</p>

<h2 id="irc">Internet Relay Chat</h2>

<p>
 Otherwise known as IRC. Here you can usually find experienced PHP people 
 sitting around doing nothing on various channels with php in their names.  
 Note that there is no official IRC channel. Check 
 <a href="http://www.freenode.net/">freenode</a> or any other major network
 (<a href="http://www.efnet.org/">EFNet</a>,
 <a href="http://www.quakenet.org">QuakeNet</a>,
 <a href="http://www.ircnet.com/">IRCNet</a>, 
 <a href="http://www.icq.com">IrCQNet</a>,
 <a href="http://www.dal.net/">DALNet</a> and
 <a href="http://oftc.net">OFTC</a>).
</p>

<h2 id="webmasters">PHP.net webmasters</h2>

<p>
 If you have a problem or suggestion <em>in connection with the PHP.net
 website or mirror sites</em>, <a href="/contact.php">please
 contact the webmasters</a>. If you have problems setting up PHP
 or using some functionality, please ask your question on a support
 channel detailed above, the webmasters will not answer any such
 questions.
</p>

<?php site_footer(array('sidebar' => $SIDEBAR_DATA)); ?>
