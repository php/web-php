<?
include "configuration.inc";
$reg=0;
if(isset($email) && isset($password)) { /* probably from a cookie - check password */
	$email=strtolower($email);
	mysql_pconnect($dbhost,$dbuser,$dbpwd) or die("Unable to connect to SQL server");
	mysql_select_db($dbname) or die("Unable to select database");
	$query = mysql_query("select * from users where email='$email'");
	if (mysql_num_rows($query)>0) { 
		if(mysql_result($query,0,"password")==$password) {
			$reg=1;
			$country = mysql_result($query,0,"country");
			$os = mysql_result($query,0,"os");
			$httpd = mysql_result($query,0,"httpd");
			$name = mysql_result($query,0,"name");
			$company = mysql_result($query,0,"company");
			$comments = mysql_result($query,0,"comments");
		}
	}
}
if (!$reg) {
	$email="";
	$password="";
	$country="";
	$os="";
	$httpd="";
	$name="";
	$company="";
	$comments="";
}
?>
<html><head><title>PHP3 Login</title>
<? $title="PHP3 Registration";
   include "include/header.inc"; 
?>
<script language="javascript">
<!--

function validateForm(form)
{
	if (form.email.value.length==0) {
		alert("You must enter your Email!");
		form.email.focus();
		return false;
	}
	return true;
}

// -->
</script>

<?if(!$reg) { ?>
<blockquote><TT>
We would appreciate if you took the time to fill out this short form.
You will not be put on any mailing lists, nor will you be spammed in any way.  
We are simply trying to get an impression of who is using this software.
You will be emailed a password to the email address you provide here.
You can also choose to set a cookie in which case you will only need to
know this password if you clear your cookies or need to log in from another
browser.
</TT></blockquote>
<? } else { ?>
<blockquote><TT>
You have already registered, and your cookie has identified you appropriately.
You may alter your current profile here.
</TT></blockquote>
<? } ?>
<center>
<form action="new_user.php3" method="post" onSubmit="return validateForm(this);">
<table>
	<tr>
		<td>Email (mandatory)</td>
		<td><input type="text" name="email" value="<?echo $email?>"></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><input type="text" name="name" value="<?echo $name?>"></td>
	</tr>
	<tr>
		<td>Company</td>
		<td><input type="text" name="company" value="<?echo $company?>"></td>
	</tr>
	<tr>
		<td>Country</td>
		<td><input type="text" name="country" value="<?echo $country?>"></td>
	</tr>
	<tr>
		<td>Operating System(s) PHP is used under</td>
		<td><input type="text" name="os" value="<?echo $os?>"></td>
	</tr>
	<tr>
		<td>Web Server software PHP is used with</td>
		<td><input type="text" name="httpd" value="<?echo $httpd?>"></td>
	</tr>
	<tr>
		<td>Primary use for PHP</td>
		<td><select name="primary_use">
			<option value="0">Personal
			<option value="1">Commercial
			<option value="2">Other
		</select></td>
	</tr>
	<tr>
		<td>Comments</td>
		<td><textarea name="comments" cols=30 rows=5><?echo $comments?></textarea></td>
	</tr>
	<?if(!$reg) { ?>
	<tr>
		<td>Set Cookie?</td>
		<td><input type=checkbox name=cookie CHECKED></td>
	</tr>
	<? } ?>
</table>
<br>
<input type="hidden" name="password" value="<?echo $password?>">
<input type="submit" value="Continue">
</center>

<?include "include/footer.inc"; ?>
