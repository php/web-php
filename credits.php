<?php
require_once 'prepend.inc';

if (function_exists('ob_start')) {
	ob_start();
	phpcredits();
	$credits = ob_get_contents();
	ob_end_clean();

	# strip all but the body
	preg_match('/<body.*?>(.*)<\/body>/ims', $credits, $m );

	# strip out any style
	$credits = preg_replace('/<style.*?>.*<\/style>/ims', '', $m[1] );

	if ($credits) {
		commonHeader("PHP Credits", 1);
		echo $credits;
		commonFooter(); 
		exit;
	}
}

phpcredits();

?>
