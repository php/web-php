<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_2_0_fr.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.2.0", array("lang" => "fr"));
?>

<h1>Annonce de publication de PHP 4.2.0</h1>

<p>[ <a href="/releases/4_2_1.php">English Version</a> ]</p>

<p>
 Apr&egrave;s avoir pass&eacute; avec succ&egrave;s le processus
 qualit&eacute;, PHP 4.2.0 est officiellement <a href="/downloads.php">publi&eacute;</a>!
</p>

<h2>Variables externes</h2>

<p>
 Le changement le plus important de PHP 4.2.0 concerne la gestion des
 variables. Les <strong>variables externes (issues de l'environnement d'ex&eacute;cution,
 des requ&ecirc;tes HTTP, des cookies ou du serveur web) ne sont plus enregistr&eacute;es
 dans l'environnement d'ex&eacute;cution global par d&eacute;faut.</strong>
 La m&eacute;thode recommand&eacute;e pour acc&eacute;der aux variables
 externes est d'utiliser les nouveaux tableaux globaux, introduits en
 PHP 4.1.0. Pour plus d'informations sur ces modifications:
</p>
<ul>
 <li><a href="/variables.predefined">PHP Manual : Predefined variables</a></li>
 <li><a href="/releases/4_1_0.php">Annonce de PHP 4.1.0</a></li>
 <li><a href="http://www.zend.com/zend/art/art-oertli.php">Article de Thomas Oertli sur la programmation s&eacute;curis&eacute;e en PHP</a></li>
</ul>

<h2>Compatibilit&eacute;</h2>

<p>
 L'ASF (Apache Software Foundation) a r&eacute;cemment publi&eacute; sa premi&egrave;re
 version publique d'Apache 2. PHP 4.2.0 dispose du support
 <strong>EXPERIMENTAL</strong> d'Apache 2. Vous pouvez compiler un module
 DSO pour Apache 2 avec l'option --with-apxs2. Nous recommandons
 de <strong>ne pas</strong> utiliser cette combinaison en environnement de
 production.
</p>
<p>
 Il manque encore &agrave; PHP 4.2.0 des fonctionnalit&eacute;s cl&eacute;s
 sur MacOSX et sur Darwin. PHP n'est donc pas officiellement
 support&eacute; par le PHP group sur ces plates-formes. Sp&eacute;cifiquement,
 compiler PHP comme module Apache dynamiquement charg&eacute; n'est pas
 encore support&eacute;. PHP 4.3.0, dont la publication est pr&eacute;vue pour
 Ao&ucirc;t 2002, sera la premi&egrave;re version qui supportera officiellement 
 Mac OS X. Cette version, aussi bien pour les futures versions de
 Mac OS X et Apache, sera totalement synchronis&eacute; avec les autres
 plates-formes PHP.
</p>

<h2>Am&eacute;liorations</h2>

<p>PHP 4.2.0 inclut de nombreuses innovations:</p>
<ul>
 <li>
  <strong>Les variables externes (issues de l'environnement
  d'ex&eacute;cution, des requ&ecirc;tes HTTP, des cookies ou du serveur web)
  ne sont plus enregistr&eacute;es dans l'environnement d'ex&eacute;cution
  global par d&eacute;faut.
  </strong>
 </li>
 <li>Remise en &eacute;tat g&eacute;n&eacute;rale de l'extension socket</li>
 <li>Performances r&eacute;volutionnaires des uploads de fichiers</li>
 <li>
  Les extensions satellite (corba) et mailparse ont &eacute;t&eacute; plac&eacute;es sous PECL,
  et ne sont plus fournies directement avec la distribution officielle de PHP.
 </li>
 <li>L'extension POSIX a &eacute;t&eacute; nettoy&eacute;e</li>
 <li>L'extension iconv a &eacute;t&eacute; am&eacute;lior&eacute;e</li>
 <li>
  Le support de la bufferisation d'affichage, introduite en PHP 4.1.0,
  a &eacute;t&eacute; stabilis&eacute;e.
 </li>
 <li>
  Gain de performance notable et am&eacute;lioration de la
  stabilit&eacute; de l'extension domxml
 </li>
 <li>Support des expressions r&eacute;guli&egrave;res multi-octets</li>
 <li><strong>ENORMMENT</strong> de corrections, et de nouvelles fonctions.</li>
</ul>

<p>
 Pour une liste compl&egrave;te de changements en PHP 4.2.0, voyez le fichier
 <a href="/ChangeLog-4.php#4.2.0">NEWS</a>, dans la distribution.
</p>

<?php site_footer(); ?>
