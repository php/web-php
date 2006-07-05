<?php
// $Id$

// simple and stupid SPAM protection (using little challenges)

$nums = array('zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine');

function plus($a, $b) {
	return $a + $b;
}

function gen_plus($a) {
	return rand(0, 9 - $a);
}

function minus($a, $b) {
	return $a - $b;
}

function gen_minus($a) {
	return rand(0, $a);
}

function print_infix($name, $a, $b) {
	return "$a $name $b";
}

function print_prefix($name, $a, $b) {
	return "$name($a, $b)";
}

$challenges = array(
	// name, print, generator
	array('max',   'print_prefix'),
	array('min',   'print_prefix'),
	array('minus', 'print_infix', 'gen_minus'),
	array('plus',  'print_infix', 'gen_plus'),
);


// generate a challenge
function gen_challenge() {
	global $challenges, $nums;
	$c = $challenges[rand(0, sizeof($challenges)-1)];

	$a  = rand(0, 9);
	$an = $nums[$a];
	$b  = isset($c[2]) ? $c[2]($a) : rand(0, 9);
	$bn = $nums[$b];

	return array($c[0], $an, $bn, $c[1]($c[0], $an, $bn));
}


// test an answer for validity
function test_answer($name, $an, $bn, $answer) {
	global $challenges, $nums;

	foreach ($challenges as $x) {
		if ($x[0] === $name) {
			$c = $x;
			break;
		}
	}

	$a = array_search($an, $nums);
	$b = array_search($bn, $nums);

	if (empty($c) || $a === false || $b === false) return false;

	return ($nums[$c[0]($a, $b)] === $answer);
}


?>
