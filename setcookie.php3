<?
	include "include/auth.inc";
	$email=strtolower($email);
	SetCookie("email",$email,time()+365*24*3600);
	SetCookie("password",$password,time()+365*24*3600);
?>
<html><head>
<?
	$title="Cookie Set!";
	include "include/header.inc";
	?>
	<blockquote>
	Your cookie has been set.  It will expire 1 year from now.
	</blockquote>
	<?
	include "include/footer.inc";
?>
