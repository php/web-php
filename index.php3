<html><head><title>Professional Home Pages Version 3.0</title>
<?
  include "configuration.inc";
  $lynx=0;
  $js=0;
  if(ereg("Mozilla/[4-6]",$HTTP_USER_AGENT)) {
          if(!ereg("MSIE",$HTTP_USER_AGENT)) {
                  $js=1;
		  $bkg="back1.jpg";
          }
  }
  if(ereg("Mozilla/3",$HTTP_USER_AGENT)) {
          if(!ereg("MSIE",$HTTP_USER_AGENT)) {
                  $js=1;
		  $bkg="back_small.jpg";
          }
  }
  if(ereg("Mozilla/[1-2]",$HTTP_USER_AGENT)) {
          if(!ereg("MSIE",$HTTP_USER_AGENT)) {
                  $js=0;
		  $bkg="back_small.jpg";
	  }
  }	
  if(ereg("MSIE",$HTTP_USER_AGENT)) {
        if(ereg("Mozilla/[4-6]",$HTTP_USER_AGENT)) {
                $js=1;
        }
  }
  if(ereg("ynx",$HTTP_USER_AGENT)) { $lynx=1; $title="(Lynx Version)"; }
  if(!isset($title)) { $title="Welcome"; }
  if(!isset($bkg)) { $bkg="back1.jpg"; }
?>
<?if($js) {?>
<SCRIPT LANGUAGE="JavaScript">

<!-- Rollover JavaScript functions relies on image replacement feature of JavaScript 1.1
function nbsp() {document.write("&nbsp;");}
function copy() {document.write("&copy;");}

sm_topon = new Image();
sm_topon.src = "jpgs/sm_topf.jpg";
sm_topoff = new Image();
sm_topoff.src = "jpgs/sm_top.jpg";
sm_searchon = new Image();
sm_searchon.src = "jpgs/sm_searchf.jpg";
sm_searchoff = new Image();
sm_searchoff.src = "jpgs/sm_search.jpg";
sm_vson = new Image();
sm_vson.src = "jpgs/sm_vsf.jpg";
sm_vsoff = new Image();
sm_vsoff.src = "jpgs/sm_vs.jpg";

function rollon(imgName) {
        imgOn = eval(imgName + "on.src");
        document[imgName].src = imgOn;
}

function rolloff(imgName) {
        document[imgName].src = eval(imgName + "off.src");
}
// -->
</script>
<?}?>
</head>
<body background="jpgs/<?echo $bkg?>" bgcolor="#ffffff" text="#032F5B" link="#537492" vlink="#000000">
<FONT FACE="Verdana, Arial, Helvetica">
<table border=0 width=100% cellpadding=0 cellspacing=0 nowrap cols=3 frame=none>
<tr><td valign=top><font size=+2 color="#ffffff"><i>PHP3</i></font></td>
<td><font size=+2 color="#ffffff"><?echo $title?></font></td>
<td nowrap>
<?if($lynx) { echo "&nbsp;&nbsp;&nbsp;"; } ?>
<a href="<? echo $base_url ?>"
<?if($js) {?>onMouseOver="rollon('sm_top');return true" onMouseOut="rolloff('sm_top')"<? } ?>>
<img src="jpgs/sm_top.jpg" valign=top border=0 alt="Top" name=sm_top height=32 width=56></a>
<?if($lynx) { echo "&nbsp;&nbsp;&nbsp;"; } ?>
<a href="search.php3"
<?if($js) {?>onMouseOver="rollon('sm_search');return true" onMouseOut="rolloff('sm_search')"<? } ?>>
<img src="jpgs/sm_search.jpg" valign=top border=0 alt="Search" name=sm_search height=32 width=56></a>
<?if($lynx) { echo "&nbsp;&nbsp;&nbsp;"; } ?>
<a href="<?echo "$base_url\show_source.php3?page_url=$PHP_SELF" ?>"
<?if($js) {?>onMouseOver="rollon('sm_vs');return true" onMouseOut="rolloff('sm_vs')"<? } ?>>
<img src="jpgs/sm_vs.jpg" valign=top border=0 alt="View Source" name=sm_vs height=32 width=56></a>
</td></tr>
</table>
<br><br><br>
<blockquote>
Welcome to the PHP3 network of sites.<P>
<?error_reporting(0); if(filesize("localtop.inc")) { include "localtop.inc"; } error_reporting(1);?>
This server is currently running Version <?echo phpversion()?> of the Apache PHP module.<P>
Before you go any further, we need to make very sure that you understand that PHP3 is currently 
in what we refer to as alpha-testing mode.  This means that we do not suggest that you run
any sort of production server with this code.  Nor do we expect first-time users to be diving
right into PHP3 right now.  There are bugs.  In fact, there are lots of bugs.<P>
This release is to help us identify bugs and to solicit suggestions and opinions from users
slightly further removed from core development issues.<P>
In order to get a copy of this alpha release, you need to <a href="register.php3">Register</a>.
It is free to do so and is solely to help the development team understand who uses PHP3, on
which platforms and for what.  If you have previously registered and have lost your password,
you can have it <a href="oh_no.php3">mailed to you</a>.<P>
To jump right into the deep end (provided you have registered), go ahead and 
<a href="menu.php3">Download the source code</a> now.
Also, <a href="patches.php3">several patches for the first alpha</a> have been released.
You can also read about all the changes from PHP2 along with the exciting new features of PHP3 in the
<a href="changes.php3">CHANGES</a> file.<P>
If/when you discover a bug, please use the <a href="bug-form.php3">Bug Reporting Form</a> to
report the bug.<P>
</blockquote>
<P>
<?include "footer";?>
