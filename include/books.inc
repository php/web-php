<?php

// $Id$

/*
 This file contains books data for books.php, including languages and type information.
 
 How to add a book:
 
   - First add the new book image to /images/books/ISBN-NUMBER-HERE.png
     (or gif, or jpg) Make sure that the image is 111 pixels wide (how
     tall it is will depend on the dimensions of the book)
   - Make a copy one of the book array items, and edit it appropriately
      - add the title as is
      - if the book is available from amazon.(com|de|fr) use the
        appropriate URL, modifying only the ISBN number part, otherwise
        use the same URL for title link and inform. link
      - if there are multiple authors, use an array for the author list,
        otherwise use a string
      - you can add author links (with a string or array) as you like,
        the link(s) will be paired with the author(s)
      - add the correct image name (ISBN-NUMBER-HERE.png (or gif, or jpg))
      - provide as much information about the book as possible
        (publisher, month and year of publication, ISBN, number of pages, and
         also indicate if the book has a CD included)
      - provide a link to the book's detailed page (most of the time on
        the publisher's site) with errata, downloadable chapter, etc.
      - specify the language (if that language is not yet in the $book_langs
        array, add it to that too)
        
  If a new edition of a book comes out, replace the old edition
  info with the new one (deleting the old image too, and adding
  the new one).
  
  The order of books in the array below is irrelevant, the books are displayed
  grouped by languages, and then randomly ordered. 
  However it is good practice to add books in the same language below each other 
  to the array and not completely mixed.
 
*/

// Languages used in the book listing
$book_langs = array(
  'en'  => 'English',
  'de'  => 'German',
  'es'  => 'Spanish',
  'fr'  => 'French',
  'cz'  => 'Czech',
  'kr'  => 'Korean',
  'jp'  => 'Japanese',
  'cn'  => 'Traditional Chinese',
  'pt'  => 'Portugese',
  'se'  => 'Swedish',
  'hu'  => 'Hungarian',
  'dk'  => 'Danish',
  'it'  => 'Italian',
  'pl'  => 'Polish',
  'no'  => 'Norwegian'
);

// Book types
$book_types = array(
  'PHP'     => "Books about PHP",
  'Related' => "Related Reading"
);

// The array of books (two types)
$books = array (

  "PHP" => array (

// Host down (17/08/2004)
//  array(
//    /* title[s]     */ "PHP Bible",
//    /* title_link   */ "http://php.wilson.gs/bible",
//    /* author[s]    */ "Wilson Peng",
//    /* auth link[s] */ "",
//    /* image        */ "wilson.jpg",
//    /* information  */ "",
//    /* inform. link */ "",
//    /* language     */ "cn"
//  ),

  array(
   /* title[s]     */ "Extending and Embedding PHP",
   /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/067232704X/wwwphpnet",
   /* author[s]    */ "Sara Golemon",
   /* auth link[s] */ "http://blog.libssh2.org",
   /* image        */ "067232704X.png",
   /* information  */ "Sams Publishing, 2006, ISBN 0-672-32704-X",
   /* inform. link */ "http://www.samspublishing.com/bookstore/product.asp?isbn=067232704X&rl=1",
   /* language     */ "en"
  ),

  array(
   /* title[s]     */ "php|architect's Guide to PHP Security",
   /* title_link   */ "http://www.phparch.com/shop_product.php?itemid=98",
   /* author[s]    */ "Ilia Alshanetsky",
   /* auth link[s] */ "http://www.ilia.ws",
   /* image        */ "0973862106.jpg",
   /* information  */ "PHP|Architect, 2005, ISBN 0-9738621-0-6, 201 pages",
   /* inform. link */ "http://www.phparch.com/shop_product.php?itemid=98",
   /* language     */ "en"
  ),

  array(
   /* title[s]     */ "Beginning PHP 5 and MySQL: From Novice to Professional",
   /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1893115518/wwwphpnet",
   /* author[s]    */ "W. Jason Gilmore",
   /* auth link[s] */ "http://www.wjgilmore.com",
   /* image        */ "1893115518.gif",
   /* information  */ "Apress, 2004, ISBN 1-893115-51-8, 768 pages",
   /* inform. link */ "http://www.apress.com/book/bookDisplay.html?bID=143",
   /* language     */ "en"
  ),

  array(
   /* title[s]     */ "Beginning PHP 5 and MySQL: From Novice to Professional",
   /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1590593928/wwwphpnet",
   /* author[s]    */ array("Cristian Darie", "Mihai Bucica"),
   /* auth link[s] */ "",
   /* image        */ "1590593928.gif",
   /* information  */ "Apress, 2004, ISBN 1-59059-392-8, 568 pages",
   /* inform. link */ "http://www.apress.com/book/bookDisplay.html?bID=356",
   /* language     */ "en"
  ),

  array(
   /* title[s]     */ "PHP 5 Objects, Patterns, and Practice",
   /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1590593804/wwwphpnet",
   /* author[s]    */ "Matt Zandstra",
   /* auth link[s] */ "",
   /* image        */ "1590593804.gif",
   /* information  */ "Apress, 2004, ISBN 1-59059-380-4, 438 pages",
   /* inform. link */ "http://www.apress.com/book/bookDisplay.html?bID=358",
   /* language     */ "en"
  ),

  array(
   /* title[s]     */ "PHP Web Development with Macromedia Dreamweaver MX 2004",
   /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1590593502/wwwphpnet",
   /* author[s]    */ array("Allan Kent", "David Powers", "Rachel Andrew"),
   /* auth link[s] */ "",
   /* image        */ "1590593502.gif",
   /* information  */ "Apress, 2004, ISBN 1-59059-350-2, 544 pages",
   /* inform. link */ "http://www.apress.com/book/bookDisplay.html?bID=306",
   /* language     */ "en"
  ),

  array(
   /* title[s]     */ "PHP MySQL Website Programming: Problem - Design - Solution",
   /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/159059150X/wwwphpnet",
   /* author[s]    */ array("Chris Lea", "Mike Buzzard", "Jessey White-Cinis", "Dilip Thomas"),
   /* auth link[s] */ "",
   /* image        */ "159059150X.gif",
   /* information  */ "Apress, 2003, ISBN 1-59059-150-X, 528 pages",
   /* inform. link */ "http://www.apress.com/book/bookDisplay.html?bID=200",
   /* language     */ "en"
  ),
  
  array(
    /* title[s]     */ array("Using PHP and MySQL", "With FreeBSD and Apache"),
    /* title_link   */ "http://www.drmaster.com.tw/info.asp?NO=DB20023",
    /* author[s]    */ "C.C.J.",
    /* auth link[s] */ "",
    /* image        */ "9575271688.gif",
    /* information  */ "July 1999, ISBN 957-527-168-8", 
    /* inform. link */ "http://www.dw.com.tw/book.html",
    /* language     */ "cn"
  ),

  array(
    /* title[s]     */ "Examples of PHP and MySQL",
    /* title_link   */ "http://www.drmaster.com.tw/info.asp?NO=DB20029",
    /* author[s]    */ "C.C.J.",
    /* auth link[s] */ "",
    /* image        */ "9575272242.gif",
    /* information  */ "February 2000, ISBN 957-527-224-2",
    /* inform. link */ "http://www.dw.com.tw/book.html",
    /* language     */ "cn"
  ),

  array(
    /* title[s]     */ array("PHP tvorba interaktivnich internetovych aplikaci", "(PHP developing interactive internet applications)"),
    /* title_link   */ "http://www.kosek.cz/php/",
    /* author[s]    */ "Jiri Kosek",
    /* auth link[s] */ "http://www.kosek.cz",
    /* image        */ "8071693731.jpg",
    /* information  */ "Grada Publishing, April 20 1999, ISBN 80-7169-373-1, 492 pages",
    /* inform. link */ "http://www.kosek.cz/php/",
    /* language     */ "cz"
  ),

  array(
    /* title[s]     */ "Einstieg in PHP 5",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3898422607/wwwphpnet07",
    /* author[s]    */ "Thomas Theis",
    /* auth link[s] */ "",
    /* image        */ "3898422607.jpg",
    /* information  */ "Galileo Computing, 2004, ISBN 3-89842-260-7, 550 pages",
    /* inform. link */ "http://www.galileocomputing.de/393",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 5 - Die Neuerungen",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3898424901/wwwphpnet07",
    /* author[s]    */ array("Martin Goldmann", "Markus Schraudolph"),
    /* auth link[s] */ "",
    /* image        */ "3898424901.jpg",
    /* information  */ "Galileo Computing, 2004, ISBN 3-89842-490-1, 170 pages",
    /* inform. link */ "http://www.galileocomputing.de/735",
    /* language     */ "de"
  ),
  
  array(
    /* title[s]     */ "Besser PHP programmieren",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3898423816/wwwphpnet07",
    /* author[s]    */ "Carsten Möhrke",
    /* auth link[s] */ "",
    /* image        */ "3898423816.jpg",
    /* information  */ "Galileo Computing, 2004, ISBN 3-89842-381-6, 624 pages",
    /* inform. link */ "http://www.galileocomputing.de/606",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP - Der erfolgreiche Einstieg",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3827262992/wwwphpnet07",
    /* author[s]    */ array("Christine Peyton", "Andre Möller"),
    /* auth link[s] */ "",
    /* image        */ "3827262992.jpg",
    /* information  */ "Markt & Technik, 2002, ISBN 3-8272-6299-2, 384 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Das LAMP Buch. Webserver mit Linux, Apache, MySQL und PHP",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3935922094/wwwphpnet07",
    /* author[s]    */ "Heiko Goller",
    /* auth link[s] */ "",
    /* image        */ "3935922094.jpg",
    /* information  */ "SuSE Press, 2002, ISBN 3-9359-2209-4, 478 pages",
    /* inform. link */ "http://www.susepress.de/de/katalog/3_935922_09_4/index.html",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP de Luxe - fortgeschrittene PHP-Programmierung",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3826607996/wwwphpnet07",
    /* author[s]    */ array("Richard Samar", "Christian Stoker"),
    /* auth link[s] */ array("http://www.php-de-luxe.ch/team/", "http://www.php-de-luxe.ch/team/"),
    /* image        */ "3826607996.jpg",
    /* information  */ "mitp, May 2002, ISBN 3-8266-0799-6, 750 pages",
    /* inform. link */ "http://www.php-de-luxe.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4.x. After Work. Für Einsteiger",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/381557322X/wwwphpnet07",
    /* author[s]    */ array("Mark Kronsbein", "Thomas Weinert", "Clemens Gutweiler"),
    /* auth link[s] */ array("http://www.zend.com/comm_person.php?id=36", "http://www.zend.com/comm_person.php?id=61", false),
    /* image        */ "381557322X.jpg",
    /* information  */ "Sybex, June 2002, ISBN 3-8155-7322-X, 352 pages",
    /* inform. link */ "http://www.phpbuch.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Praktikum PHP",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3831137412/wwwphpnet07",
    /* author[s]    */ "Dennis Möller",
    /* auth link[s] */ "http://www.praktikum-php.de/autor.php",
    /* image        */ "3831137412.gif",
    /* information  */ "BoD, April 2002, ISBN 3-8311-3741-2, 296 pages",
    /* inform. link */ "http://www.praktikum-php.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4.x Webbook",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3815573238/wwwphpnet07",
    /* author[s]    */ array("Mark Kronsbein", "Thomas Weinert"),
    /* auth link[s] */ array("http://www.zend.com/comm_person.php?id=36", "http://www.zend.com/comm_person.php?id=61"),
    /* image        */ "3815573238.jpg",
    /* information  */ "Sybex, May 2002, ISBN 3-8155-7323-8, 456 pages",
    /* inform. link */ "http://www.phpbuch.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Dynamische Webseiten mit PHP 4",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3772378420/wwwphpnet07",
    /* author[s]    */ "Jochen Franke",
    /* auth link[s] */ "",
    /* image        */ "3772378420.jpg",
    /* information  */ "Franzis, November 2001, ISBN 3-7723-7842-0",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Jetzt lerne ich MySQL & PHP . Dynamische Webseiten mit Open Source-Software programmieren",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/382726202X/wwwphpnet07",
    /* author[s]    */ array("Sven Letzel", "Robert Gacki"),
    /* auth link[s] */ "",
    /* image        */ "382726202X.jpg",
    /* information  */ "Markt+Technik, October 2001, ISBN 3-8272-6202-X, 384 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4 IT-Tutorial",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3826608194/wwwphpnet07",
    /* author[s]    */ "Bill McCarty",
    /* auth link[s] */ "",
    /* image        */ "3826608194.jpg",
    /* information  */ "mitp, January 2002, ISBN 3-8266-0819-4, 571 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "MySQL/PHP- Datenbankanwendungen",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3826608054/wwwphpnet07",
    /* author[s]    */ array("Jay Greenspan", "Brad Bulger"),
    /* auth link[s] */ "",
    /* image        */ "3826608054.jpg",
    /* information  */ "mitp, 2001, ISBN 3-8266-0805-4, 504 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Go to PHP 4",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3827317592/wwwphpnet07",
    /* author[s]    */ "Dirk Ammelburger",
    /* auth link[s] */ "",
    /* image        */ "3827317592.jpg",
    /* information  */ "Addison-Wesley, 2002, ISBN 3-8273-1759-2, 591 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP4. Dynamische Web-Seiten mit Apache, PHP und MySQL",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3423502428/wwwphpnet07",
    /* author[s]    */ "Dirk Taggesell",
    /* auth link[s] */ "",
    /* image        */ "3423502428.jpg",
    /* information  */ "DTV-Beck, 2002, ISBN 3-4235-0242-8, 266 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 3/4 Befehlsreferenz",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3772371841/wwwphpnet07",
    /* author[s]    */ "Damir Enseleit",
    /* auth link[s] */ "",
    /* image        */ "3772371841.jpg",
    /* information  */ "Franzis, 2001, ISBN 3-7723-7184-1, 750 pages",
    /* inform. link */ "http://www.selfphp.info/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Taschenbuch PHP Referenz",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3815816661/wwwphpnet07",
    /* author[s]    */ "Jens Ferner",
    /* auth link[s] */ "",
    /* image        */ "3815816661.jpg",
    /* information  */ "Data Becker, March 2002, ISBN 3-8158-1666-1, 320 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP fürs World Wide Web - Digital Studio One",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3827260701/wwwphpnet07",
    /* author[s]    */ "Larry E. Ullman",
    /* auth link[s] */ "",
    /* image        */ "3827260701.jpg",
    /* information  */ "Markt+Technik, July 2001, ISBN 3-8272-6070-1, 296 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Programmieren lernen in PHP 4. Ein kompakter Einstieg in die Webserverprogrammierung",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3446217541/wwwphpnet07",
    /* author[s]    */ "Jörg Krause",
    /* auth link[s] */ "",
    /* image        */ "3446217541.jpg",
    /* information  */ "Hanser, 2001, ISBN 3-4462-1754-1, 394 pages",
    /* inform. link */ "http://www.php.comzept.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4 - M+T Easy . leicht, klar, sofort",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/382726247X/wwwphpnet07",
    /* author[s]    */ "Giesbert Damaschke",
    /* auth link[s] */ "",
    /* image        */ "382726247X.jpg",
    /* information  */ "Markt+Technik, December 2001, ISBN 3-8272-6247-X, 320 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4 für Dummies",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3826629825/wwwphpnet07",
    /* author[s]    */ "Christian Baun",
    /* auth link[s] */ "",
    /* image        */ "3826629825.jpg",
    /* information  */ "mitp, December 2001, ISBN 3-8266-2982-5, 336 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Best Friend PHP. Das Praxishandbuch",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3815822254/wwwphpnet07",
    /* author[s]    */ array("Bernhard Bauder", "Titus Hochgreve", "Alexander Marquarth"),
    /* auth link[s] */ "",
    /* image        */ "3815822254.jpg",
    /* information  */ "Data Becker, 2001, ISBN 3-8158-2225-4, 350 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),
  
  array(
    /* title[s]     */ "PHP kurz & gut",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3897212250/wwwphpnet07",
    /* author[s]    */ array("Rasmus Lerdorf", "Ingo Marks (Deutsche Übersetzung)"),
    /* auth link[s] */ array("http://lerdorf.com/bio.php", "http://www.oreilly.de/catalog/phptbger/translator.html"),
    /* image        */ "3897212250.gif",
    /* information  */ "O'Reilly, June 2000, ISBN 3-89721-255-0, 111 pages",
    /* inform. link */ "http://www.oreilly.de/catalog/phptbger/index.html",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4. Dynamische Webauftritte professionell realisieren",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3827258774/wwwphpnet07",
    /* author[s]    */ array("Egon Schmid", "Christian Cartus"),
    /* auth link[s] */ array("http://zend.com/zend/hof/schmid.php", false),
    /* image        */ "3827258774.jpg",
    /* information  */ "Mit einem Vorwort von ".make_link("http://www.zend.com/zend/hof/andi.php", "Andi Gutmans") .
                       " und " . make_link("http://www.zend.com/comm_person.php?id=12", "Zeev Suraski") . "<br />\n" .
                       "Unter Mitarbeit von " .
                       make_link("http://www.zend.com/comm_person.php?id=38", "Wolfgang Drews, ") .
                       make_link("http://www.zend.com/comm_person.php?id=33", "Hartmut Holzgraefe, ") .
                       make_link("http://www.zend.com/comm_person.php?id=37", "Uwe Steinmann") .
                       " und Christian Wenz<br />\n" .
                       "Markt+Technik Verlag, New Technology, December 2000, ISBN 3-8272-5877-4, 639 pages",
    /* inform. link */ "http://www.php-buch.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ array("PHP 4: Grundlagen und Profiwissen","Webserver-Programmierung unter Windows und Linux"),
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3446215468/wwwphpnet07",
    /* author[s]    */ "Jörg Krause",
    /* auth link[s] */ "",
    /* image        */ "3446215468.jpg",
    /* information  */ "Hanser, Nov 2000, ISBN 3-446-21546-8, 1168 pages",
    /* inform. link */ "http://www.php.comzept.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ array("PHP 4","Webserver-Programmierung für Um- und Einsteiger"),
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3934358632/wwwphpnet07",
    /* author[s]    */ "Thomas Theis",
    /* auth link[s] */ "",
    /* image        */ "3934358632.gif",
    /* information  */ "Galileo Press, May 2000, ISBN 3-934358-63-2, 354 pages",
    /* inform. link */ "http://www.galileo-press.de/katalog/einzel.asp?ID=202",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3826690044/wwwphpnet07",
    /* author[s]    */ "Dr. Susanne Wigard",
    /* auth link[s] */ "",
    /* image        */ "3826690044.jpg",
    /* information  */ "BHV, December 2000, ISBN 3-8266-9004-4, 448 pages",
    /* inform. link */ "http://www.bhv.net/bhv/buchreihen/deinst_1110_3.html",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4 und MySQL",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3815822033/wwwphpnet07",
    /* author[s]    */ array("Rolf D. Stoll", "Gudrun Anna Leierer"),
    /* auth link[s] */ "",
    /* image        */ "3815822033.gif",
    /* information  */ "Data Becker, July 2001, ISBN 3-8158-2203-3, 414 pages",
    /* inform. link */ "http://www.databecker.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4 - Tutorial & Referenz",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3932311795/wwwphpnet07",
    /* author[s]    */ "Klaus Schmidt",
    /* auth link[s] */ "",
    /* image        */ "3932311795.jpg",
    /* information  */ "Computer & Literatur Verlag GmbH, November 2000, ISBN 3-932-1179-5, 832 pages",
    /* inform. link */ "http://www.ksweb.de/index.php?page=buch",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Jetzt lerne ich PHP 4",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3827258839/wwwphpnet07",
    /* author[s]    */ "Matt Zandstra",
    /* auth link[s] */ "",
    /* image        */ "3827258839.jpg",
    /* information  */ "Markt+Technik Verlag, December 2000, ISBN 3-8272-5883-9, 515 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "Webanwendungen mit PHP 4.0 entwickeln",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3827317304/wwwphpnet07",
    /* author[s]    */ array("Tobias Ratschiller","Till Gerken"),
    /* auth link[s] */ array("http://zend.com/comm_person.php?id=7","http://zend.com/comm_person.php?id=11"),
    /* image        */ "3827317304.jpg",
    /* information  */ "Addison-Wesley, Jan 2001, ISBN 3-8273-1730-4, 400 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3826680022/wwwphpnet07",
    /* author[s]    */ array("Uwe Hess", "Günther Karl"),
    /* auth link[s] */ "",
    /* image        */ "3826680022.jpg",
    /* information  */ "bhv, Dec 2000, ISBN 3-8266-8002-2, 764 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4 für Profis. Werkzeugkiste und Kochbuch",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3898421163/wwwphpnet07",
    /* author[s]    */ array("Helmut Dittrich","Jürgen Mellenthin"),
    /* auth link[s] */ "",
    /* image        */ "3898421163.jpg",
    /* information  */ "Galileo Press, January 2001, ISBN 3-8984-2116-3, 500 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 4 Webbook",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/381550502X/wwwphpnet07",
    /* author[s]    */ array("Mark Kronsbein", "Thomas Weinert"),
    /* auth link[s] */ array("http://www.zend.com/comm_person.php?id=36", "http://www.zend.com/comm_person.php?id=61"),
    /* image        */ "381550502X.jpg",
    /* information  */ "Sybex, March 2001, ISBN 3-8984-2116-3, 500 pages",
    /* inform. link */ "http://www.phpbuch.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PC Spicker PHP",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3815500613/wwwphpnet07",
    /* author[s]    */ array("Mark Kronsbein", "Thomas Weinert"),
    /* auth link[s] */ array("http://www.zend.com/comm_person.php?id=36", "http://www.zend.com/comm_person.php?id=61"),
    /* image        */ "3815500613.jpg",
    /* information  */ "Sybex, May 2001, ISBN 3-8155-0061-3 , 120 pages",
    /* inform. link */ "http://www.phpbuch.de/",
    /* language     */ "de"
  ),

 array(
    /* title[s]     */ "PHP Afterwork",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3815505178/wwwphpnet07",
    /* author[s]    */ array("Mark Kronsbein", "Clemens Gutweiler", "Thomas Weinert", "Peter Petermann"),
    /* auth link[s] */ array("http://www.zend.com/comm_person.php?id=36", false, "http://www.zend.com/comm_person.php?id=61", "http://www.zend.com/comm_person.php?id=60"),
    /* image        */ "3815505178.jpg",
    /* information  */ "Sybex, July 2001, ISBN 3-8155-0517-8, 352 pages",
    /* inform. link */ "http://www.phpbuch.de/",
    /* language     */ "de"
   ),

 array(
    /* title[s]     */ "PHP Ge-Packt",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/382660685X/wwwphpnet07",
    /* author[s]    */ array("Christoph Aigner", "Thomas Strohmaier"),
    /* auth link[s] */ "",
    /* image        */ "382660685X.jpg",
    /* information  */ "MITP, 2001, ISBN 3-8266-0685-X, 512 pages",
    /* inform. link */ "",
    /* language     */ "de"
   ),

  array(
    /* title[s]     */ "PHP 4 Developer's Guide - Anleitungen und Lösungen für einen professionellen Einsatz",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3827261740/wwwphpnet07",
    /* author[s]    */ array("Sterling Hughes", "Andrei Zmievski"),
    /* auth link[s] */ array("http://zend.com/zend/hof/sterling.php", "http://zend.com/zend/hof/andrei.php"),
    /* image        */ "3827261740.jpg",
    /* information  */ "October 2001, ISBN 3-8272-6174-0, 538 pages",
    /* inform. link */ "",
    /* language     */ "de"
  ),
  
  array(
    /* title[s]     */ "Start på PHP",
    /* title_link   */ "http://www.ibooks.dk/default.asp?mode=show_item&amp;vare_id=106131",
    /* author[s]    */ "Thomas G. Kristensen",
    /* auth link[s] */ "",
    /* image        */ "8778434084.gif",
    /* information  */ "ISBN 87-7843-408-4",
    /* inform. link */ "http://www.ibooks.dk/default.asp?mode=show_item&amp;vare_id=106131",
    /* language     */ "dk"
  ),
  
  array(
    /* title[s]     */ "Advanceret PHP",
    /* title_link   */ "http://www.gad.dk/bog.asp?id=176204",
    /* author[s]    */ "Cristopher Cosentino",
    /* auth link[s] */ "",
    /* image        */ "8778435978.gif",
    /* information  */ "2003, ISBN 87-7843-597-8",
    /* inform. link */ "http://www.gad.dk/bog.asp?id=176204",
    /* language     */ "dk"
  ),
 
  array (
    /* title[s]     */ "Developing Custom PHP Extensions",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1411601882/wwwphpnet",
    /* author[s]    */ "Blake Schwendiman",
    /* auth link[s] */ "",
    /* image        */ "1411601882.gif",
    /* information  */ "Lulu Press, Inc., Sep 2003, ISBN 1-4116-0188-2, 201 pages",
    /* inform. link */ "http://www.lulu.com/intechrabooks",
    /* language     */ "en"
   ),

  array (
    /* title[s]     */ "Comprehensive PHP PEAR::DB",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1411603613/wwwphpnet",
    /* author[s]    */ "Blake Schwendiman",
    /* auth link[s] */ "",
    /* image        */ "1411603613.jpg",
    /* information  */ "Lulu Press, Inc., 2003, ISBN 1-4116-0361-3, 169 pages",
    /* inform. link */ "http://www.lulu.com/intechrabooks",
    /* language     */ "en"
   ),

  array (
    /* title[s]     */ "Programming PHP",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1565926102/wwwphpnet",
    /* author[s]    */ array("Rasmus Lerdorf","Kevin Tatroe"),
    /* auth link[s] */ array("http://lerdorf.com/bio.php",false),
    /* image        */ "1565926102.jpg",
    /* information  */ "O'Reilly & Associates, Mar 2002, ISBN 1-56592-610-2, 500 pages",
    /* inform. link */ "http://www.oreilly.com/catalog/progphp/",
    /* language     */ "en"
   ),

  array (
    /* title[s]     */ "PHP Pocket Reference",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1565927699/wwwphpnet",
    /* author[s]    */ "Rasmus Lerdorf",
    /* auth link[s] */ "http://lerdorf.com/bio.php",
    /* image        */ "1565927699.gif",
    /* information  */ "O'Reilly & Associates, Jan 2000, ISBN 1-56592-769-9, 114 pages",
    /* inform. link */ "http://www.oreilly.com/catalog/phppr/",
    /* language     */ "en"
   ),

  array (
    /* title[s]     */ "Web Database Applications with PHP & MySQL",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0596000413/wwwphpnet",
    /* author[s]    */ array("Hugh E. Williams", "David Lane"),
    /* auth link[s] */ "",
    /* image        */ "0596000413.jpg",
    /* information  */ "O'Reilly & Associates, Mar 2002, ISBN 0-5960-0041-3, 582 pages",
    /* inform. link */ "http://www.oreilly.com/catalog/webdbapps/",
    /* language     */ "en"
   ),

  array (
    /* title[s]     */ "PHP & MySQL for Dummies",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0764516507/wwwphpnet",
    /* author[s]    */ "Janet Valade",
    /* auth link[s] */ "",
    /* image        */ "0764516507.jpg",
    /* information  */ "John Wiley & Sons, Apr 2002, ISBN 0-7645-1650-7, 408 pages + CD-ROM",
    /* inform. link */ "http://www.wiley.com/cda/product/0,,0764516507,00.html",
    /* language     */ "en"
   ),

  array (
    /* title[s]     */ "Making Use of PHP",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0471219738/wwwphpnet",
    /* author[s]    */ "Ashok Appu",
    /* auth link[s] */ "",
    /* image        */ "0471219738.jpg",
    /* information  */ "John Wiley & Sons, Jul 2002, ISBN 0-4712-1973-8, 352 pages",
    /* inform. link */ "http://www.wiley.com/cda/product/0,,0471219738,00.html",
    /* language     */ "en"
   ),

  array(
    /* title[s]     */ array("Core PHP Programming", "Third Edition"),
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0130463469/wwwphpnet",
    /* author[s]    */ array("Leon Atkinson", "Zeev Suraski"),
    /* auth link[s] */ array("http://zend.com/comm_person.php?id=30","http://zend.com/comm_person.php?id=12"),
    /* image        */ "0130463469.jpg",
    /* information  */ "Prentice Hall, Third Edition, August 2003, ISBN 0-1304-6346-9, 1104 pages",
    /* inform. link */ "http://www.phptr.com/browse/product.asp?product_id={625DDA9E-00CB-4726-BA86-A0C960071686}",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP3: Programming Browser-Based Applications",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0071353429/wwwphpnet",
    /* author[s]    */ "David Medinets",
    /* auth link[s] */ "",
    /* image        */ "0071353429.gif",
    /* information  */ "MacGraw-Hill, 2000, ISBN 0-07-135342-9, 552 pages",
    /* inform. link */ "http://www.mtolive.com/phpbook",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Building Database Applications on the Web Using PHP3",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0201657716/wwwphpnet",
    /* author[s]    */ array("Craig Hilton", "Jeff Willis"),
    /* auth link[s] */ "",
    /* image        */ "0201657716.jpg",
    /* information  */ "Addison-Wesley, Dec 1999, ISBN 0-2016-5771-6, 624 pages",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ array("PHP Essentials","A Better Way to Learn PHP - Includes Version 4"),
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/076152729X/wwwphpnet",
    /* author[s]    */ "Julie C. Meloni",
    /* auth link[s] */ "http://zend.com/comm_person.php?id=10",
    /* image        */ "076152729X.jpg",
    /* information  */ "Prima-Tech, March 2000, ISBN 0-7615-2729-X, 363 pages",
    /* inform. link */ "http://www.thickbook.com/",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP Fast & Easy Web Development",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/076153055X/wwwphpnet",
    /* author[s]    */ "Julie C. Meloni",
    /* auth link[s] */ "http://zend.com/comm_person.php?id=10",
    /* image        */ "076153055X.jpg",
    /* information  */ "Prima-Tech, July 2000, ISBN 0-7615-3055-X, 436 pages",
    /* inform. link */ "http://www.thickbook.com/",
    /* language     */ "en"
   ),

  array(
    /* title[s]     */ "SAMS Teach Yourself PHP4 in 24 Hours (2nd edition)",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0672323117/wwwphpnet",
    /* author[s]    */ "Matt Zandstra",
    /* auth link[s] */ "",
    /* image        */ "0672323117.jpg",
    /* information  */ "Sams, Dec 2001, ISBN 0-6723-2311-7, 528 pages<br />" . 
                       "There is also more information on the first edition on
                       <a href=\"http://www.sams.com/catalog/product.asp?product_id={AC657B6D-7E41-457D-A203-906D91B0C088}\">it's webpage</a>",
    /* inform. link */ "http://www.sams.com/catalog/product.asp?product_id={F90FC049-C258-4E7C-AAA5-CDF148BBB9A0}",
    /* language     */ "en"
   ),

  array(
    /* title[s]     */ "PHP and PostgreSQL Advanced Web Programming",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0672323826/wwwphpnet",
    /* author[s]    */ array("Ewald Geschwinde", "Hans-Juergen Schoenig"),
    /* auth link[s] */ "",
    /* image        */ "0672323826.jpg",
    /* information  */ "Sams, Jun 2002, ISBN 0-6723-2382-6, 800 pages",
    /* inform. link */ "http://www.sams.com/catalog/product.asp?product_id={29C0BE2C-EC75-4D30-9AA8-7589623E2FE3}",
    /* language     */ "en"
   ),

  array(
    /* title[s]     */ "Web Application Development with PHP 4.0",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0735709971/wwwphpnet",
    /* author[s]    */ array("Tobias Ratschiller", "Till Gerken"),
    /* auth link[s] */ array("http://zend.com/comm_person.php?id=7","http://zend.com/comm_person.php?id=11"),
    /* image        */ "0735709971.jpg",
    /* information  */ "Contains Official Zend API Documentation<br />" .
                       "With contributions by Zend Technologies' " .
                       make_link("http://zend.com/comm_person.php?id=12", "Zeev Suraski") . " and " .
                       make_link("http://zend.com/zend/hof/andi.php", "Andi Gutmans") . "<br />\n" .
                       "New Riders Publishing, July 2000, ISBN 0-7357-0997-1, 384 pages",
    /* inform. link */ "http://www.phpwizard.net/book/",
    /* language     */ "en"
   ),

  array(
    /* title[s]     */ "PHP 4 Bible",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/076454716X/wwwphpnet",
    /* author[s]    */ array("Tim Converse", "Joyce Park"),
    /* auth link[s] */ "",
    /* image        */ "076454716X.jpg",
    /* information  */ "IDG Books Worldwide, August 2000, ISBN 0-7645-4716-X",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP and MySQL Web Development",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0672317842/wwwphpnet",
    /* author[s]    */ array("Luke Welling","Laura Thomson"),
    /* auth link[s] */ "",
    /* image        */ "0672317842.jpg",
    /* information  */ "Sams, March 2001, ISBN 0-6723-1784-2",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Essential PHP for Web Professionals",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0130889032/wwwphpnet",
    /* author[s]    */ "Christopher Cosentino",
    /* auth link[s] */ "",
    /* image        */ "0130889032.jpg",
    /* information  */ "Prentice Hall, October 2000, ISBN 0-1308-8903-2, 168 pages",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "MySQL and PHP from Scratch",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0789724405/wwwphpnet",
    /* author[s]    */ "Wade Maxfield",
    /* auth link[s] */ "",
    /* image        */ "0789724405.jpg",
    /* information  */ "Que, November 2000, ISBN 0-7897-2440-5, 372 pages",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "A Programmer's Introduction to PHP 4.0",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1893115852/wwwphpnet",
    /* author[s]    */ "W.J. Gilmore",
    /* auth link[s] */ "",
    /* image        */ "1893115852.jpg",
    /* information  */ "APress, December 2000, ISBN 1-8931-1585-2, 450 pages",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP Developer's Cookbook",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0672319241/wwwphpnet",
    /* author[s]    */ array("Sterling Hughes","Andrei Zmievski"),
    /* auth link[s] */ array("http://zend.com/zend/hof/sterling.php","http://zend.com/comm_person.php?id=24"),
    /* image        */ "0672319241.jpg",
    /* information  */ "Foreword by " . make_link("http://lerdorf.com/bio.php", "Rasmus Lerdorf") . "<br />\n" .
                       "Sams, November 2000, ISBN 0-6723-1924-1, 505 pages",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Professional PHP Programming",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861002963/wwwphpnet",
    /* author[s]    */ array("Jesus Castagnetto", "Harish Rawat", "Sascha Schumann", "Chris Scollo", "Deepak Veliath"),
    /* auth link[s] */ array("http://zend.com/comm_person.php?id=9", false, "http://zend.com/zend/hof/sascha.php", false, false),
    /* image        */ "1861002963.gif",
    /* information  */ "Wrox Press Inc, Dec 1999, ISBN 1-86100-296-3, 909 pages",
    /* inform. link */ "http://www.wrox.com/books/1861002963.htm",
    /* language     */ "en"
   ),

  array(
    /* title[s]     */ "Beginning PHP 4",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861003730/wwwphpnet",
    /* author[s]    */ array("Jon Blan", "Wankyu Choi", "Allan Kent", "Ganesh Prasad", "Chris Ullmann"),
    /* auth link[s] */ "",
    /* image        */ "1861003730.jpg",
    /* information  */ "Wrox Press Inc, October 2000, ISBN 1-8610-0373-0, 800 pages",
    /* inform. link */ "http://www.wrox.com/books/1861003730.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Professional PHP4 XML",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861007213/wwwphpnet",
    /* author[s]    */ array("Luis Argerich", "Chris Lea", "Ken Egervari", "Matt Anton", "Charlie Killian", "Chris Hubbard", "James Fuller"),
    /* auth link[s] */ "",
    /* image        */ "1861007213.jpg",
    /* information  */ "Wrox Press Inc, June 2002, ISBN 1-8610-0721-3, 976 pages",
    /* inform. link */ "http://www.wrox.com/books/1861007213.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Professional PHP4 Multimedia Programming",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861007647/wwwphpnet",
    /* author[s]    */ array("Kapil Apshankar", "Sanjay Abraham", "Jan Rosa", "Allan Kent", "Devon O'Dell", "Andy Chase", "Imam Suyoto"),
    /* auth link[s] */ "",
    /* image        */ "1861007647.jpg",
    /* information  */ "Wrox Press Inc, Aug 2002, ISBN 1-8610-0764-7, 592 pages",
    /* inform. link */ "http://www.wrox.com/books/1861007647.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Beginning PHP4 Databases",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861007825/wwwphpnet",
    /* author[s]    */ array("Christopher Scollo", "Harish Rawat", "Deepak Thomas", "Chris Lea", "Sanjay Abraham", "Andrew Hill", "Jim Hubbard"),
    /* auth link[s] */ "",
    /* image        */ "1861007825.jpg",
    /* information  */ "Wrox Press Inc, Oct 2002, ISBN 1-8610-0782-5, 568 pages",
    /* inform. link */ "http://www.wrox.com/books/1861007825.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Professional PHP4 Web Development Solutions",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861007434/wwwphpnet",
    /* author[s]    */ array("Matt Anton", "Raj Dash", "Bryan Waters", "Alison Gionetto", "Jo Henrik"),
    /* auth link[s] */ "",
    /* image        */ "1861007434.jpg",
    /* information  */ "Wrox Press Inc, Nov 2002, ISBN 1-8610-0743-4, 640 pages",
    /* inform. link */ "http://www.wrox.com/books/1861007434.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Professional PHP Web Services",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861008074/wwwphpnet",
    /* author[s]    */ array("Daniel Solin", "Jon Stephens", "Ken Egervari", "James Fuller", "Bryan Waters", "Harry Fuecks"),
    /* auth link[s] */ "",
    /* image        */ "1861008074.gif",
    /* information  */ "Wrox Press Inc, Jan 2003, ISBN 1-861008-07-4, 550 pages",
    /* inform. link */ "http://www.wrox.com/books/1861008074.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP Graphics Handbook",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861008368/wwwphpnet",
    /* author[s]    */ array("Allan Kent", "Mitja Slenc", "Jason E. Sweat."),
    /* auth link[s] */ "",
    /* image        */ "1861008368.gif",
    /* information  */ "Wrox Press Inc, Feb 2003, ISBN 1-861008-36-8, 300 pages",
    /* inform. link */ "http://www.wrox.com/books/1861008368.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP String Handbook",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/186100835X/wwwphpnet",
    /* author[s]    */ array("Paul Wilton", "Syed Gilani", "Paul Adams", "Chris Cornutt", "Matt Wade"),
    /* auth link[s] */ "",
    /* image        */ "186100835x.gif",
    /* information  */ "Wrox Press Inc, Mar 2003, ISBN 1-861008-35-X, 300 pages",
    /* inform. link */ "http://www.wrox.com/books/186100835X.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP MySQL Website Programming",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1861008279/wwwphpnet",
    /* author[s]    */ array("Chris Lea", "Mike Buzzard", "Jessey White-Cinis", "Dilip Thomas"),
    /* auth link[s] */ "",
    /* image        */ "1861008279.gif",
    /* information  */ "Wrox Press Inc, Mar 2003, ISBN 1-861008-27-9, 500 pages",
    /* inform. link */ "http://www.wrox.com/books/1861008279.htm",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP Developer's Dictionary",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0672320290/wwwphpnet/",
    /* author[s]    */ array("R. Allen Wyke", "Michael J. Walker", "Robert M. Cox"),
    /* auth link[s] */ "",
    /* image        */ "0672320290.jpg",
    /* information  */ "Sams, Dec 2000, ISBN 0-6723-2029-0, 500 pages<br />" .
                       "Also available in " .
                       make_link("http://php.adatnet.hu/Kossuth.ShowIssue/Kossuth.showIssueEvent/415", "Hungarian"),
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP 4 Developer's Guide",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0072127317/wwwphpnet",
    /* author[s]    */ "Blake Schwendiman",
    /* auth link[s] */ "",
    /* image        */ "0072127317.jpg",
    /* information  */ "Osborne McGraw-Hill, January 2001, ISBN 0-0721-2731-7, 775 pages<br />" .
                       "Also available in " .
                       make_link("http://cyberspace.mht.bme.hu/~cakes/panem_vasarlas_cgi/kiadvanyok.cgi?katid=6&amp;lap=9635453094", "Hungarian"),
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "MySQL/PHP Database Applications",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0764535374/wwwphpnet",
    /* author[s]    */ array("Jay Greenspan", "Brad Bulger"),
    /* auth link[s] */ "",
    /* image        */ "0764535374.jpg",
    /* information  */ "John Wiley & Sons, January 2001, ISBN 0-7645-3537-4, 500 pages",
    /* inform. link */ "http://www.wiley.com/cda/product/0,,0764535374,00.html",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP Functions Essential Reference",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/073570970X/wwwphpnet",
    /* author[s]    */ array("Zak Greant","Graeme Merrall","Lars Torben Wilson","Brett Michlitsch"),
    /* auth link[s] */ array("http://zend.com/comm_person.php?id=56","http://zend.com/comm_person.php?id=32","http://zend.com/comm_person.php?id=28",false),
    /* image        */ "073570970X.jpg",
    /* information  */ "New Riders Publishing, September 2001, ISBN 0-7357-0970-X, 768 pages",
    /* inform. link */ "http://www.newriders.com/books/title.cfm?isbn=073570970X",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP For the World Wide Web: Visual QuickStart Guide",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0201727870/wwwphpnet",
    /* author[s]    */ "Larry Ullman",
    /* auth link[s] */ "",
    /* image        */ "0201727870.jpg",
    /* information  */ "Peachpit Press, April 2001, ISBN 0-201-72787-0, 278 pages",
    /* inform. link */ "http://www.DMCinsights.com/php/",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP Advanced For the World Wide Web: Visual QuickPro Guide",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0201775972/wwwphpnet",
    /* author[s]    */ "Larry Ullman",
    /* auth link[s] */ "",
    /* image        */ "0201775972.jpg",
    /* information  */ "Peachpit Press, December 2001, ISBN 0-201-77597-2, 500 pages",
    /* inform. link */ "http://www.DMCinsights.com/phpadv/",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP and MySQL for Dynamic Web Sites: Visual QuickPro Guide",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0321186486/wwwphpnet",
    /* author[s]    */ "Larry Ullman",
    /* auth link[s] */ "",
    /* image        */ "0321186486.gif",
    /* information  */ "Peachpit Press, May 2003, ISBN 0-321-18648-6, 572 pages",
    /* inform. link */ "http://www.DMCinsights.com/phpmysql/",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Build Your Own Database Driven Website Using PHP & MySQL",
    /* title_link   */ "http://sitepoint.com/books/?bookid=BookInfoSP",
    /* author[s]    */ "Kevin Yank",
    /* auth link[s] */ "",
    /* image        */ "0957921802.gif",
    /* information  */ "SitePoint, August 2001, ISBN 0-9579218-0-2, 242 pages",
    /* inform. link */ "http://sitepoint.com/books/?bookid=BookInfoSP",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Php : Your Visual Blueprint for Creating Open Source, Server-Side Content",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0764535617/wwwphpnet",
    /* author[s]    */ array("Paul Whitehead", "Joel Desamero"),
    /* auth link[s] */ "",
    /* image        */ "0764535617.jpg",
    /* information  */ "John Wiley & Sons, June 2001, ISBN 0-7645-3561-7, 350 pages",
    /* inform. link */ "http://www.wiley.com/cda/product/0,,0764535617,00.html",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP Black Book",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1588800539/wwwphpnet",
    /* author[s]    */ "Peter Moulding",
    /* auth link[s] */ "",
    /* image        */ "1588800539.jpg",
    /* information  */ "The Coriolis Group, October 2001, ISBN 0-7645-3561-7, 880 pages<br />" .
                       "Also available in " .
                       make_link("http://www.interbook.hu/index.php?op=ShowProduct&amp;id=2213", "Hungarian"),
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP by Example",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0789725681/wwwphpnet",
    /* author[s]    */ "Toby Butzon",
    /* auth link[s] */ "",
    /* image        */ "0789725681.jpg",
    /* information  */ "Que Publishing, November 2001, ISBN 0-7897-2568-1, 450 pages",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Dreamweaver MX: PHP Web Development",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1904151116/wwwphpnet",
    /* author[s]    */ array("Bruno Mairlot","Gareth Downes-Powell","Tim Green"),
    /* auth link[s] */ "",
    /* image        */ "1904151116.gif",
    /* information  */ "glasshaus, July 2002, ISBN 1-9041-5111-6, 320 pages",
    /* inform. link */ "http://www.glasshaus.com/bookInfo.asp?bookId=61",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PHP Professional Projects",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1931841535/wwwphpnet",
    /* author[s]    */ array("Ashish Daniel Wilfred", "Meeta Gupta", "Kartik Bhatnagar"),
    /* auth link[s] */ "",
    /* image        */ "1931841535.jpg",
    /* information  */ "Premier Press, Apr 2002, ISBN 1-9318-4153-5, 896 pages",
    /* inform. link */ "http://www.premierpressbooks.com/catalog/product.cfm?category=Web%20Development&amp;isbn=1931841535",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Foundation PHP for Flash",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1903450160/wwwphpnet",
    /* author[s]    */ "Steve Webster",
    /* auth link[s] */ "",
    /* image        */ "1903450160.jpg",
    /* information  */ "friends of Ed, Sep 2001, ISBN 1-9034-5016-0, 500 pages",
    /* inform. link */ "http://www.friendsofed.com/books/foundation/php/index.html",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Advanced PHP for Flash",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1904344038/wwwphpnet",
    /* author[s]    */ array("Havard Eide", "Jacob Hanson", "James Palmer", "Kev Sutherland", "Matt Rice", "Steve Webster", "Todd Marks"),
    /* auth link[s] */ "",
    /* image        */ "1904344038.jpg",
    /* information  */ "friends of Ed, Sep 2002, ISBN 1-9043-4403-8, 600 pages",
    /* inform. link */ "http://www.friendsofed.com/books/flash_mx_titles/advanced_php/index.html",
    /* language     */ "en"
  ),
  
  array(
    /* title[s]     */ "Guía Prácticas PHP 4",
    /* title_link   */ "http://www.AnayaMultimedia.es/",
    /* author[s]    */ "Esteban Trigos",
    /* auth link[s] */ "",
    /* image        */ "8441510792.gif",
    /* information  */ "Anaya Multimedia, December 2000, ISBN 8-4415-1079-2, 288 pages",
    /* inform. link */ "http://www.en-linea.net/",
    /* language     */ "es"
  ),

  array(
    /* title[s]     */ "Creation de sitios web con PHP 4",
    /* title_link   */ "http://www.mcgraw-hill.es/",
    /* author[s]    */ array ("Javier Gil", "Jorge Tejedore", "Augustin Yagüe"),
    /* auth link[s] */ "",
    /* image        */ "8448132092.jpg",
    /* information  */ "McGraw Hill, October 2001, ISBN 84-481-3209-2, 568 pages",
    /* inform. link */ "http://www.mcgraw-hill.es/",
    /* language     */ "es"
  ),

  array(
    /* title[s]     */ "Guide officiel PHP",
    /* title_link   */ "http://www.nexen.net/manuelphp/bdc.php.pdf",
    /* author[s]    */ array("PHP documentation Team","Damien Seguy"),
    /* auth link[s] */ "",
    /* image        */ "2742923209.jpg",
    /* information  */ "MicroApplication, Decembre 2001, ISBN 2-7429-2320-9, 904 pages",
    /* inform. link */ "http://www.nexen.net/manuelphp/",
    /* language     */ "fr"
  ),

  array(
    /* title[s]     */ "Pages Web dynamiques avec ASP, PHP, SQL",
    /* title_link   */ "http://www.amazon.fr/exec/obidos/ASIN/2744007099/wwwphpnet0f",
    /* author[s]    */ array("Jean-Marc Herellier","Philippe Merigod"),
    /* auth link[s] */ "",
    /* image        */ "2744007099.gif",
    /* information  */ "",
    /* inform. link */ "",
    /* language     */ "fr"
  ),

  array(
    /* title[s]     */ "Programmation PHP",
    /* title_link   */ "http://www.amazon.fr/exec/obidos/ASIN/2744009237/wwwphpnet0f",
    /* author[s]    */ "Leon Atkinson",
    /* auth link[s] */ "http://zend.com/comm_person.php?id=30",
    /* image        */ "2744009237.gif",
    /* information  */ "Translation of Leon Atkinson's book",
    /* inform. link */ "",
    /* language     */ "fr"
  ),

  array(
    /* title[s]     */ "Programmation Web avec PHP",
    /* title_link   */ "http://www.amazon.fr/exec/obidos/ASIN/2212091133/wwwphpnet0f",
    /* author[s]    */ array("Laurent Lacroix","Christophe Lauer","Nicolas Leprince","Christophe Boggero"),
    /* auth link[s] */ "",
    /* image        */ "2212091133.gif",
    /* information  */ "April 2000, ISBN 2-212-09113-3, 364 pages",
    /* inform. link */ "",
    /* language     */ "fr"
  ),

  array(
    /* title[s]     */ "PHP et MySQL D&eacute;veloppement Web",
    /* title_link   */ "http://www.amazon.fr/exec/obidos/ASIN/2744011746/wwwphpnet0f",
    /* author[s]    */ array("Luke Welling", "Laura Thomson"),
    /* auth link[s] */ "",
    /* image        */ "2744011746.gif",
    /* information  */ "Campus Press, ISBN 2-7440-1174-6, July 24 2001, 930 pages",
    /* inform. link */ "http://www.campuspress.net/store/book_info.asp?ref=4&amp;nav=&amp;maincat=&amp;id=1174",
    /* language     */ "fr"
  ),

  array(
    /* title[s]     */ "Tanuljuk meg a PHP4 használatát 24 óra alatt",
    /* title_link   */ "http://www.kiskapu.hu/kiskapu/search.phtml?detailed=120449801",
    /* author[s]    */ "Matt Zandstra",
    /* auth link[s] */ "",
    /* image        */ "9639301302.jpg",
    /* information  */ "Kiskapu, Aug 2001, ISBN 963-9301-30-2, 560 pages",
    /* inform. link */ "http://www.kiskapu.hu/kiskapu/search.phtml?detailed=120449801",
    /* language     */ "hu"
  ),

  array(
    /* title[s]     */ "PHP Haladóknak",
    /* title_link   */ "http://www.interbook.hu/index.php?op=ShowProduct&amp;id=2213",
    /* author[s]    */ "Peter Moulding",
    /* auth link[s] */ "",
    /* image        */ "9630095580.jpg",
    /* information  */ "Perfact-Pro, March 2002, ISBN 963-0095-58-0, 768 pages + CD",
    /* inform. link */ "http://www.interbook.hu/index.php?op=ShowProduct&amp;id=2213",
    /* language     */ "hu"
  ),

  array(
    /* title[s]     */ "Webvilág PHP4 Fejlesztõk kézikönyve 1. kötet",
    /* title_link   */ "http://cyberspace.mht.bme.hu/~cakes/panem_vasarlas_cgi/kiadvanyok.cgi?katid=6&amp;lap=9635453094",
    /* author[s]    */ "Blake Schwendiman",
    /* auth link[s] */ "",
    /* image        */ "9635453094.jpg",
    /* information  */ "Panem, Dec 2001, ISBN 963-5453-09-4, 422 pages",
    /* inform. link */ "http://cyberspace.mht.bme.hu/~cakes/panem_vasarlas_cgi/kiadvanyok.cgi?katid=6&amp;lap=9635453094",
    /* language     */ "hu"
  ),

  array(
    /* title[s]     */ "Webvilág PHP4 Referenciakönyv 2. kötet",
    /* title_link   */ "http://cyberspace.mht.bme.hu/~cakes/panem_vasarlas_cgi/kiadvanyok.cgi?katid=6&amp;lap=9635453108",
    /* author[s]    */ "Blake Schwendiman",
    /* auth link[s] */ "",
    /* image        */ "9635453108.jpg",
    /* information  */ "Panem, Feb 2002, ISBN 963-5453-10-8, 508 pages",
    /* inform. link */ "http://cyberspace.mht.bme.hu/~cakes/panem_vasarlas_cgi/kiadvanyok.cgi?katid=6&amp;lap=9635453108",
    /* language     */ "hu"
  ),

  array(
    /* title[s]     */ "PHP Fejlesztõk Kézikönyve",
    /* title_link   */ "http://php.adatnet.hu/Kossuth.ShowIssue/Kossuth.showIssueEvent/415",
    /* author[s]    */ array("R. Allen Wyke", "Michael J. Walker", "Robert M. Cox"),
    /* auth link[s] */ "",
    /* image        */ "9630943360.jpg",
    /* information  */ "Kossuth, May 2002, ISBN 963-0943-36-0, 573 pages + CD",
    /* inform. link */ "http://php.adatnet.hu/Kossuth.ShowIssue/Kossuth.showIssueEvent/415",
    /* language     */ "hu"
  ),
  
  array(
    /* title[s]     */ "PHP. Web scripting",
    /* title_link   */ "http://www.internetbookshop.it/ser/serdsp.asp?shop=1415&amp;isbn=8883780132",
    /* author[s]    */ "Rasmus Lerdorf",
    /* auth link[s] */ "http://lerdorf.com/bio.php",
    /* image        */ "8883780132.jpg",
    /* information  */ "Hops Libri, 2000, ISBN 8883780132, 148 pages",
    /* inform. link */ "http://www.internetbookshop.it/ser/serdsp.asp?shop=1415&amp;isbn=8883780132",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "PHP - I compatti",
    /* title_link   */ "http://212.90.7.34/mgh/catLibro.asp?item_id=1289",
    /* author[s]    */ "Giovanni Branca",
    /* auth link[s] */ "",
    /* image        */ "8838642605.gif",
    /* information  */ "McGraw-Hill, April 2002, ISBN 88 386 4260-5, 232 pages",
    /* inform. link */ "http://www.mcgraw-hill.it/main.html",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "Introduzione a PHP 4.0",
    /* title_link   */ "http://education.mondadori.it/Libri/SchedaLibro.asp?IdLibro=88-8331-294-5",
    /* author[s]    */ "W. J. Gilmore",
    /* auth link[s] */ "http://education.mondadori.it/Libri/SchedaAutore.asp?IdAutore=521",
    /* image        */ "8883312945.gif",
    /* information  */ "Mondadori Informatica Education, 02 October 2001, ISBN 88-8331-294-5, 464 pages",
    /* inform. link */ "http://education.mondadori.it/libri",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "PHP Per il World Wide Web",
    /* title_link   */ "http://hpe.pearsoned.it/html/libri/PHPwww.htm",
    /* author[s]    */ "Larry Ullman",
    /* auth link[s] */ "",
    /* image        */ "8871921216.gif",
    /* information  */ "Addison-Wesley, September 2001, ISBN 88-7192-121-6, 300 pages",
    /* inform. link */ "http://hpe.pearsoned.it/home2/home.htm",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "PHP4 Guida per lo Sviluppatore",
    /* title_link   */ "",
    /* author[s]    */ array("Choi","Kent","Lea","Prasad","Ullman"),
    /* auth link[s] */ "",
    /* image        */ "8800000000.gif",
    /* information  */ "Hoeply-Wrox, July 2001, 678 pages",
    /* inform. link */ "",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "Sviluppare applicazioni per database con MySQL/PHP",
    /* title_link   */ "http://www.apogeonline.com/libri/00866/scheda",
    /* author[s]    */ array("Greenspan","Bulger"),
    /* auth link[s] */ "",
    /* image        */ "8873038662.gif",
    /* information  */ "Apogeo, July 2001, ISBN 88-7303-866-2, 576 pages",
    /* inform. link */ "http://www.apogeonline.com/",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "PHP Soluzioni professionali per lo sviluppatore",
    /* title_link   */ "http://www.apogeonline.com/libri/00852/scheda",
    /* author[s]    */ array("S. Hughes","A. Zmievski"),
    /* auth link[s] */ "",
    /* image        */ "8873038522.gif",
    /* information  */ "Apogeo, May 2001, ISBN 88-7303-852-2, 448 pages",
    /* inform. link */ "http://www.apogeonline.com/",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "Guida a PHP 4",
    /* title_link   */ "http://212.90.7.34/mgh/catLibro.asp?item_id=572",
    /* author[s]    */ array("Tim Converse","Joyce Park"),
    /* auth link[s] */ "",
    /* image        */ "8838641714.gif",
    /* information  */ "McGraw-Hill, March 2001, ISBN 88 386 4171-4, 704 pages",
    /* inform. link */ "http://www.mcgraw-hill.it/main.html",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "Imparare PHP 4 in 6 ore",
    /* title_link   */ "http://www.tecnichenuove.com/cgi-bin/tecnichenuove.storefront/3d7c9eea00f18c06273fc3787a0a06c4/Product/View/1251X",
    /* author[s]    */ "Luca Cattaneo",
    /* auth link[s] */ "",
    /* image        */ "884811251X.gif",
    /* information  */ "Tecniche Nuove, March 2001, ISBN 88-481-1251X, 192 pages",
    /* inform. link */ "http://www.tecnichenuove.com/",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "PHP",
    /* title_link   */ "http://www.tecnichenuove.com/cgi-bin/tecnichenuove.storefront/3d7c9eea00f18c06273fc3787a0a06c4/Product/View/12579",
    /* author[s]    */ "Christopher Cosentino",
    /* auth link[s] */ "http://www.tecnichenuove.com/cgi-bin/tecnichenuove.storefront/3d7c9eea00f18c06273fc3787a0a06c4/Product/View/12579#biografia",
    /* image        */ "8848112579.gif",
    /* information  */ "Tecniche Nuove, March 2001, ISBN 88-481-12579, 160 pages",
    /* inform. link */ "http://www.tecnichenuove.com/",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "PHP 4.0 - Applicazioni Web",
    /* title_link   */ "http://hpe.pearsoned.it/html/libri/php4.htm",
    /* author[s]    */ array("Tobias Ratschiller","Till Gerken"),
    /* auth link[s] */ "",
    /* image        */ "8871921054.gif",
    /* information  */ "Addison-Wesley, March 2001, ISBN 88-7192-105-4, 600 pages",
    /* inform. link */ "http://hpe.pearsoned.it/home2/home.htm",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "Programmare con PHP 4",
    /* title_link   */ "http://www.apogeonline.com/libri/00778/scheda",
    /* author[s]    */ "Thomas Theis",
    /* auth link[s] */ "",
    /* image        */ "887303778X.gif",
    /* information  */ "Apogeo, February 2001, ISBN 88-7303-778-X, 312 pages",
    /* inform. link */ "http://www.apogeonline.com/",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "Imparare PHP 4 in 24 ore",
    /* title_link   */ "http://www.tecnichenuove.com/cgi-bin/tecnichenuove.storefront/3d7c9eea00f18c06273fc3787a0a06c4/Product/View/11726",
    /* author[s]    */ "Matt Zandstra",
    /* auth link[s] */ "http://www.tecnichenuove.com/cgi-bin/tecnichenuove.storefront/3d7c9eea00f18c06273fc3787a0a06c4/Product/View/11726#biografia",
    /* image        */ "8848111726.gif",
    /* information  */ "Tecniche Nuove, November 2000, ISBN 88-481-11726, 432 pages",
    /* inform. link */ "http://www.tecnichenuove.com/",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "PHP PER ESEMPI",
    /* title_link   */ "http://www.jacksonlibri.it/servizi/Libri/schede/2590/",
    /* author[s]    */ "Meloni Julie",
    /* auth link[s] */ "",
    /* image        */ "8825618778.gif",
    /* information  */ "Jackson Libri, ISBN 8825618778, 416 pages",
    /* inform. link */ "http://www.jacksonlibri.it/servizi/libri/",
    /* language     */ "it"
  ),

  array(
    /* title[s]     */ "Php Pocket Reference",
    /* title_link   */ "http://www.hopslibri.com/store/hopm0013.shtml",
    /* author[s]    */ "Rasmus Lerdorf",
    /* auth link[s] */ "",
    /* image        */ "8883780132.gif",
    /* information  */ "O' Reilly, ISBN 88-8378-013-2, 128 pages",
    /* inform. link */ "http://www.hopslibri.com/",
    /* language     */ "it"
  ),
  
  array(
    /* title[s]     */ "PHP tettei kouryaku",
    /* title_link   */ "http://books.softbank.co.jp/bookweb.nsf/7218069992c69510492566350001471a/5ab16e3b3dcf4ef7492566ff0048baac?OpenDocument",
    /* author[s]    */ array("Michihide Hotta","Tatsuo Ishii","Rui Hirokawa"),
    /* auth link[s] */ array(false,false,"http://www.cityfujisawa.ne.jp/%7Elouis/"),
    /* image        */ "4797308656.gif",
    /* information  */ "Sep 1999, ISBN 4-7973-0865-6",
    /* inform. link */ "",
    /* language     */ "jp"
  ),
  
  array(
    /* title[s]     */ "PHP Web-DB Programming Guide",
    /* title_link   */ "http://www.wowbook.com/wow/book_info/book-info.asp?isbn=ISBN89%2D381%2D0239%2D4",
    /* author[s]    */ "Jung Jinho",
    /* auth link[s] */ "",
    /* image        */ "8938102394.jpg",
    /* information  */ "",
    /* inform. link */ "",
    /* language     */ "kr"
  ),

  array(
    /* title[s]     */ "PHP Web Programming with ORACLE Database",
    /* title_link   */ "http://www.wowbook.com/book/info/book_detail.asp?isbn=ISBN89-87939-26-X",
    /* author[s]    */ "Kim Sung-Sik",
    /* auth link[s] */ "",
    /* image        */ "898793926X.gif",
    /* information  */ "",
    /* inform. link */ "",
    /* language     */ "kr"
  ),

  array(
    /* title[s]     */ "CGI & PHP",
    /* title_link   */ "http://ychat.pe.kr/",
    /* author[s]    */ "Youn Sukbum",
    /* auth link[s] */ "",
    /* image        */ "cgiphp.jpg",
    /* information  */ "",
    /* inform. link */ "",
    /* language     */ "kr"
  ),
  
  array(
    /* title[s]     */ "Webprogrammering i PHP",
    /* title_link   */ "http://tisip.no/public/bok/enBok.jsp?bokid=470",
    /* author[s]    */ "Svend Andreas Horgen",
    /* auth link[s] */ "",
    /* image        */ "8205329834.jpg",
    /* information  */ "August 2004, ISBN 82-05-32983-4, 384 pages",
    /* inform. link */ "http://tisip.no/public/bok/enBok.jsp?bokid=470",
    /* language     */ "no"
  ),

  array(
    /* title[s]     */ "PHP i MySQL",
    /* title_link   */ "http://helion.pl/ksiazki/phms2v.htm",
    /* author[s]    */ array("Luke Welling", "Laura Thomson"),
    /* auth link[s] */ "",
    /* image        */ "8373611401.jpg",
    /* information  */ "Jul 2003, ISBN 83-7361-140-1",
    /* inform. link */ "http://helion.pl/ksiazki/phms2v.htm",
    /* language     */ "pl"
  ),
  
  array(
    /* title[s]     */ "PHP 4. Tworzenie stron WWW",
    /* title_link   */ "http://helion.pl/ksiazki/cwphp4.htm",
    /* author[s]    */ "Andrzej Kierzkowski",
    /* auth link[s] */ "",
    /* image        */ "8371975058.jpg",
    /* information  */ "Jul 2003, ISBN 83-7197-505-8",
    /* inform. link */ "http://helion.pl/ksiazki/cwphp4.htm",
    /* language     */ "pl"
  ),
  
  array(
    /* title[s]     */ "PHP4. Kompendium programisty",
    /* title_link   */ "http://helion.pl/ksiazki/php4ko.htm",
    /* author[s]    */ "Blake Schwendiman",
    /* auth link[s] */ "",
    /* image        */ "837197521x.jpg",
    /* information  */ "May 2002, ISBN 83-7197-521-X",
    /* inform. link */ "http://helion.pl/ksiazki/php4ko.htm",
    /* language     */ "pl"
  ),
  
  array(
    /* title[s]     */ "PHP Guia de Consulta Rápida",
    /* title_link   */ "http://www.livcultura.com.br/scripts/cultura/resenha/resenha.asp?nitem=320216",
    /* author[s]    */ "Herbert G. Fischer",
    /* auth link[s] */ "",
    /* image        */ "8585184698.jpg",
    /* information  */ "Jan 2000, ISBN 8-5851-8469-8",
    /* inform. link */ "http://phpclasses.UpperDesign.com/products.html/id/8585184698",
    /* language     */ "pt"
  ),

  array(
    /* title[s]     */ "Desenvolvendo Websites com PHP 4",
    /* title_link   */ "http://niederauer.com.br/livros/php4/",
    /* author[s]    */ "Juliano Niederauer",
    /* auth link[s] */ "",
    /* image        */ "8575220039.jpg",
    /* information  */ "2001, ISBN 85-7522-003-9, 256 pages",
    /* inform. link */ "http://niederauer.com.br/livros/php4/",
    /* language     */ "pt"
  ),

  array(
    /* title[s]     */ "PHP Guia Do Desenvolvedor",
    /* title_link   */ "http://www.siciliano.com.br/livro.asp?orn=LSE&amp;Tipo=2&amp;ID=241501",
    /* author[s]    */ "Sterling Hughes",
    /* auth link[s] */ "",
    /* image        */ "8572515844.gif",
    /* information  */ "2001, ISBN 85-7251-584-4, 528 pages",
    /* inform. link */ "http://www.siciliano.com.br/livro.asp?orn=LSE&amp;Tipo=2&amp;ID=241501",
    /* language     */ "pt"
  ),

  array(
    /* title[s]     */ "PHP e MySQL - Desenvolvimento Web",
    /* title_link   */ "http://www.campus.com.br/catalogo/livro.cfm?id=20821",
    /* author[s]    */ array("Luke Welling", "Laura Thomson"),
    /* auth link[s] */ "",
    /* image        */ "8535208216.gif",
    /* information  */ "Editora Campus, July 2001, ISBN 8-5352-0821-6",
    /* inform. link */ "http://www.livcultura.com.br/scripts/cultura/resenha/resenha.asp?589959",
    /* language     */ "pt"
  ),

  array(
    /* title[s]     */ "PHP com XML - Guia de Consulta Rápida",
    /* title_link   */ "http://www.niederauer.com.br/livros/phpxml/",
    /* author[s]    */ "Juliano Niederauer",
    /* auth link[s] */ "",
    /* image        */ "857522025X.gif",
    /* information  */ "Novatec Editora, ISBN 8-5752-2025-X, 96 pages",
    /* inform. link */ "http://www.niederauer.com.br/livros/phpxml/",
    /* language     */ "pt"
  ),

  array(
    /* title[s]     */ "PHP para quem conhece PHP",
    /* title_link   */ "http://novateceditora.com.br/livros/phpavancado/",
    /* author[s]    */ "Juliano Niederauer",
    /* auth link[s] */ "",
    /* image        */ "8575220446.jpg",
    /* information  */ "2003, ISBN 85-7522-044-6, 480 pages",
    /* inform. link */ "http://novateceditora.com.br/livros/phpavancado/",
    /* language     */ "pt"
  ),
  
  array(
    /* title[s]     */ "PHP 4 Programmering",
    /* title_link   */ "http://pagina.se/bok.html?20660",
    /* author[s]    */ array("Jesper Ek", "Ulrika Eriksson"),
    /* auth link[s] */ "",
    /* image        */ "9163606607.gif",
    /* information  */ "February 2001, ISBN 9-1636-0660-7, 220 pages",
    /* inform. link */ "",
    /* language     */ "se"
  ),

  array(
    /* title[s]     */ "Webbprogrammering met PHP",
    /* title_link   */ "http://www.studentlitteratur.se/shop/default.html?artnr=7844-01",
    /* author[s]    */ "Viktor Jonsson",
    /* auth link[s] */ "",
    /* image        */ "9144019416.gif",
    /* information  */ "September, 2001, ISBN 91-44-01941-6, 390 pages",
    /* inform. link */ "",
    /* language     */ "se"
  ),

  array(
    /* title[s]     */ "PHP 5 Power Programming",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/013147149X/wwwphpnet",
    /* author[s]    */ array("Andi Gutmans", "Stig Sæther Bakken", "Derick Rethans"),
    /* auth link[s] */ "",
    /* image        */ "013147149X.jpg",
    /* information  */ "October, 2004, ISBN 0-13-147149-X, 720 pages with CD",
    /* inform. link */ "http://php5powerprogramming.com",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Professionelle Softwareentwicklung mit PHP 5",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3898642291/wwwphpnet07",
    /* author[s]    */ "Sebastian Bergmann",
    /* auth link[s] */ "http://www.sebastian-bergmann.de/",
    /* image        */ "3898642291.png",
    /* information  */ "January, 2005, ISBN 3-89864-229-1, 200 pages",
    /* inform. link */ "http://www.professionelle-softwareentwicklung-mit-php5.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP 5 für Fortgeschrittene",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/389864300X/wwwphpnet07",
    /* author[s]    */ "Harry Fuecks, Sandro Zic, Cornelia Boenigk",
    /* auth link[s] */ "",
    /* image        */ "389864300X.jpg",
    /* information  */ "November, 2004, ISBN 3-89864-300-X, 383 pages",
    /* inform. link */ "http://www.dpunkt.de/buch/3-89864-300-X.html",
    /* language     */ "de"
  ),

 ),


  "Related" => array(

  array(
    /* title[s]     */ "PostgreSQL: Grundlagen - Praxis - Anwendungsentwicklung mit PHP",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3898641759/wwwphpnet07",
    /* author[s]    */ "Cornelia Boenigk",
    /* auth link[s] */ "",
    /* image        */ "3898641759.jpg",
    /* information  */ "dpunkt.verlag, Sept 2002, ISBN 3-89864-175-9, 426 pages",
    /* inform. link */ "http://www.pgsql.info/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ array("Scriptsprachen für dynamische Webauftritte", "JavaScript, VBScript, ASP, Perl, PHP, XML"),
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3446214135/wwwphpnet07",
    /* author[s]    */ "Prof. Dr. Wolfgang Dehnhardt",
    /* auth link[s] */ "",
    /* image        */ "3446214135.jpg",
    /* information  */ "Hanser Verlag, Dec 2000, ISBN 3-446-21413-5, 452 pages",
    /* inform. link */ "http://www.wsite.de/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PostgreSQL: Introduction and Concepts",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0201703319/wwwphpnet",
    /* author[s]    */ "Bruce Momjian",
    /* auth link[s] */ "",
    /* image        */ "0201703319.jpg",
    /* information  */ "Addison-Wesley Pub Co, Dec 2000, ISBN 0-2017-0331-9, 462 pages",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "PostgreSQL - Guia de Consulta Rapida",
    /* title_link   */ "http://www.niederauer.com.br/livros.php#postgres",
    /* author[s]    */ "Juliano Niederauer",
    /* auth link[s] */ "",
    /* image        */ "8575220128.gif",
    /* information  */ "novatec, ISBN 85-7522-012-8, 128 pages",
    /* inform. link */ "",
    /* language     */ "pt"
  ),

  array(
    /* title[s]     */ "MySQL and mSQL (Nutshell Series)",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1565924347/wwwphpnet",
    /* author[s]    */ array("Randy Jay Yarger","George Reese","Tim King"),
    /* auth link[s] */ "",
    /* image        */ "1565924347.gif",
    /* information  */ "O'Reilly & Associates, July 1999, ISBN 1-56592-434-7, 487 pages<br />\n" .
                       "Also available in " .
                       make_link("http://www.books.ru/cgi-bin/v3/book_inf_code.cgi?5872","Russian"),
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "MySQL. Einführung, Programmierung, Referenz",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3827317622/wwwphpnet07",
    /* author[s]    */ "Michael Kofler",
    /* auth link[s] */ "",
    /* image        */ "3827317622.jpg",
    /* information  */ "Addison-Wesley - Pearson Education Deutschland, March 2001, ISBN 3-82731-762-2, 624 pages<br />\n",
    /* inform. link */ "http://www.kofler.cc/mysql/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "MySQL",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0735709211/wwwphpnet",
    /* author[s]    */ "Paul DuBois",
    /* auth link[s] */ "",
    /* image        */ "0735709211.jpg",
    /* information  */ "Foreword by " . make_link("http://zend.com/zend/hof/widenius.php", "Michael \"Monty\" Widenius") .
                       "<br />New Riders, December 1999, ISBN 0-7357-0921-1, 756 pages" .
                       "<br />Also available in " .
                       make_link("http://www.amazon.fr/exec/obidos/ASIN/2744008826/wwwphpnet0f", "French") .
                       " and " . make_link("http://www.amazon.de/exec/obidos/ASIN/382725793X/wwwphpnet07", "German"),
    /* inform. link */ "http://www.newriders.com/books/title.cfm?isbn=0735709211",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "MySQL: Visual QuickStart Guide",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0321127315/wwwphpnet",
    /* author[s]    */ "Larry Ullman",
    /* auth link[s] */ "",
    /* image        */ "0321127315.gif",
    /* information  */ "Peachpit Press, September 2002, ISBN 0-321-12731-5, 327 pages",
    /* inform. link */ "",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Webmaster in a Nutshell (Nutshell Series)",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1565923251/wwwphpnet",
    /* author[s]    */ array("Stephen Spainhour","Robert Eckstein"),
    /* auth link[s] */ "",
    /* image        */ "1565923251.gif",
    /* information  */ "Includes a large chapter on PHP written by " .
                       make_link("http://lerdorf.com/bio.php", "Rasmus Lerdorf") . "<br />\n" .
                       "O'Reilly & Associates, June 1999, 2nd edition, ISBN 1-5659-2325-1, 523 pages",
    /* inform. link */ "http://www.oreilly.com/catalog/webmaster2/",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ array("Open Source Development with CVS","Learn how to work with Open Source Software"),
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1576104907/wwwphpnet",
    /* author[s]    */ "Karl Franz Fogel",
    /* auth link[s] */ "",
    /* image        */ "1576104907.gif",
    /* information  */ "Coriolis, 1999, ISBN 1-57610-490-7, 316 pages",
    /* inform. link */ "http://cvsbook.red-bean.com/",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "CVS Pocket Reference",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/0596000030/wwwphpnet",
    /* author[s]    */ "Gregor N. Purdy",
    /* auth link[s] */ "",
    /* image        */ "0596000030.gif",
    /* information  */ "O'Reilly, August 2000, ISBN 0-5960-0003-0, 79 pages",
    /* inform. link */ "http://www.oreilly.com/catalog/cvspr/",
    /* language     */ "en"
  ),

  array(
    /* title[s]     */ "Mastering Regular Expressions",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1565922573/wwwphpnet",
    /* author[s]    */ array("Jeffrey E. Friedl","Andy Oram"),
    /* auth link[s] */ "",
    /* image        */ "1565922573.gif",
    /* information  */ "O'Reilly, January 1997, ISBN 1-5659-2257-3, 368 pages",
    /* inform. link */ "http://www.oreilly.com/catalog/regex/",
    /* language     */ "en"
  ),
  
  array (
    /* title[s]     */ "Essential PHP Tools: Modules Extensions, and Accelerators ",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1590592808/wwwphpnet",
    /* author[s]    */ "David Sklar",
    /* auth link[s] */ "http://www.sklar.com/",
    /* image        */ "1590592808.jpg",
    /* information  */ "Apress, March 2004, ISBN 1-5905-9280-8, 365 pages",
    /* inform. link */ "http://www.apress.com/book/bookDisplay.html?bID=300",
    /* language     */ "en"
   ),
  
  array (
    /* title[s]     */ "PHP Cookbook",
    /* title_link   */ "http://www.amazon.com/exec/obidos/ASIN/1565926811/wwwphpnet",
    /* author[s]    */ array("David Sklar", "Adam Trachtenberg"),
    /* auth link[s] */ array("http://www.sklar.com/", "http://www.trachtenberg.com"),
    /* image        */ "1565926811.jpg",
    /* information  */ "O'Reilly & Associates, Nov 2002, ISBN 1-5659-2681-1, 624 pages<br />" .
                       "Also available in " .
                       make_link("http://www.amazon.de/exec/obidos/ASIN/3897213516/wwwphpnet07", "German") . ", " .
                       make_link("http://www.amazon.fr/exec/obidos/ASIN/2841772314/wwwphpnet0f", "French") . " and " .
                       make_link("http://helion.pl/ksiazki/phprec.htm", "Polish"),
    /* inform. link */ "http://www.oreilly.com/catalog/phpckbk/",
    /* language     */ "en"
   ),
  
  array(
    /* title[s]     */ "PHP-Kochbuch",
    /* title_link   */ "http://www.amazon.de/exec/obidos/ASIN/3897213516/wwwphpnet07",
    /* author[s]    */ array("David Sklar", "Adam Trachtenberg"),
    /* auth link[s] */ array("http://www.sklar.com/", "http://www.trachtenberg.com"),
    /* image        */ "3897213516.jpg",
    /* information  */ "O'Reilly & Associates, July 2003, ISBN 3-8972-1351-6, 632 pages",
    /* inform. link */ "http://www.oreilly.de/catalog/phpckbkger/",
    /* language     */ "de"
  ),

  array(
    /* title[s]     */ "PHP en action",
    /* title_link   */ "http://www.amazon.fr/exec/obidos/ASIN/2841772314/wwwphpnet0f",
    /* author[s]    */ array("David Sklar", "Adam Trachtenberg"),
    /* auth link[s] */ array("http://www.sklar.com/", "http://www.trachtenberg.com"),
    /* image        */ "2841772314.jpg",
    /* information  */ "O'Reilly & Associates, September 2003, ISBN 2-8417-7231-4, 550 pages",
    /* inform. link */ "http://www.oreilly.fr/catalogue/2841772314.html",
    /* language     */ "fr"
  ),
    
  array(
    /* title[s]     */ "PHP. Receptury",
    /* title_link   */ "http://helion.pl/ksiazki/phprec.htm",
    /* author[s]    */ array("David Sklar", "Adam Trachtenberg"),
    /* auth link[s] */ array("http://www.sklar.com/", "http://www.trachtenberg.com"),
    /* image        */ "8373611177.gif",
    /* information  */ "Helion / O'Reilly & Associates, August 2003, ISBN 83-7361-117-7, 649 pages",
    /* inform. link */ "http://helion.pl/ksiazki/phprec.htm",
    /* language     */ "pl"
  ),
  
  )
);

?>
