[![Integrate](https://github.com/php/web-php/actions/workflows/integrate.yaml/badge.svg)](https://github.com/php/web-php/actions/workflows/integrate.yaml)

## Local development

This is the git repository for the official www.php.net website.

To setup a local mirror of the website, clone the repository:

```
git clone https://github.com/php/web-php.git
```

Change into `web-php`:

```
cd web-php
```

Start the built-in web server:

```
php -S localhost:8080 .router.php
```

This repository includes most (generated) files that are required for normal
operation of this website, such as

 - News & events data
 - Several manual pages (and a translation), see manual/{en,ja}/
 - User contributed notes for manual pages
 - A "router" for the builtin PHP webserver

How to set up a full local mirror is described in our Wiki:
https://wiki.php.net/web/mirror

## Code requirements

Code must function on a vanilla PHP 7.3 installation. 
Please keep this in mind before filing a pull request.

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).
