--TEST--
test_answer() returns true when answer to spam challenge is valid
--FILE--
<?php

require_once __DIR__ . '/../manual/spam_challenge.php';

$answers = [
    [
        'function' => 'max',
        'argumentOne' => 'two',
        'argumentTwo' => 'one',
        'question' => 'max(two, one)',
        'answer' => 'two',
        'isValid' => true,
    ],
    [
        'function' => 'min',
        'argumentOne' => 'two',
        'argumentTwo' => 'one',
        'question' => 'min(two, one)',
        'answer' => 'one',
        'isValid' => true,
    ],
    [
        'function' => 'minus',
        'argumentOne' => 'five',
        'argumentTwo' => 'five',
        'question' => 'minus(five, five)',
        'answer' => 'zero',
        'isValid' => true,
    ],
    [
        'function' => 'plus',
        'argumentOne' => 'eight',
        'argumentTwo' => 'one',
        'question' => 'plus(eight, one)',
        'answer' => 'nine',
        'isValid' => true,
    ],
    [
        'function' => 'max',
        'argumentOne' => 'three',
        'argumentTwo' => 'six',
        'question' => 'max(three, six)',
        'answer' => 'nine',
        'isValid' => false,
    ],
    [
        'function' => 'min',
        'argumentOne' => 'two',
        'argumentTwo' => 'nine',
        'question' => 'min(two, nine)',
        'answer' => 'seven',
        'isValid' => false,
    ],
    [
        'function' => 'minus',
        'argumentOne' => 'seven',
        'argumentTwo' => 'six',
        'question' => 'minus(seven, six)',
        'answer' => 'four',
        'isValid' => false,
    ],
    [
        'function' => 'plus',
        'argumentOne' => 'eight',
        'argumentTwo' => 'one',
        'question' => 'plus(eight, one)',
        'answer' => 'seven',
        'isValid' => false,
    ],
];

$results = array_map(static function (array $answer): array {
    $answer['isValid'] = test_answer(
        $answer['function'],
        $answer['argumentOne'],
        $answer['argumentTwo'],
        $answer['answer']
    );

    return $answer;
}, $answers);

var_dump($results);

?>
--EXPECT--
array(8) {
  [0]=>
  array(6) {
    ["function"]=>
    string(3) "max"
    ["argumentOne"]=>
    string(3) "two"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(13) "max(two, one)"
    ["answer"]=>
    string(3) "two"
    ["isValid"]=>
    bool(true)
  }
  [1]=>
  array(6) {
    ["function"]=>
    string(3) "min"
    ["argumentOne"]=>
    string(3) "two"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(13) "min(two, one)"
    ["answer"]=>
    string(3) "one"
    ["isValid"]=>
    bool(true)
  }
  [2]=>
  array(6) {
    ["function"]=>
    string(5) "minus"
    ["argumentOne"]=>
    string(4) "five"
    ["argumentTwo"]=>
    string(4) "five"
    ["question"]=>
    string(17) "minus(five, five)"
    ["answer"]=>
    string(4) "zero"
    ["isValid"]=>
    bool(true)
  }
  [3]=>
  array(6) {
    ["function"]=>
    string(4) "plus"
    ["argumentOne"]=>
    string(5) "eight"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(16) "plus(eight, one)"
    ["answer"]=>
    string(4) "nine"
    ["isValid"]=>
    bool(true)
  }
  [4]=>
  array(6) {
    ["function"]=>
    string(3) "max"
    ["argumentOne"]=>
    string(5) "three"
    ["argumentTwo"]=>
    string(3) "six"
    ["question"]=>
    string(15) "max(three, six)"
    ["answer"]=>
    string(4) "nine"
    ["isValid"]=>
    bool(false)
  }
  [5]=>
  array(6) {
    ["function"]=>
    string(3) "min"
    ["argumentOne"]=>
    string(3) "two"
    ["argumentTwo"]=>
    string(4) "nine"
    ["question"]=>
    string(14) "min(two, nine)"
    ["answer"]=>
    string(5) "seven"
    ["isValid"]=>
    bool(false)
  }
  [6]=>
  array(6) {
    ["function"]=>
    string(5) "minus"
    ["argumentOne"]=>
    string(5) "seven"
    ["argumentTwo"]=>
    string(3) "six"
    ["question"]=>
    string(17) "minus(seven, six)"
    ["answer"]=>
    string(4) "four"
    ["isValid"]=>
    bool(false)
  }
  [7]=>
  array(6) {
    ["function"]=>
    string(4) "plus"
    ["argumentOne"]=>
    string(5) "eight"
    ["argumentTwo"]=>
    string(3) "one"
    ["question"]=>
    string(16) "plus(eight, one)"
    ["answer"]=>
    string(5) "seven"
    ["isValid"]=>
    bool(false)
  }
}
