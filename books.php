<?php
require_once 'prepend.inc';
commonHeader("PHP Books");

$langs = array(
    'en'    => 'English',
    'de'    => 'German',
    'nl'    => 'Dutch',
    'es'    => 'Spanish',
    'fr'    => 'French',
    'cz'    => 'Czech',
    'kr'    => 'Korean',
    'jp'    => 'Japanese',
    'cn'    => 'Traditional Chinese',
    'pt'    => 'Portugese'
);

$book_types = array(
    'English' => "Books in English",
    'Other' => "Books in Other Languages",
    'Related' => "Related Reading"
);

$books = array ( 

  "English" => array(

   array( "PHP Pocket Reference",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/1565927699/wwwphpnet",  #title_link
      "Rasmus Lerdorf",   #author(s)
      "http://zend.com/zend/hof/rasmus.php",  #author_link(s)
      "phppr.s.gif",  #img
      "O'Reilly & Associates, Jan 2000, ISBN 1-56592-769-9, 114 pages",   #info
      "http://www.oreilly.com/catalog/phppr/" #info_link
   ),

    
   array( "Professional PHP Programming",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/1861002963/wwwphpnet",  #title_link
      array("Jesus Castagnetto", "Harish Rawat", "Sascha Schumann", "Chris Scollo", "Deepak Veliath"),    #author(s)
      array("http://zend.com/comm_person.php?id=9", false, "http://zend.com/zend/hof/sascha.php", false, false),  #author_link(s)
      "2963.gif", #img
      "Wrox Press Inc, Dec 1999, ISBN 1-86100-296-3, 909 pages",  #info
      "http://www.amazon.com/exec/obidos/ASIN/1861002963/wwwphpnet"   #info_link
   ),


   array( array("Core PHP Programming", "Using PHP to Build Dynamic Web Sites"), #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0130893986/wwwphpnet",  #title_link
      "Leon Atkinson",    #author(s)
      "http://zend.com/comm_person.php?id=30",    #author_link(s)
      "core-book.jpg",    #img
      "Foreword by ".make_link("http://www.zend.com/zend/hof/andi.php", "Andi Gutmans")."<BR>".
          "Prentice Hall, Second Edition, August 2000, ISBN 0-13-089398-6, 769 pages",    #info
      "http://www.leonatkinson.com/index.php3?screen=eng_book"    #info_link
   ),


   array( "PHP3: Programming Browser-Based Applications",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0071353429/wwwphpnet",  #title_link
      "David Medinets",   #author(s)
      "", #author_link(s)
      "medinets.gif", #img
      "MacGraw-Hill, 2000, ISBN 0-07-135342-9, 552 pages",    #info
      "http://www.mtolive.com/phpbook"    #info_link
   ),

    
   array( "Building Database Applications on the Web Using PHP3",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0201657716/wwwphpnet",  #title_link
      array("Craig Hilton", "Jeff Willis"),   #author(s)
      "", #author_link(s)
      "hilton-willis.jpg",    #img
      "Addison-Wesley, Dec 1999, ISBN 0-2016-5771-6, 624 pages",  #info
      ""  #info_link
   ),


   array( array("PHP Essentials","A Better Way to Learn PHP - Includes Version 4"),  #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/076152729X/wwwphpnet",  #title_link
      "Julie C. Meloni",  #author(s)
      "http://zend.com/comm_person.php?id=10",    #author_link(s)
      "php_essentials.jpg",   #img
      "Prima-Tech, March 2000, ISBN 0-7615-2729-X, 363 pages",    #info
      "http://www.thickbook.com/" #info_link
   ),


   array( "PHP Fast & Easy Web Development",     #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/076153055X/wwwphpnet",  #title_link
      "Julie C. Meloni",  #author(s)
      "http://zend.com/comm_person.php?id=10",    #author_link(s)
      "php_fe.jpg",   #img
      "Prima-Tech, July 2000, ISBN 0-7615-3055-X, 436 pages", #info
      "http://www.thickbook.com/" #info_link
   ),


   array( "SAMS Teach Yourself PHP4 in 24 Hours",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0672318040/wwwphpnet",  #title_link
      "Matt Zandstra",    #author(s)
      "", #author_link(s)
      "zandstra.jpg", #img
      "Sams, June 2000, ISBN 0-6723-1804-0, 481 pages",   #info
      "http://www.corrosive.co.uk/"   #info_link
   ),


   array( "Web Application Development with PHP 4.0",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0735709971/wwwphpnet",  #title_link
      array("Tobias Ratschiller", "Till Gerken"), #author(s)
      array("http://zend.com/comm_person.php?id=7","http://zend.com/comm_person.php?id=11"),  #author_link(s)
      "ratschiller_gerken.jpg",   #img
      "Contains Official Zend API Documentation<BR>" .
          "With contributions by Zend Technologies' " .
          make_link("http://zend.com/comm_person.php?id=12", "Zeev Suraski") . " and " .
          make_link("http://zend.com/zend/hof/andi.php", "Andi Gutmans") . "<BR>\n" .
          "New Riders Publishing, July 2000, ISBN 0-7357-0997-1, 384 pages",  #info
      "http://www.phpwizard.net/book/"    #info_link
   ),


   array( "PHP 4 Bible",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/076454716X/wwwphpnet", #title_link
      array("Tim Converse", "Joyce Park"), #author(s)
      "", #author_link(s)
      "bible.jpg", #img
      "IDG Books Worldwide, August 2000, ISBN 0-7645-4716-X", #info
      ""  #info_link
   ),


   array( "PHP and MySQL Web Development",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0672317842/wwwphpnet", #title_link
      array("Luke Welling","Laura Thomson"), #author(s)
      "", #author_link(s)
      "gilmore.jpg", #img
      "Sams, October 2000, ISBN 0-6723-1784-2", #info
      ""  #info_link
   ),


   array( "Essential PHP for Web Professionals",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0130889032/wwwphpnet", #title_link
      "Christopher Cosentino", #author(s)
      "", #author_link(s)
      "cosentino.jpg", #img
      "Prentice Hall, October 2000, ISBN 0-1308-8903-2, 168 pages", #info
      ""  #info_link
   ),


   array( "MySQL and PHP from Scratch",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0789724405/wwwphpnet", #title_link
      "Wade Maxfield", #author(s)
      "", #author_link(s)
      "maxfield.jpg", #img
      "Que, November 2000, ISBN 0-7897-2440-5, 372 pages", #info
      ""  #info_link
   ),


   array( "A Programmer's Introduction to PHP 4.0",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/1893115852/wwwphpnet", #title_link
      "W.J. Gilmore", #author(s)
      "", #author_link(s)
      "wjgilmore.jpg", #img
      "APress, December 2000, ISBN 1-8931-1585-2, 450 pages", #info
      ""  #info_link
   ),


   array( "PHP Developer's Cookbook",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0672319241/wwwphpnet", #title_link
      array("Sterling Hughes","Andrei Zmievski"), #author(s)
      array("http://zend.com/zend/hof/sterling.php","http://zend.com/comm_person.php?id=24"), #author_link(s)
      "zmievski.jpg", #img
      "Foreword by " . make_link("http://zend.com/zend/hof/rasmus.php", "Rasmus Lerdorf") . "<BR>\n" .
          "Sams, November 2000, ISBN 0-6723-1924-1, 505 pages", #info
      ""  #info_link
   ),


   array( "Beginning PHP 4",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/1861003730/wwwphpnet", #title_link
      array("Jon Blan", "Wankyu Choi", "Allan Kent", "Ganesh Prasad", "Chris Ullmann"), #author(s)
      "", #author_link(s)
      "beginning_php4.jpg", #img
      "Wrox Press Inc, October 2000, ISBN 1-8610-0373-0, 800 pages", #info
      ""  #info_link
   ),


   array( "PHP Developer's Dictionary",    #title(s)
      "", #title_link
      array("R. Allen Wyke", "Michael J. Walker", "Robert M. Cox"), #author(s)
      "", #author_link(s)
      "allen_wyke.jpg", #img
      "Sams, Dec 2000, ISBN 0-6723-2029-0, 500 pages", #info
      ""  #info_link
   ),


   array( "PHP 4 Developer's Guide",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0072127317/wwwphpnet", #title_link
      "Blake Schwendiman", #author(s)
      "", #author_link(s)
      "schwendiman.jpg", #img
      "Osborne McGraw-Hill, January 2001, ISBN 0-0721-2731-7, 775 pages", #info
      ""  #info_link
   ),


   array( "MySQL/PHP Database Application",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0764535374/wwwphpnet", #title_link
      array("Jay Greenspan", "Brad Bulger"), #author(s)
      "", #author_link(s)
      "greenspan.jpg", #img
      "Hungry Minds, January 2001, ISBN 0-7645-3537-4, 500 pages", #info
      ""  #info_link
   ),


   array( "PHP Functions Essential Reference",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/073570970X/wwwphpnet", #title_link
      array("Landon Bradshaw","Graeme Merrall","Stephen Wall (Editor)"), #author(s)
      array(false,"http://zend.com/comm_person.php?id=32",false), #author_link(s)
      "till_gerken.jpg", #img
      "New Riders Publishing, January 2001, ISBN 0-7357-0970-X, 500 pages", #info
      ""  #info_link
   )
  ),

  "Other" => array(

   array( "PHP kurz & gut",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3897212250/wwwphpnet07", #title_link
      array("Rasmus Lerdorf", "Ingo Marks (Deutsche &Uuml;bersetzung)"), #author(s)
      array("http://zend.com/zend/hof/rasmus.php", "http://www.oreilly.de/catalog/phptbger/translator.html"),
      #author_link(s)
      "rasmus-kug.gif", #img
      "O'Reilly, June 2000, ISBN 3-89721-255-0, 111 pages", #info
      "http://www.oreilly.de/catalog/phptbger/index.html",  #info_link
      "de"
   ),


   array( "PHP 4. Dynamische Webauftritte professionell realisieren",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3827258774/wwwphpnet07", #title_link
      array("Egon Schmid", "Christian Cartus"), #author(s)
      array("http://zend.com/zend/hof/schmid.php", false), #author_link(s)
      "schmid_cartus.jpg", #img
      "Mit einem Vorwort von ".make_link("http://www.zend.com/zend/hof/andi.php", "Andi Gutmans") .
          " und " . make_link("http://www.zend.com/comm_person.php?id=12", "Zeev Suraski") . "<BR>\n" .
          "Unter Mitarbeit von Markt+Technik Verlag<BR>\n" .
          "New technology, Dec 2000, ISBN 3-8272-5877-4, 639 pages", #info
      "http://www.php-buch.de/",  #info_link
      "de" #lang
   ),


   array( "PHP - Dynamische websites professioneel ondersteunen",    #title(s)
      "http://www.pearsoneducation.nl/php3/boek1test.html?isbn=9043001406", #title_link
      array("Egon Schmid", "Christian Cartus", "Richard Blume"), #author(s)
      array("http://zend.com/zend/hof/schmid.php", false, false), #author_link(s)
      "book-php-dutch.gif", #img
      "Addison Wesley Longman, April 2000, ISBN 90-430-0140-6, 477 pages", #info
      "",  #info_link
      "nl" #lang
   ),


   array( array("PHP 4: Grundlagen und Profiwissen","Webserver-Programmierung unter Windows und Linux"),    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3446215468/wwwphpnet07", #title_link
      "J&ouml;rg Krause", #author(s)
      "", #author_link(s)
      "joerg_krause.jpg", #img
      "Hanser, Nov 2000, ISBN 3-446-21546-8, 1168 pages", #info
      "http://www.php.comzept.de/", #info_link
      "de"  #lang
   ),


   array( array("PHP 4","Webserver-Programmierung f&uuml;r Um- und Einsteiger"),    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3934358632/wwwphpnet07", #title_link
      "Thomas Theis", #author(s)
      "", #author_link(s)
      "theis.gif", #img
      "Galileo Press, May 2000, ISBN 3-934358-63-2, 354 pages", #info
      "http://www.galileo-press.de/katalog/einzel.asp?ID=202", #info_link
      "de"  #lang
   ),

   array( "PHP 4", # title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3826690044/wwwphpnet07", #title_link
      "Dr. Susanne Wigard", #author(s)
      "", #author_link(s)
      "susanne_wigard.jpg", #img
      "BHV, December 2000, ISBN 3-8266-9004-4, 448 pages", #info
      "http://www.bhv.net/bhv/buchreihen/deinst_1110_3.html", #info_link
      "de"  #lang
   ),

   array( "Das Einsteigerseminar PHP 4.0",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3828711103/wwwphpnet07", #title_link
      "Dr. Susanne Wigard", #author(s)
      "", #author_link(s)
      "susanne_wigard.gif", #img
      "BHV, Juni 2000, ISBN 3-8287-1110-3, 382 pages", #info
      "http://www.bhv.net/bhv/buchreihen/deinst_1110_3.html", #info_link
      "de"  #lang
   ),


   array( "PHP 4 + MySQL",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/381582043X/wwwphpnet07", #title_link
      array("Rolf D. Stoll", "Gudrun Anna Leierer"), #author(s)
      "", #author_link(s)
      "databecker.gif", #img
      "Data Becker, July 2000, ISBN 3-8158-2043-X, 439 pages", #info
      "http://www.databecker.de/", #info_link
      "de"  #lang
   ),


   array( "PHP 4 - Tutorial & Referenz",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3932311795/wwwphpnet07", #title_link
      "Klaus Schmidt", #author(s)
      "", #author_link(s)
      "klaus_schmidt.jpg", #img
      "Computer & Literatur Verlag GmbH, November 2000, ISBN 3-932-1179-5, 832 pages", #info
      "http://www.ksweb.de/index.php?page=buch", #info_link
      "de"  #lang
   ),


   array( "Jetzt lerne ich PHP 4",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3827258839/wwwphpnet07", #title_link
      "Matt Zandstra", #author(s)
      "", #author_link(s)
      "matt_zandstra.jpg", #img
      "Markt+Technik Verlag, December 2000, ISBN 3-8272-5883-9, 515 pages", #info
      "", #info_link
      "de"  #lang
   ),


   array( "Webanwendungen mit PHP 4.0 entwickeln",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3827317304/wwwphpnet07", #title_link
      array("Tobias Ratschiller","Till Gerken"), #author(s)
      array("http://zend.com/comm_person.php?id=7","http://zend.com/comm_person.php?id=11"), #author_link(s)
      "tobias_and_till.jpg", #img
      "Addison-Wesley, Jan 2001, ISBN 3-8273-1730-4, 400 pages", #info
      "", #info_link
      "de"  #lang
   ),


   array( "PHP 4",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3826680022/wwwphpnet07", #title_link
      array("Uwe Hess", "G&uuml;nther Karl"), #author(s)
      "", #author_link(s)
      "uwe_and_gunther.jpg", #img
      "bhv, Dec 2000, ISBN 3-8266-8002-2, 764 pages", #info
      "", #info_link
      "de"  #lang
   ),


   array( "PHP 4 f&uuml;r Profis. Werkzeugkiste und Kochbuch",    #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3898421163/wwwphpnet07", #title_link
      array("Helmut Dittrich","J&uuml;rgen Mellenthin"), #author(s)
      "", #author_link(s)
      "dittrich.jpg", #img
      "Galileo Press, January 2001, ISBN 3-8984-2116-3, 500 pages", #info
      "", #info_link
      "de"  #lang
   ),

   array( "PHP 4 programmering",    #title(s)
      "http://pagina.se/bok.html?20660", #title_link
      "Jesper Ek and Ulrika Eriksson", #author(s)
      "", #author_link(s)
      "ek-eriksson.gif", #img
      "February 2001, ISBN 9-1636-0660-7, 220 pages", #info
      "", #info_link
      "se"  #lang
   ),

   array( "Gu&iacute;a Pr&aacute;cticas PHP 4",    #title(s)
      "http://www.AnayaMultimedia.es/", #title_link
      "Esteban Trigos", #author(s)
      "", #author_link(s)
      "esteban_trigo.gif", #img
      "Anaya Multimedia, December 2000, ISBN 8-4415-1079-2, 288 pages", #info
      "http://www.en-linea.net/", #info_link
      "es"  #lang
   ),


   array( "Pages Web dynamiques avec ASP, PHP, SQL",    #title(s)
      "http://www.amazon.fr/exec/obidos/ASIN/2744007099/wwwphpnet0f", #title_link
      array("Jean-Marc Herellier","Philippe Merigod"), #author(s)
      "", #author_link(s)
      "herellier.gif", #img
      "", #info
      "", #info_link
      "fr"  #lang
   ),


   array( "Programmation PHP",    #title(s)
      "http://www.amazon.fr/exec/obidos/ASIN/2744009237/wwwphpnet0f", #title_link
      "Leon Atkinson", #author(s)
      "http://zend.com/comm_person.php?id=30", #author_link(s)
      "atkinson_fr.gif", #img
      "Translation of Leon Atkinson's book", #info
      "", #info_link
      "fr"  #lang
   ),


   array( "Programmation Web avec PHP",    #title(s)
      "http://www.amazon.fr/exec/obidos/ASIN/2212091133/wwwphpnet0f", #title_link
      array("Laurent Lacroix","Christophe Lauer","Nicolas Leprince","Christophe Boggero"), #author(s)
      "", #author_link(s)
      "lacroix.gif", #img
      "April 2000, ISBN 2-212-09113-3, 364 pages", #info
      "", #info_link
      "fr"  #lang
   ),


   array( array("PHP tvorba interaktivnich internetovych aplikaci", "(PHP development interactive internet applications)"),    #title(s)
      "http://www.kosek.cz/php/index.html", #title_link
      "Jiri Kosek", #author(s)
      "", #author_link(s)
      "czech-book.jpg", #img
      "", #info
      "", #info_link
      "cz"  #lang
   ),


   array( "PHP Web-DB Programming Guide",    #title(s)
      "http://www.wowbook.com/wow/book_info/book-info.asp?isbn=ISBN89%2D381%2D0239%2D4", #title_link
      "Jung Jinho", #author(s)
      "", #author_link(s)
      "korean-book.jpg", #img
      "", #info
      "", #info_link
      "kr"  #lang
   ),


   array( "PHP Web Programming with ORACLE Database",    #title(s)
      "http://www.wowbook.com/book/info/book_detail.asp?isbn=ISBN89-87939-26-X", #title_link
      "Kim Sung-Sik", #author(s)
      "", #author_link(s)
      "korean_book.gif", #img
      "", #info
      "", #info_link
      "kr"  #lang
   ),


   array( "CGI & PHP",    #title(s)
      "http://ychat.pe.kr/", #title_link
      "Youn Sukbum", #author(s)
      "", #author_link(s)
      "cgiphp.jpg", #img
      "", #info
      "", #info_link
      "kr"  #lang
   ),


   array( "PHP Bible",    #title(s)
      "http://php.wilson.gs/bible", #title_link
      "Wilson Peng", #author(s)
      "", #author_link(s)
      "wilson.jpg", #img
      "", #info
      "", #info_link
      "cn"  #lang
   ),


   array( array("Using PHP and MySQL", "With FreeBSD and Apache"),    #title(s)
      "http://www.drmaster.com.tw/information.asp?書號=DB20023", #title_link
      "C.C.J.", #author(s)
      "", #author_link(s)
      "db20023.gif", #img
      "July 1999, ISBN 957-527-168-8", #info
      "http://www.dw.com.tw/book.html", #info_link
      "cn"  #lang
   ),


   array( "Examples of PHP and MySQL",    #title(s)
      "http://www.drmaster.com.tw/information.asp?書號=DB20029", #title_link
      "C.C.J.", #author(s)
      "", #author_link(s)
      "db20029.gif", #img
      "February 2000, ISBN 957-527-224-2", #info
      "http://www.dw.com.tw/book.html", #info_link
      "cn"  #lang
   ),


   array( "PHP tettei kouryaku",    #title(s)
      "http://books.softbank.co.jp/bookweb.nsf/7218069992c69510492566350001471a/5ab16e3b3dcf4ef7492566ff0048baac?OpenDocument", #title_link
      array("Michihide Hotta","Tatsuo Ishii","Rui Hirokawa"), #author(s)
      array(false,false,"http://www.cityfujisawa.ne.jp/%7Elouis/"), #author_link(s)
      "japanese-book.gif", #img
      "Sep 1999, ISBN 4-7973-0865-6", #info
      "", #info_link
      "jp"  #lang
   ),


   array( "PHP Guia de Consulta R&aacute;pida",    #title(s)
      "http://www.livcultura.com.br/scripts/cultura/resenha/resenha.asp?nitem=320216", #title_link
      "Herbert G. Fischer", #author(s)
      "", #author_link(s)
      "fischer.jpg", #img
      "Jan 2000, ISBN 8-5851-8469-8", #info
      "http://phpclasses.UpperDesign.com/products.html/id/8585184698", #info_link
      "pt"  #lang
   )
  ),
  
  "Related" => array(

   array( array("Scriptsprachen f&uuml;r dynamische Webauftritte", "JavaScript, VBScript, ASP, Perl, PHP, XML"),   #title(s)
      "http://www.amazon.de/exec/obidos/ASIN/3446214135/wwwphpnet07", #title_link
      "Prof. Dr. Wolfgang Dehnhardt", #author(s)
      "", #author_link(s)
      "dehnhardt.jpg", #img
      "Hanser Verlag, Dec 2000, ISBN 3-446-21413-5, 452 pages", #info
      "http://www.wsite.de/", #info_link
      "de"  #lang
   ),


   array( "PostgreSQL: Introduction and Concepts",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0201703319/wwwphpnet", #title_link
      "Bruce Momjian", #author(s)
      "", #author_link(s)
      "postgresql.jpg", #img
      "Addison-Wesley Pub Co, Dec 2000, ISBN 0-2017-0331-9, 462 pages", #info
      "", #info_link
      ""  #lang
   ),


   array( "MySQL and mSQL (Nutshell Series)",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/1565924347/wwwphpnet", #title_link
      array("Randy Jay Yarger","George Reese","Tim King"), #author(s)
      "", #author_link(s)
      "mysql-book.gif", #img
      "O'Reilly & Associates, July 1999, ISBN 1-56592-434-7, 487 pages<BR>\n" .
          "Also available in ".make_link("http://www.books.ru/cgi-bin/v3/book_inf_code.cgi?5872","Russian"), #info
      "", #info_link
      ""  #lang
   ),


   array( "MySQL",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0735709211/wwwphpnet", #title_link
      "Paul DuBois", #author(s)
      "", #author_link(s)
      "dubois.jpg", #img
      "Foreword by ".make_link("http://zend.com/zend/hof/widenius.php", "Michael \"Monty\" Widenius") .
          "New Riders, December 1999, ISBN 0-7357-0921-1, 756 pages" .
          "Also available in " .
              make_link("http://www.amazon.fr/exec/obidos/ASIN/2744008826/wwwphpnet0f", "French") .
              " and " . make_link("http://www.amazon.de/exec/obidos/ASIN/382725793X/wwwphpnet07", "German"), #info
      "http://www.newriders.com/books/title.cfm?isbn=0735709211", #info_link
      ""  #lang
   ),


   array( "Webmaster in a Nutshell (Nutshell Series)",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/1565923251/wwwphpnet", #title_link
      array("Stephen Spainhour","Robert Eckstein"), #author(s)
      "", #author_link(s)
      "webmaster-book.gif", #img
      "Includes a large chapter on PHP written by ".make_link("http://zend.com/zend/hof/rasmus.php", "Rasmus Lerdorf") . "<BR>\n" .
         "O'Reilly & Associates, June 1999, 2nd edition, ISBN 1-5659-2325-1, 523 pages", #info
      "http://www.oreilly.com/catalog/webmaster2/", #info_link
      ""  #lang
   ),


   array( array("Open Source Development with CVS","Learn how to work with Open Source Software"),    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/1576104907/wwwphpnet", #title_link
      "Karl Franz Fogel", #author(s)
      "", #author_link(s)
      "cvsbook.gif", #img
      "Coriolis, 1999, ISBN 1-57610-490-7, 316 pages", #info
      "http://cvsbook.red-bean.com/", #info_link
      ""  #lang
   ),


   array( "CVS Pocket Reference",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/0596000030/wwwphpnet", #title_link
      "Gregor N. Purdy", #author(s)
      "", #author_link(s)
      "cvspr.gif", #img
      "O'Reilly, August 2000, ISBN 0-5960-0003-0, 79 pages", #info
      "http://www.oreilly.com/catalog/cvspr/", #info_link
      ""  #lang
   ),


   array( "Mastering Regular Expressions",    #title(s)
      "http://www.amazon.com/exec/obidos/ASIN/1565922573/wwwphpnet", #title_link
      array("Jeffrey E. Friedl","Andy Oram"), #author(s)
      "", #author_link(s)
      "regex.s.gif", #img
      "O'Reilly, January 1997, ISBN 1-5659-2257-3, 368 pages", #info
      "http://www.oreilly.com/catalog/regex/", #info_link
      ""  #lang
   )
  )
);


function showBook($one_book) {

    list($title, $title_link, $author, $author_link=false, $image=false, $info=false, $info_link=false, $lang=false) = $one_book;

    global $langs;

    if (!$lang || !isset($langs[$lang]) ) {
        $lang = 'en';
    }

    if (is_array($title)) {
        $img_title = $title[0];
        $title = '<h2 class="condensed">' . make_link($title_link, $title[0]) . '</h2>' . $title[1];
    } else {
        $img_title = $title;
        $title = '<h2 class="condensed">' .  make_link($title_link, $title) . '</h2>';
    }

    if (is_array($author)) {
        if (!$author_link) {
            $temp = $author;
        } else {
            for ($i=0; $i<count($author); $i++) {
                if ($author_link[$i]) {
                    $temp[] = make_link($author_link[$i],$author[$i]);
                } else {
                    $temp[] = $author[$i];
                }
            }
        }
        $last = array_pop($temp);
        $author = join(', ', $temp) . ' &amp; ' . $last;
    }

    echo '<tr><td colspan="2">' . hdelim() . "</td></tr>\n";

    echo "<tr valign=\"top\">\n";
    echo "<td>\n";
    print_link($title_link, make_image("books/".$image, $img_title, false, false, false, 1) );
    echo "<br>\n</td>\n";
    echo "<td>\n";
    echo $title . "\n";
    echo 'by ';
    if ($author_link) {
        print_link($author_link, $author);
    } else {
        echo $author;
    }
    echo "</p>\n<small>\n";
    if ($info || $lang!='en') {
        echo "<p>\n";
        if ($lang!='en') {
            echo 'in ' . $langs[$lang] . "<BR>\n";
        }
        echo $info . "</p>\n";
    }
    echo '<p>';
    echo make_link($info_link ? $info_link : $title_link,
        make_image('caret-rg.gif','>') . 'more info' );
    echo "<br>\n";
    echo "</p>\n</small>\n";
    echo "</td>\n</tr>\n\n";
}

if (!isset($book_types[$type])) { unset($type); }

if (isset($type)) {
  echo '<h1>' . $book_types[$type] . '</h1>'; ?>
<p>
Click on a book for more information or (in most cases) to purchase it.
Remember, if you buy the book using the links on this page, you are helping
to support PHP development!
</p>

<?php } else { ?>
<h1>
PHP Books
</h1>
<p>
Choose one category from the ones below to go to a listing of books
about the subject.
</p>
<?php } ?>

<P>
There may be more books available that we don't know of yet!  You can search
<A HREF="http://www.amazon.com/exec/obidos/redirect-home/wwwphpnet">Amazon.com</A>
for PHP related stuff by using this form (or go directly to
<A HREF="http://www.amazon.de/exec/obidos/redirect-home/wwwphpnet07"
>Amazon.de</A> or
<A HREF="http://www.amazon.fr/exec/obidos/redirect-home/wwwphpnet0f"
>Amazon.fr</A> and
search there):
</P>

<p>
<FORM METHOD="get" ACTION="http://www.amazon.com/exec/obidos/external-search">
<INPUT TYPE="hidden" NAME="tag" VALUE="wwwphpnet">
Search Amazon for
<SELECT NAME="mode">
<OPTION VALUE="blended">All Products
<OPTION VALUE="books" SELECTED>Books
<OPTION VALUE="music">Popular Music
<OPTION VALUE="classical-music">Classical Music
<OPTION VALUE="video">Video
<OPTION VALUE="toys">Toys
<OPTION VALUE="electronics">Electronics
</SELECT>
about
<SELECT NAME="keyword">
<OPTION SELECTED>PHP
<OPTION>Apache
<OPTION>Linux
<OPTION>MySQL
<OPTION>mSQL
<OPTION>Oracle
<OPTION>IMAP
<OPTION>LDAP
<OPTION>XML
<OPTION>Adabas
<OPTION>Sybase
<OPTION>Microsoft SQL
<OPTION>Microsoft NT
<OPTION>ODBC
</SELECT>
<INPUT TYPE="submit" BORDER=0 VALUE="Search" NAME="Search">
</FORM>
</p>

<P><BR></P>

<?php

  if (isset($type)) {
    echo '<!--'; print_r($books[$type]); echo '-->';
    echo '<table border=0 cellpadding=5>';
    foreach ($books[$type] as $one_book) {
      showBook($one_book);
    }
    echo '</table>';
  } else {
    echo '<ul>';
    foreach ($books as $btype => $book_list) {
      echo '<!-- $btype -->';
      make_link("/books.php?type=$btype", $book_types[$btype] . " [" . count($book_list) . " books]");
    }
    echo '</ul>';
  }

commonFooter();
?>
