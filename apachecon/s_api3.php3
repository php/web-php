<? require "header.inc"; ?>
<h1>Using the function arguments</h1>
<ul>
<li>convert_to_long(arg1);
<li>convert_to_double(arg1);
<li>convert_to_string(arg1); 
<li>convert_to_boolean_long(arg1);
<li>convert_string_to_number(arg1);
</ul>

<pre>
For type:
IS_STRING use arg1->value.str.val
IS_LONG       arg1->value.lval
IS_DOUBLE     arg1->value.dval
</pre>
<? require "footer.inc"; ?>
