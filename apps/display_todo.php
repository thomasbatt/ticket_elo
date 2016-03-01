<?php
$count=0;
// if( 'action' == 'create' )
// {
 	require('views/ticket_edit.phtml');
// }
while(isset($tickets[$count]))
{
	if( $tickets[$count]['statut'] == 'todo' ){
		require('views/ticket.phtml');
	} 
}	
// 	else if ( $tickets['statut'] == 'edit' ){
// 		require('views/ticket_edit.phtml');
// 	}
// 	$count++;
// }
?>