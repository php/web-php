<?
require("shared.inc");
commonHeader("PHP - Acronym Meaning Vote");
?>

In order to vote, please fill out this form.  You can also take a look
at the <a href="vote_views.php3">opinions of some of guys from the development team</a>,
or at the <a href="http://il.php.net/vote_listing.php3">votes so far</a>.

<table><tr><td align="center">
<form action="http://il.php.net/vote.php3" method="POST">

<table border="1">
<tr>
	<td>Name</td>
	<td><input type="text" name="name"></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email"></td>
</tr>
<tr>
	<td>Choice</td>
	<td>
		<select name="choice" size="3">
			<option value="1">PHP HTML Preprocessor
			<option value="2">PHP Hypertext Preprocessor
			<option vlaue="3">PHP Hypermedia Preprocessor
		</select>
	</td>
</tr>
<tr>
	<td>Comments</td>
	<td>
		<textarea name="comments" rows="4" cols="40"></textarea>
	</td>
</tr>
</table>
<br>

<input type="submit" value="Vote">
<input type="reset" value="Reset voting form">
<br>

Please vote only <font color="red"><strong>once</strong></font>

</form>

</td></tr></table>

<? commonFooter(); ?>
