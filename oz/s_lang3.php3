<?php require "header.inc"?>
<h2>Handling Forms</h2>
<?example('<form action="action.php" method="POST">
Your name: <input type=text name=name><br>
You age: <input type=text name=age><br>
<input type=submit>
</form>');?>
<h2>action.php3:</h2>
<?example('Hi <?php echo $name?>.  
You are <?php echo $age?> years old.')?>
<?php require "footer.inc"?>
