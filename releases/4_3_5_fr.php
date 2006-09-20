<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_5.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.3.5");
?>

<h1>Annonce de publication de PHP 4.3.5</h1>

<p>[ <a href="/releases/4_3_5.php">English Version</a> ]</p>

<p>
L'&eacute;quipe de d&eacute;veloppement PHP a le plaisir de vous annoncer 
la publication de <a href="/downloads.php">PHP 4.3.5</a>. C'est une version 
de maintenance, destin&eacute;e &agrave; corriger des erreurs, et sans aucun 
ajout de fonctionnalit&eacute;. PHP 4.3.5 est, de loin, la version de PHP 
la plus stable, et il est recommand&eacute; &agrave; tous les utilisateurs 
d'adopter cette version d&egrave;s que possible.
</p>

<h2>Version de correction de bogues</h2>

<p>
 PHP 4.3.5 contient notamment les corrections, ajouts et am&eacute;liorations suivantes : 
</p>

<ul>
<li>Correction d'une fuite m&eacute;moire li&eacute;e au fichier INI, sur les h&ocirc;tes virtuels Apache.</li>
<li>Correction de crashs avec fgetcsv(). La fonction est d&eacute;sormais compatible avec les donn&eacute;es binaires.</li>
<li>Correction de la compilation avec les premi&egrave;res versions de GCC 3.0.</li>
<li>Am&eacute;lioration de l'algorithme d'analyse de la fonction get_browser().</li>
<li>Correction de open_basedir sur Win32.</li>
<li>Correction de messages erron&eacute;s pour les dossiers inexistants, en mode safe_mode.</li>
<li>Ajout des DLL OpenSSL sur Win32, en version 0.9.7c.</li>
<li>Mise &agrave; jour de la biblioth&egrave;que PostgreSQL en version 7.4 dans la distribution Windows.</li>
<li>Mise &agrave; jour de la biblioth&egrave;que PCRE en version 4.5.</li>
<li>Mise &agrave; jour de la biblioth&egrave;que GD en version 2.0.17.</li>
<li>Corrections de bogues sur les syst&egrave;mes 64 bits.</li>
<li>En plus de ces corrections, cette version inclut 140 corrections de bogues et probl&egrave;mes divers.</li>
</ul>

<p>
 Pour une liste exhaustive des modifications de PHP 4.3.5, voyez
 <a href="/ChangeLog-4.php#4.3.5">le changelog</a>, en anglais.
</p>

<?php site_footer(); ?>
