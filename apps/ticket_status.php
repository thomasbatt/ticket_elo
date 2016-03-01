<?php
if ($status == 'todo')
	require('views/ticket_todo.phtml');
else if ($status == 'current')
	require('views/ticket_current.phtml');
else if ($status == 'done')
	require('views/ticket_done.phtml');
?>