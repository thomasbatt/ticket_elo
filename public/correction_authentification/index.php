<?php
// SESSION
session_start();
// DATABASE
$db = @mysqli_connect('localhost', 'root', 'troiswa', 'livredor');
if (!$db)
	require('apps/offline.php');
// SECURISATION DE LA VARIABLE PAGE -> $page
$page = "home";
$access = ['home', 'login', 'register', 'logout'];
if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access))
		$page = $_GET['page'];
	else
	{
		header('Location: index.php');
		exit;
	}
}
// SECURISATION DES FICHIERS DE TRAITEMENTS
$traitements = ['login'=>'user','register'=>'user','logout'=>'user','home'=>'message'];
if (isset($traitements[$page]))
	require('apps/traitement_'.$traitements[$page].'.php');
// SKEL
require('apps/skel.php');
?>