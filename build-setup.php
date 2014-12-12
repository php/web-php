<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'get-involved.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA ='
<div class="panel">
  <div class="body">
    <p>
      This page is intended to help setup a development environment for PHP, if mistakes are found
      please <a href="http://bugs.php.net">report</a> them.
    </p>
  </div>
</div>
';

site_header("Operating System Preparation", array("current" => "community"));

?>
<h2 id="os-prep" class="content-header">Operating System Preparation</h2>
<div class="content-box">
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
        <li><pre class="small">[sudo] yum|apt-get|ports install package[-dev[el]]</pre></li>
    </ul>
</p>
<p>
    For those working in <i>Ubuntu Linux</i>, you can run the following command to automate the installation of dependencies:
    <ul>
        <li><pre class="small">sudo apt-get build-dep php5</pre></li>
    </ul>
    If the compilation of <i>an extension</i> should fail because of missing dependencies, <i>Ubuntu Linux</i> can attempt to automate the resolution of those dependencies by issuing:
    <ul>
        <li><pre class="small">sudo apt-get build-dep php5-<i>extname</i></pre></li>
    </ul>
</p>
<p>
    The following table shows what is required for Microsoft Windows users to build PHP:
</p>
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
</div>

<h2 id="workspace-prep" class="content-header">Workspace Preparation</h2>
<div class="content-box">
<p>
    Windows users should now download and unzip the PHP SDK to their workspace and execute the following commands in an appropriate Visual Studio Console:
</p>
<p>
    Visual Studio 2008:
    <ul>
        <li><pre>setenv /xp /Release /x86</pre></li>
    </ul>
    Visual Studio 2008 and 2012:
    <ul>
        <li><pre class="small">cd C:\path-to-workspace</pre></li>
        <li><pre class="small">bin\phpsdk_setvars.bat</pre></li>
        <li><pre class="small">bin\phpsdk_buildtree.bat phpdev</pre></li>
    </ul>
    Windows should now change to the directory C:\path-to-workspace\phpdev\<i>VCXX</i>\<i>XARCH</i>, and consider it the root of the workspace for the current build.
</p>
<p>
    The next step for everyone is to obtain the versioned PHP sources via git:
    <ul>
        <li><pre class="small">git clone -b BRANCH https://github.com/php/php-src .</pre></li>
    </ul>
    BRANCH should be replaced with an appropriate branch name, for example <i>PHP-5.5</i>.
</p>
<p>
    At this point you have a working build environment and the vanilla sources for your chosen branch of PHP, it is a good idea, before you change anything at all, to create a new branch and switch to it, in preparation for your awesome changes to come:
    <ul>
        <li><pre class="small">git checkout -b my-awesome-changes</pre></li>
    </ul>
</p>
</div>


<h2 id="build-dev" class="content-header">Building Your Development PHP</h2>
<div class="content-box">
<p>
    All operating systems now converge on (near as makes no difference) the same solutions for the rest of the build process:
    <ul class="listed">
        <li><pre class="small">buildconf: generates the configure script for PHP</pre></li>
        <li><pre class="small">configure: configures the build of PHP and creates Makefile</pre></li>
        <li><pre class="small">make: builds PHP</pre></li>
        <li><pre class="small">make test: runs testsuite</pre></li>
        <li><pre class="small">make install: installs PHP</pre></li>
    </ul>
</p>
<p>
    For Microsoft Windows operating systems, those commands looks like this:
    <ul class="listed">
        <li><pre class="small">buildconf</pre></li>
        <li><pre class="small">configure --with-prefix=C:\my-awesome-php</pre></li>
        <li><pre class="small">nmake</pre></li>
        <li><pre class="small">nmake test</pre></li>
        <li><pre class="small">nmake install</pre></li>
    </ul>
</p>
<p>
    While for the rest of us, those commands look like this:
    <ul class="listed">
        <li><pre class="small">./buildconf</pre></li>
        <li><pre class="small">./configure --prefix=/opt/my-awesome-php</pre></li>
        <li><pre class="small">make</pre></li>
        <li><pre class="small">make test</pre></li>
        <li><pre class="small">make install</pre></li>
    </ul>
</p>
<p>
    The <i>configure</i> script has the ability to customize almost every aspect of PHP, to elicit help at the console pass <i>--help</i>
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
        <li><pre class="small">[n]make test TESTS=sapi/cli</pre></li>
    </ul>
</p>
</div>
<?php
site_footer(array('sidebar'=>$SIDEBAR_DATA));

/* vim: set et ts=4 sw=4 ft=php: : */
