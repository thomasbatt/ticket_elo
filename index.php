<?php
// var_dump('coucou');
// var_dump('coucou');
// var_dump($_GET);
// var_dump($_POST);
// exit;
// coucou

// SESSION
session_start();
/* ##PASCAL ~> Pour afficher la liste des fichiers contenant un commentaire, entrez la ligne de commande suivante dans votre terminal : grep -R "##PASCAL" | awk -F ":" '{print $1}' | uniq */
/* ##PASCAL ~> Dans vos phtml vous avez oubliez des htmlentities : grep "\\$" views/* | grep -v htmlentities | grep "\\$" */
/* ##PASCAL ~> Dans l'idéal les informations de connexion à la db se trouvent dans un fichier dédié, genre config.php qui est ensuite require */
// DATABASE
// $domaine = 'localhost';
$domaine = '192.168.1.8';
// $domaine = 'mysql51-71.pro';
$db = @mysqli_connect($domaine, "thomasbazshare", "dbshare1", "thomasbazshare");
if (!$db)
	// var_dump($db);
	// exit;
	require('apps/offline.php');

// SECURISATION DE LA VARIABLE PAGE -> $page
$page = "tickets";
$access_page = [ 'register', 'account', 'list_command', 'list_user' , 'list_plat' ];

if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access_page))
		$page = $_GET['page'];
	else
	{
		/* ##PASCAL ~> Pas besoin d'indiquer index.php, il faudrait plutôt mettre juste : tickets (la page par défaut) */
		header('Location: index.php');
		exit;
	}
}

// SECURISATION DE LA VARIABLE ACTION -> $action
/* ##PASCAL ~> La gestion des actions doit s'effectuer directement dans le fichier qui correspond (le fichier de traitement à priori) et pas dans l'index */
$action = "";
$access_action = [ 'edit_user' , 'creat_ticket', 'valid_ticket' , 'edit_ticket' , 'delete_ticket' , 'login', 'logout', 'register'];

if (isset($_POST['action']))
{
	if (in_array($_POST['action'], $access_action))
		$action = $_POST['action'];
	else
	{
		header('Location: index.php');
		exit;
	}
}

// SECURISATION DES FICHIERS DE TRAITEMENTS
$traitements_page = [
	'account'=>'user',
	'list_user'=>'user',
];
$traitements_action = [
	'creat_ticket'=>'ticket',
	'valid_ticket'=>'ticket',
	'edit_ticket'=>'ticket',
	'delete_ticket'=>'ticket',
	'login'=>'user',
	'logout'=>'user',
	'register'=>'user'


];
/* ##PASCAL ~> Vous avez 3 if qui se suivent pour traiter la même chose et sans else, attention il pourrait y avoir des comportements imprévus */
if ( isset($traitements_page[$page]) )
	$traitement = $traitements_page[$page];

if ( isset($traitements_action[$action]) )
	$traitement = $traitements_action[$action];

if ( isset($traitement) )
	require('apps/traitement_'.$traitement.'.php');

// SKEL
require('apps/skel.php');
?>
