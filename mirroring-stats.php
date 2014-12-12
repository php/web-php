<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'mirroring-stats.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Setting Up Local Stats", array("current" => "community"));
?>

<h1>Setting Up Local Stats</h1>

<p>
 If you are hosting an official or unofficial mirror, and you would like
 to have local stats support, follow these steps. This document complements
 the instructions found <a href="/mirroring.php">on the mirroring page</a>.
</p>

<ol>
 <li>
  <p>
   <a href="http://www.mrunix.net/webalizer/">Get The Webalizer</a><br><br>
   The Webalizer is a web server log analysis program. It is designed to 
   scan web server log files in various formats and produce usage statistics 
   in HTML format for viewing through a browser. Note that Webalizer requires
   you to have the GD library installed on your site.
  </p>
 </li>
 <li>
  <p>
   Install The Webalizer<br><br>
   There is a <code>configure</code> file in the distribution now, and other setup options
   are also available. Consult the <code>INSTALL</code> file included in the package.
   Copy the executable to somewhere accessible, eg. <code>/usr/bin</code>.
  </p>
 </li>
 <li>
  <p>
   Grab <a href="/mirror-stats.conf">mirror-stats.conf</a> and edit the file.<br><br>
   This is the main conf file for The Webalizer. Specifically, you will want to 
   change the lines which define where your log file sits, where the output
   should go, and the name of your host machine. Look for these settings:
   LogFile, OutputDir, HostName, HideSite, HideReferrer. The stats
   directory is not required to be in the webroot, it may be aliased 
   to be there (see <a href="/mirroring.php">mirroring.php</a>).
  </p>
 </li>
 <li>
  <p>
   Give it a test<br><br>
   From the command line in the stats directory, type:
   <code>webalizer -c mirror-stats.conf</code> You should get an index
   file, a usage file for the current month, some images,
   and a history file.
  </p>
 </li>
 <li>
  <p>
   Add it to your cron<br><br>
   If all went well, in the previous step, it is ready to be updated
   regularly. Something like this will be sufficient (update things
   daily at 3 am):
  </p>
<pre class="info">
      0 3 * * * (cd /your/stats/folder;/usr/bin/webalizer -c mirror-stats.conf) >/dev/null 2>&amp;1
</pre>
  <p>
   Provide the path of the stats directory in the "cd".
  </p>
 </li>
</ol>

<p>
 If you have any questions, try to ask them on the PHP Mirrors' mailing list
 (<a href="mailto:mirrors@php.net">mirrors@php.net</a>). We cannot guarantee,
 that we can solve your problem, of course, but it is worth a try.
</p>

<?php site_footer(); ?>
