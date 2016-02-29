<?php
$count=0;
while(isset($tickets[$count]))
{
	if( $tickets[$count]['etat'] == 'encours' ){
		require('views/ticket.phtml');
	}
	$count++;
}
?>