<?php require "header.inc"?>
<H1>Object Inheritance</H1>

<?example('<?php

class Cart {
    var $items;
    function add_item($artnr, $num) {
        $this->items[$artnr] += $num;
    }  
};

class NamedCart extends Cart {
    var $owner;
    function NamedCart($name) {
        $this->owner = $name;
    }
};

$cart = new NamedCart("PenguinGear");
$cart->add_item(170923, 2);

?>');?>

<H1>PHP an OO language?</H1>

<?php require "footer.inc"?>
