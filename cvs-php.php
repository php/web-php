<?php
require_once 'prepend.inc';
require_once 'email-validation.inc';
require_once 'posttohost.inc';

commonHeader("Using CVS for PHP Development");
?>

<h1>Using CVS for PHP Development</h1>

<?php

if ($in && $checkread) {

  $cleaned = array();
  if (get_magic_quotes_gpc()) {
    while (list($k,$v) = each($in)) {
      $cleaned[$k] = stripslashes($v);
    }
  }

  $error = "";

  if (empty($in[id])) {
    $error .= "You must supply a desired CVS id. ";
  } elseif(!preg_match('/^[a-z]\w+$/',$in[id])) {
	$error .= "Your user id must >1 char long, start with a letter and contain nothing but a-z or 0-9 and _";
  }
  if (empty($in[fullname])) {
    $error .= "You must supply your real name. ";
  }
  if (empty($in[purpose])) {
    $error .= "You must supply a reason for requesting the CVS account. ";
  }
  if (empty($in[password])) {
    $error .= "You must supply a desired password. ";
  }
  if (empty($in[email]) || !is_emailable_address($cleaned[email])) {
    $error .= "You must supply a desired CVS id. ";
  }

  if (!$error) {
    $error = posttohost("http://master.php.net/entry/cvs-account.php", array(
                "username" => $cleaned[id],
                "name" => $cleaned[fullname],
                "email" => $cleaned[email],
                "passwd" => $cleaned[password],
                "note" => $cleaned[purpose]
              ));
    if ($error) {
      $error = "When trying to create the account, an error occured: $error.";
    }
  }

  if ($error) {
    echo "<p class=\"formerror\">$error</p>";
  }
  else {
?>
<p>
Thank you. Your request has been sent. You should hear something within the
next week or so. If you haven't heard anything by then, send an email to <a
href="mailto:group@php.net">group@php.net</a> to let us know that we've
forgotten you, but you haven't forgotten us! (It happens. There's several of
us, and sometimes we think that someone else has taken care of your request,
and they think that we took care of it. Sorry.)
</p>

<p>
If you are not familiar with CVS, you should have a look at the various
documentation resources available at <a
href="http://www.cvshome.org/">CVShome.org</a>. This is also where
to get the most recent version of the CVS client.
</p>

<p>
All CVS commit messages get sent to the php-cvs mailing list. You should
subscribe yourself to this mailing list. Instructions for subscribing
are on the <a href="/support.php">Support</a> page.
</p>

<p>
CVS itself is quite easy to use. Follow the steps listed on the <a
href="anoncvs.php">anonymous CVS</a> page for checking out your tree.
Substitute your own user name for 'cvsread' and use the password you
submitted. You will not be able to do this until
you receive confirmation of your account having been created.
</p>

<p>
Next, once you have your CVS tree you need to know the following commands.
They should all be executed from within the checked out tree. eg. cd php4
<dl>
<dt><b><tt>cvs update -dP</tt></b></dt>
<dd>This fetches all updates made by others and brings your tree up to date.
Before starting to edit anything in the tree you should do this. Generally you
would do this whenever you see a CVS commit message on the php-cvs mailing
list.</dd>
<dt><b><tt>cvs commit</tt></b></dt>
<dd>This commits any changes you have made anywhere in the tree.  A text editor
will pop up and you will need to describe the changes you made.  Please provide
a good description here as it may help people in the future when looking at
your code changes.</dd>
</dl>
</p>
<?php
    commonFooter();
    exit;
  }
}
else {
  if ($in && !$checkread) {?>
<p class="formerror">We could not have said it more clearly. Read everything on
this page and look at the form you are submitting carefully.</p>
<?php
  }
?>
<p>
All PHP development is done through a distributed revision control system
called <a href="http://www.cvshome.org/">CVS</a>. This helps us track changes
and it makes it possible for people located in all corners of the world to
collaborate on a project without having to worry about stepping on each
others' toes.
</p>

<p>
Please note that you do <b>not</b> need a CVS account to <a
href="/anoncvs.php"><b>access</b> the CVS tree</a>, to use PHP, or to
write PHP scripts. You only need a CVS account if you will be a
regular contributor to the development of PHP itself.
</p>

<p>
And once again since people just don't seem to understand this point:
</p>

<table border="0" cellpadding="3">
 <tr bgcolor="#cccccc">
  <td><b>Does <u>Not</u> Require CVS Account</b></td>
  <td><b>Requires CVS Account</b></td></tr>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Learning PHP</td>
  <td bgcolor="#eeeeee">Developing the PHP runtime</td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Coding in PHP</td>
  <td bgcolor="#eeeeee">Maintaining an official, bundled PHP extension</td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Reading the PHP source</td>
  <td bgcolor="#eeeeee">Maintaining the documentation</td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Using PHP extensions</td>
  <td bgcolor="#eeeeee">Translating the documentation</td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Creating experimental PHP extensions</td>
  <td bgcolor="#eeeeee">Maintaining www.php.net</td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Submitting a patch to PHP</td>
  <td bgcolor="#eeeeee">&nbsp;</td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Adding notes to the documentation</td>
  <td bgcolor="#eeeeee">&nbsp;</td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Writing web pages with PHP</td>
  <td bgcolor="#eeeeee">&nbsp;</td>
 </tr>
 <tr>
  <td bgcolor="#dddddd">Setting up a php.net mirror site</td>
  <td bgcolor="#eeeeee">&nbsp;</td>
 </tr>
</table>

<p>
If you are contributing a patch, a small fix, or another minor change you do
not need to ask for a CVS account before submitting it. Just send your patch to
<a href="mailto:internals@lists.php.net">internals@lists.php.net</a>. You should
subscribe to that list (send a blank mail to <a
href="mailto:internals-subscribe@lists.php.net">internals-subscribe@lists.php.net</a>)
to participate in any discussion your patch generates! Your patch may not get
noticed the first time. Make sure that when you send your patch, you explain
what it does. Make sure you use a clear subject when sending your patch (you
might even want to prefix it with "[PATCH]"). If nobody seems to take notice
after a few days, you might want to try resubmitting it. Your original message
might have gotten missed because of another heated discussion.
</p>

<p>
Submitting patches and participating in the discussion on the 'internals' list
<b>before</b> requesting full CVS access is strongly suggested, so the PHP
development team can get to know you and what you'll be contributing. It is
suggested that all PHP developers (people developing PHP itself, not people
developing <b>in</b> PHP) subscribe to this list. (Similarly, if you plan on
contributing documentation, you should subscribe to the documentation mailing
list by sending a blank mail to <a
href="mailto:phpdoc-subscribe@lists.php.net">phpdoc-subscribe@lists.php.net</a>).
</p>

<p>
Okay, if you are still reading, I assume you may actually need a CVS account.
This is <b>not</b> an automatic process. Fill in the form below to request an
account. In the box next to "Purpose", describe what it is that you intend to
do with CVS access. If it isn't clear from what you've described already, tell
us what parts of the CVS repository you need access to (for example, "phpdoc"
is the documentation tree, "php4/ext/mysql" is the PHP 4 Mysql extension). If
someone told you to fill out the form here, make sure to mention them here!
</p>

<p>
The CVS account, once granted and activated (which could take a while, so be
patient!), gives you access to a number of things.  First, and most
importantly, it gives you access to modify those parts of PHP CVS tree for
which you have requested and been granted access. It also allows you to comment
on and close bugs in our <a href="http://bugs.php.net/">bug database</a>, and
allows you to modify the documentation notes in the <a href="/manual/">annotated manual</a>.  Your CVS account also
translates into a foo@php.net forwarding email address where <b>foo</b> is your
CVS user id. Feel free to use it!
</p>

<p>
Please note:<br>
<b>
You do <i>NOT</i> need a CVS account to study PHP. You do <i>NOT</i> need
a CVS account to learn PHP, to use PHP or to in any way do anything at all
with PHP. If you are sitting there wondering if you need a CVS account,
then you don't!
</b>
</p>
<?php
}
?>
<form action="<?php echo $PHP_SELF;?>" method="POST">
<table border="0">
<tr>
 <th>Full Name: </th>
 <td><input type="text" size="50" name="in[fullname]" value="<?php echo clean($in[fullname]);?>" /></td>
</tr>
<tr>
 <th>Email: </th>
 <td><input type="text" size="50" name="in[email]" value="<?php echo clean($in[email]);?>" /></td>
</tr>
<tr>
 <th valign="top">Purpose: </th>
 <td><textarea cols="50" rows="5" name="in[purpose]"><?php echo clean($in[purpose]);?></textarea></td>
</tr>
<tr>
 <th>User ID: (single word, lower case)</th>
 <td><input type="text" size="10" name="in[id]" value="<?php echo clean($in[id]);?>" /></td>
</tr>
<tr>
 <th>Requested Password: </th>
 <td><input type="password" size="10" name="in[password]" value="<?php echo clean($in[password]);?>" /></td>
</tr>
<?php
# if checkread is set here, we're redisplaying the form because of an error.
if ($checkread) {
  echo "<input type=\"hidden\" name=\"checkread\" value=\"1\" />\n";
}
else {?>
<tr><th></th><td>By checking this box you are claiming that you have read <I>all</I> of the comments above <input type="checkbox" name="checkread" value="1" /></td></tr>
<?php
}?>
<tr><th>&nbsp;</th><td><input type="submit" value="Send It" /></td></tr>
</table>
</form>

<?php commonFooter(); ?>
