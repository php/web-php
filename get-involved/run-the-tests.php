<?php
$_SERVER['BASE_PAGE'] = 'get-involved/run-the-tests.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("Run the Test Suite", array("current" => "community"));
?>

<aside class="tips">
 <p>
  This particular article assumes you are running <i>Ubuntu Linux</i>, although
  the instructions should work without any significant changes on other
  Debian-derived distributions.
 </p>
</aside>

<h1>Run the Test Suite</h1>

<p>
 One of the simplest ways to help improve PHP is by building PHP, running the
 test suite and sending the results to the PHP QA team. This allows us to look
 for patterns of test failures and use those to track down and fix bugs in PHP.
</p>

<h2>Configuring a PHP Build Environment</h2>

<p>
 To get a working build environment you need to run the following command:
 <br />
 <code>sudo apt-get build-dep php5</code>
</p>

<p>
 You'll also need a PHP source tree. The easiest way to get this is to
 <a href="/download.php">download a release tarball</a> and extract it
 somewhere. If you're more adventurous, you can grab the latest code from
 GitHub as described in steps 1-4 on the <a href="/git.php">Git
 instructions</a> page &mdash; don't forget to run <code>./buildconf</code>
 before trying to run <code>./configure</code>!
</p>

<h2>Configuring PHP Itself</h2>

<p>
 To build PHP with extensions that require third party libraries you will need
 to install those libraries.  The simplest way to accomplish that is to to use
 <code>apt-get</code> to install the Ubuntu build dependencies for that
 particular extension. For example, if you want to build PHP with
 <a href="/intl">intl</a> support you have to run this command to install the
 ext/intl dependencies:
 <br />
 <code>sudo apt-get build-dep php5<em>-intl</em></code>
</p>

<p>
 To build PHP with ext/intl support you need to configure PHP to enable it:
 <br />
 <code>./configure --enable-intl</code>
</p>

<p>
 In general, the rule of thumb for configuring PHP is:
</p>

<ul>
 <li>
  If the extension is pure PHP functionality and doesn't depend on external
  libraries, then you provide a configure option in the form
  <code><em>--enable</em>-extension-name</code>. For example:
  <br />
  <code>./configure --enable-soap</code>
 </li>
 <li>
  Extensions that do use external libraries use this format for their configure options:
  <code><em>--with</em>-extension-name</code>. For example:
  <br />
  <code>./configure --with-pgsql</code>
 </li>
</ul>

<p>
 But as you saw with ext/intl, rules are meant to be broken - so you
 <em>should</em> check <code>./configure --help</code> first, as it lists every
 option.
</p>

<p>
 When PHP encounters unknown configure options you will be notified when
 configure finishes running so you can modify your arguments and re-run
 ./configure before executing <code>make</code>.
</p>

<p>
 PHP creates a script called <code>config.nice</code> after every successful
 <code>./configure</code> so you don't have to remember all the options you
 passed to ./configure in the first place. If you want to rebuild PHP with the
 same options, you can simply run <code>./config.nice</code> instead of
 <code>./configure --enable-this --with-that</code> in future.
</p>

<h2>Building PHP</h2>

<p>
 This is the easy part! Once you have the dependencies installed and
 configure has run, you can run <code>make</code> to build PHP.
</p>

<p>
 You can also run the test suite automatically after building PHP by running:
 <br />
 <code>make all test</code>
</p>

<p>
 While PHP is building and the test suite is running we recommend you go out
 for a run, it can take a while. When you come back, submit the test results
 by pressing "y" and hitting enter &mdash; but if you really want to help us
 out, you can try to track down one of the failed tests and figure out why it
 failed.
</p>

<h2>Test Failures</h2>

<p>
 The test suite is very simple. In the failed test summary at the end a
 failed test shows up as:
 <br />
 <code>CLI php -m [sapi/cli/tests/018.phpt]</code>
 <br />
 We'll assume that this is the test that's failed from here on, but your file
 name will almost certainly be different.
</p>

<p>
 That's a short description of the test and the filename of the test itself.
 When tests fail, <code>make test</code> creates some files in the test
 directory.  Go to sapi/cli/tests and you will find these files:
</p>

<ul>
 <li>018.phpt - the full test file</li>
 <li>018.php - the PHP code that was run for the test</li>
 <li>018.out - the actual output from the test</li>
 <li>018.exp - the output that we expected</li>
 <li>018.diff - the diff between the actual and expected</li>
</ul>

<p>
 If you've managed to fix something, you can re-run the tests for just that
 set of tests with:
 <br />
 <code>make test TESTS=sapi/cli</code>
</p>

<p>
 From there, you can
 <a href="/get-involved/pull-requests.php">create a pull request</a> and send
 the change to the PHP development team to be integrated into PHP!
</p>

<h2>Helpful Tips</h2>

<p>
To run more tests, run ./configure and enable as many extensions as possible.
</p>

<p id="config.nice">
Here is the shell script I use on an Ubuntu box:
<code>
<pre>
#! /bin/sh
'./configure' \
'--with-apxs2=/usr/bin/apxs2' \
'--with-curlwrappers' \
'--with-gd' \
'--with-jpeg-dir=/usr' \
'--with-png-dir=/usr' \
'--with-vpx-dir=/usr' \
'--with-freetype-dir=/usr' \
'--with-t1lib=/usr' \
'--enable-gd-native-ttf' \
'--enable-exif' \
'--with-config-file-path=/etc/php5/apache2' \
'--with-config-file-scan-dir=/etc/php5/apache2/conf.d' \
'--with-mysql=/usr' \
'--with-zlib' \
'--with-zlib-dir=/usr' \
'--with-gettext' \
'--with-kerberos' \
'--with-imap-ssl' \
'--with-mcrypt=/usr/local' \
'--with-iconv' \
'--with-ldap=/usr' \
'--enable-sockets' \
'--with-openssl' \
'--with-pspell' \
'--with-pdo-mysql=/usr' \
'--with-pdo-sqlite' \
'--enable-soap' \
'--enable-xmlreader' \
'--with-xsl' \
'--enable-ftp' \
'--enable-cgi' \
'--with-curl=/usr' \
'--with-tidy' \
'--with-xmlrpc' \
'--enable-mbstring' \
'--enable-sysvsem' \
'--enable-sysvshm' \
'--enable-shmop' \
'--with-readline' \
'--with-mysqli=/usr/bin/mysql_config' \
'--prefix=/usr/local' \
"$@"
</pre>
</code>
</p>

<p>
 There are also
 <a href="https://github.com/php/php-src/blob/master/README.TESTING">README.TESTING</a>
 and
 <a href="https://github.com/php/php-src/blob/master/README.TESTING2">README.TESTING2</a>
 text files in the root directory of PHP's source code if you want to learn
 more about the testing mechanism.
</p>

<?php site_footer();
