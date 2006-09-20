<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_2_2_fr.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.2.2", array("lang" => "fr"));
?>

<h1>
Alerte de s&eacute;curit&eacute; PHP : Vuln&eacute;rabilit&eacute; dans
les versions 4.2.0 et 4.2.1 de PHP
</h1>

<p>[ <a href="/releases/4_2_2.php">English Version</a> ]</p>

<dl>
 <dt>Date:</dt>
 <dd>22 Juillet 2002</dd>
 <dt>Logiciel:</dt>
 <dd>PHP versions 4.2.0 et 4.2.1</dd>
 <dt>Plates-formes:</dt>
 <dd>Toutes</dd>
</dl>

<p>
 Le PHP Group a pris connaissance d'un trou de s&eacute;curit&eacute; s&eacute;rieux en PHP
 version 4.2.0 et 4.2.1. Un intrus pourrait ex&eacute;cuter un code arbitraire sur
 le serveur, avec les m&ecirc;mes privil&egrave;ges que celui qui ex&eacute;cute le serveur web.
 Cette vuln&eacute;rabilit&eacute; peut &ecirc;tre exploit&eacute;e pour compromettre le serveur web,
 et dans certaines circonstances, obtenir des droits sp&eacute;ciaux.
</p>

<h2>Description</h2>

<p>
 PHP contient du code qui analyse finement les ent&ecirc;tes des requ&ecirc;tes
 HTTP POST. Le code est utilis&eacute; pour diff&eacute;rencier les variables des
 fichiers qui sont envoy&eacute;s par le navigateur, avec l'encodage
 "multipart/form-data". Cet analyseur ne v&eacute;rifie pas suffisamment
 les donn&eacute;es d'entr&eacute;e, ce qui conduit &agrave; une
 vuln&eacute;rabilit&eacute;.
</p>
   
<p>
 La vuln&eacute;rabilit&eacute; est exploitable par quiconque peut envoyer des requ&ecirc;tes
 HTTP POST &agrave; un serveur web utilisant PHP versions 4.2.0 et 4.2.1. Des
 utilisateurs, locaux ou distants, m&ecirc;me derri&egrave;re un pare-feu, pourraient
 obtenir des autorisations indues sur la machine.
</p>

<h2>Impact</h2>

<p>
 Les utilisateurs, tant locaux que distants, peuvent exploiter cette
 vuln&eacute;rabilit&eacute; pour compromettre le serveur web, et, dans certaines circonstances,
 obtenir des autorisations indues. Jusqu'&agrave; pr&eacute;sent, seule la plate-forme
 IA32 a pu passer les tests de s&eacute;curit&eacute;. Cette vuln&eacute;rabilit&eacute; peut &ecirc;tre utilis&eacute;e
 sous IA32 pour crasher PHP et, dans la plupart des cas, le serveur web.
</p>

<h2>Solution</h2>

<p>
 Le PHP Group a publi&eacute; une nouvelle version PHP version, 4.2.2, qui inclus
 une correction pour cette vuln&eacute;rabilit&eacute;. Tous les utilisateurs des versions de PHP
 affect&eacute;es sont encourag&eacute;s &agrave; passer &agrave; cette nouvelle version. L'URL de
 t&eacute;l&eacute;chargement est :
 <a href="http://www.php.net/downloads.php">http://www.php.net/downloads.php</a>
 sous forme de sources (tarballs), ex&eacute;cutable Windows et source patches
 pour les versions 4.2.0 et 4.2.1.
</p>

<h2>Autre solution</h2>

<p>
 Si les applications PHP n'utilisent pas la m&eacute;thode POST sur un serveur
 affect&eacute;, il est possible de simplement interdire les requ&ecirc;tes POST sur le
 serveur.
</p>
   
<p>
 Sous Apache, par exemple, il est possible d'utiliser le code suivant
 dans le fichier de configuration principal, ou avec un fichier .htaccess
 plac&eacute; suffisamment pr&egrave;s de la racine :
</p>

<pre>   
&lt;Limit POST&gt;
   Order deny,allow
   Deny from all
&lt;/Limit&gt;
</pre>
      
<p>    
 Notez qu'une autre configuration ou/et un autre fichier .htaccess avec
 certains param&egrave;tres, peuvent annuler l'effet de l'exemple ci-dessus.
</p>

<h2>Cr&eacute;dits</h2>

<p>
 Le PHP Group remercie Stefan Esser de e-matters GmbH pour la d&eacute;couverte
 de cette vuln&eacute;rabilit&eacute;.
</p>
   
<?php site_footer(); ?>
