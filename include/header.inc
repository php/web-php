<?
  include "configuration.inc";
  $lynx=0;
  $js=0;
  if(ereg("Mozilla/[4-6]",$HTTP_USER_AGENT)) {
          if(!ereg("MSIE",$HTTP_USER_AGENT)) {
                  $js=1;
                  $bkg="back2.jpg";
          }
  }
  if(ereg("Mozilla/3",$HTTP_USER_AGENT)) {
          if(!ereg("MSIE",$HTTP_USER_AGENT)) {
                  $js=1;
                  $bkg="back_big.jpg";
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
  if(ereg("ynx",$HTTP_USER_AGENT)) { $lynx=1; }
  if(!isset($title)) { $title="Welcome"; }
  if(!isset($bkg)) { $bkg="back2.jpg"; }
?>
<?if(isset($js) && $js) { ?>
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
<? } ?>
</head>
<body background="jpgs/<?echo $bkg?>" bgcolor="#ffffff" text="#032F5B" link="#537492" vlink="#000000">
<FONT FACE="Verdana, Arial, Helvetica">
<table border="0" width="100%" cellpadding="0" cellspacing="0" nowrap cols="3" frame="none">
<tr>
<td>&nbsp;&nbsp;<img src="jpgs/powered_by.jpg"><br><font size=-2 color="#ffffff">Running PHP <?echo phpversion()?></font></td>
<td><font size=+2 color="#ffffff"><?echo $title?></font></td>
<td nowrap align="right">
<?if(isset($lynx) && $lynx) { echo "&nbsp;&nbsp;&nbsp;"; } ?>
<a href="<? echo $base_url ?>" target=_top
<?if(isset($js) && $js) { ?>onMouseOver="rollon('sm_top');return true" onMouseOut="rolloff('sm_top')"<? } ?>>
<img src="jpgs/sm_top.jpg" valign=top border=0 alt="Top" name=sm_top height=32 width=56></a>
<?if(isset($lynx) && $lynx) { echo "&nbsp;&nbsp;&nbsp;"; } ?>
<a href="search.php3" target=_top
<?if(isset($js) && $js) { ?>onMouseOver="rollon('sm_search');return true" onMouseOut="rolloff('sm_search')"<? } ?>>
<img src="jpgs/sm_search.jpg" valign=top border=0 alt="Search" name=sm_search height=32 width=56></a>
<?if(isset($lynx) && $lynx) { echo "&nbsp;&nbsp;&nbsp;"; } ?>
<a href="<?echo "$base_url\show_source.php3?page_url=$PHP_SELF" ?>" target=_top
<?if(isset($js) && $js) { ?>onMouseOver="rollon('sm_vs');return true" onMouseOut="rolloff('sm_vs')"<? } ?>>
<img src="jpgs/sm_vs.jpg" valign=top border=0 alt="View Source" name=sm_vs height=32 width=56></a>
</td></tr>
</table>
<!-- add in 30 more pixels to ensure we don't overlap the background -->
<table width="100%" height="30" border="0"><tr><td>  </td></tr></table>
