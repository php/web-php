<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'unsub.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
$SIDEBAR_DATA = '
<h3>Other PHP related mailing lists</h3>

<p>
 Unsubscribe from the <a href="http://pear.php.net/support/lists.php">PEAR
 lists</a>, the <a href="http://pecl.php.net/support.php">PECL
 lists</a>, and the <a href="http://gtk.php.net/resources.php">PHP-GTK
 lists</a> on their own pages.
</p> 
';
site_header("Unsubscribing", array("current" => "community"));
?>

<h1>Unsubscribing From a Mailing List</h1>

<div class="tip">
<p class="tip">
 If the mailing list you would like to unsubscribe from is
 in the list on our <a href="/mailing-lists.php">mailing lists page</a>,
 then you don't need to use your mail client to unsubscribe, you can do
 so on the web, using the form on the page. If you still need
 to find out what email address you used to subscribe, the instructions
 on this page can help.
</p>
</div>

<p>
 First off, if your email address has changed since you subscribed, don't
 panic! If you are still able to receive mail at your old email address,
 you can still unsubscribe without having to wait for someone to do it
 manually! An explanation of how to unsubscribe an email address other
 than your current one from the mailing lists is located
 <a href="#unsubdiff">further below</a>.
</p>

<h2>Simple unsubscribe by email</h2>

<p>
 To unsubscribe from one of those mailing lists, all you usually need to
 do is send an email to <code><em>listname</em>-unsubscribe@lists.php.net</code>
 (substituting the name of the list for <code><em>listname</em></code>
 &mdash; for example, <code>php-general-unsubscribe@lists.php.net</code>).
</p>

<p>
 If you are subscribed to the <strong>digest version</strong> of the
 mailing list, you need to send an email to
 <code><em>listname</em>-digest-unsubscribe@lists.php.net</code>.
</p>

<p>
 You will get an automated response with further instructions on how to
 unsubscribe from the list. You are not simply unsubscribed immediately
 so that someone can't unsubscribe other people from the list without
 their consent.
</p>

<h2>Find out the email address used to subscribe</h2>

<p>
 If you get a reply that says you are not subscribed to the mailing list,
 but you are receiving mailing list traffic, it may be because your email
 is now coming from a different address than when you first subscribed.
 (This is determined using the SMTP "envelope sender", <strong>not</strong>
 the 'From:' or any other header in your email. So you may not have
 changed anything, it may have been a change to your mail server or
 at your ISP.)
</p>

<p>
 To determine what email address is subscribed to the mailing list that
 you are receiving the messages from, you'll need to inspect the headers
 of one of those messages. The email address will be encoded in the
 'Return-Path' header with the @-sign replaced with an equals (=) sign.
 For example, if the subscribed email address is
 <code>joecool@example.com</code>, the 'Return-Path' header will look
 something like:
</p>

<pre class="info">
 Return-Path: &lt;php-general-return-1234-joecool=example.com@lists.php.net&gt;
</pre>

<h3>Viewing full headers in different email applications</h3>

<dl>
 <dt><a href="http://www.eudora.com/">Eudora</a></dt>
 <dd>
  Click on the 'Blah Blah Blah' toolbar button above the message.
 </dd>

 <dt><a href="http://gmail.google.com/">Gmail</a></dt>
 <dd>
  While viewing a message, click on 'More options' and 'Show original'.
  This will display the headers for that message in a new window.
 </dd>

 <dt><a href="http://www.hotmail.com/">Hotmail</a></dt>
 <dd>
  Click on 'Options', 'Mail' and then 'Mail Display Settings'. Change
  the 'Message Headers' section to 'Advanced', and click OK.
 </dd>

 <dt><a href="http://mail.yahoo.com/">Yahoo! Mail</a></dt>
 <dd>
  Click on 'Mail Options' and 'General Preferences'. Under the 'Messages'
  section, select 'Show all headers on incoming messages' for the 'Headers'
  option and click 'Save'.
 </dd>

 <dt><a href="http://www.apple.com/macosx/features/mail/">Mail for Mac OS X</a></dt>
 <dd>
  Click on the 'Mail' drop-down menu and select 'Preferences'. Click on
  the 'Viewing' icon, and then the arrow on the 'Show header detail'
  and select 'All'.
 </dd>

 <dt><a href="http://www.microsoft.com/outlook/">Microsoft Outlook</a></dt>
 <dd>
  Either click on the 'Options' tab (Outlook 97) or select the 'Options...' item
  from the 'View' menu (Outlook 98, 2000, 2003). The headers are displayed at the
  bottom of the resulting window.
 </dd>

 <dt><a href="http://www.microsoft.com/Windows/oe/">Microsoft Outlook Express</a></dt>
 <dd>
  Select 'Properties' from the 'File' menu and then click on the 'Details' tab.
 </dd>

 <dt><a href="http://www.mutt.org/">mutt</a></dt>
 <dd>
  Type 'h' in the message or list view (or whatever key you have
  bound to the 'display-toggle-weed' function).
 </dd>

 <dt><a href="http://www.mozilla.com/thunderbird/">Mozilla Thunderbird</a></dt>
 <dd>
  Select 'Headers&rarr;All' from the 'View' menu, and expand the headers
  section of the display by clicking on the triangle icon.
 </dd>

 <dt><a href="http://www.pmail.com/">Pegasus Mail</a></dt>
 <dd>
  Open the message in a new window and then press backspace or Ctrl-H.
 </dd>

 <dt><a href="http://www.washington.edu/pine/">Pine</a></dt>
 <dd>
  From the main Pine menu, type 'S' for 'Setup', then 'C' for 'Config'. 
  Use the space bar and down arrow to scroll until you reach the
  <code>[ ] enable-full-header-cmd</code> option. Type 'X' in the box
  to toggle the option on. Type 'E' to exit 'Config', and 'Y' to save
  changes. The next time you read a message, type 'H' and the full
  headers will be displayed at the top of the message. Type 'H' again
  to hide the headers. 
 </dd>
</dl>

<a name="unsubdiff"></a>
<h2>Unsubscribe with a different email address</h2>

<p>
 To unsubscribe an address like this that is different from what the
 mailing list software recognizes as your own address, you need to send mail to
 <code><em>listname</em>-unsubscribe-<em>joecool=example.com</em>@lists.php.net</code>
 (or <code>-unsubscribe-digest-</code>, if the address is subscribed to the
 digest format of the list).
</p>

<p>
 Once you have done that, you will receive a message at that email address
 with instructions on how to complete your unsubscription request.
</p>

<h2>Still need help?</h2>

<p>
 If you are receiving mail from one of the mailing lists, there should be
 absolutely no reason that you would be unable to unsubscribe yourself from
 the list, except for your ability to follow these directions. However, if
 you find yourself unable to unsubscribe from the mailing list, send an
 email to <code>php-list-admin@lists.php.net</code>. Make sure to include the
 <strong>complete</strong> headers from one of the messages you have
 received from the mailing list. Keep in mind that there's a human being
 at the other end of that last email address, so you'll have to be patient.
</p>

<?php site_footer(); ?>
