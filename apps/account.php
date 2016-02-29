<?php 
$login = mysqli_real_escape_string($db, $_SESSION['login']);
$query = "SELECT * FROM `bistrot_users` WHERE login = '".$login."' LIMIT 0, 30 ";
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


require('views/account.phtml'); ?>
