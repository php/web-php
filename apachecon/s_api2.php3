<?php require "header.inc"; ?>
<H1>Variable number of function arguments</H1>
<?example('	pval *arg1, *arg2;
	int ac = ARG_COUNT(ht);

	if (ac < 1 || ac > 2 ||
		getParameters(ht,ac,&arg1,&arg2)==FAILURE) {
			WRONG_PARAM_COUNT;
	}
')?>
<?php require "footer.inc"; ?>
