<?php
// $Id$

/*
  This script provides an interface to our books listing
  (includes/books.inc) to the user. The two vars accepted
  are 'type' and 'lang', arriving from a GET request.
  Fallback to the users language and the PHP type is
  supported.
*/

// Ensure that our environment is set up
$_SERVER['BASE_PAGE'] = 'books.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/books.inc';

// Some misc info on books to the sidebar
$SIDEBAR_DATA = <<<SIDEBAR_END
<h3>More Books</h3>
<p>
 There may be more books available that we don't know of yet! You can search
 <a href="http://www.amazon.com/exec/obidos/redirect-home/wwwphpnet">Amazon.com</a>
 for PHP related stuff by using this form (or go directly to
 <a href="http://www.amazon.de/exec/obidos/redirect-home/wwwphpnet07">Amazon.de</a>
 or <a href="http://www.amazon.fr/exec/obidos/redirect-home/wwwphpnet0f">Amazon.fr</a>
 and search there):
</p>

<form method="get" action="http://www.amazon.com/exec/obidos/external-search">
 <input type="hidden" name="tag" value="wwwphpnet" />
 Search Amazon for<br />
 <select name="mode">
  <option value="blended">All Products</option>
  <option value="books" selected="selected">Books</option>
  <option value="music">Popular Music</option>
  <option value="classical-music">Classical Music</option>
  <option value="video">Video</option>
  <option value="toys">Toys</option>
  <option value="electronics">Electronics</option>
 </select><br />
 about<br />
 <select name="keyword">
  <option selected="selected">PHP</option>
  <option>Apache</option>
  <option>Linux</option>
  <option>MySQL</option>
  <option>PostgreSQL</option>
  <option>mSQL</option>
  <option>Oracle</option>
  <option>IMAP</option>
  <option>LDAP</option>
  <option>XML</option>
  <option>Adabas</option>
  <option>Sybase</option>
  <option>Microsoft SQL</option>
  <option>Microsoft NT</option>
  <option>ODBC</option>
 </select><br />
 <input type="submit" value="Search" name="Search" />
</form>

<h3>Book Suggestion</h3>
<p>
 If you have found a book, which is not listed here, please
 email such details presented about books here to the
 webmaster. Please also include a link to a suitable image.
 See <a href="/support.php">the support page</a> for more
 information.
</p>
SIDEBAR_END;

commonHeader("Books");

// Show a table row for one book
function book_show($one_book)
{
    global $book_langs;
    list($title, $title_link, $author, $author_link,
         $image, $info, $info_link, $lang) = $one_book;

    // Default to english
    if (!$lang || !isset($book_langs[$lang]) ) { $lang = 'en'; }

    // Min. one title, max two titles
    if (is_array($title)) {
        $img_title = $title[0];
        $title = '<h2 class="condensed">' .
                 make_link($title_link, $title[0]) . '</h2>' . $title[1];
    } else {
        $img_title = $title;
        $title = '<h2 class="condensed">' .
                 make_link($title_link, $title) . '</h2>';
    }

    // More than one author for this book
    if (is_array($author)) {
        
        // No link for the authors, simple author list
        if (!$author_link) {
            $temp = $author;
        }
        
        // Build links to the authors' pages
        else {
            for ($i=0; $i < count ($author); $i++) {
                if ($author_link[$i]) {
                    $temp[] = make_link($author_link[$i], $author[$i]);
                } else {
                    $temp[] = $author[$i];
                }
            }
        }
        $last = array_pop($temp);
        $author = join(', ', $temp) . ' &amp; ' . $last;
        
    } else {
        if ($author_link) {
            $author = make_link($author_link, $author);
        }
    }

    // Horizontal delimiter row
    echo "<tr><td colspan=\"2\"><hr /></td></tr>\n";

    // Information row for the book
    echo "<tr valign=\"top\">\n<td>\n" .
         make_link($title_link, make_image("books/$image", $img_title)) .
         "<br>\n</td><td><p>\n$title\nby $author</p>\n<small>\n";

    // Print any book information and more info link
    if ($info || $lang != "en") {
        echo "<p>\n";
        if ($lang != "en") {
            echo "in " . $book_langs[$lang] . "<br>\n";
        }
        echo $info . "</p>\n";
    }
    echo "<p>" . make_link(
        $info_link ? $info_link : $title_link,
        make_image("caret-rg.gif",">") . "more info"
    );
    echo "<br>\n</p>\n</small>\n</td>\n</tr>\n\n";
}

// Generate book statistics (book numbers by languages)
function book_stats($books, $btype)
{
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
}

// Support for old type of parameters
if (isset($_GET['type_lang']) && !empty($_GET['type_lang'])) {
    list($_GET['type'], $_GET['lang']) = explode("_", $_GET['type_lang']);
}

// Fallback to default type and language (the users' own language
// preference, if nothing else is specified)
if (!isset($book_types[$_GET['type']])) { $_GET['type'] = "PHP"; }
if (!isset($book_langs[$_GET['lang']])) {
    if (!isset($book_langs[$LANG])) {
        $_GET['lang'] = 'en';
    } else {
        $_GET['lang'] = $LANG;
    }
}

?>
<h1>Books</h1>
<p>
 Click on a book for more information or (in most cases) to purchase it.
 Choose one category and/or a language from the ones below to go to
 a listing of books about that subject. If you buy the book using the
 links on this page, you are helping to support PHP development!
 Note that the list of books is not static, it is always presented
 in a random order.
</p>

<table border="0" cellpadding="3" cellspacing="2" width="100%">
<tr bgcolor="#cccccc"><th>Types</th><th>Languages</th></tr>
<?php

// Jumplist with types and languages
foreach ($books as $btype => $book_list) {
    echo "<tr>\n <th bgcolor=\"#dddddd\">" . $book_types[$btype] .
         "</th>\n <td bgcolor=\"#eeeeee\">\n";
    $book_stat = book_stats($books, $btype);
    $first = TRUE;
    foreach ($book_stat as $blang => $number) {
        if (!$first) { echo ", \n"; }
        echo "  <a href=\"/books.php?type=${btype}&amp;lang=${blang}\">" .
        $book_langs[$blang] . " ($number)</a>";
        $first = FALSE;
    }
    echo "\n </td>\n</tr>\n";
}

echo "</table>\n";

echo '<h1>' . $book_types[$_GET['type']] . ' in ' .
    $book_langs[$_GET['lang']] . "</h1>\n";
echo '<table border="0" cellpadding="5">';
shuffle($books[$_GET['type']]);
foreach ($books[$_GET['type']] as $one_book) {
    if (isset($_GET['lang']) && $_GET['lang'] != $one_book[7]) { continue; }
    book_show($one_book);
}
echo "</table>\n";

commonFooter();

/* vim: set noet ts=4 sw=4 ft=php: : */
?>
