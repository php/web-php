<?php
// $Id$

/*
  This script provides functions to print out
  error messages for users in case something is
  not available.
*/

// A 'good looking' 404 error message page
function error_404()
{
    global $MYSITE;
    status_header(404);
    site_header('404 Not Found', array("noindex"));
    echo "<h1>Not Found</h1>\n<p><strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong> not found on this server.</p>\n";
    site_footer();
    exit;
}

// A 'good looking' 404 error message page for manual pages
function error_404_manual()
{
    global $MYSITE;
    status_header(404);
    site_header('404 Not Found', array("noindex"));
    echo "<h1>Not Found</h1>\n" .
         "<p>The manual page you are looking for (<strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong>) is not available on this server right now. " .
         "Please check back later, or if the problem persist, " .
         "<a href=\"/contact.php\">contact the webmasters</a>.</p>\n";
    site_footer();
    exit;
}

// This service is not working right now
function error_noservice()
{
    global $MYSITE;
    site_header('Service not working', array("noindex"));
    echo "<h1>Service not working</h1>\n" .
         "<p>The service you tried to access with <strong>" .
         htmlspecialchars(substr($MYSITE, 0, -1) . $_SERVER['REQUEST_URI']) .
         "</strong> is not available on this server right now. " .
         "Please check back later, or if the problem persist, " .
         "<a href=\"/contact.php\">contact the webmasters</a>.</p>\n";
    site_footer();
    exit;
}

// Send out a proper status header
function status_header($num)
{
    // Set status text
    switch ($num) {
        case 200: $status = "OK"; break;
        case 301: $status = "Moved Permanently"; break;
        case 404: $status = "Not Found"; break;
        default: return FALSE;
    }
    
    // BC code for PHP < 4.3.0
    @header("HTTP/1.1 $num $status");
    @header("Status: $num $status", TRUE, $num);
    
    return TRUE;
}
