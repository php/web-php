--TEST--
is_emailable_address() returns whether email is emailable
--FILE--
<?php

require_once __DIR__ . '/../include/email-validation.inc';

$emails = array(
    'asasasd324324@php.net',
    'jcastagnetto-delete-this-@yahoo.com',
    'jcastagnetto-i-hate-spam@NOSPAMyahoo.com',
    'jcastagnetto-NO-SPAM@yahoo.com',
    'jcastagnetto@NoSpam-yahoo.com',
    'jesusmc@scripps.edu',
    'jmcastagnetto@chek2.com',
    'jmcastagnetto@yahoo.com',
    'some-wrong@asdas.com',
    'wrong-address-with@@@@-remove_me-and-some-i-hate_SPAM-stuff',
    'wrong-email-address@lists.php.net',
);

$emailsThatAreEmailableAddresses = array_filter($emails, static function (string $email): bool {
    return is_emailable_address($email);
});

var_dump($emailsThatAreEmailableAddresses);

?>
--EXPECT--
array(6) {
  [0]=>
  string(21) "asasasd324324@php.net"
  [1]=>
  string(35) "jcastagnetto-delete-this-@yahoo.com"
  [3]=>
  string(30) "jcastagnetto-NO-SPAM@yahoo.com"
  [5]=>
  string(19) "jesusmc@scripps.edu"
  [7]=>
  string(23) "jmcastagnetto@yahoo.com"
  [8]=>
  string(20) "some-wrong@asdas.com"
}
