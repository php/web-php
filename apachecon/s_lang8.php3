<?php require "header.inc"?>
<h2>Objects</h2>
<?example('<?class Foo {
        var $name, $rank;
        function Foo($name, $rank) {
           $this->name = $name; $this->rank = $rank;
        }
        function report() {
            echo "My name is ".$this->name;
            echo " and my rank is ".$this->rank;
        }
    };
    $me = new Foo("GI Joe", "Private");
    $me->report();
?>');?>
<h6>Output:</H6>
<BLOCKQUOTE>
<?class Foo {
        var $name, $rank;
        function Foo($name, $rank) {
           $this->name = $name; $this->rank = $rank;
        }
        function report() {
            echo "My name is ".$this->name;
            echo " and my rank is ".$this->rank;
        }
    };
    $me = new Foo("GI Joe", "Private");
    $me->report();
?>
</BLOCKQUOTE>
        
<?php require "footer.inc"?>
