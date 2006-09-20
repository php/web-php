<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_7.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.3.7");
?>

<h1>Annonce de publication de PHP 4.3.7</h1>

<p>[ <a href="/releases/4_3_7.php">English Version</a> ]</p>

<p>
L'&eacute;quipe de d&eacute;veloppement PHP a le plaisir de vous annoncer 
la publication de <a href="/downloads.php">PHP 4.3.7</a>. C'est une version 
de maintenance, destin&eacute;e &agrave; corriger des bogues non-critiques,
corriger une vuln&eacute;rabilit&eacute; de validation dans les fonctions escapeshellcmd() et
escapeshellarg() sur la plate-forme Windows. Les utilisateurs de PHP sont encourag&eacute;s
à changer de version aussit&ocirc;t que possible.
</p>

<h2>Version de correction de bogues</h2>

<p>
 PHP 4.3.7 contient notamment les corrections, ajouts et am&eacute;liorations suivantes : 
</p>

<ul>
 <li>La biblioth&eacute;que GD est maintenant en version 2.0.23.</li>
 <li>Correction d'un bogue qui emp&ecirc;chait la compilation de GD avec FreeType 2.1.0-2.1.2.</li>
 <li>Correction d'un probl&eacute;me de s&eacute;curit&eacute; thread avec l'identifiant de connexion informix.</li>
 <li>Correction de la r&eacute;solution de chemin relatifs avec glob() sous Windows.</li>
 <li>Correction des entit&eacute;s HTML pour les caract&eacute;res grecs.</li>
 <li>Correction d'un bug qui causait un crash avec Apache 2.0.49.</li>
 <li>Correction de nombreux crashs avec PostGreSQL, CPDF et GD.</li>

 <li>Cette version corrige environ 30 bogues qui ont &eacute;t&eacute; d&eacute;couverts depuis
 la version 4.3.6.</li>
</ul>

<p>
 Pour une liste exhaustive des modifications de PHP 4.3.7, voyez
 <a href="/ChangeLog-4.php#4.3.7">le changelog</a>, en anglais.
 </p>

<?php site_footer(); ?>
