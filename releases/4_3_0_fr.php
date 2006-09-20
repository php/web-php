<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_0_fr.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.3.0", array("lang" => "fr"));
?>

<h1>Annonce de publication de PHP 4.3.0</h1>

<p>[ <a href="/releases/4_3_0.php">English version</a> ]</p>

<p>
 Apr&egrave;s un long et difficile 8 mois de d&eacute;veloppement et de
 test, PHP 4.3.0 est <a href="/downloads.php">publi&eacute;</a>! Au vue
 des &eacute;volutions, du temps consacr&eacute; et des efforts
 consentis, cette version est la plus importante version de la
 s&eacute;rie des PHP 4.x. Elle contribue largement a am&eacute;liorer
 les capacit&eacute;s de PHP en tant que langage
 g&eacute;n&eacute;raliste de scripts.
</p>

<h2>Utilisation en ligne de commande</h2>

<p>
 PHP 4.3.0 ach&egrave;ve la s&eacute;paration du mode d'utilisation en
 ligne de commande (dit CLI) qui permet de d&eacute;velopper des
 applications shell ou graphiques (avec <a href="http://gtk.php.net/">PHP-GTK</a>).
 La version CLI de PHP est toujours compil&eacute;es, mais elle n'est
 install&eacute;e que si la version CGI est d&eacute;sactiv&eacute;e
 avec l'option --disable-cgi. De plus, vous pouvez utilisez la commande 
 <strong>make install-cli</strong>. Sous Windows, la version CLI est
 disponible dans le dossier <strong>cli</strong>.
</p>

<p>
 CLI dispose de fonctionnalit&eacute;s diff&eacute;rentes, par rappot
 &agrave; la version interfac&eacute;e avec les serveurs web. Pour
 plus de d&eacute;tails, reportez vous &agrave; 
 <a href="/features.commandline">Utiliser PHP en ligne de commande</a>
</p>

<h2>Fl&ocirc;ts (Streams)</h2>

<p>
 Une nouveaut&eacute; tr&egrave;s importante, mais cach&eacute;e a &eacute;t&eacute;
 introduite : les fl&ocirc;ts. Les fl&ocirc;ts unifient la gestion des pipes,
 fichiers, sockets et autres ressources d'entr&eacute;es/sorties du coeur de
 PHP et de ses extensions.
</p>
<p>
 Cela signifie, pour les utilisateurs, est que les fonctions d'entr&eacute;es/sorties
 fonctionnent d&eacute;sormais avec les fl&ocirc;ts (c'est &agrave; dire presque
 toutes), peuvent utiliser des protocoles internes tels que HTTP/HTTPS et FTP/FTPS,
 ainsi que des protocoles personnalis&eacute;s, enregistr&eacute;s comme tels depuis
 les scripts PHP. Pour plus d'informations, voyez:
 <a href="/wrappers">Liste des protocoles support&eacute;s</a>
</p>

<h2>Nouveaus syst&egrave;me de compilation</h2>

<p>
 Cette version du syst&egrave;me de compilation de PHP, entre autre choses, remplace
 la version r&eacute;cursive lente par un Makefile global, et facilite
 l'int&eacute;gration des librairies connexes. Automake est uniquement
 n&eacute;cessaire pour l'utilitaire aclocal. Le processus de compilation est rendu
 plus portable, et moins consommateur de ressources.
</p>

<h2>Am&eacute;liorations</h2>

<p>PHP 4.3.0 propose de nombreuses am&eacute;liorations et &eacute;volutions :</p>

<ul>
 <li>
  <strong>
   La librairie GD est d&eacute;sormais distribu&eacute; avec PHP, et il est
   recommand&eacute; d'utiliser cette version
  </strong>
 </li>
 <li>
  Les extensions vpopmail et cybermut ont &eacute;t&eacute;
  d&eacute;plac&eacute;es vers PECL
 </li>
 <li>
  Plusieurs extensions obsol&egrave;tes ont &eacute;t&eacute;
  supprim&eacute;es (aspell, ccvs, cybercash, icap) et (fastcgi,
  fhttpd)
 </li>
 <li>
  Acc&eacute;l&eacute;ration des fonctions de traitement des 
  channes de caract&egrave;res
 </li>
 <li>
  Am&eacute;lioration des filtres Apache2 mais le support d'Apache 2 est
  toujours consid&eacute;r&eacute; comme exp&eacute;rimental (utilisez PHP
  avec le mode prefork et non le mode worker (thread), car de nombreuses
  extensions bas&eacute;es sur des librairies externes ne sont pas encore
  compatibles avec les threads)
 </li>
 <li>
  Plusieurs corrections de s&eacute;curit&eacute; (imap, mysql, mcrypt,
  t&eacute;l&eacute;chargement de fichiers, gd, etc...)
 </li>
 <li>
  Nouvelle interface SAPI pour inclure PHP dans d'autres applications
  (exp&eacute;rimental)
 </li>
 <li>suite de test nettement am&eacute;lior&eacute;e et compl&eacute;t&eacute;e</li>
 <li>am&eacute;liorations du support de dba, gd, pcntl, sybase et xslt</li>
 <li>debug_backtrace() aide nettement pour le d&eacute;bogage</li>
 <li>
  les messages d'erreur contiennent des URL faisant r&eacute;f&eacute;rence aux
  pages du manuel d&eacute;crivant ces erreurs, ou bien aux fonctions
  utilis&eacute;es
 </li>
 <li>
  Le Zend Engine a regu des corrections et des am&eacute;liorations de
  performances mineures
 </li>
 <li>
  et des <strong>tonnes</strong> de corrections, am&eacute;liorations et
  nouvelles fonctions, dors et d&eacute;j&agrave; document&eacute;es et
  traduites, etc...
 </li>
</ul>

<p>
 Pour la liste compl&egrave;te des modifications de PHP 4.3.0, voyez le fichier
 d'<a href="/ChangeLog-4.php#4.3.0">historique</a>.
</p>

<?php site_footer(); ?>
