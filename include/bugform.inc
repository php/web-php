<form method="POST" action="<?php echo $PHP_SELF;?>">
<input type="hidden" name="cmd" value="send" />
<table>
 <tr>
  <th align="right">Your email address:</th>
  <td colspan="2">
   <input type="text" size="20" maxlength="40" name="email" value="<?php echo htmlspecialchars(stripslashes($email));?>" />
  </td>
 </tr><tr>
  <th align="right">PHP version:</th>
  <td>
   <select name="php_version"><?php show_version_options($php_version);?></select>
  </td>
 </tr><tr>
  <th align="right">Type of bug:</th>
  <td colspan="2">
    <select name="bug_type"><?php show_types($bug_type,0);?></select>
  </td>
 </tr><tr>
  <th align="right">Operating system:</th>
  <td colspan="2">
   <input type="text" size="20" maxlength="32" name="php_os" value="<?php echo htmlspecialchars(stripslashes($operating_system));?>" />
  </td>
 </tr><tr>
  <th align="right">Summary:</th>
  <td colspan="2">
   <input type="text" size="40" maxlength="79" name="sdesc" value="<?php echo htmlspecialchars(stripslashes($sdesc));?>" />
  </td></tr>
 </tr><tr>
  <th align="right">Password:</th>
  <td>
   <input type="text" size="20" maxlength="20" name="passwd" value="<?php echo htmlspecialchars(stripslashes($passwd));?>" />
  </td>
  <td><font size="-2">
    You may enter any password here. This password allows you to come back and
    modify your submitted bug report at a later date. [<a
    href="/bug-pwd-finder.php">Lost your password?</a>]
  </font></td>
 </tr>
</table>

<table>
 <tr>
  <td valign="top">
   <b>Description:</b><br />
   Please supply any information that may be helpful in fixing the bug:
   <ul>
    <li>A short script that reproduces the problem.</li>
    <li>The list of modules you compiled PHP with (your configure line).</li>
    <li>Any other information unique or specific to your setup.</li>
    <li>A <a href="bugs-generating-backtrace.php">gdb backtrace</a>.</li>
   </ul>
   <div align="center"><input type="submit" value="Send bug report" /></div>
  </td>
  <td>
   <textarea cols="60" rows="15" name="ldesc" wrap="physical"><?php echo htmlspecialchars(stripslashes($ldesc));?></textarea>
  </td>
 </tr>
</table>

<p></p>

</form>
