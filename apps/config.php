<?php
// DATABASE
$domaine = 'localhost';
// $domaine = '192.168.1.65';
// $domaine = 'mysql51-71.pro';
$db = @mysqli_connect($domaine, "thomasbazshare", "dbshare1", "thomasbazshare");
if (!$db)
	// var_dump($db);
	// exit;
	require('apps/offline.php');
?>