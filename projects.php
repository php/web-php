<?php
require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>More Projects</h3>
<p>
If you are looking for more projects using PHP, go to the
<a href="/links.php">Links</a> page, and visit the sites
listed there.
</p>

<h3>Want to be listed here?</h3>
<p>
If you have a project you feel belongs on this list, submit it to 
<a href="http://freshmeat.net/">freshmeat</a> and make sure to
categorize it in the "Programming Language : PHP" category.
</p>
';

commonHeader("Projects");
?>

<h1>Projects using PHP</h1>

<p>
An increasing number of projects, both commercial and open source,
are using PHP as their main development tool. This is a listing of
some of the open-source PHP applications available, courtesy of
<a href="http://freshmeat.net/">freshmeat</a>. (Last updated:
<?php

  echo date("M j, Y h:ia", filemtime("backend/projects.html"));
  echo ".)</p>" . hdelim();

  readfile("backend/projects.html");

  commonFooter();

?>
