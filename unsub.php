<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'unsub.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Unsubscribing");
?>

<h1>Unsubscribing From a Mailing List</h1>

<p>
 All of the mailing lists hosted at <a
 href="http://lists.php.net/">lists.php.net</a> are managed using the <a
 href="http://www.ezmlm.org/">ezmlm-idx</a> mailing list software.
 </p>

<p>
 <strong>If the mailing list you would like to unsubscribe from is
 in the list on our <a href="/mailing-lists.php">mailing lists page</a>,
 then you don't need to use your mail client to unsubscribe, you can do
 so on the web, using the form on the page.</strong> If you still need
 to find out what email address you used to subscribe, the instructions
 on this page can help.
</p>

<p>
 First off, if your email address has changed since you subscribed, don't
 panic! If you are still able to receive mail at your old email address,
 you can still unsubscribe without having to wait for someone to do it
 manually! An explanation of how to unsubscribe an email address other
 than your current one from the mailing lists is located
 <a href="#unsubdiff">further below</a>.
</p>

<p>
 To unsubscribe from one of those mailing lists, all you usually need to
 do is send an email to <tt><em>listname</em>-unsubscribe@lists.php.net</tt>
 (substituting the name of the list for <tt><em>listname</em></tt>
 &mdash; for example, <tt>php-general-unsubscribe@lists.php.net</tt>).
</p>

<p>
 If you are subscribed to the <strong>digest version</strong> of the
 mailing list, you need to send an email to
 <tt><em>listname</em>-digest-unsubscribe@lists.php.net</tt>.
</p>

<p>
 You will get an automated response with further instructions on how to
 unsubscribe from the list. (You are not simply unsubscribed immediately
 so that someone can't unsubscribe other people from the list without
 their consent.)
</p>

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
 <tt>joecool@example.com</tt>, the 'Return-Path' header will look
 something like:
</p>

<pre>
 Return-Path: &lt;php-general-return-1234-joecool=example.com@lists.php.net&gt;
</pre>

<div class="tip">
 <p>
  If you use <a href="http://www.eudora.com/">Eudora</a>, you can view the
  full headers of a message by clicking on the 'Blah Blah Blah' toolbar button
  above the message.
 </p>
 <p>
  If you use <a href="http://www.microsoft.com/outlook/">Microsoft
  Outlook</a>, you can view the full headers of a message by either clicking
  on the 'Options' tab (Outlook 97) or selecting the 'Options...' item from
  the 'View' menu. The headers are displayed at the bottom of the resulting
  window.
 </p>
 <p>
  If you use <a href="http://www.microsoft.com/Windows/oe/">Microsoft Outlook
  Express</a>, you can view the full headers of a message by selecting
  'Properties' from the 'File' menu and then clicking on the 'Details' tab.
 </p>
 <p>
  If you use <a href="http://www.mutt.org/">mutt</a>, you can view the full
  headers of a message by typing 'h' in the message or list view (or
  whatever key you have bound to the 'display-toggle-weed' function).
 </p>
 <p>
  If you use <a href="http://www.netscape.com/">Netscape Messenger 4.x</a>,
  you can view the full headers of a message by selecting 'Headers&rarr;All'
  from the 'View' menu.
 </p>
 <p>
  If you use <a href="http://texturizer.net/thunderbird/">Mozilla Thunderbird</a>,
  you can view the full headers of a message by selecting 'Headers&rarr;All'
  from the 'View' menu, and expanding the headers section of the display by
  clicking on the triangle icon.
 </p>
<!-- need more instructions on how to view full headers in various mail
     programs, particuarly online services like yahoo.com and hotmail.com -->
</div>

<p>
 To <a name="unsubdiff">unsubscribe an address like this that is
 different</a> from what the mailing list software recognizes as your
 own address, you need to send mail to
 <tt><em>listname</em>-unsubscribe-<em>joecool=example.com</em>@lists.php.net</tt>
 (or <tt>-unsubscribe-digest-</tt>, if the address is subscribed to the
 digest format of the list).
</p>

<p>
 Once you have done that, you will receive a message at that email address
 with instructions on how to complete your unsubscription request.
</p>

<p>
 If you are receiving mail from one of the mailing lists, there should be
 absolutely no reason that you would be unable to unsubscribe yourself from
 the list, except for your ability to follow these directions. However, if
 you find yourself unable to unsubscribe from the mailing list, send an
 email to <tt>php-list-admin@lists.php.net</tt>. Make sure to include the
 <strong>complete</strong> headers from one of the messages you have
 received from the mailing list. Keep in mind that there's a human being
 at the other end of that last email address, so you'll have to be patient.
</p>

<?php site_footer(); ?>
