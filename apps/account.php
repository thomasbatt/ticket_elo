<?php 
$login = mysqli_real_escape_string($db, $_SESSION['login']);
/* ##PASCAL ~> Utiliser plutot le $_SESSION['id'] que le login, la limite ici sert a rien */
$query = "SELECT * FROM `ticket_users` WHERE login = '".$login."' LIMIT 0, 30 ";
$res = mysqli_query($db, $query);
	if ($res)
	{
		$user = mysqli_fetch_assoc($res);
	}
$email = $user['email'];
$phone = $user['phone'];
$avatar = $user['avatar'];
$first_name = $user['first_name'];
$last_name = $user['last_name'];
$role = $user['role'];
$statut = $user['statut'];
/* ##PASCAL ~> Pas obligé de créer une variable pour chaque champs, vous pouvez directement faire un : <?=$user['role']?> dans le phtml, c'est plus explicite ! */

require('views/account.phtml'); ?>
