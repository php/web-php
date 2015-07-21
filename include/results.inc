<?php
// $Id: $
function search_results($res, $q, $profile='all', $per_page=10, $s=0, $l='en', $show_title=true, $show_foot=true, $show_attrib=true) {
	$start_result = $s;
	$end_result = $s + $res['ResultSet']['totalResultsReturned'] -1;

	$results_count = ($res['ResultSet']['totalResultsAvailable'] < 100 ? $res['ResultSet']['totalResultsAvailable'] : 'more than 100');

	$disp_start_result = $start_result + 1;
	$disp_end_result = $end_result + 1;
	if($show_title) echo "<h2>Showing results $disp_start_result to $disp_end_result of $results_count</h2>\n";
	echo '<ul id="search-results">'."\n";
	$pos = $res['ResultSet']['firstResultPosition'];

	$php_img_dir = 'http://www.php.net/images';
	$types = array(
		'pear'     => '<img src="'. $php_img_dir .'/pear_item.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
		'pecl'     => '<img src="'. $php_img_dir .'/pecl_item.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
		'pecl4win' => '<img src="'. $php_img_dir .'/pecl_item_win.gif" height="22" width="21" style="float:left; margin-left:-31px;"/>',
		'peclbugs' => '<img src="'. $php_img_dir .'/pecl_item_bug.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
		'pearbugs' => '<img src="'. $php_img_dir .'/pear_item_bug.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
		'talks'    => '<img src="'. $php_img_dir .'/ele-icon.gif" height="20" width="32" style="float:left; margin-left:-40px;"/>',
		'snaps'    => '<img src="'. $php_img_dir .'/logos/php_xpstyle_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
		'cvsweb'   => '<img src="'. $php_img_dir .'/logos/php_script_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
		'viewcvs'  => '<img src="'. $php_img_dir .'/logos/php_script_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
		'news'     => '<img src="'. $php_img_dir .'/logos/php-icon-white.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
		'php'      => '<img src="'. $php_img_dir .'/logos/php-icon-white.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
		'doc'      => '<img src="'. $php_img_dir .'/logos/php-icon-white.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
		'bugs'     => '<img src="'. $php_img_dir .'/php_bug.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
		'gtk'      => '<img src="'. $php_img_dir .'/logos/php-gtk-white.gif" height="26" width="32" style="float:left; margin-left:-40px;"/>'
	);
                
	foreach($res['ResultSet']['Result'] as $i => $hit) {
		$cnt = $pos + $i; 

		$d = date('j M Y', $hit['ModificationDate']);
		$cachelink = '';
		if (isset($hit['Cache'])) {
			$cachelink = " - <a href=\"{$hit['Cache']}\">Cached</a>";
		}

		// rewrite mirrors urls (\w\w\d? or www, but not qa, doc, gtk and ~/user)
		$real_url = preg_replace('@^http://(?!doc|qa|gtk)\w{2,3}\.php\.net(?!/~)(.*)$@', '$1', $hit['Url']);
		$displayurl = preg_replace('@^http://(?:(?!doc|qa|php|gtk)\w{2,3}\.)?(.+[^/])/?$@', '$1', $hit['Url']);
		$type = substr($displayurl,0,strpos($displayurl,'.'));
		if($type=='pecl' && strstr($displayurl,"/bugs/")) $type = "peclbugs";
		if($type=='pear' && strstr($displayurl,"/bugs/")) $type = "pearbugs";
		if($type=='smarty') continue;
		$display_title = str_replace(array('PHP:', '&amp;'), array('', '&'), $hit['Title']);

		// Fall back to the PHP logo for unknown hits
		if (!isset($types[$type])) {
			$type = "php";
		}

		// Fix &amp;gt; double escaping
		$summary = str_replace('&amp;', '&', $hit['Summary']);
		$summary = htmlspecialchars($summary, ENT_QUOTES, 'UTF-8');
		echo <<<EOB
<li>
 <p class="result">{$types[$type]}<a href="{$real_url}">{$display_title}</a></p>
 <p class="summary">{$summary}</p>
 <p class="meta">{$displayurl} - {$d} {$cachelink}</p>
</li>
EOB;
	}
	echo "</ul>\n";
	if($show_attrib):
	echo <<<EOB
<span style="margin-left: 3em; margin-top: 1em; float: right; font-family: Verdana, Tahoma, Helvetica, Arial;
font-size: 11px; color:#555;">results by <img style="margin-bottom:4px;" src="/images/bing.png" align="center"/></span>
EOB;
	endif;
	if($show_foot):
	echo <<<EOB
<div id="results_nav"><h4>Results Page:</h4>
<ul id="results_nav_list">
EOB;
	$start = 0;
	for($z=1; $z < 11; $z++) {
		if($start > $res['ResultSet']['totalResultsAvailable']) {
			break;
		}

        $class = '';
        if ($start == $start_result) {
            $class = 'current';
        }

		printf('<li class="%s"><a href="/results.php?q=%s&start=%d&p=%s&l=%s">%d</a></li>', $class, urlencode($q), $start, $profile, urlencode($l), $z);
		$start += $per_page;
	}
	echo '</ul></div>';
	endif;
}
?>
