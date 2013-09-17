<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'get-involved.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA ='
    <p>
      This page is intended to help setup a development environment for PHP, if mistakes are found
      please <a href="http://bugs.php.net">report</a> them.
    </p>
';

site_header("Get Involved", array("current" => "community"));

?>
<h2>Operating System Preparation</h2>
<p>
    Improving PHP requires a working build environment to test changes, the following section deals with setting up a working build environment.
</p>
<p>
    Your build environment should have an appropriate toolchain that includes a working C compiler, 
        for those not working in Microsoft Windows, you will need a working, compatible autotools installation, and at the very least a shared copy of zlib.
</p>
<p>
    For most *nix like operating systems, some external dependencies may be required to bring a build to completion; 
        if a build fails because of missing headers or libraries, issuing a variant of the following command should resolve those dependencies, allowing the build to continue:
    <ul>
        <li>[sudo] yum|apt-get|ports install package[-dev[el]]</li>
    </ul>
</p>
<p>
    For those working in <i>Ubuntu Linux</i>, you can run the following command to automate the installation of dependencies:
    <ul>
        <li>sudo apt-get build-dep php5</li>
    </ul>
    If the compilation of <i>an extension</i> should fail because of missing dependencies, <i>Ubuntu Linux</i> can attempt to automate the resolution of those dependencies by issuing:
    <ul>
        <li>sudo apt-get build-dep php5-<i>extname</i></li>
    </ul>
</p>
<p>
    The following table shows what is required for Microsoft Windows users to build PHP:
<p/>
<table>
<tr>
    <th>PHP</th>
    <th>Visual C++</th>
    <th>MS SDK</th>
    <th>DEPS</th>
    <th>PHP SDK</th>
</tr>
<tr>
    <td align="center">5.3</td>
    <td align="center">Visual Studio 2008</td>
    <td align="center">6.1</td>
    <td align="center"><a href="http://windows.php.net/downloads/php-sdk/deps-5.3-vc9-x86.7z">x86</a></td>
    <td align="center"><a href="http://windows.php.net/downloads/php-sdk/php-sdk-binary-tools-20110512.zip">here</a></td>
</tr>
<tr>
    <td align="center">5.4</td>
    <td align="center">Visual Studio 2008</td>
    <td align="center">6.1</td>
    <td align="center"><a href="http://windows.php.net/downloads/php-sdk/deps-5.4-vc9-x86.7z">x86</a></td>
    <td align="center"><a href="http://windows.php.net/downloads/php-sdk/php-sdk-binary-tools-20110915.zip">here</a></td>
</tr>
<tr>
    <td align="center">5.5</td>
    <td align="center">Visual Studio 2008</td>
    <td align="center">6.1</td>
    <td align="center"><a href="http://windows.php.net/downloads/php-sdk/deps-5.5-vc9-x86.7z">x86</a></td>
    <td align="center"><a href="http://windows.php.net/downloads/php-sdk/php-sdk-binary-tools-20110915.zip">here</a></td>
</tr>
<tr>
    <td align="center">5.5</td>
    <td align="center">Visual Studio 2012</td>
    <td align="center">N/A</td>
    <td align="center">
        <a href="http://windows.php.net/downloads/php-sdk/deps-5.5-vc11-x86.7z">x86</a>,
        <a href="http://windows.php.net/downloads/php-sdk/deps-5.5-vc11-x64.7z">x64</a>
    </td>
    <td align="center"><a href="http://windows.php.net/downloads/php-sdk/php-sdk-binary-tools-20110915.zip">here</a></td>
</tr>
</table>
<p><b>Note:</b>&nbsp;If a Windows SDK is required, it is advised to install the SDK <i>before</i> Visual Studio.</p>

<h2>Workspace Preparation</h2>
<p>
    Windows users should now download and unzip the PHP SDK to their workspace and execute the following commands in an appropriate Visual Studio Console:
</p>
<p>
    Visual Studio 2008:
    <ul>
        <li>setenv /xp /Release /x86</li>
    </ul>
    Visual Studio 2008 and 2012:
    <ul>
        <li>cd C:\path-to-workspace</li>
        <li>bin\phpsdk_setvars.bat</li>
        <li>bin\phpsdk_buildtree.bat phpdev</li>
    </ul>
    Windows should now change to the directory C:\path-to-workspace\phpdev\<i>VCXX</i>\<i>XARCH</i>, and consider it the root of the workspace for the current build.
</p>
<p>
    The next step for everyone is to obtain the versioned PHP sources via git:
    <ul>
        <li>git clone -b BRANCH https://github.com/php/php-src .</li>
    </ul>
    BRANCH should be replaced with an appropriate branch name, for example <i>PHP-5.5</i>.
</p>
<p>
    At this point you have a working build environment and the vanilla sources for your chosen branch of PHP, it is a good idea, before you change anything at all, to create a new branch and switch to it, in preparation for your awesome changes to come:
    <ul>
        <li>git checkout -b my-awesome-changes</li>
    </ul>
</p>
<h2>Building Your Development PHP</h2>
<p>
    All operating systems now converge on (near as makes no difference) the same solutions for the rest of the build process:
    <ul>
        <li>buildconf: generates the configure script for PHP</li>
        <li>configure: configures the build of PHP and creates Makefile</li>
        <li>make: builds PHP</li>
        <li>make test: runs testsuite</li>
        <li>make install: installs PHP</li>
    </ul>
</p>
<p>
    For Microsoft Windows operating systems, those commands looks like this:
    <ul>
        <li>buildconf</li>
        <li>configure --with-prefix=C:\my-awesome-php</li>
        <li>nmake</li>
        <li>nmake test</li>
        <li>nmake install</li>
    </ul>
</p>
<p>
    While for the rest of us, those commands look like this:
    <ul>
        <li>./buildconf</li>
        <li>./configure --prefix=/opt/my-awesome-php</li>
        <li>make</li>
        <li>make test</li>
        <li>make install</li>
    </ul>
</p>
<p>
    The <i>configure</i> script has the ability to customize almost every aspect of PHP, to ellicit help at the console pass <i>--help</i>
 as the only argument to <i>configure</i></p>
<p>
    When <i>configure</i> executes, it saves the options passed in to a re-usable <i>config.nice</i> which executes <i>configure</i> when invoked.
</p>
<p>
    Upon successful completion of a build, it is recommended to run the test suite, this will help you to identify regression problems in your work, 
        running the test suite can take a while; go out for a run, or a burger.
</p>
<p>
    It is also possible to run a set (directory) of tests in the following way:
    <ul>
        <li>[n]make test TESTS=sapi/cli</li>
    </ul>
</p>
<?php
site_footer(array('sidebar'=>$SIDEBAR_DATA));

/* vim: set et ts=4 sw=4 ft=php: : */

