<?php
// var_dump('coucou');
// var_dump('coucou');
// var_dump($_GET);
// var_dump($_POST);
// exit;
// coucou

// SESSION
session_start();

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
		header('Location: index.php');
		exit;
	}
}

// SECURISATION DE LA VARIABLE ACTION -> $action
$action = "";
$access_action = ['edit_secure', 'edit_user', 'edit_plat', 'next_week' ,'previous_week' , 'creat_command', 'valid_command' , 'edit_command' , 'delete_command' , 'login', 'logout', 'register','creat_comment'];

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
	'edit_plat'=>'plat',
	'next_week'=>'plat',
	'previous_week'=>'plat',
	'creat_command'=>'command',
	'valid_command'=>'command',
	'edit_command'=>'command',
	'delete_command'=>'command',
	'login'=>'user',
	'logout'=>'user',
	'register'=>'user',
	'creat_comment'=>'comment'
];
if ( isset($traitements_page[$page]) )
	$traitement = $traitements_page[$page];

if ( isset($traitements_action[$action]) )
	$traitement = $traitements_action[$action];

if ( isset($traitement) )
	require('apps/traitement_'.$traitement.'.php');

// SKEL
require('apps/skel.php');
?>
