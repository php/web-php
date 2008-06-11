<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'cvs-php.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/email-validation.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/posttohost.inc';

$SIDEBAR_DATA = '
<h3>More about CVS</h3>
<p>
 You can find more information about CVS, and
 download clients for most major platforms, at
 <a href="http://ximbiot.com/cvs/wiki/index.php">the CVS Wiki</a>.
</p>

<h3>Anonymous CVS access</h3>
<p>
 If you would like to grab PHP sources or other PHP.net
 hosted project data from PHP.net, you can also use 
 <a href="/anoncvs.php">anonymous CVS</a>.
</p>
';
site_header("Using CVS for PHP Development");

$groups = array(
  "php"  => "PHP Group",
  "pear" => "PEAR Group",
  "pecl" => "PECL Group",
  "doc"  => "Doc Group",
);

?>

<h1>Using CVS for PHP Development</h1>

<?php

// We have a form submitted, and the user have read all the comments
if (count($_POST) && (!is_array($_POST['purpose']) || !count($_POST['purpose']))) {

    // Clean up incoming POST vars
    if (get_magic_quotes_gpc()) {
        foreach ($_POST as $k => $v) {
            $cleaned[$k] = stripslashes($v);
        }
    }
    else {
        $cleaned = $_POST;
    }

    // No error found yet
    $error = "";

    // Check for errors
    if (empty($_POST['id'])) {
        $error .= "You must supply a desired CVS id. ";
    } elseif(!preg_match('!^[a-z]\w+$!', $_POST['id'])) {
        $error .= "Your user id must be >1 char long, start with ".
                  "a letter and contain nothing but a-z or 0-9 and _";
    }
    if (empty($_POST['fullname'])) {
        $error .= "You must supply your real name. ";
    }
    if (empty($_POST['realpurpose'])) {
        $error .= "You must supply a reason for requesting the CVS account. ";
    }
    if (empty($_POST['password'])) {
        $error .= "You must supply a desired password. ";
    }
    if (empty($_POST['email']) || !is_emailable_address($cleaned['email'])) {
        $error .= "You must supply a proper email address. ";
    }
    if (empty($_POST['yesno']) || $_POST['yesno'] != 'yes') {
        $error .= "You did not fill the form out correctly. ";
    }
    if (empty($_POST['group']) || !isset($groups[$_POST['group']])) {
        $error .= "You did not fill out where to send the request. ";
    }

    // Post the request if there is no error
    if (!$error) {
        $error = posttohost(
            "http://master.php.net/entry/cvs-account.php",
            array(
                "username" => $cleaned['id'],
                "name"     => $cleaned['fullname'],
                "email"    => $cleaned['email'],
                "passwd"   => $cleaned['password'],
                "note"     => $cleaned['realpurpose'],
                "yesno"    => $cleaned['yesno'],
                "group"    => $cleaned['group'],
            )
        );
        // Error while posting
        if ($error) {
            $error = "An error occured when trying to create the account: $error.";
        }
    }

    // Some error was found, while checking or submitting the data
    if ($error) {
        echo "<p class=\"formerror\">$error</p>";
    }
    else {
?>
<p>
 Thank you. Your request has been sent. You should hear something within the
 next week or so. If you haven't heard anything by then, send an email to <a
 href="mailto:group@php.net">group@php.net</a> to let us know that we've
 forgotten you, but you haven't forgotten us! It happens. There's several of
 us, and sometimes we think that someone else has taken care of your request,
 and they think that we took care of it. Sorry. You can also speed up the
 process by having an existing CVS account holder who works in the area you are
 interested in mail us to vouch for you.
</p>

<p>
 If you are not familiar with CVS, you should have a look at the various
 documentation resources available in <a
 href="http://ximbiot.com/cvs/wiki/index.php">the CVS Wiki</a>. This is
 also where to get the most recent version of the CVS client.
</p>

<p>
 All CVS commit messages to the PHP sources get sent to the php-cvs mailing list.
 You should subscribe yourself to this mailing list. Instructions for subscribing
 are on the <a href="/mailing-lists.php">Mailing Lists</a> page.
</p>

<p>
 CVS itself is quite easy to use. You will not be able to check out your
 own copy of the CVS tree, until you receive confirmation of your account
 having been created. After that, you can follow the steps listed on the
 <a href="/anoncvs.php">anonymous CVS</a> page for checking out your tree.
 Substitute your own user name for 'cvsread' and use the password you
 submitted.
</p>

<p>
 Next, once you have your CVS tree you need to know the following commands.
 They should all be executed from within the checked out tree. eg.
 <tt>cd php-src</tt>.
</p>

<dl>
 <dt><strong><tt>cvs update -dP</tt></strong></dt>
 <dd>
  This fetches all updates made by others and brings your tree up to date.
  Before starting to edit anything in the tree you should do this. Generally
  you would do this whenever you see a CVS commit message on the php-cvs
  mailing list.</dd>
 <dt><strong><tt>cvs commit</tt></strong></dt>
 <dd>
  This commits any changes you have made anywhere in the tree. A text
  editor will pop up and you will need to describe the changes you made.
  Please provide a good description here as it may help people in the
  future when looking at your code changes.
 </dd>
</dl>
<?php
        site_footer();
        exit;
    } // endif: no error found
} // endif: no data or checkread not checked

else {
	if (count($_POST)) {
        print <<<EOT
<p class="formerror">
 We could not have said it more clearly. Read everything on
 this page and look at the form you are submitting carefully.
</p>
EOT;
    }
?>

<p>
 All PHP development is done through a distributed revision control system
 called CVS. This helps us track changes and it makes it possible for people
 located in all corners of the world to collaborate on a project without
 having to worry about stepping on each others' toes.
</p>

<p>
 Please note that you do <strong>not</strong> need a CVS account to <a
 href="/anoncvs.php"><strong>access</strong> the CVS tree</a>, to use PHP,
 or to write PHP scripts. You only need a CVS account if you will be a
 regular contributor to the development of PHP itself.
</p>

<p>
 And once again since people just don't seem to understand this point:
</p>

<table border="0" cellpadding="3" class="standard">
 <tr>
  <th>Does Not Require CVS Account</th>
  <th>Requires CVS Account</th>
 </tr>
 <tr>
  <td class="sub">Learning PHP</td>
  <td>Developing the PHP runtime</td>
 </tr>
 <tr>
  <td class="sub">Coding in PHP</td>
  <td>Maintaining an official, bundled PHP extension</td>
 </tr>
 <tr>
  <td class="sub">Reading the PHP source</td>
  <td><a href="/dochowto">Maintaining the documentation</a></td>
 </tr>
 <tr>
  <td class="sub">Using PHP extensions</td>
  <td><a href="/dochowto">Translating the documentation</a></td>
 </tr>
 <tr>
  <td class="sub">Creating experimental PHP extensions</td>
  <td>Maintaining www.php.net</td>
 </tr>
 <tr>
  <td class="sub">Submitting a patch to PHP</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td class="sub">Adding notes to the documentation</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td class="sub">Writing web pages with PHP</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td class="sub">Setting up a php.net mirror site</td>
  <td>&nbsp;</td>
 </tr>
</table>

<p>
 If you are contributing a patch, a small fix, or another minor change you do
 not need to ask for a CVS account before submitting it. Just send your patch to
 <a href="mailto:internals@lists.php.net">the internals mailing list</a>. You
 should <a href="mailto:internals-subscribe@lists.php.net">subscribe to that
 list</a> to participate in any discussion your patch generates! Your patch may
 not get noticed the first time. Make sure that when you send your patch, you
 explain what it does. Make sure you use a clear subject when sending your
 patch (you might even want to prefix it with <tt>"[PATCH]"</tt>). If nobody
 seems to take notice after a few days, you might want to try resubmitting it.
 Your original message might have gotten missed because of another heated
 discussion.
</p>

<p>
 Submitting patches and participating in the discussion on the 'internals' list
 <strong>before</strong> requesting full CVS access is strongly suggested, so
 the PHP development team can get to know you and what you'll be contributing.
 It is suggested that all PHP developers (<strong>people developing PHP
 itself</strong>, not people developing in PHP) subscribe to this list.
 Similarly, if you plan on contributing documentation, you should
 <a href="mailto:phpdoc-subscribe@lists.php.net">subscribe to the
 documentation mailing list</a>, and read the <a href="/dochowto">PHP
 Documentation HOWTO</a>.
</p>

<p>
 If you wish to contribute to the documentation please contact the translation
 team for the language you wish to help with. If you have trouble finding the
 team, ask on the phpdoc mailing list. Once you have made contact you may
 apply for a CVS account here by including the name of one or more people from
 the existing translation team that referred you and of course the language
 you wish to translate to.
</p>

<p>
 If you have a new PEAR package you wish to contribute, propose it
 through the PEPR system on the PEAR website. If you have a new PECL
 extension you wish to contribute, bring it up on the appropriate PECL
 mailing list first. 
 <br />
 Once your PEAR package has been approved, or you get the sense that
 people generally agree that your PECL contribution is worthwhile, you
 may apply for a CVS account here. Specify the name of your PEAR package
 or PECL contribution (single word CVS module name) and also reference an
 existing account holder who can vouch for your contribution, or provide
 a link to your PEAR proposal.
</p>

<p>
 Okay, if you are still reading, then you may actually need a CVS account.
 This is <strong>not</strong> an automatic process. Fill in the form below to
 request an account. In the box next to "Purpose", describe what it is that
 you intend to do with CVS access. If it isn't clear from what you've
 described already, tell us what parts of the CVS repository you need access
 to (for example, "phpdoc" is the documentation tree, "php-src/ext/readline"
 is the PHP readline extension). If someone told you to fill out the form
 here, make sure to mention them here!
</p>

<p>
 The CVS account, once granted and activated (which could take a while, so be
 patient!), gives you access to a number of things. First, and most
 importantly, it gives you access to modify those parts of the PHP CVS tree for
 which you have requested and been granted access. It also allows you to comment
 on and close bugs in our <a href="http://bugs.php.net/">bug database</a>, and
 allows you to modify the documentation notes in the <a href="/manual/">annotated
 manual</a>. Your CVS account also translates into a foo@php.net forwarding email
 address where <strong>foo</strong> is your CVS user id. Feel free to use it!
</p>

<h2>Request a CVS account</h2>

<p class="warn">
 Please note that you do <em>NOT</em> need a CVS account to study PHP. You do
 <em>NOT</em> need a CVS account to learn PHP, to use PHP or to in any way do
 anything at all with PHP. If you are sitting there wondering if you need a
 CVS account, then you don't! If an existing CVS account holder suggested you
 request an account, please mention their CVS id in the request.
</p>

<?php
} // endif: no data submitted

?>
<form action="/cvs-php.php" method="post">
<table border="0" class="standard" style="width: 80%;">
<tr>
 <th class="subr">Full Name:</th>
 <td><input type="text" size="50" name="fullname"
      class="max" value="<?php if (isset($_POST['fullname'])) echo clean($_POST['fullname']);?>" /></td>
</tr>
<tr>
 <th class="subr">Email:</th>
 <td><input type="text" size="50" name="email"
      class="max" value="<?php if (isset($_POST['email'])) echo clean($_POST['email']);?>" /></td>
</tr>
<tr>
 <th class="subr">For what purpose do you require a CVS account:<br />
 (check all that apply)</th>
 <td>
<?php 
$purposes = array("Learning PHP", "Coding in PHP", "Reading the PHP source",
	"Using PHP extensions", "Creating experimental PHP extensions",
	"Submitting a patch to PHP", "Adding notes to the documentation",
	"Writing web pages with PHP", "Setting up a php.net mirror site");

foreach ($purposes as $i => $p) { ?>
  <input type="checkbox" name="purpose[<?php echo $i?>]" value="1" 
	checked="checked" /><?php echo $p; ?><br />
<?php } ?>
 </td>
</tr>
<tr>
 <th class="subr">If your intended purpose is not in the list, <br />please state it here:</th>
 <td><textarea cols="50" rows="5" name="realpurpose" class="max"><?php if (isset($_POST['realpurpose'])) echo clean($_POST['realpurpose']);?></textarea></td>
</tr>
<tr>
 <th class="subr">User ID:<br /> <small>(single word, lower case)</small></th>
 <td><input type="text" size="10" name="id"
      class="max" value="<?php if (isset($_POST['id'])) echo clean($_POST['id']);?>" /></td>
</tr>
<tr>
 <th class="subr">Requested Password:</th>
 <td><input type="password" size="10" name="password"
      class="max" value="<?php if (isset($_POST['password'])) echo clean($_POST['password']);?>" /></td>
</tr>
<tr>
 <th class="subr">Did you fill this form out correctly (yes/no)?</th>
 <td><input type="text" size="10" name="yesno" class="max" value="no" /></td>
</tr>
<tr>
 <th>Send this request to:</th>
 <td>
  <select name="group">
<?php
foreach($groups as $group => $name) {
  $selected = (isset($_POST["group"]) && $_POST["group"] == $group) ? ' selected="selected"' : '';
  echo "<option value='$group'$selected>$name</option>\n";
}
?>
  </select>
 </td>
</tr>
<tr>
 <th colspan="2"><input type="submit" value="Send Request" /></th>
</tr>
</table>
</form>

<?php site_footer();
