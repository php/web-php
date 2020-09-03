## Local development

This is the git repo for the official www.php.net website.

To setup a local mirror of the website:

    $ git clone https://github.com/php/web-php.git
	$ cd web-php
	$ php -S localhost:8080 .router.php


This repo includes most (generated) files that are required for normal
operation of this website, such as

 - News & events data
 - Several manual pages (and a translation), see manual/{en,ja}/
 - User contributed notes for manual pages
 - A "router" for the builtin PHP webserver

How to set up a full local mirror is described in our Wiki:
https://wiki.php.net/web/mirror

## Code requirements

Code must function on a vanilla PHP 7.2 installation. 
Please keep this in mind before filing a pull request.
