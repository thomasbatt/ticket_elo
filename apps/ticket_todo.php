<?php
$count=0;
if( $affichecreer == 'true' )
{
 	require('views/ticket_creer.phtml');
}
while(isset($tickets[$count]))
{
	if( $tickets[$count]['etat'] == 'afaire' ){
		require('views/ticket.phtml');
	} 
	else if ( $tickets[$count]['etat'] == 'aediter' ){
		require('views/ticket_edit.phtml');
	}
	$count++;
}
?>