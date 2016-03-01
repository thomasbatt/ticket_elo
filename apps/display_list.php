<?php
$count = 0;
while ($count < sizeof($list))
{
	$ticket = $list[$count];
	require('views/ticket.phtml');
	$count++;
}

$query = "SELECT * FROM ticket_tickets WHERE title='".$title."', content='".$content."', img='".$img."'";
$res = mysqli_query($db, $query);
while($ticket = mysqli_fetch_assoc($res))
	require('views/ticket_visuel.phtml');


// $query = "SELECT * FROM messages LEFT JOIN users ON users.id=messages.author ORDER BY messages.id DESC";

?>