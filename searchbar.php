<?php require_once 'prepend.inc'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
 <title>PHP.net Search Sidebar</title>
 <link rel="shortcut icon" href="/favicon.ico" />
 <style>
  select, input, button, body, p, td {
      font-family: "MS Sans Serif";
      font-size: 15px;
  }
  .title {
      font-size: 25px;
      color: black;
      font-weight: bold;
  }
  .indented {
      margin: 5px 5px 5px 5px;
  }
 </style>
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0"
 bgcolor="#ffffff" text="#000000" link="#000099" alink="#0000ff"
 vlink="#000099" onload="document.sform.pattern.focus();">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
 <tr bgcolor="#9999cc">
  <td><a href="/" target="_main"><img src="logos/php-logo.gif" width="69" height="36" border="0" alt="PHP" hspace="3" vspace="3" /></a></td>
  <td class="title" width="100%">Search Bar</td>
 </tr>
 <tr bgcolor="#333366"><td colspan="2"><img src="gifs/spacer.gif" width="1" height="1" border="0" alt="" /></td></tr>
 <tr>
  <td colspan="2">
   <div class="indented">
   <form method="post" action="/search.php" target="_main" name="sform">
   <input type="hidden" name="lang" value="<?php if(empty($LANG)) echo htmlspecialchars(default_language()); else echo htmlspecialchars($LANG); ?>">
   Search for<br />
   <input type="text" name="pattern" value="" size="21" />
   in the<br />
   <select name="show">
   <option value="quickref" selected>function list
   <option value="nosource">whole site
   <option value="manual">online documentation
   <option value="bugdb">bug database
   <option value="maillist">general mailing list
   <option value="devlist">developer mailing list
   <option value="phpdoc">documentation mailing list 
   </select><br />
   <input type="submit" value="Search">
   </form>
   </div>
  </td>
 </tr>
 <tr bgcolor="#333366"><td colspan="2"><img src="gifs/spacer.gif" width="1" height="1" border="0" alt="" /></td></tr>
 <tr>
  <td colspan="2">
   <div class="indented">
   <small><a href="/copyright.php" target="_main">Copyright &copy; 2002 The PHP Group</a><br />All rights reserved.</small>
   </div>
  </td>
 </tr>
</table>
</body>
</html>
