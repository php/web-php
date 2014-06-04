<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_1_0_fr.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Annonce de publication de PHP 4.1.0", array("lang" => "fr"));
?>

<h1>Annonce de publication de PHP 4.1.0</h1>

<p>
 Apr&egrave;s un long processus "QA", PHP 4.1.0 <a href="/downloads.php">est enfin sorti</a>!<br>
 [ <a href="/releases/4_1_0.php">English Version</a> ]
</p>

<p>
 PHP 4.1.0 inclut beaucoup d'am&eacute;liorations importantes:
</p>
<ul>
 <li>Une nouvelle interface d'entr&eacute;e en g&eacute;n&eacute;ral (voir plus bas)</li>
 <li>Perfomance grandement accrue en g&eacute;n&eacute;ral</li>
 <li>
  Sous Windows une stabilit&eacute; et une performance r&eacute;volutionnaire. Les
  modules serveur multi-thread sous windows (ISAPI, Apache, etc...)
  s'ex&eacute;cute jusqu'&agrave; 30 fois plus rapidement sous la charge! Nous
  voulons remercier Brett Brewer et son &eacute;quipe chez Microsoft pour
  son travail avec nous pour am&eacute;liorer PHP pour Windows.
 </li>
 <li>
  Gestion des versions pour les extensions. A l'heure actuelle, ceci
  est tr&egrave;s peu utilis&eacute;, l'infrastructure &eacute;tait mise en place pour le
  support s&eacute;par&eacute; des num&eacute;ros de versions pour diff&eacute;rentes extensions.
  L'effet de bord n&eacute;gatif est que le faite de charger des extensions
  avec une ancienne version de PHP r&eacute;sultait d'un crash, &agrave; la place
  d'un message correct et claire. Soyez s&ucirc;rs que vous utilisez
  seulement des extensions int&eacute;gr&eacute;es &agrave; PHP 4.1.0.
 </li>
 <li>Support "Turn-Key" de la compression des sorties</li>
 <li><strong>BEAUCOUP</strong> de corrections et de nouvelles fonctions</li>
</ul>

<p>
 Comme certains l'ont not&eacute;, cette version est quelque peu historique,
 comme c'est la premi&egrave;re fois dans l'histoire que nous incr&eacute;mentons
 le num&eacute;ro du milieu !
 Les deux principales raisons &agrave; cela sont d'un c&ocirc;t&eacute; les changements sans
 pr&eacute;c&eacute;dent de la nouvelle interface d'entr&eacute;e, et de l'autre l'incompatibilit&eacute;
 des modules dus au support des versions.
</p>

<p>
 Ce qui suit concerne une description du nouveau m&eacute;canisme d'entr&eacute;e.
 Pour une liste compl&egrave;te des changements voir le
 <a href="/ChangeLog-4.php#4.1.0">ChangeLog</a>.
</p>

<hr>

<h2>SECURITE: NOUVEAU MECANISME D'ENTREE</h2>

<p>
 Avant tout, il est important de signaler que, sans tenir compte de ce
 que vous pourriez lire dans les lignes qui suivent, PHP 4.1.0 <strong>g&egrave;re
 encore</strong> les anciens m&eacute;canismes d'entr&eacute;e des anciennes versions.
 D'anciennes applications devraient bien fonctionner sans modifications !
</p>

<p>Passsons &agrave; la suite mainenant que cela est dit :)</p>

<p>
 Pour diff&eacute;rentes raisons, PHP qui se repose sur register_globals ON
 (ex. sur les formulaires, les variables serveur et d'environnement
 deviennent partie de la port&eacute;e globale d'un script [namespace], et
 ce automatiquement) sont tr&egrave;s souvent exploitable &agrave; des degr&eacute;s
 divers. Par exemple le code suivant:
</p>

<?php highlight_php('<?php
if (authenticate_user()) {
  $authenticated = true;
}
...
?>');?>

<p>
 Peut &ecirc;tre exploitable de la mani&egrave;re suivante, des utilisateurs
 distants peuvent simplement passer 'authenticated' comme variable
 d'un formulaire et m&ecirc;me si authenticate_user() retourne false,
 $authentiticated va actuellement contenir true. Ce"la semble etre un 
 exemple tr&egrave;s simple, mais en r&eacute;alit&eacute;, bien des applications PHP
 sont exploitable par ce dysfonctionnement.
</p>

<p>
 Tandis qu'il est parfaitement possible d'&eacute;crire du code PHP
 s&eacute;curis&eacute;, nous sentions que le fait que PHP permette, de mani&egrave;re beaucoup
 trop facile, d'&eacute;crire du code PHP non s&eacute;curis&eacute; n'&eacute;tait pas
 acceptable, et nous avons d&eacute;cid&eacute; de tenter un changement tr&egrave;s grand
 et de rendre caduque register_globals.
 Evidemment, &agrave; cause de la grande majorit&eacute; de code PHP dans le monde se
 reposant sur l'existence de cette fonctionnalit&eacute;, nous ne la supprimerons
 jamais, mais nous avons d&eacute;cid&eacute;s d'encourager les utilisateurs de ne plus
 l'utiliser &agrave; chaque fois que cela est possible.
</p>

<p>
 Afin d'aider les utilisateurs &agrave; construire des applications PHP avec
 register_globals &agrave; Off, nous avons ajout&eacute; quelques nouvelles
 variables sp&eacute;ciales, variables qui peuvent &ecirc;tre utilis&eacute;es &agrave; la place
 des anciennes variables globales. Il y a 7 nouveaux tableaux sp&eacute;ciaux:
</p>

<ul>
 <li>$_GET - contient les variables pass&eacute;es par la m&eacute;thode GET</li>
 <li>$_POST - contient les variables pass&eacute;es par la m&eacute;thode POST</li>
 <li>$_COOKIE - contient les variables HTTP cookie</li>
 <li>$_SERVER - contient les variables serveur (par ex. REMOTE_ADDR)</li>
 <li>$_ENV - contient les variables d'environnement</li>
 <li>
  $_REQUEST - Une fusion des variables GET. POST, COOKIE. En d'autres
  termes toutes les informations qui arrivent de l'utilisateur,
  et qui d'un point de vue purement s&eacute;curitaire, ne sont pas s&ucirc;res
 </li>
 <li>
  $_SESSION - contient toutes les variables HTTP enregistr&eacute;es par le
  module des sessions
 </li>
</ul>

<p>
 Maintenant, entre autre le fait que ces variables contiennent ces
 informations sp&eacute;ciales, elles sont aussi automatiquement globales
 dans toutes les port&eacute;es. Cela signifie que vous pouvez y acc&eacute;der
 de n'importe o&ugrave;, sans avoir &agrave; les d&eacute;clarer en globales. Par exemple:
</p>

<?php highlight_php('<?php
function example1()
{
    print $_GET["name"];   // fonctionne, pas besoin de \'global $_GET;\' !
}
?>');?>

<p>
 va fonctionner tr&egrave;s bien! Nous esp&eacute;rons que cela va faciliter la t&acirc;che
 durant la migration de vieux code vers le nouveau, et nous sommes s&ucirc;rs
 que cela vous simplifiera l'&eacute;criture de nouveaux codes.
 Une autre astuce est que le fait de cr&eacute;er de nouvelles entr&eacute;es dans
 $_SESSION va automatiquement les enregistrer comme variables de session, 
 comme si vous auriez appel&eacute; session_register(). Cette astuce est limit&eacute;e
 uniquement au module de gestion de session - par exemple, cr&eacute;er de
 nouvelles entr&eacute;s dans $_ENV ne va <strong>pas</strong> ex&eacute;cuter un put_env()
 implicite.
</p>

<p>
 PHP 4.1.0 doit toujours avoir register_globals mis a On par d&eacute;faut.
 C'est une version de transition, et nous encourageons les auteurs
 d'applications, sp&eacute;cialement les applications publiques qui sont utilis&eacute;es
 par une large audience, de changer leurs applications pour fonctionner
 avec un environnement o&ugrave; register_globals est &agrave; Off. Il est clair
 qu'ils devraient profiter des nouvelles fonctionnalit&eacute;s fournies
 avec PHP 4.1.0 qui font que cette transition est plus ais&eacute;e.
</p>
 
<p>
 Dans la prochaine version "semi majeure" de PHP, de nouvelles installations
 de PHP devrait avoir register_globals mis &agrave; Off par d&eacute;faut. Ne vous en
 faites pas! Les installations existantes, qui ont d&eacute;j&agrave; un fichier php.ini
 qui a register_globals &agrave; On, ne vont pas &ecirc;tre affect&eacute;es. Cela vous
 affectera seulement si vous installez PHP sur une nouvelle machine
 (typiquement si vous &ecirc;tes un nouvel utilisateur), et si vous le d&eacute;sirez
 vous pourrez toujours le mettre &agrave; On.
</p>

<p>
 Note: Certains de ces tableaux ont d'anciens noms, exemple : $HTTP_GET_VARS.
 Ces noms fonctionnent toujours, mais nous encourageons les utilisateurs
 de migrer vers le nouveaux noms, plus courts et qui sont des versions 
 automatiquement globales.
</p>

<p>
 Les remerciements vont &agrave; Shaun Clowes (shaun at securereality dot com dot au)
 pour avoir r&eacute;v&eacute;l&eacute; ce probl&egrave;me et avoir aid&eacute;
 &agrave; l'analyser.
</p>

<p>
 French translation is available courtesy of Pierre-Alain Joye
 (pierre-alain dot joye at wanadoo dot fr).
</p>

<?php site_footer(); ?>
