# $Id$
#
# Perl routines to encapsulate various elements of HTML page style.

# For future reference, when is now?
($se,$mn,$hr,$md,$mo,$yr,$wd,$yd,$dst) = localtime(time);
$yr += 1900;
$mo += 1;
$timestamp = "$mo-$md-$yr";

# Colors for the body
$t_body = "<body text=\"#000000\" bgcolor=\"#ffffff\">";

if (!defined($hsty_base)) { 
    $hsty_base = "..";
}
if (!defined($hsty_author)) {
    $hsty_author = "<a href=\"mailto: webmaster\@php.net\">webmaster\@php.net</a>";
}

sub html_header {
    local ($title) = @_;

    return "Content-type: text/html\n\n" . 
	"<html>\n<title>$title</title>\n</head>\n$t_body\n" .
	"<img src=\"/logos/big-logo1t.gif\"><h1><font color=\"#660000\">$title</font></h1>\n";
}

sub short_html_header {
    local ($title) = @_;

    return "Content-type: text/html\n\n" .
	"<html>\n<title>$title</title>\n</head>\n$t_body\n" .
        "<img src=\"/logos/big-logo1t.gif\">";
}

sub html_footer {
    return "<hr><address>$hsty_author<br>$hsty_date</address>\n";
}

sub get_the_source {
    return if $ENV{'PATH_INFO'} ne '/get_the_source';

    open(R, $0) || do { 
	print "Oops! open $0: $!\n";  # should not reached
	exit;
    };

    print "Content-type: text/plain\n\n";
    while(<R>) { print }
    close R;
    exit;
}            

