<?
require_once 'prepend.inc';

if (isset($user) && isset($pass)) {
  $MAGIC_COOKIE = base64_encode("$user:$pass");
  # we set a cookie good for five years
  SetCookie("MAGIC_COOKIE", base64_encode("$user:$pass"), time()+157248000);
  echo "<b>Cookie set</b>.<br>";
}
if (isset($MAGIC_COOKIE)) {
  list($user,$pass) = explode(":", base64_decode($MAGIC_COOKIE));
}
?>

<form action="<?echo $PHP_SELF;?>" method="POST">
user: <input type=text name=user value="<?echo $user;?>">
<br>
pass: <input type=password name=pass value="<?echo $pass;?>">
<br>
<input type=submit>
</form>
