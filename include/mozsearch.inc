<search
 name="PHP.net"
 description="PHP.net - Search"
 method="GET"
 action="<?php echo $MYSITE; ?>manual-lookup.php"
 searchForm="<?php echo $MYSITE; ?>"
>

<input name="souurceid" user="Mozilla-search">
<input name="pattern" user="">

<interpret
 browserResultType="result"
 resultListStart="<!-- result list start -->"
 resultListEnd="<!-- result list end -->"
 resultItemEnd="<br />"
>

<browser
 update="<?php echo $MYSITE; ?>phpnetsearch.src"
 updateIcon="<?php echo $MYSITE; ?>images/phpnetsearch.png"
 updateCheckDays="7"
>

</search>