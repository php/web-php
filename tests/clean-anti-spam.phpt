--TEST--
clean_AntiSPAM() removes spam terms
--FILE--
<?php

require_once __DIR__ . '/../include/email-validation.inc';

$emails = array (
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

$cleanedEmails = array_map(static function (string $email): string {
    return clean_AntiSPAM($email);
}, $emails);

var_dump($cleanedEmails);

?>
--EXPECT--
array(11) {
  [0]=>
  string(21) "asasasd324324@php.net"
  [1]=>
  string(22) "jcastagnetto@yahoo.com"
  [2]=>
  string(22) "jcastagnetto@yahoo.com"
  [3]=>
  string(22) "jcastagnetto@yahoo.com"
  [4]=>
  string(22) "jcastagnetto@yahoo.com"
  [5]=>
  string(19) "jesusmc@scripps.edu"
  [6]=>
  string(23) "jmcastagnetto@chek2.com"
  [7]=>
  string(23) "jmcastagnetto@yahoo.com"
  [8]=>
  string(20) "some-wrong@asdas.com"
  [9]=>
  string(35) "wrong-address-with@@@@and-somestuff"
  [10]=>
  string(33) "wrong-email-address@lists.php.net"
}
