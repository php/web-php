#!/usr/bin/env bash

test -f composer.json && composer install

sed -i 's/Listen 80$//' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/ServerName 127.0.0.1\n<VirtualHost \*:8080>/' /etc/apache2/sites-enabled/000-default.conf \
    && rm -rf /var/www/html
