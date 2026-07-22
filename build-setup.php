<?php
$_SERVER['BASE_PAGE'] = 'build-setup.php';
include_once __DIR__ . '/include/prepend.inc';

$SIDEBAR_DATA = '
<div class="panel">
  <div class="body">
    <p>
      This page is intended to help set up a development environment for PHP, if mistakes are found
      please <a href="https://bugs.php.net">report</a> them.
    </p>
  </div>
</div>
';

site_header(
    "Operating System Preparation",
    [
        "current" => "community",
        "css" => [
            "code-syntax.css",
        ],
    ],
);

?>
<h2 id="os-prep" class="content-header">Operating System Preparation</h2>
<div class="content-box">
<p>
    Improving PHP requires a working build environment to test changes, the following section deals with setting up a working build environment.
</p>
<p>
    Your build environment should have an appropriate toolchain that includes a working C compiler.
        For those not working in Microsoft Windows, you will need a working, compatible autotools installation, and at the very least a shared copy of zlib.
</p>
<p>
    For most *nix like operating systems, some external dependencies may be required to bring a build to completion;
        if a build fails because of missing headers or libraries, issuing a variant of the following command should resolve those dependencies, allowing the build to continue.
</p>
<div class="code-toolbar">
<pre class="small">[sudo] yum|apt|port install package[-dev[el]]</pre>
</div>
<p>
    For those working in <i>Ubuntu Linux</i>, you can run the following command to automate the installation of dependencies.
</p>
<div class="code-toolbar">
<pre class="small">sudo apt build-dep php</pre>
</div>
<p>
    If the compilation of <i>an extension</i> fails because of missing dependencies, <i>Ubuntu Linux</i> can attempt to automate the resolution of those dependencies by issuing:
</p>
<div class="code-toolbar">
<pre class="small">sudo apt build-dep php-&lt;extname&gt;</pre>
</div>
<p>
    The following table shows what is required for Microsoft Windows users to build supported PHP versions:
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
    <td align="center">8.2</td>
    <td align="center">Visual Studio 2019</td>
    <td align="center">VS16</td>
    <td align="center">
        <a href="https://downloads.php.net/~windows/php-sdk/deps/vs16/x86/">x86</a>,
        <a href="https://downloads.php.net/~windows/php-sdk/deps/vs16/x64/">x64</a>
    </td>
    <td align="center"><a href="https://github.com/php/php-sdk-binary-tools/releases">tools</a></td>
</tr>
<tr>
    <td align="center">8.3</td>
    <td align="center">Visual Studio 2019</td>
    <td align="center">VS16</td>
    <td align="center">
        <a href="https://downloads.php.net/~windows/php-sdk/deps/vs16/x86/">x86</a>,
        <a href="https://downloads.php.net/~windows/php-sdk/deps/vs16/x64/">x64</a>
    </td>
    <td align="center"><a href="https://github.com/php/php-sdk-binary-tools/releases">tools</a></td>
</tr>
<tr>
    <td align="center">8.4</td>
    <td align="center">Visual Studio 2022</td>
    <td align="center">VS17</td>
    <td align="center">
        <a href="https://downloads.php.net/~windows/php-sdk/deps/vs17/x86/">x86</a>,
        <a href="https://downloads.php.net/~windows/php-sdk/deps/vs17/x64/">x64</a>
    </td>
    <td align="center"><a href="https://github.com/php/php-sdk-binary-tools/releases">tools</a></td>
</tr>
<tr>
    <td align="center">8.5</td>
    <td align="center">Visual Studio 2022</td>
    <td align="center">VS17</td>
    <td align="center">
        <a href="https://downloads.php.net/~windows/php-sdk/deps/vs17/x86/">x86</a>,
        <a href="https://downloads.php.net/~windows/php-sdk/deps/vs17/x64/">x64</a>
    </td>
    <td align="center"><a href="https://github.com/php/php-sdk-binary-tools/releases">tools</a></td>
</tr>
</table>
<p><b>Note:</b>&nbsp;If a Windows SDK is required, it is advised to install the SDK <i>before</i> Visual Studio.</p>
</div>

<h2 id="workspace-prep" class="content-header">Workspace Preparation</h2>
<div class="content-box">
<p>
    Windows users should now download and unzip the PHP SDK to their workspace and execute the following commands in an appropriate Visual Studio 2019/2022 Developer Command Prompt:
</p>
<p>
    Visual Studio 2019 and 2022:
</p>
<div class="code-toolbar">
<pre class="small">cd C:\path-to-workspace
bin\phpsdk_setvars.bat
bin\phpsdk_buildtree.bat phpdev</pre>
</div>
<p>
    Windows should now change to the directory C:\path-to-workspace\phpdev\<i>VSXX</i>\<i>XARCH</i>, and consider it the root of the workspace for the current build.
</p>
<p>
    The next step for everyone is to obtain the versioned PHP sources via git:
</p>
<div class="code-toolbar">
<pre class="small">git clone -b BRANCH https://github.com/php/php-src .</pre>
</div>
<p>
    BRANCH should be replaced with an appropriate branch name, for example, <i>PHP-8.5</i>.
</p>
<p>
    At this point you have a working build environment and the vanilla sources for your chosen branch of PHP, it is a good idea, before you change anything at all, to create a new branch and switch to it, in preparation for your awesome changes to come.
</p>
<div class="code-toolbar">
<pre class="small">git checkout -b my-awesome-changes</pre>
</div>
</div>


<h2 id="build-dev" class="content-header">Building Your Development PHP</h2>
<div class="content-box">
<p>
    All operating systems now converge on (near as makes no difference) the same solutions for the rest of the build process:
</p>
<ul class="listed">
    <li><code>buildconf</code>: generates the configure script for PHP</li>
    <li><code>configure</code>: configures the build of PHP and creates Makefile</li>
    <li><code>make</code>: builds PHP</li>
    <li><code>make test</code>: runs testsuite</li>
    <li><code>make install</code>: installs PHP</li>
</ul>
<p>
    For Microsoft Windows operating systems, those commands look like this:
</p>
<div class="code-toolbar">
<pre class="small">buildconf
configure --with-prefix=C:\my-awesome-php
nmake
nmake test
nmake install</pre>
</div>
<p>
    While for the rest of us, those commands look like this:
</p>
<div class="code-toolbar">
<pre class="small">./buildconf
./configure --prefix=/opt/my-awesome-php
make
make test
make install</pre>
</div>
<p>
    The <i>configure</i> script can customize almost every aspect of PHP, to elicit help at the console pass <i>--help</i>
 as the only argument to <i>configure</i></p>
<p>
    When <i>configure</i> executes, it saves the options passed in to a re-usable <i>config.nice</i> which executes <i>configure</i> when invoked.
</p>
<p>
    Upon successful completion of a build, it is recommended to run the test suite; this will help you to identify regression problems in your work,
        running the test suite can take a while; go out for a run, or a burger.
</p>
<p>
    It is also possible to run a set (directory) of tests in the following way:
</p>
<div class="code-toolbar">
<pre class="small">[n]make test TESTS=sapi/cli</pre>
</div>
</div>
<?php
site_footer(['sidebar' => $SIDEBAR_DATA]);
