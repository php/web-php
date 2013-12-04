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


## Setting up an official mirror

To install a full official mirror please see [the mirroring guidelines](http://php.net/mirroring).


