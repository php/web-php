<?require "header.inc";?>
<h1>Creating an empty array named foo</h1>

<?example('	pval arr;
	if (array_init(&arr) == FAILURE) { failed... };
	hash_update(symbol_table,"foo",4,&arr,
						 sizeof(pval),NULL);
 ');?> 

<h1>Create $foo["bar"] = 5</h1>

<?example('	pval entry;
  
	entry.type = IS_LONG;
	entry.value.lval = 5;
  
	hash_update(arr.value.ht,"bar",
						  sizeof("bar"),&entry,sizeof(pval),NULL);
');?>
<?require "footer.inc";?>
