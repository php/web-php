<?php require "header.inc"; ?>
<H1>Function Prototype and arguments</H1>

<?example('void php3_foo(INTERNAL_FUNCTION_PARAMETERS) {
	pval *arg1, *arg2;
	if (ARG_COUNT(ht) != 2 || 
		getParameters(ht,2,&arg1,&arg2)==FAILURE) {
		WRONG_PARAM_COUNT;
	}
}');?>

<H1>Variable number of function arguments</H1>
<?example('
	pval *arg1, *arg2, *arg3;
	int arg_count = ARG_COUNT(ht);

	if (arg_count<2 || arg_count>3 ||
		getParameters(ht,arg_count,&arg1,&arg2,&arg3)==FAILURE) {
		WRONG_PARAM_COUNT;
	}
')?>

<h1>Using the function arguments</h1>
<ul>
<li>convert_to_long(arg1);
<li>convert_to_double(arg1);
<li>convert_to_string(arg1); 
<li>convert_to_boolean_long(arg1);
<li>convert_string_to_number(arg1);
</ul>

<pre>
   For type IS_STRING, use arg1->value.str.val
            IS_LONG        arg1->value.lval
            IS_DOUBLE      arg1->value.dval
</pre>

<h1>PHP Symbol Tables</h1>
<ul>
<li> Hash Tables
<li> 'active_symbol_table' - current
<li> 'symbol_table' - main (global)
<li> _php3_hash_exist() to check if a var exists
<li> _php3_hash_find() to check the type of a var
<li> Arrays in PHP use the same hash functions
</ul>

<h1>Setting variables in the PHP symbol table</h1>
<ul>
<li>SET_VAR_STRING(name,value) **
<li>SET_VAR_DOUBLE(name,value)
<li>SET_VAR_LONG(name,value)
</ul>

<h1>value arg must be emalloc'ed - no static memory!</h1>

<h1>Creating an empty array named foo</h1>

<?example('
	pval arr;
	if (array_init(&arr) == FAILURE) { failed... };
	hash_update(symbol_table,"foo",4,&arr,sizeof(pval),NULL);
 ');?> 

<h1>Create $foo["bar"] = 5</h1>

<?example('
      pval entry;
  
      entry.type = IS_LONG;
      entry.value.lval = 5;
  
      hash_update(arr.value.ht,"bar",sizeof("bar"),&entry,sizeof(pval),NULL);
');?>

<h1>Returning values from functions</h1>
<ul>
<li>RETURN_FALSE
<li>RETURN_TRUE
<li>RETURN_LONG(l)
<li>RETURN_STRING(string,dup)
<li>RETURN_STRINGL(string,length,dup)
<li>RETURN_DOUBLE(d)
</ul>

<h1>Returning an array from a function</h1>
<ul>
<li>Initialize with:
<li>if (array_init(return_value) == FAILURE) { failed...; }

  and then adding values with the helper functions:

    add_next_index_long(return_value,long_value);
    add_next_index_double(return_value,double_value);
    add_next_index_string(return_value,estrdup(string_value));
  
  Of course, if the adding isn't done right after the array
  initialization, you'd probably have to look for the array first:
  
    pval *arr;
  
    if (hash_find(active_symbol_table,"foo",sizeof("foo"),(void **)&arr)==FAILURE) { can't find... }
    else { use arr->value.ht... }
  
  Note that hash_find receives a pointer to a pval pointer, and
  not a pval pointer.
  
  Just about any hash function returns SUCCESS or FAILURE (except for
  hash_exists() that returns a boolean truth value).
    
-------------------

7. Returning 'simple' values from functions (integers, floats or strings)

   A number of macros are available to make it easier to return things from
   functions:

   These set the return value and return from the function:

   RETURN_FALSE
   RETURN_TRUE
   RETURN_LONG(l)
   RETURN_STRING(s,dup)        If dup is true, duplicates the string
   RETURN_STRINGL(s,l,dup)     Return string (s) specifying length (l).
   RETURN_DOUBLE(d)

   These only set the return value:

   RETVAL_FALSE
   RETVAL_TRUE
   RETVAL_LONG(l)
   RETVAL_STRING(s,dup)       If dup is true, duplicates the string
   RETVAL_STRINGL(s,l,dup)    Return string (s) specifying length (l).
   RETVAL_DOUBLE(d)

   The string macros above will all estrdup() the passed 's' argument,
   so you can safely free the argument after calling the macro, or
   alternatively use statically allocated memory.

   If your function returns boolean success/error responses, always use
   RETURN_TRUE and RETURN_FALSE respectively.

-------------------

8. Returning 'complex' values from functions (arrays or objects)

   Your function can also return a complex data type such as an object
   or an array.

   Returning an object:

   1. Call object_init(return_value).
   2. Fill it up with values:

   add_property_long(return_value,property_name,l)			Add a property named 'property_name', of type long, equals to 'l'
   add_property_double(return_value,property_name,d)		Same, only a double
   add_property_string(return_value,property_name,str)		Same, only a string
   add_property_stringl(return_value,property_name,str,l)	Add a property named 'property_name', of type string, string is 'str' with length 'l'

   3. Possibly, register functions for this object.  In order to
      obtain values from the object, the function would have to fetch
      "this" from the active_symbol_table.  Its type should be IS_OBJECT,
      and it's basically a regular hash table (i.e., you can use regular
      hash functions on .value.ht).  The actual registration of the
      function can be done using:
   
   add_method(return_value,function_name,function_ptr)
   
   
   Returning an array:

   1.  Call array_init(return_value).
   2.  Fill it up with values:

   add_assoc_long(return_value,key,l)				add associative entry with key 'key' and long value 'l'
   add_assoc_double(return_value,key,d)		
   add_assoc_string(return_value,key,str)
   add_assoc_stringl(return_value,key,str,length)	specify the string length

   add_index_long(return_value,index,l)				add entry in index 'index' with long value 'l'
   add_index_double(return_value,index,d)
   add_index_string(return_value,index,str)
   add_index_stringl(return_value,index,str,length)  specify the string length

   add_next_index_long(return_value,l)				add an array entry in the next free offset with long value 'l'
   add_next_index_double(return_value,d)
   add_next_index_string(return_value,str)
   add_next_index_stringl(return_value,str,length)	specify the string length

-------------------

9. Using the resource list

   PHP 3.0 has a standard way of dealing with various types of resources,
   that replaces all of the local linked lists in PHP 2.0.

   Available functions:

   php3_list_insert(ptr, type)      returns the 'id' of the newly inserted resource
   php3_list_delete(id)             delete the resource with the specified id
   php3_list_find(id,*type)         returns the pointer of the resource with the specified id, updates 'type' to the resource's type

   Typically, these functions are used for SQL drivers but they can be
   used for anything else, and are used, for instance, for maintaining
   file descriptors.

   Typical list code would look like this:

	Adding a new resource:

		RESOURCE *resource;

		...allocate memory for resource and acquire resource...
		/* add a new resource to the list */
		return_value->value.lval = php3_list_insert((void *) resource, LE_RESOURCE_TYPE);
		return_value->type = IS_LONG;

	Using an existing resource:

		pval *resource_id;
		RESOURCE *resource;
		int type;

		convert_to_long(resource_id);
		resource = php3_list_find(resource_id->value.lval, &type);
		if (type != LE_RESOURCE_TYPE) {
			php3_error(E_WARNING,"resource index %d has the wrong type",resource_id->value.lval);
			RETURN_FALSE;
		}
		...use resource...

	Deleting an existing resource:

		pval *resource_id;
		RESOURCE *resource;
		int type;

		convert_to_long(resource_id);
		php3_list_delete(resource_id->value.lval);
   

   The resource types should be registered in php3_list.h, in enum
   list_entry_type.  In addition, one should add shutdown code for any
   new resource type defined, in list.c's list_entry_destructor() (even if
   you don't have anything to do on shutdown, you must add an empty case).

-------------------

10. Using the persistent resource table

   PHP 3.0 has a standard way of storing persistent resources (i.e.,
   resources that are kept in between hits).  The first module to use
   this feature was the MySQL module, and mSQL followed it, so one can
   get the general impression of how a persistent resource should be
   used by reading mysql.c.  The functions you should look at are:
   php3_mysql_do_connect()
   php3_mysql_connect()
   php3_mysql_pconnect()

   The general idea of persistence modules is this:
   1.  Code all of your module to work with the regular resource list
       mentioned in section (9).
   2.  Code extra connect functions that check if the resource already
       exists in the persistent resource list.  If it does, register it
       as in the regular resource list as a pointer to the persistent
       resource list (because of 1., the rest of the code
       should work immediately).  If it doesn't, then create it, add it
       to the persistent resource list AND add a pointer to it from the
       regular resource list, so all of the code would work since it's
       in the regular resource list, but on the next connect, the
       resource would be found in the persistent resource list and be
       used without having to recreate it.
       You should register these resources with a different type (e.g.
       LE_MYSQL_LINK for non-persistent link and LE_MYSQL_PLINK for
       a persistent link).

   If you read mysql.c, you'll notice that except for the more complex
   connect function, nothing in the rest of the module has to be changed.
   
   The very same interface exists for the regular resource list and the
   persistent resource list, only 'list' is replaced with 'plist':

   php3_plist_insert(ptr, type)      returns the 'id' of the newly inserted resource
   php3_plist_delete(id)             delete the resource with the specified id
   php3_plist_find(id,*type)         returns the pointer of the resource with the specified id, updates 'type' to the resource's type

   However, it's more than likely that these functions would prove
   to be useless for you when trying to implement a persistent module.
   Typically, one would want to use the fact that the persistent resource
   list is really a hash table.  For instance, in the MySQL/mSQL modules,
   when there's a pconnect() call (persistent connect), the function
   builds a string out of the host/user/passwd that were passed to the
   function, and hashes the SQL link with this string as a key.  The next
   time someone calls a pconnect() with the same host/user/passwd, the
   same key would be generated, and the function would find the SQL link
   in the persistent list.

   Until further documented, you should look at mysql.c or msql.c to
   see how one should use the plist's hash table abilities.

   One important thing to note:  resources going into the persistent
   resource list must *NOT* be allocated with PHP's memory manager, i.e.,
   they should NOT be created with emalloc(), estrdup(), etc.  Rather,
   one should use the regular malloc(), strdup(), etc.  The reason for
   this is simple - at the end of the request (end of the hit), every
   memory chunk that was allocated using PHP's memory manager is deleted.
   Since the persistent list isn't supposed to be erased at the end
   of a request, one mustn't use PHP's memory manager for allocating
   resources that go to it.

   Shutting down persistent resources:  
   
   When you register resource that's going to be in the persistent list,
   you should add destructors to it both in the non-persistent list
   and in the persistent list.
   The destructor in the non-persistent list destructor shouldn't do anything.
   The one in the persistent list destructor should properly free any
   resources obtained by that type (e.g. memory, SQL links, etc).  Just like
   with the non-persistent resources, you *MUST* add destructors for every
   resource, even it requires no destructotion and the destructor would
   be empty.
   Remember, since emalloc() and friends aren't to be used in conjunction
   with the persistent list, you mustn't use efree() here either.

-------------------

11. Adding runtime configuration directives

Many of the features of PHP3 can be configured at runtime.  These
configuration directives can appear in either the designated php3.ini
file, or in the case of the Apache module version in the Apache .conf
files.  The advantage of having them in the Apache .conf files is that
they can be configured on a per-directory basis.  This means that one
directory may have a certain safemodeexecdir for example, while another
directory may have another.  This configuration granularity is especially
handy when a server supports multiple virtual hosts.

The steps required to add a new directive:

 1. Add directive to php3_ini_structure struct in mod_php3.h. 
    
 2. In main.c, edit the php3_module_startup function and add the
    appropriate cfg_get_string() or cfg_get_long() call.

 3. Add the directive, restrictions and a comment to the php3_commands
    structure in mod_php3.c.  Note the restrictions part.  RSRC_CONF are
    directives that can only be present in the actual Apache .conf files.
    Any OR_OPTIONS directives can be present anywhere, include normal
    .htaccess files.

 4. In either php3take1handler() or php3flaghandler() add the appropriate
    entry for your directive.

 5. In the configuration section of the _php3_info() function in
    functions/info.c you need to add your new directive.

 6. And last, you of course have to use your new directive somewhere.
    It will be addressable as php3_ini.directive
