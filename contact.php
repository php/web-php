<?php
$_SERVER['BASE_PAGE'] = 'contact.php';
include_once __DIR__ . '/include/prepend.inc';
site_header("Contact", ["current" => "community"]);
?>

<a id="ads"></a>
<h1>Advertising at PHP.net and mirror sites</h1>

<p>
 The maintainers of PHP.net and the mirror sites are definitely
 <em>not interested</em> in graphical banner or text ad placement
 deals.
</p>

<a id="contact"></a>
<h1>Contact</h1>

<p>
 Please report problems you find on PHP.net and mirror sites in
 <a href="http://bugs.php.net/">the bug system</a>. Categorize the bug
 as "PHP.net Website Problem". This allows us to follow the progress of
 the problem until it is fixed.
</p>
<p>
 For security related issues (in PHP or our websites) please contact
 <a href="mailto:security@php.net">security@php.net</a>.
 Please note that the following are <b>NOT</b> security issues:
 <ul>
  <li><b>Requests for help with using PHP.</b> Please use the
      <a href="mailto:php-general@lists.php.net">PHP General</a> mailing list.</li>
  <li><b>Source code to the PHP website(s) being publicly readable.</b>
      This is <i>on purpose</i>.
      All of the php.net websites are available publicly on github.
      For example, you can find this site at <a href="https://github.com/php/web-php">github.com/php/web-php</a>.</li>
  <li><b>Requests for bug bounty payments.</b>
      PHP is run by volunteers with literally zero budget.
      The servers are donated hardware and bandwidth.
      Your bug reports and patches are appreciated, but we can not pay you for them.</li>
 </ul>
</p>
<p>
 If you have problems setting up PHP or using some functionality,
 or especially a program written in PHP, please ask your question on a
 <a href="/support.php">support channel</a>, since the webmasters will
 not answer any such questions.
</p>
<p>
 If you would like to contact the webmasters for some other reason, please
 write to <a href="mailto:php-webmaster@lists.php.net">php-webmaster@lists.php.net</a>.
 Note that this address is mapped to a mailing list and a newsgroup, so
 <strong>every message you send will be stored in public archives at multiple
 servers</strong>.
</p>

<?php site_footer(); ?>
