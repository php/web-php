<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>What is PHP?</h3>

<p>
<acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
is a server-side, cross-platform, HTML embedded scripting
language. If you are new to PHP and want to get some idea
of how it works, try the ' . make_link("/tut.php", "introductory tutorial") . '.
After that, check out the online ' . make_link("/docs.php", "manual") . ',
and the example archive sites and some of the other resources
available in the ' . make_link("/links.php", "links section") . '.
</p>

<p>
PHP is a project of the ' . 
make_link("http://www.apache.org/","Apache Software Foundation") . '.
</p>

<h3>' . make_link("/thanks.php", "Thanks To") . '</h3>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<br>
&nbsp; ' . make_link("http://www.pair.com/", "pair Networks") . '<br>
&nbsp; ' . make_link("http://www.rackspace.com/?supbid=php.net", "Rackspace") . '<br>
&nbsp; ' . make_link("http://www.synacor.com/", "Synacor") . '<br>
&nbsp; ' . make_link("http://vasoftware.com/", "VA Software Corporation") . '<br>
<h3>Related sites</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<br>
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<br>
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<br>
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<br>
<h3>Community</h3>
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<br>
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<br>

<h3>Contact</h3>

<p>
Please
submit website bugs in the ' .
make_link('http://bugs.php.net/', 'bug system') . '.
</p>
<p>
You can contact the webmaster at ' . 
make_link('mailto:webmaster@php.net', 'webmaster@php.net') . '.
</p>
';

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>
Annonce de PHP 4.2.0
</h1>

<p>Apr&egrave;s avoir pass&eacute; avec succ&egrave;s le processus qualit&eacute;, PHP 4.2.0 est officiellement <a href="/downloads.php">publi&eacute;</a>!</p>

<h2>Variables externes</h2>

<p>
Le changement le plus important de PHP 4.2.0 concerne la gestion des
variables. Les <b>variables externes (issues de l'environnement d'ex&eacute;cution,
des requ&ecirc;tes HTTP, des cookies ou du serveur web) ne sont plus enregistr&eacute;es
dans l'environnement d'ex&eacute;cution global par d&eacute;faut.</b> La m&eacute;thode recommand&eacute;e
pour acc&eacute;der aux variables externes est d'utiliser les nouveaux tableaux globaux,
introduits en PHP 4.1.0. Pour plus d'informations sur ces modifications : 
<ul>
 <li><a href="/manual/en/language.variables.predefined.php">PHP Manual : Predefined variables</a></li>
 <li><a href="/release_4_1_0.php">Annonce de PHP 4.1.0</a></li>
 <li><a href="http://www.zend.com/zend/art/art-oertli.php">Article de Thomas Oertli sur la programmation s&eacute;curis&eacute;e en PHP</a></li>
 <li><a href="http://www.phpinfo.net/?p=articles&rub=globals">Article de Jean Pierre D&eacute;zelus sur les variables globales</a></li>
</ul>
</p>

<h2>Compatibilit&eacute;</h2>

<p>
L'ASF (Apache Software Foundation) a r&eacute;cemment publi&eacute; sa premi&egrave;re
version publique d'Apache 2. PHP 4.2.0 dispose du support
 <b>EXPERIMENTAL</b> d'Apache 2. Vous pouvez compiler un module
 DSO pour Apache 2 avec l'option --with-apxs2. Nous recommandons
 de <b>ne pas</b> utiliser cette combinaison en environnement de
 production.
</p>
<p>Il manque encore &agrave; PHP 4.2.0 des fonctionnalit&eacute;s cl&eacute;s
sur MacOSX et sur Darwin. PHP n'est donc pas officiellement
support&eacute; par le PHP group sur ces plate-formes. Sp&eacute;cifiquement,
compiler PHP comme module Apache dynamiquement charg&eacute; n'est pas
encore support&eacute;. PHP 4.3.0, dont la publication est pr&eacute;vue pour
Ao&ucirc;t 2002, sera la premi&egrave;re version qui supportera officiellement 
Mac OS X. Cette version, aussi bien pour les futures versions de
 Mac OS X et Apache, sera totalement synchronis&eacute; avec les autres
 plate-formes PHP.</p>

<h2>Am&eacute;liorations</h2>
<p>PHP 4.2.0 inclut de nombreuses innovations : </p>
<ul>
 <li><b>Les variables externes (issues de l'environnement d'ex&eacute;cution,
des requ&ecirc;tes HTTP, des cookies ou du serveur web) ne sont plus enregistr&eacute;es
dans l'environnement d'ex&eacute;cution global par d&eacute;faut.
</b></li>
 <li>Remise en &eacute;tat g&eacute;n&eacute;rale de l'extension socket</li>
 <li>Performances r&eacute;volutionnaires des uploads de fichiers</li>
 <li>Les extensions satellite (corba) et mailparse ont &eacute;t&eacute; plac&eacute;es sous PECL,
 et ne sont plus fournies directement avec la distribution officielle de PHP.</li>
 <li>L'extension POSIX a &eacute;t&eacute; nettoy&eacute;e</li>
 <li>L'extension iconv a &eacute;t&eacute; am&eacute;lior&eacute;e</li>
 <li>Le support de la bufferisation d'affichage, introduite en PHP 4.1.0,
 a &eacute;t&eacute; stabilis&eacute;e.</li>
 <li>Gain de performance notable et am&eacute;lioration de la stabilit&eacute; de l'extension domxml</li>
 <li>Support des expressions r&eacute;guli&egrave;res multi-octets</li>
 <li><b>ENORMÉMENT</b> de corrections, et de nouvelles fonctions.</li>
</ul>

<p>
Pour une liste compl&egrave;te de changements en PHP 4.2.0, voyez le fichier
<a href="/ChangeLog-4.php">NEWS</a>, dans la distribution.
</p>

<?php commonFooter(); ?>
