<?php require "header.inc"?>
<h2>Handling Forms</h2>
<?example('<form action="action.php" method="POST">
Your name: <input type=text name=name><br>
You age: <input type=text name=age><br>
<input type=submit>
</form>');?>
<form action="s_lang3.php3" method="POST">
Your name: <input type=text name=name><br>
Your age: <input type=text name=age><br>
<input type=submit>
</form>
<h2>action.php:</h2>
<?example('Hi <?php echo $name?>.  
You are <?php echo $age?> years old.')?>
<?if($name) {
	echo "Hi $name.<br>You are $age years old.<p>";
  }
?>
<?php require "footer.inc"?>
