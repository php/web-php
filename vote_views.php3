<?
require("shared.inc");
commonHeader("PHP - Acronym Meaning Vote - Reasoning");
?>

Here are two pieces, one by Rasmus supporting <strong>PHP HTML Preprocessor</strong>
and the other by Zeev supporting <strong>PHP Hypertext Preprocessor</strong>.

<pre>
PHP: an HTML Preprocessor

PHP has long been described as, "A server-side HTML-embedded scripting
language".  This description will tell most people what to expect from
PHP.  In trying to come up with a better meaning for the PHP acronym we
have to realize where the expanded acronym will be used.  Magazine
articles, press releases and other marketing-oriented writing likes to
expand acronyms for their readers, and as such it is important that the
expanded acronym carries as much information as possible targeted at the
widest audience possible.  

The word, "Preprocessor" is a bit technical, but it conveys the idea that
the language does its job before something else happens.  The word, "HTML"
tells the reader that this is what is preprocessed and that whatever is
being preprocessed is likely inside the HTML.  I just called HTML a word.
Obviously it is an acronym, but in common speech it is a word.  Nobody
says "Hypertext Markup Language".  I think it is important to have HTML in
the name because the average weekend web warrior knows what HTML is.

Using the word, "Hypertext" in its place is an option, but I feel it
dilutes the meaning.  Technically PHP isn't just used to create HTML, it
can also spit out images or any other data stream you can think of.  By
that logic we might use the word "Hypermedia" instead of "Hypertext" since
Hypertext also doesn't fully cover the types of things PHP can produce.
On the other hand, HTML doesn't just refer to the source file type, but
also to the style of the tags used to embed PHP.  Whether the actual file
is XML or whatever, PHP uses HTML-style tags to weave its magic.  The
output datastream is irrelevant.  The preprocessing and embedding is done
HTML-style no matter how you twist and turn things.  Even if you have a
file full of XML tags which produces a video stream, the PHP component
will be in HTML-style tags.

HTML-embedded scripting is the heart and soul of PHP and the acronym
should reflect this.

-Rasmus

--------------------
View #2
--------------------

Why not go with PHP:  HTML Preprocessor

* Having two acronyms, one after the other, looks and sounds bad.  Plenty
of block letters, plenty of letters to spell out when reading the name.
* In the not-so-far future, PHP will probably be used to work with other
languages (e.g. XML).  However, it'll still be primarily used in the web
environment and will probably still be dealing with hypertext.  That means
HTML will be a bad name, whereas Hypertext would still be OK.


Why go with PHP:  Hypertext Preprocessor

* Basically, the opposites of the above reason.  Hypertext is a word that
sounds and looks ok.  It also covers a lot more than HTML does.  Even
though half of HTML is 'HyperText', if we 'hardcode' HTML in the name,
it'll seem as if the language is limited to working with this language
only.  With hypertext, this is not the case.
* I doubt there are any webmasters who don't know what hypertext is, and
that HTML is hypertext.  The 'HTML is more familiar than Hypertext' doesn't
cut it as a reason, IMHO.

Now, the third option mentioned by Rasmus, suggested by Stig Bakken, is
also a valid option.  'PHP:  Hypermedia Preprocessor' would definitely be
the most accurate meaning from among the three options, since it also
covers other types of output that PHP sometimes generates, like GD
graphics.  It doesn't suffer from the problems with 'PHP:  HTML
Preprocessor', but on the other hand, I've personally never heard that word
before in my life, and I suspect there are plenty of other people in the
same situation.
Another problem with it, IMHO, is that my first association with Hypermedia
was Multimedia (and actually, that is the meaning), and if we say that PHP
is a Multimedia Preprocessor, we'll appear to be boasting in something that
we fail to deliver.  Even though there are scripts that output content
other than text/html, like GD graphics, these are fairly rare.  Also, when
the multimedia buzzword comes up, people usually think about video and
sound, and PHP is almost never used in conjunction with those.

Zeev


To sum up view #1:

1. Any name with "Hyper" anywhere in it sounds bad.  It is in the same
    class as "Cyber" and "Ultra" in that they are overused and trite.
2. Regardless of the state of XML or whatever else comes along in the
   future PHP is a embedded language HTML-style.
3. HTML-embedded scripting is the heart and soul of PHP and the name
   should reflect this.

To sum up view #2:
1.  PHP:  HTML Preprocessor sounds and looks bad, like just about any other 
    two acronyms glued together.  The 'any name with hyper in it sounds bad'
    view, on the other hand, is 'somewhat' un-understandable, IMHO.
2.  In the near, hardcoding HTML in the name would mean we cover less than
     99% of the market (when XML kicks in).
3.  Hypertext Preprocessor looks and sounds better, and covers >99% of the
     market, and will probably continue to do so when XML is used.
4.  Hypermedia Preprocessor also looks OK, but the word is a bit obscure,
     and the meaning covers around 200% of the market (that is, it also covers
     plenty of things that PHP isn't used for).

</pre>

<?
commonFooter();
?>
