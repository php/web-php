<?php require "header.inc"; ?>
<H1>Function Prototype and arguments</H1>

<?example('void php3_foo(INTERNAL_FUNCTION_PARAMETERS) {
	pval *arg1, *arg2;
	if (ARG_COUNT(ht) != 2 || 
		getParameters(ht,2,&arg1,&arg2)==FAILURE) {
		WRONG_PARAM_COUNT;
	}
}');?>
<?require "footer.inc"; ?>
