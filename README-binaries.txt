Apache-1.3.0 + PHP 3.0 Binary Release

This release is meant to get you up and running quickly.  It only
includes certain Apache modules and certain PHP features.  It may
be perfectly suitable for your needs, but chances are you would 
want to compile your own versions of both PHP and Apache to get
the exact set of features you need.

For a complete list of the Apache modules compiled into this binary
release, type: bin/httpd -l

The PHP module is compiled with MySQL-3.21.30, GD-1.3 and track-vars
enabled by default.

The exact steps to build the httpd binary found in the bin directory
were:

gunzip apache_1.3.0.tar.gz
tar xvf apache_1.3.0.tar
gunzip php-3.0.tar.gz
tar xvf php-3.0.tar
cd apache_1.3.0
./configure --prefix=/httpd-php
cd ../php-3.0
./configure --with-mysql --with-apache=../apache_1.3.0 --enable-track-vars
make
make install
cd ../apache_1.3.0
./configure --prefix=/httpd-php --activate-module=src/modules/php3/libphp3.a
make

HOW TO INSTALL

gunzip httpd-php-*.gz
tar xvf httpd-php-*.tar
cd httpd-php
cp php3.ini-dist /usr/local/lib
cd etc/apache
<edit the httpd.conf file as per the instructions in that file>

Then start Apache by typing: httpd-php/bin/httpd -d <path>/httpd-php

You can edit /usr/local/lib/php3.ini file to set PHP options.
