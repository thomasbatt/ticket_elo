<?php
$count=0;
while(isset($tickets[$count]))
{
	if( $tickets[$count]['etat'] == 'fait' ){
		require('views/ticket.phtml');
	}
	$count++;
}
?>