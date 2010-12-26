<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();
include_once dirname(__FILE__) ."/toc/refs.basic.text.inc";
$setup = array (
  'home' => 
  array (
    0 => 'index.php',
    1 => 'PHP Manual',
  ),
  'head' => 
  array (
    0 => 'UTF-8',
    1 => 'en',
  ),
  'this' => 
  array (
    0 => 'book.strings.php',
    1 => 'Strings',
  ),
  'up' => 
  array (
    0 => 'refs.basic.text.php',
    1 => 'Text Processing',
  ),
  'prev' => 
  array (
    0 => 'function.ssdeep-fuzzy-hash.php',
    1 => 'ssdeep_fuzzy_hash',
  ),
  'next' => 
  array (
    0 => 'intro.strings.php',
    1 => 'Introduction',
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/book.strings.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="book.strings" class="book">
 <h1 class="title">Strings</h1>

 

 







 





 








<ul class="chunklist chunklist_book"><li><a href="intro.strings.php">Introduction</a></li><li><a href="strings.setup.php">Installing/Configuring</a><ul class="chunklist chunklist_book chunklist_children"><li><a href="strings.requirements.php">Requirements</a></li><li><a href="strings.installation.php">Installation</a></li><li><a href="strings.configuration.php">Runtime Configuration</a></li><li><a href="strings.resources.php">Resource Types</a></li></ul></li><li><a href="string.constants.php">Predefined Constants</a></li><li><a href="ref.strings.php">String Functions</a><ul class="chunklist chunklist_book chunklist_children"><li><a href="function.addcslashes.php">addcslashes</a> — Quote string with slashes in a C style</li><li><a href="function.addslashes.php">addslashes</a> — Quote string with slashes</li><li><a href="function.bin2hex.php">bin2hex</a> — Convert binary data into hexadecimal representation</li><li><a href="function.chop.php">chop</a> — Alias of rtrim</li><li><a href="function.chr.php">chr</a> — Return a specific character</li><li><a href="function.chunk-split.php">chunk_split</a> — Split a string into smaller chunks</li><li><a href="function.convert-cyr-string.php">convert_cyr_string</a> — Convert from one Cyrillic character set to another</li><li><a href="function.convert-uudecode.php">convert_uudecode</a> — Decode a uuencoded string</li><li><a href="function.convert-uuencode.php">convert_uuencode</a> — Uuencode a string</li><li><a href="function.count-chars.php">count_chars</a> — Return information about characters used in a string</li><li><a href="function.crc32.php">crc32</a> — Calculates the crc32 polynomial of a string</li><li><a href="function.crypt.php">crypt</a> — One-way string hashing</li><li><a href="function.echo.php">echo</a> — Output one or more strings</li><li><a href="function.explode.php">explode</a> — Split a string by string</li><li><a href="function.fprintf.php">fprintf</a> — Write a formatted string to a stream</li><li><a href="function.get-html-translation-table.php">get_html_translation_table</a> — Returns the translation table used by htmlspecialchars and htmlentities</li><li><a href="function.hebrev.php">hebrev</a> — Convert logical Hebrew text to visual text</li><li><a href="function.hebrevc.php">hebrevc</a> — Convert logical Hebrew text to visual text with newline conversion</li><li><a href="function.html-entity-decode.php">html_entity_decode</a> — Convert all HTML entities to their applicable characters</li><li><a href="function.htmlentities.php">htmlentities</a> — Convert all applicable characters to HTML entities</li><li><a href="function.htmlspecialchars-decode.php">htmlspecialchars_decode</a> — Convert special HTML entities back to characters</li><li><a href="function.htmlspecialchars.php">htmlspecialchars</a> — Convert special characters to HTML entities</li><li><a href="function.implode.php">implode</a> — Join array elements with a string</li><li><a href="function.join.php">join</a> — Alias of implode</li><li><a href="function.lcfirst.php">lcfirst</a> — Make a string's first character lowercase</li><li><a href="function.levenshtein.php">levenshtein</a> — Calculate Levenshtein distance between two strings</li><li><a href="function.localeconv.php">localeconv</a> — Get numeric formatting information</li><li><a href="function.ltrim.php">ltrim</a> — Strip whitespace (or other characters) from the beginning of a string</li><li><a href="function.md5-file.php">md5_file</a> — Calculates the md5 hash of a given file</li><li><a href="function.md5.php">md5</a> — Calculate the md5 hash of a string</li><li><a href="function.metaphone.php">metaphone</a> — Calculate the metaphone key of a string</li><li><a href="function.money-format.php">money_format</a> — Formats a number as a currency string</li><li><a href="function.nl-langinfo.php">nl_langinfo</a> — Query language and locale information</li><li><a href="function.nl2br.php">nl2br</a> — Inserts HTML line breaks before all newlines in a string</li><li><a href="function.number-format.php">number_format</a> — Format a number with grouped thousands</li><li><a href="function.ord.php">ord</a> — Return ASCII value of character</li><li><a href="function.parse-str.php">parse_str</a> — Parses the string into variables</li><li><a href="function.print.php">print</a> — Output a string</li><li><a href="function.printf.php">printf</a> — Output a formatted string</li><li><a href="function.quoted-printable-decode.php">quoted_printable_decode</a> — Convert a quoted-printable string to an 8 bit string</li><li><a href="function.quoted-printable-encode.php">quoted_printable_encode</a> — Convert a 8 bit string to a quoted-printable string</li><li><a href="function.quotemeta.php">quotemeta</a> — Quote meta characters</li><li><a href="function.rtrim.php">rtrim</a> — Strip whitespace (or other characters) from the end of a string</li><li><a href="function.setlocale.php">setlocale</a> — Set locale information</li><li><a href="function.sha1-file.php">sha1_file</a> — Calculate the sha1 hash of a file</li><li><a href="function.sha1.php">sha1</a> — Calculate the sha1 hash of a string</li><li><a href="function.similar-text.php">similar_text</a> — Calculate the similarity between two strings</li><li><a href="function.soundex.php">soundex</a> — Calculate the soundex key of a string</li><li><a href="function.sprintf.php">sprintf</a> — Return a formatted string</li><li><a href="function.sscanf.php">sscanf</a> — Parses input from a string according to a format</li><li><a href="function.str-getcsv.php">str_getcsv</a> — Parse a CSV string into an array</li><li><a href="function.str-ireplace.php">str_ireplace</a> — Case-insensitive version of str_replace.</li><li><a href="function.str-pad.php">str_pad</a> — Pad a string to a certain length with another string</li><li><a href="function.str-repeat.php">str_repeat</a> — Repeat a string</li><li><a href="function.str-replace.php">str_replace</a> — Replace all occurrences of the search string with the replacement string</li><li><a href="function.str-rot13.php">str_rot13</a> — Perform the rot13 transform on a string</li><li><a href="function.str-shuffle.php">str_shuffle</a> — Randomly shuffles a string</li><li><a href="function.str-split.php">str_split</a> — Convert a string to an array</li><li><a href="function.str-word-count.php">str_word_count</a> — Return information about words used in a string</li><li><a href="function.strcasecmp.php">strcasecmp</a> — Binary safe case-insensitive string comparison</li><li><a href="function.strchr.php">strchr</a> — Alias of strstr</li><li><a href="function.strcmp.php">strcmp</a> — Binary safe string comparison</li><li><a href="function.strcoll.php">strcoll</a> — Locale based string comparison</li><li><a href="function.strcspn.php">strcspn</a> — Find length of initial segment not matching mask</li><li><a href="function.strip-tags.php">strip_tags</a> — Strip HTML and PHP tags from a string</li><li><a href="function.stripcslashes.php">stripcslashes</a> — Un-quote string quoted with addcslashes</li><li><a href="function.stripos.php">stripos</a> — Find position of first occurrence of a case-insensitive string</li><li><a href="function.stripslashes.php">stripslashes</a> — Un-quotes a quoted string</li><li><a href="function.stristr.php">stristr</a> — Case-insensitive strstr</li><li><a href="function.strlen.php">strlen</a> — Get string length</li><li><a href="function.strnatcasecmp.php">strnatcasecmp</a> — Case insensitive string comparisons using a &quot;natural order&quot; algorithm</li><li><a href="function.strnatcmp.php">strnatcmp</a> — String comparisons using a &quot;natural order&quot; algorithm</li><li><a href="function.strncasecmp.php">strncasecmp</a> — Binary safe case-insensitive string comparison of the first n characters</li><li><a href="function.strncmp.php">strncmp</a> — Binary safe string comparison of the first n characters</li><li><a href="function.strpbrk.php">strpbrk</a> — Search a string for any of a set of characters</li><li><a href="function.strpos.php">strpos</a> — Find position of first occurrence of a string</li><li><a href="function.strrchr.php">strrchr</a> — Find the last occurrence of a character in a string</li><li><a href="function.strrev.php">strrev</a> — Reverse a string</li><li><a href="function.strripos.php">strripos</a> — Find position of last occurrence of a case-insensitive string in a string</li><li><a href="function.strrpos.php">strrpos</a> — Find the position of the last occurrence of a substring in a string</li><li><a href="function.strspn.php">strspn</a> — Finds the length of the first segment of a string consisting
   entirely of characters contained within a given mask.</li><li><a href="function.strstr.php">strstr</a> — Find first occurrence of a string</li><li><a href="function.strtok.php">strtok</a> — Tokenize string</li><li><a href="function.strtolower.php">strtolower</a> — Make a string lowercase</li><li><a href="function.strtoupper.php">strtoupper</a> — Make a string uppercase</li><li><a href="function.strtr.php">strtr</a> — Translate characters or replace substrings</li><li><a href="function.substr-compare.php">substr_compare</a> — Binary safe comparison of two strings from an offset, up to length characters</li><li><a href="function.substr-count.php">substr_count</a> — Count the number of substring occurrences</li><li><a href="function.substr-replace.php">substr_replace</a> — Replace text within a portion of a string</li><li><a href="function.substr.php">substr</a> — Return part of a string</li><li><a href="function.trim.php">trim</a> — Strip whitespace (or other characters) from the beginning and end of a string</li><li><a href="function.ucfirst.php">ucfirst</a> — Make a string's first character uppercase</li><li><a href="function.ucwords.php">ucwords</a> — Uppercase the first character of each word in a string</li><li><a href="function.vfprintf.php">vfprintf</a> — Write a formatted string to a stream</li><li><a href="function.vprintf.php">vprintf</a> — Output a formatted string</li><li><a href="function.vsprintf.php">vsprintf</a> — Return a formatted string</li><li><a href="function.wordwrap.php">wordwrap</a> — Wraps a string to a given number of characters</li></ul></li></ul></div><?php manual_footer(); ?>