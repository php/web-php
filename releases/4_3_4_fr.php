<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_4.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.3.4", array("lang" => "fr"));
?>

<h1>Annonce de publication de PHP 4.3.4</h1>

<p>[ <a href="/releases/4_3_4.php">English version</a> ]</p>

<p>
 Apr&egrave;s un long processus d'assurance qualit&eacute;, 
 <a href="/downloads.php">PHP 4.3.4</a> est d&eacute;sormais disponible!<br>
 C'est une version mineure d'entretien, avec de nombreuses corrections de bogues.
 Tous les utilisateurs sont invit&eacute;s &agrave; passer &agrave; cette nouvelle version.
</p>

<h2>Version de correction de bogues</h2>

<p>
 PHP 4.3.4 contient notamment les corrections, ajouts et 
 am&eacute;liorations suivantes : 
</p>

<ul>
 <li>Correction des fonctions disk_total_space() et disk_free_space() sous FreeBSD.</li>
 <li>Correction du support FastCGI pour Win32</li>
 <li>Correction de FastCGI qui ne pouvait pas utiliser certaines IP sp&eacute;cifiques.</li>
 <li>Correction de nombreux bogues de la fonction mail() sous Windows.</li>
 <li>Corrections de divers crash pour de nombreuses fonctions.</li>
 <li>Correction de probl&egrave;mes de compilation pour MacOSX 10.3 Panther.</li>

 <li>Plus de 60 corrections!</li>
</ul>

<p>
 Pour la liste exhaustive des modifications de PHP 4.3.4, voyez
 <a href="/ChangeLog-4.php#4.3.4">le changelog</a>, en anglais.
</p>

<?php site_footer(); ?>
