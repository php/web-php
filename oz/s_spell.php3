<?php require "header.inc"?>
<H1>Spell Checking and URL Tricks</H1>

<h2>ForceType</h2>
<?example('<Location /s> 
ForceType application/x-httpd-php3 
</Location>')?>

<h2>PATH_INFO</h2>
<?example('<html><head><title>Simple Spell-Checker</title></head><body> 
<h3>Simple Spell-Checker</h3> 
<? $aspell_link=aspell_new( "english"); 
     $word = substr($PATH_INFO,1);  /* strip away first / */ 
     if (aspell_check($aspell_link,$word)) { 
        echo  "Correct spelling of \'$word\'<P>\n"; 
     } else { 
         echo  "Incorrect spelling of \'$word\'<P>\n"; 
     } 
     echo  "Possible correct spellings include:<br>\n"; 
     $suggestions=aspell_suggest($aspell_link,$word); 
     for($i=0; $i < count($suggestions); $i++) { 
        echo  "<li>" . $suggestions[$i] .  "<br>";  
     } 
     echo  "</ol>"; 
?></body></html>')?>
<center><h3><a href="/s/bogus" target="_new">/s/bogus</a></h3></center>
<?php require "footer.inc"?>
