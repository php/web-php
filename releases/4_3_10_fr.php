<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_10.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.10 Release Announcement");
?>

<h1>Annonce de publication de PHP 4.3.10</h1>
<p>[ <a href="/releases/4_3_10.php">English Version</a> ]</p>
<p>
L'&eacute;quipe de d&eacute;veloppement PHP a le plaisir de vous annoncer 
la publication de <a href="/downloads.php">PHP 4.3.10</a>. C'est une version 
de maintenance, destin&eacute;e &agrave; corriger une trentaine de bogues 
non-critiques et ainsi que plusieurs problèmes de sécurité sérieux.
</p>
<p>
Cela inclut notamment: 
</p>
<p>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1018">CAN-2004-1018</a> - shmop_write() écrit hors des limites de la mémoire.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1018">CAN-2004-1018</a> - dépassement de capacité avec pack() et unpack().<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1019">CAN-2004-1019</a> - publication possible d'informations, dépassement de capacité dans les index négatif lors de délinéarisation de données.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1020">CAN-2004-1020</a> - addslashes() ne protège pas correctement \0.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1063">CAN-2004-1063</a> - contournement de la directive de dossier d'exécution.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1064">CAN-2004-1064</a> - accès arbitraire à un fichier via une troncature.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1065">CAN-2004-1065</a> - dépassement de capacité avec exif_read_data()  sur un long nom de section.<br>
magic_quotes_gpc peut mener à la lecture d'un dossier via le téléchargement de fichiers.
</p>
<p>Tous les utilisateurs sont encouragés à utiliser cette version.</p> 

<h2>Version de correction de bogues</h2>

<p>
En plus des fonctionnalités ci-dessus, PHP 4.3.9 contient notamment les corrections, ajouts et am&eacute;liorations suivantes : 
</p>

<ul>
<li> Crash possible dans ftp_get().</li>
<li> get_current_user() crashe sur Windows.</li>
<li> Crash possible avec ctype_digit() pour les grands nombres.</li>
<li> Crash lors de l'analyse de <i>?getvariable[][</i>.</li>
<li> Crash possible avec curl_getinfo().</li>
<li> Double désallocation lorsque openssl_csr_new() échoue.</li>
<li> Crash lors de l'utilisation d'un session.save_handler et/ou session.serialize_handler non supporté.</li>
<li> Evite les récursions infinies lors des redirections URL.</li>
<li> S'assure que les fichiers temporaires de GD sont bien supprimés.</li>
<li> Crash avec fgetcsv() et une taille négative.</li>
<li> Performances améliorés pour foreach().</li>
<li> Amélioration du support des configurations locales non-anglaises.</li>
</ul>

<p>
 Pour une liste exhaustive des modifications de PHP 4.3.10, voyez
 <a href="/ChangeLog-4.php#4.3.10">le ChangeLog</a>, en anglais.
 </p>

<?php site_footer(); ?>
