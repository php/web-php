<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>What is PHP?</h3>

<p>
<acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
is a server-side, cross-platform, HTML embedded scripting
language. If you are new to PHP and want to get some idea
of how it works, try the ' . make_link("/tut.php", "introductory tutorial") . '.
After that, check out the online ' . make_link("/docs.php", "manual") . ',
and the example archive sites and some of the other resources
available in the ' . make_link("/links.php", "links section") . '.
</p>

<p>
PHP is a project of the ' . 
make_link("http://www.apache.org/","Apache Software Foundation") . '.
</p>

<h3>' . make_link("/thanks.php", "Thanks To") . '</h3>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<br>
&nbsp; ' . make_link("http://www.pair.com/", "pair Networks") . '<br>
&nbsp; ' . make_link("http://www.rackspace.com/?supbid=php.net", "Rackspace") . '<br>
&nbsp; ' . make_link("http://www.synacor.com/", "Synacor") . '<br>
&nbsp; ' . make_link("http://valinux.com/", "VA Linux Systems") . '<br>
<h3>Related sites</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<br>
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<br>
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<br>
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<br>
<h3>Community</h3>
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<br>
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<br>

<h3>Contact</h3>

<p>
Please
submit website bugs in the ' .
make_link('http://bugs.php.net/', 'bug system') . '.
</p>
<p>
You can contact the webmaster at ' . 
make_link('mailto:webmaster@php.net', 'webmaster@php.net') . '.
</p>
';

$fp = @fopen("backend/events.csv",'r');
if($fp) {
	$cm=0;
	while(!feof($fp)) {
		list($d,$m,$y,$url,$desc) = fgetcsv($fp,4096);
		if($cm!=(int)$m) { 
			if($cm) $RSIDEBAR_DATA.= "<br>\n"; 
			else $RSIDEBAR_DATA.='<h3>Upcoming Events<br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.php.net/cal.php?a=1">[add event]</a></h3>';
			$cm = (int)$m;  
			$RSIDEBAR_DATA .= "<h4>".strftime('%B',mktime(12,0,0,$cm,$d,$y))."</h4>\n"; 
			unset($seen);
		}
		if(!$seen[$desc]) {
			$RSIDEBAR_DATA .= "$d. <a href=\"$url\">$desc</a><br>\n";
			$seen[$desc] = true;
		}
	}
	fclose($fp);
}

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>
PHP 4.1.0 Release Announcement
</h1>

<pre>

Après un long processus "QA", PHP 4.1.0 est enfin sorti.
Télécharger-le sur:  http://www.php.net/downloads.php !

PHP 4.1.0 inclut beaucoup d'améliorations importantes:
- Une nouvelle interface d'entrée en général (voir plus bas)
- Perfomance grandement accrue en général
- Sous Windows une stabilité et une performance révolutionnaire. Les
  modules serveur multi-thread sous windows (ISAPI, Apache, etc...)
  s'exécute jusqu'à 30 fois plus rapidement sous la charge! Nous
  voulons remercier Brett Brewer et son équipe chez Microsoft pour
  son travail avec nous pour améliorer PHP pour Windows.
- Gestion des versions pour les extensions. A l'heure actuelle, ceci
  est très peu utilisé, l'infrastructure était mise en place pour le
  support séparé des numéros de versions pour différentes extensions.
  L'effet de bord négatif est que le faite de charger des extensions
  avec une ancienne version de PHP résultait d'un crash, à la place
  d'un message correct et claire. Soyez sûre que vous utilisez
  seulement des extensions intégrées à PHP 4.1.0.
- Support "Turn-Key" de la compression des sorties
- *ENORMEMENT* de corrections et de nouvelles fonctions

Comme certains l'ont noté, cette version est quelque peu historique,
comme c'est la première fois dans l'histoire que nous incrémentons
le numéro du milieu :).
Les deux principales raisons à cela d'un côté les changements sans
précédent de la nouvelle interface d'entrée, et de l'autre l'incompatibilité
des modules dus au support des versions.

Ce qui suit concerne une description du nouveau mécanisme d'entrée.
Pour une liste complète des changements voir plus bas à la fin de
cette section (Changelog).

-----------------------------------

SECURITE:  NOUVEAU MECANISME D'ENTREE

Avant tout, il est important de signaler que, sans tenir compte de ce
que vous pourriez lire dans les lignes qui suivent, PHP 4.1.0 *gère*
les anciens mécanisme d'entrée des anciennes versions. D'anciennes
applications devraient bien fonctionner sans modification.

Maintenant que nous avons çà derrière nous, Let's move on :)


Pour différentes raisons, PHP qui se repose sur register_globals ON
(ex. sur les formulaires, les variables serveur et d'environnement
deviennent partie de la portée globale d'un script [namespace], et
ce automatiquement) sont très souvent exploitable à des degrés
divers. Par exemple le code suivant:

<?php
if (authenticate_user()) {
   $authenticated = true;
}
...
?>

Peut être exploitable de la manière suivante, des utilisateurs
distants peuvent simplement passer 'authenticated' comme variable
d'un formulaire et même si authenticate_user() retourne false,
$authentiticated va actuellement contenir true. Paraissant comme
un exemple simple, en réalité, bien des applications terminées
sont exploitable par ce dysfonctionnement (NDR:je dirais plutôt
que c'est une erreur de conception et de programmation).

Tandis qu'il est parfaitement possible d'écrire du code PHP
sécurisé, nous sentions le fait que PHP permet, de manière beaucoup
trop facile, d'écrire du code php non sécurisé n'était pas
acceptable, et nous avons décidé de tenter un changement très grand
et de rendre caduque REGISTER_GLOBALS.

Évidemment, la grande majorité du code PHP dans le monde se repose
sur l'existence de cette fonctionnalité, cependant nous n'avons pas
de plans pour la retirer de PHP ni maintenant ni à moyen terme, mais
nous avons décidés d'encourager les utilisateurs de ne plus
l'utiliser tant que faire se peut.

Afin d'aider les utilisateurs à construire des applications PHP avec
REGISTER_GLOBALS sur off, nous avons ajouté quelques nouvelles
variables spéciales, variables qui peuvent être utilisé à la place
des anciennes variables globales. Il y a 7 nouveaux tableaux spéciaux:

$_GET - contient les variables passer par la méthode GET
$_POST - contient les variables passer par la méthode POST
$_COOKIE - contient les variables HTTP cookie
$_SERVER - contient les variables serveur (par ex. REMOTE_ADDR)
$_ENV - contient les variables d'environnement
$_REQUEST - Une fusion des variables GET. POST, COOKIE. En d'autres
            mots toutes les informations qui arrive de l'utilisateur.
            Et d'un point de vue purement sécurité, ne sont pas sûre.
$_SESSION - contient toutes les variables HTTP enregistrées par le
            module de gestion de session

Maintenant, entre autre le fait que ces variables contienne ces
informations spéciales, elles sont aussi automatiquement globales
dans toutes les portées. Cela signifie que vous pouvez y accéder
de n'importe où, sans avoir to de les déclarer en global. Par exemple:

function example1()
{
    print $_GET["name"]; // fonctionne, 'global $_GET' n'est pas nécessaire!!
}

va fonctionner très bien! Nous espérons que cela va faciliter la tâche
durant la migration de vieux code vers le nouveau, et nous sommes sûre
que cela vous simplifiera l'écriture de nouveaux codes.

Une autre astuce est que le faite de créer de nouvelles entrées dans
$_SESSION va automatiquement les enregistrer comme variables de session,
comme si vous auriez appelé session_register(). Cet astuce est limitée
uniquement au module de gestion de session - par exemple, créer de
nouvelles entrés dans $_ENV ne va pas executer un put_env() implicite.

PHP 4.1.0 doit toujours avoir REGISTER_GLOBALS mis a ON par défaut.
C'est une version de transition, et nous encourageons les auteurs
d'applications, spécialement les applications publics qui sont utilisés
par une large audience, de changer leurs applications pour fonctionner
avec un environnement où REGISTER_GLOBALS est à OFF. Il est clair
qu'ils devraient profiter des nouvelles fonctionnalités fournies
avec PHP 4.1.0 qui font cette transition plus aisée.

Dans la prochaine version "demi majeur" de PHP, de nouvelles installations
de PHP devrait avoir REGISTER_GLOBALS mis à OFF par défaut. Ne vous en
faites pas! Les installations existantes, qui ont déjà un fichier php.ini
qui a REGISTER_GLOBALS ON, ne vont pas être affectées. Cela vous
affectera seulement si vous installez PHP sur une nouvelle machine
(typiquement si vous êtes un nouvel utilisateur), et si vous le désirez
toujours le mettre à ON.

Note: Certains de ces tableaux ont d'anciens noms, p.e. $HTTP_GET_VARS.
Ces noms fonctionnent toujours, mais nous encourageons les utilisateurs
de changer vers le nouveaux noms, plus court et automatiquement globales.

Remerciement à Shaun Clowes (shaun@securereality.com.au) de mettre à jour
ce problème et de l'avoir analysé.

-----------------------------------

Zeev
</pre>

French translation is available courtesy of <a href="mailto:pierre-alain.joye@wanadoo.fr">Pierre-Alain Joye</a>

<?php commonFooter(); ?>
