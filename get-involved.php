<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'get-involved.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("Get Involved", array("current" => "community"));
?>

<aside class="tips">
<p style="margin: 5px; padding: 5px;">
    Ever wondered how the PHP.net project actually works and what it has to offer? 
    Who is in charge and how decisions are made? The PHP.net project has a lot of 
    things in the works and is always looking for new talent to join the project, 
    share new ideas, discuss improvements, fix broken features, look after the
    websites, documentation, and so on and on...
</p>
</aside>

<h2>Improving PHP</h2>
<p>
    This particular article assumes you are running <i>Ubuntu Linux</i>.
</p>
<p>
    To get a working build environment you need to run the following command;
    <ul>
        <li>sudo apt-get build-dep php5</li>
    </ul>
For any extension that requires 3rd party libraries you need to install those libraries.
The simplest way to accomplish that is to to use <em>apt-get</em> to install the Ubuntu build dependencies for that particular extension. For example, if you want to build PHP with <a href="/manual/intl">intl</a> support you have to run;
    <ul>
        <li>sudo apt-get build-dep php5<em>-intl</em></li>
    </ul>
to install the ext/intl dependencies.
</p>
<p>
To actually build PHP with ext/intl support you need to configure PHP to enable it, f.e.
    <ul>
        <li>./configure --enable-intl</li>
    </ul>
    The rule of thumb for configuring PHP is;<br />
    <ul>
        <li>If its a pure PHP functionality use <em>--enable</em>extension-name<br />
            Example;
            <ul>
                <li>./configure --enable-soap</li>
            </ul>
        </li>
        <li>And for extensions wrapping external libraries use <em>--with</em>-extension-name<br />
            Example;
            <ul>
                <li>./configure --with-m--with-pgsql</li>
            </ul>
        </li>
    </ul>
    But as you saw with ext/intl, rules are meant to be broken - so you <em>should</em> check <i>./configure --help</i> first.<br />
    When PHP encounters unknown configure argument you will be notified in the end, so you can modify your arguments and re-run ./configure before executing <em>make</em>.
</p>
<p>
PHP creates a script called <em>config.nice</em> after every successful <em>./configure --some --arguments</em> so you don't have to remember all the options you passed to ./configure every time you want to rebuild PHP, running <em>./config.nice</em> will do that for you
</p>
    
<p>
Once you have the build dependencies installed you'll need to checkout PHP from SVN, configure and build it;
<ul>
    <li>svn co https://svn.php.net/repository/php/php-src/branches/PHP_5_4 php54</li>
    <li>cd php54</li>
    <li>./buildconf</li>
    <li>./configure (see the <a href="#config.nice">shell script helper below)</a></li>
    <li>make all test</li>
</ul>
</p>

<p>While `make all test` is running we recommend you go out for a run,
it can take a while. When you come back, submit
the test results, but then try to track down one of the failed tests and
figure out why it failed. The tests are very simple. In the failed test
summary at the end a failed test shows up as:<br />
<em>CLI php -m [sapi/cli/tests/018.phpt]</em>
<br />
That's a short description of the test and the filename of the test itself.
For a failed tests, we create some files in the test dir. Go to sapi/cli/tests
and you will find these files:
<ul>
    <li>018.phpt - the full test file</li>
    <li>018.php - the php code that was run for the test</li>
    <li>018.out - the actual output from the test</li>
    <li>018.exp - the output that we expected</li>
    <li>018.diff - the diff between the actual and expected</li>
</ul>
Once you have fixed something, you can re-run the tests for just that set of 
tests with:
<ul>
    <li>make test TESTS=sapi/cli</li>
</ul>
</p>
<p>
To run more tests, run ./configure and enable as many extensions as possible.
</p>
<p id="config.nice">
Here is the shell script I use on an Ubuntu box:
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
<p>
There are also README.TESTING and README.TESTING2 text files in the root
directory if you want to learn more about the testing mechanism.
</p>


<h2>Contributing</h2>
<p style="margin: 5px; padding: 5px;">
    The PHP project is so much more than just the scripting language on which it is
    focused.  It is a vibrant community of developers scratching related itches,
    hoping their work will benefit others. PHP.net hosts a set of projects
    focused around the "flagship product," the PHP language, surrounding it
    with sub-projects for documentation, website maintenance, adding extra
    functionality with extensions, and so on.
</p>


<p style="margin: 5px; padding: 5px;">
    The PHP community is without a doubt, in my opinion, one of the greatest
    communities in the world. It has a lot to offer besides good friends and a fun
    working environment. It is a community where things can happen very fast, with
    many people involved, contributing back "upstream" to PHP in various
    capacities, from user-contributed notes to the manual to new killer language
    features. There is always room for new contributors though, and PHP.net really
    needs your help so it can continue the success of past years.  In this article
    we will explore how the PHP.net project works and how you can contribute to it.
</p>


<p style="margin: 5px; padding: 5px;">
    There are a lot of ways in which you can contribute to and influence the project;
    participating on mailing lists, filing bug reports, and adding helpful notes
    to the manual are all examples of valuable contributions. You don't have to
    develop a new JIT compiler, or even know the first thing of
    developing a language for that matter, to be able to contribute back. Whatever
    you fancy, I am sure you can find a challenging task on PHP.net to solve. Or
    are you maybe just looking for some brain-dead task on which to spend time -
    but still want to make a difference? We have several of those too!
</p>


<p style="margin: 5px; padding: 5px;">
    Before we go deeper into ways you can contribute and how to do so, let's take
    a step back and look at who actually leads the development and how things are
    done within PHP.net.
</p>


<p style="margin: 5px; padding: 5px;">
    One of things I love most about working with Open Source Software like PHP is
    the freedom. If I have an itch, I scratch it! If I want to work on new
    features or document all the kinks and quirks of PHP, I can. We have the
    freedom to work on exactly the things we care about and want to do.
    There is no one person in charge or policing of the project, it is a community
    effort. All decisions are made in the open after the contributors
    participating in the discussion reach "general consensus" on the topic or - if
    all else fails - after a vote on the subject. As within any community, there;
    are members that have earned karma and respect through contributions to the
    project, and their meaning and views usually carry more weight than a total
    stranger from whom no one has heard before. Karma, like trust, needs to be
    earned.
</p>


<p style="margin: 5px; padding: 5px;">
    To gain karma you basically need to prove to the community that you aren't
    just a nut-job and show that you can be trusted to think not only about today,
    but tomorrow as well. Being active on the developers' mailing lists,
    digging into bug reports, posting patches and unit tests, and generally
    trying to help out and contribute to the project are great ways to gain a
    lot of karma points very quickly.
</p>


<p style="margin: 5px; padding: 5px;">
    All of the PHP.net projects (from PEAR, to PECL, to websites and
    documentation, to the PHP language itself) have
    long-time members which could be considered the "leaders" of the respective
    projects by the community, but that really doesn't mean anything other than
    "if no one knows the answer, ask him." The "leader" isn't going to tell you to
    do anything, other than maybe ask you to revert a bad commit, but anyone can
    do that. It is totally up to you to decide whether or not to work on some
    things. In the end, the final say on the matter is up to the contributor who
    is actually doing the work.
</p>


<p style="margin: 5px; padding: 5px;">
    The PHP.net project has mailing lists for most aspects of the project where
    all important decisions are made. For example discussions and decisions about
    the language happen on the internals@lists.php.net mailing list
    (internals-win@lists.php.net for Windows-specific things such as packaging,
    porting features not available yet on Windows, et cetera). All discussions
    are open to whomever wants to participate.  All you need to do is to sign up
    to the mailing list and follow the discussions - and chime in if you have
    something to add. Please take a few moments to familiarize yourself with the
    mailing list "rules" before you go all crazy on the lists.  For the rules that
    are generally followed on all PHP mailing lists, please see the
    <a href="http://php.net/reST/php-src/trunk_README.MAILINGLIST_RULES">Mailinglist Rules</a>.
</p>


<p style="margin: 5px; padding: 5px;">
    Although most of the PHP internals contributors make their living writing PHP
    applications, feedback from other users is crucial to the development of the
    language; your voice does matter. Keep in mind, however, that flaming
    and/or talking down to the developers that spend most of their free time
    working on the project may not exactly be the best approach to get your point
    across. Take a look at the <a href="http://php.net/mailinglists"]]">Mailing Lists</a> for the most
    popular mailing lists and see if any of them interest you, then sign up!
</p>


<p style="margin: 5px; padding: 5px;">
    Even though most of the mailing lists are very active, not everything that is
    contributed to PHP needs to be approved there first. For example, minor
    features are often simply committed directly to SVN without asking or telling
    anyone. These are typically things for which a developer working on an
    external application saw a need and decided to add, in case anyone else might
    need it in the future. PHP has a great peer review process so it's very hard
    to "sneak" things in. Every commit to SVN is reviewed by quite a lot of people
    who are interested in what is going on - or who simply enjoy reading code. If
    a reviewer discovers issues with the commit, he or she will send a quick reply
    to the commit email and discuss it on the developers list. Often the peer review
    results in extending the new feature and/or fixing unexpected behaviour, but
    it can also result in removal of the feature as a whole if the community
    doesn't see any need for it.
</p>


<p style="margin: 5px; padding: 5px;">
    To help streamline part of the decision process and keep track of ideas,
    proposals, and TODO lists, PHP has a wiki located at
    <a href="http://wiki.php.net">wiki.php.net</a>. This has proven to be a valuable resource when
    developing new features, creating RFCs, and getting approval for things
    before wasting time on a rejected feature. Discussions on controversial
    features pop up on the mailing lists regularly, but with the help of the
    wiki people can easily browse through previous discussions and see the
    reasons for rejection. The wiki contains a lot of great information and is
    definitely worth browsing for all those interested in the overall PHP.net
    project. It not only covers RFCs, but also has a lot of information about
    how various other things work; missing documentation, suggestions,
    "internal" parser engine information, infrastructure docs, and even some
    TODO lists are all examples of things included in the wiki.
</p>




<h3>So, how to get involved?</h3>
<p style="margin: 5px; padding: 5px;">
    There are a lot of ways you can contribute to the project, it simply depends on what you fancy.
</p>
<ul>
    <li>
        Do you want to work on UI design, or general website development?
        Looking for a place to experiment with emerging web technologies? We have
        several websites, both 'internal' and external, many of which could use a
        facelift, while others, quite frankly, could benefit from a complete
        rewrite.
    </li>
    <li>
        Do you enjoy technical writing? Discovering the inner workings of things?
        Being the first one to try out not-even-yet-released features? Join the
        documentation team. Having a good understand of C will help when documenting
        new features, but there will always be people around to explain features to
        whomever wants to document them.
    </li>
    <li>
        Want to show off your sysadmin skillz? PHP.net has dozens of servers
        needing some love. Everything from simple web servers to complicated mail
        setups, DNS and rsync servers to build-boxes and website mirroring
        infrastructure.
    </li>
</ul>


<p style="margin: 5px; padding: 5px;">
    Getting involved is a lot easier than most people think - and chances are that
    you are already involved in one way or another. You don't need an SVN account
    and commit access to get started - SVN accounts need to be earned. Registering
    on the mailing lists related to the topic in which you are interested - and
    actively participating in the discussions - is a good start toward getting
    your request for an SVN account granted. Browse the wiki to see if there are
    outstanding TODO items you can help to clear, for example. Another great way
    to get involved and really help out is by reviewing the bug tracker for bugs
    you could potentially fix, or perhaps for which you could write a unit test.
    Sending several patches to the mailing lists will quickly show that you are
    interested and serious about your desire to contribute. Eventually someone
    will get annoyed with the amount of time they must spend to commit your patches
    for you, and will probably respond with something along the lines of, "Stop
    bothering me. Do it yourself!" and ask you to submit the SVN account form.
    Mission accomplished!
</p>




<h3>Tips</h3>
<ul>
    <li>
        <h4>Mailing Lists</h4>
        <p style="margin: 5px; padding: 5px;">
            To register with any PHP mailing list, just send a blank email to
            &lt;listname&gt;-subscribe@lists.php.net. For example if you want to register
            for the PHP internals developers discussion list, send an email to
            internals-subscribe@lists.php.net.
            Alternatively, filling out the form at <a href="http://php.net/mailinglists">php.net/mailinglists</a> will
            register you for the list (or lists) you choose. That page also lists some of
            the most popular mailing lists and describes the intention of the lists.
            Again, remember to refer to the rules prior to joining the discussion, or you
            may be scorned for a faux-pas such as top-posting your reply to a thread - oh the horror!
        </p>
    </li>
    <li>
    <h4>The Bug Tracker</h4>
        <p style="margin: 5px; padding: 5px;">
            Filing a bug report is an art. It isn't very complicated, but you do
            have to think about what you are reporting. Quickly looking through
            the existing reports to see if your issue has already been reported
            will take you less than five minutes, and the chances are quite good that
            you aren't the first one to identify the issue. However, if you are,
            we greatly appreciate your time and effort in reporting it. If at all
            possible, provide a short example of how the issue can be reproduced,
            and mention what you expected to happen versus what actually happened.
            Simple steps like these will drastically increase the chances of
            someone picking up the report and attempting to fix the issue. While
            there is no registration or login required to file a bug report, a
            valid email address must be provided just in case the developers need
            more information from you, as well as for you to receive status
            updates on your report. A page explaining how to file a "report that
            someone will want to help fix" is available on
            <a href="http://bugs.php.net/how-to-report.php">bugs.php.net/how-to-report.php</a>. Please read through it
            before filing a bug report for the first time.
        </p>
    </li>
    <li>
        <h4>Getting Started With Contributing</h4>
        <p style="margin: 5px; padding: 5px;">
            Unsure which task to tackle first? Stuck on a problem? Need a
            quick brainstorming session? IRC is a very convenient way to get
            help quickly for smaller things, such as "where was the SVN module
            for zyx?" or if you simply want to run an idea by people to get
            their opinions - or even just to hang out. There aren't any
            "official" IRC channels for the PHP project, but a good chunk of
            contributors hang out on EFNet on the #php.pecl, #php.doc and #pear
            channels. The mailing list archives also contain a lot of information
            and are definitely worth searching for ideas and inspiration. If
            you think your question can benefit others coming after you,
            consider asking it on the mailing list so the next person doesn't
            have to ask it again.
        </p>
    </li>
    <li>
        <h4>Less Is More</h4>
        <p style="margin: 5px; padding: 5px;">
            When you are ready to contribute to the project please don't try
            to tackle the biggest issues and expect to fix them right away.
            Start with smaller tasks and learn the ways of the project and
            participate in discussions on the mailing lists. Larger issues
            take more time and experience within the project, which is not
            something on which newcomers should focus. Take your time and
            solve the task as best as you possibly can. Read up on the Coding
            Standards and try to be consistent in your work. We have lost too
            many people who jump right on the larger tasks only to vanish few
            days later, having given up on the task because it took more time
            and effort than they initially anticipated.
        </p>
    </li>
</ul>



<h3>So what kind of projects does PHP.net have?</h3>
<ul>
    <li>PHP (the language)</li>
    <li>PECL (various additional PHP functionality in the form of extensions)</li>
    <li>PEAR (reusable PHP component library)</li>
    <li>Websites (www.php.net, qa.php.net, doc.php.net, edit.php.net, etc.)</li>
    <li>Documentation (PHP, PECL, PEAR, etc.)</li>
    <li>System administration (mail servers, web servers, build-boxes, monitoring, etc.)</li>
    <li>Etc., etc., (etc.)</li>
</ul>

<p style="margin: 5px; padding: 5px;">
    If you can't find something on which to work within PHP.net, you will have a
    hard time finding it elsewhere. Introducing every project is beyond the scope
    of this article, but we'll cover some of the projects that don't have entry
    points that are too steep for newcomers.
</p>



<h3>The Documentation Project</h3>
<p style="margin: 5px; padding: 5px;">
    The main focus of the documentation project (phpdoc) is to document the PHP
    language (and PECL extensions) with usage examples, FAQs, and tracking changes
    in behaviour. The documentation is written in XML using the Docbook format
    with English as the primary language. This is then translated into several
    different languages by dedicated translation teams. The phpdoc team also
    maintains sets of scripts to simplify the work: generation of skeletons for
    new extensions and functions based on Reflection information, extracting INI
    options, and various related utilities to extract information from the PHP
    source code are all examples of tools used to make writing documentation
    easier. The primary mailing list for phpdoc is phpdoc@lists.php.net, where
    contributors coordinate their efforts and ask for feedback, suggestions, and
    help. The list also covers the phpdoc sub-projects, such as the PhD and PhD
    O.E. applications. Each translation team also has its own mailing list:
    doc-&lt;country-code&gt;@lists.php.net. For example, doc-fr@lists.php.net for
    the French translation list.
</p>

<p style="margin: 5px; padding: 5px;">
    A web application, called "PhD Online Editor" (PhD O.E), which aims to help
    documentation editors focus on the content itself, rather than Docbook and XML
    logistics, is under development at <a href="https://edit.php.net">edit.php.net</a>. It is getting
    more and more popular, especially for newcomers who aren't comfortable with
    Docbook. It has a very rich interface and desktop application feeling to it,
    and abstracts most of the XML magic from the contributor. One of the goals
    of PhD O.E. is to get more people involved with the documentation effort,
    and therefore it will allow anonymous users to "login" and use the
    application. Modification, validation, translation, creation of new files,
    and everything else you need for writing documentation is possible without
    an SVN account. When saving changes, a patch will be created and saved to
    the "patch queue," while pending approval by someone with SVN karma to
    commit the changes. PhD O.E. also bundles a variety of scripts to ensure the
    docs use a consistent structure, allow the contributor to view undocumented
    functions, and check the translation status of an entry (among other things).
</p>

<p style="margin: 5px; padding: 5px;">
    The team is also developing a Docbook rendering engine, called "PHP-based
    Docbook Rendering" (PhD), to transform the Docbook XML into various different
    formats, such as HTML, CHM, PDF, Unix manual pages, and the online format you
    see while browsing the <a href="http://php.net/manual">PHP Manual</a>. The application was written with
    performance in mind and can render the entire PHP manual in less then five
    minutes, whereas the previous tool chain would take over an hour for the same
    task. PhD has received a lot of attention from various people and projects
    using Docbook, and is now also in use outside of PHP.net for the rendering of
    Docbook manuals.
</p>


<p style="margin: 5px; padding: 5px;">
    Last, but not least: the team also maintains a website on
    <a href="http://doc.php.net">doc.php.net</a> which aggregates translation 
    statistics, tutorials, and the documentation HOWTO.
</p>

<p style="margin: 5px; padding: 5px;">
    The project offers much more than just documentation, and is probably the
    project to which it is easiest to start contributing. If you enjoy working
    with XML, PHP, JS, documentation, writing articles, or simply want to dig
    into the PHP internals from a different angle, this is the place to be.
</p>


<h3>The Websites</h3>
<p style="margin: 5px; padding: 5px;">
    No surprise there, the webmaster team maintains several websites, and is
    responsible for maintaining the mirroring infrastructure and related tasks.
    The websites contain a lot of information; everything from user group meet-ups
    and conference listings, to tips &amp; tricks and documentation, and
    everything between. It is also the primary public source for release
    information, as well as the general entry point for people looking into PHP.
</p>

<p style="margin: 5px; padding: 5px;">
    To get up and running is very simple: just follow the points on 
    <a href="http://wiki.php.net/web/mirror">wiki.php.net/web/mirror</a>
    and you are all set. Once you have poked around a little you can look 
    into the other websites, like qa.php.net, master.php.net and pecl.php.net.
</p>

<p style="margin: 5px; padding: 5px;">
    Recently, work on redesigning the main website from the ground-up was started. 
    Unfortunately, this effort has stalled a bit over the past several months 
    due to a lack of contributors interested in being actively involved. 
    The idea is simple: design a completely new layout and refactor the current 
    content to make it more accessible.
</p>

<p style="margin: 5px; padding: 5px;">
    Joining the redesign effort is a great entry point for those interested in 
    markup, CSS, and general website development. Check out 
    <a href="http://wiki.php.net/web/redesign">wiki.php.net/web/redesign</a>
    and contact php-webmaster@lists.php.net if you are interested in contributing. 
    You will be welcomed with roses!
</p>



<h3>Conclusion</h3>
<p style="margin: 5px; padding: 5px;">
    PHP.net has a lot of areas to which you can contribute: everything from 
    hardcore development to managing user-contributed notes in the manual; 
    from debugging issues in bug reports to writing articles about new features 
    for the manual. In this article we only covered the tip of the iceberg, 
    mentioning only a small sample of concrete projects that do a lot more than 
    initially meets the eye, and which welcome all the help they can get. 
    We have also touched on how to influence the direction of the project, 
    how to participate in discussions around the project, and ways you can make 
    a difference. I hope this article has inspired you to get involved with the 
    project, or has at least given you some idea on how things work and what you 
    can do if you ever do decide you want to get involved!
</p>


<?php
site_footer();

/* vim: set et ts=4 sw=4 ft=php: : */

