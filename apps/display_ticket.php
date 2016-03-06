<?php
// var_dump($_GET);
// var_dump($_POST);

if ( isset($_GET['id'], $_GET['statut'], $_GET['editing'] ))
{
	$id = intval($_GET['id']);
	$statut = mysqli_real_escape_string($db,$_GET['statut']);
	$editing = intval($_GET['editing']);
	$query = "SELECT 
				ticket_tickets.id AS ticket_id, title, ticket_tickets.statut AS ticket_statut, content, ticket_tickets.date AS ticket_date, dead_line, img AS url_img, treatment_id, ticket_tickets.editing,
				ticket_users.id AS user_id, ticket_users.avatar AS url_avatar, ticket_users.first_name, ticket_users.last_name, ticket_users.login, ticket_users.phone, ticket_users.statut AS user_statut
				FROM ticket_tickets 
				LEFT JOIN ticket_users ON ticket_tickets.user_id = ticket_users.id 
				WHERE ticket_tickets.id = '".$id."'  
				ORDER BY ticket_tickets.id DESC";
	$res_user = mysqli_query($db, $query);

	while ($ticket_user = mysqli_fetch_assoc($res_user))
	{
		$ticket = [
			'id' => $ticket_user['ticket_id'],
			'title' => $ticket_user['title'],
			'content' => $ticket_user['content'],
			'date' => $ticket_user['ticket_date'],
			'dead_line' => $ticket_user['dead_line'],
			'img' => $ticket_user['url_img'],
			'treatment_id' => $ticket_user['treatment_id'],
			'statut' => $ticket_user['ticket_statut'],
		];
		$user = [
			'id' => $ticket_user['user_id'],
			'url_avatar' => $ticket_user['url_avatar'],
			'first_name' => $ticket_user['first_name'],
			'last_name' => $ticket_user['last_name'],
			'login' => $ticket_user['login'],
			'phone' => $ticket_user['phone'],
			'statut' => $ticket_user['user_statut']
		];
		if ($editing)
			$ticket_file = 'ticket_edit'; 
		else
			$ticket_file = 'ticket'; 
		require('views/'.$ticket_file.'.phtml');
	}
}
?>