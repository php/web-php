<html>
<head><title>email validation test</title></head>
<body>
<?php

require getcwd()."/email-validation.inc";

$test_add = array (
    "wrong-email-address@lists.php.net","jmcastagnetto@yahoo.com", 
    "some-wrong@asdas.com", "jcastagnetto-NO-SPAM@yahoo.com", 
    "jcastagnetto@NoSpam-yahoo.com", "jmcastagnetto@chek2.com", 
    "jcastagnetto-i-hate-spam@NOSPAMyahoo.com", "jesusmc@scripps.edu", 
    "asasasd324324@php.net", "jcastagnetto-delete-this-@yahoo.com",
    "wrong-address-with@@@@-remove_me-and-some-i-hate_SPAM-stuff");

while (list(,$v) = each($test_add)) {
    echo "The address: $v (".clean_AntiSpam($v).") is";
    if (!is_emailable_address(clean_AntiSPAM($v)))
        echo " not";
    echo " valid\n<br>";
}

?>
<hr>
The jesusmc@scripps.edu, jmcastagnetto@yahoo.com and jcastagnetto@yahoo.com 
should validate OK as of 2001-02-28 --- JMC
</body>
</html>
