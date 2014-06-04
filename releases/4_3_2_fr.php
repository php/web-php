<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_2_fr.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.3.2", array("lang" => "fr"));
?>

<h1>Annonce de publication de PHP 4.3.2</h1>

<p>[ <a href="/releases/4_3_2.php">English version</a> ]</p>

<p>
 Apr&egrave;s une longue &eacute;tape de tests d'assurance Qualit&eacute;,
 <a href="/downloads.php">PHP 4.3.2</a> est finalement disponible!<br>
 Cette version de maintenance r&eacute;sout un grand nombre de bugs trouv&eacute;s dans
 des versions plus anciennes de PHP, et il est <strong>recommand&eacute;</strong> 
 de faire la mise &agrave; jour pour tous les utilisateurs PHP.
</p>

<h2>Version mineure, corrections de bugs</h2>

<p>
 PHP 4.3.2 contient notamment les corrections, ajouts et am&eacute;liorations suivantes :
</p>
 
<ul>
 <li>
  Correction de plusieurs probl&egrave;mes dangereux de d&eacute;passement de
  capacit&eacute; avec les entiers.
 </li>
 <li>Correction de plusieurs probl&egrave;mes li&eacute;s aux plate-formes 64-bits.</li>
 <li>
  Nouveau module SAPI Apache 2.0 (sapi/apache2handler, activ&eacute;
  avec l'option --with-apxs2).
 </li>
 <li>
  Nouvelle fonction session_regenerate_id(). (Fonctionnalit&eacute;
  importante pour contrer les usurpations de sessions).
 </li>
 <li>Am&eacute;liorations de l'extension dba.</li>
 <li>Am&eacute;lioration du module thttpd SAPI.</li>
 <li>Abandon de GDLIB version 1.x.x (php_gd.dll) sous Windows.</li>
 <li>Le manuel man sous Unix pour la version CLI de PHP.</li>
 <li>
  Nouvelle option "disable_classes" pour permettre aux administrateurs
  de d&eacute;sactiver certaines classes pour des raisons de
  s&eacute;curit&eacute;.
 </li>
</ul>

<p> 
 Pour une liste compl&egrave;te des modifications de PHP 4.3.2, reportez-vous au fichier
 <a href="/ChangeLog-4.php#4.3.2">ChangeLog</a>.
</p>

<?php site_footer(); ?>
