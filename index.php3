<html><head><title>Professional Home Pages Version 3.0</title>
<? $title="Welcome";
   include "include/header.inc"; ?>
<blockquote>
Welcome to the PHP3 network of sites.<P>
<?error_reporting(0); if(filesize("localtop.inc")) { include "localtop.inc"; } error_reporting(1);?>
This server is currently running Version <?echo phpversion()?> of the Apache PHP module.<P>
Before you go any further, we need to make very sure that you understand that PHP3 is currently 
in what we refer to as alpha-testing mode.  This means that we do not suggest that you run
any sort of production server with this code.  Nor do we expect first-time users to be diving
right into PHP3 right now.  There are bugs.  In fact, there are lots of bugs.<P>
This release is to help us identify bugs and to solicit suggestions and opinions from users
slightly further removed from core development issues.<P>
In order to get a copy of this alpha release, you need to <a href="register.php3">Register</a>.
It is free to do so and is solely to help the development team understand who uses PHP3, on
which platforms and for what.  If you have previously registered and have lost your password,
you can have it <a href="oh_no.php3">mailed to you</a>.<P>
To jump right into the deep end (provided you have registered), go ahead and 
<a href="menu.php3">Download the source code</a> now.
Also, <a href="patches.php3">several patches for the first alpha</a> have been released.
You can also read about all the changes from PHP2 along with the exciting new features of PHP3 in the
<a href="changes.php3">CHANGES</a> file.<P>
If/when you discover a bug, please use the <a href="bug-form.php3">Bug Reporting Form</a> to
report the bug.<P>
</blockquote>
<P>
<?include "include/footer.inc";?>
