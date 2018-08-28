<?php
$_SERVER['BASE_PAGE'] = 'git-php.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/email-validation.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/posttohost.inc';

// Force the account requests to php.net
if (!is_primary_site()) {
    header('Location: http://php.net/'.$_SERVER['BASE_PAGE']);
    exit;
}

$SIDEBAR_DATA = '
<h3>More about Git</h3>
<p>
 You can find more information about Git and download clients for most major
 platforms at <a href="http://git-scm.com/">the official Git site</a>.
</p>

<h3>Git access</h3>
<p>
 If you would like to grab PHP sources or other PHP.net
 hosted project data from PHP.net, you can also use 
 <a href="/git.php">Git</a>. No Git account is required.
</p>
';
site_header("Using Git for PHP Development", array("current" => "community"));

$groups = array(
  "none" => "Choose One",
  "php"  => "PHP Group",
  "pear" => "PEAR Group",
  "pecl" => "PECL Group",
  "doc"  => "Doc Group",
);

?>

<h1 class="content-header">Using Git for PHP Development</h1>

<?php

// We have a form submitted, and the user have read all the comments
if (count($_POST) && (!isset($_POST['purpose']) || !is_array($_POST['purpose']) || !count($_POST['purpose']))) {
    // Clean up incoming POST vars
    if (function_exists('get_magic_quotes_gpc') && @get_magic_quotes_gpc()) {
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
        $error .= "You must supply a desired Git user id. <br>";
    } elseif(!preg_match('!^[a-z]\w+$!', $_POST['id'])) {
        $error .= "Your user id must be >1 char long, start with ".
                  "a letter and contain nothing but a-z, 0-9, and _ <br>";
    }
    if (empty($_POST['fullname'])) {
        $error .= "You must supply your real name. <br>";
    }
    if (empty($_POST['realpurpose'])) {
        $error .= "You must supply a reason for requesting the Git account. <br>";
    }
    if (empty($_POST['password'])) {
        $error .= "You must supply a desired password. <br>";
    }
    if (empty($_POST['email']) || !is_emailable_address($cleaned['email'])) {
        $error .= "You must supply a proper email address. <br>";
    }
    if (empty($_POST['yesno']) || $_POST['yesno'] != 'yes') {
        $error .= "You did not fill the form out correctly. <br>";
    }
    if (empty($_POST['group']) || $_POST['group'] === 'none' || !isset($groups[$_POST['group']])) {
        $error .= "You did not fill out where to send the request. <br>";
    }
    if (!isset($_POST['guidelines']) || !$_POST['guidelines']) {
        $error .= "You did not agree to follow the contribution guidelines. <br>";
    }

    // Post the request if there is no error
    if (!$error) {
        $error = posttohost(
            "http://master.php.net/entry/svn-account.php",
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
            $error = "An error occurred when trying to create the account: $error.";
        }
    }

    // Some error was found, while checking or submitting the data
    if ($error) {
        echo "<div class=\"warning\"><p>$error</p></div>";
    }
    else {
?>
<p>
 Thank you. Your request has been sent. You should hear something within the
 next week or so. If you haven't heard anything by around <?php echo date('l, F jS', time()+604800); ?>
 then please send an email to the appropriate <a href="/mailing-lists.php">mailing list</a>:
</p>
<ul>
 <li>Internals:     <a href="mailto:internals@lists.php.net">internals@lists.php.net</a></li>
 <li>Documentation: <a href="mailto:phpdoc@lists.php.net">phpdoc@lists.php.net</a></li>
 <li>PECL:          <a href="mailto:pecl-dev@lists.php.net">pecl-dev@lists.php.net</a></li>
 <li>PEAR:          <a href="mailto:pear-dev@lists.php.net">pear-dev@lists.php.net</a></li>
 <li>Other:         <a href="mailto:group@php.net">group@php.net</a></li>
</ul>
<p>
 This is to let us know that we've
 forgotten you, but you haven't forgotten us! It happens. There's several of
 us, and sometimes we think that someone else has taken care of your request,
 and they think that we took care of it. Sorry. You can also speed up the
 process by having an existing Git account holder who works in the area you are
 interested in mail us to vouch for you.
</p>

<p>
 If you are not familiar with Git, you should have a look at the various
 documentation resources available at
 <a href="http://git-scm.com/">the official Git site</a>.  This is also where
 to get the most recent version of the Git client.
</p>

<p>
 All Git commit messages to the PHP sources get sent to the php-git mailing lists.
 You should subscribe yourself to one or more of these mailing lists. Instructions
 for subscribing are on the <a href="/mailing-lists.php">Mailing Lists</a> page.
</p>

<p>
 Git itself is quite easy to use. You can follow the steps listed on the
 <a href="/git.php">Git</a> page for checking out your tree.  Please note that
 you do not have to log in to check out your tree; you will not be asked for
 your username and password until you attempt to commit changes.
</p>

<p>
 The <a href="https://wiki.php.net/vcs/gitworkflow">Git workflow</a> and
 <a href="https://wiki.php.net/vcs/gitfaq">Git FAQ</a> pages on the Wiki are
 good starting points to learn how we use Git to develop PHP. Beyond that, you
 can familiarise yourself with Git in general via the
 <a href="http://git-scm.com/documentation">Git documentation</a> and the
 <a href="http://progit.org/">Pro Git</a> book.  They should all be executed
 from within the checked out tree. eg.  <code>cd php-src</code>.
</p>

<?php
        site_footer();
        exit;
    } // endif: no error found
} // endif: no data or checkread not checked

else {
	if (count($_POST)) {
        print <<<EOT
<div class="warning">
<p>
 We could not have said it more clearly. Read everything on
 this page and look at the form you are submitting carefully.
</p>
</div>
EOT;
    }
?>

<div class="content-box">
<p>
 All PHP development is done through a distributed revision control system
 called Git. This helps us track changes and it makes it possible for people
 located in all corners of the world to collaborate on a project without
 having to worry about stepping on each others' toes.
</p>

<p>
 Please note that you do <strong>not</strong> need a Git account to <a
 href="/git.php"><strong>access</strong> the Git tree</a>, to use PHP,
 or to write PHP scripts. You only need a Git account if you will be a
 regular contributor to the development of PHP itself.
</p>

<p>
 And once again, since people just don't seem to understand this point:
</p>
</div>

<table border="0" cellpadding="3" class="standard">
 <tr>
  <th>Does Not Require Git Account</th>
  <th>Requires Git Account</th>
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
  <td><a href="http://doc.php.net/tutorial/">Maintaining the documentation</a></td>
 </tr>
 <tr>
  <td class="sub">Using PHP extensions</td>
  <td><a href="http://doc.php.net/tutorial/">Translating the documentation</a></td>
 </tr>
 <tr>
  <td class="sub">Creating experimental PHP extensions</td>
  <td>Maintaining php.net</td>
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

<h3 class="content-header">Contributing patches</h3>
<p class="content-box">
 If you are contributing a patch, a small fix, or another minor change you do
 not need to ask for a Git account before submitting it. Fork our
 <a href="https://github.com/php/php-src">GitHub repository</a> and create a
 <a href="http://help.github.com/send-pull-requests/">pull request</a>, attach
 a patch to a
 <a href="https://bugs.php.net/">bug report or feature request</a>,
 or send your patch to
 <a href="mailto:internals@lists.php.net">the Internals mailing list</a>. If
 you send the patch to Internals, you should
 <a href="mailto:internals-subscribe@lists.php.net">subscribe to that list</a>
 to participate in any discussion your patch generates! Your patch may
 not get noticed the first time. Make sure that when you send your patch, you
 explain what it does. Make sure you use a clear subject when sending your
 patch (you might even want to prefix it with <code>"[PATCH]"</code>). If nobody
 seems to take notice after a few days, you might want to try resubmitting it.
 Your original message might have gotten missed because of another heated
 discussion.
</p>

<p>
 Submitting patches and participating in the discussion on the Internals list
 <strong>before</strong> requesting full Git access is strongly suggested, so
 the PHP development team can get to know you and what you'll be contributing.
 It is suggested that all PHP developers (<strong>people developing PHP
 itself</strong>, not people developing in PHP) subscribe to this list.
 Similarly, if you plan on contributing documentation, you should
 <a href="mailto:phpdoc-subscribe@lists.php.net">subscribe to the
 documentation mailing list</a>, and read the
 <a href="http://doc.php.net/tutorial/">PHP Documentation HOWTO</a>.
</p>

<p>
 If you wish to contribute to the documentation please contact the translation
 team for the language you wish to help with. If you have trouble finding the
 team, ask on the phpdoc mailing list. Once you have made contact you may
 apply for a Git/SVN account here by including the name of one or more people
 from the existing translation team that referred you and of course the
 language you wish to translate to.
</p>

<p>
 If you have a new PEAR package you wish to contribute, propose it
 through the <a href="http://pear.php.net/pepr/">PEPR system</a> on
 <a href="http://pear.php.net/">the PEAR website</a>. If you have a new PECL
 extension you wish to contribute, bring it up on the appropriate
 <a href="http://pecl.php.net/support.php">PECL mailing list</a> first. 
</p>

<p>
 Once your PEAR package has been approved, or you get the sense that
 people generally agree that your PECL contribution is worthwhile, you
 may apply for a Git account here. Specify the name of your PEAR package
 or PECL contribution (single word Git module name) and also reference an
 existing account holder who can vouch for your contribution, or provide
 a link to your PEAR proposal.
</p>

<p>
 Okay, if you are still reading, then you may actually need a Git account.
 This is <strong>not</strong> an automatic process. Fill in the form below to
 request an account. In the box next to "Purpose", describe what it is that
 you intend to do with Git access. If it isn't clear from what you've
 described already, tell us what parts of the Git repository you need access
 to (for example, "phpdoc" is the documentation tree, "php-src/ext/readline"
 is the PHP readline extension). If someone told you to fill out the form
 here, make sure to mention them here!
</p>

<p>
 The Git account, once granted and activated (which could take a while, so be
 patient!), gives you access to a number of things. First, and most
 importantly, it gives you access to modify those parts of the PHP Git tree for
 which you have requested and been granted access. It also allows you to comment
 on and close bugs in our <a href="http://bugs.php.net/">bug database</a>, and
 allows you to modify the documentation notes in the <a href="/manual/">annotated
 manual</a>. Your Git account also translates into a foo@php.net forwarding email
 address where <strong>foo</strong> is your Git user id. Feel free to use it!
</p>

<p>
 If you get no resposne to an account request after a while, remember this is a 
 manual process, then please contact the relevant mailing list that belongs to 
 the part of PHP you requested access to.
</p>

<h2>Request a Git account</h2>

<p class="warn">
 Please note that you do <em>NOT</em> need a Git account to study PHP. You do
 <em>NOT</em> need a Git account to learn PHP, to use PHP or to in any way do
 anything at all with PHP. If you are sitting there wondering if you need a
 Git account, then you don't! If an existing Git account holder suggested you
 request an account, please mention their Git id in the request.
</p>
<p class="warn">
 Also note that information provided here will be sent to a public
 mailing list.
</p>
<p class="warn">
 Please do <strong>NOT</strong> submit account requests if you have not previously 
 contributed any work such as patches to PHP.
</p>
<p class="warn">
 If someone told you to fill in an account request because you are a developer of 
 a certain extension, for example a <a href="http://pecl.php.net/">PECL</a> extension, 
 then please state who told you to submit this request in the purpose text field below.
</p>

<?php
} // endif: no data submitted

?>
<form action="/git-php.php" method="post">
<table border="0" class="standard" style="width: 80%;">
<tr>
 <th class="subr">Full Name:</th>
 <td><input type="text" size="50" name="fullname"
      class="max" value="<?php if (isset($_POST['fullname'])) echo clean($_POST['fullname']);?>"></td>
</tr>
<tr>
 <th class="subr">Email:</th>
 <td><input type="text" size="50" name="email"
      class="max" value="<?php if (isset($_POST['email'])) echo clean($_POST['email']);?>"></td>
</tr>
<tr>
 <th class="subr">For what purpose do you require a Git account:<br>
 (check all that apply)</th>
 <td>
<?php 
$purposes = array("Learning PHP", "Coding in PHP", "Reading the PHP source",
	"Using PHP extensions", "Creating experimental PHP extensions",
	"Submitting a patch to PHP", "Adding notes to the documentation",
	"Writing web pages with PHP", "Setting up a php.net mirror site");

foreach ($purposes as $i => $p) { ?>
  <input type="checkbox" name="purpose[<?php echo $i?>]" value="1" 
	checked="checked" id="vcs-purpose-<?php echo $i; ?>"> <label for="vcs-purpose-<?php echo $i; ?>"><?php echo $p; ?></label><br>
<?php } ?>
 </td>
</tr>
<tr>
 <th class="subr">If your intended purpose is not in the list, <br>please state it here:</th>
 <td><textarea cols="50" rows="5" name="realpurpose" class="max"><?php if (isset($_POST['realpurpose'])) echo clean($_POST['realpurpose']);?></textarea></td>
</tr>
<tr>
<th class="subr">Do you agree to follow the <a href="license/contrib-guidelines-code.php">contribution guidelines</a>?</th>
<td><input type="checkbox" name="guidelines" value="1" id="vcs-guidelines"> <label for="vcs-guidelines">Check the box if you agree</label></td>
</tr>
<tr>
 <th class="subr">User ID:<br> <small>(single word, lower case)</small></th>
 <td><input type="text" size="10" name="id"
      class="max" value="<?php if (isset($_POST['id'])) echo clean($_POST['id']);?>"></td>
</tr>
<tr>
 <th class="subr">Requested Password:</th>
 <td><input type="password" size="10" name="password"
      class="max" value="<?php if (isset($_POST['password'])) echo clean($_POST['password']);?>"></td>
</tr>
<tr>
 <th class="subr">Did you fill this form out correctly (yes/no)?</th>
 <td><input type="text" size="10" name="yesno" class="max" value="no"></td>
</tr>
<tr>
 <th class="subr">Type of initial karma (who to send this request to):</th>
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
 <th colspan="2"><input type="submit" value="Send Request"></th>
</tr>
</table>
</form>

<?php site_footer();
