<?php require "header.inc"?>
<h6>Handling Forms</h6>
<?example('<form action="action.php3" method="POST">
Your name: <input type=text name=name>
You age: <input type=text name=age>
<input type=submit>
</form>');?>
<h6>action.php3:</h6>
<?example('Hi <?php echo $name?>.  
You are <?php echo $age?> years old.')?>
<?php require "footer.inc"?>
