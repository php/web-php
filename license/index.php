<?php
$_SERVER['BASE_PAGE'] = 'license/index.php';
include_once __DIR__ . '/../include/prepend.inc';

$SIDEBAR_DATA = <<<EOF
<aside>
    <h3>Contents</h3>

    <ol>
        <li><a href="#code-lic">PHP Software</a></li>
        <li><a href="#doc-lic">PHP Documentation</a></li>
        <li><a href="#web-lic">PHP Website</a></li>
        <li><a href="#logo-lic">PHP Logo</a></li>
        <li><a href="#faq-lic">FAQ's</a></li>
        <li><a href="#other-lic">Licensing information for related projects</a></li>
    </ol>
</aside>
EOF;

site_header("License Information", ["current" => "help"]);
?>

<h1>PHP Licensing</h1>

<a id="code-lic"></a>
<h2>PHP Software</h2>

<p>
    PHP software is available for use under the terms of the <a href="#bsd-3-clause">Modified BSD License</a>,
    also known as the PHP License, version 4.
</p>

<p>
    The Modified BSD License is an <a href="https://opensource.org/osd">Open Source license</a>,
    <a href="https://opensource.org/license/bsd-3-clause">approved by the Open Source Initiative</a>, and
    <a href="https://directory.fsf.org/wiki/License:BSD-3-Clause">compatible with the GNU General Public License (GPL)</a>.
    It is a <a href="https://en.wikipedia.org/wiki/Permissive_software_license">permissive</a> software license that does
    not have the <a href="https://en.wikipedia.org/wiki/Copyleft">copyleft</a> restrictions associated with licenses like
    the GNU GPL. Its SPDX identifier is <a href="https://spdx.org/licenses/BSD-3-Clause.html"><code>BSD-3-Clause</code></a>.
</p>

<p>
    Some files in PHP software have been contributed under other compatible licenses and may carry additional
    requirements and copyright information. This is indicated in the license/copyright comment block at the top of each
    source file. Sometimes the license terms are included in a separate license file in the same directory as the source
    file.
</p>

<a id="bsd-3-clause"></a>
<h3>License</h3>

<p>
    Copyright &copy; The PHP Group and Contributors.<br>
    Copyright &copy; Zend by Perforce.
</p>

<p>
    Redistribution and use in source and binary forms, with or without
    modification, are permitted provided that the following conditions are met:
</p>

<ol>
    <li>
        <p>
            Redistributions of source code must retain the above copyright notice,
            this list of conditions and the following disclaimer.
        </p>
    </li>
    <li>
        <p>
            Redistributions in binary form must reproduce the above copyright notice,
            this list of conditions and the following disclaimer in the documentation
            and/or other materials provided with the distribution.
        </p>
    </li>
    <li>
        <p>
            Neither the name of the copyright holder nor the names of its
            contributors may be used to endorse or promote products derived from
            this software without specific prior written permission.
        </p>
    </li>
</ol>

<p>
    THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
    AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
    IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
    DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
    FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
    DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
    SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
    CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
    OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
    OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
</p>

<h3>Practical Guidelines</h3>

<ul>
    <li><a href="/license/distrib-guidelines-code.php">Distributing PHP</a></li>
    <li><a href="/license/contrib-guidelines-code.php">Contributing to PHP</a></li>
</ul>

<h3>Earlier Versions</h3>

<p>
    Earlier versions of PHP software were distributed under the terms of versions <a href="/license/2_01.txt">2.01</a>,
    <a href="/license/2_02.txt">2.02</a>, <a href="/license/3_0.txt">3.0</a>, and <a href="/license/3_01.txt">3.01</a>
    of the PHP License. At your option, you may choose to use any earlier version of PHP software under the terms of the
    <a href="/license/4_0.txt">PHP License, version 4</a>. This is in accordance with section 5 of the PHP License,
    versions 3.0 and 3.01, and section 4 of the PHP License, versions 2.01 and 2.02 (emphasis added):
</p>

<blockquote>
    <p>
        Once covered code has been published under a particular version of the license, you may always continue to use
        it under the terms of that version. <b>You may also choose to use such covered code under the terms of any
        subsequent version</b> of the license published by the PHP Group.
    </p>
</blockquote>

<a id="doc-lic"></a>
<h2>PHP Documentation</h2>

<p>
    The PHP manual text and comments are available under the terms of the
    <a href="https://creativecommons.org/licenses/by/3.0/legalcode">Creative Commons Attribution 3.0 License</a> and
    Copyright &copy; the PHP Documentation Group.
</p>

<ul>
    <li><a href="https://creativecommons.org/licenses/by/3.0/">Layperson summary of the PHP Manual license</a></li>
    <li><a href="https://doc.php.net/guide/">Contributing to the PHP Manual</a></li>
</ul>

<a id="web-lic"></a>
<h2>PHP Website</h2>

<p>
    The <a href="/copyright.php">Website Copyright</a> page describes the copyright of the PHP website.
</p>

<a id="logo-lic"></a>
<h2>PHP Logo</h2>

<p>
    For the PHP logo license terms, please see the <a href="/download-logos.php">logo and icon download page</a>.
</p>

<a id="faq-lic"></a>
<h2>Frequently Asked Questions</h2>

<h3>Use of the name "PHP"</h3>

<p>
    <strong>Q.</strong> I've written a project in PHP that I'm going to release as open source, and I'd like to call it
    PHPTransmogrifier. Is that OK?
</p>

<p>
    <strong>A.</strong> We really cannot stop you from using PHP in the name of your project, but we would prefer you
    come up with your own name independent of the PHP name.
</p>

<p>
    "PHP" is the PHP project's unique brand. When others see the name "PHP," they associate it with this project. When
    you use "PHP" as part of your software's name, you are linking your efforts to those of the entire PHP development
    community and the years of work that have gone into the PHP project.
</p>

<p>
    Additionally, using "PHP" in your project's name causes a lot of confusion, making it more difficult for people to
    find your project or get help with it. Inevitably, people looking for your project will open issues on the PHP
    project's issue tracker, taking up the valuable time of our volunteers.
</p>

<p>
    So, please, pick a name that stands on its own merits. If others find your project useful, it will not take long to
    establish a reputation for yourself.
</p>

<h3>Change in licensing from PHP 8.6 and later</h3>

<p>
    <strong>Q.</strong> What are the differences between the PHP License, version 3.01, and the PHP License, version 4?
</p>

<p>
    <strong>A.</strong> The PHP License, version 4 removes clauses 4, 5, and 6 of the PHP License, version 3.01. This
    effectively makes it identical to the Modified BSD License (<code>BSD-3-Clause</code>).
</p>

<p>
    While the OSI approved versions 3.0 and 3.01 of the PHP License through their legacy approval process, the licenses
    were not compatible with the GPL. Additionally, some of the wording in clauses 4, 5, and 6 was challenging or
    impossible to enforce, and various readings and interpretations sometimes caused confusion among distributors.
    As a result, the PHP Group decided to invoke clause 5 of the PHP License to publish a new version. The new version
    resolves all problems with the PHP License (perceived or actual) while preserving the rights granted by
    contributors and the rights granted to users.
</p>

<h3>Change in licensing from PHP 4 and later</h3>

<p>
    <strong>Q.</strong> Why are PHP versions 4 and later not dual-licensed under the GNU General Public License (GPL)
    like PHP 3?
</p>

<p>
    <strong>A.</strong> GPL enforces many restrictions on what can and cannot be done with the licensed code. The PHP
    developers decided to release PHP 4 under a much more permissive license (BSD-style), to allow broader uses of PHP
    by more people.
</p>

<a id="other-lic"></a>
<h2>Licensing information for related projects</h2>

<p>
    For related projects, please refer to licensing information on the project websites:
</p>

<ul>
    <li><a href="https://pecl.php.net/copyright.php">PECL</a></li>
    <li><a href="https://pear.php.net/copyright.php">PEAR</a></li>
</ul>

<?php site_footer(['sidebar' => $SIDEBAR_DATA]);
