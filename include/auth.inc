<?
	include "configuration.inc";
	if(isset($email) && isset($password)) {
		$email=strtolower($email);
        mysql_pconnect($dbhost,$dbuser,$dbpwd) or die("Unable to connect to SQL server");
        mysql_select_db($dbname) or die("Unable to select database");
		$query = mysql_query("select email from users where email='$email' and password='$password'");
		if(mysql_num_rows($query)) {
			$cookie_login=1;	
		}
	}
	if(!isset($cookie_login)) { $cookie_login=0; }
	if(!$cookie_login) {
		if(!isset($PHP_AUTH_USER)) {
			Header("WWW-authenticate: basic realm=\"PHP3\"");
			Header("HTTP/1.0 401 Unauthorized");
			echo "<html><head>";
			$title="How to get a PHP3 Site login";
			include "include/header.inc";?>
			<blockquote>
			If you have forgotten your password, you can have it mailed directly
			to you <a href="oh_no.php3">HERE</a>.<P>If you do not have an account,
			you may <a href="register.php3">Register Here</a>.
			</blockquote>
			<?
			include "include/footer.inc";
			exit;
		} else {
   	     	mysql_pconnect($dbhost,$dbuser,$dbpwd) or die("Unable to connect to SQL server");
   	     	mysql_select_db($dbname) or die("Unable to select database");
			$email=strtolower($PHP_AUTH_USER);
			$password=$PHP_AUTH_PW;
			$query = mysql_query("select email from users where email='$email' and password='$password'");
			if(!mysql_num_rows($query)) {
				Header("WWW-authenticate: basic realm=\"PHP3\"");
				Header("HTTP/1.0 401 Unauthorized");
				echo "<html><head>";
				$title="How to get a PHP3 Site login";
				include "include/header.inc"; ?>
				<blockquote>
				If you have forgotten your password, you can have it mailed directly
				to you <a href="oh_no.php3">HERE</a>.<P>If you do not have an account,
				you may <a href="register.php3">Register Here</a>.
				</blockquote>
				<?
				include "include/footer.inc";
				exit;
			}
		}
	}
?>
