<?php
$statut = 'todo';
$query = "SELECT COUNT(id) as count FROM `ticket_tickets` WHERE statut = '".$statut."' ";
$res_user = mysqli_query($db, $query);
$list = mysqli_fetch_assoc($res_user);
$list_count = $list['count'];

require('views/display_todo.phtml');
?>
