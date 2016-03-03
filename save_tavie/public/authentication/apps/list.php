<?php
$query = "SELECT * FROM messages LEFT JOIN users ON users.id=messages.author ORDER BY messages.id DESC";
$res = mysqli_query($db, $query);
while ($message = mysqli_fetch_assoc($res))
	require('views/message.phtml');
?>