<html><head>
<?
	if(!isset($sendit)) {	
		$title="Yes, I lost my password ;(";
		include "include/header.inc";
		?>
		<blockquote>
		Simply fill in your email address here:
		<form method="POST">
		<input type=text name="sendit" value="<?if(isset($email)) { echo $email; }?>">
		</form>
		and your password will be emailed to you right away.
		</blockquote>
		<?
	} else {
		include "configuration.inc";
		mysql_pconnect($dbhost,$dbuser,$dbpwd) or die("Unable to connect to SQL server");
		mysql_select_db($dbname) or die("Unable to select database");
		$query = mysql_query("select email,password from users where email='$sendit'");
		if(mysql_num_rows($query)) {
			$pw = mysql_result($query,0,"password");
			mail($sendit,"Here is your PHP3 Site Password again","Your password is: $pw\n\n","From: php-dev@php.iquest.net"); ?>
			<blockquote>
			The mail has been sent.  Go check your mailbox.
			</blockquote>
			<meta http-equiv="refresh" content="2;  url=<? echo $base_url ?>">
			<?	
		} else {
			?>
			<blockquote>
			<?echo $sendit?> is not registered in our database.  Please go to
			the <a href="register.php3">Registration Screen</a> to register.
			If you did this before and we have lost your record, sorry for the
			inconvenience.
			</blockquote>
			<?
		}
	}	
	include "include/footer.inc";
?>
