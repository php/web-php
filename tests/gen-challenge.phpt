--TEST--
gen_challenge() generates a spam challenge
--FILE--
<?php

require_once __DIR__ . '/../manual/spam_challenge.php';

srand(9001);

$challenges = array_map(static function (): array {
    [$function, $argumentOne, $argumentTwo, $question] = gen_challenge();

    return [
        'function' => $function,
        'argumentOne' => $argumentOne,
        'argumentTwo' => $argumentTwo,
        'question' => $question,
    ];
}, range(1, 20));

var_dump($challenges);

?>
--EXPECT--
array(20) {
  [0]=>
  array(4) {
    ["function"]=>
    string(3) "min"
    ["argumentOne"]=>
    string(3) "two"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(13) "min(two, one)"
  }
  [1]=>
  array(4) {
    ["function"]=>
    string(5) "minus"
    ["argumentOne"]=>
    string(4) "five"
    ["argumentTwo"]=>
    string(4) "five"
    ["question"]=>
    string(15) "five minus five"
  }
  [2]=>
  array(4) {
    ["function"]=>
    string(5) "minus"
    ["argumentOne"]=>
    string(4) "four"
    ["argumentTwo"]=>
    string(4) "four"
    ["question"]=>
    string(15) "four minus four"
  }
  [3]=>
  array(4) {
    ["function"]=>
    string(3) "min"
    ["argumentOne"]=>
    string(4) "nine"
    ["argumentTwo"]=>
    string(5) "seven"
    ["question"]=>
    string(16) "min(nine, seven)"
  }
  [4]=>
  array(4) {
    ["function"]=>
    string(5) "minus"
    ["argumentOne"]=>
    string(5) "seven"
    ["argumentTwo"]=>
    string(3) "six"
    ["question"]=>
    string(15) "seven minus six"
  }
  [5]=>
  array(4) {
    ["function"]=>
    string(3) "max"
    ["argumentOne"]=>
    string(5) "three"
    ["argumentTwo"]=>
    string(3) "six"
    ["question"]=>
    string(15) "max(three, six)"
  }
  [6]=>
  array(4) {
    ["function"]=>
    string(3) "max"
    ["argumentOne"]=>
    string(3) "six"
    ["argumentTwo"]=>
    string(4) "five"
    ["question"]=>
    string(14) "max(six, five)"
  }
  [7]=>
  array(4) {
    ["function"]=>
    string(3) "max"
    ["argumentOne"]=>
    string(4) "four"
    ["argumentTwo"]=>
    string(5) "three"
    ["question"]=>
    string(16) "max(four, three)"
  }
  [8]=>
  array(4) {
    ["function"]=>
    string(3) "min"
    ["argumentOne"]=>
    string(3) "two"
    ["argumentTwo"]=>
    string(4) "nine"
    ["question"]=>
    string(14) "min(two, nine)"
  }
  [9]=>
  array(4) {
    ["function"]=>
    string(4) "plus"
    ["argumentOne"]=>
    string(5) "eight"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(14) "eight plus one"
  }
  [10]=>
  array(4) {
    ["function"]=>
    string(4) "plus"
    ["argumentOne"]=>
    string(5) "three"
    ["argumentTwo"]=>
    string(4) "five"
    ["question"]=>
    string(15) "three plus five"
  }
  [11]=>
  array(4) {
    ["function"]=>
    string(3) "min"
    ["argumentOne"]=>
    string(5) "eight"
    ["argumentTwo"]=>
    string(5) "three"
    ["question"]=>
    string(17) "min(eight, three)"
  }
  [12]=>
  array(4) {
    ["function"]=>
    string(3) "max"
    ["argumentOne"]=>
    string(4) "zero"
    ["argumentTwo"]=>
    string(4) "nine"
    ["question"]=>
    string(15) "max(zero, nine)"
  }
  [13]=>
  array(4) {
    ["function"]=>
    string(3) "min"
    ["argumentOne"]=>
    string(4) "five"
    ["argumentTwo"]=>
    string(4) "nine"
    ["question"]=>
    string(15) "min(five, nine)"
  }
  [14]=>
  array(4) {
    ["function"]=>
    string(5) "minus"
    ["argumentOne"]=>
    string(3) "six"
    ["argumentTwo"]=>
    string(4) "four"
    ["question"]=>
    string(14) "six minus four"
  }
  [15]=>
  array(4) {
    ["function"]=>
    string(3) "max"
    ["argumentOne"]=>
    string(3) "one"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(13) "max(one, one)"
  }
  [16]=>
  array(4) {
    ["function"]=>
    string(4) "plus"
    ["argumentOne"]=>
    string(4) "five"
    ["argumentTwo"]=>
    string(4) "zero"
    ["question"]=>
    string(14) "five plus zero"
  }
  [17]=>
  array(4) {
    ["function"]=>
    string(5) "minus"
    ["argumentOne"]=>
    string(4) "nine"
    ["argumentTwo"]=>
    string(5) "eight"
    ["question"]=>
    string(16) "nine minus eight"
  }
  [18]=>
  array(4) {
    ["function"]=>
    string(5) "minus"
    ["argumentOne"]=>
    string(5) "three"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(15) "three minus one"
  }
  [19]=>
  array(4) {
    ["function"]=>
    string(3) "min"
    ["argumentOne"]=>
    string(5) "three"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(15) "min(three, one)"
  }
}
