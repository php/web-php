<?
	cfunction rand_passwd ($len) {
		$vowels = "aeiouy";
		$consonants = "bdghjlmnpqrstvwxz";

		$alt = time() % 2;

		$i = 0;
		while($i < $len) {
 			if($alt == 1) {
				srand(substr(microtime(),2,6));
				$baz = rand() % 17;
				$foo = substr($consonants, $baz, 1);
				if(isset($s)) {
					$s = "$s$foo";
				} else {
					$s = $foo;
				}
				$alt = 0;
			} else {
				srand(substr(microtime(),2,6));
				$baz = rand() % 6;
				$foo = substr($vowels, $baz, 1);
				if(isset($s)) {
					$s = "$s$foo";
				} else {
					$s = $foo;
				}
				$alt = 1;
			}
			$i++;
		}
		return $s;
	}
	include "configuration.inc";

	if (!isset($email) || !$email) {
		echo "No Email specified.";
		exit();
	}
	$email=strtolower($email);
	mysql_pconnect($dbhost,$dbuser,$dbpwd) or die("Unable to connect to SQL server");
	mysql_select_db($dbname) or die("Unable to select database");
	$query = mysql_query("select email,password from users where email='$email' and password='$password'");
	if(!isset($name)) { $name=""; }
	if(!isset($company)) { $company=""; }
	if(!isset($cookie)) { $cookie=0; }
	if(!isset($country)) { $country=""; }
	if(!isset($os)) { $os=""; }
	if(!isset($httpd)) { $httpd=""; }
	if(!isset($primary_use)) { $primary_use=""; }
	if(!isset($comments)) { $comments=""; }
	if (mysql_num_rows($query)>0) { /* user has already registered - update */
		mysql_query("update users set name='$name',company='$company', country='$country',os='$os',httpd='$httpd',primary_use='$primary_use',comments='$comments' where email='$email'");
		$update=1;
	} else {
		$query = mysql_query("select email,password from users where email='$email'");
		if (mysql_num_rows($query) > 0) { /* user has already registered, but no password */
			?>
			<blockquote>You are already registered in the database!<P>
			You have two options here.  You may have forgotten your password, in which
			case you can have it <a href="oh_no.php3">mailed to you</a>, or you can have
			a cookie set in your browser so you don't need to worry about this again.
			<a href="setcookie.php3">Setting the cookie</a> will also let you modify your 
			profile data.
			</blockquote>
			<?
			exit;
		}
		if(strlen($email)<3 || !strchr($email,"@")) {
			die("You must specify a valid Email Address\n");
		}
		$password=rand_passwd(8);
		mysql_query("insert into users (email,password,name,company,country,os,httpd,primary_use,comments) values ('$email','$password','$name','$company','$country','$os','$httpd',$primary_use,'$comments')") or die("Unable to perform query");
		$update=0;
	}
	if($update) {
		mail($email,"Your PHP3 registration",
			"Just a reminder from the PHP3 web site\n"+
			"Your username is: $email\n"+
			"Your password is: $password\n\nIf you didn't set a cookie, or need to log in from another machine, you will need this.","From: php-dev@php.iquest.net");
	} else {
		mail($email,"Your PHP3 registration",
			"Your username is: $email\n"+
			"Your password is: $password\n\nIf you didn't set a cookie, or need to log in from another machine, you will need this.","From: php-dev@php.iquest.net");
	}
	if($cookie) {
		SetCookie("email",$email,time()+365*24*3600);
		SetCookie("password",$password,time()+365*24*3600);
	}
	Header("Location: $base_url");
?>
<html></html>
