<?require "header.inc";?>
<h1>PHP Symbol Tables</h1>
<ul>
<li> Hash Tables
<li> 'active_symbol_table' - current
<li> 'symbol_table' - main (global)
<li> _php3_hash_exist() to check if a var exists
<li> _php3_hash_find() to check the type of a var
<li> Arrays in PHP use the same hash functions
</ul>

<h1>Setting variables in the symbol table</h1>
<ul>
<li>SET_VAR_STRING(name,value)
<li>SET_VAR_DOUBLE(name,value)
<li>SET_VAR_LONG(name,value)
</ul>
<h3>value arg must be emalloc'ed - no static memory!</h3>
<?require "footer.inc";?>
