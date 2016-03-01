<?php

$statut = mysqli_real_escape_string($db, $statut);
$query = "SELECT 
			ticket_tickets.id as ticket_id, title, ticket_tickets.statut as ticket_statut, content, ticket_tickets.date as ticket_date, dead_line, img as url_img, treatment_id, 
			ticket_users.id as user_id, ticket_users.avatar as url_avatar, ticket_users.first_name, ticket_users.last_name, ticket_users.login, ticket_users.phone, ticket_users.statut as user_statut
			FROM ticket_tickets 
			LEFT JOIN ticket_users ON ticket_tickets.user_id = ticket_users.id 
			WHERE ticket_tickets.statut = '".$statut."'  
			ORDER BY ticket_tickets.id ";

$res_user = mysqli_query($db, $query);

while ($ticket_user = mysqli_fetch_assoc($res_user))
{
	$ticket_id = $ticket_user['ticket_id'];
	$title = $ticket_user['title'];
	$ticket_statut = $ticket_user['ticket_statut'];
	$content = $ticket_user['content'];
	$ticket_date = $ticket_user['ticket_date'];
	$dead_line = $ticket_user['dead_line'];
	$url_img = $ticket_user['url_img'];
	$treatment_id = $ticket_user['treatment_id'];

	$user_id = $ticket_user['user_id'];
	$url_avatar = $ticket_user['url_avatar'];
	$first_name = $ticket_user['first_name'];
	$last_name = $ticket_user['last_name'];
	$login = $ticket_user['login'];
	$phone = $ticket_user['phone'];
	$user_statut = $ticket_user['user_statut'];

	// var_dump($ticket_user);
	require('views/ticket.phtml');
}

$query = "SELECT * FROM ticket_tickets WHERE title='".$title."', content='".$content."', img='".$img."'";
$res = mysqli_query($db, $query);
while($ticket = mysqli_fetch_assoc($res))
	require('views/ticket_visuel.phtml');


// $query = "SELECT * FROM messages LEFT JOIN users ON users.id=messages.author ORDER BY messages.id DESC";

?>