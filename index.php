<?php
// var_dump('coucou');
// var_dump('coucou');
// var_dump($_GET);
// var_dump($_POST);
// exit;

/* ##PASCAL ~> Pour afficher la liste des fichiers contenant un commentaire, entrez la ligne de commande suivante dans votre terminal : grep -R "##PASCAL" | awk -F ":" '{print $1}' | uniq */
/* ##PASCAL ~> Dans vos phtml vous avez oubliez des htmlentities : grep "\\$" views/* | grep -v htmlentities | grep "\\$" */


// SESSION
session_start();

// CONFIG
require('apps/config.php');

// SECURISATION DE LA VARIABLE PAGE -> $page
$page = "tickets";
$access_page = ['display_ticket','display_new', 'register', 'account', 'list_command', 'list_user' , 'list_plat' ];

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
// SECURISATION DES FICHIERS DE TRAITEMENTS
$traitements_page = [
	'account'=>'user',
	'list_user'=>'user',
];
$traitements_action = [
	'creat_ticket'=>'ticket',
	'valid_ticket'=>'ticket',
	'next_ticket'=>'ticket',
	'edit_ticket'=>'ticket',
	'delete_ticket'=>'ticket',
	'login'=>'user',
	'logout'=>'user',
	'register'=>'user'
];
/* ##PASCAL ~> Vous avez 3 if qui se suivent pour traiter la même chose et sans else, attention il pourrait y avoir des comportements imprévus */
if ( isset($traitements_page[$page]) )
	$traitement = $traitements_page[$page];

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ( isset($traitements_action[$action]) )
		$traitement = $traitements_action[$action];
}

if ( isset($traitement) )
	require('apps/traitement_'.$traitement.'.php');

// SKEL
if (!isset($_GET['ajax']))
	require('apps/skel.php');
else
	require('apps/'.$page.'.php');
?>
