<?php
/* a couple of functions to help in formatting text */

function indent($string, $prefix) {
    $string = ereg_replace(13, "", $string); /* get rid of Ctrl-M */
    return $prefix . ereg_replace("\n", "\n$prefix", $string) . "\n";
}

function wrap($text,$margin=72) {
	$i=0;
	$last_space=0;
	$printfrom=0;
	$len=strlen($text);
	$line_len=0;
	while($i<$len) {
		if($text[$i]==chr(32) || $text[$i]==chr(7)) {
			$last_space=$i;
			$line_len++;
		} else
		if($text[$i]==chr(10) || $text[$i]==chr(13)) {
			$line_len=0;
		} else {
			$line_len++;
		}
		if($line_len>$margin) {
			if($last_space==0 || $last_space<$printfrom) {
				echo substr($text,$printfrom,$margin);
				echo "\n";
				$printfrom+=$margin+1;
			} else {
				echo substr($text,$printfrom,$last_space-$printfrom);
				echo "\n";
				$printfrom=$last_space+1;
			}
			$line_len=0;
		}
		$i++;
	}
	echo substr($text,$printfrom);
}

