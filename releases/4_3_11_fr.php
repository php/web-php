<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_10.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de PHP 4.3.11");
?>

<h1>Annonce de publication de PHP 4.3.11</h1>
<p>[ <a href="/releases/4_3_11.php">English Version</a> ]</p>
<p>
L'&eacute;quipe de d&eacute;veloppement PHP a le plaisir de vous annoncer la publication de <a href="/downloads.php">PHP 4.3.11</a>. C'est une version de maintenance, destin&eacute;e &agrave; corriger environ 70 bogues non-critiques, plusieurs problèmes avec les extensions exif et fbsql ainsi que les fonctions unserialize(), swf_definepoly() et getimagesize().
</p>
<p>
Tous les utilisateurs sont encouragés à utiliser cette version.
</p> 

<h2>Version de correction de bogues</h2>
<ul>
<li> Crash avec la fonction bzopen() si le chemin fourni conduit à un fichier inexistant.</li>
<li> Crash de DOM lorsqu'un attribut est ajouté à un objet Document.</li>
<li> Problème d'unserialize() avec les nombres décimaux pour les configurations non-anglaises.</li>
<li> Crash avec msg_send() lorsqu'une variable autre qu'une chaîne est envoyée sans linéarisation.</li>
<li> Boucle infinie potentielle dans imap_mail_compose().</li>
<li> Crash dans chunk_split(), lorsque chunklen est supérieur à la taille de la ligne.</li>
<li> session_set_save_handler fait crasher PHP lorsqu'elle reçoit une référence inexistante sur un objet.</li>
<li> Fuite de mémoire dans zend_language_scanner.c.</li>
<li> Problèmes de compilation dans zend_strtod.c.</li>
<li> Crash dans un objet surchargé avec la fonction overload().</li>
<li> Les fonctions cURL outrepassaient open_basedir.</li>
</ul>

<p>
 Pour une liste exhaustive des modifications de PHP 4.3.11, voyez
 <a href="/ChangeLog-4.php#4.3.11">le ChangeLog</a>, en anglais.
 </p>

<?php site_footer(); ?>
