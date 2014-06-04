<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.3.3");
?>

<h1>Annonce de publication de PHP 4.3.3</h1>

<p>[ <a href="/releases/4_3_3.php">English version</a> ]</p>

<p>
Apr&egrave;s avoir suivi un long processus qualit&eacute;, <a href="/downloads.php">PHP 4.3.3</a> est disponible!<br>
Cette version de maintenance r&eacute;sout un bon nombre de bugs d&eacute;couverts
dans des versions ant&eacute;rieures de PHP. Elle corrige aussi plusieurs
probl&egrave;mes de s&eacute;curit&eacute;. Il est <strong>vivement recommand&eacute;</strong> &agrave; tous les
utilisateurs d'utiliser cette version aussit&ocirc;t que possible.
</p>

<h2>Corrections et nouveaut&eacute;s</h2>

<p>
PHP 4.3.3 contient la liste suivante et non exhaustive de corrections,
am&eacute;liorations et ajouts :
</p>

<ul>
<li>Am&eacute;lioration du moteur pour utiliser les entr&eacute;es/sorties Posix et socket lorsque c'est possible.</li>
<li>Corrections de plusieurs probl&egrave;mes de d&eacute;passement de capacit&eacute; avec les entiers et buffers.</li>
<li>Correction des jeux de caract&egrave;res multi-octets qui incluent le caract&egrave;re 0x5c en tant que second octet des formulaires multipart/form-data.</li>
<li>each() est d&eacute;sormais compatible avec les cl&eacute;s binaires.</li>
<li>Am&eacute;liorations importantes de NSAPI SAPI.</li>
<li>Am&eacute;lioration de l'interface IMAP.</li>
<li>Am&eacute;lioration de l'interface Interbase.</li>
<li>Ajout d'un gestionnaire DBA 'infile' pour supporter les fichiers .ini.</li>
<li>Ajout des options longues pour les versions CLI & CGI (i.e. --version).</li>
<li>Ajout de nouveaux param&egrave;tres &agrave; preg_match*() pour indiquer l'offset de d&eacute;part dans la recherche de la cha&icirc;ne.</li>
<li>La librairie Expat distribu&eacute;e passe en version 1.95.6</li>
<li>La librairie PCRE distribu&eacute;e passe en version 4.3</li>
<li>La librairie GD distribu&eacute;e passe en version 2.0.15</li>
<li>Plus de 100 corrections de bugs divers.</li>
</ul>

<p>
 Pour une liste exhaustive des modifications de PHP 4.3.3, voyez
 <a href="/ChangeLog-4.php#4.3.3">le changelog</a>, en anglais.
</p>

<?php site_footer(); ?>


