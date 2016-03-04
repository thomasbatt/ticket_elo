<?php

$statut = mysqli_real_escape_string($db, $statut);
$query = "SELECT 
			ticket_tickets.id AS ticket_id, title, ticket_tickets.statut AS ticket_statut, content, ticket_tickets.date AS ticket_date, dead_line, img AS url_img, treatment_id, ticket_tickets.editing,
			ticket_users.id AS user_id, ticket_users.avatar AS url_avatar, ticket_users.first_name, ticket_users.last_name, ticket_users.login, ticket_users.phone, ticket_users.statut AS user_statut
			FROM ticket_tickets 
			LEFT JOIN ticket_users ON ticket_tickets.user_id = ticket_users.id 
			WHERE ticket_tickets.statut = '".$statut."'  
			ORDER BY ticket_tickets.id DESC";

$res_user = mysqli_query($db, $query);

while ($ticket_user = mysqli_fetch_assoc($res_user))
{
	$tiket = [
		'id' => $ticket_user['ticket_id'],
		'title' => $ticket_user['title'],
		'ticket_statut' => $ticket_user['ticket_statut'],
		'content' => $ticket_user['content'],
		'ticket_date' => $ticket_user['ticket_date'],
		'dead_line' => $ticket_user['dead_line'],
		'url_img' => $ticket_user['url_img'],
		'treatment_id' => $ticket_user['treatment_id'],
		'editing' => $ticket_user['editing']
	];


	$ticket_id = $ticket_user['ticket_id'];
	$title = $ticket_user['title'];
	$ticket_statut = $ticket_user['ticket_statut'];
	$content = $ticket_user['content'];
	$ticket_date = $ticket_user['ticket_date'];
	$dead_line = $ticket_user['dead_line'];
	$url_img = $ticket_user['url_img'];
	$treatment_id = $ticket_user['treatment_id'];
	$editing = $ticket_user['editing'];

	$user_id = $ticket_user['user_id'];
	$url_avatar = $ticket_user['url_avatar'];
	$first_name = $ticket_user['first_name'];
	$last_name = $ticket_user['last_name'];
	$login = $ticket_user['login'];
	$phone = $ticket_user['phone'];
	$user_statut = $ticket_user['user_statut'];
	/* ##PASCAL ~> Pareil ici pas besoin de faire 15 variables... c'est un peu crade, faites une variable $user et une variable $ticket, c'est plus propre ! */
	// var_dump($ticket_user);
	
	if ($editing)
		$ticket_file = 'ticket_edit'; 
	else
		$ticket_file = 'ticket'; 

	require('views/'.$ticket_file.'.phtml');

}
?>