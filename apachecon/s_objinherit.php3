<?php require "header.inc"?>
<H1>Object Inheritance</H1>

<?example('<?php
class Cart {
    var $items;  // Items in our shopping cart  
    // Add $num articles of $artnr to the cart
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

$cart = new NamedCart("Jim");
$cart->add_item(170923, 2);
?>');?>

<?php require "footer.inc"?>
