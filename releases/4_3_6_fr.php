<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_6.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.3.6");
?>


<h1>Annonce de publication de PHP 4.3.6</h1>

<p>[ <a href="/releases/4_3_6.php">English Version</a> ]</p>

<p>
L'&eacute;quipe de d&eacute;veloppement PHP a le plaisir de vous annoncer 
la publication de <a href="/downloads.php">PHP 4.3.6</a>. C'est une version 
de maintenance, destin&eacute;e &agrave; corriger deux bogues qui
peuvent conduire &agrave; des crashs de PHP si la s&eacute;curit&eacute; threads est activ&eacute;e.
Il est recommand&eacute; &agrave; tous les utilisateurs d'adopter cette 
version d&egrave;s que possible.
</p>

<h2>Version de correction de bogues</h2>

<p>
 PHP 4.3.6 contient notamment les corrections, ajouts et am&eacute;liorations suivantes : 
</p>

<ul>
 <li>Mise &agrave; jour de la biblioth&egrave;que PDFLib en version 5.0.3p1 pour les versions Windows.</li>
 <li>Mise &agrave; jour de la biblioth&egrave;que GD 2.0.22.</li>
 <li>Correction d'un bogue qui emp&ecirc;chait la compilation de l'extension GD avec les versions 1.2-1.8 de la librairie externe GD.</li>
 <li>Correction d'un bogue avec les sessions : les configurations ne se propageaient pas entre les requ&ecirc;tes.</li>
 <li>Correction de plusieurs bogues li&eacute;s au changement d'heure d'hiver et d'&eacute;t&eacute; dans les fonctions mktime et strtotime.</li>
 <li>Correction d'un bogue qui emp&ecirc;chait la compilation de l'extension cURL avec libcurl 7.11.1</li>
 <li>Correction de plusieurs crashs avec les extensions domxml et mssql.</li>

 <li>Cette version corrige environ 25 bogues qui ont &eacute;t&eacute; d&eacute;couverts depuis
 la version 4.3.5.</li>
</ul>

<p>
 Pour une liste exhaustive des modifications de PHP 4.3.6, voyez
 <a href="/ChangeLog-4.php#4.3.6">le changelog</a>, en anglais.
 </p>

<?php site_footer(); ?>
