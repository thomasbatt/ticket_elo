<?php
if ($statut == 'todo')
	require('views/ticket_todo.phtml');
else if ($statut == 'current')
	require('views/ticket_current.phtml');
else if ($statut == 'done')
	require('views/ticket_done.phtml');

?>