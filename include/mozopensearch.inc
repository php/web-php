<SearchPlugin xmlns="http://www.mozilla.org/2006/browser/search/">
	<ShortName>PHP.net</ShortName>
	<Description>PHP.net - Search</Description>
	<InputEncoding>UTF-8</InputEncoding>
	<Contact>gothicx@gmail.com</Contact>
	<Image width="16" height="16"><?php echo $MYSITE; ?>images/phpnetsearch.png</Image>
	<Developer>Marco Rodrigues</Developer>
	<Url type="text/html" method="GET" template="<?php echo $MYSITE; ?>manual-lookup.php">
		<Param name="pattern" value="{searchTerms}"/>
		<Param name="opensearch" value="yes"/>
	</Url>
	<SearchForm><?php echo $MYSITE; ?></SearchForm>
</SearchPlugin>
