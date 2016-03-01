<?php
	$list = json_decode(file_get_contents('tickets.json'), true);
$tickets_todo = $list['todo'];
$tickets_current = $list['current'];
$tickets_done = $list['done'];

	require('views/tickets.phtml');

?>