<?
require("shared.inc");
commonHeader("PHP - Acronym Meaning Vote");
?>

In order to vote, please fill out this form.  You can also take a look
at the <a href="http://il.php.net/vote_listing.php3">votes so far</a>.

<center>
<form action="http://il.php.net/vote.php3" method="POST">

<table border="1">
<tr>
	<td>Name</td>
	<td><input type="text" name="name"></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email"></td>
</tr>
<tr>
	<td>Choice</td>
	<td>
		<select name="choice" size="3">
			<option value="1">PHP HTML Preprocessor
			<option value="2">PHP Hypertext Preprocessor
			<option value="3">PHP Hypermedia Preprocessor
		</select>
	</td>
</tr>
<tr>
	<td>Comments</td>
	<td>
		<textarea name="comments" rows="4" cols="40"></textarea>
	</td>
</tr>
</table>
<br>

<input type="submit" value="Vote">
<input type="reset" value="Reset voting form">
<br>

Please vote only <font color="red"><strong>once</strong></font>

</form>

</center>

<hr width="50%">

Here are two pieces, one by Rasmus supporting <strong>PHP HTML Preprocessor</strong>
and the other by Zeev supporting <strong>PHP Hypertext Preprocessor</strong>.

<hr width="50%">

<h4>PHP: an HTML Preprocessor</h4>

<p>PHP has long been described as, "A server-side HTML-embedded scripting
language".  This description will tell most people what to expect from
PHP.  In trying to come up with a better meaning for the PHP acronym we
have to realize where the expanded acronym will be used.  Magazine
articles, press releases and other marketing-oriented writing likes to
expand acronyms for their readers, and as such it is important that the
expanded acronym carries as much information as possible targeted at the
widest audience possible.  

<p>The word, "Preprocessor" is a bit technical, but it conveys the idea that
the language does its job before something else happens.  The word, "HTML"
tells the reader that this is what is preprocessed and that whatever is
being preprocessed is likely inside the HTML.  I just called HTML a word.
Obviously it is an acronym, but in common speech it is a word.  Nobody
says "Hypertext Markup Language".  I think it is important to have HTML in
the name because the average weekend web warrior knows what HTML is.

<p>Using the word, "Hypertext" in its place is an option, but I feel it
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

<p>HTML-embedded scripting is the heart and soul of PHP and the acronym
should reflect this.

<p>Rasmus

<hr width="30%">
<h4>Why not go with PHP:  HTML Preprocessor</h4>

<ul>
<li>Having two acronyms, one after the other, looks and sounds bad.  Plenty
of block letters, plenty of letters to spell out when reading the name.
<li> In the not-so-far future, PHP will probably be used to work with other
languages (e.g. XML).  However, it'll still be primarily used in the web
environment and will probably still be dealing with hypertext.  That means
HTML will be a bad name, whereas Hypertext would still be OK.
</ul>


<h4>Why go with PHP:  Hypertext Preprocessor</h4>

<ul>
<li>Basically, the opposites of the above reason.  Hypertext is a word that
sounds and looks ok.  It also covers a lot more than HTML does.  Even
though half of HTML is 'HyperText', if we 'hardcode' HTML in the name,
it'll seem as if the language is limited to working with this language
only.  With hypertext, this is not the case.
<li>I doubt there are any webmasters who don't know what hypertext is, and
that HTML is hypertext.  The 'HTML is more familiar than Hypertext' doesn't
cut it as a reason, IMHO.
</ul>

<p>Now, the third option mentioned by Rasmus, suggested by Stig Bakken, is
also a valid option.  'PHP:  Hypermedia Preprocessor' would definitely be
the most accurate meaning from among the three options, since it also
covers other types of output that PHP sometimes generates, like GD
graphics.  It doesn't suffer from the problems with 'PHP:  HTML
Preprocessor', but on the other hand, I've personally never heard that word
before in my life, and I suspect there are plenty of other people in the
same situation.

<p>Another problem with it, IMHO, is that my first association with Hypermedia
was Multimedia (and actually, that is the meaning), and if we say that PHP
is a Multimedia Preprocessor, we'll appear to be boasting in something that
we fail to deliver.  Even though there are scripts that output content
other than text/html, like GD graphics, these are fairly rare.  Also, when
the multimedia buzzword comes up, people usually think about video and
sound, and PHP is almost never used in conjunction with those.

<p>Zeev

<hr width="30%">

<p>To sum up view #1:

<ol>
<li>Any name with "Hyper" anywhere in it sounds bad.  It is in the same
class as "Cyber" and "Ultra" in that they are overused and trite.
<li>Regardless of the state of XML or whatever else comes along in the
future PHP is a embedded language HTML-style.
<li>HTML-embedded scripting is the heart and soul of PHP and the name
   should reflect this.
</ol>

<p>To sum up view #2:

<ol>
<li>PHP:  HTML Preprocessor sounds and looks bad, like just about any other 
    two acronyms glued together.  The 'any name with hyper in it sounds bad'
    view, on the other hand, is 'somewhat' un-understandable, IMHO.
<li>In the near, hardcoding HTML in the name would mean we cover less than
     99% of the market (when XML kicks in).
<li>Hypertext Preprocessor looks and sounds better, and covers >99% of the
     market, and will probably continue to do so when XML is used.
<li>Hypermedia Preprocessor also looks OK, but the word is a bit obscure,
     and the meaning covers around 200% of the market (that is, it also covers
     plenty of things that PHP isn't used for).
</ol>


<? commonFooter(); ?>
