<?php

include "./include/prepend.inc";
include "./include/books.inc";
commonHeader("PHP Books");

// Show a table row for one book
function showBook($one_book) {

  global $book_langs;
  list($title, $title_link, $author, $author_link, $image, $info, $info_link, $lang) = $one_book;

  // Default to english
  if (!$lang || !isset($book_langs[$lang]) ) { $lang = 'en'; }

  // Min. one title, max two titles
  if (is_array($title)) {
    $img_title = $title[0];
    $title = '<h2 class="condensed">' . make_link ($title_link, $title[0]) . '</h2>' . $title[1];
  } else {
    $img_title = $title;
    $title = '<h2 class="condensed">' .  make_link ($title_link, $title) . '</h2>';
  }

  // More than one author for this book
  if (is_array($author)) {
    // No link for the authors, simple author list
    if (!$author_link) {
      $temp = $author;
    }
    // Build links to the authors pages
    else {
      for ($i=0; $i < count ($author); $i++) {
        if ($author_link[$i]) {
          $temp[] = make_link ($author_link[$i],$author[$i]);
        } else {
          $temp[] = $author[$i];
        }
      }
    }
    $last = array_pop($temp);
    $author = join(', ', $temp) . ' &amp; ' . $last;
  } else {
    if ($author_link)
	   $author = make_link ($author_link, $author);
  }

  echo '<tr><td colspan="2">' . hdelim() . "</td></tr>\n";

  echo '<tr valign="top">' . "\n";
  echo "<td>\n";
  print_link ($title_link, make_image ("books/".$image, $img_title, false, false, false, 0) );
  echo "<br>\n</td><td><p>\n";
  echo "$title\nby ";
  echo $author;
  echo "</p>\n<small>\n";

  if ($info || $lang != "en") {
    echo "<p>\n";
    if ($lang != "en") {
      echo "in " . $book_langs[$lang] . "<br>\n";
    }
    echo $info . "</p>\n";
  }
  echo "<p>" . make_link ($info_link ? $info_link : $title_link, make_image ("caret-rg.gif",">") . "more info" );
  echo "<br>\n</p>\n</small>\n</td>\n</tr>\n\n";

} // end of showBook() function

// Generate book statistics (book numbers by languages)
function bookStats ($books, $btype) {

  $stats = array();
  foreach ($books[$btype] as $number => $book) {
    if (isset($stats[$book[7]])) {
		$stats[$book[7]]++;
	} else {
		$stats[$book[7]] = 1;
    }
  }
  arsort($stats, SORT_NUMERIC);
  return $stats;

} // end of bookStats() function

echo '<h1>PHP Books</h1>';

// If invalid type || lang specified, unset it
if (isset($type_lang) && !empty($type_lang)) {
	list($type, $lang) = explode("_", $type_lang);
	if (!isset($book_types[$type])) { unset($type); }
	if (!isset($book_langs[$lang])) { unset($lang); }
}

// If type is set, we are printing books
if (isset($type)) { ?>
<p>
Click on a book for more information or (in most cases) to purchase it.
If you would like to jump to another category, choose one from the
list below. Remember, if you buy the book using the links on this page,
you are helping to support PHP development!
</p>

<?php } else { ?>
<p>
Choose one category and/or a language from the ones below to go to
a listing of books about that subject.
</p>
<?php } ?>

<form method="get" action="<?php echo $PHP_SELF; ?>">
Browse our listing:
<select name="type_lang">

<?php
// Jumplist with types and languages
foreach ($books as $btype => $book_list) {
  echo "  <option value=\"${btype}_all\">+&nbsp;" . $book_types[$btype] . " [" . count($book_list) . " total]" . "</option>\n";
  $book_stat = bookStats($books, $btype);
  foreach ($book_stat as $blang => $number) {
    if ($number == 1) { $suff = ""; } else { $suff = "s"; }
    echo "    <option value=\"${btype}_${blang}\">" . "&nbsp;&nbsp; - $number book$suff in " . $book_langs[$blang] . "</option>\n";
  }
}
?>

</select>
<input type="submit" value="Show">
</form>

<p>
There may be more books available that we don't know of yet! You can search
<a href="http://www.amazon.com/exec/obidos/redirect-home/wwwphpnet">Amazon.com</a>
for PHP related stuff by using this form (or go directly to
<a href="http://www.amazon.de/exec/obidos/redirect-home/wwwphpnet07">Amazon.de</a>
or <a href="http://www.amazon.fr/exec/obidos/redirect-home/wwwphpnet0f">Amazon.fr</a>
and search there):
</p>

<p>
<form method="get" action="http://www.amazon.com/exec/obidos/external-search">
<input type="hidden" name="tag" value="wwwphpnet">
Search Amazon for
<select name="mode">
<option value="blended">All Products
<option value="books" selected>Books
<option value="music">Popular Music
<option value="classical-music">Classical Music
<option value="video">Video
<option value="toys">Toys
<option value="electronics">Electronics
</select>
about
<select name="keyword">
<option selected>PHP
<option>Apache
<option>Linux
<option>MySQL
<option>PostgreSQL
<option>mSQL
<option>Oracle
<option>IMAP
<option>LDAP
<option>XML
<option>Adabas
<option>Sybase
<option>Microsoft SQL
<option>Microsoft NT
<option>ODBC
</select>
<input type="submit" border="0" value="Search" name="Search">
</form>
</p>

<?php

// If the type is set, print out the books
if (isset($type)) {

  if (!isset($lang)) { $suffix = ' in all languages'; }
  else { $suffix = ' in ' . $book_langs[$lang]; }

  echo '<h1>' . $book_types[$type] . $suffix . '</h1>';
  echo '<table border="0" cellpadding="5">';
  shuffle($books[$type]);
  foreach ($books[$type] as $one_book) {
    if (isset($lang) && $lang != $one_book[7]) { continue; }
    showBook($one_book);
  }
  echo '</table>';
}

echo "</p>";

commonFooter();

/* vim: set noet ts=4 sw=4 ft=php: : */
?>
