<?php
$_SERVER['BASE_PAGE'] = 'privacy.php';
include_once __DIR__ . '/include/prepend.inc';
site_header("Privacy Policy", ["current" => "footer"]);
?>

<h1>Privacy Policy</h1>

<p>
 This privacy policy covers php.net and its associated mirrors.
</p>

<h2>Email</h2>
<p>
 We will not give away your email address to anyone, who is not related to
 the operations of php.net. We will also never ask you to send us any of
 your passwords via email.
</p>


<h2>Logfiles</h2>
<p>
 Most mirrors maintain standard logs of the requests that reach the web servers,
 but we do only use those files for statistical purposes.
</p>
<p>
 And to improve your search experience, we store anonymised search terms that
 are submitted to the site.
</p>

<h2>Cookies</h2>
<p>
 php.net uses cookies to keep track of <a href="/my.php">user preferences</a>. Unless
 you login on the site, the cookies will not be used to store personal information, and
 we do not give away the information from the cookies.
</p>
<p>
 We also use self-hosted analytics service to improve popular sections of the documentation,
 and never share user data with third parties.
 You may deactivate or restrict the transmission of cookies by changing the settings of your web browser.
 Cookies that are already stored may be deleted at any time.
</p>

<?php
site_footer();
