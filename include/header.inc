<?
  include "configuration.inc";

  $current = "3.0b3";

  $mirror_sites = array(
    "http://www.php.net/"	 => array("usa", "Circle Net, USA"),
    "http://ca.php.net/"         => array("canada", "Toronto, Canada"),
    "http://il.php.net/"         => array("israel", "Netvision, Israel"),
    "http://machba.il.php.net/"  => array("israel", "Technion, Israel"),
    "http://no.php.net/"         => array("norway", "Trondheim, Norway"),
    "http://uk.php.net/"	 => array("uk", "Norwich, United Kingdom")
  );

  function download_link($file, $title) {
      if ($tmp = strrchr($file, "/")) {
          $local_file = substr($tmp, 1, strlen($tmp));
      } else {
          $local_file = $file;
      }
      echo("<a href=\"$file\">$title</a>");
      $size = filesize($local_file)/1024;
      echo("<!-- file=$file localfile=$local_file size-$size-->\n");
      if ($size) {
          printf(" (%dk)", $size);
      }
  }

  function top_button($name, $alt, $href) {
      global $js, $root_url;
      echo("\n    <a href=\"$href\" target=\"_top\"");
      if (isset($js) && $js) {
          echo(" onMouseOver=\"rollon('$name');return true\"");
          echo(" onMouseOut=\"rolloff('$name')\"");
      }
      echo("\n    ><img src=\"" . jpgurl($name . ".jpg"));
      echo("\" valign=top border=0 alt=\"$alt\" ");
      echo("name=\"$name\" width=56 height=32></a>\n");
  }

  function gifurl($img) {
      global $root_url;
      return $root_url . "gifs/" . $img;
  }

  function jpgurl($img) {
      global $root_url;
      return $root_url . "jpgs/" . $img;
  }

  function lynx_space_hack() {
      global $lynx;
      if (isset($lynx) && $lynx) {
          echo "&nbsp;&nbsp;&nbsp;";
      }
  }

  if (!$root_url) { $root_url = "/"; }
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
sm_topon.src = "<? echo $root_url; ?>jpgs/sm_topf.jpg";
sm_topoff = new Image();
sm_topoff.src = "<? echo $root_url; ?>jpgs/sm_top.jpg";
sm_searchon = new Image();
sm_searchon.src = "<? echo $root_url; ?>jpgs/sm_searchf.jpg";
sm_searchoff = new Image();
sm_searchoff.src = "<? echo $root_url; ?>jpgs/sm_search.jpg";
sm_vson = new Image();
sm_vson.src = "<? echo $root_url; ?>jpgs/sm_vsf.jpg";
sm_vsoff = new Image();
sm_vsoff.src = "<? echo $root_url; ?>jpgs/sm_vs.jpg";

function rollon(imgName) {
        imgOn = eval(imgName + "on.src");
        document[imgName].src = imgOn;
}

function rolloff(imgName) {
        document[imgName].src = eval(imgName + "off.src");
}
// -->
</script>
<? }
if (!$head_closed) {
    echo("</head>");
}
?>
<body background="<? echo jpgurl($bkg); ?>" bgcolor="#ffffff" text="#000000"
      link="#537492" vlink="#032F5B">
<FONT FACE="Verdana, Arial, Helvetica">
<table border="0" width="100%" cellpadding="0" cellspacing="0" nowrap
       cols="3" frame="none">
 <tr>
  <td width="33%" align="left">
   <font size="+1" color="#ffffff"><b><i>PHP3</i></b></font>
  </td>
  <td width="33%" align="center">
   <font size=+2 color="#ffffff"><nobr><?echo $title?></nobr></font>
  </td>
  <td width="33%" align="right">
  <nobr><?

    lynx_space_hack();
    top_button("sm_top", "Top", $root_url);
    lynx_space_hack();
    top_button("sm_search", "Search", $root_url."search.php3");
    lynx_space_hack();
    top_button("sm_vs", "View Source",
               $root_url."show_source.php3?page_url=$PHP_SELF");

  ?></nobr>
</td></tr>
</table>

<!-- add in 30 more pixels to ensure we don't overlap the background -->
<br clear=all>
<img alt="" src="<? echo gifurl("blank.gif"); ?>" height="30">
<br clear=all>
